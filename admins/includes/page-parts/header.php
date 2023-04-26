<!doctype html>
<html lang="en" dir="ltr">

    <head>
    <meta charset="UTF-8">
    
        <?php include 'layouts/styles.php'; ?>

    </head>

    <body class="app sidebar-mini ltr light-mode  color-header ">
<style>
	.app-sidebar {
	 background-color: #00A7E1!important;
	 color:white!important;
	}
	.sidebar-mini .side-menu, .side-menu__label,.slide-item  {
	color:white;
	}

	
	
</style>
        <!-- GLOBAL-LOADER -->
        <!-- <div id="global-loader">
            <img src="../assets/images/loader.svg" class="loader-img" alt="Loader">
        </div> -->
        <!-- /GLOBAL-LOADER -->

        <!-- PAGE -->
        <div class="page">
            <div class="page-main">

            <?php if ( (isset($_SESSION['is_logged'])) AND (isset($_SESSION['is_super_admin'])) AND ($_SESSION['is_logged'] == 1)) {
                include 'layouts/app-header.php';  
                include 'layouts/app-sidebar.php';
            }
            ?>

                

            </div>

            