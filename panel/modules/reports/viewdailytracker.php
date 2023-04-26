

<?php 

if(isset($_REQUEST['search'])){
    @extract($_POST);
        // print_r($_POST);
        $dates = array();
        $searchQuery = '';
        if(!empty($days) OR !empty($months) OR !empty($years) ){
            $days_array = array();
            $days_array = explode(',',str_replace('-', ',', $days));
            $months_array = array();
            $months_array = explode(',',str_replace('-', ',', $months));
            $years_array = array();
            $years_array = explode(',',str_replace('-', ',', $years));
            foreach($years_array as $yr){
                foreach($months_array as $mn) {
                    foreach($days_array as $dy) {
                        array_push($dates,$yr.'-'.date("m", strtotime($mn)).'-'.$dy);
                    }
                }
            }
            // print_r($dates);
            // $currentWeek = array();
            $currentWeek = array('start_week'=>$dates[0],'end_week'=>end($dates));
            $period =  getDatesFromRange($dates[0],end($dates));        
        }
}else{
    $currentWeek = array();
    $currentWeek = get_current_week_start_end_date();
    $searchQuery = "m.date BETWEEN '".$currentWeek['start_week']."' AND '".$currentWeek['end_week']."' ";
    $period = array();
    $period =  getDatesFromRange($currentWeek['start_week'],$currentWeek['end_week']);
}

?>

<div class="main-content app-content mt-0">
    <div class="side-app">

    <!-- CONTAINER -->
    <div class="main-container container-fluid">
        <!-- PAGE-HEADER -->
        <div class="page-header">
                                <h1 class="page-title">Daily Tracker Report</h1>
                                <div>
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item"><a href="#">Reports</a></li>
									<li class="breadcrumb-item active">Daily Tracker Report</li>
								</ol>
                                </div>
                            </div>
									
									
                            <!-- PAGE-HEADER END -->
                            <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Search Filters:</div>
                    </div>
                <form method="POST" action="#">    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <i class="fa fa-clock-o tx-16 lh-0 op-6"></i>
                                    </div>
                                    <input class="form-control" id="datepicker-date" name='days' placeholder="Date Range" type="text" autocomplete="OFF">
                                </div>
                            </div>
                            <div class="col-md-3 mt-4 mt-md-0">
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <span class="fa fa-clock-o tx-16 lh-0 op-6"></span>
                                    </div>
                                    <input class="form-control" id="datepicker-month" name="months" placeholder="Month Range" type="text" autocomplete="OFF">
                                </div>
                            </div>
                            <div class="col-md-3 mt-4 mt-md-0">
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <span class="fa fa-clock-o tx-16 lh-0 op-6"></span>
                                    </div>
                                    <input class="form-control" id="datepicker-year" name="years" placeholder="Year Range" type="text" autocomplete="OFF">
                                </div>
                            </div>
                            <div class="col-md-3 mt-4 mt-md-0">
                                <div class="input-group">
                                    <button type="submit" name="search" value="submit" class="btn btn-primary"><span class="fa fa-eye"></span>&nbsp;Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
        
        
