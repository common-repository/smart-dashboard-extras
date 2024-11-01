<?php
	include ('admin-author-credit.php');
	require 'plugin-config.php';
	
	echo st_sd_admin_autor_credit();
	echo st_admin_options_display();

function st_admin_options_display() { ?>
    <!-- Create a header in the default WordPress 'wrap' container -->
    <div class="wrap">
	 <h2>Smart Dashboard Settings</h2>
	 <p>Customize your WordPress admin dashboard by selectively removing interface elements and to get more out of WordPress. Use the following image to correlate the dashboard settings. </p>
	 <!--End author credit-->         
        <?php $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'display_options'; ?>
        <h2 class="nav-tab-wrapper">
            <a href="?page=st-dashboard-options&tab=display_options" class="nav-tab <?php echo $active_tab == 'display_options' ? 'nav-tab-active' : ''; ?>">Dashboard Customisation</a>
            <a href="?page=st-dashboard-options&tab=social_options" class="nav-tab <?php echo $active_tab == 'social_options' ? 'nav-tab-active' : ''; ?>">Misc Settings</a>
        </h2>
         
	<form method="post" action="options.php">
		<?php 
			global $dashboardSettings;
			global $miscSettings;
	
			//$groupName = 'st-sd-admin-options-group'; 
			if( $active_tab == 'display_options' ) {
				settings_fields( $dashboardSettings); 
			    do_settings_sections( $dashboardSettings);
				include ('admin-dash-config.php');
				echo st_admin_dash_config();
			} else {
				settings_fields( $miscSettings); 
			    do_settings_sections( $miscSettings);
				include('admin-misc-config.php');
				echo st_admin_misc_config();
			}	
		?>
		
		<table class="form-table">
		 <tr> <td><?php submit_button(); ?></td></tr>
		</table>
	</form>
   </div><!-- /.wrap -->
<?php
} // end
?>








