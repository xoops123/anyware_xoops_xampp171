<?php
/**
 * scilab �����������ե�����
 */

// ���������
$switchHash['/']  = $this->cont['PLUGIN_CODE_COMMENT'];    // �����Ȥ� // ������Ԥޤ�
$code_comment = Array(
	'/' => Array(
				 Array('/^\/\//', "\n", 1),
		),
);

$code_css = Array(
  'operator',		// ���ڥ졼���ؿ�
  'identifier',	// ����¾�μ��̻�
  'pragma',		// module, import �� pragma
  'system',		// �������Ȥ߹��ߤ��� __stdcall �Ȥ�
  );

$code_keyword = Array(
  'abort' => 2,
  'clear' => 2,
  'clearglobal' => 2,
  'end' => 2,
  'exit' => 2,
  'global' => 2,
  'mode' => 2,
  'predef' => 2,
  'quit' => 2,
  'resume' => 2,
  'return' => 2,
  'function' => 2,
  'endfunction' => 2,
  'funptr' => 2,
  'null' => 2,
  'iserror' => 2,
  'isglobal' => 2,
  'typename' => 2,
  'debug' => 2,
  'pause' => 2,
  'what' => 2,
  'where' => 2,
  'whereami' => 2,
  'whereis' => 2,
  'who' => 2,
  'whos' => 2,
  'for' => 2,
  'while' => 2,
  'break' => 2,
  'if' => 2,
  'then' => 2,
  'else' => 2,
  'elseif' => 2,
  'select' => 2,
  'case' => 2,
  );?>