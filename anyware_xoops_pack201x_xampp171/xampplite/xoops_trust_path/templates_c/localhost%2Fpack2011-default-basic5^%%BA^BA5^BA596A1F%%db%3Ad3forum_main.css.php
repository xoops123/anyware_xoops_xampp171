<?php /* Smarty version 2.6.26, created on 2012-03-22 21:24:04
         compiled from db:d3forum_main.css */ ?>
<?php 
/******* CONFIGURATIONS *********/

$colors = array(
	'd3f_lines'					=> '#aaaaaa' ,
	'd3f_bg'						=> '#ffffff' ,
	'd3f_tree_indicator'			=> '#d0d0d0' ,
	'd3f_bottom_tree_bg'			=> '#eeeeee' ,
	'd3f_bottom_tree_current'		=> '#990000' ,
	'd3f_bottom_tree_current_bg'	=> '#ffffff' ,
	'd3f_head'					=> '#393f4c' ,
	'd3f_head_bg'					=> 'transparent' ,
	'd3f_head_link'				=> '#ffffff' ,
	'd3f_head_active'				=> '#ed5656' ,
	'd3f_head_hover'				=> '#990000' ,
	'd3f_head_visited'				=> '#ffffff' ,
	'd3f_info'					=> '#000000' ,
	'd3f_info_bg'					=> '#eeeeee' ,
	'd3f_ctrl'					=> '#000000' ,
	'd3f_ctrl_bg'					=> '#f8f8f8' ,
	'd3f_topicinfo_border_in_td'	=> '#777777' ,
	'd3f_body'					=> '#000000' ,
) ;

$images = array(
//	'd3f_head_bg'			=> '/images/headbg.jpg' , // sample
	'd3f_info_bg'			=> '' ,
) ;

$d3f = array(
	'tree_indicator'		=> 1 , // 0 or 1
) ;

//override ?? need 'global'?
$colors['d3f_body'] = isset( $colors['main_text'] ) ? $colors['main_text'] : $colors['d3f_body'] ;

$this->assign( array(
	'color' => $colors ,
	'images' => $images ,
	'size'  => $sizes ,
	'd3f' => $d3f ,
) ) ;
 ?>

/************** d3forum genelic *************/
/* xoopsCode */
#post_reference dd div.xoopsCode,
#post_preview dd div.xoopsCode,
div.d3f_body div.xoopsCode{
	border				:1px <?php echo $this->_tpl_vars['color']['d3f_lines']; ?>
 solid;
<?php if (stristr ( $_SERVER['HTTP_USER_AGENT'] , 'msie' )): ?>
	width				:95%;
<?php else: ?>
	width				:auto;
<?php endif; ?>
	overflow				:auto;
	padding				:0;
	margin				:10px 0;}
div.xoopsCode pre{
<?php if (stristr ( $_SERVER['HTTP_USER_AGENT'] , 'Safari' )): ?>
	white-space			:normal !important;/* bug?? */
<?php else: ?>
	white-space			:pre;
<?php endif; ?>
<?php if (stristr ( $_SERVER['HTTP_USER_AGENT'] , 'MSIE' )): ?>
	overflow				:visible;
<?php endif; ?>}
/* xoopsQuote */
div.d3f_body blockquote{
	margin				:0 0 5px;
	padding				:5px;}
div.d3f_body div.xoopsQuote{
	border				:1px <?php echo $this->_tpl_vars['color']['d3f_lines']; ?>
 solid;
	margin				:0;
	padding				:0;}
#post_reference dd blockquote,
#post_preview dd blockquote{
	margin				:0;
	padding				:5px;}

/************** d3forum CSS *************/

/* em.d3f_attn */

em.d3f_attn{
	font-style			:normal;
	border-bottom			:1px #333 dotted;
	cursor				:help;}

/* d3f_breadcrumbs */

