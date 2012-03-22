<?php
/**
 * @file
 * @package myckeditor
 * @version $Id$
 */

if (!defined('XOOPS_ROOT_PATH')) exit();

class Myckeditor_TextAreaBBCode extends XCube_ActionFilter
{
	/**
	 * @public
	 */
	function preBlockFilter()
	{
		if (!defined('_MYCKEDITOR_MODULE_LOADED')) {
			define('_MYCKEDITOR_MODULE_LOADED', 1);
		}
		if ( !preg_match('/XOOPS Cube Legacy 2\.2/', XOOPS_VERSION) ) return;
		$this->mRoot->mDelegateManager->reset('Site.TextareaEditor.BBCode.Show');
		$this->mRoot->mDelegateManager->add('Site.TextareaEditor.BBCode.Show',array(&$this, 'renderbbcode'));
	}

	/**
	 *	@public
	*/
	public function renderbbcode(&$html, $params)
	{
		$root =& XCube_Root::getSingleton();
		$renderSystem =& $root->getRenderSystem(XOOPSFORM_DEPENDENCE_RENDER_SYSTEM);

//		$params['value'] = htmlspecialchars_decode($params['value'], ENT_QUOTES) ;

		$renderTarget =& $renderSystem->createRenderTarget('main');

		$renderTarget->setAttribute('legacy_module', 'myckeditor');
		$renderTarget->setTemplateName("myckeditor_textarea_bbcode.html");
		$renderTarget->setAttribute("element", $params);

		$renderSystem->render($renderTarget);

		$html = $renderTarget->getResult();
		// myckeditor=true editor='bbcode' toolbar='simple'
		if (!isset($params['myckeditor'])){
			$params['myckeditor'] = true ;
			$params['editor'] = 'bbcode' ;
			$params['toolbar'] = 'simple' ;
		}
		if (!$params['myckeditor']){
			return;
		}

		$this->_addScript($params);

	}
	/**
	 *	@protected _addScript
	*/
	protected function _addScript(/*** string[] ***/ $params)
	{

		$mydirname = basename(dirname(dirname(__FILE__)));
		$_handler = & xoops_getmodulehandler('makescriptFORXCL22',$mydirname);

		$_handler->makeheader($params);

	}

//END CLASS
}

?>