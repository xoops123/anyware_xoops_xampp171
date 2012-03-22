<?php
// $Id: ref.inc.php,v 1.68 2012/02/19 07:48:50 nao-pon Exp $
/*

	*�ץ饰���� ref
	�ڡ�����ź�դ��줿�ե������Ÿ������

	*�ѥ�᡼��
	-filename~
	 ź�եե�����̾�����뤤��URL
	-Page~
	 WikiName�ޤ���BracketName����ꤹ��ȡ����Υڡ�����ź�եե�����򻲾Ȥ���
	-Left|Center|Right~
	 ���ΰ��ֹ�碌
	-Wrap|Nowrap~
	 �ơ��֥륿���ǰϤ�/�Ϥޤʤ�
	-Around~
	 �ƥ����Ȥβ�����
	-nocache~
	 URL�����ե�����(�����ե�����)�򥭥�å��夷�ʤ�
	-w:�ԥ������
	-h:�ԥ������
	-����%
	 �����ե�����Υ��������ꡣ
	 w: h: �ɤ��餫�λ���ǽĲ�����Ψ���ݤäƥꥵ������
	 %����ǡ�����Υѡ�����Ȥ�ɽ����
	-t:�����ȥ�
	 �����Υ��åץƥ����Ȥ����

*/

class xpwiki_plugin_ref extends xpwiki_plugin {
	var $flg_lightbox_loaded = false;
	var $lvar = array();

	function xpwiki_plugin_ref(& $func) {
		parent::xpwiki_plugin($func);
		$this->conf['imgAlts'] = explode(',', $this->root->ref_img_alt);
		$this->conf['imgTitles'] = explode(',', $this->root->ref_img_title);
		$this->conf['imgAlts'] = array_map('trim', $this->conf['imgAlts']);
		$this->conf['imgTitles'] = array_map('trim', $this->conf['imgTitles']);
		$this->conf['videoWrapClass'] = 'video';
	}

	function plugin_ref_init () {
		// File icon image
		if (! isset($this->cont['FILE_ICON']))
			$this->cont['FILE_ICON'] =
				'<img src="' . $this->cont['IMAGE_DIR'] . 'file.png" width="20" height="20"' .
				' alt="file" style="border-width:0px" />';

		// default alignment
		$this->cont['PLUGIN_REF_DEFAULT_ALIGN'] = 'none'; // 'none','left','center','right'

		// Text wrapping
		$this->cont['PLUGIN_REF_WRAP_TABLE'] =  FALSE; // TRUE, FALSE

		// URL������˲�����������������뤫
		$this->cont['PLUGIN_REF_URL_GET_IMAGE_SIZE'] =  FALSE; // FALSE, TRUE

		// UPLOAD_DIR �Υǡ���(�����ե�����Τ�)��ľ�ܥ�������������
		$this->cont['PLUGIN_REF_DIRECT_ACCESS'] =  FALSE; // FALSE or TRUE
		// - ����Ͻ���Υ���饤�󥤥᡼��������ߴ��Τ���˻Ĥ���Τ�
		//   ���ꡢ��®���Τ���Υ��ץ����ǤϤ���ޤ���
		// - UPLOAD_DIR ��Web�����С����Ϫ�Ф����Ƥ��ꡢ����ľ�ܥ�������
		//   �Ǥ���(�����������¤��ʤ�)���֤Ǥ���ɬ�פ�����ޤ�
		// - Apache �ʤɤǤ� UPLOAD_DIR/.htaccess ��������ɬ�פ�����ޤ�
		// - �֥饦���ˤ�äƤϥ���饤�󥤥᡼����ɽ���䡢�֥���饤��
		//   ���᡼��������ɽ���פ��������ʤɤ��Զ�礬�Ф��礬����ޤ�

		// Image suffixes allowed
		$this->cont['PLUGIN_REF_IMAGE_REGEX'] =  '/\.(gif|png|jpe?g)$/i';

		// Usage (a part of)
		$this->cont['PLUGIN_REF_USAGE'] =  "([pagename/]attached-file-name[,parameters, ... ][,title])";

		// ����ͥ�������������ɽ��������祵����
		$this->cont['PLUGIN_REF_IMG_MAX_WIDTH'] = 640;
		$this->cont['PLUGIN_REF_IMG_MAX_HEIGHT'] = 480;

		// ����ݸ�줿�����κ���ɽ��������(px) ���� (%)����
		$this->cont['PLUGIN_REF_COPYRIGHT_IMG_MAX'] = 100;
		$this->cont['PLUGIN_REF_COPYRIGHT_IMG_MAX%'] = 50;

		// ����ͥ�����������ʼ�
		$this->conf['thumb_quality'] = 95;
		$this->conf['thumb_quality_ktai'] = 75;

		// Flash �ե�����Υ���饤��ɽ������
		// �ե����륪���ʡ���...���٤ƶػ�:0 , �����ͤΤ�:1 , ��Ͽ�桼�����Τ�:2 , ���٤Ƶ���:3
		// �������ƥ��塢0 or 1 �Ǥα��Ѥ򶯤�����
		// $this->cont['PLUGIN_REF_FLASH_INLINE'] = 1;
		// �嵭����� pukiwiki.ini.php �˰�ư���ޤ�����

		// Exif �ǡ���������� title°�����ղä��� (TRUE or FALSE)
		$this->cont['PLUGIN_REF_GET_EXIF'] = FALSE;

		//// �������� Ver 4.03.17 �ʹ��ɲ�ʬ
		// ( $this->conf )

		// �ӥǥ����åפ��륿��( div ���� span )�Υ��饹̾
		$this->conf['videoWrapClass'] = 'video';
		
		// ������������Υ�����ե�����ѥ��Ѵ��ơ��֥�
		$this->conf['local_dir_mapper'] = array(
			// xelfinder
			'#^.+/([a-zA-Z0-9_-]+)/index\.php/view/(\d+)/.*?$#'
			=> $this->cont['TRUST_PATH'] . 'uploads/xelfinder/' . rawurlencode(rtrim(substr($this->cont['ROOT_URL'], 7), '/')) . '_$1_$2',
		);

	}

	// Output an image (fast, non-logging <==> attach plugin)
	function plugin_ref_action()
	{
		$usage = 'Usage: plugin=ref&amp;page=page_name&amp;src=attached_image_name';

		if (! isset($this->root->vars['page']) || ! isset($this->root->vars['src']))
			return array(array('header' => 'HTTP/1.0 404 Not Found', 'msg' => 'File Not Found.'));


		$page     = $this->root->vars['page'];
		$filename = $this->root->vars['src'] ;
		$ref = $this->cont['UPLOAD_DIR'] . $this->func->encode($page) . '_' . $this->func->encode(preg_replace('#^.*/#', '', $filename));

		$mtime = filemtime($ref);
		$etag = '"' . $mtime . '"';
		$expires = 'Expires: ' . gmdate( "D, d M Y H:i:s", $this->cont['UTC'] + $this->cont['BROWSER_CACHE_MAX_AGE'] ) . ' GMT';
		$cache_ctr = ($this->root->userinfo['uid'])? ' private, max-age=' . $this->cont['BROWSER_CACHE_MAX_AGE'] : '';

		if ($etag == @ $_SERVER["HTTP_IF_NONE_MATCH"]) {
			// clear output buffer
			$this->func->clear_output_buffer();
			header('HTTP/1.1 304 Not Modified' );
			header('Cache-Control:'.$cache_ctr);
			header('Pragma:');
			header($expires);
			exit();
		}

		if (! $this->func->check_readable($page, true, true)) {
			return array('header' => 'HTTP/1.0 403 Forbidden', 'msg' => '403 Forbidden.');
		}

		if(! is_file($ref)) {
			return array('header' => 'HTTP/1.0 404 Not Found', 'msg' => 'File Not Found.');
		}

		// ���ե��������
		$status = $this->get_fileinfo($ref);

		if ($status['copyright']) {
			return array('header' => 'HTTP/1.0 403 Forbidden', 'msg' => '403 Forbidden.');
		}

		$imgtype = isset($status['imagesize'][2])? $status['imagesize'][2] : false;
		if ($status['noinline'] > 0) $imgtype = false;
		switch ($imgtype) {
		case 1: $type = 'image/gif' ; break;
		case 2: $type = 'image/jpeg'; break;
		case 3: $type = 'image/png' ; break;
		case 4:
		case 13:
			$type = 'application/x-shockwave-flash';
			$noimg = FALSE;
			// Flash �Υ���饤��ɽ�����¥����å�
			if ($status['noinline'] > -1) {
				if ($this->cont['PLUGIN_REF_FLASH_INLINE'] === 0) {
					// ���٤ƶػ�
					$noimg = TRUE;
				} else if ($this->cont['PLUGIN_REF_FLASH_INLINE'] === 1) {
					// �����ͽ�ͭ�Τߵ���
					if (! $status['admins']) {
						$noimg = TRUE;
					}
				} else if ($this->cont['PLUGIN_REF_FLASH_INLINE'] === 2) {
					// ��Ͽ�桼������ͭ�Τߵ���
					if (! $status['owner']) {
						$noimg = TRUE;
					}
				}
			}
			if ($noimg) return array('header' => 'HTTP/1.0 403 Forbidden', 'msg' => '403 Forbidden.');
			break;
		default:
			$noimg = TRUE;
			if (($status['mime'] || ($status['imagesize'] && !empty($status['imagesize']['mime']))) && ($status['noinline'] < 0 || ($status['admins'] && $status['noinline'] < 1))) {
				if (! $status['mime']) {
					$status['mime'] = $status['imagesize']['mime'];
				}
				$noimg = (empty($this->cont['PLUGIN_REF_MIME_INLINE'][strtolower($status['mime'])]));
				$type = $status['imagesize']['mime'];
			}
			if ($noimg) return array('header' => 'HTTP/1.0 403 Forbidden', 'msg' => '403 Forbidden.');
		}

		// Check Referer
		if ($this->cont['OPEN_MEDIA_REFCHECK']) {
			if (! $this->func->refcheck($this->cont['OPEN_MEDIA_REFCHECK'] - 1)) {
				return array('header' => 'HTTP/1.0 404 Not Found', 'msg' => 'File Not Found.');
			}
		}

		// Care for Japanese-character-included file name
		if ($this->cont['LANG'] === 'ja') {
			switch($this->cont['UA_NAME']){
				//case 'Safari':
				//	$filename = '';
				//	break;
				case 'MSIE':
					$filename = mb_convert_encoding($filename, 'SJIS-WIN', $this->cont['SOURCE_ENCODING']);
					break;
				default:
					// Care for using _auto-encode-detecting_ function
					$filename = mb_convert_encoding($filename, 'UTF-8', $this->cont['SOURCE_ENCODING']);
			}
		}
		if (strpos(strtolower($this->root->ua), 'windows') !== FALSE) {
			$filename = str_replace(array(':', '*', '?', '"', '<', '>', '|'), '_', $filename);
		}

		$size = filesize($ref);

		// Output
		// clear output buffer
		$this->func->clear_output_buffer();
		$this->func->pkwk_common_headers();
		if (! $this->cont['PLUGIN_REF_SHORTURL']) header('Content-Disposition: inline; filename="' . $filename . '"');
		header('Content-Length: ' . $size);
		header('Content-Type: '   . $type);
		header('Last-Modified: '  . gmdate( "D, d M Y H:i:s", $mtime ) . " GMT" );
		header('Etag: '           . $etag );
		header('Cache-Control:'.$cache_ctr);
		header('Pragma:');
		header($expires);

		HypCommonFunc::readfile($ref);
		exit;
	}

