<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package techcontinuum1_s
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function techcontinuum1_s_infinite_scroll_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'content',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'techcontinuum1_s_infinite_scroll_setup' );
