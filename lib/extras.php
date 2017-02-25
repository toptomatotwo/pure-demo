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

/* Remove woocommerce title page and product summaries
 * Source: https://roots.io/using-woocommerce-with-sage/
 */
add_filter( 'woocommerce_show_page_title', '__return_false' );
remove_action('woocommerce_single_product_summary', __NAMESPACE__ . '\\woocommerce_template_single_title', 5);

/*
Plugin Name: My WooCommerce Modifications
Plugin URI: http://woothemes.com/
Description: Modificatinos to my WooCommerce site
Version: 1.0
Author: Patrick Rauland
Author URI: http://www.patrickrauland.com/
License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
Source: https://gist.github.com/BFTrick/4996955
*/
/*  Copyright 2013  Patrick Rauland

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


/**
 * Check if WooCommerce is active
 **/
// Remove from this if using as a plugin
//if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {


    // remove default woocommerce actions
    function my_woocommerce_modifications()
    {
        // hide product price on category page
        remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);

        // hide add to cart button on category page
        remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
    }

    add_action( 'init', __NAMESPACE__ . '\\my_woocommerce_modifications' );

//}



