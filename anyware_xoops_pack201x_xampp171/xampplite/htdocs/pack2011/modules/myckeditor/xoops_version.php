<?php
/**
 * @file xoops_version.php
 * @package myckeditor
 * @version $Id: ver0.07 2012/01/03 00:25:00 domifara $
 */

if (!defined('XOOPS_ROOT_PATH')) exit();

//
// Define a basic manifesto.
//
$modversion['name'] = _MI_MYCKEDITOR_LANG_MYCKEDITOR;
$modversion['version'] = 0.09;//ver0.07beta1
$modversion['description'] = _MI_MYCKEDITOR_DESC_MYCKEDITOR;
$modversion['author'] = "HIKAWA Kilica http://xoopsdev.com/ , domifara";
$modversion['credits'] = "HIKAWA Kilica , domifara";
$modversion['help'] = "CHANGES.html";
$modversion['license'] = "GPL";
$modversion['official'] = 0;
$modversion['image'] = 'module_icon.php'; //domifara "images/mydhtml.png";
$modversion['dirname'] = "myckeditor";

$modversion['cube_style'] = true;
$modversion['disable_legacy_2nd_installer'] = false;

// TODO After you made your SQL, remove the following comment-out.
// $modversion['sqlfile']['mysql'] = "sql/mysql.sql";
##[cubson:tables]
##[/cubson:tables]

//
// Templates. You must never change [cubson] chunk to get the help of cubson.
//
if (defined('LEGACY_MODULE_VERSION') && version_compare(LEGACY_MODULE_VERSION, '2.2', '>=')) {
$modversion['templates'][1]['file'] = 'myckeditor_textarea.html';
$modversion['templates'][1]['description'] = 'myckeditor_textarea.html';
$modversion['templates'][2]['file'] = 'myckeditor_textarea_bbcode.html';
$modversion['templates'][2]['description'] = 'myckeditor_textarea_bbcode.html';
}
##[cubson:templates]
##[/cubson:templates]

//
// Admin panel setting
//
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/index.php";
//$modversion['adminmenu'] = "admin/menu.php";

//
// Public side control setting
//
$modversion['hasMain'] = 0;
// $modversion['sub'][]['name'] = "";
// $modversion['sub'][]['url'] = "";

// Blocks
$modversion['blocks'][1] = array(
	'file'			=> 'myckeditor_blocks_photo.php' ,
	'name'			=> _MI_MYCKEDITOR_BTITLE_PHOTO ,
	'description'	=> '' ,
	'show_func'		=> 'b_myckeditor_blocks_photo_show' ,
	'edit_func'		=> 'b_myckeditor_blocks_photo_edit' ,
	'options'		=> "/uploads/fckeditor|/uploads/fckeditor/cache|0|5|5|thumbnail|0|filetime" ,
	'template'		=> 'myckeditor_blocks_photo.html' ,
	'can_clone'		=> true ,
) ;


