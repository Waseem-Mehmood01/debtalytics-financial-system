<?php
session_start();
//echo "TestBranch";
// PHP Ledger Starting Point

require_once('functions.php');
if (isset($_GET['logout'])){
	if ($_GET['logout'] == 1) {
 
		session_destroy();
 
		unset($_SESSION['is_logged']);
		unset($_SESSION['username']);
		unset($_SESSION['company_name']);
		
	  
	}
}

$include_file = "";
$path ="";
if (isset($_GET['route'])) {
$path = $_GET['route'];
} else {
	if (isset($_POST['route'])) {
	$path = $_POST['route'];
	}
}
if($path <> "") { // Checks if file really exists before including it
	$include_file = "./".$path.".php";
	if(!file_exists($include_file)) {
		$include_file = "includes/page-parts/content-404.php";
	}
		
}
 
?>
 

 
<?php include_once('includes/page-parts/header.php');

 
 ?>
 
<?php
if ( (isset($_SESSION['is_logged'])) AND (isset($_SESSION['company_name'])) AND  ($_SESSION['is_logged'] == 1)) {

	
?>
<?php //include_once('includes/page-parts/top-nav.php'); ?>
<?php //include_once('includes/page-parts/sidebar.php'); ?>
<?php include_once('includes/page-parts/content-top.php'); ?>

<?php 
		if($include_file <> "") {
			include($include_file);
		}elseif(isset($_GET['agent_sales']) and $_GET['agent_sales'] ==1 ) {
			include_once('agent_sales.php');	
		}elseif(isset($_GET['agent_sales_vertical']) and $_GET['agent_sales_vertical'] ==1 ) {
			include_once('agent_sales_vertical.php');
		}  else {
		 include('includes/page-parts/content-default.php');  
		}
		

 ?>

<?php include_once('includes/page-parts/content-bottom.php'); ?> 
<?php include_once('includes/page-parts/footer.php'); ?>
<?php 
} else { //if not logged in
	//echo '<script>window.location.replace("./login_page.php");</script>';
	// print_r($path);die(1);
	$path = '';
	if(isset($_GET['fg']) and $_GET['fg'] ==1 ){
		$path  = 'forgot_password';
	}
	if($path == "forgot_password") {
		include_once('forgot_password.php');	
	} else {
		include_once('login_page.php');
	}
	
 include_once('includes/page-parts/content-bottom.php');
 include_once('includes/page-parts/footer.php'); 
 }
?>