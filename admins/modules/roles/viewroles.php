<?php
$rolesSQL = "SELECT * FROM user_roles ";
$roles = DB::Query($rolesSQL);

?>




<div class="main-content app-content mt-0">
                    <div class="side-app">

                        <!-- CONTAINER -->
                        <div class="main-container container-fluid">

                            <!-- PAGE-HEADER -->
                            <div class="page-header">
							<h1 class="m-0"> User Roles
					<small> View All</small></h1>
                                <div>
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item"><a href="#">User Roles</a></li>
									<li class="breadcrumb-item active">View All</li>
								</ol>
												</div>
                            </div>
                            <!-- PAGE-HEADER END -->

                            <!-- Row -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
										<h3 class="card-title"><i class="fa fa-lock"></i> User Roles</h3> 
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered border text-nowrap mb-0" id="basic-edit">
                                                    <thead>
                                                        <tr>
															<th>RoleID</th>
															<th>Role Description</th> 
                                                    </thead>
                                                    <tbody>
											
													<tr>
								<?php
								foreach ($roles as $row ) { ?>
								<td><?php echo $row['role_id']; ?></td>
								<td><?php echo $row['role_desc']; ?> 
								</td> 
							</tr>
			<?php }?>
                                                        
                                                    </tbody>
													<tfoot>
											<tr>
											<th>RoleID</th>
											<th>Role Description</th> 
											</tr>
						</tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Row -->

                            
                        </div>
                        <!-- CONTAINER CLOSED -->

                    </div>
                </div>
