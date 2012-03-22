<?php

if( ! defined( 'XOOPS_ROOT_PATH' ) || ! defined( 'XOOPS_TRUST_PATH' )) exit ;

if (!defined('XOOPS_MODULE_PATH')) {
	define('XOOPS_MODULE_PATH', XOOPS_ROOT_PATH . '/modules');
}
if (!defined('XOOPS_MODULE_URL')) {
	define('XOOPS_MODULE_URL', XOOPS_URL . '/modules');
}

if (!defined('XOOPS_UPLOAD_PATH')) {
	define('XOOPS_UPLOAD_PATH', XOOPS_ROOT_PATH . '/uploads');
}
if (!defined('XOOPS_UPLOAD_URL')) {
	define('XOOPS_UPLOAD_URL', XOOPS_URL . '/uploads');
}

$sMyconfig=_getMyconfig();

//---------------------------------------------------------------------
/*
*TODO If this is SECOND CONFIG ,You need edit config paramater
*/
//Use [siteimg] in ImageManager Integration  : true or false
$cnf_usesiteimg = _getMyConfigParam($sMyconfig,'usesiteimg');

//Automatically shrinks in GD or ImageMagick after upload  : true or false
$resizebyimagemagick = _getMyConfigParam($sMyconfig,'resizebyimagemagick');

//Automatically shrinks in GD or ImageMagick after upload : int 480 (at 10-1024)
$resizepixels = _getMyConfigParam($sMyconfig,'resizepixels');

//pgrfilemanager Package treating images :srtring 'GD' or 'ImageMagick'
$pgrthumbmode = _getMyConfigParam($sMyconfig,'pgrthumbmode');

//base root directory path :string exp. 'W:/www/xcl22/uploads/fckeditor'
$cnf_rootpath = _getMyConfigParam($sMyconfig,'rootpath');

//base root directory url :string exp. 'http://localhost/xcl22/uploads/fckeditor'
$cnf_rooturl = _getMyConfigParam($sMyconfig,'rooturl');

//cache directory path  :string exp. 'W:/www/xcl22/uploads/fckeditor/cache'
$cnf_cachepath = _getMyConfigParam($sMyconfig,'cachepath');

//cache directory url :string exp. 'http://localhost/xcl22/uploads/fckeditor/cache'
$cnf_cacheurl = _getMyConfigParam($sMyconfig,'cacheurl');

//use mod_rewrite .htaccess : true or false
$userewrite = _getMyConfigParam($sMyconfig,'userewrite');

//use Images trustmode  : true or false
$usetrustim = _getMyConfigParam($sMyconfig,'usetrustim');

//trust_path base
define( 'FCK_TRUSTUPLOAD_PATH_BASE' , XOOPS_TRUST_PATH.'/uploads/myckeditor' ) ;
define( 'FCK_TRUSTCACHE_PATH_BASE' , XOOPS_TRUST_PATH.'/uploads/myckeditor/cache' ) ;

//---------------------------------------------------------------------


define( 'FCK_UPLOAD_RESIZE' , $resizebyimagemagick ) ;
define( 'FCK_UPLOAD_RESIZE_PIXELS' , $resizepixels ) ;
define( 'FCK_USE_PRGTHUMBMODDE' , $pgrthumbmode ) ;
define( 'FCK_USE_MOD_REWRITE' , $userewrite ) ;

//------------ root path
$type=preg_replace( '?[^a-zA-Z]?' , '' , @$_POST['type'] ) ;
if (empty($type)){
	$type=preg_replace( '?[^a-zA-Z]?' , '' , @$_GET['type'] ) ;
}

if ($userewrite && $usetrustim && $type === 'Image' ){
	define( 'FCK_UPLOAD_PATH_BASE' , FCK_TRUSTUPLOAD_PATH_BASE ) ;
}else{
	$cnf_rootpath = realpath($cnf_rootpath);
	if (empty($cnf_rootpath)){
		define( 'FCK_UPLOAD_PATH_BASE' , XOOPS_UPLOAD_PATH.'/fckeditor' ) ;
	}elseif (strpos($cnf_rootpath, realpath(XOOPS_ROOT_PATH)) === false){
		define( 'FCK_UPLOAD_PATH_BASE' , XOOPS_UPLOAD_PATH.'/fckeditor' ) ;
	}else{
		//path check
		if ($type !== 'Image'){
			if (strpos($cnf_rootpath, realpath(XOOPS_ROOT_PATH)) === false){
				echo "type=".$type." ERROR:config rootpath not in XOOPS_ROOT_PATH";
				exit();
			}
		}
		define( 'FCK_UPLOAD_PATH_BASE' , $cnf_rootpath ) ;
	}
}
//------------ root url
	if (empty($cnf_rooturl)){
		define( 'FCK_UPLOAD_URL_BASE' , XOOPS_UPLOAD_URL.'/fckeditor' ) ;
	}elseif (strpos($cnf_rooturl, XOOPS_URL) === false){
		define( 'FCK_UPLOAD_URL_BASE' , XOOPS_UPLOAD_URL.'/fckeditor' ) ;
	}else{
		define( 'FCK_UPLOAD_URL_BASE' , $cnf_rooturl ) ;
	}

