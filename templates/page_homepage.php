<?php
/**
 * Template Name: Homepage
 *
 * Description: A full-width template with no sidebar
 *
 * @package EDC 2015
 */

global $edc_2015_themekit;

$mods 						= get_theme_mods();
$mip 						= $edc_2015_themekit->get_customizer_image_info( 'mip_promo_logo' );

get_header();

	?><div id="primary" class="content-area full-width">
		<main id="main" class="site-main" role="main">
			<section class="news">
				<h2 class="section-title"><?php esc_html_e( 'Announcements', 'edc-2015' ); ?></h2><?php

				$args['offset'] 		= 1;
				$args['posts_per_page'] = 3;
				$news 					= $edc_2015_themekit->get_posts( 'post', $args, 'home' );

				while ( $news->have_posts() ) : $news->the_post();

					get_template_part( 'template-parts/content', 'excerpthome' );

				endwhile; // loop

				wp_reset_postdata();

				?><div class="link-news">
					<a href="<?php echo esc_url( $edc_2015_themekit->get_posts_page() ); ?>"><?php

						esc_html_e( 'View all announcements', 'edc-2015' );

					?></a>
				</div>
			</section>
			<section class="sites"><?php

				?><h2 class="section-title"><?php esc_html_e( 'Site Selection', 'edc-2015' ); ?></h2><?php

				get_template_part( 'menus/menu', 'sites' );

			?></section>
			<a class="btn-mip" href="<?php echo esc_url( $mods['mip_promo_url'] ); ?>">
				<div class="text-mip">
					<div class="mip-line1"><?php

						esc_html_e( $mods['mip_promo_line1'], 'edc-2015' );

					?></div><div class="mip-line2"><?php

						esc_html_e( $mods['mip_promo_line2'], 'edc-2015' );

					?></div>
				</div>
				<img alt="<?php echo esc_attr( $mip['alt'] ); ?>" class="logo-mip" src="<?php echo esc_url( $mip['url'] ); ?>">
			</a>
			<section class="page-content"><?php

				the_content();

			?></section>
		</main><!-- #main -->
	</div><!-- #primary --><?php

get_footer();