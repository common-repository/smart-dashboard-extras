<?php
require 'plugin-config.php';

add_action('admin_menu', 'st_sd_register_admin_options_menu');
function st_sd_register_admin_options_menu(){
	$page_title = 'Smart Dashboard Extras';
	$menu_title = 'Smart Dashboard Extras';
	$capability = 'manage_options';
	$menuSlug 	= 'st-dashboard-options';
	
	add_menu_page($page_title, $menu_title, $capability, $menuSlug , 'st_sd_init_admin_options');	
	//add_options_page($page_title, $menu_title, $capability, $menu_slug, 'st_sd_init_admin_options');
	add_action( 'admin_init', 'st_sd_register_admin_options');
}

if( !function_exists("st_sd_register_admin_options") ) {
	function st_sd_register_admin_options($groupName, $settingsArray) {
		global $dashboardSettings;
		global $dashboardSettingsOptionArray;
		foreach ($dashboardSettingsOptionArray as $setting) {
			register_setting($dashboardSettings, $setting);
		}
		
		global $miscSettings;
		global $miscSettingsOptionArray;
		foreach ($miscSettingsOptionArray as $setting) {
			register_setting($miscSettings, $setting);
		}
	}
}

if( !function_exists("st_sd_init_admin_options") ){
	function st_sd_init_admin_options(){
		include('admin-ui.php');
	}
}

?>