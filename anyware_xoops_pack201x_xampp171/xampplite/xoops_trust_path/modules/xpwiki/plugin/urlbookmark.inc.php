<?php
// $Id: urlbookmark.inc.php,v 1.10 2008/11/26 23:41:01 nao-pon Exp $

/*
 * PukiWiki urlbookmark �ץ饰����
 * Copyright (C) 2003, Kazunori Mizushima <kazunori@mzsm.net>
 *
 * URL �Υ֥å��ޡ������뤿��Υץ饰����Ǥ���
 * URL �����Ϥ���С����Υ����Ȥ�HTML���ɹ��ߥ����ȥ��ưŪ�˼������ޤ���
 * comment �ץ饰�����١����˺�ä��Τǡ�comment �ץ饰�����Ʊ���������Ȥ��ޤ���
 *
 * [������]
 * #urlbookmark
 * #urlbookmark(below)
 * #urlbookmark(nodate)
 * #urlbookmark(nodate,notitle)
 *
 * [����]
 * ���ΰ����򥫥�ޤǶ��ڤäƻ��ꤹ�뤳�Ȥ��Ǥ��ޤ���
 * below   ���ϥե�����β����ɲä���Ƥ����ޤ��� 
 * nodate  ���դ��Ĥ��ޤ��� 
 * notitle �����ȥ�����Ϲ��ܤ�ɽ������ޤ���
 */

class xpwiki_plugin_urlbookmark extends xpwiki_plugin {
	
	function plugin_urlbookmark_init()
	{
	
		/////////////////////////////////////////////////
		// URL�ƥ����ȥ��ꥢ�Υ�����
		$this->config['URLBOOKMARK_URL_COLS'] = 70;
		/////////////////////////////////////////////////
		// �����ȥ�ƥ����ȥ��ꥢ�Υ�����
		$this->config['URLBOOKMARK_TITLE_COLS'] = 40;
		/////////////////////////////////////////////////
		// �����ȤΥƥ����ȥ��ꥢ�Υ�����
		$this->config['URLBOOKMARK_COMMENT_COLS'] = 70;
		/////////////////////////////////////////////////
		// �֥å��ޡ����������ե����ޥå�
		$this->config['URLBOOKMARK_NAME_FORMAT'] = '$name';
		$this->config['URLBOOKMARK_MSG_FORMAT'] = ' -- $msg';
		$this->config['URLBOOKMARK_NOW_FORMAT'] = '&new{$now};';
		/////////////////////////////////////////////////
		// �֥å��ޡ����������ե����ޥå�(����������)
		$this->config['URLBOOKMARK_FORMAT'] = "\x08NAME\x08 \x08MSG\x08 \x08NOW\x08";
		/////////////////////////////////////////////////
		// �֥å��ޡ���������������� 1:����� 0:��θ�
		$this->config['URLBOOKMARK_INS'] = 1;
		
		// ����ե�������ɤ߹���
		$this->load_language();
	}
	