	function can_call_otherdir_inline() {
		return 1;
	}

	function plugin_ref_inline() {
		//���顼�����å�
		if (!func_num_args()) return 'no argument(s).';

		$params = $this->get_body(func_get_args(), true);

		if ($params['set']) {
			//return '';
			$ret = $params['_error'];
		} else if ($params['_error']) {
			$ret = $params['_error'];
		} else {
			$ret = $params['_body'];
			if ($params['_is_video']) {
				$ret = '<span class="'.$this->conf['videoWrapClass'].'">' . $ret . '</span>';
			}
			if ($params['caption']) {
				$ret = $this->wrap_span($ret, $params);
			}
		}

		return $ret;
	}

	function can_call_otherdir_convert() {
		return 1;
	}

	function plugin_ref_convert() {

		//���顼�����å�
		if (!func_num_args()) return 'no argument(s).';

		$params = $this->get_body(func_get_args());

		if ($params['set']) {
			return '';
		} else if ($params['_error']) {
			$ret = $params['_error'];
		} else {
			$ret = $params['_body'];
		}

		if (($this->cont['PLUGIN_REF_WRAP_TABLE'] and !$params['nowrap']) or $params['wrap']) {
			$ret = $this->wrap_table($ret, $params);
		}
		$ret = $this->wrap_div($ret, $params);

		return $ret;
	}

