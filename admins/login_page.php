<div class="page">
                <div class="">

                    <!-- CONTAINER OPEN -->
                    <!--<div class="col col-login mx-auto mt-7">
                        <div class="text-center">
                            <a href="index.php"><img src="assets/images/logo.png" class="header-brand-img" alt=""></a>
                        </div>
                    </div>-->

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
                                                    <input class="input100 border-start-0 form-control ms-0" type="email" name="user_name" placeholder="Email" id="user_name">
                                                </div>
                                                <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                        <i class="zmdi zmdi-eye text-muted" aria-hidden="true" id="showPassword"></i>
                                                    </a>
                                                    <input class="input100 border-start-0 form-control ms-0" type="password" id="password" name="password" placeholder="Password">
                                                </div>
                                                <div class="text-end pt-4">
                                                    <p class="mb-0"><a href="index.php?fg=1" class="text-primary ms-1">Forgot Password?</a></p>
                                                </div>
                                                <div class="container-login100-form-btn">
                                                    <input type="button" name="log_in" id="log_in" class="login100-form-btn btn-primary" value="Login" />
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
	jQuery(document).ready(function(){
		jQuery('#showPassword').on('click',function(){
			var getInputType = jQuery('#password').attr('type');
			if(getInputType == 'password'){
				jQuery('#password').attr('type','text');
			}else{
				jQuery('#password').attr('type','password');
			}
		});
		jQuery('body').addClass("login-page").removeClass("sidebar-collapse layout-top-nav").removeAttr("style");
		jQuery('.main-footer').remove();
		jQuery('.wrapper').removeClass('wrapper').addClass('login-box');
		jQuery('#log_in').click(function(){
				user = jQuery('#user_name').val();
				password = jQuery('#password').val();
				if((jQuery.trim(user)!='')&&(jQuery.trim(password)!='')){
						attempLogin();
						jQuery('#msg').html(" ");
				} else {
					jQuery('#msg').html("Please enter User ID and Password");
				}
				
			});
			
			jQuery('input').keydown(function(e) {
			  if (e.which == 13) {
				user = jQuery('#user_name').val();
				password = jQuery('#password').val();
				if((jQuery.trim(user)!='')&&(jQuery.trim(password)!='')){
						attempLogin();
						jQuery('#msg').html(" ");
				} else {
					jQuery('#msg').html("Please Enter User ID and Password");
				}
			  }
			});

	});
	function attempLogin(){
		var	user = jQuery('#user_name').val();
		var	password = jQuery('#password').val();
			console.log(user);
			console.log(password);
		var	posted = {'user':user,'password':password};
				jQuery.ajax({  
						type: "POST",  
						url: "ajax_helpers/ajax_check_login.php",  
						data: posted, 
						beforeSend: function(){
								jQuery('#log_in').attr( "value", "Loging In.." );
								jQuery('#log_in').addClass( "disabled");
								
								},					
						success: function(data){  
							if(data==1){
								rout=jQuery("#route").val();
								jQuery(location).attr('href','index.php'+rout);
							}else{
								jQuery('#msg').html("Invalid User ID or Password");
								jQuery('#log_in').attr( "value", "Log In" );
								jQuery('#log_in').removeClass( "disabled");
							}
						}
					});
	}
	</script>
 