<?php 
// echo $path = "forgot_password";die(1);
?>
<div class="page">
                <div class="">

                    <!-- CONTAINER OPEN -->
                    <div class="col col-login mx-auto">
                        <div class="text-center">
                            <a href="index.php"><img src="../assets/images/brand/logo-white.png" class="header-brand-img m-0" alt=""></a>
                        </div>
                    </div>

                    <!-- CONTAINER OPEN -->
                    <div class="container-login100">
                        <div class="wrap-login100 p-6">
                            <form class="login100-form validate-form" id="forgotPassword">
                                <span class="login100-form-title pb-5">
                                    Forgot Password
                                </span>
								
                                <p class="text-Mute">Enter the email address registered on your account</p>
								<p class="msg" style="color:green"></p>
                                <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                        <i class="zmdi zmdi-email" aria-hidden="true"></i>
                                    </a>
                                    <input class="input100 border-start-0 ms-0 form-control" type="email" name="email" id="email" placeholder="Email">
                                </div>
                                <div class="submit">
                                    <!-- <a class="btn btn-primary d-grid" href="index.php">Submit</a> -->
                                    <input style="width:100%" type="submit" name="submit" id="submit" class="btn btn-primary d-grid" value="Submit"/>
                                </div>
                                <div class="text-center mt-4">
                                    <p class="text-dark mb-0">Forgot It?<a class="text-primary ms-1" href="./index.php">Send me Back</a></p>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
<script>
    jQuery("#forgotPassword").on('submit',function(e){
        e.preventDefault();
        var email = jQuery("#email").val();
        jQuery.ajax({
            url:'./ajax_helpers/forgot_password.php',
            method:"get",
            data: {email:email},
            success:function(data){
				jQuery(".msg").html(data);
                
            }
        });
    });
</script>