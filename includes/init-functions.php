<?php
// Important configutation data such as start of the seassion the website name and the admin email
require 'email-config.php';

function stsd_smart_dashboard_extras_loaded() {	
	add_action('wp_before_admin_bar_render', 'stsd_remove_admin_bar_logo', 0);
	function stsd_remove_admin_bar_logo() {
		global $wp_admin_bar;
		$st_can_remove_wordpress_logo = get_option( 'st_can_remove_wordpress_logo' );
		if($st_can_remove_wordpress_logo){
			$wp_admin_bar->remove_menu('wp-logo');
		}   
	}
	
	add_action( 'admin_head', 'stsd_hide_dashboard', 0 );
	function stsd_hide_dashboard() {
		$st_can_remove_dash_menu = get_option( 'st_can_remove_dashboard_menu' );
		if($st_can_remove_dash_menu == 1){
			if (current_user_can('contributor') || current_user_can('author')){
				global $blog, $current_user, $id, $parent_file, $wphd_user_capability, $wp_db_version;

				// Bail if earlier version than 3.4.0.
				if ( $wp_db_version < 20596 ) {
					return;
				}

				if ( ! current_user_can( $wphd_user_capability ) && $wp_db_version >= 20596 ) {
					// If Multisite, check whether they are in the User Dashboard before removing links.
					$blogs   = get_blogs_of_user(get_current_user_id());

					if ( is_multisite() && is_admin() && empty( $blogs ) ) {
						return;
					} else {
						remove_menu_page( 'index.php');  // Removes dashboard menu.
						remove_menu_page( 'separator1' ); // Removes separator under Dashboard menu.
					}


					// Redirect folks to their profile when they login, or if they try to access the Dashboard via direct URL.
					if ( 'index.php' == $parent_file ) {
								if ( headers_sent() ) {
									echo '<meta http-equiv="refresh" content="0;url=' . admin_url( 'edit.php' ) . '">';
									echo '<script type="text/javascript">document.location.href="' . admin_url( 'edit.php' ) . '"</script>';
								} else {
									if ( wp_redirect( admin_url( 'edit.php' ) ) ) {
										exit();
									}
								}
							}
		
				}
			
			}
		}
		
	}
	
	
	
	
	/*Remove contextual help tabs*/
	add_action('admin_head', 'stsd_remove_contextual_help_link');
	function stsd_remove_contextual_help_link() {
		$st_can_remove_contextual_help_link = get_option( 'st_can_remove_contextual_help_link' );
		if($st_can_remove_contextual_help_link){
		    $screen = get_current_screen();
		    $screen->remove_help_tabs();
		}
	}
		

	//Remove Dashboard Metabox Widgets for all except Admin
	add_action('wp_dashboard_setup', 'stsd_remove_dashboard_widget' );
	function stsd_remove_dashboard_widget() {
		$st_can_remove_dash_widgets = get_option( 'st_can_remove_dash_widgets' );
		if (!current_user_can('manage_options') && $st_can_remove_dash_widgets){
			global $wp_meta_boxes;
			unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
			unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
			unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
			unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
			unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
			unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
			unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
			unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);		
			unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
		}
	} 

	//Remove WordPress version from footer only for non-admin users
	add_action( 'admin_menu', 'stsd_remove_wp_footer_version' );
	function stsd_remove_wp_footer_version() {
		$st_can_remove_wordpress_version = get_option( 'st_can_remove_wordpress_version' );
	    if ( !current_user_can('manage_options') && $st_can_remove_wordpress_version) { 
	        remove_filter( 'update_footer', 'core_update_footer' ); 
	    }
	}
	
	/* Display custom footer message in admin dashboard */	
	$st_footer_message = trim(get_option( 'st_footer_message' ));
	if(!empty($st_footer_message)){
		add_filter('admin_footer_text', 'st_dashboard_footer');	
	}
	function st_dashboard_footer ($message) {
		echo $st_footer_message;
 	}


	/* 
	* Dipsplay only mine published to contributors and author. Hide others draft posts
	* Hides others post from query in admin dashboard 
	*/
	$st_can_contributor_view_others_post = get_option( 'st_can_contributor_view_others_post' );
	if($st_can_contributor_view_others_post == 1){
		if (current_user_can('contributor') || current_user_can('author')){
			add_filter('parse_query', 'only_own_posts_parse_query' );
		}
	}
	function only_own_posts_parse_query( $wp_query ) {
	    if ( strpos( $_SERVER[ 'REQUEST_URI' ], '/wp-admin/edit.php' ) !== false ) {
	      global $current_user;
	      $wp_query->set( 'author', $current_user->id );
	     }
	}
	
	/* Allow/Disallow contributors to upload files */
	add_action('admin_init', 'allow_contributor_upload_files');
	function allow_contributor_upload_files() {
		if (current_user_can('contributor')){
			$st_can_contributor_upload_files = get_option( 'st_can_contributor_upload_files');
			if($st_can_contributor_upload_files == 1 && !current_user_can('upload_files')){
				$contributor = get_role('contributor');
				$contributor->add_cap('upload_files');
			} else if($st_can_contributor_upload_files == 0 && current_user_can('upload_files')){
				$contributor = get_role('contributor');
				$contributor->remove_cap('upload_files');
			}
		}
	}
	
	
	
	//Check if the user is an admin
	function stsd_is_admin(){
		return (current_user_can('manage_options'))? true:false;
	}

	# Gets the time the admin logged in
	function stsd_get_login_time(){
		$login_time = date('l jS \of F Y h:i:s A');
		return $login_time;
	}

	// Gets the IP of the user that logged himself as admin
	function stsd_get_user_ip(){
		$sources = array('REMOTE_ADDR', 'HTTP_X_FORWARDED_FOR','HTTP_CLIENT_IP',);
		foreach ($sources as $source) {
			if(!empty($_SERVER[$source])){
				$ip = $_SERVER[$source];
			}
		}
		return $ip;
	}
	
	// Email all the info above to a pointed email address
	add_action('admin_notices', 'stsd_notify_admin_login_by_email');
	function stsd_notify_admin_login_by_email(){
		$st_can_notify_admin_on_login = get_option( 'st_can_notify_admin_on_login' );
		if($st_can_notify_admin_on_login && stsd_is_admin() === true && !isset($_SESSION['logged_in_once'])){
			global $website_name;
			global $login_url;
			global $website_url;
			$get_time_of_login = stsd_get_login_time();
			$get_ip =  stsd_get_user_ip();
			$current_user = wp_get_current_user();
			$userName = $current_user->user_login;
			$userEmail = $current_user->user_email;
		
			// Email subject and message
			$subject = sprintf('An Admin logged in to %s', $website_name);
			$headers = array('Content-Type: text/html; charset=UTF-8');
			$message = 
<<<MESSAGE
We noticed a recent administrator login for your website <a href="{$website_url}"> {$website_name}</a>.
<br>
<br><strong>Date:</strong> {$get_time_of_login}
<br><strong>IP:</strong> {$get_ip}
<br><strong>Username:</strong> {$userName}
<br><strong>Email:</strong> {$userEmail}
<br>
<br>If this wasn't you, your website might have been hacked. <a href="{$login_url}">Login</a> to your admin dashboard and try to block the user.

MESSAGE;
			// Sending of the email notification
			wp_mail(ADMIN_EMAIL, $subject, $message, $headers);
			// We assign 1 as to make so that the script does not sends emails on each page refresh like a deaf rooster
			$_SESSION['logged_in_once'] = 1;
		}
	}

}
add_action( 'plugins_loaded', 'stsd_smart_dashboard_extras_loaded' ); ?>
