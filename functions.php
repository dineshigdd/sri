<?php

// function custom_theme_assets() {
// 	wp_enqueue_style( 'style', get_stylesheet_uri() );
// }

// add_action( 'wp_enqueue_scripts', 'custom_theme_assets' );
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles',11);

function my_theme_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),array(), rand(111,9999), 'all'  );
  
} 

register_nav_menus( [ 'primary' => __( 'Primary Menu' ) ] ); //Register Menu Location   

function get_the_top_ancestor_id() {
	global $post;
	if ( $post->post_parent ) {
		$ancestors = array_reverse( get_post_ancestors( $post->ID ) );
		return $ancestors[0];
	} else {
		return $post->ID;
	}
}

/*sets the excerpt length */
function customize_the_excerpt_length() {
	return 5;
}

add_filter('excerpt_length','customize_the_excerpt_length');


/* Add featured Image support */
function add_featured_image_support_to_theme() {
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'small-thumbnail', 100, 100, true );
	add_image_size( 'single-post-image', 960, 250, true );
	add_theme_support('post-formats', [
		'aside',
		'gallery',
		'link',
		'image',
		'quote',
		'status',
		'video',
		'audio',
		'chat',
		'standard',
	]);
}

add_action( 'after_setup_theme', 'add_featured_image_support_to_theme');

function initialize_widgets(){
	register_sidebar([
		'name' => 'Right Sidebar',
		'id' => 'rightsidebar',
		'before_widget' => '<div class="widget-item">', /* removes the bullet points from the title of the widget */
		"after_widget" => '</div>'
	]);

	register_sidebar([
		'name' => 'Footer',
		'id' => 'footer',
		'before_widget' => '<div class="widget-item">', /* removes the bullet points from the title of the widget */
		'after_widget'  => '</div>'
	]);
}

add_action( 'widgets_init', 'initialize_widgets');


// enable this new archives-page-functions.php
require get_template_directory() . '/archives-page-functions.php';
