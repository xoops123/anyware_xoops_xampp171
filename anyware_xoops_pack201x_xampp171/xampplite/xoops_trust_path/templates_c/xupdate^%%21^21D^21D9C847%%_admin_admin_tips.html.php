<?php /* Smarty version 2.6.26, created on 2012-03-22 18:03:20
         compiled from admin_tips.html */ ?>
<div class="tips">
<ul>
	<li><?php echo @_MI_XUPDATE_TEMP_PATH; ?>
 <?php echo $this->_tpl_vars['xupdate_writable']['path']; ?>

	<?php if ($this->_tpl_vars['xupdate_writable']['result'] == true): ?>
		(<span style="color:green;font-weight:bold;"><?php echo @_AD_XUPDATE_LANG_WRITABLE_RESULT; ?>
 OK</span>)
	<?php else: ?>
		(<span style="color:red;font-weight:bold;"><?php echo @_AD_XUPDATE_LANG_WRITABLE_RESULT; ?>
 NG</span>)
	<?php endif; ?>
	</li>
	<li><?php echo $this->_tpl_vars['mod_config']['FTP_UserName']; ?>

	<?php if ($this->_tpl_vars['mod_config']['FTP_UserName']): ?>
		(<span style="color:green;font-weight:bold;"><?php echo @_AD_XUPDATE_LANG_FTP_PASS_RESULT; ?>
 OK</span>)
	<?php else: ?>
		(<span style="color:red;font-weight:bold;"><?php echo @_AD_XUPDATE_LANG_FTP_PASS_RESULT; ?>
 NG</span>)
	<?php endif; ?>
	</li>
</ul>
</div>