<?php
/**
 * GNU Assembler
 * �����������ե�����
 */
 
$switchHash['.'] = $this->cont['PLUGIN_CODE_SPECIAL_IDENTIFIRE'];  // . ����Ϥޤ�ͽ��줢��

// ���������
$switchHash[';'] = $this->cont['PLUGIN_CODE_COMMENT'];        //  �����Ȥ� ;  ������Ԥޤ�
$code_comment = Array(
	'/' => Array(
				 Array('/^;/', "\n", 1),
	)
);

$code_css = Array(
  'operator',		// ���ڥ졼���ؿ�
  'identifier',	// ����¾�μ��̻�
  'pragma',		// module, import �� pragma
  'system',		// �������Ȥ߹��ߤ��� __stdcall �Ȥ�
);

$code_keyword = Array(
  '.long'  => 4,
  '.ascii'  => 4,
  '.asciz'  => 4,
  '.byte'  => 4,
  '.double'  => 4,
  '.float'  => 4,
  '.hword'  => 4,
  '.int'  => 4,
  '.octa'  => 4,
  '.quad'  => 4,
  '.short'  => 4,
  '.single'  => 4,
  '.space'  => 4,
  '.string'  => 4,
  '.word'  => 4,
  '.include'  => 4,
  '.if'  => 4,
  '.else'  => 4,
  '.endif'  => 4,
  '.macro'  => 4,
  '.endm'  => 4,


  );?>