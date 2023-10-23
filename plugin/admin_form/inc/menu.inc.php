<?php
	function cpl_display_setting_submenu()
	{
		add_submenu_page
		(
			"options-general.php", //It will be a submenu under Setting menu
			"Options Form", //Text to be displayed in the title bar of sub menu page
			"Set Options", //Text to be displayed at the place of sub menu
			"manage_options", //User capability of logged in wordpress user
			__FILE__.".set_options", //Sub Menu SLUG(Unique ID) which should be unique for this menu
			"cpl_display_setting_form"
		);
	}
?>
