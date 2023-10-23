<?php
	if(!defined('WP_UNINSTALL_PLUGIN')) 
	{
		die("This plugin can not be uninstalled without login");
	}
	if(get_option("cpl_options"))
	{
		delete_option("cpl_options");
	}
?>
