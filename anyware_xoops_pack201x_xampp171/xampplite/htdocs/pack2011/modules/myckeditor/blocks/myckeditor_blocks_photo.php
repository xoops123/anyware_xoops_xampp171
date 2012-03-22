<?php
if ( !defined("XOOPS_ROOT_PATH") ) {
	exit();
}
if (! defined('_MYCKEDITOR_BLOCK_PHOTO_LOADED_')) {

define('_MYCKEDITOR_BLOCK_PHOTO_LOADED_', 1);

if (!defined('XOOPS_MODULE_PATH')) {
	define('XOOPS_MODULE_PATH', XOOPS_ROOT_PATH . '/modules');
}
if (!defined('XOOPS_MODULE_URL')) {
	define('XOOPS_MODULE_URL', XOOPS_URL . '/modules');
}

	function b_myckeditor_blocks_photo_show ( $options ){

		if (empty($options[0])){
			trigger_error('pgrfilemanager targetdir option empty');
			return false;
		}
		$q_tagetdir = str_replace( '\\','/', $options[0]);
		if (empty($options[1])){
			trigger_error('pgrfilemanager thumbsdir option empty');
			return false;
		}
		$q_cachedir = str_replace( '\\','/', $options[1]);

		$cat_limit_recursive = empty( $options[2] ) ? 0 : intval( $options[2] ) ;

		$photos_num = empty( $options[3] ) ? 5 : intval( $options[3] ) ;
		$cols = empty( $options[4] ) ? 5 : intval( $options[4] ) ;
		$show_type = empty( $options[5] ) ? 'thumbnail':  $options[5]  ;
		$box_size = empty( $options[6] ) ? 0 : intval( $options[6] ) ;
		$sortname = empty( $options[7] ) ? 'filemtime' :  $options[7];

		if (!empty($q_tagetdir)){
			if(substr($q_tagetdir,0,1) != '/'){
				$q_tagetdir = '/'.$q_tagetdir;
			}
		}

		$q_targetdirpath = realpath(XOOPS_ROOT_PATH. $q_tagetdir);
		if (empty($q_targetdirpath)){
			trigger_error('filemanager target dirpath missing');
			return false;
		}
		$q_cachedirpath = realpath(XOOPS_ROOT_PATH. $q_cachedir);

		$mydirname = basename(dirname(dirname(__FILE__)));
		$hModule =& xoops_gethandler('module');
		$MyhModule =& $hModule->getByDirname($mydirname) ;
		if ( !is_object($MyhModule) ) {
			return false;
		}
		$hModConfig =& xoops_gethandler('config');
		$myconf =& $hModConfig->getConfigsByCat(0, $MyhModule->getVar( 'mid' ));
		$cnf_thumbspixels = $myconf['thumbspixels'];

		//group files
		$files = b_func_getImageFiles( $q_targetdirpath , $cat_limit_recursive );

		$photos = array();
		foreach ($files as $filepath) {

			if (empty($filepath)){
				continue;
			}
			//check file ext
			$extension =  substr( strrchr( $filepath , '.' ) , 1 )  ;

			$photo = array();
			$photo['filename'] = basename($filepath);//$elem;
			$q_tagetsubdir = str_replace($q_targetdirpath,'', dirname($filepath));//$elem;
			$q_tagetsubdir = str_replace( '\\','/', $q_tagetsubdir);

			$photo['shortname'] =b_func_getDecodeFileName($photo['filename']);
			$photo['shortname_s'] =xoops_substr($photo['shortname'], 0, 20);

			$photo['size'] = b_func_formatBytes(filesize($filepath));
			$photo['filemtime'] = filemtime($filepath);
			$photo['date'] = date('Y-m-d H:i:s', $photo['filemtime']);
			//imageinfo
			$photo['imageInfo'] = b_func_getImageInfo($filepath);
			if ($photo['imageInfo'] == false) {
				continue;
			}
			//mode check filemanager or pgrfilemanager
			if ($q_cachedir == '/uploads/fckeditor/thumbs'){
				//fckeditor filemanager simple name
				$thumbpath= realpath(XOOPS_ROOT_PATH.$q_cachedir.'/'.$photo['filename']);
			}else{
				if (empty($q_cachedirpath)){
					$thumbpath = false;
				}else{
					$thumb_potion = b_func_cacheGenerateFilename($filepath,$photo['filename'] , $q_tagetdir.$q_tagetsubdir , $q_cachedirpath,$cnf_thumbspixels);
					$thumbpath= realpath(XOOPS_ROOT_PATH.$q_cachedir.$thumb_potion);
				}
			}

			$photo['thumbpath'] = $thumbpath;
			if (empty($thumbpath)){
				$photo['thumbs_url'] = XOOPS_MODULE_URL .'/'.$mydirname.'/pgrfilemanager/img/blank.jpg';
				$photo['thumbInfo'] = b_func_getImageInfo(XOOPS_MODULE_PATH .'/'.$mydirname.'/pgrfilemanager/img/blank.jpg');
			}else{
				$photo['thumbs_url'] = XOOPS_URL .$q_cachedir.$thumb_potion;
				$photo['thumbInfo'] = b_func_getImageInfo($thumbpath);
			}
			$photo['image_url'] = XOOPS_URL . $q_tagetdir . $q_tagetsubdir .'/'.$photo['filename'];

			if( $box_size <= 0 ) {
				$photo['img_attribs'] = "" ;
			} else {
				if ($show_type == 'image'){
					$width = $photo['imageInfo']['width'];
					$height = $photo['imageInfo']['height'];
				}else{
					$width = $photo['thumbInfo']['width'];
					$height = $photo['thumbInfo']['height'];
				}
				if( $width > $box_size || $height > $box_size  ) {
					if( $width > $height ) {
						$photo['img_attribs'] = "width='$box_size'" ;
					}else{
						$photo['img_attribs'] = "height='$box_size'" ;
					}
				} else {
					$photo['img_attribs'] = "" ;
				}
			}
			$photos[] = $photo;
		}

		if (empty($photos)){
			return false;
		}
		//sort
		switch ( $sortname ){
			case 'filemtime':
				usort($photos, 'b_func_file_filemtimesort');
				break;
			case 'shortname':
				usort($photos, 'b_func_file_shortnamesort');
				break;
			case 'filename':
				usort($photos, 'b_func_file_filenamesort');
				break;
			default:
				break;
		}

		$out_photos = array_slice($photos, 0, $photos_num);

		if (empty($out_photos)){
			return false;
		}else{
			$block['cols'] = $cols;
			$block['show_type'] = $show_type;
			$block['photo'] = $out_photos;
			return $block;
		}
	}


	function b_myckeditor_blocks_photo_edit ( $options ) {

		$q_tagetdir = (empty($options[0]) ? '/uploads/fckeditor': $options[0] );
		$q_cachedir = (empty($options[1]) ? '/uploads/fckeditor/cache': $options[1] );

		$cat_limit_recursive = empty( $options[2] ) ? 0 : intval( $options[2] ) ;

		$photos_num = empty( $options[3] ) ? 5 : intval( $options[3] ) ;
		$cols = empty( $options[4] ) ? 5 : intval( $options[4] ) ;
		$show_type = empty( $options[5] ) ? 'thumbnail':  $options[5]  ;
		$box_size = empty( $options[6] ) ? 0 : intval( $options[6] ) ;
		$sortname = empty( $options[7] ) ? 'filemtime' :  $options[7];

		$mydirname = basename(dirname(dirname(__FILE__)));

		$ret  = '<table border="0">'."\n";

		$ret .= '<tr><td>'."\n";
		$ret .= _MB_MYCKEDITOR_TEXT_IMAGEPATH;
		$ret .= '<br/>'."\n";
		$ret .= '<a href="'.XOOPS_MODULE_URL.'/'.$mydirname.'/pgrfilemanager/PGRFileManager.php?type=Image&langCode=ja" target="_blank">pgrfilemanager</a>';
		$ret .= '&nbsp;&nbsp;&nbsp;';
		$ret .= '<a href="'.XOOPS_MODULE_URL.'/'.$mydirname.'/filemanager/browser/default/browser.html?Type=Image&Connector=http://localhost/xcl22/modules/myckeditor/filemanager/connectors/php/connector.php" target="_blank">filemanager</a>';
		$ret .= '</td><td>'."\n";
		$ret .= '<input type="text" size="70" name="options[0]" value="'. $q_tagetdir .'" />'."\n";
		$ret .= '</td></tr>'."\n";

		$ret .= '<tr><td>'."\n";
		$ret .= _MB_MYCKEDITOR_TEXT_CACHEPATH;
		$ret .= '</td><td>'."\n";
		$ret .= '<input type="text" size="70" name="options[1]" value="'. $q_cachedir .'" />'."\n";
		$ret .= '</td></tr>'."\n";

		$ret .= '<tr><td>'."\n";
		$ret .= _MB_MYCKEDITOR_TEXT_CATLIMITATION;
		$ret .= '</td><td>'."\n";
		$ret .= '<input type="radio" name="options[2]" value="1" '.($cat_limit_recursive ? 'checked="checked"' :'').'/>'._YES;
		$ret .= '<input type="radio" name="options[2]" value="0" '.($cat_limit_recursive ? '' :'checked="checked"').'/>'._NO;
		$ret .= '</td></tr>'."\n";

		$ret .= '<tr><td>'."\n";
		$ret .= _MB_MYCKEDITOR_TEXT_DISP;
		$ret .= '</td><td>'."\n";
		$ret .= '<input type="text" size="4" name="options[3]" value="'. $photos_num .'" />'."\n";
		$ret .= '</td></tr>'."\n";

		$ret .= '<tr><td>'."\n";
		$ret .= _MB_MYCKEDITOR_TEXT_COLS;
		$ret .= '</td><td>'."\n";
		$ret .= '<input type="text" size="4" name="options[4]" value="'. $cols .'" />'."\n";
		$ret .= '</td></tr>'."\n";

		$ret .= '<tr><td>'."\n";
		$ret .= _MB_MYCKEDITOR_TEXT_TYPE;
		$ret .= '</td><td>'."\n";
		$ret .= '<select name="options[5]" >'."\n";
		$ret .= '<option value="thumbnail"'.(($show_type == 'thumbnail') ? ' selected="selected"':'').'>'._MB_MYCKEDITOR_TEXT_THUMBNAIL.'</option>';
		$ret .= '<option value="image"'.(($show_type == 'image') ? ' selected="selected"':'').'>'._MB_MYCKEDITOR_TEXT_IMAGE.'</option>';
		$ret .= '</select>'."\n";
		$ret .= '</td></tr>'."\n";

		$ret .= '<tr><td>'."\n";
		$ret .= _MB_MYCKEDITOR_TEXT_WIDTH;
		$ret .= '<br/>'."\n";
		$ret .= _MB_MYCKEDITOR_TEXT_WIDTH_DES;
		$ret .= '</td><td>'."\n";
		$ret .= '<input type="text" size="4" name="options[6]" value="'. $box_size .'" />'."\n";
		$ret .= '</td></tr>'."\n";

		$ret .= '<tr><td>'."\n";
		$ret .= _MB_MYCKEDITOR_TEXT_SORT;
		$ret .= '</td><td>'."\n";
		$ret .= '<select name="options[7]" >'."\n";
		$ret .= '<option value="filemtime"'.(($sortname == 'filemtime') ? ' selected="selected"':'').'>filemtime</option>';
		$ret .= '<option value="shortname"'.(($sortname == 'shortname') ? ' selected="selected"':'').'>shortname</option>';
		$ret .= '<option value="filename"'.(($sortname == 'filename') ? ' selected="selected"':'').'>filename</option>';
		$ret .= '</select>'."\n";
		$ret .= '</td></tr>'."\n";

		$ret .= '</table>'."\n";

		return $ret;
	}
	//sort
	function b_func_file_filemtimesort($a, $b)
	{
		return strcmp($b['filemtime'], $a['filemtime']);
	}
	function b_func_file_shortnamesort($a, $b)
	{
		return strcmp($a['shortname'], $b['shortname']);
	}
	function b_func_file_filenamesort($a, $b)
	{
		return strcmp($b['filename'], $a['filename']);
	}

	//---------------
	function b_func_getImageFiles( $targetdirpath , $depth=false ) {
		$files = array();
		foreach (scandir($targetdirpath) as $elem) {
			if (($elem === '.') || ($elem === '..')) continue;
			$filepath = $targetdirpath . '/' . $elem;
			if (is_dir($filepath) && $depth) {
				if ($elem == 'cache' || $elem == 'thumbs'){
					continue;
				}
				$subdirfiles = b_func_getImageFiles( $filepath , $depth );
				if (!empty($subdirfiles)){
					$files = array_merge($files, $subdirfiles);
				}
			}
			if (!is_file($filepath)) {
				continue;
			}
			//check file ext
			$extension =  substr( strrchr( $elem , '.' ) , 1 )  ;
			if (! in_array(strtolower( $extension ),array('gif', 'jpg', 'jpeg', 'png'))) {
				continue;
			}
			$files[] = realpath($filepath);
		}
		return $files;
	}

	function b_func_cacheGenerateFilename($filepath , $elem , $q_tagetdir, $q_cachedirpath,$cnf_thumbspixels){

		if (empty($elem) || empty($filepath)){
			return false;
		}

		require_once(realpath( dirname(dirname(__FILE__)) . '/pgrfilemanager/PGRThumb/php/Config.php'));
		PGRThumb_Config::$pass = 'f4Ts3F_sg8aW34';//TODO
		PGRThumb_Config::$cacheRootPath = $q_cachedirpath;

		require_once(realpath( dirname(dirname(__FILE__)) . '/pgrfilemanager/PGRThumb/php/UrlThumb.php'));

		$file_md5 = md5(@filemtime($filepath));
		$params = "src=" . urlencode(XOOPS_ROOT_PATH . $q_tagetdir . '/' .$elem)  . '&w='.$cnf_thumbspixels.'&h='.$cnf_thumbspixels.'&md5=' . $file_md5;
		$cachedFile = PGRThumb_Cache::generateFilename($filepath , $params . '&hash=' . md5($params . PGRThumb_Config::$pass)) ;
		return $cachedFile;
	}
	function b_func_formatBytes($bytes, $precision = 2)
	{
		$units = array('B', 'KB', 'MB', 'GB', 'TB');

		$bytes = max($bytes, 0);
		$pow = floor(($bytes ? log($bytes) : 0) / log(1024));
		$pow = min($pow, count($units) - 1);

		$bytes /= pow(1024, $pow);

		return round($bytes, $precision) . ' ' . $units[$pow];
	}
	function b_func_getImageInfo($filename)
	{
		$imageType = array(
			1  => 'GIF',
			2  => 'JPEG',
			3  => 'PNG',
			4  => 'SWF',
			5  => 'PSD',
			6  => 'BMP',
			7  => 'TIFF',
			8  => 'TIFF',
			9  => 'JPC',
			10 => 'JP2',
			11 => 'JPX',
			12 => 'JB2',
			13 => 'SWC',
			14 => 'IFF',
			15 => 'WBMP',
			16 => 'XBM'
		);
		if ((list($width, $height, $type, $attr) = getimagesize($filename) ) !== false ) {
			if(($type == 4) || ($type == 13)) return false;
			return array(
				'type' => $imageType[$type],
				'width' => $width,
				'height' => $height
			);
		}
		return false;
	}
	function b_func_getDecodeFileName($elem){
		$ret = $elem;
		$extension =  substr( strrchr( $elem , '.' ) , 1 )  ;
		$elem_temp = substr($elem,0,-1*(strlen($extension)+1));
		if (preg_match('/^uid[0-9]{6}_/',$elem_temp)){
			$elem_temp = substr($elem_temp,10);//TODO  FCK_FILE_PREFIX plus+
			if (strlen($elem_temp) > 22){
				$elem_temp = substr($elem_temp,22);
				$ret = b_func_DecodeFileName($elem_temp);
			}else{
				$ret = $elem_temp.'.'.$extension;
			}
		}
		return $ret;
	}

	//---------------------------------------------------------------
	// filename decoder (from pukiwiki)
	function b_func_DecodeFileName($key)
	{
		return ($key == '') ? '' : substr(pack('H*','20202020'.$key),4);
	}

}
?>