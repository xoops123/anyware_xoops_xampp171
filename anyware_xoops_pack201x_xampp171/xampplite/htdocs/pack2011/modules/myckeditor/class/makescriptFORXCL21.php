<?php
/**
 * @file
 * @package myckeditor
 * @version $Id$
 */

if (!defined('XOOPS_ROOT_PATH')) exit();

include_once dirname(__FILE__)."/makescript.php";

class MyckeditorMakescriptFORXCL21Handler extends MyckeditorMakescriptHandler
{
	protected $_mLibrary = array();
	protected $_mScript = array();

	/**
	 *	 makeheader
	*/
	function makeheader($params)
	{
		$root = XCube_Root::getSingleton();
		if(@is_object($root->mContext->getAttribute('headerScript') ) ) {
			$this->makeheaderJQ($params);
		}else{
			$this->makeheader4module_header($params);
		}
	}
	/**
	 *	 makeheader
	*/
	function makeheaderJQ($params)
	{
		$root = XCube_Root::getSingleton();
		$jQuery = $root->mContext->getAttribute('headerScript');

		$this->addScriptCommonJQ($params);

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
	function addScriptCommonJQ($params)
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
	 *	 makeheader
	*/
	function makeheader4module_header($params)
	{

		$this->addScriptCommon4module_header($params);

		$ckconfig = $this->getckconfig($params);
		$ckconfig_var = "";
		$ckconfig_var .=  "var ckconfig_".$params['id']." = {".$ckconfig."};\n";
		$this->addScript($ckconfig_var);

		$ckExec = $this->getckExec($params);
		$this->addScript($ckExec);

		if (isset($params['myckeditor'])){
			if ($params['myckeditor'] === 'display'){
				$ckStart = $this->getckStart($params);
				$this->addScript($ckStart);
			}
		}

		$xoops_module_header = $GLOBALS["xoopsTpl"]->get_template_vars( "xoops_module_header" ) ;
		//load plugin libraries
		foreach($this->_mLibrary as $lib){
			$xoops_module_header .= "<script type=\"text/javascript\" src=\"". $lib ."\"></script>\n";
		}
		$xoops_module_header .= "<script type=\"text/javascript\">\n";
		foreach($this->_mScript as $script){
			$xoops_module_header .= $script;
		}
		$xoops_module_header .= "</script>\n";

		$GLOBALS["xoopsTpl"]->assign( "xoops_module_header" , $xoops_module_header) ;

	}
	/**
	 *	addScriptCommon
	*/
	function addScriptCommon4module_header($params)
	{
		if (!defined('_MYCKEDITOR_COMMON_LOADED')) {

			$this->addLibrary('/common/ckeditor/ckeditor.js',true);
//			$this->addLibrary('/common/ckeditor/adapters/jquery.js',true);

			$ckEXTconfig = $this->getckEXTconfig($params);
			if (!empty($ckEXTconfig)){
				$this->addScript($ckEXTconfig);
			}

			define('_MYCKEDITOR_COMMON_LOADED', 1);
		}
	}
	/**
	 * addLibrary
	 *
	 * @param	string $url
	 * @param	bool $xoopsUrl
	 *
	 * @return	void
	**/
	function addLibrary($url, $xoopsUrl=true)
	{
		$libUrl = ($xoopsUrl==true) ? XOOPS_URL. $url : $url;
		if(! in_array($libUrl, $this->_mLibrary)){
			 $this->_mLibrary[] = $libUrl;
		}
	}
	function addScript( $script )
	{
		$this->_mScript[] = $script;
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

//END CLASS
}

?>