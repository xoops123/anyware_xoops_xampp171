<?php

if( ! defined( 'XOOPS_ROOT_PATH' ) || ! defined( 'XOOPS_TRUST_PATH' )) exit ;
//---------
/*
 *  filename exsample 'test.jpg'
 */
function checkFileName( $filename )
{
	if(empty($filename)){
		return false;
	}
	//not duble comma
	if(preg_match("?".preg_quote("..")."?",$filename)){
		return false;
	}
	if(! preg_match("?[^a-zA-Z0-9".preg_quote("._ !@#$%^&()+={}][\',~`-")."]?",$filename)){
		return true;
	}
	return false;
}
/*
 *  filename exsample 'test.jpg'
 */
function checkFileNameForMultiLang( $filename )
{
	if(empty($filename)){
		return false;
	}
	if (strstr( $filename , chr(0) )){
		return false;
	}
	//not duble comma
	if(preg_match("?".preg_quote("..")."?",$filename)){
		return false;
	}
	if(preg_match("?".preg_quote("/")."?",$filename)){
		return false;
	}
	if(preg_match("?(\r\n|\n|\r)?",$filename)){
		return false;
	}
	return true;
}
/*
 *  dirname exsample '/test/test2'
 */
function checkDirName( $dirname )
{
//	return false;
	//root dir
	if(empty($dirname)){
		return true;
	}
	//not duble comma
	if(preg_match("?".preg_quote("..")."?",$dirname)){
		return false;
	}
	if($dirname == 'cache'){
		return false;
	}

	if(! preg_match("?[^a-zA-Z0-9/".preg_quote("._ !@#$%^&()+={}][\',~`-")."]?",$dirname)){
		return true;
	}
	return true;
}
function checkRealPathName( $directory )
{
	//	return false;
	//root dir
	if(empty($directory)){
		return true;
	}
	//not duble comma
	if(preg_match("?".preg_quote("..")."?",$directory)){
		return false;
	}
	//not in root directory FCK_UPLOAD_PATH
	if (strpos($directory, realpath(FCK_UPLOAD_PATH_BASE)) === false){
		return false;
	}
	if(! preg_match("?[^a-zA-Z0-9/:".preg_quote("._ !@#$%^&()+={}][\',~`-")."]?",$directory)){
		return true;
	}

	return false;
}

function checkallowedExtensions( $elem )
{
	require_once dirname(__FILE__) . '/config.php';
	require_once dirname(dirname(__FILE__)) . '/myconfig.php';
	//	return false;
	$allowed_str = PGRFileManagerConfig::$allowedExtensions;
	if (empty($allowed_str)){
		return true;
	}
	// Get extension from the uploaded file
	$extension = strtolower( substr( strrchr( $elem , '.' ) , 1 ) ) ;
//	exit($extension);
	$allowed_arr = explode('|',$allowed_str);
	//root dir
	if(in_array($extension,$allowed_arr)){
		return true;
	}
	return false;
}

//---------------------------------------------------------
function cacheGenerateFilename($filepath , $elem , $dispdirname){

	if (empty($elem) || empty($filepath)){
		return false;
	}
	if (($elem === '.') || ($elem === '..')){
		return false;
	}
	if(! checkFileName($elem)) {
		PGRFileManagerUtils::sendError("Can't cacheGenerateFilename ,checkFileName");
		return false;
	}
	if(! checkRealPathName($filepath)) {
		PGRFileManagerUtils::sendError("Can't cacheGenerateFilename ,checkRealPathName");
		return false;
	}
	if(basename($filepath) !== $elem){
		PGRFileManagerUtils::sendError("Can't cacheGenerateFilename ,filepath ?");
		return false;
	}

	require_once dirname(__FILE__) . '/config.php';
	require_once dirname(dirname(__FILE__)) . '/myconfig.php';
	require_once dirname(__FILE__) . '/utils.php';

	//	require_once(realpath( dirname(dirname(__FILE__)) . '/PGRThumb/myconfig.php'));
	require_once(realpath( dirname(dirname(__FILE__)) . '/PGRThumb/php/Config.php'));
	PGRThumb_Config::$pass = FCK_THUMB_PASS;

	require_once(realpath( dirname(dirname(__FILE__)) . '/PGRThumb/php/UrlThumb.php'));
	//ver0.07
	$sMyconfig=_getMyconfig();
	$cnf_thumbspixels = _getMyConfigParam($sMyconfig,'thumbspixels');
	$file = array();
	$file['filename'] = $elem;
	$file['md5'] = md5(@filemtime($filepath));
	$file['thumbsdelete'] = true;
	$file['filepath'] = $filepath;
	$params = "src=" . urlencode(PGRFileManagerConfig::$rootPath . $dispdirname . '/' .$elem)  . '&w='.$cnf_thumbspixels.'&h='.$cnf_thumbspixels.'&md5=' . $file['md5'];
	$cachedFile = PGRThumb_Cache::generateFilename($filepath,$params . '&hash=' . md5($params . PGRThumb_Config::$pass)) ;
	return $cachedFile;
}
function cacheGenerateFilePath($filepath , $elem , $dispdirname){

	$cachedFile = cacheGenerateFilename($filepath , $elem , $dispdirname);
	if (empty($cachedFile)){
		return false;
	}else{
		$cachedPath = realpath( FCK_CACHE_PATH . $cachedFile );
		return $cachedPath;
	}
}
function cachedelete($filepath , $elem , $dispdirname){

	$cachedPath = cacheGenerateFilePath($filepath , $elem , $dispdirname);
	if (empty($cachedPath)){
		return false;
	}else{
		if(file_exists($cachedPath)) {
			$ret = unlink($cachedPath);
		}
		return $ret;
	}
}

