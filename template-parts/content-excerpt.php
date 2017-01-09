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

	?></header><!-- .entry-header -->

	<div class="entry-content"><?php

			the_excerpt();

	?></div><!-- .entry-content -->

	<footer class="entry-footer"><?php

		if ( 'post' == get_post_type() ) :

			?><span class="entry-meta"><?php

				edc_2015_posted_on();

			?></span><!-- .entry-meta --><?php

		endif;

		edc_2015_entry_footer();

	?></footer><!-- .entry-footer -->
</article><!-- #post-## -->