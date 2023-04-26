<?php

$target_id = $_REQUEST['target_id'];
if(!empty($target_id)){
    $query = "SELECT * FROM agent_targets WHERE company_id='".$_SESSION['company_id']."' AND target_id = $target_id";
    $target_data = DB::Query($query);
	//print_r($target_data);
	$title= explode('-', $target_data[0]['target_month_year']);
    $trimmedTitle= trim($title[1]);
	$month = trim($title[0]);
	$year = trim($title[1]);
}else{
	echo '<script type="text/javascript">
<!--
window.location = "index.php?route=modules/targets/viewcompanytargets"
//-->
</script>'
;
}

if (isset($_POST['btnSubmit'])) {

	@extract($_POST);
	 $months_array = array();
	$months_array = explode(',',str_replace('-', ',', $months));
	$years_array = array();
	$years_array = explode(',',str_replace('-', ',', $years));
	$month_year = '';
	$month_year = $months_array[0]."-".$years_array[0];
DB::update("agent_targets", array(
			'target_amount'=> $company_target,
			"target_month_year"=> $month_year,
			'agents_id' => $agents,
		), 'target_id=%s', $target_id);

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
										<h3 class="card-title">Add Company Targets</h3>
                                        </div>
                                        <div class="card-body">
										<form class="form-horizontal" action="" method="POST">
                                        <div class="col-md-9 mt-3 mb-3">
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <span class="fa fa-clock-o tx-16 lh-0 op-6"></span>
                                                    </div>
                                                    <input class="form-control" autocomplete="off" id="datepicker-month" name="months" placeholder="Select Month" type="text" value="<?php echo $month; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-9 mt-3 mb-3">
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <span class="fa fa-clock-o tx-16 lh-0 op-6"></span>
                                                    </div>
                                                    <input class="form-control" autocomplete="off" id="datepicker-year" name="years" placeholder="Select Year" type="text" value="<?php echo $year; ?>">
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
                                            <option value="<?php echo $row['user_id']; ?>" <?php if($row['user_id'] == $target_data[0]['agents_id']) echo 'SELECTED'; ?>><?php echo ShowAgentName($row['user_id']); ?></option>
                                            <?php }?>     
                                                </select>
                                            </div>
                                            <div class="col-md-9 mt-3 mb-3">
                                                <label class="col-md-12 form-label"for="company_target">Company Target</label>
                                            <input type="number" name="company_target" class="form-control" required id="company_target" placeholder="0.00" value="<?php echo $target_data[0]['target_amount']; ?>"/>
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
