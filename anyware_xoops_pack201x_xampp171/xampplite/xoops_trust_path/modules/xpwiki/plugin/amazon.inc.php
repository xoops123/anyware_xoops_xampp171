<?php
// PukiWiki - Yet another WikiWikiWeb clone.
// $Id: amazon.inc.php,v 1.14 2011/11/26 12:03:10 nao-pon Exp $
// Id: amazon.inc.php,v 1.1 2003/07/24 13:00:00 �׼�
//
// Amazon plugin: Book-review maker via amazon.com/amazon.jp
//
// Copyright:
//	2004-2005 PukiWiki Developers Team
//	2003 �׼� <raku@rakunet.org> (Original author)
//
// License: GNU/GPL
//
// ChangeLog:
// * 2004/04/03 PukiWiki Developer Team (arino <arino@users.sourceforge.jp>)
//        - replace plugin_amazon_get_page().
//        - PLUGIN_AMAZON_XML 'xml.amazon.com' -> 'xml.amazon.co.jp'
// * 0.6  URL ��¸�ߤ��ʤ���硢No image ��ɽ�����������֤ʤɽ�����
//        ����饤��ץ饰����θƤӽФ���������
//	  ASIN �ֹ���ʬ������å����롣
//	  �����������ȥ�Υ���å���ˤ��®�٤��������åס�
// * 0.7  �֥å���ӥ塼�����ΥǥХå���ǧ������ΰ���Υ��ꥢ��
// * 0.8  amazon �����ʤβ�����ɽ����
//	  ������������ ID ���б���
// * 0.9  RedHat9+php4.3.2+apache2.0.46 �ǲ���������ޤǤ����ɤ߹��ޤ�ʤ�������н衣
//        ���ܸ�ڡ����β��˥֥å���ӥ塼�����Ȥ����ʸ���������ƺ��ʤ�����β�衣
//        ���ҤǤʤ� CD �ʤɡ�ASIN ��ʬ��Ĺ���Ƥ⥿���ȥ�򤦤ޤ������褦�ˤ��롣
//        �̱ƤΤ߼�����ΤǤʤ���С�B000002G6J.01 �Ƚ񤫤� B000002G6J �Ƚ񤤤Ƥ�̱Ƥ��Ф�褦�ˤ��롣
//	  ASIN ���б����륭��å������/����å��奿���ȥ�򤽤줾�������뵡ǽ�ɲá�
//	  proxy �б�(�Ū)��
//	  proxy �����β����ǰ��̥桼���Τ���� AID �Ϥʤ��Ȥ⼫ư��������뤳�Ȥ��狼�ꡢ���������
// * 1.0  �֥å���ӥ塼�Ǥʤ�����ӥ塼�Ȥ��롣
//        �����Υ���å������������¤��ߤ��롣
//        �����ȥ롢�̱Ƥ� Web Services �� XML ������������ˡ�ˤ�ä� get ���뤳�Ȥǻ��֤�û�̤��롣
//        ��ӥ塼�ڡ��������Υ����ߥ󥰤ˤĤ����������롣
// * 1.1  �Խ����¤򤫤��Ƥ����硢�����Ԥ���ӥ塼�����Ȥ��ơ��ڡ����ϤǤ��ʤ��� ASIN4774110655.tit �ʤɤΥ���å��夬�Ǥ���Τ��衣
//        �����κǸ夬 01 �ξ�硢image ��������� noimage.jpg �ȤʤäƤ��ޤ��Х�������
//        1.0 ��Ƴ������ XML ���������Ϲ�®�������֤��������󤬥����ʤΤǡ�09 ������ʤ� 01 ��ȥ饤���롢�ǻ���Ū�˲�衣
//
// Caution!:
// * �������Ϣ����١�www.amazon.co.jp �Υ����������ȥץ������ǧ�ξ头���Ѳ�������
// * ��ӥ塼�ϡ�amazon �ץ饰���󤬸ƤӽФ��Խ����̤Ϥ⤦����� PukiWiki ����Ͽ����Ƥ���Τǡ�
//   ��ߤ���ʤ���ʸ�������ƥڡ����ι����ܥ���򲡤����ȡ�
// * ���� PLUGIN_AMAZON_AID��PROXY �����Ф���ʬ��expire ����ʬ��Ŭ�����Խ����ƻ��Ѥ��Ƥ�������(¾�Ϥ��ΤޤޤǤ� Ok)��
//
// Thanks to: Reimy and PukiWiki Developers Team
//
class xpwiki_plugin_amazon extends xpwiki_plugin {

