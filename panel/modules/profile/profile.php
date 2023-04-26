<?php
    
	$user_id = $_SESSION['user_id'];
	$admin_details = DB::Query("SELECT * FROM admin_users WHERE user_id = $user_id");
    // print_r($admin_details);die(1);

?>


<div class="main-content app-content mt-0">
                    <div class="side-app">

                        <!-- CONTAINER -->
                        <div class="main-container container-fluid">

                            <!-- PAGE-HEADER -->
                            <div class="page-header">
                                <h1 class="page-title">Editing Profile: <?php //echo $company['company_name'];?></h1>
                                <div>
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item"><a href="index.php?route=modules/users/viewusers">Roles</a></li>
									<li class="breadcrumb-item active">Edit Profile </li>
								</ol>
                                </div>
                            </div>
                            <!-- PAGE-HEADER END -->

                            <!-- ROW-1 OPEN -->
                            <div class="row">
                                
                                <div class="col-xl-12">
                                    <div class="card">
									<div class="card-header">
                                            <h3 class="card-title" style="width: 100%;"><i class="fa fa-2x fa-building"></i>Edit User Profile</h3>
											<div class="company_logo_img" style="width: 100%;">
											<?php
											if ($admin_details[0]['user_avatar_url'] <> "") {
												$logo = $admin_details[0]['user_avatar_url'];
												echo "  <img style='max-width:100px;' class='pull-right brand-image elevation-3' src='$logo'  /> ";
											}else{
													echo "  <img style='max-width:100px;' class='pull-right brand-image elevation-3' src='https://i.pinimg.com/originals/fa/60/51/fa6051d72b821cb48a8cc71d3481dfef.jpg'  /> ";
											}
											?>
											</div>
                                        </div>
                                        <div class="card-body">
										<form action="index.php?route=modules/profile/process_profile" method="POST">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12">
												<div class="form-group">
													<label for="first_name">First Name:</label>
													<input type="text" name="first_name" class="form-control" required id="first_name" value="<?php echo $admin_details[0]['first_name']; ?>" />
												</div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
												<div class="form-group">
													<label for="last_name">Last Name</label> 
													<input type="text" name="last_name" class="form-control" required id="last_name"  value="<?php echo $admin_details[0]['last_name']; ?>" />
												</div>
                                                </div>
                                            </div>



                                            <!-- <div class="form-group">
                                                <label for="user_name" class="form-label">Username:</label>
												<input type="text" name="user_name" class="form-control" disabled required id="user_name" value="<?php echo $admin_details[0]['user_name']; ?>"  />
                                            </div> -->
											
                                            



											<div class="row">
                                                <div class="col-lg-6 col-md-12">
												<div class="form-group">
													<label for="user_email">Email Address :</label> 
													<input type="email" name="user_email" class="form-control" required id="user_email"  value="<?php echo $admin_details[0]['user_email']; ?>" />
												</div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
												<div class="form-group">
												<label for="password">Password</label>
												<input type="text" name="password" class="form-control" required id="password" value="<?php echo $admin_details[0]['password']; ?>" />
											</div>	
                                                </div>
                                            </div>				
											
											
											<div class="row">
                                                <div class="col-lg-6 col-md-12">
												<div class="form-group">
													<label for="user_avatar_url">User Avatar URL:</label> 
													<input type="text" name="user_avatar_url" class="form-control"   id="user_avatar_url" value="<?php echo $admin_details[0]['user_avatar_url']; ?>" />
												</div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
												<div class="form-group">
													<label for="status">User Status:</label>
													<select required   class="form-control ajiSelect" id="user_status" name="user_status">
														<option
															<?php
															if ($admin_details[0]['user_status'] == "1" ) {

																echo " selected ";
															}
															?>
														value="1" > Active
														</option>
														<option  
															<?php
															if ($admin_details[0]['user_status'] == "0" ) {

																echo " selected ";
															}
															?>
														value="0">In Active</option>
													</select>
												</div>
												<input type="hidden" value="<?php echo $admin_details[0]['user_id']; ?>" name="user_id" /> 
												<input type="hidden" value="adminuser" name="formtype" />
                                                </div>
                                            </div>		
											
                                        </div>
                                        <div class="card-footer text-end">
											<button type="submit" name="btnSubmit" class="btn btn-success my-1">Update</button>
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