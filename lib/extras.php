<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  $classes[] = 'no-js';

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'pure-demo') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');


	/**
	 * Get saved markdown content if it exists and Jetpack is active. Otherwise, get HTML.
	 * @param  array  $options  Array with HTML and markdown content
	 * @param  string $name     The name of the content
	 * @param  string $suffix   The suffix to denote the markdown version of the content
	 * @return string           The content
	 */
	function get_jetpack_markdown( $options, $name, $suffix = '_markdown' ) {

		// If markdown class is defined, get markdown content
		if ( class_exists( 'WPCom_Markdown' ) && array_key_exists( $name . $suffix, $options ) && !empty( $options[$name . $suffix] ) ) {
			return $options[$name . $suffix];
		}

		// Else, return HTML
		return $options[$name];

	}

		/**
	 * Convert markdown to HTML using Jetpack
	 * @param  string $content Markdown content
	 * @return string          Converted content
	 */
	function process_jetpack_markdown( $content ) {

		// If markdown class is defined, convert content
		if ( class_exists( 'WPCom_Markdown' ) ) {

			// Get markdown library
			jetpack_require_lib( 'markdown' );

			// Return converted content
			return WPCom_Markdown::get_instance()->transform( $content );

		}

		// Else, return content
		return $content;

	}

/**
 * Appends our custom CSS to the global kirki-generated CSS.
 *
 * @return string
 */
function aristath_add_custom_css_to_dynamic_css( $css ) {
    // Get the custom CSS
    $custom_css = get_theme_mod( 'puredemo_custom_css', '' );
    // Append our custom CSS to the Kirki-generated custom-css
    // and return the result

    return $css . $custom_css;
}
// Please make sure you replace "my_config" with your actual config-id.
add_filter( 'kirki/pure-demo/dynamic_css', __NAMESPACE__ . '\\aristath_add_custom_css_to_dynamic_css' );
