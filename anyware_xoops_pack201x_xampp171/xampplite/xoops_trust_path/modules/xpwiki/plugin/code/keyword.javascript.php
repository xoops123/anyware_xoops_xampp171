<?php
/**
 * Java Script
 */

$switchHash['\''] = $this->cont['PLUGIN_CODE_STRING_LITERAL'];
// ���������
$switchHash['/'] = $this->cont['PLUGIN_CODE_COMMENT'];        //  �����Ȥ� /* ���� */ �ޤǤ� // ������Ԥޤ�
$code_comment = Array(
	'/' => Array(
				 Array('/^\/\*/', '*/', 2),
				 Array('/^\/\//', "\n", 1),
	)
);

// �����ȥ饤����
if($mkoutline){
  $switchHash['{'] = $this->cont['PLUGIN_CODE_BLOCK_START'];
  $switchHash['}'] = $this->cont['PLUGIN_CODE_BLOCK_END'];
}

$code_css = Array(
  'operator',		// ���ڥ졼���ؿ�
  'identifier',	// ����¾�μ��̻�
  'pragma',		// module, import �� pragma
  'system',		// �������Ȥ߹��ߤ��� __stdcall �Ȥ�
);

$code_keyword = Array(
  'if'  => 2,
  'else'  => 2,
  'while'  => 2,
  'for'  => 2,
  'break'  => 2,
  'continue'  => 2,
  'switch'  => 2,
  'case'  => 2,
  'default'  => 2,
  'new'  => 2,
  'in'  => 2,
  'this'  => 2,
  'var'  => 2,
  'const'  => 2,
  'return'  => 2,
  'with'  => 2,
  'true'  => 2,
  'false'  => 2,
  'function'  => 2,

  );?>