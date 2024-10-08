<?php
/*
Plugin Name: Canvi
Plugin URL: https://github.com/psigcat/wp-canvi
Description: Custom post types for project Canvi
Author: Gerald Kogler
Author URI: http://go.yuri.at
Text Domain: canvi
*/

/**
 * load textdomain
 */
add_action( 'init', 'canvi_load_textdomain' );
function canvi_load_textdomain() {
	load_plugin_textdomain('canvi', false, dirname(plugin_basename(__FILE__)));
}

/**
 * remove default post type
 */
add_action('admin_menu','canvi_remove_default_post_type');
function canvi_remove_default_post_type() {
	remove_menu_page('edit.php');
}

/**
 * limit searches to post_type
 */
add_filter('pre_get_posts', 'canvi_filter_search_parcela');
function canvi_filter_search_parcela($query) {

	//trigger_error(json_encode($query), E_USER_WARNING);

    if( $query->is_search ) 
    	$query->set('post_type', array('parcela'));

    return $query;
}

/**
 * Join posts and postmeta tables
 *
 * https://adambalee.com/search-wordpress-by-custom-fields-without-a-plugin/
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_join
 */
function canvi_search_join( $join ) {
    global $wpdb;

    if ( is_search() ) {    
        $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }

    return $join;
}
add_filter('posts_join', 'canvi_search_join' );

/**
 * Modify the search query with posts_where
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
 */
function canvi_search_where( $where ) {
    global $pagenow, $wpdb;

    if ( is_search() ) {
        $where = preg_replace(
            "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
            "(".$wpdb->postmeta.".meta_value LIKE $1)", $where );
    }

    return $where;
}
add_filter( 'posts_where', 'canvi_search_where' );

/**
 * Prevent duplicates
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
 */
function parcela_search_distinct( $where ) {
    global $wpdb;

    if ( is_search() ) {
        return "DISTINCT";
    }

    return $where;
}
add_filter( 'posts_distinct', 'parcela_search_distinct' );

/**
 * Limit the main query search results to 25.
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/post_limits
 */
function canvi_filter_main_search_post_limits( $limit, $query ) {

	if ( ! is_admin() && $query->is_main_query() && $query->is_search() ) {
		return 'LIMIT 0, 100';
	}

	return $limit;
}
add_filter( 'post_limits', 'canvi_filter_main_search_post_limits', 10, 2 );

/**
 * Add custom post types to 'At a Glance' widget
 */
function canvi_add_custom_post_counts() {
   $post_types = array('canvi');  // array of custom post types to add to 'At A Glance' widget
   foreach ($post_types as $pt) :
      $pt_info = get_post_type_object($pt); // get a specific CPT's details
      $num_posts = wp_count_posts($pt); // retrieve number of posts associated with this CPT
      $num = number_format_i18n($num_posts->publish); // number of published posts for this CPT
      $text = _n( $pt_info->labels->singular_name, $pt_info->labels->name, intval($num_posts->publish) ); // singular/plural text label for CPT
      echo '<li class="page-count '.$pt_info->name.'-count"><a href="edit.php?post_type='.$pt.'">'.$num.' '.$text.'</a></li>';
   endforeach;
}
add_action('dashboard_glance_items', 'canvi_add_custom_post_counts');

/**
 * add capabilities for type parcela
 */
function canvi_add_cap_upload() {
	// roles:
	// super (=WP admin)
	// master (=WP editor): edit everything, manage content and users
	// editor (=WP author): publish new authors and obras
	// col·laborador (=WP contributor): edit some fields, create petitions
	// amic (=WP subscriber): favorites, sign petitions, comments

	// admin
	$role = get_role( 'administrator' );

    $role->add_cap( 'edit_parcelas' ); 
    $role->add_cap( 'edit_published_parcelas' ); 
    $role->add_cap( 'edit_private_parcelas' ); 
    $role->add_cap( 'edit_others_parcelas' ); 
    $role->add_cap( 'publish_parcelas' ); 
    $role->add_cap( 'read_private_parcelas' ); 
    $role->add_cap( 'delete_private_parcelas' ); 
    $role->add_cap( 'delete_parcelas' ); 
    $role->add_cap( 'delete_published_parcelas' ); 
    $role->add_cap( 'delete_others_parcelas' );
}
add_action( 'init', 'canvi_add_cap_upload' );

?>