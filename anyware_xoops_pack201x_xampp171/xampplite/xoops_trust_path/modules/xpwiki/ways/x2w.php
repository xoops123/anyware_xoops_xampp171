<?php
/*
 * Created on 2008/10/23 by nao-pon http://hypweb.net/
 * License: GPL v2 or (at your option) any later version
 * $Id: x2w.php,v 1.19 2012/01/26 06:05:01 nao-pon Exp $
 */

//
//	guiedit - PukiWiki Plugin
//
//	License:
//	  GNU General Public License Version 2 or later (GPL)
//	  http://www.gnu.org/licenses/gpl.html
//
//	Copyright (C) 2006-2008 garand
//	PukiWiki : Copyright (C) 2001-2006 PukiWiki Developers Team
//	FCKeditor : Copyright (C) 2003-2008 Frederico Caldeira Knabben
//
//
//	File:
//	  xhtml2wiki.php
//	  XHTML �� PukiWiki �ι�ʸ���Ѵ�
//

error_reporting(0);

$post = isset($_POST['s'])? $_POST['s'] : $_GET['s'];
$line_break = isset($_POST['lb'])? $_POST['lb'] : $_GET['lb'];

if (get_magic_quotes_gpc()) {
	$post = stripslashes($post);
}

define('DEBUG', (! empty($_GET['debug'])));

$source = str_replace(array("\r\n", "\r"), "\n", $post);
$postdata = xhtml2wiki($source);
Send_xml($postdata);

function debug($data){
	$file = dirname(__FILE__) . '/debug.txt';
	@ unlink($file);
	file_put_contents($file, $data);
}

//	XML �����ǽ���
function Send_xml($postdata)
{
	$postdata = trim($postdata, "\n") . "\n";
	$out  =  '<?xml version="1.0" encoding="UTF-8" ?>' . "\n";
	$out .= '<res><![CDATA[' . $postdata . ']]></res>';
	//	����
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0', false);
	header('Pragma: no-cache');
	if (DEBUG) {
		header('Content-Type: text/plain; charset=UTF-8');
	} else {
		header('Content-Type: application/xml; charset=UTF-8');
	}
	header('Content-Length: ' . strlen($out));
	echo $out;
	exit;
}

function xhtml2wiki($source)
{
	if (DEBUG) {
		error_reporting(E_ALL);
	} else {
		error_reporting(0);
	}

	// �Ѵ����饹�Υ��֥������������Ȥ�������
	$obj = new XHTML2Wiki();

	// �Ѵ��᥽�åɤθƤӽФ�
	$body = $obj->Convert($source);

	// ��Ƭ��������̵�̤ʶ������
	$body = preg_replace('/^(?:\n* \n+)+/', '', $body);
	$body = preg_replace('/(?:\s*#br\s*)+$/', "\n", $body);

	return $body;
}


// �Ѵ����饹
class XHTML2Wiki
{
	var $body;
	var $text;
	var $parent_div;
	var $div_level;
	var $level_array;
	var $list_level;
	var $last_div;
	var $basicStyles;
	var $comment;
	var $tempvars = array();
	var $SavedOutputLine;
	var $foundDT;

	//	�����
	function XHTML2Wiki() {
		$this->parent_div = array('');
		$this->level_array = array();
		$this->div_level = 0;
		$this->list_level = 0;
		$this->last_div = '';
		$this->text = '';
		$this->SavedOutputLine = '';
		$this->foundDT = array();
	}

	// �Ѵ��᥽�å�
	function Convert($source) {
		$this->body = '';

		// ������ʸ��������
		$source = preg_replace('#</?[a-zA-Z]+#e', 'strtolower("$0")', $source);

		$source = preg_replace('#(<br[^>]*?>)\n#s', '$1', $source);
		$source = preg_replace('#(<p>&nbsp;</p>\s*)+$#s', '', $source);
		$source = preg_replace('#\s*<p>&nbsp;</p>\s*#s', "\n<br class=\"block\" />\n", $source);
		$source = preg_replace('#\s*(<(?:form|table|tbody|thead|tfoot|tr|colgroup|p|div|h[1-6]|pre|ol|ul|li|dl|dt|dd|td|th|blockquote)[^>]*?>)#s', "\n$1", $source);
		$source = preg_replace('#(</(?:form|table|tbody|thead|tfoot|tr|colgroup|p|div|h[1-6]|pre|ol|ul|li|dl|dt|dd|td|th|blockquote)>)\s*#s', "$1\n", $source);
		$source = preg_replace('#(<blockquote[^>]*?>)\s*#s', "$1\n", $source);
		$source = preg_replace('#\s*(</blockquote>)#s', "\n$1", $source);

		//debug($source);

		// ���Ԥ��Ĥ�ʬ��
		$source = explode("\n", $source);

		// ��Ԥ��ļ��Ф�
		foreach ($source as $line) {
			$this->Div($line);
		}

		// ��ʸ����
		$body = implode('', $this->body);

		// ��ʸ����
		$body = preg_replace('/ \n\n/', "\n", $body);
		$body = preg_replace('/\n{3,}+/', "\n\n", $body);
		$body = preg_replace('/(?:(?:-|\+)+\s*\n){2,}/', '', $body);
		$body = preg_replace('/(-|\+)\n~/', '$1 ~', $body);
		$body = str_replace("\r", '', $body);
		$body = rtrim($body);

		return $body;
	}

