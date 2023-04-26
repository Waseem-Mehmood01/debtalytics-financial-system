<?php
//print_r($_SESSION);
$user_id = $_SESSION['user_id'];
$company_id = $_SESSION['company_id'];

$ref = "";
if(isset($_POST['btnSubmitagent'])){

	@extract($_POST);
 	
 	if(isset($split_with_id)){
			
		DB::insert("sales_intake", array(
			'date_signed'=>$now,
			'company_id'=> $company_id,
			'brp_no'   => $brp_no,
			'ref_no'   => $ref_no,
			'first_name'   => $first_name,
			'last_name'   => $last_name,
			'state'   => $state,
			'debt_amount'   => $debt_amount,
			'monthly_payment'   => $monthly_payment,
			'back_office'   => $back_office,
			'is_rev_shared'   => $is_rev_shared,
			'split_with_id'   => $split_with_id,
			'contract_length'   => $contract_length,
			'payment_type'   => $payment_type,
			//'first_draft_status' =>$first_draft_status,
			'first_draft_date' => $first_draft_date,
			'agent_id'   => $user_id ,
			'referrals' => $referrals,
			'referrals_code'=>$ref_code,
			'created_on'    => $now,
			'status' => 1,
			'call_close'=>$call_close,
			'created_by'    => $_SESSION['user_name']
			));	
	}else{
		
		DB::insert("sales_intake", array(
			'date_signed'=> $now,
			'company_id'=> $company_id,
			'brp_no'   => $brp_no,
			'ref_no'   => $ref_no,
			'first_name'   => $first_name,
			'last_name'   => $last_name,
			'state'   => $state,
			'debt_amount'   => $debt_amount,
			'monthly_payment'   => $monthly_payment,
			'back_office'   => $back_office,
			'is_rev_shared'   => $is_rev_shared,
			'contract_length'   => $contract_length,
			'payment_type'   => $payment_type,
			//'first_draft_status' =>$first_draft_status,
			'first_draft_date' => $first_draft_date,
			'agent_id'   => $user_id ,
			'referrals' => $referrals,
			'referrals_code'=>$ref_code,
			'status' => 1,
			'call_close'=>$call_close,
			'created_on'    => $now,
			'created_by'    => $_SESSION['user_name']
			));
	}
 	
 
	echo '<script type="text/javascript">
<!--
window.location = "index.php?route=modules/dataentry/createsalesintake"
//-->
</script>'
;

}


