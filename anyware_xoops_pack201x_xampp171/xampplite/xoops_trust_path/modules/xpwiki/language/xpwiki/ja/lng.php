<?php
// PukiWiki - Yet another WikiWikiWeb clone.
// $Id: lng.php,v 1.30 2011/12/08 07:01:00 nao-pon Exp $
// Copyright (C)
//   2002-2005 PukiWiki Developers Team
//   2001-2002 Originally written by yu-ji
// License: GPL v2 or (at your option) any later version
//
// PukiWiki message file (japanese)

// �����Υե������ʸ�������ɤϡ����󥳡��ǥ��󥰤�����Ȱ���
//   ���Ƥ���ɬ�פ�����ޤ�

// Q & A ǧ��
$root->riddles = array(
//	'����' => '����',
	'������פ��ɤߤ��ʡ�(�Ҥ餬�ʤ�)' => '�Ȥ����礦',
	'��̾�Ų��פ��ɤߤ��ʡ�(�Ҥ餬�ʤ�)' => '�ʤ���',
	'�����פ��ɤߤ��ʡ�(�Ҥ餬�ʤ�)' => '��������',
	'�ֵ��ԡפ��ɤߤ��ʡ�(�Ҥ餬�ʤ�)' => '���礦��',
	'���ܤμ��Ԥϡ�(������)' => '���',
);

///////////////////////////////////////
// Page titles
$root->_title_cannotedit = '$1 ���Խ��Ǥ��ޤ���';
$root->_title_edit       = '$1 ���Խ�';
$root->_title_preview    = '$1 �Υץ�ӥ塼';
$root->_title_collided   = '$1 �ǡڹ����ξ��ۤ͡������ޤ���';
$root->_title_updated    = '$1 �򹹿����ޤ���';
$root->_title_deleted    = '$1 �������ޤ���';
$root->_title_help       = '�إ��';
$root->_title_invalidwn  = 'ͭ����WikiName�ǤϤ���ޤ���';
$root->_title_backuplist = '�Хå����åװ���';
$root->_title_ng_riddle  = 'Q & A ǧ�ڤ˼��Ԥ��ޤ���<br />$1 ��ץ�ӥ塼���ޤ�';
$root->_title_backlink   = '%s �ؤΥ�󥯥ڡ�������';

///////////////////////////////////////
// Messages
$root->_msg_unfreeze       = '�����';
$root->_msg_preview        = '�ʲ��Υץ�ӥ塼���ǧ���ơ��褱��Хڡ��������Υܥ���ǹ������Ƥ���������';
$root->_msg_preview_delete = '�ʥڡ��������Ƥ϶��Ǥ�����������Ȥ��Υڡ����Ϻ������ޤ�����';
$root->_msg_collided       = '���ʤ������Υڡ������Խ����Ƥ���֤ˡ�¾�οͤ�Ʊ���ڡ����򹹿����Ƥ��ޤä��褦�Ǥ���<br />
�����ɲä����Ԥ� +�ǻϤޤäƤ��ޤ���<br />
!�ǻϤޤ�Ԥ��ѹ����줿��ǽ��������ޤ���<br />
!��+�ǻϤޤ�Ԥ������ƺ��٥ڡ����ι�����ԤäƤ���������<br />';

$root->_msg_collided_auto  = '���ʤ������Υڡ������Խ����Ƥ���֤ˡ�¾�οͤ�Ʊ���ڡ����򹹿����Ƥ��ޤä��褦�Ǥ���<br />
��ư�Ǿ��ͤ��ä��ޤ����������꤬�����ǽ��������ޤ���<br />
��ǧ�塢[�ڡ����ι���]�򲡤��Ƥ���������<br />';

