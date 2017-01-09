<?php
/**
 * Template part for displaying the employee communication methods
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EDC_2015
 */

$meta = get_post_custom( $post->ID );

?><ul class="employee-comms"><?php

if ( ! empty( $meta['email-address'][0] ) ) {

	$email = sanitize_email( $meta['email-address'][0], 'edc-2015' );

	?><li><span class="dashicons dashicons-email-alt"></span> <?php esc_html_e( 'Email Address', 'edc-2015' ); ?>: <a aria-label="Email Address" class="email" href="mailto:<?php echo $email; ?>" itemprop="email"><?php echo $email; ?></a></li><?php

}

if ( ! empty( $meta['phone-office'][0] ) ) {

	$office 	= esc_html__( $meta['phone-office'][0], 'edc-2015' );
	$formatted 	= esc_html__( preg_replace( '/[^0-9]/', '', $meta['phone-office'][0] ), 'edc-2015' );

	?><li class="tel"><span class="dashicons dashicons-phone"></span> <span class="type"><?php esc_html_e( 'Office', 'edc-2015' ); ?></span> <?php esc_html_e( 'Phone Number', 'edc-2015' ); ?>: <a aria-label="Office Phone Number" href="tel:<?php echo $formatted; ?>" itemprop="telephone"><?php echo $office; ?></a></li><?php

}

if ( ! empty( $meta['phone-cell'][0] ) ) {

	$cell 		= esc_html__( $meta['phone-cell'][0], 'edc-2015' );
	$formatted 	= esc_html__( preg_replace( '/[^0-9]/', '', $meta['phone-cell'][0] ), 'edc-2015' );

	?><li class="tel"><span class="dashicons dashicons-smartphone"></span> <span class="type"><?php esc_html_e( 'Cell', 'edc-2015' ); ?></span> <?php esc_html_e( 'Phone Number', 'edc-2015' ); ?>: <a aria-label="Cell Phone Number" href="tel:<?php echo $formatted; ?>" itemprop="telephone"><?php echo $cell; ?></a></li><?php

}

if ( ! empty( $meta['url-linkedin'][0] ) ) {

	$linkedin = esc_url( $meta['url-linkedin'][0], 'edc-2015' );

	?><li><span class="employee-svg"><?php echo Employees_Public::get_svg( 'linkedin' ); ?></span> <a aria-label="LinkedIn Profile" class="url" href="<?php echo $linkedin; ?>" itemprop="url" rel="me"><?php esc_html_e( 'LinkedIn Profile', 'edc-2015' ); ?></a></li><?php

}

if ( ! empty( $meta['url-vcard'][0] ) ) {

	$vcard = esc_url( $meta['url-vcard'][0] );

	?><li><span class="dashicons dashicons-index-card"></span> <a aria-label="Download vCard" class="" href="<?php echo $vcard; ?>"><?php esc_html_e( 'Download vCard', 'edc-2015' ); ?></a></li><?php

}

?></ul>