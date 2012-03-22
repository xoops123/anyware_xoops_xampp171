<?php
// $Id: makescript.php ver0.05b 2011/07/08 20:22:00 domifara Exp $
/**
 * @file
 * @package myckeditor
 * @version $Id$
 */

if (!defined('XOOPS_ROOT_PATH')) exit();

class MyckeditorMakescriptHandler
{
	protected $_mCoreType = "";

	/**
	 *	 __construct
	*/
	public function __construct(&$controller)
	{
		if (defined('LEGACY_MODULE_VERSION') && version_compare(LEGACY_MODULE_VERSION, '2.2', '>=')) {
			$this->_mCoreType = "XCL22";
		}elseif( preg_match('/XOOPS Cube Legacy 2\.1/', XOOPS_VERSION) ){
			$this->_mCoreType = "XCL21";
		}else{
			$versions = array_map( 'intval' , explode( '.' , preg_replace( '/[^0-9.]/' , '' , XOOPS_VERSION ) ) ) ;
			if( $versions[0] == 2 && $versions[1] == 2 ) {
				$this->_mCoreType = "X22";
			} else if( $versions[0] == 2 && $versions[1] == 0 && $versions[2] > 13 ) {
				$this->_mCoreType = "XOOPS2";
			} else if( $versions[0] == 2 && $versions[1] >= 5 ) {
				$this->_mCoreType = "X25";
			} else if( $versions[0] == 2 && $versions[1] > 2 ) {
				$this->_mCoreType ="X23";
			} else {
				$this->_mCoreType = "XOOPS2";
			}
		}
	}
	/**
	 *	 makeheader
	*/
	public function makeheader($params)
	{
		switch( $this->_mCoreType ) {
			case "XCL22" :
				$_makescript = & xoops_getmodulehandler('makescriptFORXCL22','myckeditor');
				break ;
			case "XCL21" :
				$_makescript = & xoops_getmodulehandler('makescriptFORXCL21','myckeditor');
				break ;
			case "XOOPS2" :
				$_makescript = & xoops_getmodulehandler('makescriptFORX20','myckeditor');
				break ;
			case "X25" :
				$_makescript = & xoops_getmodulehandler('makescriptFORX25','myckeditor');
				break ;
			default :
				$_makescript = & xoops_getmodulehandler('makescriptFORX20','myckeditor');
				break ;
		}
		$_makescript->makeheader($params);
	}

	/**
	 *	getisAdmin
	*/
	public function getisAdmin()
	{
		return false;
	}
	/**
	 *	getmylanguage
	*/
	public function getmylanguage()
	{
		return '';
	}
	/**
	 *	@protected _addScript
	*/
	public function getckEXTconfig($params)
	{

		$mydirname = basename(dirname(dirname(__FILE__)));
		$mydirPath = dirname(dirname(__FILE__));

		//get module configs
		$sMyconfig=$this->_getMyconfig();

//add CKEditor EXTconfig start
		$ckEXTconfig = "";
		$ckEXTconfig .= "CKEDITOR.plugins.addExternal('vimeo', '".XOOPS_MODULE_URL."/".$mydirname."/plugins/vimeo/');"."\n";
		$ckEXTconfig .= "CKEDITOR.plugins.addExternal('youtube', '".XOOPS_MODULE_URL."/".$mydirname."/plugins/youtube/');"."\n";

		$ckEXTconfig .= "CKEDITOR.config.extraPlugins += (CKEDITOR.config.extraPlugins ? ',youtube' : 'youtube' );"."\n";
		$ckEXTconfig .= "CKEDITOR.config.extraPlugins += (CKEDITOR.config.extraPlugins ? ',vimeo' : 'vimeo' );"."\n";

/***** sample  for toobar name ['Inspector']
		if ( file_exists(XOOPS_MODULE_PATH.'/'.$mydirname.'/plugins/zyzai/plugin.js') ) {
			$ckEXTconfig .= "CKEDITOR.plugins.addExternal('zyzai', '".XOOPS_MODULE_URL."/".$mydirname."/plugins/zyzai/');"."\n";
			$ckEXTconfig .= "CKEDITOR.config.extraPlugins += (CKEDITOR.config.extraPlugins ? ',zyzai' : 'zyzai' );"."\n";
		}
*/
		$entermode = $this->_getMyConfigParam($sMyconfig,'entermode');
		if ( empty($entermode)){
			$params['editor'] = isset($params['editor']) ? trim($params['editor']) : 'bbcode';
			if ( $params['editor'] =='bbcode'){
				if ( file_exists(XOOPS_MODULE_PATH.'/'.$mydirname.'/plugins/xcode/plugin.js') ) {
					$ckEXTconfig .= "CKEDITOR.plugins.addExternal('xcode', '".XOOPS_MODULE_URL."/".$mydirname."/plugins/xcode/');"."\n";
					$ckEXTconfig .= "CKEDITOR.config.extraPlugins += (CKEDITOR.config.extraPlugins ? ',xcode' : 'xcode' );"."\n";
				}
			}
		}
		return $ckEXTconfig;
//add EXTconfig end
	}
	/**
	 *	 getckExec
	*/
	public function getckExec($params)
	{
		$ckExec = "";
		$ckExec .=  "var editor".$params['id'].";\n";
		$ckExec .= "function ".$params['id']."_myckeditor_exec(){\n";
		$ckExec .=  " if (! editor".$params['id']." ){\n";
		$ckExec .=  "   editor".$params['id']." = CKEDITOR.replace('".$params['id'] ."', ckconfig_".$params['id'].");\n";
		$ckExec .=  " }\n";
		$ckExec .= "}\n";
		$ckExec .= "function ".$params['id']."_myckeditor_remove(){\n";
		$ckExec .=  " if ( editor".$params['id']." ){\n";
		$ckExec .=  "   editor".$params['id'].".destroy();\n";
		$ckExec .=  "   editor".$params['id']."=null;\n";
		$ckExec .=  " }\n";
		$ckExec .= "}\n";
		return $ckExec;
	}

