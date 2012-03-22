<?php /* Smarty version 2.6.26, created on 2012-03-22 21:24:11
         compiled from db:xpwiki_main_d3comment.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'd3comment', 'db:xpwiki_main_d3comment.html', 3, false),)), $this); ?>
<!-- d3forum comment integration -->
<?php if ($this->_tpl_vars['mod_config']['comment_dirname'] && $this->_tpl_vars['mod_config']['comment_forum_id']): ?>
	<?php echo smarty_function_d3comment(array('mydirname' => $this->_tpl_vars['mydirname'],'class' => 'xpWikiD3commentContent'), $this);?>

<?php endif; ?>