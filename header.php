<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EDC 2015
 */

global $edc_2015_themekit;

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"><?php

wp_head();

?></head>

<body <?php body_class(); ?>><?php

do_action( 'after_body' );

	?><a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'edc-2015' ); ?></a>
	<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">
		<div class="wrap wrap-header">
			<div class="site-branding">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<div class="site-logo"><?php

						$info = $edc_2015_themekit->get_customizer_image_info( 'site_logo' );

						?><img alt="<?php echo $info['alt']; ?>" class="logo" src="<?php echo $info['url']; ?>">
					</div>
				</a>
			</div><!-- .site-branding -->
			<div class="header-menus"><?php

				get_template_part( 'menus/menu', 'topheader' );

				get_template_part( 'menus/menu', 'main' );

			?></div><!-- .header-menus --><?php

			//get_template_part( 'menus/menu', 'social' );

		?></div><!-- .header_wrap -->
	</header><!-- #masthead --><?php

	do_action( 'after_header' );

	?><div id="content" class="site-content">
		<div class="wrap wrap-content">
			<div class="breadcrumbs">
				<div class="wrap-crumbs"><?php

					do_action( 'edc_2015_breadcrumbs' );

				?></div><!-- .wrap-crumbs -->
			</div><!-- .breadcrumbs -->