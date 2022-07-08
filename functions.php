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