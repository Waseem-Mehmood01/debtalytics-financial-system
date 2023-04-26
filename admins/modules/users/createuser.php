<?php

if (isset($_GET['company_id'])) {
	$company_id = intval($_GET['company_id']);
	$company = DB::queryFirstRow("SELECT * FROM companies WHERE company_id = $company_id");
	if (DB::count() < 1) {
		die("Company Does not Exist");
	}
echo '<script type="text/javascript">
<!--
window.location = "index.php?route=modules/users/createuser2&company_id='.$company_id.'"
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
                                <h1 class="page-title">Create New user</h1>
                                <div>
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item"><a href="index.php?route=modules/users/viewusers">Users</a></li>
									<li class="breadcrumb-item active">Create User</li>
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
										<form action="index.php?route=modules/users/createuser2" method="POST">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group">
                                                        <label for="company" class="form-label">Company Name:</label>
                                                        <select required   class="form-control" id="company" name="company_id">
														<option
														value=""> -- Select Company --
														</option>
														<?php
														$companies = DB::Query("SELECT company_id, company_name FROM companies");
														?>
														<?php
														foreach ($companies as $company) { ?>
														<option value="<?php echo $company['company_id']; ?>"> <?php echo $company['company_name']; ?></option>
														<?php
													} ?>

													</select>
                                                    </div>
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