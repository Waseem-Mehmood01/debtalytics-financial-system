
<div class="sticky">
                <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
                <div class="app-sidebar">
                    <div class="side-header">
                        <a class="header-brand1" href="index.php">
                            <img src="<?php
		if (isset($_SESSION['company_logo'])) {
			echo $_SESSION['company_logo'];
		}

		?>" class="header-brand-img desktop-logo" alt="logo">
                            <img src="<?php
		if (isset($_SESSION['company_logo'])) {
			echo $_SESSION['company_logo'];
		}

		?>" class="header-brand-img toggle-logo" alt="logo">
                            <img src="<?php
		if (isset($_SESSION['company_logo'])) {
			echo $_SESSION['company_logo'];
		}

		?>" class="header-brand-img light-logo" alt="logo">
                            <img src="<?php
		if (isset($_SESSION['company_logo'])) {
			echo $_SESSION['company_logo'];
		}

		?>" class="header-brand-img light-logo1" alt="logo" style="height: 70px;">
                        </a>
                        <!-- LOGO -->
                    </div>
                    <div class="main-sidemenu">
                        <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"/></svg></div>
                        <ul class="side-menu">
                            
                            <li class="slide">
                                <a class="side-menu__item has-link" data-bs-toggle="slide" href="index.php"><i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span></a>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href=""><i class="side-menu__icon fe fe-slack"></i><span class="side-menu__label">Data Entry</span><i class="angle fe fe-chevron-right"></i></a>
                                <ul class="slide-menu">
                                    <li class="side-menu-label1"><a href="javascript:void(0)">Data Entry</a></li>
                                   
                                    <li><a href="index.php?route=modules/dataentry/createsalesintake" class="slide-item"> Add Deals</a></li>
									<?php 
                            if($_SESSION['role_id'] == 4){
                            ?>
                                    <li><a href="index.php?route=modules/dataentry/createmetricsintake" class="slide-item"> Daily Tracker</a></li><?php }?>
                                    
									
                                    
									
                                </ul>
                            </li>
                            
							<li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href=""><i class="side-menu__icon fe fe-slack"></i><span class="side-menu__label">Reports</span><i class="angle fe fe-chevron-right"></i></a>
                                <ul class="slide-menu">
                                    <li class="side-menu-label1"><a href="javascript:void(0)">Reports</a></li>
									
									<?php 
                            if($_SESSION['role_id'] != 4 AND $_SESSION['role_id'] != 5){
                            ?>
                                    <li><a href="index.php?route=modules/reports/ad_hoc" class="slide-item"> Adhoc Report</a></li>
									<li><a href="index.php?route=modules/reports/trackingreport" class="slide-item"> Tracking Report</a></li>
									
									 
                                    <?php }else{?>
									
							<li><a href="index.php?route=modules/reports/viewdailytracker" class="slide-item"> Weekly Tracker</a></li>
							<?php }?>
									<li><a href="index.php?route=modules/dataentry/viewmetricsintake" class="slide-item"> Daily Tracker</a></li>
									<li><a href="index.php?route=modules/dataentry/viewsalesintake" class="slide-item"> Deals</a></li>
									<?php 
                            if($_SESSION['role_id'] == 3){
                            ?>
									<li><a href="index.php?route=modules/reports/managersalesummaryreport" class="slide-item"> Sales Summary Report</a></li><?php }?>
                                </ul>
                            </li>
                            

                            <?php 
                            if($_SESSION['role_id'] == 2){
                            ?>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href=""><i class="side-menu__icon fe fe-slack"></i><span class="side-menu__label">Agents</span><i class="angle fe fe-chevron-right"></i></a>
                                <ul class="slide-menu">
                                    <!-- <li class="side-menu-label1"><a href="javascript:void(0)">Users</a></li> -->
                                    <li><a href="index.php?route=modules/users/createuser" class="slide-item"> Add Agent</a></li>
									<li><a href="index.php?route=modules/users/view_agents" class="slide-item"> View Agents</a></li>
                                </ul>
                            </li>
                            <?php }?>
							<?php 
							if($_SESSION['role_id'] == 2){
							?>
							<li class="slide">
                                <a class="side-menu__item has-link" data-bs-toggle="slide" href="index.php?agent_sales=1"><i class="side-menu__icon fe fe-tv"></i><span class="side-menu__label">Tv View</span></a>
                            </li>
							 <li class="slide">
                                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="index.php?agent_sales_vertical=1"><i class="side-menu__icon fe fe-tv"></i><span class="side-menu__label">Tv View Vertical</span></a>
                                </li>
							<?php }?>
                            <li class="slide">
                                <a class="side-menu__item has-link" data-bs-toggle="slide" href="index.php?route=modules/profile/profile"><i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">My Profile</span></a>
                            </li>
                        </ul>
                        <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"/></svg></div>
                    </div>
                </div>
                <!--/APP-SIDEBAR-->
            </div>