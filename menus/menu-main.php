<?php

?><nav id="site-navigation" class="main-navigation" role="navigation">
	<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><span class="dashicons dashicons-arrow-left"></span><span class="dashicons dashicons-menu"></span><?php esc_html_e( 'Menu', 'edc-2015' ); ?></button><?php

		$args['menu_id']  		= 'primary-menu';
		$args['theme_location'] = 'primary';
		$args['walker']  		= new Main_Menu_Walker();

		wp_nav_menu( $args );

?></nav><!-- #site-navigation -->