<?php
class xpwiki_plugin_paint extends xpwiki_plugin {
	function plugin_paint_init () {


	// PukiWiki - Yet another WikiWikiWeb clone
	//
	// $Id: paint.inc.php,v 1.4 2011/11/26 12:03:10 nao-pon Exp $
	//
	// Paint plugin
	
	/*
	 * Usage
	 *  #paint(width,height)
	 * �ѥ�᡼��
	 *  �����Х������ȹ⤵
		 */
	
	// ����������� 1:����� 0:��θ�
		$this->cont['PAINT_INSERT_INS'] = 0;
	
	// �ǥե���Ȥ������ΰ�����ȹ⤵
		$this->cont['PAINT_DEFAULT_WIDTH'] = 80;
		$this->cont['PAINT_DEFAULT_HEIGHT'] = 60;
	
	// �����ΰ�����ȹ⤵��������
		$this->cont['PAINT_MAX_WIDTH'] = 320;
		$this->cont['PAINT_MAX_HEIGHT'] = 240;
	
	// ���ץ�å��ΰ�����ȹ⤵ 50x50̤�����̥�����ɥ�������
		$this->cont['PAINT_APPLET_WIDTH'] = 800;
		$this->cont['PAINT_APPLET_HEIGHT'] = 300;
	
	//�����Ȥ������ե����ޥå�
		$this->cont['PAINT_NAME_FORMAT'] = '[[$name]]';
		$this->cont['PAINT_MSG_FORMAT'] = '$msg';
		$this->cont['PAINT_NOW_FORMAT'] = '&new{$now};';
	//��å�������������
		$this->cont['PAINT_FORMAT'] = "\x08MSG\x08 -- \x08NAME\x08 \x08NOW\x08";
	//��å��������ʤ����
		$this->cont['PAINT_FORMAT_NOMSG'] = "\x08NAME\x08 \x08NOW\x08";

	}
	
