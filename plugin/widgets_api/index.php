<?php
/*
 * Plugin Name: Widgets API Plugin
 * version: 1.0
 * Description: My first plugin to explain the functionality of widgets api plugin.
 * Author: Pankaj Kumar
 * Plugin URI: http://www.glug4muz.org/widgets_api_plugin/
 * Author URI: http://www.glug4muz.org/ccpplinux
 * 
 */
//Configuration Section

//Include Section
include_once("inc/func.inc.php");
include_once("inc/class.inc.php");

//Action/Filter Hook Section
add_action("widgets_init", "cpl_message_widget");
