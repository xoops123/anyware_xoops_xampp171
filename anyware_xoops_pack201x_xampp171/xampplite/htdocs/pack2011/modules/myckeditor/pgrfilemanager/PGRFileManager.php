<?php
/*
Copyright (c) 2009 Grzegorz ?ydek

This file is part of PGRFileManager v2.1.0

Permission is hereby granted, free of charge, to any person obtaining a copy
of PGRFileManager and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

PGRFileManager IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/
//for XOOPS
require '../../../mainfile.php' ;

if (!defined('XOOPS_MODULE_PATH')) {
	define('XOOPS_MODULE_PATH', XOOPS_ROOT_PATH . '/modules');
}
if (!defined('XOOPS_MODULE_URL')) {
	define('XOOPS_MODULE_URL', XOOPS_URL . '/modules');
}
//------------------------------------------
$q_config_arr=array();
$q_config = 0;
/*
 * TODO If you want to specify more than three, please change the following
 */
if ( file_exists( dirname(__FILE__) . '/php/config.inc1.dist.php') ) {
	$q_config_arr[]=1;
}
if ( file_exists( dirname(__FILE__) . '/php/config.inc2.dist.php') ) {
	$q_config_arr[]=2;
}
if ( file_exists( dirname(__FILE__) . '/php/config.inc3.dist.php') ) {
	$q_config_arr[]=3;
}
if (isset($_SESSION['configchange']) && $_SESSION['configchange']){
	$q_config = intval($_SESSION['configchange']);
}

if (isset($_POST['configchange'])) {
	$q_config = intval($_POST['configchange']) ;
}
	$_SESSION['configchange'] = $q_config;

