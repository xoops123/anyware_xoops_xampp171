<?php
/*
**�Ȥ��� (sonots �С������) [#ee9649c9]
***�� [#r1bd66ec]
 #iframe(URL[,���ץ����])
-URL~
�Ȥꤳ��URL�����Ĥ���Ƥ����Τ����Ȥꤳ��ʤ������Ĥ���URL�� iframe.inc.php ������ꤹ�롣���Х��ɥ쥹�Τߵ��Ĥ����褦�����ꤷ�Ƥ���������
-style~
�����������ꡣ������ style="width:500px;height:500px;" �Τ褦�˻��ꡣCSS�ե�������ε��Ҥ���ͥ�褵��롣~
�Ȥ���� IE�ʳ�(Mozilla, Opera) �Ǥ� object ��������Ѥ��Ƥ���Τ��������κ� height:100% �Ǥ����� 100% ��ɽ���ˤʤ�ʤ���height:500px �����̵꤬��
-iestyle~
IE �ѤΥ���������ꡣ���ꤵ��ʤ��Ƥ� style ���ͤ��Ȥ��롣������ iestyle="width:500px;height:500px;" �Τ褦�˻��ꡣCSS�ե�������ε��Ҥ���ͥ�褵��롣~
�Ȥ���� width:100% �Ǥϥ�������С����ڤ줿�Τ� width:99% �����̵꤬��height:100% �Ϥ��ä��ǤϤ���餷����

***������ˡ [#i568a4ac]
iframe.inc.php �򳫤������Ĥ��� URL ���Խ����ޤ���
-$iframe_accept_regurl~
����ɽ���ˤ����ꡣ�ۥ��ȵ��Ĥʤɤ˻��ѡ����
 $iframe_accept_regurl = '^http://www.google.co.jp$|^http://pukiwiki.org'; 
http://www.google.co.jp ����ġ�http://pukiwiki.org �ʲ��Υڡ����򤹤٤Ƶ��ġ�
����ɽ���ʤΤ������� \. �ˤ��٤��Ǥ���
-$iframe_accept_url~
������ʸ����ޥå��ˤ����ꡣ��ˤ��������Ѥ�������������
���ܸ����Ѥ������URL���󥳡��ɤ��Ƥ������ȡ����
 $iframe_accept_url = array(
 'http://pukiwiki.org/index.php?%E8%87%AA%E4%BD%9C%E3%83%97%E3%83%A9%E3%82%B0%E3%82%A4%E3%83%B3%2Fiframe.inc.php',
 );

�ǥե���ȤΥ������ϥ������륷���Ȥ��Խ����뤳�Ȥǻ����ǽ�Ǥ���
-skin/css/iframe.css~
 .iframe_others
 {
 	height: 600px;
 	width:100%;
 	margin-left:auto;
 	margin-right:auto;
 }
 
 .iframe_ie
 {
 	height: 600px;
 	width:100%;
 	margin-left:auto;
 	margin-right:auto;
 }

*/

class xpwiki_plugin_iframe extends xpwiki_plugin {
	function plugin_iframe_init () {
		//////////////////////////////////////////
		//  iframe.inc.php by ino_mori and sonots
		//////////////////////////////////////////
		
		//����ɽ���ˤ����ꡣ�ۥ��ȵ��Ĥʤɤ˻��ѡ�
		$this->iframe_accept_regurl = '^http://([a-z]+\.)*google\.co(\.jp|m)/'; 
		//������ʸ����ޥå�����ˤ��������Ѥ����������������ܸ����Ѥ������URL���󥳡��ɤ��Ƥ������ȡ�
		$this->iframe_accept_url = array(
			'',
		);
	}
	
	function plugin_iframe_inline()
	{
		if (!func_num_args())
		{
			return 'no argument(s).';
		}
		return $this->plugin_iframe_body(func_get_args());
	}
	
	function plugin_iframe_convert()
	{
		if (!func_num_args())
		{
			return 'no argument(s).';
		}
		return $this->plugin_iframe_body(func_get_args());
	}
	
	function plugin_iframe_body($args)
	{
		$url = array_shift( $args );
		
		if(! ereg( $this->iframe_accept_regurl , $url ) ) // ����ɽ���ޥå�������
		{
			$match = FALSE;
			foreach( $this->iframe_accept_url as $value ) // ������ʸ����ޥå�
			{
				if( $value == $url )
				{
					$match = TRUE;
				}
			}
			if(! $match)
			{
				return "not accepted.";
			}
		}
		
		// �ڡ�������å����̵����
		$this->root->pagecache_min = 0;
		
		// CSS �ɤ߹���
		$this->func->add_tag_head('iframe.css');
		
		$url = htmlspecialchars($url); 
		$params = array(
			'style'    => FALSE,
			'iestyle'   => FALSE,
			'_args'   => array(),
		);
		
		$this->fetch_options($params, $args);
		
		$style = '';
		
		// USER_AGENT �� IE �ξ��� iframe ���������
		// ����ƥ�Ĥ�height,width���ͤ��⾮�������Ǥ���ߡ���scrollbar��ɽ������Ƥ��ޤ�����
		// iframe ����Ѥ���ˤ� XHTML1.1 �Τޤޤ��� XHTML ��ʸ���顼
		if (ereg("MSIE (3|4|5|6|7)", $this->root->ua ) )
		{
			$this->root->pkwk_dtd = $this->cont['PKWK_DTD_XHTML_1_0_TRANSITIONAL'];
			$this->root->html_transitional = 1;
			$class=" class=\"iframe_ie\"";
			if ( $params['iestyle'] != FALSE )
			{
				$style = ' style="' . htmlspecialchars(strip_tags(trim($params['iestyle'], '"'))) . '"'; 
			}
			else if ( $params['style'] != FALSE )
			{
				$style = ' style="' . htmlspecialchars(strip_tags(trim($params['style'], '"'))) . '"';
			}
			
			return <<<HTML
<iframe frameborder="0"${class}${style} src="$url">
Please see here by browsers dealing with iframe tag.<br />
Go to <a href="$url">$url</a>
</iframe>
HTML;
	
		}
		else
		// ����¾�Υ֥饦���� object ���������
		{
			$class = ' class="iframe_others"';
			if ( $params['style'] != FALSE )
			{
				$style = " style=".$params['style'];
			}
	
			return <<<HTML
<object${class}${style} data="$url" type="text/html">
Please see here by browsers dealing with object tag.<br />
Go to <a href="$url">$url</a>
</object>
HTML;
	
		}
	}
	
}
?>