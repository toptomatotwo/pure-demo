<?php
/**
 * Portfolio Theme Customizer
 *
 * @package Portfolio Press
 */

function puredemo_options() {

	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Logo section
	$section = 'logo';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Logo Image', 'pure-demo' ),
		'priority' => '20'
	);

	$options['puredemo[logo]'] = array(
		'id' => 'puredemo[logo]',
		'option_type' => 'option',
		'label'   => __( 'Logo', 'pure-demo' ),
		'section' => $section,
		'type'    => 'image',
		'default' => '',
	);

	$options['puredemo[custom_favicon]'] = array(
		'id' => 'puredemo[custom_favicon]',
		'option_type' => 'option',
		'label'   => __( 'Favicon', 'pure-demo' ),
		'section' => $section,
		'type'    => 'image',
		'default' => '',
		'description'  => __( 'File must be <strong>.png</strong> format. Optimal dimensions: <strong>32px x 32px</strong>.', 'pure-demo' ),
	);

	$options['puredemo[logo_apple_touch]'] = array(
		'id' => 'puredemo[logo_apple_touch]',
		'option_type' => 'option',
		'label'   => __( 'Apple Touch Icon', 'pure-demo' ),
		'section' => $section,
		'type'    => 'image',
		'default' => '',
		'description'  => __( 'File must be <strong>.png</strong> format. Optimal dimensions: <strong>152px x 152px</strong>.', 'pure-demo' ),
	);

	// Layout
	$section = 'layout';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Layout', 'pure-demo' ),
		'priority' => '70'
	);

	$choices = array(
		'layout-2cr' => __( 'Sidebar Right', 'pure-demo' ),
		'layout-2cl' => __( 'Sidebar Left', 'pure-demo' ),
		'layout-1col' => __( 'Single Column', 'pure-demo' )
	);

	$options['puredemo[layout]'] = array(
		'id' => 'puredemo[layout]',
		'option_type' => 'option',
		'label'   => __( 'Standard Layout', 'pure-demo' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices,
		'default' => 'layout-2cr'
	);

	// Colors
	$section = 'colors';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Colors', 'pure-demo' ),
		'priority' => '80'
	);

	$options['puredemo[header_color]'] = array(
		'id' => 'puredemo[header_color]',
		'option_type' => 'option',
		'label'   => __( 'Header Color', 'pure-demo' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '#000000',
	);

	// Navigation
	$section = 'nav';

	$choices = array(
		'right' => __( 'Right of Logo', 'pure-demo' ),
		'clear' => __( 'Underneath Logo', 'pure-demo' )
	);

	$options['puredemo[menu_position]'] = array(
		'id' => 'puredemo[menu_position]',
		'option_type' => 'option',
		'label'   => __( 'Menu Position', 'pure-demo' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices,
		'default' => 'right',
		'priority' => 100
	);


	// Portfolio Settings
	$section = 'general';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'General', 'pure-demo' ),
		'priority' => '80'
	);

	// Portfolio Post Type Plugin
	if ( class_exists( 'Portfolio_Post_Type' ) ) :

		$options['puredemo[portfolio_featured_images]'] = array(
			'id' => 'puredemo[portfolio_images]',
			'option_type' => 'option',
			'label' => __( 'Display Featured Images', 'pure-demo' ),
			'description' => __( 'Display featured images on portfolio posts.', 'pure-demo' ),
			'section' => $section,
			'type'    => 'checkbox',
			'default' => '1',
		);

	else :

		$options['puredemo[post_featured_images]'] = array(
			'id' => 'puredemo[portfolio_images]',
			'option_type' => 'option',
			'label' => __( 'Display Featured Images', 'pure-demo' ),
			'description' => __( 'Display featured images on posts.', 'pure-demo' ),
			'section' => $section,
			'type'    => 'checkbox',
			'default' => '1',
		);

	endif;

	$options['puredemo[postnav]'] = array(
		'id' => 'puredemo[postnav]',
		'option_type' => 'option',
		'label' => __( 'Display post navigation', 'pure-demo' ),
		'description' => __( 'Previous/next links on posts.', 'pure-demo' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => '0',
	);

	// Archive Settings
	$section = 'archive';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Archive', 'pure-demo' ),
		'priority' => '90'
	);

		// Portfolio Post Type Plugin
	if ( class_exists( 'Portfolio_Post_Type' ) ) :

		$options['puredemo[portfolio_archives_fullwidth]'] = array(
			'id' => 'puredemo[portfolio_sidebar]',
			'option_type' => 'option',
			'label' => __( 'Full Width Archives', 'pure-demo' ),
			'description' => __( 'Display portfolio archives full width.', 'pure-demo' ),
			'section' => $section,
			'type'    => 'checkbox',
			'default' => '1',
		);

	else :

		$options['puredemo[post_archives_fullwidth]'] = array(
			'id' => 'puredemo[portfolio_sidebar]',
			'option_type' => 'option',
			'label' => __( 'Full Width Archives', 'pure-demo' ),
			'description' => __( 'Display image/gallery archives full width.', 'pure-demo' ),
			'section' => $section,
			'type'    => 'checkbox',
			'default' => '1',
		);

	endif;

	$options['puredemo[display_image_gallery_post_formats]'] = array(
		'id' => 'puredemo[display_image_gallery_post_formats]',
		'option_type' => 'option',
		'label' => __( 'Display Image and Gallery Formats on Posts Page', 'pure-demo' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => '1',
	);

	$options['puredemo[archive_titles]'] = array(
		'id' => 'puredemo[archive_titles]',
		'option_type' => 'option',
		'label' => __( 'Archive Titles', 'pure-demo' ),
		'description' => __( 'Display archive titles and descriptions.', 'pure-demo' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => '1',
	);

	// Footer Settings
	$section = 'footer';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Footer', 'pure-demo' ),
		'priority' => '100'
	);

	$options['puredemo[footer_text]'] = array(
		'id' => 'puredemo[footer_text]',
		'option_type' => 'option',
		'label' => __( 'Footer Text', 'pure-demo' ),
		'section' => $section,
		'type' => 'textarea',
		'default' => ''
	);

		// Typography
	$section = 'typography';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Typography', 'pure-demo' ),
		'priority' => '95'
	);

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	$options['puredemo[example_typography]'] = array( 'name' => __('Typography', 'options_check'),
		'desc' => __('Example typography.', 'options_check'),
		'id' => "puredemo[example_typography]",
		'std' => $typography_defaults,
		'option_type' => 'option',
		'label' => __( 'Typography ', 'pure-demo' ),
		'section' => $section,
		'type' => 'typography' );

	$options['puredemo[custom_typography]'] = array(
		'name' => __('Custom Typography', 'options_check'),
		'desc' => __('Custom typography options.', 'options_check'),
		'id' => "puredemo[custom_typography]",
		'std' => $typography_defaults,
		'option_type' => 'option',
		'label' => __( 'Custom Typography', 'pure-demo' ),
		'section' => $section,
		'type' => 'typography',
		'options' => $typography_options );


	// Adds the sections to the $options array
	$options['sections'] = $sections;
		//mz_pr($options['sections']);

	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

}
add_action( 'init', 'puredemo_options', 100 );
