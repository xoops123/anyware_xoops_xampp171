<?php

// for compatibility

require '../../mainfile.php' ;
if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'set XOOPS_TRUST_PATH in mainfile.php' ) ;

$mydirname = basename( dirname( __FILE__ ) ) ;
$mydirpath = dirname( __FILE__ ) ;
require $mydirpath.'/mytrustdirname.php' ; // set $mytrustdirname

$_GET['page'] = 'viewposts' ;
require XOOPS_TRUST_PATH.'/modules/'.$mytrustdirname.'/main.php' ;

?>