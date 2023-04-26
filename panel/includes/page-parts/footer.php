<?php if ( (isset($_SESSION['is_logged'])) AND (isset($_SESSION['role_id'])) AND ($_SESSION['is_logged'] == 1)) {
            include 'layouts/modal.php';
            include 'layouts/footer.php'; 
        }
?>
            <!-- FOOTER END -->

        </div>

        <?php include 'layouts/scripts.php'; ?>

        <!-- INTERNAL  CHART JS-->
        <script src="<?php echo SITE_ROOT;  ?>assets/plugins/chart/Chart.bundle.js"></script>
        <script src="<?php echo SITE_ROOT;  ?>assets/plugins/chart/utils.js"></script>

        <!-- INTERNAL SELECT2 JS -->
        <script src="<?php echo SITE_ROOT;  ?>assets/plugins/select2/select2.full.min.js"></script>

        <!-- INTERNAL DATA TABLES JS -->
        <script src="<?php echo SITE_ROOT;  ?>assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo SITE_ROOT;  ?>assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
        <script src="<?php echo SITE_ROOT;  ?>assets/plugins/datatable/dataTables.responsive.min.js"></script>

        <!-- INTERNAL FLOT JS -->
        <script src="<?php echo SITE_ROOT;  ?>assets/plugins/flot/jquery.flot.js"></script>
        <script src="<?php echo SITE_ROOT;  ?>assets/plugins/flot/jquery.flot.fillbetween.js"></script>
        <script src="<?php echo SITE_ROOT;  ?>assets/plugins/flot/chart.flot.sampledata.js"></script>
        <script src="<?php echo SITE_ROOT;  ?>assets/plugins/flot/dashboard.sampledata.js"></script>

        <!-- INTERNAL VECTOR JS -->
        <script src="<?php echo SITE_ROOT;  ?>assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="<?php echo SITE_ROOT;  ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

        <!-- INTERNAL INDEX1 JS -->
        <script src="<?php echo SITE_ROOT;  ?>assets/js/index1.js"></script>

        <?php include 'layouts/main-scripts.php'; ?>
        <!-- <script src="<?php echo SITE_ROOT;  ?>assets/js/tooltip&popover.js"></script> -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tooltip.js/1.3.1/tooltip.min.js" integrity="sha512-ZAFwin0nQNXMJRo329TcU4ZyC+ZgKbnaopq/LH/6j7n9zT7ZVLK5BiSmnqgx7jNiewVLgc04geoE62cNN1D8VQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
        

    </body> 

</html>
<script>
    $(document).ready(function() {
    $('.ajiSelect').select2();
});
</script>




