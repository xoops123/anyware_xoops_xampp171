<?php
// PukiWiki - Yet another WikiWikiWeb clone.
// $Id: default.ini.php,v 1.13 2011/06/01 06:27:51 nao-pon Exp $
// Copyright (C)
//   2003-2005 PukiWiki Developers Team
//   2001-2002 Originally written by yu-ji
// License: GPL v2 or (at your option) any later version
//
// PukiWiki setting file (user agent:default)

/////////////////////////////////////////////////
// Skin file

if (!empty($const['TDIARY_THEME'])) {
	$const['SKIN_FILE'] = $const['DATA_HOME'] . $const['TDIARY_DIR'] . 'tdiary.skin.php';
} else {
	$const['SKIN_FILE'] = $const['DATA_HOME'] . $const['SKIN_DIR'] . 'pukiwiki.skin.php';
}

/////////////////////////////////////////////////
// Ajax edit
$root->use_ajax_edit = 1;

/////////////////////////////////////////////////
// �����Ȥ���ڡ������ɤ߹��ߤ��ǽ�ˤ���
$root->load_template_func = 0;

/////////////////////////////////////////////////
// �Խ��ե�����ξܺ٥��ץ������ޤꤿ����
$root->hide_extra_option_editform = 1;

/////////////////////////////////////////////////
// �Խ��ե������ź�եե�����ꥹ�Ȥ�ɽ������
$root->show_attachlist_editform = 1;

/////////////////////////////////////////////////
// ����ʸ�����ʬ������
$root->search_word_color = 1;

/////////////////////////////////////////////////
// �����ڡ�����Ƭʸ������ǥå�����Ĥ���
$root->list_index = 1;

/////////////////////////////////////////////////
// �ꥹ�ȹ�¤�κ��ޡ�����
$root->_ul_left_margin = 0;   // �ꥹ�ȤȲ��̺�ü�Ȥδֳ�(px)
$root->_ul_margin = 16;       // �ꥹ�Ȥγ��ش֤δֳ�(px)
$root->_ol_left_margin = 0;   // �ꥹ�ȤȲ��̺�ü�Ȥδֳ�(px)
$root->_ol_margin = 16;       // �ꥹ�Ȥγ��ش֤δֳ�(px)
$root->_dl_left_margin = 0;   // �ꥹ�ȤȲ��̺�ü�Ȥδֳ�(px)
$root->_dl_margin = 16;        // �ꥹ�Ȥγ��ش֤δֳ�(px)
//$root->_list_pad_str = ' class="list%d" style="padding-left:%dpx;margin-left:%dpx"';
$root->_list_pad_str = ' class="list%d"';

/////////////////////////////////////////////////
// �ƥ����ȥ��ꥢ�Υ�����
$root->cols = 80;

/////////////////////////////////////////////////
// �ƥ����ȥ��ꥢ�ιԿ�
$root->rows = 20;

/////////////////////////////////////////////////
// �硦�����Ф������ܼ�������󥯤�ʸ��
$root->top = $root->_msg_content_back_to_top;

/////////////////////////////////////////////////
// ź�եե�����ΰ�������ɽ������ (��ô��������ޤ�)
$root->attach_link = 1;

/////////////////////////////////////////////////
// ��Ϣ����ڡ����Υ�󥯰�������ɽ������(��ô��������ޤ�)
$root->related_link = 1;
// ����ɽ�����
$root->related_show_max = 100;

// ��󥯰����ζ��ڤ�ʸ��
$root->related_str = "\n ";

// (#related�ץ饰����ɽ������) ��󥯰����ζ��ڤ�ʸ��
$root->rule_related_str = "</li>\n<li>";

/////////////////////////////////////////////////
// ��ʿ���Υ���
$root->hr = '<hr class="full_hr" />';

// �ڡ�����̾��������
$root->alias_form = 'textarea|class="norich" style="width:40em;height:2.5em;" cols="40" rows="2" rel="nowikihelper"';

/////////////////////////////////////////////////
// ����ǽ��Ϣ

// ����Υ��󥫡�����������ʸ�κ���Ĺ
$const['PKWK_FOOTNOTE_TITLE_MAX'] = 40; // Characters

// ����Υ��󥫡������Хѥ���ɽ������ (0 = ���Хѥ�)
//  * ���Хѥ��ξ�硢�����ΥС�������Opera������ˤʤ뤳�Ȥ�����ޤ�
//  * ���Хѥ��ξ�硢calendar_viewer�ʤɤ�����ˤʤ뤳�Ȥ�����ޤ�
// (�ܤ�����: BugTrack/698)
$const['PKWK_ALLOW_RELATIVE_FOOTNOTE_ANCHOR'] = 1;