// module config
$modversion['config'][1] = array(
	'name' => 'filemanager',
	'title' => '_MI_MYCKEDITOR_LANG_FMANAGER',
	'description' => '_MI_MYCKEDITOR_DESC_FMANAGER',
	'formtype' => 'select',
	'valuetype' => 'text',
	'default'=> "filemanager" ,
	'options' => array(
					'none'=>'none',
					'filemanager'=>'filemanager',
					'pgrfilemanager'=>'pgrfilemanager'
				)
);
$modversion['config'][2] = array(
	'name' => 'flashmanager',
	'title' => '_MI_MYCKEDITOR_LANG_FLASHM',
	'description' => '_MI_MYCKEDITOR_DESC_FLASHM',
	'formtype' => 'select',
	'valuetype' => 'text',
	'default'=> "none" ,
	'options' => array(
					'none'=>'none',
					'pgrfilemanager'=>'pgrfilemanager'
					)
);
$modversion['config'][3] = array(
	'name' => 'imagemanager',
	'title' => '_MI_MYCKEDITOR_LANG_IMANAGER',
	'description' => '_MI_MYCKEDITOR_DESC_IMANAGER',
	'formtype' => 'select',
	'valuetype' => 'text',
	'default'=> "pgrfilemanager" ,
	'options' => array(
					'none'=>'none',
					'filemanager'=>'filemanager',
					'imagemager'=>'imagemager',
					'pgrfilemanager'=>'pgrfilemanager'
					)
);
$modversion['config'][4] = array(
	'name'			=> 'uploadablegruops' ,
	'title'			=> '_MI_MYCKEDITOR_LANG_FM_ALLOW' ,
	'description'	=> '_MI_MYCKEDITOR_DESC_FM_ALLOW' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> '' ,
	'options'		=> array()
) ;
$modversion['config'][5] = array(
	'name'			=> 'imallowgruops' ,
	'title'			=> '_MI_MYCKEDITOR_LANG_IM_ALLOW' ,
	'description'	=> '_MI_MYCKEDITOR_DESC_IM_ALLOW' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> '' ,
	'options'		=> array()
) ;
$modversion['config'][6] = array(
	'name'			=> 'fckdigits4userdir' ,
	'title'			=> '_MI_MYCKEDITOR_LANG_4USERDIR' ,
	'description'	=> '_MI_MYCKEDITOR_DESC_4USERDIR' ,
	'formtype'		=> 'yesno' ,
	'valuetype'		=> 'int' ,
	'default'		=> 0 ,
	'options'		=> array()
) ;
$modversion['config'][7] = array(
	'name'			=> 'entermode' ,
	'title'			=> '_MI_MYCKEDITOR_LANG_ENTERMODE' ,
	'description'	=> '_MI_MYCKEDITOR_DESC_ENTERMODE' ,
	'formtype'		=> 'yesno' ,
	'valuetype'		=> 'int' ,
	'default'		=> 0 ,
	'options'		=> array()
) ;
$modversion['config'][8] = array(
	'name'			=> 'resizebyimagemagick' ,
	'title'			=> '_MI_MYCKEDITOR_LANG_RESIZE' ,
	'description'	=> '_MI_MYCKEDITOR_DESC_RESIZE' ,
	'formtype'		=> 'yesno' ,
	'valuetype'		=> 'int' ,
	'default'		=> 0 ,
	'options'		=> array()
) ;
$modversion['config'][9] = array(
	'name'			=> 'resizepixels' ,
	'title'			=> '_MI_MYCKEDITOR_LANG_RESIZEPIX' ,
	'description'	=> '_MI_MYCKEDITOR_DESC_RESIZEPIX' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> '480' ,
	'options'		=> array()
) ;
$modversion['config'][10] = array(
	'name'			=> 'thumbsbyimagemagick' ,
	'title'			=> '_MI_MYCKEDITOR_LANG_THUMBS' ,
	'description'	=> '_MI_MYCKEDITOR_DESC_THUMBS' ,
	'formtype'		=> 'yesno' ,
	'valuetype'		=> 'int' ,
	'default'		=> 0 ,
	'options'		=> array()
) ;
$modversion['config'][11] = array(
	'name'			=> 'thumbspixels' ,
	'title'			=> '_MI_MYCKEDITOR_LANG_THUMBSPIX' ,
	'description'	=> '_MI_MYCKEDITOR_DESC_THUMBSPIX' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> '64' ,
	'options'		=> array()
) ;
$modversion['config'][12] = array(
	'name'			=> 'thumbstype',
	'title'			=> '_MI_MYCKEDITOR_LANG_THUMBSTYPE',
	'description'	=> '_MI_MYCKEDITOR_DESC_THUMBSTYPE',
	'formtype'		=> 'select',
	'valuetype'		=> 'text',
	'default'		=> "auto" ,
	'options'		=> array(
					'auto'=>'auto',
					'box'=>'box'
					)
);
$modversion['config'][13] = array(
	'name'			=> 'pgrthumbmode',
	'title'			=> '_MI_MYCKEDITOR_LANG_PGRCACHEM',
	'description'	=> '_MI_MYCKEDITOR_DESC_PGRCACHEM',
	'formtype'		=> 'select',
	'valuetype'		=> 'text',
	'default'		=> "GD" ,
	'options'		=> array(
					'GD'=>'GD',
					'ImageMagick'=>'ImageMagick'
					)
);
$modversion['config'][14] = array(
	'name'			=> 'overcopy' ,
	'title'			=> '_MI_MYCKEDITOR_LANG_OVERCOPY' ,
	'description'	=> '_MI_MYCKEDITOR_DESC_OVERCOPY' ,
	'formtype' =>	'yesno' ,
	'valuetype'		=> 'int' ,
	'default'		=> 0 ,
	'options'		=> array()
) ;
$modversion['config'][15] = array(
	'name'			=> 'usesiteimg' ,
	'title'			=> '_MI_MYCKEDITOR_LANG_USESITEIMG' ,
	'description'	=> '_MI_MYCKEDITOR_DESC_USESITEIMG' ,
	'formtype'		=> 'yesno' ,
	'valuetype'		=> 'int' ,
	'default'		=> 0 ,
	'options'		=> array()
) ;
//directory
if (!defined('XOOPS_UPLOAD_PATH')) {
	define('XOOPS_UPLOAD_PATH', XOOPS_ROOT_PATH . '/uploads');
}
if (!defined('XOOPS_UPLOAD_URL')) {
	define('XOOPS_UPLOAD_URL', XOOPS_URL . '/uploads');
}

