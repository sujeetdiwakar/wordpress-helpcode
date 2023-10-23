<?php
/*
 * Plugin Name: EMS Plugin
 * version: 1.0
 * Description: My first plugin to explain the functionality of admin form.
 * Author: Pankaj Kumar
 * Plugin URI: http://www.glug4muz.org/ems/
 * Author URI: http://www.glug4muz.org/ccpplinux
 * 
 */
//Configuration Section

function cpl_initialize_ems()
{
	if(get_option("cpl_ems")!=false) delete_option("cpl_ems");
	
	if(get_option("cpl_ems")===false)
	{
		$cpl_ems=array();
		add_option("cpl_ems", $cpl_ems);
	}
}

//Include Section
include_once("inc/menu.inc.php");
include_once("inc/form.inc.php");
include_once("inc/process.inc.php");

//Action/Filter Hook Section
register_activation_hook(__FILE__, "cpl_initialize_ems");
add_action("admin_menu", "cpl_display_ems_menu");
add_action("admin_post_cpl_process_ems_form", "cpl_save_ems_form");
add_action("admin_post_cpl_process_ems_edit_form", "cpl_update_ems_form");
add_action("admin_post_cpl_process_ems_delete_form", "cpl_del_ems_form");
?>
