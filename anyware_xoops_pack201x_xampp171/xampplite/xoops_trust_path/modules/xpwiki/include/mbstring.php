<?php
// PukiWiki - Yet another WikiWikiWeb clone.
// $Id: mbstring.php,v 1.3 2007/09/02 14:53:58 nao-pon Exp $
// Copyright (C) 2003-2005 PukiWiki Developers Team
// License: GPL v2 or (at your option) any later version
//
// mbstring-extension alternate functions
// (will work with LANG == 'ja' and EUC-JP environment only)

/*
 * mbstring extension �������С�¦��¸�ߤ��ʤ��������شؿ�
 *
 */

if (!defined('SOURCE_ENCODING')) define('SOURCE_ENCODING', (defined('_CHARSET')? _CHARSET : 'EUC-JP'));

// jcode�ν��
if (is_readable(dirname(__FILE__).'/jcode/jcode_wrapper.php') && !function_exists('jcode_convert_encoding')) {
	require_once(dirname(__FILE__).'/jcode/jcode_wrapper.php');
}

// jcode��¸�ߤ��ʤ���硢�ޥ���Х���ʸ������������ɤ򰷤��ʤ�
if (! function_exists('jcode_convert_encoding')) {

//	die_message('Multibyte functions cannot be used. Please read "mbstring.php" for an additional installation procedure of "jcode".');

	function jstrlen($str)
	{
		return strlen($str);
	}

	function jsubstr($str, $start, $length)
	{
		return substr($str, $start, $length);
	}

	function AutoDetect($str)
	{
		return 0;
	}

	function jcode_convert_encoding($str, $to_encoding, $from_encoding)
	{
		return $str;
	}
}

// mb_convert_encoding -- ʸ�����󥳡��ǥ��󥰤��Ѵ�����
if (! function_exists("mb_convert_encoding")) {
function mb_convert_encoding($str, $to_encoding, $from_encoding = '')
{
	// ��ĥ: ������������褦��
	// mb_convert_variable�к�
	if (is_array($str)) {
		foreach ($str as $key=>$value) {
			$str[$key] = mb_convert_encoding($value, $to_encoding, $from_encoding);
		}
		return $str;
	}
	return jcode_convert_encoding($str, $to_encoding, $from_encoding);
}
}

// mb_convert_variables -- �ѿ���ʸ�������ɤ��Ѵ�����
if (! function_exists("mb_convert_variables")) {
function mb_convert_variables($to_encoding, $from_encoding, &$vars)
{
	// ����ؿ�:�����Ƶ�Ū��join����
	if (! function_exists("mb_convert_variables_join_array")) {
	function mb_convert_variables_join_array($glue, $pieces)
	{
		$arr = array();
		foreach ($pieces as $piece) {
			$arr[] = is_array($piece) ? mb_convert_variables_join_array($glue, $piece) : $piece;
		}
		return join($glue, $arr);
	}
	}

	// ��: ����Ĺ�����ǤϤʤ���init.php����ƤФ��1�����Υѥ�����Τߤ򥵥ݡ���
	// ��ľ�˼�������ʤ顢���Ѱ������ե���󥹤Ǽ�������ˡ��ɬ��
	if (is_array($from_encoding) || $from_encoding == '' || $from_encoding == 'auto')
		$from_encoding = mb_detect_encoding(mb_convert_variables_join_array(' ', $vars));

	if ($from_encoding != 'ASCII' && $from_encoding != SOURCE_ENCODING)
		$vars = mb_convert_encoding($vars, $to_encoding, $from_encoding);

	return $from_encoding;
}
}

// mb_detect_encoding -- ʸ�����󥳡��ǥ��󥰤򸡽Ф���
if (! function_exists("mb_detect_encoding")) {
function mb_detect_encoding($str, $encoding_list = '')
{
	static $codes = array(0=>'ASCII', 1=>'EUC-JP', 2=>'SJIS', 3=>'JIS', 4=>'UTF-8');

	// ��: $encoding_list�ϻ��Ѥ��ʤ���
	$code = AutoDetect($str);
	if (! isset($codes[$code])) $code = 0; // oh ;(

	return $codes[$code];
}
}

// mb_detect_order --  ʸ�����󥳡��ǥ��󥰸��н��������/����
if (! function_exists("mb_detect_order")) {
function mb_detect_order($encoding_list = NULL)
{
	static $list = array();

	// ��: ¾�δؿ��˱ƶ���ڤܤ��ʤ����Ƥ�Ǥ�̵��̣��
	if ($encoding_list === NULL) return $list;

	$list = is_array($encoding_list) ? $encoding_list : explode(',', $encoding_list);
	return TRUE;
}
}

// mb_encode_mimeheader -- MIME�إå���ʸ����򥨥󥳡��ɤ���
if (! function_exists("mb_encode_mimeheader")) {
function mb_encode_mimeheader($str, $charset = 'ISO-2022-JP', $transfer_encoding = 'B', $linefeed = "\r\n")
{
	// ��: $transfer_encoding�˴ؤ�餺base64���󥳡��ɤ��֤�
	$str = mb_convert_encoding($str, $charset, 'auto');
	return '=?' . $charset . '?B?' . $str;
}
}

// mb_http_output -- HTTP����ʸ�����󥳡��ǥ��󥰤�����/����
if (! function_exists("mb_http_output")) {
function mb_http_output($encoding = '')
{
	return SOURCE_ENCODING; // ��: ���⤷�ʤ�
}
}

// mb_internal_encoding --  ����ʸ�����󥳡��ǥ��󥰤�����/����
if (! function_exists("mb_internal_encoding")) {
function mb_internal_encoding($encoding = '')
{
	return SOURCE_ENCODING; // ��: ���⤷�ʤ�
}
}

// mb_language --  �����Ȥθ��������/����
if (! function_exists("mb_language")) {
function mb_language($language = NULL)
{
	static $mb_language = FALSE;

	if ($language === NULL) return $mb_language;
	$mb_language = $language;

	return TRUE; // ��: ���TRUE���֤�
}
}

// mb_strimwidth -- ���ꤷ������ʸ�����ݤ��
if (! function_exists("mb_strimwidth")) {
function mb_strimwidth($str, $start, $width, $trimmarker = '', $encoding = '')
{
	if ($start == 0 && $width <= strlen($str)) return $str;

	// ��: EUC-JP����, $encoding����Ѥ��ʤ�
	$chars = unpack('C*', $str);
	$substr = '';

	while (! empty($chars) && $start > 0) {
		--$start;
		if (array_shift($chars) >= 0x80)
			array_shift($chars);
	}
	if ($b_trimmarker = (count($chars) > $width)) {
		$width -= strlen($trimmarker);
	}
	while (! empty($chars) && $width-- > 0) {
		$char = array_shift($chars);
		if ($char >= 0x80) {
			if ($width-- == 0) break;
			$substr .= chr($char);
			$char = array_shift($chars);
		}
		$substr .= chr($char);
	}
	if ($b_trimmarker) $substr .= $trimmarker;

	return $substr;
}
}

// mb_strlen -- ʸ�����Ĺ��������
if (! function_exists("mb_strlen")) {
function mb_strlen($str, $encoding = '')
{
	// ��: EUC-JP����, $encoding����Ѥ��ʤ�
	return jstrlen($str);
}
}

// mb_substr -- ʸ����ΰ���������
if (! function_exists("mb_substr")) {
function mb_substr($str, $start, $length = NULL, $encoding = '')
{
	// ��: EUC-JP����, $encoding����Ѥ��ʤ�
	return jsubstr($str, $start, ($length === NULL) ? jstrlen($str) : $length);
}
}
?>