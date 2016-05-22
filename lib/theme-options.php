<?php

namespace Roots\Sage\ThemeOptions;

use Roots\Sage\Assets;

/**
 * Theme Options v1.1.0
 * Adjust theme settings from the admin dashboard.
 * Find and replace `YourTheme` with your own namepspacing.
 *
 * Created by Michael Fields.
 * https://gist.github.com/mfields/4678999
 *
 * Forked by Chris Ferdinandi
 * http://gomakethings.com
 *
 * Free to use under the MIT License.
 * http://gomakethings.com/mit/
 */


	/**
	 * Theme Options Fields
	 * Each option field requires its own uniquely named function. Select options and radio buttons also require an additional uniquely named function with an array of option choices.
	 */

	// Sample text input field
	function pure_demo_settings_field_primary_background_color() {

		$options = pure_demo_get_theme_options();
		?>
		<input type="text" name="pure_demo_theme_options[primary_background_color]" id="primary-background-color" value="<?php echo esc_attr( $options['primary_background_color'] ); ?>" />
		<label class="description" for="primary-background-color" placeholder="rgba(255, 255, 255, 1)"><?php _e( 'Primary Background Color', 'pure-demo' ); ?></label>
		<?php
	}

	// Sample text input field
	function pure_demo_settings_field_primary_text_color() {

		$options = pure_demo_get_theme_options();

		?>
		<input type="text" name="pure_demo_theme_options[primary_text_color]" id="primary-text-color" value="<?php echo esc_attr( $options['primary_text_color'] ); ?>" />
		<label class="description" for="primary-text-color" placeholder="rgba(255, 255, 255, 1)"><?php _e( 'Primary Text Color', 'pure-demo' ); ?></label>
		<?php
	}

	/**
	 * Theme Option Defaults & Sanitization
	 * Each option field requires a default value under pure_demo_get_theme_options(), and an if statement under pure_demo_theme_options_validate();
	 */

	// Get the current options from the database.
	// If none are specified, use these defaults.
	function pure_demo_get_theme_options() {

		$saved = (array) get_option( 'pure_demo_theme_options' );
		$defaults = array(
			'primary_background_color'     => '',
			'primary_text_color'     => ''
		);

		$defaults = apply_filters( __NAMESPACE__ . '\\pure_demo_default_theme_options', $defaults );

		$options = wp_parse_args( $saved, $defaults );
		$options = array_intersect_key( $options, $defaults );

		return $options;
	}

	// Sanitize and validate updated theme options
	function pure_demo_theme_options_validate( $input ) {

		$output = array();

		// The sample text input must be safe text with no HTML tags
		if ( isset( $input['primary_background_color'] ) && ! empty( $input['primary_background_color'] ) )
			$output['primary_background_color'] = wp_filter_nohtml_kses( $input['primary_background_color'] );

		if ( isset( $input['primary_text_color'] ) && ! empty( $input['primary_text_color'] ) )
			$output['primary_text_color'] = wp_filter_nohtml_kses( $input['primary_text_color'] );

		return apply_filters( __NAMESPACE__. '\\pure_demo_theme_options_validate', $output, $input );
	}



	/**
	 * Theme Options Menu
	 * Each option field requires its own add_settings_field function.
	 */

	// Create theme options menu
	// The content that's rendered on the menu page.
	function pure_demo_theme_options_render_page() {
		?>
		<div class="wrap">
			<?php $theme_name = function_exists( 'wp_get_theme' ) ? wp_get_theme() : get_current_theme(); ?>
			<h2><?php printf( __( '%s Theme Options', 'pure-demo' ), $theme_name ); ?></h2>
			<h3><?php printf( __( 'Colors must be in format like this: %s', 'pure-demo' ), 'rgba(255, 255, 255, 1)' ); ?>
			 <br />
			<?php printf( __( 'Grab them from : %s', 'pure-demo' ), '<a href="http://hslpicker.com">http://hslpicker.com</a>' ); ?> </h3>
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'pure_demo_options' );
					do_settings_sections( 'theme_options' );
					submit_button();
				?>
			</form>
		</div>
		<?php
	}

	// Register the theme options page and its fields
	function pure_demo_theme_options_init() {

		// Register a setting and its sanitization callback
		// register_setting( $option_group, $option_name, $sanitize_callback );
		// $option_group - A settings group name.
		// $option_name - The name of an option to sanitize and save.
		// $sanitize_callback - A callback function that sanitizes the option's value.
		register_setting( 'pure_demo_options', 'pure_demo_theme_options', __NAMESPACE__ . '\\pure_demo_theme_options_validate' );


		// Register our settings field group
		// add_settings_section( $id, $title, $callback, $page );
		// $id - Unique identifier for the settings section
		// $title - Section title
		// $callback - // Section callback (we don't want anything)
		// $page - // Menu slug, used to uniquely identify the page. See pure_demo_theme_options_add_page().
		add_settings_section( 'general', 'General Options',  '__return_false', 'theme_options' );

		// Register our individual settings fields
		// add_settings_field( $id, $title, $callback, $page, $section );
		// $id - Unique identifier for the field.
		// $title - Setting field title.
		// $callback - Function that creates the field (from the Theme Option Fields section).
		// $page - The menu page on which to display this field.
		// $section - The section of the settings page in which to show the field.
		add_settings_field( 'primary_background_color', __( 'Primary Background Color', 'pure-demo' ), __NAMESPACE__ . '\\pure_demo_settings_field_primary_background_color', 'theme_options', 'general' );
		add_settings_field( 'primary_text_color', __( 'Primary Text Color', 'pure-demo' ), __NAMESPACE__ . '\\pure_demo_settings_field_primary_text_color', 'theme_options', 'general' );

	}
	add_action( 'admin_init', __NAMESPACE__ . '\\pure_demo_theme_options_init' );

	// Add the theme options page to the admin menu
	// Use add_theme_page() to add under Appearance tab (default).
	// Use add_menu_page() to add as it's own tab.
	// Use add_submenu_page() to add to another tab.
	function pure_demo_theme_options_add_page() {

		// add_theme_page( $page_title, $menu_title, $capability, $menu_slug, $function );
		// add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function );
		// add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function );
		// $page_title - Name of page
		// $menu_title - Label in menu
		// $capability - Capability required
		// $menu_slug - Used to uniquely identify the page
		// $function - Function that renders the options page
		$theme_page = add_theme_page( __( 'Theme Options', 'pure-demo' ), __( 'Theme Options', 'pure-demo' ), 'edit_theme_options', 'theme_options', __NAMESPACE__ . '\\pure_demo_theme_options_render_page' );

		// $theme_page = add_menu_page( __( 'Theme Options', 'pure-demo' ), __( 'Theme Options', 'pure-demo' ), 'edit_theme_options', 'theme_options', 'pure_demo_theme_options_render_page' );
		// $theme_page = add_submenu_page( 'tools.php', __( 'Theme Options', 'pure-demo' ), __( 'Theme Options', 'pure-demo' ), 'edit_theme_options', 'theme_options', 'pure_demo_theme_options_render_page' );
	}
	add_action( 'admin_menu', __NAMESPACE__ . '\\pure_demo_theme_options_add_page' );



	// Restrict access to the theme options page to admins
	function pure_demo_option_page_capability( $capability ) {
		return 'edit_theme_options';
	}
	add_filter( 'option_page_capability_pure_demo_options', __NAMESPACE__ . '\\pure_demo_option_page_capability' );
