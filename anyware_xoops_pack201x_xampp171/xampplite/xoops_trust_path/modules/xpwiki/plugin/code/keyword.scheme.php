<?php
/**
 * Scheme
 */

$switchHash['\'']  = $this->cont['PLUGIN_CODE_CHARACTOR'];        // Lisp Scheme �� ' ʸ����ƥ��ǤϤʤ�

// ���������
$switchHash[';']  = $this->cont['PLUGIN_CODE_COMMENT'];  // �����Ȥ� ; ������Ԥޤ�
$code_comment = Array(
	';' => Array(
				 Array('/^;/', "\n", 1),
	)
);

// �����ȥ饤����
if($mkoutline){
  $switchHash['('] = $this->cont['PLUGIN_CODE_BLOCK_START'];
  $switchHash[')'] = $this->cont['PLUGIN_CODE_BLOCK_END'];
}

$code_css = Array(
  'operator',		// ���ڥ졼���ؿ�
  'identifier',	// ����¾�μ��̻�
  'pragma',		// module, import �� pragma
  'system',		// �������Ȥ߹��ߤ��� __stdcall �Ȥ�
  );

$code_keyword = Array(
'and' => 2,
'begin' => 2,
'call-with-current-continuation' => 2,
'call-with-input-file' => 2,
'call-with-output-file' => 2,
'call/cc' => 2,
'case' => 2,
'cond' => 2,
'define' => 2,
'delay' => 2,
'do' => 2,
'else' => 2,
'for-each' => 2,
'if' => 2,
'lambda' => 2,
'let' => 2,
'let*' => 2,
'let-syntax' => 2,
'letrec' => 2,
'letrec-syntax'	 => 2,
'map' => 2,
'or' => 2,
'syntax' => 2,
'syntax-rules' => 2,
  );?>