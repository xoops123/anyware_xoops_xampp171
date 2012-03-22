<?php /* Smarty version 2.6.26, created on 2012-03-22 21:23:25
         compiled from basic5/theme_moduletitle.html */ ?>
<?php if ($this->_tpl_vars['xoops_dirname'] == 'webphoto'): ?>
	<h2>
	<?php $_from = $this->_tpl_vars['xoops_breadcrumbs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
		<?php if ($this->_tpl_vars['item']['url']): ?>
			<a href="<?php echo $this->_tpl_vars['item']['url']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</a> &nbsp;&gt;
		<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
 		<?php echo $this->_tpl_vars['title_bread_crumb']; ?>

	</h2>
<?php elseif ($this->_tpl_vars['xoops_dirname'] == 'piCal'): ?>
	<?php $_from = $this->_tpl_vars['xoops_breadcrumbs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
		<h2><?php echo $this->_tpl_vars['item']['name']; ?>
</h2>
	<?php endforeach; endif; unset($_from); ?>
<?php elseif ($this->_tpl_vars['xoops_dirname'] == 'ccenter'): ?>
	<?php $_from = $this->_tpl_vars['xoops_breadcrumbs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['loop']['iteration']++;
?>
		<?php if (($this->_foreach['loop']['iteration'] <= 1)): ?>
			<h2><?php echo $this->_tpl_vars['item']['name']; ?>
</h2>
	  	<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
<?php else: ?>
	<h2>
	<?php $_from = $this->_tpl_vars['xoops_breadcrumbs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['loop']['iteration']++;
?>
		<?php if (($this->_foreach['loop']['iteration'] <= 1)): ?>
			<?php if ($this->_tpl_vars['item']['url']): ?>
				<a href="<?php echo $this->_tpl_vars['item']['url']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</a>
		  	<?php else: ?>
		        <?php echo $this->_tpl_vars['item']['name']; ?>

		  	<?php endif; ?>
	  	<?php else: ?>
			<?php if ($this->_tpl_vars['item']['url']): ?>
				&nbsp;&gt;&nbsp;<a href="<?php echo $this->_tpl_vars['item']['url']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</a>
		  	<?php else: ?>
		        &nbsp;&gt;&nbsp;<?php echo $this->_tpl_vars['item']['name']; ?>

		  	<?php endif; ?>
	  	<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
	</h2>
<?php endif; ?>