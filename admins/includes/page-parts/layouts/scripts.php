
		<!-- BACK-TO-TOP -->
		<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

		<!-- JQUERY JS -->
		<!-- <script src="<?php echo SITE_ROOT;  ?>assets/js/jquery.min.js"></script> -->
		<!-- <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script> -->
		<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script> -->
		<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
		
		<!-- BOOTSTRAP JS -->
		<script src="<?php echo SITE_ROOT;  ?>assets/plugins/bootstrap/js/popper.min.js"></script>
		<script src="<?php echo SITE_ROOT;  ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!-- SIDE-MENU JS -->
		<script src="<?php echo SITE_ROOT;  ?>assets/plugins/sidemenu/sidemenu.js"></script>

		<!-- TYPEHEAD JS -->
		<script src="<?php echo SITE_ROOT;  ?>assets/plugins/bootstrap5-typehead/autocomplete.js"></script>
		<script src="<?php echo SITE_ROOT;  ?>assets/js/typehead.js"></script>

		<!-- SIDEBAR JS -->
		<script src="<?php echo SITE_ROOT;  ?>assets/plugins/sidebar/sidebar.js"></script>

		<!-- PERFECT SCROLLBAR JS-->
		<script src="<?php echo SITE_ROOT;  ?>assets/plugins/p-scroll/perfect-scrollbar.js"></script>
		<script src="<?php echo SITE_ROOT;  ?>assets/plugins/p-scroll/pscroll.js"></script>
		<script src="<?php echo SITE_ROOT;  ?>assets/plugins/p-scroll/pscroll-1.js"></script>

		<!-- STICKEY JS -->
		<script src="<?php echo SITE_ROOT;  ?>assets/js/sticky.js"></script>








		<!-- INTERNAL SELECT2 JS -->
        <script src="<?php echo SITE_ROOT;  ?>assets/plugins/select2/select2.full.min.js"></script>

        <!-- DATA TABLE JS-->
        <script src="<?php echo SITE_ROOT;  ?>assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo SITE_ROOT;  ?>assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
        <script src="<?php echo SITE_ROOT;  ?>assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
        <script src="<?php echo SITE_ROOT;  ?>assets/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
        <script src="<?php echo SITE_ROOT;  ?>assets/plugins/datatable/js/jszip.min.js"></script>
        <script src="<?php echo SITE_ROOT;  ?>assets/plugins/datatable/pdfmake/pdfmake.min.js"></script>
        <script src="<?php echo SITE_ROOT;  ?>assets/plugins/datatable/pdfmake/vfs_fonts.js"></script>
        <script src="<?php echo SITE_ROOT;  ?>assets/plugins/datatable/js/buttons.html5.min.js"></script>
        <script src="<?php echo SITE_ROOT;  ?>assets/plugins/datatable/js/buttons.print.min.js"></script>
        <script src="<?php echo SITE_ROOT;  ?>assets/plugins/datatable/js/buttons.colVis.min.js"></script>
        <script src="<?php echo SITE_ROOT;  ?>../assets/plugins/datatable/dataTables.responsive.min.js"></script>
        <script src="<?php echo SITE_ROOT;  ?>assets/plugins/datatable/responsive.bootstrap5.min.js"></script>
        <script src="<?php echo SITE_ROOT;  ?>assets/js/table-data.js"></script>
		<script>
			// $('#body').colorpicker({
			// 	onChange: function(hsb, hex, rgb){
			// 		$("#.header-dropdown-list.message-menu.ps").css("background-color", '#' + hex);
			// 	}
			// 	});
			/*jQuery("#primary_color").on("change, mouseleave",function(){
				var root = document.querySelector(':root');
				var rootStyle = getComputedStyle(root);
				var primaryBgColor = rootStyle.getPropertyValue('--primary-bg-color');
				root.style.setProperty('--primary-bg-color',this.value);
			});
			jQuery("#sidebar_color").on("change, mouseleave",function(){
				var root = document.querySelector(':root');
				var rootStyle = getComputedStyle(root);
				var primaryBgColor = rootStyle.getPropertyValue('--side-bar-color');
				root.style.setProperty('--side-bar-color',this.value);
			});
			jQuery("#theme_option_form").on("submit",function(e){
				e.preventDefault();
				jQuery.ajax({
					method:"post",
					url:"./ajax_helpers/get_theme_options.php",
					data:{"update_theme_option":"update_theme_option",primary_color:jQuery("#primary_color").val(),sidebar_color:jQuery("#sidebar_color").val()},
					success:function(data){
						if (confirm('Your theme Colors successfully Changed')) {
							location.reload();
						}
					}
				});
			});

			



			jQuery.ajax({
				method:"post",
				url:"./ajax_helpers/get_theme_options.php",
				data:{opt:"get_theme_option"},
				success:function(data){
					var obj = jQuery.parseJSON(data);
					jQuery("#primary_color").val(obj['primary_color']);
					jQuery("#sidebar_color").val(obj['sidebar_color']);
					var root = document.querySelector(':root');
					var rootStyle = getComputedStyle(root);
					var primaryBgColor = rootStyle.getPropertyValue('--primary-bg-color');
					root.style.setProperty('--primary-bg-color',obj['primary_color']);
					root.style.setProperty('--side-bar-color',obj['sidebar_color']);
				}
			});*/
			$(".select2").select2({});
		</script>