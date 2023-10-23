<?php
	function cpl_display_menu()
	{
		add_menu_page
		(
			"Main Menu Page Title", //Text to be displayed in the title bar of main menu page
			"Main Menu Title", //Text to be displayed at the place of main menu
			"manage_options", //User capability of wordpress for which this menu will be displayed
			__FILE__, //Menu SLUG(Unique ID) which should be unique for this menu
			"cpl_display_main_menu"
		);
		add_submenu_page
		(
			__FILE__, //Main menu SLUG
			"Sub Menu Page Title", //Text to be displayed in the title bar of sub menu page
			"Sub Menu Title", //Text to be displayed at the place of sub menu
			"manage_options", //User capability of logged in wordpress user
			__FILE__.".submenu", //Sub Menu SLUG(Unique ID) which should be unique for this menu
			"cpl_display_sub_menu"
		);

	}
?>
