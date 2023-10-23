<?php
/*
 * Plugin Name: Register Activation Hook Plugin
 * version: 1.0
 * Description: My first plugin to explain the functionality of register activation hook.
 * Author: Pankaj Kumar
 * Plugin URI: http://www.glug4muz.org/register_activation_hook/
 * Author URI: http://www.glug4muz.org/ccpplinux
 * 
 */
//Configuration Section


//Include Section
include_once("inc/func.inc.php");

//Action/Filter Hook Section
register_activation_hook(__FILE__, 'cpl_check_version');
