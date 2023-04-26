<?php

$user_id = $_SESSION['user_id'];
$company_id = $_SESSION['company_id'];

if (isset($_POST['btnSubmit'])) {

	@extract($_POST);
        $months_array = array();
        $months_array = explode(',',str_replace('-', ',', $months));
        // print_r($months_array);
        $years_array = array();
        $years_array = explode(',',str_replace('-', ',', $years));
        // print_r($years_array);
        $month_year = '';
        $month_year = $months_array[0]."-".$years_array[0];
		DB::insert("company_targets", array(
			'target_amount'=> $company_target,
			"target_month_year"=> $month_year,
			'company_id'   => $company_id,
			// 'created_on'    => $now
			));	
 	
 
 	echo '<script type="text/javascript">
 <!--
 window.location = "index.php?route=modules/targets/viewcompanytargets"
 //-->
 </script>'
 ;

}


?><div class="main-content app-content mt-0">
                    <div class="side-app">

                        <!-- CONTAINER -->
                        <div class="main-container container-fluid">

                            <!-- PAGE-HEADER -->
                            <div class="page-header">
                                <h1 class="page-title">Company Targets</h1>
                                <div>
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<!-- <li class="breadcrumb-item"><a href="index.php?route=modules/dataentry/viewsalesintake">Sales Intake</a></li> -->
									<li class="breadcrumb-item active">Add Company Targets</li>
								</ol>
                                </div>
                            </div>
                            <!-- PAGE-HEADER END -->








							<div class="row">
                                <div class="col-xl-6 col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
										<h3 class="card-title">Add Company Targets</h3>
                                        </div>
                                        <div class="card-body">
										<form class="form-horizontal" action="" method="POST">
                                        <div class="col-md-9 mt-3 mb-3">
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <span class="fa fa-clock-o tx-16 lh-0 op-6"></span>
                                                    </div>
                                                    <input class="form-control" autocomplete="off" id="datepicker-month" name="months" placeholder="Select Month" type="text" value="<?php echo $month = date('M'); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-9 mt-3 mb-3">
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <span class="fa fa-clock-o tx-16 lh-0 op-6"></span>
                                                    </div>
                                                    <input class="form-control" autocomplete="off" id="datepicker-year" name="years" placeholder="Select Year" type="text" value="<?php echo $year = date('Y'); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-9  mt-3 mb-3">
                                                <label class="col-md-12 form-label"for="company_target">Company Target</label>
                                            <input type="number" name="company_target" class="form-control" required id="company_target" placeholder="0.00"/>
                                            </div>
                                                <div class="card-footer text-end">
                                            <button type="submit" name="btnSubmit" class="btn btn-success my-1">Save</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <!--CONTAINER CLOSED -->

                    </div>
                </div>