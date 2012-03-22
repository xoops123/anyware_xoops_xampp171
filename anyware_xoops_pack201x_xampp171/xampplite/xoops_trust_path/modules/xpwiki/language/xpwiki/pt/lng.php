<?php
// PukiWiki - Yet another WikiWikiWeb clone.
// $Id: lng.php,v 1.7 2011/12/08 07:01:00 nao-pon Exp $
// Copyright (C)
//   2002-2005 PukiWiki Developers Team
//   2001-2002 Originally written by yu-ji
// License: GPL v2 or (at your option) any later version
//
// PukiWiki message file (Portuguese)


// NOTE: Encoding of this file, must equal to encoding setting

// Q & A Verification
$root->riddles = array(
//	'Question' => 'Answer',
	'a, b, c e a pr�xima letra �?' => 'd',
	'1 + 1 = ?' => '2',
	'10 - 5 = ?' => '5',
	'a, *, c ... o que � o *?' => 'b',
	'Por favor, reescreva "ABC" em letras minusculas.' => 'abc',
);

///////////////////////////////////////
// Page titles
$root->_title_cannotedit = ' $1 n�o � edit�vel';
$root->_title_edit       = 'Edi��o da $1';
$root->_title_preview    = 'Vizualiza��o da $1';
$root->_title_collided   = 'Ocorreu um conflito na atualiza��o da $1.';
$root->_title_updated    = ' $1 foi atualizada';
$root->_title_deleted    = ' $1 foi excluida';
$root->_title_help       = 'Ajuda';
$root->_title_invalidwn  = 'Este n�o � um Wikiname v�lido';
$root->_title_backuplist = 'Lista de Backup';
$root->_title_ng_riddle  = 'Falha na verifica��o da pegunta e resposta de verifica��o.<br />Vizualiza��o da  $1';
$root->_title_backlink   = 'Links de retorno de: %s';

///////////////////////////////////////
// Messages
$root->_msg_unfreeze = 'Descongelar';
$root->_msg_preview  = 'Clique no bot�o em baixo da p�gina para confirmar as mudan�as, ';
$root->_msg_preview_delete = '(O conte�do da p�gina est� vazio. Atualize a exclus�o desta p�gina.)';
$root->_msg_collided = 'Isto indica que algu�m atualizou esta p�gina enquanto voc� estava editando-a.<br />
 + � colocado no come�o da linha que foi mais recentemente edicionada.<br />
 ! � colocado no come�o da linha que foi possivelmente atualizada.<br />
 Edite essas linha e envie novamente.';

$root->_msg_collided_auto = 'Isto indica que algu�m atualizou esta p�gina enquanto voc� estava editando-a.<br /> O conflito foi corrigido automaticamente, mas podem existir alguns problemas com esta p�gina.<br />
 Pressione em [Atualiza��o]para confirmar as mudan�as na p�gina.<br />';


$root->_msg_invalidiwn  = ' $1 n�o � v�lida $2.';
$root->_msg_invalidpass = 'Senha inv�lida.';
$root->_msg_notfound    = 'A p�gina n�o foi encontrada.';
$root->_msg_addline     = 'A linha adicionada � <span class="diff_added">Nesta cor</span>.';
$root->_msg_delline     = 'A linha excluida � <span class="diff_removed">Nesta cor</span>.';
$root->_msg_goto        = 'Ir para $1.';
$root->_msg_andresult   = 'Na p�gina <strong> $2</strong>, <strong> $3</strong> p�ginas que cont�m todos os termos $1 foram encontrados.';
$root->_msg_orresult    = 'Na p�gina <strong> $2</strong>, <strong> $3</strong> p�ginas que cont�m pelo menos um dos termos $1 foram encontrados.';
$root->_msg_notfoundresult = 'Nenhuma p�gina com o conte�do $1 foi encontrada.';
$root->_msg_symbol      = 'Simbolos';
$root->_msg_other       = 'Outros';
$root->_msg_help        = 'Vizualizar texto com as regras de formata��o';
$root->_msg_week        = array('Dom','Seg','Ter','Qua','Qui','Sex','Sab');
$root->_msg_content_back_to_top = '<div class="jumpmenu"><a href="#'.$root->mydirname.'_navigator" title="P�gina Top"><img src="'.$const['LOADER_URL'].'?src=arrow_up.png" alt="P�gina Inicial" width="16" height="16" /></a></div>';
$root->_msg_word        = 'Os termos desta busca foram destacados:';
$root->_msg_not_readable   = 'Voc� n�o permiss�o de leitura.';
$root->_msg_not_editable   = 'Voc� n�o tem permiss�o para editar.';

