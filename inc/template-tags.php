<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package DocBlock
 */

if ( ! function_exists( 'edc_2015_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
	function edc_2015_posted_on() {

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			esc_html_x( 'Posted on %s', 'post date', 'edc-2015' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$byline = sprintf(
			esc_html_x( 'by %s', 'post author', 'edc-2015' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	} // edc_2015_posted_on()
endif;



if ( ! function_exists( 'edc_2015_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
	function edc_2015_entry_footer() {

		// Hide category and tag text for pages.
		if ( 'post' == get_post_type() ) {

			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'edc-2015' ) );
			if ( $categories_list && edc_2015_categorized_blog() ) {

				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'edc-2015' ) . '</span>', $categories_list );  // WPCS: XSS OK.

			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'edc-2015' ) );
			if ( $tags_list ) {

				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'edc-2015' ) . '</span>', $tags_list );  // WPCS: XSS OK.

			}

		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {

			echo '<span class="comments-link">';
			comments_popup_link( esc_html__( 'Leave a comment', 'edc-2015' ), esc_html__( '1 Comment', 'edc-2015' ), esc_html__( '% Comments', 'edc-2015' ) );
			echo '</span>';

		}

		edit_post_link( esc_html__( 'Edit', 'edc-2015' ), '<span class="edit-link">', '</span>' );

	} // edc_2015_entry_footer()
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function edc_2015_categorized_blog() {

	if ( false === ( $all_the_cool_cats = get_transient( 'edc_2015_categories' ) ) ) {

		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'edc_2015_categories', $all_the_cool_cats );

	}

	if ( $all_the_cool_cats > 1 ) {

		// This blog has more than 1 category so edc_2015_categorized_blog should return true.
		return true;

	} else {

		// This blog has only 1 category so edc_2015_categorized_blog should return false.
		return false;

	}

} // edc_2015_categorized_blog()

/**
 * Flush out the transients used in edc_2015_categorized_blog.
 */
function edc_2015_category_transient_flusher() {

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return; }

	// Like, beat it. Dig?
	delete_transient( 'edc_2015_categories' );

} // edc_2015_category_transient_flusher()
add_action( 'edit_category', 'edc_2015_category_transient_flusher' );
add_action( 'save_post',     'edc_2015_category_transient_flusher' );