// ʸ���ε����ľ����ɽ�����륿��
$root->note_hr = '<hr class="note_hr" />';

/////////////////////////////////////////////////
// WikiName,BracketName�˷в���֤��ղä���
$root->show_passage = 1;

/////////////////////////////////////////////////
// ���ɽ���򥳥�ѥ��Ȥˤ���
// * �ڡ������Ф���ϥ��ѡ���󥯤��饿���ȥ�򳰤�
// * Dangling link��CSS�򳰤�
$root->link_compact = 0;

/////////////////////////////////////////////////
// Attributes "alt"" & "title" of <img> by plugin "ref"
// Can set "title", "name", "size", "exif" join by ","
// Please set "$this->cont['PLUGIN_REF_GET_EXIF'] = TRUE;" in "plugin_ref_init()" if you use "exif".
$root->ref_img_alt = 'title,name';
$root->ref_img_title = 'title,name,size';

/////////////////////////////////////////////////
// �ե������ޡ�������Ѥ���
$root->usefacemark = 1;
// �ɲ�(XOOPS)�Υե������ޡ�������Ѥ���
$root->use_extra_facemark = 1;

/////////////////////////////////////////////////
// ��˥塼�С���ɽ������
$root->show_menu_bar = 0;

/////////////////////////////////////////////////
// Ĺ���ѿ�ʸ�����ɽ����˹�碌�Ʋ��Ԥ�������
// Setting to which long character string is set
// to display region and it changes line.

// Insert to after '/' of pagename.
$root->hierarchy_insert = '&#8203;';

// Long word break limit
$root->word_break_limit = 0;

// WordBeark ('&#8203;' or '<wbr>' or '' etc.)
$root->word_breaker = '&#8203;';

/////////////////////////////////////////////////
// �桼������롼��
//
//  ����ɽ���ǵ��Ҥ��Ƥ���������?(){}-*./+\$^|�ʤ�
//  �� \? �Τ褦�˥������Ȥ��Ƥ���������
//  �����ɬ�� / ��ޤ�Ƥ�����������Ƭ����� ^ ��Ƭ�ˡ�
//  ��������� $ ����ˡ�
//
/////////////////////////////////////////////////
// �桼������롼��(����С��Ȼ����ִ�)
$root->line_rules = array(
	'COLOR\(([^\(\)]*)\){([^}]*)}'	=> '<span style="color:$1">$2</span>',
	'SIZE\(([^\(\)]*)\){([^}]*)}'	=> '<span style="font-size:$1px">$2</span>',
	'COLOR\(([^\(\)]*)\):((?:(?!COLOR\([^\)]+\)\:).)*)'	=> '<span style="color:$1">$2</span>',
	'SIZE\(([^\(\)]*)\):((?:(?!SIZE\([^\)]+\)\:).)*)'	=> '<span class="size$1">$2</span>',
	'%%%(?!%)((?:(?!%%%).)*)%%%'	=> '<ins>$1</ins>',
	'%%(?!%)((?:(?!%%).)*)%%'	=> '<del>$1</del>',
	"'''(?!')((?:(?!''').)*)'''"	=> '<em>$1</em>',
	"''(?!')((?:(?!'').)*)''"	=> '<strong>$1</strong>',
);

/////////////////////////////////////////////////
// �ե������ޡ�������롼��(����С��Ȼ����ִ�)

// $usefacemark = 1�ʤ�ե������ޡ������ִ�����ޤ�
// ʸ�����XD�ʤɤ����ä�����facemark���ִ�����Ƥ��ޤ��Τ�
// ɬ�פΤʤ����� $usefacemark��0�ˤ��Ƥ���������

