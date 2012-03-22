<?php
/**
 * TeX �����������ե�����
 */

$switchHash['$']  = $this->cont['PLUGIN_CODE_FORMULA'];  // Tex�Ǥ�$�Ͽ����˻��Ѥ���
$switchHash['\\'] = $this->cont['PLUGIN_CODE_SPECIAL_IDENTIFIRE'];  // Tex�Ǥ�\��ͽ���˻��Ѥ���

// ���������
$switchHash['%']  = $this->cont['PLUGIN_CODE_COMMENT'];    // �����Ȥ� % ������Ԥޤ�
$code_comment = Array(
	'%' => Array(
				 Array('/^%/', "\n", 1),
	)
);


$outline_def = Array(
					 '\begin' => Array('\end', 1),
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
  'document' => 2,
  'abstract' => 2,
  'thebibliography' => 2,
  'itemize' => 2,
  'enumerate' => 2,
  'description' => 2,
  'center' => 2,
  'flushright' => 2,
  'flushleft' => 2,
  'quote' => 2,
  'quotation' => 2,
  'verbatim' => 2,
  'displaymath' => 2,
  'equation' => 2,
  'eqnarray' => 2,
  'array' => 2,
  'gather' => 2,
  'cases' => 2,
  'align' => 2,
  'alignat' => 2,
  'split' => 2,
  'picture' => 2,
  'figure' => 2,
  'table' => 2,
  'tabular' => 2,
  'tabbing' => 2,
  'minipage' => 2,
  //'pragma',		// module, import �� pragma
  //'system',		// �������Ȥ߹��ߤ��� __stdcall �Ȥ�
  '\documentstyle' => 4,
  '\documentclass' => 4,
  '\usepackage' => 4,
  '\title' => 4,
  '\author' => 4,
  '\date' => 4,
  '\maketitle' => 4,
  '\input' => 4,
  '\include' => 4,
  '\includeonly' => 4,
  '\begin' => 4,
  '\end' => 4,
  '\caption' => 4,
  '\label' => 4,
  '\ref' => 4,
  '\pageref' => 4,
  '\bibitem' => 4,
  '\cite' => 4,
  '\footnote' => 4,
  '\marginpar' => 4,
  '\item' => 4,
  '\part' => 4,
  '\chapter' => 4,
  '\section' => 4,
  '\subsection' => 4,
  '\subsubsection' => 4,
  '\appendix' => 4,
  '\par' => 4,
  '\noindent' => 4,
  '\newpage' => 4,
  '\clearpage' => 4,
  '\textrm' => 4,
  '\textsf' => 4,
  '\texttt' => 4,
  '\textmd' => 4,
  '\textbf' => 4,
  '\textit' => 4,
  '\textsl' => 4,
  '\textsc' => 4,
  '\textmc' => 4,
  '\textgt' => 4,
  '\rm' => 4,
  '\sf' => 4,
  '\tt' => 4,
  '\bf' => 4,
  '\it' => 4,
  '\sl' => 4,
  '\sc' => 4,
  '\mc' => 4,
  '\gt' => 4,
  '\tiny' => 4,
  '\scriptsize' => 4,
  '\footnotesize' => 4,
  '\small' => 4,
  '\normalsize' => 4,
  '\large' => 4,
  '\Large' => 4,
  '\LARGE' => 4,
  '\huge' => 4,
  '\Huge' => 4,
  );?>