	// �֥�å�����
	function Div($line) {
		if ($line == '' && $this->GetDiv() !== 'Pre') {
			return;
		}

		$line = preg_replace('/ *(<(?:form|table|tbody|thead|tfoot|tr|ul|ol))/', '$1', $line);

		if ($this->GetDiv() == 'Table') {
			$this->Table($line);
			return;
		}

		// �����Ѥߥƥ�����
		if (preg_match("/<pre([^>]*?)>/", $line, $matches)) {
			$this->StartDiv('Pre');
			if (strpos($matches[1], 'class="comment"') !== false) {
				$this->comment = true;
			} else {
				$this->comment = false;
			}
		}
		else if ($this->GetDiv() == 'Pre') {
			if (preg_match("/(.*)<\/pre>/", $line, $matches)) {
				$line = $matches[1];
				$this->EndDiv();
			}
			$line = preg_replace("/<br[^>]*?>/", "\n ", $line);
			$line = strip_tags($line);
			if (! $this->comment) {
				$this->OutputLine(' ' . $this->DecodeSpecialChars($line));
				if (! $this->GetDiv()) {
					$this->OutputLine();
				}
			} else {
				$this->OutputLine($this->DecodeSpecialChars($line));
			}
		}
		// ���Ф�
		else if (preg_match("/<h([2-6])(.*?)>(.*)/", $line, $matches)) {
			$this->StartDiv('Heading');
			$level = $matches[1];
			$line = $matches[3];
			$attribute = $matches[2];
			if (preg_match("/id=\"(\w+)\"/", $attribute, $matches)) {
				$line .= " [#" . $matches[1] . "]";
			}
			$this->OutputLine(str_repeat("*", --$level), $line);
			$this->EndDiv();
			$this->OutputLine();
		}
		// �֥�å����ץ饰����
		else if (preg_match("/<div\s([^>]*?)class=\"(plugin|ref)\"(.*?)>(.*)/", $line)) {
			$line = preg_replace("/<br[^>]*?>/", "\r\n", $line);
			$line = strip_tags($line);
			$this->OutputLine($this->DecodeSpecialChars($line));
		}
		// ����ʸ
		else if (preg_match("/<blockquote.*?>/", $line)) {
			if ($this->GetDiv() != 'Blockquote') {
				$this->StartDiv('Blockquote');
			}
			$this->div_level++;
			$this->SavedOutputLine = str_repeat('>', $this->GetLevel());
		}
		// �ꥹ��
		else if (preg_match("/<(o|u|d)l(.*?)>/", $line, $matches)) {
			$element = strtoupper($matches[1]) . 'List';
			$this->StartDiv($element);
			$this->div_level++;
			$this->list_level++;
		}
		// �ơ��֥�
		else if (preg_match("/<table(.*?)>/", $line, $matches)) {
			$this->StartDiv('Table');
			$this->GetTableStyle($matches[1]);
		}
		// ��ʿ��
		else if (preg_match("/^<hr(?:\s+class=\"(full_hr|short_line)\")?\s*\/?>$/", $line, $matches)) {
			if ($matches[1] == 'short_line') {
				$this->OutputLine("#hr");
			}
			else {
				$this->OutputLine();
				$this->OutputLine('----');
				$this->OutputLine();
			}
		}
		// ����
		else if (preg_match('/^(?:<p[^>]*?'.'>)?<br[^>]*?class="block"[^>]*?'.'>(?:&nbsp;)*(?:<\/p>)?$/', $line, $matches)) {
			$this->OutputLine("#br");
		}
		else {
			switch ($this->GetDiv()) {
				case 'OList':
					$this->OList($line);
					break;
				case 'UList':
					$this->UList($line);
					break;
				case 'DList':
					$this->DList($line);
					break;
				case 'Blockquote':
					$this->Blockquote($line);
					break;
				default:
					$this->Paragraph($line);
					break;
			}
		}
	}

	// �ֹ��դ��ꥹ��
	function OList($line) {
		if (preg_match("/<\/ol>/", $line)) {
			$this->div_level--;
			$this->list_level--;
			$this->EndDiv();
			if ($this->GetDiv() == '') {
				$this->OutputLine();
			}
		}
		else if (preg_match("/^(<li([^>]*?)>)?(.*?)(<\/li>)?$/S", $line, $matches)) {
			$head = '';
			if ($matches[1] && (empty($matches[2]) || strpos($matches[2], 'class="list_none"') === false)) {
				$head = str_repeat("+", $this->list_level);
			}
			if (!$matches[1] && $matches[3]) {
				$this->Paragraph($matches[3]);
			}
			else if ($head || $matches[3]) {
				$this->OutputLine($head, $matches[3]);
			}
		}
	}