//init
    require_once dirname(__FILE__) . '/php/init.php';
    $PGRUploaderExtension = "";
    if (PGRFileManagerConfig::$allowedExtensions == "") $PGRUploaderExtension = "*.*";
    else
    foreach(explode("|", PGRFileManagerConfig::$allowedExtensions) as $key => $extension) {
        if ($key > 0) $PGRUploaderExtension .= ";";
        $PGRUploaderExtension .= "*." . $extension;
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo _LANGCODE?>" lang="<?php echo _LANGCODE?>">
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>PGRFileManager v2.1.0</title>
  <link rel="stylesheet" type="text/css" href="<?php echo XOOPS_URL ?>/common/css/smoothness/jquery-ui-1.8.16.custom.css" media="screen" charset="utf-8"/>
  <link rel="stylesheet" type="text/css" href="css/jquery.treeview.css" media="screen" charset="utf-8"/>
  <link rel="stylesheet" type="text/css" href="css/fancybox/jquery.fancybox-1.3.4.css" media="screen" charset="utf-8"/>
  <link rel="stylesheet" type="text/css" href="css/PGRFileManager.css" media="screen" charset="utf-8"/>
  <script type="text/javascript" src="<?php echo XOOPS_URL ?>/common/js/jquery-1.7.1.min.js" charset="utf-8"></script>
  <script type="text/javascript" src="<?php echo XOOPS_URL ?>/common/js/jquery-ui-1.8.16.custom.min.js" charset="utf-8"></script>
  <script type="text/javascript" src="js/jquery.treeview.js" charset="utf-8"></script>
  <script type="text/javascript" src="js/jquery.cookie.js" charset="utf-8"></script>
  <script type="text/javascript" src="SWFUpload v2.2.0.1 Core/swfupload.js" charset="utf-8"></script>
  <script type="text/javascript" src="js/jquery.i18n.js" charset="utf-8"></script>
  <script type="text/javascript" src="js/jquery.fancybox-1.3.4.pack.js" charset="utf-8"></script>
  <?php if (PGRFileManagerConfig::$ckEditorScriptPath):?>
  <script type="text/javascript" src="<?php echo PGRFileManagerConfig::$ckEditorScriptPath ?>" charset="utf-8"></script>
  <?php endif;?>
  <script type="text/javascript" src="lang/lang.js" charset="utf-8"></script>
  <script type="text/javascript" src="js/PGRUploader.js" charset="utf-8"></script>
  <script type="text/javascript" src="js/PGRContextMenu.js" charset="utf-8"></script>
  <script type="text/javascript" src="js/PGRSelectable.js" charset="utf-8"></script>
  <script type="text/javascript" src="js/PGRFileManager.js" charset="utf-8"></script>
  <script type="text/javascript" src="js/PGRFileManagerContent.js" charset="utf-8"></script>

  </head>
  <body>
    <div id="container" class="ui-widget ui-widget-content">
      <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-dialog-title-dialog" class="ui-dialog-title">PGRFile</span>
<!-- view option -->
    <div style="float:left;margin: 0;padding: 0;" >
    <input type="checkbox" id="switch_viewOption" onclick="if(this.checked){document.getElementById('viewOption').style.display='block';}else{document.getElementById('viewOption').style.display='none';}" />
    </div>
    <div id="viewOption" style="float:right;display:none;margin: 0;padding: 0;" >
	    <ul style="margin: 0;padding: 0;">
	    <li style="float:left;list-style:none;margin: 0;padding: 0; " >
	    <div style="margin: 0;padding: 0;">
	    <fieldset>
	        <table summary="viewname" id="viewname"><tr>
	        <td><input id="viewShortName" type="radio" name="vname" value="shortname" checked="checked" />
	        <label for="viewShortName">&nbsp;ShortName</label> &nbsp;
	        </td>
	        <td><input id="viewRealName" type="radio" name="vname" value="realname" />
	        <label for="viewRealName">&nbsp;Name</label> &nbsp;
	        </td>
	        <td><input id="viewSize" type="radio" name="vname" value="viewsize" />
	        <label for="viewSize" id="viewSizeLabel" >&nbsp;Size</label> &nbsp;
	        </td>
	        <td><input id="viewDate" type="radio" name="vname" value="viewdate" />
	        <label for="viewDate" id="viewDateLabel" >&nbsp;Date</label> &nbsp;
	        </td>
	        </tr></table>
	    </fieldset>
	    </div>
	    </li>
	    <li style="float:left;list-style:none;margin: 0;padding: 0; " >
	    <div style="margin: 0;padding: 0;">
	    <fieldset>
	        <table summary="order" id="order"><tr>
	        <td><input id="sortFName" type="radio" name="sort" value="fname" checked="checked" />
	            <label for="sortFName">&nbsp;Name</label> &nbsp;</td>
	        <td><input id="sortTime" type="radio" name="sort" value="date" />
	            <label for="sortTime">&nbsp;Date</label> &nbsp;</td>
	        <td><input id="sortSName" type="radio" name="sort" value="sname" />
	            <label for="sortSName">&nbsp;ShortName</label> &nbsp;</td>
	        <td><input id="sortType" type="radio" name="sort" value="type" />
	            <label for="sortType">&nbsp;Type</label> &nbsp;</td>
	        <td><input id="sortSize" type="radio" name="sort" value="size" />
	            <label for="sortSize">&nbsp;Size</label> &nbsp;</td>
	        </tr></table>
	    </fieldset>
	    </div>
	    </li>
	    <li style="float:left;list-style:none;margin: 0;padding: 0;" >
	    <div style=" float:right;margin: 0;padding: 0;" >
	      <input type="radio" name="Orderby" id="OrderbyDESC" checked="checked"  />
	      <label for="OrderbyDESC" style="margin: 0;padding: 0;" >DESC</label>
	      <br/>
	      <input type="radio" name="Orderby" id="OrderbyASC" />
	      <label for="OrderbyASC" style="margin: 0;padding: 0;"  >ASC</label>
	    </div>
	    </li>
	    </ul>
    </div>
<!--       <a class="ui-dialog-titlebar-close ui-corner-all" href="#"><span class="ui-icon ui-icon-closethick">close</span></a>-->
      </div>
      <div id="buttons">

<!--
      	<?php if (isset($_SESSION['PGRFileManagerAuthorized'])):?>
      	<form method="post">
      		<div>
        	<button id="btnLogoff" name="logoff" type="submit" class="ui-state-default ui-corner-all" style="float:left">sign out</button>
        	</div>
        </form>
        <?php endif;?>
-->
<?php
if ( ! empty($q_config_arr)){
//------------------------------------------
	echo '
	<form method="post">
	<div style="float:left">
	<select name="configchange" >
	<option value="0"'.(($q_config == 0) ? ' selected="selected"':'').'>standard</option>
	';
	foreach ($q_config_arr as $key => $value){
	echo '
	<option value="'.intval($value).'"'.(($q_config == $value) ? ' selected="selected"':'').'>setting'.intval($value).'</option>
	';
	}
	echo '
	</select>
	<button id="btnConfigChange" name="btnConfigChange" type="submit" class="ui-state-default ui-corner-all" style="float:left">Change</button>
	</div>
	</form>
	';
}
//-----------------------------------------------------
if(isset($_POST['thumbbbcode'])){
	$_SESSION['pgrfilemanager_thumbbbcode']=true;
}
if(isset($_POST['filenamebbcode'])){
	$_SESSION['pgrfilemanager_thumbbbcode']=false;
}
$target=preg_replace( '?[^a-zA-Z0-9_\-\[\]]?' , '' , @$_GET['target'] ) ;
if (!empty($target)){
	if (isset($_SESSION['pgrfilemanager_thumbbbcode']) && $_SESSION['pgrfilemanager_thumbbbcode']){
		echo '
		<form method="post">
		<div>
		<button id="btnFilenameBBCode" name="filenamebbcode" type="submit" class="ui-state-default ui-corner-all" style="float:left">Thumb&raquo;BBCode</button>
		</div>
		</form>
		';
	}else{
		echo '
		<form method="post">
		<div>
		<button id="btnThumbBBCcode" name="thumbbbcode" type="submit" class="ui-state-default ui-corner-all" style="float:left">Filename&raquo;BBCode</button>
		</div>
		</form>
		';
	}
}
?>
        <button id="btnRefresh" class="ui-state-default ui-corner-all">refresh</button>
        <button id="btnSelectAllFiles" value="realview" class="ui-state-default ui-corner-all">select all files</button>
        <button id="btnUnselectAllFiles" class="ui-state-default ui-corner-all">unselect all files</button>
        <select id="fileListType" class="ui-state-default ui-corner-all">
            <option value="icons">icons</option>
            <option value="list">list</option>
        </select>
      </div>
      <div id="content" class="ui-dialog-content ui-widget-content">
        <div id="leftColumn">
          <div id="folderList">
          </div>
          <?php if (PGRFileManagerConfig::$allowEdit):?>
          <div id="uploadPanel" class="ui-widget-content" >
            <input type="file" name="fileInput" id="fileInput"  />
            <img id="uploadFiles" src="img/blank.gif" />
            <img id="removeFiles" src="img/blank.gif" />
            <div id="fsUploadProgress"></div>
          </div>
          <?php endif;?>
        </div>
        <div id="rightColumn">
          <div id="fileList" class="unselectable">
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
        function _(str)
        {
            return $.i18n._(str);
        }
        $(function() {
            var filemanager = new PGRFileManager({
            	sId : "<?php echo session_id()?>",
                allowedExtension : "<?php echo $PGRUploaderExtension?>",
                fileDescription : "<?php echo $PGRUploaderDescription?>",
                filesType : "<?php echo $PGRUploaderType?>",
                fileMaxSize : "<?php echo PGRFileManagerConfig::$fileMaxSize?> B",
                lang: "<?php echo $PGRLang?>",
                ckEditorFuncNum: "<?php echo $ckEditorFuncNum?>",
                allowEdit: <?php echo PGRFileManagerConfig::$allowEdit?'true':'false'?>,
<?php
	echo 'usesiteimg : '.  FCK_USESITEIMG  . ',' . "\n";
	echo 'thumbbbcode : '. (isset( $_SESSION['pgrfilemanager_thumbbbcode']) ? intval( $_SESSION['pgrfilemanager_thumbbbcode'] ) : 0 ). ',' . "\n";
	$mydirname = basename(dirname(dirname(__FILE__)));
	$userewrite = ( FCK_USE_MOD_REWRITE ? 1 : 0 );
	echo 'userewrite : '. (empty($userewrite) ? 0 : intval($userewrite) ) . ',' . "\n";

	//echo 'rootDir : "'. PGRFileManagerConfig::$urlPath . '",' . "\n";
if (!empty($userewrite)) {
	if (! isset($q_config) || empty($q_config) ) {
		echo 'rootDir : "'. XOOPS_MODULE_URL . '/' . $mydirname . '/imageid",' . "\n";
		echo 'usesiteimgDir : "'. str_replace(XOOPS_URL . '/' , '' , XOOPS_MODULE_URL ) . '/' . $mydirname . '/imageid",' . "\n";
		echo 'cacheDir : "'. XOOPS_MODULE_URL . '/' . $mydirname . '/thumbid",' . "\n";
		echo 'usesiteimgcacheDir : "'. str_replace(XOOPS_URL . '/' , '' , XOOPS_MODULE_URL ) . '/' . $mydirname . '/thumbid",' . "\n";
	}else{
		echo 'rootDir : "'. XOOPS_MODULE_URL . '/' . $mydirname . '/image'.intval($q_config).'id",' . "\n";
		echo 'usesiteimgDir : "'. str_replace(XOOPS_URL . '/' , '' , XOOPS_MODULE_URL ) . '/' . $mydirname . '/image'.intval($q_config).'id",' . "\n";
		echo 'cacheDir : "'. XOOPS_MODULE_URL . '/' . $mydirname . '/thumb'.intval($q_config).'id",' . "\n";
		echo 'usesiteimgcacheDir : "'. str_replace(XOOPS_URL . '/' , '' , XOOPS_MODULE_URL ) . '/' . $mydirname . '/thumb'.intval($q_config).'id",' . "\n";
	}
}else{
	//echo 'rootDir : "'. PGRFileManagerConfig::$urlPath . '",' . "\n";
	echo 'rootDir : "'. FCK_UPLOAD_URL . '",' . "\n";
	echo 'usesiteimgDir : "'. FCK_USESITEIMG_URL . '",' . "\n";
	echo 'cacheDir : "'. FCK_CACHE_URL . '",' . "\n";
	echo 'usesiteimgcacheDir : "'. FCK_USESITEIMG_CACHE_URL . '"' . "\n";
}
?>
            });
            filemanager.init();
        });
    </script>
  </body>
</html>