div.d3f_breadcrumbs{
	font-size				:95%;
	padding				:0 0 3px;
	border-bottom			:1px #aaa solid;}

/* h1 */

.d3f_title{
	font-size				:130%;
	margin				:3px 0 15px;
}
.d3f_title *{
	vertical-align		:middle;
}

/* avatar */

.d3f_avatar{
	position				:relative;
	z-index				:110;
	border				:4px <?php echo $this->_tpl_vars['color']['d3f_bg']; ?>
 solid;
	margin				:-4px -8px 0 0;
	float				:right;}

/* each post */

.d3f_head{
	padding				:4px 8px;
	line-height			:100%;
	color				:<?php echo $this->_tpl_vars['color']['d3f_head']; ?>
;
	background-color		:<?php echo $this->_tpl_vars['color']['d3f_head_bg']; ?>
;
<?php if ($this->_tpl_vars['images']['d3f_head_bg'] != ''): ?>
	background-image		:url(<?php echo $this->_tpl_vars['xoops_imageurl']; ?>
<?php echo $this->_tpl_vars['images']['d3f_head_bg']; ?>
);
<?php endif; ?>}
.d3f_head h2{
	position				:relative;
	z-index				:101;
	line-height			:120%;
	font-size				:120%;
	font-weight			:bold;
	margin				:0;
	padding				:0;}
.d3f_head h2 a{
	text-decoration		:none;}
.d3f_head h2 a:link{color	:<?php echo $this->_tpl_vars['color']['d3f_head_link']; ?>
;}
.d3f_head h2 a:active{color	:<?php echo $this->_tpl_vars['color']['d3f_head_active']; ?>
;}
.d3f_head h2 a:visited{color:<?php echo $this->_tpl_vars['color']['d3f_head_visited']; ?>
;}
.d3f_head h2 a:hover{color	:<?php echo $this->_tpl_vars['color']['d3f_head_hover']; ?>
;}
.d3f_head h2.invisible {
	background-color		:#f00;}
.d3f_head h2.yetapproval {
	background-color		:#0ff;}
.d3f_head h2 img{
	vertical-align		:middle;}
.d3f_msgnum{
	color				:<?php echo $this->_tpl_vars['color']['d3f_head_link']; ?>
;
	font-size				:95%;
	font-weight			:normal;}
.d3f_info{
	position				:relative;
	margin				:2px 0 0;
	padding				:3px 8px;
	color				:<?php echo $this->_tpl_vars['color']['d3f_info']; ?>
;
	background-color		:<?php echo $this->_tpl_vars['color']['d3f_info_bg']; ?>
;
<?php if ($this->_tpl_vars['images']['d3f_info_bg'] != ''): ?>
	background-image		:url(<?php echo $this->_tpl_vars['xoops_imageurl']; ?>
<?php echo $this->_tpl_vars['images']['d3f_info_bg']; ?>
);
<?php endif; ?>}
<?php if ($this->_tpl_vars['d3f']['tree_indicator']): ?>
	.d3f_head_tree_depth{
		z-index				:100;
		position				:absolute;
		top					:0;
<?php if (stristr ( $_SERVER['HTTP_USER_AGENT'] , 'MSIE' )): ?>
		left					:-8px;
<?php else: ?>
		left					:0;
<?php endif; ?>
		margin				:0;
		padding				:3px 0;
		background-color		:<?php echo $this->_tpl_vars['color']['d3f_tree_indicator']; ?>
;}
	dl.d3f_head_tree_depth dt,
	dl.d3f_head_tree_depth dd{
		width				:1px;
		visibility			:hidden;
		float				:left;}
	dl.d3f_head_tree_depth dt{
		position				:absolute;}
<?php else: ?>
	.d3f_head_tree_depth{
		display				:none;}
<?php endif; ?>
.d3f_info_val{/* just only for indicator... */
	z-index				:101;
	position				:relative;}
.d3f_info_sub{
	padding				:2px 8px 3px;
	background-color		:<?php echo $this->_tpl_vars['color']['d3f_bg']; ?>
;}
.d3f_body{
	width				:auto;
	clear				:right;
	line-height			:150%;
	margin				:0 -2px;
	padding				:15px 8px;
	border-top			:1px <?php echo $this->_tpl_vars['color']['d3f_lines']; ?>
 solid;}
.d3f_info_ctrl{
	line-height			:100%;
	text-align			:right;
	clear				:both;
	margin				:2px -2px 2px;
	padding				:2px 10px;
	background-color		:<?php echo $this->_tpl_vars['color']['d3f_info_bg']; ?>
;
	border-top			:1px <?php echo $this->_tpl_vars['color']['d3f_lines']; ?>
 dotted;
	border-bottom			:1px <?php echo $this->_tpl_vars['color']['d3f_lines']; ?>
 solid;}
.d3f_info_ctrl form input,
.d3f_info_ctrl img{
	vertical-align		:middle;}

/* h2 */
h2.d3f_head{
	font-size				:120%;
	padding				:3px 8px;}
h2.d3f_tree{
	margin-bottom			:4px;}

/* main_listposts.html */

.d3f_wrap{
	width				:100%;
	clear				:both;
	border-top			:1px <?php echo $this->_tpl_vars['color']['d3f_lines']; ?>
 solid;
	border-right			:1px <?php echo $this->_tpl_vars['color']['d3f_lines']; ?>
 solid;
	border-left			:1px <?php echo $this->_tpl_vars['color']['d3f_lines']; ?>
 solid;
	padding				:2px 2px 0;}

/* d3f_form */

form.d3f_form p input{
	vertical-align		:middle;}

/* d3f_ctrl */

.d3f_ctrl{
	width				:100%;
	border				:1px <?php echo $this->_tpl_vars['color']['d3f_lines']; ?>
 solid;
	color				:<?php echo $this->_tpl_vars['color']['d3f_ctrl']; ?>
;
	background-color		:<?php echo $this->_tpl_vars['color']['d3f_ctrl_bg']; ?>
;
	margin				:5px 0;
	padding				:2px;
	line-height			:150%;
	clear				:both;}
.d3f_ctrl li{
	margin-left			:25px;}

div.d3f_order_ctrl{
	float				:right;}
div.d3f_order_ctrl a{
	margin-left			:10px;}


/* h3 */

h3.d3f_head_h3{
	font-size				:120%;
	margin				:5px 0 0;
	padding				:2px 8px;
	border-bottom			:1px <?php echo $this->_tpl_vars['color']['d3f_lines']; ?>
 solid;}

/* d3f_orderctrl */

p.d3f_viewctrl{
	margin				:0;
	padding				:3px;
	text-align			:right;}

/* d3f_topicinfo */

.d3f_topicinfo{
	text-align			:left;
	margin				:0;
	padding				:2px;}

/* main_viewpost.html */
/* eachbranch */

ul.d3f_eachbranch{
	margin				:0;
	padding				:0;}
ul.d3f_eachbranch li{
	list-style			:none outside;
	margin				:0;
	padding				:0;}
ul.d3f_eachbranch li img{
	vertical-align		:middle;}

/* d3f_currenttopic */

.d3f_eachbranch li.d3f_eachbranchitem{
	padding-top			:2px;
	padding-bottom		:2px;
	background-color		:<?php echo $this->_tpl_vars['color']['d3f_bottom_tree_bg']; ?>
;}
.d3f_eachbranch li.d3f_currenttopic{
	background-color		:<?php echo $this->_tpl_vars['color']['d3f_bottom_tree_current_bg']; ?>
;}
.d3f_eachbranch li.d3f_currenttopic > span,
.d3f_eachbranch li.d3f_currenttopic > span a{
	color				:<?php echo $this->_tpl_vars['color']['d3f_bottom_tree_current']; ?>
;}

/* main_listforums.html */
/* d3f_subcategories */

ul.d3f_subcategories li{
	list-style			:none outside;}

/* d3forum_main_listcategories.html */
/* infomations*/

dl.d3f_bbsinfo{
	font-size				:95%;
	margin				:0;
	float				:left;}
dl.d3f_bbsinfo dt,dl.d3f_bbsinfo dd{
	display				:inline;
	margin				:0;}
dl.d3f_bbsinfo dd{
	margin				:0 5px 0 0;}
dl.d3f_timeinfo{
	clear				:both;
	font-size				:95%;
	margin				:0;
	padding				:0 0 10px;
	float				:left;}
dl.d3f_timeinfo dt,dl.d3f_timeinfo dd{
	display				:inline;
	margin				:0;}
dl.d3f_timeinfo dd{
	margin				:0 5px 0 0;}

ul.d3f_listforums li{
	list-style			:none outside;}

/* main_listtopics.html */
/* d3f_bbsviewctrl */

div.d3f_bbsviewctrl{
	line-height			:100%;
	float				:left;
	padding-bottom		:3px;}
div.d3f_bbsviewctrl form{
	margin				:0;
	padding				:0;}
div.d3f_bbsviewctrl form *,p.d3f_bbsviewctrl *{
	vertical-align		:middle;
	margin				:0;
	padding				:0;}

/* d3f_pagenav */

.d3f_pagenav{
	text-align			:right;
	padding				:3px;}

table.d3f_table{
	width				:100%;
	clear				:both;}
table.d3f_table thead th{
	color				:<?php echo $this->_tpl_vars['color']['d3f_head']; ?>
;
	background-color		:<?php echo $this->_tpl_vars['color']['d3f_head_bg']; ?>
;}
table.d3f_table thead th,
table.d3f_table td{
	text-align			:center !important;
	padding				:3px;
	vertical-align		:middle;}
table.d3f_table td.d3f_topictitle,
table.d3f_table td.d3f_posters{
	text-align			:left !important;}
table.d3f_table td.d3f_mainicon{
	padding				:0;}

table.d3f_table td img{
	vertical-align		:middle;
	margin-right			:3px;}

table.d3f_table td dl{
	text-align			:left !important;
	margin				:0 -3px;
	padding				:0;}
table.d3f_table td dt{
	margin				:0;
	padding				:3px 3px 5px;}
table.d3f_table td dd{
	margin				:0;
	padding				:0 3px 5px;}
table.d3f_table td dd.d3f_td_topicinfo{
	margin				:0;
	padding				:3px 3px 1px;
	border-top			:1px <?php echo $this->_tpl_vars['color']['d3f_topicinfo_border_in_td']; ?>
 dashed;
	font-size				:95%;}

/* d3f_iconexp */

div.d3f_iconexps ul.d3f_iconexp{
	width				:45%;
	float				:left;}

ul.d3f_iconexp{
	padding-bottom		:15px;}

ul.d3f_iconexp li{
	list-style			:none outside;
	padding				:3px 0;}

ul.d3f_iconexp li img{
	vertical-align		:middle;
	margin-right			:3px;}

/* d3forum forms */

#post_reference dd,
#post_preview dd{
	margin				:0;}

/* table.d3f_form_table */

table.d3f_form_table td,
table.d3f_form_table th{
	vertical-align		:top !important;
	text-align			:left;}

/* d3f_submit */

p.d3f_submit{
	text-align			:center;
	margin				:0;
	padding				:10px;}