	// �ֹ�ʤ��ꥹ��
	function UList($line) {
		if (preg_match("/<\/ul>/", $line)) {
			$this->div_level--;
			$this->list_level--;
			$this->EndDiv();
			if ($this->GetDiv() == '') {
				$this->OutputLine();
			}
		}
		else if (preg_match("/^(<li([^>]*?)>)?(.*?)(<\/li>)?$/S", $line, $matches)) {
			$head = '';
			if ($matches[1] && (empty($matches[2]) || strpos($matches[2], 'class="list_none"') === false)) {
				$head = str_repeat("-", $this->list_level);
			}
			if (!$matches[1] && $matches[3]) {
				$this->Paragraph($matches[3]);
			}
			else if ($head || $matches[3]) {
				$this->OutputLine($head, $matches[3]);
			}
		}
	}

	// ����ꥹ��
	function DList($line) {
		if (preg_match("/<\/dl>/", $line)) {
			$this->foundDT[$this->list_level] = false;
			$this->div_level--;
			$this->list_level--;
			$this->EndDiv();
			if ($this->GetDiv() == '') {
				$this->OutputLine();
				$this->foundDT = array();
			}
		}
		else if (preg_match("/^\s*(<d(t|d)>)?(.*?)(<\/d(t|d)>)?\s*$/S", $line, $matches)) {
			$text = $matches[3];
			if ($matches[2] == 't') {
				$this->OutputLine(str_repeat(':', $this->list_level), $text, '|');
				$this->foundDT[$this->list_level] = $text? true : false;
			} else if ($text) {
				if ($text !== '<div class="ie5">') {
					if (preg_match('/^<p\b/', $text)) {
						$this->Paragraph($text);
					} else {
						$_head = (empty($this->foundDT[$this->list_level]))? str_repeat(':', $this->list_level) . '|' : '';
						//$_head = '';
						$this->OutputLine($_head, $text);
						if (isset($matches[5]) && $matches[5] === 'd') $this->foundDT[$this->list_level] = false;
					}
				}
			}
		}
	}

	// ����ʸ
	function Blockquote($line) {
		if (preg_match("/<\/blockquote>/", $line)) {
			if ($this->list_level > 0 && $this->div_level <= 3 && count($this->parent_div) > $this->div_level) {
				$this->OutputLine(str_repeat('<', $this->GetLevel()), '');
			}
			$this->div_level--;
			if ($this->div_level == 0) {
				$this->EndDiv();
			}
		}
		else if (preg_match("/(<p.*?>)?(.*?)(<\/p>)?$/S", $line, $matches)) {
			if (!$matches[1] && !$matches[3]) {
				$this->Paragraph($line);
			}
			else if ($matches[2]) {
				$head = $matches[1] ? str_repeat('>', $this->GetLevel()) : '';
				$this->SavedOutputLine = '';
				$this->OutputLine($head, $matches[2]);
			}
		}
	}

	// �ơ��֥�
	function Table($line) {
		static $cells;
		static $row, $col;
		static $is_cell = false;
		static $type = '';

		// ����γ���
		if (preg_match("/<t(d|h)(>|\s(.*?)>)(.*)/", $line, $matches)) {
			$is_cell = true;
			$cell_type = $matches[1];
			$attribute = $matches[3];
			$line = $matches[4];
			$rowspan = 1;
			$colspan = 1;

			for (; !empty($cells[$row][$col]); $col++);

			// �����Ϣ��
			if (preg_match("/rowspan=\"(\d+)\"/", $attribute, $matches)) {
				$rowspan = $matches[1];
			}
			if (preg_match("/colspan=\"(\d+)\"/", $attribute, $matches)) {
				$colspan = $matches[1];
			}
			for ($i = 1; $i < $rowspan; $i++) {
				for ($j = 0; $j < $colspan; $j++) {
					$cells[$row + $i][$col + $j] = '~';
				}
			}
			for ($i = 1; $i < $colspan; $i++) {
				$cells[$row][$col++] = '>';
			}

			// �����°��
			$cells[$row][$col] = $this->GetTableAttribute($attribute, $col);
			// �إå�����
			$cells[$row][$col] .= ($cell_type == 'h') ? '~' : '';
		}

		// ����
		if ($is_cell) {
			if (preg_match("/(.*)<\/t(d|h)>/S", $line, $matches)) {
				$cells[$row][$col] .= trim($matches[1], "\n");
				$col++;
				$is_cell = false;
			}
			else {
				$cells[$row][$col] .= $line;
			}
		}
		// �Ԥγ���
		else if (preg_match("/<tr\b[^>]*?>/", $line)) {
			$col = 1;
			$row++;
		}
		// �ơ��֥�ν�λ
		else if (preg_match("/<\/table>/", $line)) {
			$this->tempvars['tablecol'] = 0;
			$cells = null;
			$this->EndDiv();
			if (! $this->list_level) $this->body[] = "\n";
		}
		// �������
		else if (preg_match("/<colgroup>/", $line)) {
			if (count($cells)) {
				$this->OutputTable($cells, $type);
				$cells = array();
				$row = 0;
			}
			$texts = '';
			$this->basicStyles = array();
			$_col = 0;
			while (preg_match("/<col\b(.*?)?\/?>(.*)/", $line, $matches)) {
				$line = $matches[2];
				$texts[] = $this->GetTableAttribute($matches[1], ++$_col, true);
			}
			$this->body[] = '|' . $this->tableStyle . (($this->tableStyle && $texts[0])? ' ' : '') . join('|', $texts) . "|c\n";
			$this->tableStyle = '';
		}
		// �إå����ܥǥ����եå��γ���
		else if (preg_match("/<t((h)ead|body|(f)oot)>/", $line, $matches)) {
			$type = !empty($matches[2]) ? $matches[2] : (!empty($matches[3]) ? $matches[3] : '');
			$cells = array();
			$row = 0;
		}
		// �إå����ܥǥ����եå��ν����
		else if (preg_match("/<\/t(head|body|foot)>/", $line)) {
			$this->OutputTable($cells, $type);
			$cells = array();
			$row = 0;
		}
	}

