<?php
/**
 * _s Theme Customizer.
 *
 * @package _s
 */
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

/**
 * EDC 2015 Theme Customizer
 *
 * Contains methods for customizing the theme customization screen.
 *
 * @link 		https://codex.wordpress.org/Theme_Customization_API
 * @since 		1.0.0
 * @package  	DocBlock
 */
class edc_2015_Customize {

   /**
	* This hooks into 'customize_register' (available as of WP 3.4) and allows
	* you to add new sections and controls to the Theme Customize screen.
	*
	* Note: To enable instant preview, we have to actually write a bit of custom
	* javascript. See live_preview() for more.
	*
	* Existing sections:
	*
	* title_tagline - Site Identity
	* colors - Colors
	* header_image - Header Image
	* background_image - Background Image
	* nav - Navigation
	* static_front_page - Static Front Page
	*
	* @access 		public
	* @see 			add_action( 'customize_register', $func )
	* @param 		WP_Customize_Manager 		$wp_customize 		Theme Customizer object.
	* @link 		http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
	* @since 		1.0.0
	*/
	public static function register( $wp_customize ) {

		// Theme Options Panel
		$wp_customize->add_panel( 'theme_options',
			array(
				'capability'  		=> 'edit_theme_options',
				'description'  		=> esc_html__( 'Options for EDC 2015', 'edc-2015' ),
				'priority'  		=> 10,
				'theme_supports'  	=> '',
				'title'  			=> esc_html__( 'Theme Options', 'edc-2015' ),
			)
		);



		// Sections

		// Home Page
		$wp_customize->add_section( 'homepage',
			array(
				'capability' 	=> 'edit_theme_options',
				'description' 	=> esc_html__( 'Options for the home page', 'edc-2015' ),
				'panel' 		=> 'theme_options',
				'priority' 		=> 10,
				'title' 		=> esc_html__( 'Homepage', 'edc-2015' )
			)
		);

		// Images
		$wp_customize->add_section( 'images_options',
			array(
				'capability' 	=> 'edit_theme_options',
				'description' 	=> esc_html__( 'Image Options', 'edc-2015' ),
				'panel' 		=> 'theme_options',
				'priority' 		=> 10,
				'title' 		=> esc_html__( 'Images', 'edc-2015' )
			)
		);

		// Footer Options
		$wp_customize->add_section( 'footer_options',
			array(
				'capability' 	=> 'edit_theme_options',
				'description' 	=> esc_html__( 'Options for the site footer', 'edc-2015' ),
				'panel' 		=> 'theme_options',
				'priority' 		=> 10,
				'title' 		=> esc_html__( 'Footer Options', 'edc-2015' )
			)
		);




		// Fields

		// MIP Promo Button Line 1 Field
		$wp_customize->add_setting(
			'mip_promo_line1',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'mip_promo_line1',
			array(
				'description' 	=> esc_html__( '', 'edc-2015' ),
				'label'  	=> esc_html__( 'MIP Promo Button Line 1', 'edc-2015' ),
				'section'  	=> 'homepage',
				'settings' 	=> 'mip_promo_line1',
				'type' 		=> 'text'
			)
		);
		$wp_customize->get_setting( 'mip_promo_line1' )->transport = 'postMessage';

		// MIP Promo Button Line 2 Field
		$wp_customize->add_setting(
			'mip_promo_line2',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'mip_promo_line2',
			array(
				'description' 	=> esc_html__( '', 'edc-2015' ),
				'label'  	=> esc_html__( 'MIP Promo Button Line 2', 'edc-2015' ),
				'section'  	=> 'homepage',
				'settings' 	=> 'mip_promo_line2',
				'type' 		=> 'text'
			)
		);
		$wp_customize->get_setting( 'mip_promo_line2' )->transport = 'postMessage';

		// MIP Promo Button Logo Field
		$wp_customize->add_setting(
			'mip_promo_logo',
			array(
				'default' => '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'mip_promo_logo',
				array(
					'description' 	=> esc_html__( '', 'edc-2015' ),
					'label' => esc_html__( 'MIP Promo Logo', 'edc-2015' ),
					'section' => 'homepage',
					'settings' => 'mip_promo_logo'
				)
			)
		);
		$wp_customize->get_setting( 'mip_promo_logo' )->transport = 'postMessage';

		// MIP Button URL Field
		$wp_customize->add_setting(
			'mip_promo_url',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'mip_promo_url',
			array(
				'description' 	=> esc_html__( '', 'edc-2015' ),
				'label' => esc_html__( 'MIP Promo URL', 'edc-2015' ),
				'section' => 'homepage',
				'settings' => 'mip_promo_url',
				'type' => 'url'
			)
		);
		$wp_customize->get_setting( 'mip_promo_url' )->transport = 'postMessage';

		// YouTube URL Field
		$wp_customize->add_setting(
			'youtube_url',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'youtube_url',
			array(
				'description' 	=> esc_html__( '', 'edc-2015' ),
				'label' => esc_html__( 'YouTube URL', 'edc-2015' ),
				'section' => 'homepage',
				'settings' => 'youtube_url',
				'type' => 'url'
			)
		);
		$wp_customize->get_setting( 'youtube_url' )->transport = 'postMessage';






		// Footer Text Field
		$wp_customize->add_setting(
			'footer_text',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'footer_text',
			array(
				'description' 	=> esc_html__( '', 'edc-2015' ),
				'label' => esc_html__( 'Footer Text', 'edc-2015' ),
				'section' => 'footer_options',
				'settings' => 'footer_text',
				'type' => 'textarea'
			)
		);
		$wp_customize->get_setting( 'footer_text' )->transport = 'postMessage';

		// Footer Owner Field
		$wp_customize->add_setting(
			'footer_owner',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'footer_owner',
			array(
				'description' 	=> esc_html__( 'The text in the footer used in the copyright notice.', 'edc-2015' ),
				'label' => esc_html__( 'Footer Owner Text', 'edc-2015' ),
				'section' => 'footer_options',
				'settings' => 'footer_owner',
				'type' => 'text'
			)
		);
		$wp_customize->get_setting( 'footer_owner' )->transport = 'postMessage';

		// Footer Address Field
		$wp_customize->add_setting(
			'footer_address',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'footer_address',
			array(
				'description' 	=> esc_html__( 'The address in the site footer.', 'edc-2015' ),
				'label' => esc_html__( 'Footer Address', 'edc-2015' ),
				'section' => 'footer_options',
				'settings' => 'footer_address',
				'type' => 'text'
			)
		);
		$wp_customize->get_setting( 'footer_address' )->transport = 'postMessage';

		// Footer Phone Number Field
		$wp_customize->add_setting(
			'footer_phone',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'footer_phone',
			array(
				'description' 	=> esc_html__( 'The phone number in the site footer.', 'edc-2015' ),
				'label' => esc_html__( 'Footer Phone Number', 'edc-2015' ),
				'section' => 'footer_options',
				'settings' => 'footer_phone',
				'type' => 'text'
			)
		);
		$wp_customize->get_setting( 'footer_phone' )->transport = 'postMessage';



		$wp_customize->add_setting(
			'default_header_image',
			array(
				'default' => '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Media_Control(
				$wp_customize,
				'default_header_image',
				array(
					'description' 	=> esc_html__( '', 'tillotson' ),
					'label' => esc_html__( 'Default Header Image', 'tillotson' ),
					'mime_type' => '',
					'section' => 'images_options',
					'settings' => 'default_header_image'
				)
			)
		);
		$wp_customize->get_setting( 'default_header_image' )->transport = 'postMessage';

/*
		// Theme Options Panel
		$wp_customize->add_panel( 'theme_options',
			array(
				'capability'  		=> 'edit_theme_options',
				'description'  		=> esc_html__( 'Options for EDC 2015', 'edc-2015' ),
				'priority'  		=> 10,
				'theme_supports'  	=> '',
				'title'  			=> esc_html__( 'Theme Options', 'edc-2015' ),
			)
		);



		// New Section
		$wp_customize->add_section( 'new_section',
			array(
				'capability' 	=> 'edit_theme_options',
				'description' 	=> esc_html__( 'New Customizer Section', 'edc-2015' ),
				'panel' 		=> 'theme_options',
				'priority' 		=> 10,
				'title' 		=> esc_html__( 'New Section', 'edc-2015' )
			)
		);



		// Add Fields & Controls

		// Text Field
		$wp_customize->add_setting(
			'text_field',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'text_field',
			array(
				'description' 	=> esc_html__( '', 'edc-2015' ),
				'label'  	=> esc_html__( 'Text Field', 'edc-2015' ),
				'section'  	=> 'new_section',
				'settings' 	=> 'text_field',
				'type' 		=> 'text'
			)
		);
		$wp_customize->get_setting( 'text_field' )->transport = 'postMessage';



		// URL Field
		$wp_customize->add_setting(
			'url_field',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'url_field',
			array(
				'description' 	=> esc_html__( '', 'edc-2015' ),
				'label' => esc_html__( 'URL Field', 'edc-2015' ),
				'section' => 'new_section',
				'settings' => 'url_field',
				'type' => 'url'
			)
		);
		$wp_customize->get_setting( 'url_field' )->transport = 'postMessage';



		// Email Field
		$wp_customize->add_setting(
			'email_field',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'email_field',
			array(
				'description' 	=> esc_html__( '', 'edc-2015' ),
				'label' => esc_html__( 'Email Field', 'edc-2015' ),
				'section' => 'new_section',
				'settings' => 'email_field',
				'type' => 'email'
			)
		);
		$wp_customize->get_setting( 'email_field' )->transport = 'postMessage';

		// Date Field
		$wp_customize->add_setting(
			'date_field',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'date_field',
			array(
				'description' 	=> esc_html__( '', 'edc-2015' ),
				'label' => esc_html__( 'Date Field', 'edc-2015' ),
				'section' => 'new_section',
				'settings' => 'date_field',
				'type' => 'date'
			)
		);
		$wp_customize->get_setting( 'date_field' )->transport = 'postMessage';


		// Checkbox Field
		$wp_customize->add_setting(
			'checkbox_field',
			array(
				'default'  	=> 'true',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'checkbox_field',
			array(
				'description' 	=> esc_html__( '', 'edc-2015' ),
				'label' => esc_html__( 'Checkbox Field', 'edc-2015' ),
				'section' => 'new_section',
				'settings' => 'checkbox_field',
				'type' => 'checkbox'
			)
		);
		$wp_customize->get_setting( 'checkbox_field' )->transport = 'postMessage';




		// Password Field
		$wp_customize->add_setting(
			'password_field',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'password_field',
			array(
				'description' 	=> esc_html__( '', 'edc-2015' ),
				'label' => esc_html__( 'Password Field', 'edc-2015' ),
				'section' => 'new_section',
				'settings' => 'password_field',
				'type' => 'password'
			)
		);
		$wp_customize->get_setting( 'password_field' )->transport = 'postMessage';



		// Radio Field
		$wp_customize->add_setting(
			'radio_field',
			array(
				'default'  	=> 'choice1',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'radio_field',
			array(
				'choices' => array(
					'choice1' => esc_html__( 'Choice 1', 'edc-2015' ),
					'choice2' => esc_html__( 'Choice 2', 'edc-2015' ),
					'choice3' => esc_html__( 'Choice 3', 'edc-2015' )
				),
				'description' 	=> esc_html__( '', 'edc-2015' ),
				'label' => esc_html__( 'Radio Field', 'edc-2015' ),
				'section' => 'new_section',
				'settings' => 'radio_field',
				'type' => 'radio'
			)
		);
		$wp_customize->get_setting( 'radio_field' )->transport = 'postMessage';



		// Select Field
		$wp_customize->add_setting(
			'select_field',
			array(
				'default'  	=> 'choice1',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'select_field',
			array(
				'choices' => array(
					'choice1' => esc_html__( 'Choice 1', 'edc-2015' ),
					'choice2' => esc_html__( 'Choice 2', 'edc-2015' ),
					'choice3' => esc_html__( 'Choice 3', 'edc-2015' )
				),
				'description' 	=> esc_html__( '', 'edc-2015' ),
				'label' => esc_html__( 'Select Field', 'edc-2015' ),
				'section' => 'new_section',
				'settings' => 'select_field',
				'type' => 'select'
			)
		);
		$wp_customize->get_setting( 'select_field' )->transport = 'postMessage';



		// Textarea Field
		$wp_customize->add_setting(
			'textarea_field',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'textarea_field',
			array(
				'description' 	=> esc_html__( '', 'edc-2015' ),
				'label' => esc_html__( 'Textarea Field', 'edc-2015' ),
				'section' => 'new_section',
				'settings' => 'textarea_field',
				'type' => 'textarea'
			)
		);
		$wp_customize->get_setting( 'textarea_field' )->transport = 'postMessage';



		// Range Field
		$wp_customize->add_setting(
			'range_field',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'range_field',
			array(
				'description' 	=> esc_html__( '', 'edc-2015' ),
				'input_attrs' => array(
					'class' => 'range-field',
					'max' => 100,
					'min' => 0,
					'step' => 1,
					'style' => 'color: #020202'
				),
				'label' => esc_html__( 'Range Field', 'edc-2015' ),
				'section' => 'new_section',
				'settings' => 'range_field',
				'type' => 'range'
			)
		);
		$wp_customize->get_setting( 'range_field' )->transport = 'postMessage';



		// Page Select Field
		$wp_customize->add_setting(
			'select_page_field',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'select_page_field',
			array(
				'description' 	=> esc_html__( '', 'edc-2015' ),
				'label' => esc_html__( 'Select Page', 'edc-2015' ),
				'section' => 'new_section',
				'settings' => 'select_page_field',
				'type' => 'dropdown-pages'
			)
		);
		$wp_customize->get_setting( 'dropdown-pages' )->transport = 'postMessage';



		// Color Chooser Field
		$wp_customize->add_setting(
			'color_field',
			array(
				'default'  	=> '#ffffff',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'color_field',
				array(
					'description' 	=> esc_html__( '', 'edc-2015' ),
					'label' => esc_html__( 'Color Field', 'edc-2015' ),
					'section' => 'new_section',
					'settings' => 'color_field'
				),
			)
		);
		$wp_customize->get_setting( 'color_field' )->transport = 'postMessage';



		// File Upload Field
		$wp_customize->add_setting( 'file_upload' );
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'file_upload',
				array(
					'description' 	=> esc_html__( '', 'edc-2015' ),
					'label' => esc_html__( 'File Upload', 'edc-2015' ),
					'section' => 'new_section',
					'settings' => 'file_upload'
				),
			)
		);



		// Image Upload Field
		$wp_customize->add_setting(
			'image_upload',
			array(
				'default' => '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'image_upload',
				array(
					'description' 	=> esc_html__( '', 'edc-2015' ),
					'label' => esc_html__( 'Image Field', 'edc-2015' ),
					'section' => 'new_section',
					'settings' => 'image_upload'
				)
			)
		);
		$wp_customize->get_setting( 'image_upload' )->transport = 'postMessage';

		// Media Upload Field
		// Can be used for images
		// Returns the image ID, not a URL
		$wp_customize->add_setting(
			'media_upload',
			array(
				'default' => '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Media_Control(
				$wp_customize,
				'media_upload',
				array(
					'description' 	=> esc_html__( '', 'tillotson' ),
					'label' => esc_html__( 'Media Field', 'tillotson' ),
					'mime_type' => '',
					'section' => 'new_section',
					'settings' => 'media_upload'
				)
			)
		);
		$wp_customize->get_setting( 'media_upload' )->transport = 'postMessage';




		// Cropped Image Field
		$wp_customize->add_setting(
			'cropped_image',
			array(
				'default' => '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Cropped_Image_Control(
				$wp_customize,
				'cropped_image',
				array(
					'description' 	=> esc_html__( '', 'tillotson' ),
					'flex_height' => '',
					'flex_width' => '',
					'height' => '1080',
					'section' => 'new_section',
					'settings' => 'cropped_image',
					width' => '1920'
				)
			)
		);
		$wp_customize->get_setting( 'cropped_image' )->transport = 'postMessage';
		*/


		// Enable live preview JS
		$wp_customize->get_setting( 'blogname' )->transport 		= 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport 	= 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	} // register()

