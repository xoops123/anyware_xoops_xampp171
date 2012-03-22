<?php
class xpwiki_plugin_yahoo extends xpwiki_plugin {
	// PukiWiki - Yet another WikiWikiWeb clone.
	// $Id: yahoo.inc.php,v 1.10 2011/10/28 13:33:11 nao-pon Exp $
	/////////////////////////////////////////////////

	// #yahoo([Format Filename],[Mode],[Key Word],[Node Number],[Sort Mode])

	var $appid = '';
	var $appid_upg = '';

	function plugin_yahoo_init()
	{
		$this->config = array(
			//////// Config ///////
			'adult_ok'   => 1, // [1|0]������ȥ���ƥ�Ĥθ�����̤�ޤ�뤫�ɤ�������ꤷ�ޤ���1�ξ��ϥ�����ȥ���ƥ�Ĥ�ޤߤޤ���
			'similar_ok' => 1, // [1|0]Ʊ������ƥ�Ĥ��̤θ�����̤Ȥ��뤫�ɤ�������ꤷ�ޤ���1�ξ���Ʊ������ƥ�Ĥ�ޤߤޤ�
			'ng_site'    => "", // ����������([SPACE]���ڤ�Ǻ���30������)
			'coloration' => "any", // ���������оݤο�����[any|color|bw]
			'format_web' => "any", // �����о�[any|html|msword|pdf|ppt|rss|txt|xls](Web)
			'format_img' => "any", // �����о�[any|bmp|gif|jpeg|png](Image)
			'format_mov' => "any", // �����о�[any|avi|flash|mpeg|msmedia|quicktime|realmedia](Movie)
			'max_web'    => 10, // ��������ε�����(Web)
			'max_img'    => 5, // ��������ε�����(Image)
			'max_mov'    => 4, // ��������ε�����(Movie)
			'col_web'    => 1, // ɽ������ε�����(Web)
			'col_img'    => 5, // ɽ������ε�����(Image)
			'col_mov'    => 4, // ɽ������ε�����(Movie)
			'cache_time' => 14400, // Cache time (min) 14400m = 10 days
			'YouTubeNAVI'=> 1, // ư�踡���� YouTube NAVI �ؤΥ�󥯤��ղä���
			//////// Config ///////
		);
		$this->appid = '';
		$this->appid_upg = '';
	}

