<?php
 //print_r($_REQUEST);die(1);
if (isset($_REQUEST['matrics_id'])) {
    $matrics_id = $_REQUEST['matrics_id'];
	DB::delete('matrics_intake', 'matrics_id=%s', $matrics_id);
    echo '<script type="text/javascript">
    <!--
    window.location = "'.$_SERVER['HTTP_REFERER'].'&del=yes"
    //-->
    </script>'
        ;
}
?>