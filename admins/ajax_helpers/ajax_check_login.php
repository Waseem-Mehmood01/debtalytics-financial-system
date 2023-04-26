<?php 
require('../functions.php');
if(isset($_POST['user'])){
$user = $_POST['user'];
}
if(isset($_POST['password'])){
$password = $_POST['password'];
}
if((isset($user)) AND (isset($password))){

	$check = attempt_login_user($user, $password);
	if($check){
	 	echo '1';
	} else {
	 echo '0';
		 
	}
}
 
?>