<?php


if (isset($_POST['btnSubmit'])) {
	
	//print_r($_SESSION);
		@extract($_POST);

	 	// print_r($back_office);die(1);

		DB::insert("companies", array(
		'company_name'=> $company_name,
		'company_address'   => $company_address,
		'city'   => $city,
		'state'   => $state,
		'phone'   => $phone,
		'email'   => $email,
		'website'   => $website,
		'company_logo'   => $company_logo,
		'company_status'   => $company_status,
		'website'   => $website,
		'header_color' => $header_color,
		'sidebar_color' => $sidebar_color,
		'sidebar_text_color' =>$sidebar_text_color,	
		'created_on'    => $now,
		'created_by'    => $_SESSION['user_name']
		));
		
		$back_office_array = $back_office;
		
		$company_id = DB::insertId();
		if(!empty($company_id)){
			foreach($back_office_array as $row=>$value){
				DB::insert('back_office_company',array(
					'backOfficeId' =>$value,
					'company_id' => $company_id
				));
			}
		}
echo '<script type="text/javascript">
<!--
window.location = "index.php?route=modules/companies/viewcompanies"
//-->
</script>';
/*
		
	} else {
		DB::update("lcs_templates_email", array(
		'template_name'=> $template_name,
		'template_type'   => $template_type,
		'subject'   => $subject,
		'body'  => $body,
		), 'email_templates_id=%s', $email_templates_id);
	}

*/


}


?> 
<div class="main-content app-content mt-0">
                    <div class="side-app">

                        <!-- CONTAINER -->
                        <div class="main-container container-fluid">

                            <!-- PAGE-HEADER -->
                            <div class="page-header">
                                <h1 class="page-title">Add New Company</h1>
                                <div>
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item"><a href="index.php?route=modules/companies/viewcompanies">Companies</a></li>
									<li class="breadcrumb-item active">Create New</li>
								</ol>
                                </div>
                            </div>
                            <!-- PAGE-HEADER END -->

                            <!-- ROW-1 OPEN -->
                            <div class="row">
                                
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title"><i class="fa fa-2x fa-building"></i>Creat New Company</h3>
                                        </div>
                                        <div class="card-body">
										<form action="" method="POST" >
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group">
                                                        <label for="company_name" class="form-label">Company Name:</label>
                                                        <input type="text" class="form-control" name="company_name" id="company_name" >
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group">
                                                        <label for="email" class="form-label">Email:</label>
                                                        <input type="text" class="form-control" id="email" name="email" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="phone" class="form-label">Phone No:</label>
                                                <input type="phone" class="form-control" id="phone" name="phone" >
                                            </div>
											<div class="row">
                                                <div class="col-lg-6 col-md-12">
													<div class="form-group">
														<label for="website" class="form-label">Company Website:</label>
														<input type="text" class="form-control" id="website" name="website" placeholder="http://splink.com">
													</div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
													<div class="form-group">
														<label for="company_logo" class="form-label">Company Logo URL:</label>
														<input type="text" class="form-control" id="company_logo" name="company_logo" >
													</div>
                                                </div>
                                            </div>
                                            



											<div class="row">
                                                <div class="col-lg-6 col-md-12">
													<div class="form-group">
														<label for="city" class="form-label">City:</label>
														<input type="text" class="form-control" id="city" name="city">
													</div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
													<div class="form-group">
														<label for="state" class="form-label">State:</label>
															<select required   class="ajiSelect form-control" id="state" name="state">
																<option 
																value=""> -- Select State --
																</option>
																<?php 
																$states = DB::Query("SELECT * FROM states");
																?>
																<?php
																foreach ($states as $state) { ?>
																<option value="<?php echo $state['code']; ?>"> <?php echo $state['name']; ?></option>
																<?php } ?>
															
															</select>
													</div>
                                                </div>
                                            </div>				

											
						
											
                                            <div class="form-group">
                                                <label class="form-label" for="company_address">Address</label>
                                                <textarea class="form-control" id="company_address" name="company_address" rows="6">Comapny Address.........</textarea>
                                            </div>

											<div class="col-lg-6 col-md-12 was-validated">
												<div class="form-group">
													<label for="back_office" class="form-label">Back Office:</label>

													<?php 
														$query = "SELECT * FROM back_office";
														$results = DB::Query($query);
														foreach($results as $row){
													?>

													<div class="custom-control custom-checkbox mb-3">
														<input type="checkbox" class="custom-control-input" id="back_office<?php echo $row['back_office_id']; ?>" name="back_office[]" value="<?php echo $row['back_office_id']; ?>">
														<label class="custom-control-label" for="back_office<?php echo $row['back_office_id']; ?>"><?php echo $row['back_office_title']; ?></label>
                                                	</div>
													<?php }?>
													
												</div>
											</div>

											<div class="row">
                                                <div class="col-lg-6 col-md-12">
													<div class="form-group">
														<label for="header_color" class="form-label">Header Color:</label>
														<input type="Color" style="width:10%" class="form-control" id="header_color" name="header_color">
													</div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
													<div class="form-group">
														<label for="sidebar_color" class="form-label">Sidebar Color:</label>
														<input type="Color" style="width:10%" class="form-control" id="sidebar_color" name="sidebar_color">
													</div>
                                                </div>
                                            </div>

											
											<div class="form-group">
														<label for="sidebar_text_color" class="form-label">Sidebar Text Color:</label>
														<input type="Color" style="width:10%" class="form-control" id="sidebar_text_color" name="sidebar_text_color">
													</div>
                                            <div class="form-group">
                                                <label class="form-label">Status</label>
                                                <div class="row">
                                                    <div class="col-md-4 mb-2">
													<select required   class="form-control" id="company_status" name="company_status">
														<option
															value="1" selected="selected"> Active
														</option>
														<option  value="0">In Active</option>
													</select>
                                                    </div>
                                                </div>
                                            </div>
                                        
											
                                        <div class="card-footer text-end">
											<button type="submit" name="btnSubmit" class="btn btn-success my-1">Save</button>
                                        </div>
									</form>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                            <!-- ROW-1 CLOSED -->

                        </div>
                        <!--CONTAINER CLOSED -->

                    </div>
                </div>
