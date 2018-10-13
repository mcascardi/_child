<?php
/**
 * Child theme functions
 *
 * Functions file for child theme, enqueues parent and child stylesheets by default.
 *
 * @since	1.0.0
 * @package Baam
 */

// Keep updated with version in style.css
define('BAAM_VERSION', '1.0.0');

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'aa_enqueue_styles' ) ) {
	// Add enqueue function to the desired action.
	add_action( 'wp_enqueue_scripts', 'baam_enqueue_styles' );

	/**
	 * Enqueue Styles.
	 *
	 * Enqueue parent style and child styles where parent are the dependency
	 * for child styles so that parent styles always get enqueued first.
	 *
	 * @since 1.0.0
	 */
	function baam_enqueue_styles() {
		// Parent style variable.
		$parent_style = 'parent-style';

		// Enqueue Parent theme's stylesheet.
		wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css', [], BAAM_VERSION);

		// Enqueue Child theme's stylesheet.
		// Setting 'parent-style' as a dependency will ensure that the child theme stylesheet loads after it.
		wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ), BAAM_VERSION);
	}
}
