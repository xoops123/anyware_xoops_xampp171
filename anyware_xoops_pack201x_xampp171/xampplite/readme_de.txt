###### ApacheFriends XAMPPlite Version 1.7.1 ######

  + Apache 2..2.11
  + MySQL 5.1.33 (Community Server)
  + PHP 5.2.9
  + XAMPPlite Control Version 2.5 von www.nat32.com	
  + XAMPPlite Security 1.0
  + XAMPP CLI Bundle 1.3 from Carsten Wiedmann	
  + SQLite 2.8.15
  + OpenSSL 0.9.8i
  + phpMyAdmin 3.1.3.1
  + Webalizer 2.01-10
  + Zend Optimizer 3.3.0
  + eAccelerator 0.9.5.3 für PHP 5.2.9 (comment in php.ini)

--------------------------------------------------------------- 

* System-Voraussetzungen:
  
  + 64 MB RAM (EMPFOHLEN)
  + 150 MB freier Speicherplatz
  + Windows NT, 2000, XP (EMPFOHLEN)
  + 32 Bit Systeme (NICHT 64 bit) 

* SCHNELLINSTALLATION:

[HINWEIS: Auf die obersten Hirachie eines beliebigen Laufwerks bzw. auf dem Wechseldatenträger des USB-Sticks entpacken => E:\ oder W:\. Es entsteht E:\xampplite oder W:\xampplite. Für den USB-Stick nicht die "setup_xampp.bat" nutzen, um ihn auch transportabel nutzen zu können!]

Schritt 1: Das Setup mit der Datei "setup_xampp.bat" im XAMPP-Verzeichnis starten. Bemerkung: XAMPP macht selbst keine Einträge in die Windows Registry und setzt auch keine Systemvariablen.

Schritt 2: Starten Sie den Apache2 mit PHP5.x mit dem Control Panel (xampp-control.exe) oder wahlweise mit => \xampplite\apache_start.bat. 
Stoppen Sie den Apache2 mit PHP5.x mit dem Control Panel (xampp-control.exe) oder wahlweise mit => \xampplite\apache_stop.bat. 

Schritt 3: Starten Sie MySQL mit dem Control Panel (xampp-control.exe) oder wahlweise mit => \xampplite\mysql_start.bat.
Stoppen Sie MySQL mit dem Control Panel (xampp-control.exe) oder wahlweise mit => \xampplite\mysql_stop.bat.

Schritt 4: Öffne deinen Browser und gebe http://127.0.0.1 oder http://localhost ein. Danach gelangst du zu den zahlreichen ApacheFriends-Beispielen auf Ihrem lokalen Server.

Schritt 5: Das Root-Verzeichnis (Hauptdokumente) für HTTP (oft HTML) ist => C:\xampp\htdocs. PHP kann die Endungen  *.php, *.php3, *.php4, *.php5, *.phtml haben, *.shtml für SSI, *.cgi für CGI (z. B.: Perl).

Schritt 6: XAMPP DEINSTALLIEREN?
Einfach das "XAMPP(lite)"-Verzeichnis löschen. Vorher aber alle Server stoppen 
bzw. als Dienste deinstallieren.

---------------------------------------------------------------

* PASSWÖRTER:

1) MySQL:

   Benutzer: root
   Passwort:
   (also kein Passwort!)

2) FileZilla FTP:

   Benutzer: newuser
   Passwort: wampp 

   Benutzer: anonymous
   Passwort: some@mail.net

3) Mercury: 

   Postmaster: Postmaster (postmaster@localhost)
   Administrator: Admin (admin@localhost)

   TestUser: newuser  
   Passwort: wampp 

4) WEBDAV: 

   Benutzer: wampp
   Password: xampp

---------------------------------------------------------------

* NUR FÜR NT-SYSTEME! (NT4 | Windows 2000 | Windows XP):

- \XAMPPlite\apache\apache_installservice.bat 
  ===> Installiert den Apache 2 als Dienst

