<?php
$companies = array();
if (isset($_GET['company_id'])) {
	$company_id = intval($_GET['company_id']);
	$companies = array('0' => $company_id
	);

} else {
	$company_id = "";
	$companies = DB::queryFirstColumn("SELECT company_id FROM companies");
}



?> <!-- Content Header (Page header) -->














<div class="main-content app-content mt-0">
                    <div class="side-app">

                        <!-- CONTAINER -->
                        <div class="main-container container-fluid">

                            <!-- PAGE-HEADER -->
                            <div class="page-header">
                                <h1 class="page-title">Users List View All</h1>
                                <div>
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item"><a href="#">Users</a></li>
									<li class="breadcrumb-item active">View Users</li>
								</ol>
                                </div>
                            </div>
                            <!-- PAGE-HEADER END -->

                            <!-- Row -->
                            <div class="row">
                                <div class="col-lg-12">
								<?php
								//print_r($companies);
								$counter = 0;
								foreach ($companies as $key=>$value ) {
									//echo $res[$counter];
									$id = $value;
									
									$company = DB::queryFirstRow("SELECT * FROM companies WHERE company_id = '".$id."' ");
									if (DB::count() < 1) {
										die("Company Does not Exist");
									}
									$counter++;
								?>
                                    <div class="card">
                                        <!-- <div class="card-header">
                                            <h3 class="card-title"><i class="fa fa-building"></i> Companies</h3>
											<div class="align-content-right" style="width:85%">
												<a href="index.php?route=modules/companies/createcompany" class="pull-right btn btn-primary"> <span
													class="fa   fa-plus"></span> &nbsp;Add New Company
												</a>
											</div>
                                        </div> -->
										<div class="card-header bg-default">
											<h3 class="card-title" style="width: 100%;">
											<i class="fa fa-users"></i>&nbsp;Users in <?php echo $company['company_name']; ?>
											</h3>
											<div class="company_logo_img" style="width: 100%;">
											<?php
											if ($company['company_logo'] <> "") {
												$logo = $company['company_logo'] ;
												echo "  <img style='max-width:100px;' class='pull-right brand-image elevation-3' src='$logo'  /> ";
											}else{
												echo "  <img style='max-width:100px;' class='pull-right brand-image elevation-3' src='https://static.thenounproject.com/png/3581362-200.png'  /> ";
											}
											?>
											</div>
										</div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered border text-nowrap mb-0" id="basic-edit">
                                                    <thead>
                                                        <tr>
														<th>UserID</th>
														<th>Name</th>
														<th>Username</th>
														<th>Password</th>
														<th>Email</th>								
														<th>Role</th> 							
														<th>Manager</th> 							
														<th>Status</th> 							
														<th>Actions</th> 	
                                                    </thead>
                                                    <tbody>
											
													<tr>
														<?php 
														$usersSQL = "SELECT * FROM admin_users WHERE company_id = '".$id."' ORDER by role_id ";
														$users = DB::Query($usersSQL);
														foreach ($users as $row ) { ?>
														<td><?php echo $row['user_id']; ?></td>
														<td><?php echo $row['first_name']." ".$row['last_name']; ?>
														<td><?php echo $row['user_name']; ?></td>
														<td><?php echo $row['password']; ?></td>
														<td><?php echo $row['user_email']; ?></td>
														<td><?php echo ShowRoleName($row['role_id']); ?></td>
														<td><?php echo ShowManagerName($row['manager_id']); ?></td>
														<td><?php echo ShowTickCross($row['user_status']); ?></td>
														<td>
						
															<a   class="btn btn-warning edit" href="?route=modules/users/edituser&user_id=<?php echo $row['user_id']; ?>">
																<i class="fa fa-pencil"></i> Edit
															</a></td>
														</td>
													</tr>
															<?php
														} ?> 
                                                    </tbody>
													<tfoot>
														<tr>
															<th>UserID</th>
															<th>Name</th>
															<th>Username</th>
															<th>Password</th>
															<th>Email</th>								
															<th>Role</th> 							
															<th>Manager</th> 							
															<th>Status</th> 							
															<th>Actions</th> 	
														</tr>
													</tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
									<?php }?>
                                </div>
                            </div>
                            <!-- End Row -->

                            
                        </div>
                        <!-- CONTAINER CLOSED -->

                    </div>
                </div>

