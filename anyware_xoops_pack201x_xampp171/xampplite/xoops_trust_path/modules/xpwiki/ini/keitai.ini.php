<?php
// PukiWiki - Yet another WikiWikiWeb clone.
// $Id: keitai.ini.php,v 1.27 2011/06/01 06:27:51 nao-pon Exp $
// Copyright (C)
//   2002-2005 PukiWiki Developers Team
//   2001-2002 Originally written by yu-ji
// License: GPL v2 or (at your option) any later version
//
// PukiWiki setting file (Cell phones, PDAs and other thin clients)

/////////////////////////////////////////////////
// Over write
// page cache
$root->pagecache_min = 0;
// symbol_anchor
$root->_symbol_anchor = '_';

/////////////////////////////////////////////////
// ���ӡ�PDA���ѤΥڡ��������ڡ����Ȥ��ƻ��ꤹ��

// $root->defaultpage = 'm';

/////////////////////////////////////////////////
// ������ե�����ξ��
$const['SKIN_FILE'] = $const['DATA_HOME'] . $const['SKIN_DIR'] . 'keitai.skin.php';
$const['SKIN_CHANGER'] = 0;

/////////////////////////////////////////////////
// Output filter 'SJIS', 'UTF-8' or 'pass'
$root->keitai_output_filter = 'SJIS';

/////////////////////////////////////////////////
// Ajax edit
$root->use_ajax_edit = 0;

/////////////////////////////////////////////////
// �����Ȥ���ڡ������ɤ߹��ߤ��ǽ�ˤ���
$root->load_template_func = 0;

/////////////////////////////////////////////////
// �Խ��ե�����ξܺ٥��ץ������ޤꤿ����
$root->hide_extra_option_editform = 0;

/////////////////////////////////////////////////
// �Խ��ե������ź�եե�����ꥹ�Ȥ�ɽ������
$root->show_attachlist_editform = 0;

/////////////////////////////////////////////////
// ����ʸ�����ʬ������
$root->search_word_color = 0;

/////////////////////////////////////////////////
// �����ڡ�����Ƭʸ������ǥå�����Ĥ���
$root->list_index = 0;

/////////////////////////////////////////////////
// �ꥹ�ȹ�¤�κ��ޡ�����
$root->_ul_left_margin =  0;	// �ꥹ�ȤȲ��̺�ü�Ȥδֳ�(px)
$root->_ul_margin      = 16;	// �ꥹ�Ȥγ��ش֤δֳ�(px)
$root->_ol_left_margin =  0;	// �ꥹ�ȤȲ��̺�ü�Ȥδֳ�(px)
$root->_ol_margin      = 16;	// �ꥹ�Ȥγ��ش֤δֳ�(px)
$root->_dl_left_margin =  0;	// �ꥹ�ȤȲ��̺�ü�Ȥδֳ�(px)
$root->_dl_margin      = 16;	// �ꥹ�Ȥγ��ش֤δֳ�(px)
$root->_list_pad_str   = '';

/////////////////////////////////////////////////
// �硦�����Ф������ܼ�������󥯤�ʸ��
$root->top = $root->_msg_content_back_to_top;

/////////////////////////////////////////////////
// ź�եե�����ΰ�������ɽ������ (��ô��������ޤ�)
// ��keitai������ˤϤ��ΰ�����ɽ�����뵡ǽ������ޤ���
$root->attach_link = 0;

/////////////////////////////////////////////////
// ��Ϣ����ڡ����Υ�󥯰�������ɽ������(��ô��������ޤ�)
// ��keitai������ˤϤ��ΰ�����ɽ�����뵡ǽ������ޤ���
$root->related_link = 0;
// ����ɽ�����
$root->related_show_max = 100;

// ��󥯰����ζ��ڤ�ʸ��
// ����Ʊ
$root->related_str = "\n ";

// (#related�ץ饰����ɽ������) ��󥯰����ζ��ڤ�ʸ��
$root->rule_related_str = "</li>\n<li>";

