<?php
class xpwiki_plugin_article extends xpwiki_plugin {
	function plugin_article_init () {


	// $Id: article.inc.php,v 1.10 2009/05/25 04:22:25 nao-pon Exp $
	// Copyright (C)
	//   2002-2005 PukiWiki Developers Team
	//   2002      Originally written by OKAWARA,Satoshi <kawara@dml.co.jp>
	//             http://www.dml.co.jp/~kawara/pukiwiki/pukiwiki.php
	//
	// article: BBS-like plugin
	
	 /*
	 ��å��������ѹ�����������LANGUAGE�ե�����˲������ͤ��ɲä��Ƥ��餴���Ѥ�������
		$_btn_name    = '��̾��';
		$_btn_article = '���������';
		$_btn_subject = '��̾: ';
	
	 ��$_btn_name��comment�ץ饰����Ǵ������ꤵ��Ƥ����礬����ޤ�
	
	 ������Ƥμ�ư�᡼��ž����ǽ�򤴻��Ѥˤʤꤿ������
	 -������ƤΥ᡼�뼫ư�ۿ�
	 -������ƤΥ᡼�뼫ư�ۿ���
	 ������ξ塢�����Ѥ���������
	
		 */
	
		$this->cont['PLUGIN_ARTICLE_COLS'] = 	70; // �ƥ����ȥ��ꥢ�Υ�����
		$this->cont['PLUGIN_ARTICLE_ROWS'] = 	 5; // �ƥ����ȥ��ꥢ�ιԿ�
		$this->cont['PLUGIN_ARTICLE_NAME_COLS'] = 	24; // ̾���ƥ����ȥ��ꥢ�Υ�����
		$this->cont['PLUGIN_ARTICLE_SUBJECT_COLS'] = 	60; // ��̾�ƥ����ȥ��ꥢ�Υ�����
		$this->cont['PLUGIN_ARTICLE_NAME_FORMAT'] = 	'[[$name]]'; // ̾���������ե����ޥå�
		$this->cont['PLUGIN_ARTICLE_SUBJECT_FORMAT'] = 	'**$subject'; // ��̾�������ե����ޥå�
	
		$this->cont['PLUGIN_ARTICLE_INS'] = 	0; // ����������� 1:����� 0:��θ�
		$this->cont['PLUGIN_ARTICLE_COMMENT'] = 	1; // �񤭹��ߤβ��˰�ԥ����Ȥ������ 1:����� 0:����ʤ�
		$this->cont['PLUGIN_ARTICLE_AUTO_BR'] = 	1; // ���Ԥ�ưŪ�Ѵ� 1:���� 0:���ʤ�
	
		$this->cont['PLUGIN_ARTICLE_MAIL_AUTO_SEND'] = 	0; // ������ƤΥ᡼�뼫ư�ۿ� 1:���� 0:���ʤ�
		$this->cont['PLUGIN_ARTICLE_MAIL_FROM'] = 	''; // ������ƤΥ᡼���������������ԥ᡼�륢�ɥ쥹
		$this->cont['PLUGIN_ARTICLE_MAIL_SUBJECT_PREFIX'] =  "[someone's PukiWiki]"; // ������ƤΥ᡼������������̾
	
	// ������ƤΥ᡼�뼫ư�ۿ���
		global $_plugin_article_mailto;
		$_plugin_article_mailto = array (
			''
);

	}
	
