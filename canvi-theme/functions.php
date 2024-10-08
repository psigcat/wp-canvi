<?php
/**
 * Canvi functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package canvi
 */

add_action( 'wp_enqueue_scripts', 'canvi_enqueue_styles' );
function canvi_enqueue_styles() {
   wp_enqueue_style('parent', get_parent_theme_file_uri( 'style.css' ));   // twentytwenty
   //wp_enqueue_style('canvi', get_stylesheet_uri());   // twentytwentyone
}

/**
 * Enqueue scripts and styles.
 */
function canvi_scripts() {
   wp_enqueue_style( 'swiper-style', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.1.14' );
   wp_enqueue_script( 'swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.1.14', true );
}
add_action( 'wp_enqueue_scripts', 'canvi_scripts' );

/**
 * Register blocks
 */
function canvi_register_blocks() {
    register_block_type( __DIR__ . '/blocks/swiper' );
}
add_action( 'init', 'canvi_register_blocks' );
