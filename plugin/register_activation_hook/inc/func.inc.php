<?php
function cpl_check_version() 
{
	if(version_compare(get_bloginfo('version'), '4', '<'))
	{
		wp_die("This plugin can only be installed on Wordpress Version 4.0 or more");
	}
}
