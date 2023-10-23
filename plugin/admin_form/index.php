<?php
/*
 * Plugin Name: Admin Form Plugin
 * version: 1.0
 * Description: My first plugin to explain the functionality of admin form.
 * Author: Pankaj Kumar
 * Plugin URI: http://www.glug4muz.org/admin_form/
 * Author URI: http://www.glug4muz.org/ccpplinux
 * 
 */
//Configuration Section

function cpl_initialize_options()
{
	if(get_option("cpl_options")!=false) delete_option("cpl_options");
	
	if(get_option("cpl_options")===false)
	{
		$cpl_options=array();
		/*
		$cpl_options[0]["username"]="ccpplinux";
		$cpl_options[0]["version"]="10";
		
		$cpl_options[1]["username"]="ccpplamp";
		$cpl_options[1]["version"]="20";
		*/
		$cpl_options["username"]="ccpplinux";
		$cpl_options["version"]="10";
		
		add_option("cpl_options", $cpl_options);
	}
	
}

//Include Section
include_once("inc/menu.inc.php");
include_once("inc/form.inc.php");
include_once("inc/process.inc.php");


//Action/Filter Hook Section
register_activation_hook(__FILE__, "cpl_initialize_options");
add_action("admin_menu", "cpl_display_setting_submenu");
add_action("admin_post_cpl_process_form", "cpl_save_form");

