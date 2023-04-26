<?php
//echo "<pre>";
//print_r($_REQUEST);
//echo "</pre>";

if(isset($_POST)){
	if (isset($_POST['formtype'])) {

		if ($_POST['formtype'] == "edituser"){
		// Process Edit User Form	
/*
[route] => modules/users/processuserform
[role_id] => 2
[manager_id] =>
[user_name] => mansoor
[password] => mansoor123
[first_name] => Mansoor
[last_name] => Rana
[user_email] => mansoor@mansoor.com
[user_phone] => 13365455
[user_avatar_url] =>
[user_status] => 1
[user_id] => 3
[formtype] => edituser
[btnSubmit] =>

*/ 			
@extract($_POST);
$company_id = DB::queryFirstField("SELECT company_id FROM admin_users WHERE user_id = '$user_id'");
//		TODO: Process POST Data for validation			


DB::update("admin_users", array(
'user_email'   => $user_email,
'user_phone'   => $user_phone,
'first_name'   => $first_name,
'last_name'   => $last_name,
'password'   => $password,
'role_id'   => $role_id,
'manager_id'   => $manager_id,
'user_status'   => $user_status,
'user_avatar_url'   => $user_avatar_url,
'last_modified_on'    => $now,
'last_modified_by'    => $_SESSION['user_name']
), 'user_id=%s', $user_id);



echo '<script type="text/javascript">
<!--

window.location = "index.php?route=modules/users/viewusers&company_id='.$company_id.'"
//-->
</script>';			
			
	} elseif ($_POST['formtype'] == "createuser") {
		// Process Create User Form			
			
		@extract($_POST);

//		TODO: Process POST Data for validation

		// Check if username already exits
		$user_name_count = DB::queryFirstField("SELECT COUNT(*) FROM admin_users WHERE (user_name = '$user_name') AND (company_id = $company_id) ");
		If ($user_name_count <> 0) {
			die("UserName Already Exists in the company");
		}
		
/*
[route] => modules/users/processuserform
[role_id] => 2
[manager_id] =>
[user_name] => mansoor
[password] => mansoor123
[first_name] => Mansoor
[last_name] => Rana
[user_email] => mansoor@mansoor.com
[user_phone] => +92300775662
[user_avatar_url] =>
[user_status] => 1
[company_id] => 1
[formtype] => createuser
[btnSubmit] =>

*/
 
		DB::insert("admin_users", array(
		'user_name'=> $user_name,
		'user_email'   => $user_email,
		'user_phone'   => $user_phone,
		'first_name'   => $first_name,
		'last_name'   => $last_name,
		'password'   => $password,
		'role_id'   => $role_id,
		'company_id'   => $company_id,
		'manager_id'   => $manager_id,
		'user_status'   => $user_status,
		'created_on'    => $now,
		'created_by'    => $_SESSION['user_name']
		));


		echo '<script type="text/javascript">
<!--

window.location = "index.php?route=modules/users/viewusers&company_id='.$company_id.'"
//-->
</script>';
			
			
			
		} else {
			
			die("Form No Recognized by System.");
			
		}
		
	} else {
		die("INVALID DATA");
	}	
} else{
	
	die("No Data Posted");
}

?>