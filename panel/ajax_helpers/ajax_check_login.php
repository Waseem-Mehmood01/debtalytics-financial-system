<?php 
require('../functions.php');
if(isset($_POST['user'])){
$user = $_POST['user'];
}
if(isset($_POST['password'])){
$password = $_POST['password'];
}
if (isset($_POST['company_id'])) {
	$company_id = $_POST['company_id'];
}
if ((isset($user)) AND (isset($password)) AND (isset($company_id))) {

	$check = attempt_login_user($user, $password,$company_id);
	if($check){
	 	echo '1';
	} else {
	 echo '0';
		 
	}
}
 
?>