<?php
$user_id = $_SESSION['user_id'];
$company_id = $_SESSION['company_id'];
if(isset($_REQUEST['matric_id'])){
	
$matricID = $_REQUEST['matric_id'];
	$results = DB::Query("SELECT * FROM matrics_intake WHERE matrics_id = $matricID");
	
}else{
	echo '<script type="text/javascript">
<!--
window.location = "index.php?route=modules/dataentry/viewmetricsintake"
//-->
</script>'
;
}

if (isset($_POST['btnSubmit'])) {

	@extract($_POST);

		
		DB::update("matrics_intake", array(
			'date'=> $date,
			"inbound_apps"=> $inbound_apps,
            "out_bound_apps"=> $out_bound_apps,
            "inbound_new_leads"=> $inbound_new_leads,
            "today_schedule_patched"=> $today_schedule_patched,
            "sameday_patches"=> $sameday_patches,
            "patches_completed"=> $patches_completed,
			'num_cc'   => $num_cc,
			'num_of_deals'   => $num_of_deals,
			'number_of_new_untouched_leads'   => $number_of_new_untouched_leads,
			'user_id'   => $user_id,
			'company_id'   => $company_id,
			'created_on'    => $now
			), 'matrics_id=%s', $matrics_id);
 	

	echo '<script type="text/javascript">
<!--
window.location = "index.php?route=modules/dataentry/viewmetricsintake"
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
                                <h1 class="page-title">Daily Tracker</h1>
                                <div>
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<!-- <li class="breadcrumb-item"><a href="index.php?route=modules/dataentry/viewsalesintake">Sales Intake</a></li> -->
									<li class="breadcrumb-item active">Daily Tracker</li>
								</ol>
                                </div>
                            </div>
                            <!-- PAGE-HEADER END -->








							<div class="row">
                                <div class="col-xl-6 col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
										<h3 class="card-title">Daily Tracker</h3>
                                        </div>
                                        <div class="card-body">
												<form class="form-horizontal" action="" method="POST">
											<div class="col-md-9">		
												<label class="col-md-12 form-label" for="date">Date:</label>
												<input type="date" name="date" class="form-control"  id="date" value="<?php echo $results[0]['date']; ?>">
											</div>    
											<div class="col-md-9">
												<label class="col-md-12 form-label" for="inbound_apps">App Team:</label>
												<input type="number" name="inbound_apps" class="form-control"  id="inbound_apps" placeholder="0.00" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Any app that came from an apper
" value="<?php echo $results[0]['inbound_apps']; ?>">
											</div>	
													<div class="col-md-9">
															<label class="col-md-12 form-label" for="out_bound_apps">Outbound:</label>
														<input type="number" name="out_bound_apps" class="form-control"  id="out_bound_apps" placeholder="0.00" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Any app that came from outbound phone call
" value="<?php echo $results[0]['out_bound_apps']; ?>">
													</div>
													<div class="col-md-9">
														<label class="col-md-12 form-label" for="inbound_new_leads">Inbound New Lead:</label>
														<input type="number" name="inbound_new_leads" class="form-control"  id="inbound_new_leads" placeholder="0.00" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Any app that came from a inbound phone call
" value="<?php echo $results[0]['inbound_new_leads']; ?>">
													</div>
													<div class="col-md-9">
														<label class="col-md-12 form-label" for="today_schedule_patched">Previously Scheduled Pitches:</label>
														<input type="number" name="today_schedule_patched" class="form-control"  id="today_schedule_patched" placeholder="0.00" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Anything that was scheduled to be pitched today from a previous day even it wasn't pitched" value="<?php echo $results[0]['today_schedule_patched']; ?>">
													</div>
													<div class="col-md-9">
														<label class="col-md-12 form-label" for="sameday_patches">Same Day Pitches:</label>
														<input type="number" name="sameday_patches" class="form-control"  id="sameday_patches" placeholder="0.00" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Anything that was pitched today that wasn't from a previously scheduled pitch." value="<?php echo $results[0]['sameday_patches']; ?>">
													</div>
													<div class="col-md-9">
														<label class="col-md-12 form-label" for="patches_completed">Pitches Completed:</label>
														<input type="number" name="patches_completed" class="form-control"  id="patches_completed " placeholder="0.00" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="All pitches that were completed today" value="<?php echo $results[0]['patches_completed']; ?>">
													</div>
                                                 	<div class="col-md-9">
														<label class="col-md-12 form-label"for="num_of_deals">Number 1CC</label>
													<input type="number" name="num_cc" class="form-control" required id="num_cc" placeholder="0.00" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="All one call close deals for the day" value="<?php echo $results[0]['num_cc']; ?>"/>
													</div>
                                                    <div class="col-md-9">
														<label class="col-md-12 form-label"for="num_of_deals">Number of deals</label>
													<input type="number" name="num_of_deals" class="form-control" required id="num_of_deals" placeholder="0.00" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Total number of deals for the day" value="<?php echo $results[0]['num_of_deals']; ?>"/>
                                                    </div>
                                               
                                                    <div class="col-md-9 mb-5">
														<label class="col-md-12 form-label"for="number_of_new_untouched_leads">Number of new leads untouched:</label>
													<input type="number" name="number_of_new_untouched_leads" class="form-control" required placeholder="0.00" id="number_of_new_untouched_leads"  step=".01" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Total number of new leads you weren't able to get to today.
" value="<?php echo $results[0]['number_of_new_untouched_leads']; ?>"/>
                                                    </div>
												
												<div class="card-footer text-end">
													<input type="hidden" value="<?php echo $_GET['matric_id']; ?>" name="matrics_id" /> 
											<button type="submit" name="btnSubmit" class="btn btn-success my-1">Update</button>
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



<script>
	var inbound_apps = document.getElementById('inbound_apps');
	var popover = new bootstrap.Popover(inbound_apps, options);
	
	var out_bound_apps = document.getElementById('out_bound_apps');
	var popover = new bootstrap.Popover(out_bound_apps, options);
	
	var inbound_new_leads = document.getElementById('inbound_new_leads');
	var popover = new bootstrap.Popover(inbound_new_leads, options);
	
	var today_schedule_patched = document.getElementById('today_schedule_patched');
	var popover = new bootstrap.Popover(today_schedule_patched, options);
	
	var sameday_patches = document.getElementById('sameday_patches');
	var popover = new bootstrap.Popover(sameday_patches, options);
	
	var patches_completed = document.getElementById('patches_completed');
	var popover = new bootstrap.Popover(patches_completed, options);
	
	var num_cc = document.getElementById('num_cc');
	var popover = new bootstrap.Popover(num_cc, options);
	
	var num_of_deals = document.getElementById('num_of_deals');
	var popover = new bootstrap.Popover(num_of_deals, options);
	
	var number_of_new_untouched_leads = document.getElementById('number_of_new_untouched_leads');
	var popover = new bootstrap.Popover(number_of_new_untouched_leads, options);
	
	
</script>
