//---------------------------------------------------------------
function getEncodeFileName($filename){
	// Get extension from the uploaded file
	$extension = strtolower( substr( strrchr( $filename , '.' ) , 1 ) ) ;
	// create random name
//	$targetFile = FCK_USER_PREFIX_DEF . FCK_FILE_PREFIX . date( 'YmdHis' ) . substr( md5( uniqid( rand() , true ) ) , 0 , 8 ) . '.' . $extension ;
	$targetFile  = FCK_USER_PREFIX_DEF . FCK_FILE_PREFIX ;//10
	$targetFile .= date( 'YmdHis' ) ;//14
	$targetFile .= substr( md5( uniqid( rand() , true ) ) , 0 , 8 ) ;//8
		if (function_exists ( 'mb_convert_variables')){
			$conv_temp_str = mb_convert_encoding($filename,'UTF-8','auto');
		}else{
			$conv_temp_str = $filename;
		}
		$conv_temp_str = EncodeFileName($conv_temp_str) ;
		if (strlen($targetFile.$conv_temp_str.'.' . $extension) <= 200){
			$targetFile .=  $conv_temp_str ;
		}
	$targetFile .=  '.' . $extension ;

	return $targetFile;

}
function getDecodeFileName($elem){
	$ret = $elem;
	$extension =  substr( strrchr( $elem , '.' ) , 1 )  ;
	$elem_temp = substr($elem,0,-1*(strlen($extension)+1));
	if (preg_match('/^uid[0-9]{6}_/',$elem_temp)){
		$elem_temp = substr($elem_temp,strlen(FCK_USER_PREFIX_DEF . FCK_FILE_PREFIX));
		if (strlen($elem_temp) > 22){
			$elem_temp = substr($elem_temp,22);
			$ret = DecodeFileName($elem_temp);
		}else{
			$ret = $elem_temp.'.'.$extension;
		}
	}
	return $ret;
}

//---------------------------------------------------------------
// filename encoder (from pukiwiki)
function EncodeFileName($key)
{
	return ($key == '') ? '' : strtoupper(join('',unpack('H*0',$key)));
}

// filename decoder (from pukiwiki)
function DecodeFileName($key)
{
	return ($key == '') ? '' : substr(pack('H*','20202020'.$key),4);
}


function _getMyconfig()
{
	static $myconfigs;
	if (!empty($myconfigs)){
		return $myconfigs;
	}
	$ret = array();
	$mydirname = basename(dirname(dirname(dirname(__FILE__))));
	$hModule =& xoops_gethandler('module');
	$MyhModule =& $hModule->getByDirname($mydirname) ;
	if ( !is_object($MyhModule) ) {
		return $ret;
	}
	$hModConfig =& xoops_gethandler('config');
	$myconfigs =& $hModConfig->getConfigsByCat(0, $MyhModule->getVar( 'mid' ));
	return $myconfigs;
}
function _getMyConfigParam($configs, $name)
{
	$ret = '';
	if (empty($configs)){
		return $ret;
	}
	if (!isset($configs[$name])){
		return $ret;
	}
	if (empty($configs[$name])){
		return $ret;
	}
	$ret = trim($configs[$name]);
	return $ret;
}

?>