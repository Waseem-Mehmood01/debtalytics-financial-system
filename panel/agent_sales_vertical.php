<?php
    $companySaleDetails = getNetRevenueByCompany($_SESSION['company_id']);
    // print_r($companySaleDetails);
?>

<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">
            <div class="row">
                <div class="col-xxl-12 col-md-12 col-xl-12">
                    <div class="row row-cards">
                        <div class="col-sm-6 col-md-6 col-lg-6">

                            <div class="card">
                                <div class="row">
                                    <div class="col-2">
                                        <div class="card-img-absolute circle-icon bg-danger align-items-center text-center box-danger-shadow bradius">
                                            <img src="assets/images/svgs/circle.svg" alt="img"
                                                 class="card-img-absolute"> <i
                                                    class=" lnr lnr-cart fs-30 text-white mt-4"></i></div>
                                    </div>
                                    <div class="col-10">
                                        <div class="card-body p-4 text-center"><h4
                                                    class="text-dark mb-2 number-font mt-2"><?php echo number_format((int)getMonthlyAdminDeals($_SESSION['company_id'])); ?></h4>
                                            <h4 class="fw-normal mb-0 text-uppercase text-dark">Today's Net
                                                Revenue</h4></div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="card">
                                <div class="card-body text-center">


                                    <div class="p-2">
                                       
                                        <span class="text-secondary h4"><i class="bi bi-calendar-day"
                                                                           id="currentDay"></i></span>
                                        <span id="counter" class="h4 "></span>
                                    </div>
                                    <!--<span class="badge bg-secondary fs-14 me-2" id="hurry"></span>
                                    <span id="remainingDays" style="color:white"></span>-->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-12 col-md-12 col-xl-12">
                    <div class="card overflow-hidden">
                        <div class="card-body text-center"><h4 class="text-uppercase text-dark">Net Revenue</h4>
                            <h4 class="text-dark mt-0 mb-3 number-font"><?php echo number_format($companySaleDetails['total_sale']); ?></h4>
                            <div class="progress h-1 mt-0 mb-2">
                                <div class="progress-bar progress-bar-striped  bg-secondary" style="width: 50%;"
                                     role="progressbar"></div>
                            </div>
                            <div class="row mt-4">
                                <div class="col text-center"><h4 class="text-dark text-uppercase">Net Deals</h4>
                                    <h4
                                            class="fw-normal mt-2 mb-0 number-font1"><?php echo $companySaleDetails['sales_count']; ?></h4>
                                </div>
                                <div class="col text-center"><h4 class="text-dark text-uppercase">Canceled
                                        Revenue</h4>
                                    <h4
                                            class="fw-normal mt-2 mb-0 number-font1"><?php echo number_format($companySaleDetails['total_cancel_sale']); ?></h4>
                                </div>
                                <div class="col text-center"><h4 class="text-dark text-uppercase">Canceled
                                        Deals</h4>
                                    <h4 class="fw-normal mt-2 mb-0 number-font1"><?php echo $companySaleDetails['total_cancels']; ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-12 col-md-12 col-xl-12">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title fw-semibold"><?php echo $_SESSION['company_name']; ?> Agents
                                Sales</h4>
                        </div>
                        <div class="card-body">
                            <div class="browser-stats">

                                <?php
                                    $query = "SELECT *,s.agent_id,concat(a.first_name,' ',a.last_name) AS agent_name,SUM(s.debt_amount) AS total_amount,a.user_id FROM sales_intake s JOIN admin_users a ON a.user_id = s.agent_id WHERE s.company_id = '" . $_SESSION['company_id'] . "' AND status = 0 GROUP BY s.agent_id ORDER BY total_amount DESC";
                                    $get_agent_data = DB::Query($query);
                                    // print_r($get_agent_data);
                                    $bgColors = array();
                                    $bgColors = ['bg-primary', 'bg-secondary', 'bg-success', 'bg-danger', 'bg-warning', 'bg-info', 'bg-green'];
                                    //print_r($bgColors);
                                    $i = 0;
                                    foreach ($get_agent_data as $agents){
                                        $i++;
                                        // echo $currentDate = date('Y-m-d');
                                        // if($agents['date_signed'] == $currentDate){

                                        // }
                                        $net_worth = get_net_worth();
                                        $agent_sale_percentage = $agents['total_amount'] / $net_worth * 100;
                                        // $agent_sale_percentage = $agent_sale_percentage*10;
                                        if ($agent_sale_percentage < 40){
                                            $icon = "fe-arrow-down";
                                            $text = "text-danger";
                                            $bg = "bg-danger";
                                        } else{
                                            $icon = "fe-arrow-up";
                                            $text = "text-success";
                                            $bg = "bg-success";
                                        }
                                        $currentDateSales = array();
                                        $currentDateSales = getAgentCurrentDateRevenue($agents['agent_id'], $agents['date_signed']);
                                        // print_r($currentDateSales);
                                        ?>
                                        <div class="row mb-4 agent_sales">
                                            <div class="col-sm-2 col-lg-3 col-xl-3 col-xxl-2 mb-sm-0 mb-3 text-center">
                                                <img src="<?php echo getUserdetails($agents['user_id']); ?>"
                                                     style="height:60%;width:60%;padding:0"
                                                     class="rounded img-fluid"
                                                     alt="img">
                                            </div>
                                            <div class="col-sm-10 col-lg-9 col-xl-9 col-xxl-10 ps-sm-0">
                                                <div class="d-flex align-items-end justify-content-between mb-1">
                                                    <h5 class="mb-1"><b><?php echo $agents['agent_name']; ?>
                                                            <span
                                                                    class="badge rounded-pill bg-primary badge-sm me-1 mb-1 mt-1 text-white me-1 h6">Total Deals: <?php echo get_total_sales_of_agents($agents['agent_id']); ?></span>
                                                        </b>&nbsp;<span
                                                                class="rounded-pill badge '.$bg.' ms-3 px-2 pb-1 mb-1"><?php echo get_total_sales_of_agents($agents['user_id']); ?></span>
                                                    </h5>
                                                    <h6 class="fw-semibold mb-1"><span
                                                                class="badge rounded-pill bg-success badge-sm text-white me-1 h5 mb-1 mt-1">$ <?php echo number_format($agents['total_amount']); ?></span>
                                                    </h6>
                                                    <!-- <span class="'.$text.' fs-11">(<i class="fe <?php echo $icon; ?>"></i><?php echo round($agent_sale_percentage); ?>%)</span> -->
                                                </div>
                                                <div class="progress h-2 mb-3">
                                                    <div class="progress-bar <?php echo $bgColors[$i]; ?>"
                                                         style="width: <?php echo $agent_sale_percentage; ?>%;"
                                                         role="progressbar"></div>
                                                </div>
                                                <!-- <div class="todayDeals">
                                            <button type="button" class="btn btn-primary mt-1 mb-1 me-3" fdprocessedid="ex7d">
                                                <span>Today Revenue</span>
                                                <span class="badge bg-white text-primary ms-2">$<?php echo (empty($currentDateSales)) ? 0 : number_format($currentDateSales[0]['total_amount']); ?></span>
                                            </button>
                                            <button type="button" class="btn btn-secondary mt-1 mb-1 me-3" fdprocessedid="ex7d">
                                                <span>Today Total Deals</span>
                                                <span class="badge bg-white text-primary ms-2"><?php echo (empty($currentDateSales)) ? 0 : $currentDateSales[0]['today_deals']; ?></span>
                                            </button>
                                            <button type="button" class="btn btn-info mt-1 mb-1 me-3" fdprocessedid="ex7d">
                                                <span>Today Max Deal</span>
                                                <span class="badge bg-white text-primary ms-2">$<?php echo (empty($currentDateSales)) ? 0 : number_format($currentDateSales[0]['max_sale']); ?></span>
                                            </button>
                                            <button type="button" class="btn btn-warning mt-1 mb-1 me-3" fdprocessedid="ex7d">
                                                <span>Today Min Deal</span>
                                                <span class="badge bg-white text-primary ms-2">$<?php echo (empty($currentDateSales)) ? 0 : number_format($currentDateSales[0]['min_sale']); ?></span>
                                            </button>
                                            <button type="button" class="btn btn-danger mt-1 mb-1 me-3" fdprocessedid="ex7d">
                                                <span>Today Cancels</span>
                                                <span class="badge bg-white text-primary ms-2"><?php echo (empty($currentDateSales)) ? 0 : number_format($currentDateSales['total_cancels']); ?></span>
                                            </button>
                                            <button type="button" class="btn btn-danger mt-1 mb-1 me-3" fdprocessedid="ex7d">
                                                <span>Today Cancels Amount</span>
                                                <span class="badge bg-white text-primary ms-2"><?php echo (empty($currentDateSales)) ? 0 : number_format($currentDateSales['total_cancel_sale']); ?></span>
                                            </button>
                                            
                                        </div> -->
                                            </div>
                                        </div>

                                    <?php } ?>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>

</div>