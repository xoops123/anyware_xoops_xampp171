<?php

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) ) $mydirname = 'wraps' ;
$constpref = '_MI_' . strtoupper( $mydirname ) ;

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( $constpref.'_LOADED' ) ) {

// a flag for this language file has already been read or not.
define( $constpref.'_LOADED' , 1 ) ;

// Main menu
define( $constpref.'_MENU_NEWPAGE',  'New Page');
define( $constpref.'_MENU_RECENT',   'Recent Changes');
define( $constpref.'_MENU_PAGELIST', 'Page List');
define( $constpref.'_MENU_HELP',     'Help');
define( $constpref.'_MENU_RELAYTED', 'Relayted');
define( $constpref.'_MENU_EDIT',     'Edit');
define( $constpref.'_MENU_SOURCE',   'Wiki Source');
define( $constpref.'_MENU_DIFF',     'Edit History');
define( $constpref.'_MENU_BACKUPS',  'Backups');
define( $constpref.'_MENU_ATTACHES', 'Attachments');
define( $constpref.'_MENU_REFERER',  'Referers');

// Names of blocks for this module (Not all module has blocks)
define( $constpref."_BNAME_A_PAGE","Mostrar p�gina  ({$mydirname})");
define( $constpref."_BDESC_A_PAGE","O conte�do pode ser mostrado em um bloco mediante especifica��o do nome da p�gina.");
define( $constpref."_BNAME_NOTIFICATION","Notifica��es ({$mydirname})");
define( $constpref."_BDESC_NOTIFICATION","Configurar notifica��es.");
define( $constpref."_BNAME_FUSEN","Fusen(Tag) ({$mydirname})");
define( $constpref."_BDESC_FUSEN","O Menu de controle do plugin Fusen(Tag)� mostrado.");
define( $constpref."_BNAME_MENUBAR","Barra do menu ({$mydirname})");
define( $constpref."_BDESC_MENUBAR","Mostrar a barra do men�");

define( $constpref.'_MODULE_DESCRIPTION' , 'M�dulo wiki baseado no PukiWiki.' ) ;

define( $constpref.'_PLUGIN_CONVERTER' , 'Conversor de Plugin' ) ;
define( $constpref.'_SKIN_CONVERTER' , 'Convertor de Skin ' ) ;
define( $constpref.'_ADMIN_CONF' , 'Prefer�ncias' ) ;
define( $constpref.'_ADMIN_TOOLS' , 'Ferramentas administrativas' ) ;
define( $constpref.'_ADMENU_MYLANGADMIN','Idiomas');
define( $constpref.'_ADMENU_MYTPLSADMIN','Modelos');
define( $constpref.'_ADMENU_MYBLOCKSADMIN','Blocos e permiss�es');
define( $constpref.'_ADMENU_MYPREFERENCES','Prefer�ncias');

define( $constpref.'_COM_DIRNAME','Integra��o de coment�rios: nome do diret�rio do d3forum');
define( $constpref.'_COM_FORUM_ID','Integra��o de coment�rios: ID do f�rum');
define( $constpref.'_COM_VIEW','Vizualiza��o da integra��o de coment�rios');
define( $constpref.'_COM_ORDER','Ordena��o da integra��o de coment�rios');
define( $constpref.'_COM_POSTSNUM','N�mero m�ximo de posts mostrados na integra��o de coment�rios');

// Notify Replaces
define($constpref.'_NOTCAT_REPLASE2MODULENAME', 'este m�dulo');
define($constpref.'_NOTCAT_REPLASE2FIRSTLEV', 'primeira hierarquia');
define($constpref.'_NOTCAT_REPLASE2SECONDLEV', 'segunda hierarquia');
//define($constpref.'_NOTCAT_REPLASE2PAGENAME', 'this page');

// Notify Categories
define($constpref.'_NOTCAT_PAGE', 'Est� p�gina');
define($constpref.'_NOTCAT_PAGEDSC', 'Notifica��es sobre est� p�gina.');
define($constpref.'_NOTCAT_PAGE1', 'primeira categoria ou inferior');
define($constpref.'_NOTCAT_PAGE1DSC', 'Notifica��es sobre a primeira categoria ou inferior');
define($constpref.'_NOTCAT_PAGE2', 'segunda categoria ou inferior');
define($constpref.'_NOTCAT_PAGE2DSC', 'Notifica��es sobre a segunda categoria ou inferior.');
define($constpref.'_NOTCAT_GLOBAL', 'este m�dulo');
define($constpref.'_NOTCAT_GLOBALDSC', 'Notifica��es sobre todo este m�dulo');

// Each Notifications
define($constpref.'_NOTIFY_PAGE_UPDATE', 'Editar p�gina');
define($constpref.'_NOTIFY_PAGE_UPDATECAP', 'Notifique-me se est� p�gina for estitada.');
define($constpref.'_NOTIFY_PAGE1_UPDATECAP', 'Notifique-me da edi��o da primeira hieraquia ou inferiores.');
define($constpref.'_NOTIFY_PAGE2_UPDATECAP', 'Notifique-me da edi��o da segunada hieraquia ou inferiores.');
define($constpref.'_NOTIFY_PAGE_UPDATESBJ', '[{X_SITENAME}] {X_MODULE}:{PAGE_NAME} foi editada');
define($constpref.'_NOTIFY_GLOBAL_UPDATECAP', 'Notifique-me quando qualquer p�gina do wiki for editada.');

}

