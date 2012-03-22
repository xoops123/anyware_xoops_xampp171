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

class MyckeditorMakescriptFORX20Handler extends MyckeditorMakescriptHandler
{
	protected $_mLibrary = array();
	protected $_mScript = array();

	/**
	 *	 makeheader
	*/
	function makeheader($params)
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