///////////////////////////////////////
// Symbols
$root->_symbol_anchor   = 'src:anchor.png,width:12,height:12';
$root->_symbol_noexists = '<img src="'.$const['IMAGE_DIR'].'paraedit.png" alt="Editar" height="9" width="9" />';

///////////////////////////////////////
// Form buttons
$root->_btn_preview   = 'Vizualiza��o';
$root->_btn_repreview = 'Vizualizar novamente';
$root->_btn_update    = 'Atualiza��o';
$root->_btn_cancel    = 'Cancelar';
$root->_btn_notchangetimestamp = 'N�o mudar dia e hora da grava��o';
$root->_btn_addtop    = 'Adicionar ao topo da p�gina';
$root->_btn_template  = 'Usar p�gina como modelo';
$root->_btn_load      = 'Carregar';
$root->_btn_edit      = 'Editar';
$root->_btn_delete    = 'Excluir';
$root->_btn_reading   = 'Leitura da p�gina inicial';
$root->_btn_alias     = 'P�gina Alias <span class="edit_form_note">(Dividida com "<span style="color:red;font-weight:bold;font-size:120%;">:</span>"[Colon])</span>';
$root->_btn_alias_lf  = 'P�gina Alias <span class="edit_form_note">(Dividida com "<span style="color:red;font-weight:bold;font-size:120%;">Each line</span>")</span>';
$root->_btn_riddle    = 'Verifica��o da Pergunta e Resposta: <span class="edit_form_note">Por favor, responta a pergunta antes de atualizar a p�gina (desnecess�ria a vizualiza��o).</span>';
$root->_btn_pgtitle   = 'T�tulo da p�gina<span class="edit_form_note">(Autom�tico em branco)</span>';
$root->_btn_pgorder   = 'Ordena��o da p�gina<span class="edit_form_note">(0-9 Decimal Padr�o:1 )</span>';
$root->_btn_other_op  = 'Mostrar detalhamento dos itens informados.';
$root->_btn_emojipad  = 'Pictogram pad';
$root->_btn_source    = 'Details';

///////////////////////////////////////
// Authentication
$root->_title_cannotread = ' $1 leitura n�o permitida';
$root->_msg_auth         = 'PukiWikiAuth';

///////////////////////////////////////
// Page name
$root->rule_page = 'Regras de formata��o';	// Formatting rules
$root->help_page = 'Ajuda';		// Help

///////////////////////////////////////
// TrackBack (REMOVED)
$root->_tb_date   = 'F j, Y, g:i A';

/////////////////////////////////////////////////
// No subject (article)
$root->_no_subject = 'Sem assunto';

/////////////////////////////////////////////////
// No name (article,comment,pcomment)
$root->_no_name = '';

/////////////////////////////////////////////////
// Title of the page contents list
$root->contents_title = 'Tabela de conte�dos';

/////////////////////////////////////////////////
// Skin
/////////////////////////////////////////////////

