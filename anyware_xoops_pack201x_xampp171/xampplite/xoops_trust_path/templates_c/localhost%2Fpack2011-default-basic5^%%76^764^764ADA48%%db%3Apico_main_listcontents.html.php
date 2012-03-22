<?php /* Smarty version 2.6.26, created on 2012-03-22 21:23:40
         compiled from db:pico_main_listcontents.html */ ?>
<div class="pico_container" id="<?php echo $this->_tpl_vars['mydirname']; ?>
_container">

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "db:".($this->_tpl_vars['mydirname'])."_inc_breadcrumbs.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<!-- controllers -->
<div class="pico_controllers">

	<!-- link to menu -->
	<a href="<?php echo $this->_tpl_vars['mod_url']; ?>
/index.php?page=menu">[<?php echo @_MD_PICO_MENU; ?>
]</a>
	
	<?php if ($this->_tpl_vars['category']['isadminormod']): ?>
	<a href="<?php echo $this->_tpl_vars['mod_url']; ?>
/index.php?page=categorymanager&amp;cat_id=<?php echo $this->_tpl_vars['category']['id']; ?>
">[<?php echo @_MD_PICO_LINK_EDITCATEGORY; ?>
]</a>
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['xoops_isadmin']): ?>
		<a href="<?php echo $this->_tpl_vars['mod_url']; ?>
/admin/index.php?page=category_access&amp;cat_id=<?php echo $this->_tpl_vars['category']['id']; ?>
">[<?php echo @_MD_PICO_LINK_CATEGORYPERMISSIONS; ?>
]</a>
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['xoops_isadmin']): ?>
		<a href="<?php echo $this->_tpl_vars['mod_url']; ?>
/admin/index.php?page=contents&amp;cat_id=<?php echo $this->_tpl_vars['category']['id']; ?>
">[<?php echo @_MD_PICO_LINK_BATCHCONTENTS; ?>
]</a>
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['category']['can_makesubcategory']): ?>
	<a href="<?php echo $this->_tpl_vars['mod_url']; ?>
/index.php?page=makecategory&amp;pid=<?php echo $this->_tpl_vars['category']['id']; ?>
">[<?php echo @_MD_PICO_LINK_MAKESUBCATEGORY; ?>
]</a>
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['category']['can_post']): ?>
	<a href="<?php echo $this->_tpl_vars['mod_url']; ?>
/index.php?page=makecontent&amp;cat_id=<?php echo $this->_tpl_vars['category']['id']; ?>
&amp;ret=mc<?php echo $this->_tpl_vars['category']['id']; ?>
">[<?php echo @_MD_PICO_LINK_MAKECONTENT; ?>
]</a>
	<?php endif; ?>

	<!-- link to RSS -->
	<a href="<?php echo $this->_tpl_vars['mod_url']; ?>
/index.php?page=rss&amp;cat_id=<?php echo $this->_tpl_vars['category']['id']; ?>
">[RSS]</a>
	
</div>

<?php if ($this->_tpl_vars['category']['id'] == 0): ?><p><?php echo $this->_tpl_vars['mod_config']['top_message']; ?>
</p><?php endif; ?>

<h1><?php echo $this->_tpl_vars['category']['title']; ?>
</h1>
<?php if ($this->_tpl_vars['category']['isadminormod']): ?>
	<p>
	<?php echo @_MD_PICO_CONTENTS_TOTAL; ?>
:<?php echo $this->_tpl_vars['category']['redundants']['contents_total']; ?>

	<?php echo @_MD_PICO_SUBCATEGORIES_TOTAL; ?>
:<?php echo $this->_tpl_vars['category']['redundants']['subcategories_total']; ?>

	</p>
<?php endif; ?>

<p><?php echo $this->_tpl_vars['category']['desc']; ?>
</p>

<!-- list subcategories -->
<?php if ($this->_tpl_vars['subcategories']): ?>
<h2><?php echo @_MD_PICO_SUBCATEGORIES; ?>
</h2>
<?php $_from = $this->_tpl_vars['subcategories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['subcategory']):
?>
	<dl class="pico_subcategory">
		<dt>
			<a href="<?php echo $this->_tpl_vars['mod_url']; ?>
/<?php echo $this->_tpl_vars['subcategory']['link']; ?>
"><?php echo $this->_tpl_vars['subcategory']['title']; ?>
</a>
			<?php if ($this->_tpl_vars['category']['isadminormod']): ?>
				<?php echo @_MD_PICO_CONTENTS_TOTAL; ?>
:<?php echo $this->_tpl_vars['subcategory']['redundants']['contents_total']; ?>

				<?php echo @_MD_PICO_SUBCATEGORIES_TOTAL; ?>
:<?php echo $this->_tpl_vars['subcategory']['redundants']['subcategories_total']; ?>

			<?php endif; ?>
		</dt>
		<dd>
			<?php echo $this->_tpl_vars['subcategory']['desc']; ?>

		</dd>
	</dl>
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>

<!-- list contents -->
<?php if ($this->_tpl_vars['contents']): ?>
<h2><?php echo @_MD_PICO_CONTENTS; ?>
</h2>
<ul class="pico_list_contents">
<?php $_from = $this->_tpl_vars['contents']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['content']):
?>
	<li><a href="<?php echo $this->_tpl_vars['mod_url']; ?>
/<?php echo $this->_tpl_vars['content']['link']; ?>
">
	<?php if ($this->_tpl_vars['content']['public']): ?>
		<?php echo $this->_tpl_vars['content']['subject']; ?>

	<?php elseif ($this->_tpl_vars['category']['isadminormod']): ?>
		<em class="pico_notice"><?php echo $this->_tpl_vars['content']['subject']; ?>
</em>
		<?php if (! $this->_tpl_vars['content']['approval']): ?>
			(<?php echo $this->_tpl_vars['content']['poster_uname']; ?>
 <?php echo $this->_tpl_vars['content']['created_time_formatted']; ?>
 )
		<?php endif; ?>
	<?php endif; ?>
	</a>
	<?php if ($this->_tpl_vars['category']['can_edit']): ?>
		<a href="<?php echo $this->_tpl_vars['mod_url']; ?>
/index.php?page=contentmanager&amp;content_id=<?php echo $this->_tpl_vars['content']['id']; ?>
&amp;ret=mc<?php echo $this->_tpl_vars['category']['id']; ?>
"><img src="<?php echo $this->_tpl_vars['mod_imageurl']; ?>
/icon_edit.gif" alt="<?php echo @_MD_PICO_LINK_EDITCONTENT; ?>
" /></a>
	<?php endif; ?>
	</li>
<?php endforeach; endif; unset($_from); ?>
</ul>
<?php endif; ?>

<hr class="notification" />
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'db:system_notification_select.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</div>
<!-- end module contents -->