$root->_msg_invalidiwn     = '$1 ��ͭ���� $2 �ǤϤ���ޤ���';
$root->_msg_invalidpass    = '�ѥ���ɤ��ְ�äƤ��ޤ���';
$root->_msg_notfound       = '���ꤵ�줿�ڡ����ϸ��Ĥ���ޤ���Ǥ�����';
$root->_msg_addline        = '�ɲä��줿�Ԥ�<span class="diff_added">���ο�</span>�Ǥ���';
$root->_msg_delline        = '������줿�Ԥ�<span class="diff_removed">���ο�</span>�Ǥ���';
$root->_msg_goto           = '$1 �عԤ���';
$root->_msg_andresult      = '$1 �Τ��٤Ƥ�ޤ�ڡ����� <strong>$3</strong> �ڡ����桢 <strong>$2</strong> �ڡ������Ĥ���ޤ�����';
$root->_msg_orresult       = '$1 �Τ����줫��ޤ�ڡ����� <strong>$3</strong> �ڡ����桢 <strong>$2</strong> �ڡ������Ĥ���ޤ�����';
$root->_msg_notfoundresult = '$1 ��ޤ�ڡ����ϸ��Ĥ���ޤ���Ǥ�����';
$root->_msg_symbol         = '����';
$root->_msg_other          = '���ܸ�';
$root->_msg_help           = '�ƥ����������Υ롼���ɽ������';
$root->_msg_week           = array('��','��','��','��','��','��','��');
$root->_msg_content_back_to_top = '<div class="jumpmenu"><a href="#'.$root->mydirname.'_navigator" title="Page Top"><img src="'.$const['LOADER_URL'].'?src=arrow_up.png" alt="Page Top" width="16" height="16" /></a></div>';
$root->_msg_word           = '�����Υ�����ɤ��ϥ��饤�Ȥ���Ƥ��ޤ���';
$root->_msg_not_readable   = '�ڡ�����ɽ�����븢�¤�����ޤ���';
$root->_msg_not_editable   = '�ڡ������Խ����븢�¤�����ޤ���';
$root->_msg_with_twitter   = 'Twitter �����Τ���';

///////////////////////////////////////
// Symbols
$root->_symbol_anchor   = 'src:anchor.png,width:12,height:12';
$root->_symbol_noexists = '<img src="'.$const['IMAGE_DIR'].'paraedit.png" alt="�Խ�" height="9" width="9" />';

///////////////////////////////////////
// Form buttons
$root->_btn_preview   = '�ץ�ӥ塼';
$root->_btn_repreview = '���٥ץ�ӥ塼';
$root->_btn_update    = '�ڡ����ι���';
$root->_btn_cancel    = '����󥻥�';
$root->_btn_notchangetimestamp = '�����ॹ����פ��ѹ����ʤ�';
$root->_btn_addtop    = '�ڡ����ξ���ɲ�';
$root->_btn_template  = '�����Ȥ���ڡ���';
$root->_btn_load      = '�ɹ�';
$root->_btn_edit      = '�Խ�';
$root->_btn_delete    = '���';
$root->_btn_reading   = '�ڡ���Ƭʸ���ɤ�';
$root->_btn_alias     = '�ڡ�����̾<span class="edit_form_note">(ʣ����"<span style="color:red;font-weight:bold;font-size:120%;">:</span>"[�����]�Ƕ��ڤ�)</span>';
$root->_btn_alias_lf  = '�ڡ�����̾<span class="edit_form_note">(ʣ����[<span style="color:red;">����</span>]�Ƕ��ڤ�)</span>';
$root->_btn_riddle    = 'Q &amp; A ǧ��:<span class="edit_form_note"> �ڡ����������ϼ��μ���ˤ���������������(�ץ�ӥ塼����ɬ�פ���ޤ���)</span>';
$root->_btn_pgtitle   = '�ڡ��������ȥ�<span class="edit_form_note">( ����Ǽ�ư���� )</span>';
$root->_btn_pgorder   = '�ڡ����¤ӽ�<span class="edit_form_note">( 0-9 ������ ɸ��:1 )</span>';
$root->_btn_other_op  = '�ܺ٤����Ϲ��ܤ�ɽ��';
$root->_btn_emojipad  = '��ʸ���ѥå�';
$root->_btn_esummary  = '�Խ�������';
$root->_btn_source    = '�ڡ�������';

///////////////////////////////////////
// Authentication
$root->_title_cannotread = '$1 �ϱ����Ǥ��ޤ���';
$root->_msg_auth         = 'PukiWikiAuth';

///////////////////////////////////////
// Page name
$root->rule_page = 'FormattingRules';	// Formatting rules
$root->help_page = 'Help';		// Help

///////////////////////////////////////
// TrackBack (REMOVED)
$root->_tb_date  = 'Yǯn��j�� H:i:s';

/////////////////////////////////////////////////
// ��̾��̤�����ξ���ɽ�� (article)
$root->_no_subject = '̵��';

/////////////////////////////////////////////////
// ̾����̤�����ξ���ɽ�� (article, comment, pcomment)
$root->_no_name = '';

/////////////////////////////////////////////////
// Title of the page contents list
$root->contents_title = '�ڡ����⥳��ƥ��';

/////////////////////////////////////////////////
// Skin
/////////////////////////////////////////////////

