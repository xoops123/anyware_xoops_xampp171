<?php

if( ! defined( 'XOOPS_ROOT_PATH' ) || ! defined( 'XOOPS_TRUST_PATH' )) exit ;
if( ! is_object( $GLOBALS['xoopsUser'] ) ) {exit;}
// configurations
define( 'PGRFILEMANAGER_DEBUG_SW' , 0 ) ;// 0 or 1
if (PGRFILEMANAGER_DEBUG_SW === 0){
	error_reporting(0);
}
define( 'FCK_FILE_PREFIX' , '' ) ; // not in use now
define( 'FCK_THUMB_PASS' , 'f4Ts3F_sg8aW34' ) ; // Do not Change

require_once dirname(__FILE__) . '/config_function.inc.dist.php';
require_once dirname(__FILE__) . '/config_auth.inc.dist.php';

$q_config = 0;
if (isset($_SESSION['configchange']) && $_SESSION['configchange']){
	$q_config = intval($_SESSION['configchange']);
}

if (empty($q_config)){
	require_once dirname(__FILE__) . '/config.inc.dist.php';
}else{
	if ( file_exists( dirname(__FILE__) . '/config.inc'.intval($q_config).'.dist.php') ) {
		require_once dirname(__FILE__) . '/config.inc'.intval($q_config).'.dist.php';
	}else{
		require_once dirname(__FILE__) . '/config.inc.dist.php';
		$_SESSION['configchange'] = 0;
	}
}


//--------user auto mkdir
if( FCK_CANUPLOAD === true ) {
	if ( FCK_DIGITS4USERDIR === 1 ){
		$_ini_safe_mode = @ini_get( "safe_mode" );
		if ( empty($_ini_safe_mode) ){
			$uploadssdirauto = FCK_UPLOAD_PATH;
			if ( ! is_dir($uploadssdirauto) ) {
				$oldumask = umask( 0 ) ;
				$res = @mkdir( $uploadssdirauto , 0777 ) ;
				umask( $oldumask ) ;
			}
		}
	}
	//--------user auto mkdir cache
	if ( ! is_dir(FCK_CACHE_PATH) ){
		$_ini_safe_mode = @ini_get( "safe_mode" );
		if ( empty($_ini_safe_mode) ){
			$oldumask = umask( 0 ) ;
			$res = @mkdir( FCK_CACHE_PATH , 0777 ) ;
			umask( $oldumask ) ;
		}
	}
}
//---------

?>