<?php
/**
 * Pascal
 */

$capital = 1;                        // ͽ������ʸ����ʸ������̤��ʤ�
$switchHash['\''] = $this->cont['PLUGIN_CODE_NONESCAPE_LITERAL'];

$switchHash['('] = $this->cont['PLUGIN_CODE_COMMENT'];       // �����Ȥ� (* ���� *) �ޤ�
$switchHash['{'] = $this->cont['PLUGIN_CODE_COMMENT'];       // �����Ȥ� { ���� } �ޤ�
$code_comment = Array(
	'(' => Array(
				 Array('/^\(\*/', '*)', 2),
		),
	'{' => Array(
				 Array('/^{/', '}', 1),
		),
);


$outline_def = Array(
					 'begin' => Array('end', 1),
					 );


$code_css = array(
  'operator',		// ���ڥ졼���ؿ�
  'identifier',	// ����¾�μ��̻�
  'pragma',		// module, import �� pragma
  'system',		// �������Ȥ߹��ߤ��� __stdcall �Ȥ�
  );

$code_keyword = array(
  //'operator',		// ���ڥ졼���ؿ�
  //'identifier',	// ����¾�μ��̻�
'absolute'  => 2,
'abstract'  => 2,
'all'  => 2,
'and'  => 2,
'and_then'  => 2,
'array'  => 2,
'asm'  => 2,
'begin'  => 2,
'bindable'  => 2,
'case'  => 2,
'const'  => 2,
'constructor'  => 2,
'destructor'  => 2,
'div'  => 2,
'do'  => 2,
'downto'  => 2,
'else'  => 2,
'end'  => 2,
'export'  => 2,
'file'  => 2,
'for'  => 2,
'function'  => 2,
'goto'  => 2,
'if'  => 2,
'implementation'  => 2,
'import'  => 2,
'in'  => 2,
'inherited'  => 2,
'inline'  => 2,
'interface'  => 2,
'is'  => 2,
'label'  => 2,
'mod'  => 2,
'module'  => 2,
'nil'  => 2,
'not'  => 2,
'object'  => 2,
'of'  => 2,
'only'  => 2,
'operator'  => 2,
'or'  => 2,
'or_else'  => 2,
'otherwise'  => 2,
'packed'  => 2,
'pow'  => 2,
'procedure'  => 2,
'program'  => 2,
'property'  => 2,
'protected'  => 2,
'qualified'  => 2,
'record'  => 2,
'repeat'  => 2,
'restricted'  => 2,
'set'  => 2,
'shl'  => 2,
'shr'  => 2,
'then'  => 2,
'to'  => 2,
'type'  => 2,
'unit'  => 2,
'until'  => 2,
'uses'  => 2,
'value'  => 2,
'var'  => 2,
'view'  => 2,
'virtual'  => 2,
'while'  => 2,
'with'  => 2,
'xor' => 2,
  //'pragma',		// module, import �� pragma
  //'system',		// �������Ȥ߹��ߤ��� __stdcall �Ȥ�
  );?>