/////////////////////////////////////////////////
// ��ʿ���Υ���
$root->hr = '<hr>';

// �ڡ�����̾��������
$root->alias_form = 'textarea|class="norich" style="width:100%;height:2.5em;" cols="22" rows="2"';

/////////////////////////////////////////////////
// ����ǽ��Ϣ

// ����Υ��󥫡�����������ʸ�κ���Ĺ
$const['PKWK_FOOTNOTE_TITLE_MAX'] = 0; // Characters

// ����Υ��󥫡������Хѥ���ɽ������ (0 = ���Хѥ�)
//  * ���Хѥ��ξ�硢�����ΥС�������Opera������ˤʤ뤳�Ȥ�����ޤ�
//  * ���Хѥ��ξ�硢calendar_viewer�ʤɤ�����ˤʤ뤳�Ȥ�����ޤ�
// (�ܤ�����: BugTrack/698)
$const['PKWK_ALLOW_RELATIVE_FOOTNOTE_ANCHOR'] = 1;

// ʸ��������ľ����ɽ�����륿��
$root->note_hr = '<hr>';

/////////////////////////////////////////////////
// WikiName,BracketName�˷в���֤��ղä���
$root->show_passage = 0;

/////////////////////////////////////////////////
// ���ɽ���򥳥�ѥ��Ȥˤ���
// * �ڡ������Ф���ϥ��ѡ���󥯤��饿���ȥ�򳰤�
// * Dangling link��CSS�򳰤�
$root->link_compact = 1;

/////////////////////////////////////////////////
// Attributes "alt"" & "title" of <img> by plugin "ref"
// Can set "title", "name", "size", "exif" join by ","
// Please set "$this->cont['PLUGIN_REF_GET_EXIF'] = TRUE;" in "plugin_ref_init()" if you use "exif".
$root->ref_img_alt = '';
$root->ref_img_title = '';

/////////////////////////////////////////////////
// �ե������ޡ�����ʸ�����Ѵ����� (��i-mode, Vodafone, EzWeb�ʤɷ������ø���)
$root->usefacemark = 1;
// �ɲ�(XOOPS)�Υե������ޡ�������Ѥ���
$root->use_extra_facemark = 1;

/////////////////////////////////////////////////
// Ĺ���ѿ�ʸ�����ɽ����˹�碌�Ʋ��Ԥ�������
// Setting to which long character string is set
// to display region and it changes line.

// Insert to after '/' of pagename.
$root->hierarchy_insert = '';

// Long word break limit
$root->word_break_limit = 0;
// WordBeark ('&#8203;' or '<wbr>' or '' etc.)
$root->word_breaker = '';

/////////////////////////////////////////////////
// accesskey (SKIN�ǻ���)
$root->accesskey = 'accesskey';

/////////////////////////////////////////////////
// $script��û��
if (preg_match('#([^/]+)$#', $root->script, $matches)) {
	$root->script = $matches[1];
}

/////////////////////////////////////////////////
// �֥饦��Ĵ�����Υǥե������

// max_size (SKIN�ǻ���)
$root->max_size = 5;	// SKIN�ǻ���, KByte

// cols: �ƥ����ȥ��ꥢ�Υ����� rows: �Կ�
$root->cols = 22; $root->rows = 5;	// i_mode

// ref �ǤΥ��᡼���������κ���px
$root->keitai_display_width = 240;
$root->keitai_img_px = 200;
$root->keitai_imageTwiceDisplayWidth = 0;
if (strtolower($root->keitai_output_filter) !== 'pass' && HypCommonFunc::get_version() >= '20090611') {
	HypCommonFunc::loadClass('HypKTaiRender');
	$ktairender =& HypKTaiRender::getSingleton();
	if (! empty($ktairender->vars['ua']['width'])) {
		$root->keitai_display_width = $ktairender->vars['ua']['width'];
		$root->keitai_imageTwiceDisplayWidth = $ktairender->Config_imageTwiceDisplayWidth;
	}
}

