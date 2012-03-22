<?php /* Smarty version 2.6.26, created on 2012-03-22 18:08:48
         compiled from db:d3pipes_block_sync.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'db:d3pipes_block_sync.html', 5, false),array('modifier', 'nl2br', 'db:d3pipes_block_sync.html', 5, false),array('modifier', 'date', 'db:d3pipes_block_sync.html', 28, false),)), $this); ?>
<div class="d3pipes_block_sync">

	<?php if ($this->_tpl_vars['block']['errors']): ?>
		<?php $_from = $this->_tpl_vars['block']['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
			<div class="errorMsg"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['error'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</div>
		<?php endforeach; endif; unset($_from); ?>
	<?php endif; ?>

	<?php if ($this->_tpl_vars['block']['pipes_entries']): ?>
				<?php $_from = $this->_tpl_vars['block']['pipes_entries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pipe']):
?>

			<div class="d3pipes_block_sync_separated">
				<?php echo $this->_tpl_vars['pipe']['name']; ?>

				<?php if ($this->_tpl_vars['pipe']['image'] && $this->_tpl_vars['pipe']['url']): ?>
					<a href="<?php echo $this->_tpl_vars['pipe']['url']; ?>
"><img src="<?php echo $this->_tpl_vars['pipe']['image']; ?>
" alt="<?php echo $this->_tpl_vars['pipe']['name']; ?>
" /></a>
				<?php endif; ?>
				<ul class="d3pipes_block_sync_separated">
					<?php $_from = $this->_tpl_vars['pipe']['entries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>

						<?php if ($this->_tpl_vars['entry']['allow_html']): ?>
							<?php $this->assign('entry_headline4disp', $this->_tpl_vars['entry']['headline']); ?>
						<?php else: ?>
							<?php $this->assign('entry_headline4disp', ((is_array($_tmp=$this->_tpl_vars['entry']['headline'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))); ?>
						<?php endif; ?>

						<li>
							<?php echo ((is_array($_tmp=@_MEDIUMDATESTRING)) ? $this->_run_mod_handler('date', true, $_tmp, $this->_tpl_vars['entry']['pubtime']+$this->_tpl_vars['timezone_offset']) : date($_tmp, $this->_tpl_vars['entry']['pubtime']+$this->_tpl_vars['timezone_offset'])); ?>

							<?php if ($this->_tpl_vars['entry']['clipping_id'] && $this->_tpl_vars['block']['link2clipping']): ?>
								<a href="<?php echo $this->_tpl_vars['block']['mod_url']; ?>
/index.php?page=clipping&amp;clipping_id=<?php echo $this->_tpl_vars['entry']['clipping_id']; ?>
"><?php echo $this->_tpl_vars['entry_headline4disp']; ?>
</a>
							<?php else: ?>
								<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['link'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo $this->_tpl_vars['entry_headline4disp']; ?>
</a>
							<?php endif; ?>
						</li>
					<?php endforeach; endif; unset($_from); ?>
				</ul>
			</div>
		<?php endforeach; endif; unset($_from); ?>
	<?php else: ?>
				<ul class="d3pipes_block_sync_aggregated">
			<?php $_from = $this->_tpl_vars['block']['entries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>

				<?php if ($this->_tpl_vars['entry']['allow_html']): ?>
					<?php $this->assign('entry_headline4disp', $this->_tpl_vars['entry']['headline']); ?>
				<?php else: ?>
					<?php $this->assign('entry_headline4disp', ((is_array($_tmp=$this->_tpl_vars['entry']['headline'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))); ?>
				<?php endif; ?>

				<li>
				<dl>
					<dt>
					<?php if ($this->_tpl_vars['entry']['clipping_id'] && $this->_tpl_vars['block']['link2clipping']): ?>
						<a href="<?php echo $this->_tpl_vars['block']['mod_url']; ?>
/index.php?page=clipping&amp;clipping_id=<?php echo $this->_tpl_vars['entry']['clipping_id']; ?>
"><?php echo $this->_tpl_vars['entry_headline4disp']; ?>
</a>
					<?php else: ?>
						<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['link'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo $this->_tpl_vars['entry_headline4disp']; ?>
</a>
					<?php endif; ?>
					</dt>

					<dd>
					<?php echo ((is_array($_tmp=@_MEDIUMDATESTRING)) ? $this->_run_mod_handler('date', true, $_tmp, $this->_tpl_vars['entry']['pubtime']+$this->_tpl_vars['timezone_offset']) : date($_tmp, $this->_tpl_vars['entry']['pubtime']+$this->_tpl_vars['timezone_offset'])); ?>

					<?php if ($this->_tpl_vars['entry']['pipe']['name']): ?>
						(<?php echo $this->_tpl_vars['entry']['pipe']['name']; ?>
)
					<?php endif; ?>
					</dd>

				</dl>

				</li>
			<?php endforeach; endif; unset($_from); ?>
		</ul>
	<?php endif; ?>

</div>