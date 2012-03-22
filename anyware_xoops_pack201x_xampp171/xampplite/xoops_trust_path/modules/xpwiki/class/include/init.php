<?php
//
// Created on 2006/10/13 by nao-pon http://hypweb.net/
// $Id: init.php,v 1.79 2012/01/14 11:56:34 nao-pon Exp $
//

$root = & $this->root;
$const = & $this->cont;

$const['S_VERSION'] = $root->module['version'];
$const['S_COPYRIGHT'] =
	'<strong>xpWiki ' . $const['S_VERSION'] . '</strong>' .
	' Copyright ' .
	$root->module['credits'] .
	' License is GPL.<br />' .
	' Based on "PukiWiki" 1.4.8_alpha';

/////////////////////////////////////////////////
// �������($WikiName,$BracketName�ʤ�)
// BugTrack/304�����н�
$root->WikiName = '(?:[A-Z][a-z]+){2,}(?![a-zA-Z0-9_])';

// $BracketName = ':?[^\s\]#&<>":]+:?';
$root->BracketName = '(?!\s):?[^\r\n\t\f\[\]<>#&":]+:?(?<!\s)';

// InterWiki
$root->InterWikiName = '(\[\[)?((?:(?!\s|:|\]\]).)+):(.+)(?(1)\]\])';

// ���
$root->NotePattern = '/\(\(((?:(?>(?:(?!\(\()(?!\)\)(?:[^\)]|$)).)+)|(?R))*)\)\)/ex';

/////////////////////////////////////////////////
// Time settings
$const['LOCALZONE'] = date('Z');
$const['UTC']       = time();
$const['UTIME']     = $const['UTC'] - $const['LOCALZONE'];
$const['MUTIME']    = $this->getmicrotime();

// Set default skin directory
if (substr($const['SKIN_NAME'],0,3) === "tD-") {
	// tDiary's theme
	$const['TDIARY_THEME'] =  substr($const['SKIN_NAME'],3);
} else {
	// Normal skin
	$const['SKIN_DIR'] = 'skin/' . $const['SKIN_NAME'] . '/';
}

// Compat
$root->anonymous = $root->_no_name = $root->siteinfo['anonymous'];

// ���������桼�����ξ����ɤ߹���
$this->set_userinfo();

// cookie �ѥ桼���������ɼ��� & cookie�ɤ߽�
$this->load_usercookie();

/////////////////////////////////////////////////
// Language / Encoding settings

// LANG - Internal content language ('en', 'ja', or ...)
$const['LANG'] = $this->get_lang('en');

// Internal content encoding = Output content charset (for skin)
$const['CONTENT_CHARSET'] = $this->get_content_charset();

// Internal content encoding (for mbstring extension)
$const['SOURCE_ENCODING'] = $const['CONTENT_CHARSET'];

// Is this site UTF-8?
$const['FILE_ENCORD_EXT'] = ($const['CONTENT_CHARSET'] === 'UTF-8')? '_utf8' : '';

// Locale
if (empty($const['LC_CTYPE'])) $const['LC_CTYPE'] = $this->get_LC_CTYPE();

/////////////////////////////////////////////////
// INI_FILE: Require Lang Conf

$_lang = $root->mytrustdirpath.'/language/xpwiki/' . $const['LANG'] . $const['FILE_ENCORD_EXT'] . '/' . 'conf.php';
// None
if (! is_file($_lang)) {
	$_lang = $root->mytrustdirpath.'/language/xpwiki/en/conf.php';
	$const['LANG'] = 'en';
}
require($_lang);

/////////////////////////////////////////////////
// INI_FILE: Encode Hint & Accept lang

$_lang = $root->mytrustdirpath.'/language/xpwiki/Conf_' . strtoupper($const['CONTENT_CHARSET']) . '.php';
// none
if (! is_file($_lang)) {
	$_lang = $root->mytrustdirpath.'/language/xpwiki/Conf_ISO-8859-1.php';
}
require($_lang);

// UI_LANG - Content encoding for buttons, menus,  etc
$const['UI_LANG'] = $this->get_accept_language();

/////////////////////////////////////////////////
// INI_FILE: Require UI Lang file
$const['OFFICIAL_LANGS'] = array('ja', 'ja_utf8', 'en');

$_uilang = $const['UI_LANG'] . $const['FILE_ENCORD_EXT'];