/////////////////////////////////////////////////
// �֥饦���˹�碌��Ĵ��

$root->ua_name  = $user_agent['name'];
$root->ua_vers  = $user_agent['vers'];
$root->ua_agent = $user_agent['agent'];
$root->matches  = array();

// Browser-name only
switch ($root->ua_name) {

	// NetFront / Compact NetFront
	//   DoCoMo Net For MOBILE: ��⡼���б�HTML�ιͤ���: �桼�������������
	//   http://www.nttdocomo.co.jp/mc-user/i/tag/imodetag.html
	//   DDI POCKET: ����饤��ʥå�: AirH"PHONE�ѥۡ���ڡ����κ�����ˡ
	//   http://www.ddipocket.co.jp/p_s/products/airh_phone/homepage.html
	case 'NetFront':
	case 'CNF':
	case 'DoCoMo':
	case 'DDIPOCKET':
	case 'WILLCOM': // Performing CNF compatible
		if (preg_match('#\b[cC]([0-9]+)\b#', $root->ua_agent, $matches)) {
			$root->max_size = intval($matches[1] / 2);	// Cache max size
		}
		$root->cols = 22; $root->rows = 5;	// i_mode
		break;

	// Vodafone (ex. J-PHONE)
	// �ܡ����ե���饤�֡����������֥���ƥ�ĳ�ȯ������ [������] (Version 1.2.0 P13)
	// http://www.dp.j-phone.com/dp/tool_dl/download.php?docid=110
	// ���ѻ���: �桼��������������ȤˤĤ���
	// http://www.dp.j-phone.com/dp/tool_dl/web/useragent.php
	case 'J-PHONE':
		$matches = array("");
		preg_match('/^([0-9]+)\./', $user_agent['vers'], $matches);
		switch($matches[1]){
		case '3': $root->max_size =   6; break; // C type: lt 6000bytes
		case '4': $root->max_size =  12; break; // P type: lt  12Kbytes
		case '5': $root->max_size =  40; break; // W type: lt  48Kbytes
		}
		$root->cols = 24; $root->rows = 20;
		// �����ֹ�κ��
		$root->ua = preg_replace('#/SN[^ ]+#', '[SerialNumber]', $root->ua);
		break;

	case 'Vodafone':
	case 'SoftBank':
		$matches = array("");
		preg_match('/^([0-9]+)\./', $user_agent['vers'], $matches);
		switch($matches[1]){
		case '1': $root->max_size = 40; break;
		}
		$root->cols = 24; $root->rows = 20;
		// �����ֹ�κ��
		$root->ua = preg_replace('#/SN[^ ]+#', '[SerialNumber]', $root->ua);
		break;

	// UP.Browser
	case 'UP.Browser':
		// UP.Browser for KDDI cell phones
		// http://www.au.kddi.com/ezfactory/tec/spec/xhtml.html ('About 9KB max')
		// http://www.au.kddi.com/ezfactory/tec/spec/4_4.html (User-agent strings)
		if (preg_match('#^KDDI#', $root->ua_agent)) $root->max_size =  9;
		break;
}

// Browser-name + version
switch ($root->ua_name.'/'.$root->ua_vers) {
	// Restriction For imode:
	//  http://www.nttdocomo.co.jp/mc-user/i/tag/s2.html
	//case 'DoCoMo/2.0':	$root->max_size = min($root->max_size, 30); break;
}


/////////////////////////////////////////////////
// �桼������롼��
//
//  ����ɽ���ǵ��Ҥ��Ƥ���������?(){}-*./+\$^|�ʤ�
//  �� \? �Τ褦�˥������Ȥ��Ƥ���������
//  �����ɬ�� / ��ޤ�Ƥ�����������Ƭ����� ^ ��Ƭ�ˡ�
//  ��������� $ ����ˡ�

