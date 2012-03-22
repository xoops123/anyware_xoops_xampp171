<?php
/**
 * @file
 * @package myckeditor
 * @version $Id$
 */

if (!defined('XOOPS_ROOT_PATH')) exit();

class Myckeditor_TextArea extends XCube_ActionFilter
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
		$this->mRoot->mDelegateManager->reset('Site.TextareaEditor.HTML.Show');
		$this->mRoot->mDelegateManager->add('Site.TextareaEditor.HTML.Show',array(&$this, 'renderhtml'));
	}

	/**
	 *	@public
	*/
	public function renderhtml(&$html, $params)
	{
		$root =& XCube_Root::getSingleton();
		$renderSystem =& $root->getRenderSystem(XOOPSFORM_DEPENDENCE_RENDER_SYSTEM);

		$renderTarget =& $renderSystem->createRenderTarget('main');

		$renderTarget->setAttribute('legacy_module', 'myckeditor');
		$renderTarget->setTemplateName("myckeditor_textarea.html");
		$renderTarget->setAttribute("element", $params);

		$renderSystem->render($renderTarget);

		$html = $renderTarget->getResult();

		$this->_addScript($params);
	}
	/**
	 *	@protected _addScript
	*/
	protected function _addScript(/*** string[] ***/ $params)
	{

		$mydirname = basename(dirname(dirname(__FILE__)));
		$_handler = & xoops_getmodulehandler('makescriptFORXCL22',$mydirname);
//		$params['myckeditor'] = 'display';
		if (!isset($params['myckeditor'])){
			$params['myckeditor'] = true;
		}
		$_handler->makeheader($params);
	}

//END CLASS
}

?>