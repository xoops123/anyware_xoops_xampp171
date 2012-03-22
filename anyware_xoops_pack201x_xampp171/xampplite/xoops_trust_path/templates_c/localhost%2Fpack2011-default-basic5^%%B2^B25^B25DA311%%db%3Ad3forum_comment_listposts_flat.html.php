<?php /* Smarty version 2.6.26, created on 2012-03-22 21:23:43
         compiled from db:d3forum_comment_listposts_flat.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'db:d3forum_comment_listposts_flat.html', 14, false),)), $this); ?>
<!-- begin simple comment form -->
<?php if ($this->_tpl_vars['forum']['can_post'] && ! $this->_tpl_vars['plugin_params']['no_form']): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "db:".($this->_tpl_vars['mydirname'])."_inc_post_form_quick.html", 'smarty_include_vars' => array('h2_title' => @_MD_D3FORUM_POSTASCOMMENTTOP,'quick_form_mode' => 'sametopic')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<!-- end simple comment form -->

<h2 class="head"><?php if ($this->_tpl_vars['plugin_params']['h2_comments']): ?><?php echo $this->_tpl_vars['plugin_params']['h2_comments']; ?>
<?php else: ?><?php echo @_MD_D3FORUM_COMMENTSLIST; ?>
<?php endif; ?></h2>

<?php if ($this->_tpl_vars['pagenav']): ?><div class="d3f_pagenav"><?php echo $this->_tpl_vars['pagenav']; ?>
</div><?php endif; ?>

<?php if ($this->_tpl_vars['forum']['can_post'] && $this->_tpl_vars['plugin_params']['no_form']): ?>

	<!-- link to comment input form -->
	<div><a href="<?php echo $this->_tpl_vars['mod_url']; ?>
/index.php?page=newtopic&amp;forum_id=<?php echo $this->_tpl_vars['forum']['id']; ?>
&amp;external_link_id=<?php echo ((is_array($_tmp=$this->_tpl_vars['external_link_id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&amp;subject=<?php echo ((is_array($_tmp=$this->_tpl_vars['subject'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"><?php if ($this->_tpl_vars['plugin_params']['link_to_form']): ?><?php echo $this->_tpl_vars['plugin_params']['link_to_form']; ?>
<?php else: ?><?php echo @_MD_D3FORUM_POSTASCOMMENTTOP; ?>
<?php endif; ?></a></div>

<?php endif; ?>


<!-- top of posts -->
<div class="d3f_wrap" id="d3comment_listposts_flat">
<?php $_from = $this->_tpl_vars['posts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['post']):
?>

<div class="head d3f_head">
	<a href="<?php echo $this->_tpl_vars['mod_url']; ?>
/index.php?post_id=<?php echo $this->_tpl_vars['post']['id']; ?>
" id="post_path<?php echo $this->_tpl_vars['post']['unique_path']; ?>
" name="post_path<?php echo $this->_tpl_vars['post']['unique_path']; ?>
"><?php echo $this->_tpl_vars['post']['subject']; ?>
</a>
</div>
<div class="d3f_info_ctrl d3f_info_ctrl02">
	<?php if ($this->_tpl_vars['post']['can_edit']): ?>
	<a href="<?php echo $this->_tpl_vars['mod_url']; ?>
/index.php?page=edit&amp;post_id=<?php echo $this->_tpl_vars['post']['id']; ?>
"><?php echo @_MD_D3FORUM_POSTEDIT; ?>
</a> |
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['post']['can_delete']): ?>
	<a href="<?php echo $this->_tpl_vars['mod_url']; ?>
/index.php?page=delete&amp;post_id=<?php echo $this->_tpl_vars['post']['id']; ?>
"><?php echo @_MD_D3FORUM_POSTDELETE; ?>
</a> |
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['post']['can_reply']): ?>
	<a href="<?php echo $this->_tpl_vars['mod_url']; ?>
/index.php?page=reply&amp;post_id=<?php echo $this->_tpl_vars['post']['id']; ?>
"><?php echo @_MD_D3FORUM_POSTREPLY; ?>
</a>
	<?php endif; ?>
</div>
<div class="d3f_info even">
	<?php if ($this->_tpl_vars['post']['poster_uid'] != 0): ?><a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/userinfo.php?uid=<?php echo $this->_tpl_vars['post']['poster_uid']; ?>
"><?php echo $this->_tpl_vars['post']['poster_uname']; ?>
</a><?php else: ?><?php echo $this->_tpl_vars['post']['poster_uname']; ?>
 <span class="d3f_trip"><?php echo $this->_tpl_vars['post']['guest_trip']; ?>
</trip><?php endif; ?>&nbsp;

	<?php echo @_MD_D3FORUM_ON; ?>
 <?php echo $this->_tpl_vars['post']['post_time_formatted']; ?>
 <?php if ($this->_tpl_vars['post']['post_time'] < $this->_tpl_vars['post']['modified_time']): ?> | <span title="<?php echo $this->_tpl_vars['post']['modified_time_formatted']; ?>
"><?php echo @_MD_D3FORUM_LASTMODIFIED; ?>
</span><?php endif; ?>
</div>
<div class="d3f_body d3f_body02">
	<?php echo $this->_tpl_vars['post']['post_text']; ?>

</div>


<?php endforeach; endif; unset($_from); ?>
</div>
<!-- bottom of posts -->

<div class="d3f_link"><a href="<?php echo $this->_tpl_vars['mod_url']; ?>
/index.php?forum_id=<?php echo $this->_tpl_vars['forum']['id']; ?>
&amp;external_link_id=<?php echo ((is_array($_tmp=$this->_tpl_vars['external_link_id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"><?php echo @_MD_D3FORUM_LINK_LISTALLCOMMENTS; ?>
</a></div>

<?php if ($this->_tpl_vars['pagenav']): ?><div class="d3f_pagenav"><?php echo $this->_tpl_vars['pagenav']; ?>
</div><?php endif; ?>
