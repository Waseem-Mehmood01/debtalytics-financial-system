<?php
/*echo "<pre>";
print_r($_SESSION);
echo "</pre>";*/
$user_id = $_SESSION['user_id'];
$company_id = $_SESSION['company_id'];
if (isset($_REQUEST['sale_id'])) {
	$sale_id = $_REQUEST['sale_id'];
	$sale = DB::queryFirstRow("SELECT * FROM sales_intake WHERE sale_id=$sale_id");
	//  echo "<pre>";
	//  print_r($sale);
	//  echo "</pre>";
	//  die(1);
} else {

	echo '<script type="text/javascript">
<!--
window.location = "window.location = "index.php?route=modules/dataentry/viewsalesintake"
//-->
</script>';
}

if(isset($_POST['btnSubmitagent'])){

	@extract($_POST);
	if(isset($split_with_id)){
			
		DB::update("sales_intake", array(
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
		), 'sale_id=%s', $sale_id);
	}else{
		
		DB::update("sales_intake", array(
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
		), 'sale_id=%s', $sale_id);
	}



	

		
	
		
}
if (isset($_POST['btnSubmit'])) {
// echo "<pre>";
// print_r($_POST);die(1);
// echo "</pre>";
	//print_r($_SESSION);
	@extract($_POST);

	// TODO: brp no and ref no should be unique check and validate


 
	DB::update("sales_intake", array(
	'date_signed'=> $date_signed, 
	'brp_no'   => $brp_no,
	'ref_no'   => $ref_no,
	'first_name'   => $first_name,
	'last_name'   => $last_name,
	'state'   => $state,
	'debt_amount'   => $debt_amount,
	'monthly_payment'   => $monthly_payment,
	'back_office'   => $back_office,
	'cancel_amount' => $cancel_amount,
	'cancel_date' => $cancel_date,
	'is_rev_shared'   => $is_rev_shared,
	'split_with_id'   => $split_with_id,
	'contract_length'   => $contract_length,
	'payment_type'   => $payment_type,
	'first_draft_status' => $first_draft_status,
	'first_draft_date' => $first_draft_date,
	'agent_id'   => $agent_id,
	'last_modified_on'    => $now,
	'last_modified_by'    => $_SESSION['user_name'],
	'status' => $status,
	'call_close' =>$call_close,
	), 'sale_id=%s', $sale_id);
	

	echo '<script type="text/javascript">
<!--

window.location = "index.php?route=modules/dataentry/viewsalesintake"
//-->
</script>'
	;
/*


*/
}


?> <!-- Content Header (Page header) -->





























