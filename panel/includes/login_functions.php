<?php


function get_user_name($user_id) {
// TODO: Fix this function to get user's user_name;
$sql = "SELECT user_name FROM admin_users WHERE user_id='".$user_id."'";
$user_name = DB::queryFirstField($sql);
	return $user_name;
}

function get_full_user_name($user_id ="") {
	$user_full_name = "--";
	if ($user_id <> "" AND $user_id <> 0 ) {
		$sql = "SELECT first_name, last_name FROM admin_users WHERE user_id='".$user_id."'";
		$res = DB::queryFirstRow($sql);
		$user_full_name = $res['first_name']." ".$res['last_name'];
	}
	return $user_full_name;
	
}
 
 
function attempt_login_user($user_name, $password, $company_id) {
	// build a check here to put appropriate fields in the session
	session_destroy();
	session_start();
	$is_logged = DB::queryFirstRow("SELECT * FROM admin_users u WHERE (u.`user_name` LIKE '".$user_name."' OR u.`user_email` LIKE '".$user_name."') AND u.`password`='".$password."' AND u.`company_id`=".$company_id." AND u.`user_status`= 1");	
 
	if ($is_logged) {
	
	$_SESSION['is_logged'] = 1;
	$_SESSION['name'] = $is_logged['first_name']." ".$is_logged["last_name"];
	$_SESSION['company_id'] =   $is_logged['company_id'];
	$company_id = $_SESSION['company_id'];
	$_SESSION['company_name'] = DB::queryFirstField("SELECT company_name FROM companies WHERE company_id = $company_id ");
	$_SESSION['company_logo'] = DB::queryFirstField("SELECT company_logo FROM companies WHERE company_id = $company_id ");
	$_SESSION['user_id'] = $is_logged['user_id'];
	$_SESSION['user_name'] = $is_logged['user_name']; 
	$_SESSION['role_id'] = getUserRoleID($is_logged['user_id']);  
	return true;
	}
	else
	{
		return false;
	}
}
	
	






?>