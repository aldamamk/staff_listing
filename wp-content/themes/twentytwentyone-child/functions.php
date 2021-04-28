<?php

// enqueue styles for child theme
function example_enqueue_styles() {
	
	// enqueue parent styles
	wp_enqueue_style('parent-theme', get_template_directory_uri() .'/style.css');

    // enqueue child styles
	wp_enqueue_style('child-theme', get_stylesheet_directory_uri() .'/style.css', array('parent-theme'));
	
	
}
add_action('wp_enqueue_scripts', 'example_enqueue_styles');



//  Disable Reviews
function iconic_disable_reviews() {
    remove_post_type_support( 'product', 'comments' );
}
add_action( 'init', 'iconic_disable_reviews' );

//add Google fonts 'Lora'
function google_fonts() {
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap', false );
}
add_action( 'wp_enqueue_scripts', 'google_fonts' );