$root->_LANG['skin']['topage']    = 'Retornar a p�gina';
$root->_LANG['skin']['add']       = 'Adicionar';
$root->_LANG['skin']['backup']    = 'C�pia de Seguran�a';
$root->_LANG['skin']['copy']      = 'Copiar';
$root->_LANG['skin']['diff']      = 'Diferen�a';
$root->_LANG['skin']['back']      = 'Hist�rico';
$root->_LANG['skin']['edit']      = 'Editar';
$root->_LANG['skin']['filelist']  = 'Nome dos arquivos das p�ginas';	// List of filenames
$root->_LANG['skin']['attaches']  = 'Anexos';
$root->_LANG['skin']['freeze']    = 'Congelar';
$root->_LANG['skin']['help']      = 'Ajuda';
$root->_LANG['skin']['list']      = 'Rela��o das P�ginas';
$root->_LANG['skin']['list_s']    = 'Lista';
$root->_LANG['skin']['new']       = 'Nova P�gina';
$root->_LANG['skin']['new_s']     = 'Nova';
$root->_LANG['skin']['newsub']    = 'Nova Sub P�gina';
$root->_LANG['skin']['newsub_s']  = 'Sub';
$root->_LANG['skin']['menu']      = 'Menu';
$root->_LANG['skin']['header']    = 'Cabe�alho';
$root->_LANG['skin']['footer']    = 'Rodap�';
$root->_LANG['skin']['rdf']       = 'RDF das �ltimas Altera��es';
$root->_LANG['skin']['recent']    = '�ltimas  Altera��es';	// RecentChanges
$root->_LANG['skin']['recent_s']  = '�ltima';
$root->_LANG['skin']['refer']     = 'Referir';	// Show list of referer
$root->_LANG['skin']['reload']    = 'Baxar novamente';
$root->_LANG['skin']['rename']    = 'Renomear';	// Rename a page (and related)
$root->_LANG['skin']['rss']       = 'RSS das �ltimas Altera��es';
$root->_LANG['skin']['rss10']     = $root->_LANG['skin']['rss'] . ' (RSS 1.0)';
$root->_LANG['skin']['rss20']     = $root->_LANG['skin']['rss'] . ' (RSS 2.0)';
$root->_LANG['skin']['atom']      = $root->_LANG['skin']['rss'] . ' (RSS Atom)';
$root->_LANG['skin']['search']    = 'Busca';
$root->_LANG['skin']['search_s']  = 'Busca';
$root->_LANG['skin']['top']       = 'P�gina Inicial';	// Top page
$root->_LANG['skin']['trackback'] = 'Links de Retorno';	// Show list of trackback
$root->_LANG['skin']['unfreeze']  = 'Descongelar';
$root->_LANG['skin']['upload']    = 'Enviar';	// Attach a file
$root->_LANG['skin']['pginfo']    = 'Permiss�o';
$root->_LANG['skin']['comments']  = 'Coment�rios';
$root->_LANG['skin']['lastmodify']= '�ltima Altera��o';
$root->_LANG['skin']['linkpage']  = 'Links';
$root->_LANG['skin']['pagealias'] = 'P�gina Alias';
$root->_LANG['skin']['pageowner'] = 'Propriet�rio da P�gina';
$root->_LANG['skin']['siteadmin'] = 'Administrador do Site';
$root->_LANG['skin']['none']      = 'Nenhum';
$root->_LANG['skin']['pageinfo']  = 'P�gina de Informa��es';
$root->_LANG['skin']['pagename']  = 'Nome da P�gina';
$root->_LANG['skin']['readable']  = 'Pode Ler';
$root->_LANG['skin']['editable']  = 'Pode Editar';
$root->_LANG['skin']['groups']    = 'Grupos';
$root->_LANG['skin']['users']     = 'Usu�rios';
$root->_LANG['skin']['perm']['all']  = 'Todos os Visitantes';
$root->_LANG['skin']['perm']['none'] = 'Ningu�m';
$root->_LANG['skin']['print']     = 'Vizualizar Impress�o';
$root->_LANG['skin']['print_s']   = 'Imprimir';

///////////////////////////////////////
// Plug-in message
///////////////////////////////////////
// add.inc.php
$root->_title_add = 'Adicionar para $1';
$root->_msg_add   = 'Dois ou mais conte�dos de uma informa��o s�o adicionadas em uma nova linha nos conte�dos da p�gina da atual edi��o.';
	// This message is such bad english that I don't understand it, sorry. --Bjorn De Meyer
    // I think i could translate this message into portuguese, but in english it is bad. --Leco(1)(Miraldo Ohse)

