<?php /* Smarty version 2.6.26, created on 2012-03-22 18:08:49
         compiled from basic5/theme_centercolumn.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strstr', 'basic5/theme_centercolumn.html', 6, false),)), $this); ?>
<?php if ($this->_tpl_vars['xoops_showcblock'] == 1): ?>
	<?php if ($this->_tpl_vars['xoops_ccblocks']): ?>	   	<?php $_from = $this->_tpl_vars['xoops_ccblocks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['ccloop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['ccloop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['block']):
        $this->_foreach['ccloop']['iteration']++;
?>
		<?php if ($this->_tpl_vars['block']['weight'] > 0 && $this->_tpl_vars['block']['weight'] < 100): ?>
			<div>
				<?php if (! ((is_array($_tmp=$this->_tpl_vars['block']['title'])) ? $this->_run_mod_handler('strstr', true, $_tmp, 'none') : strstr($_tmp, 'none'))): ?><h3><?php echo $this->_tpl_vars['block']['title']; ?>
</h3><?php endif; ?>
				<?php echo $this->_tpl_vars['block']['content']; ?>

			</div>
		<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['xoops_clblocks']): ?>		<div id="CenterLColumn">
		<?php $_from = $this->_tpl_vars['xoops_clblocks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['clloop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['clloop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['block']):
        $this->_foreach['clloop']['iteration']++;
?>
			<div>
 				<?php if (! ((is_array($_tmp=$this->_tpl_vars['block']['title'])) ? $this->_run_mod_handler('strstr', true, $_tmp, 'none') : strstr($_tmp, 'none'))): ?><h3><?php echo $this->_tpl_vars['block']['title']; ?>
</h3><?php endif; ?>
 				<?php echo $this->_tpl_vars['block']['content']; ?>

			</div>
		<?php endforeach; endif; unset($_from); ?>
		</div>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['xoops_crblocks']): ?>		<div id="CenterRColumn">
		<?php $_from = $this->_tpl_vars['xoops_crblocks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['crloop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['crloop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['block']):
        $this->_foreach['crloop']['iteration']++;
?>
			<div>
 				<?php if (! ((is_array($_tmp=$this->_tpl_vars['block']['title'])) ? $this->_run_mod_handler('strstr', true, $_tmp, 'none') : strstr($_tmp, 'none'))): ?><h3><?php echo $this->_tpl_vars['block']['title']; ?>
</h3><?php endif; ?>
 				<?php echo $this->_tpl_vars['block']['content']; ?>

			</div>
		<?php endforeach; endif; unset($_from); ?>
		</div>
	<?php endif; ?>	<div class="clearfix"></div>

<?php endif; ?>

<?php if ($this->_tpl_vars['xoops_contents']): ?><div id="ModuleContents"><?php echo $this->_tpl_vars['xoops_contents']; ?>
</div><?php endif; ?>

<?php if ($this->_tpl_vars['xoops_showcblock'] == 1): ?>
	<?php if ($this->_tpl_vars['xoops_ccblocks']): ?>		<?php $_from = $this->_tpl_vars['xoops_ccblocks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['ccloop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['ccloop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['block']):
        $this->_foreach['ccloop']['iteration']++;
?>
			<?php if ($this->_tpl_vars['block']['weight'] >= 100 && $this->_tpl_vars['block']['weight'] < 500): ?>
			<div>
				<?php if (! ((is_array($_tmp=$this->_tpl_vars['block']['title'])) ? $this->_run_mod_handler('strstr', true, $_tmp, 'none') : strstr($_tmp, 'none'))): ?><h3><?php echo $this->_tpl_vars['block']['title']; ?>
</h3><?php endif; ?>
				<?php echo $this->_tpl_vars['block']['content']; ?>

			</div>
	 		<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
	<?php endif; ?><?php endif; ?>