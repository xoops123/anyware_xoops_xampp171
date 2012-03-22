<?php /* Smarty version 2.6.26, created on 2012-03-22 21:23:41
         compiled from db:pico_inc_breadcrumbs.html */ ?>
<?php if ($this->_tpl_vars['mod_config']['show_breadcrumbs']): ?>
<!-- breadcrumbs -->
<div class="pico_breadcrumbs">
	<a href="<?php echo $this->_tpl_vars['mod_url']; ?>
/index.php"><?php echo @_MD_PICO_TOP; ?>
</a>
	<?php $_from = $this->_tpl_vars['xoops_breadcrumbs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['bc']):
?>
		<?php if ($this->_tpl_vars['i'] > 0): ?>
			&nbsp;&gt;&nbsp;
			<?php if ($this->_tpl_vars['bc']['url']): ?>
				<a href="<?php echo $this->_tpl_vars['bc']['url']; ?>
"><?php echo $this->_tpl_vars['bc']['name']; ?>
</a>
			<?php else: ?>
				<?php echo $this->_tpl_vars['bc']['name']; ?>

			<?php endif; ?>
		<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
</div>
<?php endif; ?>