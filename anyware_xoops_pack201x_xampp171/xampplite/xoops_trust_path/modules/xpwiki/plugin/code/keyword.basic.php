<?php
/**
 * BASIC
 */

$mkoutline = $option['outline'] = 0; // �����ȥ饤��⡼���Բ� 
$capital = 1;                      // ͽ������ʸ����ʸ������̤��ʤ�

// ���������
$switchHash['\''] = $this->cont['PLUGIN_CODE_COMMENT'];        // �����Ȥ� ' ������Ԥޤ�
$switchHash['r'] = $this->cont['PLUGIN_CODE_COMMENT_WORD'];   // �����Ȥ� REM ������Ԥޤ�
$switchHash['R'] = $this->cont['PLUGIN_CODE_COMMENT_WORD'];
$code_comment = Array(
	'\'' => Array(
				 Array('/^\'/', "\n", 1),
	    ),
	'r' => Array(
				 Array('/^rem\s/i', "\n", 1),
		),
	'R' => Array(
				 Array('/^rem\s/i', "\n", 1),
		),
);

$code_css = Array(
  'operator',		// ���ڥ졼���ؿ�
  'identifier',	// ����¾�μ��̻�
  'pragma',		// module, import �� pragma
  'system',		// �������Ȥ߹��ߤ��� __stdcall �Ȥ�
  );

$code_keyword = Array(
'beep' => 2,
'call' => 2,
'chain' => 2,
'circle' => 2,
'close' => 2,
'com' => 2,
'const' => 2,
'declare' => 2,
'defdbl' => 2,
'deflng' => 2,
'defstr' => 2,
'do' => 2,
'draw' => 2,
'environ' => 2,
'error' => 2,
'field' => 2,
'for' => 2,
'function' => 2,
'gosub' => 2,
'if' => 2,
'then' => 2,
'else' => 2,
'next' => 2,
'end' => 2,
'input' => 2,
'ioctl' => 2,
'kill' => 2,
'line' => 2,
'lock' => 2,
'lprint' => 2,
'lset' => 2,
'name' => 2,
'error' => 2,
'option' => 2,
'out' => 2,
'palette' => 2,
'pen' => 2,
'pmap' => 2,
'preset' => 2,
'print#' => 2,
'pset' => 2,
'randomize' => 2,
'redim' => 2,
'restore' => 2,
'return' => 2,
'rset' => 2,
'seek' => 2,
'case' => 2,
'shell' => 2,
'sound' => 2,
'stop' => 2,
'sub' => 2,
'system' => 2,
'troff' => 2,
'type' => 2,
'view' => 2,
'while' => 2,
'width' => 2,
'write' => 2,

'abs' => 2,
'atn' => 2,
'cint' => 2,
'sin' => 2,
'cos' => 2,
'tan' => 2,
'csrlin' => 2,
'cvdmbf' => 2,
'cvl' => 2,
'cvsmbf' => 2,
'erdev' => 2,
'err' => 2,
'fileattr' => 2,
'fre' => 2,
'inp' => 2,
'int' => 2,
'len' => 2,
'lof' => 2,
'lpos' => 2,
'pen' => 2,
'pos' => 2,
'sadd' => 2,
'seek' => 2,
'sgn' => 2,
'spc' => 2,
'stick' => 2,
'tab' => 2,
'ubound' => 2,
'valptr' => 2,
'varptr' => 2,
'chr' => 2,
'date' => 2,
'erdev' => 2,
'inkey' => 2,
'ioctl' => 2,
'laft' => 2,
'mid' => 2,
'mkd' => 2,
'mkl' => 2,
'mks' => 2,
'right' => 2,
'space' => 2,
'string' => 2,
'ucase' => 2,
'paint' => 2,
'cls' => 2,

  );?>