	function plugin_urlbookmark_action() {
		
		$this->root->post['msg'] = preg_replace("/\n/",'',$this->root->post['msg']);
	
		$url = trim($this->root->post['plink']);
		
		if ($url == '') {
			return array('msg'=>'','body'=>'');
		}
		
		$head = '';
		$match = array();
		if (preg_match('/^(-{1,2})(.*)/',$this->root->post['msg'],$match))
		{
			$head = $match[1];
			$this->root->post['msg'] = $match[2];
		}
	
		$title = $this->root->post['title'];
		if ($title == '' || $title == $this->msg['title_auto'])
		{
			// try to get the title from the site
			$title = $this->plugin_urlbookmark_get_title($url);
		}
		
	
		if ($title == '')
		{
			$_name = str_replace('$name',$url,$this->config['URLBOOKMARK_NAME_FORMAT']);
		}
		else
		{
			$patterns = array ("/:/", "/\[/", "/\]/");
			$replace  = array (" ", "(", ")");
			$title = preg_replace($patterns, $replace,$title);
			$_name = str_replace('$name','[['.$title.":".$url.']]',$this->config['URLBOOKMARK_NAME_FORMAT']);
		}
	
		$_msg  = empty($this->root->post['msg'])? '' : str_replace('$msg', $this->root->post['msg'], $this->config['URLBOOKMARK_MSG_FORMAT']);
		$_now  = ($this->root->post['nodate'] == '1') ? '' : str_replace('$now', $this->root->now,         $this->config['URLBOOKMARK_NOW_FORMAT']);
		
		$siteimg = ($this->func->exist_plugin_inline('siteimage'))? '&siteimage(' . $url . ',size:s); ' : '';
		
		$urlbookmark = str_replace("\x08MSG\x08", $_msg, $this->config['URLBOOKMARK_FORMAT']);
		$urlbookmark = str_replace("\x08NAME\x08",$_name,$urlbookmark);
		$urlbookmark = str_replace("\x08NOW\x08", $_now, $urlbookmark);
		$urlbookmark = $head.$siteimg.$urlbookmark;
		
		$postdata = '';
		$postdata_old  = $this->func->get_source($this->root->post['refer']);
		$this->func->escape_multiline_pre($postdata_old, TRUE);
		$urlbookmark_no = 0;
		$urlbookmark_ins = ($this->root->post['above'] == '1');
		
		foreach ($postdata_old as $line)
		{
			if (!$urlbookmark_ins)
			{
				$postdata .= $line;
			}
			if (preg_match('/^#urlbookmark/',$line) and $urlbookmark_no++ == $this->root->post['urlbookmark_no'])
			{
				$postdata = rtrim($postdata)."\n-$urlbookmark\n";
				if ($urlbookmark_ins)
				{
					$postdata .= "\n";
				}
			}
			if ($urlbookmark_ins)
			{
				$postdata .= $line;
			}
		}
		
		$title = $this->root->_title_updated;
		$body = '';
		if ($this->func->get_digests($this->func->get_source($this->root->vars['refer'], TRUE, TRUE)) != $this->root->post['digest'])
		{
			$title = $this->root->_title_collided;
			$body = $this->msg['msg_urlbookmark_collided'] . $this->func->make_pagelink($this->root->post['refer']);
		}
		
		$this->func->escape_multiline_pre($postdata, FALSE);
		$this->func->page_write($this->root->post['refer'],$postdata);
		
		$retvars['msg'] = $title;
		$retvars['body'] = $body;
		
		$this->root->post['page'] = $this->root->vars['page'] = $this->root->post['refer'];
		
		return $retvars;
	}
	function plugin_urlbookmark_convert() {
		static $numbers = array();
		if (!isset($numbers[$this->xpwiki->pid])) {$numbers[$this->xpwiki->pid] = array();}
		
		if (!array_key_exists($this->root->vars['page'],$numbers[$this->xpwiki->pid]))
		{
			$numbers[$this->xpwiki->pid][$this->root->vars['page']] = 0;
		}
		$urlbookmark_no = $numbers[$this->xpwiki->pid][$this->root->vars['page']]++;
		
		$options = func_num_args() ? func_get_args() : array();
		
		// �Խ����¤�ɬ�ס�
		if (in_array('auth',$options) && !$this->func->check_editable($this->root->vars["page"],false,false))
		{
			return "";
		}
		
		if (in_array('notitle',$options)) {
			$titletags = "";
		}
		else {
			$titletags = $this->msg['title_urlbookmark'] . "<input type='text' name='title' size='".$this->config['URLBOOKMARK_TITLE_COLS']."' value='{$this->msg['title_auto']}' /><br/>\n";
		}
			
		$nodate = in_array('nodate',$options) ? '1' : '0';
		$above = in_array('above',$options) ? '1' : (in_array('below',$options) ? '0' : $this->config['URLBOOKMARK_INS']);
		
		$s_page = htmlspecialchars($this->root->vars['page']);
		$urlbookmark_cols = $this->config['URLBOOKMARK_COMMENT_COLS'];
		$url_cols = $this->config['URLBOOKMARK_URL_COLS'];
		$script = $this->func->get_script_uri();
		$string = <<<EOD
<br />
<form action="{$script}" method="post">
 <div>
  <input type="hidden" name="urlbookmark_no" value="$urlbookmark_no" />
  <input type="hidden" name="refer" value="$s_page" />
  <input type="hidden" name="plugin" value="urlbookmark" />
  <input type="hidden" name="nodate" value="$nodate" />
  <input type="hidden" name="above" value="$above" />
  <input type="hidden" name="digest" value="{$this->root->digest}" />
  {$this->msg['btn_url']} <input type="text" name="plink" size="$url_cols" /><br/>
  $titletags
  {$this->msg['msg_urlbookmark']} <input type="text" name="msg" size="$urlbookmark_cols" /><br/>
  <input type="submit" value="{$this->msg['btn_urlbookmark']}" />
 </div>
</form>
EOD;
		
		return $string;
	}
	
	function plugin_urlbookmark_get_title($url) {

		$ht = new Hyp_HTTP_Request();
		$ht->init();
		$ht->ua = 'Mozilla/5.0';
		$ht->url = $url;
		$ht->get();

		if ($ht->rc !== 200) {
			return 'The page not found. (' . $ht->rc . ')';
		}

		$data = $ht->data;
		$ht = NULL;
		
		$buf = preg_replace('/[\x00\r\n]+/', '', $data);
		
		if (preg_match('/<title[^>]*>(.+?)<\/title>/i', $buf, $tmpary)) {
			$title = trim($tmpary[1]);
		} else {
			$title = rawurldecode($url);
		}
		$title = str_replace(array('<', '>'), array('&lt;', '&gt;'), $title);
		$enc = $this->get_encoding($buf);
		if ($enc !== 'auto') {
			$this->func->encode_numericentity($title, $this->cont['SOURCE_ENCODING'], $enc);
			$title = mb_convert_encoding($title, $this->cont['SOURCE_ENCODING'], $enc);
		} else {
			if (extension_loaded('mbstring')) {
				$enc = $this->get_encoding($buf);
				
				if (strtoupper($this->cont['SOURCE_ENCODING']) === 'UTF-8') {
					$title = mb_convert_encoding($title, $this->cont['SOURCE_ENCODING'], $enc);
				} else {
					$_sub = mb_substitute_character();
					mb_substitute_character(0x003c);
					$_title = @ mb_convert_encoding($title, $this->cont['SOURCE_ENCODING'], $enc);
					if (strpos($_title, '<') !== FALSE) {
						$title = @ mb_convert_encoding($title, 'UTF-8', $enc);
						$title = mb_convert_encoding($title, 'HTML-ENTITIES', 'UTF-8');
					} else {
						$title = $_title;
					}
					mb_substitute_character($_sub);
				}
			}
		}
		return trim($title);
	}

	function get_encoding($html) {
		$codesets = array(
			'shift_jis'   => 'SJIS',
			'x-sjis'      => 'SJIS',
			'x-euc-jp'    => 'EUC-JP',
		);
		if (preg_match('/<meta[^>]*content=["\'][^"\'>]*charset=([^"\'>]+)["\'][^>]*>/is', $html, $match)) {
			$encode = strtolower($match[1]);
			if (array_key_exists($encode, $codesets)) {
				return $codesets[$encode];
			}
			return $match[1];
		}
		return 'auto';
	}
}
?>