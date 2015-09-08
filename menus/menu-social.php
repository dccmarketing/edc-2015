<div class="wrap-social-menu"><?php

	if ( has_nav_menu( 'social' ) ) {

		$menu['container_class'] 	= 'menu nav-social';
		$menu['container_id']    	= 'menu-social-media';
		$menu['depth']           	= 1;
		$menu['fallback_cb']     	= FALSE;
		$menu['menu_class']      	= 'menu-items';
		$menu['menu_id']         	= 'menu-social-media-items';
		$menu['theme_location']		= 'social';

		wp_nav_menu( $menu );

	}

?></div>