	/**
	 *	 getckExec
	*/
	public function getckStart($params)
	{
		//initila display
		$ckEmain = "";
		$ckEmain .= "window.onload = function(){\n";
		$ckEmain .=  $params['id']."_myckeditor_exec();\n";
		$ckEmain .= "};\n";

		return $ckEmain;
	}

	/**
	 *	getckconfig
	*/
	public function getckconfig($params)
	{

		$mydirname = basename(dirname(dirname(__FILE__)));
		$mydirPath = dirname(dirname(__FILE__));

		//get module configs
		$sMyconfig=$this->_getMyconfig();
//add ckconfig start
		$ckconfig = '';
		//-- set CKEdtior Option customConfig --//
		$ckconfigdirname = $this->getmylanguage();
		if ( !empty($ckconfigdirname) && ! file_exists($mydirPath.'/language/'.$ckconfigdirname.'/config.js') ) {
			if ( !empty($ckconfigdirname) && ! file_exists($mydirPath.'/language/'.$ckconfigdirname.'/config.js') ) {
				$ckconfigdirname = 'english';
			}else{
				$ckconfigdirname = '';
			}
		}
		if ( !empty($ckconfigdirname) ) {
			$ckconfig .= "customConfig:'".XOOPS_MODULE_URL."/".$mydirname."/language/".$ckconfigdirname."/config.js'";
		}else{
			$ckconfig .= "customConfig:''";
		}
		//CKEditor custum css
		$ckconfig .= ",contentsCss:'".XOOPS_MODULE_URL."/".$mydirname."/css/contents.css'";

		if (isset($params['toolbar']) ){
			if ( !empty($params['toolbar']) ){
				$ckconfig .= ",toolbar:'".$params['toolbar']."'";
			}
		}

		//--------------------------------------//
		//set CKEdtior Option start from second
		//-- set CKEdtior Option Smailey for XoopsSmailey --//
		$ckconfig .= $this->_getCkconfig4XoopsSmailey();
		//-- set CKEdtior Option Filebrowser --//
		$ckconfig .= $this->_getCkconfig4FilebrowserSetting($sMyconfig);

		return $ckconfig;
//add EXTconfig end

	}
	/**
	 *	@protected _getCkconfig4XoopsSmailey
	 *
	 * @return	string for $ckconfig
	*/
	public function _getCkconfig4XoopsSmailey()
	{
		$ckconfig ="";

		if ( $this->_mCoreType == "X25"){
			$ckconfig .=",smiley_path : '".XOOPS_UPLOAD_URL."/smilies/'";
		}else{
			$ckconfig .=",smiley_path : '".XOOPS_UPLOAD_URL."/'";
		}
		$smileys_array = array();
		$db =& Database::getInstance();
		if ($getsmiles = $db->query("SELECT * FROM ".$db->prefix("smiles")." WHERE display=1" )){
			while ($smile = $db->fetchArray($getsmiles)) {
				$smileys_array[] = $smile;
			}
		}
		$cof_smiley_images = "";
		$cof_smiley_descriptions = "";
		foreach ($smileys_array as $value){
			if ($cof_smiley_images != ""){
				$cof_smiley_images .= ",";
				$cof_smiley_descriptions .= ",";
			}
			$cof_smiley_images .= "'".$value['smile_url']."'";
			$cof_smiley_descriptions .= "'".$value['emotion']."'";
		}
		$ckconfig .=",smiley_images : [".$cof_smiley_images."]";
		$ckconfig .=",smiley_descriptions : [".$cof_smiley_descriptions."]";

		return $ckconfig;
	}