//------------ cache path
if ($userewrite && $usetrustim && $type === 'Image' ){
	define( 'FCK_CACHE_PATH' , FCK_TRUSTCACHE_PATH_BASE ) ;
}else{
	$cnf_cachepath = realpath($cnf_cachepath);
	if (empty($cnf_cachepath)){
		define( 'FCK_CACHE_PATH' , XOOPS_UPLOAD_PATH.'/fckeditor/cache' ) ;
	}elseif (strpos($cnf_cachepath, realpath(XOOPS_ROOT_PATH)) === false){
		define( 'FCK_CACHE_PATH' , XOOPS_UPLOAD_PATH.'/fckeditor/cache' ) ;
	}else{
		define( 'FCK_CACHE_PATH' , $cnf_cachepath ) ;
	}
}
//------------ cache url
	if (empty($cnf_cacheurl)){
		define( 'FCK_CACHE_URL' , XOOPS_UPLOAD_URL.'/fckeditor/cache' ) ;
	}elseif (strpos($cnf_cacheurl, XOOPS_URL) === false){
		define( 'FCK_CACHE_URL' , XOOPS_UPLOAD_URL.'/fckeditor/cache' ) ;
	}else{
		define( 'FCK_CACHE_URL' , $cnf_cacheurl ) ;
	}



if ( file_exists(XOOPS_MODULE_PATH.'/myckeditor/language/'.$GLOBALS['xoopsConfig']['language'].'/modinfo.php') ) {
 include_once XOOPS_MODULE_PATH.'/myckeditor/language/'.$GLOBALS['xoopsConfig']['language'].'/modinfo.php';
}else{
 include_once XOOPS_MODULE_PATH.'/myckeditor/language/english/modinfo.php';
}


define( 'FCK_USER_PREFIX' , 'uid%06d_' ) ;
define( 'FCK_CHECK_USER_PREFIX4NORMAL' , true ) ;
define( 'FCK_CHECK_USER_PREFIX4ADMIN' , false ) ;

if( ! is_object( $xoopsUser ) ) {
	// guests
	$uid = 0 ;
} else {
	// users
	$uid = $xoopsUser->getVar( 'uid' ) ;
}
//------- FCK_DIGITS4USERDIR from module config ----------//
if( ! defined( 'FCK_DIGITS4USERDIR' ) ){
	//Use a different directory for each user  : true or false
	$fckdigits4userdir = _getMyConfigParam($sMyconfig,'fckdigits4userdir');
	if ($fckdigits4userdir){
		define( 'FCK_DIGITS4USERDIR' , 1 ) ;
	}else{
		define( 'FCK_DIGITS4USERDIR' , 0 ) ;
	}
}
//-------------------------------------------------------//

$fck_resource_type_extensions = array(
	'Image' => array( 'jpeg' , 'jpg' , 'png' , 'gif' ) ,
	'Flash' => array( 'swf' , 'flv' , 'fla' ) ,
	'File' => array( 'jpeg' , 'jpg' , 'png' , 'gif' ,
					 'swf' , 'flv', 'fla' ,
					 'bmp', 'txt', 'pdf', 'xls', 'xlsx', 'doc', 'docx',
					 'ppt' , 'pptx', 'pptm', 'pot', 'potx', 'potm', 'pps', 'ppsx', 'ppsm',
					 'avi' , 'mpg' , 'mpeg' , 'mov')
) ;
$fck_allowed_extensions = array() ;

