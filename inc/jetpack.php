<?php
/**
 * Jetpack Compatibility File
 *
 * @link https://jetpack.me/
 *
 * @package EDC 2015
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 *
 * @uses 	add_theme_support()
 */
function edc_2015_jetpack_setup() {

	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );

} // edc_2015_jetpack_setup()
add_action( 'after_setup_theme', 'edc_2015_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function edc_2015__infinite_scroll_render() {

	while ( have_posts() ) {

		the_post();
		get_template_part( 'template-parts/content', get_post_format() );

	}

} // edc_2015__infinite_scroll_render