///////////////////////////////////////
// article.inc.php
$root->_btn_name    = 'Nome: ';
$root->_btn_article = 'Enviar';
$root->_btn_subject = 'Assunto: ';
$root->_msg_article_mail_sender = 'Autor: ';
$root->_msg_article_mail_page   = 'P�gina: ';

///////////////////////////////////////
// attach.inc.php
$root->_attach_messages = array(
	'msg_uploaded' => 'Enviado arquivo para  $1',
	'msg_deleted'  => 'Exlu�do o arquivo em  $1',
	'msg_freezed'  => 'O arquivo foi congelado.',
	'msg_unfreezed'=> 'O arquivo foi descongelado',
	'msg_renamed'  => 'O arquivo foi renomeado',
	'msg_upload'   => 'Enviar para $1',
	'msg_info'     => 'Informa��o do Arquivo',
	'msg_confirm'  => '<p>Excluir %s.</p>',
	'msg_list'     => 'Lista dos arquivos anexos',
	'msg_listpage' => 'O arquivo j� esiste no $1',
	'msg_listall'  => 'Lista dos arquivos anexos de todoas as p�ginas',
	'msg_file'     => 'Arquivo anexo',
	'msg_maxsize'  => 'O tamanho m�ximo do arquivo � %s.',
	'msg_count'    => ' <span class="small">%sDL</span>',
	'msg_password' => 'Senha para este arquivo (requerido)',
	'msg_password2'=> 'Senha deste arquivo',
	'msg_adminpass'=> 'Senha do administrador',
	'msg_delete'   => 'Excluir arquivo.',
	'msg_backup'   => 'Fazer c�pia de seguran�a',
	'msg_freeze'   => 'Congelar arquivo.',
	'msg_unfreeze' => 'Descongelar arquivo.',
	'msg_isfreeze' => 'O arquivo est� congelado.',
	'msg_rename'   => 'Renomear',
	'msg_newname'  => 'Nome do novo arquivo',
	'msg_require'  => '(� necess�rio a senha especificada quando do carregamento.)',
	'msg_filesize' => 'Tamanho',
	'msg_date'     => 'Data',
	'msg_dlcount'  => 'Contador de acessos',
	'msg_md5hash'  => 'MD5 hash',
	'msg_page'     => 'P�gina',
	'msg_filename' => 'Nome do arquivo armazenado',
	'msg_owner'    => 'Propriet�rio',
	'err_noparm'   => 'N�o foi poss�vel enviar ou excluir o arquivo no $1',
	'err_exceed'   => 'O tamanho do arquivo � muito grande para $1',
	'err_exists'   => 'O arquivo j� existe em $1',
	'err_notfound' => 'O arquivo n�o pode ser encontrado no $1',
	'err_noexist'  => 'O arquivo n�o existe.',
	'err_delete'   => 'O arquivo n�o pode ser excluido em $1',
	'err_rename'   => 'Este arquivo n�o pode ser renomeado',
	'err_password' => 'Senha errada.',
	'err_adminpass'=> 'A senha do administrador est� errada',
	'err_nopage'   => 'Uma p�gina "$1" n�o foi encontrada. Por favor, fa�a uma p�gina antes.',
	'btn_upload'   => 'Enviar',
	'btn_upload_fm'=> 'Enviar Form',
	'btn_info'     => 'Informa��es',
	'btn_submit'   => 'Enviar',
	'msg_copyrighted'  => 'O arquivo anexo est� protegido por copyrighting.',
	'msg_uncopyrighted'=> 'A prote��o de copyright do arquivo anexado foi liberada.',
	'msg_copyright'  => 'O arquivo anexado foi protegido por copyrighting.',
	'msg_copyright0' => 'Este aquivo � meu ou est� livre de copyright.',
	'err_copyright'  => 'Este arquivo n�o pode ser mostrado e baixado porque ele est� protegido copyright.',
	'msg_noinline1'  => 'Proibida a exibi��o inline.',
	'msg_noinline0-1'=> 'Liberar a proibi��o de exibi��o inline.',
	'msg_noinline-1' => 'Permitida a exibi��o inline.',
	'msg_noinline01' => 'Liberar a exibi��o das permiss�es inline.',
	'msg_noinlined'  => 'As configura��es da exibi��o inline dos arquivos anexos foi registrada.',
	'msg_unnoinlined'=> 'As configura��es da exibi��o inline dos arquivos anexos foi liberada.',
	'msg_nopcmd'     => 'A opera��o n�o foi especificada.',
	'err_extension'=> 'A extens�o do arquivo n�o pode ser anexada ao $1 porque n�o existe autoriza��o do propriet�rio nesta p�gina.',
	'msg_set_css'  => '$1 folha de estilo foi configurada.',
	'msg_unset_css'=> '$1 folha de estilo foi cancelada.',
	'msg_untar'    => 'UNTAR',
	'msg_search_updata'=> 'O dado enviado para esta p�gina est� procurando por.',
	'msg_paint_tool'=> 'Ferramenta de pintura',
	'msg_shi'      => 'SHI PAINTER',
	'msg_shipro'   => 'SHI PAINTER Pro',
	'msg_width'    => 'Largura',
	'msg_height'   => 'Altura',
	'msg_max'      => 'Tamanho m�ximo',
	'msg_do_paint' => 'Pintar',
	'msg_save_movie'=> 'Gravar anima��o',
	'msg_adv_setting'=> '--- Especifica��o estendida ---',
	'msg_init_image'=> 'O arquivo da imagem lido na tela (JPEG ou GIF)',
	'msg_fit_size' => 'Tamanho da tela combina com esta imagem.',
	'msg_extensions' => 'Extens�o de arquivos que podem ser anexados ( $1 )',
	'msg_rotated_ok' => 'Imagem foi rodada.<br />Ela pode n�o ser mostrada corretamente por um navegador, caso n�o for baixada novamente.',
	'msg_rotated_ng' => 'N�o foi possivel a imagem ser rodada.',
	'err_isflash' => 'Um arquivo Flash n�o pode ser enviado.',
	'msg_make_thumb' => 'Fazer uma miniatura.(Somente arquivo de imagem): ',
	'msg_sort_time' => 'Classificar pelo tempo',
	'msg_sort_name' => 'Classificar pelo nome',
	'msg_list_view' => 'Vizualizar lista',
	'msg_image_view' => 'Vizualizar imagem',
	'msg_insert' => 'Inserir',
	'msg_select_current' => ' (Atual)',
	'msg_select_useful' => 'P�ginas para remessa',
	'msg_select_manyitems' => 'P�ginas com muitos arquivos',
	'msg_noupload' => 'N�o foi posspivel enviar alguns arquivos para $1.',
	'msg_send_mms' => 'Send by MMS Mail',
	'msg_drop_files_here' => 'Drop files here to upload',
	'msg_for_upload' => 'There is no authority uploaded to this page.<br />In order to upload, please choose a page like "<span class="attachable">This Style</span>" at the <img src="'.$const['LOADER_URL'].'?src=page_attach.png" alt="Page" /> page selection.',
);

