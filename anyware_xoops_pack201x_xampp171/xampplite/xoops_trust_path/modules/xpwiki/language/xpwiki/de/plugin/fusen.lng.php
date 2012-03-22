<?php
/*
 * Created on 2008/01/07 by nao-pon http://hypweb.net/
 * $Id: fusen.lng.php,v 1.1 2008/04/20 01:46:10 nao-pon Exp $
 */
//
// German Translation Version 1.0 (11.03.2008)
// Translation English --> German: Octopus (hunter0815@googlemail.com)
// sicherlich steckt hier noch reichlich Qualit�tspotential in den �bersetzungen ;-)

$msg = array(
	'cap_refresh' => 'Aktualisieren',
	'cap_none' => 'kein',
	'cap_second' => ' Sek',
	'cap_dustbox_empty' => 'Leere den M�lleimer (dust box)',
	'cap_empty' => 'leeren',
	'cap_fusen_menu' => 'Fusen(Tag) Menu',
	'cap_fusen_func' => 'Fusen(Tag)',
	'cap_menu_new' => 'Erstelle einen neuen tag',
	'btn_menu_new' => 'Neu',
	'cap_menu_dust' => 'zum M�lleimer umstellen',
	'btn_menu_dust' => 'M�ll',
	'cap_menu_transparent' => 'transparent einstellen',
	'btn_menu_transparent' => 'Trns.',
	'cap_menu_refresh' => 'Aktualisieren',
	'btn_menu_refresh' => 'Ref.',
	'cap_menu_list' => 'Tag Liste auf dieser Seite',
	'btn_menu_list' => 'Liste',
	'cap_menu_help' => 'Wie wird das genutzt',
	'btn_menu_help' => 'Hilfe',
	'cap_menu_search' => 'Suche',
	'msg_not_work' => '<strong>JavaScript unoperation</strong>: Tag kann nicht bearbeitet werden. Und die Position an der das tag angezeigt wird k�nnte verschoben werden.',
	'msg_show_fusen' => 'Zeige Tag von "$1".',
	'cap_fusen_edit' => 'Tag Editor',
	'cap_fore_color' => 'Farbe',
	'cap_black' => 'Schwarz',
	'cap_gray' => 'Grau',
	'cap_red' => 'Rot',
	'cap_green' => 'Gr�n',
	'cap_blue' => 'Blau',
	'cap_white' => 'Weiss',
	'cap_back_color' => 'BG (schwarz)',
	'cap_lightred' => 'hellrot',
	'cap_lightgreen' => 'hellgr�n',
	'cap_lightblue' => 'hellblau',
	'cap_lightyellow' => 'hellgelb',
	'cap_transparent' => 'transparent',
	'cap_name' => 'Name',
	'cap_lineid' => 'Verbinde Linien ID',
	'btn_write' => 'absenden',
	'btn_close' => 'schlie�en',

	'js_messages' => array(
		'now_communicating' => 'Es wird gerade mit dem Server kommuniziert.',
		'fusen_func' => 'Fusen(Tag)',
		'com_comp' => 'Kommunikation abgeschlossen',
		'refreshing' => 'Automatische Aktualisierung',
		'waiting' => 'Stand by',
		'stopping' => 'gestoppt',
		'connecting' => 'Verbindung zum Server wird hergestellt...',
		'err_posting' => 'Fehler bei der Daten�bertragung. Bitte best�tigen durch Nutzung von "Aktualisieren" in der tag Funktion.',
		'communicating' => 'Kommuniziere mit Server...',
		'err_notconnect' => 'Es ist keine Verbindung zum Server m�glich. Erneut versuchen?',
		'err_baddata' => 'Ung�ltige Daten.',
		'err_notcommunicating' => 'Tag konnte nicht kommunizieren.',
		'msg_retryto' => 'Erneut versuchen? Verbindung:',
		'err_nottext' => 'Bitte gib den Inhalt ein.',
		'msg_burn' => 'Komplett l�schen?',
		'msg_dustbox' => 'In den M�lleimer packen?',
		'msg_dustall' => 'Ausgew�hlte tags in den M�lleimer packen?',
		'msg_emptydustbox' => 'M�lleimer leeren?',
		'emptydustbox' => 'M�lleimer geleert.',
		'recover' => 'Aus dem M�lleimer zur�ckholen?',
		'dustbox' => 'M�lleimer',
		'burn' => 'L�schen abgeschlossen',
		'unlock' => 'Entsperren',
		'new_with_line' => 'Einen neuen tag mit Verbindungslinie anlegen.',
		'edit' => 'Bearbeiten',
		'lock' => 'Sperren',
		'to_dustbox' => 'In den M�lleimer',
		'auto_resize' => 'Automatische Gr��en�nderung',
		'owner' => 'Tag Inhaber',
		'lastedit_time' => 'Letzte Bearbeitungszeit',
		'dbc2edit' => 'Doppel-Klick -> �ndern',
		'dbc2showall' => 'Doppel-Klick -> Alle anzeigen',
		'fusen' => 'Tag',
		'resizing' => 'Gr��en�nderung...',
		'moving' => 'Verschiebe...',
		'help_html' => '<ul>
<li>Neuer Tag kann durch Doppel-Klick angelegt werden. </li>
<li>Tag wird beim Dr�cken angezeigt.</li>
<li>Die Position kann durch Ziehen ver�ndert werden.</li>
<li>Wenn "Bearbeiten" gedr�ckt oder tag doppelgeklickt wird, kann das tag editiert werden. <br />
- Nur das eigene tag kann bearbeitet werden.</li>
<li>Falls "Sperren" gedr�ckt ist, ist die Bearbeitung und das Verschieben nicht m�glich.<br />
Tag das gesperrt ist kann durch "Entsperren" entsperrt werden.<br />
- Nur das eigene tag sollte gesperrt werden. </li>
<li>Wenn "In den M�lleimer" gedr�ckt wird, wird das tag in den M�lleimer verachoben.<br />
Das tag kann mit "Aus dem M�lleimer zur�ckholen?" zur�ckgeholt werden.<br />
Falls "In den M�lleimer" mit dem tag im M�lleimer gedr�ckt wird, wird es endg�ltig gel�scht. <br />
- Nur eigene Tags sollten gel�scht werden.</li>
</ul>
<dl>
<dt>[Neu]</dt>
<dd>Die Bearbeiten-Anzeige des neuen tags wird angezeigt.</dd>
<dt>[M�ll]</dt>
<dd>Das Tag wird im M�lleimer angezeigt.</dd>
<dt>[Trns.]</dt>
<dd>Alle tags werden durchscheinend angezeigt.</dd>
<dt>[Aktualisieren]</dt>
<dd>Tag ist aktualisiert.</dd>
<dt>[Liste]</dt>
<dd>Die angezeigten Tags dieser Seite sind gesperrt.</dd>
<dt>[Hilfe]</dt>
<dd>Das angezeigte Tag dieser Seite ist gesperrt.</dd>
<dt>Suche</dt>
<dd>Nur Tags mit dem eingegebenen Schl�sselwort werden angezeigt.</dd>
</dl>',
		'burn_checked' => 'Selektierte tags werden aus dem M�lleimer entfernt.',
		'dust_checked' => 'M�ll-Selektion',
		'empty' => 'M�lleimer leer',
		'close' => 'Schlie�en',
		'newtag' => 'Neuen tag erstellen',
		'new' => 'Neu',
		'howto' => 'Wie wird genutzt',
		'help' => 'Hilfe',
		'notag' => 'Es gibt keien tag auf dieser Seite.',
	),
);
?>