	// BodyMake
	function get_body($args, $inline = false){
		// �����
		$params = array(
			'left'    => FALSE, // ����
			'center'  => FALSE, // �����
			'right'   => FALSE, // ����
			'wrap'    => FALSE, // TABLE�ǰϤ�
			'nowrap'  => FALSE, // TABLE�ǰϤޤʤ�
			'around'  => FALSE, // ������
			'noicon'  => FALSE, // ���������ɽ�����ʤ�
			'nolink'  => FALSE, // ���ե�����ؤΥ�󥯤�ĥ��ʤ�
			'noimg'   => FALSE, // ������Ÿ�����ʤ�
			'zoom'    => FALSE, // �Ĳ�����ݻ�����
			'nocache' => FALSE, // URL�ξ��˥���å��夷�ʤ�
			'noinline'=> FALSE, // ����饤��ɽ�����ʤ�
			'caption' => FALSE, // �����ȥ�򥭥�ץ����ɽ������
			'html5'   => FALSE, // HTML 5 <video> ����
			'btn'     => '',    // ���åץ��ɥ�󥯤Υƥ����Ȼ���
			'auth'    => FALSE, // ���åץ��ɥ��ɽ�����Խ����¥����å�
			'set'     => FALSE, // �ѥ�᡼���Υ��å�
			'og'      => FALSE, // Output "og:image" in meta tag
			'_size'   => FALSE, // ���������ꤢ��
			'_w'      => 0,     // ��
			'_h'      => 0,     // �⤵
			'_%'      => 0,     // ����Ψ
			'_align'  => $this->cont['PLUGIN_REF_DEFAULT_ALIGN'],
			'_args'   => array(),
			'_body'   => '',
			'_title'  => array(),
			'_error'  => ''
		);

		if (isset($this->conf['set'][$this->root->vars['page']])) {
			$params = $this->conf['set'][$this->root->vars['page']];
			$params['set'] = FALSE;
		}

		// local var
		$lvar = array(
			'refid'   => '',
			'page'    => $this->cont['PageForRef'], // �ڡ���̾
			'name'    => array_shift($args), // ź�եե�����̾�����(������)
			'isurl'   => FALSE,
			'caption' => '',
			'title'   => array()
		);

		if ($lvar['page'] === '#RenderMode') {
			$lvar['page'] = $this->root->render_attach;
		}

		// ���åץ��ɥ�󥯻���
		if (substr($lvar['name'],0,3) === 'ID$') {
			$lvar['refid'] = substr($lvar['name'], 3);
			$lvar['name'] = '';
		}
		if ($lvar['refid'] && ! in_array('set', $args)) {
			$this->make_uploadlink($params, $lvar, $args);
			return $params;
		}

		// �Ĥ�ΰ����ν���
		$this->fetch_options($params, $args, $lvar);

		// �����ʳ��Υѥ�᡼�����ν����
		$params['_is_video'] = false;

		//exit($params['set']);
		if ($params['set']) {
			$this->conf['set'][$this->root->vars['page']] = $params;
			//$params['_error'] = 'set:' . $this->root->vars['page'];
			return $params;
		}

		if ($params['_title']) $lvar['caption'] = htmlspecialchars(join(', ', $params['_title']));

		// �ե����륿���פ�����
		$this->get_type($lvar, $args, $params);

		// Check readable
		if ($lvar['page'] !== $this->root->render_attach && ! $this->func->check_readable($lvar['page'], false, false)) {
			$params['_error'] = '<small>[File display right none]</small>';
		}

		// ���顼����
		if ($params['_error']) {
			if ($params['_error'] === 'File not found.') {
				// ź�եե����뤬�ʤ��Τǥ��åץ��ɥ��
				$this->root->rtf['disable_render_cache'] = true;
				if (!$lvar['page']) {
					$lvar['page'] = $this->root->render_attach;
				}
				$this->make_uploadlink($params, $lvar, $args);
			}
			return $params;
		}

		// ����ͥ�����������ɽ��������祵����

		if (!$params['_size']) {
			$flg_set_img_max = true;
			$params['_size'] = true;
			$params['zoom'] = true;
			$params['_max'] = true;
			$params['_w'] = $this->cont['PLUGIN_REF_IMG_MAX_WIDTH'];
			$params['_h'] = $this->cont['PLUGIN_REF_IMG_MAX_HEIGHT'];
		} else {
			$flg_set_img_max = false;
		}

		if ($lvar['type'] > 2 && $lvar['file']) {
			// �ե��������
			$params['fsize'] = filesize($lvar['file']);
			if ($params['fsize'] < 103) {
				$params['fsize'] = round($params['fsize']) . 'B';
			} else if ($params['fsize'] < 1024 * 1024) {
				$params['fsize'] = sprintf('%01.1f',$params['fsize']/1024,1).'KB';
			} else {
				$params['fsize'] = sprintf('%01.1f',$params['fsize']/(1024*1024),1).'MB';
			}
			//$params['fsize'] = sprintf('%01.1f', round(filesize($lvar['file'])/1024, 1)) . 'KB';
			$lvar['info'] = $this->func->get_date('Y/m/d H:i:s', filemtime($lvar['file']) - $this->cont['LOCALZONE']) .
				' ' . $params['fsize'];
		} else {
			$params['fsize'] = '';
		}

		// $img �ѥ�᡼�������å�
		$img = array(
			'org_w' => 0,
			'org_h' => 0,
			'width' => 0,
			'height' => 0,
			'info' => '',
			'title' => array(),
			'class' => ' class="img_margin"'
		);

		if ($lvar['type'] !== 4) {
			// Not Flash
			$lvar['title'] = array_merge($lvar['title'], $params['_title']);
		}

		if ($lvar['type'] === 1) {
			// URL����
			$size = false;
			if ($lvar['isurl'] === 'inner') {
				// ������������Ū�ե�����
				$_count = 0;
				if ($this->conf['local_dir_mapper']) {
					foreach($this->conf['local_dir_mapper'] as $_reg => $_to) {
						$_count = 0;
						$lvar['file'] = preg_replace($_reg, $_to, $lvar['name'], -1, $_count);
						if ($_count) break;
					}
				}
				if (! $_count) {
					$lvar['file'] = str_replace($this->cont['ROOT_URL'], $this->cont['ROOT_PATH'], rawurldecode($lvar['name']));
				}
				$size = $this->getimagesize($lvar['file']);
			} else if ($this->cont['PLUGIN_REF_URL_GET_IMAGE_SIZE'] && (bool)ini_get('allow_url_fopen')) {
				$size = $this->getimagesize($lvar['name']);
			}
			if (is_array($size)) {
				$img['org_w'] = $size[0];
				$img['org_h'] = $size[1];
			} elseif ($flg_set_img_max) {
				$params['_w'] = 0;
				$params['_h'] = 0;
			}

			// ���᡼��ɽ���������μ���
			$this->get_show_imagesize($img, $params);
			$lvar['img'] = $img;
			$lvar['text'] = '';


			// ����������� ����ͥ������
			if ($size && $lvar['isurl'] === 'inner') {

				$quality = $this->conf['thumb_quality'];

				// �����Ѳ���������������
				if ($this->cont['UA_PROFILE'] === 'keitai') {
					$quality = $this->conf['thumb_quality_ktai'];
					if ($img['width'] > $this->root->keitai_img_px || $img['height'] > $this->root->keitai_img_px) {
						$params['_h'] = $params['_w'] = $this->root->keitai_img_px;
						$params['zoom'] = TRUE;
						$params['_%'] = '';
						$this->get_show_imagesize($img, $params);
					}
				}

				$lvar['url'] = $lvar['file'];
				if ($params['_%'] && $params['_%'] < 95) {
					$_file = preg_split('/(\.[a-zA-Z]+)?$/', $lvar['name'], -1, PREG_SPLIT_DELIM_CAPTURE);
					if (! empty($_file[1])) {
						// ����ͥ�������å����ʤ���к��������
						$s_file = $this->cont['UPLOAD_DIR'].'s/_i_'.md5($lvar['name']).'_'.$params['_%'].$_file[1];
						$lvar['url'] = $this->make_thumb($lvar['file'], $s_file, $img['width'], $img['height'],$quality);
					}
				}

				// ����ͥ�����������å�
				if ($lvar['url'] !== $lvar['file']) {
					// ����ͥ��뤢��
					// URL �Υ�����ѥ���URI�ѥ����Ѵ�
					$lvar['url'] = str_replace($this->cont['DATA_HOME'], $this->cont['HOME_URL'], $lvar['url']);
					$lvar['link'] = htmlspecialchars($lvar['name']);
				} else {
					// ����ͥ���ʤ�
					$lvar['url'] = htmlspecialchars($lvar['name']);
					$lvar['link'] = $lvar['url'];
				}

			} else {
				$lvar['url'] = htmlspecialchars($lvar['name']);
				$lvar['link'] = $lvar['url'];
			}

			if (! in_array('title', $this->conf['imgTitles'])) {
				$lvar['title'] = array();
			}
			if (in_array('title', $this->conf['imgAlts'])) {
				$lvar['alt'] = $lvar['title'];
			} else {
				$lvar['alt'] = array();
			}

			$_filename = (preg_match('/([^\/]+)$/', $lvar['status']['org_fname']? $lvar['status']['org_fname'] : $lvar['name'], $match))? $match[1] : '';
			if (in_array('name', $this->conf['imgTitles'])) $lvar['title'][] = $_filename;
			if (in_array('name', $this->conf['imgAlts'])) $lvar['alt'][] = $_filename;

			$lvar['title'] = htmlspecialchars(join(', ', $lvar['title']));

		} else if ($lvar['type'] === 2) {
			// URL�����ʳ�
			$lvar['url'] = '';
			if (empty($lvar['text'])) {
				$lvar['link'] = htmlspecialchars($lvar['name']);
				$lvar['text'] = htmlspecialchars($lvar['name']);
				$lvar['title'][] = (preg_match('/([^\/]+)$/', $lvar['name'], $match))? $match[1] : '';
				$lvar['title'] = htmlspecialchars(join(', ', $lvar['title']));
			}
		} else if ($lvar['type'] === 3) {
			// ź�ղ���
			//$size = $this->getimagesize($lvar['file']);
			$size = $lvar['status']['imagesize'];
			if (is_array($size)) {
				$img['org_w'] = $size[0];
				$img['org_h'] = $size[1];
			}

			if ($lvar['isurl']) {
				$lvar['link'] = htmlspecialchars($lvar['isurl']);
			} else {
				$lvar['link'] = '';
			}

			if (! in_array('title', $this->conf['imgTitles'])) {
				$lvar['title'] = array();
			}
			if (in_array('title', $this->conf['imgAlts'])) {
				$lvar['alt'] = $lvar['title'];
			} else {
				$lvar['alt'] = array();
			}

			$_filename = (preg_match('/([^\/]+)$/', $lvar['status']['org_fname']? $lvar['status']['org_fname'] : $lvar['name'], $match))? $match[1] : '';
			if (in_array('name', $this->conf['imgTitles'])) $lvar['title'][] = $_filename;
			if (in_array('name', $this->conf['imgAlts'])) $lvar['alt'][] = $_filename;

			if ($lvar['status']['copyright']) {
				//����ݸ��Ƥ�����ϥ�����$this->cont['PLUGIN_REF_COPYRIGHT_IMG_MAX%']%���⤫�ĽĲ� $this->cont['PLUGIN_REF_COPYRIGHT_IMG_MAX']px �����ɽ��
				$params['_size'] = TRUE;
				if ($img['org_w'] > $this->cont['PLUGIN_REF_COPYRIGHT_IMG_MAX'] || $img['org_h'] > $this->cont['PLUGIN_REF_COPYRIGHT_IMG_MAX'] ) {
					$params['_h'] = $params['_w'] = $this->cont['PLUGIN_REF_COPYRIGHT_IMG_MAX'];
					$params['zoom'] = TRUE;
					$params['_%'] = '';
				} else {
					$params['_%'] = $this->cont['PLUGIN_REF_COPYRIGHT_IMG_MAX%'];
				}
			}

			// ���᡼��ɽ���������μ���
			$this->get_show_imagesize($img, $params);

			$quality = $this->conf['thumb_quality'];

			// �����Ѳ���������������
			if ($this->cont['UA_PROFILE'] === 'keitai') {
				$quality = $this->conf['thumb_quality_ktai'];
				if ($img['width'] > $this->root->keitai_img_px || $img['height'] > $this->root->keitai_img_px) {
					$params['_h'] = $params['_w'] = $this->root->keitai_img_px;
					$params['zoom'] = TRUE;
					$params['_%'] = '';
					$this->get_show_imagesize($img, $params);
				}
			}

			$lvar['img'] = $img;
			if (in_array('size', $this->conf['imgTitles'])) $lvar['title'][] = $img['title'];
			if (in_array('size', $this->conf['imgAlts'])) $lvar['alt'][] = $img['title'];

			//EXIF DATA
			if ($this->cont['PLUGIN_REF_GET_EXIF']) {
				$exif_data = $this->func->get_exif_data($lvar['file']);
				if ($exif_data) {
					$_exif = array();
					$_exif[] = $exif_data['title'];
					foreach($exif_data as $key => $value){
						$_exif[] = "$key: $value";
					}
					if (in_array('exif', $this->conf['imgTitles'])) $lvar['title'] = array_merge($lvar['title'], $_exif);
					if (in_array('exif', $this->conf['imgAlts'])) $lvar['alt'] = array_merge($lvar['alt'], $_exif);
				}
			}

			$lvar['url'] = $lvar['file'];
			if ($params['_%'] && $params['_%'] < 95) {
				$_file = preg_split('/(\.[a-zA-Z]+)?$/', $lvar['name'], -1, PREG_SPLIT_DELIM_CAPTURE);
				// Check original filename extention (for Renderer mode)
				if (! $_file[1] && preg_match('/(\.[a-zA-Z]+)$/', $lvar['status']['org_fname'], $_match)) {
					$_file[1] = $_match[1];
				}
				// ����ͥ�������å����ʤ���к��������
				$s_file = $this->cont['UPLOAD_DIR']."s/".$this->func->encode($lvar['page']).'_'.$params['_%']."_".$this->func->encode($_file[0]).$_file[1];
				$lvar['url'] = $this->make_thumb($lvar['file'], $s_file, $img['width'], $img['height'],$quality);
			}

			// ���ե������ɽ��
			if ($lvar['url'] === $lvar['file']) {
				// URI for in-line image output
				if (! $this->cont['PLUGIN_REF_DIRECT_ACCESS']) {
					// With ref plugin (faster than attach)
					$lvar['url'] = $this->get_ref_url($lvar['page'], $lvar['name']);
				} else {
					// Try direct-access, if possible
					$lvar['url'] = $lvar['file'];
				}
			} else if (! $lvar['status']['copyright']) {
				// ���������
				// URI for in-line image output
				if (! $this->cont['PLUGIN_REF_DIRECT_ACCESS']) {
					// With ref plugin (faster than attach)
					$lvar['link'] = $this->get_ref_url($lvar['page'], $lvar['name']);
				} else {
					// Try direct-access, if possible
					$lvar['link'] = $lvar['file'];
				}
			}

			// URL �Υ�����ѥ���URI�ѥ����Ѵ�
			if (strpos($lvar['url'], $this->cont['DATA_HOME']) === 0) $lvar['url'] = str_replace($this->cont['DATA_HOME'], $this->cont['HOME_URL'], $lvar['url']);
			if ($lvar['link'] && strpos($lvar['link'], $this->cont['DATA_HOME']) === 0) $lvar['link'] = str_replace($this->cont['DATA_HOME'], $this->cont['HOME_URL'], $lvar['link']);

			// og:image mata tag
			if ($params['og']) {
				$this->func->add_meta_head('<meta property="og:image" content="' . ($lvar['link']? $lvar['link'] : $lvar['url']) . '" />');
			}

			$lvar['text'] = '';
			if (! empty($lvar['title'])) {
				$lvar['title'] = $this->func->make_line_rules(htmlspecialchars(join(', ', $lvar['title'])));
			} else {
				$lvar['title'] = '';
			}
		} else {
			// Flash��ź�դ���¾
			$lvar['url'] = '';
			if (empty($lvar['link'])) {
				$filename = $lvar['status']['org_fname'];
				$filename = str_replace(array(':', '*', '?', '"', '<', '>', '|'), '_', $filename);
				if ($this->cont['PLUGIN_ATTACH_SHORTURL']) {
					$lvar['link'] = $this->cont['HOME_URL'] . 'ref' . ($params['noinline']? 1:0) . '/' . rawurlencode(str_replace('/', '%2F', $lvar['page'])) .
						'/' . rawurlencode($lvar['name']) . (($lvar['name'] !== $filename)? ('/'.rawurlencode($filename)):''); // Show its filename at the last
				} else {
					$filename = '/' . rawurlencode($filename);
					$noinline = ($params['noinline'])? '&amp;ni=1' : '';
					$lvar['link'] = $this->cont['HOME_URL'] . 'gate.php' . $filename . '?way=attach&amp;_noumb' . $noinline . '&amp;refer=' . rawurlencode($lvar['page']) .
						'&amp;openfile=' . rawurlencode($lvar['name']); // Show its filename at the last
				}
				if (! empty($lvar['title'])) {
					// �����ȥ뤬���ꤵ��Ƥ���
					$lvar['text'] = htmlspecialchars(join(', ', $lvar['title']));
					$lvar['title'] = htmlspecialchars(preg_replace('/([^\/]+)$/', "$1", $lvar['status']['org_fname']? $lvar['status']['org_fname'] : $lvar['name']) . ', ' . $lvar['info']);
				} else {
					$lvar['text'] = htmlspecialchars(preg_replace('/([^\/]+)$/', "$1", $lvar['status']['org_fname']? $lvar['status']['org_fname'] : $lvar['name']));
					$lvar['title'] = htmlspecialchars($lvar['info']);
				}
			} else {
				$lvar['text'] = $lvar['link'];
				//$lvar['title'][] = (preg_match('/([^\/]+)$/', $lvar['link'], $match))? $match[1] : '';
				$lvar['title'] = htmlspecialchars(join(', ', $lvar['title']));
			}
		}

		if (! $lvar['caption']) $lvar['caption'] = $lvar['title'];

		if (empty($lvar['alt'])) {
			$lvar['alt'] = '';
		} elseif (is_array($lvar['alt'])) {
			$lvar['alt'] = $this->func->make_line_rules(htmlspecialchars(join(', ', $lvar['alt'])));
		}

		// �����Ȥ�Ω��
		if ($lvar['url']) {
			// ����
			// lightbox
			if (! $this->flg_lightbox_loaded && $this->root->ref_use_lightbox) {
				$this->flg_lightbox_loaded = true;
				$this->func->add_tag_head('lightbox.css');
				$this->func->add_tag_head('lightbox.js');
			}
			$_size = '';
			if ($img['width']) {
				$_size .= ' width="' . $img['width'] . '"';
				$lvar['width'] = $img['width'];
			}
			if ($img['height']) {
				$_size .= ' height="' . $img['height'] . '"';
				$lvar['height'] = $img['height'];
			}
			$align = '';
			if ($inline) {
				if ($params['right']) {
					$align = ' align="right" style="float:right;"';
				} else if ($params['left']) {
					$align = ' align="left" style="float:left;"';
				} else if ($params['center']) {
					$align = ' style="display:block;margin-left:auto;margin-right:auto;"';
				}
			}
			// �����ե�����
			$params['_body'] = '<img src="' . $lvar['url'] . '" alt="' . $lvar['alt'] . '" title="' . $lvar['title'] . '"' . $img['class'] . $img['info'] . $_size . $align . ' />';
			if (!$params['nolink'] && $lvar['link']) {
				$params['_body'] = '<a href="' . $lvar['link'] . '" title="' . $lvar['title'] . '" type="img">' . $params['_body'] . '</a>';
			}
		} else {
			// ����¾�ե�����
			$icon = $params['noicon'] ? '' : $this->cont['FILE_ICON'];
			$params['_body'] = $icon . $lvar['text'];
			if (!$params['nolink']) {
				$params['_body'] = '<a href="' . $lvar['link'] . '" title="' . $lvar['title'] . '">' . $params['_body'] .'</a>';
			}
			if ($lvar['type'] === 4) {
				$this->set_flash_tag($params, $lvar);
			} else if ($this->cont['UA_PROFILE'] !== 'keitai' && isset($lvar['status']) && ! $params['noinline'] && ($lvar['status']['noinline'] < 0 || ($lvar['status']['admins'] && $lvar['status']['noinline'] < 1))) {
				$this->set_object_tag($params, $lvar);
			}
		}
		$this->lvar = $lvar;
		return $params;
	}