<div class="row">
   <div class="col-xl-12"> 
      <div class="card">
         <div class="card-header">
            <h3 class="card-title">Daily Tracker Report</h3>
         </div>
         <div class="card-body">
            <div class="table-responsive">

                    

                    <table class="table border text-nowrap text-md-nowrap table-bordered mb-0">
                    
                    <tbody>
                        <tr>
                            <td><b>Number of Weeks</b></td>
                            <td><?php echo date('d/m',strtotime($period[0]))." - ".date('d/m',strtotime(end($period))); ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><b>Metrics</b></td>
                            <td style="background-color:#92d050;"><b>M</b></td>
                            <td style="background-color:#92d050;"><b>T</b></td>
                            <td style="background-color:#92d050;"><b>W</b></td>
                            <td style="background-color:#92d050;"><b>TH</b></td>
                            <td style="background-color:#92d050;"><b>F</b></td>
                            <td style="background-color:#92d050;"><b>S<b></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="background-color:#ffe699"><b>APPS</b></td>
                            <td style="background-color:#ffe699"><b>App Team</b></td>
                            <?php 
                                foreach ($period as $dt) {
                                    $dayName =  date('l', strtotime($dt));
                                ?>
                                
                                <td><?php echo get_daily_tracker_data("inbound_apps",$dayName); ?></td>
                                    
                                <?php 
                                }
                            ?>
                            <td></td>
                        </tr>
                        <tr   >
                            <td>&nbsp;</td>
                            <td style="background-color:#ffe699"><b>Outbound</b></td>
                            <?php 
                                foreach ($period as $dt) {
                                    $dayName =  date('l', strtotime($dt));
                                ?>
                                
                                <td><?php echo get_daily_tracker_data("out_bound_apps",$dayName); ?></td>
                                    
                                <?php 
                                }
                            ?>
                            <td></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td style="background-color:#ffe699"><b>Inbound New Lead</b></td>
                            <?php 
                                foreach ($period as $dt) {
                                    $dayName =  date('l', strtotime($dt));
                                ?>
                                
                                <td><?php echo get_daily_tracker_data("inbound_new_leads",$dayName); ?></td>
                                    
                                <?php 
                                }
                            ?>
                            <td></td>
                        </tr>
                        <tr >
                            <td style="background-color:#ddebf7"><b>PITCHES</b></td>
                            <td style="background-color:#ddebf7"><b>Previously Scheduled Pitches</b></td>
                            <?php 
                                foreach ($period as $dt) {
                                    $dayName =  date('l', strtotime($dt));
                                ?>
                                
                                <td><?php echo get_daily_tracker_data("today_schedule_patched",$dayName); ?></td>
                                    
                                <?php 
                                }
                            ?>
                            <td></td>
                        </tr>
                        <tr  >
                            <td>&nbsp;</td>
                            <td style="background-color:#ddebf7"><b>Same Day Pitches</b></td>
                            <?php 
                                foreach ($period as $dt) {
                                    $dayName =  date('l', strtotime($dt));
                                ?>
                                
                                <td><?php echo get_daily_tracker_data("sameday_patches",$dayName); ?></td>
                                    
                                <?php 
                                }
                            ?>
                            <td></td>
                        </tr>
                        <tr  >
                            <td>&nbsp;</td>
                            <td style="background-color:#ddebf7"><b>Pitches
                                Completed</b>
                            </td>
                            <?php 
                                foreach ($period as $dt) {
                                    $dayName =  date('l', strtotime($dt));
                                ?>
                                
                                <td><?php echo get_daily_tracker_data("patches_completed",$dayName); ?></td>
                                    
                                <?php 
                                }
                            ?>
                            <td></td>
                        </tr>
                        <tr  >
                            <td>&nbsp;</td>
                            <td style="background-color:#ddebf7"><b># of One 1CC</b>
                            </td>
                            <?php 
                                foreach ($period as $dt) {
                                    $dayName =  date('l', strtotime($dt));
                                ?>
                                
                                <td><?php echo get_daily_tracker_data("num_cc",$dayName); ?></td>
                                    
                                <?php 
                                }
                            ?>
                            <td></td>
                        </tr>
                        <tr  >
                            <td>&nbsp;</td>
                            <td style="background-color:#ddebf7"><b># of Deals</b>
                            </td>
                            <?php 
                                foreach ($period as $dt) {
                                    $dayName =  date('l', strtotime($dt));
                                ?>
                                
                                <td><?php echo get_daily_tracker_data("num_of_deals",$dayName); ?></td>
                                    
                                <?php 
                                }
                            ?>
                            <td></td>
                        </tr>
                        <tr  >
                            <td>&nbsp;</td>
                            <td style="background-color:#ddebf7"><b># of New Leads
                                Untouched</b>
                            </td>
                            <?php 
                                foreach ($period as $dt) {
                                    $dayName =  date('l', strtotime($dt));
                                ?>
                                
                                <td><?php echo get_daily_tracker_data("number_of_new_untouched_leads",$dayName); ?></td>
                                    
                                <?php 
                                }
                            ?>
                            <td></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><b>Grand Total Week</b></td>
                        </tr>
                        <tr>
                            <td style="background-color:#e2efda"><b>TOTALS</b></td>
                            <td style="background-color:#e2efda"><b>Total Apps</b></td>
                            <?php 
                                foreach ($period as $dt) {
                                    $dayName =  date('l', strtotime($dt));
                                ?>
                                
                                <td style="background-color:#ffff00"><?php echo get_totals_of_weekly_tracking("Total Apps",$dayName); ?></td>
                                    
                                <?php 
                                }
                            ?>
                            <td style="background-color:#92d050"><?php echo get_grand_totals_of_weekly_tracking("Total Apps Per Week",$period[0],end($period)); ?></td>
                        </tr>
                        <tr  >
                            <td>&nbsp;</td>
                            <td style="background-color:#e2efda"><b>Previous
                                Scheduled To Pitch %</b>
                            </td>
                            <?php 
                                foreach ($period as $dt) {
                                    $dayName =  date('l', strtotime($dt));
                                ?>
                                
                                <td style="background-color:#ffff00"><?php echo get_totals_of_weekly_tracking("Pitches",$dayName); ?></td>
                                    
                                <?php 
                                }
                            ?>
                            <td style="background-color:#92d050"><?php echo get_grand_totals_of_weekly_tracking("Schedule Pitch",$period[0],end($period)); ?></td>
                        </tr>
                        <tr  >
                            <td>&nbsp;</td>
                            <td style="background-color:#e2efda"><b>Pitch to Close %</b></td>
                            <?php 
                                foreach ($period as $dt) {
                                    $dayName =  date('l', strtotime($dt));
                                ?>
                                
                                <td style="background-color:#ffff00"><?php echo get_totals_of_weekly_tracking("Pitches to Close",$dayName); ?></td>
                                    
                                <?php 
                                }
                            ?>
                            <td style="background-color:#92d050"><?php echo get_grand_totals_of_weekly_tracking("Pitch to Close",$period[0],end($period)); ?></td>
                        </tr>
                        <tr  >
                            <td>&nbsp;</td>
                            <td style="background-color:#e2efda"><b>% of one Call
                                Close Deals</b>
                            </td>
                            <td style="background-color:#ffff00">&nbsp;</td>
                            <td style="background-color:#ffff00">&nbsp;</td>
                            <td style="background-color:#ffff00">&nbsp;</td>
                            <td style="background-color:#ffff00">&nbsp;</td>
                            <td style="background-color:#ffff00">&nbsp;</td>
                            <td style="background-color:#ffff00">&nbsp;</td>
                            <td style="background-color:#92d050">&nbsp;</td>
                        </tr>
                        <tr  >
                            <td>&nbsp;</td>
                            <td style="background-color:#e2efda" ><b>Total Deals For
                                The Week</b>
                            </td>
                           
                            <td style="background-color:#ffff00"><?php echo totalDealsOfWeek("Total Deals Of Week",$period[0],end($period)); ?></td>
                            <td style="background-color:#ffff00"></td>
                            <td style="background-color:#ffff00"></td>
                            <td style="background-color:#ffff00"></td>
                            <td style="background-color:#ffff00"></td>
                            <td style="background-color:#ffff00"></td>
                            <td style="background-color:#92d050">&nbsp;</td>
                        </tr>
                        
                    </tbody>
                    </table>







            </div>
         </div>
      </div>
   </div>
 
</div>
</div>
   </div>
</div>