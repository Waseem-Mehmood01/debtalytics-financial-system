<?php
require('../functions.php');

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = 'date';//$_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir'];//$_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value

// print_r($_REQUEST);die(1);

$searchQuery = " ";
@extract($_POST);
if(!empty($start_date) and !empty($end_date)){
	$startDate = date("Y-m-d", strtotime($start_date));
	$endDate = date("Y-m-d", strtotime($end_date));
	$searchQuery .= "AND date BETWEEN '".$startDate."' AND '".$endDate."' ";
}
if(!empty($agents)){
	$searchQuery .= "  AND user_id in (";
	foreach($agents as $agent){
		$searchQuery .= $agent.",";
	   // $search_message.= ShowAgentName($agent).", ";
	}
	$searchQuery = rtrim($searchQuery, ',');
	//$search_message = rtrim($search_message, ',');
	$searchQuery .=')';
}
// $cancel_date = $_POST['cancel_date'];

## Search 

// if($searchByName != ''){
//     $searchQuery .= " and (first_name like '%".$searchByName."%' ) ";
// }
// if($account_id != ''){
// 	$searchQuery .= " and (brp_no like '%".$account_id."%' ) ";
// }
// if($cancel_date != ''){
// 	$searchQuery .= " and (cancel_date like '%".$cancel_date."%' ) ";
// }
// if($back_office != ''){
// 	$searchQuery .= " and (back_office like '%".$back_office."%' ) ";
// }
// $action = "";
// if($_SESSION['role_id'] == 4){
// 	$searchQuery.= " and agent_id = '".$_SESSION['user_id']."'";
// 	$action = "";
// }

$records = DB::Query("select count(*) as allcount from matrics_intake");

$totalRecords = $records[0]['allcount'];

// echo ("select * from sales_intake WHERE 1 and company_id = '".$_SESSION['company_id']."' ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage);
// die(1);
$records = DB::Query("select count(*) as allcount from matrics_intake WHERE 1 ".$searchQuery);

$totalRecordwithFilter = $records[0]['allcount'];
$checkQuery = "";
if($_SESSION['role_id'] == 4){
	$checkQuery = "and user_id = '".$_SESSION['user_id']."'";
}
if($_SESSION['role_id'] == 2){
	$checkQuery = "and company_id = '".$_SESSION['company_id']."'";
}


## Fetch records
$empQuery = "select * from matrics_intake WHERE 1 ".$checkQuery." ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;

$empRecords = DB::Query($empQuery);
$data = array();
$status = '';
$color = '';
$action ='';
foreach($empRecords as $row){
	


	// if($row['status'] == 0){
	// 	$status = "Active";
	// 	$color = 'bg-success';
	// }elseif($row['status'] == 1){
	// 	$status = "Pending";
	// 	$color = 'bg-warning';
	// }elseif($row['status'] == 2){
	// 	$status = "Cancelled";
	// 	$color = 'bg-danger';
	// }

	// if($_SESSION['role_id'] != 4){
	// 	$action = '<a class="btn btn-primary edit" href="?route=modules/dataentry/editsalesintake&sale_id= '.$row['sale_id'].'">
	// 	<i class="fa fa-pencil"></i> Edit
	// </a>';
	// }
	
	if($_SESSION['role_id'] != 4 OR $_SESSION['role_id'] != 5){
		
	$action = '<div class="btn-list" style="display:flex">
              <a class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-original-title="Edit" href="?route=modules/dataentry/editmatricsintake&matric_id='.$row['matrics_id'].'"><span class="fe fe-edit fs-14"></span></a>
			<a id="delete_matrics" data-id="'.$row['matrics_id'].'" data-table="matrics_intake" data-col="matrics_id" href="" class="btn btn-sm btn-primary delete" data-bs-toggle="tooltip" data-bs-original-title="Delete"><span class="fe fe-trash-2 fs-14"></span></a></div>';
	
	}
	$timestamp= strtotime($row['date']);
	$day = date('l', $timestamp);

	$data[] = array(
		"Date"=>$row['date'],
		"Day"=>$day,
		"Agent"=>ShowAgentName($row['user_id']),
		"Inbound Apps"=>$row['inbound_apps'],
		"Out Bound Apps"=>$row['out_bound_apps'],
		"Inbound New Leads"=>$row['inbound_new_leads'],
		"Today Schedule Pitched"=>$row['today_schedule_patched'],
		"Sameday Pitches"=>$row['sameday_patches'],
		"Pitches Completed"=>$row['patches_completed'],
		"# of 1CC"=>$row['num_cc'],
		"# Of Deals"=>$row['num_of_deals'],
		"# Of New Untouched Leads"=>$row['number_of_new_untouched_leads'],
		"Total Apps"=>getMatricTotalApps($row['matrics_id']),
		"Previous Scheduled to pitch %"=>matricSchdulePitches($row['matrics_id']),
		"Pitch to close %"=>pitchesToClose($row['matrics_id']),
		"% of 1CC deals"=>matricCCDeals($row['matrics_id']),
		"Actions" => $action,
		
	);
}

## Response
$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
);

echo json_encode($response);

?>
