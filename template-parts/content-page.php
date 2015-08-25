<?php
/**
 * Template used for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EDC 2015
 */

?><article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="page-header contentpage"><?php

		the_title( '<h1 class="page-title">', '</h1>' );

	?></header><!-- .entry-header -->

	<div class="page-content"><?php

		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'edc-2015' ),
			'after'  => '</div>',
		) );

	?></div><!-- .entry-content -->

	<footer class="entry-footer"><?php

		edit_post_link( esc_html__( 'Edit', 'edc-2015' ), '<span class="edit-link">', '</span>' );

	?></footer><!-- .entry-footer -->
</article><!-- #post-## -->