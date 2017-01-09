<?php

/**
 * A class of helpful theme functions
 *
 * @package EDC 2015
 * @author Slushman <chris@slushman.com>
 */
class edc_2015_Actions_and_Filters {

	/**
	 * Constructor
	 */
	public function __construct() {

		$this->loader();

	} // __construct()

	/**
	 * Loads all filter and action calls
	 */
	private function loader() {

		add_action( 'init', array( $this, 'disable_emojis' ) );
		add_action( 'after_setup_theme', array( $this, 'more_setup' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'more_scripts_and_styles' ) );
		add_action( 'login_enqueue_scripts', array( $this, 'login_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts_and_styles' ) );
		add_action( 'after_body', array( $this, 'analytics_code' ) );
		add_filter( 'post_mime_types', array( $this, 'add_mime_types' ) );
		add_filter( 'upload_mimes', array( $this, 'custom_upload_mimes' ) );
		add_filter( 'body_class', array( $this, 'page_body_classes' ) );
		add_action( 'wp_head', array( $this, 'background_images' ) );
		add_filter( 'excerpt_length', array( $this, 'excerpt_length' ) );
		add_filter( 'excerpt_more', array( $this, 'excerpt_read_more' ) );
		add_filter( 'mce_buttons_2', array( $this, 'add_editor_buttons' ) );
		add_action( 'edc_2015_breadcrumbs', array( $this, 'breadcrumbs' ) );
		add_filter( 'wpseo_breadcrumb_single_link', array( $this, 'unlink_private_pages' ), 10, 2 );
		add_filter( 'wp_seo_get_bc_title', array( $this, 'remove_private' ) );
		add_action( 'after_body', array( $this, 'add_hidden_search' ) );
		add_action( 'after_header', array( $this, 'after_header' ) );
		add_action( 'after_content', array( $this, 'after_content' ) );
		add_filter( 'get_search_form', array( $this, 'make_search_button_a_button' ) );
		add_action( 'after_body', array( $this, 'add_slider' ) );
		add_filter( 'manage_page_posts_columns', array( $this, 'page_template_column_head' ), 10 );
		add_action( 'manage_page_posts_custom_column', array( $this, 'page_template_column_content' ), 10, 2 );
		add_filter( 'soliloquy_output_end', array( $this, 'append_slider' ), 10, 2 );
		add_filter( 'style_loader_src', array( $this, 'remove_cssjs_ver' ), 10, 2 );
		add_filter( 'script_loader_src', array( $this, 'remove_cssjs_ver' ), 10, 2 );

	} // loader()

	/**
	 * Additional theme setup
	 *
	 * @hook 		after_setup_theme
	 */
	public function more_setup() {

		register_nav_menus( array(
			'footer' => esc_html__( 'Footer Menu', 'edc-2015' ),
			'sites' => esc_html__( 'Site Selections', 'edc-2015' ),
			'social' => esc_html__( 'Social Links', 'edc-2015' ),
			'top-header' => esc_html__( 'Top Header', 'edc-2015' )
		) );

		add_theme_support( 'yoast-seo-breadcrumbs' );

	} // more_setup()

	/**
	 * Enqueues scripts and styles for the admin
	 *
	 * @hook 		admin_enqueue_scripts
	 */
	public function admin_scripts_and_styles() {

		wp_enqueue_style( 'edc-2015-admin', get_stylesheet_directory_uri() . '/admin.css' );

	} // admin_scripts_and_styles()

	/**
	 * Enqueues additional scripts and styles
	 *
	 * @hook 		wp_enqueue_scripts
	 */
	public function more_scripts_and_styles() {

		wp_enqueue_style( 'dashicons' );
		wp_enqueue_script( 'edc-2015-search', get_template_directory_uri() . '/js/hidden-search.min.js', array(), '20150807', true );
		wp_enqueue_script( 'enquire', '//cdnjs.cloudflare.com/ajax/libs/enquire.js/2.1.2/enquire.min.js', array(), '20150804', true );
		wp_enqueue_script( 'edc-2015-menu-scripts', get_template_directory_uri() . '/js/menu-scripts.min.js', array( 'jquery', 'enquire' ), '20150904', true );
		// wp_enqueue_style( 'edc-2015-fonts', fonts_url(), array(), null );

	} // more_scripts_and_styles()