	function plugin_yahoo_convert()
	{
		$args = func_get_args();
		if (count($args) < 2)
		{
			return "<p>{$this->msg['err_option']}</p>";
		}

		$this->load_language();

		$mode = array_shift($args);
		$query = array_shift($args);
		$youtube = "";

		// mode Ƚ��
		$mode = trim(strtolower($mode));
		switch($mode)
		{
			case "web":
				$mode = "web";
				$more = "http://search.yahoo.co.jp/search?p=".rawurlencode($query)."&amp;ei=".$this->cont['SOURCE_ENCODING']."&amp;b=";
				$more_add = 1;
				break;
			case "image":
			case "img":
				$mode = "img";
				$more = "http://image-search.yahoo.co.jp/search?p=".rawurlencode($query)."&amp;ei=".$this->cont['SOURCE_ENCODING'];
				$more_add = FALSE;
				break;
			case "movie":
			case "mov":
				$mode = "mov";
				$more = "http://video.search.yahoo.co.jp/search/video?p=".rawurlencode($query)."&amp;ei=".$this->cont['SOURCE_ENCODING'];
				$more_add = FALSE;
				if (!empty($this->config['YouTubeNAVI']))
				{
					$youtube = ' [ <a href="http://youtube.navi-gate.org/tag/'.$this->plugin_yahoo_youtube_urlencode(mb_convert_encoding($query,"UTF-8",$this->cont['SOURCE_ENCODING'])).'/" target="'.$this->root->link_target.'">YouTube NAVI: '.htmlspecialchars($query).'</a> ]';
				}
				break;
			//case "related":
			//case "rel":
			//	$mode = "rel";
			//	break;
			default:
				// web
				$mode = "web";
		}

		$prms = array("target"=>$this->root->link_target,"type"=>"and","max"=>$this->config['max_'.$mode],"col"=>$this->config['col_'.$mode]);
		$this->fetch_options ($prms, $args);
		$max = (int)$prms['max'];
		$more = "<a href='".$more.(($more_add !== FALSE)? ($max + $more_add) : '')."' target='".htmlspecialchars($prms['target'])."'>".sprintf($this->msg['msg_more'],htmlspecialchars($query),$this->msg['msg_'.$mode])."</a>";

		list($ret,$refresh) = $this->plugin_yahoo_get($mode,$query,$prms['type'],$max,$prms['target'],$prms['col']);

		$cr = '<!-- Begin Yahoo! JAPAN Web Services Attribution Snippet -->
<a href="http://developer.yahoo.co.jp/about" target="'.$this->root->link_target.'"><img src="http://i.yimg.jp/images/yjdn/yjdn_attbtn2_105_17.gif" width="105" height="17" title="'.$this->msg['msg_websvc'].' by Yahoo! JAPAN" alt="'.$this->msg['msg_websvc'].' by Yahoo! JAPAN" border="0" style="margin:15px 15px 15px 15px"></a>
<!-- End Yahoo! JAPAN Web Services Attribution Snippet -->';

		$this->func->add_tag_head('yahoo.css');
		return "<div class='yahoo'>{$ret}</div>{$cr}{$more}{$youtube}";

	}

	function plugin_yahoo_get($mode,$query,$type,$max,$target,$col,$do_refresh=FALSE)
	{
		$ttl = $this->config['cache_time'] * 60;
		$key = md5($mode.$query.$type.$max.$target.$col);

		// ����å���Ƚ��
		if (! $html = $this->func->cache_get_db($key, 'yahoo')) {
			$html = $this->plugin_yahoo_gethtml($mode,$query,$type,$max,$target,$col);

			// ����å�����¸
			if ($html) {
				if ($html === $this->msg['err_badres']) {
					$ttl = 3600; // 1h
				}
				$this->func->cache_save_db($html, 'yahoo', $ttl, $key);
			}

			// Update plainDB
			$this->func->need_update_plaindb();
		}

		return array($html,0);

	}

