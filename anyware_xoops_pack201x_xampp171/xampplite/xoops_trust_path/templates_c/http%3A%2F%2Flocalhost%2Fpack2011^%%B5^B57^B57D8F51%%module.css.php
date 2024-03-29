<?php /* Smarty version 2.6.26, created on 2012-03-22 21:25:49
         compiled from file:stylesheets/module.css */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'theme', 'file:stylesheets/module.css', 147, false),)), $this); ?>
/* Action Search */
.legacy_actionsearch_form {
	text-align:center;
	margin:20px;
}
ul.legacy_actionsearch_records {
	margin:5px 10px;
}
.legacy_actionsearch_records li , .legacy_actionsearch_records li a , .legacy_actionsearch_records li a:visited {
	font-weight:bold;
	padding:3px;
}
.legacy_actionsearch_records_desc {
	font-weight:normal;
	font-style:italic;
	color:#666666;
	padding:2px 10px 5px 10px;
}
/* block list */
.legacy_blocktype_module {

}
.legacy_blocktype_custom {
	color:#0000cc;
}
.legacy_blockside {
	width:135px;
	white-space: nowrap;
}
.legacy_blocksideInput{
	float:left;
	border:1px solid #333333;
	padding:1px;
}

.legacy_blockside_separator {
	float:left;
}

/*  block admin for FireFox */
input[type="radio"] {
	margin:2px;

}
/*  block admin for IE7 */
*+html input[type="radio"] {
	margin:0;
}

/* module list */
.legacy_module_title {
	font-weight:bold;
}
.legacy_module_error {
	color:#ff0000;
}
.legacy_module_warning {
	color:#FF9900;
}
.legacy_module_message {

}
.legacy_module_return {
	margin:15px 20px;
}
.legacy_module_return, .legacy_module_return a, .legacy_module_return a:visited {
	font-weight:bold;
}
.legacy_module_versionMsg {
	color:#0000ff;
	font-weight:bold;
}

.legacy_modinfo_notmounted {
	margin:10px 10px 10px 40px;
}
 
/* comment list */
.legacy_comment_search {
	text-align:center;
	margin:20px;
}

/* for list table */
.legacy_list_id {
	text-align:center;
}
.legacy_list_title, .legacy_list_title a, .legacy_list_title a:visited {
	text-align:left;
	padding-left:5px;
	font-weight:bold;
}
.legacy_list_imagetitle {
	text-align:center;
	font-weight:bold;
}
.legacy_list_name {
	text-align:left;
	padding-left:5px;
}
.legacy_list_text {
	text-align:left;
	padding-left:5px;
}
.legacy_list_description {
	text-align:left;
	padding-left:5px;
	font-weight:normal;
}
.legacy_list_number {
	text-align:right;
	padding-right:5px;
}
.legacy_list_order {
	text-align:center;
}
.legacy_list_image {
	text-align:center;
}
.legacy_list_select {
	text-align:center;
}
.legacy_list_type {
	text-align:center;
}
.legacy_list_date {
	text-align:center;
}
.legacy_list_control {
	text-align:center;
}

/* ===== Help ===== */
.help {
	line-height:150%;
	padding:5px 25px 25px 25px;
	border:3px dashed #F8B643;
	margin:10px;
}
.help h4 {
	margin:25px 0 10px 0;
	padding:5px 5px 5px 32px;
	font-size:15px;
	color:#882200;
	border-left:5px solid #F8B643;
	border-bottom:1px solid #F8B643;
	background:#ffffff url(<?php echo ((is_array($_tmp="icons/idea.png")) ? $this->_run_mod_handler('theme', true, $_tmp) : Legacy_modifier_css_theme($_tmp)); ?>
) no-repeat 8px 3px;
}
.help h5 {
	font-size:14px;
	color:#882200;
	margin:25px 0 5px 10px;
	padding:0px 2px 0px 10px;
	border-left:13px solid #F8B643;
}
.help h6 {
	color:#660000;
	font-size:13px;
	margin:20px 0 0 10px;
	padding:2px 2px 2px 10px;
}
.help a {
	color:darkblue;
	text-decoration:underline;
	font-weight:bold;
	margin:0 0.5em;
}
.help p {
	padding:5px 20px;
}
.help ul {
	margin-left:15px;
}
.help ol {
	margin:2px 2px 2px 20px;
	padding:2px;
	list-style:decimal outside;
}
.help li {
	padding:3px 0;
}
.help dl {
	margin: 10px 10px 20px 20px;
}
.help dt {
	margin: 5px 5px 5px 10px;
	font-weight:bold;
}
.help dd {
	margin: 5px 5px 5px 30px;
}
.help .preface {
	padding-top:80px;
}
.help div.remark {
	font-size:140%;
	line-height:200%;
}

.help .highlight_menu_item {
	font-style:italic;
}
.help .highlight_control_menu_item {
	color:#F8B643;
	font-weight:bold;
	text-decoration:underline;
	padding:1px;
}
.help .highlight_module_name {
	color:#6766A2;
	font-weight:bold;
	padding:0 1px;
	text-decoration:underline;
}
.help .highlight_block_name {
	color:#008800;
	font-weight:bold;
	text-decoration:underline;
}

.help .new {
	padding-right:58px;
	background:url(<?php echo ((is_array($_tmp="icons/legacy_help_new.png")) ? $this->_run_mod_handler('theme', true, $_tmp) : Legacy_modifier_css_theme($_tmp)); ?>
) no-repeat center right;
}
.help .update {
	padding-right:58px;
	background:url(<?php echo ((is_array($_tmp="icons/legacy_help_update.png")) ? $this->_run_mod_handler('theme', true, $_tmp) : Legacy_modifier_css_theme($_tmp)); ?>
) no-repeat center right;
}