	/**
	 * Enqueues scripts and styles for the login page
	 *
	 * @hook 		login_enqueue_scripts
	 */
	function login_scripts() {

		wp_enqueue_style( 'edc-2015-login', get_stylesheet_directory_uri() . '/login.css', 10, 2 );

	} // login_scripts()




	/**
	 * Add core editor buttons that are disabled by default
	 *
	 * @hook 		mce_buttons_2
	 */
	function add_editor_buttons( $buttons ) {

		$buttons[] = 'superscript';
		$buttons[] = 'subscript';

		return $buttons;

	} // add_editor_buttons()

	/**
	 * Adds a hidden search field
	 *
	 * @hook 		after_body
	 *
	 * @return 		mixed 			The HTML markup for a search field
	 */
	public function add_hidden_search() {

		?><div aria-hidden="true" class="hidden-search-top" id="hidden-search-top">
			<div class="wrap"><?php

			get_search_form();

			?></div>
		</div><?php

	} // add_hidden_search()

	/**
	 * Adds PDF as a filter for the Media Library
	 *
	 * @hook 		post_mime_types
	 *
	 * @param 		array 		$post_mime_types 		The current MIME types
	 * @return 		array 								The modified MIME types
	 */
	public function add_mime_types( $post_mime_types ) {

	    $post_mime_types['application/pdf'] = array( esc_html__( 'PDFs', 'edc-2015' ), esc_html__( 'Manage PDFs', 'edc-2015' ), _n_noop( 'PDF <span class="count">(%s)</span>', 'PDFs <span class="count">(%s)</span>' ) );
	    $post_mime_types['text/x-vcard'] = array( esc_html__( 'vCards', 'edc-2015' ), esc_html__( 'Manage vCards', 'edc-2015' ), _n_noop( 'vCard <span class="count">(%s)</span>', 'vCards <span class="count">(%s)</span>' ) );

	    return $post_mime_types;

	} // add_mime_types

	/**
	 * Inserts content after the main content and before the footer.
	 *
	 * @hook 		after_content
	 */
	public function after_content() {

		if ( is_front_page() ) {

			do_action( 'woothemes_testimonials', array( 'limit' => 1, 'order' => 'DESC', 'orderby' => 'date' ) );

		} elseif ( ! is_front_page() || ! is_home() ) {

			get_template_part( 'menus/menu', 'footer' );

		}

	} // after_content()

	/**
	 * Inserts content after the header and before the main content.
	 *
	 * @hook 		after_header
	 */
	public function after_header() {

		get_template_part( 'menus/menu', 'social' );

		if ( is_front_page() ) {

			get_template_part( 'template-parts/content', 'homeslider' );

		} else {

			get_template_part( 'template-parts/content', 'afterheader' );

		}

	} // after_header()

	/**
	 * Adds a slider to the front page
	 *
	 * @hook 		after_header
	 */
	public function add_slider() {

		if ( is_front_page() ) {

			if ( function_exists( 'soliloquy' ) ) {

				soliloquy( 'home', 'slug' );

			}

		}

	} // add_slider()

	/**
	 * Inserts Google Tag manager code after body tag
	 *
	 * @hook 		after_body
	 *
	 * @return 		mixed 		The inserted Google Tag Manager code
	 */
	public function analytics_code() { ?>

<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-K3ZDKQ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K3ZDKQ');</script>
<!-- End Google Tag Manager -->

	<?php } // analytics_code()

	/**
	 * Appends the latest news story to the slider
	 * to match styling.
	 *
	 * @param  [type] $slider [description]
	 * @param  [type] $data   [description]
	 * @return [type]         [description]
	 */
	public function append_slider( $slider, $data ) {

		$return = '';
		$return .= $slider;

		ob_start();

		get_template_part( 'template-parts/content', 'homelatest' );

		$appendage = ob_get_contents();

		ob_end_clean();

		$return .= $appendage;

		return $return;

	} // append_slider()

	/**
	 * Creates a style tag in the header with the background image
	 *
	 * @hook 		wp_head
	 *
	 * @return 		void
	 */
	public function background_images() {

		global $edc_2015_themekit;

		$output = '';
		$image 	= '';

		if ( ! is_singular( 'employee' ) ) {

			$image = $edc_2015_themekit->get_thumbnail_url( get_the_ID(), 'full' );

		}

		if ( ! $image ) {

			$imageID	= get_theme_mod( 'default_header_image' );
			$images 	= wp_prepare_attachment_for_js( $imageID );
			$image 		= $images['sizes']['full']['url'];

		}

		if ( ! empty( $image ) ) {

			$output .= '<style>';
			$output .= '@media screen and (min-width:768px){.after-header-subpage{background-image:url(' . $image . ');}';
			$output .= '</style>';

		}

		echo $output;

	} // background_images()

