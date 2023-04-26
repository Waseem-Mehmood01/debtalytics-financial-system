<?php 
$allAmount = DB::Query("SELECT SUM(debt_amount) AS all_amount,COUNT(sale_id) AS total_deals FROM sales_intake WHERE status = 0 ");
$query = "SELECT SUM(debt_amount) AS total_amount,COUNT(sale_id) AS total_deals FROM sales_intake WHERE agent_id = '".$_SESSION['user_id']."' AND status = 0 ";
$results = DB::Query($query);
?>
<div class="main-container container-fluid">
    <div class="row">
        <!-- COL-END -->
  



                            

                                <div class="col-md-12 col-xl-6 col-xxl-12 ">
                                     <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                Estimated Achivement
                                            </h3>
                                        </div>
                                        <div class="row row-cards my-5 mx-5">
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                    <div class="card text-primary bg-primary-transparent card-transparent">
                                        <div class="card-header pb-0 border-bottom-0">
                                            <h3 class="card-title">Deals</h3>
                                            <div class="card-options">
                                                <a class="btn btn-sm btn-primary" href="javascript:void(0)"><i class="fa fa-bar-chart mb-0"></i></a>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0 ">
                                            <h3 class="d-inline-block mb-2"><?php echo $results[0]['total_deals']; ?></h3>
                                            <div class="progress h-2 mt-2 mb-2">
                                                <div class="progress-bar bg-primary" style="width: 50%;" role="progressbar"></div>
                                            </div>
                                            <div class="float-start">
                                                <div class="mt-2">
                                                    <!-- <i class="fa fa-caret-up text-success"></i> -->
                                                    <!-- <span>12% increase</span> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- COL END -->
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                    <div class="card text-secondary bg-secondary-transparent card-transparent">
                                        <div class="card-header pb-0 border-bottom-0">
                                            <h3 class="card-title">Volumn</h3>
                                            <div class="card-options">
                                                <a class="btn btn-sm btn-success" href="javascript:void(0)"><i class="fa fa-send-o mb-0"></i></a>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">
                                            <h3 class="d-inline-block mb-2">$<?php echo number_format($results[0]['total_amount']); ?></h3>
                                            <div class="progress h-2 mt-2 mb-2">
                                                <div class="progress-bar bg-success" style="width: 50%;" role="progressbar"></div>
                                            </div>
                                            <div class="float-start">
                                                <div class="mt-2">
                                                    <!-- <i class="fa fa-caret-down text-success"></i> -->
                                                    <!-- <span>5% decrease</span> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- COL END -->
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                    <div class="card text-warning bg-warning-transparent card-transparent">
                                        <div class="card-header pb-0 border-bottom-0">
                                            <h3 class="card-title">Percentage</h3>
                                            <div class="card-options">
                                                <a class="btn btn-sm btn-warning" href="javascript:void(0)"><i class="fa fa-mail-reply mb-0"></i></a>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">
                                            <h3 class="d-inline-block mb-2"><?php echo number_format($results[0]['total_amount']/$allAmount[0]['all_amount']*100); ?>%</h3>
                                            <div class="progress h-2 mt-2 mb-2">
                                                <div class="progress-bar bg-warning" style="width: 50%;" role="progressbar"></div>
                                            </div>
                                            <div class="float-start">
                                                <div class="mt-2">
                                                    <!-- <i class="fa fa-caret-up text-warning"></i> -->
                                                    <!-- <span>10% increase</span> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- COL END -->
                                <!-- <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                    <div class="card">
                                        <div class="card-header pb-0 border-bottom-0">
                                            <h3 class="card-title">Support Cost</h3>
                                            <div class="card-options">
                                                <a class="btn btn-sm btn-danger" href="javascript:void(0)"><i class="fa fa-money mb-0"></i></a>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">
                                            <h3 class="d-inline-block mb-2">14,563</h3>
                                            <div class="progress h-2 mt-2 mb-2">
                                                <div class="progress-bar bg-danger" style="width: 50%;" role="progressbar"></div>
                                            </div>
                                            <div class="float-start">
                                                <div class="mt-2">
                                                    <i class="fa fa-caret-down text-danger"></i> -->
                                                    <!-- <span>15% decrease</span> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- COL END -->
                            </div>
                                        <div class="card-body mx-auto">
                                        <!-- <table class="table border text-nowrap text-md-nowrap mb-0">
                                                        <thead class="table-primary">
                                                            <tr>
                                                                <th>Deals</th>
                                                                <th>Volumn</th>
                                                                <th>Percentage</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                            $start = 0;
                                                            $end = 5;
                                                            for ($x = 0; $x <= 10; $x++) {
                                                                
                                                            $query = "SELECT SUM(debt_amount) AS total_amount FROM sales_intake WHERE agent_id = '".$_SESSION['user_id']."' AND status = 0 limit $start,$end";
                                                            $results = DB::Query($query);
                                                            if(empty($results)){
                                                                break;    
                                                            }
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $start.'-'.$end; ?></td>
                                                                <td>$<?php echo number_format((int)$results[0]['total_amount']); ?></td>
                                                                <td>0.50%</td>
                                                            </tr>
                                                            <?php 
                                                                $start = $start+6;
                                                                $end = $start+6;
                                                               
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table> -->
                                        </div>
                                    </div>
                                </div>
                                <!-- COL-END -->

                               







                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Deals Status</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="panel panel-primary">
                                                <div class="tab-menu-heading">
                                                    <div class="tabs-menu">
                                                        <!-- Tabs -->
                                                        <ul class="nav panel-tabs panel-secondary">
                                                            <li><a href="#daily" class="<?php if(isset($_POST['searchSubmit'])){ echo "";}else{echo "active";} ?>" data-bs-toggle="tab"><span><i class="fe fe-user me-1"></i></span>Daily</a></li>
                                                            <li><a href="#weekly" data-bs-toggle="tab"><span><i class="fe fe-calendar me-1"></i></span>Weekly</a></li>
                                                            <li><a href="#monthly" data-bs-toggle="tab"><span><i class="fe fe-clock me-1"></i></span>Current Month</a></li>
                                                            <li><a href="#totals" data-bs-toggle="tab"><span><i class="fe fe-settings me-1"></i></span>Totals</a></li>
                                                            <li><a href="#search" class="<?php if(isset($_POST['searchSubmit'])){ echo "active";}else{echo "";} ?>" data-bs-toggle="tab"><span><i class="fe fe-eye me-1"></i></span>Search Monthly</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="panel-body tabs-menu-body">
                                                    <div class="tab-content">
                                                        <div class="tab-pane <?php if(isset($_POST['searchSubmit'])){ echo "";}else{echo "active";} ?>" id="daily">
                                                            <div class="row">
                                                                <div class="col-md-12 col-lg-4 col-xl-4">
                                                                    <div class="card">
                                                                        
                                                                        <div class="card-body text-center">
                                                                            <div class="counter-icon bg-secondary-gradient box-shadow-secondary num-counter mx-auto"> <svg style="width:27px;height:27px" viewBox="0 0 24 24">
                                                                                <path fill="#fff" d="M16,14H17.5V16.82L19.94,18.23L19.19,19.53L16,17.69V14M17,12A5,5 0 0,0 12,17A5,5 0 0,0 17,22A5,5 0 0,0 22,17A5,5 0 0,0 17,12M17,10A7,7 0 0,1 24,17A7,7 0 0,1 17,24C14.21,24 11.8,22.36 10.67,20H1V17C1,14.34 6.33,13 9,13C9.6,13 10.34,13.07 11.12,13.2C12.36,11.28 14.53,10 17,10M10,17C10,16.3 10.1,15.62 10.29,15C9.87,14.93 9.43,14.9 9,14.9C6.03,14.9 2.9,16.36 2.9,17V18.1H10.09C10.03,17.74 10,17.37 10,17M9,4A4,4 0 0,1 13,8A4,4 0 0,1 9,12A4,4 0 0,1 5,8A4,4 0 0,1 9,4M9,5.9A2.1,2.1 0 0,0 6.9,8A2.1,2.1 0 0,0 9,10.1A2.1,2.1 0 0,0 11.1,8A2.1,2.1 0 0,0 9,5.9Z" />
                                                                            </svg> </div>
                                                                            <h5>Total Deals</h5>
                                                                            <h2 class="counter"><?php echo getDailyAgentDeals($_SESSION['user_id']);?></h2>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- COL-END -->
                                                                <div class="col-md-12 col-lg-4 col-xl-4">
                                                                    <div class="card">
                                                                        
                                                                        <div class="card-body text-center">
                                                                            <div class="counter-icon bg-primary-gradient box-shadow-primary num-counter mx-auto"> <svg style="width:25px;height:25px" viewBox="0 0 24 24">
                                                                                <path fill="#fff" d="M21 11.11V7A2 2 0 0 0 20.42 5.59A1.87 1.87 0 0 0 19 5H15V3A1.9 1.9 0 0 0 14.42 1.58A1.9 1.9 0 0 0 13 1H9A1.9 1.9 0 0 0 7.58 1.58A1.9 1.9 0 0 0 7 3V5H3A1.87 1.87 0 0 0 1.58 5.59A2 2 0 0 0 1 7V18A2 2 0 0 0 1.58 19.41A1.87 1.87 0 0 0 3 20H10.26A7 7 0 1 0 21 11.11M9 3H13V5H9M3 18V7H19V9.68A6.84 6.84 0 0 0 16 9A7 7 0 0 0 9 16A6.91 6.91 0 0 0 9.29 18M19 20A5 5 0 0 1 13 20A4.94 4.94 0 0 1 11 16A5 5 0 0 1 16 11A4.94 4.94 0 0 1 19 12A5 5 0 0 1 19 20M15 13H16.5V15.82L18.94 17.23L18.19 18.53L15 16.69V13" />
                                                                            </svg></div>
                                                                            <h5>Gross Sales</h5>
                                                                            <h2 class="counter">$ <?php echo number_format((int)getDailyAgentGrossSale($_SESSION['user_id'])); ?></h2>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- COL-END -->
                                                                <div class="col-md-12 col-lg-4 col-xl-4">
                                                                    <div class="card">
                                                                        
                                                                        <div class="card-body text-center">
                                                                            <div class="counter-icon bg-danger-gradient box-shadow-danger num-counter mx-auto"> <svg style="width:25px;height:25px" viewBox="0 0 24 24">
                                                                                <path fill="#fff" d="M11 7V13L16.2 16.1L17 14.9L12.5 12.2V7H11M20 12V18H22V12H20M20 20V22H22V20H20M18 20C16.3 21.3 14.3 22 12 22C6.5 22 2 17.5 2 12S6.5 2 12 2C16.8 2 20.9 5.4 21.8 10H19.7C18.8 6.6 15.7 4 12 4C7.6 4 4 7.6 4 12S7.6 20 12 20C14.4 20 16.5 18.9 18 17.3V20Z" />
                                                                            </svg> </div>
                                                                            <h5>Cancels</h5>
                                                                            <h2 class="counter"><?php echo getDailyAgentCancels($_SESSION['user_id']); ?></h2>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>    
                                                        </div>
                                                        <div class="tab-pane" id="weekly">
                                                            <div class="row">
                                                                <div class="col-md-12 col-lg-4 col-xl-4">
                                                                    <div class="card">
                                                                       
                                                                        <div class="card-body text-center">
                                                                            <div class="counter-icon bg-secondary-gradient box-shadow-secondary num-counter mx-auto"> <svg style="width:27px;height:27px" viewBox="0 0 24 24">
                                                                                <path fill="#fff" d="M16,14H17.5V16.82L19.94,18.23L19.19,19.53L16,17.69V14M17,12A5,5 0 0,0 12,17A5,5 0 0,0 17,22A5,5 0 0,0 22,17A5,5 0 0,0 17,12M17,10A7,7 0 0,1 24,17A7,7 0 0,1 17,24C14.21,24 11.8,22.36 10.67,20H1V17C1,14.34 6.33,13 9,13C9.6,13 10.34,13.07 11.12,13.2C12.36,11.28 14.53,10 17,10M10,17C10,16.3 10.1,15.62 10.29,15C9.87,14.93 9.43,14.9 9,14.9C6.03,14.9 2.9,16.36 2.9,17V18.1H10.09C10.03,17.74 10,17.37 10,17M9,4A4,4 0 0,1 13,8A4,4 0 0,1 9,12A4,4 0 0,1 5,8A4,4 0 0,1 9,4M9,5.9A2.1,2.1 0 0,0 6.9,8A2.1,2.1 0 0,0 9,10.1A2.1,2.1 0 0,0 11.1,8A2.1,2.1 0 0,0 9,5.9Z" />
                                                                            </svg> </div>
                                                                            <h5>Total Deals</h5>
                                                                            <h2 class="counter"><?php echo getWeeklyAgentDeals($_SESSION['user_id']);?></h2>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- COL-END -->
                                                                <div class="col-md-12 col-lg-4 col-xl-4">
                                                                    <div class="card">
                                                                        
                                                                        <div class="card-body text-center">
                                                                            <div class="counter-icon bg-primary-gradient box-shadow-primary num-counter mx-auto"> <svg style="width:25px;height:25px" viewBox="0 0 24 24">
                                                                                <path fill="#fff" d="M21 11.11V7A2 2 0 0 0 20.42 5.59A1.87 1.87 0 0 0 19 5H15V3A1.9 1.9 0 0 0 14.42 1.58A1.9 1.9 0 0 0 13 1H9A1.9 1.9 0 0 0 7.58 1.58A1.9 1.9 0 0 0 7 3V5H3A1.87 1.87 0 0 0 1.58 5.59A2 2 0 0 0 1 7V18A2 2 0 0 0 1.58 19.41A1.87 1.87 0 0 0 3 20H10.26A7 7 0 1 0 21 11.11M9 3H13V5H9M3 18V7H19V9.68A6.84 6.84 0 0 0 16 9A7 7 0 0 0 9 16A6.91 6.91 0 0 0 9.29 18M19 20A5 5 0 0 1 13 20A4.94 4.94 0 0 1 11 16A5 5 0 0 1 16 11A4.94 4.94 0 0 1 19 12A5 5 0 0 1 19 20M15 13H16.5V15.82L18.94 17.23L18.19 18.53L15 16.69V13" />
                                                                            </svg></div>
                                                                            <h5>Gross Sales</h5>
                                                                            <h2 class="counter">$ <?php echo number_format((int)getWeeklyAgentGrossSale($_SESSION['user_id'])); ?></h2>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- COL-END -->
                                                                <div class="col-md-12 col-lg-4 col-xl-4">
                                                                    <div class="card">
                                                                       
                                                                        <div class="card-body text-center">
                                                                            <div class="counter-icon bg-danger-gradient box-shadow-danger num-counter mx-auto"> <svg style="width:25px;height:25px" viewBox="0 0 24 24">
                                                                                <path fill="#fff" d="M11 7V13L16.2 16.1L17 14.9L12.5 12.2V7H11M20 12V18H22V12H20M20 20V22H22V20H20M18 20C16.3 21.3 14.3 22 12 22C6.5 22 2 17.5 2 12S6.5 2 12 2C16.8 2 20.9 5.4 21.8 10H19.7C18.8 6.6 15.7 4 12 4C7.6 4 4 7.6 4 12S7.6 20 12 20C14.4 20 16.5 18.9 18 17.3V20Z" />
                                                                            </svg> </div>
                                                                            <h5>Cancels</h5>
                                                                            <h2 class="counter"><?php echo getWeeklyAgentCancels($_SESSION['user_id']); ?></h2>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="monthly">
                                                            <div class="row">
                                                                <div class="col-md-12 col-lg-4 col-xl-4">
                                                                    <div class="card">
                                                                        
                                                                        <div class="card-body text-center">
                                                                            <div class="counter-icon bg-secondary-gradient box-shadow-secondary num-counter mx-auto"> <svg style="width:27px;height:27px" viewBox="0 0 24 24">
                                                                                <path fill="#fff" d="M16,14H17.5V16.82L19.94,18.23L19.19,19.53L16,17.69V14M17,12A5,5 0 0,0 12,17A5,5 0 0,0 17,22A5,5 0 0,0 22,17A5,5 0 0,0 17,12M17,10A7,7 0 0,1 24,17A7,7 0 0,1 17,24C14.21,24 11.8,22.36 10.67,20H1V17C1,14.34 6.33,13 9,13C9.6,13 10.34,13.07 11.12,13.2C12.36,11.28 14.53,10 17,10M10,17C10,16.3 10.1,15.62 10.29,15C9.87,14.93 9.43,14.9 9,14.9C6.03,14.9 2.9,16.36 2.9,17V18.1H10.09C10.03,17.74 10,17.37 10,17M9,4A4,4 0 0,1 13,8A4,4 0 0,1 9,12A4,4 0 0,1 5,8A4,4 0 0,1 9,4M9,5.9A2.1,2.1 0 0,0 6.9,8A2.1,2.1 0 0,0 9,10.1A2.1,2.1 0 0,0 11.1,8A2.1,2.1 0 0,0 9,5.9Z" />
                                                                            </svg> </div>
                                                                            <h5>Total Deals</h5>
                                                                            <h2 class="counter"><?php echo getMonthlyAgentDeals($_SESSION['user_id']);?></h2>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- COL-END -->
                                                                <div class="col-md-12 col-lg-4 col-xl-4">
                                                                    <div class="card">
                                                                        
                                                                        <div class="card-body text-center">
                                                                            <div class="counter-icon bg-primary-gradient box-shadow-primary num-counter mx-auto"> <svg style="width:25px;height:25px" viewBox="0 0 24 24">
                                                                                <path fill="#fff" d="M21 11.11V7A2 2 0 0 0 20.42 5.59A1.87 1.87 0 0 0 19 5H15V3A1.9 1.9 0 0 0 14.42 1.58A1.9 1.9 0 0 0 13 1H9A1.9 1.9 0 0 0 7.58 1.58A1.9 1.9 0 0 0 7 3V5H3A1.87 1.87 0 0 0 1.58 5.59A2 2 0 0 0 1 7V18A2 2 0 0 0 1.58 19.41A1.87 1.87 0 0 0 3 20H10.26A7 7 0 1 0 21 11.11M9 3H13V5H9M3 18V7H19V9.68A6.84 6.84 0 0 0 16 9A7 7 0 0 0 9 16A6.91 6.91 0 0 0 9.29 18M19 20A5 5 0 0 1 13 20A4.94 4.94 0 0 1 11 16A5 5 0 0 1 16 11A4.94 4.94 0 0 1 19 12A5 5 0 0 1 19 20M15 13H16.5V15.82L18.94 17.23L18.19 18.53L15 16.69V13" />
                                                                            </svg></div>
                                                                            <h5>Gross Sales</h5>
                                                                            <h2 class="counter">$ <?php echo number_format((int)get_total_amount_of_agents($_SESSION['user_id'])); ?></h2>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- COL-END -->
                                                                <div class="col-md-12 col-lg-4 col-xl-4">
                                                                    <div class="card">
                                                                       
                                                                        <div class="card-body text-center">
                                                                            <div class="counter-icon bg-danger-gradient box-shadow-danger num-counter mx-auto"> <svg style="width:25px;height:25px" viewBox="0 0 24 24">
                                                                                <path fill="#fff" d="M11 7V13L16.2 16.1L17 14.9L12.5 12.2V7H11M20 12V18H22V12H20M20 20V22H22V20H20M18 20C16.3 21.3 14.3 22 12 22C6.5 22 2 17.5 2 12S6.5 2 12 2C16.8 2 20.9 5.4 21.8 10H19.7C18.8 6.6 15.7 4 12 4C7.6 4 4 7.6 4 12S7.6 20 12 20C14.4 20 16.5 18.9 18 17.3V20Z" />
                                                                            </svg> </div>
                                                                            <h5>Cancels</h5>
                                                                            <h2 class="counter"><?php echo get_total_cancel_sales_of_agents($_SESSION['user_id']); ?></h2>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="totals">
                                                            <div class="row">
                                                                <div class="col-md-12 col-lg-4 col-xl-4">
                                                                    <div class="card">
                                                                        
                                                                        <div class="card-body text-center">
                                                                            <div class="counter-icon bg-secondary-gradient box-shadow-secondary num-counter mx-auto"> <svg style="width:27px;height:27px" viewBox="0 0 24 24">
                                                                                <path fill="#fff" d="M16,14H17.5V16.82L19.94,18.23L19.19,19.53L16,17.69V14M17,12A5,5 0 0,0 12,17A5,5 0 0,0 17,22A5,5 0 0,0 22,17A5,5 0 0,0 17,12M17,10A7,7 0 0,1 24,17A7,7 0 0,1 17,24C14.21,24 11.8,22.36 10.67,20H1V17C1,14.34 6.33,13 9,13C9.6,13 10.34,13.07 11.12,13.2C12.36,11.28 14.53,10 17,10M10,17C10,16.3 10.1,15.62 10.29,15C9.87,14.93 9.43,14.9 9,14.9C6.03,14.9 2.9,16.36 2.9,17V18.1H10.09C10.03,17.74 10,17.37 10,17M9,4A4,4 0 0,1 13,8A4,4 0 0,1 9,12A4,4 0 0,1 5,8A4,4 0 0,1 9,4M9,5.9A2.1,2.1 0 0,0 6.9,8A2.1,2.1 0 0,0 9,10.1A2.1,2.1 0 0,0 11.1,8A2.1,2.1 0 0,0 9,5.9Z" />
                                                                            </svg> </div>
                                                                            <h5>Total Deals</h5>
                                                                            <h2 class="counter"><?php echo get_total_sales_of_agents($_SESSION['user_id']);?></h2>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- COL-END -->
                                                                <div class="col-md-12 col-lg-4 col-xl-4">
                                                                    <div class="card">
                                                                        
                                                                        <div class="card-body text-center">
                                                                            <div class="counter-icon bg-primary-gradient box-shadow-primary num-counter mx-auto"> <svg style="width:25px;height:25px" viewBox="0 0 24 24">
                                                                                <path fill="#fff" d="M21 11.11V7A2 2 0 0 0 20.42 5.59A1.87 1.87 0 0 0 19 5H15V3A1.9 1.9 0 0 0 14.42 1.58A1.9 1.9 0 0 0 13 1H9A1.9 1.9 0 0 0 7.58 1.58A1.9 1.9 0 0 0 7 3V5H3A1.87 1.87 0 0 0 1.58 5.59A2 2 0 0 0 1 7V18A2 2 0 0 0 1.58 19.41A1.87 1.87 0 0 0 3 20H10.26A7 7 0 1 0 21 11.11M9 3H13V5H9M3 18V7H19V9.68A6.84 6.84 0 0 0 16 9A7 7 0 0 0 9 16A6.91 6.91 0 0 0 9.29 18M19 20A5 5 0 0 1 13 20A4.94 4.94 0 0 1 11 16A5 5 0 0 1 16 11A4.94 4.94 0 0 1 19 12A5 5 0 0 1 19 20M15 13H16.5V15.82L18.94 17.23L18.19 18.53L15 16.69V13" />
                                                                            </svg></div>
                                                                            <h5>Gross Sales</h5>
                                                                            <h2 class="counter">$ <?php echo number_format((int)get_total_amount_of_agents($_SESSION['user_id'])); ?></h2>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- COL-END -->
                                                                <div class="col-md-12 col-lg-4 col-xl-4">
                                                                    <div class="card">
                                                                        
                                                                        <div class="card-body text-center">
                                                                            <div class="counter-icon bg-danger-gradient box-shadow-danger num-counter mx-auto"> <svg style="width:25px;height:25px" viewBox="0 0 24 24">
                                                                                <path fill="#fff" d="M11 7V13L16.2 16.1L17 14.9L12.5 12.2V7H11M20 12V18H22V12H20M20 20V22H22V20H20M18 20C16.3 21.3 14.3 22 12 22C6.5 22 2 17.5 2 12S6.5 2 12 2C16.8 2 20.9 5.4 21.8 10H19.7C18.8 6.6 15.7 4 12 4C7.6 4 4 7.6 4 12S7.6 20 12 20C14.4 20 16.5 18.9 18 17.3V20Z" />
                                                                            </svg> </div>
                                                                            <h5>Cancels</h5>
                                                                            <h2 class="counter"><?php echo get_total_cancel_sales_of_agents($_SESSION['user_id']); ?></h2>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>    
                                                        </div>
                                                        <div class="tab-pane <?php if(isset($_POST['searchSubmit'])){ echo "active";}else{echo "";} ?>" id="search">
                                                        <form action="" method="post">
                                                            <div class="row">
                                                                    <div class="col-md-4 mt-4 mt-md-0">
                                                                        <div class="input-group">
                                                                            <div class="input-group-text">
                                                                                <span class="fa fa-clock-o tx-16 lh-0 op-6"></span>
                                                                            </div>
                                                                            <input class="form-control" autocomplete="off" id="datepicker-month" name="months" placeholder="Month Range" type="text">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 mt-4 mt-md-0">
                                                                        <div class="input-group">
                                                                            <div class="input-group-text">
                                                                                <span class="fa fa-clock-o tx-16 lh-0 op-6"></span>
                                                                            </div>
                                                                            <input class="form-control" autocomplete="off" id="datepicker-year" name="years" placeholder="Year Range" type="text">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 mt-4 mt-md-0">
                                                                        <div class="input-group">
                                                                            <button class="form-control btn btn-primary" id="searchSubmit" name="searchSubmit" type="submit"><i class="fe fe-eye me-1"></i>&nbsp;Search</button>
                                                                            <!-- <input class="form-control btn btn-primary" id="searchSubmit" name="searchSubmit" value="Search"  type="submit"> -->
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            </form>
                                                            <?php 
                                                                if(isset($_POST['searchSubmit'])){
                                                                    @extract($_POST);
                                                                    // print_r($_REQUEST);
                                                                    $timestamp    = strtotime("$months $years");
                                                                    $first_date = date('Y-m-01', $timestamp);
                                                                    $last_date  = date('Y-m-t', $timestamp); // A leap year!
                                                                    $query = "SELECT SUM(debt_amount) as total_debt, SUM(cancel_amount) AS total_cancels, COUNT(*) as total_sales FROM sales_intake s WHERE s.agent_id = '".$_SESSION['user_id']."' AND status = 0 AND date_signed BETWEEN '".$first_date."' AND '".$last_date."' ";
                                                                    $getData = DB::Query($query);
                                                                    $cancels = DB::Query("SELECT COUNT(*) as cancels FROM sales_intake s WHERE s.agent_id = '".$_SESSION['user_id']."' AND status = 0 AND date_signed BETWEEN '".$first_date."' AND '".$last_date."' AND cancel_amount != 0.00");
                                                                    


                                                                    // echo $last_day_april_2010 = date('m-t-Y', strtotime("$months, $years"));
                                                            ?>
                                                            <div class="row">
                                                                <div class="col-md-12 col-lg-4 col-xl-4">
                                                                    <div class="card">
                                                                        <div class="card-body text-center">
                                                                            <div class="counter-icon bg-secondary-gradient box-shadow-secondary num-counter mx-auto"> <svg style="width:27px;height:27px" viewBox="0 0 24 24">
                                                                                <path fill="#fff" d="M16,14H17.5V16.82L19.94,18.23L19.19,19.53L16,17.69V14M17,12A5,5 0 0,0 12,17A5,5 0 0,0 17,22A5,5 0 0,0 22,17A5,5 0 0,0 17,12M17,10A7,7 0 0,1 24,17A7,7 0 0,1 17,24C14.21,24 11.8,22.36 10.67,20H1V17C1,14.34 6.33,13 9,13C9.6,13 10.34,13.07 11.12,13.2C12.36,11.28 14.53,10 17,10M10,17C10,16.3 10.1,15.62 10.29,15C9.87,14.93 9.43,14.9 9,14.9C6.03,14.9 2.9,16.36 2.9,17V18.1H10.09C10.03,17.74 10,17.37 10,17M9,4A4,4 0 0,1 13,8A4,4 0 0,1 9,12A4,4 0 0,1 5,8A4,4 0 0,1 9,4M9,5.9A2.1,2.1 0 0,0 6.9,8A2.1,2.1 0 0,0 9,10.1A2.1,2.1 0 0,0 11.1,8A2.1,2.1 0 0,0 9,5.9Z" />
                                                                            </svg> </div>
                                                                            <h5>Total Deals</h5>
                                                                            <h2 class="counter"><?php echo $getData[0]['total_sales'];?></h2>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- COL-END -->
                                                                <div class="col-md-12 col-lg-4 col-xl-4">
                                                                    <div class="card">
                                                                        
                                                                        <div class="card-body text-center">
                                                                            <div class="counter-icon bg-primary-gradient box-shadow-primary num-counter mx-auto"> <svg style="width:25px;height:25px" viewBox="0 0 24 24">
                                                                                <path fill="#fff" d="M21 11.11V7A2 2 0 0 0 20.42 5.59A1.87 1.87 0 0 0 19 5H15V3A1.9 1.9 0 0 0 14.42 1.58A1.9 1.9 0 0 0 13 1H9A1.9 1.9 0 0 0 7.58 1.58A1.9 1.9 0 0 0 7 3V5H3A1.87 1.87 0 0 0 1.58 5.59A2 2 0 0 0 1 7V18A2 2 0 0 0 1.58 19.41A1.87 1.87 0 0 0 3 20H10.26A7 7 0 1 0 21 11.11M9 3H13V5H9M3 18V7H19V9.68A6.84 6.84 0 0 0 16 9A7 7 0 0 0 9 16A6.91 6.91 0 0 0 9.29 18M19 20A5 5 0 0 1 13 20A4.94 4.94 0 0 1 11 16A5 5 0 0 1 16 11A4.94 4.94 0 0 1 19 12A5 5 0 0 1 19 20M15 13H16.5V15.82L18.94 17.23L18.19 18.53L15 16.69V13" />
                                                                            </svg></div>
                                                                            <h5>Gross Sales</h5>
                                                                            <h2 class="counter">$ <?php echo number_format((int)$getData[0]['total_debt']-$getData[0]['total_cancels']); ?></h2>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- COL-END -->
                                                                <div class="col-md-12 col-lg-4 col-xl-4">
                                                                    <div class="card">
                                                                        
                                                                        <div class="card-body text-center">
                                                                            <div class="counter-icon bg-danger-gradient box-shadow-danger num-counter mx-auto"> <svg style="width:25px;height:25px" viewBox="0 0 24 24">
                                                                                <path fill="#fff" d="M11 7V13L16.2 16.1L17 14.9L12.5 12.2V7H11M20 12V18H22V12H20M20 20V22H22V20H20M18 20C16.3 21.3 14.3 22 12 22C6.5 22 2 17.5 2 12S6.5 2 12 2C16.8 2 20.9 5.4 21.8 10H19.7C18.8 6.6 15.7 4 12 4C7.6 4 4 7.6 4 12S7.6 20 12 20C14.4 20 16.5 18.9 18 17.3V20Z" />
                                                                            </svg> </div>
                                                                            <h5>Cancels</h5>
                                                                            <h2 class="counter"><?php echo $cancels[0]['cancels'];?></h2>
                                                                        </div>
                                                                    </div>
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


	<ul class="notification" style="background: #f0f0f5;padding:10px">
<?php
    require_once('functions.php');
	// print_r($_SESSION);
	//<span class="time" style="font-size:12px">'.getDateTime($data['created_on']).'</span>
	// s.agent_id = '".$_SESSION['user_id']."' and
	$query = "SELECT * FROM sales_intake s WHERE s.status = 0 AND company_id='".$_SESSION['company_id']."' ORDER BY s.created_on DESC";
	$results = DB::Query($query);
	// print_r($results);die(1);
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
        // print_r($user_details);die();
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
        ?>
		    <li>
				<div class="notification-time">
					<span class="date">$<?php echo number_format($total_amount);?></span>
					
				</div>
				<div class="notification-icon" style="left:14.7%;">
					<a href="javascript:void(0);"></a>
				</div>
				<div class="notification-body" style="margin-right: 0%;">
					<div class="media mt-0">
						<div class="main-avatar avatar-md online">
							<img alt="avatar" class="br-7" src="<?php echo $userImage;?>">
						</div>
						<div class="media-body ms-3 d-flex">
							<div class="" style="vertical-align: middle">
								<span class="fs-15 text-dark fw-bold mb-0 align-middle"><?php echo $user_details[0]['first_name']." ".$user_details[0]['last_name'];?></span><br/>
								<span class="rounded-pill badge '.$color.' ms-3 px-2 pb-1 mb-1"><?php echo $status; ?></span>
							</div>
							<div class="notify-time">
								<p class="mb-0 text-muted fs-11"><?php echo time_elapsed_string($data['date_signed']);?></p>
							</div>
						</div>
					</div>
				</div>
			</li>
		
	<?php }?>
	</ul>
	<div class="text-center mb-4">
		<button class="btn ripple btn-primary w-md">Load more</button>
	</div>
</div>
