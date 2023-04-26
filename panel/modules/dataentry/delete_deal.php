<?php
 //print_r($_REQUEST);die(1);
if (isset($_REQUEST['sale_id'])) {
    $sale_id = $_REQUEST['sale_id'];
	DB::delete('sales_intake', 'sale_id=%s', $sale_id);
    echo '<script type="text/javascript">
    <!--
    window.location = "'.$_SERVER['HTTP_REFERER'].'&del=yes"
    //-->
    </script>'
        ;
}
?>