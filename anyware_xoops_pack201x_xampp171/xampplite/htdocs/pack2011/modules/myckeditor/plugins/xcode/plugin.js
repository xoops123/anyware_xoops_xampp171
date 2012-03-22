/*
 * BBCode Plugin v1.0 for CKEditor - http://www.site-top.com/
 * Copyright (c) 2010, PitBult.
 * - GNU Lesser General Public License Version 2.1 or later (the "LGPL")
 */

CKEDITOR.plugins.add( 'xcode',
{
	requires : [ 'htmlwriter' ],
	init : function( editor )
	{
		editor.dataProcessor = new CKEDITOR.htmlDataProcessor( editor );
	}
});

CKEDITOR.htmlDataProcessor.prototype =
{
	toHtml : function( data, fixForBody )
	{
		// Convert line breaks to <br>.
		data = data.replace( /(?:\r\n|\n|\r)/g, '<br>' ) ;

		// [url]
		//data = data.replace( /\[url\](.+?)\[\/url]/gi, '<a href="$1">$1</a>' ) ;
		//data = data.replace( /\[url\=([^\]]+)](.+?)\[\/url]/gi, '<a href="$1">$2</a>' ) ;
		data = data.replace( /\[url\](.+?)\[\/url]/gi, '<a href="$1">$1</a>' ) ;
		data = data.replace( /\[url\=([^\]]+)](.+?)\[\/url]/gi, '<a href="$1">$2</a>' ) ;

		// [b]
//		data = data.replace( /\[b\](.+?)\[\/b]/gim, '<b>$1</b>' ) ;
		data = data.replace( /\[b\]/gi, '<b>' ) ;
		data = data.replace( /\[\/b]/gi, '</b>' ) ;

		// [d]
//		data = data.replace( /\[d\](.+?)\[\/d]/gim, '<del>$1</del>' ) ;
		data = data.replace( /\[d\]/gi, '<del>' ) ;
		data = data.replace( /\[\/d]/gi, '</del>' ) ;

		// [i]
//		data = data.replace( /\[i\](.+?)\[\/i]/gim, '<i>$1</i>' ) ;
		data = data.replace( /\[i\]/gi, '<i>' ) ;
		data = data.replace( /\[\/i]/gi, '</i>' ) ;

		// [u]
//		data = data.replace( /\[u\](.+?)\[\/u]/gim, '<ins>$1</ins>' ) ;
		data = data.replace( /\[u\]/gi, '<ins>' ) ;
		data = data.replace( /\[\/u]/gi, '</ins>' ) ;

		// [quote]
		//data = data.replace( /\[quote\](.+?)\[\/quote]/gi, '<quote>$1</quote>' ) ;
		data = data.replace( /\[quote\]/gi, '<blockquote>' ) ;
		data = data.replace( /\[\/quote]/gi, "</blockquote>" ) ;

		// [code]
//		data = data.replace(/\[code\]([\s\S]*)\[\/code\]/gim,'<div class=xoopsCode><pre><code>$1</code></pre></div>');
		data = data.replace(/\[code\]/gi,'<div class=xoopsCode><pre><code>');
		data = data.replace(/\[\/code\]/gi,'</code></pre></div>');
		// [code]

		// [color]
//		data = data.replace(/\[color=(.*?)\]([\s\S]*)\[\/color\]/gi,'<span style="color: $1">$2</span>');

		//[size]<SPAN style="FONT-SIZE: 140%">test</SPAN>
//		data = data.replace(/\[size=(.*?)\]([\s\S]*)\[\/size\]/gi,'<span style="FONT-SIZE: $1">$2</span>');

		//[font]<SPAN style="FONT-FAMILY: ms pgothic, osaka, sans-serif">
//		data = data.replace(/\[font=(.*?)\]([\s\S]*)\[\/font\]/gi,'<span style="FONT-FAMILY: $1">$2</span>');


		// [img]
		//data = data.replace(/\[img\](.*?)\[\/img\]/gi,'<img src="$1" />');
//		data = data.replace(/\[img(.*?)\](.*?)\[\/img\]/gi,'<img$1 src="$2" />');

		return data;
	},

	toDataFormat : function( html, fixForBody )
	{

		html = html.replace( /<br>(?:\r\n|\n|\r)/gi, '\r\n') ;
		html = html.replace( /<br(?=[ \/>]).*?>/gi, '\r\n') ;

		// [url]
		html = html.replace( /<a .*?href=(["'])(.+?)\1.*?>(.+?)<\/a>/gi, '[url=$2]$3[/url]') ;
//		html = html.replace( /<a .*?href=(["']?)([^<>\[\]\s]?)\\1(["']?)\s+([^<>\[\]]?)*>(.+?)<\/a>/gi, '[url=$2]$5[/url]') ;
//		html = html.replace( /<a .*?href=(["']?)([^<>]?)\\1([^<>]?)*>(.+?)<\/a>/gi, '[url=$2]$4[/url]') ;

		// [b]
		html = html.replace( /<(?:b|strong)>/gi, '[b]') ;
		html = html.replace( /<\/(?:b|strong)>/gi, '[/b]') ;

		// [d]
		html = html.replace( /<(?:d|del)>/gi, '[d]') ;
		html = html.replace( /<\/(?:d|del)>/gi, '[/d]') ;

		// [i]
		html = html.replace( /<(?:i|em)>/gi, '[i]') ;
		html = html.replace( /<\/(?:i|em)>/gi, '[/i]') ;

		// [u]
		html = html.replace( /<ins>/gi, '[u]') ;
		html = html.replace( /<\/ins>/gi, '[/u]') ;

		// [quote]
		html = html.replace( /<blockquote>(?:\r\n|\n|\r)<p>/gim, '[quote]') ;
		html = html.replace( /<\/p><\/blockquote>/gim, '[/quote]') ;
		html = html.replace( /<blockquote>/gi, '[quote]') ;
		html = html.replace( /<\/blockquote>/gi, '[/quote]') ;

		// [code]
		// [code] <DIV class=xoopsCode><PRE><CODE>
		html = html.replace( /<div class=(["']?)xoopsCode(["']?)><pre><code>/gi, '[code]') ;
		html = html.replace( /<\/code><\/pre><\/div>/gi, '[/code]') ;
		// [code]

		// [color] <SPAN style="COLOR: #ffff00">
//		html = html.replace(/<span style=(["'])color: #?(.*?)(["'])>([\s\S]*)<\/span>/gi,"[color=$2]$4[/color]");
//		html = html.replace(/<font.*?color="#(.*?)".*?>([\s\S]*)<\/font>/gi,"[color=$1]$2[/color]");

		// [size]<SPAN style="FONT-SIZE: 140%">test</SPAN>
//		html = html.replace(/<span style=(["'])FONT-SIZE: ?(.*?)(["'])>([\s\S]*)<\/span>/gim,"[size=$2]$4[/size]");
//		html = html.replace(/<font.*?size="(.*?)".*?>([\s\S]*)<\/font>/gim,"[size=$1]$2[/size]");

		// [font]<SPAN style="FONT-FAMILY: ms pgothic, osaka, sans-serif">
//		html = html.replace(/<span style=(["'])FONT-FAMILY: ?(.*?)(["'])>([\s\S]*)<\/span>/gim,"[font=$2]$4[/font]");

		// [img]
		//html = html.replace( /<img .*?src=(["'])(.+?)\1.*?\/>/gi, '[img]$2[/img]') ;
		//html = html.replace( /<img .*?src=(["'])(.+?)\1.*?>/gi, '[img]$2[/img]') ;
//		html = html.replace(/<img.*?src=(["']?)(.+?)\1(["']?)(.*?)\/>/gi,"[img$4]$2[/img]");
//		html = html.replace(/<img.*?src=(["']?)(.+?)\1(["']?)(.*?)\>/gi,"[img$4]$2[/img]");

		return html;
	}
};