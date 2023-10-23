<?php
	function cpl_show_admin_setting_menu()
	{
		add_submenu_page
		( 
			'options-general.php', //It will be a submenu of Setting menu. 
			'Settings API', 
			'Settings API', 
			'manage_options' , 
			__FILE__ . '_settings_api' ,
			'cpl_display_settings_api_form'
		);
	}
?>
