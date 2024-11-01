<?php 
if( !function_exists("st_admin_dash_config") ) {
	function st_admin_dash_config() {
		$link = plugins_url( 'smart-dashboard-extras.png', __FILE__ );
		echo "<a href='$link' target='_blank' title='settings to admin interface mapping; click to view full size' style='position: absolute;left: 600px;border: 2px solid #eae7e7;'>";
		echo "<img src='$link' width='425' alt='settings to admin interface mapping' />";
		echo '<br /><center><em>Click to view full size.</em></center></a>';?>
		
	    <table class="form-table">
	   	 <!--Remove wordpress Logo-->
	        <tr valign="top">
	        <th scope="row"><label for="blogdescription">1. Wordpress Logo</label></th>
	        <td>
	    		 <input name="st_can_remove_wordpress_logo" type="checkbox" id="st_can_remove_wordpress_logo" value="1" <?php checked(true, get_option('st_can_remove_wordpress_logo')); ?> >
	    		 <label for="st_can_remove_wordpress_logo">Hide WordPress logo in dashboard?</label>
	    	 	<p class="description" id="tagline-description">Show/Hide WordPress logo for all users.</p></td>
	   	 </td>
	        </tr>
	   
	 	 <!--Remove dashboard menu  -->
	      <tr valign="top">
	      <th scope="row"><label for="blogdescription">2. Dashboard Menu</label></th>
	      <td>
	 		 <input name="st_can_remove_dashboard_menu" type="checkbox" id="st_can_remove_dashboard_menu" value="1" <?php checked(true, get_option('st_can_remove_dashboard_menu')); ?> >
	 		 <label for="st_can_remove_dashboard_menu">Hide Dashboard menu link?</label>
	 	 	<p class="description" id="tagline-description">Hide for Authors and Contributors only.</p></td>	 
	 	 </td>
	      </tr>
	 
	 	 <!--Remove admin toolbar  -->
	      <!--<tr valign="top">
	      <th scope="row"><label for="blogdescription">Admin Toolbar</label></th>
	      <td>
	 		 <input name="st_can_remove_admin_toolbar" type="checkbox" id="st_can_remove_admin_toolbar" value="1" <?php checked(true, get_option('st_can_remove_admin_toolbar')); ?> >
	 		 <label for="st_can_remove_admin_toolbar">Remove Dashboard admin toolbar?</label>
	 	 	<p class="description" id="tagline-description">In a few words, explain what this site is about.</p></td>	 
	 	 </td>
	      </tr> -->
	 
	 	 <!--Remove help links  -->
	      <tr valign="top">
	      <th scope="row"><label for="blogdescription">3. Contextual Help Links</label></th>
	      <td>
	 		 <input name="st_can_remove_contextual_help_link" type="checkbox" id="st_can_remove_contextual_help_link" value="1" <?php checked(true, get_option('st_can_remove_contextual_help_link')); ?> >
	 		 <label for="st_can_remove_contextual_help_link">Hide contextual help links?</label>
	 	 	<p class="description" id="tagline-description">Hide help links for all users.</p></td>	 
	 	 </td>
	      </tr>
	 
	 	 <!--Remove dashboard widgets  -->
	      <tr valign="top">
	      <th scope="row"><label for="blogdescription">4. Dashboard Widgets</label></th>
	      <td>
	 		 <input name="st_can_remove_dash_widgets" type="checkbox" id="st_can_remove_dash_widgets" value="1" <?php checked(true, get_option('st_can_remove_dash_widgets')); ?> >
	 		 <label for="st_can_remove_dash_widgets">Remove all WordPress dashboard widgets?</label>
	 	 	<p class="description" id="tagline-description">Hide for all users other then Administrators.</p></td>	 
	 	 </td>
	      </tr>
		  
 	 	 <!--Remove wordpress version-->
 	 	   <tr valign="top">
 	 	   <th scope="row"><label for="blogdescription">5. WordPress Version</label></th>
 	 	   <td>
 	 		 <input name="st_can_remove_wordpress_version" type="checkbox" id="st_can_remove_wordpress_version" value="1" <?php checked(true, get_option('st_can_remove_wordpress_version')); ?> >
 	 		 	<label for="st_can_remove_wordpress_version">Hide WordPress version in footer?</label>
 	 	 		<p class="description" id="tagline-description">Hide for all users other then Administrators.</p></td>
 	 	 	</td>
 	 	  </tr>
	 
	 	 <!--Blog footer message-->
	 	   <tr valign="top">
	 	   <th scope="row"><label for="blogdescription">6. Footer Message</label></th>
	 	   <td>
	 		<textarea class="large-text" name="st_footer_message" rows="3" style="max-width:600px;"><?php echo get_option( 'st_footer_message' ); ?></textarea>		
	 		<p class="description" id="tagline-description">In few words explain what this site is about. Leave empty to show default WordPress footer note.</p>		
	 	 </td>
	 	 </tr>
		 
	    </table>
	<?php		
	}
}
?>