$root->_LANG['skin']['topage']    = '�ڡ��������';
$root->_LANG['skin']['add']       = '�ɲ�';
$root->_LANG['skin']['backup']    = '�Хå����å�';
$root->_LANG['skin']['copy']      = 'ʣ��';
$root->_LANG['skin']['diff']      = '��ʬ';
$root->_LANG['skin']['back']      = '����';
$root->_LANG['skin']['edit']      = '�Խ�';
$root->_LANG['skin']['filelist']  = '�ե�����̾����';	// List of filenames
$root->_LANG['skin']['attaches']  = 'ź�եե��������';
$root->_LANG['skin']['freeze']    = '���';
$root->_LANG['skin']['help']      = '�إ��';
$root->_LANG['skin']['list']      = '���ڡ�������';
$root->_LANG['skin']['list_s']    = '����';	// List of pages
$root->_LANG['skin']['new']       = '�ڡ�����������';
$root->_LANG['skin']['new_s']     = '����';
$root->_LANG['skin']['newsub']    = '���̥ڡ�����������';
$root->_LANG['skin']['newsub_s']  = '����';
$root->_LANG['skin']['menu']      = '��˥塼';
$root->_LANG['skin']['header']    = '�Ǿ�';
$root->_LANG['skin']['footer']    = '�ǲ�';
$root->_LANG['skin']['rdf']       = '�ǽ�������RDF';	// RDF of RecentChanges
$root->_LANG['skin']['recent']    = '�ǿ��ڡ����ΰ���';	// RecentChanges
$root->_LANG['skin']['recent_s']  = '�ǿ�';
$root->_LANG['skin']['refer']     = '��󥯸�';	// Show list of referer
$root->_LANG['skin']['reload']    = '�����';
$root->_LANG['skin']['rename']    = '̾���ѹ�';	// Rename a page (and related)
$root->_LANG['skin']['rss']       = '�ǿ��ڡ�����RSS';	// RSS of RecentChanges
$root->_LANG['skin']['rss10']     = $root->_LANG['skin']['rss'] . ' 1.0';
$root->_LANG['skin']['rss20']     = $root->_LANG['skin']['rss'] . ' 2.0';
$root->_LANG['skin']['atom']      = $root->_LANG['skin']['rss'] . ' Atom';
$root->_LANG['skin']['search']    = 'ñ�측��';
$root->_LANG['skin']['search_s']  = '����';
$root->_LANG['skin']['top']       = '�ȥå�';	// Top page
$root->_LANG['skin']['trackback'] = 'Trackback';	// Show list of trackback
$root->_LANG['skin']['unfreeze']  = '�����';
$root->_LANG['skin']['upload']    = 'ź��';	// Attach a file
$root->_LANG['skin']['pginfo']    = '����';
$root->_LANG['skin']['comments']  = '�ڡ���������';
$root->_LANG['skin']['lastmodify']= '�ǽ�����';
$root->_LANG['skin']['linkpage']  = '��󥯥ڡ���';
$root->_LANG['skin']['pagealias'] = '�ڡ�����̾';
$root->_LANG['skin']['pageowner'] = '�ڡ��������ʡ�';
$root->_LANG['skin']['siteadmin'] = '�����ȴ�����';
$root->_LANG['skin']['none']      = '̤����';
$root->_LANG['skin']['pageinfo']  = '�ڡ�������';
$root->_LANG['skin']['pagename']  = '�ڡ���̾';
$root->_LANG['skin']['readable']  = '������';
$root->_LANG['skin']['editable']  = '�Խ���';
$root->_LANG['skin']['groups']    = '���롼��';
$root->_LANG['skin']['users']     = '�桼����';
$root->_LANG['skin']['perm']['all']  = '���٤Ƥ�ˬ���';
$root->_LANG['skin']['perm']['none'] = '�ʤ�';
$root->_LANG['skin']['print']     = '������Ŭ����ɽ��';
$root->_LANG['skin']['print_s']   = '����';
$root->_LANG['skin']['powered']   = 'Powered by xpWiki';
$root->_LANG['skin']['powered_s'] = 'xpWiki';
$root->_LANG['skin']['princeps']  = '��������';

///////////////////////////////////////
// Plug-in message
///////////////////////////////////////
// add.inc.php
$root->_title_add = '$1 �ؤ��ɲ�';
$root->_msg_add   = '�ڡ����ؤ��ɲäϡ����ߤΥڡ������Ƥ˲��Ԥ���Ĥ��������Ƥ��ɲä���ޤ���';

