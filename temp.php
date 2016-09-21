<?php

/*
 *
 * Plugin Name: Common - 
 * Description: 
 * Author: Austin Tindle
 *
 */

// Settings array. This is so I can retrieve predefined wp_editor() settings to keep the markup clean
$settings = array (
	'sm' => array('textarea_rows' => 3),
	'md' => array('textarea_rows' => 6),
);

/* Custom Post Type ------------------- */

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// Load our CSS
function temp_load_plugin_css() {
    wp_enqueue_style( 'temp-plugin-style', plugin_dir_url(__FILE__) . 'css/style.css');
}
add_action( 'admin_enqueue_scripts', 'temp_load_plugin_css' );

// Add create function to init
add_action('init', 'create_temp_type');

// Create the custom post type and register it
function create_temp_type() {
	$args = array(
	      'label' => 'temp',
	        'public' => true,
	        'show_ui' => true,
	        'capability_type' => 'post',
	        'hierarchical' => false,
	        'rewrite' => array('slug' => 'temp'),
			'menu_icon'  => 'dashicons-groups',
	        'query_var' => true,
	        'supports' => array(
	            'title',
	            'thumbnail')
	    );
	register_post_type( 'temp' , $args );
}

add_action("admin_init", "temp_init");
add_action('save_post', 'temp_save');

// Add the meta boxes to our CPT page
function temp_init() {
	add_meta_box("temp-required-meta", "Required Information", "temp_meta_required", "temp", "normal", "high");
}

// Meta box functions
function temp_meta_required() {
	global $post; // Get global WP post var
    $custom = get_post_custom($post->ID); // Set our custom values to an array in the global post var

    // Form markup 
    include_once('views/required.php');
}

// Save our variables
function temp_save() {
	global $post;

	update_post_meta($post->ID, "temp", $_POST["temp"]);
}


?>