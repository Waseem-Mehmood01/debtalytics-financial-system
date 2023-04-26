
<?php 
$companySaleDetails = getNetRevenueByCompany($_SESSION['company_id']);
// print_r($companySaleDetails);
?>

<div class="main-content app-content mt-0">
                    <div class="side-app">

                        <!-- CONTAINER -->
                        <div class="main-container container-fluid">
                        <div class="row">
                        <div class="card-header">
                        <h4 class="card-title fw-semibold"><?php echo $_SESSION['company_name']; ?></h4>
                    </div>
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-center">
                                                <small class="text-muted">Total Deals</small>
                                                <h2 class="mb-2 mt-0"><?php echo $companySaleDetails['sales_count']; ?></h2>
                                                <div id="circle" class="mt-3 mb-3 chart-dropshadow-secondary"></div>
                                                <div class="chart-circle-value-3 text-secondary fs-20"><i class="icon icon-user-follow"></i></div>
                                                <!-- <p class="mb-0 text-start"><span class="dot-label bg-secondary me-2"></span>Monthly users <span class="float-end">60%</span></p> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- COL END -->
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="widget text-center">
                                                <small class="text-muted">Gross Sales</small>
                                                <h2 class="mb-2 mt-0">$<?php echo number_format($companySaleDetails['total_sale']); ?></h2>
                                                <div id="circle-1" class="mt-3 mb-3 chart-dropshadow-success"></div>
                                                <div class="chart-circle-value-3 text-success fs-20"><i class="icon icon-briefcase"></i></div>
                                                <!-- <p class="mb-0 text-start"><span class="dot-label bg-success me-2"></span>Monthly Income <span class="float-end">$5,863</span></p> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- COL END -->
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="widget text-center">
                                                <small class="text-muted">Total Cancels</small>
                                                <h2 class="mb-2 mt-0"><?php echo number_format($companySaleDetails['total_cancel_sale']); ?></h2>
                                                <div id="circle-2" class="mt-3 mb-3 chart-dropshadow-warning"></div>
                                                <div class="chart-circle-value-3 text-warning fs-20"><i class="icon icon-chart"></i></div>
                                                <!-- <p class="mb-0 text-start"><span class="dot-label bg-warning me-2"></span>Monthly Profit <span class="float-end">$9,234</span></p> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- COL END -->
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="widget text-center">
                                                <small class="text-muted">Total Sales</small>
                                                <h2 class="mb-2 mt-0">$<?php echo number_format($companySaleDetails['total_revenue']); ?></h2>
                                                <div id="circle-3" class="mt-3 mb-3 chart-dropshadow-danger"></div>
                                                <div class="chart-circle-value-3 text-danger fs-20"><i class="icon icon-basket"></i></div>
                                                <!-- <p class="mb-0 text-start"><span class="dot-label bg-danger me-2"></span>Monthly Sales <span class="float-end">$8,097</span></p> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- COL END -->
                            </div>

                            <div class="row">
                                <div class="cards">
                                    <div class="card-header">
                                        <h3 class="card-title">Monthly <?php echo $_SESSION['company_name']; ?> Deals</h3>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                    <div class="card bg-primary img-card box-primary-shadow">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="text-white">
                                                    <h2 class="mb-0 number-font"><?php echo get_total_sales_of_company_monthly($_SESSION['company_id']);?></h2>
                                                    <p class="text-white mb-0">Total Deals </p>
                                                </div>
                                                <div class="ms-auto"> <i class="fa fa-user-o text-white fs-30 me-2 mt-2"></i> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- COL END -->
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                    <div class="card bg-secondary img-card box-secondary-shadow">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="text-white">
                                                    <h2 class="mb-0 number-font">$ <?php echo number_format((int)get_total_amount_of_company_monthly($_SESSION['company_id'])); ?></h2>
                                                    <p class="text-white mb-0">Gross Sale</p>
                                                </div>
                                                <div class="ms-auto"> <i class="fa fa-heart-o text-white fs-30 me-2 mt-2"></i> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- COL END -->
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                    <div class="card  bg-success img-card box-success-shadow">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="text-white">
                                                    <h2 class="mb-0 number-font"><?php echo get_total_cancel_sales_of_company_monthly($_SESSION['company_id']); ?></h2>
                                                    <p class="text-white mb-0">Total Cancels</p>
                                                </div>
                                                <div class="ms-auto"> <i class="fa fa-comment-o text-white fs-30 me-2 mt-2"></i> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- COL END -->
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                    <div class="card bg-info img-card box-info-shadow">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="text-white">
                                                    <h2 class="mb-0 number-font">$ <?php echo number_format((int)get_total_amount_of_company($_SESSION['company_id'])); ?></h2>
                                                    <p class="text-white mb-0">This Month Net Profit</p>
                                                </div>
                                                <div class="ms-auto"> <i class="fa fa-envelope-o text-white fs-30 me-2 mt-2"></i> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- COL END -->
                            </div>




                            <div class="row">
                                <div class="cards">
                                    <div class="card-header">
                                        <h3 class="card-title">Daily <?php echo $_SESSION['company_name']; ?> Deals</h3>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6  col-xl-3">
                                    <div class="card widgets-cards bg-primary box-primary-shadow">
                                        <div class="card-body d-flex justify-content-center align-items-center">
                                            <div class="chart-circle chart-circle-sm ms-3 mt-1" data-value="0.62" data-thickness="6" data-bs-color="#3c5998">
                                                <div class="chart-circle-value text-white">0%</div>
                                            </div>
                                            <div class="wrp text-wrapper text-white p-3">
                                                <p class="mt-0"><?php echo getDailyAdminDeals($_SESSION['company_id']);?></p>
                                                <p class="mt-1 mb-0">Total Deals</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- COL END -->
                                <div class="col-sm-12 col-md-6 col-lg-6  col-xl-3">
                                    <div class="card widgets-cards bg-success box-success-shadow">
                                        <div class="card-body d-flex justify-content-center align-items-center">
                                            <div class="chart-circle chart-circle-sm ms-3 mt-1" data-value="0.37" data-thickness="6" data-bs-color="#0e8c79">
                                                <div class="chart-circle-value text-white">0%</div>
                                            </div>
                                            <div class="wrp text-wrapper text-white p-3">
                                                <p class="mt-0">$ <?php echo number_format((int)getDailyAdminGrossSale($_SESSION['company_id'])); ?></p>
                                                <p class=" mt-1 mb-0">Gross Profit</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- COL END -->
                                <div class="col-sm-12 col-md-6 col-lg-6  col-xl-3">
                                    <div class="card widgets-cards bg-warning box-warning-shadow">
                                        <div class="card-body d-flex justify-content-center align-items-center">
                                            <div class="chart-circle chart-circle-sm ms-3 mt-1" data-value="0.42" data-thickness="6" data-bs-color="#c68806">
                                                <div class="chart-circle-value text-white">0%</div>
                                            </div>
                                            <div class="wrp text-wrapper text-white p-3">
                                                <p class="mt-0"><?php echo getDailyAdminCancels($_SESSION['company_id']); ?></p>
                                                <p class=" mt-1 mb-0">Cancels</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- COL END -->
                                <div class="col-sm-12 col-md-6 col-lg-6  col-xl-3">
                                    <div class="card widgets-cards bg-danger box-danger-shadow">
                                        <div class="card-body d-flex justify-content-center align-items-center">
                                            <div class="chart-circle chart-circle-sm ms-3 mt-1" data-value="0.42" data-thickness="6" data-bs-color="#c21a1a">
                                                <div class="chart-circle-value text-white">0%</div>
                                            </div>
                                            <div class="wrp text-wrapper text-white p-3">
                                                <p class="mt-0">$ <?php echo number_format((int)getDailyAdminGrossSale($_SESSION['company_id'])); ?></p>
                                                <p class=" mt-1 mb-0">Daily Net Profit</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            

    <div class="row">
        <div class="col-xxl-12 col-md-12 col-xl-12">
             
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title fw-semibold"><?php echo $_SESSION['company_name']; ?> Agents Sales</h4>
                    </div>
                    <div class="card-body">
                        <div class="browser-stats">

                            <?php 
                           $query = "SELECT *,s.agent_id,concat(a.first_name,' ',a.last_name) AS agent_name,SUM(s.debt_amount) AS total_amount,a.user_id FROM sales_intake s JOIN admin_users a ON a.user_id = s.agent_id WHERE s.company_id = '".$_SESSION['company_id']."' AND status = 0 GROUP BY s.agent_id ORDER BY total_amount DESC";
                            $get_agent_data = DB::Query($query);
                            // print_r($get_agent_data);
                            $bgColors = array();
                            $bgColors = ['bg-primary','bg-secondary','bg-success','bg-danger','bg-warning','bg-info','bg-green'];
                            //print_r($bgColors);
                            $i = 0;
                            foreach($get_agent_data as $agents){
                                $i++;
                                // echo $currentDate = date('Y-m-d'); 
                                // if($agents['date_signed'] == $currentDate){

                                // }
                                $net_worth = get_net_worth();
                                $agent_sale_percentage = $agents['total_amount']/$net_worth*100;
                                //echo $agent_sale_percentage = $agent_sale_percentage*10;
                                $total_cancel = 0;
                                $total_cancel_amount = 0;
                                if($agents['cancel_amount'] == ''){
                                    $total_cancel ++;
                                    $total_cancel_amount = $agents['cancel_amount'];
                                }
                                if($agent_sale_percentage < 40){
                                    $icon = "fe-arrow-down";
                                    $text = "text-danger";
                                    $bg = "bg-danger";
                                }else{
                                    $icon = "fe-arrow-up";
                                    $text = "text-success";
                                    $bg = "bg-success";
                                }
                                $currentDateSales = array();
                                $currentDateSales = getAgentCurrentDateRevenue($agents['agent_id']);
                                // print_r($currentDateSales);
                                ?>
                                <div class="row mb-4 agent_sales" >
                                    <div class="col-sm-2 col-lg-3 col-xl-3 col-xxl-2 mb-sm-0 mb-3 text-center">
                                        <img src="<?php echo getUserdetails($agents['user_id']); ?>" style="height:60%;width:60%;padding:0" class="rounded img-fluid"
                                            alt="img">
                                    </div>
                                    <div class="col-sm-10 col-lg-9 col-xl-9 col-xxl-10 ps-sm-0">
                                        <div class="d-flex align-items-end justify-content-between mb-1">
                                            <h6 class="mb-1"><b><?php echo $agents['agent_name'];?> 
                                            <span class="badge rounded-pill bg-primary badge-sm me-1 mb-1 mt-1">Net Revenue: $ <?php echo number_format($agents['total_amount']-$agents['cancel_amount']);?></span>
                                            <span class="badge rounded-pill bg-primary badge-sm me-1 mb-1 mt-1">Net Deals: <?php echo get_total_sales_of_agents($agents['agent_id']); ?></span>
                                            <span class="badge rounded-pill bg-primary badge-sm me-1 mb-1 mt-1">Today Net Revenue: $<?php echo (empty($currentDateSales)) ? 0 : number_format($currentDateSales[0]['total_amount']);?></span>
                                            <span class="badge rounded-pill bg-primary badge-sm me-1 mb-1 mt-1">Today Net Deals: <?php echo (empty($currentDateSales)) ? 0 : $currentDateSales[0]['today_deals'];?></span>
                                            <span class="badge rounded-pill bg-primary badge-sm me-1 mb-1 mt-1">Canceled Revenue : <?php echo $total_cancel; ?></span>
                                            <span class="badge rounded-pill bg-primary badge-sm me-1 mb-1 mt-1">Canceled Deals: <?php echo $total_cancel_amount; ?></span>
                                        
                                        </b></h6>
                                            <!-- <h6 class="fw-semibold mb-1"><span class="badge rounded-pill bg-success badge-sm me-1 mb-1 mt-1">$ <?php echo number_format($agents['total_amount']);?></span> </h6> -->
                                            
                                            <!-- <span class="'.$text.' fs-11">(<i class="fe <?php echo $icon;?>"></i><?php echo round($agent_sale_percentage);?>%)</span> -->
                                        </div>
                                        <div class="progress h-2 mb-3">
                                            <div class="progress-bar <?php echo $bgColors[$i];?>" style="width: <?php echo $agent_sale_percentage;?>%;"role="progressbar"></div>
                                        </div>
                                        <!-- <div class="todayDeals">
                                            <button type="button" class="btn btn-primary mt-1 mb-1 me-3" fdprocessedid="ex7d">
                                                <span>Today Revenue</span>
                                                <span class="badge bg-white text-primary ms-2">$<?php echo (empty($currentDateSales)) ? 0 : number_format($currentDateSales[0]['total_amount']);?></span>
                                            </button>
                                            <button type="button" class="btn btn-secondary mt-1 mb-1 me-3" fdprocessedid="ex7d">
                                                <span>Today Total Deals</span>
                                                <span class="badge bg-white text-primary ms-2"><?php echo (empty($currentDateSales)) ? 0 : $currentDateSales[0]['today_deals'];?></span>
                                            </button>
                                            <button type="button" class="btn btn-info mt-1 mb-1 me-3" fdprocessedid="ex7d">
                                                <span>Today Max Deal</span>
                                                <span class="badge bg-white text-primary ms-2">$<?php echo (empty($currentDateSales)) ? 0 : number_format($currentDateSales[0]['max_sale']);?></span>
                                            </button>
                                            <button type="button" class="btn btn-warning mt-1 mb-1 me-3" fdprocessedid="ex7d">
                                                <span>Today Min Deal</span>
                                                <span class="badge bg-white text-primary ms-2">$<?php echo (empty($currentDateSales)) ? 0 : number_format($currentDateSales[0]['min_sale']);?></span>
                                            </button>
                                            <button type="button" class="btn btn-danger mt-1 mb-1 me-3" fdprocessedid="ex7d">
                                                <span>Today Cancels</span>
                                                <span class="badge bg-white text-primary ms-2"><?php echo (empty($currentDateSales)) ? 0 : number_format($currentDateSales['total_cancels']);?></span>
                                            </button>
                                            <button type="button" class="btn btn-danger mt-1 mb-1 me-3" fdprocessedid="ex7d">
                                                <span>Today Cancels Amount</span>
                                                <span class="badge bg-white text-primary ms-2"><?php echo (empty($currentDateSales)) ? 0 : number_format($currentDateSales['total_cancel_sale']);?></span>
                                            </button>
                                            
                                        </div> -->
                                    </div>
                                </div>
                                
                            <?php }?>

                        </div>
                    </div>
                </div>
           
        </div>

    </div>
    </div>
           
        </div>

    </div>