///////////////////////////////////////
// article.inc.php
$root->_btn_name    = '��̾��';
$root->_btn_article = '���������';
$root->_btn_subject = '��̾: ';
$root->_msg_article_mail_sender = '��Ƽ�: ';
$root->_msg_article_mail_page   = '�����: ';


///////////////////////////////////////
// attach.inc.php
$root->_attach_messages = array(
	'msg_uploaded' => '$1 �˥��åץ��ɤ��ޤ���',
	'msg_deleted'  => '$1 ����ե�����������ޤ���',
	'msg_freezed'  => 'ź�եե��������뤷�ޤ�����',
	'msg_unfreezed'=> 'ź�եե��������������ޤ�����',
	'msg_renamed'  => 'ź�եե������̾�����ѹ����ޤ�����',
	'msg_upload'   => '$1 �ؤ�ź��',
	'msg_info'     => 'ź�եե�����ξ���',
	'msg_confirm'  => '<p>%s �������ޤ���</p>',
	'msg_list'     => 'ź�եե��������',
	'msg_listpage' => '$1 ��ź�եե��������',
	'msg_listall'  => '���ڡ�����ź�եե��������',
	'msg_file'     => 'ź�եե�����',
	'msg_maxsize'  => '���åץ��ɲ�ǽ����ե����륵������ %s �Ǥ���',
	'msg_count'    => ' <span class="small">%s��</span>',
	'msg_password' => '�ե���������ꤹ��ѥ����(ɬ��)',
	'msg_password2'=> '�ե���������ꤷ���ѥ����',
	'msg_adminpass'=> '�����ԥѥ����',
	'msg_delete'   => '���Υե�����������ޤ���',
	'msg_backup'   => '�Хå����åפ���',
	'msg_freeze'   => '���Υե��������뤷�ޤ���',
	'msg_unfreeze' => '���Υե��������������ޤ���',
	'msg_isfreeze' => '���Υե��������뤵��Ƥ��ޤ���',
	'msg_rename'   => '̾�����ѹ����ޤ���',
	'msg_newname'  => '������̾��',
	'msg_require'  => '(���åץ��ɻ������ꤷ���ѥ���ɤ�ɬ�פǤ�)',
	'msg_filesize' => '������',
	'msg_date'     => '��Ͽ����',
	'msg_dlcount'  => '����������',
	'msg_md5hash'  => 'MD5�ϥå�����',
	'msg_page'     => '�ڡ���',
	'msg_filename' => '��Ǽ�ե�����̾',
	'msg_owner'    => '��ͭ��',
	'err_noparm'   => '$1 �ؤϥ��åץ��ɡ�����ϤǤ��ޤ���',
	'err_exceed'   => '$1 �ؤΥե����륵�������礭�����ޤ�',
	'err_exists'   => '$1 ��Ʊ���ե�����̾��¸�ߤ��ޤ�',
	'err_notfound' => '$1 �ˤ��Υե�����ϸ��Ĥ���ޤ���',
	'err_noexist'  => 'ź�եե����뤬����ޤ���',
	'err_delete'   => '$1 ����ե���������Ǥ��ޤ���Ǥ���',
	'err_rename'   => '�ե�����̾���ѹ��Ǥ��ޤ���Ǥ���',
	'err_password' => '�ѥ���ɤ����פ��ޤ���',
	'err_adminpass'=> '�����ԥѥ���ɤ����פ��ޤ���',
	'err_nopage'   => '�ڡ�����$1�פ�����ޤ�����˥ڡ�����������Ƥ���������',
	'btn_upload'   => '���åץ���',
	'btn_upload_fm'=> '���åץ��ɥե�����',
	'btn_info'     => '�ܺ�',
	'btn_submit'   => '�¹�',
	'msg_copyrighted'  => 'ź�եե����������ݸ�ޤ�����',
	'msg_uncopyrighted'=> 'ź�եե����������ݸ�������ޤ�����',
	'msg_copyright'  => '���Υե����������塢�ݸ��ɬ�פ�����ޤ���',
	'msg_copyright0' => '���Υե������ �������ʪ �ޤ��� ����ե꡼ �Ǥ���',
	'msg_copyright_s'=> '¾�ͤ�����ʪ',
	'err_copyright'  => '���Υե����������塢�ݸ��Ƥ��뤿�� ɽ������������� �ϤǤ��ޤ���',
	'msg_noinline1'  => '����饤��ɽ����ػߡ�',
	'msg_noinline0-1'=> '����饤��ɽ���ػߤ�����',
	'msg_noinline-1' => '����饤��ɽ������ġ�',
	'msg_noinline01' => '����饤��ɽ�����Ĥ�����',
	'msg_noinlined'  => 'ź�եե�����Υ���饤��ɽ�����������Ͽ���ޤ�����',
	'msg_unnoinlined'=> 'ź�եե�����Υ���饤��ɽ��������������ޤ�����',
	'msg_nopcmd'     => 'ư����ꤵ��Ƥ��ޤ���',
	'err_extension'=> '���Υڡ����Υ����ʡ����¤��ʤ����ᡢ��ĥ�Ҥ� $1 �Υե������ź�դǤ��ޤ���',
	'msg_set_css'  => '$1 �إ������륷���Ȥ����ꤷ�ޤ�����',
	'msg_unset_css'=> '$1 �Υ������륷���Ȥ������ޤ�����',
	'msg_untar'    => 'TAR��������ह��',
	'msg_search_updata'=> '���Υڡ����ؤΥ��åץ��ɺѤߥǡ�����õ����',
	'msg_paint_tool'=> '���������ġ���',
	'msg_shi'      => '�����ڥ��󥿡�',
	'msg_shipro'   => '�����ڥ��󥿡�Pro',
	'msg_width'    => '��',
	'msg_height'   => '��',
	'msg_max'      => '����',
	'msg_do_paint' => '������������',
	'msg_save_movie'=> 'ư�赭Ͽ',
	'msg_adv_setting'=> '---����ĥ���ꡡ---',
	'msg_init_image'=> '�����Х����ɤ߹�������ե�����(JPEG or GIF)',
	'msg_fit_size' => '�����Х��������򤳤β����˹�碌��',
	'msg_extensions' => 'ź�ղ�ǽ�ʥե�����γ�ĥ��( $1 )',
	'msg_rotated_ok' => '�������ž���ޤ�����<br />�֥饦���ǥ���ɤ��ʤ���������ɽ������Ƥ��ʤ����⤷��ޤ���',
	'msg_rotated_ng' => '�������ž�Ǥ��ޤ���Ǥ�����',
	'err_isflash' => 'Flash�ե�����򥢥åץ��ɤ��븢�¤�����ޤ���',
	'msg_make_thumb' => '����ͥ�������(�����ե�����Τ�): ',
	'msg_sort_time' => '�ǿ���',
	'msg_sort_name' => '�ե�����̾��',
	'msg_list_view' => '�ꥹ��ɽ��',
	'msg_image_view' => '���᡼��ɽ��',
	'msg_insert' => '����',
	'msg_select_current' => ' (������)',
	'msg_select_useful' => '�ե�����ź���ѥڡ���',
	'msg_select_manyitems' => 'ź�եե������¿���ڡ���',
	'msg_noupload' => '$1 �إ��åץ��ɤ��븢�¤�����ޤ���',
	'msg_show_all_pages' => '���٤ƤΥڡ�������ɽ��',
	'msg_page_select' => '�ڡ���������',
	'msg_send_mms' => 'MMS �ǥ᡼������',
	'msg_drop_files_here' => '���åץ��ɤ���ˤϡ������˥ե������ɥ�å�',
	'msg_for_upload' => '���Υڡ����˥��åץ��ɤ��븢�¤�����ޤ���<br />���åץ��ɤ���ˤϡ�<img src="'.$const['LOADER_URL'].'?src=page_attach.png" alt="Page" />�ڡ�������� "<span class="attachable">���Τ褦��ɽ��</span>" �Υڡ��������򤷤Ʋ�������',
);

