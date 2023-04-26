<?php
$company_id = $_SESSION['company_id'];
$salesintakeSQL = "SELECT * FROM sales_intake WHERE company_id=$company_id";
$salesintakes = DB::Query($salesintakeSQL);	

?> <!-- Content Header (Page header) -->



<div class="main-content app-content mt-0">
                    <div class="side-app">

                        <!-- CONTAINER -->
                        <div class="main-container container-fluid">

                            <!-- PAGE-HEADER -->
                            <div class="page-header">
                                <h1 class="page-title"> View Deals
					<small> View All</small></h1>
                                <div>
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<!--<li class="breadcrumb-item"><a href="#">Companies</a></li>-->
									<li class="breadcrumb-item active">View All</li>
								</ol>
                                </div>
                            </div>
                            <!-- PAGE-HEADER END -->







							<div class="row row-sm">
                                <div class="col-lg-12">
                                    <div class="card">
									<div class="card-header">
                                            <h3 class="card-title"><i class="fa fa-building"></i>  View Deals</h3>
											<div class="align-content-right" style="width:85%">
												<a href="index.php?route=modules/dataentry/createsalesintake" class="pull-right btn btn-primary"> <span
													class="fa   fa-plus"></span> &nbsp;Add New Deal
												</a>
											</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
											<table class="mt-3 mb-3"  style="width:100%">
											<h3 class="card-title">Search Filter</h3>
												<tr>
													<td>
														<label for="searchByName" class="form-label">First Name:</label>
														<input type='text' id='searchByName' class=" form-control" placeholder="First Name">
													</td>
													<td>
														<label for="searchByName" class="form-label">Last Name:</label>
														<input type='text' id='lastName' class=" form-control" placeholder="Last Name">
													</td>
													<td>
														<label for="account_id" class="form-label">Account ID:</label>
														<input type='text' id='account_id' name="account_id" class=" form-control" placeholder="Search With Account ID">
													</td>
													<td>
														<label for="cancel_date" class="form-label">Cancel Date:</label>
														<input type='date' id='cancel_date' class="form-control" name="cancel_date">
													</td>
													<td>
													<label for="back_office" class="form-label">Back Office:</label>	
													<select required   class="ajiSelect form-control" id="back_office" name="back_office">
														<option
															value=""> -- Select BackOffice --
															</option>
							
															<?php 
															 $back_office = DB::Query("SELECT b.back_office_id,b.back_office_title FROM `back_office_company` c 
															 JOIN back_office b ON c.backOfficeId = b.back_office_id
															 WHERE company_id = '".$_SESSION['company_id']."'");
															 foreach($back_office as $row){
															?>
																<option  value="<?php echo $row['back_office_title']; ?>"><?php echo $row['back_office_title']; ?></option>
															<?php }?>
														</select>
													</td>
													<td>
													<label for="Search" class="form-label">Action</label>
													<button class="pull-right btn btn-primary w-100" id="Search"> <span
														class="fa   fa-eye"></span> &nbsp;Search
													</button>
													</td>
												</tr>
											</table>
                                                <table class="table table-bordered border  mb-0" id="empTable" style="width:100%">
                                                    <thead class="light_grey">
													<?php 
														if(isset($_REQUEST['del']) AND $_REQUEST['del'] == "yes"){
													?>
														<div class="alert alert-success">
															<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
															<span class=""><svg xmlns="http://www.w3.org/2000/svg" height="40" width="40" viewBox="0 0 24 24"><path fill="#13bfa6" d="M10.3125,16.09375a.99676.99676,0,0,1-.707-.293L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328l-6.1875,6.1875A.99676.99676,0,0,1,10.3125,16.09375Z" opacity=".99"/><path fill="#71d8c9" d="M12,2A10,10,0,1,0,22,12,10.01146,10.01146,0,0,0,12,2Zm5.207,7.61328-6.1875,6.1875a.99963.99963,0,0,1-1.41406,0L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328Z"/></svg></span>
															<strong>Success Message</strong>
															<hr class="message-inner-separator">
															<p>You Have Successfully Delete the Deal.</p>
														</div>
													<?php }
													?>
													<tr>
															<th>sale_id</th>
															<th>Date Signed</th> 
															<th>Account ID</th>
															<th>RefID</th>
															<th>First Name</th>
															<th>Last Name</th>
															<th>State</th>
															<th>Debt AMT</th>
															
															<th>Contract Length</th>
															<th>Type of Payment</th>
															<th>Back Office</th>
															<th>Rep</th>
															<th>Manager</th>
															<th>1CC</th>
															<th>Status</th>
															<?php 
																//if($_SESSION['role_id'] != 4 AND $_SESSION['role_id'] != 5){
															?>
															<th>Actions</th>
															<?php //}?>
														</tr>
                                                    </thead>
                                                    
													<tfoot class="light_grey">
													
    		
    		
    		
    		
    		
    		
    	
                                                    <tr>
															<th>sale_id</th>
															<th>Date Signed</th> 
															<th>Account ID</th>
															<th>RefID</th>
															<th>First Name</th>
															<th>Last Name</th>
															<th>State</th>
															<th>Debt AMT</th>
															
															<th>Contract Length</th>
															<th>Type of Payment</th>
															<th>Back Office</th>
															<th>Rep</th>
															<th>Manager</th>
															<th>1CC</th>
															<th>Status</th>
															<?php 
																//if($_SESSION['role_id'] != 4 AND $_SESSION['role_id'] != 5){
															?>
															<th>Actions</th>
															<?php //}?>
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
