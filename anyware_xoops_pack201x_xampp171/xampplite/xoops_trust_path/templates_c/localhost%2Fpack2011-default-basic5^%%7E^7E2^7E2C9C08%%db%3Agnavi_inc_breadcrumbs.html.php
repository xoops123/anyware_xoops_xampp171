<?php /* Smarty version 2.6.26, created on 2012-03-22 21:23:54
         compiled from db:gnavi_inc_breadcrumbs.html */ ?>
<div id="gn_breadcrumbs">
	<?php $_from = $this->_tpl_vars['xoops_breadcrumbs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['bc']):
?>
		<?php if ($this->_tpl_vars['bc']['url']): ?>
			<a href="<?php echo $this->_tpl_vars['bc']['url']; ?>
"><?php echo $this->_tpl_vars['bc']['name']; ?>
</a>&nbsp;&gt;&nbsp;
		<?php else: ?>
			<?php echo $this->_tpl_vars['bc']['name']; ?>

		<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
</div>