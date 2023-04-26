   
   
   
   <!-- MAIN-CONTENT -->
   <div class="main-content app-content mt-0">
                    <div class="side-app">

                        <!-- CONTAINER -->
                        <div class="main-container container-fluid">

                            <!-- PAGE-HEADER -->
                            <div class="page-header">
                                <h1 class="page-title"><?php
			  if (isset($_SESSION['company_name'])) {
				  echo $_SESSION['company_name'];
			  }

			  ?> 
			  <small> <?php
			  if (isset($_SESSION['role_id'])) {
				  echo ShowRoleName($_SESSION['role_id']);
			  }
				
			  ?> Dashboard</small></h1>
                                <!-- <div>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Dashboard 01</li>
                                    </ol>
                                </div> -->
                            </div>
                            <!-- PAGE-HEADER END -->
                            <?php 
                            if($_SESSION['role_id'] == 4 OR $_SESSION['role_id'] == 5){
								include 'agent_dashboard.php';
                                // get_agent_create_sale_sidebar();
                            }else if($_SESSION['role_id'] == 2){
								include 'admin_dashboard.php';
                                //get_company_dashboard();
                            }else if($_SESSION['role_id'] == 3){
								include 'manager_dashboard.php';
							}
                            ?>



















                            































                            
                           
                           
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
 
   
   
   