<?php
/**
 * @file
 * @package myckeditor
 * @version $Id$
 */

if (!defined('XOOPS_ROOT_PATH')) exit();

include_once dirname(__FILE__)."/makescript.php";

class MyckeditorMakescriptFORXCL22Handler extends MyckeditorMakescriptHandler
{
	/**
	 *	 makeheader
	*/
	function makeheader($params)
	{
		$root = XCube_Root::getSingleton();
		$jQuery = $root->mContext->getAttribute('headerScript');

		$this->addScriptCommon($params);

		$ckconfig = $this->getckconfig($params);
		$ckconfig_var = "";
		$ckconfig_var .=  "var ckconfig_".$params['id']." = {".$ckconfig."};\n";
		$jQuery->addScript($ckconfig_var,false);

		$ckExec = $this->getckExec($params);
		$jQuery->addScript($ckExec,false);
		if (isset($params['myckeditor'])){
			if ($params['myckeditor'] === 'display'){
				$ckStart = $this->getckStart($params);
				$jQuery->addScript($ckStart,false);
			}
		}

	}

	/**
	 *	addScriptCommon
	*/
	function addScriptCommon($params)
	{
		if (!defined('_MYCKEDITOR_COMMON_LOADED')) {
			$root = XCube_Root::getSingleton();
			$jQuery = $root->mContext->getAttribute('headerScript');

			$jQuery->addLibrary('/common/ckeditor/ckeditor.js',true);
			$jQuery->addLibrary('/common/ckeditor/adapters/jquery.js',true);

			$ckEXTconfig = $this->getckEXTconfig($params);
			if (!empty($ckEXTconfig)){
				$jQuery->addScript($ckEXTconfig,false);
			}
			define('_MYCKEDITOR_COMMON_LOADED', 1);
		}
	}

	/**
	 *	getisAdmin
	*/
	function getisAdmin()
	{
		// for Cube 2.1 (check if legacy module admin)
		$root = XCube_Root::getSingleton();
		$isAdmin = $root->mContext->mUser->isInRole('Site.Administrator');
		return $isAdmin;
	}
	/**
	 *	getmylanguage
	*/
	function getmylanguage()
	{
		$root = XCube_Root::getSingleton();
		$mylanguage = $root->mContext->mXoopsConfig['language'];
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
			$root = XCube_Root::getSingleton();
			if ($root->mContext->mXoopsUser != null){
				$fck_canupload = count( array_intersect( $root->mContext->mXoopsUser->_groups , $fck_uploadable_groups ) ) > 0 ? true : false ;
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
			$root = XCube_Root::getSingleton();
			if ($root->mContext->mXoopsUser != null){
				$fck_canimagemanager = count( array_intersect( $root->mContext->mXoopsUser->_groups , $fck_canimagemanager_groups ) ) > 0 ? true : false ;
			}
		}
		return $fck_canimagemanager;

	}
/*
	function getckEXTconfig($params)
	{
		return parent::getckEXTconfig($params);
	}
	function getckExec($params)
	{
		return parent::getckExec($params);
	}
	function getckStart($params)
	{
		return parent::getckStart($params);
	}

	function getckconfig($params)
	{
		return parent::getckconfig($params);
	}

	function _getCkconfig4XoopsSmailey()
	{
		return parent::_getCkconfig4XoopsSmailey();
	}

	function _getCkconfig4FilebrowserSetting($sMyconfig)
	{
		return parent::_getCkconfig4FilebrowserSetting($sMyconfig);
	}

	function _getMyconfig()
	{
		return parent::_getMyconfig();
	}

	function _getMyConfigParam($sMyconfig, $name)
	{
		return parent::_getMyConfigParam($sMyconfig, $name);
	}
*/
//END CLASS
}

?>