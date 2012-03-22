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
//check if upload is allowed

//this is  PGRThumb souce path url
PGRFileManagerConfig::$pgrThumbPath = XOOPS_MODULE_URL.'/myckeditor/pgrfilemanager/PGRThumb';


require_once(realpath(XOOPS_MODULE_PATH . '/myckeditor/pgrfilemanager/PGRThumb/myconfig.php'));

//initial get dir from post
if (isset($_POST['dir'])) {
	if(! checkDirName($_POST['dir'])){
		PGRFileManagerUtils::DieWithDebug("post directory name checked false");
	}
	$dispdirname = $_POST['dir'];
	$directory = realpath(PGRFileManagerConfig::$rootDir . $dispdirname );
} else {
	$dispdirname = '';
	$directory = realpath(PGRFileManagerConfig::$rootDir);
}


//check if dir exist
if (!is_dir($directory)) {
	$dispdirname = '';
	$directory = realpath(PGRFileManagerConfig::$rootDir);
}
//check if dir is in rootdir
if(strpos($directory, realpath(PGRFileManagerConfig::$rootDir)) !== 0){
	PGRFileManagerUtils::DieWithDebug("Can't find root directory");
}

//get command fun from post
$fun='' ;
if (isset($_POST['fun'])) {
	$fun=preg_replace( '?[^0-9a-zA-Z]?' , '' , @$_POST['fun'] ) ;
}

