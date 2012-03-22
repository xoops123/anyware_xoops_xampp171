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

$sCommand=preg_replace( '?[^a-zA-Z]?' , '' , @$_GET['command'] ) ;
//QuickUpload is GET param for CKEditor
if ( $sCommand !=='QuickUpload' ){

	if ( !empty( $_FILES['Filedata'] ) && !empty( $_FILES['Filedata']['tmp_name'] ) && !empty( $_FILES['Filedata']['name'] )  ) {
		if (! is_uploaded_file( $_FILES['Filedata']['tmp_name'] ) ) {
			die();
		}
		$sss_files =  $_FILES['Filedata'];
	}else{
		die();
	}
	//pgrfilemanager upload value backup
	if (isset($_POST['dir'])){
		if(preg_match("?".preg_quote("..")."?",$_POST['dir'])){
			die();
		}
		if(preg_match("?[^a-zA-Z0-9/".preg_quote("_ !@#$%^&()+={}][\',~`-")."]?",$_POST['dir'])){
			die();
		}
		$sss_dir = $_POST['dir'] ;
	}else{
		$sss_dir = '';
	}

	//session destroy
	session_destroy();
}

//-------------- for xoops session start ------------//
require '../../../../mainfile.php' ;
if (isset($GLOBALS['xoopsLogger'])){
	$versions = array_map( 'intval' , explode( '.' , preg_replace( '/[^0-9.]/' , '' , XOOPS_VERSION ) ) ) ;
	if( $versions[0] == 2 && $versions[1] >= 5 ) {
		$GLOBALS['xoopsLogger']->activated = false;
	}
}

require_once dirname(__FILE__) . '/config_and_auth.inc.dist.php';

require_once dirname(__FILE__) . '/init.php';
require_once dirname(__FILE__) . '/utils.php';

//for CKEditor
if ( $sCommand ==='QuickUpload' ){
	unset($_POST['dir']);//root directory
	$ckEditorFuncNum = intval(preg_replace( '?[^0-9]?' , '' , @$_GET['CKEditorFuncNum'] ))  ;
	$type = trim(preg_replace( '?[^a-zA-Z]?' , '' , @$_GET['type'] )) ;
	if (empty($_FILES)) {
			die();
	}
	if ( !empty( $_FILES['upload'] ) && !empty( $_FILES['upload']['tmp_name'] ) && !empty( $_FILES['upload']['name'] )  ) {
		if (! is_uploaded_file( $_FILES['upload']['tmp_name'] ) ) {
			die();
		}
		$_FILES['Filedata'] =  $_FILES['upload'];
	}else{
			die();
	}
	if (empty($type)) {
		exit('empty File Type');
	}


}else{
	if(! checkDirName($sss_dir)){
		die("Can't upload ,directory name checked false");
	}
	$_POST['dir'] = $sss_dir;
	$_FILES['Filedata'] = $sss_files;
}

//check if upload is allowed
if (!PGRFileManagerConfig::$allowEdit){
	exit('Not allowed!');
}

//get dir from GET
if (! empty($sss_dir)) {
	$directory = realpath(FCK_UPLOAD_PATH .$sss_dir );

} else {
	$directory = realpath(FCK_UPLOAD_PATH);
}

//check if dir exist
if (!is_dir($directory)){
	exit('not Dir');
}

//check if dir is in rootdir
if (strpos($directory, realpath(FCK_UPLOAD_PATH)) === false){
	exit('not match Dir');
}

if (empty($_FILES)) {
	exit('not found File');
}

	$tempFile = $_FILES['Filedata']['tmp_name'];

	// Get extension from the uploaded file
	$extension = strtolower( substr( strrchr( $_FILES['Filedata']['name'] , '.' ) , 1 ) ) ;
	// create random name
