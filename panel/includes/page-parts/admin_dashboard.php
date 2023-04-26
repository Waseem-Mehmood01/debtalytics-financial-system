<?php require_once('functions.php');?>
<div classs="main-container container-fluid">

	<div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-6 col-xxl-3">
                    <div class="card overflow-hidden bg-primary">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="mt-2">
                                    <!-- <h6 class="">Total Companies</h6> -->
                                    <h2 class="mb-0 number-font text-white">More Info <i class="fa fa-arrow-circle-right"></i></h2>
                                </div>
                                <div class="ms-auto">
                                    <div class="chart-wrapper mt-1">
                                        <canvas id="saleschart" class="h-8 w-9 chart-dropshadow"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!-- <span class="text-muted fs-12"><span class="text-secondary"><i class="fe fe-arrow-up-circle  text-secondary"></i> 5%</span> Last week</span> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-6 col-xxl-3">
                    <div class="card overflow-hidden bg-success">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="mt-2">
                                    <!-- <h6 class="">Total Users</h6> -->
                                    <h2 class="mb-0 number-font text-white">More Info <i class="fa fa-arrow-circle-right"></i></h2>
                                </div>
                                <div class="ms-auto">
                                    <div class="chart-wrapper mt-1"><canvas id="leadschart" class="h-8 w-9 chart-dropshadow"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!-- <span class="text-muted fs-12"><span class="text-pink"><i class="fe fe-arrow-down-circle text-pink"></i> 0.75%</span> Last 6 days</span> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-6 col-xxl-3">
                    <div class="card overflow-hidden bg-warning">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="mt-2">
                                    <!-- <h6 class="">Total Modules</h6> -->
                                    <h2 class="mb-0 number-font text-white">More Info <i class="fa fa-arrow-circle-right"></i></h2>
                                </div>
                                <div class="ms-auto">
                                    <div class="chart-wrapper mt-1"> <canvas id="profitchart" class="h-8 w-9 chart-dropshadow"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!-- <span class="text-muted fs-12"><span class="text-green"><i class="fe fe-arrow-up-circle text-green"></i> 0.9%</span> Last 9 days</span> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-6 col-xxl-3">
                    <div class="card overflow-hidden bg-danger">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="mt-2">
                                    <!-- <h6 class="">Total Cost</h6> -->
                                    <h2 class="mb-0 number-font text-white">More Info <i class="fa fa-arrow-circle-right"></i></h2>
                                </div>
                                <div class="ms-auto">
                                    <div class="chart-wrapper mt-1"> <canvas id="costchart" class="h-8 w-9 chart-dropshadow"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!-- <span class="text-muted fs-12"><span class="text-warning"><i class="fe fe-arrow-up-circle text-warning"></i> 0.6%</span> Last year</span> -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>




  
    












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
                                <li><a href="#total" class="<?php if(isset($_POST['searchSubmit'])){ echo "";}else{echo "active";} ?>" data-bs-toggle="tab"><span><i class="fe fe-user me-1"></i></span>Total</a></li>
                                <li><a href="#daily" data-bs-toggle="tab"><span><i class="fe fe-calendar me-1"></i></span>Daily</a></li>
                                <li><a href="#weekly" data-bs-toggle="tab"><span><i class="fe fe-calendar me-1"></i></span>Weekly</a></li>
                                <li><a href="#monthly" data-bs-toggle="tab"><span><i class="fe fe-bell me-1"></i></span>Monthly</a></li>
                                <li><a href="#search" class="<?php if(isset($_POST['searchSubmit'])){ echo "active";}else{echo "";} ?>" data-bs-toggle="tab"><span><i class="fe fe-eye me-1"></i></span>Search Monthly</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body tabs-menu-body">
                        <div class="tab-content">
                            <div class="tab-pane <?php if(isset($_POST['searchSubmit'])){ echo "";}else{echo "active";} ?>" id="total">
                                <div class="row">
                                    <div class="col-md-12 col-lg-4 col-xl-4">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <div class="counter-icon bg-secondary-gradient box-shadow-secondary num-counter mx-auto"> <svg style="width:27px;height:27px" viewBox="0 0 24 24">
                                                    <path fill="#fff" d="M16,14H17.5V16.82L19.94,18.23L19.19,19.53L16,17.69V14M17,12A5,5 0 0,0 12,17A5,5 0 0,0 17,22A5,5 0 0,0 22,17A5,5 0 0,0 17,12M17,10A7,7 0 0,1 24,17A7,7 0 0,1 17,24C14.21,24 11.8,22.36 10.67,20H1V17C1,14.34 6.33,13 9,13C9.6,13 10.34,13.07 11.12,13.2C12.36,11.28 14.53,10 17,10M10,17C10,16.3 10.1,15.62 10.29,15C9.87,14.93 9.43,14.9 9,14.9C6.03,14.9 2.9,16.36 2.9,17V18.1H10.09C10.03,17.74 10,17.37 10,17M9,4A4,4 0 0,1 13,8A4,4 0 0,1 9,12A4,4 0 0,1 5,8A4,4 0 0,1 9,4M9,5.9A2.1,2.1 0 0,0 6.9,8A2.1,2.1 0 0,0 9,10.1A2.1,2.1 0 0,0 11.1,8A2.1,2.1 0 0,0 9,5.9Z" />
                                                </svg> </div>
                                                <h5>Total Deals</h5>
                                                <h2 class="counter"><?php echo get_total_sales_of_company($_SESSION['company_id']);?></h2>
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
                                                <h2 class="counter">$ <?php echo number_format((int)get_total_amount_of_company($_SESSION['company_id'])); ?></h2>
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
                                                <h2 class="counter"><?php echo get_total_cancel_sales_of_company($_SESSION['company_id']); ?></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="daily">
                                <div class="row">
                                        <div class="col-md-12 col-lg-4 col-xl-4">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <div class="counter-icon bg-secondary-gradient box-shadow-secondary num-counter mx-auto"> <svg style="width:27px;height:27px" viewBox="0 0 24 24">
                                                        <path fill="#fff" d="M16,14H17.5V16.82L19.94,18.23L19.19,19.53L16,17.69V14M17,12A5,5 0 0,0 12,17A5,5 0 0,0 17,22A5,5 0 0,0 22,17A5,5 0 0,0 17,12M17,10A7,7 0 0,1 24,17A7,7 0 0,1 17,24C14.21,24 11.8,22.36 10.67,20H1V17C1,14.34 6.33,13 9,13C9.6,13 10.34,13.07 11.12,13.2C12.36,11.28 14.53,10 17,10M10,17C10,16.3 10.1,15.62 10.29,15C9.87,14.93 9.43,14.9 9,14.9C6.03,14.9 2.9,16.36 2.9,17V18.1H10.09C10.03,17.74 10,17.37 10,17M9,4A4,4 0 0,1 13,8A4,4 0 0,1 9,12A4,4 0 0,1 5,8A4,4 0 0,1 9,4M9,5.9A2.1,2.1 0 0,0 6.9,8A2.1,2.1 0 0,0 9,10.1A2.1,2.1 0 0,0 11.1,8A2.1,2.1 0 0,0 9,5.9Z" />
                                                    </svg> </div>
                                                    <h5>Total Deals</h5>
                                                    <h2 class="counter"><?php echo getDailyAdminDeals($_SESSION['company_id']);?></h2>
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
                                                    <h2 class="counter">$ <?php echo number_format((int)getDailyAdminGrossSale($_SESSION['company_id'])); ?></h2>
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
                                                    <h2 class="counter"><?php echo getDailyAdminCancels($_SESSION['company_id']); ?></h2>
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
                                                    <h2 class="counter"><?php echo getWeeklyAdminDeals($_SESSION['company_id']);?></h2>
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
                                                    <h2 class="counter">$ <?php echo number_format((int)getWeeklyAdminGrossSale($_SESSION['company_id'])); ?></h2>
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
                                                    <h2 class="counter"><?php echo getWeeklyAdminCancels($_SESSION['company_id']); ?></h2>
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
                                                    <h2 class="counter"><?php echo getMonthlyAdminDeals($_SESSION['company_id']);?></h2>
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
                                                    <h2 class="counter">$ <?php echo number_format((int)getMonthlyAdminGrossSale($_SESSION['company_id'])); ?></h2>
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
                                                    <h2 class="counter"><?php echo getMonthlyAdminCancels($_SESSION['company_id']); ?></h2>
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
                                                                    $query = "SELECT SUM(debt_amount) as total_debt, SUM(cancel_amount) AS total_cancels, COUNT(*) as total_sales FROM sales_intake s WHERE s.company_id = '".$_SESSION['company_id']."' AND status = 0 AND date_signed BETWEEN '".$first_date."' AND '".$last_date."' ";
                                                                    $getData = DB::Query($query);
                                                                    $cancels = DB::Query("SELECT COUNT(*) as cancels FROM sales_intake s WHERE s.company_id = '".$_SESSION['company_id']."' AND status = 0 AND date_signed BETWEEN '".$first_date."' AND '".$last_date."' AND cancel_amount != 0.00");
                                                                    


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



















                            

