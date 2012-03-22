<?php /* Smarty version 2.6.26, created on 2012-03-22 21:23:24
         compiled from db:bulletin_index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'explode', 'db:bulletin_index.html', 16, false),array('function', 'html_options', 'db:bulletin_index.html', 18, false),)), $this); ?>
<?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "db:".($this->_tpl_vars['mydirname'])."_head.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo '<!-- start news item loop -->'; ?><?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['stories']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "db:".($this->_tpl_vars['mydirname'])."_item.html", 'smarty_include_vars' => array('story' => $this->_tpl_vars['stories'][$this->_sections['i']['index']])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo '<br />'; ?><?php endfor; endif; ?><?php echo '<!-- end news item loop -->'; ?><?php if ($this->_tpl_vars['displaynav'] == true): ?><?php echo '<div style="text-align: center;"><form name="form1" action="'; ?><?php echo $this->_tpl_vars['mydirurl']; ?><?php echo '/index.php" method="get">'; ?><?php echo $this->_tpl_vars['topic_select']; ?><?php echo '&nbsp;'; ?><?php $this->assign('storynum_options', ((is_array($_tmp=",")) ? $this->_run_mod_handler('explode', true, $_tmp, "5,10,15,20,30") : explode($_tmp, "5,10,15,20,30"))); ?><?php echo '<select name="storynum">'; ?><?php echo smarty_function_html_options(array('selected' => $_GET['storynum'],'values' => $this->_tpl_vars['storynum_options'],'output' => $this->_tpl_vars['storynum_options']), $this);?><?php echo '</select>&nbsp;<input type="submit" value="'; ?><?php echo @_GO; ?><?php echo '" /></form></div>'; ?><?php endif; ?><?php echo '<div style="text-align: right;">'; ?><?php echo $this->_tpl_vars['pagenav']; ?><?php echo '</div>'; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'db:system_notification_select.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>