	function plugin_yahoo_gethtml($mode,$query,$type,$max,$target,$col)
	{
		include_once XOOPS_TRUST_PATH. '/class/hyp_common/hyp_simplexml.php';

		if ($this->root->yahoo_application_id) {
			$this->appid = $this->root->yahoo_application_id;
		}
		if ($this->root->yahoo_app_upgrade_id) {
			$this->appid_upg = $this->root->yahoo_app_upgrade_id;
		}

		$qs = htmlspecialchars($query);
		// REST�ꥯ�����Ȥι���
		$query = rawurlencode(mb_convert_encoding(trim($query),"UTF-8",$this->cont['SOURCE_ENCODING']));
		$max = (int)$max;
		$type = trim(strtolower($type));
		switch($type)
		{
			case "and":
			case "all":
				$type = "all";
				break;
			case "or":
			case "any":
				$type = "any";
				break;
			case "word":
			case "phrase":
				$type = "phrase";
				break;
			default:
				$type = "any";
		}
		$mode = trim(strtolower($mode));
		switch($mode)
		{
			case "image":
			case "img":
				$mode = "img";
				if ($this->appid_upg) {
					$url = 'http://search.yahooapis.jp/PremiumImageSearchService/V1/imageSearch?appid='.$this->appid_upg;
				} else {
					$url = 'http://search.yahooapis.jp/ImageSearchService/V2/imageSearch?appid='.$this->appid;
				}
				$url .= "&query={$query}&results={$max}&type={$type}";
				break;
			case "movie":
			case "mov":
				$mode = "mov";
				$url = "http://search.yahooapis.jp/VideoSearchService/V2/videoSearch?appid={$this->appid}&query={$query}&results={$max}&type={$type}";
				break;
			case "related":
			case "rel":
				$mode = "rel";
				$url = "http://search.yahooapis.jp/AssistSearchService/V1/webunitSearch?appid={$this->appid}&query={$query}&results={$max}";
				break;
			case "web":
			default:
				$mode = "web";
				if ($this->appid_upg) {
					$url = 'http://search.yahooapis.jp/PremiumWebSearchService/V1/webSearch?appid='.$this->appid_upg;
				} else {
					$url = 'http://search.yahooapis.jp/WebSearchService/V2/webSearch?appid='.$this->appid;
				}
				$url .= "&query={$query}&results={$max}&type={$type}";
		}

		// �ǡ�������
		$xml = $this->func->http_request($url);
		if ($xml['rc'] == 200 && $xml['data'])
		{
			$xml = $xml['data'];
			$xm = new HypSimpleXML();
			$xml = $xm->XMLstr_in($xml);
			// �����ǡ����ʤ�
			if (!$xml['totalResultsReturned'])
			{
				return sprintf($this->msg['msg_notfound'],$qs,$this->msg['msg_'.$mode]);
			}
		}
		else
		{
			// �ǡ����������顼
			return $this->msg['err_badres'];

		}

		// �����ǡ����ʤ�
		if (!$xml['totalResultsReturned'])
		{
			return sprintf($this->msg['msg_notfound'],$qs,$this->msg['msg_'.$mode]);
		}

		$func = "plugin_yahoo_build_".$mode;
		$html = $this->$func($xml,$target,$col);
		return $html;
	}

	function plugin_yahoo_build_web($xml,$target,$col)
	{
		//$xml['totalResultsAvailable'];
	    //$xml['totalResultsReturned'];
	    //$xml['firstResultPosition'];

		$linkurl = 'Url'; // 'URL' or 'ClickUrl'

		$dats = array();
		if (isset($xml['Result'][0]))
		{
			$dats = $xml['Result'];
		}
		else
		{
			$dats[0] = (empty($xml['Result']))? array() : $xml['Result'];
		}

		$html = "";
		if ($dats)
		{
			$html = $sdiv = $ediv = "";
			if ($col > 1)
			{
				$sdiv = "<div style='float:left;width:".(intval(99/$col*10)/10)."%'>";
				$ediv = "</div><div style='clear:left;'></div>";
			}
			$cnt = 0;
			$limit = ceil(count($dats)/$col);
			$html .= $sdiv."<ul>";
			mb_convert_variables($this->cont['SOURCE_ENCODING'],"UTF-8",$dats);
			foreach ($dats as $dat)
			{
				if ($this->plugin_yahoo_check_ngsite($dat['ClickUrl'])) {continue;}
				if ($cnt++ % $limit === 0 && $cnt !== 1) $html .= "</ul></div>".$sdiv."<ul>";
				$html .= "<li>";
				$html .= "<a href='".$dat[$linkurl]."' target='{$target}'>".$dat['Title']."</a>";
				$html .= "<div class='quotation'>".$this->func->make_link($dat['Summary'])."</div>";
				$html .= "</li>";
			}
			$html .= "</ul>".$ediv;
		}

		return $html;
	}