if (! in_array($_uilang, $const['OFFICIAL_LANGS'])) {
	// Load base language file.
	require($root->mytrustdirpath.'/language/xpwiki/en/lng.php');
}

$_lang = $root->mytrustdirpath.'/language/xpwiki/' . $const['UI_LANG'] . $const['FILE_ENCORD_EXT'] . '/' . 'lng.php';
if (is_file($_lang)) {
	require($_lang);
} else {
	$_uilang = 'en';
}

// It overwrites if it is on the HTML side.
$_lang = $const['DATA_HOME'] . 'language/xpwiki/' . $_uilang . '/' . 'lng.php';
if (is_file($_lang)) {
	require($_lang);
}

/////////////////////////////////////////////////
// mbstring setting

mb_language($const['MB_LANGUAGE']);
mb_internal_encoding($const['SOURCE_ENCODING']);
ini_set('mbstring.http_input', 'pass');
mb_http_output('pass');
mb_detect_order($const['DETECT_ORDER']);
mb_substitute_character(0x003F);

/////////////////////////////////////////////////
// LANG_FILE: Init encoding hint

$const['PKWK_ENCODING_HINT'] = isset($_LANG['encode_hint']) ? $_LANG['encode_hint'] : '';

/////////////////////////////////////////////////
// LANG_FILE: Init severn days of the week

$root->weeklabels = $root->_msg_week;

/////////////////////////////////////////////////
// INI_FILE: Init $script

$root->script = $const['HOME_URL'];

// INI_FILE: image_pack_name
if ($root->image_pack_name) {
	$const['IMAGE_DIR'] .= trim($root->image_pack_name, '/') . '/';
}

/////////////////////////////////////////////////
// INI_FILE: $agents:  UserAgent�μ���

$root->ua = empty($_SERVER['HTTP_USER_AGENT'])? '' : $_SERVER['HTTP_USER_AGENT'];

$user_agent = $matches = array();

$user_agent['agent'] = $root->ua;

foreach ($root->agents as $agent) {
	if (preg_match($agent['pattern'], $user_agent['agent'], $matches)) {
		$user_agent['profile'] = isset($agent['profile']) ? $agent['profile'] : '';
		$user_agent['name']    = isset($matches[1]) ? $matches[1] : '';	// device or browser name
		$user_agent['vers']    = isset($matches[2]) ? $matches[2] : ''; // 's version
		break;
	}
}

// Profile-related init and setting
$const['UA_PROFILE'] = isset($user_agent['profile']) ? $user_agent['profile'] : '';
$const['UA_INI_FILE'] = $const['DATA_HOME'] .'private/ini/'. $const['UA_PROFILE'] . '.ini.php';
if (! is_readable($const['UA_INI_FILE']) && $const['UA_PROFILE'] !== 'default') {
	$const['UA_INI_FILE'] = $const['DATA_HOME'] .'private/ini/default.ini.php';
}
if (! is_readable($const['UA_INI_FILE'])) {
	$this->die_message('UA_INI_FILE for "' . $const['UA_PROFILE'] . '" not found.');
} else {
	require($const['UA_INI_FILE']); // Also manually
}

$const['UA_NAME'] = isset($user_agent['name']) ? $user_agent['name'] : '';
$const['UA_VERS'] = isset($user_agent['vers']) ? $user_agent['vers'] : '';
unset($user_agent);	// Unset after reading UA_INI_FILE

/////////////////////////////////////////////////
// �������(����¾�Υ����Х��ѿ�)

// ���߻���
$root->now = $this->format_date($const['UTIME']);

// ���λ��ȥѥ����󤪤�ӥ����ƥ�ǻ��Ѥ���ѥ������$line_rules�˲ä���
//$entity_pattern = '[a-zA-Z0-9]{2,8}';
$root->entity_pattern = trim(file_get_contents($const['CACHE_DIR'] . $const['PKWK_ENTITIES_REGEX_CACHE']));

// User page
$root->user_pages = explode('#', $const['PKWK_CONFIG_PREFIX'] . $const['PKWK_CONFIG_USER'] . ($root->users_page? ('#' . $root->users_page) : ''));

