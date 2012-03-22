<?php /* Smarty version 2.6.26, created on 2012-03-22 18:08:48
         compiled from basic5/theme.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'regex_replace', 'basic5/theme.html', 28, false),array('modifier', 'basename', 'basic5/theme.html', 53, false),array('modifier', 'dirname', 'basic5/theme.html', 53, false),array('modifier', 'strstr', 'basic5/theme.html', 118, false),array('function', 'cycle', 'basic5/theme.html', 78, false),)), $this); ?>
<?php echo ''; ?><?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => (@XOOPS_THEME_PATH)."/".($this->_tpl_vars['xoops_theme'])."/xugj_assign_theme_language_inc.php", 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?><?php echo ''; ?><?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => (@XOOPS_THEME_PATH)."/".($this->_tpl_vars['xoops_theme'])."/xugj_assign_basic.php", 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?><?php echo ''; ?><?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => (@XOOPS_THEME_PATH)."/".($this->_tpl_vars['xoops_theme'])."/xugj_already_js.php", 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?><?php echo '<!DOCTYPE html>'; ?>

<html lang="<?php echo $this->_tpl_vars['xoops_langcode']; ?>
">
<head>
<meta charset="<?php echo $this->_tpl_vars['xoops_charset']; ?>
" />
<title><?php echo $this->_tpl_vars['xoops_sitename']; ?>
 - <?php if ($this->_tpl_vars['xoops_pagetitle']): ?><?php echo $this->_tpl_vars['xoops_pagetitle']; ?>
<?php else: ?><?php echo $this->_tpl_vars['xoops_slogan']; ?>
<?php endif; ?></title>
<meta name="robots" content="<?php echo $this->_tpl_vars['xoops_meta_robots']; ?>
" />
<meta name="keywords" content="<?php echo $this->_tpl_vars['xoops_meta_keywords']; ?>
" />
<meta name="description" content="<?php echo $this->_tpl_vars['xoops_meta_description']; ?>
" />
<meta name="rating" content="<?php echo $this->_tpl_vars['xoops_meta_rating']; ?>
" />
<meta name="author" content="<?php echo $this->_tpl_vars['xoops_meta_author']; ?>
 <?php echo $this->_tpl_vars['xoops_meta_copyright']; ?>
" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['xoops_imageurl']; ?>
reset.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/xoops.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['xoops_imageurl']; ?>
style.css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
<link href='http://fonts.googleapis.com/css?family=Droid+Serif:700,400,400italic,700italic' rel='stylesheet' type='text/css' />
<!--[if IE]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script type="text/javascript"><?php echo ((is_array($_tmp=$this->_tpl_vars['xoops_js'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/(\/\/\-\->|<!\-\-)/", "") : smarty_modifier_regex_replace($_tmp, "/(\/\/\-\->|<!\-\-)/", "")); ?>
</script>
<?php if (! $this->_tpl_vars['xcl22_jquery_is_already'] && ! $this->_tpl_vars['xugj_jquery_is_already']): ?>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['xoops_imageurl']; ?>
js/jquery-1.7.1.min.js"></script>
<?php endif; ?>
<?php if ($this->_tpl_vars['xoops_module_header']): ?><?php echo $this->_tpl_vars['xoops_module_header']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['xoops_block_header']): ?><?php echo $this->_tpl_vars['xoops_block_header']; ?>
<?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['xoops_theme'])."/theme_redirect_js.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['xoops_imageurl']; ?>
modules.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['xoops_imageurl']; ?>
media-queries.css" />
<script type="text/javascript">
   var GuideSentence = '<?php echo @_BASIC_SEARCH; ?>
';
   function ShowFormGuide(obj) {
      if( obj.value == '' ) {
         obj.value = GuideSentence;
         obj.style.color = '#808080';
      }
   }
   function HideFormGuide(obj) {
      if( obj.value == GuideSentence ) {
         obj.value='';
         obj.style.color = '#000000';
      }
   }
</script>
</head>
<body id="home" class="L<?php echo $this->_tpl_vars['xoops_showlblock']; ?>
R<?php echo $this->_tpl_vars['xoops_showrblock']; ?>
 <?php echo ''; ?><?php if (((is_array($_tmp=$_SERVER['SCRIPT_FILENAME'])) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp)) == "index.php" && ((is_array($_tmp=((is_array($_tmp=$_SERVER['SCRIPT_FILENAME'])) ? $this->_run_mod_handler('dirname', true, $_tmp) : dirname($_tmp)))) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp)) == ((is_array($_tmp=@XOOPS_ROOT_PATH)) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp))): ?><?php echo 'home'; ?><?php else: ?><?php echo ''; ?><?php if ($this->_tpl_vars['xugj_trustdirname']): ?><?php echo ''; ?><?php echo $this->_tpl_vars['xugj_trustdirname']; ?><?php echo ''; ?><?php elseif (! $this->_tpl_vars['xoops_dirname'] == ""): ?><?php echo ''; ?><?php echo $this->_tpl_vars['xoops_dirname']; ?><?php echo ''; ?><?php else: ?><?php echo 'ather'; ?><?php endif; ?><?php echo ''; ?><?php endif; ?><?php echo '">'; ?>

	<div id="wrapper">
		<header id="header">
			<h1><a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/"><?php echo $this->_tpl_vars['xoops_sitename']; ?>
</a></h1>
				<?php if ($this->_tpl_vars['xoops_dirname'] == ""): ?>
				  <h2>Welcome to <?php echo $this->_tpl_vars['xoops_sitename']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->_tpl_vars['xoops_slogan']; ?>
</h2>
				<?php else: ?>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['xoops_theme'])."/theme_moduletitle.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				<?php endif; ?>
		<nav>
		<div id="navigation">
				<?php if ($this->_tpl_vars['menu0']['dirname'] == $this->_tpl_vars['xoops_dirname']): ?>
					<a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/" class="act"><?php echo @_BASIC_HOME_NAME; ?>
</a>
				<?php else: ?>
					<a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/" class="menu_c<?php echo smarty_function_cycle(array('values' => "1,2,3,4,5,6,7"), $this);?>
"><?php echo @_BASIC_HOME_NAME; ?>
</a>
				<?php endif; ?>
				<?php $_from = $this->_tpl_vars['xugj_menus']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['menu0']):
?>
							<?php if ($this->_tpl_vars['menu0']['dirname'] == $this->_tpl_vars['xoops_dirname']): ?>
									<?php $this->assign('xugj_menus1', $this->_tpl_vars['menu0']['sub']); ?>
									<?php $this->assign('menu0_class', 's'); ?>
							<?php else: ?>
									<?php $this->assign('menu0_class', ""); ?>
							<?php endif; ?>

					<a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['menu0']['dirname']; ?>
/<?php echo $this->_tpl_vars['menu0']['url']; ?>
" <?php if ($this->_tpl_vars['menu0']['dirname'] == $this->_tpl_vars['xoops_dirname']): ?> class="act"<?php else: ?> class="menu_c<?php echo smarty_function_cycle(array('values' => "1,2,3,4,5,6,7"), $this);?>
"<?php endif; ?>><?php echo $this->_tpl_vars['menu0']['name']; ?>
</a>
				<?php endforeach; endif; unset($_from); ?>
				<div class="clearfix"></div>
		</div>
		</nav>

		</header>

		<section id="main-content">
			<div id="menu_s">				<?php if ($this->_tpl_vars['xugj_menus1']): ?> |&nbsp;
					<?php $_from = $this->_tpl_vars['xugj_menus1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['menu1']):
?>
							<?php if (stristr ( $_SERVER['REQUEST_URI'] , $this->_tpl_vars['menu1']['url'] )): ?>
								<?php $this->assign('xugj_menus2', $this->_tpl_vars['menu1']['sub']); ?>
								<?php $this->assign('menu1_class', ' selected'); ?>
							<?php else: ?>
								<?php $this->assign('menu1_class', ""); ?>
							<?php endif; ?>
							<a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['menu1']['dirname']; ?>
/<?php echo $this->_tpl_vars['menu1']['url']; ?>
" class="menu_level1<?php echo $this->_tpl_vars['menu1_class']; ?>
"><?php echo $this->_tpl_vars['menu1']['name']; ?>
</a>&nbsp;|&nbsp;
					<?php endforeach; endif; unset($_from); ?>
				<?php endif; ?>
			</div>
			<div id="featured">

				<?php if ($this->_tpl_vars['xoops_showcblock'] == 1): ?>
					<?php if ($this->_tpl_vars['xoops_ccblocks']): ?>						<?php $_from = $this->_tpl_vars['xoops_ccblocks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['ccloop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['ccloop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['block']):
        $this->_foreach['ccloop']['iteration']++;
?>
						<?php if ($this->_tpl_vars['block']['weight'] == 0): ?>
							<div>
							<?php if (! ((is_array($_tmp=$this->_tpl_vars['block']['title'])) ? $this->_run_mod_handler('strstr', true, $_tmp, 'none') : strstr($_tmp, 'none'))): ?><h3><?php echo $this->_tpl_vars['block']['title']; ?>
</h3><?php endif; ?>
							<?php echo $this->_tpl_vars['block']['content']; ?>

							</div>
							<hr/>
						<?php endif; ?>
						<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>				<?php endif; ?>

			</div> <!-- END Featured -->

			<div id="latest">
				<section class="left-col">
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['xoops_theme'])."/theme_centercolumn.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				</section> <!-- END Left Column -->

				<aside class="sidebar">
					<?php if ($this->_tpl_vars['xoops_showlblock'] == 1): ?>
						<?php $_from = $this->_tpl_vars['xoops_lblocks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lbloop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lbloop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['block']):
        $this->_foreach['lbloop']['iteration']++;
?>
						<div>
							<?php if (! ((is_array($_tmp=$this->_tpl_vars['block']['title'])) ? $this->_run_mod_handler('strstr', true, $_tmp, 'none') : strstr($_tmp, 'none'))): ?><h4><?php echo $this->_tpl_vars['block']['title']; ?>
</h4><?php endif; ?>
							<?php echo $this->_tpl_vars['block']['content']; ?>

						</div>
						<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['xoops_showrblock'] == 1): ?>
						<?php $_from = $this->_tpl_vars['xoops_rblocks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['rbloop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['rbloop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['block']):
        $this->_foreach['rbloop']['iteration']++;
?>
							<div>
								<?php if (! ((is_array($_tmp=$this->_tpl_vars['block']['title'])) ? $this->_run_mod_handler('strstr', true, $_tmp, 'none') : strstr($_tmp, 'none'))): ?><h4><?php echo $this->_tpl_vars['block']['title']; ?>
</h4><?php endif; ?>
								<?php echo $this->_tpl_vars['block']['content']; ?>

							</div>
						<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>
				</aside>

			</div> <!-- END Latest -->

			<div class="clearfix"></div>

			<div id="about">
					<?php if ($this->_tpl_vars['xoops_ccblocks']): ?>						<?php $_from = $this->_tpl_vars['xoops_ccblocks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['ccloop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['ccloop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['block']):
        $this->_foreach['ccloop']['iteration']++;
?>
						<?php if ($this->_tpl_vars['block']['weight'] >= 500): ?>
							<hr/>
							<div>
							<?php if (! ((is_array($_tmp=$this->_tpl_vars['block']['title'])) ? $this->_run_mod_handler('strstr', true, $_tmp, 'none') : strstr($_tmp, 'none'))): ?><h3><?php echo $this->_tpl_vars['block']['title']; ?>
</h3><?php endif; ?>
							<?php echo $this->_tpl_vars['block']['content']; ?>

							</div>
						<?php endif; ?>
						<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>
			</div>
		</section>
		<hr/>

		<footer>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['xoops_theme'])."/theme_footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		</footer>

		<div id="headerSearch">
		  <form id="headerSearch-searchform" name="searchform" action="<?php echo $this->_tpl_vars['xoops_url']; ?>
/search.php" method="get" class="searchform">
		  <input id="headerSearch-keywords" type="text" name="query" value="<?php echo @_BASIC_SEARCH; ?>
" style="color: #808080;" onFocus="HideFormGuide(this);" onBlur="ShowFormGuide(this);" class="textbox" />
		  <input type="hidden" name="action" value="results" />
		  <input type="image" src="<?php echo $this->_tpl_vars['xoops_imageurl']; ?>
images/search-icon.png" name="searchSubmit" alt="<?php echo @_BASIC_SEARCH; ?>
"  title="<?php echo @_BASIC_SEARCH; ?>
" id="headerSearch-searchBtn" class="button" />
		  </form>
		</div>
	</div> <!-- END Wrapper -->
	<div id="xugj_pm_new_message" class="top-right"></div>
</body>
</html>