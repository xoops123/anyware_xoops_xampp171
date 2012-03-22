<?php

if( ! defined( 'XOOPS_ROOT_PATH' ) || ! defined( 'XOOPS_TRUST_PATH' )) exit ;
$mydirname = basename(dirname(dirname(dirname(dirname(__FILE__)))));

// configurations
define( 'FCK_UPLOAD_NAME' , 'NewFile' ) ;

if( defined( 'XOOPS_UPLOAD_PATH' ) ){
	define( 'FCK_UPLOAD_PATH_BASE' , XOOPS_UPLOAD_PATH.'/fckeditor' ) ;
}else{
	define( 'FCK_UPLOAD_PATH_BASE' , XOOPS_ROOT_PATH.'/uploads/fckeditor' ) ;
}
if( defined( 'XOOPS_UPLOAD_URL' ) ){
	define( 'FCK_UPLOAD_URL_BASE' , XOOPS_UPLOAD_URL.'/fckeditor' ) ;
}else{
	define( 'FCK_UPLOAD_URL_BASE' , XOOPS_URL.'/uploads/fckeditor' ) ;
}

define( 'FCK_TRUSTUPLOAD_PATH_BASE' , XOOPS_TRUST_PATH.'/uploads/fckeditor' ) ;
//HACK by domifara
//define( 'FCK_TRUSTUPLOAD_URL_BASE' , XOOPS_URL.'/common/fckeditor/editor/filemanager/connectors/php/transfer.php?file=' ) ;
define( 'FCK_TRUSTUPLOAD_URL_BASE' , XOOPS_MODULE_URL.'/'.$mydirname.'/filemanager/connectors/php/transfer.php?file=' ) ;
define( 'FCK_FILE_PREFIX' , '' ) ; // not in use now
//define( 'FCK_DIGITS4USERDIR' , 0 ) ;// create folder 0/ 1/ 2/ ... 9/ under uploads/fckeditor/ and chmod 777 them

define( 'FCK_USER_SELFDELETE_LIMIT' , 3600 ) ; // set the time limit by sec. 0 means normal users cannot delete files uploaded by themselves
define( 'FCK_USER_PREFIX' , 'uid%06d_' ) ;
define( 'FCK_CHECK_USER_PREFIX4NORMAL' , true ) ;
define( 'FCK_CHECK_USER_PREFIX4ADMIN' , false ) ;

unset($sMyconfig);
$sMyconfig=_getMyconfig();

$fck_uploadable_groups = array() ; // specify groups can upload images
//------- uploadable gruops from module config ----------//
$uploadablegruops = _getMyConfigParam($sMyconfig,'uploadablegruops');
$fck_uploadable_groups = array($uploadablegruops) ;

$fckdigits4userdir = _getMyConfigParam($sMyconfig,'fckdigits4userdir');
if ($fckdigits4userdir){
	define( 'FCK_DIGITS4USERDIR' , 1 ) ;
}else{
	define( 'FCK_DIGITS4USERDIR' , 0 ) ;
}

//------- imagemagick resize/thumbs ,thum from module config ----------//
$resizebyimagemagick = _getMyConfigParam($sMyconfig,'resizebyimagemagick');
if ( ! empty($resizebyimagemagick)){
	define( 'FCK_FUNCTION_AFTER_IMGUPLOAD' , 'fck_resize_by_imagemagick' ) ;
}
$thumbsbyimagemagick = _getMyConfigParam($sMyconfig,'thumbsbyimagemagick');
if ( ! empty($thumbsbyimagemagick)){
	define( 'FCK_FUNCTION_AFTER_MKTHUMBS' , 'fck_thumbs_by_imagemagick' ) ;
}

//-------------------------------------------------------//

$fck_resource_type_extensions = array(
	'File' => array() ,
	'Image' => array( 'jpeg' , 'jpg' , 'png' , 'gif' ) ,
	'Flash' => array( 'swf' , 'fla' ) ,
	'Media' => array( 'jpeg' , 'jpg' , 'png' , 'gif' , 'swf' , 'fla' , 'avi' , 'mpg' , 'mpeg' , 'mov' ) ,
) ;
$fck_allowed_extensions = array() ;

// check directory for uploading
if( ! is_dir( FCK_UPLOAD_PATH_BASE ) ) {
	SendError( '1', '', '', 'BASE Create '.htmlspecialchars(FCK_UPLOAD_URL_BASE).' first' ) ;
}