	/**
	 * Returns the appropriate breadcrumbs.
	 *
	 * @hook 		edc_2015_breadcrumbs
	 *
	 * @return 		mixed 				WooCommerce breadcrumbs, then Yoast breadcrumbs
	 */
	public function breadcrumbs() {

		$crumbs = '';

		if ( function_exists( 'woocommerce_breadcrumb' ) ) {

			$args['after'] 			= '</span>';
			$args['before'] 		= '<span rel="v:child" typeof="v:Breadcrumb">';
			$args['delimiter'] 		= '&nbsp;>&nbsp;';
			$args['home'] 			= esc_html_x( 'Home', 'breadcrumb', 'edc-2015' );
			$args['wrap_after'] 	= '</span></span></nav>';
			$args['wrap_before'] 	= '<nav class="woocommerce-breadcrumb" ' . ( is_single() ? 'itemprop="breadcrumb"' : '' ) . '><span xmlns:v="http://rdf.data-vocabulary.org/#"><span typeof="v:Breadcrumb">';

			$crumbs = woocommerce_breadcrumb( $args );

		} elseif( function_exists( 'yoast_breadcrumb' ) ) {

			$crumbs = yoast_breadcrumb();

		}

		return $crumbs;

	} // breadcrumbs()

	/**
	 * Adds support for additional MIME types to WordPress
	 *
	 * @hook 		upload_mimes
	 *
	 * @param 		array 		$existing_mimes 			The existing MIME types
	 * @return 		array 									The modified MIME types
	 */
	public function custom_upload_mimes( $existing_mimes = array() ) {

		// add your extension to the array
		$existing_mimes['vcf'] = 'text/x-vcard';

		return $existing_mimes;

	} // custom_upload_mimes()

	/**
	 * Removes WordPress emoji support everywhere
	 *
	 * @hook 		init
	 */
	function disable_emojis() {

		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

	} // disable_emojis()

	/**
	 * Limits excerpt length
	 *
	 * @hook 		excerpt_length
	 *
	 * @param 		int 		$length 			The current word length of the excerpt
	 * @return 		int 							The word length of the excerpt
	 */
	public function excerpt_length( $length ) {

		if ( is_home() || is_front_page() ) {

			return 30;

		}

		return $length;

	} // excerpt_length()

	/**
	 * Customizes the "Read More" text for excerpts
	 *
	 * @hook 		excerpt_more
	 *
	 * @global   					$post 		The post object
	 * @param 		mixed 			$more 		The current "read more"
	 * @return 		mixed 						The modifed "read more"
	 */
	public function excerpt_read_more( $more ) {

		global $post;

		$return = sprintf( '... <a class="moretag read-more" href="%s">', esc_url( get_permalink( $post->ID ) ) );
		$return .= esc_html__( 'Read more', 'dcc-2015' );
		$return .= '<span class="screen-reader-text">';
		$return .= sprintf( esc_html__( ' about %s', 'dcc-2015' ), $post->post_title );
		$return .= '</span></a>';

		return $return;

	} // excerpt_read_more()

	/**
	 * Properly encode a font URLs to enqueue a Google font
	 *
	 * @see 		more_scripts_and_styles
	 * @return 		mixed 		A properly formatted, translated URL for a Google font
	 */
	public function fonts_url() {

		$return 	= '';
		$families 	= '';
		$fonts[] 	= array( 'font' => 'Oxygen', 'weights' => '400,700', 'translate' => esc_html_x( 'on', 'Oxygen font: on or off', 'edc-2015' ) );

		foreach ( $fonts as $font ) {

			if ( 'off' == $font['translate'] ) { continue; }

			$families[] = $font['font'] . ':' . $font['weights'];

		}

		if ( ! empty( $families ) ) {

			$query_args['family'] 	= urlencode( implode( '|', $families ) );
			$query_args['subset'] 	= urlencode( 'latin,latin-ext' );
			$return 				= add_query_arg( $query_args, '//fonts.googleapis.com/css' );

		}

		return $return;

	} // fonts_url()

