<?php
/**
 * @file
 * @package myckeditor
 * @version $Id$
 */

if (!defined('XOOPS_ROOT_PATH')) exit();

if (!defined('XOOPS_MODULE_URL')) {
	define('XOOPS_MODULE_URL', XOOPS_URL . '/modules');
}
if (!defined('XOOPS_UPLOAD_URL')) {
	define('XOOPS_UPLOAD_URL', XOOPS_URL . '/uploads');
}
if (!defined('XOOPS_UPLOAD_PATH')) {
	define('XOOPS_UPLOAD_PATH', XOOPS_ROOT_PATH . '/uploads');
}
if (!defined('XOOPS_UPLOAD_URL')) {
	define('XOOPS_UPLOAD_URL', XOOPS_URL . '/uploads');
}

include_once dirname(__FILE__)."/makescript.php";

class MyckeditorMakescriptFORX25Handler extends MyckeditorMakescriptHandler
{
	/**
	 *	 makeheader
	*/
	function makeheader($params)
	{
		$this->addScriptCommon($params);

		$ckconfig = $this->getckconfig($params);
		$ckconfig_var = "";
		$ckconfig_var .=  "var ckconfig_".$params['id']." = {".$ckconfig."};\n";
		$GLOBALS['xoTheme']->addScript(null, array( 'type' => 'text/javascript' ), $ckconfig_var);

		$ckExec = $this->getckExec($params);
		$GLOBALS['xoTheme']->addScript(null, array( 'type' => 'text/javascript' ), $ckExec);
		if (isset($params['myckeditor'])){
			if ($params['myckeditor'] === 'display'){
				$ckStart = $this->getckStart($params);
				$GLOBALS['xoTheme']->addScript(null, array( 'type' => 'text/javascript' ), $ckStart);
			}
		}

	}

	/**
	 *	addScriptCommon
	*/
	function addScriptCommon($params)
	{
			$mydirname = basename(dirname(dirname(__FILE__)));

			$GLOBALS['xoTheme']->addScript('/common/ckeditor/ckeditor.js');
//			$GLOBALS['xoTheme']->addScript('/common/ckeditor/adapters/jquery.js');

			$ckEXTconfig = $this->getckEXTconfig($params);
			if (!empty($ckEXTconfig)){
				$GLOBALS['xoTheme']->addScript(null, array( 'type' => 'text/javascript' ), $ckEXTconfig);
			}
	}

	/**
	 *	getisAdmin
	*/
	function getisAdmin()
	{
		$isAdmin = false;
		if (@is_object($GLOBALS['xoopsUser'])) {
			 $isAdmin = $GLOBALS['xoopsUser']->isAdmin(1);
		}
		return $isAdmin;
	}
	/**
	 *	getmylanguage
	*/
	function getmylanguage()
	{
		$mylanguage = $GLOBALS['xoopsConfig']['language'];
		return $mylanguage;
	}
	/**
	 *	@protected _checCkconfig4CanUpload
	 * @param	string  $uploadablegruops : group ids  (Example 2,4 )you can specify Group ID multiply by numbers separated with comma.
	 *
	 * @return	string for $ckconfig
	*/
	function _checCkconfig4CanUpload($uploadablegruops)
	{
		if (empty($uploadablegruops)){
			//sample Site.Administrator and XOOPS_GROUP_USERS
			$fck_uploadable_groups = array() ; // specify groups can upload images
		}else{
			$fck_uploadable_groups = explode( ',' , $uploadablegruops ) ; // specify groups can upload images
		}

		$fck_isadmin = false ;
		$fck_canupload = false ;
		$uid = 0 ;

		$fck_isadmin = $this->getisAdmin();
		// check canupload
		$fck_canupload = $fck_isadmin ;
		if( ! $fck_isadmin ) {
			if (is_object($GOBALS['xoopsUser'])){
				$fck_canupload = count( array_intersect( $GOBALS['xoopsUser']->getGroups() , $fck_uploadable_groups ) ) > 0 ? true : false ;
			}
		}
		return $fck_canupload;

	}

	/**
	 *	@protected _checCkconfig4CanImageManager
	 * @param	string  $imallowgruops : group ids  (Example 2,4 )you can specify Group ID multiply by numbers separated with comma.
	 *
	 * @return	string for $ckconfig
	*/
	function _checCkconfig4CanImageManager($imallowgruops)
	{
		if (empty($imallowgruops)){
			//sample Site.Administrator and XOOPS_GROUP_USERS
			$fck_canimagemanager_groups = array() ; // specify groups can upload images
		}else{
			$fck_canimagemanager_groups = explode( ',' , $imallowgruops ) ; // specify groups can upload images
		}

		$fck_isadmin = false ;
		$fck_canimagemanager = false ;
		$uid = 0 ;

		$fck_isadmin = $this->getisAdmin();
		// check canupload
		$fck_canimagemanager = $fck_isadmin ;
		if( ! $fck_isadmin ) {
			if (is_object($GOBALS['xoopsUser'])){
				$fck_canimagemanager = count( array_intersect( $GOBALS['xoopsUser']->getGroups() , $fck_canimagemanager_groups ) ) > 0 ? true : false ;
			}
		}

		return $fck_canimagemanager;

	}

//END CLASS
}

?>