///////////////////////////////////////
// back.inc.php
$root->_msg_back_word = '���';

///////////////////////////////////////
// backup.inc.php
$root->_title_backup_delete  = '$1 �ΥХå����åפ���';
$root->_title_backupdiff     = '$1 �ΥХå����å׺�ʬ(No.$2)';
$root->_title_backupnowdiff  = '$1 �ΥХå����åפθ��ߤȤκ�ʬ(No.$2)';
$root->_title_backupsource   = '$1 �ΥХå����åץ�����(No.$2)';
$root->_title_backup         = '$1 �ΥХå����å�(No.$2)';
$root->_title_pagebackuplist = '$1 �ΥХå����åװ���';
$root->_title_backuplist     = '�Хå����åװ���';
$root->_msg_backup_deleted   = '$1 �ΥХå����åפ������ޤ�����';
$root->_msg_backup_adminpass = '����ѤΥѥ���ɤ����Ϥ��Ƥ���������';
$root->_msg_backuplist       = '�Хå����åװ���';
$root->_msg_nobackup         = '$1 �ΥХå����åפϤ���ޤ���';
$root->_msg_diff             = '��ʬ';
$root->_msg_nowdiff          = '���ߤȤκ�ʬ';
$root->_msg_source           = '������';
$root->_msg_backup           = '�Хå����å�';
$root->_msg_view             = '$1 ��ɽ��';
$root->_msg_deleted          = '$1 �Ϻ������Ƥ��ޤ���';
$root->_msg_backupedit       = '�Хå����å� No.$1 �����������Խ�';
$root->_msg_current          = '��';
$root->_title_backuprewind   = '$1 �ΥХå����å�(No.$2)�ش����ᤷ';
$root->_title_dorewind       = '$1 �����ΰʲ������Ƥ˥����ॹ����פ�ޤ���������ޤ���';
$root->_msg_rewind           = '�����ᤷ';
$root->_msg_dorewind         = '�Хå����å� No.$1 �ش����᤹';
$root->_msg_rewinded         = '�Хå����å� No.$1 �ؤδ����ᤷ����λ���ޤ�����';
$root->_msg_nobackupnum      = '�Хå����å� No.$1 �Ϥ���ޤ���';

