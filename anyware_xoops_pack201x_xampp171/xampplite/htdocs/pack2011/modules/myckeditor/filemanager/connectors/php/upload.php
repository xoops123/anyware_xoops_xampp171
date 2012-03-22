<?php

define( 'FCK_IS_UPLOAD_CONNECTOR' , 1 ) ;

// for XOOPS
//require '../../../../../../mainfile.php' ;
require '../../../../../mainfile.php' ;
if (isset($GLOBALS['xoopsLogger'])){
	$versions = array_map( 'intval' , explode( '.' , preg_replace( '/[^0-9.]/' , '' , XOOPS_VERSION ) ) ) ;
	if( $versions[0] == 2 && $versions[1] >= 5 ) {
		$GLOBALS['xoopsLogger']->activated = false;
	}
}

require_once dirname(__FILE__).'/functions.php' ;
@include dirname(__FILE__).'/config_and_auth.inc.php' ;
if( ! defined( 'FCK_UPLOAD_PATH' ) ) {
	require dirname(__FILE__).'/config_and_auth.inc.dist.php' ;
}

$sCommand=preg_replace( '?[^a-zA-Z]?' , '' , @$_GET['command'] ) ;
if ( !in_array( $sCommand, array('QuickUpload', 'FileUpload') ) ){
	SendResultsHTML( '1', '', '', 'The ""' . htmlspecialchars($sCommand,ENT_QUOTES) . '"" command isn\'t allowed' ) ;
}



FileUpload( '/' ) ;

?>