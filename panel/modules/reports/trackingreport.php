<?php 
    // if(isset($_REQUEST['search'])){
    //     @extract($_POST);
    //     $search_message = "SEARCHED QUERY:";
    //     if(!empty($start_date) AND !empty($end_date) ){
    //         $searchQuery = " date BETWEEN '".$start_date."' AND '".$end_date."' ";
    //         $search_message .= " Start Date:".$start_date." End Date:".$end_date;
    //     }
    //     if(!empty($agents) AND !empty($start_date) AND !empty($end_date)){
    //         // print_r($agents);
    //         // $selected_agents = $agents;
    //         // $searchQuery = " ";
    //         $searchQuery .= " AND user_id in (";
    //         $search_message .= " Start Date:".$start_date." End Date:".$end_date." Agents Names:";
    //         foreach($agents as $agent){
    //             $searchQuery .= $agent.",";
    //             $search_message.= ShowAgentName($agent).", ";
    //         }
    //         $searchQuery = rtrim($searchQuery, ',');
    //         $search_message = rtrim($search_message, ',');
    //         $searchQuery .=')';
    //     }
    //     if(!empty($agents) AND empty($start_date) AND empty($end_date)){
    //         $searchQuery .= " user_id in (";
    //         foreach($agents as $agent){
    //             $searchQuery .= $agent.",";
    //             $search_message.= ShowAgentName($agent).", ";
    //         }
    //         $searchQuery = rtrim($searchQuery, ',');
    //         $search_message = rtrim($search_message, ',');
    //         $searchQuery .=')';
    //     }
        
    // }else{
    //     $searchQuery = "m.date> now() - interval 1 week";
    //     $search_message = "This is the Report of Current Week:";
    // }

    // New filters
    if(isset($_REQUEST['search_sales'])){
        @extract($_POST);
        $search_message = "SEARCHED QUERY:";
        // print_r($_POST);
        $dates = array();
        $searchQuery = '';
        if(!empty($days) OR !empty($months) OR !empty($years) ){
            $days_array = array();
            $days_array = explode(',',str_replace('-', ',', $days));
            $months_array = array();
            $months_array = explode(',',str_replace('-', ',', $months));
            $years_array = array();
            $years_array = explode(',',str_replace('-', ',', $years));
            foreach($years_array as $yr){
                foreach($months_array as $mn) {
                    foreach($days_array as $dy) {
                        array_push($dates,$yr.'-'.date("m", strtotime($mn)).'-'.$dy);
                    }
                }
            }  
        }else if(!empty($agents)){
            $andOperator = "";
            $searchQuery .= "  $andOperator user_id in (";
            foreach($agents as $agent){
                $searchQuery .= $agent.",";
                $search_message.= ShowAgentName($agent).", ";
            }
            $searchQuery = rtrim($searchQuery, ',');
            $search_message = rtrim($search_message, ',');
            $searchQuery .=')';
        }else{
            $search_message = "Please Select Searched Keywords!";
        }
        $i=0;
        $orOpterator = '';
        
        $totalNumOfArray =  count($dates);
        // print_r($dates);
       
        // die();
        if(!empty($dates)){
            $andOperator = "AND";
            foreach($dates as $date){
                if(++$i === $totalNumOfArray){
                    echo $i;
                    $orOpterator = "";
                }else{
                    $orOpterator = "OR";
                }
                $search_message .= "$date ,";
                $searchQuery .= " m.date like('%$date%') $orOpterator";
            }
			
				//$searchQuery .= "  $andOperator user_id in (";
                //foreach($agents as $agent){
                    //$searchQuery .= $agent.",";
                    //$search_message.= ShowAgentName($agent).", ";
                //}
                //$searchQuery = rtrim($searchQuery, ',');
                //$search_message = rtrim($search_message, ',');
                //$searchQuery .=')';
			
        }
        
        
    }else{
        $searchQuery = "m.date> now() - interval 1 week";
        $search_message = "This is the Report of Current Week:";
    }
