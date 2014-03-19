<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;


function nav_class($classes){     
  return $classes;
}
add_filter('nav_menu_css_class' , 'nav_class');

//Add class to edit button
	function custom_edit_post_link($output) {
	 $output = str_replace('class="post-edit-link"', 'class="post-edit-link icon-pencil"', $output);
	 return $output;
	}
	add_filter('edit_post_link', 'custom_edit_post_link');

add_action( 'after_setup_theme', 'connection_setup' );
 
 // !AFTER_SETUP_THEME
 function connection_setup() {
	remove_action( 'widgets_init', 'responsive_widgets_init' );
}

remove_action( 'wp_enqueue_scripts', 'responsive_js' );

add_action('wp_enqueue_scripts', 'connection_js');

function connection_js() {
	$template_directory_uri = get_template_directory_uri();
	$scriptDir = $template_directoi_uri . '/js';
	// load Modernizr which enables HTML5 elements & feature detects in the head.
	wp_enqueue_script( 'modernizr', $template_directory_uri . '/core/js/responsive-modernizr.js', array( 'jquery' ), '2.6.1', false );
	// the rest of JS at the bottom for fast page loading.
	wp_enqueue_script( 'connection-scripts', $scriptDir, array('jquery'), '1.0', true);
	
}
	/**
 * WordPress Widgets start right here.
 */
	function connection_widgets_init() {
	
	    register_sidebar(array(
	        'name' => __('Main Sidebar', 'responsive'),
	        'description' => __('Area 1 - sidebar.php', 'responsive'),
	        'id' => 'main-sidebar',
	        'before_title' => '<h3 class="widget-title">',
	        'after_title' => '</h3>',
	        'before_widget' => '<div id="%1$s" class="widget-wrapper">',
	        'after_widget' => '</div>'
	    ));
	
	    register_sidebar(array(
	        'name' => __('Right Sidebar', 'responsive'),
	        'description' => __('Area 2 - sidebar-right.php', 'responsive'),
	        'id' => 'right-sidebar',
	        'before_title' => '<h2 class="widget-title">',
	        'after_title' => '</h2>',
	        'before_widget' => '<div id="%1$s" class="widget-wrapper">',
	        'after_widget' => '</div>'
	    ));
			
	    register_sidebar(array(
	        'name' => __('Left Sidebar', 'responsive'),
	        'description' => __('Area 3 - sidebar-left.php', 'responsive'),
	        'id' => 'left-sidebar',
	        'before_title' => '<h2 class="widget-title">',
	        'after_title' => '</h2>',
	        'before_widget' => '<div id="%1$s" class="widget-wrapper">',
	        'after_widget' => '</div>'
	    ));
	
	    register_sidebar(array(
	        'name' => __('Left Sidebar Half Page', 'responsive'),
	        'description' => __('Area 4 - sidebar-left-half.php', 'responsive'),
	        'id' => 'left-sidebar-half',
	        'before_title' => '<h2 class="widget-title">',
	        'after_title' => '</h2>',
	        'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
	        'after_widget' => '</div>'
	    ));
	
	    register_sidebar(array(
	        'name' => __('Right Sidebar Half Page', 'responsive'),
	        'description' => __('Area 5 - sidebar-right-half.php', 'responsive'),
	        'id' => 'right-sidebar-half',
	        'before_title' => '<h2 class="widget-title">',
	        'after_title' => '</h2>',
	        'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
	        'after_widget' => '</div>'
	    ));
	
	    register_sidebar(array(
	        'name' => __('Home Widget 1', 'responsive'),
	        'description' => __('Area 6 - sidebar-home.php', 'responsive'),
	        'id' => 'home-widget-1',
	        'before_title' => '<div id="widget-title-one" class="widget-title-home"><h3>',
	        'after_title' => '</h3></div>',
	        'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
	        'after_widget' => '</div>'
	    ));
	
	    register_sidebar(array(
	        'name' => __('Home Widget 2', 'responsive'),
	        'description' => __('Area 7 - sidebar-home.php', 'responsive'),
	        'id' => 'home-widget-2',
	        'before_title' => '<div id="widget-title-two" class="widget-title-home"><h3>',
	        'after_title' => '</h3></div>',
	        'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
	        'after_widget' => '</div>'
	    ));
	
	    register_sidebar(array(
	        'name' => __('Home Widget 3', 'responsive'),
	        'description' => __('Area 8 - sidebar-home.php', 'responsive'),
	        'id' => 'home-widget-3',
	        'before_title' => '<div id="widget-title-three" class="widget-title-home"><h3>',
	        'after_title' => '</h3></div>',
	        'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
	        'after_widget' => '</div>'
	    ));
	
	    register_sidebar(array(
	        'name' => __('Gallery Sidebar', 'responsive'),
	        'description' => __('Area 9 - sidebar-gallery.php', 'responsive'),
	        'id' => 'gallery-widget',
	        'before_title' => '<div class="widget-title">',
	        'after_title' => '</div>',
	        'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
	        'after_widget' => '</div>'
	    ));
	
	    register_sidebar(array(
	        'name' => __('Colophon Widget', 'responsive'),
	        'description' => __('Area 10 - sidebar-colophon.php', 'responsive'),
	        'id' => 'colophon-widget',
	        'before_title' => '<div class="widget-title">',
	        'after_title' => '</div>',
	        'before_widget' => '<div id="%1$s" class="colophon-widget widget-wrapper %2$s">',
	        'after_widget' => '</div>'
	    ));
	
	    register_sidebar(array(
	        'name' => __('Top Widget', 'responsive'),
	        'description' => __('Area 11 - sidebar-top.php', 'responsive'),
	        'id' => 'top-widget',
	        'before_title' => '<h2 class="widget-title">',
	        'after_title' => '</h2>'
	    ));
	}
	
	add_action('widgets_init', 'connection_widgets_init');
	
	
}