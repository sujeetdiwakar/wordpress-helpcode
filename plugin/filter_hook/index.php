<?php
/*
 * Plugin Name: Filter Hook Plugin
 * version: 1.0
 * Description: My first plugin to explain the functionality of an filter hook.
 * Author: Pankaj Kumar
 * Plugin URI: http://www.glug4muz.org/filter_hook/
 * Author URI: http://www.glug4muz.org/ccpplinux
 * 
 */
//Configuration Section


//Include Section
include_once("inc/func.inc.php");

//Action/Filter Hook Section
add_filter( 'login_head', 'my_custom_login_logo' );

add_filter('the_content', 'pk_change_content');

add_filter( 'login_errors', 'login_errors_example' );
 