if( ! is_object( $xoopsUser ) ) {
	// guests
	$fck_isadmin = false ;
	$fck_canupload = false ;
	$uid = 0 ;
} else {
	// users
	$uid = $xoopsUser->getVar( 'uid' ) ;
	// check isadmin
	if( defined( 'XOOPS_CUBE_LEGACY' ) ) {
		// for Cube 2.1 (check if legacy module admin)
		$module_handler =& xoops_gethandler( 'module' ) ;
		$module =& $module_handler->getByDirname( 'legacy' ) ;
		$fck_isadmin = $xoopsUser->isAdmin( $module->getVar('mid') ) ;
	} else {
		$fck_isadmin = $xoopsUser->isAdmin(1) ; // system module admin
	}

	// check canupload
	$fck_canupload = $fck_isadmin ;
	if( ! $fck_isadmin ) {
		// users other than admin
		$fck_canupload = count( array_intersect( $xoopsUser->getGroups() , $fck_uploadable_groups ) ) > 0 ? true : false ;
	}
}


if( empty( $fck_isadmin ) ) {
	if( $fck_canupload ) {
		// uploading permissions for normal users
		$fck_allowed_extensions = array(
			'jpg' => 'image/jp' ,
			'jpeg' => 'image/jp' ,
			'png' => 'image/png' ,
			'gif' => 'image/gif' ,
			'pdf' => '' ,
//			'swf' => 'application/x-shockwave-flash' ,//for flash change by domifara
//			'fla' => 'application/x-shockwave-flash' ,//for flash change by domifara
		) ;
	} else {
		// uploading permissions for guests
		$fck_allowed_extensions = array() ;
	}
	$fck_user_prefix = sprintf( FCK_USER_PREFIX , $uid ) ;
	$fck_check_user_prefix = FCK_CHECK_USER_PREFIX4NORMAL ;

//	$uid_dir = FCK_DIGITS4USERDIR > 0 ? '/' . sprintf( '%0'.FCK_DIGITS4USERDIR.'d' , $uid % pow( 10 , FCK_DIGITS4USERDIR ) ) : '' ;
//	$sType = @$_GET['Type'] ;
//	if( ! in_array( $sType , array('File','Image','Flash','Media') ) ) $sType = 'Image' ;
	$sType=preg_replace( '?[^a-zA-Z]?' , '' , @$_GET['Type'] ) ;
	if( ! in_array( $sType , array('File','Image','Flash','Media') ) ) $sType = 'File' ;

	$uid_dir = '' ;
	if ( $sType == 'Flash'){
		$uid_dir .= '/flash' ; //same CKfinder
	}
	$uid_dir .= FCK_DIGITS4USERDIR > 0 ? '/' . sprintf( '%0'.FCK_DIGITS4USERDIR.'d' , $uid % pow( 10 , FCK_DIGITS4USERDIR ) ) : '' ;

	define( 'FCK_UPLOAD_PATH' , FCK_UPLOAD_PATH_BASE.$uid_dir ) ;
	define( 'FCK_UPLOAD_URL' , FCK_UPLOAD_URL_BASE.$uid_dir ) ;
	define( 'FCK_TRUSTUPLOAD_PATH' , FCK_TRUSTUPLOAD_PATH_BASE.$uid_dir ) ;
	define( 'FCK_TRUSTUPLOAD_URL' , FCK_TRUSTUPLOAD_URL_BASE.$uid_dir ) ;
} else {
	// permissions for admin (Only admin of system module can upload)
	$fck_allowed_extensions = array(
		'jpg' => 'image/jp' , // both ok image/jpeg, image/jpg
		'jpeg' => 'image/jp' ,
		'png' => 'image/png' ,
		'gif' => 'image/gif' ,
		'doc' => '' ,
		'xls' => '' ,
		'txt' => '' ,
		'pdf' => '' ,
		'swf' => 'application/x-shockwave-flash' ,//application/x-shockwave-flash  for flash change by domifara
		'fla' => 'application/x-shockwave-flash' ,//application/x-shockwave-flash  for flash change by domifara
		'mpeg' => '' ,
		'mpg' => '' ,
		'avi' => '' ,
		'wmv' => '' ,
		'mov' => ''
	) ;
	$fck_user_prefix = sprintf( FCK_USER_PREFIX , $uid ) ;
	$fck_check_user_prefix = FCK_CHECK_USER_PREFIX4ADMIN ;

//	define( 'FCK_UPLOAD_PATH' , FCK_UPLOAD_PATH_BASE ) ;
//	define( 'FCK_UPLOAD_URL' , FCK_UPLOAD_URL_BASE ) ;
//	$sType = @$_GET['Type'] ;
//	if( ! in_array( $sType , array('File','Image','Flash','Media') ) ) $sType = 'Image' ;
	$sType=preg_replace( '?[^a-zA-Z]?' , '' , @$_GET['Type'] ) ;
	if( ! in_array( $sType , array('File','Image','Flash','Media') ) ) $sType = 'File' ;
	$uid_dir = '' ;
	if ( $sType == 'Flash'){
		$uid_dir .= '/flash' ; //same CKfinder
		define( 'FCK_UPLOAD_PATH' , FCK_UPLOAD_PATH_BASE.$uid_dir ) ;
		define( 'FCK_UPLOAD_URL' , FCK_UPLOAD_URL_BASE.$uid_dir ) ;
	}else{
		define( 'FCK_UPLOAD_PATH' , FCK_UPLOAD_PATH_BASE ) ;
		define( 'FCK_UPLOAD_URL' , FCK_UPLOAD_URL_BASE ) ;
	}

	define( 'FCK_TRUSTUPLOAD_PATH' , FCK_TRUSTUPLOAD_PATH_BASE ) ;
	define( 'FCK_TRUSTUPLOAD_URL' , FCK_TRUSTUPLOAD_URL_BASE ) ;
}

