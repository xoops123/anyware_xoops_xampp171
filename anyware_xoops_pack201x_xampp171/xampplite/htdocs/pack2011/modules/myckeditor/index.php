<?php
/**
 * @file
 * @brief The page controller in the directory
 * @package mydhtml
 * @version $Id$
 */

require_once "../../mainfile.php";
if (!isset($GLOBALS['xoopsUser']) || !is_object($GLOBALS['xoopsUser'])){
	redirect_header( XOOPS_URL."/" , 1, _NOPERM );
}

require_once XOOPS_ROOT_PATH . "/header.php";


require_once dirname(__FILE__) . '/pgrfilemanager/php/config_and_auth.inc.dist.php';

$mydirname = basename(dirname(__FILE__));

if (FCK_ISADMIN !== true){
	if (FCK_CANUPLOAD !== true){
		redirect_header( XOOPS_URL."/" , 1, _NOPERM );
	}
}

echo "<h1>filemanager</h1>"."\n";
echo "<ul>"."\n";
echo "<li>"."\n";
echo "<a href='".XOOPS_MODULE_URL."/".$mydirname."/filemanager/browser/default/browser.html?Type=Image&Connector=".XOOPS_MODULE_URL."/".$mydirname."/filemanager/connectors/php/connector.php' target='_blank'><h2>Image</h2></a>"."\n";
echo "</li>"."\n";
if (FCK_ISADMIN === true){
echo "<li>"."\n";
echo "<a href='".XOOPS_MODULE_URL."/".$mydirname."/filemanager/browser/default/browser.html?Connector=".XOOPS_MODULE_URL."/".$mydirname."/filemanager/connectors/php/connector.php' target='_blank'><h2>File</h2></a>"."\n";
echo "</li>"."\n";
}
echo "</ul>"."\n";


echo "<br/>";

echo "<h1>pgrfilemanager</h1>"."\n";
echo "<ul>"."\n";
echo "<li>"."\n";
echo "<a href='".XOOPS_MODULE_URL."/".$mydirname."/pgrfilemanager/PGRFileManager.php?type=Image&langCode="._LANGCODE."' target='_blank'><h2>Image</h2></a>"."\n";
echo "</li>"."\n";
echo "<li>"."\n";
echo "<a href='".XOOPS_MODULE_URL."/".$mydirname."/pgrfilemanager/PGRFileManager.php?type=Flash&langCode="._LANGCODE."' target='_blank'><h2>Flash</h2></a>"."\n";
echo "</li>"."\n";
echo "</ul>"."\n";


require_once XOOPS_ROOT_PATH . "/footer.php";

?>