if (!empty($fun) && PGRFileManagerConfig::$allowEdit){

	//check for extra function to do
	switch ( $fun ){
		case 'deleteFiles':
			if (isset($_POST['files'])) {
				$files = str_replace("\\", "", $_POST['files']);
				$files = json_decode($files, true);

				filesdelete($directory,$files, $dispdirname);
			}
			break;

		case 'moveFiles':
			if ( isset($_POST['toDir']) && isset($_POST['files'])) {
				if(! checkDirName($_POST['toDir'])){
					PGRFileManagerUtils::DieWithDebug("Can't copyFiles ,directory name checked false");
				}

				$targetDirectory = realpath(PGRFileManagerConfig::$rootDir . $_POST['toDir']);
				//check if dir is in rootdir
				if(strpos($targetDirectory, realpath(PGRFileManagerConfig::$rootDir)) !== 0){
					PGRFileManagerUtils::DieWithDebug("Can't move files ,not find target directory in root directory");
				}
				if($directory === $targetDirectory){
					PGRFileManagerUtils::sendMessage("Can't move files ,this directory = target directory");
				}

				$files = str_replace("\\", "", $_POST['files']);
				$files = json_decode($files, true);

				filesmove($directory,$files,$targetDirectory, $dispdirname);

			}
			break;

		case 'copyFiles':
			if (isset($_POST['toDir']) && isset($_POST['files'])) {
				if(! checkDirName($_POST['toDir'])){
					PGRFileManagerUtils::DieWithDebug("Can't copy files ,directory name checked false");
				}

				$targetDirectory = realpath(PGRFileManagerConfig::$rootDir . $_POST['toDir']);
				//check if dir is in rootdir
				if(strpos($targetDirectory, realpath(PGRFileManagerConfig::$rootDir)) !== 0){
					PGRFileManagerUtils::DieWithDebug("Can't find target directory in root directory");
				}
				if($directory === $targetDirectory){
					PGRFileManagerUtils::sendError("Can't copy files ,this directory = target directory");
				}

				$files = str_replace("\\", "", $_POST['files']);
				$files = json_decode($files, true);

				filescopy($directory,$files,$targetDirectory, $dispdirname);

			}
			break;

		case 'renameFile':
			if (isset($_POST['filename']) && isset($_POST['newFilename'])) {

				$filename = basename($_POST['filename']);
				$newFilename = basename($_POST['newFilename']);

				//allowed chars
				if(! checkFileName($filename)){
					PGRFileManagerUtils::DieWithDebug("Can't rename this file name ,file name checked false");
				}

				if(! checkFileNameForMultiLang($newFilename)){
					PGRFileManagerUtils::sendError("Can't rename new file name ,file name checked false");
				}

				$fileLength = strlen($newFilename);
				if($fileLength === 0) {
					PGRFileManagerUtils::sendError("Can't renameFile ,not found new file name lgngth");
				}
				if($fileLength > 200) {
					PGRFileManagerUtils::sendError("Can't renameFile ,new filenam is over 200 strings");
				}
				// extension can not change
				$extension = strtolower( substr( strrchr( $filename , '.' ) , 1 ) ) ;
				$newextension = strtolower( substr( strrchr( $newFilename , '.' ) , 1 ) ) ;
				if($extension !== $newextension) {
					PGRFileManagerUtils::sendError("Can't change extension ,extension of new filenam not match");
				}

				$file = realpath($directory . '/' . $filename);

				//user prefix and encode
				$newFilename = getEncodeFileName($newFilename);
				$newFile = $directory . '/' . $newFilename;

				//check if file is in dir
				if(dirname($file) !== $directory){
					PGRFileManagerUtils::sendError("Can't rename ,not found this file in this directory");
				}
				if(file_exists($file) && !file_exists($newFile)) {
					@cachedelete($file,$filename, $dispdirname);
					rename($file, $newFile);
				}
			}
			break;

		case 'createThumb':
			if (isset($_POST['filename']) && isset($_POST['thumbWidth']) && isset($_POST['thumbHeight'])) {

				$filename = basename($_POST['filename']);
				if(! checkFileName($filename)){
					PGRFileManagerUtils::DieWithDebug("Can't createThumb ,file name checked false");
				}

				$thumbWidth = intval($_POST['thumbWidth']);
				$thumbHeight = intval($_POST['thumbHeight']);

				if (($thumbWidth >= 10) && ($thumbHeight >= 10)) {
					require_once(realpath(dirname(dirname(__FILE__)) . '/PGRThumb/php/Image.php'));
					$file = realpath($directory . '/' . $filename);
					$fileInfo = pathinfo($file);
					$image = PGRThumb_Image::factory($file);
					$image->maxSize($thumbWidth, $thumbHeight);

					//rename filename genarate
					$elem = getDecodeFileName($filename);
					$extension =  substr( strrchr( $elem , '.' ) , 1 )  ;
					$elem_temp = substr($elem,0,-1*(strlen($extension)+1));
					$elem_temp =  $thumbWidth . 'x' . $thumbHeight . $elem_temp.'.' . $extension;
					$newFilename = getEncodeFileName($elem_temp);

//					$image->saveImage($fileInfo['dirname'] . '/' . $fileInfo['filename']  . $thumbWidth . 'x' . $thumbHeight . '.' . $fileInfo['extension']);
					$image->saveImage($fileInfo['dirname'] . '/' . $newFilename );

				}
			}

			break;

		case 'rotateImage90Clockwise':
			if (isset($_POST['filename'])) {
				$filename = basename($_POST['filename']);
				if(! checkFileName($filename)){
					PGRFileManagerUtils::DieWithDebug("Can't rotateImage90Clockwise ,file name checked false");
				}

				require_once(realpath(dirname(dirname(__FILE__)) . '/PGRThumb/php/Image.php'));
				$file = realpath($directory . '/' . $filename);
				@cachedelete($file,$filename, $dispdirname);

				$image = PGRThumb_Image::factory($file);
				$image->rotate(-90);
				$image->saveImage($file);

			}
			break;

		case 'rotateImage90CounterClockwise':

			if (isset($_POST['filename'])) {
				$filename = basename($_POST['filename']);
				if(! checkFileName($filename)){
					PGRFileManagerUtils::DieWithDebug("Can't rotateImage90CounterClockwise ,file name checked false");
				}

				require_once(realpath(dirname(dirname(__FILE__)) . '/PGRThumb/php/Image.php'));
				$file = realpath($directory . '/' . $filename);
				@cachedelete($file,$filename, $dispdirname);

				$image = PGRThumb_Image::factory($file);
				$image->rotate(90);
				$image->saveImage($file);

			}

			break;
	}

}
//-----------------------file list
$files = array();
//group files
foreach (scandir($directory) as $elem) {
	if (($elem === '.') || ($elem === '..')) continue;
	//check file ext
	if (! checkallowedExtensions($elem)) {
			continue;
	}
	// uid prefix check
	if( FCK_ISADMIN !== true ) {
		if( ! strstr( $elem , FCK_USER_PREFIX_DEF ) ) continue ;
	}

	$filepath = $directory . '/' . $elem;
	if (is_file($filepath)) {
		$file = array();
		$file['filename'] = $elem;
		$extension =  substr( strrchr( $elem , '.' ) , 1 )  ;

	//		$file['shortname'] = (strlen($elem) > 17) ? substr($elem, 0, 17) . '...' : $elem;
		$file['filename_s'] =htmlspecialchars(xoops_substr($elem, 0, 20), ENT_QUOTES,_CHARSET);
		$file['shortname'] =htmlspecialchars(xoops_substr(getDecodeFileName($elem), 0, 20), ENT_QUOTES,_CHARSET);
		$file['filenamelistname'] =htmlspecialchars(getDecodeFileName($elem), ENT_QUOTES,_CHARSET);

		$file['shortname_row'] =getDecodeFileName($elem);

		$file['size'] = PGRFileManagerUtils::formatBytes(filesize($filepath));
		$file['filesize'] = filesize($filepath);
		if (PGRFileManagerConfig::$ckEditorExtensions != ''){
			$file['ckEdit'] = (preg_match('/^.*\.(' . PGRFileManagerConfig::$ckEditorExtensions . ')$/', strtolower($elem)) > 0);
		}else{
			$file['ckEdit'] = false;
		}
		$file['date'] = date('Y-m-d H:i:s', filemtime($filepath));
		$file['filemtime'] = filemtime($filepath);
		$file['md5'] = md5(filemtime($filepath));
		$file['imageInfo'] = PGRFileManagerUtils::getImageInfo($filepath);
		if ($file['imageInfo'] != false) {
			//ver0.07
			$file['type'] = $file['imageInfo']['type'];
			$sMyconfig=_getMyconfig();
			$cnf_thumbspixels = _getMyConfigParam($sMyconfig,'thumbspixels');

			$file['thumb'] = PGRFileManagerUtils::getPhpThumb("src=" . urlencode(PGRFileManagerConfig::$rootPath . $dispdirname . '/' .$elem) . '&w='.$cnf_thumbspixels.'&h='.$cnf_thumbspixels.'&md5=' . $file['md5']);
			$file['thumburl'] = cacheGenerateFilename($filepath,$elem,$dispdirname);
			$file['filepathencoded'] = EncodeFileName(str_replace(realpath(FCK_UPLOAD_PATH_BASE) , '' , realpath($filepath) ) ).'.'.$extension;
		}else{
			$file['thumb'] = false;
			$file['thumburl'] = false;
			$file['filepathencoded'] = false;
		}
		$files[] = $file;
	}
}
//usort($files, 'file_usersort');

