<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package Codilight_Lite
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.me/support/infinite-scroll/
 * See: https://jetpack.me/support/responsive-videos/
 */
function codilight_lite_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'codilight_lite_infinite_scroll_render',
		'footer'    => 'page',
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );
} // end function codilight_lite_jetpack_setup
add_action( 'after_setup_theme', 'codilight_lite_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function codilight_lite_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function codilight_lite_infinite_scroll_render
