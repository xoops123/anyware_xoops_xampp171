<?php

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) ) $mydirname = 'xelfinder' ;
$constpref = '_MI_' . strtoupper( $mydirname ) ;

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( $constpref.'_LOADED' ) ) {

// a flag for this language file has already been read or not.
define( $constpref.'_LOADED' , 1 ) ;

define( $constpref.'_DESC' , 'Web�١����Υե�����ޥ͡����� elFinder �򥤥᡼���ޥ͡�����Ȥ������Ѥ���⥸�塼��');

// admin menu
define($constpref.'_ADMENU_MYLANGADMIN' ,   '�����������' ) ;
define($constpref.'_ADMENU_MYTPLSADMIN' ,   '�ƥ�ץ졼�ȴ���' ) ;
define($constpref.'_ADMENU_MYBLOCKSADMIN' , '�֥�å�����/������������' ) ;
define($constpref.'_ADMENU_MYPREFERENCES' , '��������' ) ;

// configurations
define( $constpref.'_VOLUME_SETTING' ,          '�ܥ�塼��ɥ饤��' );
define( $constpref.'_VOLUME_SETTING_DESC' ,     '[�⥸�塼��ǥ��쥯�ȥ�̾]:[�ץ饰����̾]:[�ե������Ǽ�ǥ��쥯�ȥ�]:[ɽ��̾]<br />��ñ�̤ǵ��ҡ���Ƭ�� # ���֤���̵�뤵��ޤ���' );
define( $constpref.'_SHARE_HOLDER' ,            '��ͭ�ۥ��' );
define( $constpref.'_THUMBNAIL_SIZE' ,          '�����������Υ���ͥ��륵����' );
define( $constpref.'_THUMBNAIL_SIZE_DESC' ,     'BB�����ɤǤβ����������Υ���ͥ��륵�����ε�����(px)' );
define( $constpref.'_DEFAULT_ITEM_PERM' ,       '��������륢���ƥ�Υѡ��ߥå����' );
define( $constpref.'_DEFAULT_ITEM_PERM_DESC' ,  '�ѡ��ߥå�����3���[�ե����륪���ʡ�][���롼��][������]<br />�Ʒ� 2�ʿ�4bit�� [��ɽ��(h)][�ɤ߹���(r)][�񤭹���(w)][��å����(u)]<br />744: �����ʡ� 7 = -rwu, ���롼�� 4 = -r--, ������ 4 = -r--' );
define( $constpref.'_USE_USERS_DIR' ,           '�桼�����̥ۥ���λ���' );
define( $constpref.'_USE_USERS_DIR_DESC' ,      '' );
define( $constpref.'_USERS_DIR_PERM' ,          '�桼�����̥ۥ���Υѡ��ߥå����' );
define( $constpref.'_USERS_DIR_PERM_DESC' ,     '�����Ǥ�����Ϻ������Τ߻��Ȥ���ޤ���������� elFinder ��ľ���ѹ����Ƥ���������<br />��: 7cc: �����ʡ� 7 = -rwu, ���롼�� c = hr--, ������ c = hr--' );
define( $constpref.'_USERS_DIR_ITEM_PERM' ,     '�桼�����̥ۥ���˺�������륢���ƥ�Υѡ��ߥå����' );
define( $constpref.'_USERS_DIR_ITEM_PERM_DESC' ,'�����Ǥ�����Ϻ������Τ߻��Ȥ���ޤ���������� elFinder ��ľ���ѹ����Ƥ���������<br />��: 7cc: �����ʡ� 7 = -rwu, ���롼�� c = hr--, ������ c = hr--' );
define( $constpref.'_USE_GUEST_DIR' ,           '�������ѥۥ���λ���' );
define( $constpref.'_USE_GUEST_DIR_DESC' ,      '' );
define( $constpref.'_GUEST_DIR_PERM' ,          '�������ѥۥ���Υѡ��ߥå����' );
define( $constpref.'_GUEST_DIR_PERM_DESC' ,     '�����Ǥ�����Ϻ������Τ߻��Ȥ���ޤ���������� elFinder ��ľ���ѹ����Ƥ���������<br />��: 766: �����ʡ� 7 = -rwu, ���롼�� 6 = -rw-, ������ 6 = -rw-' );
define( $constpref.'_GUEST_DIR_ITEM_PERM' ,     '�������ѥۥ���˺�������륢���ƥ�Υѡ��ߥå����' );
define( $constpref.'_GUEST_DIR_ITEM_PERM_DESC' ,'�����Ǥ�����Ϻ������Τ߻��Ȥ���ޤ���������� elFinder ��ľ���ѹ����Ƥ���������<br />��: 744: �����ʡ� 7 = -rwu, ���롼�� 4 = -r--, ������ 4 = -r--' );
define( $constpref.'_USE_GROUP_DIR' ,           '���롼���̥ۥ���λ���' );
define( $constpref.'_USE_GROUP_DIR_DESC' ,      '' );
define( $constpref.'_GROUP_DIR_PARENT' ,        '���롼���̥ۥ���οƥۥ��̾' );
define( $constpref.'_GROUP_DIR_PARENT_DESC' ,   '' );
define( $constpref.'_GROUP_DIR_PARENT_NAME' ,   '���롼�������');
define( $constpref.'_GROUP_DIR_PERM' ,          '���롼���̥ۥ���Υѡ��ߥå����' );
define( $constpref.'_GROUP_DIR_PERM_DESC' ,     '�����Ǥ�����Ϻ������Τ߻��Ȥ���ޤ���������� elFinder ��ľ���ѹ����Ƥ���������<br />��: 768: �����ʡ� 7 = -rwu, ���롼�� 6 = -rw-, ������ 8 = h---' );
define( $constpref.'_GROUP_DIR_ITEM_PERM' ,     '���롼���̥ۥ���˺�������륢���ƥ�Υѡ��ߥå����' );
define( $constpref.'_GROUP_DIR_ITEM_PERM_DESC' ,'�����Ǥ�����Ϻ������Τ߻��Ȥ���ޤ���������� elFinder ��ľ���ѹ����Ƥ���������<br />��: 748: �����ʡ� 7 = -rwu, ���롼�� 4 = -r--, ������ 8 = h---' );

define( $constpref.'_UPLOAD_ALLOW_ADMIN' ,      '�����Ԥ˥��åץ��ɤ���Ĥ��� MIME ������' );
define( $constpref.'_UPLOAD_ALLOW_ADMIN_DESC' , 'MIME �����פ�Ⱦ�ѥ��ڡ������ڤ�ǵ��ҡ�<br />all: ���Ƶ���, none: ������Ĥ��ʤ�<br />��: image text/plain' );
define( $constpref.'_AUTO_RESIZE_ADMIN' ,       '�������Ѽ�ư�ꥵ���� (px)' );
define( $constpref.'_AUTO_RESIZE_ADMIN_DESC' ,  '�����򥢥åץ��ɻ������ꤷ������������˼��ޤ�褦�˼�ư�ꥵ����������(px)��<br />�������Ϥ��ʤ��ȼ�ư�ꥵ�����ϹԤ��ޤ���' );

define( $constpref.'_SPECIAL_GROUPS' ,          '���ꥰ�롼��' );
define( $constpref.'_SPECIAL_GROUPS_DESC' ,     '���ꥰ�롼�פȤ��륰�롼�פ����� (ʣ�������)' );
define( $constpref.'_UPLOAD_ALLOW_SPGROUPS' ,   '���ꥰ�롼�פ˥��åץ��ɤ���Ĥ��� MIME ������' );
define( $constpref.'_UPLOAD_ALLOW_SPGROUPS_DESC','' );
define( $constpref.'_AUTO_RESIZE_SPGROUPS' ,    '���ꥰ�롼���Ѽ�ư�ꥵ���� (px)' );
define( $constpref.'_AUTO_RESIZE_SPGROUPS_DESC','' );

define( $constpref.'_UPLOAD_ALLOW_USER' ,       '��Ͽ�桼�����˥��åץ��ɤ���Ĥ��� MIME ������' );
define( $constpref.'_UPLOAD_ALLOW_USER_DESC' ,  '' );
define( $constpref.'_AUTO_RESIZE_USER' ,        '��Ͽ�桼�����Ѽ�ư�ꥵ���� (px)' );
define( $constpref.'_AUTO_RESIZE_USER_DESC',    '' );

define( $constpref.'_UPLOAD_ALLOW_GUEST' ,      '�����Ȥ˥��åץ��ɤ���Ĥ��� MIME ������' );
define( $constpref.'_UPLOAD_ALLOW_GUEST_DESC' , '' );
define( $constpref.'_AUTO_RESIZE_GUEST' ,       '�������Ѽ�ư�ꥵ���� (px)' );
define( $constpref.'_AUTO_RESIZE_GUEST_DESC',   '' );

define( $constpref.'_DISABLE_PATHINFO' ,        '�ե����뻲��URL�� PathInfo ��̵���ˤ���' );
define( $constpref.'_DISABLE_PATHINFO_DESC' ,   '' );

define( $constpref.'_EDIT_DISABLE_LINKED' ,     '��󥯺Ѥߥե�����ν񤭹��߶ػ�' );
define( $constpref.'_EDIT_DISABLE_LINKED_DESC' ,'����ڤ�����Ѱդʾ�񤭤��ɻߤ��뤿��˥�󥯡����Ȥ��줿�ե������ưŪ�˽񤭹��߶ػߤ����ꤷ�ޤ���' );

define( $constpref.'_DEBUG' ,                   '�ǥХå��⡼�ɤ�ͭ���ˤ���' );
define( $constpref.'_DEBUG_DESC' ,              '�ǥХå��⡼�ɤˤ���� elFinder �� "elfinder.min.css", "elfinder.min.js" �ǤϤʤ����̤Υե�������ɤ߹��ߤޤ���<br />�ޤ���JavaScript �Υ쥹�ݥ󥹤˥ǥХ������ޤ�ޤ���<br />�ѥե����ޥ󥹸���Τ���ˡ��̾�ϥǥХå��⡼�ɤ�̵���ˤ��Ʊ��Ѥ��뤳�Ȥ򤪴��ᤷ�ޤ���' );

}