// �桼������롼��(����С��Ȼ����ִ�)
$root->line_rules = array(
	'COLOR\(([^\(\)]*)\){([^}]*)}'	=> '<font color="$1">$2</font>',
	'SIZE\(([^\(\)]*)\){([^}]*)}'	=> '$2',	// Disabled
	'COLOR\(([^\(\)]*)\):((?:(?!COLOR\([^\)]+\)\:).)*)'	=> '<font color="$1">$2</font>',
	'SIZE\(([^\(\)]*)\):((?:(?!SIZE\([^\)]+\)\:).)*)'	=> '$2', // Disabled
	'%%%(?!%)((?:(?!%%%).)*)%%%'	=> '<ins>$1</ins>',
	'%%(?!%)((?:(?!%%).)*)%%'	=> '<del>$1</del>',
	"'''(?!')((?:(?!''').)*)'''"	=> '<em>$1</em>',
	"''(?!')((?:(?!'').)*)''"	=> '<strong>$1</strong>',
);


/////////////////////////////////////////////////
// �������äˤ��碌���ե������ޡ���

// $usefacemark = 1�ʤ�ե������ޡ������ִ�����ޤ�
// ʸ�����' XD'�ʤɤ����ä�����facemark���ִ�����Ƥ��ޤ����ᡢ
// ɬ�פΤʤ����� $usefacemark��0�ˤ��Ƥ���������

