<?php
/**
 * $this->JSP (Java Server Pages)
 */

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

  'contained' => 2,
  'include' => 2,
  'forward' => 2,
  'getProperty' => 2,
  'plugin' => 2,
  'setProperty' => 2,
  'useBean' => 2,
  'param' => 2,
  'params' => 2,
  'fallback' => 2,
  'contained' => 2,
  'id' => 2,
  'scope' => 2,
  'class' => 2,
  'type' => 2,
  'beanName' => 2,
  'page' => 2,
  'flush' => 2,
  'name' => 2,
  'value' => 2,
  'property' => 2,
  'contained' => 2,
  'code' => 2,
  'codebase' => 2,
  'name' => 2,
  'archive' => 2,
  'align' => 2,
  'height' => 2,
  'contained' => 2,
  'width' => 2,
  'hspace' => 2,
  'vspace' => 2,
  'jreversion' => 2,
  'nspluginurl' => 2,
  'iepluginurl' => 2,

  );?>