///////////////////////////////////////
// calendar_viewer.inc.php
$root->_err_calendar_viewer_param2 = '��2�������Ѥ���';
$root->_msg_calendar_viewer_right  = '����%d��&gt;&gt;';
$root->_msg_calendar_viewer_left   = '&lt;&lt;����%d��';
$root->_msg_calendar_viewer_restrict = '$1 �ϱ������¤������äƤ��뤿��calendar_viewer�ˤ�뻲�ȤϤǤ��ޤ���';

///////////////////////////////////////
// calendar2.inc.php
$root->_calendar2_plugin_edit  = '[�����������Խ�]';
$root->_calendar2_plugin_empty = '%s�϶��Ǥ���';

///////////////////////////////////////
// comment.inc.php
$root->_btn_name    = '��̾��: ';
$root->_btn_comment = '�����Ȥ�����';
$root->_msg_comment = '������: ';
$root->_title_comment_collided = '$1 �ǡڹ����ξ��ۤ͡������ޤ���';
$root->_msg_comment_collided   = '���ʤ������Υڡ������Խ����Ƥ���֤ˡ�¾�οͤ�Ʊ���ڡ����򹹿����Ƥ��ޤä��褦�Ǥ���<br />
�����Ȥ��ɲä��ޤ��������㤦���֤���������Ƥ��뤫�⤷��ޤ���<br />';

///////////////////////////////////////
// deleted.inc.php
$root->_deleted_plugin_title = '����ڡ����ΰ���';
$root->_deleted_plugin_title_withfilename = '����ڡ����ե�����ΰ���';

///////////////////////////////////////
// diff.inc.php
$root->_title_diff = '$1 ���ѹ���';
$root->_title_diff_delete  = '$1 �κ�ʬ����';
$root->_msg_diff_deleted   = '$1 �κ�ʬ�������ޤ�����';
$root->_msg_diff_adminpass = '����ѤΥѥ���ɤ����Ϥ��Ƥ���������';

///////////////////////////////////////
// filelist.inc.php (list.inc.php)
$root->_title_filelist = '�ڡ����ե�����ΰ���';

///////////////////////////////////////
// freeze.inc.php
$root->_title_isfreezed = '$1 �Ϥ��Ǥ���뤵��Ƥ��ޤ�';
$root->_title_freezed   = '$1 ����뤷�ޤ���';
$root->_title_freeze    = '$1 �����';
$root->_msg_freezing    = '����ѤΥѥ���ɤ����Ϥ��Ƥ���������';
$root->_btn_freeze      = '���';

///////////////////////////////////////
// insert.inc.php
$root->_btn_insert = '�ɲ�';

///////////////////////////////////////
// include.inc.php
$root->_msg_include_restrict = '$1 �ϱ������¤������äƤ��뤿��include�Ǥ��ޤ���';

///////////////////////////////////////
// interwiki.inc.php
$root->_title_invalidiwn = 'ͭ����InterWikiName�ǤϤ���ޤ���';

///////////////////////////////////////
// list.inc.php
$root->_title_list = '�ڡ����ΰ���';