if (empty($root->fckediting)) {
	$root->line_rules = array_merge(array(
		'&amp;(#[0-9]+|#x[0-9a-f]+|' . $root->entity_pattern . ');' => '&$1;',
		"\r"          => '<br />' . "\n",	/* �����˥�����ϲ��� */
		'#related$'   => '<del>#related</del>',
		'^#contents$' => '<del>#contents</del>'
	), $root->line_rules);
}

// description ��Ф�̵�뤹��ץ饰����
$root->description_ignore_inlines = explode(',', $root->description_discovery_ignores_inline);
$root->description_ignore_blocks = explode(',', $root->description_discovery_ignores_block);


// ����ڡ���ɽ���⡼��
if (isset($const['page_show'])) {

	$root->get['cmd']  = $root->post['cmd']  = $root->vars['cmd']  = 'read';
	if ($const['page_show'] === '#RenderMode') {
		$root->render_mode = 'render';
	}

	unset($root->get['plugin'], $root->post['plugin'], $root->vars['plugin']);

	$root->get['page'] = $root->post['page'] = $root->vars['page'] = $const['page_show'];
	$const['page_show'] = TRUE;

} else {
	// Check etc. only admin.
	if ($root->userinfo['admin']) {
		// Database check
		$query = 'SELECT count(*) FROM ' . $this->xpwiki->db->prefix($root->mydirname.'_cache') ;
		if(! $this->xpwiki->db->query($query)) {
			$title = 'Please update this module on admin panel.';
			if (defined('XOOPS_CUBE_LEGACY')) {
				$this->redirect_header(XOOPS_URL . '/modules/legacy/admin/index.php?action=ModuleUpdate&dirname=' . $root->mydirname, 1, $title);
			} else if (defined('XOOPS_URL')) {
				$this->redirect_header(XOOPS_URL . '/modules/system/admin.php?fct=modulesadmin&op=update&module=' . $root->mydirname, 1, $title);
			} else {
				exit($title);
			}
		}

		/////////////////////////////////////////////////
		// �ǥ��쥯�ȥ�Υ����å�

		$die = '';
		foreach(array($const['DATA_DIR'], $const['DIFF_DIR'], $const['BACKUP_DIR'], $const['CACHE_DIR']) as $dir){
			if (! is_writable($dir))
				$die .= 'Directory is not found or not writable (' . $dir . ')' . "\n";
		}

		if (! $root->can_not_connect_www && HypCommonFunc::get_version() >= '20080213') {
			$dir = $const['TRUST_PATH'] . 'class/hyp_common/favicon/cache';
			if (! is_writable($dir))
				$die .= 'Directory is not found or not writable (' . $dir . ')' . "\n";

		}

		// ����ե�������ѿ������å�
		$temp = '';
		foreach(array('rss_max', 'note_hr', 'related_link', 'show_passage',
			'rule_related_str', 'load_template_func') as $var){
			if (! isset($root->{$var})) $temp .= '$' . $var . "\n";
		}
		if ($temp) {
			if ($die) $die .= "\n";	// A breath
			$die .= 'Variable(s) not found: (Maybe the old *.ini.php?)' . "\n" . $temp;
		}

		$temp = '';
		foreach(array($const['LANG'], $const['PLUGIN_DIR']) as $def){
			if (! isset($def)) $temp .= $def . "\n";
		}
		if ($temp) {
			if ($die) $die .= "\n";	// A breath
			$die .= 'Define(s) not found: (Maybe the old *.ini.php?)' . "\n" . $temp;
		}

		// page aliases (case-insensitive data)
		if ($root->page_aliases && ! $root->page_aliases_i) {
			$this->save_page_alias();
		}

		if($die) $this->die_message(nl2br("\n\n" . $die));
		unset($die, $temp);

		/////////////////////////////////////////////////
		// ɬ�ܤΥڡ�����¸�ߤ��ʤ���С����Υե�������������
		foreach(array($root->defaultpage, $root->whatsnew, $root->interwiki) as $page){
			if (! $this->is_page($page)) $this->pkwk_touch_file($this->get_filename($page));
		}

	}

	/////////////////////////////////////////////////
	// �������餯���ѿ��Υ����å�

	// Prohibit $root->get attack
	foreach (array('msg', 'pass') as $key) {
		if (isset($root->get[$key])) $this->die_message('Sorry, already reserved: ' . $key . '=');
	}

	// Remove null character etc.
	$root->get    = $this->input_filter($root->get);
	$root->post   = $this->input_filter($root->post);
	$root->cookie = $this->input_filter($root->cookie);

	if ($root->post && ! defined('HYP_POST_ENCODING')) {
		// ʸ���������Ѵ� ($root->post)
		// <form> ���������줿ʸ�� (�֥饦�������󥳡��ɤ����ǡ���) �Υ����ɤ��Ѵ�
		// POST method �Ͼ�� form ��ͳ�ʤΤǡ�ɬ���Ѵ�����
		//
		if (! empty($root->post['encode_hint'])) {
			// do_plugin_xxx() ����ǡ�<form> �� encode_hint ��Ź���Ǥ���Τǡ�
			// encode_hint ���Ѥ��ƥ����ɸ��Ф��롣
			// ���Τ򸫤ƥ����ɸ��Ф���ȡ������¸ʸ���䡢̯�ʥХ��ʥ�
			// �����ɤ������������ˡ������ɸ��Ф˼��Ԥ��붲�줬���롣
			$encode = mb_detect_encoding($root->post['encode_hint']);
			if (strtoupper($const['SOURCE_ENCODING']) !== strtoupper($encode)) {
				$this->encode_numericentity($root->post, $const['SOURCE_ENCODING'], $encode);
			}
			mb_convert_variables($const['SOURCE_ENCODING'], $encode, $root->post);
		} else if (! empty($root->post['charset'])) {
			// TrackBack Ping �ǻ��ꤵ��Ƥ��뤳�Ȥ�����
			// ���ޤ������ʤ����ϼ�ư���Ф��ڤ��ؤ�
			$_dum = $root->post;
			if (mb_convert_variables($const['SOURCE_ENCODING'], $root->post['charset'], $_dum) === $root->post['charset']
			    && strtoupper($const['SOURCE_ENCODING']) !== strtoupper($root->post['charset'])) {
				$this->encode_numericentity($root->post, $const['SOURCE_ENCODING'], $root->post['charset']);
			}
			if (mb_convert_variables($const['SOURCE_ENCODING'],
			    $root->post['charset'], $root->post) !== $root->post['charset']) {
				mb_convert_variables($const['SOURCE_ENCODING'], 'auto', $root->post);
			}
		} else {
			// �����ޤȤ�ơ���ư���С��Ѵ�
			mb_convert_variables($const['SOURCE_ENCODING'], 'auto', $root->post);
		}
	}

	// ʸ���������Ѵ� ($root->get)
	// GET method �� form ����ξ��ȡ�<a href="http://script/?key=value> �ξ�礬����
	// <a href...> �ξ��ϡ������С��� rawurlencode ���Ƥ���Τǡ��������Ѵ�������
	if (! defined('HYP_GET_ENCODING') && isset($root->get['encode_hint']) && $root->get['encode_hint'] !== '')
	{
		// form ��ͳ�ξ��ϡ��֥饦�������󥳡��ɤ��Ƥ���Τǡ������ɸ��С��Ѵ���ɬ�ס�
		// encode_hint ���ޤޤ�Ƥ���Ϥ��ʤΤǡ�����򸫤ơ������ɸ��Ф����塢�Ѵ����롣
		// ��ͳ�ϡ�post ��Ʊ��
		$encode = mb_detect_encoding($root->get['encode_hint']);
		mb_convert_variables($const['SOURCE_ENCODING'], $encode, $root->get);
	}

	/////////////////////////////////////////////////
	// QUERY_STRING�����
	$arg = '';
	if (isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] !== '') {
		$arg = $_SERVER['QUERY_STRING'];
	} else if (isset($_SERVER['argv']) && $_SERVER['argv']) {
		$arg = $_SERVER['argv'][0];
	}
	if ($const['PKWK_QUERY_STRING_MAX'] && strlen($arg) > $const['PKWK_QUERY_STRING_MAX']) {
		// Something nasty attack?
		$this->pkwk_common_headers();
		sleep(1);	// Fake processing, and/or process other threads
		echo('Query string too long');
		exit;
	}
	$arg = $this->input_filter($arg); // \0 ����

	// URI �� urlencode ���������Ϥ��������н褹��
	if ($root->accept_not_encoded_query) {
		// mb_convert_variables�ΥХ�(?)�к�: ������Ϥ��ʤ��������
		$arg = array($arg);
		mb_convert_variables($const['SOURCE_ENCODING'], 'auto', $arg);
		$arg = $arg[0];
		// QUERY_STRING��ʬ�򤷤ƥ������Ѵ�����$root->get �˾��
		$matches = array();
		foreach (explode('&', $arg) as $key_and_value) {
			if (preg_match('/^([^=]+)=(.+)/', $key_and_value, $matches) &&
			    mb_detect_encoding($matches[2]) != 'ASCII') {
				$root->get[$matches[1]] = $matches[2];
			}
		}
		unset($matches);
	}

	// pgid �ǤΥ�������
	if (!empty($root->get['pgid'])) {
		$page = $this->get_name_by_pgid((int)$root->get['pgid']);
		if ($page !== '') {
			if (isset($root->get['rd'])) {
				if (! headers_sent()) {
					header('HTTP/1.1 301 Moved Permanently');
					header('Status: 301 Moved Permanently');
				}
				$this->send_location('', '', $this->get_page_uri($page, TRUE, 'default'));
			}
			if (!isset($root->get['page'])) $root->get['page'] = $page;
			if (!isset($root->get['cmd']) && !isset($root->get['plugin'])) {
				$root->get['cmd'] = 'read';
				if ($root->static_url === 1) {
					$_SERVER['QUERY_STRING'] = preg_replace('/&?pgid='.$root->get['pgid'].'/', '', $_SERVER['QUERY_STRING']);
				}
			}
		} else {
			header("HTTP/1.0 404 Not Found");
			$arg = '';
		}
	}

	// GET + POST = $root->vars
	if (empty($root->post)) {
		$root->vars = $root->get;  // Major pattern: Read-only access via GET
	} else if (empty($root->get)) {
		$root->vars = $root->post; // Minor pattern: Write access via POST etc.
	} else {
		$root->vars = array_merge($root->get, $root->post); // Considered reliable than $_REQUEST
	}

	// ���ϥ����å�: cmd, plugin ��ʸ����ϱѿ����ʳ����ꤨ�ʤ�
	foreach(array('cmd', 'plugin') as $var) {
		if (isset($root->vars[$var]) && ! preg_match('/^[a-zA-Z][a-zA-Z0-9_]*$/', $root->vars[$var]))
			unset($root->get[$var], $root->post[$var], $root->vars[$var]);
	}

	// ����: page, strip_bracket()
	if (isset($root->vars['page'])) {
		$root->vars['page'] = strval($root->vars['page']);
		$root->get['page'] = $root->post['page'] = $root->vars['page']  = $this->strip_bracket($root->vars['page']);
	} else {
		$root->get['page'] = $root->post['page'] = $root->vars['page'] = '';
	}

	// ����: msg, ���Ԥ������
	if (isset($root->vars['msg'])) {
		$root->get['msg'] = $root->post['msg'] = $root->vars['msg'] = str_replace("\r", '', $root->vars['msg']);
	}

	// �����ߴ��� (?md5=...)
	if (isset($root->vars['md5']) && $root->vars['md5'] != '') {
		$root->get['cmd'] = $root->post['cmd'] = $root->vars['cmd'] = 'md5';
	}

	// TrackBack Ping
	if (isset($root->vars['tb_id']) && $root->vars['tb_id'] != '') {
		$root->get['cmd'] = $root->post['cmd'] = $root->vars['cmd'] = 'tb';
	}

	// Special view mode
	if (!empty($root->vars['ajax'])) {
		$root->viewmode = 'ajax';
		$arg = preg_replace('/[&?]ajax=?[^&]*/', '', $arg);
	} else if (!empty($root->vars['popup'])) {
		$root->viewmode = 'popup';
		$arg = preg_replace('/[&?]popup=?[^&]*/', '', $arg);
	} else if (!empty($root->vars['print'])) {
		$root->viewmode = 'print';
		$arg = preg_replace('/[&?]print=?[^&]*/', '', $arg);
	} else {
		$root->viewmode = 'normal';
	}

	// cmd��plugin����ꤵ��Ƥ��ʤ����ϡ�QUERY_STRING��ڡ���̾��InterWikiName�Ǥ���Ȥߤʤ�
	if (! isset($root->vars['cmd']) && ! isset($root->vars['plugin'])) {

		$root->get['cmd']  = $root->post['cmd']  = $root->vars['cmd']  = 'read';

		if (isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] !== '') {
			$arg = trim($_SERVER['PATH_INFO'], '/');
			// ! defined('PROTECTOR_VERSION') = (Protector < 3.33)
			if (! defined('PROTECTOR_VERSION') && defined('PROTECTOR_PRECHECK_INCLUDED')) {
				$arg = str_replace('%27', '\'', $arg);
			}
		} else {
			// Remove any "[key]=[val]"
			$arg = preg_replace('/(?:^|&)[^&=]+=[^&]*/i', '', $arg);
			// "&" �ʹߤ���
			$arg = preg_replace('/&.*$/', '', $arg);

			$arg = rawurldecode($arg);
		}

		if ($arg === '') {
			$arg = $root->defaultpage;
		} else if ($root->url_encode_utf8 && $const['SOURCE_ENCODING'] !== 'UTF-8') {
			if (! $this->is_pagename($arg) || ! $this->get_pgid_by_name($arg)) {
				$arg = mb_convert_encoding($arg, $const['SOURCE_ENCODING'], 'UTF-8');
			}
		}

		$arg = $this->strip_bracket($arg);
		$arg = $this->input_filter($arg);

		$root->get['page'] = $root->post['page'] = $root->vars['page'] = $arg;
	}

	// RecentChanges is a cmd in xpWiki
	if ($root->vars['page'] === $root->whatsnew){
		$root->get['cmd'] = $root->post['cmd'] = $root->vars['cmd'] = 'recentchanges';
		$root->get['page'] = $root->post['page'] = $root->vars['page'] = '';
	}

	// $_GET['pgid'] �򥻥å�
	if ($root->vars['page'] !== '' && $root->render_mode === 'main') {
		if (empty($_GET['pgid'])) {
			$_GET['pgid'] = $root->get['pgid'] = $this->get_pgid_by_name($root->vars['page']);
		}
		list($_GET['pgid1'], $_GET['pgid2']) = $this->get_pgids_by_name($root->vars['page']);
	}

	// ���ϥ����å�: 'cmd=' prohibits nasty 'plugin='
	if (isset($root->vars['cmd']) && isset($root->vars['plugin']))
		unset($root->get['plugin'], $root->post['plugin'], $root->vars['plugin']);

	if (! isset($root->vars['cmd'])) {
		$root->get['cmd'] = $root->post['cmd'] = $root->vars['cmd'] = '';
	}

	// dbsync ��ɬ���������å� (���Ƴ����)
	if ($root->userinfo['admin'] && $root->vars['cmd'] === 'read') {
		$query = 'SELECT `pgid` FROM ' . $this->xpwiki->db->prefix($root->mydirname.'_pginfo') . ' LIMIT 1' ;
		if (! $this->xpwiki->db->getRowsNum($this->xpwiki->db->query($query))) {
			$this->redirect_header($root->script . '?cmd=dbsync', 0, 'Welcome to xpWiki Database Sync.');
		}
	}

}

// Set displayed page name.
$const['PageForRef'] = $const['PAGENAME'] = '';
if (isset($root->vars['page']) && $root->vars['page'] !== '') {
	$const['PageForRef'] = $const['PAGENAME'] = $root->vars['page'];
	if ($const['PAGENAME'] !== $root->notepage && strpos($const['PAGENAME'], $root->notepage . '/') === 0) {
		$const['PageForRef'] = substr($const['PAGENAME'], strlen($root->notepage) + 1);
	}
}

/////////////////////////////////////////////////
// �������(�桼������롼���ɤ߹���)

require($const['DATA_HOME'] . 'private/ini/rules.ini.php');

if ($root->use_root_image_manager) {
	$root->rules_extentions .= ',bbcode_image';
}
$root->rules_extentions = trim($root->rules_extentions, ',');
if ($root->rules_extentions) {
	foreach(explode(',', $root->rules_extentions) as $_rules_extention) {
		$_rules_extention = trim($_rules_extention);
		$_rules_extention = $root->mytrustdirpath . '/class/include/' . $_rules_extention . '.php';
		if (is_file($_rules_extention)) {
			require($_rules_extention);
		} else {
			die('[TrustPath]/class/include/' . basename($_rules_extention) . ' was not found.');
		}
	}
}
