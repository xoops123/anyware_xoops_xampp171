<?php
/**
 * @file
 * @package myckeditor
 * @version $Id$
 */
if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( '_MI_MYCKEDITOR_LOADED' ) ) {

define( '_MI_MYCKEDITOR_LOADED' , 1 ) ;

define('_MI_MYCKEDITOR_LANG_MYCKEDITOR', "myckeditor");
define('_MI_MYCKEDITOR_DESC_MYCKEDITOR', "http://ckeditor.com/");

define('_MI_MYCKEDITOR_LANG_FMANAGER', "�֥����С��֥饦�����סʥե������ѡ˥ܥ����ɽ��");
define('_MI_MYCKEDITOR_DESC_FMANAGER', "");
define('_MI_MYCKEDITOR_LANG_FLASHM', "�֥����С��֥饦�����סʥե�å����ѡ˥ܥ����ɽ��");
define('_MI_MYCKEDITOR_DESC_FLASHM', "");
define('_MI_MYCKEDITOR_LANG_IMANAGER', "�֥����С��֥饦�����סʥ��᡼���ѡˤΥܥ���ɽ��");
define('_MI_MYCKEDITOR_DESC_IMANAGER', "imagemager�����򤹤�����ˤϡ��ƥ�ץ졼��legacy_image_list.html��CKEditor�б����ѹ����Ƥ�������");
define('_MI_MYCKEDITOR_LANG_FM_ALLOW', "(filemanege,pgrfilemanager)���åץ��ɡ��Խ����ĥ桼�������롼��");
define('_MI_MYCKEDITOR_DESC_FM_ALLOW', "���åץ��ɵ��Ĥ�����԰ʳ��Υ桼�������롼�פˤ�Ϳ�������Ǥ�<br />�� 2,4 �Τ褦�˥��롼�ףɣĤ򥫥�ޤǶ��ڤäƻ��ꤷ�Ƥ�������");
define('_MI_MYCKEDITOR_LANG_IM_ALLOW', "(filemanege,pgrfilemanager,imagemager)���᡼���ޥ͡����㡼���ѥ桼�������롼��");
define('_MI_MYCKEDITOR_DESC_IM_ALLOW', "�֥����С��֥饦�����סʥ��᡼���ѡˤΥܥ���ɽ����imagemager��������Ȥ��Υ��åץ��ɵ��Ĥ�imagemager¦�Ǥ��Ƥ���������<br />�� 2,4 �Τ褦�˥��롼�ףɣĤ򥫥�ޤǶ��ڤäƻ��ꤷ�Ƥ�������");
define('_MI_MYCKEDITOR_LANG_4USERDIR', "(filemanege,pgrfilemanager)�桼�����̤Υǥ��쥯�ȥ�˥ǡ�������¸����");
define('_MI_MYCKEDITOR_DESC_4USERDIR', "�Ϥ��ˤ���ȼ�ư�ǥ桼����ID�Υǥ��쥯�ȥ��������ޤ���<br />pgrfilemanager�ϥ桼�������롼�פˤ���Ĥ�Ϳ�������ɬ�ܤǤ�");

define('_MI_MYCKEDITOR_LANG_ENTERMODE', "���󥿡������ǲ���HTML������ư��������(HTML�⡼��)");
define('_MI_MYCKEDITOR_DESC_ENTERMODE', "bbcode�Ǥϼ�ư���Ԥ�ͭ���ǻ��Ѥ��Ƥ���ǡ����Ȥθߴ��Τ��ᡢCKEditor�Ǥβ��Ԥμ�ư������̵���ˤ��Ƥ��ޤ���<br />HTML�⡼�ɤǤ�ɬ�����󥿡������ǲ���HTML������ư�������ޤ�");

//version 0.05 add lines
define('_MI_MYCKEDITOR_LANG_RESIZE', "(filemanege,pgrfilemanager)���åץ��ɸ�˼�ư�ǽ̾�����");
define('_MI_MYCKEDITOR_DESC_RESIZE', "��x�⤵����Ψ���Ѥ��ޤ���filemanege�Ǥ�ImageMagick�����ѤǤ��륵���С��Ǥ���ɬ�פ�����ޤ�");
define('_MI_MYCKEDITOR_LANG_RESIZEPIX', "(filemanege,pgrfilemanager)��x�⤵�κ��祵������10���1024�ǻ��ꤷ�Ƥ���������ñ�̥ԥ����� �����:480��");
define('_MI_MYCKEDITOR_DESC_RESIZEPIX', "���ꤷ���������ʲ��Υ��᡼���Υ��������ѹ����ޤ���");

define('_MI_MYCKEDITOR_LANG_THUMBS', "(filemanege)���åץ��ɤλ��ˡ�����ͥ���⼫ư�Ǻ�������");
define('_MI_MYCKEDITOR_DESC_THUMBS', "filemanege�Ǥ�ImageMagick�����ѤǤ��륵���С��Ǥ���ɬ�פ�����ޤ�");
define('_MI_MYCKEDITOR_LANG_THUMBSPIX', "(filemanege)����ͥ���Υ�������ñ�̥ԥ����� �����:64��");
define('_MI_MYCKEDITOR_DESC_THUMBSPIX', "10���140�ǻ��ꤷ�Ƥ�������");
define('_MI_MYCKEDITOR_LANG_THUMBSTYPE', "(filemanege)����ͥ���κ����⡼��");
define('_MI_MYCKEDITOR_DESC_THUMBSTYPE', "auto:��x�⤵����Ψ��ݻ�,box:��x�⤵��Ʊ������������˰��֤Ť���");

//version 0.06 add lines
define('_MI_MYCKEDITOR_LANG_PGRCACHEM', "(pgrfilemanager)����������Ԥ碌��ѥå���������");
define('_MI_MYCKEDITOR_DESC_PGRCACHEM', "GD:PHPɸ���GD����Ѥ���,ImageMagick:����ImageMagick����Ѥ���");
define('_MI_MYCKEDITOR_LANG_OVERCOPY', "(pgrfilemanager)�����Υ��ԡ�����ư����Ʊ̾�ե�����ؤξ�񤭤���Ĥ���");
define('_MI_MYCKEDITOR_DESC_OVERCOPY', "�Ϥ���Ʊ̾�Υե�����⥳�ԡ����ޤ�����������Ʊ̾�Υե����뤬����н��������Ǥ��ޤ���");
define('_MI_MYCKEDITOR_LANG_USESITEIMG', "(pgrfilemanager)���᡼���ޥ͡���������Ǥ�[siteimg]����");
define('_MI_MYCKEDITOR_DESC_USESITEIMG', "���᡼���ޥ͡���������ǡ�[img]�����������[siteimg]��������������褦�ˤʤ�ޤ���<br />���ѥ⥸�塼��¦��[siteimg]������ͭ���˵�ǽ����褦�ˤʤäƤ���ɬ�פ�����ޤ�");

//version 0.07 add lines
define('_MI_MYCKEDITOR_LANG_USEREWRITE','(pgrfilemanager)mod_rewrite�⡼�ɤ�ͭ���ˤ���');
define('_MI_MYCKEDITOR_DESC_USEREWRITE','�����ͭ���ˤ����硢XOOPS_ROOT_PATH/modules/myckeditor/ ���ˤ���.htaccess.rewrite��.htaccess�˥�͡��ह��ɬ�פ�����ޤ������ε�ǽ�ϡ�XOOPS���Ѥ��Ƥ��륵���Ф�Apache��mod_rewrite�򥵥ݡ��Ȥ��Ƥ��ơ�.htaccess�Ǥλ��꤬��ǽ�Ǥʤ�������ѤǤ��ޤ���');
define('_MI_MYCKEDITOR_LANG_USETRUSTIM','(pgrfilemanager)���᡼������¸�ǥ��쥯�ȥ��XOOPS_TRUST_PATH/uploads/myckeditor/�˥��åץ��ɤ���');
define('_MI_MYCKEDITOR_DESC_USETRUSTIM','��������Ѥˤ�����ˤϡ�mod_rewrite�⡼�ɤ�ͭ���ˤʤäƤ���ɬ�פ�����ޤ���');
define('_MI_MYCKEDITOR_LANG_ROOTPATH','(pgrfilemanager)�ǡ�����¸�δ��ǥ��쥯�ȥ�Υѥ�');
define('_MI_MYCKEDITOR_DESC_ROOTPATH',htmlspecialchars( XOOPS_ROOT_PATH, ENT_QUOTES ).'/uploads/fckeditor�ʳ�����֤����Ǥ��ޤ���<br/>���餫����������ƽ񤭹��߲Ĥˤ��Ƥ���ɬ�פ�����ޤ���(XOOPS_URL����)url�Ȥ��ƥ��������Ǥ���ɬ�פ�����ޤ�');
define('_MI_MYCKEDITOR_LANG_ROOTURL','(pgrfilemanager)�ǡ�����¸�δ��ǥ��쥯�ȥ�ؤΣգң�');
define('_MI_MYCKEDITOR_DESC_ROOTURL','�ǡ�����¸�δ��ǥ��쥯�ȥ�Υѥ����ѹ�������ϡ��������ѹ����Ƥ���������'.htmlspecialchars(XOOPS_URL, ENT_QUOTES ).'/uploads/fckeditor');
define('_MI_MYCKEDITOR_LANG_CACHEPATH','(pgrfilemanager)���㥷��ǥ��쥯�ȥ�Υѥ�');
define('_MI_MYCKEDITOR_DESC_CACHEPATH',htmlspecialchars( XOOPS_ROOT_PATH, ENT_QUOTES ).'/uploads/fckeditor/cache �ʳ�����֤����Ǥ��ޤ���<br/>�Ǹ��/cache �ǽ�����ͤˤ��Ƥ���������(XOOPS_URL����)url�Ȥ��ƥ��������Ǥ���ɬ�פ�����ޤ�');
define('_MI_MYCKEDITOR_LANG_CACHEURL','(pgrfilemanager)���㥷��ǥ��쥯�ȥ�ؤΣգң�');
define('_MI_MYCKEDITOR_DESC_CACHEURL','���㥷��ǥ��쥯�ȥ�Υѥ����ѹ�������ϡ��������ѹ����Ƥ���������'.htmlspecialchars(XOOPS_URL, ENT_QUOTES ).'/uploads/fckeditor/cache');

}
?>