if( FCK_ISADMIN !== true ) {
	if( FCK_CANUPLOAD === true ) {
		// uploading permissions for normal users
		$fck_allowed_extensions = array(
			'jpg' => 'image/jp' ,
			'jpeg' => 'image/jp' ,
			'png' => 'image/png' ,
			'gif' => 'image/gif' ,
			'swf' => 'application/x-shockwave-flash' ,//for flash change by domifara
			'flv' => 'application/x-shockwave-flash' ,//for flash change by domifara
			'fla' => 'application/x-shockwave-flash' ,//for flash change by domifara
			'bmp' => '' ,
			'txt' => '' ,
			'pdf' => '' ,
			'doc' => '' ,
			'docx' => '' ,
			'xls' => '' ,
			'xlsx' => '' ,
			'ppt' => '' ,
			'pptx' => '' ,
			'pptm' => '' ,
			'pot' => '' ,
			'potx' => '' ,
			'potm' => '' ,
			'pps' => '' ,
			'ppsx' => '' ,
			'ppsm' => ''
		) ;
	} else {
		// uploading permissions for guests
		$fck_allowed_extensions = array() ;
	}
//	$fck_user_prefix = sprintf( FCK_USER_PREFIX , $uid ) ;
//	$fck_check_user_prefix = FCK_CHECK_USER_PREFIX4NORMAL ;
	define( 'FCK_USER_PREFIX_DEF' ,  sprintf( FCK_USER_PREFIX , $uid ) ) ;

	$uid_dir = FCK_DIGITS4USERDIR > 0 ? '/' . sprintf( '%0'.FCK_DIGITS4USERDIR.'d' , $uid % pow( 10 , FCK_DIGITS4USERDIR ) ) : '' ;
	define( 'FCK_UPLOAD_PATH' , FCK_UPLOAD_PATH_BASE.$uid_dir ) ;
	define( 'FCK_UPLOAD_URL' , FCK_UPLOAD_URL_BASE.$uid_dir ) ;
} else {
	// permissions for admin (Only admin of system module can upload)

	$fck_allowed_extensions = array(
		'jpg' => 'image/jp' , // both ok image/jpeg, image/jpg
		'jpeg' => 'image/jp' ,
		'png' => 'image/png' ,
		'gif' => 'image/gif' ,
		'swf' => 'application/x-shockwave-flash' ,
		'flv' => 'application/x-shockwave-flash' ,
		'fla' => 'application/x-shockwave-flash'
	) ;

//elFinder internal
	$file = false;
	if (file_exists(dirname(__FILE__).DIRECTORY_SEPARATOR.'mime.types')) {
		$file = dirname(__FILE__).DIRECTORY_SEPARATOR.'mime.types';
	} elseif (file_exists(dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'mime.types')) {
		$file = dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'mime.types';
	}

	if ($file && file_exists($file)) {
		$mimecf = file($file);

		foreach ($mimecf as $line_num => $line) {
			if (!preg_match('/^\s*#/', $line)) {
				$mime = preg_split('/\s+/', $line, -1, PREG_SPLIT_NO_EMPTY);
				for ($i = 1, $size = count($mime); $i < $size ; $i++) {
					if (!isset($fck_allowed_extensions[$mime[$i]])) {
						$fck_allowed_extensions[$mime[$i]] = $mime[0];
					}
				}
			}
		}
	}


//	$fck_user_prefix = sprintf( FCK_USER_PREFIX , $uid ) ;
//	$fck_check_user_prefix = FCK_CHECK_USER_PREFIX4ADMIN ;
	define( 'FCK_USER_PREFIX_DEF' ,  sprintf( FCK_USER_PREFIX , $uid ) ) ;

	define( 'FCK_UPLOAD_PATH' , FCK_UPLOAD_PATH_BASE ) ;
	define( 'FCK_UPLOAD_URL' , FCK_UPLOAD_URL_BASE ) ;
}

// check directory for uploading
if( ! is_dir( FCK_UPLOAD_PATH_BASE ) ) {
	exit( 'BASE Create '.htmlspecialchars(FCK_UPLOAD_PATH_BASE).' first')  ;
}

//-------- usesiteimg
if ($cnf_usesiteimg){
	define( 'FCK_USESITEIMG' , 1 ) ;
}else{
	define( 'FCK_USESITEIMG' , 0 ) ;
}
	define( 'FCK_USESITEIMG_URL' , str_replace(XOOPS_URL.'/', '',FCK_UPLOAD_URL) ) ;
	define( 'FCK_USESITEIMG_CACHE_URL' , str_replace(XOOPS_URL.'/', '',FCK_CACHE_URL) ) ;


?>