	// �����°�������
	function GetTableAttribute($attribute, $col, $c = false) {
		static $borders = array(
			'solid' => '(s)',
			'double' => '(d)',
			'groove' => '(g)',
			'ridge' => '(r)',
			'inset' => '(i)',
			'outset' => '(o)',
			'dashed' => '(da)',
			'dotted' => '(do)'
		);
		static $colors_reg = "aqua|navy|black|olive|blue|purple|fuchsia|red|gray|silver|green|teal|lime|white|maroon|yellow|transparent";

		$pattern = "/rgb\((\d+),\s(\d+),\s(\d+)\)/ie";
		$attribute = preg_replace($pattern, 'sprintf("#%02x%02x%02x", "$1", "$2", "$3")', $attribute);

		$text = '';
		$extexts = array();
		if ($c) $this->basicStyles[$col] = '';

		// ʸ��������
		if (preg_match("/font-size:\s?(\d+)px/i", $attribute, $matches)) {
			$format = "SIZE(" . $matches[1] . "):";
			if (strpos($this->basicStyles[$col], $format) === FALSE) $text .= $format;
		}

		// ʸ����
		if (preg_match("/(\"|\s)color:\s?([#0-9a-z]+)/i", $attribute, $matches)) {
			$format = "FC:" . $matches[2];
			if (strpos($this->basicStyles[$col], $format) === FALSE) $extexts[] = $format;
		}

		// border
		//one|two|boko|deko|in|out|dash|dott
		$border = $borderType = $cellspacing = '';
		if (preg_match('/border="(\d+)"/i', $attribute, $matches)) {
			$border = $matches[1];
		}
		if (preg_match('/border(?:-left)?(?:-width)?:[^;]*?(none)/i', $attribute, $matches)) {
			$border = 0;
		}
		if (preg_match('/border(?:-left)?(?:-width)?:[^;]*?(\d+)px/i', $attribute, $matches)) {
			$border = $matches[1];
		}
		if (preg_match('/border(?:-left)?(?:-style)?:[^;]*?(solid|double|groove|ridge|inset|dashed|dotted)/i', $attribute, $matches)) {
			// "outset" is default
			$borderType = $borders[strtolower($matches[1])];
		}

		// padding
		if (preg_match('/padding(?:-left)?:\s*(\d+)px/', $attribute, $matches)) {
			$cellspacing = ',' . $matches[1];
		}
		if ($border || $borderType || $cellspacing) {
			$format = 'K:' . $border . $cellspacing . $borderType;
			if (strpos($this->basicStyles[$col], $format) === FALSE) $extexts[] = $format;
		}
		// border-color
		if (preg_match('/border(?:-color)?:[^;]*?(#[0-9a-f]+|' . $colors_reg . ')/i', $attribute, $matches)) {
			$format = 'KC:' . $matches[1];
			if (strpos($this->basicStyles[$col], $format) === FALSE) $extexts[] = $format;
		}
		// background-color, background-image & background-repeat
		$repeat = '';
		$image = '';
		if (preg_match('/background-repeat:[^;]*?no-repeat/i', $attribute)) {
			$repeat = ',once';
		}
		if (preg_match('/background-image:[^;]*?url\(([^)]+?)\)/i', $attribute, $matches)) {
			$image = '(' . $matches[1] . $repeat . ')';
		}
		if (preg_match('/background-color:[^;]*?(#[0-9a-f]+|' . $colors_reg . ')/i', $attribute, $matches)) {
			$format = 'CC:' . $matches[1] . $image;
			if (strpos($this->basicStyles[$col], $format) === FALSE) $extexts[] = $format;
		} else if ($image) {
			$format = 'CC:' . $image;
			if (strpos($this->basicStyles[$col], $format) === FALSE) $extexts[] = $format;
		}

		$text .= join(' ', $extexts) . ($extexts? ' ' : '');

		// ����
		$align = $valign = '';
		if (preg_match("/align=\"(left|center|right)\"/", $attribute, $matches)) {
			$align = strtoupper($matches[1]);
		}
		if (preg_match("/text-align:\s?(left|center|right)/", $attribute, $matches)) {
			$align = strtoupper($matches[1]);
		}
		if (preg_match("/valign=\"(top|middle|bottom)\"/", $attribute, $matches)) {
			$valign = strtoupper($matches[1]);
		}
		if (preg_match("/vertical-align:\s?(top|middle|bottom)/", $attribute, $matches)) {
			$valign = strtoupper($matches[1]);
		}
		if ($align || $valign) {
			$format = $align . ":" . $valign;
			if (strpos($this->basicStyles[$col], $format) === FALSE) {
				$text .= $format;
			} else {
				$align = $valign = '';
			}
		}

		$width = '';
		if ($c) {
			$this->basicStyles[$col] = $text;
			// ����
			if (preg_match("/width=\"(\d+)(%)?\"/", $attribute, $matches)) {
				if (empty($matches[2])) {
					$text .= $matches[1];
				} else {
					$text .= (($align || $valign)? '' : ':') . ':' . $matches[1] . $matches[2];
					$this->basicStyles[$col] = $text;
				}
			}
		} else {
			// ����
			if (preg_match("/width=\"(\d+%?)\"/", $attribute, $matches)) {
				$format = ':' . $matches[1];
				if (strpos($this->basicStyles[$col], $format) === FALSE)
					$text .= (($align || $valign)? '' : ':') . $format;
			}
		}

		//return rtrim($text);
		return $text;
	}