	function plugin_paint_action()
	{
	//	global $script, $vars, $pkwk_dtd, $_paint_messages;
	
		if ($this->cont['PKWK_READONLY']) $this->func->die_message('PKWK_READONLY prohibits editing');
		
		//����ͤ�����
		$retval['msg'] = $this->root->_paint_messages['msg_title'];
		$retval['body'] = '';
	
		if (array_key_exists('attach_file',$_FILES)
			and array_key_exists('refer',$this->root->vars))
		{
			$file = $_FILES['attach_file'];
			//BBSPaiter.jar�ϡ�shift-jis�����Ƥ����äƤ��롣���ݤʤΤǥڡ���̾�ϥ��󥳡��ɤ��Ƥ�������������褦�ˤ�����
			$this->root->vars['page'] = $this->root->vars['refer'] = $this->func->decode($this->root->vars['refer']);
	
			$filename = $this->root->vars['filename'];
			$filename = mb_convert_encoding($filename,$this->cont['SOURCE_ENCODING'],'auto');
	
			//�ե�����̾�ִ�
			$attachname = preg_replace('/^[^\.]+/',$filename,$file['name']);
			//���Ǥ�¸�ߤ�����硢 �ե�����̾��'_0','_1',...���դ��Ʋ���(��©)
			$count = '_0';
			while (is_file($this->cont['UPLOAD_DIR'].$this->func->encode($this->root->vars['refer']).'_'.$this->func->encode($attachname)))
			{
				$attachname = preg_replace('/^[^\.]+/',$filename.$count++,$file['name']);
			}
	
			$file['name'] = $attachname;
	
			if (!$this->func->exist_plugin('attach') or !function_exists('attach_upload'))
			{
				return array('msg'=>'attach.inc.php not found or not correct version.');
			}
	
			$retval = $this->func->attach_upload($file,$this->root->vars['refer'],TRUE);
			if ($retval['result'] == TRUE)
			{
				$retval = $this->paint_insert_ref($file['name']);
			}
		}
		else
		{
			$message = '';
			$r_refer = $s_refer = '';
			if (array_key_exists('refer',$this->root->vars))
			{
				$r_refer = rawurlencode($this->root->vars['refer']);
				$s_refer = htmlspecialchars($this->root->vars['refer']);
			}
			$link = "<p><a href=\"{$this->root->script}?$r_refer\">$s_refer</a></p>";;
	
			$w = $this->cont['PAINT_APPLET_WIDTH'];
			$h = $this->cont['PAINT_APPLET_HEIGHT'];
	
			//������ɥ��⡼�� :)
			if ($w < 50 and $h < 50)
			{
				$w = $h = 0;
				$retval['msg'] = '';
				$this->root->vars['page'] = $this->root->vars['refer'];
				$this->root->vars['cmd'] = 'read';
				$retval['body'] = $this->func->convert_html($this->func->get_source($this->root->vars['refer']));
				$link = '';
			}
	
			//XSS�ȼ������� - ���������褿�ѿ��򥨥�������
			$width = empty($this->root->vars['width']) ? $this->cont['PAINT_DEFAULT_WIDTH'] : $this->root->vars['width'];
			$height = empty($this->root->vars['height']) ? $this->cont['PAINT_DEFAULT_HEIGHT'] : $this->root->vars['height'];
			$f_w = (is_numeric($width) and $width > 0) ? $width : $this->cont['PAINT_DEFAULT_WIDTH'];
			$f_h = (is_numeric($height) and $height > 0) ? $height : $this->cont['PAINT_DEFAULT_HEIGHT'];
			$f_refer = array_key_exists('refer',$this->root->vars) ? $this->func->encode($this->root->vars['refer']) : ''; // BBSPainter.jar��shift-jis���Ѵ�����Τ����
			$f_digest = array_key_exists('digest',$this->root->vars) ? htmlspecialchars($this->root->vars['digest']) : '';
			$f_no = (array_key_exists('paint_no',$this->root->vars) and is_numeric($this->root->vars['paint_no'])) ?
				$this->root->vars['paint_no'] + 0 : 0;
	
			if ($f_w > $this->cont['PAINT_MAX_WIDTH'])
			{
				$f_w = $this->cont['PAINT_MAX_WIDTH'];
			}
			if ($f_h > $this->cont['PAINT_MAX_HEIGHT'])
			{
				$f_h = $this->cont['PAINT_MAX_HEIGHT'];
			}
	
			$retval['body'] .= <<<EOD
 <div>
 $link
 $message
 <applet codebase="." archive="BBSPainter.jar" code="Main.class" width="$w" height="$h">
 <param name="size" value="$f_w,$f_h" />
 <param name="action" value="{$this->root->script}" />
 <param name="image" value="attach_file" />
 <param name="form1" value="filename={$this->root->_paint_messages['field_filename']}=!" />
 <param name="form2" value="yourname={$this->root->_paint_messages['field_name']}" />
 <param name="comment" value="msg={$this->root->_paint_messages['field_comment']}" />
 <param name="param1" value="plugin=paint" />
 <param name="param2" value="refer=$f_refer" />
 <param name="param3" value="digest=$f_digest" />
 <param name="param4" value="max_file_size=1000000" />
 <param name="param5" value="paint_no=$f_no" />
 <param name="enctype" value="multipart/form-data" />
 <param name="return.URL" value="{$this->root->script}?$r_refer" />
 </applet>
 </div>
EOD;
			// XHTML 1.0 Transitional
			if (! isset($this->root->pkwk_dtd) || $this->root->pkwk_dtd == $this->cont['PKWK_DTD_XHTML_1_1'])
				$this->root->pkwk_dtd = $this->cont['PKWK_DTD_XHTML_1_0_TRANSITIONAL'];
		}
		return $retval;
	}
	
