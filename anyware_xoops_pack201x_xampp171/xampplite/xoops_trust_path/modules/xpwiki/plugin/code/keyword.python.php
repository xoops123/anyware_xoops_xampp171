<?php
/**
 * Python
 */

$switchHash['$'] = $this->cont['PLUGIN_CODE_ESCAPE'];            // $ �ϥ���������
$switchHash['\''] = $this->cont['PLUGIN_CODE_NONESCAPE_LITERAL']; // ' �ϥ��������פ��ʤ�ʸ�����ƥ��

// ���������
$switchHash['#'] = $this->cont['PLUGIN_CODE_COMMENT'];	// �����Ȥ� # ������Ԥޤ� (�㳰����)
$code_comment = Array(
	'#' => Array(
				 Array('/^#[^{]/', "\n", 1),
	)
);

$code_css = Array(
  'operator',		// ���ڥ졼���ؿ�
  'identifier',	// ����¾�μ��̻�
  'pragma',		// module, import �� pragma
  'system',		// �������Ȥ߹��ߤ��� __stdcall �Ȥ�
  );

$code_keyword = Array(
  //'operator',		// ���ڥ졼���ؿ�
  //'identifier',	// ����¾�μ��̻�
    'access' => 2,
    'and' => 2,
    'break' => 2,
    'class' => 2,
    'continue' => 2,
    'def' => 2,
    'del' => 2,
    'elif' => 2,
    'else' => 2,
    'expect' => 2,
    'exec' => 2,
    'finally' => 2,
    'for' => 2,
    'form' => 2,
    'global' => 2,
    'if' => 2,
    'import' => 2,
    'in' => 2,
    'is' => 2,
    'lambda' => 2,
    'not' => 2,
    'or' => 2,
    'pass' => 2,
    'print' => 2,
    'raise' => 2,
    'return' => 2,
    'try' => 2,
    'while' => 2,
  //'pragma',		// module, import �� pragma
  //'system',		// �������Ȥ߹��ߤ��� __stdcall �Ȥ�
  );?>