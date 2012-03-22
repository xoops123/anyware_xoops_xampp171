<?php /* Smarty version 2.6.26, created on 2012-03-22 18:03:20
         compiled from admin_menunavi.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'xoops_escape', 'admin_menunavi.html', 5, false),)), $this); ?>
  <div id="menunavi">
  <?php if (! empty ( $this->_tpl_vars['adminMenu'] )): ?>
    <ul class="submenunavi">
      <?php $_from = $this->_tpl_vars['adminMenu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['menu']):
?>
          <li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['menu']['link'])) ? $this->_run_mod_handler('xoops_escape', true, $_tmp, 'link') : smarty_modifier_xoops_escape($_tmp, 'link')); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['menu']['title'])) ? $this->_run_mod_handler('xoops_escape', true, $_tmp) : smarty_modifier_xoops_escape($_tmp)); ?>
</a></li>
      <?php endforeach; endif; unset($_from); ?>
          <li style="background:#87CEFA;"><a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/admin.php" style="color:#ffffff;"><?php echo @_CPHOME; ?>
</a></li>
    </ul>
  <?php endif; ?>
  </div>