###### ApacheFriends XAMPPlite Version 1.7.1 ######

  + Apache 2..2.11
  + MySQL 5.1.33 (Community Server)
  + PHP 5.2.9
  + XAMPPlite Control Version 2.5 from www.nat32.com	
  + XAMPPlite Security 1.0
  + XAMPP CLI Bundle 1.3 from Carsten Wiedmann	
  + SQLite 2.8.15
  + OpenSSL 0.9.8i
  + phpMyAdmin 3.1.3.1
  + Webalizer 2.01-10
  + Zend Optimizer 3.3.0
  + eAccelerator 0.9.5.3 for PHP 5.2.9 (comment in php.ini)
 
* System Requirements:
 
  + 64 MB RAM (RECOMMENDED)
  + 150 MB free fixed disk 
  + Windows NT, 2000, 2003, XP (RECOMMENDED), VISTA
  + Only 32 Bit (NOT for 64 bit systems) 

---------------------------------------------------------------

* QUICK INSTALLATION:

[NOTE: Unpack the package to your USB stick or a partition of your choice.
There it must be on the highest level like E:\ or W:\. It will 
build E:\XAMPPlite or W:\XAMPPlite or something like this. Please do not use the "setup_XAMPPlite.bat" for an USB stick installation!]   

Step 1: Unpack the package into a directory of your choice. Please start the 
"setup_XAMPPlite.bat" and beginning the installation. Note: XAMPPlite makes no entries in the windows registry and no settings for the system variables.

Step 2: If installation ends successfully, start the Apache 2 with 
"apache_start".bat", MySQL with "mysql_start".bat". Stop the MySQL Server with "mysql_stop.bat". For shutdown the Apache HTTPD, only close the Apache Command (CMD). Or using the fine XAMPP Control Panel with double-click on "xampp-control.exe"! 

Step 3: Start your browser and type http://127.0.0.1 or http://localhost in the location bar. You should see our pre-made
start page with certain examples and test screens.

Step 4: PHP (with mod_php, as *.php, *.php3, *.php4, *.php5, *.phtml), Perl by default with *.cgi, SSI with *.shtml are all located in => C:\XAMPPlite\htdocs\.
Examples:
- C:\XAMPPlite\htdocs\test.php => http://localhost/test.php
- C:\XAMPPlite\myhome\test.php => http://localhost/myhome/test.php

Step 5: XAMPPlite UNINSTALL? Simply remove the "XAMPPlite" Directory.
But before please shutdown the apache and mysql.

---------------------------------------------------------------

* PASSWORDS:

1) MySQL:

   User: root
   Password:
   (means no password!)

2) FileZilla FTP:

   User: newuser
   Password: wampp 

   User: anonymous
   Password: some@mail.net

3) Mercury: 

   Postmaster: postmaster (postmaster@localhost)
   Administrator: Admin (admin@localhost)

   TestUser: newuser  
   Password: wampp

4) WEBDAV:

   User: wampp
   Password: XAMPPlite

---------------------------------------------------------------

* ONLY FOR NT SYSTEMS! (NT4 | Windows 2000 | Windows XP):

- \XAMPPlite\apache\apache_installservice.bat 
  ===> Install Apache 2 as service

- \XAMPPlite\apache\apache_uninstallservice.bat 
  ===> Uninstall Apache 2 as service

- \XAMPPlite\mysql\mysql_installservice.bat 
  ===> Install MySQL as service

- \XAMPPlite\mysql\mysql_uninstallservice.bat 
  ===> Uninstall MySQL as service

==> After all un- / installations of services, better restart system!

----------------------------------------------------------------

A matter of security (A MUST READ!)

As mentioned before, XAMPPlite is not meant for production use but only for developers in a development environment. The way XAMPPlite is configured is to be open as possible and allowing the developer anything he/she wants. For development environments this is great but in a production environment it could be fatal. Here a list of missing security 
in XAMPPlite:

- The MySQL administrator (root) has no password.
- The MySQL daemon is accessible via network.
- phpMyAdmin is accessible via network.
- Examples are accessible via network.

To fix most of the security weaknesses simply call the following URL:

	http://localhost/security/

The root password for MySQL and phpMyAdmin, and also a XAMPPlite directory protection can being established here.

* NOTE: Some example sites can only access by the local systems, means over localhost. 

---------------------------------------------------------------

* MYSQL NOTES:

(1) The MySQL server can be started by double-clicking (executing) mysql_start.bat. This file can be found in the same folder you installed XAMPPlite in, most likely this will be C:\XAMPPlite\.
The exact path to this file is X:\XAMPPlite\mysql_start.bat, where "X" indicates the letter of the drive you unpacked XAMPPlite into. This batch file starts the MySQL server in console mode. The first intialization might take a few minutes.
Do not close the DOS window or you'll crash the server! To stop the server, please use mysql_stop.bat, which is located in the same directory. Or use the fine XAMPP Control Panel with double-click on "xampp-control.exe" for all these things! 

(2) To use MySQL as Service for NT / 2000 / XP, simply copy the "my.ini" file to "C:\my.ini". Please note that this file has to be placed in C:\ (root), other locations are not permitted. Then execute the "mysql_installservice.bat" in the mysql folder.

(3) MySQL starts with standard values for the user id and the password. The preset user id is "root", the password is "" (= no password). To access MySQL via PHP with the preset values, you'll have to use the following syntax:

	mysql_connect("localhost", "root", "");

If you want to set a password for MySQL access, please use of MySQL Admin.
To set the passwort "secret" for the user "root", type the following:

	C:\XAMPPlite\mysql\bin\mysqladmin.exe -u root -p secret
    
After changing the password you'll have to reconfigure phpMyAdmin to use the new password, otherwise it won't be able to access the databases. To do that, open the file config.inc.php in \XAMPPlite\phpmyadmin\ and edit the following lines:

	$cfg['Servers'][$i]['user']            = 'root';   // MySQL User
	$cfg['Servers'][$i]['auth_type']       = 'http';   // HTTP authentification

So first the 'root' password is queried by the MySQL server, before phpMyAdmin may access.
  	    	
---------------------------------------------------------------    

		Have a lot of fun! | Viel Spaﬂ! | Bonne Chance!