	function GetTableStyle($attribute) {
		static $borders = array(
			'solid' => '(s)',
			'double' => '(d)',
			'groove' => '(g)',
			'ridge' => '(r)',
			'inset' => '(i)',
			'outset' => '(o)',
			'dashed' => '(da)',
			'dotted' => '(do)'
		);
		static $colors_reg = "aqua|navy|black|olive|blue|purple|fuchsia|red|gray|silver|green|teal|lime|white|maroon|yellow|transparent";

		$pattern = "/rgb\((\d+),\s(\d+),\s(\d+)\)/ie";
		$attribute = preg_replace($pattern, 'sprintf("#%02x%02x%02x", "$1", "$2", "$3")', $attribute);

		$this->tableStyle = '';

		$styles = array();

		// align, width
		$align = '';
		$width = '';
		if (preg_match('/align="(left|center|right)"/i', $attribute, $matches)) {
			$align = strtoupper($matches[1]);
			$styles[] = 'AROUND';
		}
		if (preg_match('/margin-right: *auto/i', $attribute, $matches) && preg_match('/margin-left: *auto/i', $attribute, $matches)) {
			$align = 'CENTER';
		} else {
			if (preg_match('/margin-right: *auto/i', $attribute, $matches)) {
				$align = 'LEFT';
			}
			if (preg_match('/margin-left: *auto/i', $attribute, $matches)) {
				$align = 'RIGHT';
			}
		}
		if (preg_match('/float:/i', $attribute, $matches)) {
			$styles[] = 'AROUND';
		}
		if (preg_match('/width="(\d+(?:%|px))"/i', $attribute, $matches)) {
			$width = $matches[1];
		}
		if (preg_match('/[" ;]width: *(\d+(?:%|px))/i', $attribute, $matches)) {
			$width = $matches[1];
		}
		if ($align || $width) {
			$styles[] = 'T' . $align . ':' . $width;
		}
		// border
		//one|two|boko|deko|in|out|dash|dott
		$border = $borderType = $cellspacing = '';
		if (preg_match('/border="(\d+)"/i', $attribute, $matches)) {
			$border = $matches[1];
		}
		if (preg_match('/border(?:-left)?(?:-width)?:[^;]*?(none)/i', $attribute, $matches)) {
			$border = 0;
		}
		if (preg_match('/border(?:-left)?(?:-width)?:[^;]*?(\d+)px/i', $attribute, $matches)) {
			$border = $matches[1];
		}
		if (preg_match('/border(?:-left)?(?:-style)?:[^;]*?(solid|double|groove|ridge|inset|dashed|dotted)/i', $attribute, $matches)) {
			// "outset" is default
			$borderType = $borders[strtolower($matches[1])];
		}
		// cellspacing
		if (preg_match('/cellspacing="(\d+)"/i', $attribute, $matches)) {
			// "1" is default
			if (intval($matches[1]) !== 1) {
				$cellspacing = ',' . $matches[1];
			}
		}
		if ($border || $borderType || $cellspacing) {
			$styles[] = 'B:' . $border . $cellspacing . $borderType;
		}
		// border-color
		if (preg_match('/border(?:-left)?(?:-color)?:[^;]*?(#[0-9a-f]+|' . $colors_reg . ')/i', $attribute, $matches)) {
			$styles[] = 'BC:' . $matches[1];
		}
		// background-color, background-image & background-repeat
		$repeat = '';
		$image = '';
		if (preg_match('/background-repeat:[^;]*?no-repeat/i', $attribute)) {
			$repeat = ',once';
		}
		if (preg_match('/background-image:[^;]*?url\(([^)]+?)\)/i', $attribute, $matches)) {
			$image = '(' . $matches[1] . $repeat . ')';
		}
		if (preg_match('/background-color:[^;]*?(#[0-9a-f]+|' . $colors_reg . ')/i', $attribute, $matches)) {
			$styles[] = 'TC:' . $matches[1] . $image;
		}

		if ($styles) {
			$this->tableStyle = join(' ', $styles);
		}
	}