///////////////////////////////////////
// back.inc.php
$root->_msg_back_word = 'Voltar';

///////////////////////////////////////
// backup.inc.php
$root->_title_backup_delete  = 'Deletar backup do $1';
$root->_title_backupdiff     = 'Backup diferen�a de $1(No. $2)';
$root->_title_backupnowdiff  = 'Backup diferen�a de $1 vs atual(No. $2)';
$root->_title_backupsource   = 'Backup fonte de $1(No. $2)';
$root->_title_backup         = 'Backup de $1(No. $2)';
$root->_title_pagebackuplist = 'Backup lista de of $1';
$root->_title_backuplist     = 'Backup lista';
$root->_msg_backup_deleted   = 'Backup de $1 foi excluido.';
$root->_msg_backup_adminpass = 'Por favor, informe a senha para excluir.';
$root->_msg_backuplist       = 'Lista de Backups';
$root->_msg_nobackup         = 'N�o existem backup(s) de $1.';
$root->_msg_diff             = 'diferen�a';
$root->_msg_nowdiff          = 'diferen�a atual';
$root->_msg_source           = 'fonte';
$root->_msg_backup           = 'backup';
$root->_msg_view             = 'Vizualizar o $1.';
$root->_msg_deleted          = ' $1 foi exluida.';
$root->_msg_backupedit       = 'Editar Backup No.$1 como atual.';
$root->_msg_current          = 'Atual';
$root->_title_backuprewind   = 'Preparar para backup No.$2 of $1.';
$root->_title_dorewind       = 'Preparar conte�do e grava��o da data e hora com o tempo "$1"';
$root->_msg_rewind           = 'Preparar';
$root->_msg_dorewind         = 'Preparar para backup No.$1';
$root->_msg_rewinded         = 'Preparar no backup No.$1.';
$root->_msg_nobackupnum      = 'Perdido backup No.$1.';

