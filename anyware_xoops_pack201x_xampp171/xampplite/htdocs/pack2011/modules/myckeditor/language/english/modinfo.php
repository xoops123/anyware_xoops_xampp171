<?php
/**
 * @file
 * @package mydhtml
 * @version $Id$
 */
if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( '_MI_MYCKEDITOR_LOADED' ) ) {

define( '_MI_MYCKEDITOR_LOADED' , 1 ) ;

define('_MI_MYCKEDITOR_LANG_MYCKEDITOR ', "myckeditor");
define('_MI_MYCKEDITOR_DESC_MYCKEDITOR ', "http://ckeditor.com/");

define('_MI_MYCKEDITOR_LANG_FMANAGER', "[Browse Server]( For File) display buttom");
define('_MI_MYCKEDITOR_DESC_FMANAGER', "");
define('_MI_MYCKEDITOR_LANG_FLASHM', "[Browse Server]( For FLASH) display buttom");
define('_MI_MYCKEDITOR_DESC_FLASHM', "");
define('_MI_MYCKEDITOR_LANG_IMANAGER', "[Browse Server]( For Image) display buttom");
define('_MI_MYCKEDITOR_DESC_IMANAGER', "if you use imagemager、TODO you edit legacy_image_list.html for CKEditor");
define('_MI_MYCKEDITOR_LANG_FM_ALLOW', "(filemanege,pgrfilemanager)Uploadable USER Gruops ID For filemange ");
define('_MI_MYCKEDITOR_DESC_FM_ALLOW', "(Example 2,4 )you can specify Group ID multiply by numbers separated with comma.");
define('_MI_MYCKEDITOR_LANG_IM_ALLOW', "(filemanege,pgrfilemanager,imagemager)Available USER Gruops ID For ImageManager");
define('_MI_MYCKEDITOR_DESC_IM_ALLOW', "When ImageManager, Uploadable or Available ImageManager <br />(Example 2,4 )you can specify Group ID multiply by numbers separated with comma.");
define('_MI_MYCKEDITOR_LANG_4USERDIR', "(filemanege,pgrfilemanager)Use a different directory for each user");
define('_MI_MYCKEDITOR_DESC_4USERDIR', "when yes, Automatically create directory in base root path,it is uid <br />when allow users to use pgrfilemanager,this is required");

define('_MI_MYCKEDITOR_LANG_ENTERMODE', "Enable auto wrap lines.(When HTML mode,Once you press the enter key)");
define('_MI_MYCKEDITOR_DESC_ENTERMODE', "Bbcode compatible with the existing data for the effect of wrapping, CKEditor can disable your own wrap<br />CKEditor insert the line break at HTML mode ");

//version 0.05 add lines
define('_MI_MYCKEDITOR_LANG_RESIZE', "(filemanege,pgrfilemanager)Automatically shrinks in ImageMagick after upload");
define('_MI_MYCKEDITOR_DESC_RESIZE', "Does not change the ratio of the width x height,Server must be available to the ImageMagick");
define('_MI_MYCKEDITOR_LANG_RESIZEPIX', "(filemanege,pgrfilemanager)maximum size of width x height.Please specify at 10-1024 (Pixels: Initial Value=480)");
define('_MI_MYCKEDITOR_DESC_RESIZEPIX', "This size of the image under the specified size does not change");

define('_MI_MYCKEDITOR_LANG_THUMBS', "(filemanege)For filemanege,When uploading, you can automatically create thumbnails");
define('_MI_MYCKEDITOR_DESC_THUMBS', "Server must be available to the ImageMagick");
define('_MI_MYCKEDITOR_LANG_THUMBSPIX', "(filemanege,pgrfilemanager)Thumbnail size(Pixels: Initial Value=64)");
define('_MI_MYCKEDITOR_DESC_THUMBSPIX', "Please specify at 10-140");
define('_MI_MYCKEDITOR_LANG_THUMBSTYPE', "(filemanege)Creating a thumbnail mode");
define('_MI_MYCKEDITOR_DESC_THUMBSTYPE', "auto: maintain the ratio of width x height , box:white square in the center of the mount position");

//version 0.06 add lines
define('_MI_MYCKEDITOR_LANG_PGRCACHEM', "(pgrfilemanager)pgrfilemanager Package treating images ");
define('_MI_MYCKEDITOR_DESC_PGRCACHEM', "GD:Using the PHP GD standard,ImageMagick:Possible to use ImageMagick");
define('_MI_MYCKEDITOR_LANG_OVERCOPY', "(pgrfilemanager)Allow to overwrite the same file when copying or moving images");
define('_MI_MYCKEDITOR_DESC_OVERCOPY', "Yes:copy files with the same name. No:If the file stops processing of the same name.");
define('_MI_MYCKEDITOR_LANG_USESITEIMG', "(pgrfilemanager)Use [siteimg] in ImageManager Integration");
define('_MI_MYCKEDITOR_DESC_USESITEIMG', "The Integrated Image Manager input [siteimg] instead of [img].<br />You have to hack module.textsanitizer.php for each module to enable tag of [siteimg]");

//version 0.07 add lines
define('_MI_MYCKEDITOR_LANG_USEREWRITE','enable mod_rewrite mode');
define('_MI_MYCKEDITOR_DESC_USEREWRITE','Depends your environment. If you turn this on, .htaccess.rewrite to .htaccess under XOOPS_ROOT_PATH/modules/(dirname)/');
define('_MI_MYCKEDITOR_LANG_USETRUSTIM','when save Image directory , use XOOPS_TRUST_PATH/uploads/myckeditor/');
define('_MI_MYCKEDITOR_DESC_USETRUSTIM','If you turn this on、you need enable mod_rewrite mode');
define('_MI_MYCKEDITOR_LANG_ROOTPATH','The base directory path for saving data');
define('_MI_MYCKEDITOR_DESC_ROOTPATH','You can specify a location other than '.htmlspecialchars( XOOPS_ROOT_PATH, ENT_QUOTES ).'/uploads/fckeditor<br/>You should then be created in advance writable.(in XOOPS_URL)Images must be able to access url.');
define('_MI_MYCKEDITOR_LANG_ROOTURL','URL to the base directory for saving data');
define('_MI_MYCKEDITOR_DESC_ROOTURL','If you change the directory path for data storage , please change it here<br/>'.htmlspecialchars(XOOPS_URL, ENT_QUOTES ).'/uploads/fckeditor');
define('_MI_MYCKEDITOR_LANG_CACHEPATH','The cache directory path');
define('_MI_MYCKEDITOR_DESC_CACHEPATH','You can specify a location other than '.htmlspecialchars( XOOPS_ROOT_PATH, ENT_QUOTES ).'/uploads/fckeditor/cache<br/>Finally, please end with /cache.(in XOOPS_URL)Images must be able to access url.');
define('_MI_MYCKEDITOR_LANG_CACHEURL','URL to the cache directory');
define('_MI_MYCKEDITOR_DESC_CACHEURL','If you change the directory path for cache data storage , please change it here<br/>'.htmlspecialchars(XOOPS_URL, ENT_QUOTES ).'/uploads/fckeditor/cache');

define("_MI_MYCKEDITOR_BTITLE_PHOTO","Image Block");

}
?>