	/**
	 *	@protected _getCkconfig4FilebrowserSetting
	 * @param	array  $sMyconfig : module configs array
	 *
	 * @return	string for $ckconfig
	*/
	public function _getCkconfig4FilebrowserSetting($sMyconfig)
	{
		$mydirname = basename(dirname(dirname(__FILE__)));

		$filemanager = $this->_getMyConfigParam($sMyconfig,'filemanager');
		$flashmanager = $this->_getMyConfigParam($sMyconfig,'flashmanager');
		$imagemanager = $this->_getMyConfigParam($sMyconfig,'imagemanager');

//		if ($filemanager=='ckfinder' || $flashmanager=='ckfinder' || $flashmanager=='ckfinder'){
//			$jQuery->addLibrary("'".XOOPS_MODULE_URL."/".$mydirname."/ckfinder/ckfinder.js'");
//		}

		$ckconfig = '';
		$uploadablegruops = $this->_getMyConfigParam($sMyconfig,'uploadablegruops');
		if ($this->_checCkconfig4CanUpload($uploadablegruops)){
			switch ($filemanager) {
				case "filemanager":
					$ckconfig .= ",filebrowserBrowseUrl : '".XOOPS_MODULE_URL."/".$mydirname."/filemanager/browser/default/browser.html?Connector=".XOOPS_MODULE_URL."/".$mydirname."/filemanager/connectors/php/connector.php'";
					$ckconfig .= ",filebrowserUploadUrl : '".XOOPS_MODULE_URL."/".$mydirname."/filemanager/connectors/php/upload.php?Type=File&command=QuickUpload'";
					break;
//				case "ckfinder":
//					$ckconfig .= ",filebrowserBrowseUrl : '".XOOPS_MODULE_URL."/".$mydirname."/ckfinder/ckfinder.html'";
//					$ckconfig .= ",filebrowserUploadUrl : '".XOOPS_MODULE_URL."/".$mydirname."/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'";
//					break;
				case "pgrfilemanager":
					$ckconfig .= ",filebrowserBrowseUrl : '".XOOPS_MODULE_URL."/".$mydirname."/pgrfilemanager/PGRFileManager.php?type=Files'";
					$ckconfig .= ",filebrowserUploadUrl : '".XOOPS_MODULE_URL."/".$mydirname."/pgrfilemanager/php/upload.php?command=QuickUpload&type=Files'";
					break;
				default:
					$ckconfig .= ",filebrowserBrowseUrl : ''";
					$ckconfig .= ",filebrowserUploadUrl : ''";
					break;
			}
			switch ($flashmanager) {
				case "filemanager":
					$ckconfig .= ",filebrowserFlashBrowseUrl : '".XOOPS_MODULE_URL."/".$mydirname."/filemanager/browser/default/browser.html?Type=Flash&Connector=".XOOPS_MODULE_URL."/".$mydirname."/filemanager/connectors/php/connector.php'";
					$ckconfig .= ",filebrowserFlashUploadUrl : '".XOOPS_MODULE_URL."/".$mydirname."/filemanager/connectors/php/upload.php?command=QuickUpload&Type=Flash'";
					break;
//				case "ckfinder":
//					$ckconfig .= ",filebrowserFlashBrowseUrl : '".XOOPS_MODULE_URL."/".$mydirname."/ckfinder/ckfinder.html?type=Flash'";
//					$ckconfig .= ",filebrowserFlashUploadUrl : '".XOOPS_MODULE_URL."/".$mydirname."/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'";
//					break;
				case "pgrfilemanager":
					$ckconfig .= ",filebrowserFlashBrowseUrl : '".XOOPS_MODULE_URL."/".$mydirname."/pgrfilemanager/PGRFileManager.php?type=Flash'";
					$ckconfig .= ",filebrowserFlashUploadUrl : '".XOOPS_MODULE_URL."/".$mydirname."/pgrfilemanager/php/upload.php?command=QuickUpload&type=Flash'";
					break;
				default:
					$ckconfig .= ",filebrowserFlashBrowseUrl : ''";
					$ckconfig .= ",filebrowserFlashUploadUrl : ''";
					break;
			}
		}

		$imallowgruops = $this->_getMyConfigParam($sMyconfig,'imallowgruops');
		if ($this->_checCkconfig4CanImageManager($imallowgruops)){
			switch ($imagemanager) {
				case "filemanager":
				if ($this->_checCkconfig4CanUpload($uploadablegruops)){
					$ckconfig .= ",filebrowserImageBrowseUrl : '".XOOPS_MODULE_URL."/".$mydirname."/filemanager/browser/default/browser.html?Type=Image&Connector=".XOOPS_MODULE_URL."/".$mydirname."/filemanager/connectors/php/connector.php'";
					$ckconfig .= ",filebrowserImageUploadUrl : '".XOOPS_MODULE_URL."/".$mydirname."/filemanager/connectors/php/upload.php?command=QuickUpload&Type=Image'";
				}else{
					$ckconfig .= ",filebrowserImageBrowseUrl : ''";
					$ckconfig .= ",filebrowserImageUploadUrl : ''";
				}
					break;
//				case "ckfinder":
//					$ckconfig .= ",filebrowserImageBrowseUrl : '".XOOPS_MODULE_URL."/".$mydirname."/ckfinder/ckfinder.html?type=Images'";
//					$ckconfig .= ",filebrowserImageUploadUrl : '".XOOPS_MODULE_URL."/".$mydirname."/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'";
//					break;
				case "pgrfilemanager":
					$ckconfig .= ",filebrowserImageBrowseUrl : '".XOOPS_MODULE_URL."/".$mydirname."/pgrfilemanager/PGRFileManager.php?type=Image'";
					$ckconfig .= ",filebrowserImageUploadUrl : '".XOOPS_MODULE_URL."/".$mydirname."/pgrfilemanager/php/upload.php?command=QuickUpload&type=Image'";
					break;
				case "imagemager":
					$ckconfig .= ",filebrowserImageBrowseUrl : '".XOOPS_URL."/imagemanager.php?Type=Images&target=CKEditor'";
					$ckconfig .= ",filebrowserImageUploadUrl : ''";
					break;
				default:
					$ckconfig .= ",filebrowserImageBrowseUrl : ''";
					$ckconfig .= ",filebrowserImageUploadUrl : ''";
					break;
			}
		}

		return $ckconfig;

	}
	/**
	 *	@protected _getMyconfig
	 * @param	string  $imallowgruops : group ids  (Example 2,4 )you can specify Group ID multiply by numbers separated with comma.
	 *
	 * @return	string for $ckconfig
	*/
	public function _getMyconfig()
	{
		$ret = array();
		$mydirname = basename(dirname(dirname(__FILE__)));
		$hModule =& xoops_gethandler('module');
		$MyhModule =& $hModule->getByDirname($mydirname) ;
		if ( !is_object($MyhModule) ) {
			return $ret;
		}
		$hModConfig =& xoops_gethandler('config');
		$ret =& $hModConfig->getConfigsByCat(0, $MyhModule->getVar( 'mid' ));
		return $ret;
	}

	/**
	 *	@protected _getMyConfigParam
	 * @param	array  $sMyconfig : module configs array
	 * @param	string  $name : module configs anme
	 *
	 * @return	string
	*/
	public function _getMyConfigParam($sMyconfig, $name)
	{
		$ret = '';
		if (empty($sMyconfig)){
			return $ret;
		}
		if (!isset($sMyconfig[$name])){
			return $ret;
		}
		if (empty($sMyconfig[$name])){
			return $ret;
		}
		$ret = trim($sMyconfig[$name]);
		return $ret;
	}

//END CLASS
}

?>