	// �ơ��֥�����
	function OutputTable($cells, $type) {
		if ($this->SavedOutputLine) {
			$out = $this->SavedOutputLine;
			$this->SavedOutputLine = '';
			$this->OutputLine($out);
		}
		$row = count($cells);
		$colCount = array();
		for ($i = 1; $i <= $row; $i++) {
			$colCount[] = count($cells[$i]);
		}
		$col = max($colCount);
		$this->tempvars['tablecol'] = max($col, $this->tempvars['tablecol']);

		if ($this->tableStyle) {
			$this->body[] = '|' . $this->tableStyle . str_repeat('|', $col)  . "c\n";
			$this->tableStyle = '';
		}
		for ($i = 1; $i <= $row; $i++) {
			for ($j = 1; $j <= $this->tempvars['tablecol']; $j++) {
				$this->body[] = "|" . $this->Inline(@ $cells[$i][$j]);
			}
			$this->body[] = "|" . $type . "\n";
		}
	}

	// ����
	function Paragraph($line) {
		$head = $this->list_level? '~' : '';
		$align = '';
		$p = false;
		if (preg_match("/<(?:p|div)([^>]*?)(?:text-align:\s*(left|center|right))([^>]*)>/", $line, $matches)) {
			if (strpos($matches[1], 'class="ie5"') === false && strpos($matches[3], 'class="ie5"') === false) {
				$align = strtoupper($matches[2]) . ':';
			}
		}
		if (preg_match("/<(p|div)[^>]*?>(.*)/", $line, $matches)) {
			$p = true;
			if (! $head && $matches[1] == 'p') {
				$this->OutputLine();
				if ($align === 'LEFT:') {
					$align = '';
				}
			}
			$line = $align . $matches[2];
		}
		if (preg_match("/(.*)<\/(p|div)>/S", $line, $matches)) {
			if ($matches[1]) {
				$this->OutputLine($head, $matches[1]);
			}
			if (!$head && $matches[2] == 'p') {
				$this->OutputLine();
			}
		}
		else if ($line) {
			if ($p) {
				$this->OutputLine($head, $line);
			} else {
				if ($this->list_level) {
					if ($this->GetDiv() === 'UList') {
						$this->OutputLine(str_repeat('-', $this->list_level));
					} else if ($this->GetDiv() === 'OList') {
						$this->OutputLine(str_repeat('+', $this->list_level));
					}
					$this->OutputLine('', $line);
				}
			}
		}
	}

