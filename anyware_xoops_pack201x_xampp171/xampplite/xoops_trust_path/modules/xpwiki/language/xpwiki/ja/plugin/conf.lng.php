<?php
/*
 * Created on 2008/01/24 by nao-pon http://hypweb.net/
 * $Id: conf.lng.php,v 1.19 2012/01/14 11:56:35 nao-pon Exp $
 */

$msg = array(
	'title_form' => 'xpWiki �Ķ�����',
	'title_done' => 'xpWiki �Ķ����괰λ',
	'btn_submit' => '���������Ŭ�Ѥ���',
	'msg_done' => '�ʲ������Ƥǡ�$cache_file ����¸���ޤ�����',
	'title_description' => '�Ķ����������',
	'msg_description' => '<p>���δĶ�����Ǥϡ�pukiwiki.ini.php ��������ܤǡ���ɽŪ�ʹ��ܤΤߤ����ꤹ�뤳�Ȥ��Ǥ��ޤ���</p>'
	                   . '<p>$trust_ini_file �ˤϡ����Τۤ��ˤ��¿����������ܤ�����ޤ���</p>'
	                   . '<p>����������̤ˤʤ�������ܤ��ѹ����������ϡ�$html_ini_file �ˡ������ι��ܤ�ȴ���Ф�������򤷤Ƥ���������</p>'
	                   . '<p>�� ����������̤��������Ƥ���ͥ���Ŭ�Ѥ���ޤ���</p>',

	'Yes' => '�Ϥ�',
	'No' => '������',

	'PKWK_READONLY' => array(
		'caption'     => '�ɤ߼�����Ѥˤ���',
		'description' => '�ɤ߼�����Ѥˤ���ȡ������Ԥ�ޤ�ï���Խ����뤳�Ȥ��Ǥ��ޤ���',
	),

	'function_freeze' => array(
		'caption'     => '��뵡ǽ��ͭ���ˤ���',
		'description' => '',
	),

	'adminpass' => array(
		'caption'     => '�����ԥѥ����',
		'description' => '���ꥢ�ƥ����ȤǤ����Ǥ��ޤ�����<a href="?cmd=md5" target="_blank">cmd=md5</a> ��Ȥ��Ź沽����ʸ��������Ϥ��Ƥ���������<br />'
		               . 'XOOPS�Ķ����Ǥϡ������ԤȤ��ƥ����󤹤�С������ԥѥ���ɤ�ɬ�פʤ�����"{x-php-md5}!"�Ȥ��Ƥ��٤�ǧ���ԲĤȤ��Ƥ����ꤢ��ޤ���',
	),

	'html_head_title' => array(
		'caption'     => '&lt;head&gt;���&lt;title&gt;����',
		'description' => 'HTML �� &lt;head&gt; �� &lt;title&gt;������ɽ���������Ƥ����ꤷ�ޤ���<br />'
		               . '<b>$page_title</b>: �ڡ���̾, <b>$content_title</b>: �ڡ��������ȥ�, <b>$module_title</b>:�⥸�塼��̾ ���ִ�����ޤ���',
	),

	'modifier' => array(
		'caption'     => '������̾',
		'description' => '',
	),

	'modifierlink' => array(
		'caption'     => '�����ԤΥ�����URL',
		'description' => '',
	),

	'notify' => array(
		'caption'     => '�ڡ����������᡼�����Τ���',
		'description' => '�ڡ������������줿�顢�����Ԥ˥᡼�����Τ��ޤ���',
	),

	'notify_diff_only' => array(
		'caption'     => '�᡼�����ΤϺ�ʬ�Τ�',
		'description' => '�ڡ����������Υ᡼�����Τϡ��ѹ���ʬ�Τ��������ޤ����֤������פ����򤹤����ʸ��������ޤ���',
	),

	'defaultpage' => array(
		'caption'     => '�ǥե���ȥڡ���',
		'description' => '�ڡ�������ꤷ�ʤ�����ɽ�������ڡ������ȥåץڡ����Ǥ���',
	),

	'page_case_insensitive' => array(
		'caption'     => '�ڡ���̾�ξ�ʸ������ʸ������̤��ʤ�',
		'description' => '�ڡ���̾���⡢�ѻ�(����ե��٥å�)����ʸ������ʸ������̤��ޤ���',
	),

	'SKIN_NAME' => array(
		'caption'     => '�ǥե���ȤΥ�����̾',
		'description' => '�ǥե���ȤΥ�����̾����ꤷ�ޤ���',
		'normalskin'  => '�̾�Υ�����',
		'tdiarytheme' => 't-Diary�Υơ���',
	),

	'skin_navigator_cmds' => array(
		'caption'     => '�������ɽ�������˥塼',
		'description' => '�������ɽ���ĤȤ����˥塼�Υ��ޥ��̾�򥫥��(,)���ڤ�����Ϥ��ޤ���<br />'
	                   . '���٤ƤΥ�˥塼��ɽ���ĤȤ������ all �����Ϥ��ޤ���<br />'
	                   . '" add, atom, attaches, back, backup, copy, diff, edit, filelist, freeze, help, list, new, newsub, pginfo, print, rdf, recent, refer, related, reload, rename, rss, rss10, rss20, search, top, topage, trackback, unfreeze, upload " ������Ǥ��ޤ�����ɽ������뤫�ݤ��ϥ�����ˤ�꺸������ޤ���' ,
	),

	'skin_navigator_disabled' => array(
		'caption'     => '�������ɽ�����ʤ���˥塼',
		'description' => '�������ɽ���ԲĤȤ����˥塼�Υ��ޥ��̾�򥫥��(,)���ڤ�����Ϥ��ޤ���<br />'
	                   . '�����ǽ�ʥ��ޥ�ɤϡ֥������ɽ�������˥塼�פ�Ʊ���Ǥ���' ,
	),

	'SKIN_CHANGER' => array(
		'caption'     => '��������ѹ�����Ĥ���',
		'description' => '�֤Ϥ��פ����򤹤�ȥ桼�����������������Ǥ���褦�ˤʤ�ޤ���<br />'
		               . '�ޤ���tdiary �ץ饰����ʤɤ�Ȥ��ڡ�����ǻ��ꤹ�뤳�Ȥ��ǽ�ˤʤ�ޤ���',
	),

	'referer' => array(
		'caption'     => '���ȸ��򽸷פ���',
		'description' => '�����Ԥ��ɤ�����ڡ�����ˬ�줿����ڡ�����˽��פ��뵡ǽ�Ǥ���',
	),

	'allow_pagecomment' => array(
		'caption'     => '�ڡ��������ȵ�ǽ��ͭ���ˤ���',
		'description' => 'd3forum �⥸�塼��Υ����������Ȥ��ڡ�����˥����ȵ�ǽ��������뤳�Ȥ��Ǥ��ޤ���<br />'
		               . '�ºݤ˻��Ѥ���ˤϡ���������ǥ��������������򤹤�ɬ�פ�����ޤ���',
	),

	'use_root_image_manager' => array(
		'caption'     => '���᡼���ޥ͡����㡼����Ѥ���',
		'description' => '������ɸ��Υ��᡼���ޥ͡����㡼�����Ѥ������������Ǥ���褦�ˤ��ޤ���',
	),

	'use_title_make_search' => array(
		'caption'     => '�ڡ��������ȥ����Ѥ���',
		'description' => '����ƥ�ĤΥ����ȥ���ʬ��ɽ����ڡ���̾����ڡ��������ȥ���ѹ����ޤ���',
	),

	'nowikiname' => array(
		'caption'     => 'WikiName ��̵���ˤ���',
		'description' => 'WikiName �ؤμ�ư��󥯵�ǽ��̵���ˤ��ޤ���',
	),

	'relative_path_bracketname' => array(
		'caption'     => '�֥饱�åȥ͡�������Хѥ�',
		'description' => '�֥饱�åȥ͡���ˤ����Хѥ��ǥڡ���̾����ꤷ���������Хѥ���ʬ��ɽ����ˡ�����ꤷ�ޤ���',
		'remove'      => '������',
		'full'        => '�ե�ѥ����Ѵ�',
		'as is'       => '���Τޤ�',
	),

	'pagename_num2str' => array(
		'caption'     => '�ڡ���̾�ζ���ɽ���򤹤�',
		'description' => '���ذʾ�Υڡ���̾�Ǻǽ�������ʬ����������-(�ϥ��ե�)�ǹ�������Ƥ�����ˤ�����ʬ��ڡ��������ȥ���ִ�����ɽ�����ޤ���',
	),

	'pagelink_topicpath' => array(
		'caption'     => '�ڡ�����󥯤�ѥ󤯤��ꥹ�Ȥˤ���',
		'description' => '�����ȥ�󥯡��֥饱�åȥ�󥯤�����ڡ������(#recent, #ls2 �ʤ�)��ѥ󤯤��ꥹ��(Topic path)������ɽ�����ޤ���',
	),

	'static_url' => array(
		'caption'     => '�ڡ���URL�η���',
		'description' => '�ڡ���URL�η��������򤷤ޤ���"?[PAGE]" �ʳ������򤹤����Ū�ʥڡ�����URL�Τ褦�˿��񤤤ޤ���<br />'
		               . '�������������ˤ�äƤ� .htaccess �ˤưʲ��ε��Ҥ�ͭ���ˤ���ɬ�פ�����ޤ���<br />'
		               . '<dl><dt>[ID].html</dt><dd><code>RewriteEngine on<br />RewriteRule ^([0-9]+)\.html$ index.php?pgid=$1 [qsappend,L]</code></dd></dl>'
		               . '<dl><dt>{$root->path_info_script}/[PAGE]</dt><dd><code>Options +MultiViews<br />&lt;FilesMatch "^{$root->path_info_script}$"&gt;<br />ForceType application/x-httpd-php<br />&lt;/FilesMatch&gt;</code></dd></dl>',
	),

	'url_encode_utf8' => array(
		'caption'     => '�ڡ���URL�� UTF-8 �ˤ���',
		'description' => '�嵭 "�ڡ���URL�η���" �� "[PAGE]" ��ʬ�� "UTF-8" �ǥ��󥳡��ɤ��ޤ���<br />'
		               . '��������xpWiki ��ʸ�����󥳡��ǥ��󥰤� UTF-8 �ξ��ϡ���� "UTF-8" �Ȥʤ�ޤ���',
	),

	'link_target' => array(
		'caption'     => '������󥯤� target °��',
		'description' => '',
	),

	'class_extlink' => array(
		'caption'     => '������󥯤� class °��',
		'description' => '',
	),

	'nofollow_extlink' => array(
		'caption'     => '������󥯤� nofollow °����Ĥ���',
		'description' => '',
	),

	'LC_CTYPE' => array(
		'caption'     => '������(LC_CTYPE)',
		'description' => 'ʸ����ʬ����Ѵ��ѤΥ���������ꤷ�ޤ��������ȥ�󥯤ʤ�����ɽ���ǽ���������˴��Ԥ�����̤ˤʤ�ʤ����ϡ��Ķ��˹�碌�����ꤷ�Ƥ���������',
	),

	'autolink' => array(
		'caption'     => '�����ȥ��ͭ���ڡ���̾�Х��ȿ�',
		'description' => '�����ȥ�󥯤Ȥϡ�¸�ߤ���ڡ���̾�˼�ưŪ�˥�󥯤򤹤뵡ǽ�Ǥ���<br />'
		               . 'ͭ���ˤʤ�ڡ����Х��ȿ������Ϥ��ޤ���(0 ��̵��)<br />'
		               . 'ʸ�����ǤϤʤ��Х��ȿ�����Ȥʤ�ޤ��Τǡ�����դ���������',
		'extention'   => '�Х���',
	),

	'autolink_omissible_upper' => array(
		'caption'     => '�峬�ؤ��ά���������ȥ��',
		'description' => '�峬�ؤ��ά���Ƥ⥪���ȥ�󥯤�������Ǥ��������ȥ�󥯤�ͭ���ˤʤäƤ���ɬ�פ�����ޤ���<br />'
		               . '/hoge/hoge �Ȥ����ڡ����� fuga �Ƚ񤯤��Ȥ� /hoge/fuga �˥����ȥ�󥯤��ޤ���<br />'
		               . '�����ȥ�󥯤�Ʊ�͡��Х��ȿ�����Ȥʤ�ޤ���(fuga ����������Х��ȿ��ǻ���)',
		'extention'   => '�Х���',
	),

	'autoalias' => array(
		'caption'     => '�����ȥ����ꥢ��ͭ���Х��ȿ�',
		'description' => '�ֻ��ꤷ��ñ��פ��Ф������ꤷ����URI���ڡ������ޤ���InterWiki�פ��Ф����󥯤�ưŪ��ĥ�뵡ǽ�Ǥ���<br />'
		               . '�����ȥ�󥯤�Ʊ�͡��Х��ȿ�����Ȥʤ�ޤ���(�ִ������ʸ����ΥХ��ȿ��ǻ��ꡣ0 ��̵��)<br />'
		               . '����ڡ���: <a href="?'.rawurlencode($this->root->aliaspage).'" target="_blank">'.$this->root->aliaspage.'</a>',
		'extention'   => '�Х���',
	),

	'autoalias_max_words' => array(
		'caption'     => '�����ȥ����ꥢ���κ���ñ����Ͽ��',
		'description' => '',
		'extention'   => '��',
	),

	'plugin_follow_editauth' => array(
		'caption'     => '�ץ饰����˥ڡ����Խ����¤�Ŭ�Ѥ���',
		'description' => '�ڡ����Խ����¤��ʤ����ˡ��ץ饰����Ǥ���Ƥ��Ե��Ĥˤ��ޤ���',
	),

	'plugin_follow_freeze' => array(
		'caption'     => '�ץ饰����˥ڡ�������Ŭ�Ѥ���',
		'description' => '�ڡ�������뤵��Ƥ�����ˡ��ץ饰����Ǥ���Ƥ��Ե��Ĥˤ��ޤ���',
	),

	'line_break' => array(
		'caption'     => '���Ԥ�ͭ���ˤ���',
		'description' => '���Ԥ� &lt;br /&gt; ���Ѵ����ޤ���',
	),

	'fixed_heading_anchor_edit' => array(
		'caption'     => '��ñ���Խ���ͭ���ˤ���',
		'description' => '',
	),

	'paraedit_partarea' => array(
		'caption'     => '���Խ����ϰ�',
		'description' => '���Խ����ϰϤ����ꤷ�ޤ���<br />'
		               . '�Ϥ��ϰϤϡ�Wiki�񼰤� * �ǻϤޤ븫�Ф��Ԥǳ��Ϥ���ޤ���',
		'compat'      => '���θ��Ф��ޤ�',
		'level'       => 'Ʊ��٥�ʾ�θ��Ф��ޤ�',
	),

	'contents_auto_insertion' => array(
		'caption'     => 'TOC�μ�ư����',
		'description' => 'TOC("#contents")�μ�ư������Ԥ��Ϥο���( 0: ̵�� )',
	),

	'amazon_AssociateTag' => array(
		'caption'     => 'Amazon AssociateTag',
		'description' => '�����������ȥ���(�ȥ�å���ID)<br />'
		               . '�����ͤ����ͤξ�� "trust/class/hyp_common/hsamazon/hyp_simple_amazon.ini" �������ͤ��Ѥ��ޤ���',
	),

	'amazon_AccessKeyId' => array(
		'caption'     => 'Amazon AccessKeyId',
		'description' => '������������ID��Ⱦ�ѱѿ����ǹ������줿20ʸ����ʸ�����<br />'
		               . '�����ͤ����ͤξ�� "trust/class/hyp_common/hsamazon/hyp_simple_amazon.ini" �������ͤ��Ѥ��ޤ���',
	),

	'amazon_SecretAccessKey' => array(
		'caption'     => 'Amazon SecretAccessKey',
		'description' => '��̩������40ʸ���Υ������󥹡�<br />'
		               . '�����ͤ����ͤξ�� "trust/class/hyp_common/hsamazon/hyp_simple_amazon.ini" �������ͤ��Ѥ��ޤ���',
	),

	'amazon_UseUserPref' => array(
		'caption'     => '�桼������ Amazon ID',
		'description' => '�桼������������Υ����������� ID ��ͭ���ˤ���',
	),

	'bitly_clickable' => array(
		'caption'     => '����å��֥�URLû��',
		'description' => 'URL�μ�ư��󥯤� <a href="http://bit.ly/" target="_blank">bitly</a> ��Ȥ�û�̤��롣'
		               . '"bitly_login", "bitly_apiKey" �����꤬ɬ�פǤ���'
	),

	'twitter_consumer_key' => array(
		'caption'     => 'Twitter Consumer key',
		'description' => '<a href="https://twitter.com/apps" target="_blank">Applications Using Twitter</a> �������륫�����ޡ�������'
	),

	'twitter_consumer_secret' => array(
		'caption'     => 'Twitter Consumer secret',
		'description' => '<a href="https://twitter.com/apps" target="_blank">Applications Using Twitter</a> �������륷������åȥ�����'
	),

	'fckeditor_path' => array(
		'caption'     => 'FCKeditor �Υѥ�',
		'description' => '<span style="font-weight:bold;">' . $this->cont['ROOT_PATH'] . '</span> �����³�������Ϥ��Ƥ���������<br />'
		               . 'fckeditor.js �Τ���ǥ��쥯�ȥ�̾�����ꤷ�Ƥ���������FCKeditor �ϡ�Version 2.6 �ʹߤ�ɬ�פǤ���<br />'
		               . 'FCKeditor �ˤ���å����ǥ�������Ѥ��ʤ�����̤���ϤȤ��Ƥ���������',
	),

	'pagecache_min' => array(
		'caption'     => '�ڡ�������å���ͭ������',
		'description' => '�ڡ���������󥰤���HTML�򥭥�å��夷�ƹ�®���������ͭ������(ñ��:ʬ)�����ꤷ�ޤ���<br />'
		               . '�������������ȥ�������ȥ����������Τߥ���å��夵��ޤ����ڡ����ӥ塼��¿�������Ȥξ��ϡ�ͭ���ˤ���뤳�Ȥ򤪴����פ��ޤ���',
		'extention'   => 'ʬ',
	),

	'pre_width' => array(
		'caption'     => '&lt;pre&gt;��CSS:width����',
		'description' => '&lt;pre&gt;�����˻��ꤹ��CSS��width�ͤ���ꤷ�ޤ���',
	),

	'pre_width_ie' => array(
		'caption'     => '&lt;pre&gt;��CSS:width����(IE����)',
		'description' => '������ϥ֥饦����IE�����ͤǤ������Ѥ��Ƥ���XOOPS�Υơ��ޤ�&lt;table&gt;�����ξ��ϡ�700px �ʤɸ����ͤ���ꤹ���ɽ�������줬�ڸ������Ȼפ��ޤ���',
	),

	'moblog_pop_mail' => array(
		'caption'     => '��֥�������᡼�륢�ɥ쥹',
		'description' => 'Gmail �����Ѥ��ƥ桼����������ѥ��ɥ쥹����Ϳ������ϡ�"���������̾+*@gmail.com" �����ꤷ�ޤ���(* �˥������ʸ������������ޤ�)',
	),

	'moblog_pop_host' => array(
		'caption'     => '��֥������Ѥ���POP3�����С�̾',
		'description' => 'Gmail �ξ�硢��ssl://pop.gmail.com�פ����ꤷ�ޤ���<br />�������������С��� PHP �� OpenSSL ���Ȥ߹��ޤ�Ƥ��ʤ����ϡ�ssl:// �ϻ��ѤǤ��ޤ���',
	),

	'moblog_pop_port' => array(
		'caption'     => '��֥������Ѥ���POP3�ݡ����ֹ�',
		'description' => '�̾�ϡ�110�ס�Gmail �ξ��ϡ�995�פ����ꤷ�ޤ���',
	),

	'moblog_pop_user' => array(
		'caption'     => '��֥������Ѥ���POP3������ID',
		'description' => 'Gmail �ξ�硢�ǿ��⡼�ɤ����ꤹ�뤿���recent:���������̾@gmail.com�פ����ꤷ�ޤ���',
	),

	'moblog_pop_pass' => array(
		'caption'     => '��֥������Ѥ���POP3������ѥ����',
		'description' => '',
	),

	'use_moblog_user_pref' => array(
		'caption'     => '�桼��������ǥ�֥����������Ĥ���',
		'description' => '',
	),

	'moblog_page_recomend' => array(
		'caption'     => '�桼��������Υڡ���̾����ҥ��',
		'description' => '�桼��������Ǥ������ڡ���̾���Ф�������(������ʤɤ�������)',
	),

	'update_ping' => array(
		'caption'     => '����Ping����������',
		'description' => '',
	),

	'update_ping_servers' => array(
		'caption'     => '����Ping��������',
		'description' => '�����襵���С�URL�� 1 �Ԥ� 1 �http ���鵭�Ҥ��ޤ���<br />URL�κǸ�ˡ�[Ⱦ�ѥ��ڡ���]�Ƕ��ڤä�"E"�����줿��硢extendedPing���������ޤ���',
	),

	'pagereading_enable' => array(
		'caption'     => '�ڡ���̾�ɤߤ�ʬ�ह��',
		'description' => '�ڡ��������ǥڡ���̾�ɤߤ����Ѥ���ʬ�ष�ޤ���',
	),

	'pagereading_kanji2kana_converter' => array(
		'caption'     => '�ڡ���̾�ɤ߼�����ˡ',
		'description' => '�ڡ���̾�ɤߤ����������ˡ�����򤷤Ƥ���������',
	),

	'pagereading_kanji2kana_encoding' => array(
		'caption'     => '�ڡ���̾�ɤ�ʸ���������󥳡��ǥ���',
		'description' => '�����С��� UNIX �Ϥʤ� EUC-JP, Windows �Ϥʤ� Shift-JIS ��ɸ��Ǥ���',
	),

	'pagereading_chasen_path' => array(
		'caption'     => 'ChaSen �����Хѥ�',
		'description' => '',
	),

	'pagereading_kakasi_path' => array(
		'caption'     => 'KAKASI �����Хѥ�',
		'description' => '',
	),

	'pagereading_config_dict' => array(
		'caption'     => '�ڡ���̾�ɤߤμ���ڡ���̾',
		'description' => '�ڡ���̾�ɤ߼�����ˡ��"None"�ξ����Ѥ���ޤ���',
	),

);
?>