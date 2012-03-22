<?php /* Smarty version 2.6.26, created on 2012-03-22 21:23:43
         compiled from db:d3forum_inc_post_form_quick.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'db:d3forum_inc_post_form_quick.html', 3, false),array('modifier', 'escape', 'db:d3forum_inc_post_form_quick.html', 11, false),array('modifier', 'string_format', 'db:d3forum_inc_post_form_quick.html', 22, false),)), $this); ?>
<!-- comment input form -->
<div id="d3f_post_form_quick">
	<h2 class="head"><?php echo ((is_array($_tmp=@$this->_tpl_vars['h2_title'])) ? $this->_run_mod_handler('default', true, $_tmp, @_MD_D3FORUM_POSTASCOMMENTTOP) : smarty_modifier_default($_tmp, @_MD_D3FORUM_POSTASCOMMENTTOP)); ?>
</h2>
	
	<form name="postform" id="postform" action="<?php echo $this->_tpl_vars['mod_url']; ?>
/index.php?page=post" method="post" onsubmit="return xoopsFormValidate_postform();">
		<p style="display:none;">
		<input type="hidden" name="mode" id="mode" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['quick_form_mode'])) ? $this->_run_mod_handler('default', true, $_tmp, 'sametopic') : smarty_modifier_default($_tmp, 'sametopic')); ?>
" />
		<input type="hidden" name="pid" id="pid" value="<?php echo $this->_tpl_vars['post']['id']; ?>
" />
		<input type="hidden" name="topic_id" id="topic_id" value="<?php echo $this->_tpl_vars['topic']['id']; ?>
" />
		<input type="hidden" name="forum_id" id="forum_id" value="<?php echo $this->_tpl_vars['forum']['id']; ?>
" />
		<input type="hidden" name="external_link_id" id="external_link_id" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['external_link_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
		<input type="hidden" name="smiley" id="smiley" value="1" />
		<input type="hidden" name="xcode" id="xcode" value="1" />
		<input type="hidden" name="br" id="br" value="1" />
		<input type="hidden" name="number_entity" id="number_entity" value="1" />
		</p>
	
		<table cellspacing="1" class="outer d3f_postform">
			<tr valign="top" align="left">
				<td class="head"><?php echo @_MD_D3FORUM_SUBJECT; ?>
</td>
				<td class="even">
					<input type="text" name="subject" id="subject" maxlength="255" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['subject_raw'])) ? $this->_run_mod_handler('string_format', true, $_tmp, @_MD_D3FORUM_FMT_COMMENTSUBJECT) : smarty_modifier_string_format($_tmp, @_MD_D3FORUM_FMT_COMMENTSUBJECT)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
				</td>
			</tr>
	
			<?php if ($this->_tpl_vars['uname']): ?>
			<!-- begin post by USER newly -->
			<tr valign="top" align="left">
				<td class="head"><?php echo @_MD_D3FORUM_TH_UNAME; ?>
</td>
				<td class="even">
					<?php echo ((is_array($_tmp=$this->_tpl_vars['uname'])) ? $this->_run_mod_handler('string_format', true, $_tmp, @_MD_D3FORUM_FMT_UNAME) : smarty_modifier_string_format($_tmp, @_MD_D3FORUM_FMT_UNAME)); ?>

				</td>
			</tr>
			<!-- end post by USER newly -->
			<?php else: ?>
			<!-- begin GUEST's new post -->
			<tr valign="top" align="left">
				<td class="head"><?php echo @_MD_D3FORUM_TH_GUESTNAME; ?>
</td>
				<td class="even">
					<input type="text" name="guest_name" id="guest_name" value="<?php echo $this->_tpl_vars['guest_name']; ?>
" size="25" maxlength="30" />
					&nbsp;
					<label for="guest_pass"><?php echo @_MD_D3FORUM_TH_GUESTPASSWORD; ?>
</label>:
					<input type="password" name="guest_pass" id="guest_pass" value="<?php echo $this->_tpl_vars['guest_pass']; ?>
" size="20" maxlength="20" />
				</td>
			</tr>
			<!-- end GUEST's new post -->
			<?php endif; ?>
	
			<tr valign="top" align="left">
				<td class="head"><?php echo @_MD_D3FORUM_TH_BODY; ?>
</td>
				<td class="even">
					<textarea name="message" rows="8"><?php echo $this->_tpl_vars['message']; ?>
</textarea>
				</td>
			</tr>
			<tr valign="top" align="left">
				<td class="head"></td>
				<td class="even">
					<?php echo $this->_tpl_vars['antispam']['html_in_form']; ?>

					<input type="submit" class="formButton" name="contents_submit"  id="contents_submit" value="<?php echo @_MD_D3FORUM_DOPOST; ?>
" />
					<?php if ($this->_tpl_vars['external_link_id']): ?>
					<a href="<?php echo $this->_tpl_vars['mod_url']; ?>
/index.php?page=newtopic&amp;forum_id=<?php echo $this->_tpl_vars['forum']['id']; ?>
&amp;external_link_id=<?php echo ((is_array($_tmp=$this->_tpl_vars['external_link_id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&amp;subject=<?php echo ((is_array($_tmp=$this->_tpl_vars['subject_raw'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"><?php echo @_MD_D3FORUM_LINK_RICHERCOMMENTFORM; ?>
</a>
					<?php endif; ?>
				</td>
			</tr>
		</table>
	</form>
</div>
	<!-- Start Form Vaidation JavaScript //-->
	<script type="text/javascript">
	<!--//
	<?php echo $this->_tpl_vars['antispam']['js_global']; ?>


	function xoopsFormValidate_postform() {
		myform = window.document.postform;
		if ( myform.subject.value.replace(/^\s+|\s+$/g,"") == "" ) { window.alert("<?php echo ((is_array($_tmp=@_MD_D3FORUM_SUBJECT)) ? $this->_run_mod_handler('string_format', true, $_tmp, @_FORM_ENTER) : smarty_modifier_string_format($_tmp, @_FORM_ENTER)); ?>
"); myform.subject.focus(); return false; }
		if ( myform.message.value.replace(/^\s+|\s+$/g,"") == "" ) { window.alert("<?php echo @_MD_D3FORUM_ERR_NOMESSAGE; ?>
"); myform.message.focus(); return false; }
		<?php echo $this->_tpl_vars['antispam']['js_in_validate_function']; ?>

		return true;
	}
	function d3forum_quote_message() {
		xoopsGetElementById("message").value = xoopsGetElementById("message").value + xoopsGetElementById("reference_quote").value ;
	}
	//-->
	</script>
	<!-- End Form Vaidation JavaScript //-->