<div class="main-content app-content mt-0">
                    <div class="side-app">

                        <!-- CONTAINER -->
                        <div class="main-container container-fluid">

                            <!-- PAGE-HEADER -->
                            <div class="page-header">
                                <h1 class="page-title">Edit Sales Intake Form</h1>
                                <div>
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item"><a href="index.php?route=modules/dataentry/viewsalesintake">Sales Intake</a></li>
									<li class="breadcrumb-item active">Edit Sale Intake</li>
								</ol>
                                </div>
                            </div>
                            <!-- PAGE-HEADER END -->




















							<div class="row">
                                <div class="col-xl-6 col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
										<h3 class="card-title">Edit Sale</h3>
                                        </div>
                                        <div class="card-body">





										<?php 
											 if($_SESSION['role_id'] == 4 OR $_SESSION['role_id'] == 5){?>
												<form class="form-horizontal" action="" method="POST">
                                                
                                                   
                                                    <div class="col-md-9">
														<label class="col-md-3 form-label" for="brp_no">Account ID:</label>
														<input type="text" name="brp_no"class="form-control"  id="brp_no" value ="<?php echo $sale['brp_no']; ?>">
                                                    </div>
                                                
                                                
                                                    
                                                    <div class="col-md-9">
														<label class="col-md-3 form-label"for="ref_no">Ref ID:</label>
														<input type="text" name="ref_no"class="form-control"  id="ref_no"  value ="<?php echo $sale['ref_no']; ?>">
                                                    </div>
                                                
                                                
                                                    
                                                    <div class="col-md-9">
														<label class="col-md-3 form-label"for="first_name">First Name</label>
														<input type="text" name="first_name"
															class="form-control" required id="first_name" value ="<?php echo $sale['first_name']; ?>" />
                                                    </div>
                                                
                                                
                                                    
                                                    <div class="col-md-9">
														<label class="col-md-3 form-label"for="last_name">Last Name</label>
														<input type="text" name="last_name"
															class="form-control" required id="last_name"  value ="<?php echo $sale['last_name']; ?>"/>
                                                    </div>
                                                
                                                
                                                    
                                                    <div class="col-md-9">
													<label class="col-md-3 form-label"class="form-label">State:</label>
													<select required   class="ajiSelect form-control" id="state" name="state">
															<option value=""> -- Select State --</option>
																<?php
																$states = DB::Query("SELECT * FROM states");
																?>
																<?php
																foreach ($states as $state) { ?>
																<option value="<?php echo $state['code']; ?>"
																<?php
																if ($sale['state'] == $state['code'] ) {

																echo " selected ";
																}
																?>
																> <?php echo $state['code']; ?></option>
																<?php
																} ?>
															
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
																	<option  value="<?php echo $row['back_office_title']; ?>" <?php if ($sale['back_office'] == $row['back_office_title'] ) {echo "selected";} ?>><?php echo $row['back_office_title']; ?></option>
																<?php }?>
															
															
															
														</select>
                                                    </div>
                                                
                                                
                                                    
                                                    <div class="col-md-9">
														<label class="col-md-3 form-label"for="debt_amount">Debt Amount:</label>
														<input type="number" name="debt_amount"
														class="form-control" required placeholder="0.00" id="debt_amount"  step=".01" value ="<?php echo $sale['debt_amount']; ?>"/>
														
                                                    </div>
                                                
																
													<div class="col-md-9">
														<label class="col-md-3 form-label"for="monthly_payment">Monthly Payment:</label>
														<input type="number" name="monthly_payment"
														class="form-control" required placeholder="0.00" id="monthly_payment"  step=".01" value ="<?php echo $sale['monthly_payment']; ?>"/>
														
                                                    </div>			

                                                
                                                
                                                    <div class="col-md-9">
														<label class="col-md-3 form-label"for="is_rev_shared">Rev Share:</label>
														<select required   class="ajiSelect form-control" id="is_rev_shared" name="is_rev_shared">
														<option
															value="0"
															<?php
															if ($sale['is_rev_shared'] == "0" ) {

																echo " selected ";
															}

															?>
															> No
															</option>
															<option  value="1"

																<?php
																if ($sale['is_rev_shared'] == "1" ) {

																	echo " selected ";
																}

																?>
																>Yes</option>
														</select>
                                                    </div>
                                                

												
                                                    
                                                    <div class="col-md-9" id="splitwith">
													<label class="col-md-3 form-label"for="split_with_id" style="width:100%"> Split With:</label>
														<select    class="ajiSelect form-control" style="width:100%" id="split_with_id" name="split_with_id" >
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
														<input type="number" name="contract_length" required min="12" max="120" value ="<?php echo $sale['contract_length']; ?>"
															class="form-control"  id="contract_length"   />
                                                    </div>
                                                


												
                                                    
                                                    <div class="col-md-9">
													<label class="col-md-3 form-label"for="payment_type">Type of Payment:</label>
													<select required   class="ajiSelect form-control" id="payment_type" name="payment_type">
														<option
															value=""> -- Select Type of Payment --
															</option>

															<option  value="BW"
																<?php
																if ($sale['payment_type'] == "BW" ) {

																	echo " selected ";
																}

																?>
															>BW</option>
															<option value="SM"
																<?php
																if ($sale['payment_type'] == "SM" ) {

																	echo " selected ";
																}

																?>
															>SM</option>
															<option  value="M"
																<?php
																if ($sale['payment_type'] == "M" ) {

																	echo " selected ";
																}

																?>
															>M</option>
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
														value ="<?php echo $sale['first_draft_date']; ?>" class="form-control"  id="first_draft_date"   />
                                                    </div>
                                                
												
                                                    
                                                    <div class="col-md-9">
														<label class="col-md-3 form-label"for="referrals">Referrals:</label>
														<select required   class="ajiSelect form-control" id="referrals" name="referrals">
															<option
															value=""> -- Select Referrals --
															</option>

															<option  value="0" <?php if($sale['referrals'] == 1) echo 'selected'; ?>>No</option>
															<option  value="1" <?php if($sale['referrals'] == 1) echo 'selected'; ?>>Yes</option>
														</select>
                                                    </div>
                                                
												
                                                    
                                                    <div class="col-md-9" id="ref_code_f">
														<label class="col-md-3 form-label"for="ref_code">Referrals Code:</label>
														<input type="text" name="ref_code"
															class="form-control"  id="ref_code"  value ="<?php echo $sale['referrals_code']; ?>" />
                                                    </div>
                                                
												
                                                    <div class="col-md-9 mb-5">
													<label class="col-md-3 form-label"for="referrals">1CC:</label>
														<select required   class="ajiSelect form-control" id="call_close" name="call_close">
															<option selected
															value="0"> -- Select 1CC --
															</option>

															<option  value="1" <?php if($sale['call_close'] == 1) echo 'selected'; ?>>1 Call Close</option>
															<option  value="0" <?php if($sale['call_close'] == 0) echo 'selected'; ?>>Multiple Phone Calls</option>
														</select>
                                                    </div>
                                                
												<div class="card-footer text-end">
												<input type="hidden" value="<?php echo $_GET['sale_id']; ?>" name="sale_id" /> 
											<button type="submit" name="btnSubmitagent" class="btn btn-success my-1">Save</button>
                                        </div>

                                            </form>
















											<?php }else if($_SESSION['role_id'] == 2 OR $_SESSION['role_id'] == 3){?>











                                            <form class="form-horizontal" action="" method="POST">
                                                <div class=" row mb-4">
                                                    <label class="col-md-3 form-label" for="company_name">Date Signed:</label>
                                                    <div class="col-md-9">
													<input type="date" name="date_signed" class="form-control" required id="date_signed"  value ="<?php echo $sale['date_signed']; ?>">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label class="col-md-3 form-label" for="brp_no">Account ID:</label>
                                                    <div class="col-md-9">
													<input type="text" name="brp_no"class="form-control"  value ="<?php echo $sale['brp_no']; ?>" id="brp_no"  ">
                                                    </div>
                                                </div>
                                                <div class=" row mb-4">
                                                    <label class="col-md-3 form-label"for="ref_no">Ref ID:</label>
                                                    <div class="col-md-9">
													<input type="text" value ="<?php echo $sale['ref_no']; ?>" name="ref_no"class="form-control"  id="ref_no"  ">
                                                    </div>
                                                </div>
                                                <div class=" row mb-4">
                                                    <label class="col-md-3 form-label"for="first_name">First Name</label>
                                                    <div class="col-md-9">
													<input type="text" name="first_name"
													value ="<?php echo $sale['first_name']; ?>" class="form-control" required id="first_name"  />
														
                                                    </div>
                                                </div>
                                                <div class=" row mb-4">
                                                    <label class="col-md-3 form-label"for="last_name">Last Name</label>
                                                    <div class="col-md-9">
													<input type="text" name="last_name"
													value ="<?php echo $sale['last_name']; ?>" class="form-control" required id="last_name"  />
                                                    </div>
                                                </div>
                                                <div class=" row mb-4">
                                                    <label class="col-md-3 form-label"class="form-label">State:</label>
                                                    <div class="col-md-9">
															<select required   class="ajiSelect form-control" id="state" name="state">
															<option value=""> -- Select State --</option>
																<?php
																$states = DB::Query("SELECT * FROM states");
																?>
																<?php
																foreach ($states as $state) { ?>
																<option value="<?php echo $state['code']; ?>"
																<?php
																if ($sale['state'] == $state['code'] ) {

																echo " selected ";
																}
																?>
																> <?php echo $state['code']; ?></option>
																<?php
																} ?>
															
															</select>
                                                    </div>
                                                </div>
                                                <div class=" row mb-4 mb-4">
                                                    <label class="col-md-3 form-label"for="status">BackOffice:</label>
                                                    <div class="col-md-9">
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
																<option  value="<?php echo $row['back_office_title']; ?>" <?php if ($sale['back_office'] == $row['back_office_title'] ) {echo "selected";} ?>><?php echo $row['back_office_title']; ?></option>
															<?php }?>
														
														
														
													</select>
                                                    </div>
                                                </div>
												 <div class=" row mb-4">
                                                    <label class="col-md-3 form-label"for="debt_amount">Debt Amount:</label>
                                                    <div class="col-md-9">
													<input type="number" name="debt_amount"
													value ="<?php echo $sale['debt_amount']; ?>"class="form-control" required placeholder="0.00" id="debt_amount"  step=".01" />
													
                                                    </div>
                                                </div>


												<div class=" row mb-4">
                                                    <label class="col-md-3 form-label"for="monthly_payment">Monthly Payment:</label>
                                                    <div class="col-md-9">
													<input type="number" name="monthly_payment"
													value ="<?php echo $sale['monthly_payment']; ?>" class="form-control" required placeholder="0.00" id="monthly_payment"  step=".01" />
													
                                                    </div>
                                                </div>

												

                                                <div class=" row mb-4">
                                                    <label class="col-md-3 form-label"for="cancel_amount">Cancel Amount:</label>
                                                    <div class="col-md-9">
													<input type="number" name="cancel_amount"
													value ="<?php echo $sale['cancel_amount']; ?>" class="form-control" required placeholder="0.00" id="cancel_amount"  step=".01" />
													
                                                    </div>
                                                </div>
												
                                                 <div class=" row mb-4">
                                                    <label class="col-md-3 form-label"for="cancel_date">Cancel date:</label>
                                                    <div class="col-md-9">
                                                    <input type="date" name="cancel_date"
														value ="<?php echo $sale['cancel_date']; ?>"class="form-control"  placeholder="0.00" id="cancel_date"  step=".01" />
                                                    </div>
                                                </div> 

                                                <div class=" row mb-4">
                                                    <label class="col-md-3 form-label"for="is_rev_shared">Rev Share:</label>
                                                    <div class="col-md-9">
														<select required   class="ajiSelect form-control" id="is_rev_shared" name="is_rev_shared">
														<option
															value="0"
															<?php
															if ($sale['is_rev_shared'] == "0" ) {

																echo " selected ";
															}

															?>
															> No
															</option>
															<option  value="1"

																<?php
																if ($sale['is_rev_shared'] == "1" ) {

																	echo " selected ";
																}

																?>
																>Yes</option>
														</select>
                                                    </div>
                                                </div>
