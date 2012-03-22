<?php /* Smarty version 2.6.26, created on 2012-03-22 21:24:01
         compiled from db:d3forum_main_listcategories.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'xugj_block', 'db:d3forum_main_listcategories.html', 76, false),array('function', 'cycle', 'db:d3forum_main_listcategories.html', 90, false),)), $this); ?>
<!-- start module contents -->
<!-- breadcrumbs -->
<div id="main_listcategories" class="clearfix">

<div class="d3f_breadcrumbs">
	<a href="<?php echo $this->_tpl_vars['mod_url']; ?>
/index.php?cat_ids=0"><?php echo @_MD_D3FORUM_LISTALLTOPICS; ?>
</a>
</div>

<div class="d3f_top_message"><?php echo $this->_tpl_vars['mod_config']['top_message']; ?>
</div>
<div class="d3f_c001">
<a href="<?php echo $this->_tpl_vars['mod_url']; ?>
/index.php?forum_id=1"><img src="<?php echo $this->_tpl_vars['xoops_imageurl']; ?>
images/c001.png" alt="welcome" title="welcome" /></a>
</div>

<div>
	<dl class="d3f_bbsinfo">
	<dt><?php echo @_MD_D3FORUM_TOTALTOPICSCOUNT; ?>
:</dt>
		<dd><?php echo $this->_tpl_vars['total_topics_count']; ?>
</dd>
	<dt><?php echo @_MD_D3FORUM_TOTALPOSTSCOUNT; ?>
:</dt>
		<dd><?php echo $this->_tpl_vars['total_posts_count']; ?>
</dd>
	<dt><?php echo @_MD_D3FORUM_TIMENOW; ?>
:</dt>
		<dd><?php echo $this->_tpl_vars['currenttime_formatted']; ?>
</dd>
	<dt><?php echo @_MD_D3FORUM_LASTVISIT; ?>
:</dt>
		<dd><?php echo $this->_tpl_vars['lastvisit_formatted']; ?>
</dd>
	</dl>

	<!-- top controller -->
	<ul class="d3f_ctrl">
		<?php if ($this->_tpl_vars['xoops_isadmin']): ?>
			<li><a href="<?php echo $this->_tpl_vars['mod_url']; ?>
/index.php?page=makecategory"><?php echo @_MD_D3FORUM_LINK_MAKECATEGORY; ?>
</a></li>
		<?php endif; ?>
			<li><a href="<?php echo $this->_tpl_vars['mod_url']; ?>
/index.php?page=rss&amp;cat_ids=0&amp;odr=1"><?php echo @_MD_D3FORUM_LINK_ALLRSS; ?>
 <img src="<?php echo $this->_tpl_vars['xoops_imageurl']; ?>
images/icon_rss.png" alt="<?php echo @_EDIT; ?>
" width="16" height="16" /></a></li>
	</ul>
</div>

<!-- marine modifi --><!-- start categories -->
<div id="d3f_forum_list" class="clearfix">
<ul>
	<?php $_from = $this->_tpl_vars['top_categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['category']):
?>
		<li>
		<a href="<?php echo $this->_tpl_vars['mod_url']; ?>
/index.php?cat_id=<?php echo $this->_tpl_vars['category']['id']; ?>
">
		<img src="<?php echo $this->_tpl_vars['mod_imageurl']; ?>
/category_<?php echo $this->_tpl_vars['category']['bit_new']; ?>
.gif" alt="" width="16" height="16" />
		<?php echo $this->_tpl_vars['category']['title']; ?>

		</a>&nbsp;&nbsp;&gt;&nbsp;&nbsp;

		<!-- forums -->
		<ul>
		<?php $_from = $this->_tpl_vars['category']['forums']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['forum']):
?>
				<li><a href="<?php echo $this->_tpl_vars['mod_url']; ?>
/index.php?forum_id=<?php echo $this->_tpl_vars['forum']['id']; ?>
">
					<img src="<?php echo $this->_tpl_vars['mod_imageurl']; ?>
/forum_<?php echo $this->_tpl_vars['forum']['bit_new']; ?>
.gif" alt="<?php echo $this->_tpl_vars['forum']['title']; ?>
" width="16" height="16" />
					<?php echo $this->_tpl_vars['forum']['title']; ?>

				</a></li>
		<?php endforeach; endif; unset($_from); ?>
		</ul>
		</li>
	<?php endforeach; endif; unset($_from); ?>
</ul>

<!-- Sub Categories -->
<?php $_from = $this->_tpl_vars['top_categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['category']):
?>
<?php if ($this->_tpl_vars['category']['subcategories']): ?>
	<a href="<?php echo $this->_tpl_vars['mod_url']; ?>
/index.php?cat_id=<?php echo $this->_tpl_vars['category']['id']; ?>
"><img src="<?php echo $this->_tpl_vars['mod_imageurl']; ?>
/category_<?php echo $this->_tpl_vars['category']['bit_new']; ?>
.gif" alt="" width="16" height="16" /><?php echo $this->_tpl_vars['category']['title']; ?>
</a>&nbsp;&nbsp;&gt;&nbsp;&nbsp;
	<?php $_from = $this->_tpl_vars['category']['subcategories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['category']):
?>
		<ul>
		<li>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo $this->_tpl_vars['mod_url']; ?>
/index.php?cat_id=<?php echo $this->_tpl_vars['category']['id']; ?>
"><img src="<?php echo $this->_tpl_vars['mod_imageurl']; ?>
/category_<?php echo $this->_tpl_vars['category']['bit_new']; ?>
.gif" alt="" width="16" height="16" /><?php echo $this->_tpl_vars['category']['title']; ?>
</a>&nbsp;&nbsp;&gt;&nbsp;&nbsp;
			<?php $_from = $this->_tpl_vars['category']['forums']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['forum']):
?>
				<a href="<?php echo $this->_tpl_vars['mod_url']; ?>
/index.php?forum_id=<?php echo $this->_tpl_vars['forum']['id']; ?>
" title="<?php echo $this->_tpl_vars['block']['lang_lastupdated']; ?>
:<?php echo $this->_tpl_vars['forum']['last_post_time_formatted']; ?>
"><img src="<?php echo $this->_tpl_vars['mod_imageurl']; ?>
/forum_<?php echo $this->_tpl_vars['forum']['bit_new']; ?>
.gif" alt="<?php echo $this->_tpl_vars['forum']['title']; ?>
" width="16" height="16" /><?php echo $this->_tpl_vars['forum']['title']; ?>
</a>
			<?php endforeach; endif; unset($_from); ?>
		</li>
		</ul>
	<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?><!-- End marine modifi -->
</div>

<div><!-- marine modifi xugj_block topics-->
<?php echo smarty_function_xugj_block(array('file' => "modules/d3forum/blocks/blocks.php",'func' => 'b_d3forum_list_topics_show','opt' => "d3forum,15,1,time,1,0,,",'item' => 'block'), $this);?>

<?php if ($this->_tpl_vars['block']['full_view'] == true): ?>
<table class="d3f_outer" cellspacing="1">
<thead>
<tr>
	<th><?php echo $this->_tpl_vars['block']['lang_forum']; ?>
</th>
	<th><?php echo $this->_tpl_vars['block']['lang_topic']; ?>
</th>
	<th><?php echo $this->_tpl_vars['block']['lang_replies']; ?>
</th>
	<th><?php echo $this->_tpl_vars['block']['lang_views']; ?>
</th>
	<th colspan="2"><?php echo $this->_tpl_vars['block']['lang_lastpost']; ?>
</th>
</tr>
</thead>
<?php $_from = $this->_tpl_vars['block']['topics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['topic']):
?>
<?php echo '<tr class="'; ?><?php echo smarty_function_cycle(array('values' => "even,odd"), $this);?><?php echo '"><td><a href="'; ?><?php echo $this->_tpl_vars['block']['mod_url']; ?><?php echo '/index.php?forum_id='; ?><?php echo $this->_tpl_vars['topic']['forum_id']; ?><?php echo '">'; ?><?php echo $this->_tpl_vars['topic']['forum_title']; ?><?php echo '</a></td><td><a href="'; ?><?php echo $this->_tpl_vars['block']['mod_url']; ?><?php echo '/index.php?topic_id='; ?><?php echo $this->_tpl_vars['topic']['id']; ?><?php echo '#post_id'; ?><?php echo $this->_tpl_vars['topic']['last_post_id']; ?><?php echo '">'; ?><?php if ($this->_tpl_vars['topic']['u2t_marked']): ?><?php echo '<img src="'; ?><?php echo $this->_tpl_vars['block']['mod_imageurl']; ?><?php echo '/block_marked.gif" alt="'; ?><?php echo $this->_tpl_vars['block']['lang_alt_marked']; ?><?php echo '" />'; ?><?php endif; ?><?php echo ''; ?><?php echo ''; ?><?php if ($this->_tpl_vars['block']['disp_last_subject']): ?><?php echo ''; ?><?php echo $this->_tpl_vars['topic']['last_subject']; ?><?php echo ''; ?><?php else: ?><?php echo ''; ?><?php echo $this->_tpl_vars['topic']['title']; ?><?php echo ''; ?><?php endif; ?><?php echo '</a>'; ?><?php if (! $this->_tpl_vars['topic']['solved']): ?><?php echo '<img src="'; ?><?php echo $this->_tpl_vars['block']['mod_imageurl']; ?><?php echo '/block_unsolved.gif" alt="'; ?><?php echo $this->_tpl_vars['block']['lang_alt_unsolved']; ?><?php echo '" />'; ?><?php endif; ?><?php echo '</td><td align="center">'; ?><?php echo $this->_tpl_vars['topic']['replies']; ?><?php echo '</td><td align="center">'; ?><?php echo $this->_tpl_vars['topic']['views']; ?><?php echo '</td><td align="center" nowrap="nowrap">'; ?><?php echo $this->_tpl_vars['topic']['last_uname']; ?><?php echo '</td><td align="right" nowrap="nowrap">'; ?><?php echo $this->_tpl_vars['topic']['last_post_time_formatted']; ?><?php echo '</td></tr>'; ?>

<?php endforeach; endif; unset($_from); ?>
</table>

<a href="<?php echo $this->_tpl_vars['block']['mod_url']; ?>
/index.php?page=search"><?php echo $this->_tpl_vars['block']['lang_linktosearch']; ?>
&nbsp;&gt;&gt;</a>
&nbsp;&nbsp;
<?php if (is_numeric ( $this->_tpl_vars['block']['forums'] )): ?>
<a href="<?php echo $this->_tpl_vars['block']['mod_url']; ?>
/index.php?forum_id=<?php echo $this->_tpl_vars['block']['forums']; ?>
"><?php echo $this->_tpl_vars['block']['lang_linktolisttopics']; ?>
&nbsp;&gt;&gt;</a>
<?php else: ?>
<a href="<?php echo $this->_tpl_vars['block']['mod_url']; ?>
/index.php?cat_ids=<?php echo $this->_tpl_vars['block']['categories']; ?>
"><?php echo $this->_tpl_vars['block']['lang_linktolisttopics']; ?>
&nbsp;&gt;&gt;</a>
<?php endif; ?>
&nbsp;&nbsp;
<?php if (is_numeric ( $this->_tpl_vars['block']['categories'] )): ?>
<a href="<?php echo $this->_tpl_vars['block']['mod_url']; ?>
/index.php?cat_id=<?php echo $this->_tpl_vars['block']['categories']; ?>
"><?php echo $this->_tpl_vars['block']['lang_linktolistforums']; ?>
&nbsp;&gt;&gt;</a>
&nbsp;&nbsp;
<?php endif; ?>
<a href="<?php echo $this->_tpl_vars['block']['mod_url']; ?>
/index.php"><?php echo $this->_tpl_vars['block']['lang_linktolistcategories']; ?>
&nbsp;&gt;&gt;</a>

<?php else: ?>

<ol style="padding:3px;margin:0;">
<?php $_from = $this->_tpl_vars['block']['topics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['topic']):
?>
	<li><a href="<?php echo $this->_tpl_vars['block']['mod_url']; ?>
/index.php?topic_id=<?php echo $this->_tpl_vars['topic']['id']; ?>
"><?php echo $this->_tpl_vars['topic']['title']; ?>
</a>(<?php echo $this->_tpl_vars['topic']['replies']; ?>
) <?php echo $this->_tpl_vars['topic']['last_uname']; ?>
 <?php echo $this->_tpl_vars['topic']['last_post_time_formatted']; ?>
</li>
<?php endforeach; endif; unset($_from); ?>
</ol>

<?php endif; ?>
</div>

</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'db:system_notification_select.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!-- end module contents -->