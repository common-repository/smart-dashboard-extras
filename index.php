<?php
/**
* Plugin Name: Smart Dashboard Extras
* Plugin URI: http://stacktips.com/?s=smart+dashboard+extras
* Description: Use Smart Dashboard Extra plugin to customize your WordPress admin dashboard by selectively removing interface elements and add more features.
* Version:1.0
* Author: Nilanchala, StackTips
* Author URI: http://stacktips.com
* Text Domain: st-smart-dashboard-extras
* License:  GPL2 (http://www.gnu.org/licenses/gpl-2.0.html)
*
*  ____                           _     ____               _      _                             _ 
* / ___|  _ __ ___    __ _  _ __ | |_  |  _ \   __ _  ___ | |__  | |__    ___    __ _  _ __  __| |
* \___ \ | '_ ` _ \  / _` || '__|| __| | | | | / _` |/ __|| '_ \ | '_ \  / _ \  / _` || '__|/ _` |
*  ___) || | | | | || (_| || |   | |_  | |_| || (_| |\__ \| | | || |_) || (_) || (_| || |  | (_| |
* |____/ |_| |_| |_| \__,_||_|    \__| |____/  \__,_||___/|_| |_||_.__/  \___/  \__,_||_|   \__,_|
*                                                                                                 
*                                _____        _                    
*                               | ____|__  __| |_  _ __  __ _  ___ 
*                               |  _|  \ \/ /| __|| '__|/ _` |/ __|
*                               | |___  >  < | |_ | |  | (_| |\__ \
*                               |_____|/_/\_\ \__||_|   \__,_||___/
**/

/* Feeatures
----------------
- It adds the contributors the ability to upload media
- Limit contributors and authors to their own post
- Notify website administrator when another Administrator logged into WordPress admin dashboard

- Remove default WordPress logo from the in the admin bar
- Remove "Dashboard" sidebar menu links for non admin users.
- Remove contextual \"Help\" links
- Remove all dashboard widgets for non admin.
- Customize or hide "Thank you for creating with WordPress" in footer
- Remove WordPress version in the footer for non admin

TODO
------------
- Add custom messages on dashboard based on user role
- Remove post widgets by role
- Remove admin toolbar by role
- Add custom messages on dashboard based on user role

*/
if ( ! defined( 'ABSPATH' ) ) exit;
if(!defined('ST_SMART_DASHBOARD_EXTRA_DIR')) define('ST_SMART_DASHBOARD_EXTRA_DIR', plugin_dir_url( __FILE__ ));

include('includes/init-functions.php');
include('includes/admin-options.php');