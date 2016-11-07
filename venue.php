<?php

/*
 *
 * Plugin Name: Common - Venue CPT
 * Description: Wordpress Plugin for Venue Custom Post Type to be used on applicable UCF College of Arts and Humanities websites
 * Author: Austin Tindle & Alessandro Vecchi
 *
 */

/* Custom Post Type ------------------- */

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// Load our CSS
function venue_load_plugin_css() {
    wp_enqueue_style( 'venue-plugin-style', plugin_dir_url(__FILE__) . 'css/style.css');
}
add_action( 'admin_enqueue_scripts', 'venue_load_plugin_css' );

// Add create function to init
add_action('init', 'venue_create_type');

// Create the custom post type and register it
function venue_create_type() {
	$args = array(
	      'label' => 'Venues',
	        'public' => true,
	        'show_ui' => true,
	        'capability_type' => 'post',
	        'hierarchical' => false,
	        'rewrite' => array('slug' => 'venue'),
			'menu_icon'  => 'dashicons-location-alt',
	        'query_var' => true,
	        'supports' => array(
	            'title',
	            'thumbnail')
	    );
	register_post_type( 'venue' , $args );
}

add_action("admin_init", "venue_init");
add_action('save_post', 'venue_save');

// Add the meta boxes to our CPT page
function venue_init() {
	add_meta_box("venue-building-meta", "Building Information", "venue_meta_building", "venue", "normal", "high");
	add_meta_box("venue-parking-meta", "Parking Information", "venue_meta_parking", "venue", "normal", "low");
}

// Meta box functions
function venue_meta_building() {
	global $post; // Get global WP post var
    $custom = get_post_custom($post->ID); // Set our custom values to an array in the global post var

    // Form markup 
    include_once('views/building.php');
}

function venue_meta_parking() {
	global $post; // Get global WP post var
    $custom = get_post_custom($post->ID); // Set our custom values to an array in the global post var

    // Form markup 
    include_once('views/parking.php');
}


// Save our variables
function venue_save() {
	global $post;

	update_post_meta($post->ID, "bld_abb", $_POST["bld_abb"]);
	update_post_meta($post->ID, "bld_id", $_POST["bld_id"]);
	update_post_meta($post->ID, "bld_desc", $_POST["bld_desc"]);
	update_post_meta($post->ID, "parking_desc", $_POST["parking_desc"]);
	update_post_meta($post->ID, "parking_lot", $_POST["parking_lot"]);
	update_post_meta($post->ID, "gps_coord1", $_POST["gps_coord1"]);
	update_post_meta($post->ID, "gps_coord2", $_POST["gps_coord2"]);

}

// Settings array. This is so I can retrieve predefined wp_editor() settings to keep the markup clean
$settings = array (
	'sm' => array('textarea_rows' => 3),
	'md' => array('textarea_rows' => 6),
);


?>