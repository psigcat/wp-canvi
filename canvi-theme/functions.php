<?php
/**
 * Canvi functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Canvi
 */

add_action( 'wp_enqueue_scripts', 'canvi_enqueue_styles' );
function canvi_enqueue_styles() {
   wp_enqueue_style('parent', get_parent_theme_file_uri( 'style.css' ));
   //wp_enqueue_style('canvi', get_stylesheet_uri());
}

// Search
/*register_sidebar(
   array_merge(
      $shared_args,
      array(
         'name'        => __( 'Search', 'canvi' ),
         'id'          => 'sidebar-1',
         'description' => __( 'Widgets in this area will be displayed in the first column.', 'canvi' ),
      )
   )
);*/
