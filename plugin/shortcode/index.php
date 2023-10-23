<?php
/*
 * Plugin Name: Shortcode Plugin
 * version: 1.0
 * Description: My first plugin to explain the functionality of shortcode.
 * Author: Pankaj Kumar
 * Plugin URI: http://www.glug4muz.org/shortcode/
 * Author URI: http://www.glug4muz.org/ccpplinux
 * 
 */
//Configuration Section


//Include Section
include_once("inc/func.inc.php");

//Action/Filter Hook Section
add_shortcode('eol', 'cpl_eol'); //Use it as [eol]

add_shortcode('welcome', 'cpl_welcome'); //Use it as [welcome name='John']

add_shortcode('invite', 'cpl_invite'); //Use it as [invite name='John']How are you[/invite]
