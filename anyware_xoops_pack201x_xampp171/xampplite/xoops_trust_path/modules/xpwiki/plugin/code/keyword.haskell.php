<?php
/**
 * Haskell �����������ե�����
 */


// ���������
$switchHash['-'] = $this->cont['PLUGIN_CODE_COMMENT'];    //  �����Ȥ� -- ���� ���Ԥޤ� -->�ϴޤޤʤ���
$switchHash['{'] = $this->cont['PLUGIN_CODE_COMMENT'];    //  �����Ȥ� {- ���� -}�ޤ�
$code_comment = Array(
	'-' => Array(
				 Array('/^--[^>]/', "\n", 1),
	),
	'{' => Array(
				 Array('/^{-/', '-}', 2),
	),
);

$code_css = Array(
  'operator',		// ���ڥ졼���ؿ�
  'identifier',	// ����¾�μ��̻�
  'pragma',		// module, import �� pragma
  'system',		// �������Ȥ߹��ߤ��� __stdcall �Ȥ�
  );

$code_keyword = Array(
'bool'=>1,
'case'=>1,
'catch'=>1,
'class'=>1,
'data'=>1,
'do'=>1,
'else'=>1,
'error'=>1,
'false'=>1,
'if'=>1,
'in'=>1,
'infixl'=>1,
'instance'=>1,
'let'=>1,
'main'=>1,
'of'=>1,
'return'=>1,
'then'=>1,
'type'=>1,
'where'=>1,

'Char'=>2,
'Bool'=>2,
'Branch'=>2,
'False'=>2,
'Float'=>2,
'Integer'=>2,
'Leaf'=>2,
'Tree'=>2,
'True'=>2,

'as'=>3,
'hiding'=>3,
'import'=>3,
'module'=>3,
'qualified'=>3,

  );?>