<?php
/*
Copyright (c) 2009 Grzegorz Żydek

This file is part of PGRFileManager v2.1.0

Permission is hereby granted, free of charge, to any person obtaining a copy
of PGRFileManager and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

PGRFileManager IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/
if (!defined('XOOPS_ROOT_PATH')) exit();

require_once dirname(__FILE__) . '/config_and_auth.inc.dist.php';

require_once dirname(__FILE__) . '/config.php';
require_once dirname(dirname(__FILE__)) . '/myconfig.php';
PGRFileManagerConfig::$rootDir = PGRFileManagerConfig::$rootPath;
//check if user is user dir only allowed
if (FCK_ISADMIN !== true){
	if (intval(basename(PGRFileManagerConfig::$rootDir)) !=$GLOBALS['xoopsUser']->uid()){
		exit;
	}
}

//Lang
if (isset($_GET['langCode'])) {
	$PGRLang = trim(preg_replace( '?[^a-zA-Z_-]?' , '' , @$_GET['langCode'] ));
} else {
	$PGRLang = 'en';
}

//include_once dirname(__FILE__) . '/auth.php';

//$PGRUploaderDescription = 'all files';

//For fckeditor
	if (isset($_POST['type'])){
		$type = trim(preg_replace( '?[^a-zA-Z]?' , '' , @$_POST['type'] )) ;
	}else{
		$type = trim(preg_replace( '?[^a-zA-Z]?' , '' , @$_GET['type'] )) ;
	}
	if ($type === 'Image') {
		$extensions = implode('|',$GLOBALS['fck_resource_type_extensions']['Image']);
		PGRFileManagerConfig::$allowedExtensions = $extensions;
		$PGRUploaderDescription = 'images';
		$PGRUploaderType = 'Image';
	} else if ($type === 'Flash') {
		$extensions = implode('|',$GLOBALS['fck_resource_type_extensions']['Flash']);
		PGRFileManagerConfig::$allowedExtensions = $extensions;
		$PGRUploaderDescription = 'flash';
		$PGRUploaderType = 'Flash';
	} else if ($type === 'File') {
		if ( FCK_ISADMIN === true ){
			if ( PGRFILEMANAGER_DEBUG_SW === 1 ){
				PGRFileManagerConfig::$allowedExtensions = '';
				$PGRUploaderDescription = 'all files';
			}else{
				$extensions = implode('|',array_keys($GLOBALS['fck_allowed_extensions']));
				PGRFileManagerConfig::$allowedExtensions = $extensions;
				$PGRUploaderDescription = 'File';
			}
		}else{
			$extensions = implode('|',array_keys($GLOBALS['fck_allowed_extensions']));
			PGRFileManagerConfig::$allowedExtensions = $extensions;
			$PGRUploaderDescription = 'File';
			$PGRUploaderType = 'File';
		}
	} else { //File
		$PGRUploaderType = '';
		if ( FCK_ISADMIN === true ){
			if ( PGRFILEMANAGER_DEBUG_SW === 1 ){
				PGRFileManagerConfig::$allowedExtensions = '';
				$PGRUploaderDescription = 'all files';
			}else{
				$extensions = implode('|',array_keys($GLOBALS['fck_allowed_extensions']));
				PGRFileManagerConfig::$allowedExtensions = $extensions;
				$PGRUploaderDescription = 'all files';
			}
		}else{
//			$PGRUploaderDescription = 'not allow';
			$extensions = implode('|',array_keys($GLOBALS['fck_allowed_extensions']));
			PGRFileManagerConfig::$allowedExtensions = $extensions;
			$PGRUploaderDescription = 'File';
			$PGRUploaderType = 'File';
		}
	}

//for ckeditor
if (isset($_GET['CKEditorFuncNum'])) {
	$ckEditorFuncNum = intval(preg_replace( '?[^0-9]?' , '' , @$_GET['CKEditorFuncNum'] ))  ;
} else {
	$ckEditorFuncNum = '1';
}

//for PHP <= 5.2.0 json
include_once dirname(__FILE__) . '/json.php';
