<?php
/**
 *�����������ե�����
 */

$switchHash['#'] = $this->cont['PLUGIN_CODE_BLOCK_START'];  // ʣ���԰����б�
$switchHash['}'] = $this->cont['PLUGIN_CODE_BLOCK_END'];
$switchHash['&'] = $this->cont['PLUGIN_CODE_SPECIAL_IDENTIFIRE'];  // & ����Ϥޤ�ͽ��줢��
$switchHash['*'] = $this->cont['PLUGIN_CODE_IDENTIFIRE_CHAR'];  // ���Ф�
$switchHash[','] = $this->cont['PLUGIN_CODE_IDENTIFIRE_CHAR'];  // ɽ
$switchHash['|'] = $this->cont['PLUGIN_CODE_IDENTIFIRE_CHAR'];  // ɽ
$switchHash[' '] = $this->cont['PLUGIN_CODE_IDENTIFIRE_WORD'];  // �����ѽ���
$switchHash['-'] = $this->cont['PLUGIN_CODE_MULTILINE'];        // �վ��
$switchHash['+'] = $this->cont['PLUGIN_CODE_MULTILINE'];        // �վ��
$switchHash[':'] = $this->cont['PLUGIN_CODE_MULTILINE'];        // �վ��
$switchHash['<'] = $this->cont['PLUGIN_CODE_MULTILINE'];        // ����
$switchHash['>'] = $this->cont['PLUGIN_CODE_MULTILINE'];        // ����
// ʣ���Ԥν�ü����
$multilineEOL = Array(
'#','*',',','|',' ','-','+',':','>','<','/',"\n");
// ����Τߤι��к�
$code_identifire = array(
	 ' ' => Array(
		  " \n",
		 ),
	 );



$capital = 1;                        // ͽ������ʸ����ʸ������̤��ʤ�

// ���������
$switchHash['/'] = $this->cont['PLUGIN_CODE_HEADW_COMMENT'];        //  �����Ȥ� ��Ƭ�� // ������Ԥޤ�
$commentpattern = '//';

// �����ȥ饤��
if($mkoutline){
	// $switchHash['{'] = $this->cont['PLUGIN_CODE_BLOCK_START'];
  $switchHash['}'] = $this->cont['PLUGIN_CODE_BLOCK_END'];
}


$code_css = Array(
  'operator',		// ���ڥ졼���ؿ�
  'identifier',	// ����¾�μ��̻�
  'pragma',		// module, import �� pragma
  'system',		// �������Ȥ߹��ߤ��� __stdcall �Ȥ�
  'header',       // ���Ф�
  'table',        // ɽ
  'list',         // �վ��
  'pre',          // �����ѽ���
  'quote',        // ����
  );

$code_keyword = Array(
'#xpwikiver' => 2,
'#xoopsblock' => 2,
'#xoopsadmin' => 2,
'#webthumbnail' => 2,
'#vote' => 2,
'#versionlist' => 2,
'#version' => 2,
'#urlbookmark' => 2,
'#tracker_list' => 2,
'#tracker' => 2,
'#topicpath' => 2,
'#test' => 2,
'#tdiary' => 2,
'#tag' => 2,
'#stationary' => 2,
'#skin_changer' => 2,
'#siteimage' => 2,
'#showrss' => 2,
'#setlinebreak' => 2,
'#server' => 2,
'#search' => 2,
'#renderattach' => 2,
'#related' => 2,
'#region' => 2,
'#ref' => 2,
'#recent' => 2,
'#random' => 2,
'#pre' => 2,
'#popular' => 2,
'#pluginlist' => 2,
'#ping' => 2,
'#pcomment' => 2,
'#paint' => 2,
'#page_aliases' => 2,
'#online' => 2,
'#norelated' => 2,
'#nopagecomment' => 2,
'#noheader' => 2,
'#nofollow' => 2,
'#noattach' => 2,
'#nicovideo' => 2,
'#newpage' => 2,
'#netvideos' => 2,
'#navi' => 2,
'#menu' => 2,
'#memo' => 2,
'#lsx' => 2,
'#ls' => 2,
'#lookup' => 2,
'#keyword' => 2,
'#jsmath' => 2,
'#isbn' => 2,
'#insert' => 2,
'#includesubmenu' => 2,
'#include' => 2,
'#img' => 2,
'#iframe' => 2,
'#hr' => 2,
'#fusen' => 2,
'#freeze' => 2,
'#exifshowcase' => 2,
'#endregion' => 2,
'#dbsync' => 2,
'#counter' => 2,
'#contents' => 2,
'#comment' => 2,
'#code' => 2,
'#clear' => 2,
'#capture' => 2,
'#calendar_viewer' => 2,
'#calendar_read' => 2,
'#calendar_edit' => 2,
'#calendar' => 2,
'#bugtrack_list' => 2,
'#bugtrack' => 2,
'#br' => 2,
'#block' => 2,
'#back' => 2,
'#aws' => 2,
'#autolink' => 2,
'#attach' => 2,
'#article' => 2,
'#areaedit' => 2,
'#aname' => 2,
'#amazon' => 2,
'#ajaxtree' => 2,

'&xpwikiver' => 2,
'&webthumbnail' => 2,
'&version' => 2,
'&topicpath' => 2,
'&test' => 2,
'&tag' => 2,
'&stationary' => 2,
'&skin_changer' => 2,
'&size' => 2,
'&siteimage' => 2,
'&ruby' => 2,
'&rsslink' => 2,
'&ref' => 2,
'&pagepopup' => 2,
'&online' => 2,
'&nicovideo' => 2,
'&new' => 2,
'&netvideos' => 2,
'&lastmod' => 2,
'&isbn' => 2,
'&iframe' => 2,
'&font' => 2,
'&exifshowcase' => 2,
'&edit' => 2,
'&counter' => 2,
'&color' => 2,
'&br' => 2,
'&areaedit' => 2,
'&aname' => 2,
'&amazon' => 2,

 '*' => 5,     // ���Ф�
 ',' => 6,     // ɽ
 '|' => 6,     // ɽ
 '-' => 7,     // �վ��
 '+' => 7,     // �վ��
 ':' => 7,     // �վ��
 ' ' => 8,     // �����ѽ���
 " \n" => 0,   // �ϥ��饤��̵��
 '<' => 9,     // ����
 '>' => 9,     // ����

  );
?>