///////////////////////////////////////
// calendar_viewer.inc.php
$root->_err_calendar_viewer_param2   = 'Segundo par�metro errado.';
$root->_msg_calendar_viewer_right    = 'Pr�ximo %d&gt;&gt;';
$root->_msg_calendar_viewer_left     = '&lt;&lt; Anterior %d';
$root->_msg_calendar_viewer_restrict = 'Devido ao bloqueio, a vizualiza��o do calend�rio n�o referir para $1.';

///////////////////////////////////////
// calendar2.inc.php
$root->_calendar2_plugin_edit  = '[editar]';
$root->_calendar2_plugin_empty = '%s est� vazio.';

///////////////////////////////////////
// comment.inc.php
$root->_btn_name    = 'Nome: ';
$root->_btn_comment = 'Postar Coment�rio';
$root->_msg_comment = 'Coment�rio: ';
$root->_title_comment_collided = 'Na atualiza��o $1, ocorreu um conflito.';
$root->_msg_comment_collided   = 'Parece que algu�m atualizou a p�gina que voc� estava editando.<br />
 O coment�rio foi adicionado, embora possa ter sido inserido em uma posi��o errada.<br />';

///////////////////////////////////////
// deleted.inc.php
$root->_deleted_plugin_title = 'Lista das p�ginas excluidas';
$root->_deleted_plugin_title_withfilename = 'Lista das p�ginas excluidas (com o nome do arquivo)';

///////////////////////////////////////
// diff.inc.php
$root->_title_diff         = 'Diferen�a do $1';
$root->_title_diff_delete  = 'Exclus�o diferen�a de $1';
$root->_msg_diff_deleted   = 'Diferen�a de $1 foi excluida.';
$root->_msg_diff_adminpass = 'Por favor, insira a senha para excluir.';

///////////////////////////////////////
// filelist.inc.php (list.inc.php)
$root->_title_filelist = 'Lista de pagina de arquivos';

///////////////////////////////////////
// freeze.inc.php
$root->_title_isfreezed = ' $1 j� est� congelado';
$root->_title_freezed   = ' $1 est� congelado.';
$root->_title_freeze    = 'Congelado  $1';
$root->_msg_freezing    = 'Por favor, informe a p�gina para congelar.';
$root->_btn_freeze      = 'Congelar';

///////////////////////////////////////
// include.inc.php
$root->_msg_include_restrict = 'Devido ao bloqueio, $1 n�o pode ser incluido.';

///////////////////////////////////////
// insert.inc.php
$root->_btn_insert = 'adicionar';

///////////////////////////////////////
// interwiki.inc.php
$root->_title_invalidiwn = 'Este n�o � um InterWikiName v�lido';

///////////////////////////////////////
// list.inc.php
$root->_title_list = 'Lista de p�ginas';

///////////////////////////////////////
// ls2.inc.php
$root->_ls2_err_nopages = '<p>N�o existe p�gina crian�a em \' $1\'</p>';
$root->_ls2_msg_title   = 'Lista de p�ginas que come�am com \' $1\'';

///////////////////////////////////////
// memo.inc.php
$root->_btn_memo_update = 'Atualiza��o';

