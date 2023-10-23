<?php
/*
 * Plugin Name: Admin Menu Plugin
 * version: 1.0
 * Description: My first plugin to explain the functionality of admin menu.
 * Author: Pankaj Kumar
 * Plugin URI: http://www.glug4muz.org/admin_menu/
 * Author URI: http://www.glug4muz.org/ccpplinux
 * 
 */
//Configuration Section


//Include Section
include_once("inc/menu.inc.php");
include_once("inc/func.inc.php");

//Action/Filter Hook Section
add_action("admin_menu", "cpl_display_menu");
