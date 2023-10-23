<?php
/*
 * Plugin Name: Metabox API Plugin
 * version: 1.0
 * Description: My first plugin to explain the functionality of metabox api plugin.
 * Author: Pankaj Kumar
 * Plugin URI: http://www.glug4muz.org/metabox_api_plugin/
 * Author URI: http://www.glug4muz.org/ccpplinux
 * 
 */
//Configuration Section

//Include Section
include_once "inc/func.inc.php";

//Action/Filter Hook Section
add_action( 'add_meta_boxes', 'cpl_mb_create' );
add_action( 'save_post', 'save_post_reference' );
add_filter( 'the_content', 'cpl_display_the_content' );
