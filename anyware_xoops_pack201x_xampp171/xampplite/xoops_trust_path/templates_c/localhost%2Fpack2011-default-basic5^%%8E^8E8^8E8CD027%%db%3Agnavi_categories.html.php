<?php /* Smarty version 2.6.26, created on 2012-03-22 21:23:54
         compiled from db:gnavi_categories.html */ ?>
<?php $_from = $this->_tpl_vars['subcategories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['count'] => $this->_tpl_vars['cat']):
?>
	<div class="gnn_cat">
		<?php if ($this->_tpl_vars['cat']['imgurl'] != ""): ?>
			<a href="<?php echo $this->_tpl_vars['cat_link']; ?>
cid=<?php echo $this->_tpl_vars['cat']['cid']; ?>
">
				<img src="<?php echo $this->_tpl_vars['cat']['imgurl']; ?>
" alt="<?php echo $this->_tpl_vars['cat']['title']; ?>
" />
			</a>
		<?php endif; ?>
		<a href="<?php echo $this->_tpl_vars['cat_link']; ?>
cid=<?php echo $this->_tpl_vars['cat']['cid']; ?>
"><?php echo $this->_tpl_vars['cat']['title']; ?>
</a>&nbsp;(<?php echo $this->_tpl_vars['cat']['photo_total_sum']; ?>
)
	</div>
<?php endforeach; endif; unset($_from); ?>