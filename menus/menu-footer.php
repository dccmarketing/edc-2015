<?php if ( has_nav_menu( 'footer' ) ) {

	$menu['theme_location']		= 'footer';
	$menu['container'] 			= 'div';
	$menu['container_id']    	= 'menu-footer';
	$menu['container_class'] 	= 'menu nav-footer';
	$menu['menu_id']         	= 'menu-footer-items';
	$menu['menu_class']      	= 'menu-items';
	$menu['depth']           	= 1;
	$menu['fallback_cb']     	= '';

	wp_nav_menu( $menu );

}