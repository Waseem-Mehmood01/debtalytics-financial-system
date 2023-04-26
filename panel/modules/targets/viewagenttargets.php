<?php 
$query = "SELECT * FROM agent_targets WHERE company_id='".$_SESSION['company_id']."'";
$target_data = DB::Query($query);
?>
<div class="main-content app-content mt-0">
    <div class="side-app">
        <div class="main-container container-fluid">
            <div class="page-header">
                <h1 class="page-title">Agent Targets</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Reports</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">View Agent Targets</a></li>
                    </ol>
                </div>
            </div>
            
				
            
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table border text-nowrap text-md-nowrap mb-0">
                            <thead class="report-header">
                                    <tr>
										<th>ID</th>
                                        <th>Month/Year</th>
                                        <th>Target Amount</th>
										<th>Agent Name</th>
                                        <th>Actions</th>
                                    </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i = 0;
                                    foreach($target_data as $res){
                                        $i++;
                                ?>
                                <tr>
									<td><?php echo $i; ?></td>
                                    <td><?php echo $res['target_month_year']; ?></td>
									<td><b>$<?php echo number_format($res['target_amount']); ?></b></td>
									<td><?php echo ShowAgentName($res['agents_id']); ?></td>
                                    <td><div class="btn-list" style="display:flex">
		 <a class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-original-title="Edit" href="?route=modules/targets/editagenttarget&amp;target_id=<?php echo $res['target_id']; ?>"><span class="fe fe-edit fs-14"></span></a>
</div></td>
                                </tr>

                            <?php } 
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>   
            