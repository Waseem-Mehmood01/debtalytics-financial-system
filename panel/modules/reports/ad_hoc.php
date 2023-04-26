<?php
//print_r($_SESSION);die(1);
$query_search = '';

if(isset($_REQUEST['search'])){
    @extract($_REQUEST);
    //if(!empty($agent_name))
        //$query_search .= "AND (a.first_name like '%".$agent_name."%')" ;
	if(!empty($agents)){
                $query_search .= "  AND s.agent_id in (";
                foreach($agents as $agent){
                    $query_search .= $agent.",";
                   // $search_message.= ShowAgentName($agent).", ";
                }
                $query_search = rtrim($query_search, ',');
                //$search_message = rtrim($search_message, ',');
                $query_search .=')';
            }
    if(!empty($start_date) and !empty($end_date)){
		$startDate = date("Y-m-d", strtotime($start_date));
		$endDate = date("Y-m-d", strtotime($end_date));
        $query_search .= "AND s.date_signed BETWEEN '".$startDate."' AND '".$endDate."' ";
	}
}

$query = "SELECT date_signed,concat(a.first_name,' ',a.last_name) AS agent_name,SUM(s.debt_amount) AS total_amount,SUM(s.cancel_amount) AS total_cancel_sales FROM sales_intake s JOIN admin_users a ON a.user_id = s.agent_id WHERE s.company_id = '".$_SESSION['company_id']."' $query_search GROUP BY s.agent_id";
$agents = DB::Query($query);
?> <!-- Content Header (Page header) -->

<div class="main-content app-content mt-0">
                    <div class="side-app">

                        <!-- CONTAINER -->
                        <div class="main-container container-fluid">

                            <!-- PAGE-HEADER -->
                            <div class="page-header">
                                <h1 class="page-title">Ad Hoc</h1>
                                <div>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Reports</a></li>
										<li class="breadcrumb-item active" aria-current="page"><a href="#">View Ad Hoc</a></li>
                                    </ol>
                                </div>
                            </div>
                            <!-- PAGE-HEADER END -->









							<div class="row row-sm">
                                <div class="col-lg-12">
                                    <div class="card">
									<div class="card-header">
                                            <h3 class="card-title"><i class="fa fa-building"></i> Reports</h3>
                                        </div>
                                        <div class="card-body">
                                           
											
                                            <form method="post" action="">
												  <div class="row">
													<div class="col-md-3">
														<div class="input-group">
															<div class="input-group-text">
                                            <i class="fa fa-clock-o tx-16 lh-0 op-6"></i>
                                        </div>
															<input type="text" autocomplete="off" id="start_date" name="start_date" placeholder="Start Date" class=" form-control fc-datepicker">
														</div>
													</div>
												
												
													<div class="col-md-3">
														<div class="input-group">
															<div class="input-group-text">
                                                        <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                        </div>
															<input type="text" autocomplete="off" id="end_date" name="end_date" placeholder="End Date" class=" form-control fc-datepicker">
														</div>
													</div>
												
														<div class="col-md-3">
														<div class="form-group">
											<select class="form-control multi-select" data-placeholder="Choose Agents" multiple name="agents[]">
                                            <optgroup label="All Agents">
                                            <?php 
                                                $query = "SELECT agent_id FROM sales_intake GROUP BY agent_id";
                                                $All_agents = DB::Query($query);
                                                foreach($All_agents as $row){
                                            ?>
                                            <option value="<?php echo $row['agent_id']; ?>"><?php echo ShowAgentName($row['agent_id']); ?></option>
                                            <?php }?>     
                                            </optgroup>
                                            </select>
														</div>
														</div>
                                                   
													<div class="col-md-3">
                                                  <div class="form-group">
													<button class="w-100 btn btn-primary" id="" name="search" type="submit" value="search"> <span class="fa   fa-eye"></span> &nbsp;Search
													</button>
													   </div>
													  </div>
													</div>
                                            </form>
                                        
                                                <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                                                    <thead class="report-header">
													<tr>
														<th><b>Date</b></th>
														<th><b>Agent</b></th>
														<th><b>GROSS CNT</b></th>
														<th><b>CXLS</b></th>
														<th><b>YTD NET CNT</b></th> 
														<th><b>GROSS SALES</b></th>
														<th><b>CXL %</b></th>
														<th><b>YTD NET SALES</b></th>
														<th><b>FULL MTHS</b></th>
														<th><b>'AVG</b></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
													

                                                    <?php 
                                                    foreach($agents as $agent){
                                                        $percentage_cancel = ($agent['total_cancel_sales']/$agent['total_amount']) * 100;
                                                    ?>
														<tr>
															<td><?php echo $agent['date_signed'];?></td>
                                                            <td><?php echo $agent['agent_name'];?></td>
															<td>$<?php echo number_format($agent['total_amount']); ?></td>
															<td><?php echo number_format($agent['total_cancel_sales']); ?></td>
															<td>$<?php echo number_format($agent['total_amount'] - $agent['total_cancel_sales']); ?></td>
															<td>$<?php echo number_format($agent['total_amount'] + $agent['total_cancel_sales']); ?></td>
															<td><?php echo round($percentage_cancel,2); ?>%</td>
															<td>$<?php echo number_format($agent['total_amount'] - $agent['total_cancel_sales']); ?></td>
															<td>12</td>
															<td><?php echo round($agent['total_amount']/12,2); ?></td>

                                                        </tr>
                                                        <?php } ?>
														
                                                        
                                                        
                                                    </tbody>
													<tfoot>
														
												</tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>




















                            
                            
                        </div>
                        <!-- CONTAINER CLOSED -->

                    </div>
                </div>