	function plugin_yahoo_build_img($xml,$target,$col)
	{
		$dats = array();
		if (isset($xml['Result'][0]))
		{
			$dats = $xml['Result'];
		}
		else
		{
			$dats[0] = (empty($xml['Result']))? array() : $xml['Result'];
		}

		$html = "";
		if ($dats)
		{
			$cnt = 0;
			$html = "<table><tr>";
			mb_convert_variables($this->cont['SOURCE_ENCODING'],"UTF-8",$dats);
			foreach ($dats as $dat)
			{
				if ($this->plugin_yahoo_check_ngsite($dat['ClickUrl'])) {continue;}
				$title = "[".htmlspecialchars($dat['Title'])."]".htmlspecialchars($dat['Summary']);
				$size = $dat['Width']." x ".$dat['Height']." ".$dat['FileSize'];
				$site = "[ <a href=\"".htmlspecialchars($dat['RefererUrl'])."\" target='{$target}'>Site</a> ]";

				if ($cnt++ % $col === 0 && $cnt !== 1) $html .= "</tr><tr>";
				$html .= "<td style='text-align:center;vertical-align:middle;'>";
				$html .= "<a href=\"".$dat['ClickUrl']."\" target=\"{$target}\" title=\"{$title}\" type=\"img\"><img src=\"{$dat['Thumbnail']['Url']}\" width=\"{$dat['Thumbnail']['Width']}\" height=\"{$dat['Thumbnail']['Height']}\" alt=\"{$title}\" title=\"{$title}\" /></a>";
				$html .= "<br /><small>".$size."<br />".$site."</small>";
				$html .= "</td>";
			}
			$html .= "</tr></table>";
		}

		return $html;
	}

	function plugin_yahoo_build_mov($xml,$target,$col)
	{
		$dats = array();
		if (isset($xml['Result'][0]))
		{
			$dats = $xml['Result'];
		}
		else
		{
			$dats[0] = (empty($xml['Result']))? array() : $xml['Result'];
		}

		$html = "";
		if ($dats)
		{
			$cnt = 0;
			$html = "<table><tr>";
			mb_convert_variables($this->cont['SOURCE_ENCODING'],"UTF-8",$dats);
			foreach ($dats as $dat)
			{
				if ($this->plugin_yahoo_check_ngsite($dat['ClickUrl'])) {continue;}
				$title = "[".htmlspecialchars($dat['Title'])."]".htmlspecialchars($dat['Summary']);
				$size = $dat['Width']." x ".$dat['Height'];
				$site = "[ <a href=\"".htmlspecialchars($dat['RefererUrl'])."\" target='{$target}'>Site</a> ]";
				$min = (int)($dat['Duration'] / 60);
				$sec = sprintf("%02d",($dat['Duration'] % 60));
				$length = $min.":".$sec;

				if ($cnt++ % $col === 0 && $cnt !== 1) $html .= "</tr><tr>";
				$html .= "<td style='text-align:center;vertical-align:middle;'>";
				$html .= "<a href='".$dat['ClickUrl']."' target='{$target}'><img src='{$dat['Thumbnail']['Url']}' width='{$dat['Thumbnail']['Width']}' height='{$dat['Thumbnail']['Height']}' alt=\"{$title}\" title=\"{$title}\" /></a>";
				$html .= "<br />".$size." ".$length."<br />".$site;
				$html .= "</td>";
			}
			$html .= "</tr></table>";
		}

		return $html;
	}

	function plugin_yahoo_build_rel($xml,$target,$col)
	{
		$html = '';
		return $html;
	}

	function plugin_yahoo_check_ngsite($url)
	{
		static $ngsites = array();
		if (!isset($ngsites[$this->xpwiki->pid])) {$ngsites[$this->xpwiki->pid] = null;}
		if (is_null($ngsites[$this->xpwiki->pid]))
		{
			$ngsites[$this->xpwiki->pid] = explode(" ",$this->config['ng_site']);
		}
		foreach($ngsites[$this->xpwiki->pid] as $ngsite)
		{
			if ($ngsite && preg_match("#".preg_quote($ngsite,"#")."#i",$url))
			{
				return true;
			}
		}
		return false;
	}

	function plugin_yahoo_youtube_urlencode($tag)
	{
		return (preg_match('/^[0-9a-z\-\. ][0-9a-z\-\._ ]*$/i', $tag))? urlencode($tag) : "_".$this->func->encode($tag);
	}
}
?>