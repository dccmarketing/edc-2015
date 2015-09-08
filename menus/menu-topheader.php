<?php if ( has_nav_menu( 'top-header' ) ) {

	$menu['theme_location']		= 'top-header';
	$menu['container'] 			= 'div';
	$menu['container_id']    	= 'menu-topheader';
	$menu['container_class'] 	= 'menu nav-topheader';
	$menu['menu_id']         	= 'menu-topheader-items';
	$menu['menu_class']      	= 'menu-items';
	$menu['depth']           	= 1;
	$menu['fallback_cb']     	= '';
	$menu['items_wrap'] 		= '<ul id="%1$s" class="%2$s">%3$s</ul>';

	wp_nav_menu( $menu );

}