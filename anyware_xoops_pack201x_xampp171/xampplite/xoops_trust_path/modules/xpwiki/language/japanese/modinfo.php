<?php

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) ) $mydirname = 'xpwiki' ;
$constpref = '_MI_' . strtoupper( $mydirname ) ;

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( $constpref.'_LOADED' ) ) {

// a flag for this language file has already been read or not.
define( $constpref.'_LOADED' , 1 ) ;

// Main menu
define( $constpref.'_MENU_NEWPAGE',  '�����ڡ�������');
define( $constpref.'_MENU_RECENT',   '�ǿ��ڡ�������');
define( $constpref.'_MENU_PAGELIST', '���ڡ�������');
define( $constpref.'_MENU_HELP',     '�إ��');
define( $constpref.'_MENU_RELAYTED', '��Ϣ�ڡ���');
define( $constpref.'_MENU_EDIT',     '�Խ�����');
define( $constpref.'_MENU_SOURCE',   'Wiki������');
define( $constpref.'_MENU_DIFF',     '�Խ�����');
define( $constpref.'_MENU_BACKUPS',  '�Хå����åװ���');
define( $constpref.'_MENU_ATTACHES', 'ź�եե��������');
define( $constpref.'_MENU_REFERER',  '��󥯸�����');

// Names of blocks for this module (Not all module has blocks)
define( $constpref.'_BNAME_A_PAGE', '�ڡ���ɽ�� ('.$mydirname.')');
define( $constpref.'_BDESC_A_PAGE', '�ڡ���̾����ꤷ�Ƥ������Ƥ�֥�å���ɽ�����뤳�Ȥ��Ǥ��ޤ�');
define( $constpref.'_BNAME_NOTIFICATION', '���٥������ ('.$mydirname.')');
define( $constpref.'_BDESC_NOTIFICATION', '���٥�����Υ��ץ��������ꤷ�ޤ�');
define( $constpref.'_BNAME_FUSEN', '��䵵�ǽ ('.$mydirname.')');
define( $constpref.'_BDESC_FUSEN', '��䵥ץ饰����Υ���ȥ����˥塼��ɽ�����ޤ���');
define( $constpref.'_BNAME_MENUBAR', 'MenuBar ('.$mydirname.')');
define( $constpref.'_BDESC_MENUBAR', 'MenuBar ��ɽ�����ޤ���');

define( $constpref.'_MODULE_DESCRIPTION' , 'PukiWiki�١�����Wiki�⥸�塼��' ) ;

define( $constpref.'_PLUGIN_CONVERTER' , '�ץ饰�����Ѵ��ġ���' ) ;
define( $constpref.'_SKIN_CONVERTER' , '�������Ѵ��ġ���' ) ;
define( $constpref.'_ADMIN_CONF' , '�Ķ�����' ) ;
define( $constpref.'_ADMIN_TOOLS' , '�����ѥġ������' ) ;
define( $constpref.'_ADMENU_MYLANGADMIN' , '�����������' ) ;
define( $constpref.'_ADMENU_MYTPLSADMIN' , '�ƥ�ץ졼�ȴ���' ) ;
define( $constpref.'_ADMENU_MYBLOCKSADMIN' , '�֥�å�����/������������' ) ;
define( $constpref.'_ADMENU_MYPREFERENCES' , '��������' ) ;

define( $constpref.'_COM_DIRNAME','���������礹��d3forum��dirname');
define( $constpref.'_COM_FORUM_ID','���������礹��ե��������ֹ�');
define( $constpref.'_COM_ORDER','�����������ɽ�����');
define( $constpref.'_COM_VIEW','�����������ɽ����ˡ');
define( $constpref.'_COM_POSTSNUM','����������Υե�å�ɽ���ˤ��������ɽ�����');

// Notify Replaces
define($constpref.'_NOTCAT_REPLASE2MODULENAME', '�⥸�塼��');
define($constpref.'_NOTCAT_REPLASE2FIRSTLEV', 'ɽ�������1����');
define($constpref.'_NOTCAT_REPLASE2SECONDLEV', 'ɽ�������2����');
//define($constpref.'_NOTCAT_REPLASE2PAGENAME', '���Υڡ���');

// Notify Categories
define($constpref.'_NOTCAT_PAGE', 'ɽ����Υڡ���');
define($constpref.'_NOTCAT_PAGEDSC', 'ɽ����Υڡ������Ф������Υ��ץ����');
define($constpref.'_NOTCAT_PAGE1', 'ɽ�������1���� �ʲ�');
define($constpref.'_NOTCAT_PAGE1DSC', 'ɽ�������1���� �ʲ��Υڡ������Ф������Υ��ץ����');
define($constpref.'_NOTCAT_PAGE2', 'ɽ�������2���� �ʲ�');
define($constpref.'_NOTCAT_PAGE2DSC', 'ɽ�������2���� �ʲ��Υڡ������Ф������Υ��ץ����');
define($constpref.'_NOTCAT_GLOBAL', '�⥸�塼������');
define($constpref.'_NOTCAT_GLOBALDSC', '�⥸�塼�����Τˤ��������Υ��ץ����');

// Each Notifications
define($constpref.'_NOTIFY_PAGE_UPDATE', '�ڡ�������');
define($constpref.'_NOTIFY_PAGE_UPDATECAP', '���Υڡ������������줿�������Τ���');
define($constpref.'_NOTIFY_PAGE1_UPDATECAP', '��ɽ�������1���ءװʲ��Υڡ������������줿�������Τ���');
define($constpref.'_NOTIFY_PAGE2_UPDATECAP', '��ɽ�������2���ءװʲ��Υڡ������������줿�������Τ���');
define($constpref.'_NOTIFY_PAGE_UPDATESBJ', '[{X_SITENAME}] {X_MODULE}:{PAGE_NAME} �ڡ�������');
define($constpref.'_NOTIFY_GLOBAL_UPDATECAP', '�⥸�塼����Τ����줫�Υڡ������������줿�������Τ���');

}
