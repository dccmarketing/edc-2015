<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package DocBlock
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param 	array 		$classes 		Classes for the body element.
 * @return 	array 						The modified body class array
 */
function function_names_body_classes( $classes ) {

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {

		$classes[] = 'group-blog';

	}

	return $classes;

} // function_names_body_classes()
add_filter( 'body_class', 'function_names_body_classes' );