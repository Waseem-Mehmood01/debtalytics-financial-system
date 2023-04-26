<?php
$company_id = $_SESSION['company_id'];
$user_id = $_SESSION['user_id'];
$matricsintakeSQL = "SELECT * FROM matrics_intake WHERE company_id=$company_id AND user_id =$user_id";
$matricsintakes = DB::Query($matricsintakeSQL);	

?> <!-- Content Header (Page header) -->



<div class="main-content app-content mt-0">
                    <div class="side-app">

                        <!-- CONTAINER -->
                        <div class="main-container container-fluid">

                            <!-- PAGE-HEADER -->
                            <div class="page-header">
                                <h1 class="page-title"> View Daily Tracker
					<small> View All</small></h1>
                                <div>
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item"><a href="#">View Daily Tracker</a></li>
									<li class="breadcrumb-item active">View All</li>
								</ol>
                                </div>
                            </div>
                            <!-- PAGE-HEADER END -->







							<div class="row row-sm">
                                <div class="col-lg-12">
                                    <div class="card">
									<div class="card-header">
                                            <h3 class="card-title">  View Daily Tracker</h3>
											<div class="align-content-right" style="width:85%">
												<a href="index.php?route=modules/dataentry/createmetricsintake" class="pull-right btn btn-primary"> <span
													class="fa   fa-plus"></span> &nbsp;Add Daily Tracker
												</a>
											</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
												<?php 
														if(isset($_REQUEST['del']) AND $_REQUEST['del'] == "yes"){
													?>
														<div class="alert alert-success">
															<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
															<span class=""><svg xmlns="http://www.w3.org/2000/svg" height="40" width="40" viewBox="0 0 24 24"><path fill="#13bfa6" d="M10.3125,16.09375a.99676.99676,0,0,1-.707-.293L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328l-6.1875,6.1875A.99676.99676,0,0,1,10.3125,16.09375Z" opacity=".99"/><path fill="#71d8c9" d="M12,2A10,10,0,1,0,22,12,10.01146,10.01146,0,0,0,12,2Zm5.207,7.61328-6.1875,6.1875a.99963.99963,0,0,1-1.41406,0L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328Z"/></svg></span>
															<strong>Success Message</strong>
															<hr class="message-inner-separator">
															<p>You Have Successfully Delete the Matric.</p>
														</div>
													<?php }
													?>
											<table class="mt-3 mb-3 table">
											<h3 class="card-title">Search Filter</h3> 
												<tr>
													<td>
														<div class="col-md-12">
															<div class="input-group">
																<div class="input-group-text">
																<i class="fa fa-clock-o tx-16 lh-0 op-6"></i>
															</div>
																<input type="text" autocomplete="off" id="start_date" name="start_date" placeholder="Start Date" class=" form-control fc-datepicker">
															</div>
														</div>
													</td>
													<td>
														<div class="col-md-12">
															<div class="input-group">
																<div class="input-group-text">
																			<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
															</div>
															<input type="text" autocomplete="off" id="end_date" name="end_date" placeholder="End Date" class=" form-control fc-datepicker">
														</div>
													</td>
													<td>
														<div class="col-md-12">
															<div class="form-group">
																<select class="form-control multi-select" id="agents" data-placeholder="Choose Agents" multiple name="agents[]">
																<optgroup label="All Agents">
																<?php 
																	$query = "SELECT user_id FROM matrics_intake GROUP BY user_id";
																	$All_agents = DB::Query($query);
																	foreach($All_agents as $row){
																?>
																<option value="<?php echo $row['user_id']; ?>"><?php echo ShowAgentName($row['user_id']); ?></option>
																<?php }?>     
																</optgroup>
																</select>
															</div>
														</div>
													</td>
													<td>
													<label for="" class="form-label"></label>
													<button class="pull-right btn btn-primary" id="SearchMatric"> <span
														class="fa   fa-eye"></span> &nbsp;Search
													</button>
													</td>
												</tr>
											</table> 
                                                <table class="table table-bordered table-hover table-responsive border  mb-0" id="matrics_table">
													<!-- light_grey-->
                                                    <thead class="light_grey">
													<tr>
								
															<th>Date</th>
															<th>Day</th> 
															<th>Agent</th> 
															<th>Inbound Apps</th>
															<th>Out Bound Apps</th>
															<th>Inbound New Leads</th>
															<th>Today Schedule Pitched</th>
															<th>Sameday Pitches</th>
															<th>Pitches Completed</th>
															<th># of 1CC</th>
															<th># Of Deals</th>
															<th># Of New Untouched Leads</th>
															<th>Total Apps</th>
															<th>Previous Scheduled to pitch %</th>
															<th>Pitch to close %</th>
															<th>% of 1CC deals</th>
														<?php 
																if($_SESSION['role_id'] != 4 OR $_SESSION['role_id'] != 5){
															?>
															<th>Actions</th>
														<?php }?>
														</tr>
                                                    </thead>
                                                    
													<tfoot class="light_grey">
													
    		
    		
    		
    		
    		
    		
    	
                                                    <tr>
                                                  
															<th>Date</th> 
															<th>Day</th> 
															<th>Agent</th> 
															<th>Inbound Apps</th>
															<th>Out Bound Apps</th>
															<th>Inbound New Leads</th>
															<th>Today Schedule Pitched</th>
															<th>Sameday Pitches</th>
															<th>Pitches Completed</th>
															<th># of 1CC</th>
															<th># Of Deals</th>
															<th># Of New Untouched Leads</th>
															<th>Total Apps</th>
															<th>Previous Scheduled to pitch %</th>
															<th>Pitch to close %</th>
															<th>% of 1CC deals</th>
														    <?php 
																if($_SESSION['role_id'] != 4 OR $_SESSION['role_id'] != 5){
															?>
															<th>Actions</th>
														<?php }?>
														</tr>
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