?>
<div class="main-content app-content mt-0">
    <div class="side-app">
        <div class="main-container container-fluid">
            <div class="page-header">
                <h1 class="page-title">Tracking Report</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Reports</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">Tracking Report</a></li>
                    </ol>
                </div>
            </div>
            <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Search Filters:</div>
                        </div>
                        <form method="post" action="">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <div class="input-group-text">
                                            <i class="fa fa-clock-o tx-16 lh-0 op-6"></i>
                                        </div>
                                        <input class="form-control" autocomplete="off" id="datepicker-date" name="days" placeholder="Date Range" type="text">
                                    </div>
                                </div>
                                    <div class="col-md-2 mt-4 mt-md-0">
                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <span class="fa fa-clock-o tx-16 lh-0 op-6"></span>
                                            </div>
                                            <input class="form-control" autocomplete="off" id="datepicker-month" name="months" placeholder="Month Range" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-2 mt-4 mt-md-0">
                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <span class="fa fa-clock-o tx-16 lh-0 op-6"></span>
                                            </div>
                                            <input class="form-control" autocomplete="off" id="datepicker-year" name="years" placeholder="Year Range" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <select class="form-control multi-select" data-placeholder="Choose Agents" multiple name="agents[]">
                                            <optgroup label="All Agents">
                                            <?php 
                                                $query = "SELECT user_id FROM matrics_intake GROUP BY user_id";
                                                $agents = DB::Query($query);
                                                foreach($agents as $agent){
                                            ?>
                                            <option value="<?php echo $agent['user_id']; ?>"><?php echo ShowAgentName($agent['user_id']); ?></option>
                                            <?php }?>     
                                            </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 ">
                                        <div class="input-group">
                                            <button class="form-control btn-primary" id="search" name="search_sales" type="submit" ><span class="fa   fa-eye"></span>&nbsp;&nbsp;Search</button>
                                        
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
							
                    </div>
						
                </div>
				
            <!-- <table class="mt-3 mb-3">
                <h3 class="card-title">Search Filter</h3>
                <form method="post" action="">
                    <tr>
                        <td class="ml-3">
                            <label for="date" class="form-label">Start Date:</label>
                            <input type='date' id='start_date' name="start_date" class=" form-control">
                        </td>
                        <td class="ml-3">
                            <label for="date" class="form-label">End Date:</label>
                            <input type='date' id='end_date' name="end_date" class=" form-control">
                        </td>
                        <<td class="ml-3">
                            <label for="account_id" class="form-label">BRP #:</label>
                            <input type='text' id='account_id' name="account_id" class=" form-control" placeholder="Search With Account ID">
                        </td>
                        <td class="ml-3">
                            <label for="cancel_date" class="form-label">Cancel Date:</label>
                            <input type='date' id='cancel_date' class="form-control" name="cancel_date">
                        </td>
                        <td class="ml-3">
                        <label for="companies" class="form-label">Select Companies:</label>	
                        <select required   class="select2 form-control" id="companies" name="companies" >
                            <option
                                value=""> -- Select Company --
                                </option>
                                <?php 
                                    $query = "SELECT company_id,company_name FROM companies";
                                    $companies = DB::Query($query);
                                    foreach($companies as $company){
                                ?>
                                <option value="<?php echo $company['company_id']; ?>"><?php echo $company['company_name']; ?></option>
                                <?php }?>
                            </select>
                        </td>
                        <td class="ml-3">
                            <label for="back_office" class="form-label">Back Office:</label>	
                            <select required   class="select2 form-control" id="back_office" name="back_office[]" multiple="multiple">
                                <option
                                    value=""> -- Select BackOffice --
                                    </option>

                            </select>
                        </td> 
                        <td class="ml-3">
                            <div class="form-group">
                                <label for="agents" class="form-label">Agents:</label>	
                                <select class="select2 form-control" id="agents" name="agents[]" multiple="multiple">
                                    <option value=""> -- Select Agents -- </option>
                                    <?php 
                                        $query = "SELECT user_id FROM matrics_intake GROUP BY user_id";
                                        $agents = DB::Query($query);
                                        foreach($agents as $agent){
                                    ?>
                                    <option value="<?php echo $agent['user_id']; ?>"><?php echo ShowAgentName($agent['user_id']); ?></option>
                                    <?php }?>       
                                </select>
                            </div>
                        </td>
                        <td class="ml-3">
                            <label for="Search" class="form-label">Action:</label>
                           <button class="pull-right btn btn-primary" id="search" name="search" type="submit"> <span
                                class="fa   fa-eye"></span> &nbsp;Search
                            </button> 
                            <input type="submit" class="pull-right btn btn-primary" name="search" value="Search"/>
                        </td>
                    </tr>
                </form>
                
            </table> -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <?php 
                            echo $search_message;
                        ?>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table border text-nowrap text-md-nowrap mb-0">
                            <thead class="report-header">
                                    <tr>
										<th>Dates</th>
                                        <th>Agents Name</th>
                                        <th>App Team</th>
                                        <th>Outbound Apps</th>
                                        <th>Inbound Apps</th>
                                        <th>Previously Scheduled Pitches</th>
                                        <th>Same Day Pitches</th>
                                        <th>Pitches Completed</th>
                                        <th># of 1cc</th>
                                        <th># of Deals</th>
                                        <th># of New Leads Untouched</th>
                                        <th>TOTAL APPS:</th>
                                        <th>Previous Schdule to Pitches:</th>
                                        <th>Pitches to Close %</th>
                                        <th>% of 1CC Deals</th>
                                    </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    // (inbound_apps+out_bound_apps+inbound_new_leads) AS total_apps,
                                    // (patches_completed-sameday_patches)/today_schedule_patched*100 AS Shedule_to_pitches,
                                    // (num_of_deals/patches_completed) AS pitches_to_close,
                                    // (num_cc/num_of_deals) AS total_cc_deals
                                    if(!empty($_REQUEST['days']) AND !empty($_REQUEST['months']) AND !empty($_REQUEST['years']) AND !empty($_REQUEST['agents']) OR !empty($searchQuery)){

                                    $query = "SELECT *
                                    FROM matrics_intake m  where $searchQuery";
                                    $results = DB::Query($query);
                                    // $totalApps = 0;
                                    // $sheduleToPitches = 0;
                                    foreach($results as $res){
                                        // $totalApps = $totalApps + $res['total_apps'];
                                        // $sheduleToPitches = ($sheduleToPitches)+$res['Shedule_to_pitches'];
                                ?>
                                <tr>
									<td><?php echo $res['date']; ?></td>
                                    <td><b><?php echo ShowAgentName($res['user_id']); ?></b></td>
                                    <td><?php echo $res['inbound_apps']; ?></td>
                                    <td><?php echo $res['out_bound_apps']; ?></td>
                                    <td><?php echo $res['inbound_new_leads']; ?></td>
                                    <td><?php echo $res['today_schedule_patched']; ?></td>
                                    <td><?php echo $res['sameday_patches']; ?></td>
                                    <td><?php echo $res['patches_completed']; ?></td>
                                    <td><?php echo $res['num_cc']; ?></td>
                                    <td><?php echo $res['num_of_deals']; ?></td>
                                    <td><?php echo $res['number_of_new_untouched_leads']; ?></td>
                                    <td><?php echo getMatricTotalApps($res['matrics_id']); ?></td>
                                    <td><?php echo matricSchdulePitches($res['matrics_id']); ?></td>
                                    <td><?php echo pitchesToClose($res['matrics_id']); ?></td>
                                    <td><?php echo matricCCDeals($res['matrics_id']); ?></td>
                                </tr>
                                <?php
                                    }
                            }else{?>
                                <tr>
                                    <td colspan="15" class="text-center">No Record Found<td/>
                                </tr>
                            <?php } 
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>   
            