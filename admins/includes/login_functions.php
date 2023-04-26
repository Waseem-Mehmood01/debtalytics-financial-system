<?php

function getUserRoleID($user_id)
	{
		//ToDO: determine user_role_id
		return $_SESSION['role_id'];
	}
function get_user_name($user_id) {
// TODO: Fix this function to get user's user_name;
$sql = "SELECT user_name FROM super_admins WHERE user_id='".$user_id."'";
$user_name = DB::queryFirstField($sql);
	return $user_name;
}
 
 
function attempt_login_user($user_name, $password) {
	session_destroy();
	session_start();
	// build a check here to put appropriate fields in the session
	$is_logged = DB::queryFirstRow("SELECT * FROM super_admins u WHERE (u.`user_name` LIKE '".$user_name."' OR u.`user_email` LIKE '".$user_name."') AND u.`password`='".$password."'  AND u.`user_status`= 1");	
	if($is_logged){
	 
	$_SESSION['is_logged'] = 1;
	$_SESSION['name'] = $is_logged['first_name']." ".$is_logged["last_name"];
	$_SESSION['is_super_admin'] = 1;
	$_SESSION['user_id'] = $is_logged['user_id'];
	$_SESSION['user_name'] = $is_logged['user_name']; 
	return true;
	}
	else
	{
		return false;
	}
}
	
	






?>