if (isset($_POST['btnSubmit'])) {

	@extract($_POST);
 	
 	// TODO: brp no and ref no should be unique check and validate
 	if(isset($split_with_id)){
		DB::insert("sales_intake", array(
			'date_signed'=> $date_signed,
			'company_id'=> $company_id,
			'brp_no'   => $brp_no,
			'ref_no'   => $ref_no,
			'first_name'   => $first_name,
			'last_name'   => $last_name,
			'state'   => $state,
			'debt_amount'   => $debt_amount,
			'monthly_payment'   => $monthly_payment,
			'cancel_amount'   => $cancel_amount,
			'back_office'   => $back_office,
			'is_rev_shared'   => $is_rev_shared,
			'split_with_id'   => $split_with_id,
			'contract_length'   => $contract_length,
			'payment_type'   => $payment_type,
			'first_draft_status' =>$first_draft_status,
			'first_draft_date' => $first_draft_date,
			'agent_id'   => $agent_id,
			'created_on'    => $now,
			'status' => $status,
			'created_by'    => $_SESSION['user_name']
			));	
	}else{
		DB::insert("sales_intake", array(
			'date_signed'=> $date_signed,
			'company_id'=> $company_id,
			'brp_no'   => $brp_no,
			'ref_no'   => $ref_no,
			'first_name'   => $first_name,
			'last_name'   => $last_name,
			'state'   => $state,
			'debt_amount'   => $debt_amount,
			'monthly_payment'   => $monthly_payment,
			'cancel_amount'   => $cancel_amount,
			'back_office'   => $back_office,
			'is_rev_shared'   => $is_rev_shared,
			'contract_length'   => $contract_length,
			'payment_type'   => $payment_type,
			'first_draft_status' =>$first_draft_status,
			'first_draft_date' => $first_draft_date,
			'agent_id'   => $agent_id,
			'created_on'    => $now,
			'status' => $status,
			'created_by'    => $_SESSION['user_name']
			));
	}
 	
 
	echo '<script type="text/javascript">
<!--

window.location = "index.php?route=modules/dataentry/viewsalesintake"
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
                                <h1 class="page-title">Add New Deals</h1>
                                <div>
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item"><a href="index.php?route=modules/dataentry/viewsalesintake">Deals</a></li>
									<li class="breadcrumb-item active">Add New Deals</li>
								</ol>
                                </div>
                            </div>
                            <!-- PAGE-HEADER END -->








							<div class="row">
                                <div class="col-xl-6 col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
										<h3 class="card-title">Add Deal</h3>
                                        </div>
                                        <div class="card-body">
											<?php 
											 if($_SESSION['role_id'] == 4 OR $_SESSION['role_id'] == 5){?>
												<form class="form-horizontal" action="" method="POST">
                                                
                                                   
                                                    <div class="col-md-9">
														<label class="col-md-3 form-label" for="brp_no">Account ID:</label>
														<input type="text" name="brp_no"class="form-control"  id="brp_no"  ">
                                                    </div>
                                                
                                                
                                                    
                                                    <div class="col-md-9">
														<label class="col-md-3 form-label"for="ref_no">Ref ID:</label>
														<input type="text" name="ref_no"class="form-control"  id="ref_no"  ">
                                                    </div>
                                                
                                                
                                                    
                                                    <div class="col-md-9">
														<label class="col-md-3 form-label"for="first_name">First Name</label>
														<input type="text" name="first_name"
															class="form-control" required id="first_name"  />
                                                    </div>
                                                
                                                
                                                    
                                                    <div class="col-md-9">
														<label class="col-md-3 form-label"for="last_name">Last Name</label>
														<input type="text" name="last_name"
															class="form-control" required id="last_name"  />
                                                    </div>
                                                
                                                
                                                    
                                                    <div class="col-md-9">
													<label class="col-md-3 form-label"class="form-label">State:</label>
															<select required   class="ajiSelect form-control" id="state" name="state">
																<option 
																value=""> -- Select State --
																</option>
																<?php 
																$states = DB::Query("SELECT * FROM states");
																?>
																<?php
																foreach ($states as $state) { ?>
																<option value="<?php echo $state['code']; ?>"> <?php echo $state['code']; ?></option>
																<?php } ?>
															
															</select>
                                                    </div>
                                                
                                                
                                                    
                                                    <div class="col-md-9">
													<label class="col-md-3 form-label"for="status">BackOffice:</label>
													<select required   class="form-control ajiSelect" id="back_office" name="back_office">
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
                                                    </div>
                                                
                                                
                                                    
                                                    <div class="col-md-9">
														<label class="col-md-3 form-label"for="debt_amount">Debt Amount:</label>
														<input type="number" name="debt_amount"
														class="form-control" required placeholder="0.00" id="debt_amount"  step=".01" />
														
                                                    </div>
                                                
																
													<div class="col-md-9">
														<label class="col-md-3 form-label"for="monthly_payment">Monthly Payment:</label>
														<input type="number" name="monthly_payment"
														class="form-control" required placeholder="0.00" id="monthly_payment"  step=".01" />
														
                                                    </div>			

                                                
                                                
                                                    <div class="col-md-9">
														<label class="col-md-3 form-label"for="is_rev_shared">Rev Share:</label>
														<select required   class="ajiSelect form-control" id="is_rev_shared" name="is_rev_shared">
															<option
															value="0" > No
															</option>
															<option  value="1">Yes</option>
														</select>
                                                    </div>
                                                

												
                                                    
                                                    <div class="col-md-9" id="splitwith">
													<label class="col-md-3 form-label"for="split_with_id" style="width:100%"> Split With:</label>
														<select    class="ajiSelect form-control" style="width:100%" id="split_with_id" name="split_with_id">
															<option
															value="0"> -- Select Agent --
															</option>
															<?php
													$agents = DB::Query("SELECT user_id, first_name, last_name FROM admin_users WHERE role_id = 4 AND company_id=$company_id AND user_id <> $user_id");
													?>
															<?php
													foreach ($agents as $agent) { ?>
															<option value="<?php echo $agent['user_id']; ?>"> <?php echo $agent['first_name']." ".$agent['last_name']; ?></option>
															<?php
													} ?>

														</select>
                                                    </div>
                                                

												
                                                    
                                                    <div class="col-md-9">
														<label class="col-md-3 form-label"for="contract_length">Contract Length:</label>
														<input type="number" name="contract_length" required min="12" max="120"
															class="form-control"  id="contract_length"   />
                                                    </div>
                                                


												
                                                    
                                                    <div class="col-md-9">
													<label class="col-md-3 form-label"for="payment_type">Type of Payment:</label>
														<select required   class="ajiSelect form-control" id="payment_type" name="payment_type">
															<option
															value=""> -- Select Type of Payment --
															</option>

															<option  value="BW">BW</option>
															<option  value="SM">SM</option>
															<option  value="M">M</option>
														</select>
                                                    </div>
                                                
												
                                                    <!--
                                                    <div class="col-md-9">
														<label class="col-md-3 form-label"for="first_draft_status">First Draft:</label>
														<select class="ajiSelect form-control" name="first_draft_status" id="first_draft_status">
															<option>--Select One--</option>
															<option value="Paid" >Paid</option>
															<option value="Not Paid" >Not Paid</option>
														</select>
                                                    </div>
                                                
												-->
                                                    
                                                    <div class="col-md-9">
														<label class="col-md-3 form-label"for="first_draft_date">First Draft Date:</label>
														<input type="date" name="first_draft_date" min="12" max="120"
														class="form-control"  id="first_draft_date"   />
                                                    </div>
                                                
												
                                                    
                                                    <div class="col-md-9">
														<label class="col-md-3 form-label"for="referrals">Referrals:</label>
														<select required   class="ajiSelect form-control" id="referrals" name="referrals">
															<option
															value=""> -- Select Referrals --
															</option>

															<option  value="0" selected>No</option>
															<option  value="1">Yes</option>
														</select>
                                                    </div>
                                                
												
                                                    
                                                    <div class="col-md-9" id="ref_code_f">
														<label class="col-md-3 form-label"for="ref_code">Referrals Code:</label>
														<input type="text" name="ref_code"
															class="form-control"  id="ref_code"   />
                                                    </div>
                                                
												
                                                    <div class="col-md-9 mb-5">
													<label class="col-md-3 form-label"for="referrals">1CC:</label>
														<select required   class="ajiSelect form-control" id="call_close" name="call_close">
															<option selected
															value="0"> -- Select 1CC --
															</option>

															<option  value="1">1CC</option>
															<option  value="0">Multiple Phone Calls</option>
														</select>
                                                    </div>
                                                
												<div class="card-footer text-end">
											<button type="submit" name="btnSubmitagent" class="btn btn-success my-1">Save</button>
                                        </div>

                                            </form>
















											<?php }else if($_SESSION['role_id'] == 2 OR $_SESSION['role_id'] == 3){?>
												<form class="form-horizontal" action="" method="POST">
                                                
                                                    
                                                    <div class="col-md-9">
														<label class="col-md-3 form-label" for="company_name">Date Signed:</label>
														<input type="date" name="date_signed" class="form-control" required id="date_signed"  ">
                                                    </div>
                                                
                                                
                                                    
                                                    <div class="col-md-9">
														<label class="col-md-3 form-label" for="brp_no">Account ID:</label>
														<input type="text" name="brp_no"class="form-control"  id="brp_no"  ">
                                                    </div>
                                                
                                                
                                                    
                                                    <div class="col-md-9">
														<label class="col-md-3 form-label"for="ref_no">Ref ID:</label>
														<input type="text" name="ref_no"class="form-control"  id="ref_no"  ">
                                                    </div>
                                                
                                                
                                                    
                                                    <div class="col-md-9">
														<label class="col-md-3 form-label"for="first_name">First Name</label>
														<input type="text" name="first_name"
															class="form-control" required id="first_name"  />
														
                                                    </div>
                                                
                                                
                                                    
                                                    <div class="col-md-9">
														<label class="col-md-3 form-label"for="last_name">Last Name</label>
														<input type="text" name="last_name"
															class="form-control" required id="last_name"  />
                                                    </div>
                                                
                                                
                                                    
                                                    <div class="col-md-9">
															<label class="col-md-3 form-label"class="form-label">State:</label>
															<select required   class="ajiSelect form-control" id="state" name="state">
																<option 
																value=""> -- Select State --
																</option>
																<?php 
																$states = DB::Query("SELECT * FROM states");
																?>
																<?php
																foreach ($states as $state) { ?>
																<option value="<?php echo $state['code']; ?>"> <?php echo $state['code']; ?></option>
																<?php } ?>
															
															</select>
                                                    </div>
                                                
                                                
                                                    
                                                    <div class="col-md-9">
														<label class="col-md-3 form-label"for="status">BackOffice:</label>
														<select required   class="form-control ajiSelect" id="back_office" name="back_office">
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
                                                    </div>
                                                
                                                
                                                    
                                                    <div class="col-md-9">
														<label class="col-md-3 form-label"for="debt_amount">Debt Amount:</label>
														<input type="number" name="debt_amount"
														class="form-control" required placeholder="0.00" id="debt_amount"  step=".01" />
													
                                                    </div>
                                                
												
													<div class="col-md-9">
														<label class="col-md-3 form-label"for="monthly_payment">Monthly Payment:</label>
														<input type="number" name="monthly_payment"
														class="form-control" required placeholder="0.00" id="monthly_payment"  step=".01" />
														
                                                    </div>					

                                                
                                                    
                                                    <div class="col-md-9">
														<label class="col-md-3 form-label"for="is_rev_shared">Rev Share:</label>
														<select required   class="ajiSelect form-control" id="is_rev_shared" name="is_rev_shared">
															<option
															value="0" > No
															</option>
															<option  value="1">Yes</option>
														</select>
                                                    </div>
                                                

                                                    <div class="col-md-9" id="splitwith">
													<label class="col-md-3 form-label"for="split_with_id" style="width:100%"> Split With:</label>
														<select    class="ajiSelect form-control" style="width:100%" id="split_with_id" name="split_with_id">
															<option
															value="0"> -- Select Agent --
															</option>
															<?php
													$agents = DB::Query("SELECT user_id, first_name, last_name FROM admin_users WHERE role_id = 4 AND company_id=$company_id AND user_id <> $user_id");
													?>
															<?php
													foreach ($agents as $agent) { ?>
															<option value="<?php echo $agent['user_id']; ?>"> <?php echo $agent['first_name']." ".$agent['last_name']; ?></option>
															<?php
													} ?>

														</select>
                                                    </div>


												
                                                    
                                                    <div class="col-md-9">
													<label class="col-md-3 form-label"for="contract_length">Contract Length:</label>
                                                    <input type="number" name="contract_length" required min="12" max="120"
														class="form-control"  id="contract_length"   />
                                                    </div>
                                                


												
                                                    
                                                    <div class="col-md-9">
													<label class="col-md-3 form-label"for="payment_type">Type of Payment:</label>
														<select required   class="ajiSelect form-control" id="payment_type" name="payment_type">
															<option
															value=""> -- Select Type of Payment --
															</option>

															<option  value="BW">BW</option>
															<option  value="SM">SM</option>
															<option  value="M">M</option>
														</select>
                                                    </div>
                                                
												
                                                    
                                                    <div class="col-md-9">
														<label class="col-md-3 form-label"for="first_draft_status">First Draft:</label>
														<select class="ajiSelect form-control" name="first_draft_status" id="first_draft_status">
															<option>--Select One--</option>
															<option value="Paid" >Paid</option>
															<option value="Not Paid" >Not Paid</option>
														</select>
                                                    </div>
                                                
                                                    <div class="col-md-9">
													<label class="col-md-3 form-label"for="first_draft_date">First Draft Date:</label>
														<input type="date" name="first_draft_date" min="12" max="120"
														class="form-control"  id="first_draft_date"   />
                                                    </div>
                                                
												
                                                    
                                                    <div class="col-md-9">
													<label class="col-md-3 form-label"for="agent"> REP:</label>
													<select    class="form-control ajiSelect" id="agent_id" name="agent_id">
														<option
														value="0"> -- Select REP/Agent --
														</option>
														<?php
												$agents = DB::Query("SELECT user_id, first_name, last_name FROM admin_users WHERE role_id = 4 AND company_id=$company_id");
												?>
														<?php
												foreach ($agents as $agent) { ?>
														<option 
															<?php
															if ( $user_id = $agent['user_id']) {
																echo "selected";
															}
															; ?>
														value="<?php echo $agent['user_id']; ?>"> <?php echo $agent['first_name']." ".$agent['last_name']; ?></option>
														<?php
												} ?>

													</select>
                                                    </div>
                                                
												
												
												<div class="col-md-9">
												<label class="col-md-3 form-label" for="status">Status:</label>
												<select  class="form-control ajiSelect" id="status" name="status">
													<option value="0">Active</option>
													<option value="1">Pending</option>
													<option value="2">Canceled</option>
												</select>
												</div>
											
												<div class="card-footer text-end">
											<button type="submit" name="btnSubmit" class="btn btn-success my-1">Save</button>
                                        </div>

                                            </form>
											<?php }
											?>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-12"> 
									<div class="card"> 
										<div class="card-header"> 
											<h3 class="card-title">Recent Activity</h3> 
										</div> 
										<div class="card-body" style="padding:0"> 
											
											<?php 
											 if($_SESSION['role_id'] == 4){
												get_agent_create_sale_sidebar();
											}else if($_SESSION['role_id'] == 2){
												get_admin_create_sale_sidebar(); 
											}
											// get_create_sale_sidebar();
											?>
											
											
											
										</div> 
									</div> 
								</div>
                            </div>














                            

                        </div>
                        <!--CONTAINER CLOSED -->

                    </div>
                </div>



<script>
	jQuery(document).ready(function(){
		var now = new Date();

		var day = ("0" + now.getDate()).slice(-2);
		var month = ("0" + (now.getMonth() + 1)).slice(-2);

		var today = now.getFullYear()+"-"+(month)+"-"+(day) ;

		$('#date_signed').val(today);

		jQuery('#splitwith').hide();
		jQuery('#ref_code_f').hide();
		jQuery('#referrals').on('change',function(){
			var ref = this.value;
			if(ref == 1){
				jQuery('#ref_code_f').show();
			}else{
				jQuery('#ref_code_f').hide();
			}
		});
		jQuery('#is_rev_shared').on('change',function(){
			var rev_share = this.value;
			if(rev_share == 1){
				jQuery('#splitwith').show();
			}else{
				jQuery('#splitwith').hide();
			}
		});
	});
</script>
