///////////////////////////////////////
// navi.inc.php
$root->_navi_prev = 'Anterior';
$root->_navi_next = 'Pr�xima';
$root->_navi_up   = 'Em cima';
$root->_navi_home = 'P�gina Inicial';

///////////////////////////////////////
// newpage.inc.php
$root->_msg_newpage = 'Nova p�gina';

///////////////////////////////////////
// paint.inc.php
$root->_paint_messages = array(
	'field_name'    => 'Nome',
	'field_filename'=> 'Nome do Arquivo',
	'field_comment' => 'Coment�rio',
	'btn_submit'    => 'Pintar',
	'msg_max'       => '(Max %d x %d)',
	'msg_title'     => 'Pintar e anexar para  $1',
	'msg_title_collided' => 'Durante a atualiza��o $1, houve um conflito.',
	'msg_collided'  => 'Parece que algu�m atualizou est� p�gina enquanto voc� estava editando-a.<br />
 A imagem e o coment�rio foram atualizados nesta p�gina, mas pode haver um problema.<br />'
);

///////////////////////////////////////
// pcomment.inc.php
$root->_pcmt_messages = array(
	'btn_name'       => 'Nome: ',
	'btn_comment'    => 'Postar Coment�rio',
	'msg_comment'    => 'Coment�rio: ',
	'msg_recent'     => 'Mostrar �ltimos %d coment�rios.',
	'msg_all'        => 'Ir para a p�gina de coment�rios.',
	'msg_none'       => 'N�o existe coment�rio.',
	'title_collided' => 'Na atualiza��o $1, houve um conflito.',
	'msg_collided'   => 'Parece que algu�m atualizou est� p�gina enquanto voc� estava editando-a.<br />
	O coment�rio foi adicionado na p�gina, mas pode haver um problema.<br />',
	'err_pagename'   => '[[%s]] : n�o � um nome de p�gina v�lido.',
);
$root->_msg_pcomment_restrict = 'Devido ao bloqueio, nenhum coment�rio pode ser lido de $1 em todos.';

///////////////////////////////////////
// popular.inc.php
$root->_popular_plugin_frame       = '<h5>Popular(%1$d)%3$s</h5><div>%2$s</div>';
$root->_popular_plugin_today_frame = '<h5>Hoje\'s(%1$d)%3$s</h5><div>%2$s</div>';
$root->_popular_plugin_yesterday_frame = '<h5>Ontem\'s(%1$d)%3$s</h5><div>%2$s</div>';

///////////////////////////////////////
// recent.inc.php
$root->_recent_plugin_frame = '<h5>%s �ltimo(%d)</h5>
 <div>%s</div>';

///////////////////////////////////////
// referer.inc.php
$root->_referer_msg = array(
	'msg_H0_Refer'       => 'Referer',
	'msg_Hed_LastUpdate' => '�ltima atualiza��o',
	'msg_Hed_1stDate'    => 'Primeiro registro',
	'msg_Hed_RefCounter' => 'Ref Contagem',
	'msg_Hed_Referer'    => 'Referer',
	'msg_Fmt_Date'       => 'F j, Y, g:i A',
	'msg_Chr_uarr'       => '&uArr;',
	'msg_Chr_darr'       => '&dArr;',
);