///////////////////////////////////////
// ls2.inc.php
$root->_ls2_err_nopages = '<p>\'$1\' �ˤϡ������ؤΥڡ���������ޤ���</p>';
$root->_ls2_msg_title   = '\'$1\'�ǻϤޤ�ڡ����ΰ���';

///////////////////////////////////////
// memo.inc.php
$root->_btn_memo_update = '��⹹��';

///////////////////////////////////////
// navi.inc.php
$root->_navi_prev = 'Prev';
$root->_navi_next = 'Next';
$root->_navi_up   = 'Up';
$root->_navi_home = 'Home';

///////////////////////////////////////
// newpage.inc.php
$root->_msg_newpage = '�ڡ�����������';

///////////////////////////////////////
// paint.inc.php
$root->_paint_messages = array(
	'field_name'    => '��̾��',
	'field_filename'=> '�ե�����̾',
	'field_comment' => '������',
	'btn_submit'    => 'paint',
	'msg_max'       => '(���� %d x %d)',
	'msg_title'     => 'Paint and Attach to $1',
	'msg_title_collided' => '$1 �ǡڹ����ξ��ۤ͡������ޤ���',
	'msg_collided'  => '���ʤ����������Խ����Ƥ���֤ˡ�¾�οͤ�Ʊ���ڡ����򹹿����Ƥ��ޤä��褦�Ǥ���<br />
�����ȥ����Ȥ��ɲä��ޤ��������㤦���֤���������Ƥ��뤫�⤷��ޤ���<br />'
);

///////////////////////////////////////
// pcomment.inc.php
$root->_pcmt_messages = array(
	'btn_name'     => '��̾��: ',
	'btn_comment'  => '�����Ȥ�����',
	'msg_comment'  => '������: ',
	'msg_recent'   => '�ǿ���%d���ɽ�����Ƥ��ޤ���',
	'msg_all'      => '�����ȥڡ����򻲾�',
	'msg_none'     => '�����ȤϤ���ޤ���',
	'title_collided' => '$1 �ǡڹ����ξ��ۤ͡������ޤ���',
	'msg_collided' => '���ʤ������Υڡ������Խ����Ƥ���֤ˡ�¾�οͤ�Ʊ���ڡ����򹹿����Ƥ��ޤä��褦�Ǥ���<br />
�����Ȥ��ɲä��ޤ��������㤦���֤���������Ƥ��뤫�⤷��ޤ���<br />',
	'err_pagename' => '�ڡ���̾ [[%s]] �ϻ��ѤǤ��ޤ��� �������ڡ���̾����ꤷ�Ƥ���������',
);
$root->_msg_pcomment_restrict = '�������¤������äƤ��뤿�ᡢ$1����ϥ����Ȥ��ɤߤ��ळ�Ȥ��Ǥ��ޤ���';

///////////////////////////////////////
// popular.inc.php
$root->_popular_plugin_frame       = '<h5>%3$s�͵���%1$d��</h5><div>%2$s</div>';
$root->_popular_plugin_today_frame = '<h5>%3$s������%1$d��</h5><div>%2$s</div>';
$root->_popular_plugin_yesterday_frame = '<h5>%3$s������%1$d��</h5><div>%2$s</div>';

///////////////////////////////////////
// recent.inc.php
$root->_recent_plugin_frame = '<h5>%s�ǿ���%d��</h5>
<div>%s</div>';

///////////////////////////////////////
// referer.inc.php
$root->_referer_msg = array(
	'msg_H0_Refer'       => '��󥯸���ɽ��',
	'msg_Hed_LastUpdate' => '�ǽ���������',
	'msg_Hed_1stDate'    => '�����Ͽ����',
	'msg_Hed_RefCounter' => '������',
	'msg_Hed_Referer'    => 'Referer',
	'msg_Fmt_Date'       => 'Yǯn��j�� H:i',
	'msg_Chr_uarr'       => '��',
	'msg_Chr_darr'       => '��',
);

