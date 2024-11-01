<?php 
if( !function_exists("st_admin_misc_config") ) {
	function st_admin_misc_config() {?>
		
	   	<table class="form-table">
		 <!--Allow contributors to upload media-->
		   <tr valign="top">
		   <th scope="row"><label for="blogdescription">1. Allow Media Upload</label></th>
		   <td>
	    		<input name="st_can_contributor_upload_files" type="checkbox" id="st_can_contributor_upload_files" value="1" <?php checked(true, get_option('st_can_contributor_upload_files')); ?> >
	    		<label for="st_can_contributor_upload_files">Allow contributors to upload media?</label>
	    	 	<p class="description" id="tagline-description">Grant contributors privilege to upload media.</p></td>
		 	</td>
		   </tr>
	 
	
		 <!--Hide Others Post-->
		   <tr valign="top">
		   <th scope="row"><label for="blogdescription">2. Limit Users to Own Post</label></th>
		   <td>
	 		<input name="st_can_contributor_view_others_post" type="checkbox" id="st_can_contributor_view_others_post" value="1" <?php checked(true, get_option('st_can_contributor_view_others_post')); ?> >
	 		<label for="st_can_contributor_view_others_post">Limit contributors and authors to their own post?</label>
	 	 	<p class="description" id="tagline-description">Select/Deselect filter post others post.</p></td>
		 	</td>
		   </tr>
	   
	  	 <!--Blog footer message-->
	  		<tr valign="top">
	  		<th scope="row"><label for="blogdescription">3. Email Notify Admin</label></th>
	  		<td>
	  			<input name="st_can_notify_admin_on_login" type="checkbox" id="st_can_notify_admin_on_login" value="1" <?php checked(true, get_option('st_can_notify_admin_on_login')); ?> >
	  			<label for="st_can_notify_admin_on_login">Notify admin when someone logged in?</label>
		  		<p class="description" id="tagline-description">Get notified when an Admin is logged.</p>			
			</td>
	  		</tr>
	  		<!--<tr valign="top">
	  		<th scope="row"></th>
		  		<td>
			  		<textarea class="large-text" name="st_notify_email_message" rows="5" style="max-width:600px;"><?php echo get_option( 'st_notify_email_message' ); ?></textarea>		
			  		<p class="description" id="tagline-description">In a few words, explain what this site is about.</p>
				</td>
			</tr> -->
		</table>		
	<?php		
	}
}
?>

