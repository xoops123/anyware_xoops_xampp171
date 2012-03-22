<?php
/**
* @file
* @package xupdate
* @version $Id$
**/

if (!defined('XOOPS_ROOT_PATH')) exit();

class Xupdate_ModulesIniDadaSet
{

	public $storeHand;
	public $modHand;

	public $stores ;
	public $items ;

	protected $mSiteObjects = array();
	protected $mSiteModuleObjects = array();


	public function execute()
	{
//データの自動作成と削除
		//for test start ---------------------------
		include dirname(__FILE__) .'/modules.ini';
		$this->stores = $stores;
		$this->_setmStoreObjects();

		//このストアーごとのアイテム配列をセットしてください
		$this->items = $items;
		//for test end ---------------------------
		//上記を使用して
		//登録済のデータをマージします
		//未登録のデータは自動で登録
		foreach($this->items as $sid => $items){
			$this->_setmSiteModuleObjects($sid);
			foreach($items as $key => $item){
				if ($item['target_type'] == 'TrustModule' ){
					$this->_setDataTrustModule($sid , $item);
				}else{
					$this->_setDataSingleModule($sid , $item);
				}
			}
		}
	}


	private function _setmStoreObjects()
	{
		//この該当サイト登録済みデータを全部確認する
		$storeObjects =& $this->storeHand->getObjects(null,null,null,true);

		foreach($storeObjects as $sid => $sobj){
			if (isset($this->stores[$sid])){
				$oldsobj = clone $sobj;
				$sobj->assignVars($this->stores[$sid]);
				$this->_StoreUpdate ($sobj , $oldsobj);
				$this->mSiteObjects[$sid]=$sobj;
			}else{
				//TODO delete ok?
				$criteria = new CriteriaCompo();
				$criteria->add(new Criteria( 'sid', $sid ) );
				$siteModuleStoreObjects =& $this->modHand->getObjects($criteria);
				foreach($siteModuleStoreObjects as $id => $mobj){
					$this->modHand->delete($mobj ,true);
				}
				$this->storeHand->delete($sobj ,true);
			}
		}
		foreach($this->stores as $sid => $store){
			if (!isset($this->mSiteObjects[$sid])){
				$sobj = new $this->storeHand->mClass();
				$sobj->assignVars($this->stores[$sid]);
				$sobj->assignVar('reg_unixtime',time());
				$sobj->setNew();
				$this->storeHand->insert($sobj ,true);
				$this->mSiteObjects[$sid] = $sobj;
			}
		}

	}
/*
 * このサイトのデータをデータベースに再セットする
 */
	private function _StoreUpdate ($obj , $oldobj)
	{
		$newdata['name'] = $obj->getVar('name');
		$newdata['addon_url'] = $obj->getVar('addon_url');

		$olddata['name'] = $oldobj->getVar('name');
		$olddata['addon_url'] = $oldobj->getVar('addon_url');
		if (count(array_diff_assoc($olddata, $newdata)) > 0 ) {
			$obj->assignVar('reg_unixtime',time());
			$obj->unsetNew();
			$this->storeHand->insert($obj ,true);
		}

	}


//----------------------------------------------------------------------
	private function _setmSiteModuleObjects($sid = null)
	{
		//この該当サイト登録済みデータを全部確認する
		if ( empty($sid)){
			$siteModuleStoreObjects =& $this->modHand->getObjects();
		}else{
			$criteria = new CriteriaCompo();
			$criteria->add(new Criteria( 'sid', $sid ) );
			$siteModuleStoreObjects =& $this->modHand->getObjects($criteria);
		}
		if (empty($siteModuleStoreObjects)){
			return;
		}
		foreach($siteModuleStoreObjects as $id => $mobj){

			if (isset($this->items[$sid])){
				$is_sitedata = false;
				foreach($this->items[$sid] as $key => $item){
					if ( $item['dirname'] == $mobj->getVar('dirname')
						|| $item['dirname'] == $mobj->getVar('trust_dirname') ){
						$is_sitedata = true;
						break;
					}
				}
				//このサイトデータに無い
				if ($is_sitedata == false){
					$this->modHand->delete($mobj,true);
					continue;
				}
			}

			if (isset($this->mSiteModuleObjects[$mobj->getVar('sid')][$mobj->getVar('target_key')][$mobj->getVar('dirname')])){
				//データ重複
				$this->modHand->delete($mobj,true);
			}else{
				$this->mSiteModuleObjects[$mobj->getVar('sid')][$mobj->getVar('target_key')][$mobj->getVar('dirname')]=$mobj;
			}
		}

	}

