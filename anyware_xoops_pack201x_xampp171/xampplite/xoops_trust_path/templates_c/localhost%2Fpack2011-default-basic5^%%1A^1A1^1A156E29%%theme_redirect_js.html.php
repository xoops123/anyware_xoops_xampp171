<?php /* Smarty version 2.6.26, created on 2012-03-22 18:08:49
         compiled from basic5/theme_redirect_js.html */ ?>
<?php if (( isset ( $this->_tpl_vars['is_redirected'] ) && $this->_tpl_vars['is_redirected'] ) || ( isset ( $this->_tpl_vars['xugj_pm_new_count'] ) && $this->_tpl_vars['xugj_pm_new_count'] )): ?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $this->_tpl_vars['xoops_imageurl']; ?>
js/jgrowl/jquery.jgrowl.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $this->_tpl_vars['xoops_imageurl']; ?>
js/jgrowl/jquery.jgrowl.redirect.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $this->_tpl_vars['xoops_imageurl']; ?>
js/jgrowl/jquery.jgrowl.iphone.css" />
	<?php if (! in_array ( 'jquery.jgrowl.js' , $this->_tpl_vars['xugj_already_js'] ) && ! in_array ( 'jquery.jgrowl_minimized.js' , $this->_tpl_vars['xugj_already_js'] ) && ! in_array ( 'jquery.jgrowl_google.js' , $this->_tpl_vars['xugj_already_js'] )): ?>
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['xoops_imageurl']; ?>
js/jgrowl/jquery.jgrowl_minimized.js"></script>
	<?php endif; ?>
	<?php if (isset ( $this->_tpl_vars['is_redirected'] ) && $this->_tpl_vars['is_redirected']): ?>
		<?php echo '
			<script type="text/javascript">
			jQuery(document).ready(function($){
		'; ?>

			$.jGrowl("<?php echo $this->_tpl_vars['redirect_message']; ?>
",
		<?php echo '
				{
					position: \'center\',
					theme: \'redirect\',
					life: 3000
				});
			});
			</script>
		'; ?>

	<?php endif; ?>
	<?php if (isset ( $this->_tpl_vars['xugj_pm_new_count'] ) && $this->_tpl_vars['xugj_pm_new_count']): ?>
		<?php echo '
			<script type="text/javascript">
			jQuery(document).ready(function($){
		'; ?>

			$('#xugj_pm_new_message').jGrowl("<?php echo $this->_tpl_vars['xugj_pm_new_message']; ?>
",
		<?php echo '
				{
					header: \'message\',
					theme: \'iphone\',
					life: 6000
				});
			});
			</script>
		'; ?>

	<?php endif; ?>
<?php endif; ?>