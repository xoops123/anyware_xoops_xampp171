<?php
/*
 * Created on 2008/01/24 by nao-pon http://hypweb.net/
 * $Id: user_pref.lng.php,v 1.3 2010/06/23 08:02:52 nao-pon Exp $
 */

$msg = array(
	'title_form' => '�桼��������',
	'title_done' => '�桼�������괰λ',
	'btn_submit' => '���������Ŭ�Ѥ���',
	'msg_done' => '�ʲ������Ƥ���¸���ޤ�����',
	'title_description' => '�桼�������������',
	'msg_description' => '<p>���Υ桼��������Ǥϡ��桼����������ꤹ�뤳�Ȥ��Ǥ��ޤ���</p>',

	'Yes' => '�Ϥ�',
	'No' => '������',

	'twitter_access_token' => array(
		'caption'     => 'Twitter������������',
		'description' => '���ʤ���Twitter��������Ȥ�Ϣ�Ȥ��뤿��Υ�������������<br />' .
				'Ϣ�Ȥ�������ˤ� Twitter �Υ����Ȥ�Ϣ�ȥ��ץ��Ϣ�Ȳ���򤷤Ƥ��餳�Υڡ������ɽ�����������Ŭ�ѥܥ���פ򥯥�å����Ƥ���������',
	),

	'twitter_access_token_secret' => array(
		'caption'     => 'Twitter����������̩����',
		'description' => '<a href="{$root->twitter_request_link}">���������������������ˤϤ����򥯥�å�����Twitter�Υ����ȤعԤ����Ĥ��Ƥ���������</a>' .
				'���ĸ�ˤ��Υڡ�������ä���������Ŭ�ѥܥ���פ򥯥�å����Ƥ���������',
	),

	'amazon_associate_tag' => array(
		'caption'     => 'Amazon ������������ ID',
		'description' => '������������ ID ����Ͽ����ȡ����ʤ������������ڡ����ǤΥ��ޥ���ϥץ饰����ˤ��� ID �����Ѥ���ޤ���',
	),

	'moblog_mail_address' => array(
		'caption'     => '��֥��᡼�륢�ɥ쥹',
		'description' => '��֥���Ƥ˻��Ѥ��뤢�ʤ��Υ᡼�륢�ɥ쥹����Ͽ���ޤ���<br />��֥���������ϡ�<a href="mailto:{$root->moblog_pop_mail}">{$root->moblog_pop_mail}</a>�פǤ���',
	),

	'moblog_base_page' => array(
		'caption'     => '��֥��ڡ���',
		'description' => '��֥���Ƥ���¸����١����ڡ���̾����Ͽ������֥���Ƥ�ͭ���ˤ��ޤ���<br />{$root->moblog_page_recomend}',
	),

	'moblog_user_mail' => array(
		'caption'     => '��֥�������᡼�륢�ɥ쥹',
		'description' => '<img src="http://chart.apis.google.com/chart?chs=100x100&cht=qr&chl={$root->moblog_user_mail_rawurlenc}" width="100" height="100" alt="{$root->moblog_user_mail}" align="left" />���ʤ����ѤΥ�֥�������᡼�륢�ɥ쥹�ϡ�<a href="mailto:{$root->moblog_user_mail}">{$root->moblog_user_mail}</a>�פǤ���<br />' .
				'���Υ᡼�륢�ɥ쥹�����������줿��硢�������˴ؤ�餺���ʤ��������ƤȤ��ư����ޤ��Τǡ�¾�ͤ��Τ��뤳�ȤΤʤ��褦�˽�ʬ����դ��Ƥ���������<br />' .
				'���Υ᡼�륢�ɥ쥹���ѹ����������ϡ��֥�֥��ڡ����פ��ö���ˤ�����Ͽ����ȡ��������᡼�륢�ɥ쥹�ˤʤ�ޤ���',
	),

	'moblog_auth_code' => array(
		'caption'     => '��֥�ǧ�ڥ�����[����](Ǥ��)',
		'description' => '��֥�ǧ�ڥ����ɤ����ꤹ��ȡ��᡼����̾����Ƭ�ˡ�*ǧ�ڥ����ɡפ��ʤ��᡼����˴�����ޤ���<br />' .
				'��: ǧ�ڥ����ɤ��1234�פȤ�����硢�᡼����̾���*1234 ��ƥ����ȥ�פȤ��롣* �ȿ��ͤδ֤˶��������ƤϤ����ޤ���',
	),

	'moblog_to_twitter' => array(
		'caption'     => '��֥���Ƥ� Twitter �����Τ���',
		'description' => '�ڡ���̾�������ȥ�ȥ֥��ؤΥ�󥯤򤢤ʤ��� Twitter ��������Ȥǥĥ����Ȥ��ޤ���',
	),

	'xmlrpc_pages' => array(
		'caption'     => 'XML-RPC �Υ֥��ڡ���',
		'description' => 'MetaWeblog API �򥵥ݡ��Ȥ��� XML-RPC ���饤����Ȥ��б������ӥ������Ѥ���֥��ڡ��������ꤷ�ޤ���<br />' .
				'�Զ��ڤ��ʣ�����ꤹ�뤳�Ȥ��Ǥ��ޤ���<br />' .
				'XML-RPC API �Υ���ɥݥ���Ȥϡ�<a href="{$root->script}{$root->xmlrpc_endpoint}" target="_blank"> {$root->script}{$root->xmlrpc_endpoint} </a>�פˤʤ�ޤ���',
	),

	'xmlrpc_auth_key' => array(
		'caption'     => 'XML-RPCǧ�ڥ���(�ѥ����)',
		'description' => 'XML-RPC ���饤����Ȥ��б������ӥ������ꤹ��ѥ���ɤǤ���<br />' .
				'Ǥ�դ��ͤ��ѹ���ǽ�Ǥ�����Ⱦ�ѱѿ�ʸ���Τߤ����ꤷ�Ƥ���������',
	),

	'xmlrpc_to_twitter' => array(
		'caption'     => 'XML-RPC��Ƥ� Twitter �����Τ���',
		'description' => '�ڡ���̾�������ȥ�ȥ֥��ؤΥ�󥯤򤢤ʤ��� Twitter ��������Ȥǥĥ����Ȥ��ޤ���',
	),

);
?>