- \XAMPPlite\apache\apache_uninstallservice.bat 
  ===> Deinstalliert den Apache 2 als Dienst

- \XAMPPlite\mysql\mysql_installservice.bat 
  ===> Installiert MySQL als Dienst

- \XAMPPlite\mysql\mysql_uninstallservice.bat 
  ===> Deinstalliert MySQL als Dienst

==> Nach allen De- / Installationen der Dienste, System unbedingt neustarten! 

---------------------------------------------------------------

* DAS THEMA SICHERHEIT:

Wie schon an anderer Stelle erwähnt ist XAMPPlite nicht für den Produktionseinsatz gedacht, sondern nur für Entwickler in Entwicklungsumgebungen. Das hat zur Folge, dass XAMPPlite absichtlich nicht restriktiv sondern im Gegenteil sehr offen vorkonfiguriert ist. Für einen Entwickler ist das ideal, da er so keine Grenzen vom System vorgeschrieben bekommt.
Für einen Produktionseinsatz ist das allerdings überhaupt nicht geeignet!
Hier eine Liste, der Dinge, die an XAMPPlite absichtlich (!) unsicher sind:

- Der MySQL-Administrator (root) hat kein Passwort.
- Der MySQL-Daemon ist übers Netzwerk erreichbar.
- phpMyAdmin ist über das Netzwerk erreichbar.
- In dem XAMPPlite-Demo-Seiten (die man unter http://localhost/ findet) gibt es den Punkt "Sicherheitscheck".
  Dort kann man sich den aktuellen Sicherheitszustand seiner XAMPPlite-Installation anzeigen lassen.

Will man XAMPPlite in einem Netzwerk betreiben, so dass der XAMPPlite-Server auch von anderen erreichbar ist, dann sollte man unbedingt die folgende URL aufrufen, mit dem man diese Unsicherheiten einschränken kann:

	http://localhost/security/

Hier kann das Root-Passwort für MySQL und phpMyAdmin und auch ein Verzeichnisschutz für die 
XAMPPlite-Seiten eingerichtet werden.

---------------------------------------------------------------

* MYSQL-Hinweise:

(1) Um den MySQL-Daemon zu starten bitte Doppelklick auf \XAMPPlite\mysql_start.bat.
Der MySQL Server startet dann im Konsolen-Modus. Das dazu gehörige Konsolenfenster muss offen bleiben (!!) Zum Stop bitte die mysql_shutdown.bat benutzen!

(2) Wer MySQL als Dienst unter NT / 2000 / XP benutzen möchte, muss unbedingt (!) vorher die "my" bzw."my.ini unter C:\ (also C:\my.ini) implementieren. Danach die "mysql_installservice.bat" im Ordner "mysql" aktivieren. Dienste funktionieren generell NICHT unter Windows Home-Versionen. 

(3) Der MySQL-Server startet ohne Passwort für MySQl-Administrator "root".
Für eine Zugriff in PHP sähe das also aus:

	mysql_connect("localhost", "root", "");

Ein Passwort für "root" könnt ihr über den MySQL-Admin in der Eingabeaufforderung
setzen. Z. B.: 

	C:\XAMPPlite\mysql\bin\mysqladmin.exe -u root -p geheim

Wichtig: Nach dem Einsetzen eines neuen Passwortes für Root muss auch phpMyAdmin informiert werden! Das geschieht über die Datei "config.inc.php"; zu finden als C:\XAMPPlite\phpmyadmin\config.inc.php. Dort also folgenden 
Zeilen editieren:
   
	$cfg['Servers'][$i]['user']            = 'root';   // MySQL User
	$cfg['Servers'][$i]['auth_type']       = 'http';   // HTTP-Authentifzierung

So wird zuerst das "root"-Passwort vom MySQL-Server abgefragt, bevor phpMyAdmin zugreifen darf.
    
---------------------------------------------------------------	
    
		Have a lot of fun! | Viel Spaß! | Bonne Chance!
