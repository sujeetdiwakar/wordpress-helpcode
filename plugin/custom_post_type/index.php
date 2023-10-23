<?php
/*
 * Plugin Name: Custom Post Type Plugin
 * version: 1.0
 * Description: My first plugin to explain the functionality of custom post type plugin.
 * Author: Pankaj Kumar
 * Plugin URI: http://www.glug4muz.org/custom_post_type_plugin/
 * Author URI: http://www.glug4muz.org/ccpplinux
 * 
 */
//Configuration Section

//Include Section
include_once "inc/func.inc.php";

//Action/Filter Hook Section
add_action("init","cpl_create_emp_post_type");
add_action("add_meta_boxes", "cpl_emp_mb_create"); //Add metabox for basic salary of employee
add_action("save_post", "cpl_save_emp_mb"); //Save basic salary
add_filter("manage_edit-emp_columns", "my_edit_emp_columns"); //Display column names on list page
add_action("manage_emp_posts_custom_column", "my_manage_emp_columns", 10, 2); //Display column values on list page
add_filter("manage_edit-emp_sortable_columns", "my_emp_sortable_columns");
