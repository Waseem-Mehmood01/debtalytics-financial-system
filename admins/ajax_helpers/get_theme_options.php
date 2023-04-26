
<?php 
require('../functions.php');
if(isset($_REQUEST['opt'])){
$sql = DB::Query("SELECT * FROM theme_option");
if(!empty($sql)){
    $options = array("primary_color"=>$sql[0]['primary_color'],"sidebar_color"=>$sql[0]['sidebar_color']);
    echo json_encode($options);
}
// print_r($sql[0]['primary_color']);
	
}
if(isset($_REQUEST['update_theme_option'])){
    $primary_color = $_REQUEST['primary_color'];
	$sidebar_color = $_REQUEST['sidebar_color'];
    DB::update("theme_option", array(
 
        'primary_color'=> $primary_color,
		'sidebar_color'=> $sidebar_color,
        ), 'theme_id=%s', 1);
    
    
       
}