	function set_object_tag(&$params, $lvar) {

		if ($lvar['status']['mime'] || ($lvar['status']['imagesize'] && ! empty($lvar['status']['imagesize']['mime']))) {
			if (! $lvar['status']['mime']) {
				$lvar['status']['mime'] = $lvar['status']['imagesize']['mime'];
			}
			$mime = strtolower($lvar['status']['mime']);
			if (! empty($this->cont['PLUGIN_REF_MIME_INLINE'][$mime])) {
				$use_html5_video = $params['html5'];
				$object_type = $this->cont['PLUGIN_REF_MIME_INLINE'][$mime];
				if (strpos($object_type, '+')) {
					list($object_type, $anothor) = explode('+', $object_type, 2);
					if ($anothor === 'html5_video') $use_html5_video = true;
				}

				// flash �ӥǥ�
				if ($object_type === 'flash') {
					$this->set_flash_tag($params, $lvar);
					return;
				}

				if ($lvar['isurl']) {
					// Net Video
					$url = htmlspecialchars($lvar['name']);
				} else {
					$url = $this->get_ref_url($lvar['page'], $lvar['name'], true);
				}

				$domid = $this->get_domid('media');
				$param = array();
				$object_attr = '';
				$media_size_tag = $size_tag = $buttom_tag = '';
				$template = 'default';

				$img = array(
					'org_w' => 0,
					'org_h' => 0,
					'width' => 0,
					'height' => 0,
					'info' => '',
					'title' => array(),
					'class' => ' class="img_margin"'
				);
				$size = isset($lvar['status']['imagesize'])? $lvar['status']['imagesize'] : false;
				if (is_array($size)) {
					$img['org_w'] = $size[0];
					$img['org_h'] = $size[1];
					$this->get_show_imagesize($img, $params);
					$width = $img['width'];
					$height = $img['height'];
				} else {
					$width = (!$params['_max'] && $params['_w'])? $params['_w'] : '';
					$height = (!$params['_max'] && $params['_h'])? $params['_h'] : '';
				}
				$size = array();
				if ($width && $height) {
					$size = array($width, $height);
				}

				list($media, $type) = explode('/', $mime);

				$is_real = false;
				if ($media === 'video' || $is_real = (substr($type, 0, 11) === 'vnd.rn-real')) {

					$params['_is_video'] = true;

					if (! empty($this->cont['PLUGIN_REF_PLAYERS'][$object_type])) {

						// ����ץ饰���MIME �����פ˶��� for �����֥饦��
						if (strpos($this->cont['PLUGIN_REF_PLAYERS'][$object_type]['types'], $mime) === false) {
							list($mime) = explode(' ', $this->cont['PLUGIN_REF_PLAYERS'][$object_type]['types']);
						}

						// classid, codebase °���򥻥å� for WinIE
						$object_attr = '';
						foreach(array('classid', 'codebase') as $key) {
							if (!empty($this->cont['PLUGIN_REF_PLAYERS'][$object_type][$key])) {
								$object_attr = ' '. $key . '="' . htmlspecialchars($this->cont['PLUGIN_REF_PLAYERS'][$object_type][$key]) .'"';
							}
						}

						// ����ȥ���ι⤵������;��
						$ctr_h = empty($this->cont['PLUGIN_REF_PLAYERS'][$object_type]['height+'])? 0 : $this->cont['PLUGIN_REF_PLAYERS'][$object_type]['height+'];
						$ctr_w = empty($this->cont['PLUGIN_REF_PLAYERS'][$object_type]['width+'])? 0 : $this->cont['PLUGIN_REF_PLAYERS'][$object_type]['width+'];

						// ɸ��Ū��<param>
						$param['autoplay'] = 'false';
						$param['autostart'] = '0';

						$param['controller'] = 'true';
						$param['showcontrols'] = 'true';

						$param['scale'] = 'aspect';

						// Real Player ����
						if ($is_real) {
							$param['controls'] = 'ImageWindow';
							$param['console'] = $domid;
							$buttom_tag = <<<EOD
<br />
<object classid="clsid:CFCDAA03-8BE4-11CF-B84B-0020AFBBCCFA" width="{$size[0]}" height="30">
<param name="controls" value="ControlPanel"></param><param name="console" value="{$domid}"></param>
<!--[if !IE]> <-->
<object type="{$mime}" width="{$width}" height="30">
<param name="controls" value="ControlPanel"></param><param name="console" value="{$domid}"></param>
</object>
<!--> <![endif]-->
</object>
EOD;
						}
					} else {
						// �ץ饰�������Ѥ��ʤ����ϥƥ�ץ졼��̾
						$template = $object_type;
					}

					if ($size) {
						$media_size_tag = ' width="'.$size[0].'" height="'.$size[1].'"';
						$size_tag = ' width="'.($size[0]+$ctr_w).'" height="'.($size[1]+$ctr_h).'"';
					}
				} else {
					// Video �ʳ�
					if ($size) $size_tag = ' width="'.$size[0].'" height="'.$size[1].'"';
					$template = $object_type;

					if ($mime === 'image/svg+xml') {
						//$this->func->add_js_var_head('XpWikiIeDomLoadedDisable', true);
						$this->func->add_tag_head('sie-mini.js', FALSE, 'UTF-8', TRUE);
						// IE8 ��ߴ��⡼�ɤˤ��� (ɸ��⡼�ɤǤ�ɽ���˻��֤��ݤ����礬���롩)
						// SIE �ΥС�����󥢥å�(SIE 0.60�ǳ�ǧ)�ǲ����������ͤʤΤǤȤꤢ���������ȥ�����
						//if (! headers_sent()) header('X-UA-Compatible:IE=EmulateIE7');
					}
				}

				$param_tag = '';
				if ($param) {
					foreach($param as $name => $val) {
						$param_tag .= '<param name="'.$name.'" value="'.$val.'"></param>';
					}
				} else {
					$param_tag = '';
				}

				// "Mark of the Web" http://msdn.microsoft.com/en-us/library/ms537628%28VS.85%29.aspx
				$for_ie_saved_from = '<!-- saved from url=('.sprintf('%04s', strlen($this->cont['ROOT_URL'])).')'.$this->cont['ROOT_URL'].' -->' . "\r\n";
				$this->func->add_tag_head($for_ie_saved_from);

				if ($template === 'minimum') {
					$params['_body'] = <<<EOD
<object id="{$domid}" type="{$mime}" data="{$url}"{$object_attr}{$size_tag}></object>
EOD;
				} else if ($template === 'html5_video') {
					$use_html5_video = true;
				} else if ($template === 'google_document_viewer') {
					$this->root->rtf['disable_render_cache'] = true;
					$this->root->pagecache_profiles = 'default';
					if ($this->cont['UA_PROFILE'] === 'default') {
						$rurl = rawurlencode(str_replace('&amp;', '&', $url));
						$params['_body'] = <<<EOD
<iframe src="http://docs.google.com/viewer?url={$rurl}&amp;embedded=true" style="border:none;"{$size_tag}></iframe>
EOD;
					}
				} else {
					$params['_body'] = <<<EOD
<object id="{$domid}"{$object_attr}{$size_tag}>
<param name="src" value="{$url}"></param>
$param_tag
<!--[if !IE]>-->
<object type="{$mime}" data="{$url}"{$size_tag}>
$param_tag
<!--<![endif]-->
{$params['_body']}
<!--[if !IE]>-->
</object>
<!--<![endif]-->
</object>
{$buttom_tag}
EOD;
				}

				if ($use_html5_video) {
					$params['_body'] = <<<EOD
<video id="{$domid}" controls="controls"{$media_size_tag}>
<source src="{$url}" type="{$mime}" />
{$params['_body']}
</div>
EOD;
				}
			}
		}
	}