	// ����饤������
	function Inline($line) {
		// ���ͻ���ʸ��(10��)
		$pattern = "/<span\s[^>]*?class=\"chrref10\"[^>]*?".">(.*?)<\/span>/";
		$line = preg_replace_callback($pattern, array(&$this, 'CharacterRef10'), $line);
		// ʸ�����λ���
		$pattern = "/<span\s[^>]*?class=\"chrref\"[^>]*?".">(.*?)<\/span>/";
		$line = preg_replace_callback($pattern, array(&$this, 'CharacterRef'), $line);

		$line = $this->EncodeSpecialChars($line);
		$line = preg_replace("/\n/", "", $line);

		// ��ʿ��
		if ($this->GetDiv() != 'Heading' && $this->GetDiv() != 'Table') {
			$line = preg_replace("/<hr(\sclass=\"full_hr\")?\s*\/?>/", "\n----\n", $line);
			$line = preg_replace("/<hr\sclass=\"short_line\"\s*\/?>/", "\n#hr\n", $line);
		}
		// �ץ饰����
		$pattern = "/<span\s[^>]*?class=\"(plugin)\".*?>(.*?);<\/span>/";
		$line = preg_replace_callback($pattern, array(&$this, 'InlinePlugin'), $line);
		$pattern = "/<span([^>]*?)class=\"ref\"([^>]*?)>.*?<\/span>/";
		$line = preg_replace_callback($pattern, array(&$this, 'InlinePluginRef'), $line);
		$pattern = "/<img([^>]*?)class=\"ref\"([^>]*?)>/";
		$line = preg_replace_callback($pattern, array(&$this, 'InlinePluginRef'), $line);
		// ���
		$line = preg_replace_callback("/<a .*?href=\"(.*?)\".*?>(.*?)<\/a>/", array(&$this, 'Link'), $line);
		// ���󥫡�
		$line = preg_replace("/<a\sname=\"(.*?)\"><\/a>/", "&aname($1);", $line);
		$line = preg_replace("/<a\sname=\"(.*?)\">(.*?)<\/a>/", "&aname($1){" . "$2" . "};", $line);
		// ��ʸ��
		$line = preg_replace("/^(<img\s.*?alt=\"\[?.*?\]?\".*?>)/", '&amp;nbsp;$1', $line);
		$line = preg_replace("/\s?<img\s.*?alt=\"(\[)?(.*?)(\])?\".*?>/e", '"$1" ? "&$2;" : " $2"', $line);
		// ����
		$line = preg_replace("/<\/?strong>/", "''", $line);
		// ����
		$line = preg_replace("/<\/?em>/", "'''", $line);
		// ����
		$line = preg_replace("/<\/?u>/", "%%%", $line);
		// �����
		$line = preg_replace("/<\/?strike>/", "%%", $line);
		// ���դ���ź����
		$line = preg_replace('#<su(p|b)[^>]*>#', '&su$1{', $line);
		$line = str_replace(array('</sup>', '</sub>'), '};', $line);
		// ʸ������ <span> ������Ҥ򥷥�ץ�ˤ���
		$line = str_replace('</span>', "\x08", $line);
		while(preg_match('/((?:<span style=\".+?\">){2,})([^\08]+?)(\x08{2,})/iS', $line)) {
			$line = preg_replace_callback('/((?:<span style=\"[^\"]+?\">){2,})([^\08]+?)(\x08{2,})/iS', array(&$this, 'SpanSimplify'), $line);
		}
		// ʸ���Υ���������
		while(preg_match('/<span[^>]*?>[^\x08]*\x08/', $line)) {
			$line = preg_replace_callback('/<span([^>]*?)>([^\x08]*)\x08/', array(&$this, 'Font'), $line);
		}
		// ����
		global $line_break;
		$line = preg_replace('#<br[^>]*?class="inline"[^>]*?>#i', '&br;', $line);
		if ($this->GetDiv() == "Heading" || $this->GetDiv() == "Table" || $this->span_level) {
			$line = preg_replace("/<br[^>]*?>|<\/p>\s*<p[^>]*?>/", "&br;", $line);
		}
		else if ($line_break) {
			$line = preg_replace("/<br[^>]*?>(<br[^>]*?>)?/e", '("$1" ? "~" : "") . "\n"', $line);
		}
		else {
			$line = preg_replace("/<br[^>]*?>/", "~\n", $line);
			$line = preg_replace('/ ?&zwnj;/', "\n", $line);
		}

		// ̵�̤ʲ��Ԥ���
		$line = preg_replace("/\n\n+/", "\n", $line);
		$line = preg_replace("/(^\n|\n$)/", "", $line);

		// �����ν���
		$line = strip_tags($line);

		if ($this->GetDiv() == 'Heading' || $this->GetDiv() == 'Table') {
			$line = preg_replace("/\n/", '', $line);
		} else {
			$line = preg_replace("/\s+$/", '', $line);
			$line = preg_replace("/^\s+/m", '', $line);
		}
		$line = $this->DecodeSpecialChars($line);
		return $line;
	}

	// ���
	function Link($matches) {
		$url = $matches[1];
		$alias = $matches[2];
		$alias = preg_replace("/<br[^>]*?>/", '&br;', $alias);
		$alias = preg_replace('/ ?&zwnj;/', '', $alias);
		return "[[" . (($url == $alias) ? '' : "$alias>") . "$url]]";
	}

	// ʸ������ <span> ������Ҥ򥷥�ץ�ˤ���
	function SpanSimplify($matches) {
		$open = substr_count($matches[1], '<span');
		$close = strlen($matches[3]);
		$style = '';
		if (preg_match_all('/style="(.+?)"/i', $matches[1], $styles, PREG_PATTERN_ORDER)) {
			$style = join(';', $styles[1]);
		}
		return '<span style="' . $style . '">' . $matches[2] . str_repeat("\x08", $close - $open + 1);
	}

