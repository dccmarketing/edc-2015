/**
 * Opens the current page's submenu. When hovering over another top-level
 * menu item, it closes the current page's submenu and opens the other.
 *
 * Only operates if the current menu item is defined (so not on the homepage).
 */

( function( $ ) {

	$( ".menu-item-has-children" ).each( function() {

		var parent, wrap, submenu, clicker;

		parent = $(this);
		wrap = parent.children( '.wrap-submenu' );
		submenu = wrap.children( ".sub-menu" );
		clicker = parent.children( ".show-hide" );

		enquire.register( "screen and (max-width: 1023px)" , {
			match: function() {
				if ( ! parent.hasClass( "open" ) ) {

					clicker.click( function( event ) {

						event.preventDefault();

						submenu.slideToggle(250);
						parent.toggleClass( "open" );

						if ( parent.hasClass( "open" ) ) {

							clicker.html("-");

						} else {

							clicker.html("+");

						}

					});

				} // if
			},
			unmatch: function() {
				submenu.attr( 'style', '' );
			}
		}); // enquire
	}); // each

	enquire.register( "screen and (min-width: 1024px)" , {

		match: function() {

			var menu, menuitems, current;

			menu = $( '.nav-menu' ); // menu class
			menuitems = menu.children(); // all the top-level menu items
			current = menu.children( '.current-menu-parent' )[0]; // the current top-level menu item parent

			if ( 'undefined' === typeof current ) {

				current = menu.find( '.current-menu-item' )[0]; // the current top-level menu item

			}

			// If current isn't defined, exit
			if ( 'undefined' === typeof current ) { return; }

			/**
			 * Add the "open" class to current so its open
			 */
			$( function() {
				if ( ! $(current).hasClass( 'open' ) ) {

					$(current).addClass( 'open' );

				}
			});

			/**
			 * If other menu items are hovered over, close current,
			 * then open the hovered one.
			 */
			menuitems.each( function() {

				var item = $(this);

				item.hover( function() {

					$(current).toggleClass( 'open' );
					item.toggleClass( 'open' );

				});
			});
		} // unmatch
	});

} )( jQuery );