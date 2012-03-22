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

require_once dirname(__FILE__) . '/init.php';
require_once dirname(__FILE__) . '/utils.php';

//get dir from post
$directory = realpath(FCK_UPLOAD_PATH);

$relativePath = '';

//check if dir exist
if (!is_dir($directory)) {
	PGRFileManagerUtils::DieWithDebug("Can't find root directory");
}
//get command fun from post
$fun='' ;
if (isset($_POST['fun'])) {
	$fun=preg_replace( '?[^0-9a-zA-Z]?' , '' , @$_POST['fun'] ) ;
}

//check for extra function to do
if (!empty($fun) &&  PGRFileManagerConfig::$allowEdit) {

	//check for extra function to do
	switch ( $fun ){
		case 'deleteDir':

			if ( isset($_POST['dirname']) ) {
				if(! checkDirName($_POST['dirname']) ){
					PGRFileManagerUtils::DieWithDebug("Can't deleteDir ,directory name checked false");
				}
				$dirname = $_POST['dirname'];

				$dir = realpath($directory . $dirname);

				//check if dir is not a rootdir
				if ($dir === $directory) {
					PGRFileManagerUtils::DieWithDebug("Can't delete root directory");
				}
				//check if dir is in rootdir
				if (strpos($dir, $directory) !== 0) {
					PGRFileManagerUtils::DieWithDebug("Can't deleteDir ,not found directory in root");
				}

				//delete directory
				if(is_dir($dir)){
					$ret = PGRFileManagerUtils::deleteDirectory($dir);
					if (! $ret){
						PGRFileManagerUtils::sendError("Can't deleteDir false");
					}
				}

				echo json_encode(array(
				'res'     => 'OK',
				));
				exit(0);

//				$directory=realpath(PGRFileManagerConfig::$rootDir);
			}

			break;

		case 'addDir':

			if ( isset($_POST['dirname']) && isset($_POST['newDirname']) ) {
				if(! checkDirName($_POST['dirname'])){
					PGRFileManagerUtils::DieWithDebug("Can't addDir ,directory name checked false");
				}
				$dirname = $_POST['dirname'];
				if(! checkDirName($_POST['newDirname'])){
					PGRFileManagerUtils::DieWithDebug("Can't addDir ,new directory name checked false");
				}
				$newDirname = $_POST['newDirname'];

				$dirnameLength = strlen($newDirname);
				if($dirnameLength === 0){
					PGRFileManagerUtils::sendError("Can't addDir ,not found new directory name lgngth");
				}
				if($dirnameLength > 200){
					PGRFileManagerUtils::sendError("Can't addDir ,new directory is over 200 strings");
				}

				$dir = realpath($directory . $dirname);

				//check if dir is in rootdir
				if (strpos($dir, $directory) !== 0){
					PGRFileManagerUtils::DieWithDebug("Can't addDir ,not found this directory path in this directory");
				}
				if(is_dir($dir . '/' . basename($newDirname))){
					PGRFileManagerUtils::sendError("Can't addDir ,directory of the same name already exists");
				}

				if(is_dir($dir)){
					mkdir($dir . '/' . basename($newDirname));
				}
			}

			break;

		case 'renameDir':

			if ( isset($_POST['dirname']) && isset($_POST['newDirname']) ) {
				if(! checkDirName($_POST['dirname'])){
					PGRFileManagerUtils::DieWithDebug("Can't renameDir ,directory name checked false");
				}
				$dirname = $_POST['dirname'];
				if(! checkDirName($_POST['newDirname'])){
					PGRFileManagerUtils::DieWithDebug("Can't renameDir ,new directory name checked false");
				}
				$newDirname = $_POST['newDirname'];

				$dirnameLength = strlen($newDirname);
				if($dirnameLength === 0){
					PGRFileManagerUtils::sendError("Can't renameDir ,not found new directory name lgngth");
				}
				if($dirnameLength > 200){
					PGRFileManagerUtils::sendError("Can't renameDir ,new directory is over 200 strings");
				}

				$dir = realpath($directory . $dirname);

				//check if dir is not a rootdir
				if ($dir === $directory) {
					PGRFileManagerUtils::sendError("Can't renameDir ,root directory can't rename");
				}

				//check if dir is in rootdir
				if (strpos($dir, $directory) !== 0){
					PGRFileManagerUtils::sendError("Can't addDir ,not found this directory path in this directory");
				}

				if(is_dir($dir . '/../' . $newDirname)){
					PGRFileManagerUtils::sendError("Can't addDir ,directory of the same name already exists");
				}

				if(is_dir($dir)){

					//cache directory
					$cache_hash = cacheGenerateFilename($dir.'/dummy.jpg' , 'dummy.jpg' , '');
					$cache_dir_arr = explode('/',$cache_hash);
					PGRFileManagerUtils::deleteDirectory(realpath(FCK_CACHE_PATH . '/'.$cache_dir_arr[1]) , false);

					rename($dir, $dir . '/../' . $newDirname);
				}
			}
			break;


		case 'moveDir':

			if (isset($_POST['dir']) && isset($_POST['dirname']) && isset($_POST['toDir'])) {
				if(! checkDirName($_POST['dir'])){
					PGRFileManagerUtils::DieWithDebug("Can't moveDir ,directory name checked false");
				}
				if(! checkDirName($_POST['toDir'])){
					PGRFileManagerUtils::DieWithDebug("Can't moveDir ,directory name checked false");
				}
				if(! checkDirName($_POST['dirname'])){
					PGRFileManagerUtils::DieWithDebug("Can't moveDir ,directory name checked false");
				}
				$dir = realpath(PGRFileManagerConfig::$rootDir . $_POST['dir']);
				$targetDir = realpath(PGRFileManagerConfig::$rootDir . $_POST['toDir']);
				$dirname = basename($_POST['dirname']);
				//check if dir is in rootdir
				if(strpos($dir, $directory) !== 0){
					PGRFileManagerUtils::DieWithDebug("Can't moveDir,not find directory in root directory");
				}
				if(strpos($targetDir, $directory) !== 0){
					PGRFileManagerUtils::DieWithDebug("Can't moveDir,not find target directory in root directory");
				}
				if(strpos($targetDir . '/', $dir . '/') === 0){
					PGRFileManagerUtils::DieWithDebug("Can't moveDir, target directory is not in this directory");
				}

				if($dir === $targetDir){
					PGRFileManagerUtils::sendError("Can't moveDir ,this directory = target directory");
				}

				if(is_dir($targetDir . '/' . $dirname)){
					PGRFileManagerUtils::sendError("Can't moveDir,directory of the same name already exists");
				}

				if(is_dir($dir)){

					//cache directory
					$cache_hash = cacheGenerateFilename($dir.'/dummy.jpg' , 'dummy.jpg' , '');
					$cache_dir_arr = explode('/',$cache_hash);
					PGRFileManagerUtils::deleteDirectory(realpath(FCK_CACHE_PATH . '/'.$cache_dir_arr[1]) , false);

					rename($dir, $targetDir . '/' . $dirname);
				}
			}

			break;

	}
}

