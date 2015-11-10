<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Wanderoper Brandenburg 2015
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function wanderoper_2015_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'wanderoper_2015_body_classes' );

function wanderoper_header_thumbnail_before () {
	$thumb_id = get_post_thumbnail_id();
	$thumb_url = wp_get_attachment_image_src($thumb_id, 'large-thumb', true);

	echo
		'<div class="slider-fallback"  style="background-image: url(' .
		$thumb_url[0] . ')"><div class="slider-fallback-title-wrapper">' .
		'<h1 class="slider-fallback-title">';
}
function wanderoper_no_header_thumbnail_before () {
	echo
		'<div class="slider-fallback"><div class="slider-fallback-title-wrapper">' .
		'<h1 class="slider-fallback-title">';
}

function wanderoper_header_thumbnail_after ()
{
	echo
		'</h1>' .
		'<div style="display: table; margin: 0 auto;">
		<img src="wp-content/themes/wanderoper-2015/images/logo.svg">
		<span>Wanderoper Brandenburg</span></div>' .
		'</div></div>';
}


/**
 *  Get page hierarchy
 */

function wanderoper_permalink ()
{
	// Set up the objects needed
		$my_wp_query = new WP_Query();
		$all_wp_pages = $my_wp_query->query(array('post_type' => 'page'));

	// Get the page as an Object
		$Repertoire =  get_page_by_title('Repertoire');

	// Filter through all pages and find Portfolio's children
		$Repertoire_children = get_page_children( $Repertoire->ID, $all_wp_pages );

	// echo what we get back from WP to the browser
		echo '<pre>' . print_r( $Repertoire_children, true ) . '</pre>';
}