	function set_flash_tag(&$params, $lvar) {
		// Flash
		// $img �ѥ�᡼�������å�
		$img = array(
			'org_w' => 0,
			'org_h' => 0,
			'width' => 0,
			'height' => 0,
			'info' => '',
			'title' => array(),
			'class' => ' class="img_margin"'
		);
		//$size = $this->getimagesize($lvar['file']);
		$size = $lvar['status']['imagesize'];
		if (is_array($size)) {
			$img['org_w'] = $size[0];
			$img['org_h'] = $size[1];
		}
		// ���᡼��ɽ���������μ���
		$this->get_show_imagesize($img, $params);

		//�����
		$f_v = $f_a = $f_p = array();

		if (! empty($lvar['attrs'])) {
			foreach(explode(' ', $lvar['attrs']) as $attrs) {
				if (strpos($attrs, '=') !== false) {
					list($name, $val) = explode('=', trim($attrs), 2);
					if ($name === 'flashvars') {
						$val = str_replace('&amp;', '&', $val);
						$val = trim($val, '"\'');
						foreach(explode('&', $val) as $dat) {
							list($_key, $_val) = explode('=', $dat);
							$f_v[] = $_key . ':"' . rawurlencode($_val) . '"';
						}
					} else {
						$val = trim($val, '"\'');
						$f_p[] = $name . ':"' . rawurlencode($val) . '"';
					}
				}
			}
		}

		foreach ($params['_args'] as $arg){
			$m = array();
			if (preg_match("/^a(?:lign)?:(left|right|top|bottom)$/i",$arg,$m)){
				$f_a['_a'] = "align:\"{$m[1]}\"";
			}
			if (preg_match("/^q(?:uality)?:((auto)?(high|low|best|medium))$/i",$arg,$m)){
				$f_p['_q']  = "quality:\"{$m[1]}\"";
			}
			if (preg_match("/^p(?:lay)?:(TRUE|FALSE)$/i",$arg,$m)){
				$f_p['_p']  = "play:\"{$m[1]}\"";
			}
			if (preg_match("/^l(?:oop)?:(TRUE|FALSE)$/i",$arg,$m)){
				$f_p['_l']  = "loop:\"{$m[1]}\"";
			}
			if (preg_match("/^b(?:gcolor)?:#?([abcdef\d]{6,6})$/i",$arg,$m)){
				$f_p['_b']  = "bgcolor:\"#{$m[1]}\"";
			}
			if (preg_match("/^sc(?:ale)?:(showall|noborder|exactfit|noscale)$/i",$arg,$m)){
				$f_p['_sc']  = "scale:\"{$m[1]}\"";
			}
			if (preg_match("/^sa(?:lign)?:(l|r|t|b|tl|tr|bl|br)$/i",$arg,$m)){
				$f_p['_sa']  = "salign:\"{$m[1]}\"";
			}
			if (preg_match("/^m(?:enu)?:(TRUE|FALSE)$/i",$arg,$m)){
				$f_p['_m']  = "menu:\"{$m[1]}\"";
			}
			if (preg_match("/^wm(?:ode)?:(window|opaque|transparent)$/i",$arg,$m)){
				$f_p['_wmp'] = "wmode:\"{$m[1]}\"";
			}
		}
		$params['_w'] = " width=".$img['width'];
		$params['_h'] = " height=".$img['height'];

		$cid = $this->get_domid('swf');
		$params['_body'] = '<span id="'.$cid.'">'.$params['_body'].'</span>';

		$this->func->add_tag_head('swfobject.js');

		if (isset($lvar['is_net_service'])) {
			$f_file = $lvar['name'];
		} else {
			if ($lvar['isurl']) {
				$f_file = $lvar['name'];
				if (preg_match('#^(.+)/([^/]+)$#', $f_file, $match)) {
					$f_path = $match[1];
					$f_title = $f_name = $match[2];
				} else {
					$f_title = $f_path = $f_file;
					$f_name = '';
				}
			} else {
				$f_path = rtrim($this->cont['HOME_URL'], '/');
				$f_name = $this->get_ref_url($lvar['page'], $lvar['name']);
				$f_file = $f_path . '/' . $f_name;
				$f_title = mb_convert_encoding($lvar['name'], 'UTF-8', $this->cont['SOURCE_ENCODING']);
			}

			if (! empty($lvar['status']['imagesize']['mime']) && substr($lvar['status']['imagesize']['mime'], 0, 5) === 'video') {
				if (! empty($this->cont['PLUGIN_REF_FLV_PLAYER_VARS'])) {
					$f_v = strtr($this->cont['PLUGIN_REF_FLV_PLAYER_VARS'],
						array(
							'$url' => rawurlencode($f_file),
							'$srcurl' => rawurlencode($this->cont['HOME_URL'] . 'skin/loader.php?src='),
							'$title' => rawurlencode($f_title),
							'$path' => rawurlencode($f_path),
							'$name' => rawurlencode($f_name),
						)
					);
				} else {
					$f_v[] = 'file:"' . rawurlencode($f_file) . '"';
					$f_v[] = 'title:"' . rawurlencode($f_title) . '"';
				}

				$f_file = $this->cont['HOME_URL'] . 'skin/loader.php?src=' . $this->cont['PLUGIN_REF_FLV_PLAYER'];

				$img['width'] += $this->cont['PLUGIN_REF_FLV_PLAYER_CTR_WIDTH'];
				$img['height'] += $this->cont['PLUGIN_REF_FLV_PLAYER_CTR_HEIGHT'];
			}
		}

		if (is_array($f_v)) {
			$obj_v = 'var flashvars = {' . join(',', $f_v) . '};';
		} else {
			$obj_v = 'var flashvars = ' . $f_v . ';';
		}
		$obj_p = 'var params = {' . join(',', $f_p) . '};';
		$obj_a = 'var attributes = {' . join(',', $f_a) . '};';
		$js = <<<_HTML_

// <![CDATA[
(function(){{$obj_v} {$obj_p} {$obj_a}
swfobject.embedSWF("$f_file", "$cid", "{$img['width']}", "{$img['height']}", "{$this->cont['PLUGIN_REF_FLASH_VERSION']}", "{$this->cont['HOME_URL']}skin/loader.php?src=expressInstall.swf", flashvars, params, attributes);})();
// ]]>

_HTML_;
		$this->func->add_js_var_head($js);
	}

