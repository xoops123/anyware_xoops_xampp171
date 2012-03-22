<?php
/**
 * AWK
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
'ARGC' => 2,
'ARGIND' => 2,
'ARGV' => 2,
'BEGIN' => 2,
'CONVFMT' => 2,
'END' => 2,
'ENVIRON' => 2,
'ERRNO' => 2,
'FIELDWIDTHS' => 2,
'FILENAME' => 2,
'FNR' => 2,
'FS' => 2,
'IGNORECASE' => 2,
'NF' => 2,
'NR' => 2,
'OFMT' => 2,
'OFS' => 2,
'ORS' => 2,
'RLENGTH' => 2,
'RS' => 2,
'RSTART' => 2,
'SUBSEP' => 2,
'atan2' => 2,
'break' => 2,
'close' => 2,
'continue' => 2,
'cos' => 2,
'ctime' => 2,
'delete' => 2,
'else' => 2,
'exit' => 2,
'exp' => 2,
'for' => 2,
'gsub' => 2,
'if' => 2,
'index' => 2,
'int' => 2,
'length' => 2,
'log' => 2,
'match' => 2,
'next' => 2,
'print' => 2,
'printf' => 2,
'rand' => 2,
'return' => 2,
'sin' => 2,
'split' => 2,
'sprintf' => 2,
'sqrt' => 2,
'srand' => 2,
'sub' => 2,
'substr' => 2,
'system' => 2,
'time' => 2,
'tolower' => 2,
'toupper' => 2,
'while' => 2,

  );?>