// Browser-name only
$root->facemark_rules = array();
switch ($root->ua_name) {

    // Graphic icons for imode HTML 4.0, with Shift-JIS text output
    // http://www.nttdocomo.co.jp/mc-user/i/tag/emoji/e1.html
    // http://www.nttdocomo.co.jp/mc-user/i/tag/emoji/list.html
    case 'DoCoMo':
	case 'DDIPOCKET':
	case 'WILLCOM':

	$root->facemark_rules = array(
	// Face marks
	'\s(\:\))'	=>	'&#xE6F0;',	// smile
	'\s(\:D)'	=>	'&#xE6F0;',	// bigsmile
	'\s(\:p)'	=>	'&#xE728;',	// huh
	'\s(\:d)'	=>	'&#xE728;',	// huh
	'\s(XD)'	=>	'&#xE6F2;',	// oh
	'\s(X\()'	=>	'&#xE6F2;',	// oh
	'\s(;\))'	=>	'&#xE729;',	// wink
	'\s(;\()'	=>	'&#xE6F1;',	// sad
	'\s(\:\()'	=>	'&#xE6F1;',	// sad
	'&amp;(smile);'	=>	'&#xE6F0;',
	'&amp;(bigsmile);'=>	'&#xE6F0;',
	'&amp;(huh);'	=>	'&#xE728;',
	'&amp;(oh);'	=>	'&#xE6F25;',
	'&amp;(wink);'	=>	'&#xE729;',
	'&amp;(sad);'	=>	'&#xE6F3;',
	'&amp;(heart);'	=>	'&#xE6EC;',
	'&amp;(worried);'=>	'&#xE722;',

	// Face marks, Japanese style
	'\s(\(\^\^\))'	=>	'&#xE6F0;',	// smile
	'\s(\(\^-\^)'	=>	'&#xE6F0;',	// smile
	'\s(\(\.\.;)'	=>	'&#xE6F2;',	// oh
	'\s(\(\^_-\))'	=>	'&#xE729;',	// wink
	'\s(\(--;)'		=>	'&#xE6F2;',	// sad
	'\s(\(\^\^;\))'	=>	'&#xE722;',	// worried
	'\s(\(\^\^;)'	=>	'&#xE722;',	// worried

	// Push buttons, 0-9 and sharp
	'&amp;(pb1);'	=>	'&#xE6E2;',
	'&amp;(pb2);'	=>	'&#xE6E3;',
	'&amp;(pb3);'	=>	'&#xE6E4;',
	'&amp;(pb4);'	=>	'&#xE6E5;',
	'&amp;(pb5);'	=>	'&#xE6E6;',
	'&amp;(pb6);'	=>	'&#xE6E7;',
	'&amp;(pb7);'	=>	'&#xE6E8;',
	'&amp;(pb8);'	=>	'&#xE6E9;',
	'&amp;(pb9);'	=>	'&#xE6EA;',
	'&amp;(pb0);'	=>	'&#xE6EB;',
	'&amp;(pb#);'	=>	'&#xE6E0;',

	// Others
	'&amp;(zzz);'	=>	'&#xE701;',
	'&amp;(man);'	=>	'&#xE6B1;',
	'&amp;(clock);'	=>	'&#xE6BA;',
	'&amp;(mail);'	=>	'&#xE6D3;',
	'&amp;(mailto);'=>	'&#xE6CF;',
	'&amp;(phone);'	=>	'&#xE687;',
	'&amp;(phoneto);'=>	'&#xE6CE;',
	'&amp;(faxto);'	=>	'&#xE6D0;',
	);
	break;

    // Graphic icons for Vodafone (ex. J-PHONE) cell phones
    // http://www.dp.j-phone.com/dp/tool_dl/web/picword_top.php
    case 'J-PHONE':
    case 'Vodafone':
    case 'SoftBank':

	$root->facemark_rules = array(
	// Face marks
	'\s(\:\))'	=>	chr(27).'$Gv'.chr(15),	// '&#57430;',	// smile
	'\s(\:D)'	=>	chr(27).'$Gv'.chr(15),	// '&#57430;',	// bigsmile => smile
	'\s(\:p)'	=>	chr(27).'$E%'.chr(15),	// '&#57605;',	// huh
	'\s(\:d)'	=>	chr(27).'$E%'.chr(15),	// '&#57605;',	// huh
	'\s(XD)'	=>	chr(27).'$Gx'.chr(15),	// '&#57432;',	// oh
	'\s(X\()'	=>	chr(27).'$Gx'.chr(15),	// '&#57432;',	// oh
	'\s(;\))'	=>	chr(27).'$E&'.chr(15),	// '&#57606;',	// wink����ʤ����ɤ�(^^; (���ܤ��ϡ���)
	'\s(;\()'	=>	chr(27).'$E&'.chr(15),	// '&#57606;',	// sad
	'\s(\:\()'	=>	chr(27).'$Gy'.chr(15),	// '&#57433;',	// sad
	'&amp;(smile);'	=>	chr(27).'$Gv'.chr(15),	// '&#57430;',
	'&amp;(bigsmile);'=>	chr(27).'$Gw'.chr(15),	// '&#57431;',
	'&amp;(huh);'	=>	chr(27).'$E%'.chr(15),	// '&#57605;',
	'&amp;(oh);'	=>	chr(27).'$Gx'.chr(15),	// '&#57432;',
	'&amp;(wink);'	=>	chr(27).'$E&'.chr(15),	// '&#57606;',	// wink����ʤ����ɤ�(^^; (���ܤ��ϡ���)
	'&amp;(sad);'	=>	chr(27).'$Gy'.chr(15),	// '&#57433;',
	'&amp;(heart);'	=>	chr(27).'$GB'.chr(15),	// '&#57378;',
	'&amp;(worried);'=>	chr(27).'$E('.chr(15),	// '&#57608;',

	// Face marks, Japanese style
	'\s(\(\^\^\))'	=>	chr(27).'$Gv'.chr(15),	// smile
	'\s(\(\^-\^)'	=>	chr(27).'$Gv'.chr(15),	// smile
	'\s(\(\.\.;)'	=>	chr(27).'$Gx'.chr(15),	// oh
	'\s(\(\^_-\))'	=>	chr(27).'$E&'.chr(15),	// wink����ʤ����ɤ�(^^; (���ܤ��ϡ���)
	'\s(\(--;)'	=>	chr(27).'$E&'.chr(15),	// sad
	'\s(\(\^\^;\))'	=>	chr(27).'$E('.chr(15),	// worried
	'\s(\(\^\^;)'	=>	chr(27).'$E('.chr(15),	// worried

	// Push buttons, 0-9 and sharp
	'&amp;(pb1);'	=>	chr(27).'$F<'.chr(15),	// '&#57884;',
	'&amp;(pb2);'	=>	chr(27).'$F='.chr(15),	// '&#57885;',
	'&amp;(pb3);'	=>	chr(27).'$F>'.chr(15),	// '&#57886;',
	'&amp;(pb4);'	=>	chr(27).'$F?'.chr(15),	// '&#57887;',
	'&amp;(pb5);'	=>	chr(27).'$F@'.chr(15),	// '&#57888;',
	'&amp;(pb6);'	=>	chr(27).'$FA'.chr(15),	// '&#57889;',
	'&amp;(pb7);'	=>	chr(27).'$FB'.chr(15),	// '&#57890;',
	'&amp;(pb8);'	=>	chr(27).'$FC'.chr(15),	// '&#57891;',
	'&amp;(pb9);'	=>	chr(27).'$FD'.chr(15),	// '&#57892;',
	'&amp;(pb0);'	=>	chr(27).'$FE'.chr(15),	// '&#57893;',
	'&amp;(pb#);'	=>	chr(27).'$F0'.chr(15),	// '&#63877;',

	// Others
	'&amp;(zzz);'	=>	chr(27).'$E\\'.chr(15),
	'&amp;(man);'	=>	chr(27).'$G!'.chr(15),
	'&amp;(clock);'	=>	chr(27).'$GF'.chr(15),	// '&#xE026;',
	'&amp;(mail);'	=>	chr(27).'$Fv'.chr(15),
	'&amp;(mailto);'=>	chr(27).'$E#'.chr(15),
	'&amp;(phone);'	=>	chr(27).'$G)'.chr(15),
	'&amp;(phoneto);'=>	chr(27).'$E$'.chr(15),
	'&amp;(faxto);'	=>	chr(27).'$G+'.chr(15),
	);
	break;

    case 'UP.Browser':

	// UP.Browser for KDDI cell phones' built-in icons
	// http://www.au.kddi.com/ezfactory/tec/spec/3.html
	if (preg_match('#^KDDI#', $root->ua_agent)) {
	$root->facemark_rules = array(
	// Face marks
	'\s(\:\))'	=>	'<img localsrc="68">',	// smile
	'\s(\:D)'	=>	'<img localsrc="257">',	// bigsmile
	'\s(\:p)'	=>	'<img localsrc="264">',	// huh
	'\s(\:d)'	=>	'<img localsrc="264">',	// huh
	'\s(XD)'	=>	'<img localsrc="260">',	// oh
	'\s(X\()'	=>	'<img localsrc="260">',	// oh
	'\s(;\))'	=>	'<img localsrc="348">',	// wink
	'\s(;\()'	=>	'<img localsrc="259">',	// sad
	'\s(\:\()'	=>	'<img localsrc="259">',	// sad
	'&amp;(smile);'	=>	'<img localsrc="68">',
	'&amp;(bigsmile);'=>	'<img localsrc="257">',
	'&amp;(huh);'	=>	'<img localsrc="264">',
	'&amp;(oh);'	=>	'<img localsrc="260">',
	'&amp;(wink);'	=>	'<img localsrc="348">',
	'&amp;(sad);'	=>	'<img localsrc="259">',
	'&amp;(heart);'	=>	'<img localsrc="415">',
	'&amp;(worried);'=>	'<img localsrc="351">',

	// Face marks, Japanese style
	'\s(\(\^\^\))'	=>	'<img localsrc="68">',	// smile
	'\s(\(\^-\^)'	=>	'<img localsrc="68">',	// smile
	'\s(\(\.\.;)'	=>	'<img localsrc="260">',	// oh
	'\s(\(\^_-\))'	=>	'<img localsrc="348">',	// wink
	'\s(\(--;)'	=>	'<img localsrc="259">',	// sad
	'\s(\(\^\^;\))'	=>	'<img localsrc="351">',	// worried
	'\s(\(\^\^;)'	=>	'<img localsrc="351">',	// worried

	// Push buttons, 0-9 and sharp
	'&amp;(pb1);'	=>	'<img localsrc="180">',
	'&amp;(pb2);'	=>	'<img localsrc="181">',
	'&amp;(pb3);'	=>	'<img localsrc="182">',
	'&amp;(pb4);'	=>	'<img localsrc="183">',
	'&amp;(pb5);'	=>	'<img localsrc="184">',
	'&amp;(pb6);'	=>	'<img localsrc="185">',
	'&amp;(pb7);'	=>	'<img localsrc="186">',
	'&amp;(pb8);'	=>	'<img localsrc="187">',
	'&amp;(pb9);'	=>	'<img localsrc="188">',
	'&amp;(pb0);'	=>	'<img localsrc="325">',
	'&amp;(pb#);'	=>	'<img localsrc="818">',

	// Others
	'&amp;(zzz);'	=>	'<img localsrc="261">',
	'&amp;(man);'	=>	'<img localsrc="80">',	// Face of male
	'&amp;(clock);'	=>	'<img localsrc="46">',
	'&amp;(mail);'	=>	'<img localsrc="108">',
	'&amp;(mailto);'=>	'<img localsrc="784">',
	'&amp;(phone);'	=>	'<img localsrc="85">',
	'&amp;(phoneto);'=>	'<img localsrc="155">',	// An ear receiver
	'&amp;(faxto);'	=>	'<img localsrc="166">',	// A FAX
	);
	}
	break;

}