///////////////////////////////////////
// rename.inc.php
$root->_rename_messages  = array(
	'err' => '<p>���顼:%s</p>',
	'err_nomatch'    => '�ޥå�����ڡ���������ޤ���',
	'err_notvalid'   => '��͡����Υڡ���̾������������ޤ���',
	'err_adminpass'  => '�����ԥѥ���ɤ�����������ޤ���',
	'err_notpage'    => '%s�ϥڡ���̾�ǤϤ���ޤ���',
	'err_norename'   => '%s���͡��ह�뤳�ȤϤǤ��ޤ���',
	'err_already'    => '�ʲ��Υڡ��������Ǥ�¸�ߤ��ޤ���%s',
	'err_already_below' => '�ʲ��Υե����뤬���Ǥ�¸�ߤ��ޤ���',
	'msg_title'      => '�ڡ���̾���ѹ�',
	'msg_page'       => '�ѹ����ڡ��������',
	'msg_regex'      => '����ɽ��',
	'msg_part_rep'   => '��ʬ�����ִ�',
	'msg_related'    => '��Ϣ�ڡ���',
	'msg_do_related' => '��Ϣ�ڡ������͡��ह��',
	'msg_rename'     => '%s��̾�����ѹ����ޤ���',
	'msg_oldname'    => '���ߤ�̾��',
	'msg_newname'    => '������̾��',
	'msg_adminpass'  => '�����ԥѥ����',
	'msg_arrow'      => '��',
	'msg_exist_none' => '���Υڡ�����������ʤ�',
	'msg_exist_overwrite' => '���Υե�������񤭤���',
	'msg_confirm'    => '�ʲ��Υե�������͡��ष�ޤ���',
	'msg_result'     => '�ʲ��Υե�������񤭤��ޤ�����',
	'btn_submit'     => '�¹�',
	'btn_next'       => '����'
);

///////////////////////////////////////
// search.inc.php
$root->_title_search  = 'ñ�측��';
$root->_title_result  = '$1 �θ������';
$root->_msg_searching = '���ƤΥڡ�������ñ��򸡺����ޤ�����ʸ����ʸ���ζ��̤Ϥ���ޤ���';
$root->_btn_search    = '����';
$root->_btn_and       = 'AND����';
$root->_btn_or        = 'OR����';
$root->_search_pages  = '$1 ����Ϥޤ�ڡ����򸡺�';
$root->_search_all    = '���ƤΥڡ����򸡺�';

///////////////////////////////////////
// source.inc.php
$root->_source_messages = array(
	'msg_title'    => '$1�Υ�����',
	'msg_notfound' => '$1�����Ĥ���ޤ���',
	'err_notfound' => '�ڡ����Υ�������ɽ���Ǥ��ޤ���'
);

///////////////////////////////////////
// template.inc.php
$root->_msg_template_start   = '���Ϲ�:<br />';
$root->_msg_template_end     = '��λ��:<br />';
$root->_msg_template_page    = '$1/ʣ��';
$root->_msg_template_refer   = '�ڡ���̾:';
$root->_msg_template_force   = '��¸�Υڡ���̾���Խ�����';
$root->_err_template_already = '$1 �Ϥ��Ǥ�¸�ߤ��ޤ���';
$root->_err_template_invalid = '$1 ��ͭ���ʥڡ���̾�ǤϤ���ޤ���';
$root->_btn_template_create  = '����';
$root->_title_template       = '$1 ��ƥ�ץ졼�Ȥˤ��ƺ���';

///////////////////////////////////////
// tracker.inc.php
$root->_tracker_messages = array(
	'msg_list'   => '$1 �ι��ܰ���',
	'msg_back'   => '<p>$1</p>',
	'msg_limit'  => '��$1���桢���$2���ɽ�����Ƥ��ޤ���',
	'btn_page'   => '�ڡ���̾',
	'btn_name'   => '�ڡ���̾',
	'btn_real'   => '�ڡ���̾',
	'btn_submit' => '�ɲ�',
	'btn_date'   => '����',
	'btn_refer'  => '����',
	'btn_base'   => '����',
	'btn_update' => '��������',
	'btn_past'   => '�в�',
);

///////////////////////////////////////
// unfreeze.inc.php
$root->_title_isunfreezed = '$1 ����뤵��Ƥ��ޤ���';
$root->_title_unfreezed   = '$1 �����������ޤ���';
$root->_title_unfreeze    = '$1 �������';
$root->_msg_unfreezing    = '������ѤΥѥ���ɤ����Ϥ��Ƥ���������';
$root->_btn_unfreeze      = '�����';

///////////////////////////////////////
// versionlist.inc.php
$root->_title_versionlist = '�����ե�����ΥС���������';

///////////////////////////////////////
// vote.inc.php
$root->_vote_plugin_choice = '�����';
$root->_vote_plugin_votes  = '��ɼ';

///////////////////////////////////////
// yetlist.inc.php
$root->_title_yetlist = '̤�����Υڡ�������';
$root->_err_notexist  = '̤�����Υڡ����Ϥ���ޤ���';
