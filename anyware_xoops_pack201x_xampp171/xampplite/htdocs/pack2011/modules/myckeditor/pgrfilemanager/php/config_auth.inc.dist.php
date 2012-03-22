<?php

if( ! defined( 'XOOPS_ROOT_PATH' ) || ! defined( 'XOOPS_TRUST_PATH' )) exit ;
if( ! is_object( $GLOBALS['xoopsUser'] ) ) {exit;}

if (!defined('XOOPS_MODULE_PATH')) {
	define('XOOPS_MODULE_PATH', XOOPS_ROOT_PATH . '/modules');
}
if (!defined('XOOPS_MODULE_URL')) {
	define('XOOPS_MODULE_URL', XOOPS_URL . '/modules');
}

if ( file_exists(XOOPS_MODULE_PATH.'/myckeditor/language/'.$GLOBALS['xoopsConfig']['language'].'/modinfo.php') ) {
 include_once XOOPS_MODULE_PATH.'/myckeditor/language/'.$GLOBALS['xoopsConfig']['language'].'/modinfo.php';
}else{
 include_once XOOPS_MODULE_PATH.'/myckeditor/language/english/modinfo.php';
}
$sMyconfig=_getMyconfig();

//------- uploadable gruops from module config ----------//
$fck_uploadable_groups = array() ; // specify groups can upload images
$uploadablegruops = _getMyConfigParam($sMyconfig,'uploadablegruops');
$fck_uploadable_groups = explode( ',' , $uploadablegruops );
//-------------------------------------------------------//

if( ! is_object( $GLOBALS['xoopsUser'] ) ) {
	// guests
	$fck_isadmin = false ;
	$fck_canupload = false ;
	$uid = 0 ;
	exit;
} else {
	// users
	$uid = $GLOBALS['xoopsUser']->getVar( 'uid' ) ;
	// check isadmin
	if( defined( 'XOOPS_CUBE_LEGACY' ) ) {
		// for Cube 2.1 (check if legacy module admin)
		$module_handler =& xoops_gethandler( 'module' ) ;
		$module =& $module_handler->getByDirname( 'legacy' ) ;
		$fck_isadmin = $GLOBALS['xoopsUser']->isAdmin( $module->getVar('mid') ) ;
	} else {
		$fck_isadmin = $GLOBALS['xoopsUser']->isAdmin(1) ; // system module admin
	}

	// check canupload
	$fck_canupload = $fck_isadmin ;
	if( ! $fck_isadmin ) {
		// users other than admin
		$fck_canupload = count( array_intersect( $xoopsUser->getGroups() , $fck_uploadable_groups ) ) > 0 ? true : false ;
	}
	define( 'FCK_CANUPLOAD' , $fck_canupload ) ;
}

if( ! defined( 'FCK_CANUPLOAD' ) ){
	define( 'FCK_CANUPLOAD' , false ) ;
}
define( 'FCK_ISADMIN' , $fck_isadmin ) ;

//-------------------------------------------------------//

	$fckdigits4userdir = _getMyConfigParam($sMyconfig,'fckdigits4userdir');
	if ($fckdigits4userdir){
		define( 'FCK_DIGITS4USERDIR' , 1 ) ;
	}else{
		define( 'FCK_DIGITS4USERDIR' , 0 ) ;
	}
//-------------------------------------------------------//

if( FCK_ISADMIN !== true ) {
	if( FCK_CANUPLOAD !== true ) {
		exit;
	}else{
		if (FCK_DIGITS4USERDIR !== 1 ){
			exit(_MI_MYCKEDITOR_LANG_4USERDIR .' admin, Yes then please<br/>'._MI_MYCKEDITOR_DESC_4USERDIR);
		}
	}
}


?>