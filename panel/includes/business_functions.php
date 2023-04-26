<?php

use Psr\Log\NullLogger;

function getUserRoleID($user_id)
{
	$role_id = DB::queryFirstField("SELECT role_id FROM admin_users WHERE user_id = $user_id");
	return $role_id;
}

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
function getManagerByAgent($agentId){
	$manager_name = "--";
	if ($agentId <> "" AND $agentId > 1) {
			$managerId = DB::queryFirstRow("SELECT manager_id FROM admin_users WHERE user_id = $agentId");
			$manager = DB::queryFirstRow("SELECT * FROM admin_users WHERE user_id = '".$managerId['manager_id']."'");
			$manager_name = $manager['first_name']." ".$manager['last_name'];
	}
	
	return $manager_name;
}

function getAgentCurrentDateRevenue($agents_id){
	$current_date = date('Y-m-d');
	$query = "SELECT s.agent_id,COUNT(sale_id) AS today_deals,SUM(s.debt_amount) AS total_amount,MAX(debt_amount) as max_sale,MIN(debt_amount) AS min_sale FROM sales_intake s
	WHERE s.agent_id = '".$agents_id."' AND status = 0 AND date_signed='".$current_date."' GROUP BY s.agent_id";
	$get_agent_data = DB::Query($query);
	$cancels = DB::Query("SELECT SUM(cancel_amount) AS total_cancel_sale,COUNT(sale_id) AS total_cancels FROM sales_intake s
	WHERE s.agent_id = '".$agents_id."' AND cancel_amount != 0.00 AND status = 0 AND date_signed='".$current_date."' GROUP BY s.agent_id");
	if(!empty($get_agent_data)){
		$get_agent_data['total_cancel_sale'] = (empty($cancels)) ? 0 : $cancels['total_cancel_sale'];
		$get_agent_data['total_cancels'] = (empty($cancels)) ? 0 : $cancels['total_cancels'];
	}	
	return $get_agent_data;
}

function getNetRevenueByCompany($company_id){
	$query = "SELECT SUM(debt_amount) AS total_sale,COUNT(*) AS total_sales FROM `sales_intake` WHERE company_id = $company_id AND status = 0";
	$all_data = DB::Query($query);
	$cancels = DB::Query("SELECT SUM(cancel_amount) AS total_cancel_sale,COUNT(sale_id) AS total_cancels FROM sales_intake WHERE company_id = $company_id AND cancel_amount != 0.00 AND status = 0 ");
	// print_r($cancels);
	$data = array();
	// array_push($data,$all_data[0]['total_sale'], $all_data[0]['total_cancel_sale'], $all_data[0]['total_sales']);
	$data = array(
		"total_revenue" => $all_data[0]['total_sale']+$cancels[0]['total_cancel_sale'],
		"total_sale" => $all_data[0]['total_sale'],
		"total_cancel_sale" => $cancels[0]['total_cancel_sale'],
		"total_cancels" => $cancels[0]['total_cancels'],
		"sales_count" => $all_data[0]['total_sales'],
	);
	// print_r($data);

	
	return $data;
	
}
function getNetRevenue(){
	$query = "SELECT SUM(debt_amount) AS total_sale,SUM(cancel_amount) AS total_cancel_sale,COUNT(*) AS total_sales FROM `sales_intake` ";
	$all_data = DB::Query($query);
	$data = array();
	// array_push($data,$all_data[0]['total_sale'], $all_data[0]['total_cancel_sale'], $all_data[0]['total_sales']);
	$data = array(
		"total_revenue" => $all_data[0]['total_sale']+$all_data[0]['total_cancel_sale'],
		"total_sale" => $all_data[0]['total_sale'],
		"total_cancel_sale" => $all_data[0]['total_cancel_sale'],
		"sales_count" => $all_data[0]['total_sales'],
	);
	// print_r($data);

	
	return $data;
	
}
// Matric Intakes functions
function getMatricTotalApps($matric_id){
	$query = "SELECT (inbound_apps + out_bound_apps + inbound_new_leads) as TotalApps FROM matrics_intake WHERE matrics_id = $matric_id";
	$results = DB::Query($query);
	return $results[0]['TotalApps'];
}
function matricSchdulePitches($matric_id){
	$query = "SELECT (patches_completed-sameday_patches)/today_schedule_patched*100 AS Shedule_to_pitches FROM matrics_intake WHERE matrics_id = $matric_id";
	$results = DB::Query($query);
	return round($results[0]['Shedule_to_pitches'],2)."%";
}
function pitchesToClose($matric_id){
	$query = "SELECT (num_of_deals/patches_completed) AS pitches_to_close FROM matrics_intake WHERE matrics_id = $matric_id";
	$results = DB::Query($query);
	return round($results[0]['pitches_to_close'],2)."%";
}
function matricCCDeals($matric_id){
	$query = "SELECT (num_cc/num_of_deals) AS total_cc_deals FROM matrics_intake WHERE matrics_id = $matric_id";
	$results = DB::Query($query);
	return round($results[0]['total_cc_deals'],2);
}
// End Matric intakes Functions

function getTodaySaleData(){
	// $today_date =  date("Y-d-m h:i:s", time());
	$today_date = date("Y-m-d");
	return($today_date);
}
function getUserdetails($user_id){
	$query = "Select user_avatar_url from admin_users WHERE user_id = '".$user_id."'";
	$getImage =  DB::Query($query);
	// print_r($getImage);
	$imageUrl = '';
	if(!empty($getImage[0]['user_avatar_url'])){
		$imageUrl = $getImage[0]['user_avatar_url'];
	}else{
		$imageUrl = 'https://www.pngall.com/wp-content/uploads/5/Profile-Male-Transparent.png';
	}
	return $imageUrl;
	
}
function get_agent_details($id){
	$query = "SELECT * FROM admin_users WHERE user_id =".$id;
	$result = DB::Query($query);
	return $result;
}
function get_admin_create_sale_sidebar(){
	// AND status = 0
	$get_edit_sale_id = 0;
	if(isset($_GET['sale_id'])){
		$get_edit_sale_id = $_GET['sale_id'];
	}
	$query = "SELECT * FROM sales_intake s WHERE s.company_id = '".$_SESSION['company_id']."' ORDER BY s.date_signed DESC limit 20";
	$results = DB::Query($query);
	$html = '<div class="table-responsive">
	<table id="autofill-table" class="table-hover table table-bordered text-nowrap mb-0 dataTable" role="grid" aria-describedby="autofill-table_info">
		<thead>
			<tr>
				<th>Date</th>
				<th>Account ID</th>
				<th>Name</th>
				<th>State</th>
				<th>Amount</th>
				<th>Rep</th>
				<th>1CC</th>
			<th name="bstable-actions">Actions</th></tr>
		</thead>
		<tbody>';
	$total_amount = 0;
	$amount_status = '';
	$status = '';
	foreach($results as $data){
		// <span class="custom-switch-description">'.($data['status'] == 0 ? "Active" : "Not Active").'</span>
			$status = '<label class="custom-switch form-switch mb-0">
			<input type="checkbox" name="status_swithcer" id="status_swithcer" data-val="'.$data['sale_id'].'" value="'.($data['status'] == 0 ? "1" : "0").'" class="status_swithcer custom-switch-input" '.($data['status'] == 0 ? "checked" : "").'>
			<span class="custom-switch-indicator"></span>
		</label>';
		$user_details = get_agent_details($data['agent_id']);
		if(!empty($data['debt_amount'])){
			$total_amount = $data['debt_amount'];
		}else{
			$total_amount = 0;
		}
		//echo $data['cancel_amount'];
		if($data['cancel_amount'] == 0.00){
			//echo $data['cancel_amount'];
			$amount_status = 'Debted';
		}else{
			$amount_status = 'Cancel';
		}
		$color ="";
		$status1cc = '';
		if($data['call_close'] == 1){
			$status1cc = "1CC";
			$color = 'bg-primary';
		}
		/*elseif($data['call_close'] == 1){
			$status = "Multiple Phone Calls";
			$color = 'bg-success';
		}*/
		$user_details = get_agent_details($data['agent_id']);
		// print_r($user_details);
		// die(1);
		$userImage = '';
		if(!empty($user_details[0]['user_avatar_url'])){
			$userImage = $user_details[0]['user_avatar_url'];
		}else{
			$userImage = 'https://www.pngall.com/wp-content/uploads/5/Profile-Male-Transparent.png';
		}
		$selected_edit_row_class = '';
		if($get_edit_sale_id != 0){
			if($data['sale_id'] == $get_edit_sale_id){
				$selected_edit_row_class = "table-grey";
			}
		}
		
		$html .='<tr class="'.$selected_edit_row_class.'">
			<td>'.time_elapsed_string($data['created_on']).'</td>
			<td>'.$data['brp_no'].'</td>
			<td>'.$data['first_name']." ".$data['last_name'].'</td>
			<td>'.$data['state'].'</td>
			<td>$'.number_format($data['debt_amount']).'</td>
			<td>'.$user_details[0]['first_name']." ".$user_details[0]['last_name'].'</td>
			<td><span class="rounded-pill badge '.$color.' ms-3 px-2 pb-1 mb-1">'.$status1cc.'</span></td>
		<td name="bstable-actions"><div class="btn-list">
		<a id="bEdit" href="?route=modules/dataentry/editsalesintake&sale_id='.$data['sale_id'].'" class="btn btn-sm btn-primary">
			<span class="fe fe-edit"> </span>
		</a>
		'.$status.'
		
		</div></td></tr>';
                                                      
                                                        
                                                        
                                                    
	}
	$html .= '</tbody>
	</table>
</div>';



echo $html;
}
// <button id="bDel" type="button" class="btn  btn-sm btn-danger">
// 			<span class="fe fe-trash-2"> </span>
// 		</button>
function get_agent_create_sale_sidebar(){
	// print_r($_SESSION);
	//<span class="time" style="font-size:12px">'.getDateTime($data['created_on']).'</span>
	// s.agent_id = '".$_SESSION['user_id']."' and
	$query = "SELECT * FROM sales_intake s WHERE s.company_id = '".$_SESSION['company_id']."' and s.status = 0 ORDER BY s.created_on DESC";
	$results = DB::Query($query);
	// print_r($results);die(1);
	$html = '<div class="container">
	<ul class="notification" style="background: #f0f0f5;padding:10px">';
	$total_amount = 0;
	$amount_status = '';
	
	foreach($results as $data){
		$user_details = get_agent_details($data['agent_id']);
		if(!empty($data['debt_amount'])){
			$total_amount = $data['debt_amount'];
		}else{
			$total_amount = 0;
		}
		//echo $data['cancel_amount'];
		if($data['cancel_amount'] == 0.00){
			//echo $data['cancel_amount'];
			$amount_status = 'Debted';
		}else{
			$amount_status = 'Cancel';
		}
		$user_details = get_agent_details($data['agent_id']);
		$userImage = '';
		if(!empty($user_details[0]['user_avatar_url'])){
			$userImage = $user_details[0]['user_avatar_url'];
		}else{
			$userImage = 'https://www.pngall.com/wp-content/uploads/5/Profile-Male-Transparent.png';
		}
		// <span class="time" style="font-size:12px">'.time_elapsed_string($data['date_signed']).'</span>
		$color = "";
		$status = "";
		if($data['call_close'] == 1){
			$status = "1CC";
			$color = 'bg-primary';
		}
		/*elseif($data['call_close'] == 1){
			$status = "Multiple Phone Calls";
			$color = 'bg-success';
		}*/
		$html .= '<li>
				<div class="notification-time">
					<span class="date">$'.$total_amount.'</span>
					
				</div>
				<div class="notification-icon" style="left:14%;">
					<a href="javascript:void(0);"></a>
				</div>
				<div class="notification-body" style="margin-right: 0%;">
					<div class="media mt-0">
						<div class="main-avatar avatar-md online">
							<img alt="avatar" class="br-7" src="'.$userImage.'">
						</div>
						<div class="media-body ms-3 d-flex">
							<div class="" style="vertical-align: middle">
								<span class="fs-15 text-dark fw-bold mb-0 align-middle">'.$user_details[0]['first_name']." ".$user_details[0]['last_name'].'</span><br/>
								<span class="rounded-pill badge '.$color.' ms-3 px-2 pb-1 mb-1">'.$status.'</span>
							</div>
							<div class="notify-time">
								<p class="mb-0 text-muted fs-11">'.time_elapsed_string($data['date_signed']).'</p>
							</div>
						</div>
					</div>
				</div>
			</li>
		';
	}
	$html .= '</ul>
	<div class="text-center mb-4">
		<button class="btn ripple btn-primary w-md">Load more</button>
	</div>
</div>';
echo $html;

}

// function get_agent_dashboard(){
// 	// print_r($_SESSION);
// 	//<span class="time" style="font-size:12px">'.getDateTime($data['created_on']).'</span>
// 	// s.agent_id = '".$_SESSION['user_id']."' and
// 	$query = "SELECT * FROM sales_intake s WHERE s.status = 1 ORDER BY s.created_on DESC";
// 	$results = DB::Query($query);
// 	// print_r($results);die(1);
// 	$html = '<div class="container">
// 	<ul class="notification">';
// 	$total_amount = 0;
// 	$amount_status = '';
	
// 	foreach($results as $data){
// 		$user_details = get_agent_details($data['agent_id']);
// 		if(!empty($data['debt_amount'])){
// 			$total_amount = $data['debt_amount'];
// 		}else{
// 			$total_amount = 0;
// 		}
// 		//echo $data['cancel_amount'];
// 		if($data['cancel_amount'] == 0.00){
// 			//echo $data['cancel_amount'];
// 			$amount_status = 'Debted';
// 		}else{
// 			$amount_status = 'Cancel';
// 		}
// 		$user_details = get_agent_details($data['agent_id']);
// 		$userImage = '';
// 		if(!empty($user_details[0]['user_avatar_url'])){
// 			$userImage = $user_details[0]['user_avatar_url'];
// 		}else{
// 			$userImage = 'https://www.pngall.com/wp-content/uploads/5/Profile-Male-Transparent.png';
// 		}
// 		$html .= '<li>
// 				<div class="notification-time">
// 					<span class="date">$'.$total_amount.'</span>
// 					<span class="time" style="font-size:12px">'.time_elapsed_string($data['created_on']).'</span>
// 				</div>
// 				<div class="notification-icon">
// 					<a href="javascript:void(0);"></a>
// 				</div>
// 				<div class="notification-body">
// 					<div class="media mt-0">
// 						<div class="main-avatar avatar-md online">
// 							<img alt="avatar" class="br-7" src="'.$userImage.'">
// 						</div>
// 						<div class="media-body ms-3 d-flex">
// 							<div class="" style="vertical-align: middle">
// 								<span class="fs-15 text-dark fw-bold mb-0 align-middle">'.$user_details[0]['first_name']." ".$user_details[0]['last_name'].'</span><br/>
								
// 							</div>
// 							<div class="notify-time">
// 								<p class="mb-0 text-muted fs-11">'.$data['state'].'</p>
// 							</div>
// 						</div>
// 					</div>
// 				</div>
// 			</li>
// 		';
// 	}
// 	$html .= '</ul>
// 	<div class="text-center mb-4">
// 		<button class="btn ripple btn-primary w-md">Load more</button>
// 	</div>
// </div>';
// echo $html;
// }
// function get_company_dashboard(){
// 	$html = '';
// 	$html.='<div class="row">
// 	<div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
// 		<div class="row">
// 			<div class="col-lg-6 col-md-6 col-sm-12 col-xl-6 col-xxl-3">
// 				<div class="card overflow-hidden bg-primary">
// 					<div class="card-body">
// 						<div class="d-flex">
// 							<div class="mt-2">
// 								<!-- <h6 class="">Total Companies</h6> -->
// 								<h2 class="mb-0 number-font text-white">More Info <i class="fa fa-arrow-circle-right"></i></h2>
// 							</div>
// 							<div class="ms-auto">
// 								<div class="chart-wrapper mt-1">
// 									<canvas id="saleschart" class="h-8 w-9 chart-dropshadow"></canvas>
// 								</div>
// 							</div>
// 						</div>
// 						<!-- <span class="text-muted fs-12"><span class="text-secondary"><i class="fe fe-arrow-up-circle  text-secondary"></i> 5%</span> Last week</span> -->
// 					</div>
// 				</div>
// 			</div>
// 			<div class="col-lg-6 col-md-6 col-sm-12 col-xl-6 col-xxl-3">
// 				<div class="card overflow-hidden bg-success">
// 					<div class="card-body">
// 						<div class="d-flex">
// 							<div class="mt-2">
// 								<!-- <h6 class="">Total Users</h6> -->
// 								<h2 class="mb-0 number-font text-white">More Info <i class="fa fa-arrow-circle-right"></i></h2>
// 							</div>
// 							<div class="ms-auto">
// 								<div class="chart-wrapper mt-1"><canvas id="leadschart" class="h-8 w-9 chart-dropshadow"></canvas>
// 								</div>
// 							</div>
// 						</div>
// 						<!-- <span class="text-muted fs-12"><span class="text-pink"><i class="fe fe-arrow-down-circle text-pink"></i> 0.75%</span> Last 6 days</span> -->
// 					</div>
// 				</div>
// 			</div>
// 			<div class="col-lg-6 col-md-6 col-sm-12 col-xl-6 col-xxl-3">
// 				<div class="card overflow-hidden bg-warning">
// 					<div class="card-body">
// 						<div class="d-flex">
// 							<div class="mt-2">
// 								<!-- <h6 class="">Total Modules</h6> -->
// 								<h2 class="mb-0 number-font text-white">More Info <i class="fa fa-arrow-circle-right"></i></h2>
// 							</div>
// 							<div class="ms-auto">
// 								<div class="chart-wrapper mt-1"> <canvas id="profitchart" class="h-8 w-9 chart-dropshadow"></canvas>
// 								</div>
// 							</div>
// 						</div>
// 						<!-- <span class="text-muted fs-12"><span class="text-green"><i class="fe fe-arrow-up-circle text-green"></i> 0.9%</span> Last 9 days</span> -->
// 					</div>
// 				</div>
// 			</div>
// 			<div class="col-lg-6 col-md-6 col-sm-12 col-xl-6 col-xxl-3">
// 				<div class="card overflow-hidden bg-danger">
// 					<div class="card-body">
// 						<div class="d-flex">
// 							<div class="mt-2">
// 								<!-- <h6 class="">Total Cost</h6> -->
// 								<h2 class="mb-0 number-font text-white">More Info <i class="fa fa-arrow-circle-right"></i></h2>
// 							</div>
// 							<div class="ms-auto">
// 								<div class="chart-wrapper mt-1"> <canvas id="costchart" class="h-8 w-9 chart-dropshadow"></canvas>
// 								</div>
// 							</div>
// 						</div>
// 						<!-- <span class="text-muted fs-12"><span class="text-warning"><i class="fe fe-arrow-up-circle text-warning"></i> 0.6%</span> Last year</span> -->
// 					</div>
// 				</div>
// 			</div>
// 		</div>
// 	</div>
// 	<div class="col-lg-6 col-md-12">
// 			<div class="card">
// 			<div class="card-header">
// 				<h3 class="card-title">Total Sales</h3>
// 			</div>
// 			<div class="card-body">
// 			<canvas id="net_worth" ></canvas>
			
// 			</div>
// 		</div>
// 	</div>';
// 	$html .='<div class="col-lg-6 col-md-12">
// 		<!--<div class="card">
// 			<div class="card-header">
// 				<h3 class="card-title">Agent Sales</h3>
// 			</div>
// 			<div class="card-body">
// 				<div class="chart-container">
// 					<canvas id="agentSalesChart" class="h-275"></canvas>
// 					<div id="chartBar"></div>
// 				</div>
// 			</div>
// 		</div>
// 	</div>-->
// 	<div class="card">
// 			<div class="card-header">
// 				<h4 class="card-title fw-semibold">Agent Sales</h4>
// 			</div><div class="card-body">
// 			<div class="browser-stats">';

			
// 				$query = "SELECT concat(a.first_name,' ',a.last_name) AS agent_name,SUM(s.debt_amount) AS total_amount,a.user_id FROM sales_intake s JOIN admin_users a ON a.user_id = s.agent_id WHERE s.company_id = '".$_SESSION['company_id']."' GROUP BY s.agent_id";
// 				$get_agent_data = DB::Query($query);
// 				// print_r($get_agent_data);
// 				$bgColors = array();
// 				$bgColors = ['bg-primary','bg-secondary','bg-success','bg-danger','bg-warning','bg-info','bg-green'];
// 				//print_r($bgColors);
// 				$i = 0;
// 				foreach($get_agent_data as $agents){
// 					$i++;
// 					// 
// 					$net_worth = get_net_worth();
// 					$agent_sale_percentage = $agents['total_amount']/$net_worth*100;
// 					// $agent_sale_percentage = $agent_sale_percentage*10;
// 					if($agent_sale_percentage < 40){
// 						$icon = "fe-arrow-down";
// 						$text = "text-danger";
// 						$bg = "bg-danger";
// 					}else{
// 						$icon = "fe-arrow-up";
// 						$text = "text-success";
// 						$bg = "bg-success";
// 					}
// 					$html .='
// 					<div class="row mb-4 agent_sales" >
// 						<div class="col-sm-2 col-lg-3 col-xl-3 col-xxl-2 mb-sm-0 mb-3">
// 							<img src="'.getUserdetails($agents['user_id']).'" style="height:60%;width:60%;padding:0" class="rounded img-fluid"
// 								alt="img">
// 						</div>
// 						<div class="col-sm-10 col-lg-9 col-xl-9 col-xxl-10 ps-sm-0">
// 							<div class="d-flex align-items-end justify-content-between mb-1">
// 								<h6 class="mb-1"><b>'.$agents['agent_name'].'</b>&nbsp;<span class="rounded-pill badge '.$bg.' ms-3 px-2 pb-1 mb-1">'.get_total_sales_of_agents($agents['user_id']).'</span></h6>
// 								<h6 class="fw-semibold mb-1">$'.$agents['total_amount'].' <span class="'.$text.' fs-11">(<i class="fe '.$icon.'"></i>'.round($agent_sale_percentage).'%)</span></h6>
// 							</div>
// 							<div class="progress h-2 mb-3">
// 								<div class="progress-bar '.$bgColors[$i].'" style="width: '.$agent_sale_percentage.'%;"role="progressbar"></div>
// 							</div>
// 						</div>
// 					</div>
// 					';
// 				 }

// 		$html.='</div>
// 		</div></div>
// 	</div>';
// 	echo $html;
// }
function get_net_worth(){
	$query = "SELECT SUM(debt_amount) AS total_amount FROM sales_intake WHERE company_id='".$_SESSION['company_id']."'";
	$result = DB::Query($query);
	return $result[0]['total_amount'];
}
// functions for agents
function get_total_sales_of_agents($user_id){
	$query = "SELECT COUNT(*) as total_sales FROM sales_intake s WHERE s.agent_id = '".$user_id."' AND status = 0";
	$restults = DB::Query($query);
	return $restults[0]['total_sales'];
}
function get_total_amount_of_agents($user_id){
	$query = "SELECT SUM(debt_amount) as total_debt, SUM(cancel_amount) AS total_cancels FROM sales_intake s WHERE s.agent_id = '".$user_id."' AND status = 0";
	$results = DB::Query($query);
	$total_profit = $results[0]['total_debt'] - $results[0]['total_cancels'];
	return $total_profit;
}
function get_total_cancel_sales_of_agents($user_id){
	$query = "SELECT COUNT(*) as total_cancels FROM sales_intake s WHERE s.agent_id = '".$user_id."' and cancel_amount != 0.00 AND status = 0";
	$restults = DB::Query($query);
	return $restults[0]['total_cancels'];
}
// end agent Functions

// admin dashboard functions
function get_total_sales_of_company($company_id){
	$query = "SELECT COUNT(*) as total_sales FROM sales_intake s WHERE s.company_id = '".$company_id."' AND status = 0";
	$restults = DB::Query($query);
	return $restults[0]['total_sales'];
}
function get_total_sales_of_company_monthly($company_id){
	$first_day_this_month = date('Y-m-01');
	$last_day_this_month  = date('Y-m-t');
	$query = "SELECT COUNT(*) as total_sales FROM sales_intake s WHERE s.date_signed BETWEEN '".$first_day_this_month."' AND '".$last_day_this_month."' AND s.company_id = '".$company_id."'  AND status = 0";
	$restults = DB::Query($query);
	return $restults[0]['total_sales'];
}
function get_total_amount_of_company_monthly($company_id){
	$first_day_this_month = date('Y-m-01');
	$last_day_this_month  = date('Y-m-t');
	$query = "SELECT SUM(debt_amount) as total_debt, SUM(cancel_amount) AS total_cancels FROM sales_intake s WHERE s.date_signed BETWEEN '".$first_day_this_month."' AND '".$last_day_this_month."' AND s.company_id = '".$company_id."' AND status = 0";
	$results = DB::Query($query);
	$total_profit = $results[0]['total_debt'] - $results[0]['total_cancels'];
	return $total_profit;
}
function get_total_amount_of_company($company_id){
	$query = "SELECT SUM(debt_amount) as total_debt, SUM(cancel_amount) AS total_cancels FROM sales_intake s WHERE s.company_id = '".$company_id."' AND status = 0";
	$results = DB::Query($query);
	$total_profit = $results[0]['total_debt'] - $results[0]['total_cancels'];
	return $total_profit;
}
function get_total_cancel_sales_of_company_monthly($company_id){
	$first_day_this_month = date('Y-m-01');
	$last_day_this_month  = date('Y-m-t');
	$query = "SELECT COUNT(*) as total_cancels FROM sales_intake s WHERE s.date_signed BETWEEN '".$first_day_this_month."' AND '".$last_day_this_month."' AND s.company_id = '".$company_id."' and cancel_amount != 0.00 AND status = 0";
	$restults = DB::Query($query);
	return $restults[0]['total_cancels'];
}

function get_total_cancel_sales_of_company($company_id){
	$query = "SELECT COUNT(*) as total_cancels FROM sales_intake s WHERE s.company_id = '".$company_id."' and cancel_amount != 0.00 AND status = 0";
	$restults = DB::Query($query);
	return $restults[0]['total_cancels'];
}
// end admin function
function get_manager_dashboard(){
	echo "Here is Manager Dashboard";
}
function get_user_role(){
	return $_SESSION['role_id'];
}
function get_daily_tracker_data($field, $day){
	$date = date( 'Y-m-d', strtotime( "$day this week" ) );
	
	if(get_user_role() == 4 OR get_user_role() == 5){
		$searchQuery = "AND user_id = '".$_SESSION['user_id']."'";
	}else if(get_user_role() == 2){
		$searchQuery = "AND company_id = '".$_SESSION['company_id']."'";

	}
	$query = "SELECT $field FROM matrics_intake WHERE date = '$date' $searchQuery ";
	$result = DB::Query($query);
	$total = 0;
	foreach($result as $res){
		$total += $res[$field];
	}
	if(!empty($result)){
		return $total;
	}else{
		
		return "";
	}
}

function get_totals_of_weekly_tracking($title, $day){
	$date = date( 'Y-m-d', strtotime( "$day this week" ) );
	if(get_user_role() == 4 OR get_user_role() == 5){
		$searchQuery = "AND user_id = '".$_SESSION['user_id']."'";
	}else if(get_user_role() == 2){
		$searchQuery = "AND company_id = '".$_SESSION['company_id']."'";

	}
	if($title == "Total Apps"){
		$query = "SELECT (inbound_apps+out_bound_apps+inbound_new_leads) AS total_apps FROM matrics_intake WHERE date = '$date' $searchQuery ";
		$result = DB::Query($query);
		$total = 0;
		foreach($result as $res){
			$total += $res['total_apps'];
		}
		if(!empty($result)){
			return $total;
		}else{
			
			return "";
		}
	}elseif($title == "Pitches"){
		$query = "SELECT (patches_completed-sameday_patches)/today_schedule_patched*100 AS pitch_per FROM matrics_intake WHERE date = '$date' $searchQuery";
		$result = DB::Query($query);
		$total = 0;
		foreach($result as $res){
			$total += $res['pitch_per'];
		}
		if(!empty($result)){
			return round($total,2);
		}else{
			
			return "";
		}
	}elseif($title == "Pitches to Close"){
		$query = "SELECT (num_of_deals/patches_completed)*100 AS pitch_close FROM matrics_intake WHERE date = '$date' $searchQuery";
		$result = DB::Query($query);
		$total = 0;
		foreach($result as $res){
			$total += $res['pitch_close'];
		}
		if(!empty($result)){
			return round($total,2)."%";
		}else{
			
			return "";
		}
	}elseif($title = 'Total Deals Of Week'){
		$monday = strtotime("last monday");
		$monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
		$sunday = strtotime(date("Y-m-d",$monday)." +6 days");
		$this_week_sd = date("Y-m-d",$monday);
		$this_week_ed = date("Y-m-d",$sunday);
		$query = "SELECT SUM(num_of_deals) AS total_week_deals FROM matrics_intake m WHERE m.date BETWEEN '".$this_week_sd."' AND '".$this_week_ed."' $searchQuery";
		$result = DB::Query($query);
		if(!empty($result)){
			return round($result[0]['total_week_deals'],2);
		}else{
			
			return "";
		}
	}
}

function totalDealsOfWeek($title, $startDate,$endDate){
	if(get_user_role() == 4 OR get_user_role() == 5){
		$searchQuery = "AND user_id = '".$_SESSION['user_id']."'";
	}else if(get_user_role() == 2){
		$searchQuery = "AND company_id = '".$_SESSION['company_id']."'";

	}
	$query = "SELECT SUM(num_of_deals) AS total_week_deals FROM matrics_intake m WHERE m.date BETWEEN '".$startDate."' AND '".$endDate ."' $searchQuery";
	$result = DB::Query($query);
	if(!empty($result)){
		return round($result[0]['total_week_deals'],2);
	}else{
		
		return "";
	}
}


function get_grand_totals_of_weekly_tracking($title,$startDate,$endDate){
		// $monday = strtotime("last monday");
		// $monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
		// $sunday = strtotime(date("Y-m-d",$monday)." +6 days");
		// $this_week_sd = date("Y-m-d",$monday);
		// $this_week_ed = date("Y-m-d",$sunday);
		if(get_user_role() == 4){
			$searchQuery = "AND user_id = '".$_SESSION['user_id']."'";
		}else if(get_user_role() == 2){
			$searchQuery = "AND company_id = '".$_SESSION['company_id']."'";
	
		}
	if($title == "Total Apps Per Week"){
		$query = "SELECT (inbound_apps+out_bound_apps+inbound_new_leads) AS total_apps FROM matrics_intake m WHERE m.date BETWEEN '".$startDate."' AND '".$endDate."' $searchQuery ";
		$result = DB::Query($query);
		$grand_week_total_app = 0;
		foreach($result as $res){
			$grand_week_total_app += $res['total_apps'];
		}
		if(!empty($result)){
			return round($grand_week_total_app,2);
		}else{
			
			return "";
		}
	}else if($title == 'Schedule Pitch'){
		$query = "SELECT (patches_completed-sameday_patches)/today_schedule_patched*100 AS pitch_per FROM matrics_intake m WHERE m.date BETWEEN '".$startDate."' AND '".$endDate."' $searchQuery";
		$result = DB::Query($query);
		$grand_week_total_pitch_per = 0;
		foreach($result as $res){
			$grand_week_total_pitch_per += $res['pitch_per'];
		}
		if(!empty($result)){
			return round($grand_week_total_pitch_per,2);
		}else{
			
			return "";
		}
	}else if($title == "Pitch to Close"){
		$query = "SELECT (num_of_deals/patches_completed)*100 AS pitch_close FROM matrics_intake m WHERE m.date BETWEEN '".$startDate."' AND '".$endDate."' $searchQuery";
		$result = DB::Query($query);
		$grand_week_pitch_close = 0;
		foreach($result as $res){
			$grand_week_pitch_close += $res['pitch_close'];
		}
		if(!empty($result)){
			return round($grand_week_pitch_close,2)."%";
		}else{
			
			return "";
		}
	}
}
function ShowAgentName($agent_id){
	// $agent_id = "--";
	if ($agent_id <> "" AND $agent_id > 1) {
			$agent = DB::queryFirstRow("SELECT first_name,last_name FROM admin_users WHERE user_id = $agent_id");
			$agent_name = $agent['first_name']." ".$agent['last_name'];
	}
	
	return $agent_name;
}

// For Agent Dashboard 
function getDailyAgentDeals($agent_id){
	$date = date('Y-m-d');
	$query = "SELECT Count(sale_id) AS total_daily_deals FROM sales_intake m WHERE m.date_signed BETWEEN '".$date."' AND '".$date."' AND agent_id = $agent_id AND status = 0";
	$result = DB::Query($query);
	return $result[0]['total_daily_deals'];
}
function getDailyAgentGrossSale($agent_id){
	$date = date('Y-m-d');
	$query = "SELECT SUM(debt_amount) AS grossSales FROM sales_intake m WHERE m.date_signed BETWEEN '".$date."' AND '".$date."' AND agent_id = $agent_id AND status = 0";
	$result = DB::Query($query);
	return $result[0]['grossSales'];
}
function getDailyAgentCancels($agent_id){
	$date = date('Y-m-d');
	$query = "SELECT COUNT(cancel_amount) AS cancels FROM sales_intake m WHERE m.date_signed BETWEEN '".$date."' AND '".$date."' AND agent_id = $agent_id AND cancel_amount != '' AND status = 0";
	$result = DB::Query($query);
	return $result[0]['cancels'];
}


function getWeeklyAgentDeals($agent_id){
	// echo $agent_id;die(1);
	$monday = strtotime("last monday");
	$monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
	$sunday = strtotime(date("Y-m-d",$monday)." +6 days");
	$this_week_sd = date("Y-m-d",$monday);
	$this_week_ed = date("Y-m-d",$sunday);
	$query = "SELECT Count(sale_id) AS total_week_deals FROM sales_intake m WHERE m.date_signed BETWEEN '".$this_week_sd."' AND '".$this_week_ed."' AND agent_id = $agent_id AND status = 0";
	$result = DB::Query($query);
	return $result[0]['total_week_deals'];
}
function getWeeklyAgentGrossSale($agent_id){
	// echo $agent_id;die(1);
	$monday = strtotime("last monday");
	$monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
	$sunday = strtotime(date("Y-m-d",$monday)." +6 days");
	$this_week_sd = date("Y-m-d",$monday);
	$this_week_ed = date("Y-m-d",$sunday);
	$query = "SELECT SUM(debt_amount) AS grossSale FROM sales_intake m WHERE m.date_signed BETWEEN '".$this_week_sd."' AND '".$this_week_ed."' AND agent_id = $agent_id AND status = 0";
	$result = DB::Query($query);
	return $result[0]['grossSale'];
}
function getWeeklyAgentCancels($agent_id){
	// echo $agent_id;die(1);
	$monday = strtotime("last monday");
	$monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
	$sunday = strtotime(date("Y-m-d",$monday)." +6 days");
	$this_week_sd = date("Y-m-d",$monday);
	$this_week_ed = date("Y-m-d",$sunday);
	$query = "SELECT Count(sale_id) AS totalCancels FROM sales_intake m WHERE m.date_signed BETWEEN '".$this_week_sd."' AND '".$this_week_ed."' AND agent_id = $agent_id AND cancel_amount != '' AND status = 0";
	$result = DB::Query($query);
	return $result[0]['totalCancels'];
}

function getMonthlyAgentDeals($agent_id){
	$first_date = date('y-m-d',strtotime('first day of this month'));
	$last_date = date('y-m-d',strtotime('last day of this month'));
	$query = "SELECT Count(sale_id) AS total_monthly_deals FROM sales_intake m WHERE m.date_signed BETWEEN '".$first_date."' AND '".$last_date."' AND agent_id = $agent_id AND status = 0";
	$result = DB::Query($query);
	return $result[0]['total_monthly_deals'];
}
function getMonthlyAgentGrossSale($agent_id){
	$first_date = date('y-m-d',strtotime('first day of this month'));
	$last_date = date('y-m-d',strtotime('last day of this month'));
	$query = "SELECT SUM(debt_amount) AS grossSales FROM sales_intake m WHERE m.date_signed BETWEEN '".$first_date."' AND '".$last_date."' AND agent_id = $agent_id AND status = 0";
	$result = DB::Query($query);
	return $result[0]['grossSales'];
}
function getMonthlyAgentCancels($agent_id){
	$first_date = date('y-m-d',strtotime('first day of this month'));
	$last_date = date('y-m-d',strtotime('last day of this month'));
	$query = "SELECT COUNT(cancel_amount) AS cancels FROM sales_intake m WHERE m.date_signed BETWEEN '".$first_date."' AND '".$last_date."' AND agent_id = $agent_id AND cancel_amount != '' AND status = 0";
	$result = DB::Query($query);
	return $result[0]['cancels'];
}
// End Agent Dashboard 


// For admin/Manager Dashboard

function getDailyAdminDeals($company_id){
	$date = date('Y-m-d');
	$query = "SELECT Count(sale_id) AS total_daily_deals FROM sales_intake m WHERE m.date_signed BETWEEN '".$date."' AND '".$date."' AND company_id = $company_id AND status = 0";
	$result = DB::Query($query);
	return $result[0]['total_daily_deals'];
}
function getDailyAdminGrossSale($company_id){
	$date = date('Y-m-d');
	$query = "SELECT SUM(debt_amount) AS grossSales FROM sales_intake m WHERE m.date_signed BETWEEN '".$date."' AND '".$date."' AND company_id = $company_id AND status = 0";
	$result = DB::Query($query);
	return $result[0]['grossSales'];
}
function getDailyAdminCancels($company_id){
	$date = date('Y-m-d');
	$query = "SELECT COUNT(cancel_amount) AS cancels FROM sales_intake m WHERE m.date_signed BETWEEN '".$date."' AND '".$date."' AND company_id = $company_id AND cancel_amount != '' AND status = 0";
	$result = DB::Query($query);
	return $result[0]['cancels'];
}






function getWeeklyAdminDeals($company_id){
	// echo $agent_id;die(1);
	$monday = strtotime("last monday");
	$monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
	$sunday = strtotime(date("Y-m-d",$monday)." +6 days");
	$this_week_sd = date("Y-m-d",$monday);
	$this_week_ed = date("Y-m-d",$sunday);
	$query = "SELECT Count(sale_id) AS total_week_deals FROM sales_intake m WHERE m.date_signed BETWEEN '".$this_week_sd."' AND '".$this_week_ed."' AND company_id = $company_id AND status = 0";
	$result = DB::Query($query);
	return $result[0]['total_week_deals'];
}
function getWeeklyAdminGrossSale($company_id){
	// echo $agent_id;die(1);
	$monday = strtotime("last monday");
	$monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
	$sunday = strtotime(date("Y-m-d",$monday)." +6 days");
	$this_week_sd = date("Y-m-d",$monday);
	$this_week_ed = date("Y-m-d",$sunday);
	$query = "SELECT SUM(debt_amount) AS grossSale FROM sales_intake m WHERE m.date_signed BETWEEN '".$this_week_sd."' AND '".$this_week_ed."' AND company_id = $company_id AND status = 0";
	$result = DB::Query($query);
	return $result[0]['grossSale'];
}
function getWeeklyAdminCancels($company_id){
	// echo $agent_id;die(1);
	$monday = strtotime("last monday");
	$monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
	$sunday = strtotime(date("Y-m-d",$monday)." +6 days");
	$this_week_sd = date("Y-m-d",$monday);
	$this_week_ed = date("Y-m-d",$sunday);
	$query = "SELECT Count(sale_id) AS totalCancels FROM sales_intake m WHERE m.date_signed BETWEEN '".$this_week_sd."' AND '".$this_week_ed."' AND company_id = $company_id AND cancel_amount != '' AND status = 0";
	$result = DB::Query($query);
	return $result[0]['totalCancels'];
}

function getMonthlyAdminDeals($company_id){
	$first_date = date('y-m-d',strtotime('first day of this month'));
	$last_date = date('y-m-d',strtotime('last day of this month'));
	$query = "SELECT Count(sale_id) AS total_monthly_deals FROM sales_intake m WHERE m.date_signed BETWEEN '".$first_date."' AND '".$last_date."' AND company_id = $company_id AND status = 0";
	$result = DB::Query($query);
	return $result[0]['total_monthly_deals'];
}
function getMonthlyAdminGrossSale($company_id){
	$first_date = date('y-m-d',strtotime('first day of this month'));
	$last_date = date('y-m-d',strtotime('last day of this month'));
	$query = "SELECT SUM(debt_amount) AS grossSales FROM sales_intake m WHERE m.date_signed BETWEEN '".$first_date."' AND '".$last_date."' AND company_id = $company_id AND status = 0";
	$result = DB::Query($query);
	return $result[0]['grossSales'];
}
function getMonthlyAdminCancels($company_id){
	$first_date = date('y-m-d',strtotime('first day of this month'));
	$last_date = date('y-m-d',strtotime('last day of this month'));
	$query = "SELECT COUNT(cancel_amount) AS cancels FROM sales_intake m WHERE m.date_signed BETWEEN '".$first_date."' AND '".$last_date."' AND company_id = $company_id AND cancel_amount != '' AND status = 0";
	$result = DB::Query($query);
	return $result[0]['cancels'];
}



?>