if (XC_CLASS_EXISTS('HypCommonPreLoad')) {
	$dummy = NULL;
	$hyp_preload = new HypCommonPreLoad($dummy);
	$root->k_tai_conf = $hyp_preload->k_tai_conf;

	// Reset each site values.
	foreach (array_keys($root->k_tai_conf) as $key) {
		if (strpos($key, '#') === FALSE) {
			$sitekey = $key . '#' . XOOPS_URL;
			if (isset($root->k_tai_conf[$sitekey])) {
				$root->k_tai_conf[$key] = $root->k_tai_conf[$sitekey];
			}
		}
	}

	mb_convert_variables($const['SOURCE_ENCODING'], $hyp_preload->configEncoding, $root->k_tai_conf['msg']);
} else {
	// ����饤�󥤥᡼����ɽ������ۥ���̾(��������)
	$root->k_tai_conf['showImgHosts'] = array('amazon.com', 'yimg.jp', 'yimg.com', 'ad.jp.ap.valuecommerce.com', 'ad.jp.ap.valuecommerce.com', 'ba.afl.rakuten.co.jp', 'assoc-amazon.jp', 'ad.linksynergy.com');

	// ������쥯�ȥ�����ץȤ��ͳ���ʤ��ۥ���̾(��������)
	$root->k_tai_conf['directLinkHosts'] = array('amazon.co.jp', 'ck.jp.ap.valuecommerce.com');

	// Google Adsense ����
	$root->k_tai_conf['googleAdsense']['config'] = $const['TRUST_PATH'] . 'class/hyp_common/ktairender/adsenseConf.php';
	$root->k_tai_conf['googleAdsense']['below'] = 'header';

	// Google Analytics ����
	$root->k_tai_conf['googleAnalyticsId'] = '';

	// ������쥯�ȥ�����ץ�
	$root->k_tai_conf['redirect'] = $this->cont['HOME_URL'] . 'gate.php?way=redirect_SJIS&amp;xmode=2&amp;l=';

}

?>