if (isset($_POST['fetchDir'])) {
	if(checkDirName($_POST['fetchDir']) && $_POST['fetchDir']){
		$dirname = $_POST['fetchDir'];

		$dir = realpath($directory . $dirname);

		//check if dir is not a rootdir
		if ($dir === $directory){
			PGRFileManagerUtils::DieWithDebug("Can't fetchDir,target directory is root directory");
		}
		//check if dir is in rootdir
		if (strpos($dir, $directory) !== 0){
			PGRFileManagerUtils::DieWithDebug("Can't fetchDir, target directory is not in this directory");
		}
		$directory = $dir;
		$relativePath = $dirname;

	}
}

$folders = array();
$depth = 0;

//group folders
function getFolders($dir, $relativePath)
{
	global $folders;
	global $depth;

	foreach (scandir($dir) as $elem) {

		if (($elem === '.') || ($elem === '..')) continue;
		$dirpath = $dir . '/' . $elem;
		if (is_dir($dirpath)) {
			if ($elem === 'cache' ) continue;

			$folder = array();
			$folder['dirname'] = $elem;
			$folder['shortname'] = (strlen($elem) > 17) ? substr($elem, 0, 17) . '...' : $elem;
			$folder['relativePath'] = $relativePath . '/' . $elem;
			$folder['depth'] = $depth;
			$folders[] = $folder;

			if ($depth < 1) {
				$depth++;
				getFolders($dirpath, $folder['relativePath']);
				$depth--;
			} else break;
		}
	}
}


getFolders($directory, $relativePath);

echo json_encode(array(
		'res'     => 'OK',
		'folders' => $folders
));

exit(0);