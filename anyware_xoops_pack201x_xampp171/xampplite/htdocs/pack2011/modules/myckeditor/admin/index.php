<?php
/**
 * @file
 * @brief The page admin in the directory
 * @package mydhtml
 * @version $Id$
 */
if ( isset( $GLOBALS['xoopsOption']['nocommon'] ) ) { exit(); }
if ( isset( $GLOBALS['xoopsOption']['pagetype'] ) && preg_match("/[\<\>\"\'\(\)\.]/",$GLOBALS['xoopsOption']['pagetype']) ) { exit(); }
require_once "../../../mainfile.php";

if ( preg_match('/XOOPS Cube Legacy/', XOOPS_VERSION) ){
	include dirname(__FILE__).'/index4legacy.php';

}else{
	include XOOPS_ROOT_PATH.'/include/cp_header.php';
	xoops_cp_header();
	$mydirname = basename(dirname(dirname(__FILE__)));
	if ( file_exists(XOOPS_ROOT_PATH.'/modules/system/admin.php') ) {
		$module_handler =& xoops_gethandler('module');
		$_myModule =& $module_handler->getByDirname($mydirname);
		header("Location: ".XOOPS_URL."/modules/system/admin.php?fct=preferences&op=showmod&mod=".$_myModule->mid());
		exit();
	}
	xoops_cp_footer();
}
?>