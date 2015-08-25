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

		the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );

		if ( 'post' == get_post_type() ) :

			?><div class="entry-meta"><?php

				edc_2015_posted_on();

			?></div><!-- .entry-meta --><?php

		endif;

	?></header><!-- .entry-header -->

	<div class="entry-content"><?php

			the_excerpt();

	?></div><!-- .entry-content -->

	<footer class="entry-footer"><?php

		edc_2015_entry_footer();

	?></footer><!-- .entry-footer -->
</article><!-- #post-## -->