
<?php 
require('../functions.php');
if(isset($_REQUEST['opt'])){
$sql = DB::Query("SELECT header_color,sidebar_color,sidebar_text_color FROM companies WHERE company_id='".$_SESSION['company_id']."'");
if(!empty($sql)){
    $options = array("primary_color"=>$sql[0]['header_color'],"sidebar_color"=>$sql[0]['sidebar_color'],"sidebar_text_color"=>$sql[0]['sidebar_text_color']);
    echo json_encode($options);
}
// print_r($sql[0]['primary_color']);
	
}