$root->facemark_rules = array(
	// Face marks
	'\s(\:\))'	=> ' <img alt="$1" src="' . $const['IMAGE_DIR'] . 'face/smile.png" />',
	'\s(\:D)'	=> ' <img alt="$1" src="' . $const['IMAGE_DIR'] . 'face/bigsmile.png" />',
	'\s(\:p)'	=> ' <img alt="$1" src="' . $const['IMAGE_DIR'] . 'face/huh.png" />',
	'\s(\:d)'	=> ' <img alt="$1" src="' . $const['IMAGE_DIR'] . 'face/huh.png" />',
	'\s(XD)'	=> ' <img alt="$1" src="' . $const['IMAGE_DIR'] . 'face/oh.png" />',
	'\s(X\()'	=> ' <img alt="$1" src="' . $const['IMAGE_DIR'] . 'face/oh.png" />',
	'\s(;\))'	=> ' <img alt="$1" src="' . $const['IMAGE_DIR'] . 'face/wink.png" />',
	'\s(;\()'	=> ' <img alt="$1" src="' . $const['IMAGE_DIR'] . 'face/sad.png" />',
	'\s(\:\()'	=> ' <img alt="$1" src="' . $const['IMAGE_DIR'] . 'face/sad.png" />',
	'&amp;(smile);'	=> ' <img alt="[$1]" src="' . $const['IMAGE_DIR'] . 'face/smile.png" />',
	'&amp;(bigsmile);'=>' <img alt="[$1]" src="' . $const['IMAGE_DIR'] . 'face/bigsmile.png" />',
	'&amp;(huh);'	=> ' <img alt="[$1]" src="' . $const['IMAGE_DIR'] . 'face/huh.png" />',
	'&amp;(oh);'	=> ' <img alt="[$1]" src="' . $const['IMAGE_DIR'] . 'face/oh.png" />',
	'&amp;(wink);'	=> ' <img alt="[$1]" src="' . $const['IMAGE_DIR'] . 'face/wink.png" />',
	'&amp;(sad);'	=> ' <img alt="[$1]" src="' . $const['IMAGE_DIR'] . 'face/sad.png" />',
	'&amp;(heart);'	=> ' <img alt="[$1]" src="' . $const['IMAGE_DIR'] . 'face/heart.png" />',
	'&amp;(worried);'=>' <img alt="[$1]" src="' . $const['IMAGE_DIR'] . 'face/worried.png" />',

	// Face marks, Japanese style
	'\s(\(\^\^\))'	=> ' <img alt="$1" src="' . $const['IMAGE_DIR'] . 'face/smile.png" />',
	'\s(\(\^-\^)'	=> ' <img alt="$1" src="' . $const['IMAGE_DIR'] . 'face/bigsmile.png" />',
	'\s(\(\.\.;)'	=> ' <img alt="$1" src="' . $const['IMAGE_DIR'] . 'face/oh.png" />',
	'\s(\(\^_-\))'	=> ' <img alt="$1" src="' . $const['IMAGE_DIR'] . 'face/wink.png" />',
	'\s(\(--;)'	=> ' <img alt="$1" src="' . $const['IMAGE_DIR'] . 'face/sad.png" />',
	'\s(\(\^\^;\))'	=> ' <img alt="$1" src="' . $const['IMAGE_DIR'] . 'face/worried.png" />',
	'\s(\(\^\^;)'	=> ' <img alt="$1" src="' . $const['IMAGE_DIR'] . 'face/worried.png" />',

	// Push buttons, 0-9 and sharp (Compatibility with cell phones)
	'&amp;(pb1);'	=> '[1]',
	'&amp;(pb2);'	=> '[2]',
	'&amp;(pb3);'	=> '[3]',
	'&amp;(pb4);'	=> '[4]',
	'&amp;(pb5);'	=> '[5]',
	'&amp;(pb6);'	=> '[6]',
	'&amp;(pb7);'	=> '[7]',
	'&amp;(pb8);'	=> '[8]',
	'&amp;(pb9);'	=> '[9]',
	'&amp;(pb0);'	=> '[0]',
	'&amp;(pb#);'	=> '[#]',

	// Other icons (Compatibility with cell phones)
	'&amp;(zzz);'	=> '[zzz]',
	'&amp;(man);'	=> '[man]',
	'&amp;(clock);'	=> '[clock]',
	'&amp;(mail);'	=> '[mail]',
	'&amp;(mailto);'=> '[mailto]',
	'&amp;(phone);'	=> '[phone]',
	'&amp;(phoneto);'=>'[phoneto]',
	'&amp;(faxto);'	=> '[faxto]',
);

$root->wikihelper_facemarks = array(
	':)'	=> $const['IMAGE_DIR'] . 'face/smile.png',
	':D'	=> $const['IMAGE_DIR'] . 'face/bigsmile.png',
	':p'	=> $const['IMAGE_DIR'] . 'face/huh.png',
	'XD'	=> $const['IMAGE_DIR'] . 'face/oh.png',
	';)'	=> $const['IMAGE_DIR'] . 'face/wink.png',
	';('	=> $const['IMAGE_DIR'] . 'face/sad.png',
	'&worried;'=> $const['IMAGE_DIR'] . 'face/worried.png',
	'&heart;'	=> $const['IMAGE_DIR'] . 'face/heart.png',
);
?>