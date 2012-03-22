<?php
//
// Created on 2006/11/19 by nao-pon http://hypweb.net/
// $Id: links.inc.php,v 1.6 2008/03/30 04:27:44 nao-pon Exp $
//

class xpwiki_plugin_links extends xpwiki_plugin {

	function plugin_links_init()
	{
	}
	
	function plugin_links_action()
	{
		//if ($this->cont['PKWK_READONLY']) $this->func->die_message('PKWK_READONLY prohibits this');
		// ���¥����å�
		if (!$this->root->userinfo['admin']) {
			return $this->action_msg_admin_only();
		}

		// ����ե�������ɤ߹���
		$this->load_language();
		
		// �������̥⡼�ɻ���
		if ($this->root->module['platform'] == "xoops") {
			$this->root->runmode = "xoops_admin";
		}
		
		$msg = $this->msg['title'];
		$body = $this->func->convert_html($this->msg['body']);

		return array('msg'=>$msg, 'body'=>$body);
	}
}
?>