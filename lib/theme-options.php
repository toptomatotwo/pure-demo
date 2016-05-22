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

	// Sample checkbox field
	function pure_demo_settings_field_sample_checkbox() {

		$options = __NAMESPACE__ . pure_demo_get_theme_options();
		?>
		<label for="sample-checkbox">
			<input type="checkbox" name="pure_demo_theme_options[sample_checkbox]" id="sample-checkbox" <?php checked( 'on', $options['sample_checkbox'] ); ?> />
			<?php _e( 'A sample checkbox.', 'YourTheme' ); ?>
		</label>
		<?php
	}

	// Sample text input field
	function pure_demo_settings_field_sample_text_input() {

		$options = __NAMESPACE__ . pure_demo_get_theme_options();
		?>
		<input type="text" name="pure_demo_theme_options[sample_text_input]" id="sample-text-input" value="<?php echo esc_attr( $options['sample_text_input'] ); ?>" />
		<label class="description" for="sample-text-input"><?php _e( 'Sample text input', 'YourTheme' ); ?></label>
		<?php
	}

	// Options for select options field
	// Used in pure_demo_settings_field_sample_select_options()
	function pure_demo_settings_field_sample_select_options_choices() {

		$sample_select_options = array(
			'0' => array(
				'value' =>  '0',
				'label' => __( 'Zero', 'YourTheme' )
			),
			'1' => array(
				'value' =>  '1',
				'label' => __( 'One', 'YourTheme' )
			),
			'2' => array(
				'value' => '2',
				'label' => __( 'Two', 'YourTheme' )
			),
			'3' => array(
				'value' => '3',
				'label' => __( 'Three', 'YourTheme' )
			),
			'4' => array(
				'value' => '4',
				'label' => __( 'Four', 'YourTheme' )
			),
			'5' => array(
				'value' => '5',
				'label' => __( 'Five', 'YourTheme' )
			)
		);

		return apply_filters( __NAMESPACE__ . '\\pure_demo_settings_field_sample_select_options_choices', $sample_select_options );
	}

	// Sample select options field
	function pure_demo_settings_field_sample_select_options() {

		$options = __NAMESPACE__ . pure_demo_get_theme_options();
		?>
		<select name="pure_demo_theme_options[sample_select_options]" id="sample-select-options">
			<?php
				$selected = $options['sample_select_options'];
				$p = '';
				$r = '';

				foreach ( pure_demo_settings_field_sample_select_options_choices() as $option ) {
					$label = $option['label'];
					if ( $selected == $option['value'] ) // Make default first in list
						$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
					else
						$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
				}
				echo $p . $r;
			?>
		</select>
		<label class="description" for="sample_theme_options[selectinput]"><?php _e( 'Sample select input', 'YourTheme' ); ?></label>
		<?php
	}

	// Options for radio buttons field
	// Used in pure_demo_settings_field_sample_radio_buttons()
	function pure_demo_settings_field_sample_radio_buttons_choices() {

		$sample_radio_buttons = array(
			'yes' => array(
				'value' => 'yes',
				'label' => __( 'Yes', 'YourTheme' )
			),
			'no' => array(
				'value' => 'no',
				'label' => __( 'No', 'YourTheme' )
			),
			'maybe' => array(
				'value' => 'maybe',
				'label' => __( 'Maybe', 'YourTheme' )
			)
		);

		return apply_filters( __NAMESPACE__ . '\\pure_demo_settings_field_sample_radio_buttons_choices', $sample_radio_buttons );
	}

	// Sample radio buttons field
	function pure_demo_settings_field_sample_radio_buttons() {

		$options = __NAMESPACE__ . pure_demo_get_theme_options();

		foreach ( pure_demo_settings_field_sample_radio_buttons_choices() as $button ) {
		?>
		<div class="layout">
			<label class="description">
				<input type="radio" name="pure_demo_theme_options[sample_radio_buttons]" value="<?php echo esc_attr( $button['value'] ); ?>" <?php checked( $options['sample_radio_buttons'], $button['value'] ); ?> />
				<?php echo $button['label']; ?>
			</label>
		</div>
		<?php
		}
	}

	// Sample textarea field
	function pure_demo_settings_field_sample_textarea() {

		$options = __NAMESPACE__ . pure_demo_get_theme_options();
		?>
		<textarea class="large-text" type="text" name="pure_demo_theme_options[sample_textarea]" id="sample-textarea" cols="50" rows="10" /><?php echo esc_textarea( $options['sample_textarea'] ); ?></textarea>
		<label class="description" for="sample-textarea"><?php _e( 'Sample textarea', 'YourTheme' ); ?></label>
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
			'sample_checkbox'       => 'off',
			'sample_text_input'     => '',
			'sample_select_options' => '',
			'sample_radio_buttons'  => '',
			'sample_textarea'       => '',
		);

		$defaults = apply_filters( __NAMESPACE__ . '\\pure_demo_default_theme_options', $defaults );

		$options = wp_parse_args( $saved, $defaults );
		$options = array_intersect_key( $options, $defaults );

		return $options;
	}

	// Sanitize and validate updated theme options
	function pure_demo_theme_options_validate( $input ) {
		$output = array();

		// Checkboxes will only be present if checked.
		if ( isset( $input['sample_checkbox'] ) )
			$output['sample_checkbox'] = 'on';

		// The sample text input must be safe text with no HTML tags
		if ( isset( $input['sample_text_input'] ) && ! empty( $input['sample_text_input'] ) )
			$output['sample_text_input'] = wp_filter_nohtml_kses( $input['sample_text_input'] );

		// The sample select option must actually be in the array of select options
		if ( isset( $input['sample_select_options'] ) && array_key_exists( $input['sample_select_options'], pure_demo_settings_field_sample_select_options_choices() ) )
			$output['sample_select_options'] = $input['sample_select_options'];

		// The sample radio button value must be in our array of radio button values
		if ( isset( $input['sample_radio_buttons'] ) && array_key_exists( $input['sample_radio_buttons'], pure_demo_settings_field_sample_radio_buttons_choices() ) )
			$output['sample_radio_buttons'] = $input['sample_radio_buttons'];

		// The sample textarea must be safe text with the allowed tags for posts
		if ( isset( $input['sample_textarea'] ) && ! empty( $input['sample_textarea'] ) )
			$output['sample_textarea'] = wp_filter_post_kses( $input['sample_textarea'] );

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
			<h2><?php printf( __( '%s Theme Options', 'YourTheme' ), $theme_name ); ?></h2>
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
		add_settings_field( 'sample_checkbox', __( 'Sample Checkbox', 'YourTheme' ), __NAMESPACE__ . '\\pure_demo_settings_field_sample_checkbox', 'theme_options', 'general' );
		add_settings_field( 'sample_text_input', __( 'Sample Text Input', 'YourTheme' ), __NAMESPACE__ . '\\pure_demo_settings_field_sample_text_input', 'theme_options', 'general' );
		add_settings_field( 'sample_select_options', __( 'Sample Select Options', 'YourTheme' ), __NAMESPACE__ . '\\pure_demo_settings_field_sample_select_options', 'theme_options', 'general' );
		add_settings_field( 'sample_radio_buttons', __( 'Sample Radio Buttons', 'YourTheme' ), __NAMESPACE__ . '\\pure_demo_settings_field_sample_radio_buttons', 'theme_options', 'general' );
		add_settings_field( 'sample_textarea', __( 'Sample Textarea', 'YourTheme' ), __NAMESPACE__ . '\\pure_demo_settings_field_sample_textarea', 'theme_options', 'general' );

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
		$theme_page = add_theme_page( __( 'Theme Options', 'YourTheme' ), __( 'Theme Options', 'YourTheme' ), 'edit_theme_options', 'theme_options', __NAMESPACE__ . '\\pure_demo_theme_options_render_page' );

		// $theme_page = add_menu_page( __( 'Theme Options', 'YourTheme' ), __( 'Theme Options', 'YourTheme' ), 'edit_theme_options', 'theme_options', 'pure_demo_theme_options_render_page' );
		// $theme_page = add_submenu_page( 'tools.php', __( 'Theme Options', 'YourTheme' ), __( 'Theme Options', 'YourTheme' ), 'edit_theme_options', 'theme_options', 'pure_demo_theme_options_render_page' );
	}
	add_action( 'admin_menu', __NAMESPACE__ . '\\pure_demo_theme_options_add_page' );



	// Restrict access to the theme options page to admins
	function pure_demo_option_page_capability( $capability ) {
		return 'edit_theme_options';
	}
	add_filter( 'option_page_capability_pure_demo_options', __NAMESPACE__ . '\\pure_demo_option_page_capability' );
