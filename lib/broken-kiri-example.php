/* Broken version of kiri_controls_with_choice_fields

/**
 * Add controls using the 'kirki/fields' filter.
 */
function kirki_controls_with_choices_fields( $fields ) {

	$fields[] = array(
		'type'        => 'typography',
		'settings'    => 'typography_demo',
		'label'       => __( 'Typography Control', 'kirki' ),
		'description' => __( 'This is the control description', 'kirki' ),
		'help'        => __( 'This is some extra help. You can use this to add some additional instructions for users. The main description should go in the "description" of the field, this is only to be used for help tips.', 'kirki' ),
		'section'     => 'controls_with_choices',
		'default'     => array(
			'font-style'     => array( 'bold', 'italic' ),
			'font-family'    => 'Roboto',
			'font-size'      => '14',
			'font-weight'    => '400',
			'line-height'    => '1.5',
			'letter-spacing' => '0',
		),
		'priority'    => 10,
		'choices'     => array(
			'font-style'     => true,
			'font-family'    => true,
			'font-size'      => true,
			'font-weight'    => true,
			'line-height'    => true,
			'letter-spacing' => true,
		),
	);

	$fields[] = array(
		'type'        => 'spacing',
		'settings'    => 'spacing_demo',
		'label'       => __( 'Spacing Control', 'kirki' ),
		'description' => __( 'This is the control description', 'kirki' ),
		'section'     => 'controls_with_choices',
		'default'     => array(
			'top'    => '1em',
			'bottom' => '3px',
			'left'   => '10%',
			'right'  => '1rem',
		),
		'priority'    => 10,
		'choices'     => array(
			'top',
			'bottom',
			'left',
			'right',
			// 'units' => array( 'px', 'em', '%', 'rem' ),
		),
	);

	$fields[] = array(
		'type'        => 'radio',
		'settings'    => 'radio_demo',
		'label'       => __( 'Radio Control', 'kirki' ),
		'description' => __( 'This is the control description', 'kirki' ),
		'help'        => __( 'This is some extra help. You can use this to add some additional instructions for users. The main description should go in the "description" of the field, this is only to be used for help tips.', 'kirki' ),
		'section'     => 'controls_with_choices',
		'default'     => 'option-1',
		'priority'    => 10,
		'choices'     => array(
			'option-1' => __( 'Option 1', 'kirki' ),
			'option-2' => __( 'Option 2', 'kirki' ),
			'option-3' => __( 'Option 3', 'kirki' ),
			'option-4' => __( 'Option 4', 'kirki' ),
		),
	);

	$fields[] = array(
		'type'        => 'dropdown-pages',
		'settings'    => 'dropdown_pages_demo',
		'label'       => __( 'Dropdown Pages', 'kirki' ),
		'description' => __( 'This is the control description', 'kirki' ),
		'help'        => __( 'This is some extra help. You can use this to add some additional instructions for users. The main description should go in the "description" of the field, this is only to be used for help tips.', 'kirki' ),
		'section'     => 'controls_with_choices',
		'priority'    => 10,
	);

	$fields[] = array(
		'type'        => 'select',
		'settings'    => 'select_demo',
		'label'       => __( 'Select', 'kirki' ),
		'description' => __( 'This is the control description', 'kirki' ),
		'help'        => __( 'This is some extra help. You can use this to add some additional instructions for users. The main description should go in the "description" of the field, this is only to be used for help tips.', 'kirki' ),
		'section'     => 'controls_with_choices',
		'default'     => 'option-1',
		'priority'    => 10,
		'choices'     => array(
			'option-1' => __( 'Option 1', 'kirki' ),
			'option-2' => __( 'Option 2', 'kirki' ),
			'option-3' => __( 'Option 3', 'kirki' ),
			'option-4' => __( 'Option 4', 'kirki' ),
		),
	);

	$fields[] = array(
		'type'        => 'radio-image',
		'settings'    => 'radio_image_demo',
		'label'       => __( 'Radio-Image', 'kirki' ),
		'description' => __( 'This is the control description', 'kirki' ),
		'help'        => __( 'This is some extra help. You can use this to add some additional instructions for users. The main description should go in the "description" of the field, this is only to be used for help tips.', 'kirki' ),
		'section'     => 'controls_with_choices',
		'default'     => 'option-1',
		'priority'    => 10,
		'choices'     => array(
			'option-1' => admin_url().'/images/align-left-2x.png',
			'option-2' => admin_url().'/images/align-center-2x.png',
			'option-3' => admin_url().'/images/align-right-2x.png',
		),
	);

	$fields[] = array(
		'type'        => 'radio-buttonset',
		'settings'    => 'radio_buttonset_demo',
		'label'       => __( 'Radio-Buttonset', 'kirki' ),
		'description' => __( 'This is the control description', 'kirki' ),
		'help'        => __( 'This is some extra help. You can use this to add some additional instructions for users. The main description should go in the "description" of the field, this is only to be used for help tips.', 'kirki' ),
		'section'     => 'controls_with_choices',
		'default'     => 'option-1',
		'priority'    => 10,
		'choices'     => array(
			'option-1' => __( 'Option 1', 'kirki' ),
			'option-2' => __( 'Option 2', 'kirki' ),
			'option-3' => __( 'Option 3', 'kirki' ),
		),
	);

	$fields[] = array(
		'type'        => 'multicheck',
		'settings'    => 'multicheck_demo',
		'label'       => __( 'Multicheck', 'kirki' ),
		'description' => __( 'This is the control description', 'kirki' ),
		'help'        => __( 'This is some extra help. You can use this to add some additional instructions for users. The main description should go in the "description" of the field, this is only to be used for help tips.', 'kirki' ),
		'section'     => 'controls_with_choices',
		'default'     => array(
			'option-1',
			'option-2',
		),
		'priority'    => 10,
		'choices'     => array(
			'option-1' => __( 'Option 1', 'kirki' ),
			'option-2' => __( 'Option 2', 'kirki' ),
			'option-3' => __( 'Option 3', 'kirki' ),
			'option-4' => __( 'Option 4', 'kirki' ),
		),
	);

	$fields[] = array(
		'type'        => 'sortable',
		'settings'    => 'sortable_demo',
		'label'       => __( 'Sortable', 'kirki' ),
		'description' => __( 'This is the control description', 'kirki' ),
		'help'        => __( 'This is some extra help. You can use this to add some additional instructions for users. The main description should go in the "description" of the field, this is only to be used for help tips.', 'kirki' ),
		'section'     => 'controls_with_choices',
		'default'     => array(
			'option-3',
			'option-1',
			'option-4',
		),
		'priority'    => 10,
		'choices'     => array(
			'option-1' => __( 'Option 1', 'kirki' ),
			'option-2' => __( 'Option 2', 'kirki' ),
			'option-3' => __( 'Option 3', 'kirki' ),
			'option-4' => __( 'Option 4', 'kirki' ),
			'option-5' => __( 'Option 5', 'kirki' ),
			'option-6' => __( 'Option 6', 'kirki' ),
		),
	);

	// Define custom palettes
	$fields[] = array(
		'type'        => 'palette',
		'settings'    => 'palette_demo',
		'label'       => __( 'Palette', 'kirki' ),
		'description' => __( 'This is the control description', 'kirki' ),
		'help'        => __( 'This is some extra help. You can use this to add some additional instructions for users. The main description should go in the "description" of the field, this is only to be used for help tips.', 'kirki' ),
		'section'     => 'controls_with_choices',
		'default'     => 'red',
		'priority'    => 10,
		'choices'     => array(
			'red'  => array(
				'#ef9a9a',
				'#f44336',
				'#ff1744',
			),
			'pink' => array(
				'#fce4ec',
				'#f06292',
				'#e91e63',
				'#ad1457',
				'#f50057',
			),
			'cyan' => array(
				'#e0f7fa',
				'#80deea',
				'#26c6da',
				'#0097a7',
				'#00e5ff',
			),
		),
	);

	// Define custom palettes
	$fields[] = array(
		'type'        => 'palette',
		'settings'    => 'palette_demo_colourlovers',
		'label'       => __( 'Palettes from Colourlovers', 'kirki' ),
		'description' => __( 'This is the control description', 'kirki' ),
		'help'        => __( 'This is some extra help. You can use this to add some additional instructions for users. The main description should go in the "description" of the field, this is only to be used for help tips.', 'kirki' ),
		'section'     => 'controls_with_choices',
		'default'     => 'red',
		'priority'    => 10,
		'choices'     => Kirki_Colourlovers::get_palettes( 5 ),
	);

	$fields[] = array(
		'type'        => 'select2',
		'settings'    => 'select_demo_2',
		'label'       => __( 'Select2', 'kirki' ),
		'description' => __( 'This is the control description', 'kirki' ),
		'help'        => __( 'This is some extra help. You can use this to add some additional instructions for users. The main description should go in the "description" of the field, this is only to be used for help tips.', 'kirki' ),
		'section'     => 'controls_with_choices',
		'default'     => 'option-1',
		'priority'    => 10,
		'choices'     => Kirki_Fonts::get_font_choices(),
		'output'      => array(
			array(
				'element'  => 'body p',
				'property' => 'font-family',
			),
		),
	);

	$fields[] = array(
		'type'        => 'select2-multiple',
		'settings'    => 'select_demo_3',
		'label'       => __( 'Select2 - multiple', 'kirki' ),
		'description' => __( 'This is the control description', 'kirki' ),
		'help'        => __( 'This is some extra help. You can use this to add some additional instructions for users. The main description should go in the "description" of the field, this is only to be used for help tips.', 'kirki' ),
		'section'     => 'controls_with_choices',
		'default'     => 'option-1',
		'priority'    => 10,
		'choices'     => array(
			'option-1' => __( 'Option 1', 'kirki' ),
			'option-2' => __( 'Option 2', 'kirki' ),
			'option-3' => __( 'Option 3', 'kirki' ),
			'option-4' => __( 'Option 4', 'kirki' ),
		),
	);

	return $fields;

}
add_filter( 'kirki/fields', 'kirki_controls_with_choices_fields' );

