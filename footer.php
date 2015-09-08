<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EDC 2015
 */

global $edc_2015_themekit;

$mods = get_theme_mods();

		?></div><!-- .wrap -->
	</div><!-- #content --><?php

	do_action( 'after_content' );

	?><footer id="colophon" class="site-footer" role="contentinfo">
		<div class="wrap wrap-footer">
			<div class="text-footer"><?php echo $mods['footer_text']; ?></div>
			<div class="logo-limitless"><a href="<?php echo esc_url( 'http://decaturcitylimitless.com' ); ?>"><?php $edc_2015_themekit->the_svg( 'limitless' ); ?></a></div>
			<div class="site-info">
				<ul>
					<li class="copyright">&copy <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( get_admin_url(), 'edc-2015' ); ?>"><?php echo $mods['footer_owner']; ?></a></li>
					<li class="address"><address><?php echo $mods['footer_address']; ?></address></li>
					<li class="phone"><?php echo $edc_2015_themekit->make_phone_link( $mods['footer_phone'] ); ?></li>
				</ul>
			</div><!-- .site-info -->
		</div><!-- .wrap-footer -->
	</footer><!-- #colophon -->
</div><!-- #page --><?php

wp_footer();

?></body>
</html>