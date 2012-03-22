<?php
/*
 * Created on 2008/11/10 by nao-pon http://hypweb.net/
 * License: GPL v2 or (at your option) any later version
 * $Id: pluginlist.lng.php,v 1.12 2011/07/29 06:23:06 nao-pon Exp $
 */

$msg = array(
	'dirname' => '�ǥ��쥯�ȥ�̾',
	'addline' => array(
		'title' => '�귿ʸ�ɲ�',
		'block_usage' => '#addline(����̾[,above|,below|,up|,down][,number|,nonumber][,btn:<�ܥ���ƥ�����>][,ltext:<���ƥ�����>][,rtext:<���ƥ�����>])',
		'inline_usage' => '&addline(����̾[,before|,after|,above|,below|,up|,down][,number|,nonumber]){<�ܥ���ƥ�����>};'
	),
	'amazon' => array(
		'title' => 'Amazon',
		'block_usage' => '#amazon([ASIN-number][,left|,right][,book-title|,image|,delimage|,deltitle|,delete])',
		'inline_usage' => '&amazon(ASIN-number);'
	),
	'areaedit' => array(
		'title' => '��ʬ�Խ�',
		'block_usage' => '#areaedit([start|end][,btn:<text>][,nofreeze][,noauth][,collect[:<page>]])',
		'inline_usage' => '&areaedit([nofreeze][,noauth][,preview[:<num>]]){<Text>};'
	),
	'article' => array(
		'title' => '�Ǽ���',
		'block_usage' => '#article',
		'inline_usage' => ''
	),
	'attach' => array(
		'title' => 'ź�եե�����ե�����',
		'block_usage' => '#attach([,nolist][,noform][,noattach])',
		'inline_usage' => ''
	),
	'aws' => array(
		'title' => 'Amazon Web Service',
		'block_usage' => '#aws(<TemplateName>,<SearchIndex>,<Keyword>[,<BrowseNode>][,<SortMode>])',
		'inline_usage' => ''
	),
	'back' => array(
		'title' => '�����ץܥ���',
		'block_usage' => '#back([text],[center|left|right][,0(no hr)[,Page-or-URI-to-back]])',
		'inline_usage' => ''
	),
	'block' => array(
		'title' => '<div>�֥�å�',
		'block_usage' => "#block([end][,clear][,left|,center|,right][,around][,tate][,h:<�⤵>][,width:<��>|w:<��>][,class:<���饹̾>][,font-size:<�ե���ȥ�����>][,round]){{\n<Wiki�ƥ�����>\n}}",
		'inline_usage' => ''
	),
	'calendar2' => array(
		'title' => '��������',
		'block_usage' => '#calendar2([pagename|*][,yyyymm|,yyyymmdd][,off])',
		'inline_usage' => ''
	),
	'calendar9' => array(
		'title' => '��ĥ��������',
		'block_usage' => '#calendar9([pagename|*][,yyyymm][,0-6])',
		'inline_usage' => ''
	),
	'calendar_viewer' => array(
		'title' => '��������ɽ��',
		'block_usage' => '#calendar_viewer([yyyy-mm|n|this],[past|futur|view][,<Separater>])',
		'inline_usage' => ''
	),
	'capture' => array(
		'title' => '��ʬ����',
		'block_usage' => "#caputer(ID){{\n<Wiki�ƥ�����>\n}}",
		'inline_usage' => ''
	),
	'chat' => array(
		'title' => 'AjaxChat����',
		'block_usage' => '#chat([staypos:r][,height:<�⤵>][,id:ChatID])',
		'inline_usage' => ''
	),
	'clear' => array(
		'title' => '�����߲��',
		'block_usage' => '#clear',
		'inline_usage' => ''
	),
	'code' => array(
		'title' => '������������ɽ��',
		'block_usage' => "#code([<Type>][,[\d]-[\d]][,number|nonumber][,outline|nooutline][,block|noblock][,literal|noliteral][,comment|nocomment][,menu|nomenu][,icon|noicon][,link|nolink]){{\n<������������>\n}}",
		'inline_usage' => ''
	),
	'comment' => array(
		'title' => '��ԥ�����',
		'block_usage' => '#comment([noname][,nodate][,above|,below][,cols:<���>][,multi:<�Կ�>])',
		'inline_usage' => ''
	),
	'contents' => array(
		'title' => '�ܼ�',
		'block_usage' => '#contents',
		'inline_usage' => ''
	),
	'counter' => array(
		'title' => '�ڡ���������',
		'block_usage' => '#counter',
		'inline_usage' => '&counter([total|today|yesterday]);'
	),
	'edit' => array(
		'title' => '�Խ����',
		'block_usage' => '',
		'inline_usage' => '&edit([<�ڡ���̾>{[,nolabel][,noicon]}]){<��٥�̾>};'
	),
	'exifshowcase' => array(
		'title' => '��������',
		'block_usage' => '#exifshowcase([<��Хѥ�����>][,Left|,Center|,Right][,Wrap|,Nowrap][,Around][,nolink][,noimg][,<��>x<�⤵>][,<����Ψ>%][,info][,nomapi][,nokash][,noexif][,reverse][,sort][,col:<������>][,row:<���>][,<���>])',
		'inline_usage' => '&exifshowcase([<��Хѥ�����>][,nolink][,noimg][,<��>x<�⤵>][,<����Ψ>%][,info][,nomapi][,nokash][,noexif][,reverse][,sort][,col:<������>][,row:<���>][,<���>]);'
	),
	'footnotes' => array(
		'title' => '�������ꡦɽ��',
		'block_usage' => '#footnotes([<���ƥ���>:<����>:][,<���ƥ���̾>:<����>:]...)'."\n".'#footnotes([force][,nobr][,nohr][,<�оݥ��ƥ���>[,catrgory]]...)',
		'inline_usage' => ''
	),
	'fusen' => array(
		'title' => '��䵥ѥͥ�',
		'block_usage' => '#fusen([refresh:<��ư�����ÿ�>][,height:<��䵥��ꥢ�ι⤵>][,off])',
		'inline_usage' => ''
	),
	'googlemaps2' => array(
		'title' => 'GoogleMap',
		'block_usage' => '#googlemaps2([mapname=<Map̾>][,width=<��>][,height=<�⤵>][,lat=<����>][,lng=<����>][,zoom=<�̼���>][,mapctrl=<none|normal|smallzoom|small|large>][,type=<normal|satellite|hybrid>][,typectrl=<none|normal>][,scalectrl=<none|normal>][,overviewctrl=<none|normal>][,crossctrl=<none|show>][,overviewwidth=<�⤵>][,overviewheight=<��>][,togglemarker=<true|false>][,noiconname=<��������̵���Υ�٥�>][,dbclickzoom=<true|false>][,continuouszoom=<true|false>][,geoxml=<KML, GeoRSS��URL>][,googlebar=<true|false>][,importicon=][,backlinkmarker=<true|false>][,wikitag=<none|show>][,autozoom=<true|false>])',
		'inline_usage' => '&googlemaps2([mapname=<Map̾>][,width=<��>][,height=<�⤵>][,lat=<����>][,lng=<����>][,zoom=<�̼���>][,mapctrl=<none|normal|smallzoom|small|large>][,type=<normal|satellite|hybrid>][,typectrl=<none|normal>][,scalectrl=<none|normal>][,overviewctrl=<none|normal>][,crossctrl=<none|show>][,overviewwidth=<�⤵>][,overviewheight=<��>][,togglemarker=<true|false>][,noiconname=<��������̵���Υ�٥�>][,dbclickzoom=<true|false>][,continuouszoom=<true|false>][,geoxml=<KML, GeoRSS��URL>][,googlebar=<true|false>][,importicon=][,backlinkmarker=<true|false>][,wikitag=<none|show>][,autozoom=<true|false>]);'
	),
	'googlemaps2_insertmarker' => array(
		'title' => '',
		'block_usage' => '#googlemaps2_insertmarker([mapname=<Map̾>][,direction=<up|down>])',
		'inline_usage' => ''
	),
	'iframe' => array(
		'title' => '<IFRAME> ����',
		'block_usage' => '#iframe(<URL>[,style:<CSS Text>][,iestyle:<CSS Text>])',
		'inline_usage' => '&iframe(<URL>[,style:<CSS Text>][,iestyle:<CSS Text>]);'
	),
	'include' => array(
		'title' => '¾�ڡ�������',
		'block_usage' => '#include(<�ڡ���̾>[,title|,notitle])',
		'inline_usage' => ''
	),
	'isbn' => array(
		'title' => 'Amazon',
		'block_usage' => '#isbn(<ASIN>[,clear][,img][,info][,header][,left])',
		'inline_usage' => '&isbn(<ASIN>[,simg][,mimg][,limg])[{<ɽ���ƥ�����>}];'
	),
	'jsmath' => array(
		'title' => '����(jsMath)',
		'block_usage' => "#jsmath([mimeTeX][,AMSmath][,AMSsymbols][,autobold][,boldsymbo][,verb][,smallFonts][,noImageFonts][,lobal][,noGlobal][,noCache][,CHMmode][,spriteImageFonts])[{{\n<����>\n}}]",
		'inline_usage' => '&jsmath([mimeTeX][,AMSmath][,AMSsymbols][,autobold][,boldsymbo][,verb][,smallFonts][,noImageFonts][,lobal][,noGlobal][,noCache][,CHMmode][,spriteImageFonts]){<����>};'
	),
	'lastmod' => array(
		'title' => '�ڡ����ǽ���������',
		'block_usage' => '',
		'inline_usage' => '&lastmod([<�ڡ���̾>]);'
	),
	'lookup' => array(
		'title' => 'InterWiki�ե�����',
		'block_usage' => '#lookup(<InterWikiName>[,<�ܥ���̾>[,<������ν����>]])',
		'inline_usage' => ''
	),
	'ls2' => array(
		'title' => '�ڡ�������',
		'block_usage' => '#ls2([[<�١����ڡ���̾>][,title][,include][,reverse][,compact][,link][,<link����̾ɽ��>])',
		'inline_usage' => ''
	),
	'lsx' => array(
		'title' => '��ĥ�ڡ�������',
		'block_usage' => '#lsx([[prefix:]<�١����ڡ���>][,num:<ɽ�����>][,depth:<ɽ�����ؿ�>][,hierarchy][,basename][,tree:[leaf|dir]][,sort:[name|date]][,reverse][,non_list][,except:<�����ڡ���̾����ɽ��>][,filter:<�оݥڡ���̾����ɽ��>][,date][,new][,order][,info:[date|new]][,contents][,include][,tag:<����>][,notitle])',
		'inline_usage' => ''
	),
	'memo' => array(
		'title' => '�ʰץ��',
		'block_usage' => '#memo',
		'inline_usage' => ''
	),
	'moblog' => array(
		'title' => 'moblog Cron',
		'block_usage' => '#moblog',
		'inline_usage' => ''
	),
	'new' => array(
		'title' => '����񼰲�',
		'block_usage' => '',
		'inline_usage' => "&new([<�ڡ���̾>][,nolink]);\n&new([nodate][,class:<���饹̾>]){<����ʸ����>};"
	),
	'navi' => array(
		'title' => '�ڡ����ʥӥ��������',
		'block_usage' => '#navi([<�ܼ��ڡ���>])',
		'inline_usage' => ''
	),
	'newpage' => array(
		'title' => '�ڡ��������ե�����',
		'block_usage' => '#newpage([this|<�١����ڡ���̾>])',
		'inline_usage' => ''
	),
	'noattach' => array(
		'title' => 'ź�եե�����ꥹ����ɽ��',
		'block_usage' => '#noattach',
		'inline_usage' => ''
	),
	'noautolink' => array(
		'title' => '�����ȥ��̵��',
		'block_usage' => '#noautolink',
		'inline_usage' => ''
	),
	'nocontents' => array(
		'title' => '�ܼ��������',
		'block_usage' => '#nocontents',
		'inline_usage' => ''
	),
	'nofollow' => array(
		'title' => 'NOFOLLOW,NOINDEX',
		'block_usage' => '#nofollow',
		'inline_usage' => ''
	),
	'noheader' => array(
		'title' => '�ڡ����إå���ɽ��',
		'block_usage' => '#noheader',
		'inline_usage' => ''
	),
	'nopagecomment' => array(
		'title' => '�ڡ���������̵��',
		'block_usage' => '#nopagecomment',
		'inline_usage' => ''
	),
	'norelated' => array(
		'title' => '��Ϣ�ڡ�����ɽ��',
		'block_usage' => '#norelated',
		'inline_usage' => ''
	),
	'online' => array(
		'title' => '����饤��桼������',
		'block_usage' => '#online',
		'inline_usage' => '&online;'
	),
	'pagepopup' => array(
		'title' => '�ݥåץ��å� �ڡ������',
		'block_usage' => '',
		'inline_usage' => '&pagepopup(<�ڡ���̾>)[{<ɽ���ƥ�����>}];'
	),
	'pcomment' => array(
		'title' => '��ĥ��ԥ�����',
		'block_usage' => '#pcomment([�����ȵ�Ͽ�ڡ���][,ɽ�����][,noname][,nodate][,above|,below][,reply][,cols:<���>][,multi:<�Կ�>])',
		'inline_usage' => ''
	),
	'popular' => array(
		'title' => '�͵��ο���',
		'block_usage' => '#popular([[���],[�оݳ��ڡ���],[today|1|yesterday|-1|total|0],[<�١����ڡ���̾>],[0|1]])',
		'inline_usage' => ''
	),
	'pre' => array(
		'title' => '�����Ѥ�',
		'block_usage' => "#pre(){{\n<�����Ѥߥƥ�����>\n}}",
		'inline_usage' => ''
	),
	'random' => array(
		'title' => '�����ॸ����',
		'block_usage' => '#random([<ɽ���ƥ�����>])',
		'inline_usage' => ''
	),
	'recent' => array(
		'title' => '�Ƕ�ο���',
		'block_usage' => '#recent([<�١����ڡ���̾>][,<���>][,<�о�̤������>][,<�о�uid>])',
		'inline_usage' => ''
	),
	'region' => array(
		'title' => '�ޤꤿ���ߥƥ�����',
		'block_usage' => "#region(<�����ȥ�>){{\n<�ޤꤿ���ޤ��Wiki�ƥ�����>\n}}",
		'inline_usage' => ''
	),
	'related' => array(
		'title' => '���ȥڡ�������',
		'block_usage' => '#related([<ɽ�����>[,nopassage][,notitle][,context][,context:<����Х��ȿ�>/<����ʬ���>][,separate][,highlight]])',
		'inline_usage' => ''
	),
	'relatedview' => array(
		'title' => '���ȸ����Ѱ���',
		'block_usage' => '#relatedview([noautolink][,nowikiname][,eachpage][,search:<�ڡ���̾�ޤ��ϥǥ�ߥ�"#"������ɽ��)>][,nosearch:<�ڡ���̾�ޤ��ϥǥ�ߥ�"#"������ɽ��>])',
		'inline_usage' => ''
	),
	'rsslink' => array(
		'title' => 'RSS���',
		'block_usage' => '',
		'inline_usage' => '&rsslink([[<�١����ڡ���̾>][[,1.0|,2.0|,atom][,<���Ϸ��>]]]);'
	),
	'ruby' => array(
		'title' => '����Ǥ�',
		'block_usage' => '',
		'inline_usage' => '&ruby(<�դ꤬��>){<�о�ʸ����>};'
	),
	'search' => array(
		'title' => '�����ե�����',
		'block_usage' => '#search([��о��1[,��о��2][,��о��n]...)',
		'inline_usage' => ''
	),
	'setlang' => array(
		'title' => '�������',
		'block_usage' => "#setlang(ja|zh|cn|ko){{\n<Wiki�ƥ�����>\n}}",
		'inline_usage' => '&setlang(ja|zh|cn|ko){<ɽ��ʸ����>};'
	),
	'showrss' => array(
		'title' => '����RSSɽ��',
		'block_usage' => '#showrss(<RSS URL>[,[default|menubar|recent][,[<����å�����¸����>[,<��������ɽ��;0|1>[,<Discriptionɽ��;0|1>[,<ɽ�����>]]]]])',
		'inline_usage' => ''
	),
	'siteimage' => array(
		'title' => '���������ȥ���ͥ���',
		'block_usage' => '#siteimage(<����������URL>[,nolink][,target:<�������å�̾>][,size:s|m|l][,around][,right|center|left])',
		'inline_usage' => '&siteimage(<����������URL>[,nolink][,target:<�������å�̾>][,size:s|m|l]);'
	),
	'skin_changer' => array(
		'title' => '�����������',
		'block_usage' => '#skin_changer',
		'inline_usage' => '&skin_changer([<������̾>])[{<ɽ���ƥ�����>}];'
	),
	'tag' => array(
		'title' => '��������, �������饦��',
		'block_usage' => '#tag([<�������饦�ɺ���ɽ�����>])',
		'inline_usage' => '&tag(<����1>[,<����2>][,<����3>]...);'
	),
	'tdiary' => array(
		'title' => 'tDiary�ơ���ȿ��',
		'block_usage' => '#tdiary(<tDiary�ơ���̾>)',
		'inline_usage' => ''
	),
	'temp' => array(
		'title' => '����ƥ�ץ졼��',
		'block_usage' => "#temp(<�ƥ�ץ졼��̾>[,����1][,����2]...){{\n<Wiki�ƥ�����>\n}}",
		'inline_usage' => ''
	),
	'tracker' => array(
		'title' => '���ե�����',
		'block_usage' => '#tracker([<���̾>][,<�١����ڡ���̾>])',
		'inline_usage' => ''
	),
	'tracker_list' => array(
		'title' => '���ꥹ��',
		'block_usage' => '#tracker_list([<���̾>][,[<�١����ڡ���̾>][,[[<�����ȹ���>]:[SORT_ASC|SORT_DESC]][,<ɽ����¿�>]]]])',
		'inline_usage' => ''
	),
	'ucomedit' => array(
		'title' => 'EXIF�������Խ�',
		'block_usage' => '#ucomedit(filename[,formonly])',
		'inline_usage' => ''
	),
	'urlbookmark' => array(
		'title' => '�ʰץ�󥯽�',
		'block_usage' => '#urlbookmark([notitle][,nodate][,above|,below])',
		'inline_usage' => ''
	),
	'vote' => array(
		'title' => '��ɼ�ե�����',
		'block_usage' => '#vote([<����1>][,<����2>]...[,#add][,#notimestamp][,#sort][,#ksort][,#nomail])',
		'inline_usage' => ''
	),
	'xoopsblock' => array(
		'title' => 'XOOPS�֥�å�ɽ��',
		'block_usage' => '#xoopsblock([<�֥�å�ID 1>][,<�֥�å�ID 2>]...)',
		'inline_usage' => ''
	),
	'yahoo' => array(
		'title' => 'Yahoo! API',
		'block_usage' => '#yahoo(web|img|mov,<������>[,type:and|or|word][,max:<ɽ�����>][,col:<ɽ�����>][,row:<ɽ���Կ�>][,target:<�������å�̾>])',
		'inline_usage' => ''
	),
);