	/**
	 * Converts the search input button to an HTML5 button element
	 *
	 * @hook 		get_search_form
	 *
	 * @param 		mixed  		$form 			The current form HTML
	 * @return 		mixed 						The modified form HTML
	 */
	public function make_search_button_a_button( $form ) {

		$form = '<form action="' . esc_url( home_url( '/' ) ) . '" class="search-form" method="get" role="search" >
				<label class="screen-reader-text" for="site-search">' . _x( 'Search for:', 'label' ) . '</label>
				<input class="search-field" id="site-search" name="s" placeholder="' . esc_attr_x( 'Search &hellip;', 'placeholder' ) . '" title="' . esc_attr_x( 'Search for:', 'label' ) . '" type="search" value="' . get_search_query() . '"  />
				<button type="submit" class="search-submit">
					<span class="screen-reader-text">'. esc_attr_x( 'Search', 'submit button' ) .'</span>
					<span class="dashicons dashicons-search"></span>
				</button>
			</form>';

		return $form;

	} // make_search_button_a_button()

	/**
	 * Adds the name of the page or post to the body classes.
	 *
	 * @hook 		body_class
	 *
	 * @global 		$post						The $post object
	 * @param 		array 		$classes 		Classes for the body element.
	 * @return 		array 						The modified body class array
	 */
	public function page_body_classes( $classes ) {

		global $post;

		if ( empty( $post->post_content ) ) {

			$classes[] = 'content-none';

		} else {

			$classes[] = $post->post_name;

		}

		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {

			$classes[] = 'group-blog';

		}

		return $classes;

	} // page_body_classes()

	/**
	 * The content for each column cell
	 *
	 * @return 	mixed 		The cell content
	 */
	public function page_template_column_content( $column_name, $post_ID ) {

		if ( 'page_template' !== $column_name ) { return; }

		$slug 		= get_page_template_slug( $post_ID );
		$templates 	= get_page_templates();
		$name 		= array_search( $slug, $templates );

		if ( ! empty( $name ) ) {

			echo '<span class="name-template">' . $name . '</span>';

		} else {

			echo '<span class="name-template">' . esc_html( 'Default', 'edc-2015' ) . '</span>';

		}

	} // page_template_column_content()

	/**
	 * Adds the page template column to the columns on the page listings
	 *
	 * @param 	array 		$defaults 			The current column names
	 * @return 	array           				The modified column names
	 */
	public function page_template_column_head( $defaults ) {

		$defaults['page_template'] = 'Page Template';

	    return $defaults;

	} // page_template_column_head()

	/**
	 * Removes query strings from static resources
	 * to increase Pingdom and GTMatrix scores.
	 *
	 * Does not remove query strings from Google Font calls.
	 *
	 * @param 	string 		$src 			The resource URL
	 * @return 	string 						The modifed resource URL
	 */
	function remove_cssjs_ver( $src ) {

		if ( empty( $src ) ) { return; }
		if ( strpos( $src, 'https://fonts.googleapis.com' ) ) { return; }

		if ( strpos( $src, '?ver=' ) ) {

			$src = remove_query_arg( 'ver', $src );

		}

		return $src;

	} // remove_cssjs_ver()

	/**
	 * Removes the "Private" text from the private pages in the breadcrumbs
	 *
	 * @hook 		wp_seo_get_bc_title
	 *
	 * @param 		string 		$text 			The breadcrumb text
	 * @return 		string 						The modified breadcrumb text
	 */
	public function remove_private( $text ) {

		$check = stripos( $text, 'Private: ' );

		if ( is_int( $check ) ) {

			$text = str_replace( 'Private: ', '', $text );

		}

		return $text;

	} // remove_private()

	/**
	 * Unlinks breadcrumbs that are private pages
	 *
	 * @hook 		wpseo_breadcrumb_single_link
	 *
	 * @param 		mixed 		$output 		The HTML output for the breadcrumb
	 * @param 		array 		$link 			Array of link info
	 * @return 		mixed 						The modified link output
	 */
	public function unlink_private_pages( $output, $link ) {

		$id 		= url_to_postid( $link['url'] );
		$options 	= WPSEO_Options::get_all();

		if ( $options['breadcrumbs-home'] !== $link['text'] && 0 === $id ) {

			$output = '<span rel="v:child" typeof="v:Breadcrumb">' . $link['text'] . '</span>';

		}

		return $output;

	} // unlink_private_pages()

} // class

/**
 * Make an instance so its ready to be used
 */
$edc_2015_actions_and_filters = new edc_2015_Actions_and_Filters();