	/////////////////////////////////////////////////

	function plugin_amazon_init()
	{
		/////////////////////////////////////////////////
		// Settings

		// Amazon associate ID
		$this->config['PLUGIN_AMAZON_AID'] = $this->root->amazon_AssociateTag;

		// Expire caches per ? days
		$this->config['PLUGIN_AMAZON_EXPIRE_IMAGECACHE'] =  1;
		$this->config['PLUGIN_AMAZON_EXPIRE_TITLECACHE'] =  1;

		// Alternative image for 'Image not found'
		$this->config['PLUGIN_AMAZON_NO_IMAGE'] =  $this->cont['IMAGE_DIR'] . 'noimage.png';

		// For confirm (admin only)
		$this->config['conflink'] = ($this->root->userinfo['admin'])? ' ( <a href="'.$this->cont['HOME_URL'].'?cmd=conf#amazon_AssociateTag" target="_blank">confirm with this link</a> )' : '';

		// URI prefixes
		switch($this->cont['LANG']){
		case 'ja':
			// Amazon shop
			$this->config['PLUGIN_AMAZON_SHOP_URI'] =  'http://www.amazon.co.jp/exec/obidos/ASIN/';

			break;
		default:
			// Amazon shop
			$this->config['PLUGIN_AMAZON_SHOP_URI'] =  'http://www.amazon.com/exec/obidos/ASIN/';

			break;
		}
	}

	function xpwiki_plugin_amazon(& $func) {
		parent::xpwiki_plugin($func);

		// Amazon associate ID
		if (! $this->root->amazon_AssociateTag) {
			include_once XOOPS_TRUST_PATH . '/class/hyp_common/hsamazon/hyp_simple_amazon.php';
			$ama = new HypSimpleAmazon();
			$this->root->amazon_AssociateTag = $ama->AssociateTag;
			$ama = NULL;
		}
		$this->config['PLUGIN_AMAZON_AID'] = $this->root->amazon_AssociateTag;

		// Expire caches per ? days
		$this->config['PLUGIN_AMAZON_EXPIRE_IMAGECACHE'] =   1;
		$this->config['PLUGIN_AMAZON_EXPIRE_TITLECACHE'] =  10;

		// Alternative image for 'Image not found'
		$this->config['PLUGIN_AMAZON_NO_IMAGE'] =  $this->cont['IMAGE_DIR'] . 'noimage.png';

		// For confirm (admin only)
		$this->config['conflink'] = ($this->root->userinfo['admin'])? ' ( <a href="'.$this->cont['HOME_URL'].'?cmd=conf#amazon_AssociateTag" target="_blank">confirm with this link</a> )' : '';

		// URI prefixes
		switch($this->cont['LANG']){
		case 'ja':
			// Amazon shop
			$this->config['PLUGIN_AMAZON_SHOP_URI'] =  'http://www.amazon.co.jp/exec/obidos/ASIN/';

			break;
		default:
			// Amazon shop
			$this->config['PLUGIN_AMAZON_SHOP_URI'] =  'http://www.amazon.com/exec/obidos/ASIN/';

			break;
		}
	}

