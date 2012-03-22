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

$root =& XCube_Root::getSingleton();
$root->mController->executeHeader();

	$mydirname = basename(dirname(dirname(__FILE__)));

	$module_handler =& xoops_gethandler('module');
	$_myModule =& $module_handler->getByDirname($mydirname);
	header("Location: ".XOOPS_URL."/modules/legacy/admin/index.php?action=PreferenceEdit&confmod_id=".$_myModule->mid() );
	exit();


$xoopsLogger=&$root->mController->getLogger();
$xoopsLogger->stopTime();
$root->mController->executeView();

?>