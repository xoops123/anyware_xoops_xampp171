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

require_once dirname(__FILE__) . '/config_and_auth.inc.dist.php';

if (isset($GLOBALS['xoopsLogger'])){
	$versions = array_map( 'intval' , explode( '.' , preg_replace( '/[^0-9.]/' , '' , XOOPS_VERSION ) ) ) ;
	if( $versions[0] == 2 && $versions[1] >= 5 ) {
		$GLOBALS['xoopsLogger']->activated = false;
	}
}

require_once dirname(__FILE__) . '/init.php';

//get dir from GET
if (isset($_GET['dir'])) {
	if(! checkDirName($_GET['dir'])){
		die();
	}
	$directory = realpath(PGRFileManagerConfig::$rootDir . $_GET['dir']);

}else{
	die();
}
//check if dir exist
if (!is_dir($directory)) die();

//check if dir is in rootdir
if (strpos($directory, realpath(PGRFileManagerConfig::$rootDir)) === false) die();

if (!isset($_GET['filename'])) die();
if(! checkFileName($_GET['filename'])){
	die();
}

$filename = realpath($directory . '/' . $_GET['filename']);
//check if file is in dir
if(dirname($filename) !== $directory) die();
if(! checkRealPathName($filename)){
	die();
}

// required for IE, otherwise Content-disposition is ignored
if(ini_get('zlib.output_compression'))
  ini_set('zlib.output_compression', 'Off');

// addition by Jorg Weske
$extension = strtolower(substr(strrchr($filename,"."),1));


if( empty($filename) ){
  echo "<html><title></title><body>ERROR: download file NOT SPECIFIED</body></html>";
  exit;
}elseif ( ! file_exists( $filename ) ){
  echo "<html><title></title><body>ERROR: File not found</body></html>";
  exit;
};
$allowed_Extensions =PGRFileManagerConfig::$allowedExtensions;
$allowed_Extensions_arr = explode ( '|' , $allowed_Extensions);
if(! in_array($extension, $allowed_Extensions_arr)) {
  echo "<html><title></title><body>ERROR: download file NOT Extensions</body></html>";
  exit;
}

if (array_key_exists($extension, $GLOBALS['fck_allowed_extensions'])) {
	$ctype=$GLOBALS['fck_allowed_extensions'][$extension];
}else{
	$ctype="application/force-download";
}


header("Pragma: public"); // required
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false); // required for certain browsers
header("Content-Type: $ctype");
// change, added quotes to allow spaces in filenames, by Rajkumar Singh
header("Content-Disposition: attachment; filename=\"".getDecodeFileName(basename($filename))."\";" );
header("Content-Transfer-Encoding: binary");
header("Content-Length: ".filesize($filename));
readfile("$filename");
exit();