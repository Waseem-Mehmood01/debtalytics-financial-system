<?php
// print_r($_REQUEST);die(1);
if (isset($_REQUEST['sale_id'])) {
    $sale_id = $_REQUEST['sale_id'];
    $status = $_REQUEST['status'];
	DB::update("sales_intake", array(
        'status'=> $status, 
        ), 'sale_id=%s', $sale_id);
    echo '<script type="text/javascript">
    <!--
    window.location = "'.$_SERVER['HTTP_REFERER'].'"
    //-->
    </script>'
        ;
} else {

   
}
?>