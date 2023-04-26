<?php
require('../functions.php');
//print_r($_SESSION);die(1);
## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = 'sale_id';//'date_signed';//$_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir'];//$_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value



$back_office = $_POST['back_office'];
$searchByName = $_POST['searchByName'];
$lastName = $_POST['lastName'];
$account_id = $_POST['account_id'];
$cancel_date = $_POST['cancel_date'];

## Search 
$searchQuery = " ";
if($lastName != ''){
    $searchQuery .= " and (last_name like '%".$lastName."%' ) ";
}
if($searchByName != ''){
    $searchQuery .= " and (first_name like '%".$searchByName."%' ) ";
}
if($account_id != ''){
	$searchQuery .= " and (brp_no like '%".$account_id."%' ) ";
}
if($cancel_date != ''){
	$searchQuery .= " and (cancel_date like '%".$cancel_date."%' ) ";
}
if($back_office != ''){
	$searchQuery .= " and (back_office like '%".$back_office."%' ) ";
}
$action = "";
if($_SESSION['role_id'] == 4 OR $_SESSION['role_id'] == 5){
	$searchQuery.= " and agent_id = '".$_SESSION['user_id']."'";
	$action = "";
}

$records = DB::Query("select count(*) as allcount from sales_intake");

$totalRecords = $records[0]['allcount'];

// echo ("select * from sales_intake WHERE 1 and company_id = '".$_SESSION['company_id']."' ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage);
// die(1);
$records = DB::Query("select count(*) as allcount from sales_intake WHERE 1 ".$searchQuery);

$totalRecordwithFilter = $records[0]['allcount'];

## Fetch records
$empQuery = "select * from sales_intake WHERE 1 and company_id = '".$_SESSION['company_id']."' ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;

$empRecords = DB::Query($empQuery);
$data = array();
$status = '';
$color = '';
$call_color = "";
$call_close = "";
$edit = '';
$userEdit = '';
$button = '';
foreach($empRecords as $row){
	
$statusButton = '<div class="statusButton"><label class="custom-switch form-switch mb-0">
			<input type="checkbox" name="status_swithcer" id="status_swithcer" data-val="'.$row['sale_id'].'" value="'.($row['status'] == 0 ? "1" : "0").'" class="status_swithcer custom-switch-input" '.($row['status'] == 0 ? "checked" : "").'>
			<span class="custom-switch-indicator"></span>
		</label></div>';

	if($row['status'] == 0){
		$status = "Active";
		$color = 'bg-success';
	}elseif($row['status'] == 1){
		$status = "Pending";
		$color = 'bg-warning';
	}elseif($row['status'] == 2){
		$status = "Cancelled";
		$color = 'bg-danger';
	}
	if($row['call_close'] == 1){
		$call_color = "bg-success";
		$call_close = "1CC";
	}

	if($_SESSION['role_id'] == 4 OR $_SESSION['role_id'] == 5){
		if($row['status'] == 1){
		$userEdit ='<a class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-original-title="Edit" href="?route=modules/dataentry/editsalesintake&sale_id='.$row['sale_id'].'"><span class="fe fe-edit fs-14"></span></a>';
		}
	}else if($_SESSION['role_id'] == 2 OR $_SESSION['role_id'] == 3){
		$edit ='<a class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-original-title="Edit" href="?route=modules/dataentry/editsalesintake&sale_id='.$row['sale_id'].'"><span class="fe fe-edit fs-14"></span></a>';
	}

	if($_SESSION['role_id'] != 4 AND $_SESSION['role_id'] != 5){
		$button = '
              '.$edit.'
			<a id="delete_sale" data-id="'.$row['sale_id'].'" href="" data-table="sales_intake" data-col="sale_id" class="btn btn-sm btn-primary delete" data-bs-toggle="tooltip" data-bs-original-title="Delete"><span class="fe fe-trash-2 fs-14"></span></a>
			'.$statusButton.'
                                                                                        
	
	
	';
	}
	$action = '<div class="btn-list" style="display:flex">
		'.$userEdit.' '.$button.'
	</div>';
	$data[] = array(
		"sale_id"=>$row['sale_id'],
		"Date Signed"=>$row['date_signed'],
		"Account ID"=>$row['brp_no'],
		"RefID"=>$row['ref_no'],
		"First Name"=>$row['first_name'],
		"Last Name"=>$row['last_name'],
		"State"=>$row['state'],
		"Debt AMT"=>"$".number_format($row['debt_amount']),
		"Contract Length"=>$row['contract_length'],
		"Type of Payment"=>$row['payment_type'],
		"Back Office"=>$row['back_office'],
		"Rep"=>get_full_user_name($row['agent_id']),
		"Manager"=>getManagerByAgent($row['agent_id']),
		"1CC"=>'<span class="rounded-pill badge '.$call_color.' ms-3 px-2 pb-1 mb-1">'.$call_close.'</span>',
		"Status"=>'<span class="rounded-pill badge '.$color.' ms-3 px-2 pb-1 mb-1">'.$status.'</span>',
		"Actions"=> $action,
	);
	$userEdit = '';
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
