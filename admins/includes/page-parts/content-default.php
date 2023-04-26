<!-- MAIN-CONTENT -->
<div class="main-content app-content mt-0">
                    <div class="side-app">

                        <!-- CONTAINER -->
                        <div class="main-container container-fluid">

                            <!-- PAGE-HEADER -->
                            <div class="page-header">
                                <h1 class="page-title">Super Admin Tool <small>Version 1.0</small></h1>
                                <!-- <div>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Dashboard 01</li>
                                    </ol>
                                </div> -->
                            </div>
                            <!-- PAGE-HEADER END -->

                            <!-- ROW-1 -->
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xl-6 col-xxl-3">
                                            <div class="card overflow-hidden">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="mt-2">
                                                            <h6 class="">Total Companies</h6>
                                                            <h2 class="mb-0 number-font"><?php $companies = round0dp(DB::queryFirstField("SELECT COUNT(*) FROM companies")); echo $companies; ?></h2>
                                                        </div>
                                                        <div class="ms-auto">
                                                            <div class="chart-wrapper mt-1">
                                                                <canvas id="saleschart" class="h-8 w-9 chart-dropshadow"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span class="text-muted fs-12"><span class="text-secondary"><i class="fe fe-arrow-up-circle  text-secondary"></i> 5%</span> Last week</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xl-6 col-xxl-3">
                                            <div class="card overflow-hidden">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="mt-2">
                                                            <h6 class="">Total Users</h6>
                                                            <h2 class="mb-0 number-font"><?php $users = DB::queryFirstField("SELECT COUNT(*) FROM admin_users "); echo round0dp($users);?></h2>
                                                        </div>
                                                        <div class="ms-auto">
                                                            <div class="chart-wrapper mt-1"><canvas id="leadschart" class="h-8 w-9 chart-dropshadow"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span class="text-muted fs-12"><span class="text-pink"><i class="fe fe-arrow-down-circle text-pink"></i> 0.75%</span> Last 6 days</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xl-6 col-xxl-3">
                                            <div class="card overflow-hidden">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="mt-2">
                                                            <h6 class="">Total Modules</h6>
                                                            <h2 class="mb-0 number-font"><?php echo round0dp(DB::queryFirstField("SELECT COUNT(*) FROM modules")); ?></h2>
                                                        </div>
                                                        <div class="ms-auto">
                                                            <div class="chart-wrapper mt-1"> <canvas id="profitchart" class="h-8 w-9 chart-dropshadow"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span class="text-muted fs-12"><span class="text-green"><i class="fe fe-arrow-up-circle text-green"></i> 0.9%</span> Last 9 days</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xl-6 col-xxl-3">
                                            <div class="card overflow-hidden">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="mt-2">
                                                            <h6 class="">Total Cost</h6>
                                                            <h2 class="mb-0 number-font">$59,765</h2>
                                                        </div>
                                                        <div class="ms-auto">
                                                            <div class="chart-wrapper mt-1"> <canvas id="costchart" class="h-8 w-9 chart-dropshadow"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span class="text-muted fs-12"><span class="text-warning"><i class="fe fe-arrow-up-circle text-warning"></i> 0.6%</span> Last year</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           

                            <!-- ROW-3 -->
                            <div class="row">
                                <div class="col-xxl-4 col-md-12 col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title fw-semibold">Search By Name or Keyword</h4>
                                        </div>
                                        <div class="card-body pb-2">
                                          <div class="form-group">
                                            <input id="qk" type="text" name="qp" placeholder="Type a Keyword..." class="form-control" required="">
                                          </div>
                                              <button id="search_by_name" class="btn btn-primary" type="button">Search</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 col-xxl-4">
                                    <div class="card overflow-hidden">
                                        <div class="card-header">
                                            <div>
                                                <h3 class="card-title">Select a Company</h3>
                                            </div>
                                        </div>
                                        <div class="card-body pb-2">
                                            <div class="form-group">
                                                <select name="country" class="form-control form-select select2" data-bs-placeholder="Select Country">
                                                <?php 				
                                                    $company_list = DB::Query("SELECT company_name  FROM companies ORDER BY company_name ASC");
                                                    foreach($company_list as $company){
                                                      echo "<option value='".$company['company_name']."' >".$company['company_name']."</option>";
                                                    }
                                                ?>	
                                                </select>
                                            </div>
                                            <button id="companies" class="btn btn-primary" type="button">View Company</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 col-xxl-4">
                                    <div class="card overflow-hidden">
                                        <div class="card-header">
                                            <div>
                                                <h3 class="card-title">Search By Phone</h3>
                                            </div>
                                        </div>
                                        <div class="card-body pb-2">
                                        <div class="form-group">
                                          <input id="qp" type="text" name="qp" placeholder="Type Phone No ..." class="form-control" required="">
                                        </div>
                                            <button id="search_by_phone" class="btn btn-primary" type="button">Search</button>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- ROW-3 END -->

                           
                        </div>
                        <!-- CONTAINER END -->
                    </div>
                </div>
                <!-- MAIN-CONTENT CLOSED -->    
    
    
    
    <!--SIDEBAR-RIGHT-->
<?php //include 'layouts/sidebar-right.php'; ?>
    
    
    
    
<script type="text/javascript">
$('#search_by_name').click(function(event){
		var q = $('#qk').val();
		url = encodeURI('index.php?route=modules/search/search_by_tag&q='+q);
		if(q != '') {
		
	 	$(location).prop('href', url);
	 	
		} else {
			alert('Min 3 Char Keyword Required');
		}


});
$('#customer_by_city').click(function(event){
		var q = $('#city_name').val();
		url = encodeURI('index.php?route=modules/customers/customers_in_city&customer_city='+q);
		if(q != '') {
		
	 	$(location).prop('href', url);
	 	
		} else {
			alert('Select a City First');
		}


});	

$('#vendor_by_city').click(function(event){
		var q = $('#city_name').val();
		url = encodeURI('index.php?route=modules/vendors/vendors_in_city&vendor_city='+q);
		if(q != '') {
		
	 	$(location).prop('href', url);
	 	
		} else {
			alert('Select a City First');
		}


});


$('#search_by_cn').click(function(event){
		var q = $('#q').val();
		q = encodeURI('ajax_helpers/ajax_search_by_tracking_no.php?q='+q);
	 	$("#results").html("");
	 	var url = q;
	 		//alert(url);
		 $("#results").load(url);
	 
	 


});
$('#search_by_phone').click(function(event){
		var q = $('#qp').val();
		q = encodeURI("ajax_helpers/ajax_search_by_phone_no.php?q="+q);
		alert(q);
		
	 	$("#results").html("");
	 	var url = q;
	 		//alert(url);
		 $("#results").load(url);
	 
	 


});

</script>
 