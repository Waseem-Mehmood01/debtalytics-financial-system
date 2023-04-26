 
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="index.php" class="h1"><b>Marketing - </b><?php echo get_company_detail()['company_name']; ?></a>
    </div>
    <div class="card-body">
      <p id="msg" class="login-box-msg">Register to Become User</p>
 
      <form action="" name="frmReg" id="frmReg" method="post">
         <div class="input-group mb-3">
          <input type="text" class="form-control" id="name" name="name" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="user_name" name="user_name" placeholder="System Nick Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" id="email" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" id="pwd1" name="pwd1" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="pwd2" name="pwd2" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="otp" name="otp" placeholder="Type OTP">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-mobile"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit"  name="register" id="register" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
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
 

       <a href="index.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
 
  

		<script>
	$(document).ready(function(){
		$('body').addClass("register-page").removeClass("sidebar-collapse layout-top-nav").removeAttr("style");
		$('.main-footer').remove();
		$('.wrapper').removeClass('wrapper').addClass('register-box');
		$('#register').click(function(){
				user = $('#user_name').val();
				name = $('#name').val();
				email = $('#email').val();
				password1 = $('#pwd1').val();
				password2 = $('#pwd2').val();
				if(($.trim(user)!='')&&($.trim(password1)!='')){
						attemptRegister();
						$('#msg').html(" ");
				} else {
					$('#msg').html("Please enter Fill All Fields Properly");
				}
				
			});
			
			$('input').keydown(function(e) {
			  if (e.which == 13) {
				user = $('#user_name').val();
				name = $('#name').val();
				email = $('#email').val();
				password1 = $('#pwd1').val();
				password2 = $('#pwd2').val();
				if(($.trim(user)!='')&&($.trim(password1)!='')){
						attempRegister();
						$('#msg').html(" ");
				} else {
					$('#msg').html("Please enter Fill All Fields Properly");
				}
			  }
			});

	});
	function attemptRegister(){
		var	user = $('#user_name').val();
		var	password = $('#password').val();
			console.log(user);
			console.log(password);
		var	posted = {'user':user,'password':password};
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
 