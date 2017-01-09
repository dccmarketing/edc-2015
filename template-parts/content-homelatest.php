<?php
/**
 * Template part for displaying the latest post on the home page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EDC 2015
 */

global $edc_2015_themekit;

$args['posts_per_page'] 	= 1;
$latest 					= $edc_2015_themekit->get_posts( 'post', $args, 'homelatest' );

while ( $latest->have_posts() ) : $latest->the_post();

	?><div class="section"><?php

		the_title( '<div class="line1">', '</div>' );

		if ( function_exists( 'the_subtitle' ) ) {

			the_subtitle( '<div class="line2">', '</div>' );

		}

		?><a class="btn-more" href="<?php esc_url( the_permalink() ); ?>">Learn More<?php the_title( '<span class="screen-reader-text"> about ', '</span>' ); ?></a>
	</div><?php

endwhile; // loop