$modversion['config'][16] = array(
	'name'			=> 'rootpath' ,
	'title'			=> '_MI_MYCKEDITOR_LANG_ROOTPATH' ,
	'description'	=> '_MI_MYCKEDITOR_DESC_ROOTPATH' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> XOOPS_UPLOAD_PATH.'/fckeditor' ,
	'options'		=> array()
) ;
$modversion['config'][17] = array(
	'name'			=> 'rooturl' ,
	'title'			=> '_MI_MYCKEDITOR_LANG_ROOTURL' ,
	'description'	=> '_MI_MYCKEDITOR_DESC_ROOTURL' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> XOOPS_UPLOAD_URL.'/fckeditor' ,
	'options'		=> array()
) ;
$modversion['config'][18] = array(
	'name'			=> 'cachepath' ,
	'title'			=> '_MI_MYCKEDITOR_LANG_CACHEPATH' ,
	'description'	=> '_MI_MYCKEDITOR_DESC_CACHEPATH' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> XOOPS_UPLOAD_PATH.'/fckeditor/cache' ,
	'options'		=> array()
) ;
$modversion['config'][19] = array(
	'name'			=> 'cacheurl' ,
	'title'			=> '_MI_MYCKEDITOR_LANG_CACHEURL' ,
	'description'	=> '_MI_MYCKEDITOR_DESC_CACHEURL' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> XOOPS_UPLOAD_URL.'/fckeditor/cache' ,
	'options'		=> array()
) ;
$modversion['config'][20] = array(
	'name'			=> 'userewrite' ,
	'title'			=> '_MI_MYCKEDITOR_LANG_USEREWRITE' ,
	'description'	=> '_MI_MYCKEDITOR_DESC_USEREWRITE' ,
	'formtype'		=> 'yesno' ,
	'valuetype'		=> 'int' ,
	'default'		=> 0 ,
	'options'		=> array()
) ;
$modversion['config'][21] = array(
	'name'			=> 'usetrustim' ,
	'title'			=> '_MI_MYCKEDITOR_LANG_USETRUSTIM' ,
	'description'	=> '_MI_MYCKEDITOR_DESC_USETRUSTIM' ,
	'formtype'		=> 'yesno' ,
	'valuetype'		=> 'int' ,
	'default'		=> 0 ,
	'options'		=> array()
) ;

?>