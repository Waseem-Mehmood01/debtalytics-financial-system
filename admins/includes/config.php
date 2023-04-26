<?php
 ini_set('display_errors',1); 
 date_default_timezone_set('america/los_angeles');
error_reporting(E_ALL);
if(session_id() == '') {
    session_start();
//Load essential PHP Classes
}
  
// Define System CONSTANTS
define('SYSTEM_ENCODING', 'utf8' ); 
define('BR','</br>');
$now = date("Y-m-d H:i:s");

//PUSHER CREDENTIALS

define('PUSHER_APP_ID', '1341258');
define('PUSHER_APP_KEY', '0d53a49dd4bbe23f0a17');
define('PUSHER_APP_SECRET', 'a1c3fc1e1c878c3fc4a5');
define('PUSHER_APP_CLUSTER', 'ap1');
 
	
define('FOLDER_NAME','admins'); 
define('ROOT_PATH', realpath(dirname(__FILE__)."/../").'/');

define('SITE_ROOT', 'https://'.$_SERVER['HTTP_HOST'].'/'.FOLDER_NAME.'/');
define('MAIN_SITE','https://'.$_SERVER['HTTP_HOST'].'/'); 
define('DB_PREFIX', '');
 
// These are defined here to simulate logged in user behaviour. untill we have completed the security module, we will define all session variables here..

/*
	$_SESSION['is_logged'] = 1; 
	$_SESSION['company_id'] =1 ;
	$_SESSION['user_id'] =1;
	$_SESSION['user_name'] ='test';
	$_SESSION['role_id'] = 1;
	$_SESSION['co_prefix'] = "test_";
	$_SESSION['DB_PREFIX'] = 'sa_';
 	$_SESSION['company_name'] = 'Asia Traders';
 
*/
	?>
