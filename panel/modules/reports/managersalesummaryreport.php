<?php 
    $html = '';
    $query = "SELECT * FROM admin_users WHERE manager_id = '".$_SESSION['user_id']."'";
    $getAgentsByManager = DB::Query($query);
    if(isset($_REQUEST['search'])){
        @extract($_REQUEST);
        $query_search  = "";
        //if(!empty($agent_name))
            //$query_search .= "AND (a.first_name like '%".$agent_name."%')" ;
        // if(!empty($agents)){
        //             $query_search .= "  AND s.agent_id in (";
        //             foreach($agents as $agent){
        //                 $query_search .= $agent.",";
        //                // $search_message.= ShowAgentName($agent).", ";
        //             }
        //             $query_search = rtrim($query_search, ',');
        //             //$search_message = rtrim($search_message, ',');
        //             $query_search .=')';
        //         }
        if(!empty($start_date) and !empty($end_date)){
            $startDate = date("Y-m-d", strtotime($start_date));
            $endDate = date("Y-m-d", strtotime($end_date));
            $query_search .= "AND s.date_signed BETWEEN '".$startDate."' AND '".$endDate."' ";
        }
        foreach($getAgentsByManager as $agents){
            $query = "SELECT *,COUNT(sale_id) as gross_sale,SUM(debt_amount) as net_sale,SUM(cancel_amount) as total_cancel FROM sales_intake s WHERE agent_id = '".$agents['user_id']."' $query_search GROUP BY agent_id";
            $results = DB::Query($query);
            $net_cancels = 0;
            $gross_cancels = 0;
            foreach($results as $res){
                if($res['total_cancel'] != '0.00'){
                    echo $res['total_cancel'];
                    $net_cancels =$net_cancels + $res['total_cancel'];
                    $gross_cancels++;
                }
        
            $html  .='<tr class="text-center">
                <td>'.$agents['first_name']." ".$agents['last_name'].'</td>
                <td>'.$res['gross_sale'].'</td>
                <td>'.$gross_cancels.'</td>
                <td>$'.number_format($res['net_sale']).'</td>
                <td>'.$res['gross_sale']+$gross_cancels.'</td>
                <td>'.$net_cancels.'</td>
                <td>$'.number_format($res['net_sale']-$res['total_cancel']).'</td>
                <!-- <td></td> -->
            </tr>';
        }
            }
    }else{
    foreach($getAgentsByManager as $agents){
    $query = "SELECT *,COUNT(sale_id) as gross_sale,SUM(debt_amount) as net_sale,SUM(cancel_amount) as total_cancel FROM sales_intake WHERE agent_id = '".$agents['user_id']."' GROUP BY agent_id";
    $results = DB::Query($query);
    $net_cancels = 0;
    $gross_cancels = 0;
    foreach($results as $res){
        if($res['total_cancel'] != '0.00'){
            echo $res['total_cancel'];
            $net_cancels =$net_cancels + $res['total_cancel'];
            $gross_cancels++;
        }

    $html  .='<tr class="text-center">
        <td>'.$agents['first_name']." ".$agents['last_name'].'</td>
        <td>'.$res['gross_sale'].'</td>
        <td>'.$gross_cancels.'</td>
        <td>$'.number_format($res['net_sale']).'</td>
        <td>'.$res['gross_sale']+$gross_cancels.'</td>
        <td>'.$net_cancels.'</td>
        <td>$'.number_format($res['net_sale']-$res['total_cancel']).'</td>
        <!-- <td></td> -->
    </tr>';
}
    }
}
?>

<div class="main-content app-content mt-0">
    <div class="side-app">

    <!-- CONTAINER -->
        <div class="main-container container-fluid">
            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Manager Sales Summary Report</h1>
                <div>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Reports</a></li>
                        <li class="breadcrumb-item active">Sales Summary Report</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row">           
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Sales Summary Report</h3>
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
                            
                                    <!-- <div class="col-md-3">
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
                                    </div> -->
                                
                                <div class="col-md-3">
                                <div class="form-group">
                                <button class="w-100 btn btn-primary" id="" name="search" type="submit" value="search"> <span class="fa   fa-eye"></span> &nbsp;Search
                                </button>
                                    </div>
                                    </div>
                                </div>
                        </form>
                        <div class="table-responsive">
                            <?php 
                            if(isset($_REQUEST['search'])){
                                echo "<b>Search Query:</b>Start From:'".$_REQUEST['start_date']."' End Date:'".$_REQUEST['end_date']."'<p></p>";
                            }
                            ?>
                            <table class="table border text-nowrap text-md-nowrap table-striped mb-0">
                                <thead class="report-header">
                                    <tr class="text-center">
                                        <th>Agent Name</th>
                                        <th>Gross Sales</th>
                                        <th>Gross Cancels</th>
                                        <th>Net Sales</th>
                                        <th>Gross Units</th>
                                        <th>Net Cancels</th>
                                        <th>Net Units</th>
                                        <!-- <th>Dollar Average Per Month</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php echo $html; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>    