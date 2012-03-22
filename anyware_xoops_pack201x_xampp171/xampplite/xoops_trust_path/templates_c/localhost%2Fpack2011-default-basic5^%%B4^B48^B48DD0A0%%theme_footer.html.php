<?php /* Smarty version 2.6.26, created on 2012-03-22 18:08:49
         compiled from basic5/theme_footer.html */ ?>
<?php if (! $this->_tpl_vars['xoops_isuser']): ?>
		<a href="http://xoops123.com/">Theme designed by marine/mistgreen</a>&nbsp;|&nbsp;
		<a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/user.php"><?php echo @_BASIC_LOGIN_FORM; ?>
</a>
<?php else: ?>
		<a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/user.php"><?php echo @_BASIC_USER_ACCOUNT; ?>
</a>&nbsp;|&nbsp;
		<a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/edituser.php"><?php echo @_BASIC_EDIT_ACCOUNT; ?>
</a>&nbsp;|&nbsp;
		<a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/notifications.php"><?php echo @_BASIC_NORTIFICATION; ?>
</a>&nbsp;|&nbsp;
		<a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/viewpmsg.php" <?php if ($this->_tpl_vars['pm']['new_messages']): ?>class="new1"<?php endif; ?>><?php echo @_BASIC_VIEWPMSG; ?>
(<?php echo $this->_tpl_vars['pm']['new_messages']; ?>
)</a>&nbsp;|&nbsp;
		<a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/user.php?op=logout"><?php echo @_BASIC_LOGOUT; ?>
</a>&nbsp;|&nbsp;
	<?php if ($this->_tpl_vars['xoops_isadmin']): ?>
		<a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/admin.php"><?php echo @_BASIC_ADMIN_PAGE; ?>
</a>&nbsp;|&nbsp;
	<?php endif; ?>
		<a href="http://xoops123.com/">Theme designed by marine/mistgreen</a>
<?php endif; ?>