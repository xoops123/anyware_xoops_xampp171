<?php

eval( '

function '. $mydirname .'_global_search( $keywords , $andor , $limit , $offset , $userid )
{
	// for XOOPS Search module
	static $readed = array();
	$md5 = md5($keywords . $andor . $limit . $offset . $userid);
	if(isset($readed[$md5])) { return array() ; }
	$readed[$md5] = TRUE;
	return xpwiki_global_search_base( "'.$mydirname.'" , $keywords , $andor , $limit , $offset , $userid ) ;
}

' ) ;


if( ! function_exists( 'xpwiki_global_search_base' ) ) {

function xpwiki_global_search_base( $mydirname , $keywords , $andor , $limit , $offset , $userid )
{
	// ɬ�פʥե�������ɤ߹���
	$mytrustdirpath = dirname( __FILE__ ) ;
	include_once "$mytrustdirpath/include.php";
	
	// XpWiki ���֥������Ⱥ���
	$xpwiki = new XpWiki($mydirname);
	
	// xoopsSearch extension �ɤ߹���
	$xpwiki->load_extensions("xoopsSearch");
	
	// �����
	$xpwiki->init('#RenderMode');
	
	// �ǡ�������
	$ret = $xpwiki->extension->xoopsSearch->get ( $keywords , $andor , $limit , $offset , $userid );
	
	// ���֥��������˴�
	$xpwiki = null;
	
	return $ret;
}

}

?>