	function plugin_paint_convert()
	{
	//	global $script,$vars,$digest;
	//	global $_paint_messages;
	//	static $numbers = array();
		static $numbers = array();
		if (!isset($numbers[$this->xpwiki->pid])) {$numbers[$this->xpwiki->pid] = array();}
	
		if ($this->cont['PKWK_READONLY']) return ''; // Show nothing
	
		if (!array_key_exists($this->root->vars['page'],$numbers[$this->xpwiki->pid]))
		{
			$numbers[$this->xpwiki->pid][$this->root->vars['page']] = 0;
		}
		$paint_no = $numbers[$this->xpwiki->pid][$this->root->vars['page']]++;
	
		//�����
		$ret = '';
	
		//ʸ��������
		$width = $height = 0;
		$args = func_get_args();
		if (count($args) >= 2)
		{
			$width = array_shift($args);
			$height = array_shift($args);
		}
		if (!is_numeric($width) or $width <= 0)
		{
			$width = $this->cont['PAINT_DEFAULT_WIDTH'];
		}
		if (!is_numeric($height) or $height <= 0)
		{
			$height = $this->cont['PAINT_DEFAULT_HEIGHT'];
		}
	
		//XSS�ȼ������� - ���������褿�ѿ��򥨥�������
		$f_page = htmlspecialchars($this->root->vars['page']);
	
		$max = sprintf($this->root->_paint_messages['msg_max'],$this->cont['PAINT_MAX_WIDTH'],$this->cont['PAINT_MAX_HEIGHT']);
		$script = $this->func->get_script_uri();
		$ret = <<<EOD
  <form action="{$script}" method="post">
  <div>
  <input type="hidden" name="paint_no" value="$paint_no" />
  <input type="hidden" name="digest" value="{$this->root->digest}" />
  <input type="hidden" name="plugin" value="paint" />
  <input type="hidden" name="refer" value="$f_page" />
  <input type="text" name="width" size="3" value="$width" />
  x
  <input type="text" name="height" size="3" value="$height" />
  $max
  <input type="submit" value="{$this->root->_paint_messages['btn_submit']}" />
  </div>
  </form>
EOD;
		return $ret;
	}
	function paint_insert_ref($filename)
	{
	//	global $script,$vars,$now,$do_backup;
	//	global $_paint_messages,$_no_name;
	
		$ret['msg'] = $this->root->_paint_messages['msg_title'];
	
		$msg = mb_convert_encoding(rtrim($this->root->vars['msg']),$this->cont['SOURCE_ENCODING'],'auto');
		$name = mb_convert_encoding($this->root->vars['yourname'],$this->cont['SOURCE_ENCODING'],'auto');
	
		$msg  = str_replace('$msg',$msg,$this->cont['PAINT_MSG_FORMAT']);
		$name = ($name == '') ? $this->root->_no_name : $this->root->vars['yourname'];
		$name = ($name == '') ? '' : str_replace('$name',$name,$this->cont['PAINT_NAME_FORMAT']);
		$this->root->now  = str_replace('$now',$this->root->now,$this->cont['PAINT_NOW_FORMAT']);
	
		$msg = trim($msg);
		$msg = ($msg == '') ?
			$this->cont['PAINT_FORMAT_NOMSG'] :
			str_replace("\x08MSG\x08", $msg, $this->cont['PAINT_FORMAT']);
		$msg = str_replace("\x08NAME\x08",$name, $msg);
		$msg = str_replace("\x08NOW\x08",$this->root->now, $msg);
	
		//�֥�å��˿����ʤ��褦�ˡ�#clear��ľ����\n��2�Ľ񤤤Ƥ���
		$msg = "#ref($filename,wrap,around)\n" . trim($msg) . "\n\n" .
		"#clear\n";
	
		$postdata_old = $this->func->get_source($this->root->vars['refer']);
		$postdata = '';
		$paint_no = 0; //'#paint'�νи����
		foreach ($postdata_old as $line)
		{
			if (!$this->cont['PAINT_INSERT_INS'])
			{
				$postdata .= $line;
			}
			if (preg_match('/^#paint/i',$line))
			{
				if ($paint_no == $this->root->vars['paint_no'])
				{
					$postdata .= $msg;
				}
				$paint_no++;
			}
			if ($this->cont['PAINT_INSERT_INS'])
			{
				$postdata .= $line;
			}
		}
	
		// �����ξ��ͤ򸡽�
		if ($this->func->get_digests(join('',$postdata_old)) != $this->root->vars['digest'])
		{
			$ret['msg'] = $this->root->_paint_messages['msg_title_collided'];
			$ret['body'] = $this->root->_paint_messages['msg_collided'];
		}
	
		$this->func->page_write($this->root->vars['refer'],$postdata);
	
		return $ret;
	}
}
?>