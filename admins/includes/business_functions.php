<?php 
function get_company_user_count($company_id){

	$user_count = DB::queryFirstField("SELECT COUNT(*) from admin_users where company_id =$company_id");

	return $user_count;	
}

function ShowRoleName($role_id){
	$role_name = DB::queryFirstField("SELECT role_desc FROM user_roles WHERE role_id = $role_id");
	return $role_name;
}

function ShowManagerName($manager_id){
	$manager_name = "--";
	if ($manager_id <> "" AND $manager_id > 1) {
			$manager = DB::queryFirstRow("SELECT * FROM admin_users WHERE user_id = $manager_id");
			$manager_name = $manager['first_name']." ".$manager['last_name'];
	}
	
	return $manager_name;
}
function ShowAgentName($agent_id){
	// $agent_id = "--";
	if ($agent_id <> "" AND $agent_id > 1) {
			$agent = DB::queryFirstRow("SELECT first_name,last_name FROM admin_users WHERE user_id = $agent_id");
			$agent_name = $agent['first_name']." ".$agent['last_name'];
	}
	
	return $agent_name;
}
?>