	function get_ref_url($page, $name, $use_pathinfo = false) {
		if ($this->cont['PLUGIN_REF_SHORTURL']) {
			return $this->cont['HOME_URL'] . 'ref/' . str_replace('%2F', '%252F', rawurlencode($page)) . '/' . rawurlencode($name);
		} else {
			$path_name = ($use_pathinfo)? '/' . rawurlencode($name) : '';
			return $this->cont['HOME_URL'] . 'gate.php' . $path_name . '?way=ref&amp;_nodos&amp;_noumb&amp;page=' . rawurlencode($page) .
					'&amp;src=' . rawurlencode($name); // Show its filename at the last
		}
	}

	// span����� (inline-block)
	function wrap_span($text, $params) {
		$style = '';
		if (!empty($this->lvar['width'])) {
			$style .= 'width:' . $this->lvar['width'] . 'px;';
		}

		$body = $text . '<br />' . '<span class="ref_caption" style="' . $style . '">' . $this->lvar['caption'] . '<br /></span>';

		$style = '';
		if ($params['_align'] !== 'none') {
			if ($params['_align'] === 'center') {
				$style .= 'width:100%;text-align:center;';
			} else {
				$style .= 'float:' . $params['_align'] . ';';
			}
		}
		return '<span class="ref_use_caption" style="' . $style . '">' . $body . '</span>';
	}

	// div�����
	function wrap_div($text, $params) {

		if ($params['_is_video']) {
			$text = '<div class="'.$this->conf['videoWrapClass'].'">' . $text . '</div>';
		}

		$align = $params['_align'];
		$around = $params['around'];
		if ($params['caption']) {
			$style = '';
			if (!empty($this->lvar['width'])) {
				$style .= 'width:' . $this->lvar['width'] . 'px;';
				if ($params['_align'] === 'center') {
					$style .= 'margin-right:auto;margin-left:auto;';
				}
			}
			$caption = '<div class="ref_caption" style="' . $style . '">'.$this->lvar['caption'].'</div>';
			$add_class = ' ref_use_caption';
		} else {
			$add_class = $caption = '';
		}
		if ($around) {
			$style = 'width:auto;' . (($align === 'right') ? 'float:right;' : 'float:left;');
		} else {
			$style = ($align !== 'none')? 'text-align:' . $align . ';' : '';
		}
		return "<div class=\"ref\" style=\"$style\"><div class=\"img_margin{$add_class}\">$text</div>{$caption}</div>\n";
	}
	// �Ȥ����
	// margin:auto Moz1=x(wrap,around�������ʤ�),op6=oNN6=x(wrap,around�������ʤ�)IE6=x(wrap,around�������ʤ�)
	// margin:0px Moz1=x(wrap�Ǵ󤻤������ʤ�),op6=x(wrap�Ǵ󤻤������ʤ�),nn6=x(wrap�Ǵ󤻤������ʤ�),IE6=o
	function wrap_table($text, $params) {
		$align = $params['_align'];
		$around = $params['around'];
		$margin = ($around ? '0px' : 'auto');
		$margin_align = ($align == 'center') ? '' : ";margin-$align:0px";
		return "<table class=\"style_table\" style=\"margin:$margin$margin_align\">\n<tr><td class=\"style_td\">\n$text\n</td></tr>\n</table>\n";
	}

