<?php
/**
 * diff �����������ե�����
 * �Իظ��⡼����
 */

$switchHash['!'] = $this->cont['PLUGIN_CODE_IDENTIFIRE_CHAR'];   // changed
$switchHash['|'] = $this->cont['PLUGIN_CODE_IDENTIFIRE_CHAR'];   // changed
$switchHash['+'] = $this->cont['PLUGIN_CODE_IDENTIFIRE_WORD'];   // added
$switchHash['>'] = $this->cont['PLUGIN_CODE_IDENTIFIRE_CHAR'];   // added
$switchHash[')'] = $this->cont['PLUGIN_CODE_IDENTIFIRE_CHAR'];   // added
$switchHash['-'] = $this->cont['PLUGIN_CODE_IDENTIFIRE_WORD'];   // removed
$switchHash['<'] = $this->cont['PLUGIN_CODE_IDENTIFIRE_CHAR'];   // removed
$switchHash['('] = $this->cont['PLUGIN_CODE_IDENTIFIRE_CHAR'];   // removed
$switchHash['*'] = $this->cont['PLUGIN_CODE_IDENTIFIRE_CHAR'];   // control
$switchHash['\\']= $this->cont['PLUGIN_CODE_IDENTIFIRE_CHAR'];   // control
$switchHash['@'] = $this->cont['PLUGIN_CODE_IDENTIFIRE_CHAR'];   // control

$mkoutline = $option['outline'] = 0; // �����ȥ饤��⡼���Բ� 
$linemode = 1; // �������Ϥ��ʤ�

// 
$code_identifire = array(
	 '-' => Array(
		  '---',
		 ),
	 '+' => Array(
		  '+++',
		 ),
	 );


// ���������
$switchHash['#'] = $this->cont['PLUGIN_CODE_COMMENT'];	// �����Ȥ� # ������Ԥޤ�

$code_css = Array(
					   'changed', //
					   'added',   //
					   'removed', //

					   'system', //
);

$code_keyword = Array(
						   '!' => 1,
						   '|' => 1,

						   '+' => 2,
						   '>' => 2,
						   ')' => 2,
						   '/' => 2,

						   '-' => 3,
						   '<' => 3,
						   '(' => 3,
						   '\\' => 3,

						   '*' => 4,
						   '\\' => 4,
						   '@' => 4,
						   '---' => 4,
						   '+++' => 4,
);?>