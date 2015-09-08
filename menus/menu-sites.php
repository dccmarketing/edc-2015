<?php if ( has_nav_menu( 'sites' ) ) {

	$menu['theme_location']		= 'sites';
	$menu['container'] 			= 'div';
	$menu['container_id']    	= 'menu-sites';
	$menu['container_class'] 	= 'menu nav-sites';
	$menu['menu_id']         	= 'menu-sites-items';
	$menu['menu_class']      	= 'menu-items';
	$menu['depth']           	= 1;
	$menu['fallback_cb']     	= '';

	wp_nav_menu( $menu );

}