	//-----------------------------------------------------------------------------
	// �ե����륿���פ�Ƚ��
	function get_type(& $lvar, & $args, & $params) {
		// $lvar['type']
		// 1:URL����
		// 2:URL����¾
		// 3:ź�ղ���
		// 4:ź�եե�å���
		// 5:ź�դ���¾

		if ($this->func->is_url($lvar['name'])) {
			$lvar['name'] = preg_replace('#^(?:site:|https?:/)//#', $this->cont['ROOT_URL'], $lvar['name']);
			$lvar['isurl'] = $lvar['name'];
			// URL
			if (! $params['noimg'] &&
				! $this->cont['PKWK_DISABLE_INLINE_IMAGE_FROM_URI'] &&
				preg_match($this->cont['PLUGIN_REF_IMAGE_REGEX'], $lvar['name'])) {
				// ����
				if (strpos($lvar['name'], $this->cont['ROOT_URL']) === 0 && strpos($lvar['name'], '?') === false) {
					// ������������Ū�ե�����
					$lvar['type'] = 1;
					$lvar['isurl'] = 'inner';
				} else if ($params['nocache']) {
					// ����å��夷�ʤ�����
					$lvar['type'] = 2;
				} else {
					// ����å��夹��
					$this->cache_image_fetch($lvar);
					if ($lvar['file']) {
						// ����å���OK
						if ($this->is_picture($lvar['file'])) {
							$lvar['type'] = 3;
						} else {
							$lvar['type'] = 5;
						}
					} else {
						// ����å���NG
						$lvar['type'] = 2;
					}
				}
			} else {
				// URL�����ʳ�
				$lvar['type'] = 2;
				if ($this->cont['PLUGIN_REF_NETVIDEOS']) {
					foreach($this->cont['PLUGIN_REF_NETVIDEOS'] as $netvideo) {
						if (preg_match($netvideo['regex'], $lvar['name'], $match)) {

							if (strpos($netvideo['type'], '/')) {
								list($type) = explode('/', $netvideo['type']);
							} else {
								$type = $netvideo['type'];
							}
							$type = strtolower($type);

							$params['_is_video'] = true;
							switch($type) {
								case 'html':
									$params['noicon'] = true;
									$params['nolink'] = true;
									if (isset($netvideo['src_' . $this->cont['UA_PROFILE']])) {
										$lvar['text'] = trim($netvideo['src_' . $this->cont['UA_PROFILE']]);
									} else {
										$lvar['text'] = trim($netvideo['src']);
									}
									$i = 0;
									foreach($match as $replace) {
										$lvar['text'] = str_replace('$'.$i++, $replace, $lvar['text']);
									}
									if (!empty($netvideo['width']) && !empty($netvideo['height'])) {
										$img = array();
										$img['org_w'] = $netvideo['width'];
										$img['org_h'] = $netvideo['height'];
										$this->get_show_imagesize($img, $params);
										$size = ' width="'.$img['width'].'" height="'.$img['height'].'"';
									} else {
										$size = '';
									}
									$lvar['text'] = str_replace('$size', $size, $lvar['text']);
									$link = htmlspecialchars($lvar['name']);
									$link = '<a href="'.$link.'">'.$link.'</a>';
									//$lvar['text'] = '<div class="video">' . str_replace('$link', $link, $lvar['text']) . '</div>';
									$lvar['text'] = str_replace('$link', $link, $lvar['text']);

									break;

								case 'flash':
									$type = 'video';
									$netvideo['type'] = 'video/x-flv';
									$lvar['is_net_service'] = true;

								default:
									if ($type === 'video' || $netvideo['type'] === 'application/vnd.rn-realmedia') {
										$lvar['type'] = 5;

										$size = array();
										$size[0] = intval($netvideo['width']);
										$size[1] = intval($netvideo['height']);
										$size[2] = 4;
										$size[3] = 'width="'.$size[0].'" height="'.$size[1].'"';
										$size['bits'] = null;
										$size['channels'] = null;
										$size['mime'] = $netvideo['type'];

										$lvar['status'] = array(
											'imagesize' => $size
										);
										$lvar['status']['noinline'] = -1;
										$lvar['link'] = htmlspecialchars($lvar['name']);
										$lvar['file'] = '';
										$lvar['name'] = trim($netvideo['src']);
										$lvar['attrs'] = (isset($netvideo['attribute']))? $netvideo['attribute'] : '';
										array_shift($match);
										$i = 1;
										foreach($match as $replace) {
											if ($lvar['attrs']) $lvar['attrs'] = str_replace('$'.$i, $replace, $lvar['attrs']);
											$lvar['name'] = str_replace('$'.$i++, $replace, $lvar['name']);
										}
									}
							}
							break;
						}
					}
				}
			}
		} else {
			// ź�եե�����
			// �ڡ���̾�ȥե�����̾��������
			// ź�եե�����
			if (! is_dir($this->cont['UPLOAD_DIR'])) {
				$params['_error'] = 'No UPLOAD_DIR';
				return;
			}

			if (!empty($args[0]))
			// Try the second argument, as a page-name or a path-name
			$_page = $this->func->get_fullname($this->func->strip_bracket($args[0]), $lvar['page']); // strip is a compat

			$matches = array();
			// �ե�����̾�˥ڡ���̾(�ڡ������ȥѥ�)����������Ƥ��뤫
			//   (Page_name/maybe-separated-with/slashes/ATTACHED_FILENAME)
			if (preg_match('#^(.+)/([^/]+)$#', $lvar['name'], $matches)) {
				if ($matches[1] == '.' || $matches[1] == '..') {
					$matches[1] .= '/'; // Restore relative paths
				}
				// �ڡ���ID�Ǥλ���
				if (preg_match('/^#(\d+)$/', $matches[1], $arg)) {
					$matches[1] = $this->func->get_name_by_pgid($arg[1]);
				}

				$lvar['name'] = $matches[2];
				$lvar['page'] = $this->func->get_fullname($this->func->strip_bracket($matches[1]), $lvar['page']); // strip is a compat
				$lvar['file'] = $this->cont['UPLOAD_DIR'] . $this->func->encode($lvar['page']) . '_' . $this->func->encode($lvar['name']);
				$is_file = @ is_file($lvar['file']);

			// ��������ʹߤ�¸�ߤ�������ϥڡ���̾
			} else if (!empty($args[0]) && $this->func->is_page($_page)) {
				$e_name = $this->func->encode($lvar['name']);

				// Try the second argument, as a page-name or a path-name
				$lvar['file'] = $this->cont['UPLOAD_DIR'] .  $this->func->encode($_page) . '_' . $e_name;
				$is_file_second = @ is_file($lvar['file']);

				//if ($is_file_second && $is_bracket_bracket) {
				if ($is_file_second) {
					// Believe the second argument (compat)
					array_shift($args);
					$lvar['page'] = $_page;
					$is_file = TRUE;
				} else {
					// Try default page, with default params
					$is_file_default = @ is_file($this->cont['UPLOAD_DIR'] . $this->func->encode($lvar['page']) . '_' . $e_name);

					// Promote new design
					if ($is_file_default && $is_file_second) {
						// Because of race condition NOW
						$params['_error'] = htmlspecialchars('The same file name "' .
						$lvar['name'] . '" at both page: "' .  $lvar['page'] . '" and "' .  $_page .
						'". Try ref(pagename/filename) to specify one of them');
					} else {
						// Because of possibility of race condition, in the future
						$params['_error'] = 'The style ref(filename,pagename) is ambiguous ' .
						'and become obsolete. ' .
						'Please try ref(pagename/filename)';
					}
					return;
				}
			} else {
				// Simple single argument
				$lvar['file'] = $this->cont['UPLOAD_DIR'] . $this->func->encode($lvar['page']) . '_' . $this->func->encode($lvar['name']);
				$is_file = @ is_file($lvar['file']);
			}
			if (! $is_file) {
				if ($this->root->render_mode !== 'render' && !$this->func->is_page($lvar['page'])) {
					$params['_error'] = $this->root->_msg_notfound . '(' . htmlspecialchars($lvar['page']) .  ')';
				} else {
					if (strlen($lvar['name']) < 252) {
						$params['_error'] = 'File not found.';
					} else {
						$params['_error'] = 'File name is too long.';
					}
				}
				return;
			}

			// ���ե��������
			$lvar['status'] = $this->get_fileinfo($lvar['file']);

			if ($lvar['status']['noinline'] > 0 || $params['noinline']) {
				$params['noimg'] = TRUE;
			} else if ($lvar['status']['noinline'] > -1) {
				if ($this->is_flash($lvar['file'], $lvar['status']['imagesize'])) {
					// Flash �Υ���饤��ɽ�����¥����å�
					if ($this->cont['PLUGIN_REF_FLASH_INLINE'] === 0) {
						// ���٤ƶػ�
						$params['noimg'] = TRUE;
					} else if ($this->cont['PLUGIN_REF_FLASH_INLINE'] === 1) {
						// �����ͽ�ͭ�Τߵ���
						if (! $lvar['status']['admins']) {
							$params['noimg'] = TRUE;
						}
					} else if ($this->cont['PLUGIN_REF_FLASH_INLINE'] === 2) {
						// ��Ͽ�桼������ͭ�Τߵ���
						if (! $lvar['status']['owner']) {
							$params['noimg'] = TRUE;
						}
					}
				}
			}

			if (!$params['noimg'] && $this->is_picture($lvar['file'], $lvar['status']['imagesize'])) {
				$lvar['type'] = 3;
			} else if ($this->is_flash($lvar['file'], $lvar['status']['imagesize'])) {
				$params['_title'] = array();
				if ($lvar['status']['copyright'] || $params['noimg']) {
					$lvar['type'] = 5;
				} else {
					$lvar['type'] = 4;
				}
			} else {
				$lvar['type'] = 5;
			}
		}
		return;
	}

