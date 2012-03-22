<?php
// PukiWiki - Yet another WikiWikiWeb clone.
// $Id: rules.ini.php,v 1.2 2007/11/30 05:04:22 nao-pon Exp $
// Copyright (C)
//   2003-2005 PukiWiki Developers Team
//   2001-2002 Originally written by yu-ji
// License: GPL v2 or (at your option) any later version
//
// PukiWiki setting file

/////////////////////////////////////////////////
// �����ִ��롼�� (���������ִ�)
// $usedatetime = 1�ʤ������ִ��롼�뤬Ŭ�Ѥ���ޤ�
// ɬ�פΤʤ����� $usedatetime��0�ˤ��Ƥ���������
$root->datetime_rules = array(
	'&amp;_now;'	=> $this->format_date($root->c['UTIME']),
	'&amp;_date;'	=> $this->get_date($root->date_format),
	'&amp;_time;'	=> $this->get_date($root->time_format),
);

/////////////////////////////////////////////////
// �桼������롼��(��¸�����ִ�)
//  ����ɽ���ǵ��Ҥ��Ƥ���������?(){}-*./+\$^|�ʤ�
//  �� \? �Τ褦�˥������Ȥ��Ƥ���������
//  �����ɬ�� / ��ޤ�Ƥ�����������Ƭ����� ^ ��Ƭ�ˡ�
//  ��������� $ ����ˡ�
//

// BugTrack2/106: Only variables can be passed by reference from PHP 5.0.5
$page_array = explode('/', $root->vars['page']); // with array_pop()

$root->str_rules = array(
	'now\?' 	=> $this->format_date($root->c['UTIME']),
	'date\?'	=> $this->get_date($root->date_format),
	'time\?'	=> $this->get_date($root->time_format),
	'&now;' 	=> $this->format_date($root->c['UTIME']),
	'&date;'	=> $this->get_date($root->date_format),
	'&time;'	=> $this->get_date($root->time_format),
	'&page;'	=> array_pop($page_array),
	'&fpage;'	=> $root->vars['page'],
	'&t;'   	=> "\t",
	'&ua;'      => htmlspecialchars($root->ua),
);

unset($page_array);

?>
