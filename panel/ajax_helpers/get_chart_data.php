<?php 
require('../functions.php');

$option = $_REQUEST['opt'];
switch ($option) {
    case "get_company_agents_chart_data":{
        $agents = DB::Query("SELECT concat(a.first_name,' ',a.last_name) AS agent_name,SUM(s.debt_amount) AS total_amount FROM sales_intake s JOIN admin_users a ON a.user_id = s.agent_id WHERE s.company_id = '".$_SESSION['company_id']."' GROUP BY s.agent_id");
        $results = array("data"=>$agents);
        echo json_encode($results);        
    }break;
    case "get_company_net_worth":{
        $query = "SELECT count(*) AS total_sale,SUM(s.debt_amount) AS total_amount, SUM(s.cancel_amount) AS total_cancel FROM sales_intake s  WHERE s.company_id = '".$_SESSION['company_id']."'";
        $data = DB::Query($query);
        // $results = array("data"=>$data);
        echo json_encode($data);        
    }break;

default:print_r(json_encode(array('code'=>403,'response'=>"access denied contact administrator")));break;
}

?>