<?php

/**
* pgrfilemanager をイメージマネージャとして使うプリロード
*/

class Myckeditor_pgrfilemanager extends XCube_ActionFilter
{
	function preBlockFilter()
	{
		$root =& XCube_Root::getSingleton();
		$root->mDelegateManager->delete('Legacypage.Imagemanager.Access','Legacy_EventFunction::imageManager');
		$root->mDelegateManager->add('Legacypage.Imagemanager.Access',
									 array($this, 'overRideDefaultImageManager'),
									 XCUBE_DELEGATE_PRIORITY_FIRST);
	}


	function overRideDefaultImageManager()
	{
		require_once dirname(dirname(__FILE__)).'/pgrfilemanager/imagemanager.php';
	}
}

?>