	// ʸ���Υ���������
	function Font($matches) {
		static $foot_array = array();
		$attribute = $matches[1];
		$body = preg_replace('#<br[^>]*?>#', '&br;', $matches[2]);
		$styles = array();

		// size
		$matches = array();
		if (preg_match("/font-size:\s?((\d+(?:%|px|pt|em))|[a-z\-]+)/", $attribute, $matches)) {
			if ($matches[2]) {
				$styles[] = $matches[2];
			} else {
				switch ($matches[1]) {
					case 'xx-small':	$size = '1'; break;
					case 'x-small':		$size = '2'; break;
					case 'small':		$size = '3'; break;
					case 'medium':		$size = '4'; break;
					case 'large':		$size = '5'; break;
					case 'x-large':		$size = '6'; break;
					case 'xx-large':	$size = '7'; break;
				}
				$ret = 'SIZE(' . $size . '):' . $body;
				if ($this->GetDiv() != 'Heading' && $this->GetDiv() != 'Table') {
					$ret .= "\n";
				}
				return $ret;
			}
		}

		// color & backgroung-color
		$pattern = "/rgb\((\d+),\s(\d+),\s(\d+)\)/e";
		$attribute = preg_replace($pattern, 'sprintf("#%02x%02x%02x", "$1", "$2", "$3")', $attribute);

		$matches = array();
		if (preg_match("/background-color:\s?([#0-9a-z]+)/i", $attribute, $matches)) {
			$bgcolor = $matches[1];
		}
		if (preg_match("/[^-]color:\s?([#0-9a-z]+)/i", $attribute, $matches)) {
			$color = $matches[1];
		}
		if ($color || $bgcolor) {
			$styles[] = $color;
			if ($bgcolor) $styles[] = $bgcolor;
		}

		// Italic
		if (preg_match("/font-style:\s?(italic)/i", $attribute, $matches)) {
			$styles[] = $matches[1];
		}

		// Bold
		if (preg_match("/font-weight:\s?(bold)/i", $attribute, $matches)) {
			$styles[] = $matches[1];
		}

		// text-decoration
		if (preg_match("/text-decoration[^;]*?(?::| )(blink)/i", $attribute, $matches)) {
			$styles[] = $matches[1];
		}
		if (preg_match("/text-decoration[^;]*?(?::| )(underline)/i", $attribute, $matches)) {
			$styles[] = $matches[1];
		}
		if (preg_match("/text-decoration[^;]*?(?::| )(overline)/i", $attribute, $matches)) {
			$styles[] = $matches[1];
		}
		if (preg_match("/text-decoration[^;]*?(?::| )(line-through)/i", $attribute, $matches)) {
			$styles[] = $matches[1];
		}
		if ($styles) {
			return '&font(' . join(',', $styles) . '){' . $body . '};';
		} else {
			return $body;
		}
	}

	// ����饤�󷿥ץ饰����
	function InlinePlugin($matches) {
		static $pattern, $replace;

		if (!isset($pattern)) {
			$rule = array(
				"/&amp;/"	=> "&",
				"/&#123;/"	=> "{",
				"/&#125;;/"	=> "};"
			);
			$pattern = array_keys($rule);
			$replace = array_values($rule);
		}

		return preg_replace($pattern, $replace, $matches[2] . ';');
	}

	function InlinePluginRef($matches) {
		static $pattern, $replace;

		if (!isset($pattern)) {
			$rule = array(
				"/&amp;/"	=> "&",
				"/&#123;/"	=> "{",
				"/&#125;;/"	=> "};"
			);
			$pattern = array_keys($rule);
			$replace = array_values($rule);
		}

		$attr = '';
		if (isset($matches[1])) {
			$attr .= $matches[1];
		}
		if (isset($matches[2])) {
			$attr .= $matches[2];
		}

		if (preg_match('/_source="([^"]+)"/', $attr, $attrs)) {
			return preg_replace($pattern, $replace, $attrs[1]);
		} else {
			return '';
		}
	}

	// ����ʸ��
	function CharacterRef10($matches) {
		$map = array(0, 0x10FFFF, 0, 0xFFFFFF);
		return mb_encode_numericentity(str_replace('&amp;', '&', $matches[1]), $map, 'UTF-8');
	}
	function CharacterRef($matches) {
		return str_replace('&', '&amp;', $matches[1]);
	}

	// �֥�å����Ǥγ���
	function StartDiv($element) {
		array_unshift($this->parent_div, $element);
		array_unshift($this->level_array, $this->div_level);
		$this->div_level = 0;
	}

	// �֥�å����Ǥν�λ
	function EndDiv() {
		$this->last_div = $this->GetDiv();
		array_shift($this->parent_div);
		$this->div_level = array_shift($this->level_array);
		$this->text = '';
	}

	// �ƤΥ֥�å����Ǥ����
	function GetDiv() {
		return $this->parent_div[0];
	}

	// ���Խ���
	function OutputLine($head = '', $line = '', $foot = '') {
		if ($this->SavedOutputLine) {
			$out = $this->SavedOutputLine;
			$this->SavedOutputLine = '';
			$this->OutputLine($out);
		}
		if ($line != '') {
			$line = $this->Inline($line);
		}
		$_h = $head[0];
		if (in_array($_h, array('*', '-', '+', '>')) && $line) {
			$head .= ' ';
		}
		$this->body[] = $head . $line . $foot . "\n";
		$this->text = '';
	}

	// ���ѤʤɤΥ�٥�ϣ��ޤǤʤΤǣ��ʾ�λ��ϣ����֤�
	function GetLevel() {
		return ($this->div_level <= 3) ? $this->div_level : 3;
	}

	// ���󥳡���
	function EncodeSpecialChars($line) {
		static $pattern = array('%%', '\'\'', '[[', ']]');
		static $replace = array('&#037;&#037;', '&#039;&#039;', '&#091;&#091;', '&#093;&#093;');

		if ($this->GetDiv() === 'Table' || $this->GetDiv() === 'DList') {
			$line = str_replace('|', '&#124;', $line);
		}
		return str_replace($pattern, $replace, $line);
	}

	// �ü�� HTML ����ƥ��ƥ���ʸ�����᤹
	function DecodeSpecialChars($line) {
		static $pattern = array('&lt;', '&gt;', '&quot;', '&nbsp;', '&amp;');
		static $replace = array('<', '>', '"', ' ', '&');

		return str_replace($pattern, $replace, $line);
	}
}