	function plugin_amazon_convert()
	{
		if (HypCommonFunc::get_version() < 20080224) {
			return '#amazon require "HypCommonFunc" >= Ver. 20080224';
		}
		if (func_num_args() > 3) {
			if ($this->cont['PKWK_READONLY']) return ''; // Show nothing

			return '#amazon([ASIN-number][,left|,right]' .
			'[,book-title|,image|,delimage|,deltitle|,delete])';

		} else if (func_num_args() == 0) {
			// ��ӥ塼����
			$this->load_language();

			if ($this->cont['PKWK_READONLY']) return ''; // Show nothing

			$s_page = htmlspecialchars($this->root->vars['page']);
			if ($s_page == '') $s_page = isset($this->root->vars['refer']) ? $this->root->vars['refer'] : '';
			$script = $this->func->get_script_uri();
			$ret = <<<EOD
<form action="{$script}" method="post">
 <div>
  <input type="hidden" name="cmd" value="amazon" />
  <input type="hidden" name="refer" value="$s_page" />
  ASIN(ISBN):
  <input type="text" name="asin" size="30" value="" />
  <input type="submit" value="{$this->msg['edit_btn']}" /> {$this->msg['edit_caption']}
 </div>
</form>
EOD;
			return $ret;
		}

		$aryargs = array_pad(func_get_args(),3,"");

		$align = strtolower($aryargs[1]);
		if ($align == 'clear') return '<div style="clear:both"></div>'; // ��������
		if ($align != 'left') $align = 'right'; // ���ַ���

		$this->asin_all = htmlspecialchars($aryargs[0]);  // for XSS
		if ($this->is_asin() == FALSE && $align != 'clear') return FALSE;

		if ($aryargs[2] != '') {
			// �����ȥ����
			$title = $alt = htmlspecialchars($aryargs[2]); // for XSS
			if ($alt == 'image') {
				$alt = $this->plugin_amazon_get_asin_title();
				if ($alt[0] === "\t") {
					$ret = trim($alt) . $this->config['conflink'];
				} else if ($alt === '') {
					$ret = FALSE;
				} else {
					$alt = trim($alt);
				}
				$title = '';
			} else if ($alt == 'delimage') {
				if (unlink($this->cont['CACHE_DIR'] . 'ASIN' . $this->asin . '.jpg')) {
					$ret = 'Image of ' . $this->asin . ' deleted...';
				} else {
					$ret = 'Image of ' . $this->asin . ' NOT DELETED...';
				}
			} elseif ($alt == 'deltitle') {
				if (unlink($this->cont['CACHE_DIR'] . 'ASIN' . $this->asin . '.tit')) {
					$ret = 'Title of ' . $this->asin . ' deleted...';
				} else {
					$ret = 'Title of ' . $this->asin . ' NOT DELETED...';
				}
			} elseif ($alt == 'delete') {
				if ((unlink($this->cont['CACHE_DIR'] . 'ASIN' . $this->asin . '.jpg') &&
				     unlink($this->cont['CACHE_DIR'] . 'plugin/' . $this->asin . '.aws'))) {
					$ret = 'Title and Image of ' . $this->asin . ' deleted...';
				} else {
					$ret = 'Title and Image of ' . $this->asin . ' NOT DELETED...';
				}
			}
			if (isset($ret)) return $ret? ('<div>' . $ret . '</div>') : FALSE;
		} else {
			// �����ȥ뼫ư����
			$alt = $title = $this->plugin_amazon_get_asin_title();
			if ($alt[0] === "\t") {
				return '<div>' . trim($alt) . $this->config['conflink'] . '</div>';
			} else if ($alt === '') {
				return FALSE;
			}
		}

		return $this->plugin_amazon_print_object($align, $alt, $title);
	}

	function plugin_amazon_action()
	{
		if ($this->cont['PKWK_READONLY']) $this->func->die_message('PKWK_READONLY prohibits editing');

		$s_page   = isset($this->root->vars['refer']) ? $this->root->vars['refer'] : '';
		$this->asin_all = isset($this->root->vars['asin']) ?
			htmlspecialchars(rawurlencode($this->func->strip_bracket($this->root->vars['asin']))) : '';

		if (! $this->is_asin()) {
			$retvars['msg']   = $this->msg['edit_title'];
			$retvars['refer'] = & $s_page;
			$retvars['body']  = $this->plugin_amazon_convert();
			return $retvars;

		} else {
			$r_page     = $s_page . '/' . $this->asin;
			$auth_user = isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : '';

			$this->func->pkwk_headers_sent();
			if ($this->root->edit_auth && ($auth_user == '' || ! isset($this->root->edit_auth_users[$auth_user]) ||
			    $this->root->edit_auth_users[$auth_user] != $_SERVER['PHP_AUTH_PW'])) {
			   	// Edit-auth failed. Just look the page
				$this->func->send_location($r_page);
			} else {
				$title = $this->plugin_amazon_get_asin_title();
				$author = $this->plugin_amazon_get_asin_creator();
				if ($title == '' || preg_match('#^/#', $s_page)) {
					// Invalid page name
					$this->func->send_location($s_page);
				} else {
					$this->load_language();
					$body = '#amazon(' . $this->asin_all . ',,image)' . "\n" .
					'*' . $title . "\n" . str_replace(array('$uname', '$author'), array($this->root->userinfo['uname'], $author), $this->msg['edit_body']);

					$edit =& $this->func->get_plugin_instance('edit');
					$this->root->vars['page'] = $r_page;
					$this->root->vars['msg'] = $body;
					return $edit->plugin_edit_preview();
				}
			}
			exit;
		}
	}

