<?php
/*
 * Plugin Name: Settings API Plugin
 * version: 1.0
 * Description: My first plugin to explain the functionality of Settings API.
 * Author: Pankaj Kumar
 * Plugin URI: http://www.glug4muz.org/settings_api/
 * Author URI: http://www.glug4muz.org/ccpplinux
 * 
 */
//Configuration Section
//Variable Version
/*
function cpl_setup_options()
{
	if(get_option("cpl_op_username")===false)
	{
		add_option("cpl_op_username", "ccpplinux");
		add_option("cpl_op_version", "1");
	}
	elseif(get_option("cpl_op_version")<"2")
	{
		update_option("cpl_op_version", "2");
	}
}
*/

//Array Version

function cpl_initialize_options()
{
	if(get_option("cpl_options")!=false) delete_option("cpl_options");
	
	if(get_option("cpl_options")===false)
	{
		$cpl_options=array();
		$cpl_options["username"]="ccpplinux";
		$cpl_options["version"]="10";
		add_option("cpl_options", $cpl_options);
	}
}

//Include Section
include('inc/menu.inc.php');
include('inc/form.inc.php');

//Action/Filter Hook Section
register_activation_hook(__FILE__, "cpl_initialize_options");
add_action('admin_init', 'cpl_init_register_settings');
add_action('admin_menu', 'cpl_show_admin_setting_menu' );
