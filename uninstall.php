<?php
// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit;
}

//require 'plugin-config.php';
$dashboardSettingsOptionArray = array (
	'st_can_remove_wordpress_logo',
	'st_can_remove_dashboard_menu', 
	'st_can_remove_admin_toolbar', 
	'st_can_remove_contextual_help_link',
	'st_can_remove_dash_widgets',
	'st_can_remove_post_widgets' , 
	'st_footer_message',
	'st_can_remove_wordpress_version'
);

$miscSettingsOptionArray = array (
	'st_can_contributor_upload_files',
	'st_can_contributor_view_others_post',
	'st_can_notify_admin_on_login',
	'st_notify_email_message'
);

foreach ($dashboardSettingsOptionArray as $setting) {
	delete_option($setting);
}

foreach ($miscSettingsOptionArray as $setting) {
	delete_option($setting);
}

echo 'Uninstall succesful';
return;
?>