	function plugin_article_action()
	{
	//	global $script, $post, $vars, $cols, $rows, $now;
	//	global $_title_collided, $_msg_collided, $_title_updated;
	//	global $_plugin_article_mailto, $_no_subject, $_no_name;
	//	global $_msg_article_mail_sender, $_msg_article_mail_page;
	
		if ($this->cont['PKWK_READONLY']) $this->func->die_message('PKWK_READONLY prohibits editing');
	
		if ($this->root->post['msg'] == '')
			return array('msg'=>'','body'=>'');
	
		$name = ($this->root->post['name'] == '') ? $this->root->_no_name : $this->root->post['name'];
		$name = ($name == '') ? '' : str_replace('$name', $name, $this->cont['PLUGIN_ARTICLE_NAME_FORMAT']);
		$subject = ($this->root->post['subject'] == '') ? $this->root->_no_subject : $this->root->post['subject'];
		$subject = ($subject == '') ? '' : str_replace('$subject', $subject, $this->cont['PLUGIN_ARTICLE_SUBJECT_FORMAT']);
		$article  = $subject . "\n" . '>' . $name . ' (' . $this->root->now . ')~' . "\n" . '~' . "\n";
	
		$msg = rtrim($this->root->post['msg']);
		if ($this->cont['PLUGIN_ARTICLE_AUTO_BR']) {
			//���Ԥμ�갷���Ϥ��ä�������ä�URL�������Ȥ��ϡ�
			//�����ȹԡ������Ѥ߹Ԥˤ�~��Ĥ��ʤ��褦�� arino
			$msg = join("\n", preg_replace('/^(?!\/\/|\s|\*)(.*)$/', '$1~', explode("\n", $msg)));
		}
		$article .= $msg . "\n\n" . '//';
	
		if ($this->cont['PLUGIN_ARTICLE_COMMENT']) $article .= "\n\n" . '#comment' . "\n";
	
		$postdata = '';
		$postdata_old  = $this->func->get_source($this->root->post['refer']);
		$this->func->escape_multiline_pre($postdata_old, TRUE);
		$article_no = 0;
	
		foreach($postdata_old as $line) {
			if (! $this->cont['PLUGIN_ARTICLE_INS']) $postdata .= $line;
			if (preg_match('/^#article/i', $line)) {
				if ($article_no == $this->root->post['article_no'] && $this->root->post['msg'] != '')
					$postdata .= $article . "\n";
				++$article_no;
			}
			if ($this->cont['PLUGIN_ARTICLE_INS']) $postdata .= $line;
		}
	
		$postdata_input = $article . "\n";
		$body = '';
	
		if ($this->func->get_digests($this->func->get_source($this->root->post['refer'], TRUE, TRUE)) !== $this->root->post['digest']) {
			$title = $this->root->_title_collided;
	
			$body = $this->root->_msg_collided . "\n";
	
			$s_refer    = htmlspecialchars($this->root->post['refer']);
			$s_digest   = htmlspecialchars($this->root->post['digest']);
			$s_postdata = htmlspecialchars($postdata_input);
			$script = $this->func->get_script_uri();
			$body .= <<<EOD
<form action="{$script}?cmd=preview" method="post">
 <div>
  <input type="hidden" name="refer" value="$s_refer" />
  <input type="hidden" name="digest" value="$s_digest" />
  <textarea name="msg" rows="{$this->root->rows}" cols="{$this->root->cols}" id="textarea">$s_postdata</textarea><br />
 </div>
</form>
EOD;
	
		} else {
			$this->func->escape_multiline_pre($postdata, FALSE);
			$this->func->page_write($this->root->post['refer'], trim($postdata));
	
			// ������ƤΥ᡼�뼫ư����
			if ($this->cont['PLUGIN_ARTICLE_MAIL_AUTO_SEND']) {
				$mailaddress = implode(',', $this->root->_plugin_article_mailto);
				$mailsubject = $this->cont['PLUGIN_ARTICLE_MAIL_SUBJECT_PREFIX'] . ' ' . str_replace('**', '', $subject);
				if ($this->root->post['name'])
					$mailsubject .= '/' . $this->root->post['name'];
				$mailsubject = mb_encode_mimeheader($mailsubject);
	
				$mailbody = $this->root->post['msg'];
				$mailbody .= "\n\n" . '---' . "\n";
				$mailbody .= $this->root->_msg_article_mail_sender . $this->root->post['name'] . ' (' . $this->root->now . ')' . "\n";
				$mailbody .= $this->root->_msg_article_mail_page . $this->root->post['refer'] . "\n";
				$mailbody .= '�� URL: ' . $this->root->script . '?' . rawurlencode($this->root->post['refer']) . "\n";
				$mailbody = mb_convert_encoding($mailbody, 'JIS');
	
				$mailaddheader = 'From: ' . $this->cont['PLUGIN_ARTICLE_MAIL_FROM'];
	
				mail($mailaddress, $mailsubject, $mailbody, $mailaddheader);
			}
	
			$title = $this->root->_title_updated;
		}
		$retvars['msg'] = $title;
		$retvars['body'] = $body;
	
		$this->root->post['page'] = $this->root->post['refer'];
		$this->root->vars['page'] = $this->root->post['refer'];
	
		return $retvars;
	}
	
	function plugin_article_convert()
	{
	//	global $script, $vars, $digest;
	//	global $_btn_article, $_btn_name, $_btn_subject;
	//	static $numbers = array();
		static $numbers = array();
		if (!isset($numbers[$this->xpwiki->pid])) {$numbers[$this->xpwiki->pid] = array();}
	
		if ($this->cont['PKWK_READONLY']) return ''; // Show nothing
	
		if (! isset($numbers[$this->xpwiki->pid][$this->root->vars['page']])) $numbers[$this->xpwiki->pid][$this->root->vars['page']] = 0;
	
		$article_no = $numbers[$this->xpwiki->pid][$this->root->vars['page']]++;
	
		$s_page   = htmlspecialchars($this->root->vars['page']);
		$s_digest = htmlspecialchars($this->root->digest);
		$name_cols = $this->cont['PLUGIN_ARTICLE_NAME_COLS'];
		$subject_cols = $this->cont['PLUGIN_ARTICLE_SUBJECT_COLS'];
		$article_rows = $this->cont['PLUGIN_ARTICLE_ROWS'];
		$article_cols = $this->cont['PLUGIN_ARTICLE_COLS'];
		$script = $this->func->get_script_uri();
		$domid = $this->get_domid('msg', true);
		$emojipad = $this->func->get_emoji_pad($domid, FALSE);
		$string = <<<EOD
<form action="{$script}" method="post">
 <div>
  <input type="hidden" name="article_no" value="$article_no" />
  <input type="hidden" name="plugin" value="article" />
  <input type="hidden" name="digest" value="$s_digest" />
  <input type="hidden" name="refer" value="$s_page" />
  <label for="_p_article_name_$article_no">{$this->root->_btn_name}</label>
  <input type="text" name="name" id="_p_article_name_$article_no" size="$name_cols" value="{$this->cont['USER_NAME_REPLACE']}" /><br />
  <label for="_p_article_subject_$article_no">{$this->root->_btn_subject}</label>
  <input type="text" name="subject" rel="wikihelper" id="_p_article_subject_$article_no" size="$subject_cols" /><br />
  <textarea id="$domid" name="msg" rows="$article_rows" cols="$article_cols">\n</textarea>
  $emojipad<br />
  <input type="submit" name="article" value="{$this->root->_btn_article}" />
 </div>
</form>
EOD;
	
		return $string;
	}
}
?>