///////////////////////////////////////
// rename.inc.php
$root->_rename_messages  = array(
	'err'            => '<p>Erro:%s</p>',
	'err_nomatch'    => 'Nenhuma p�gina correspondente',
	'err_notvalid'   => 'O novo nome � inv�lido.',
	'err_adminpass'  => 'Senha do administrador incorreta.',
	'err_notpage'    => '%s n�o � um nome de p�gina v�lido.',
	'err_norename'   => 'N�o foi poss�vel renomear %s.',
	'err_already'    => 'As seguintes p�ginas j� existem.%s',
	'err_already_below' => 'Os seguintes arquivos j� existem.',
	'msg_title'      => 'Renomear p�gina',
	'msg_page'       => 'Especificar o nome da fonte da p�gina',
	'msg_regex'      => 'Renomear com express�es regular.',
	'msg_regex'      => 'Express�es Regular',
	'msg_part_rep'   => 'Recolocar partial matches',
	'msg_related'    => 'P�ginas relacionadas',
	'msg_do_related' => 'Uma p�gina relacionada � tamb�m renomeada.',
	'msg_rename'     => 'Renomear %s',
	'msg_oldname'    => 'Nome da p�gina atual',
	'msg_newname'    => 'Nome da nova p�gina',
	'msg_adminpass'  => 'Senha do administrador',
	'msg_arrow'      => '->',
	'msg_exist_none' => 'A p�gina n�o � processada quando ela j� existe.',
	'msg_exist_overwrite' => 'A p�gina � subscrita quando ela j� existe.',
	'msg_confirm'    => 'Os seguintes arquivos ser�o renomeados.',
	'msg_result'     => 'Os seguintes arquivos foram subscritos.',
	'btn_submit'     => 'Enviar',
	'btn_next'       => 'Pr�ximo'
);

///////////////////////////////////////
// search.inc.php
$root->_title_search  = 'Busca';
$root->_title_result  = 'Buscar resultado de  $1';
$root->_msg_searching = 'As palavras-chave s�o case-insenstive, e s�o pesquisadas em todas as p�ginas.';
$root->_btn_search    = 'Busca';
$root->_btn_and       = 'E';
$root->_btn_or        = 'OU';
$root->_search_pages  = 'Buscar em p�ginas come�adas por $1';
$root->_search_all    = 'Buscar em todas as p�ginas';

///////////////////////////////////////
// source.inc.php
$root->_source_messages = array(
	'msg_title'    => 'Fonte de $1',
	'msg_notfound' => ' $1 n�o foi encontrado.',
	'err_notfound' => 'N�o foi possivel mostrar a fonte da p�gina.'
);

///////////////////////////////////////
// template.inc.php
$root->_msg_template_start   = 'Iniciar:<br />';
$root->_msg_template_end     = 'Final:<br />';
$root->_msg_template_page    = '$1/c�pia';
$root->_msg_template_refer   = 'P�gina:';
$root->_msg_template_force   = 'Editar com um nome de p�gina que j� existe';
$root->_err_template_already = ' $1 j� existe.';
$root->_err_template_invalid = ' $1 n�o � um nome de p�gina v�lido.';
$root->_btn_template_create  = 'Criar';
$root->_title_templatei      = 'Criar uma nova p�gina usando $1 como um modelo.';

///////////////////////////////////////
// tracker.inc.php
$root->_tracker_messages = array(
	'msg_list'   => 'Lista de itens do $1',
	'msg_back'   => '<p> $1</p>',
	'msg_limit'  => 'Top  $2 resultados fora de $1.',
	'btn_page'   => 'P�gina',
	'btn_name'   => 'Nome',
	'btn_real'   => 'Nome real',
	'btn_submit' => 'Adicionar',
	'btn_date'   => 'Data',
	'btn_refer'  => 'P�gina Refer',
	'btn_base'   => 'P�gina Base',
	'btn_update' => 'Atualiza��o',
	'btn_past'   => 'Passado',
);

///////////////////////////////////////
// unfreeze.inc.php
$root->_title_isunfreezed = ' $1 n�o est� congelado';
$root->_title_unfreezed   = ' $1 foi descongelado.';
$root->_title_unfreeze    = 'Descongelar  $1';
$root->_msg_unfreezing    = 'Por favor, informe a senha para o descongelamento.';
$root->_btn_unfreeze      = 'Descongelar';

///////////////////////////////////////
// versionlist.inc.php
$root->_title_versionlist = 'Lista de vers�o';

///////////////////////////////////////
// vote.inc.php
$root->_vote_plugin_choice = 'Sele��o';
$root->_vote_plugin_votes  = 'Votar';

///////////////////////////////////////
// yetlist.inc.php
$root->_title_yetlist = 'Lista de p�ginas que ainda n�o foram criadas.';
$root->_err_notexist  = 'Todas as p�ginas foram criadas.';
