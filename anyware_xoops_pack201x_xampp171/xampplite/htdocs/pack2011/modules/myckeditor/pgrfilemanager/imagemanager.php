<?php
if( ! defined( 'XOOPS_ROOT_PATH' ) ) {
	if( file_exists( 'mainfile.php' ) ) {
		// when this script is overwritten on core's imagemanager.php
		require( 'mainfile.php' ) ;
	} else {
		// when this script is called directly as this module's imagemanager
		require '../../../mainfile.php' ;
	}
}
if (!defined('XOOPS_MODULE_URL')) {
	define('XOOPS_MODULE_URL', XOOPS_URL . '/modules');
}

$target=preg_replace( '?[^a-zA-Z0-9_\-\[\]]?' , '' , @$_GET['target'] ) ;


if(strpos($_SERVER['HTTP_USER_AGENT'],"MSIE")){
	$html_script = '';
	$html_script .= '<html>'."\n";
	$html_script .= '<head>'."\n";
	$html_script .= '<title>ImageManager For pgrfilemanager</title>'."\n";
	$html_script .= '<script type="text/javascript" src="'.XOOPS_URL.'/include/xoops.js"></script>'."\n";
	$html_script .= '<script type="text/javascript" language="javascript">'."\n";
	$html_script .= 'window.resizeTo(960,500);'."\n";
	$html_script .= 'openWithSelfMain("'.XOOPS_MODULE_URL.'/myckeditor/pgrfilemanager/PGRFileManager.php?type=Image&langCode='._LANGCODE.'&target='.$target.'","imgmanager",960,500);'."\n";
	$html_script .= '</script>'."\n";
	$html_script .= '</head>'."\n";
	$html_script .= '<body>'."\n";
	$html_script .= '</body>'."\n";
	$html_script .= '</html>'."\n";
}else{
	$html_script = '';
	$html_script .= '<html>'."\n";
	$html_script .= '<head>'."\n";
	$html_script .= '<title>ImageManager For pgrfilemanager</title>'."\n";
	$html_script .= '<script type="text/javascript" language="javascript">'."\n";
	$html_script .= '<!--'."\n";
	$html_script .= 'window.resizeTo(990,500);'."\n";
	$html_script .= '// -->'."\n";
	$html_script .= '</script>'."\n";
	$html_script .= '</head>'."\n";
	$html_script .= '<frameset cols="*">'."\n";
	$html_script .= '<frame src="'.XOOPS_MODULE_URL.'/myckeditor/pgrfilemanager/PGRFileManager.php?type=Image&target='.$target.'&langCode='._LANGCODE.'" name="PGRFileManager">'."\n";
	$html_script .= '<noframes>'."\n";
	$html_script .= 'This page uses frames.'."\n";
	$html_script .= '</noframes>'."\n";
	$html_script .= '</frameset>'."\n";
	$html_script .= '</html>'."\n";

}
echo $html_script;
exit()
?>