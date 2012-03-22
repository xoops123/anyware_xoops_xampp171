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

define('_MI_MYCKEDITOR_LANG_FMANAGER', "「サーバーブラウザー」（ファイル用）ボタンの表示");
define('_MI_MYCKEDITOR_DESC_FMANAGER', "");
define('_MI_MYCKEDITOR_LANG_FLASHM', "「サーバーブラウザー」（フラッシュ用）ボタンの表示");
define('_MI_MYCKEDITOR_DESC_FLASHM', "");
define('_MI_MYCKEDITOR_LANG_IMANAGER', "「サーバーブラウザー」（イメージ用）のボタン表示");
define('_MI_MYCKEDITOR_DESC_IMANAGER', "imagemagerを選択する場当には、テンプレートlegacy_image_list.htmlをCKEditor対応に変更してください");
define('_MI_MYCKEDITOR_LANG_FM_ALLOW', "(filemanege,pgrfilemanager)アップロード・編集許可ユーザーグループ");
define('_MI_MYCKEDITOR_DESC_FM_ALLOW', "アップロード許可を管理者以外のユーザーグループにも与える指定です<br />例 2,4 のようにグループＩＤをカンマで区切って指定してください");
define('_MI_MYCKEDITOR_LANG_IM_ALLOW', "(filemanege,pgrfilemanager,imagemager)イメージマネージャー使用ユーザーグループ");
define('_MI_MYCKEDITOR_DESC_IM_ALLOW', "「サーバーブラウザー」（イメージ用）のボタン表示でimagemagerを選んだときのアップロード許可はimagemager側でしてください。<br />例 2,4 のようにグループＩＤをカンマで区切って指定してください");
define('_MI_MYCKEDITOR_LANG_4USERDIR', "(filemanege,pgrfilemanager)ユーザー別のディレクトリにデータを保存する");
define('_MI_MYCKEDITOR_DESC_4USERDIR', "はいにすると自動でユーザーIDのディレクトリを作成します。<br />pgrfilemanagerはユーザーグループにも許可を与える場合は必須です");

define('_MI_MYCKEDITOR_LANG_ENTERMODE', "エンターキーで改行HTMLタグを自動挿入する(HTMLモード)");
define('_MI_MYCKEDITOR_DESC_ENTERMODE', "bbcodeでは自動改行が有効で使用しているデータとの互換のため、CKEditorでの改行の自動挿入を無効にしています。<br />HTMLモードでは必ずエンターキーで改行HTMLタグを自動挿入します");

//version 0.05 add lines
define('_MI_MYCKEDITOR_LANG_RESIZE', "(filemanege,pgrfilemanager)アップロード後に自動で縮小する");
define('_MI_MYCKEDITOR_DESC_RESIZE', "幅x高さの比率は変わりません、filemanegeではImageMagickが使用できるサーバーである必要があります");
define('_MI_MYCKEDITOR_LANG_RESIZEPIX', "(filemanege,pgrfilemanager)幅x高さの最大サイズ。10～1024で指定してください（単位ピクセル 初期値:480）");
define('_MI_MYCKEDITOR_DESC_RESIZEPIX', "指定したサイズ以下のイメージのサイズは変更しません");

define('_MI_MYCKEDITOR_LANG_THUMBS', "(filemanege)アップロードの時に、サムネイルも自動で作成する");
define('_MI_MYCKEDITOR_DESC_THUMBS', "filemanegeではImageMagickが使用できるサーバーである必要があります");
define('_MI_MYCKEDITOR_LANG_THUMBSPIX', "(filemanege,pgrfilemanager)サムネイルのサイズ（単位ピクセル 初期値:64）");
define('_MI_MYCKEDITOR_DESC_THUMBSPIX', "10～140で指定してください");
define('_MI_MYCKEDITOR_LANG_THUMBSTYPE', "(filemanege)サムネイルの作成モード");
define('_MI_MYCKEDITOR_DESC_THUMBSTYPE', "auto:幅x高さの比率を維持,box:幅x高さが同じ白台紙の中央に位置づける");

