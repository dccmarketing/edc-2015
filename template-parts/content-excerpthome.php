<?php
/**
 * Template part for displaying post excerpts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EDC 2015
 */

?><article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header justcontent"><?php

		the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );

	?></header><!-- .entry-header -->

	<div class="entry-content"><?php

			the_excerpt();

	?></div><!-- .entry-content -->
</article><!-- #post-## -->