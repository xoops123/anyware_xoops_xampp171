<?php /* Smarty version 2.6.26, created on 2012-03-22 21:23:42
         compiled from db:pico_main_viewcontent.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'string_format', 'db:pico_main_viewcontent.html', 56, false),array('function', 'd3comment', 'db:pico_main_viewcontent.html', 123, false),)), $this); ?>
<div class="pico_container" id="<?php echo $this->_tpl_vars['mydirname']; ?>
_container">

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "db:".($this->_tpl_vars['mydirname'])."_inc_breadcrumbs.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php ob_start(); ?>
	<?php if ($this->_tpl_vars['content']['can_edit']): ?>
		<a href="<?php echo $this->_tpl_vars['mod_url']; ?>
/index.php?page=contentmanager&amp;content_id=<?php echo $this->_tpl_vars['content']['id']; ?>
">[<?php echo @_MD_PICO_LINK_EDITCONTENT; ?>
]</a>
	<?php endif; ?>

	<?php if ($this->_tpl_vars['xoops_isadmin']): ?>
		<a href="<?php echo $this->_tpl_vars['mod_url']; ?>
/admin/index.php?page=contents&amp;cat_id=<?php echo $this->_tpl_vars['category']['id']; ?>
">[<?php echo @_MD_PICO_LINK_BATCHCONTENTS; ?>
]</a>
	<?php endif; ?>
<?php $this->_smarty_vars['capture']['controllers'] = ob_get_contents(); ob_end_clean(); ?>

<?php if (trim ( $this->_smarty_vars['capture']['controllers'] )): ?>
	<!-- controllers -->
	<div class="pico_controllers">
		<?php echo $this->_smarty_vars['capture']['controllers']; ?>

	</div>
<?php endif; ?>


<!-- tags -->
<?php if ($this->_tpl_vars['content']['tags_array']): ?>
	<div class="pico_tags">
		<?php $_from = $this->_tpl_vars['content']['tags_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tag']):
?>
			<?php echo $this->_tpl_vars['tag']; ?>

		<?php endforeach; endif; unset($_from); ?>
	</div>
<?php endif; ?>

<!-- content (body) -->
<a name="top_of_pico_body" id="top_of_pico_body"></a>
<div class="pico_body" id="<?php echo $this->_tpl_vars['mydirname']; ?>
_body">
<?php echo $this->_tpl_vars['content']['body']; ?>

</div>

<!-- print icon -->
<?php if ($this->_tpl_vars['mod_config']['show_printicon']): ?>
	<div class="pico_print_icon"><a href="<?php echo $this->_tpl_vars['mod_url']; ?>
/<?php echo $this->_tpl_vars['content']['link']; ?>
<?php if ($this->_tpl_vars['mod_config']['use_wraps_mode'] || $this->_tpl_vars['mod_config']['use_rewrite']): ?>?<?php else: ?>&amp;<?php endif; ?>page=print"><img src="<?php echo $this->_tpl_vars['mod_imageurl']; ?>
/icon_print.gif" border="0" alt="<?php echo @_MD_PICO_LINK_PRINTERFRIENDLY; ?>
" /></a></div>
<?php endif; ?>

<!-- tell a friend -->
<?php if ($this->_tpl_vars['mod_config']['show_tellafriend'] && $this->_tpl_vars['content']['tellafriend_uri']): ?>
	<div class="pico_tellafriend_icon"><a href="<?php echo $this->_tpl_vars['content']['tellafriend_uri']; ?>
" target="_top"><img src="<?php echo $this->_tpl_vars['mod_imageurl']; ?>
/icon_tellafriend.gif" border="0" alt="<?php echo @_MD_PICO_LINK_TELLAFRIEND; ?>
" /></a></div>
<?php endif; ?>

<!-- vote -->
<?php if ($this->_tpl_vars['mod_config']['use_vote'] && $this->_tpl_vars['content']['id']): ?>
	<div class="pico_vote">
		<?php echo @_MD_PICO_VOTECOUNT; ?>
:<?php echo $this->_tpl_vars['content']['votes_count']; ?>

		<?php echo @_MD_PICO_VOTEPOINTAVG; ?>
:<?php echo ((is_array($_tmp=$this->_tpl_vars['content']['votes_avg'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>

		<?php if ($this->_tpl_vars['content']['can_vote']): ?>
			<form action="<?php echo $this->_tpl_vars['mod_url']; ?>
/index.php" method="get" name="pico_vote_best" id="pico_vote_best">
				<input type="hidden" name="page" value="vote_to_content" />
				<input type="hidden" name="content_id" value="<?php echo $this->_tpl_vars['content']['id']; ?>
" />
				<input type="hidden" name="point" value="10" />
				<input type="submit" value="<?php echo @_MD_PICO_VOTEPOINTDSCBEST; ?>
" />
			</form>
			<form action="<?php echo $this->_tpl_vars['mod_url']; ?>
/index.php" method="get" name="pico_vote_worst" id="pico_vote_worst">
				<input type="hidden" name="page" value="vote_to_content" />
				<input type="hidden" name="content_id" value="<?php echo $this->_tpl_vars['content']['id']; ?>
" />
				<input type="hidden" name="point" value="0" />
				<input type="submit" value="<?php echo @_MD_PICO_VOTEPOINTDSCWORST; ?>
" />
			</form>
		<?php endif; ?>
	</div>
<?php endif; ?>

<!-- jump to top -->
<div class="bottom_of_content_body"><a href="#top_of_pico_body"><?php echo @_MD_PICO_JUMPTOTOPOFPICOBODY; ?>
</a></div>

<?php if ($this->_tpl_vars['category']['isadminormod']): ?>
	<!-- informations for admin -->
	<?php echo @_MD_PICO_CREATED; ?>
:<?php echo $this->_tpl_vars['content']['created_time_formatted']; ?>
 <?php echo $this->_tpl_vars['content']['poster_uname']; ?>
 
	<?php if ($this->_tpl_vars['content']['modified_time'] > $this->_tpl_vars['content']['created_time']): ?>
		&nbsp;
		<?php echo @_MD_PICO_MODIFIED; ?>
:<?php echo $this->_tpl_vars['content']['modified_time_formatted']; ?>
 <?php echo $this->_tpl_vars['content']['modifier_uname']; ?>
 
	<?php endif; ?>
	&nbsp;
	<?php echo @_MD_PICO_VIEWED; ?>
:<?php echo $this->_tpl_vars['content']['viewed']; ?>

	<br />
<?php endif; ?>

<?php if (trim ( $this->_smarty_vars['capture']['controllers'] )): ?>
	<!-- controllers -->
	<div class="pico_controllers">
		<?php echo $this->_smarty_vars['capture']['controllers']; ?>

	</div>
<?php endif; ?>

<!-- page navigation -->
<?php if ($this->_tpl_vars['mod_config']['show_pagenavi'] && $this->_tpl_vars['content']['id']): ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="pico_pagenavigation">
<tr>
	<td width="33%" align="<?php echo @_ALIGN_START; ?>
" valign="top">
	<?php if ($this->_tpl_vars['prev_content']['id']): ?>
		<a href="<?php echo $this->_tpl_vars['mod_url']; ?>
/<?php echo $this->_tpl_vars['prev_content']['link']; ?>
" accesskey="F"><img src="<?php echo $this->_tpl_vars['mod_imageurl']; ?>
/navicon_<?php if (@_ALIGN_START == 'left'): ?>prev<?php else: ?>next<?php endif; ?>.gif" alt="<?php echo @_MD_PICO_PREV; ?>
" /></a><br />
		<?php echo $this->_tpl_vars['prev_content']['subject']; ?>

	<?php endif; ?>
	</td>
	<td width="34%" align="center" valign="top">
		<a href="<?php echo $this->_tpl_vars['mod_url']; ?>
/<?php echo $this->_tpl_vars['category']['link']; ?>
" accesskey="P"><img src="<?php echo $this->_tpl_vars['mod_imageurl']; ?>
/navicon_up.gif" alt="<?php echo @_MD_PICO_CATEGORYINDEX; ?>
" /></a><br />
		<?php echo $this->_tpl_vars['category']['title']; ?>

	</td>
	<td width="33%" align="<?php echo @_ALIGN_END; ?>
" valign="top">
	<?php if ($this->_tpl_vars['next_content']['id']): ?>
		<a href="<?php echo $this->_tpl_vars['mod_url']; ?>
/<?php echo $this->_tpl_vars['next_content']['link']; ?>
" accesskey="F"><img src="<?php echo $this->_tpl_vars['mod_imageurl']; ?>
/navicon_<?php if (@_ALIGN_START == 'left'): ?>next<?php else: ?>prev<?php endif; ?>.gif" alt="<?php echo @_MD_PICO_NEXT; ?>
" /></a><br />
		<?php echo $this->_tpl_vars['next_content']['subject']; ?>

	<?php endif; ?>
	</td>
</tr>
</table>
<?php endif; ?>


<!-- d3forum comment integration -->
<?php if ($this->_tpl_vars['mod_config']['comment_dirname'] && $this->_tpl_vars['mod_config']['comment_forum_id'] && $this->_tpl_vars['content']['allow_comment']): ?>
	<?php echo smarty_function_d3comment(array('mydirname' => $this->_tpl_vars['mydirname'],'class' => 'PicoD3commentContent'), $this);?>

<?php endif; ?>

<hr class="notification" />
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'db:system_notification_select.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</div>