//version 0.06 add lines
define('_MI_MYCKEDITOR_LANG_PGRCACHEM', "(pgrfilemanager)画像処理を行わせるパッケージ選択");
define('_MI_MYCKEDITOR_DESC_PGRCACHEM', "GD:PHP標準のGDを使用する,ImageMagick:極力ImageMagickを使用する");
define('_MI_MYCKEDITOR_LANG_OVERCOPY', "(pgrfilemanager)画像のコピー・移動時に同名ファイルへの上書きを許可する");
define('_MI_MYCKEDITOR_DESC_OVERCOPY', "はい：同名のファイルもコピーします。いいえ：同名のファイルがあれば処理を中断します。");
define('_MI_MYCKEDITOR_LANG_USESITEIMG', "(pgrfilemanager)イメージマネージャ統合での[siteimg]タグ");
define('_MI_MYCKEDITOR_DESC_USESITEIMG', "イメージマネージャ統合で、[img]タグの代わりに[siteimg]タグを挿入するようになります。<br />利用モジュール側で[siteimg]タグが有効に機能するようになっている必要があります");

//version 0.07 add lines
define('_MI_MYCKEDITOR_LANG_USEREWRITE','(pgrfilemanager)mod_rewriteモードを有効にする');
define('_MI_MYCKEDITOR_DESC_USEREWRITE','これを有効にする場合、XOOPS_ROOT_PATH/modules/myckeditor/ 下にある.htaccess.rewriteを、.htaccessにリネームする必要があります。この機能は、XOOPSを運用しているサーバがApacheのmod_rewriteをサポートしていて、.htaccessでの指定が可能でなければ利用できません。');
define('_MI_MYCKEDITOR_LANG_USETRUSTIM','(pgrfilemanager)イメージの保存ディレクトリをXOOPS_TRUST_PATH/uploads/myckeditor/にアップロードする');
define('_MI_MYCKEDITOR_DESC_USETRUSTIM','これを利用にする場合には、mod_rewriteモードを有効になっている必要があります。');
define('_MI_MYCKEDITOR_LANG_ROOTPATH','(pgrfilemanager)データ保存の基準ディレクトリのパス');
define('_MI_MYCKEDITOR_DESC_ROOTPATH',htmlspecialchars( XOOPS_ROOT_PATH, ENT_QUOTES ).'/uploads/fckeditor以外を位置を指定できます。<br/>あらかじめ作成して書き込み可にしておく必要があります。(XOOPS_URLの中)urlとしてアクセスできる必要があります');
define('_MI_MYCKEDITOR_LANG_ROOTURL','(pgrfilemanager)データ保存の基準ディレクトリへのＵＲＬ');
define('_MI_MYCKEDITOR_DESC_ROOTURL','データ保存の基準ディレクトリのパスを変更する場合は、ここも変更してください。'.htmlspecialchars(XOOPS_URL, ENT_QUOTES ).'/uploads/fckeditor');
define('_MI_MYCKEDITOR_LANG_CACHEPATH','(pgrfilemanager)キャシュディレクトリのパス');
define('_MI_MYCKEDITOR_DESC_CACHEPATH',htmlspecialchars( XOOPS_ROOT_PATH, ENT_QUOTES ).'/uploads/fckeditor/cache 以外を位置を指定できます。<br/>最後は/cache で終わる様にしてください。(XOOPS_URLの中)urlとしてアクセスできる必要があります');
define('_MI_MYCKEDITOR_LANG_CACHEURL','(pgrfilemanager)キャシュディレクトリへのＵＲＬ');
define('_MI_MYCKEDITOR_DESC_CACHEURL','キャシュディレクトリのパスを変更する場合は、ここも変更してください。'.htmlspecialchars(XOOPS_URL, ENT_QUOTES ).'/uploads/fckeditor/cache');

define("_MI_MYCKEDITOR_BTITLE_PHOTO","画像ブロック");

}
?>