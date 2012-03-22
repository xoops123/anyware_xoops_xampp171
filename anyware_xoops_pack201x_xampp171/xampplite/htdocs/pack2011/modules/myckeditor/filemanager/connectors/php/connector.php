<?php

define( 'FCK_IS_BROWSER_CONNECTOR' , 1 ) ;

// for XOOPS
//HACK by domifara
// require '../../../../../../mainfile.php' ;
require '../../../../../mainfile.php' ;
if (isset($GLOBALS['xoopsLogger'])){
	$versions = array_map( 'intval' , explode( '.' , preg_replace( '/[^0-9.]/' , '' , XOOPS_VERSION ) ) ) ;
	if( $versions[0] == 2 && $versions[1] >= 5 ) {
		$GLOBALS['xoopsLogger']->activated = false;
	}
}

require_once dirname(__FILE__).'/functions.php' ;
if( file_exists( dirname(__FILE__).'/config_and_auth.inc.php' ) ) {
	include dirname(__FILE__).'/config_and_auth.inc.php' ;
} else {
	include dirname(__FILE__).'/config_and_auth.inc.dist.php' ;
}

// Get the main request informaiton.
$sCommand = preg_replace( '?[^a-zA-Z]?' , '' , @$_GET['Command'] ) ;
$sCurrentFolder = preg_replace( '?[^0-9a-zA-Z_/-]?' , '' , @$_GET['CurrentFolder'] ) ;
//$sType = @$_GET['Type'] ;
//if( ! in_array( $sType , array('File','Image','Flash','Media') ) ) $sType = 'Image' ;
$sType=preg_replace( '?[^a-zA-Z]?' , '' , @$_GET['Type'] ) ;
if( ! in_array( $sType , array('File','Image','Flash','Media') ) ) $sType = 'File' ;

// Check the current folder syntax (must begin and start with a slash).
if( substr( $sCurrentFolder , -1 ) !== '/' ) $sCurrentFolder .= '/' ;
if( substr( $sCurrentFolder , 0 , 1 ) !== '/' ) $sCurrentFolder = '/' . $sCurrentFolder ;

// Execute the required command.
switch ( $sCommand )
{
	case 'FileUpload' :
		FileUpload( $sCurrentFolder ) ;
		break ;
	case 'DeleteFile' :
		CreateXmlHeader( 'DeleteFile' , $sCurrentFolder ) ;
		DeleteFile( $sCurrentFolder , $sType ) ;
		CreateXmlFooter() ;
		break ;
	case 'GetFoldersAndFiles' :
		CreateXmlHeader( 'GetFoldersAndFiles' , $sCurrentFolder ) ;
		GetFoldersAndFiles( $sCurrentFolder , $sType ) ;
		CreateXmlFooter() ;
		break ;
	case 'CreateFolder' :
		CreateXmlHeader( 'CreateFolder' , $sCurrentFolder ) ;
		CreateFolder( $sCurrentFolder , $sType ) ;
		CreateXmlFooter() ;
		break ;
	default :
	case 'GetFolders' :
		CreateXmlHeader( 'GetFolders' , $sCurrentFolder ) ;
		GetFolders( $sCurrentFolder , $sType ) ;
		CreateXmlFooter() ;
		break ;
}

?>