<div class=" row mb-4" id="splitwith">
                                                    <label class="col-md-3 form-label"for="split_with_id" style="width:100%"> Split With:</label>
                                                    <div class="col-md-9">
                                                    <select class="ajiSelect form-control" style="width:100%" id="split_with_id" name="split_with_id">
														<option value="0"> -- Select Agent -- </option>
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
                                                </div>
												

												<div class=" row mb-4">
                                                    <label class="col-md-3 form-label"for="contract_length">Contract Length:</label>
                                                    <div class="col-md-9">
                                                    <input type="number" name="contract_length" required min="12" max="120"
													value ="<?php echo $sale['contract_length']; ?>" class="form-control"  id="contract_length"   />
                                                    </div>
                                                </div>


												<div class=" row mb-4">
                                                    <label class="col-md-3 form-label"for="payment_type">Type of Payment:</label>
                                                    <div class="col-md-9">
														<select required   class="ajiSelect form-control" id="payment_type" name="payment_type">
														<option
															value=""> -- Select Type of Payment --
															</option>

															<option  value="BW"
																<?php
																if ($sale['payment_type'] == "BW" ) {

																	echo " selected ";
																}

																?>
															>BW</option>
															<option value="SM"
																<?php
																if ($sale['payment_type'] == "SM" ) {

																	echo " selected ";
																}

																?>
															>SM</option>
															<option  value="M"
																<?php
																if ($sale['payment_type'] == "M" ) {

																	echo " selected ";
																}

																?>
															>M</option>
														</select>
                                                    </div>
                                                </div>
												<div class=" row mb-4">
                                                    <label class="col-md-3 form-label"for="first_draft_status">First Draft:</label>
                                                    <div class="col-md-9">
													<select class="ajiSelect form-control" name="first_draft_status" id="first_draft_status">
														<option>--Select One--</option>
														<option value="Paid" <?php if($sale['first_draft_status'] == "Paid") echo "Selected"; ?>>Paid</option>
														<option value="Not Paid" <?php if($sale['first_draft_status'] == "Not Paid") echo "Selected"; ?>>Not Paid</option>
													</select>
                                                    </div>
                                                </div>
												<div class=" row mb-4">
                                                    <label class="col-md-3 form-label"for="first_draft_date">First Draft Date:</label>
                                                    <div class="col-md-9">
                                                    <input type="date" name="first_draft_date" min="12" max="120"
													value ="<?php echo $sale['first_draft_date']; ?>" class="form-control"  id="first_draft_date"   />
                                                    </div>
                                                </div>
												<div class=" row mb-4">
                                                    <label class="col-md-3 form-label"for="agent"> REP:</label>
                                                    <div class="col-md-9">
													<select    class="form-control ajiSelect" id="agent_id" name="agent_id">
													<option
														<?php
														if ( $sale['agent_id'] == "0") {
															echo "selected";
														}
														; ?>
													value="0"> -- Select REP/Agent --
													</option>
													<?php
													// echo $sale['agent_id'];
													// die(1);
													// role_id = '".$_SESSION['role_id']."' AND
													$agents = DB::Query("SELECT user_id, first_name, last_name FROM admin_users WHERE role_id = '4' AND company_id=$company_id");
													
													?>
													<?php
													foreach ($agents as $agent) { ?>
													<option
														<?php
														if ( $sale['agent_id'] == $agent['user_id']) {
															echo "selected";
														}
														; ?>
													value="<?php echo $agent['user_id']; ?>"> <?php echo $agent['first_name']." ".$agent['last_name']; ?></option>
													<?php
												} ?>

													</select>
                                                    </div>
                                                </div>
												<div class=" row mb-4">
                                                    <label class="col-md-3 form-label"for="referrals">1CC:</label>
                                                    <div class="col-md-9">
														<select required   class="ajiSelect form-control" id="call_close" name="call_close">
															<option selected
															value="0"> -- Select 1CC --
															</option>

															<option  value="1" <?php if($sale['call_close'] == 1) echo 'selected'; ?>>1 Call Close</option>
															<option  value="0" <?php if($sale['call_close'] == 0) echo 'selected'; ?>>Multiple Phone Calls</option>
														</select>
                                                    </div>
                                                </div>
												<div class=" row mb-4">
												<label class="col-md-3 form-label" for="status">Status:</label>
												<div class="col-md-9">
												<select  class="form-control ajiSelect" id="status" name="status">
													<option value="0" <?php if($sale['status'] == 0) echo 'selected'; ?>>Active</option>
													<option value="1" <?php if($sale['status'] == 1) echo 'selected'; ?>>Pending</option>
													<option value="2" <?php if($sale['status'] == 2) echo 'selected'; ?>>Canceled</option>
												</select>
												</div>
											</div>
												<div class="card-footer text-end">
												<input type="hidden" value="<?php echo $_GET['sale_id']; ?>" name="sale_id" /> 
											<button type="submit" name="btnSubmit" class="btn btn-success my-1">Update</button>
                                        </div>

                                            </form>
											<?php }?>
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
		if(jQuery('#is_rev_shared').val() == 0){
			
			jQuery('#splitwith').hide();
		}
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





