<?php
/*
 * Plugin Name: Movies Plugin
 * Version: 1.0
 * Author: Sujeet
 * Description: Custom plugin to filter custom filter
 */
define( 'MY_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

function custom_plugin_enqueue_scripts() {
    // Enqueue JavaScript file
    wp_enqueue_script('custom-plugin-js', plugins_url('assets/js/custom-script.js', __FILE__), array('jquery'), '1.0', true);

    wp_localize_script('custom-plugin-js','object',['ajaxurl'=>admin_url('admin-ajax.php')]);
}

// Hook the function to the wp_enqueue_scripts action
add_action('wp_enqueue_scripts', 'custom_plugin_enqueue_scripts');

add_filter('template_include', 'load_custom_template');
function load_custom_template() {
    // Check if the page should use the custom template
    if (is_page('movie-list')) { // Replace 'custom-page' with your desired page slug or ID
        $template = plugin_dir_path(__FILE__) . 'templates/template-movies.php';

        return $template;
    }

    // Continue with the regular template hierarchy
    return $template;
}


add_action('init','custom_post_type_register');

function custom_post_type_register(){

    register_post_type('movies',[

        'labels' => [
            'name' => 'Movies',
            'singular_name' => 'Movie',
            'menu_name' => 'Movies',
        ],
        'public' => true,
        'menu_icon' => 'dashicons-admin-media',
        'rewrite' => ['slug'=>'movie'],
        'supports' => ['title','editor','thumbnail'],
    ]);
}

add_action('init','custom_taxonomy_register');

function custom_taxonomy_register(){
    register_taxonomy('movies_cat',['movies'],[

        'labels' => [
            'name' => 'Categories',
            'singular_name'=> 'Category',
            'menu_name' => 'Categories',
        ],
        'hierarchical' => true,
        'show_admin_column' => true,
        'rewrite' => ['slug' => 'cat']
    ]);
}

add_action('add_meta_boxes','create_custom_meta_boxes');

function create_custom_meta_boxes(){

    add_meta_box(
        'movie_meta_box_id',
        'Rating',
        'movie_rating_callback_func',
        'movies'
    );
}

function movie_rating_callback_func($post){

    $rating = get_post_meta($post->ID,'_movie_rating',true);

    echo "<label>Enter Rating</label><input type='number' min=1 max=5 name='movie_rating' value='$rating' required>";
}

add_action('save_post','save_custom_meta_box');

function save_custom_meta_box($post_id){

    if($rating = @$_POST['movie_rating']){
        update_post_meta($post_id,'_movie_rating', $rating);

    }

}



add_action('wp_ajax_filter_movies','filter_movies');
add_action('wp_ajax_nopriv_filter_movies','filter_movies');

function filter_movies(){

    $args = [

        'post_type' => 'movies',
        'posts_per_page' => -1,
    ];

    $rating = $_POST['rating'];
    $cat = $_POST['cat'];

    if($rating){

        $args['meta_query'][] = [
            'key' => '_movie_rating',
            'value' => $rating,
            'compare' => '=',
        ];
    }

    if($cat){

        $args['tax_query'][] = [
            'taxonomy' => 'movies_cat',
            'field' => 'slug',
            'terms' => $cat,
        ];
    }

    $gallery = new WP_Query($args);

    if($gallery->have_posts()):

        while ($gallery->have_posts()):  $gallery->the_post();

            //get_template_part(MY_PLUGIN_PATH.'template-parts/loop','gallery');
            include (MY_PLUGIN_PATH.'template-parts/loop-movie.php');
        endwhile;

    else:

        echo "<p>Post Not Found </p>";

    endif;

    wp_reset_postdata();

    wp_die();
}



function da_display_ems_menu()
{
    add_menu_page("EMS", "EMS", "manage_options", "emp-list", "da_ems_list_call");
    add_submenu_page("emp-list", "Employee List", "Employee List", "manage_options", "emp-list", "da_ems_list_call");
    add_submenu_page("emp-list", "Add Employee", "Add Employee", "manage_options", "add-emp", "da_emp_add_call");
    add_submenu_page(null, "Update Employee", "Update Employee", "manage_options", "update-emp", "da_emp_update_call");
    add_submenu_page(null, "Delete Employee", "Delete Employee", "manage_options", "delete-emp", "da_emp_delete_call");
}

add_action("admin_menu", "da_display_ems_menu");