//--------user auto mkdir
if ( FCK_DIGITS4USERDIR === 1 ){
	$_ini_safe_mode = @ini_get( "safe_mode" );
	if ( empty($_ini_safe_mode) ){
		$uploadssdirauto = FCK_UPLOAD_PATH;
		if ( ! is_dir($uploadssdirauto) ) {
			$res = @mkdir( $uploadssdirauto , 0777 ) ;
		}
		$uploadssdirauto = FCK_TRUSTUPLOAD_PATH;
		if ( ! is_dir($uploadssdirauto) ) {
			$res = @mkdir( $uploadssdirauto , 0777 ) ;
		}
	}
}
//---------


function fck_resize_by_imagemagick( $new_filefullpath )
{
	//imagick extensions
	$extensions = @get_loaded_extensions();
	if ( is_array($extensions)){
		if ( array_search('imagick',$extensions) === false){
			return;
		}
	}
	global $sMyconfig;
	$resizepixels = intval(_getMyConfigParam($sMyconfig,'resizepixels'));
	if ($resizepixels < 10 ||$resizepixels >= 1024){
		$resizepixels = 1024 ;
	}
	$max_width = $resizepixels ;
	$max_height = $resizepixels ;

	$image_stats = getimagesize( $new_filefullpath ) ;
	if( $image_stats[0] > $max_width || $image_stats[1] > $max_height ) {
		exec( "mogrify -geometry {$max_width}x{$max_height} $new_filefullpath" ) ;
	}
}

function fck_thumbs_by_imagemagick( $new_filefullpath)
{
	$_ini_safe_mode = @ini_get( "safe_mode" );
	if ( $_ini_safe_mode ){
		return;
	}
	//imagick extensions
	$extensions = @get_loaded_extensions();
	if ( is_array($extensions)){
		if ( array_search('imagick',$extensions) === false){
			return;
		}
	}

	global $sMyconfig;
	$thumbspixels = intval(_getMyConfigParam($sMyconfig,'thumbspixels'));
	if ($thumbspixels < 10 ||$thumbspixels > 140){
		$thumbspixels = 140 ;
	}
	$max_width = $thumbspixels ;
	$max_height = $thumbspixels ;

	$thumbsdir = dirname($new_filefullpath).'/thumbs';
	$thumbsdirPath = $thumbsdir.'/'.basename($new_filefullpath);
	if ( ! is_dir($thumbsdir) ) {
		$res = mkdir( $thumbsdir , 0777 ) ;
		if ( empty($res) ) {
			return;
		}
	}

	//thumbs resize type
	$thumbstype = _getMyConfigParam($sMyconfig,'thumbstype');
	if($thumbstype == 'box'){
		//white backgrand (max_width x $max_height box) , ImageMagick new version only
		exec( "convert $new_filefullpath -resize {$max_width}x{$max_height} -size {$max_width}x{$max_height} xc:white +swap -gravity center -composite $thumbsdirPath" ) ;
	}else{
		//simple reisize
		exec( "convert $new_filefullpath -resize {$max_width}x{$max_height} $thumbsdirPath" ) ;
	}

}

function _getMyconfig()
{
	$ret = array();
	$mydirname = basename(dirname(dirname(dirname(dirname(__FILE__)))));
	$hModule =& xoops_gethandler('module');
	$MyhModule =& $hModule->getByDirname($mydirname) ;
	if ( !is_object($MyhModule) ) {
		return $ret;
	}
	$hModConfig =& xoops_gethandler('config');
	$ret =& $hModConfig->getConfigsByCat(0, $MyhModule->getVar( 'mid' ));
	return $ret;
}
function _getMyConfigParam($configs, $name)
{
	$ret = '';
	if (empty($configs)){
		return $ret;
	}
	if (!isset($configs[$name])){
		return $ret;
	}
	if (empty($configs[$name])){
		return $ret;
	}
	$ret = trim($configs[$name]);
	return $ret;
}

?>