	private function _setDataSingleModule($sid , $item)
	{
		//trustモジュールでない(複製可能なものはどうしよう)
		$item['version']= isset($item['version']) ? round(floatval($item['version'])*100): 0 ;
		$item['replicatable']= isset($item['replicatable']) ? intval($item['replicatable']): 0 ;
		$item['target_key']= isset($item['target_key']) ? $item['target_key']: $item['dirname'] ;
		$item['trust_dirname']= '' ;
		$item['description']= isset($item['description']) ? $item['description']: '' ;
		if(function_exists('mb_convert_encoding')){
			if ('UTF-8' != _CHARSET){
				$item['description'] = mb_convert_encoding($item['description'] , _CHARSET , 'UTF-8');
			}
		}
		$item['unzipdirlevel']= isset($item['unzipdirlevel']) ? intval($item['unzipdirlevel']): 0 ;

		$mobj = new $this->modHand->mClass();
		$mobj->assignVars($item);
		$mobj->assignVar('sid', $sid);

		$mobj->setmModule();

		if (isset($this->mSiteModuleObjects[$sid][$item['target_key']][$item['dirname']])){
			$mobj->assignVar('id',$this->mSiteModuleObjects[$sid][$item['target_key']][$item['dirname']]->getVar('id') );
			$this->_ModuleStoreUpdate($mobj , $this->mSiteModuleObjects[$sid][$item['target_key']][$item['dirname']]);
		}else{
			$mobj->setNew();
			$this->modHand->insert($mobj ,true);
			$this->mSiteModuleObjects[$sid][$item['target_key']][$item['dirname']] = $mobj;
		}
		unset($mobj);

	}
	private function _setDataTrustModule($sid ,$item)
	{
		$item['version']= isset($item['version']) ? round(floatval($item['version'])*100): 0 ;
		$item['replicatable']= isset($item['replicatable']) ? intval($item['replicatable']): 0 ;
		$item['target_key']= isset($item['target_key']) ? $item['target_key']: $item['dirname'] ;
		$item['trust_dirname']= isset($item['trust_dirname']) ? $item['trust_dirname']: $item['dirname'] ;
		$item['description']= isset($item['description']) ? $item['description']: '' ;
		if(function_exists('mb_convert_encoding')){
			if ('UTF-8' != _CHARSET){
				$item['description'] = mb_convert_encoding($item['description'] , _CHARSET , 'UTF-8');
			}
		}
		$item['unzipdirlevel']= isset($item['unzipdirlevel']) ? intval($item['unzipdirlevel']): 0 ;

		//インストール済みの同じtrustモージュールのリストを取得
		$list = Legacy_Utils::getDirnameListByTrustDirname($item['trust_dirname']);

		if (empty($list)){
			//インストール済みの同じtrustモージュール無し、注意 is_activeはリストされない
			$mobj = new $this->modHand->mClass();
			$mobj->assignVars($item);
			$mobj->assignVar('sid',$sid);

			$mobj->setmModule();

			if (isset($this->mSiteModuleObjects[$sid][$item['target_key']][$item['dirname']])){
				$mobj->assignVar('id',$this->mSiteModuleObjects[$sid][$item['target_key']][$item['dirname']]->getVar('id') );
				$this->_ModuleStoreUpdate($mobj , $this->mSiteModuleObjects[$sid][$item['target_key']][$item['dirname']]);
			}else{
				$mobj->setNew();
				$this->modHand->insert($mobj ,true);
				$this->mSiteModuleObjects[$sid][$item['target_key']][$item['dirname']] = $mobj;
			}
			unset($mobj);

		}else{

			$_isrootdirmodule = false;
			foreach($list as $dirname){
				$mobj = new $this->modHand->mClass();
				$mobj->assignVars($item);
				$mobj->assignVar('sid',$sid);
				//same trust_path module
				$mobj->assignVar('dirname',$dirname);

				$mobj->setmModule();

				if ( $dirname == $item['dirname'] ){
					$_isrootdirmodule = true;
				}
				if (isset($this->mSiteModuleObjects[$sid][$item['target_key']][$dirname])){
					$mobj->assignVar('id',$this->mSiteModuleObjects[$sid][$item['target_key']][$dirname]->getVar('id') );
					$this->_ModuleStoreUpdate($mobj , $this->mSiteModuleObjects[$sid][$item['target_key']][$item['dirname']]);
				}else{
					$mobj->setNew();
					$this->modHand->insert($mobj ,true);
					$this->mSiteModuleObjects[$sid][$item['target_key']][$dirname] = $mobj;
				}
				unset($mobj);
			}
			//そのままインストールしていない場合、そのまま追加可能なので
			if ( $_isrootdirmodule == false ){
				$mobj = new $this->modHand->mClass();
				$mobj->assignVars($item);
				$mobj->assignVar('sid',$sid);

				$mobj->setmModule();

				if (isset($this->mSiteModuleObjects[$sid][$item['target_key']][$item['dirname']])){
					$mobj->assignVar('id',$this->mSiteModuleObjects[$sid][$item['target_key']][$item['dirname']]->getVar('id') );
					$this->_ModuleStoreUpdate($mobj , $this->mSiteModuleObjects[$sid][$item['target_key']][$item['dirname']]);
				}else{
					$mobj->setNew();
					$this->modHand->insert($mobj ,true);
					$this->mSiteModuleObjects[$sid][$item['target_key']][$item['dirname']] = $mobj;
				}
				unset($mobj);
			}
		}

	}

/*
 * このサイトのデータをデータベースに再セットする
 */
	private function _ModuleStoreUpdate ($obj , $oldobj)
	{
		$newdata['dirname'] = $obj->getVar('dirname');
		$newdata['trust_dirname'] = $obj->getVar('trust_dirname');
		$newdata['target_key'] = $obj->getVar('target_key');
		$newdata['target_type'] = $obj->getVar('target_type');
		$newdata['last_update'] = $obj->getVar('last_update');
		$newdata['version'] = $obj->getVar('version');
		$newdata['description'] = $obj->getVar('description');
		$newdata['unzipdirlevel'] = $obj->getVar('unzipdirlevel');

		$olddata['dirname'] = $oldobj->getVar('dirname');
		$olddata['trust_dirname'] = $oldobj->getVar('trust_dirname');
		$olddata['target_key'] = $oldobj->getVar('target_key');
		$olddata['target_type'] = $oldobj->getVar('target_type');
		$olddata['last_update'] = $oldobj->getVar('last_update');
		$olddata['version'] = $oldobj->getVar('version');
		$olddata['description'] = $oldobj->getVar('description');
		$olddata['unzipdirlevel'] = $oldobj->getVar('unzipdirlevel');
		if (count(array_diff_assoc($olddata, $newdata)) > 0 ) {
			$obj->unsetNew();
			$this->modHand->insert($obj ,true);
		}

	}

} // end class

?>