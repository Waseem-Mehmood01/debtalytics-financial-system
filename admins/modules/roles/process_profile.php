<?php 
    if(isset($_POST)){
        if (isset($_POST['formtype'])) {
        
            if ($_POST['formtype'] == "adminuser"){
                @extract($_POST);
                // print_r($_POST);die(1);
                DB::update("super_admins", array(
                    // 'user_name'   => $user_name,
                    'user_email'   => $user_email,
                    'first_name'   => $first_name,
                    'last_name'   => $last_name,
                    'password'   => $password,
                    'user_avatar_url'   => $user_avatar_url,
                    'user_title'   => $user_title,
                    'user_status'   => $user_status,
                    'last_modified_on'    => $now,
                    'last_modified_by'    => $_SESSION['user_name']
                    ), 'user_id=%s', $user_id);
                    echo '<script type="text/javascript">
                    <!--
                    alert("Profile Updated Successfully");
                    window.location = "index.php?route=modules/roles/profile"
                    //-->
                    </script>';
            }
        }
    }
    
?>