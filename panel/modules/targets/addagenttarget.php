<?php

$company_id = $_SESSION['company_id'];

if (isset($_POST['btnSubmit'])) {

	@extract($_POST);
        $months_array = array();
        $months_array = explode(',',str_replace('-', ',', $months));
        $years_array = array();
        $years_array = explode(',',str_replace('-', ',', $years));
        $month_year = '';
        $month_year = $months_array[0]."-".$years_array[0];
		DB::insert("agent_targets", array(
			'target_amount'=> $agent_target,
			"target_month_year"=> $month_year,
			'agents_id' => $agents,
			'company_id'   => $company_id,
			));	
 	
 
 	echo '<script type="text/javascript">
 <!--
 window.location = "index.php?route=modules/targets/viewagenttargets"
 //-->
 </script>'
 ;

}


?><div class="main-content app-content mt-0">
                    <div class="side-app">

                        <!-- CONTAINER -->
                        <div class="main-container container-fluid">

                            <!-- PAGE-HEADER -->
                            <div class="page-header">
                                <h1 class="page-title">Agent Targets</h1>
                                <div>
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<!-- <li class="breadcrumb-item"><a href="index.php?route=modules/dataentry/viewsalesintake">Sales Intake</a></li> -->
									<li class="breadcrumb-item active">Add Agent Targets</li>
								</ol>
                                </div>
                            </div>
                            <!-- PAGE-HEADER END -->








							<div class="row">
                                <div class="col-xl-6 col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
										<h3 class="card-title">Add Agent Targets</h3>
                                        </div>
                                        <div class="card-body">
										<form class="form-horizontal" action="" method="POST">
                                        <div class="col-md-9 mt-3 mb-3">
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <span class="fa fa-clock-o tx-16 lh-0 op-6"></span>
                                                    </div>
                                                    <input class="form-control" autocomplete="off" id="datepicker-month" name="months" placeholder="Select Month" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-9 mt-3 mb-3">
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <span class="fa fa-clock-o tx-16 lh-0 op-6"></span>
                                                    </div>
                                                    <input class="form-control" autocomplete="off" id="datepicker-year" name="years" placeholder="Select Year" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-9 mt-3 mb-3">
                                                <label class="col-md-12 form-label" for="agent">Select Agent</label>
                                                <select class="col-md-12 form-label ajiSelect" name="agents">
                                                <?php 
                                                $query = "SELECT user_id,first_name,last_name FROM admin_users WHERE company_id='".$_SESSION['company_id']."' AND role_id in(4,5)";
                                                $all_agents = DB::Query($query);
                                                foreach($all_agents as $row){
                                            ?>
                                            <option value="<?php echo $row['user_id']; ?>"><?php echo ShowAgentName($row['user_id']); ?></option>
                                            <?php }?>     
                                                </select>
                                            </div>
                                            <div class="col-md-9 mt-3 mb-3 mt-3 mb-3">
                                                <label class="col-md-12 form-label"for="agent_target">Agent Target</label>
                                            <input type="number" name="agent_target" class="form-control" required id="agent_target" placeholder="0.00"/>
                                            </div>
                                                <div class="card-footer text-end">
                                            <button type="submit" name="btnSubmit" class="btn btn-success my-1">Save</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <!--CONTAINER CLOSED -->

                    </div>
                </div>