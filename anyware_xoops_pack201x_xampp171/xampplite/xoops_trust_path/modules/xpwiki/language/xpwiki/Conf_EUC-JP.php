<?php
/*
 * Created on 2007/10/11 by nao-pon http://hypweb.net/
 * $Id: Conf_EUC-JP.php,v 1.2 2011/07/29 01:37:52 nao-pon Exp $
 */

// Encoding hint
$_LANG['encode_hint'] = '��';

// Accept language
$const['ACCEPT_UILANG'] = 'ja,en';

// �ڡ���̾�������������� ���ѤǤ��ʤ�ʸ�� [ ] < > # & " :
$root->pagename_illegality = array('[',  ']',  '<',  '>',  '#',  '&',  '"',  ':');
$root->pagename_normalizer = array('��', '��', '��', '��', '��', '��', '��', '��');
