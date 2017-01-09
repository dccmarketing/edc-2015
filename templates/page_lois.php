<?php
/**
 * Template Name: LOIS embed, full-width, no sidebar
 *
 * @package EDC 2015
 */

get_header();

	?><div id="primary" class="content-area full-width">
		<main id="main" class="site-main" role="main"><?php

			while ( have_posts() ) : the_post();

				?><article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="page-header contentpage"><?php

						the_title( '<h1 class="page-title">', '</h1>' );

					?></header><!-- .entry-header -->

					<div class="page-content">
						<div class="content-mobile"><?php

							the_content();

						?></div>
						<div class="wrap-lois">
							<iframe class="embed-lois" src="<?php echo esc_url( 'http://www.locationone.com/lois/logon.do?username=IL_EDCofDecaturMac1&appsection=sites' ); ?>" width="970" height="1950" scrolling="no" frameborder="0"></iframe>
						</div>
					</div><!-- .entry-content -->

					<footer class="entry-footer"><?php

						edit_post_link( esc_html__( 'Edit', 'mip-2015' ), '<span class="edit-link">', '</span>' );

					?></footer><!-- .entry-footer -->
				</article><!-- #post-## --><?php

			endwhile; // loop

		?></main><!-- #main -->
	</div><!-- #primary --><?php

get_footer();