echo json_encode(array(
	'res'     => 'OK',
	'files' => $files
));

//------------------------------------------------------------------------------------------
function file_usersort($a, $b)
{
	return strcmp($b['filename'], $a['filename']);
}
function filesdelete($directory,$files, $dispdirname){


	foreach ($files as $elem) {
		$file = array();

		if (($elem === '.') || ($elem === '..')){
			continue;
		}
		if (! checkallowedExtensions($elem)) {
			PGRFileManagerUtils::DieWithDebug("Can't delete file ,checkallowedExtensions");
			continue;
		}
		if(! checkFileName($elem)) {
			PGRFileManagerUtils::DieWithDebug("Can't delete file ,checkFileName");
			continue;
		}

		$filepath = realpath($directory . '/' . $elem);
		//check if file is in dir
		if(dirname($filepath) !== $directory){
			PGRFileManagerUtils::DieWithDebug("Can't delete file ,file path notfound in root ?");
		}
		if(! checkRealPathName($filepath)) {
			PGRFileManagerUtils::DieWithDebug("Can't delete file ,checkFileName");
			continue;
		}

		if(file_exists($filepath)){
			@cachedelete($filepath,$elem, $dispdirname);
			@unlink($filepath);
		}
	}
}
function filesmove($directory,$files,$targetDirectory, $dispdirname){
	$sMyconfig=_getMyconfig();

	foreach ($files as $filename) {
		if (($filename === '.') || ($filename === '..')) {
			continue;
		}

		$filename = basename($filename);
		if (! checkallowedExtensions($filename)) {
			PGRFileManagerUtils::DieWithDebug("Can't filesmove file ,checkallowedExtensions");
			continue;
		}
		if(! checkFileName($filename)){
			PGRFileManagerUtils::DieWithDebug("Can't filesmove file ,checkFileName");
			continue;
		}

		$file = realpath($directory . '/' . $filename);
		$newFile = $targetDirectory . '/' . $filename;

		//check if file is in dir
		if(dirname($file) !== $directory){
			PGRFileManagerUtils::DieWithDebug("Can't filesmove file ,not found file in this dir");
			continue;
		}

		$cnf_allowovercopy = _getMyConfigParam($sMyconfig,'overcopy');
		if(!$cnf_allowovercopy){
			if(file_exists($newFile)){
				PGRFileManagerUtils::sendError("Can't filesmove file ,". htmlspecialchars( $filename, ENT_QUOTES)." of the same name already exists");
				continue;
			}
		}

		if(file_exists($file) ) {
			@cachedelete($file,$filename, $dispdirname);
			@rename($file, $newFile);
		}
	}

}
function filescopy($directory,$files,$targetDirectory, $dispdirname){
	$sMyconfig=_getMyconfig();

	foreach ($files as $filename) {
		if (($filename === '.') || ($filename === '..')) {
			continue;
		}

		$filename = basename($filename);
		if (! checkallowedExtensions($filename)) {
			PGRFileManagerUtils::DieWithDebug("Can't copy file ,checkallowedExtensions");
			continue;
		}
		if(! checkFileName($filename)){
			PGRFileManagerUtils::DieWithDebug("Can't copy file ,checkFileName");
			continue;
		}

		$file = realpath($directory . '/' . $filename);
		$newFile = $targetDirectory . '/' . $filename;

		//check if file is in dir
		if(dirname($file) !== $directory) {
			PGRFileManagerUtils::DieWithDebug("Stop copy file ". htmlspecialchars( $directory, ENT_QUOTES).",not found file in this dir");
			continue;
		}

		$cnf_allowovercopy = _getMyConfigParam($sMyconfig,'overcopy');
		if(!$cnf_allowovercopy){
			if(file_exists($newFile)){
				PGRFileManagerUtils::sendError("Stop copy file ,". htmlspecialchars( $filename, ENT_QUOTES)." of the same name already exists");
				continue;
			}
		}

		if(file_exists($file)) {
			$mtime = filemtime($file);
			$atime = fileatime($file);
			copy($file, $newFile);
			touch($newFile , $mtime , $atime);
		}
	}

}

exit(0);
?>