<!--<div class="card">
			<div class="card-header">
				<h3 class="card-title">Agent Sales</h3>
			</div>
			<div class="card-body">
				<div class="chart-container">
					<canvas id="agentSalesChart" class="h-275"></canvas>
					<div id="chartBar"></div>
				</div>
			</div>
		</div>
	</div>-->


    <div class="row">
        <div class="col-xxl-4 col-md-12 col-xl-12">
           
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Total Deals</h3>
                    </div>
                    <div class="card-body">
                    <canvas id="net_worth" ></canvas>
                    
                    </div>
                </div>
           
        </div>
        <div class="col-xxl-4 col-md-12 col-xl-12">
             
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title fw-semibold"><a href="index.php?agent_sales=1">Agent Sales</a></h4>
                    </div>
                    <div class="card-body">
                        <div class="browser-stats">

                            <?php 
                            $query = "SELECT s.agent_id,concat(a.first_name,' ',a.last_name) AS agent_name,SUM(s.debt_amount) AS total_amount,a.user_id FROM sales_intake s JOIN admin_users a ON a.user_id = s.agent_id WHERE s.company_id = '".$_SESSION['company_id']."' AND status = 0 GROUP BY s.agent_id";
                            $get_agent_data = DB::Query($query);
                            // print_r($get_agent_data);
                            $bgColors = array();
                            $bgColors = ['bg-primary','bg-secondary','bg-success','bg-danger','bg-warning','bg-info','bg-green'];
                            //print_r($bgColors);
                            $i = 0;
                            foreach($get_agent_data as $agents){
                                $i++;
                                // 
                                $net_worth = get_net_worth();
                                $agent_sale_percentage = $agents['total_amount']/$net_worth*100;
                                // $agent_sale_percentage = $agent_sale_percentage*10;
                                if($agent_sale_percentage < 40){
                                    $icon = "fe-arrow-down";
                                    $text = "text-danger";
                                    $bg = "bg-danger";
                                }else{
                                    $icon = "fe-arrow-up";
                                    $text = "text-success";
                                    $bg = "bg-success";
                                }
                                ?>
                                <div class="row mb-4 agent_sales" >
                                    <div class="col-sm-2 col-lg-3 col-xl-3 col-xxl-2 mb-sm-0 mb-3">
                                        <img src="<?php echo getUserdetails($agents['user_id']); ?>" style="height:60%;width:60%;padding:0" class="rounded img-fluid"
                                            alt="img">
                                    </div>
                                    <div class="col-sm-10 col-lg-9 col-xl-9 col-xxl-10 ps-sm-0">
                                        <div class="d-flex align-items-end justify-content-between mb-1">
                                            <h6 class="mb-1"><b><?php echo $agents['agent_name'];?>  (Total Deals:<?php echo get_total_sales_of_agents($agents['agent_id']); ?>)</b>&nbsp;<span class="rounded-pill badge '.$bg.' ms-3 px-2 pb-1 mb-1"><?php echo get_total_sales_of_agents($agents['user_id']);?></span></h6>
                                            <h6 class="fw-semibold mb-1">$<?php echo number_format($agents['total_amount']);?> <span class="'.$text.' fs-11">(<i class="fe <?php echo $icon;?>"></i><?php echo round($agent_sale_percentage);?>%)</span></h6>
                                        </div>
                                        <div class="progress h-2 mb-3">
                                            <div class="progress-bar <?php echo $bgColors[$i];?>" style="width: <?php echo $agent_sale_percentage;?>%;"role="progressbar"></div>
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




<?php 

 $date = new DateTime();


 $date->modify("last day of this month");

 $today = new DateTime();
 $lastDayOfThisMonth = new DateTime('last day of this month');

 $current_month_last_date = $date->format("Y-m-d"); // 2022-09-30 Friday

 $nbOfDaysRemainingThisMonth =  $lastDayOfThisMonth->diff($today)->format('%a days');

 $dateTime = strtotime("$current_month_last_date, 24:00:00");
 $getDateTime = date("F d, Y H:i:s", $dateTime); 
?>
<!-- Script -->
<script>
        var countDownTimer = new Date("<?php echo "$getDateTime"; ?>").getTime();
        // Update the count down every 1 second
        var interval = setInterval(function() {
            var current = new Date().getTime();
            // Find the difference between current and the count down date
            var diff = countDownTimer - current;
            // Countdown Time calculation for days, hours, minutes and seconds
            var days = Math.floor(diff / (1000 * 60 * 60 * 24));
            var hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((diff % (1000 * 60)) / 1000);

            document.getElementById("counter").innerHTML = days + "Day : " + hours + "h " +
            minutes + "m " + seconds + "s ";
            document.getElementById("remainingDays").innerHTML = "<?php echo $nbOfDaysRemainingThisMonth; ?> Remaining";
            document.getElementById("hurry").innerHTML = "Hurry Up!";
            // Display Expired, if the count down is over
            if (diff < 0) {
                clearInterval(interval);
                document.getElementById("counter").innerHTML = "<?php echo $nbOfDaysRemainingThisMonth; ?>";
                document.getElementById("remainingDays").innerHTML = "<?php echo $nbOfDaysRemainingThisMonth; ?>";
                document.getElementById("hurry").innerHTML = "Month END";
            }
        }, 1000);
</script>