	function plugin_amazon_inline()
	{
		if (HypCommonFunc::get_version() < 20080224) {
			return '&amazon require "HypCommonFunc" >= Ver. 20080224';
		}

		list($this->asin_all) = func_get_args();

		$this->asin_all = htmlspecialchars($this->asin_all); // for XSS
		if (! $this->is_asin()) return FALSE;

		$title = $this->plugin_amazon_get_asin_title();
		if ($title[0] === "\t") {
			return trim($title) . $this->config['conflink'];
		} else if ($title === '') {
			return FALSE;
		} else {
			$this->config['PLUGIN_AMAZON_AID'] = $this->get_associate_tag($this->config['PLUGIN_AMAZON_AID']);
			return '<a href="' . $this->config['PLUGIN_AMAZON_SHOP_URI'] .
			$this->asin . '/' . $this->config['PLUGIN_AMAZON_AID'] . '/ref=nosim">' . $title . '</a>' . "\n";
		}
	}

	function plugin_amazon_print_object($align, $alt, $title)
	{
		$this->config['PLUGIN_AMAZON_AID'] = $this->get_associate_tag($this->config['PLUGIN_AMAZON_AID']);
		$url      = $this->plugin_amazon_cache_image_fetch($this->cont['CACHE_DIR']);
		$url_shop = $this->config['PLUGIN_AMAZON_SHOP_URI'] . $this->asin . '/' . $this->config['PLUGIN_AMAZON_AID'] . '/ref=nosim';
		$center   = 'text-align:center';

		if ($title == '') {
			// Show image only
			$div  = '<div style="float:' . $align . ';margin:16px 16px 16px 16px;' . $center . '">' . "\n";
			$div .= ' <a href="' . $url_shop . '"><img src="' . $url . '" alt="' . $alt . '" /></a>' . "\n";
			$div .= '</div>' . "\n";

		} else {
			// Show image and title
			$div  = '<div style="float:' . $align . ';padding:.5em 1.5em .5em 1.5em;' . $center . '">' . "\n";
			$div .= ' <table style="width:110px;border:0;' . $center . '">' . "\n";
			$div .= '  <tr><td style="' . $center . '">' . "\n";
			$div .= '   <a href="' . $url_shop . '"><img src="' . $url . '" alt="' . $alt  .'" /></a></td></tr>' . "\n";
			$div .= '  <tr><td style="' . $center . '"><a href="' . $url_shop . '">' . $title . '</a></td></tr>' . "\n";
			$div .= ' </table>' . "\n";
			$div .= '</div>' . "\n";
		}
		return $div;
	}

	function plugin_amazon_get_asin($asin)
	{
		$false = array('', '', '');
		if (!$asin) return $false;

		$nocache = $nocachable = 0;
		$error = $title = $image = $creator = '';

		$cache_dir = $this->cont['CACHE_DIR'] . 'plugin';

		if (is_dir($cache_dir) === FALSE || is_writable($cache_dir) === FALSE) $nocachable = 1; // ����å����ԲĤξ��

		$dat = $this->plugin_amazon_cache_fetch($cache_dir.'/', $asin);

		if ($dat && count($dat) === 3) {
			list($title, $image, $author) = $dat;
		} else {
			$nocache = 1; // ����å��師�Ĥ��餺

			include_once XOOPS_TRUST_PATH . '/class/hyp_common/hsamazon/hyp_simple_amazon.php';
			$ama = new HypSimpleAmazon($this->config['PLUGIN_AMAZON_AID']);
			if ($this->root->amazon_AccessKeyId) $ama->AccessKeyId = $this->root->amazon_AccessKeyId;
			if ($this->root->amazon_SecretAccessKey) $ama->SecretAccessKey= $this->root->amazon_SecretAccessKey;
			$ama->encoding = ($this->cont['SOURCE_ENCODING'] === 'EUC-JP')? 'EUCJP-win' : $this->cont['SOURCE_ENCODING'];
			$ama->itemLookup($this->asin);
			$tmpary = $ama->getCompactArray();
			if ($ama->error) $error = $ama->error;
			$ama = NULL;
			if (! empty($tmpary['Items'])) {
				$title = $tmpary['Items'][0]['TITLE'];
				$image = $tmpary['Items'][0]['MIMG'];
				$author = preg_replace('/^by: /', '', strip_tags($tmpary['Items'][0]['PRESENTER']));
			}
		}

		if ($title === '') {
			if ($error) {
				$false[] = $error;
			}
			return $false;
		} else {
			if ($nocache == 1 && $nocachable != 1)
				$this->plugin_amazon_cache_save(join("\t", array($title ,$image, $author)), $cache_dir);
			return array($title, $image, $author, '');
		}
	}

