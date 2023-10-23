<?php
/*
 * Plugin Name: Option API Plugin
 * version: 1.0
 * Description: My first plugin to explain the functionality of option api plugin.
 * Author: Pankaj Kumar
 * Plugin URI: http://www.glug4muz.org/option_api_plugin/
 * Author URI: http://www.glug4muz.org/ccpplinux
 * 
 */
//Configuration Section
register_activation_hook(__FILE__, "cpl_set_options");
/*
function cpl_set_options()
{
	if(get_option("cpl_username")===false)
	{
		add_option("cpl_username", "ccpplinux");
		add_option("cpl_version", "1");
	}
	elseif(get_option("cpl_version")<"2")
	{
		update_option("cpl_version", "2");
	}
}
*/
function cpl_set_options()
{
	if(get_option("cpl_options")===false)
	{
		$cpl_options=array();
		$cpl_options["username"]="ccpplinux";
		$cpl_options["version"]="10";
		
		add_option("cpl_options", $cpl_options);
	}
	else
	{
		$cpl_options=get_option("cpl_options");
		
		if($cpl_options["version"]<"20")
		{
			$cpl_options["version"]="20";
			update_option("cpl_options", $cpl_options);
		}
	}
}

//Include Section


//Action/Filter Hook Section

