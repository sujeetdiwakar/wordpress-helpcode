<?php
	function cpl_display_ems_menu()
	{
		add_menu_page
		(
			"EMS Menu", //Text to be displayed in the title bar of sub menu page
			"EMS", //Text to be displayed at the place of sub menu
			"manage_options", //User capability of logged in wordpress user
			__FILE__."._ems", //Sub Menu SLUG(Unique ID) which should be unique for this menu
			"cpl_display_ems_form"
		);
		
		add_submenu_page
		(
			null,
			"EMS Menu", //Text to be displayed in the title bar of sub menu page
			"EMS", //Text to be displayed at the place of sub menu
			"manage_options", //User capability of logged in wordpress user
			__FILE__."._ems_edit", //Sub Menu SLUG(Unique ID) which should be unique for this menu
			"cpl_edit_ems_form"
		);
		add_submenu_page
		(
			null,
			"EMS Menu", //Text to be displayed in the title bar of sub menu page
			"EMS", //Text to be displayed at the place of sub menu
			"manage_options", //User capability of logged in wordpress user
			__FILE__."._ems_delete", //Sub Menu SLUG(Unique ID) which should be unique for this menu
			"cpl_delete_ems_form"
		);
		
	}
?>
