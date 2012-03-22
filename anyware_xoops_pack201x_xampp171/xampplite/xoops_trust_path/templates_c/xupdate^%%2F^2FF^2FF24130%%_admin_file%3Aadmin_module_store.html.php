<?php /* Smarty version 2.6.26, created on 2012-03-22 18:03:56
         compiled from file:admin_module_store.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'xoops_escape', 'file:admin_module_store.html', 18, false),array('modifier', 'theme', 'file:admin_module_store.html', 33, false),array('modifier', 'xoops_formattimestamp', 'file:admin_module_store.html', 85, false),array('function', 'xoops_pagenavi', 'file:admin_module_store.html', 24, false),array('function', 'xoops_input', 'file:admin_module_store.html', 28, false),array('function', 'cycle', 'file:admin_module_store.html', 64, false),array('function', 'xoops_token', 'file:admin_module_store.html', 134, false),)), $this); ?>
<div class="adminnavi">
  <a href="./index.php?action=ModuleStore"><?php echo @_MI_XUPDATE_ADMENU_ADDONSTORE; ?>
</a>
  &raquo;&raquo; <span class="adminnaviTitle"><a href="./index.php?action=ModuleStore"><?php echo @_MI_XUPDATE_ADMENU_ADDONSTOREDEC; ?>
</a></span>
</div>

<h3 class="admintitle"><?php echo @_AD_XUPDATE_LANG_MODULES; ?>
</h3>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin_menunavi.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin_tips.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<ul class="toptab">
  <li class="addModule"><a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/legacy/admin/index.php?action=InstallList"><?php echo @_AD_LEGACY_LANG_MODINSTALL; ?>
</a></li>
</ul>

<?php if ($this->_tpl_vars['actionForm']->hasError()): ?>
<div class="error">
  <ul>
    <?php $_from = $this->_tpl_vars['actionForm']->getErrorMessages(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['message']):
?>
      <li><?php echo ((is_array($_tmp=$this->_tpl_vars['message'])) ? $this->_run_mod_handler('xoops_escape', true, $_tmp) : smarty_modifier_xoops_escape($_tmp)); ?>
</li>
    <?php endforeach; endif; unset($_from); ?>
  </ul>
</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['pageNavi']->getPerpage() < $this->_tpl_vars['pageNavi']->getTotalItems()): ?>
<div class="pagenavi"><?php echo smarty_function_xoops_pagenavi(array('pagenavi' => $this->_tpl_vars['pageNavi']), $this);?>
</div>
<?php endif; ?>

<form  action="index.php?action=ModuleStore" method="post" >
<?php echo smarty_function_xoops_input(array('type' => 'hidden','name' => 'sid','value' => $this->_tpl_vars['sid']), $this);?>


<table class="outer">
  <tr>
    <th>id
      <a href="index.php?action=ModuleStore&amp;<?php echo $this->_tpl_vars['pageNavi']->getPrefix(); ?>
sort=<?php echo @MODULE_SORT_KEY_ID; ?>
"><img src="<?php echo ((is_array($_tmp="icons/up.png")) ? $this->_run_mod_handler('theme', true, $_tmp) : $this->_plugins['modifier']['theme'][0][0]->modifierTheme($_tmp)); ?>
" alt="<?php echo @_ASCENDING; ?>
" title="<?php echo @_ASCENDING; ?>
" /></a>
      <a href="index.php?action=ModuleStore&amp;<?php echo $this->_tpl_vars['pageNavi']->getPrefix(); ?>
sort=-<?php echo @MODULE_SORT_KEY_ID; ?>
"><img src="<?php echo ((is_array($_tmp="icons/down.png")) ? $this->_run_mod_handler('theme', true, $_tmp) : $this->_plugins['modifier']['theme'][0][0]->modifierTheme($_tmp)); ?>
" alt="<?php echo @_DESCENDING; ?>
" title="<?php echo @_DESCENDING; ?>
" /></a>
      </th>
    <th><?php echo @_MD_XUPDATE_LANG_SID; ?>

      <a href="index.php?action=ModuleStore&amp;<?php echo $this->_tpl_vars['pageNavi']->getPrefix(); ?>
sort=<?php echo @MODULE_SORT_KEY_SID; ?>
"><img src="<?php echo ((is_array($_tmp="icons/up.png")) ? $this->_run_mod_handler('theme', true, $_tmp) : $this->_plugins['modifier']['theme'][0][0]->modifierTheme($_tmp)); ?>
" alt="<?php echo @_ASCENDING; ?>
" title="<?php echo @_ASCENDING; ?>
" /></a>
      <a href="index.php?action=ModuleStore&amp;<?php echo $this->_tpl_vars['pageNavi']->getPrefix(); ?>
sort=-<?php echo @MODULE_SORT_KEY_SID; ?>
"><img src="<?php echo ((is_array($_tmp="icons/down.png")) ? $this->_run_mod_handler('theme', true, $_tmp) : $this->_plugins['modifier']['theme'][0][0]->modifierTheme($_tmp)); ?>
" alt="<?php echo @_DESCENDING; ?>
" title="<?php echo @_DESCENDING; ?>
" /></a>
      </th>
    <th><?php echo @_AD_LEGACY_LANG_MOD_NAME; ?>

      <a href="index.php?action=ModuleStore&amp;<?php echo $this->_tpl_vars['pageNavi']->getPrefix(); ?>
sort=<?php echo @MODULE_SORT_KEY_DIRNAME; ?>
"><img src="<?php echo ((is_array($_tmp="icons/up.png")) ? $this->_run_mod_handler('theme', true, $_tmp) : $this->_plugins['modifier']['theme'][0][0]->modifierTheme($_tmp)); ?>
" alt="<?php echo @_ASCENDING; ?>
" title="<?php echo @_ASCENDING; ?>
" /></a>
      <a href="index.php?action=ModuleStore&amp;<?php echo $this->_tpl_vars['pageNavi']->getPrefix(); ?>
sort=-<?php echo @MODULE_SORT_KEY_DIRNAME; ?>
"><img src="<?php echo ((is_array($_tmp="icons/down.png")) ? $this->_run_mod_handler('theme', true, $_tmp) : $this->_plugins['modifier']['theme'][0][0]->modifierTheme($_tmp)); ?>
" alt="<?php echo @_DESCENDING; ?>
" title="<?php echo @_DESCENDING; ?>
" /></a>
      </th>
    <th><?php echo @_AD_LEGACY_LANG_VERSION; ?>

      <a href="index.php?action=ModuleStore&amp;<?php echo $this->_tpl_vars['pageNavi']->getPrefix(); ?>
sort=<?php echo @MODULE_SORT_KEY_VERSION; ?>
"><img src="<?php echo ((is_array($_tmp="icons/up.png")) ? $this->_run_mod_handler('theme', true, $_tmp) : $this->_plugins['modifier']['theme'][0][0]->modifierTheme($_tmp)); ?>
" alt="<?php echo @_ASCENDING; ?>
" title="<?php echo @_ASCENDING; ?>
" /></a>
      <a href="index.php?action=ModuleStore&amp;<?php echo $this->_tpl_vars['pageNavi']->getPrefix(); ?>
sort=-<?php echo @MODULE_SORT_KEY_VERSION; ?>
"><img src="<?php echo ((is_array($_tmp="icons/down.png")) ? $this->_run_mod_handler('theme', true, $_tmp) : $this->_plugins['modifier']['theme'][0][0]->modifierTheme($_tmp)); ?>
" alt="<?php echo @_DESCENDING; ?>
" title="<?php echo @_DESCENDING; ?>
" /></a>
      </th>
    <th><?php echo @_AD_LEGACY_LANG_LASTUPDATE; ?>

      <a href="index.php?action=ModuleStore&amp;<?php echo $this->_tpl_vars['pageNavi']->getPrefix(); ?>
sort=<?php echo @MODULE_SORT_KEY_LASTUPDATE; ?>
"><img src="<?php echo ((is_array($_tmp="icons/up.png")) ? $this->_run_mod_handler('theme', true, $_tmp) : $this->_plugins['modifier']['theme'][0][0]->modifierTheme($_tmp)); ?>
" alt="<?php echo @_ASCENDING; ?>
" title="<?php echo @_ASCENDING; ?>
" /></a>
      <a href="index.php?action=ModuleStore&amp;<?php echo $this->_tpl_vars['pageNavi']->getPrefix(); ?>
sort=-<?php echo @MODULE_SORT_KEY_LASTUPDATE; ?>
"><img src="<?php echo ((is_array($_tmp="icons/down.png")) ? $this->_run_mod_handler('theme', true, $_tmp) : $this->_plugins['modifier']['theme'][0][0]->modifierTheme($_tmp)); ?>
" alt="<?php echo @_DESCENDING; ?>
" title="<?php echo @_DESCENDING; ?>
" /></a>
      </th>
    <th>TRUST or <?php echo @_AD_LEGACY_LANG_MOD_NAME; ?>

      <a href="index.php?action=ModuleStore&amp;<?php echo $this->_tpl_vars['pageNavi']->getPrefix(); ?>
sort=<?php echo @MODULE_SORT_KEY_TARGET_KEY; ?>
"><img src="<?php echo ((is_array($_tmp="icons/up.png")) ? $this->_run_mod_handler('theme', true, $_tmp) : $this->_plugins['modifier']['theme'][0][0]->modifierTheme($_tmp)); ?>
" alt="<?php echo @_ASCENDING; ?>
" title="<?php echo @_ASCENDING; ?>
" /></a>
      <a href="index.php?action=ModuleStore&amp;<?php echo $this->_tpl_vars['pageNavi']->getPrefix(); ?>
sort=-<?php echo @MODULE_SORT_KEY_TARGET_KEY; ?>
"><img src="<?php echo ((is_array($_tmp="icons/down.png")) ? $this->_run_mod_handler('theme', true, $_tmp) : $this->_plugins['modifier']['theme'][0][0]->modifierTheme($_tmp)); ?>
" alt="<?php echo @_DESCENDING; ?>
" title="<?php echo @_DESCENDING; ?>
" /></a>
      </th>
    <th><?php echo @_AD_XUPDATE_LANG_TYPE; ?>

      <a href="index.php?action=ModuleStore&amp;<?php echo $this->_tpl_vars['pageNavi']->getPrefix(); ?>
sort=<?php echo @MODULE_SORT_KEY_TARGET_TYPE; ?>
"><img src="<?php echo ((is_array($_tmp="icons/up.png")) ? $this->_run_mod_handler('theme', true, $_tmp) : $this->_plugins['modifier']['theme'][0][0]->modifierTheme($_tmp)); ?>
" alt="<?php echo @_ASCENDING; ?>
" title="<?php echo @_ASCENDING; ?>
" /></a>
      <a href="index.php?action=ModuleStore&amp;<?php echo $this->_tpl_vars['pageNavi']->getPrefix(); ?>
sort=-<?php echo @MODULE_SORT_KEY_TARGET_TYPE; ?>
"><img src="<?php echo ((is_array($_tmp="icons/down.png")) ? $this->_run_mod_handler('theme', true, $_tmp) : $this->_plugins['modifier']['theme'][0][0]->modifierTheme($_tmp)); ?>
" alt="<?php echo @_DESCENDING; ?>
" title="<?php echo @_DESCENDING; ?>
" /></a>
      </th>
    <th><?php echo @_AD_LEGACY_LANG_CONTROL; ?>
</th>
    <th><?php echo @_AD_XUPDATE_LANG_MESSAGE_BATCH_INSTALL; ?>
<br><input id="rapidInstallCheckboxAll" type="checkbox" /></th>
  </tr>
  <?php $_from = $this->_tpl_vars['moduleObjects']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['module']):
?>
    <tr class="<?php echo smarty_function_cycle(array('values' => 'odd,even'), $this);?>
">
      <td class="legacy_list_id"><?php echo $this->_tpl_vars['module']->getShow('id'); ?>
</td>
      <td class="legacy_list_id"><?php echo $this->_tpl_vars['module']->getShow('sid'); ?>
</td>
      <td class="legacy_list_image">
        <?php if ($this->_tpl_vars['module']->getShow('target_type') == 'TrustModule' && $this->_tpl_vars['module']->getShow('replicatable')): ?>
        <input type="text" size="24" name="dirname[<?php echo $this->_tpl_vars['module']->get('id'); ?>
]" value="<?php echo $this->_tpl_vars['module']->get('dirname'); ?>
" />
        <?php else: ?>
        <input type="hidden" size="24" name="dirname[<?php echo $this->_tpl_vars['module']->get('id'); ?>
]" value="<?php echo $this->_tpl_vars['module']->get('dirname'); ?>
" />
          <?php echo $this->_tpl_vars['module']->getShow('dirname'); ?>

        <?php endif; ?>
      </td>
      <td class="legacy_list_order">
        <?php if ($this->_tpl_vars['module']->hasNeedUpdate()): ?>
          (<?php echo $this->_tpl_vars['module']->mModule->getRenderedVersion(); ?>
)
          <strong class="legacy_module_versionMsg"><?php echo $this->_tpl_vars['module']->getRenderedVersion(); ?>
</strong>
        <?php else: ?>
          <?php echo $this->_tpl_vars['module']->getRenderedVersion(); ?>

        <?php endif; ?>
      </td>
      <td class="legacy_list_date">
        <?php if ($this->_tpl_vars['module']->mModule->getVar('mid')): ?>
        <?php echo ((is_array($_tmp=$this->_tpl_vars['module']->getVar('last_update'))) ? $this->_run_mod_handler('xoops_formattimestamp', true, $_tmp, 'l') : smarty_modifier_xoops_formattimestamp($_tmp, 'l')); ?>

        <?php endif; ?>
      </td>
      <td class="legacy_list_select">
        <?php if ($this->_tpl_vars['module']->isDirnameError()): ?>
          <?php if ($this->_tpl_vars['module']->modinfo['trust_dirname']): ?>
            (<?php echo $this->_tpl_vars['module']->modinfo['trust_dirname']; ?>
)
          <?php else: ?>
            (<?php echo $this->_tpl_vars['module']->modinfo['dirname']; ?>
)
          <?php endif; ?>
          <strong class="legacy_module_warning"><?php echo $this->_tpl_vars['module']->getShow('target_key'); ?>
</strong>
        <?php else: ?>
          <?php echo $this->_tpl_vars['module']->getShow('target_key'); ?>

        <?php endif; ?>
        <br/><?php echo $this->_tpl_vars['module']->get('description'); ?>

      </td>
      <td class="legacy_list_select">
        <?php echo $this->_tpl_vars['module']->getShow('target_type'); ?>

      </td>
      <td class="legacy_list_control">
      <?php if ($this->_tpl_vars['xupdate_writable']['result'] == true): ?>
        <?php if ($this->_tpl_vars['module']->mModule->getVar('mid') > 0): ?>
          <?php if ($this->_tpl_vars['module']->mModule->getVar('isactive')): ?>
          <a href="<?php echo $this->_tpl_vars['module']->get_StoreUrl(); ?>
" title="<?php echo @_AD_LEGACY_LANG_UPDATE; ?>
"><img src="<?php echo ((is_array($_tmp="icons/update.png")) ? $this->_run_mod_handler('theme', true, $_tmp) : $this->_plugins['modifier']['theme'][0][0]->modifierTheme($_tmp)); ?>
" alt="<?php echo @_AD_LEGACY_LANG_UPDATE; ?>
" /></a>
          <a href="<?php echo $this->_tpl_vars['module']->get_UpdateUrl(); ?>
"></a>
          <?php else: ?>
          <img src="<?php echo ((is_array($_tmp="icons/error.png")) ? $this->_run_mod_handler('theme', true, $_tmp) : $this->_plugins['modifier']['theme'][0][0]->modifierTheme($_tmp)); ?>
" alt="<?php echo @_AD_LEGACY_LANG_BLOCK_INACTIVETOTAL; ?>
" title="<?php echo @_AD_LEGACY_LANG_BLOCK_INACTIVETOTAL; ?>
" />
          <?php endif; ?>
        <?php else: ?>
          <a href="<?php echo $this->_tpl_vars['module']->get_StoreUrl(); ?>
" title="<?php echo @_AD_LEGACY_LANG_INSTALL; ?>
"><img src="<?php echo ((is_array($_tmp="icons/module_add.png")) ? $this->_run_mod_handler('theme', true, $_tmp) : $this->_plugins['modifier']['theme'][0][0]->modifierTheme($_tmp)); ?>
" alt="<?php echo @_AD_LEGACY_LANG_INSTALL; ?>
" /></a>
          <a href="<?php echo $this->_tpl_vars['module']->get_InstallUrl(); ?>
"></a>
        <?php endif; ?>
     <?php endif; ?>
      </td>
      <td class="legacy_list_select">
      <?php if ($this->_tpl_vars['xupdate_writable']['result'] == true): ?>
        <?php if ($this->_tpl_vars['module']->mModule->getVar('mid') > 0): ?>
          <?php if ($this->_tpl_vars['module']->mModule->getVar('isactive') && $this->_tpl_vars['module']->isDirnameError() == false): ?>
         <input type="checkbox" class="rapidInstallCheckbox" />
          <?php endif; ?>
        <?php else: ?>
         <input type="checkbox" class="rapidInstallCheckbox" />
        <?php endif; ?>
     <?php endif; ?>
      </td>
    </tr>
  <?php endforeach; endif; unset($_from); ?>
  <tr>
    <td class="foot" colspan="8">
      <?php echo smarty_function_xoops_token(array('form' => $this->_tpl_vars['actionForm']), $this);?>

      <input class="formButton" type="submit" value="<?php echo @_AD_LEGACY_LANG_MOD_NAME; ?>
<?php echo @_EDIT; ?>
" />
      <input class="formButton" type="submit" value="<?php echo @_BACK; ?>
" name="_form_control_cancel" />
    </td>
    <td class="foot">
    <?php if ($this->_tpl_vars['xupdate_writable']['result'] == true): ?>
      <input class="formButton" type="submit" value="<?php echo @_AD_XUPDATE_LANG_MESSAGE_BATCH_INSTALL; ?>
"  id="rapidModuleInstallButton" />
    <?php endif; ?>
    </td>
  </tr>
</table>
</form>
<?php if ($this->_tpl_vars['pageNavi']->getPerpage() < $this->_tpl_vars['pageNavi']->getTotalItems()): ?>
<div class="pagenavi"><?php echo smarty_function_xoops_pagenavi(array('pagenavi' => $this->_tpl_vars['pageNavi']), $this);?>
</div>
<?php endif; ?>