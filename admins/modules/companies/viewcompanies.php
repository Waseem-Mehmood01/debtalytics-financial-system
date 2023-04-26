<?php
$companiesSQL = "SELECT * FROM companies ";
$companies = DB::Query($companiesSQL);
?> <!-- Content Header (Page header) -->

<div class="main-content app-content mt-0">
                    <div class="side-app">

                        <!-- CONTAINER -->
                        <div class="main-container container-fluid">

                            <!-- PAGE-HEADER -->
                            <div class="page-header">
                                <h1 class="page-title">Companies View All</h1>
                                <div>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Companies</a></li>
										<li class="breadcrumb-item active" aria-current="page"><a href="#">View All</a></li>
                                    </ol>
                                </div>
                            </div>
                            <!-- PAGE-HEADER END -->









							<div class="row row-sm">
                                <div class="col-lg-12">
                                    <div class="card">
									<div class="card-header">
                                            <h3 class="card-title"><i class="fa fa-building"></i> Companies</h3>
											<div class="align-content-right" style="width:85%">
												<a href="index.php?route=modules/companies/createcompany" class="pull-right btn btn-primary"> <span
													class="fa   fa-plus"></span> &nbsp;Add New Company
												</a>
											</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                                                    <thead>
													<tr>
														<th><b>ID</b></th>
														<th><b>Company Name</b></th>
														<th><b>Location</b></th>
														<th><b>Website</b></th> 
														<th><b>Users</b></th>
														<th><b>Status</b></th>
														<th><b>Actions</b></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
													
														<?php
														foreach ($companies as $row ) { ?>
														<tr>
														<td><?php echo $row['company_id']; ?></td>
														<td><?php echo $row['company_name']; ?>
															<?php
															if ($row['company_logo'] <> "") {
																$logo = $row['company_logo'] ;
																echo "<br> <img style='max-width:100px;' class='brand-image elevation-3' src='$logo'  /> ";
															}else{
															echo "<br> <img style='max-width:100px' src='https://static.thenounproject.com/png/3581362-200.png' class='brand-image elevation-3' ";
															}
															?>
														</td>
														<td><?php echo $row['city']; ?>, <?php echo $row['state']; ?></td>
														<td><?php echo $row['website']; ?></td>
														<td><?php echo get_company_user_count($row['company_id']); ?>
															<a   class="btn btn-info user" href="index.php?route=modules/users/viewusers&company_id=<?php echo $row['company_id']; ?>">
																<i class="fa fa-users"></i> view
															</a></td>
															<td><?php echo ShowTickCross($row['company_status']); ?></td>
														<td>
															<a   class="btn btn-info view" href="?route=modules/companies/viewcompany&company_id=<?php echo $row['company_id']; ?>">
																<i class="fa fa-eye"></i> view
															</a>
															<a   class="btn btn-warning edit" href="?route=modules/companies/editcompany&company_id=<?php echo $row['company_id']; ?>">
																<i class="fa fa-pencil"></i> Edit
															</a></td>
													</tr>
													<?php }?>
                                                       
                                                        
                                                        
                                                    </tbody>
													<tfoot>
														<tr>
															<th><b>ID</b></th>
															<th><b>Company Name</b></th>
															<th><b>Location</b></th>
															<th><b>Website</b></th> 
															<th><b>Users</b></th>
															<th><b>Status</b></th>
															<th><b>Actions</b></th>
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












