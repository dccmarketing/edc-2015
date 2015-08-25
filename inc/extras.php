<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package EDC 2015
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param 	array 		$classes 		Classes for the body element.
 * @return 	array 						The modified body class array
 */
function edc_2015_body_classes( $classes ) {

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {

		$classes[] = 'group-blog';

	}

	return $classes;

} // edc_2015_body_classes()
add_filter( 'body_class', 'edc_2015_body_classes' );