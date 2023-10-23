<?php
	function cpl_add_custom_scripts_styles()
	{
		wp_register_style
		(
			'cool-blue-style', //Handle
			get_template_directory_uri().'/css/coolblue.css', //Source
			array(), //Dependencies
			false, //Version
			'screen' //Media
		);
		wp_enqueue_style('cool-blue-style');
		
		wp_enqueue_script('jquery');
		
		wp_register_script
		(
			'scroll-script', //Handle
			get_template_directory_uri().'/js/scrollToTop.js', //Source 
			array('jquery'), //Dependencies
			false, //Version
			true //Load in footer
		);		
		wp_enqueue_script('scroll-script');

	}
	add_action('wp_enqueue_scripts', 'cpl_add_custom_scripts_styles');
	
	function cool_blue_menu() 
	{
		   register_nav_menus( array( 'main' => 'Main Nav' ) );
	}

	add_action('init', 'cool_blue_menu');	
	
	
	function cool_blue_sidebar() 
	{
		   register_sidebar
		   ( 
				array 
				(
					'name'=> 'Primary Sidebar',
					'id'=> 'primary-widget-area',
					'description' => 'The primary widget area',
					'before_widget' => '<div class="sidemenu">',
					'after_widget'=> "</div>",
					'before_title'=> '<h3>',
					'after_title' => '</h3>' 
				)
			);

	}

	add_action('init', 'cool_blue_sidebar');	
	
	
?>
