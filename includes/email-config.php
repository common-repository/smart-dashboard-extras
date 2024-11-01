<?php
//Start a session if not already started, so that our $_SESSION variables would work
if(session_id() == ''){
	session_start();
}

// Gets the current domain
$website_name =  get_bloginfo("name");

$website_url =  get_bloginfo("url");

$login_url = site_url('wp-login.php', 'login');

//Gets the admin email
$admin_email =  get_option("admin_email"); 

// Edit the below constant only if you want to change the email address the notification would be sent to
define("ADMIN_EMAIL", "$admin_email");