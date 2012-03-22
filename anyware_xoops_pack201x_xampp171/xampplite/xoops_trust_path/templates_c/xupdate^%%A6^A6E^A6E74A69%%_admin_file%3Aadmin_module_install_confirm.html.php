<?php /* Smarty version 2.6.26, created on 2012-03-22 18:04:46
         compiled from file:admin_module_install_confirm.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'xoops_escape', 'file:admin_module_install_confirm.html', 17, false),array('function', 'xoops_token', 'file:admin_module_install_confirm.html', 23, false),array('function', 'xoops_input', 'file:admin_module_install_confirm.html', 24, false),array('function', 'cycle', 'file:admin_module_install_confirm.html', 31, false),)), $this); ?>
<div id="contentBody">

<div class="adminnavi">
  <a href="./index.php?action=ModuleStore"><?php echo @_MI_XUPDATE_ADMENU_ADDONSTORE; ?>
</a>
  &raquo;&raquo; <span class="adminnaviTitle"><a href="./index.php?action=ModuleStore"><?php echo @_MI_XUPDATE_ADMENU_ADDONSTOREDEC; ?>
</a></span>
</div>

<h3 class="admintitle"><?php echo @_MI_XUPDATE_ADMENU_ADDONSTORE; ?>
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

<div class="confirm"><?php echo @_MI_XUPDATE_ADMENU_MODULE; ?>
<?php echo @_INSTALL; ?>
</div>
<?php if ($this->_tpl_vars['actionForm']->hasError() && $this->_tpl_vars['actionForm']->getErrorMessages()): ?>
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
<form action="index.php?action=ModuleInstall" method="post">
  <?php echo smarty_function_xoops_token(array('form' => $this->_tpl_vars['actionForm']), $this);?>

  <?php echo smarty_function_xoops_input(array('type' => 'hidden','name' => 'confirm','value' => 1), $this);?>


<table class="outer">
  <tr>
    <th>name</th>
    <th>value</th>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => 'odd,even'), $this);?>
">
    <td class="legacy_list_select">id</td>
    <td class="legacy_list_select">
        <?php echo smarty_function_xoops_input(array('type' => 'hidden','name' => 'id','value' => $this->_tpl_vars['id']), $this);?>

        <?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('xoops_escape', true, $_tmp, 'show') : smarty_modifier_xoops_escape($_tmp, 'show')); ?>

    </td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => 'odd,even'), $this);?>
">
    <td class="legacy_list_select"><?php echo @_MD_XUPDATE_LANG_SID; ?>
</td>
    <td class="legacy_list_select">
        <?php echo smarty_function_xoops_input(array('type' => 'hidden','name' => 'sid','value' => $this->_tpl_vars['sid']), $this);?>

        <?php echo ((is_array($_tmp=$this->_tpl_vars['sid'])) ? $this->_run_mod_handler('xoops_escape', true, $_tmp, 'show') : smarty_modifier_xoops_escape($_tmp, 'show')); ?>

    </td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => 'odd,even'), $this);?>
">
    <td class="legacy_list_select"><?php echo @_MI_XUPDATE_FTP_ADDON_URL; ?>
</td>
    <td class="legacy_list_select">
        <?php echo smarty_function_xoops_input(array('type' => 'hidden','name' => 'addon_url','value' => $this->_tpl_vars['addon_url']), $this);?>

        <?php echo ((is_array($_tmp=$this->_tpl_vars['addon_url'])) ? $this->_run_mod_handler('xoops_escape', true, $_tmp, 'show') : smarty_modifier_xoops_escape($_tmp, 'show')); ?>

    </td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => 'odd,even'), $this);?>
">
    <td class="legacy_list_select">unzipdirlevel</td>
    <td class="legacy_list_select">
        <?php echo smarty_function_xoops_input(array('type' => 'hidden','name' => 'unzipdirlevel','value' => $this->_tpl_vars['unzipdirlevel']), $this);?>

        <?php echo ((is_array($_tmp=$this->_tpl_vars['unzipdirlevel'])) ? $this->_run_mod_handler('xoops_escape', true, $_tmp, 'show') : smarty_modifier_xoops_escape($_tmp, 'show')); ?>

    </td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => 'odd,even'), $this);?>
">
    <td class="legacy_list_select">target_key</td>
    <td class="legacy_list_select">
        <?php echo smarty_function_xoops_input(array('type' => 'hidden','name' => 'target_key','value' => $this->_tpl_vars['target_key']), $this);?>

        <?php echo ((is_array($_tmp=$this->_tpl_vars['target_key'])) ? $this->_run_mod_handler('xoops_escape', true, $_tmp, 'show') : smarty_modifier_xoops_escape($_tmp, 'show')); ?>

    </td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => 'odd,even'), $this);?>
">
    <td class="legacy_list_select">target_type</td>
    <td class="legacy_list_select">
        <?php echo smarty_function_xoops_input(array('type' => 'hidden','name' => 'target_type','value' => $this->_tpl_vars['target_type']), $this);?>

        <?php echo ((is_array($_tmp=$this->_tpl_vars['target_type'])) ? $this->_run_mod_handler('xoops_escape', true, $_tmp, 'show') : smarty_modifier_xoops_escape($_tmp, 'show')); ?>

    </td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => 'odd,even'), $this);?>
">
    <td class="legacy_list_select">trust_dirname</td>
    <td class="legacy_list_select">
        <?php echo smarty_function_xoops_input(array('type' => 'hidden','name' => 'trust_dirname','value' => $this->_tpl_vars['trust_dirname']), $this);?>

        <?php echo ((is_array($_tmp=$this->_tpl_vars['trust_dirname'])) ? $this->_run_mod_handler('xoops_escape', true, $_tmp, 'show') : smarty_modifier_xoops_escape($_tmp, 'show')); ?>

    </td>
  </tr>
  <tr class="<?php echo smarty_function_cycle(array('values' => 'odd,even'), $this);?>
">
    <td class="legacy_list_select">dirname</td>
    <td class="legacy_list_select">
        <?php echo smarty_function_xoops_input(array('type' => 'hidden','name' => 'dirname','value' => $this->_tpl_vars['dirname']), $this);?>

        <?php echo ((is_array($_tmp=$this->_tpl_vars['dirname'])) ? $this->_run_mod_handler('xoops_escape', true, $_tmp, 'show') : smarty_modifier_xoops_escape($_tmp, 'show')); ?>

    </td>
  </tr>

  <tr>
    <td class="foot" colspan="2">
       <?php if (! $this->_tpl_vars['actionForm']->getErrorMessages()): ?>
      <input class="formButton" type="submit" value="<?php echo @_MI_XUPDATE_LANG_UPDATE; ?>
" />
      <?php endif; ?>
      <input class="formButton" type="submit" value="<?php echo @_BACK; ?>
" name="_form_control_cancel" />
    </td>
  </tr>
</table>
</form>

</div>