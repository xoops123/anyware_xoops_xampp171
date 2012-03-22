<?php /* Smarty version 2.6.26, created on 2012-03-22 18:04:53
         compiled from file:admin_module_install.html */ ?>

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

<div id="xupdate_content">
<?php echo $this->_tpl_vars['xupdate_content']; ?>

<?php echo $this->_tpl_vars['xupdate_message']; ?>

</div>