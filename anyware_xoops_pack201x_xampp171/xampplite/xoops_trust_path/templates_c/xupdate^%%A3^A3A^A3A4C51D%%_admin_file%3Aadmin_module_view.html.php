<?php /* Smarty version 2.6.26, created on 2012-03-22 18:03:20
         compiled from file:admin_module_view.html */ ?>
<h3><?php echo @_AD_XUPDATE_LANG_MODULES; ?>
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

<?php if (! empty ( $this->_tpl_vars['xupdate_items'] )): ?>
	<div>
	<ul>
	<?php $_from = $this->_tpl_vars['xupdate_items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['data']):
?>
		<li><a href="index.php?action=ModuleStore&amp;sid=<?php echo $this->_tpl_vars['data']['storeobj']->get('sid'); ?>
"><?php echo $this->_tpl_vars['data']['storeobj']->getShow('name'); ?>
</a></li>
		<li>
		<?php echo @_AD_LEGACY_LANG_MOD_TOTAL; ?>
: <?php echo $this->_tpl_vars['data']['items_count']; ?>

		</li>
		<ul>
		<?php $_from = $this->_tpl_vars['data']['itemsobj']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['itemsobj']):
?>
			<li><a href="index.php?action=ModuleInstall&amp;id=<?php echo $this->_tpl_vars['itemsobj']->getShow('id'); ?>
"><?php echo $this->_tpl_vars['itemsobj']->getShow('dirname'); ?>
</a></li>
		<?php endforeach; endif; unset($_from); ?>
		</ul>
	<?php endforeach; endif; unset($_from); ?>
	</ul>
	</div>
<?php endif; ?>