//	$targetFile = FCK_USER_PREFIX_DEF . FCK_FILE_PREFIX . date( 'YmdHis' ) . substr( md5( uniqid( rand() , true ) ) , 0 , 8 ) . '.' . $extension ;
	$targetFile = getEncodeFileName($_FILES['Filedata']['name']);

	$targetFile =  $directory . DIRECTORY_SEPARATOR . $targetFile;

	if (strpos($targetFile, realpath(FCK_UPLOAD_PATH)) === false){
		exit('not found File');
	}


	// Validate the file size (Warning: the largest files supported by this code is 2GB)
	$file_size = filesize($tempFile);
	if (!$file_size ){
		exit('file size not found file='.$tempFile);
	}
	if ($file_size > PGRFileManagerConfig::$fileMaxSize){
		exit('file size limted over size'.$file_size.' > MAX '.PGRFileManagerConfig::$fileMaxSize);
	}

	//check file ext
	if (PGRFileManagerConfig::$allowedExtensions != "") {
		$allowed_Extensions =PGRFileManagerConfig::$allowedExtensions;
		$allowed_Extensions_arr = explode ( '|' , $allowed_Extensions);
		if(! in_array($extension, $allowed_Extensions_arr)) {
			if ( $sCommand=='QuickUpload' ){
				header("HTTP/1.0");
				echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($ckEditorFuncNum, '', 'Error: not allowed Extensions ".htmlspecialchars( $targetFile , ENT_QUOTES )." ');</script>";
				exit();
			}else{
				exit('Error: not allowed Extensions '.htmlspecialchars( $targetFile , ENT_QUOTES ));
			}
		}
	}else{
		if ( FCK_ISADMIN === true  && PGRFILEMANAGER_DEBUG_SW === 1 ){
			//ok all file
		}else{
			exit('not allow');
		}
	}

	$upload_result = move_uploaded_file($tempFile,$targetFile);

	if(! $upload_result ){
		if ( $sCommand=='QuickUpload' ){
			$number = 202;
			header("HTTP/1.0");
			echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($ckEditorFuncNum, '', 'Error ".$number." ".htmlspecialchars( $targetFile , ENT_QUOTES )." ');</script>";
			exit('upload false');
		}else{
			die("Can't upload , false ".htmlspecialchars( $targetFile , ENT_QUOTES ));
		}
	}
	//if image check size, and rescale if necessary
if ( FCK_UPLOAD_RESIZE != 0 ){
	try{
		if (preg_match('/^.*\.(jpg|gif|jpeg|png|bmp)$/', strtolower($targetFile)) > 0) {
			$targetFile = realpath($targetFile);
			$imageInfo = PGRFileManagerUtils::getImageInfo($targetFile);
			$re_imageMaxHeight=PGRFileManagerConfig::$imageMaxHeight;
			$re_imageMaxWidth=PGRFileManagerConfig::$imageMaxWidth;
			if (($imageInfo !== false) &&
				(($imageInfo['height'] > $re_imageMaxHeight) ||
				($imageInfo['width'] > $re_imageMaxWidth))) {
					require_once(realpath(dirname(dirname(__FILE__)) . '/PGRThumb/php/Image.php'));
					$image = PGRThumb_Image::factory($targetFile);
					$image->maxSize($re_imageMaxWidth, $re_imageMaxHeight);
					$image->saveImage($targetFile);
				}
		}
	} catch(Exception $e) {
			//todo
		if ( $sCommand=='QuickUpload' ){
			header("HTTP/1.0");
			echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($ckEditorFuncNum, '', 'Error size ".PGRFileManagerConfig::$imageMaxHeight.htmlspecialchars( $targetFile , ENT_QUOTES )." ');</script>";
			exit('upload false MaxHeight='.PGRFileManagerConfig::$imageMaxHeight);
		}
	}
}
	@chmod( $targetFile , 0644 ) ;

/*
	if ( $sCommand=='QuickUpload' ){
		header("HTTP/1.0");
		echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($ckEditorFuncNum, '', 'Error size ".PGRFileManagerConfig::$imageMaxHeight.htmlspecialchars( $targetFile , ENT_QUOTES )." ');</script>";
		exit('upload false MaxHeight='.PGRFileManagerConfig::$imageMaxHeight);
	}
*/

	if ( $sCommand=='QuickUpload' ){
		$mydirname = basename(dirname(dirname(dirname(__FILE__))));
		$sMyconfig=_getMyconfig();
		$userewrite = _getMyConfigParam($sMyconfig,'userewrite');
		if (!empty($userewrite)) {
			$row_extension =  substr( strrchr( $targetFile , '.' ) , 1 )  ;
			$img_hash = EncodeFileName(str_replace(realpath(FCK_UPLOAD_PATH_BASE) , '' , $targetFile ));
			header("HTTP/1.0");
			echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction(".$ckEditorFuncNum.", '".XOOPS_MODULE_URL."/".$mydirname."/imageid".$img_hash.".".$row_extension."');</script>";
		}else{
			header("HTTP/1.0");
			echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction(".$ckEditorFuncNum.", '".FCK_UPLOAD_URL."/".basename($targetFile)."');</script>";
		}
	}


exit();
?>