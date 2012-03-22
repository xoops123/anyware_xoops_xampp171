<?php

/*
 * Smarty plugin
 * -------------------------------------------------------------
 * Type:     function
 * Name:     xoopsdhtmltarea plus id
 * Version:  1.0
 * Date:     Jun 6, 2004  (modified 2006-11-10)
 * Author:   minahito <sunday_lab@pleple.com> - modified by GIJOE
 * Purpose:  cycle through given values
 * Input:    name = name of form 'name'
 *           values = preset value
 *           cols = default 50
 *           rows = default 5
 *           pre_style = default '' (you can specify pre_style="display:none;")
 *           post_sytle = default '' (you can specify post_style="display:none;")
 *           id = name of textarea 'id'
 *
 * Examples: {xoopsdhtmltarea name=message cols=40 rows=6 value=$message}
 * -------------------------------------------------------------
 */
function smarty_function_myckeditordhtmltarea($params, &$smarty)
{
	if (!class_exists('xoopsformelement')) {
		require_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";
	}
	$form=null;

	if( ! empty( $params['name'] ) ) {
		$name = trim($params['name']);
		$rows = isset($params['rows']) ? intval($params['rows']) : 5;
		$cols = isset($params['cols']) ? intval($params['cols']) : 50;
		$value = isset($params['value']) ? $params['value'] : "";
		$form = new XoopsFormDhtmlTextArea($name,$name,$value,$rows,$cols);
		if (isset($params['id'])) {
			$form->setId($params['id']);
		}else{
			$form->setId($params['name']);
		}
		if (isset($params['class'])) {
			if ($params['class'] != null) {
				$form->setClass($params['class']);
			}
		}
		$rendered = $form->render();
		print '<div id="'.$name.'_bbcode_buttons_pre" style="'.@$params['pre_style'].'">'.str_replace( array( '<textarea' , '</textarea><br />' ) , array( '</div><textarea' , '</textarea><div id="'.$name.'_bbcode_buttons_post" style="'.@$params['post_style'].'">' ) , $rendered ) . '</div>' ;
	}
}

/* vim: set expandtab: */

?>
