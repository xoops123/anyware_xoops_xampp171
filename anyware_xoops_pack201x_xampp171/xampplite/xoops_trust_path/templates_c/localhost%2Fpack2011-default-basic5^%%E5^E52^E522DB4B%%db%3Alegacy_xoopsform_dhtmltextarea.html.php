<?php /* Smarty version 2.6.26, created on 2012-03-22 21:27:39
         compiled from db:legacy_xoopsform_dhtmltextarea.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'xoops_escape', 'db:legacy_xoopsform_dhtmltextarea.html', 4, false),)), $this); ?>
<a name='moresmiley'></a>
<a href="#" onclick='xoopsCodeUrl("<?php echo $this->_tpl_vars['element']->getId(); ?>
", "<?php echo @_ENTERURL; ?>
", "<?php echo @_ENTERWEBTITLE; ?>
"); return false;'><img src='<?php echo $this->_tpl_vars['xoops_url']; ?>
/images/url.gif' alt='url' /></a>&nbsp;
<a href="#" onclick='javascript:xoopsCodeEmail("<?php echo $this->_tpl_vars['element']->getId(); ?>
", "<?php echo @_ENTEREMAIL; ?>
"); return false;'><img src='<?php echo $this->_tpl_vars['xoops_url']; ?>
/images/email.gif' alt='email' /></a>&nbsp;
<a href="#" onclick='javascript:xoopsCodeImg("<?php echo $this->_tpl_vars['element']->getId(); ?>
", "<?php echo @_ENTERIMGURL; ?>
", "<?php echo @_ENTERIMGPOS; ?>
", "<?php echo ((is_array($_tmp=@_IMGPOSRORL)) ? $this->_run_mod_handler('xoops_escape', true, $_tmp) : smarty_modifier_xoops_escape($_tmp)); ?>
", "<?php echo @_ERRORIMGPOS; ?>
"); return false;'><img src='<?php echo $this->_tpl_vars['xoops_url']; ?>
/images/imgsrc.gif' alt='imgsrc' /></a>&nbsp;
<a href="#" onclick='javascript:openWithSelfMain("<?php echo $this->_tpl_vars['xoops_url']; ?>
/imagemanager.php?target=<?php echo $this->_tpl_vars['element']->getId(); ?>
","imgmanager",400,430); return false;'><img src='<?php echo $this->_tpl_vars['xoops_url']; ?>
/images/image.gif' alt='image' /></a>&nbsp;
<a href="#" onclick='javascript:xoopsCodeCode("<?php echo $this->_tpl_vars['element']->getId(); ?>
", "<?php echo @_ENTERCODE; ?>
"); return false;'><img src='<?php echo $this->_tpl_vars['xoops_url']; ?>
/images/code.gif' alt='code' /></a>&nbsp;
<a href="#" onclick='javascript:xoopsCodeQuote("<?php echo $this->_tpl_vars['element']->getId(); ?>
", "<?php echo @_ENTERQUOTE; ?>
"); return false;'><img src='<?php echo $this->_tpl_vars['xoops_url']; ?>
/images/quote.gif' alt='quote' /></a><br />
<select id='<?php echo $this->_tpl_vars['element']->getId(); ?>
Size' onchange='setVisible("<?php echo $this->_tpl_vars['element']->_xoopsHiddenText; ?>
");setElementSize("<?php echo $this->_tpl_vars['element']->_xoopsHiddenText; ?>
",this.options[this.selectedIndex].value);'>
  <option value='SIZE'><?php echo @_SIZE; ?>
</option>
  <option value='xx-small'>xx-small</option>
  <option value='x-small'>x-small</option>
  <option value='small'>small</option>
  <option value='medium'>medium</option>
  <option value='large'>large</option>
  <option value='x-large'>x-large</option>
  <option value='xx-large'>xx-large</option>
</select>
<select id='<?php echo $this->_tpl_vars['element']->getId(); ?>
Font' onchange='setVisible("<?php echo $this->_tpl_vars['element']->_xoopsHiddenText; ?>
");setElementFont("<?php echo $this->_tpl_vars['element']->_xoopsHiddenText; ?>
",this.options[this.selectedIndex].value);'>
  <option value='FONT'><?php echo @_FONT; ?>
</option>
  <option value='Arial'>Arial</option>
  <option value='Courier'>Courier</option>
  <option value='Georgia'>Georgia</option>
  <option value='Helvetica'>Helvetica</option>
  <option value='Impact'>Impact</option>
  <option value='Verdana'>Verdana</option>
</select>
<select id='<?php echo $this->_tpl_vars['element']->getId(); ?>
Color' onchange='setVisible("<?php echo $this->_tpl_vars['element']->_xoopsHiddenText; ?>
");setElementColor("<?php echo $this->_tpl_vars['element']->_xoopsHiddenText; ?>
",this.options[this.selectedIndex].value);'>
  <option value='COLOR'><?php echo @_COLOR; ?>
</option>
  <option value='000000' style='background-color:#000000;color:#000000;'>#000000</option>
  <option value='000033' style='background-color:#000033;color:#000033;'>#000033</option>
  <option value='000066' style='background-color:#000066;color:#000066;'>#000066</option>
  <option value='000099' style='background-color:#000099;color:#000099;'>#000099</option>
  
  <option value='0000CC' style='background-color:#0000CC;color:#0000CC;'>#0000CC</option>
  <option value='0000FF' style='background-color:#0000FF;color:#0000FF;'>#0000FF</option>
  <option value='003300' style='background-color:#003300;color:#003300;'>#003300</option>
  <option value='003333' style='background-color:#003333;color:#003333;'>#003333</option>
  <option value='003366' style='background-color:#003366;color:#003366;'>#003366</option>
  <option value='003399' style='background-color:#003399;color:#003399;'>#003399</option>
  <option value='0033CC' style='background-color:#0033CC;color:#0033CC;'>#0033CC</option>
  <option value='0033FF' style='background-color:#0033FF;color:#0033FF;'>#0033FF</option>
  <option value='006600' style='background-color:#006600;color:#006600;'>#006600</option>
  
  <option value='006633' style='background-color:#006633;color:#006633;'>#006633</option>
  <option value='006666' style='background-color:#006666;color:#006666;'>#006666</option>
  <option value='006699' style='background-color:#006699;color:#006699;'>#006699</option>
  <option value='0066CC' style='background-color:#0066CC;color:#0066CC;'>#0066CC</option>
  <option value='0066FF' style='background-color:#0066FF;color:#0066FF;'>#0066FF</option>
  <option value='009900' style='background-color:#009900;color:#009900;'>#009900</option>
  <option value='009933' style='background-color:#009933;color:#009933;'>#009933</option>
  <option value='009966' style='background-color:#009966;color:#009966;'>#009966</option>
  <option value='009999' style='background-color:#009999;color:#009999;'>#009999</option>
  
  <option value='0099CC' style='background-color:#0099CC;color:#0099CC;'>#0099CC</option>
  <option value='0099FF' style='background-color:#0099FF;color:#0099FF;'>#0099FF</option>
  <option value='00CC00' style='background-color:#00CC00;color:#00CC00;'>#00CC00</option>
  <option value='00CC33' style='background-color:#00CC33;color:#00CC33;'>#00CC33</option>
  <option value='00CC66' style='background-color:#00CC66;color:#00CC66;'>#00CC66</option>
  <option value='00CC99' style='background-color:#00CC99;color:#00CC99;'>#00CC99</option>
  <option value='00CCCC' style='background-color:#00CCCC;color:#00CCCC;'>#00CCCC</option>
  <option value='00CCFF' style='background-color:#00CCFF;color:#00CCFF;'>#00CCFF</option>
  <option value='00FF00' style='background-color:#00FF00;color:#00FF00;'>#00FF00</option>
  
  <option value='00FF33' style='background-color:#00FF33;color:#00FF33;'>#00FF33</option>
  <option value='00FF66' style='background-color:#00FF66;color:#00FF66;'>#00FF66</option>
  <option value='00FF99' style='background-color:#00FF99;color:#00FF99;'>#00FF99</option>
  <option value='00FFCC' style='background-color:#00FFCC;color:#00FFCC;'>#00FFCC</option>
  <option value='00FFFF' style='background-color:#00FFFF;color:#00FFFF;'>#00FFFF</option>
  <option value='330000' style='background-color:#330000;color:#330000;'>#330000</option>
  <option value='330033' style='background-color:#330033;color:#330033;'>#330033</option>
  <option value='330066' style='background-color:#330066;color:#330066;'>#330066</option>
  <option value='330099' style='background-color:#330099;color:#330099;'>#330099</option>
  
  <option value='3300CC' style='background-color:#3300CC;color:#3300CC;'>#3300CC</option>
  <option value='3300FF' style='background-color:#3300FF;color:#3300FF;'>#3300FF</option>
  <option value='333300' style='background-color:#333300;color:#333300;'>#333300</option>
  <option value='333333' style='background-color:#333333;color:#333333;'>#333333</option>
  <option value='333366' style='background-color:#333366;color:#333366;'>#333366</option>
  <option value='333399' style='background-color:#333399;color:#333399;'>#333399</option>
  <option value='3333CC' style='background-color:#3333CC;color:#3333CC;'>#3333CC</option>
  <option value='3333FF' style='background-color:#3333FF;color:#3333FF;'>#3333FF</option>
  <option value='336600' style='background-color:#336600;color:#336600;'>#336600</option>
  
  <option value='336633' style='background-color:#336633;color:#336633;'>#336633</option>
  <option value='336666' style='background-color:#336666;color:#336666;'>#336666</option>
  <option value='336699' style='background-color:#336699;color:#336699;'>#336699</option>
  <option value='3366CC' style='background-color:#3366CC;color:#3366CC;'>#3366CC</option>
  <option value='3366FF' style='background-color:#3366FF;color:#3366FF;'>#3366FF</option>
  <option value='339900' style='background-color:#339900;color:#339900;'>#339900</option>
  <option value='339933' style='background-color:#339933;color:#339933;'>#339933</option>
  <option value='339966' style='background-color:#339966;color:#339966;'>#339966</option>
  <option value='339999' style='background-color:#339999;color:#339999;'>#339999</option>
  
  <option value='3399CC' style='background-color:#3399CC;color:#3399CC;'>#3399CC</option>
  <option value='3399FF' style='background-color:#3399FF;color:#3399FF;'>#3399FF</option>
  <option value='33CC00' style='background-color:#33CC00;color:#33CC00;'>#33CC00</option>
  <option value='33CC33' style='background-color:#33CC33;color:#33CC33;'>#33CC33</option>
  <option value='33CC66' style='background-color:#33CC66;color:#33CC66;'>#33CC66</option>
  <option value='33CC99' style='background-color:#33CC99;color:#33CC99;'>#33CC99</option>
  <option value='33CCCC' style='background-color:#33CCCC;color:#33CCCC;'>#33CCCC</option>
  <option value='33CCFF' style='background-color:#33CCFF;color:#33CCFF;'>#33CCFF</option>
  <option value='33FF00' style='background-color:#33FF00;color:#33FF00;'>#33FF00</option>
  
  <option value='33FF33' style='background-color:#33FF33;color:#33FF33;'>#33FF33</option>
  <option value='33FF66' style='background-color:#33FF66;color:#33FF66;'>#33FF66</option>
  <option value='33FF99' style='background-color:#33FF99;color:#33FF99;'>#33FF99</option>
  <option value='33FFCC' style='background-color:#33FFCC;color:#33FFCC;'>#33FFCC</option>
  <option value='33FFFF' style='background-color:#33FFFF;color:#33FFFF;'>#33FFFF</option>
  <option value='660000' style='background-color:#660000;color:#660000;'>#660000</option>
  <option value='660033' style='background-color:#660033;color:#660033;'>#660033</option>
  <option value='660066' style='background-color:#660066;color:#660066;'>#660066</option>
  <option value='660099' style='background-color:#660099;color:#660099;'>#660099</option>
  
  <option value='6600CC' style='background-color:#6600CC;color:#6600CC;'>#6600CC</option>
  <option value='6600FF' style='background-color:#6600FF;color:#6600FF;'>#6600FF</option>
  <option value='663300' style='background-color:#663300;color:#663300;'>#663300</option>
  <option value='663333' style='background-color:#663333;color:#663333;'>#663333</option>
  <option value='663366' style='background-color:#663366;color:#663366;'>#663366</option>
  <option value='663399' style='background-color:#663399;color:#663399;'>#663399</option>
  <option value='6633CC' style='background-color:#6633CC;color:#6633CC;'>#6633CC</option>
  <option value='6633FF' style='background-color:#6633FF;color:#6633FF;'>#6633FF</option>
  <option value='666600' style='background-color:#666600;color:#666600;'>#666600</option>
  
  <option value='666633' style='background-color:#666633;color:#666633;'>#666633</option>
  <option value='666666' style='background-color:#666666;color:#666666;'>#666666</option>
  <option value='666699' style='background-color:#666699;color:#666699;'>#666699</option>
  <option value='6666CC' style='background-color:#6666CC;color:#6666CC;'>#6666CC</option>
  <option value='6666FF' style='background-color:#6666FF;color:#6666FF;'>#6666FF</option>
  <option value='669900' style='background-color:#669900;color:#669900;'>#669900</option>
  <option value='669933' style='background-color:#669933;color:#669933;'>#669933</option>
  <option value='669966' style='background-color:#669966;color:#669966;'>#669966</option>
  <option value='669999' style='background-color:#669999;color:#669999;'>#669999</option>
  
  <option value='6699CC' style='background-color:#6699CC;color:#6699CC;'>#6699CC</option>
  <option value='6699FF' style='background-color:#6699FF;color:#6699FF;'>#6699FF</option>
  <option value='66CC00' style='background-color:#66CC00;color:#66CC00;'>#66CC00</option>
  <option value='66CC33' style='background-color:#66CC33;color:#66CC33;'>#66CC33</option>
  <option value='66CC66' style='background-color:#66CC66;color:#66CC66;'>#66CC66</option>
  <option value='66CC99' style='background-color:#66CC99;color:#66CC99;'>#66CC99</option>
  <option value='66CCCC' style='background-color:#66CCCC;color:#66CCCC;'>#66CCCC</option>
  <option value='66CCFF' style='background-color:#66CCFF;color:#66CCFF;'>#66CCFF</option>
  <option value='66FF00' style='background-color:#66FF00;color:#66FF00;'>#66FF00</option>
  
  <option value='66FF33' style='background-color:#66FF33;color:#66FF33;'>#66FF33</option>
  <option value='66FF66' style='background-color:#66FF66;color:#66FF66;'>#66FF66</option>
  <option value='66FF99' style='background-color:#66FF99;color:#66FF99;'>#66FF99</option>
  <option value='66FFCC' style='background-color:#66FFCC;color:#66FFCC;'>#66FFCC</option>
  <option value='66FFFF' style='background-color:#66FFFF;color:#66FFFF;'>#66FFFF</option>
  <option value='990000' style='background-color:#990000;color:#990000;'>#990000</option>
  <option value='990033' style='background-color:#990033;color:#990033;'>#990033</option>
  <option value='990066' style='background-color:#990066;color:#990066;'>#990066</option>
  <option value='990099' style='background-color:#990099;color:#990099;'>#990099</option>
  
  <option value='9900CC' style='background-color:#9900CC;color:#9900CC;'>#9900CC</option>
  <option value='9900FF' style='background-color:#9900FF;color:#9900FF;'>#9900FF</option>
  <option value='993300' style='background-color:#993300;color:#993300;'>#993300</option>
  <option value='993333' style='background-color:#993333;color:#993333;'>#993333</option>
  <option value='993366' style='background-color:#993366;color:#993366;'>#993366</option>
  <option value='993399' style='background-color:#993399;color:#993399;'>#993399</option>
  <option value='9933CC' style='background-color:#9933CC;color:#9933CC;'>#9933CC</option>
  <option value='9933FF' style='background-color:#9933FF;color:#9933FF;'>#9933FF</option>
  <option value='996600' style='background-color:#996600;color:#996600;'>#996600</option>
  
  <option value='996633' style='background-color:#996633;color:#996633;'>#996633</option>
  <option value='996666' style='background-color:#996666;color:#996666;'>#996666</option>
  <option value='996699' style='background-color:#996699;color:#996699;'>#996699</option>
  <option value='9966CC' style='background-color:#9966CC;color:#9966CC;'>#9966CC</option>
  <option value='9966FF' style='background-color:#9966FF;color:#9966FF;'>#9966FF</option>
  <option value='999900' style='background-color:#999900;color:#999900;'>#999900</option>
  <option value='999933' style='background-color:#999933;color:#999933;'>#999933</option>
  <option value='999966' style='background-color:#999966;color:#999966;'>#999966</option>
  <option value='999999' style='background-color:#999999;color:#999999;'>#999999</option>
  
  <option value='9999CC' style='background-color:#9999CC;color:#9999CC;'>#9999CC</option>
  <option value='9999FF' style='background-color:#9999FF;color:#9999FF;'>#9999FF</option>
  <option value='99CC00' style='background-color:#99CC00;color:#99CC00;'>#99CC00</option>
  <option value='99CC33' style='background-color:#99CC33;color:#99CC33;'>#99CC33</option>
  <option value='99CC66' style='background-color:#99CC66;color:#99CC66;'>#99CC66</option>
  <option value='99CC99' style='background-color:#99CC99;color:#99CC99;'>#99CC99</option>
  <option value='99CCCC' style='background-color:#99CCCC;color:#99CCCC;'>#99CCCC</option>
  <option value='99CCFF' style='background-color:#99CCFF;color:#99CCFF;'>#99CCFF</option>
  <option value='99FF00' style='background-color:#99FF00;color:#99FF00;'>#99FF00</option>
  
  <option value='99FF33' style='background-color:#99FF33;color:#99FF33;'>#99FF33</option>
  <option value='99FF66' style='background-color:#99FF66;color:#99FF66;'>#99FF66</option>
  <option value='99FF99' style='background-color:#99FF99;color:#99FF99;'>#99FF99</option>
  <option value='99FFCC' style='background-color:#99FFCC;color:#99FFCC;'>#99FFCC</option>
  <option value='99FFFF' style='background-color:#99FFFF;color:#99FFFF;'>#99FFFF</option>
  <option value='CC0000' style='background-color:#CC0000;color:#CC0000;'>#CC0000</option>
  <option value='CC0033' style='background-color:#CC0033;color:#CC0033;'>#CC0033</option>
  <option value='CC0066' style='background-color:#CC0066;color:#CC0066;'>#CC0066</option>
  <option value='CC0099' style='background-color:#CC0099;color:#CC0099;'>#CC0099</option>
  
  <option value='CC00CC' style='background-color:#CC00CC;color:#CC00CC;'>#CC00CC</option>
  <option value='CC00FF' style='background-color:#CC00FF;color:#CC00FF;'>#CC00FF</option>
  <option value='CC3300' style='background-color:#CC3300;color:#CC3300;'>#CC3300</option>
  <option value='CC3333' style='background-color:#CC3333;color:#CC3333;'>#CC3333</option>
  <option value='CC3366' style='background-color:#CC3366;color:#CC3366;'>#CC3366</option>
  <option value='CC3399' style='background-color:#CC3399;color:#CC3399;'>#CC3399</option>
  <option value='CC33CC' style='background-color:#CC33CC;color:#CC33CC;'>#CC33CC</option>
  <option value='CC33FF' style='background-color:#CC33FF;color:#CC33FF;'>#CC33FF</option>
  <option value='CC6600' style='background-color:#CC6600;color:#CC6600;'>#CC6600</option>
  
  <option value='CC6633' style='background-color:#CC6633;color:#CC6633;'>#CC6633</option>
  <option value='CC6666' style='background-color:#CC6666;color:#CC6666;'>#CC6666</option>
  <option value='CC6699' style='background-color:#CC6699;color:#CC6699;'>#CC6699</option>
  <option value='CC66CC' style='background-color:#CC66CC;color:#CC66CC;'>#CC66CC</option>
  <option value='CC66FF' style='background-color:#CC66FF;color:#CC66FF;'>#CC66FF</option>
  <option value='CC9900' style='background-color:#CC9900;color:#CC9900;'>#CC9900</option>
  <option value='CC9933' style='background-color:#CC9933;color:#CC9933;'>#CC9933</option>
  <option value='CC9966' style='background-color:#CC9966;color:#CC9966;'>#CC9966</option>
  <option value='CC9999' style='background-color:#CC9999;color:#CC9999;'>#CC9999</option>
  
  <option value='CC99CC' style='background-color:#CC99CC;color:#CC99CC;'>#CC99CC</option>
  <option value='CC99FF' style='background-color:#CC99FF;color:#CC99FF;'>#CC99FF</option>
  <option value='CCCC00' style='background-color:#CCCC00;color:#CCCC00;'>#CCCC00</option>
  <option value='CCCC33' style='background-color:#CCCC33;color:#CCCC33;'>#CCCC33</option>
  <option value='CCCC66' style='background-color:#CCCC66;color:#CCCC66;'>#CCCC66</option>
  <option value='CCCC99' style='background-color:#CCCC99;color:#CCCC99;'>#CCCC99</option>
  <option value='CCCCCC' style='background-color:#CCCCCC;color:#CCCCCC;'>#CCCCCC</option>
  <option value='CCCCFF' style='background-color:#CCCCFF;color:#CCCCFF;'>#CCCCFF</option>
  <option value='CCFF00' style='background-color:#CCFF00;color:#CCFF00;'>#CCFF00</option>
  
  <option value='CCFF33' style='background-color:#CCFF33;color:#CCFF33;'>#CCFF33</option>
  <option value='CCFF66' style='background-color:#CCFF66;color:#CCFF66;'>#CCFF66</option>
  <option value='CCFF99' style='background-color:#CCFF99;color:#CCFF99;'>#CCFF99</option>
  <option value='CCFFCC' style='background-color:#CCFFCC;color:#CCFFCC;'>#CCFFCC</option>
  <option value='CCFFFF' style='background-color:#CCFFFF;color:#CCFFFF;'>#CCFFFF</option>
  <option value='FF0000' style='background-color:#FF0000;color:#FF0000;'>#FF0000</option>
  <option value='FF0033' style='background-color:#FF0033;color:#FF0033;'>#FF0033</option>
  <option value='FF0066' style='background-color:#FF0066;color:#FF0066;'>#FF0066</option>
  <option value='FF0099' style='background-color:#FF0099;color:#FF0099;'>#FF0099</option>
  
  <option value='FF00CC' style='background-color:#FF00CC;color:#FF00CC;'>#FF00CC</option>
  <option value='FF00FF' style='background-color:#FF00FF;color:#FF00FF;'>#FF00FF</option>
  <option value='FF3300' style='background-color:#FF3300;color:#FF3300;'>#FF3300</option>
  <option value='FF3333' style='background-color:#FF3333;color:#FF3333;'>#FF3333</option>
  <option value='FF3366' style='background-color:#FF3366;color:#FF3366;'>#FF3366</option>
  <option value='FF3399' style='background-color:#FF3399;color:#FF3399;'>#FF3399</option>
  <option value='FF33CC' style='background-color:#FF33CC;color:#FF33CC;'>#FF33CC</option>
  <option value='FF33FF' style='background-color:#FF33FF;color:#FF33FF;'>#FF33FF</option>
  <option value='FF6600' style='background-color:#FF6600;color:#FF6600;'>#FF6600</option>
  
  <option value='FF6633' style='background-color:#FF6633;color:#FF6633;'>#FF6633</option>
  <option value='FF6666' style='background-color:#FF6666;color:#FF6666;'>#FF6666</option>
  <option value='FF6699' style='background-color:#FF6699;color:#FF6699;'>#FF6699</option>
  <option value='FF66CC' style='background-color:#FF66CC;color:#FF66CC;'>#FF66CC</option>
  <option value='FF66FF' style='background-color:#FF66FF;color:#FF66FF;'>#FF66FF</option>
  <option value='FF9900' style='background-color:#FF9900;color:#FF9900;'>#FF9900</option>
  <option value='FF9933' style='background-color:#FF9933;color:#FF9933;'>#FF9933</option>
  <option value='FF9966' style='background-color:#FF9966;color:#FF9966;'>#FF9966</option>
  <option value='FF9999' style='background-color:#FF9999;color:#FF9999;'>#FF9999</option>
  
  <option value='FF99CC' style='background-color:#FF99CC;color:#FF99CC;'>#FF99CC</option>
  <option value='FF99FF' style='background-color:#FF99FF;color:#FF99FF;'>#FF99FF</option>
  <option value='FFCC00' style='background-color:#FFCC00;color:#FFCC00;'>#FFCC00</option>
  <option value='FFCC33' style='background-color:#FFCC33;color:#FFCC33;'>#FFCC33</option>
  <option value='FFCC66' style='background-color:#FFCC66;color:#FFCC66;'>#FFCC66</option>
  <option value='FFCC99' style='background-color:#FFCC99;color:#FFCC99;'>#FFCC99</option>
  <option value='FFCCCC' style='background-color:#FFCCCC;color:#FFCCCC;'>#FFCCCC</option>
  <option value='FFCCFF' style='background-color:#FFCCFF;color:#FFCCFF;'>#FFCCFF</option>
  <option value='FFFF00' style='background-color:#FFFF00;color:#FFFF00;'>#FFFF00</option>
  
  <option value='FFFF33' style='background-color:#FFFF33;color:#FFFF33;'>#FFFF33</option>
  <option value='FFFF66' style='background-color:#FFFF66;color:#FFFF66;'>#FFFF66</option>
  <option value='FFFF99' style='background-color:#FFFF99;color:#FFFF99;'>#FFFF99</option>
  <option value='FFFFCC' style='background-color:#FFFFCC;color:#FFFFCC;'>#FFFFCC</option>
  <option value='FFFFFF' style='background-color:#FFFFFF;color:#FFFFFF;'>#FFFFFF</option>
</select>
<span id='<?php echo $this->_tpl_vars['element']->_xoopsHiddenText; ?>
'><?php echo @_EXAMPLE; ?>
</span>
<br />
<a href="#" onclick='javascript:setVisible("<?php echo $this->_tpl_vars['element']->_xoopsHiddenText; ?>
");makeBold("<?php echo $this->_tpl_vars['element']->_xoopsHiddenText; ?>
"); return false;'><img src='<?php echo $this->_tpl_vars['xoops_url']; ?>
/images/bold.gif' alt='bold' /></a>&nbsp;
<a href="#" onclick='javascript:setVisible("<?php echo $this->_tpl_vars['element']->_xoopsHiddenText; ?>
");makeItalic("<?php echo $this->_tpl_vars['element']->_xoopsHiddenText; ?>
"); return false;'><img src='<?php echo $this->_tpl_vars['xoops_url']; ?>
/images/italic.gif' alt='italic' /></a>&nbsp;
<a href="#" onclick='javascript:setVisible("<?php echo $this->_tpl_vars['element']->_xoopsHiddenText; ?>
");makeUnderline("<?php echo $this->_tpl_vars['element']->_xoopsHiddenText; ?>
"); return false;'><img src='<?php echo $this->_tpl_vars['xoops_url']; ?>
/images/underline.gif' alt='underline' /></a>&nbsp;
<a href="#" onclick='javascript:setVisible("<?php echo $this->_tpl_vars['element']->_xoopsHiddenText; ?>
");makeLineThrough("<?php echo $this->_tpl_vars['element']->_xoopsHiddenText; ?>
"); return false;'><img  src='<?php echo $this->_tpl_vars['xoops_url']; ?>
/images/linethrough.gif' alt='linethrough' /></a>&nbsp;&nbsp;
<input type='text' id='<?php echo $this->_tpl_vars['element']->getId(); ?>
Addtext' size='20' />&nbsp;
<input type='button' onclick='xoopsCodeText("<?php echo $this->_tpl_vars['element']->getId(); ?>
", "<?php echo $this->_tpl_vars['element']->_xoopsHiddenText; ?>
", "<?php echo @_ENTERTEXTBOX; ?>
")' class='formButton' value='<?php echo @_ADD; ?>
' /><br /><br />
<textarea id='<?php echo $this->_tpl_vars['element']->getId(); ?>
' name='<?php echo $this->_tpl_vars['element']->getName(); ?>
' <?php if ($this->_tpl_vars['class']): ?>class='<?php echo $this->_tpl_vars['class']; ?>
' <?php endif; ?>cols='<?php echo $this->_tpl_vars['element']->getCols(); ?>
' rows='<?php echo $this->_tpl_vars['element']->getRows(); ?>
' onselect="xoopsSavePosition('<?php echo $this->_tpl_vars['element']->getId(); ?>
');" onclick="xoopsSavePosition('<?php echo $this->_tpl_vars['element']->getId(); ?>
');" onkeyup="xoopsSavePosition('<?php echo $this->_tpl_vars['element']->getId(); ?>
');"<?php if ($this->_tpl_vars['element']->getExtra()): ?><?php echo $this->_tpl_vars['element']->getExtra(); ?>
<?php endif; ?>><?php echo $this->_tpl_vars['element']->getValue(); ?>
</textarea><br />