	/**
	 * This will output the custom WordPress settings to the live theme's WP head.
	 *
	 * Used by hook: 'wp_head'
	 *
	 * @access 		public
	 * @see 		add_action( 'wp_head', $func )
	 * @since 		1.0.0
	 */
	public static function header_output() {

		?><!-- Customizer CSS -->
		<style type="text/css"><?php

			// pattern:
			// edc_2015_Customize::generate_css( 'selector', 'style', 'mod_name', 'prefix', 'postfix', true );
			//
			// background-image example:
			// edc_2015_Customize::generate_css( '.class', 'background-image', 'background_image_example', 'url(', ')' );


		?></style><!-- Customizer CSS --><?php

	} // header_output()

	/**
	 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
	 *
	 * Used by hook: 'customize_preview_init'
	 *
	 * @access 		public
	 * @see 		add_action( 'customize_preview_init', $func )
	 * @since 		1.0.0
	 */
	public static function live_preview() {

		wp_enqueue_script( 'edc_2015_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'jquery', 'customize-preview' ), '', true );

	} // live_preview()

	/**
	 * This will generate a line of CSS for use in header output. If the setting
	 * ($mod_name) has no defined value, the CSS will not be output.
	 *
	 * @access 		public
	 * @since 		1.0.0
	 * @param 		string 		$selector 		CSS selector
	 * @param 		string 		$style 			The name of the CSS *property* to modify
	 * @param 		string 		$mod_name 		The name of the 'theme_mod' option to fetch
	 * @param 		string 		$prefix 		Optional. Anything that needs to be output before the CSS property
	 * @param 		string 		$postfix 		Optional. Anything that needs to be output after the CSS property
	 * @param 		bool 		$echo 			Optional. Whether to print directly to the page (default: true).
	 * @return 		string 						Returns a single line of CSS with selectors and a property.
	 */
	public static function generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {

		$return = '';
		$mod 	= get_theme_mod( $mod_name );

		if ( ! empty( $mod ) ) {

			$return = sprintf('%s { %s:%s; }',
				$selector,
				$style,
				$prefix . $mod . $postfix
			);

			if ( $echo ) {

				echo $return;

			}

		}

		return $return;

	} // generate_css()

} // class

// Setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'edc_2015_Customize' , 'register' ) );

// Output custom CSS to live site
add_action( 'wp_head' , array( 'edc_2015_Customize' , 'header_output' ) );

// Enqueue live preview javascript in Theme Customizer admin screen
add_action( 'customize_preview_init' , array( 'edc_2015_Customize' , 'live_preview' ) );