	// ����å��夬���뤫Ĵ�٤�
	function plugin_amazon_cache_fetch($dir, $asin)
	{
		$filename = $dir . $asin . '.aws';

		$get_tit = 0;
		if (! is_readable($filename)) {
			$get_tit = 1;
		} elseif ($this->config['PLUGIN_AMAZON_EXPIRE_TITLECACHE'] * 3600 * 24 < $this->cont['UTC'] - filemtime($filename)) {
			$get_tit = 1;
		}

		if ($get_tit) return FALSE;

		$dat = file_get_contents($filename);
		if ($dat && $dat !== "\t") {
			return explode("\t", $dat);
		} else {
			return FALSE;
		}
	}

	function plugin_amazon_get_asin_title()
	{
		if ($this->asin == '') return '';

		list($title,,,$error) = $this->plugin_amazon_get_asin($this->asin);

		return $error? ("\t" . $error) : trim($title);
	}

	function plugin_amazon_get_asin_creator()
	{
		if ($this->asin == '') return '';

		list(,, $creator) = $this->plugin_amazon_get_asin($this->asin);

		return $creator;
	}

	function plugin_amazon_cache_save($data, $dir)
	{
		$filename = $dir . $this->asin . '.aws';
		$fp = fopen($filename, 'w');
		fwrite($fp, $data);
		fclose($fp);

		return $filename;
	}

	// ��������å��夬���뤫Ĵ�٤�
	function plugin_amazon_cache_image_fetch($dir)
	{
		$filename = $dir . 'ASIN' . $this->asin . '.jpg';

		$get_img = 0;
		if (! is_readable($filename)) {
			$get_img = 1;
		} elseif ($this->config['PLUGIN_AMAZON_EXPIRE_IMAGECACHE'] * 3600 * 24 < $this->cont['UTC'] - filemtime($filename)) {
			$get_img = 1;
		}

		if ($get_img) {
			list($title, $url) = $this->plugin_amazon_get_asin($this->asin);

			$body = $url? $this->plugin_amazon_get_page($url) : '';
			if ($body) {
				$tmpfile = $dir . 'ASIN' . $this->asin . '.jpg.0';
				$fp = fopen($tmpfile, 'wb');
				fwrite($fp, $body);
				fclose($fp);
				$size = @ getimagesize($tmpfile);
				unlink($tmpfile);
				if ($size[1] <= 1) { // �̾��1���֤뤬ǰ�Τ���0�ξ���(reimy)
					$body = '';
				}
			}
			$this->plugin_amazon_cache_image_save($body, $this->cont['CACHE_DIR']);
		}

		if (($get_img && ! $body) || (! $get_img && ! filesize($filename))) {
			return $this->config['PLUGIN_AMAZON_NO_IMAGE'];
		} else {
			return str_replace($this->cont["DATA_HOME"], $this->cont["HOME_URL"], $filename);
		}
	}

	// Save image cache
	function plugin_amazon_cache_image_save($data, $dir)
	{
		$filename = $dir . 'ASIN' . $this->asin . '.jpg';
		$fp = fopen($filename, 'wb');
		fwrite($fp, $data);
		fclose($fp);

		return $filename;
	}

	function plugin_amazon_get_page($url)
	{
		$data = $this->func->http_request($url);
		return ($data['rc'] == 200) ? $data['data'] : '';
	}

	// is ASIN?
	function is_asin()
	{
		include_once XOOPS_TRUST_PATH . '/class/hyp_common/hsamazon/hyp_simple_amazon.php';
		$ama = new HypSimpleAmazon();
		$this->asin = $ama->ISBN2ASIN($this->asin_all);
		$ama = NULL;

		if (! preg_match('/[a-z0-9]{10}/i', $this->asin)) {
			$this->asin = '';
			return FALSE;
		}
		return TRUE;
	}

	function get_associate_tag($associate_tag) {
		if ($this->root->amazon_UseUserPref && ! empty($this->root->vars['page'])) {
			$user_pref = $this->func->get_user_pref($this->func->get_pg_auther($this->root->vars['page']));
			if (! empty($user_pref['amazon_associate_tag'])) {
				$associate_tag = preg_replace('/[^a-zA-Z0-9-]/', '', $user_pref['amazon_associate_tag']);
			}
		}
		return $associate_tag;
	}
}
?>