	// ź�դ��줿�ե����뤬�������ɤ���
	function is_picture($file, $size = null) {
		if (is_null($size))	$size = $this->getimagesize($file);
		if (is_array($size)) {
			if ($size[2] > 0 && $size[2] < 4) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		return FALSE;
	}
	// Flash���ɤ���
	function is_flash($file, $size = null) {
		if ($this->func->is_url($file))
		{
			return FALSE;
		}

		if (is_null($size))	$size = $this->getimagesize($file);

		if ($size[2] === 4 || $size[2] === 13) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function get_show_imagesize (& $img, & $params) {
		// ���ꤵ�줿����������Ѥ���
		$width = $img['org_w'];
		$height = $img['org_h'];
		$choose = '';
		if (!$params['_%'] && $params['_size']) {
			if ($width === 0 && $height === 0) {
				$width  = $params['_w'];
				$height = $params['_h'];
			} else if ($params['zoom']) {
				$_w = $params['_w'] ? $width  / $params['_w'] : 0;
				$_h = $params['_h'] ? $height / $params['_h'] : 0;
				$choose = ($_w > $_h)? 'w' : 'h';
				$zoom = max($_w, $_h);
				$params['_%'] = round(100 / $zoom);
			} else {
				$width  = $params['_w'] ? $params['_w'] : $width;
				$height = $params['_h'] ? $params['_h'] : $height;
			}
		}
		if ($params['_%']) {
			if (!empty($params['_max']) && $params['_%'] > 100) {
				$width = $img['org_w'];
				$height = $img['org_h'];
			} else {
				if ($choose) {
					if ($choose === 'w') {
						$height = (int)($params['_w']/$width * $height);
						$width  = $params['_w'];
					} else {
						$width  = (int)($params['_h']/$height * $width);
						$height = $params['_h'];
					}
				} else {
					$width  = (int)($width  * $params['_%'] / 100);
					$height = (int)($height * $params['_%'] / 100);
				}
			}
			$params['_%'] = round($params['_%']);
		}

		$img['title'] = "SIZE:{$img['org_w']}x{$img['org_h']}" . (!empty($params['fsize'])? "({$params['fsize']})" :'');
		$img['info'] = ($width && $height)? ' width="'.$width.'" height="'.$height.'"' : '';
		$img['width'] = $width;
		$img['height'] = $height;
	}

	// ź�եե�����������
	function get_fileinfo($file)
	{
		static $ret = array();

		if (isset($ret[$this->xpwiki->pid][$file])) return $ret[$this->xpwiki->pid][$file];

		$ret[$this->xpwiki->pid][$file] = $this->load_attach_log($file);
		//$ret[$this->xpwiki->pid][$file] = $this->func->get_attachstatus($file);

		return $ret[$this->xpwiki->pid][$file];
	}

	// attach ���ե��������
	function load_attach_log($file) {
		$status = array(
			'count'    => array(0),
			'age'      => '',
			'pass'     => '',
			'freeze'   => FALSE,
			'copyright'=> FALSE,
			'owner'    => 0,
			'ucd'      => '',
			'uname'    => '',
			'md5'      => '',
			'admins'   => 0,
			'org_fname'=> '',
			'imagesize'=> NULL,
			'noinline' => 0,
			'mime'     => ''
		);
		if (is_file($file.'.log'))
		{
			$data = array_pad(file($file.'.log'), count($status), '');
			foreach ($status as $key=>$value)
			{
				$status[$key] = chop(array_shift($data));
			}
			$status['count'] = explode(',',$status['count']);
			$status['imagesize'] = @ unserialize($status['imagesize']);
		}
		return $status;
	}

	// ���᡼�������������
	function getimagesize($file) {
		// ź�եե�����ϻ����˥ե����륿���פ򸡺� (getimagesize �ϥ����Ȥ��⤤)
		if (strpos($file, $this->cont['UPLOAD_DIR']) === 0) {
			$status = $this->get_fileinfo($file);
			if ($status) {
				return $status['imagesize'];
			}
			return FALSE;
		} else {
			// URL���ϥ������������ե�����ξ��
			// check cache
			$key = 'isize_' . sha1($file);
			$ret = $this->func->cache_get_db($key, 'ref', false, true);
			if ($ret) {
				return unserialize($ret);
			} else {
				$ret = @ getimagesize($file);
				$this->func->cache_save_db(serialize($ret), 'ref', 864000, $key);
				return $ret;
			}
		}
	}

	// ��������å��夬���뤫Ĵ�٤�
	function cache_image_fetch (& $lvar) {
		$parse = parse_url($lvar['name']);
		$query = (isset($parse['query']))? $parse['query'] : '';
		if ($query) {
			if ($pos = strrpos($query, '=')) {
				$query = substr($query, $pos + 1);
			}
		}
		$name = $parse['host'] . '_' . ($query? $query :basename($parse['path']));
		$filename = $this->cont['UPLOAD_DIR'].$this->func->encode($lvar['page'])."_".$this->func->encode($name);

		$cache = FALSE;
		$size = array();
		if (!is_file($filename)) {
			$ht = new Hyp_HTTP_Request();
			$ht->init();
			$ht->ua = 'Mozilla/5.0';
			$ht->url = $lvar['name'];
			$ht->get();

			if ($ht->rc == 200 && $ht->data) {
				$dat['data'] = $ht->data;
				// �������ȳ��Υե����������ݸ��
				$copyright = ! ($this->func->refcheck(0,$lvar['name']) || preg_match($this->cont['NO_REF_EXTIMG_REG'], $lvar['name']));
			} else {
				// �ե����뤬�����Ǥ��ʤ��Τ� noimage �Ȥ���
				$copyright = 0;
				$dat['data'] = file_get_contents($this->cont['IMAGE_DIR'].'noimage.png');
			}
			if ($this->cache_image_save($dat['data'], $lvar['page'], $filename, $name, $copyright)) {
				$cache = TRUE;
			}
		} else {
			// ���Ǥ˥���å���Ѥ�
			$cache = TRUE;
		}
		if ($cache) {
			$lvar['name'] = $name;
			$lvar['file'] = $filename;
			// ���ե��������
			$lvar['status'] = $this->get_fileinfo($lvar['file']);
		} else {
			$lvar['file'] = '';
		}
		return;
	}

	// ��������å������¸
	function cache_image_save(& $data, $page, $filename, $name, $copyright)
	{
		$attach = $this->func->get_plugin_instance('attach');
		if (!$attach || !method_exists($attach, 'do_upload')) {
			return FALSE;
		}

		$save_file = tempnam(rtrim($this->cont['UPLOAD_DIR'], '/'), 'ref');
		chmod($save_file, 0606);
		if (file_put_contents($save_file, $data, LOCK_EX)) {
			$options = array('asSystem' => TRUE, 'overwrite' => TRUE);
			if (isset($this->root->post['filename'])) unset($this->root->post['filename']);
			$ret = $attach->do_upload($page, $name, $save_file, $copyright, NULL, TRUE, $options);
			return $ret['result'];
		} else {
			return FALSE;
		}
	}

	// ����ͥ�����������
	function make_thumb($o_file,$s_file,$width,$height,$quality)
	{
		return HypCommonFunc::make_thumb($o_file,$s_file,$width,$height,"1,95",FALSE,$quality);
	}

	// ��ĥ�ѥ�᡼�����ν���
	function check_arg_ex (& $params, & $lvar) {
		if (is_string($params['caption']) && $params['caption']) {
			$params['_title'][] = $params['caption'];
			$params['caption'] = true;
		}
		foreach ($params['_args'] as $arg){
			$m = array();
			if (preg_match("/^(m)?w(?:idth)?:([0-9]+)?$/i",$arg,$m)){
				if (!empty($m[2])) {
					$params['_size'] = TRUE;
					$params['_w'] = $m[2];
					$params['zoom'] = ($m[1])? TRUE: FALSE;
					$params['_max'] = $params['zoom'];
				}
			} else if (preg_match("/^(m)?h(?:eight)?:([0-9]+)?$/i",$arg,$m)){
				if (!empty($m[2])) {
					$params['_size'] = TRUE;
					$params['_h'] = $m[2];
					$params['zoom'] = ($m[1])? TRUE: FALSE;
					$params['_max'] = $params['zoom'];
				}
			} else if (preg_match("/^([0-9.]+)%$/i",$arg,$m)){
				$params['_%'] = $m[1];
			} else if (preg_match("/^t:(.*)$/i",$arg,$m)){
				$m[1] = htmlspecialchars(str_replace("&amp;quot;","",$m[1]));
				if ($m[1]) $lvar['title'][] = $m[1];
			} else if (preg_match('/^([0-9]+)x([0-9]+)$/', $arg, $m)) {
				$params['_size'] = TRUE;
				$params['_w'] = $m[1];
				$params['_h'] = $m[2];
			} else {
				$params['_title'][] = $arg;
			}
			if (! $params['_w'] || ! $params['_h']) $params['zoom'] = TRUE;
		}
	}

	function make_uploadlink(& $params, & $lvar, $args) {

		$params['_error'] = '';

		$this->fetch_options($params, $args, $lvar);

		if ($params['btn']) {
			if (strtolower(substr($params['btn'], -4)) === "auth") {
				$params['btn'] = rtrim(substr($params['btn'], 0, strlen($params['btn'])-4),':');
				$params['auth'] = TRUE;
			}
		}
		if (! $params['btn']) {
			$params['btn'] = '[' . $this->root->_LANG['skin']['upload'] . ']';
		} else {
			$params['btn'] = htmlspecialchars($params['btn']);
		}

		if (! $_attach = $this->func->get_plugin_instance('attach')) {
			$params['_body'] = $params['btn'];
			return;
		}

		if (($params['auth'] || $this->cont['ATTACH_UPLOAD_EDITER_ONLY']) && ($this->cont['PKWK_READONLY'] === 1 || ! $this->func->check_editable($lvar['page'], FALSE, FALSE))) {
			$params['_body'] = $params['btn'];
		} else {
			$returi = ($this->root->render_mode !== 'render')? '' :
				'&amp;returi='.rawurlencode($_SERVER['REQUEST_URI']);
			$name = (!empty($lvar['refid']))? '&amp;refid=' . rawurlencode($lvar['refid']) : (($lvar['name'])? '&amp;filename=' . rawurlencode($lvar['name']) : '');
			$js_option = '{returi:\''.str_replace('\'', '\\\'', $_SERVER['REQUEST_URI']).'\'';
			$js_option .= (!empty($lvar['refid']))? ',refid: \''.str_replace('\'', '\\\'', $lvar['refid']).'\'}' : (($lvar['name'])? ',filename: \''.str_replace('\'', '\\\'', $lvar['name']).'\'}' : '}');
			$js = ' onclick="return XpWiki.fileupFormPopup(\''.$this->root->mydirname.'\',\''.str_replace('\'', '\\\'', $lvar['page']).'\','.$js_option.')"';
			$params['_body'] = '<a href="'.$this->root->script.
				'?plugin=attach&amp;pcmd=upload'.$name.
				'&amp;page='.rawurlencode($lvar['page']).
				$returi.
				'" title="'.$this->root->_LANG['skin']['upload'].'"'.$js.'>'.
				'<img src="'.$this->cont['IMAGE_DIR'].'file.png" width="20" height="20" alt="'.$this->root->_LANG['skin']['upload'].'" title="'.$this->root->_LANG['skin']['upload'].'">'.
				$params['btn'].'</a>';
		}
	}

	function fetch_options (& $params, $args, & $lvar) {
		// �Ĥ�ΰ����ν���
		parent::fetch_options($params, $args);

		// ��ĥ�ѥ�᡼�����ν���
		$this->check_arg_ex($params, $lvar);

		//���饤�����Ƚ��
		if ($params['right']) {
			$params['_align'] = 'right';
		} else if ($params['left']) {
			$params['_align'] = 'left';
		} else if ($params['center']) {
			$params['_align'] = 'center';
		}
	}
}
?>