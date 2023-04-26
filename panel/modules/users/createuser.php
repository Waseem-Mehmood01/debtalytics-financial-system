<?php
if (isset($_SESSION['company_id'])) {
	$company_id = $_SESSION['company_id'];
	$company = DB::queryFirstRow("SELECT company_id, company_name,company_logo FROM companies WHERE company_id=$company_id");
} else {

	echo '<script type="text/javascript">
<!--
window.location = "index.php?route=modules/users/createuser"
//-->
</script>';
	
}
?>






<div class="main-content app-content mt-0">
                    <div class="side-app">

                        <!-- CONTAINER -->
                        <div class="main-container container-fluid">

                            <!-- PAGE-HEADER -->
                            <div class="page-header">
                                <h1 class="page-title">Editing Company: <?php echo $company['company_name'];?></h1>
                                <div>
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item"><a href="index.php?route=modules/users/view_agents">Users</a></li>
									<li class="breadcrumb-item active">Create Agent </li>
								</ol>
                                </div>
                            </div>
                            <!-- PAGE-HEADER END -->

                            <!-- ROW-1 OPEN -->
                            <div class="row">
                                
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title" style="width: 100%;"><i class="fa fa-2x fa-building"></i>Creating Agent in <?php echo $company['company_name']; ?></h3>
											<div class="company_logo_img" style="width: 100%;">
											<?php
											if ($company['company_logo'] <> "") {
												$logo = $company['company_logo'] ;
												echo "  <img style='max-width:100px;' class='pull-right brand-image elevation-3' src='$logo'  /> ";
											}
											?>
											</div>
                                        </div>
                                        <div class="card-body">
										<form action="index.php?route=modules/users/processuserform" method="POST">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group">
                                                        <label for="role_id" class="form-label">User Role:</label>
                                                        <select required   class="form-control" id="role_id" name="role_id">
															<option
															value=""> -- Select User Role --
															</option>
															<?php
															$roles = DB::Query("SELECT role_id, role_desc FROM user_roles WHERE role_id <> 1");
															?>
															<?php
															foreach ($roles as $role) { ?>
															<option value="<?php echo $role['role_id']; ?>"> <?php echo $role['role_desc']; ?></option>
															<?php
														} ?>

														</select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group">
                                                        <label for="manager_id" class="form-label">Manager Name:</label>
                                                        <select    class="form-control" id="manager_id" name="manager_id">
															<option
																					value=""> -- Select Manager --
															</option>
															<?php
															$managers = DB::Query("SELECT user_id, first_name, last_name FROM admin_users WHERE role_id = 3 AND company_id=$company_id");
															?>
															<?php
															foreach ($managers as $manager) { ?>
															<option value="<?php echo $manager['user_id']; ?>"> <?php echo $manager['first_name']." ".$manager['last_name']; ?></option>
															<?php
														} ?>

														</select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="user_name" class="form-label">Username:</label>
												<input type="text" name="user_name" class="form-control" required id="user_name"  />
                                            </div>
											<div class="row">
                                                <div class="col-lg-6 col-md-12">
												<div class="form-group">
													<label for="first_name">First Name:</label>
													<input type="text" name="first_name" class="form-control" required id="first_name"  />
												</div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
												<div class="form-group">
													<label for="last_name">Last Name</label> 
													<input type="text" name="last_name" class="form-control" required id="last_name"  />
												</div>
                                                </div>
                                            </div>
                                            



											<div class="row">
                                                <div class="col-lg-6 col-md-12">
												<div class="form-group">
													<label for="user_email">Email Address :</label> 
													<input type="email" name="user_email" class="form-control" required id="user_email"  />
												</div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
												<div class="form-group">
													<label for="user_phone">Phone No:</label> 
													<input type="phone" name="user_phone" class="form-control"  id="user_phone"   />
												</div>
                                                </div>
                                            </div>				
											<div class="form-group">
												<label for="password">Password</label>
												<input type="text" name="password" class="form-control" required id="password"  />
											</div>	
											
											<div class="row">
                                                <div class="col-lg-6 col-md-12">
												<div class="form-group">
													<label for="user_avatar_url">User Avatar URL:</label> 
													<input type="text" name="user_avatar_url" class="form-control"   id="user_avatar_url"  />
												</div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
												<div class="form-group">
													<label for="status">User Status:</label>
													<select required   class="form-control" id="user_status" name="user_status">
														<option
															value="1" selected="selected"> Active
														</option>
														<option  value="0">In Active</option>
													</select>
												</div>
												<input type="hidden" value="<?php echo $company_id;?>" name="company_id" />
												<input type="hidden" value="createuser" name="formtype" />
                                                </div>
                                            </div>		
											
                                        </div>
                                        <div class="card-footer text-end">
											<button type="submit" name="btnSubmit" class="btn btn-success my-1">Create User</button>
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
