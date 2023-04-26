<div class="page">
                <div class="">

      

                    <div class="container-login100">
                        <div class="wrap-login100 p-6">
                            <form class="login100-form validate-form" action="" name="frmLogin" id="frmLogin" method="post">
                                <span class="login100-form-title pb-5">
								<img src="assets/images/logo.png" class="header-brand-img" alt="">
                                </span>
                                <div class="panel panel-primary">
                                    <div class="panel-body tabs-menu-body p-0 pt-5">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab5">
                                                <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                        <i class="zmdi zmdi-account text-muted" aria-hidden="true"></i>
                                                    </a>
                                                    <input class="input100 border-start-0 form-control ms-0" type="email" name="user_name" placeholder="User Name" id="user_name">
                                                </div>
                                                <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                        <i class="zmdi zmdi-eye text-muted" id="showPassword" aria-hidden="true"></i>
                                                    </a>
                                                    <input class="input100 border-start-0 form-control ms-0" type="password" id="password" name="password" placeholder="Password">
                                                </div>
												<div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                        <i class="zmdi zmdi-store text-muted" aria-hidden="true"></i>
                                                    </a>
                                                    <select required   class="ajiSelect form-control" id="company" name="company_id">
														<option
																		value=""> -- Select Company --
														</option>
														<?php
													$companies = DB::Query("SELECT company_id, company_name FROM companies WHERE company_status = '1' ");
													?>
														<?php
													foreach ($companies as $company) { ?>
														<option value="<?php echo $company['company_id']; ?>"> <?php echo $company['company_name']; ?></option>
														<?php
													} ?>

													</select>
                                                </div>
                                                <div class="text-end pt-4">
                                                    <p class="mb-0"><a href="index.php?fg=1" class="text-primary ms-1">Forgot Password?</a></p>
                                                </div>
                                                <div class="container-login100-form-btn">
                                                    <input type="button" name="log_in" id="log_in" class="login100-form-btn btn-login" value="Login" />
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<?php 
									if (isset($_GET['route'])) {
											$path = '?route='.$_GET['route'];
										} else {
											$path = '';
										}
										?>
										<input type="hidden" id="route" name="route" value="<?php echo $path; ?>">
                            </form>
                        </div>
                    </div>
                    <!-- CONTAINER CLOSED -->
                </div>
            </div>




















  
		<script>
	$(document).ready(function(){
		jQuery('#showPassword').on('click',function(){
			var getInputType = jQuery('#password').attr('type');
			if(getInputType == 'password'){
				jQuery('#password').attr('type','text');
			}else{
				jQuery('#password').attr('type','password');
			}
		});
		$('body').addClass("login-page").removeClass("sidebar-collapse layout-top-nav").removeAttr("style");
		$('.main-footer').remove();
		$('.wrapper').removeClass('wrapper').addClass('login-box');
		$('#log_in').click(function(){

				user = $('#user_name').val();
				password = $('#password').val();
				if(($.trim(user)!='')&&($.trim(password)!='')){
						attempLogin();
						$('#msg').html(" ");
				} else {
					$('#msg').html("Please enter User ID and Password");
				}
				
			});
			
			$('input').keydown(function(e) {
			  if (e.which == 13) {
				user = $('#user_name').val();
				password = $('#password').val();
				if(($.trim(user)!='')&&($.trim(password)!='')){
						attempLogin();
						$('#msg').html(" ");
				} else {
					$('#msg').html("Please Enter User ID and Password");
				}
			  }
			});

	});
	function attempLogin(){
		var	user = $('#user_name').val();
		var	password = $('#password').val();
		var	company_id = $('select[name=company_id] option').filter(':selected').val()
			console.log(user);
			console.log(password);
			console.log(company_id);
			var	posted = {'user':user,'password':password,'company_id':company_id};
				$.ajax({  
						type: "POST",  
						url: "ajax_helpers/ajax_check_login.php",  
						data: posted, 
						beforeSend: function(){
								$('#log_in').attr( "value", "Loging In.." );
								$('#log_in').addClass( "disabled");
								
								},					
						success: function(data){  
							if(data==1){
								rout=$("#route").val();
								$(location).attr('href','index.php'+rout);
							}else{
								$('#msg').html("Invalid User ID or Password");
								$('#log_in').attr( "value", "Log In" );
								$('#log_in').removeClass( "disabled");
							}
						}
					});
	}
	</script>
 