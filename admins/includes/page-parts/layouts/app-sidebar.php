
			<div class="sticky">
                <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
                <div class="app-sidebar">
                    <div class="side-header">
                        <a class="header-brand1" href="index.php">
                            <img src="<?php echo SITE_ROOT;  ?>assets/images/logo.png" class="header-brand-img desktop-logo" alt="logo">
                            <img src="<?php echo SITE_ROOT;  ?>assets/images/logo.png" class="header-brand-img toggle-logo" alt="logo">
                            <img src="<?php echo SITE_ROOT;  ?>assets/images/logo.png" class="header-brand-img light-logo" alt="logo">
                            <img src="<?php echo SITE_ROOT;  ?>assets/images/logo.png" class="header-brand-img light-logo1" alt="logo">
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
                                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i class="side-menu__icon fe fe-slack"></i><span class="side-menu__label">Companies</span><i class="angle fe fe-chevron-right"></i></a>
                                <ul class="slide-menu">
                                    <li class="side-menu-label1"><a href="javascript:void(0)">Companies</a></li>
                                    <li><a href="index.php?route=modules/companies/viewcompanies" class="slide-item"> View Companies</a></li>
                                    <li><a href="index.php?route=modules/companies/createcompany" class="slide-item"> Create New Company</a></li>
                                </ul>
                            </li>
							
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i class="side-menu__icon fe fe-users"></i><span class="side-menu__label">Users</span><i class="angle fe fe-chevron-right"></i></a>
                                <ul class="slide-menu">
                                    <li class="side-menu-label1"><a href="javascript:void(0)">Users</a></li>
                                    <li><a href="index.php?route=modules/users/viewusers" class="slide-item"> View Users</a></li>
                                    <li><a href="index.php?route=modules/users/createuser" class="slide-item"> Create New Users</a></li>
                                </ul>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i class="side-menu__icon fe fe-folder"></i><span class="side-menu__label">Modules</span><i class="angle fe fe-chevron-right"></i></a>
                                <ul class="slide-menu">
                                    <li class="side-menu-label1"><a href="javascript:void(0)">Modules</a></li>
                                    <li><a href="index.php?route=modules/modules/viewmodules" class="slide-item"> View All Modules</a></li>
                                    <li><a href="index.php?route=modules/modules/createmodule" class="slide-item"> Add New Module</a></li>
                                    <li><a href="index.php?route=modules/modules/assignmoduletocompany" class="slide-item"> Assign Modules to Companies</a></li>
                                    <li><a href="index.php?route=modules/modules/assignmodultousers" class="slide-item"> Assign Modules to Users</a></li>
                                </ul>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i class="side-menu__icon fe fe-cpu"></i><span class="side-menu__label">System Configrations</span><i class="angle fe fe-chevron-right"></i></a>
                                <ul class="slide-menu">
                                    <li class="side-menu-label1"><a href="javascript:void(0)">System Configrations</a></li>
                                    <li><a href="index.php?route=modules/roles/viewroles" class="slide-item"> View Roles</a></li>
                                    <li><a href="index.php?route=modules/system/viewsettings" class="slide-item"> View System Settings</a></li>
                                </ul>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item has-link" data-bs-toggle="slide" href="index.php?route=modules/roles/profile"><i class="side-menu__icon fe fe-zap"></i><span class="side-menu__label">View My Profile</span></a>
                            </li>
                      <!--      <li class="slide">
                                <a class="side-menu__item has-link" data-bs-toggle="slide" href="index.php?route=modules/theme/theme_options"><i class="side-menu__icon fe fe-zap"></i><span class="side-menu__label">Theme Options</span></a>
                            </li>  -->
                        </ul>
                        <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"/></svg></div>
                    </div>
                </div>
                <!--/APP-SIDEBAR-->
            </div>