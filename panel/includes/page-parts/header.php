<?php 
// session_start();
// print_r($_SESSION);die(1);
?>
<!doctype html>
<html lang="en" dir="ltr">

    <head>
    <meta charset="UTF-8">
    
        <?php include 'layouts/styles.php'; ?>
      <?php if((isset($_GET['agent_sales']) and @$_GET['agent_sales'] ==1) || (isset($_GET['agent_sales_vertical']) and @$_GET['agent_sales_vertical'] ==1)) {
    ?>
		<meta http-equiv="refresh" content="30">
    <style>
    .app-header.header.sticky.active,.app-sidebar.open.ps,.main-footer {
        display: none;
    }
    /* @media (min-width: 992px) */
        .app-content {
            margin-left: 0px !important;
        }
    /* } */
</style>
    
    <?php }?>
    </head>

    <body class="app sidebar-mini ltr light-mode  color-header ">

        <!-- GLOBAL-LOADER -->
        <!-- <div id="global-loader">
            <img src="../assets/images/loader.svg" class="loader-img" alt="Loader">
        </div> -->
        <!-- /GLOBAL-LOADER -->

        <!-- PAGE -->
        <div class="page">
            <div class="page-main">

          <?php if ( (isset($_SESSION['is_logged'])) AND (isset($_SESSION['role_id'])) AND ($_SESSION['is_logged'] == 1) and (!isset($_GET['agent_sales_vertical']) and @$_GET['agent_sales_vertical'] !=1) and (!isset($_GET['agent_sales']) and @$_GET['agent_sales'] !=1)) {
                include 'layouts/app-header.php';  
                include 'layouts/app-sidebar.php';
            }
            ?>

                

            </div>

            