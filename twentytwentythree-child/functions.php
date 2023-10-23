<?php

add_action('wp_enqueue_scripts','my_custom_theme_scripts');

function my_custom_theme_scripts(){


    wp_enqueue_script('scripts-js',get_stylesheet_directory_uri().'/assets/js/scripts.js',['jquery'],'',true);

    wp_localize_script('scripts-js','variables',['ajax_url' => admin_url('admin-ajax.php')]);
}

add_action('init','register_custom_post_types');

function register_custom_post_types(){

    register_post_type('gallery',[

        'labels' => [
            'name' => 'Gallery',
            'singular_name' => 'Gallery',
            'menu_name' => 'Gallery',
        ],
        'public' => true,
        'publicly_queryable' => true,
        'menu_icon' => 'dashicons-admin-comments',
        'has_archive' => false,
        'rewrite' =>['slug' => 'gallery'],
        'supports' => [
            'title',
            'editor',
            'thumbnail',
        ]
    ]);
}

add_action('init','register_custom_taxonomies');

function register_custom_taxonomies(){

    register_taxonomy('gallery_cat',['gallery'], [
        'labels' => [
            'name' => 'Categories',
            'singular_name' => 'Category',
            'menu_name' => 'Categories',
        ],
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'rewrite' => ['slug' => 'cat'],
    ]);
}

add_action('wp_ajax_filter_posts','filter_posts');
add_action('wp_ajax_nopriv_filter_posts','filter_posts');

function filter_posts(){

    $args = [

        'post_type' => 'gallery',
        'posts_per_page' => -1,
    ];

    $rating = $_POST['rating'];
    $cat = $_POST['cat'];

    if($rating){

        $args['meta_query'][] = [
            'key' => 'popularity',
            'value' => $rating,
            'compare' => '=',
        ];
    }

    if($cat){

        $args['tax_query'][] = [
          'taxonomy' => 'gallery_cat',
          'field' => 'slug',
          'terms' => $cat,
        ];
    }

    $gallery = new WP_Query($args);

    if($gallery->have_posts()):

        while ($gallery->have_posts()):  $gallery->the_post();

            get_template_part('template-parts/loop','gallery');

        endwhile;

    else:

        echo "<p>Post Not Found </p>";

    endif;

    wp_reset_postdata();

    wp_die();
}