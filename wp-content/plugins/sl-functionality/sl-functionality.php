<?php

/**
 * Plugin Name:       Functionality Plugin
 * Plugin URI:        http://example.com/plugin-name-uri/
 * Description:       all functionality in this plugin will go to any theme you choose
 * Version:           1.0.0
 * Author:            krizzel
 */

  // Added staff CPT
function sl_register_custom_post_types() {
    $labels = array(
        'name'               => _x( 'Staff', 'post type general name' ),
        'singular_name'      => _x( 'Staff', 'post type singular name'),
        'menu_name'          => _x( 'Staff', 'admin menu' ),
        'name_admin_bar'     => _x( 'Staff', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'Staff' ),
        'add_new_item'       => __( 'Add New Staff' ),
        'new_item'           => __( 'New Staff' ),
        'edit_item'          => __( 'Edit Staff' ),
        'view_item'          => __( 'View Staff' ),
        'all_items'          => __( 'All Staff' ),
        'search_items'       => __( 'Search Staff' ),
        'parent_item_colon'  => __( 'Parent Staff:' ),
        'not_found'          => __( 'No staff found.' ),
        'not_found_in_trash' => __( 'No staff found in Trash.' ),
        'archives'           => __( 'Staff Archives'),
        'insert_into_item'   => __( 'Insert into Staff'),
        'uploaded_to_this_item' => __( 'Uploaded to this Staff'),
        'filter_item_list'   => __( 'Filter Staff list'),
        'items_list_navigation' => __( 'Staff list navigation'),
        'items_list'         => __( 'Staff list'),
        'featured_image'     => __( 'Staff featured image'),
        'set_featured_image' => __( 'Set Staff featured image'),
        'remove_featured_image' => __( 'Remove Staff featured image'),
        'use_featured_image' => __( 'Use as featured image'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'staff' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-businessman',
        'supports'           => array( 'title', 'thumbnail'),
    );
    register_post_type( 'sl-staff', $args );
}
add_action( 'init', 'sl_register_custom_post_types' );



//replace staff title's placeholder to 'enter name here'
function wpb_change_title_text( $title ){
    $screen = get_current_screen();
 
    if  ( 'sl-staff' == $screen->post_type ) {
         $title = 'Enter staff name here';
    }
 
    return $title;
}
 
add_filter( 'enter_title_here', 'wpb_change_title_text' );

//add Custom taxonomy for staff's different location
function sl_register_taxonomies(){

    // Add Staff Category taxonomy
    $labels = array(
        'name'              => _x( 'Staff Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Staff Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Staff Categories' ),
        'all_items'         => __( 'All Staff Category' ),
        'parent_item'       => __( 'Parent Staff Category' ),
        'parent_item_colon' => __( 'Parent Staff Category:' ),
        'edit_item'         => __( 'Edit Staff Category' ),
        'view_item'         => __( 'View Staff Category' ),
        'update_item'       => __( 'Update Staff Category' ),
        'add_new_item'      => __( 'Add New Staff Category' ),
        'new_item_name'     => __( 'New Staff Category Name' ),
        'menu_name'         => __( 'Staff Category' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'staff-categories' ),
    );

    register_taxonomy( 'sl-staff-categories', array( 'sl-staff' ), $args );
}

add_action( 'init', 'sl_register_taxonomies');
