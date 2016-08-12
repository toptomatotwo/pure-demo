<?php

$wp_customize->add_section( 'file_controls_section', array(
		'title'       => __( 'File & Image Controls', 'pure-demo' ),
		'priority'    => 10,
		'description' => __( 'This is the section description', 'pure-demo' ),
	) );

	$wp_customize->add_section( 'text_section', array(
		'title'       => __( 'Text Control', 'pure-demo' ),
		'priority'    => 10,
		'description' => __( 'This is the section description', 'pure-demo' ),
	) );

	$wp_customize->add_section( 'background_section', array(
		'title'       => __( 'Background Control', 'pure-demo' ),
		'priority'    => 10,
		'description' => __( 'This is the section description', 'pure-demo' ),
	) );

	$wp_customize->add_section( 'numeric', array(
		'title'       => __( 'Numeric Controls', 'pure-demo' ),
		'priority'    => 10,
		'description' => __( 'This is the section description', 'pure-demo' ),
	) );

	$wp_customize->add_section( 'custom_section', array(
		'title'       => __( 'Custom Control', 'pure-demo' ),
		'priority'    => 10,
		'description' => __( 'This is the section description', 'pure-demo' ),
	) );

	$wp_customize->add_section( 'repeater_section', array(
		'title'       => __( 'Repeater Control', 'pure-demo' ),
		'priority'    => 10,
		'description' => __( 'This is the section description', 'pure-demo' ),
	) );

/**
 * Create panels using the Kirki API
 */
Puredemo_Kirki::add_section( 'boolean_controls', array(
	'priority'    => 10,
	'title'       => __( 'Boolean Controls', 'pure-demo' ),
	'description' => __( 'This panel contains controls that return true/false Controls', 'pure-demo' ),
) );


/**
 * Add file controls
 */
function kirki_file_controls_fields( $fields ) {

	$fields[] = array(
		'type'        => 'image',
		'settings'    => 'image_demo',
		'label'       => __( 'This is the label', 'pure-demo' ),
		'description' => __( 'This is the control description', 'pure-demo' ),
		'help'        => __( 'This is some extra help. You can use this to add some additional instructions for users. The main description should go in the "description" of the field, this is only to be used for help tips.', 'pure-demo' ),
		'section'     => 'file_controls_section',
		'default'     => '',
		'priority'    => 10,
		'output'      => array(
			array(
				'element'  => 'p',
				'property' => 'background-image',
			),
		),
	);

	$fields[] = array(
		'type'        => 'upload',
		'settings'    => 'file_controls_section',
		'label'       => __( 'This is the label', 'pure-demo' ),
		'description' => __( 'This is the control description', 'pure-demo' ),
		'help'        => __( 'This is some extra help. You can use this to add some additional instructions for users. The main description should go in the "description" of the field, this is only to be used for help tips.', 'pure-demo' ),
		'section'     => 'file_controls_section',
		'default'     => '',
		'priority'    => 10,
	);

	return $fields;

}
add_filter( 'kirki/fields', 'kirki_file_controls_fields' );

/**
 * Add text fields
 */
function kirki_text_controls_fields( $fields ) {

	$fields[] = array(
		'type'        => 'text',
		'settings'    => 'text_demo',
		'label'       => __( 'Text', 'pure-demo' ),
		'description' => __( 'This is the control description', 'pure-demo' ),
		'help'        => __( 'This is some extra help. You can use this to add some additional instructions for users. The main description should go in the "description" of the field, this is only to be used for help tips.', 'pure-demo' ),
		'section'     => 'text_section',
		'default'     => 'This is some default text',
		'priority'    => 10,
	);

	$fields[] = array(
		'type'        => 'textarea',
		'settings'    => 'textarea_demo',
		'label'       => __( 'Textarea', 'pure-demo' ),
		'description' => __( 'This is the control description', 'pure-demo' ),
		'help'        => __( 'This is some extra help. You can use this to add some additional instructions for users. The main description should go in the "description" of the field, this is only to be used for help tips.', 'pure-demo' ),
		'section'     => 'text_section',
		'default'     => 'This is some default text',
		'priority'    => 10,
	);

	$fields[] = array(
		'type'        => 'editor',
		'settings'    => 'wysiwyg',
		'label'       => __( 'Editor', 'pure-demo' ),
		'description' => __( 'This is the control description', 'pure-demo' ),
		'help'        => __( 'This is some extra help. You can use this to add some additional instructions for users. The main description should go in the "description" of the field, this is only to be used for help tips.', 'pure-demo' ),
		'default'     => '',
		'section'     => 'text_section',
	);

	$fields[] = array(
		'type'        => 'code',
		'settings'    => 'code_monokai',
		'label'       => __( 'Code-CSS-Monokai', 'pure-demo' ),
		'description' => __( 'This is the control description', 'pure-demo' ),
		'help'        => __( 'This is some extra help. You can use this to add some additional instructions for users. The main description should go in the "description" of the field, this is only to be used for help tips.', 'pure-demo' ),
		'default'     => '',
		'section'     => 'text_section',
		'choices'     => array(
			'theme'    => 'monokai',
			'language' => 'css',
			'height'   => 250,
		)
	);

	$fields[] = array(
		'type'        => 'code',
		'settings'    => 'code_chrom',
		'label'       => __( 'Code-HTML-Chrome', 'pure-demo' ),
		'description' => __( 'This is the control description', 'pure-demo' ),
		'help'        => __( 'This is some extra help. You can use this to add some additional instructions for users. The main description should go in the "description" of the field, this is only to be used for help tips.', 'pure-demo' ),
		'default'     => '',
		'section'     => 'text_section',
		'choices'     => array(
			'theme'    => 'chrome',
			'language' => 'html',
			'height'   => 250,
		)
	);

	return $fields;

}
add_filter( 'kirki/fields', 'kirki_text_controls_fields' );

/**
 * Add numeric fields
 */
function kirki_numeric_fields( $fields ) {

	// step = 10
	$fields[] = array(
		'type'        => 'slider',
		'settings'    => 'slider_demo',
		'label'       => __( 'This is the label', 'pure-demo' ),
		'description' => __( 'This is the control description', 'pure-demo' ),
		'help'        => __( 'This is some extra help. You can use this to add some additional instructions for users. The main description should go in the "description" of the field, this is only to be used for help tips.', 'pure-demo' ),
		'section'     => 'numeric',
		'default'     => 20,
		'priority'    => 10,
		'choices'     => array(
			'min'  => -100,
			'max'  => 100,
			'step' => 10,
		),
	);

	// step = 0.01
	$fields[] = array(
		'type'        => 'slider',
		'settings'    => 'slider_demo_2',
		'label'       => __( 'This is the label', 'pure-demo' ),
		'description' => __( 'This is the control description', 'pure-demo' ),
		'help'        => __( 'This is some extra help. You can use this to add some additional instructions for users. The main description should go in the "description" of the field, this is only to be used for help tips.', 'pure-demo' ),
		'section'     => 'numeric',
		'default'     => 1.58,
		'priority'    => 20,
		'choices'     => array(
			'min'  => 0,
			'max'  => 5,
			'step' => .01,
		),
	);

	$fields[] = array(
		'type'        => 'number',
		'settings'    => 'number_demo',
		'label'       => __( 'This is the label', 'pure-demo' ),
		'description' => __( 'This is the control description', 'pure-demo' ),
		'help'        => __( 'This is some extra help. You can use this to add some additional instructions for users. The main description should go in the "description" of the field, this is only to be used for help tips.', 'pure-demo' ),
		'section'     => 'numeric',
		'default'     => '42',
		'priority'    => 10,
	);

	$fields[] = array(
		'type'        => 'dimension',
		'settings'    => 'dimension_demo',
		'label'       => __( 'This is the label', 'pure-demo' ),
		'description' => __( 'This is the control description', 'pure-demo' ),
		'help'        => __( 'This is some extra help. You can use this to add some additional instructions for users. The main description should go in the "description" of the field, this is only to be used for help tips.', 'pure-demo' ),
		'section'     => 'numeric',
		'default'     => '42px',
		'priority'    => 10,
	);

	return $fields;

}
add_filter( 'kirki/fields', 'kirki_numeric_fields' );

/**
 * Create a config instance that will be used by fields added via the static methods.
 * For this example we'll be defining our options to be serialized in the db, under the 'pure-demo' option.
 */
Puredemo_Kirki::add_config( 'pure-demo', array(
	'option_type' => 'theme_mod',
) );

Puredemo_Kirki::add_field( 'pure-demo', array(
	'type'        => 'repeater',
	'label'       => __( 'This is the label', 'pure-demo' ),
	'description' => __( 'This is the control description', 'pure-demo' ),
	'help'        => __( 'This is some extra help text.', 'pure-demo' ),
	'section'     => 'repeater_section',
	'default'     => array(),
	'priority'    => 10,
	'settings' => 'pure-demo',
	'fields' => array(
		'subsetting_1' => array(
			'type' => 'text',
			'label' => 'Setting A',
			'description' => 'lalala',
			'default' => 'Yeah'
		),
		'subsetting_2' => array(
			'type' => 'text',
			'label' => 'Setting B',
			'description' => 'lalala',
			'default' => ''
		),
		'subsetting_3' => array(
			'type' => 'checkbox',
			'description' => 'A checkbox',
			'default' => true
		),
		'subsetting_4' => array(
			'label' => 'A selector',
			'type' => 'select',
			'description' => 'lalala',
			'default' => '',
			'choices' => array(
				'' => 'None',
				'choice_1' => 'Choice 1',
				'choice_2' => 'Choice 2'
			)
		),
		'subsetting_5' => array(
			'type' => 'textarea',
			'label' => 'A textarea',
			'description' => 'lalalala',
			'default' => ''
		),
		'subsetting_6' => array(
			'label' => 'A radio',
			'type' => 'radio',
			'description' => 'yipiyai',
			'default' => 'choice-1',
			'choices' => array(
				'choice-1' => 'First choice',
				'choice-2' => 'Second choice'
			)
		),
	)
) );

/**
 * Create Custom field using the Kirki API static functions
 */
Puredemo_Kirki::add_field( 'pure-demo', array(
	'type'        => 'custom',
	'settings'    => 'custom_demo',
	'label'       => __( 'This is the label', 'pure-demo' ),
	'description' => __( 'This is the control description', 'pure-demo' ),
	'help'        => __( 'This is some extra help. You can use this to add some additional instructions for users. The main description should go in the "description" of the field, this is only to be used for help tips.', 'pure-demo' ),
	'section'     => 'custom_section',
	'default'     => '<div style="padding: 30px;background-color: #333; color: #fff; border-radius: 50px;">You can enter custom markup in this control and use it however you want</div>',
	'priority'    => 10,
) );

/**
 * Create Boolean fields using the Kirki API static functions
 */
// Checkbox
Puredemo_Kirki::add_field( 'pure-demo', array(
	'type'        => 'checkbox',
	'settings'    => 'checkbox_demo_0',
	'label'       => __( 'This is the label', 'pure-demo' ),
	'description' => __( 'This is the control description', 'pure-demo' ),
	'help'        => __( 'This is some extra help. You can use this to add some additional instructions for users.', 'pure-demo' ),
	'section'     => 'boolean_controls',
	'default'     => 1,
	'priority'    => 10,
) );

// Switch
Puredemo_Kirki::add_field( 'pure-demo', array(
	'type'        => 'switch',
	'settings'    => 'switch_demo_0',
	'label'       => __( 'This is the label', 'pure-demo' ),
	'description' => __( 'This is the control description', 'pure-demo' ),
	'help'        => __( 'This is some extra help. You can use this to add some additional instructions for users.', 'pure-demo' ),
	'section'     => 'boolean_controls',
	'default'     => '1',
	'priority'    => 10,
) );
Puredemo_Kirki::add_field( 'pure-demo', array(
	'type'        => 'switch',
	'settings'    => 'switch_demo_1',
	'label'       => __( 'This is the label', 'pure-demo' ),
	'description' => __( 'This is the control description', 'pure-demo' ),
	'help'        => __( 'This is some extra help. You can use this to add some additional instructions for users.', 'pure-demo' ),
	'section'     => 'boolean_controls',
	'default'     => '1',
	'priority'    => 10,
	'choices'     => array( 'round' => true ),
) );

// Toggle
Puredemo_Kirki::add_field( 'pure-demo', array(
	'type'        => 'toggle',
	'settings'    => 'toggle_demo_1',
	'label'       => __( 'This is the label', 'pure-demo' ),
	'description' => __( 'This is the control description', 'pure-demo' ),
	'help'        => __( 'This is some extra help. You can use this to add some additional instructions for users.', 'pure-demo' ),
	'section'     => 'boolean_controls',
	'default'     => 1,
	'priority'    => 10,
) );

/**
 * Add the background field

Puredemo_Kirki::add_field( 'pure-demo', array(
	'type'        => 'background',
	'settings'    => 'background_demo',
	'label'       => __( 'This is the label', 'pure-demo' ),
	'description' => __( 'This is the control description', 'pure-demo' ),
	'help'        => __( 'This is some extra help. You can use this to add some additional instructions for users. The main description should go in the "description" of the field, this is only to be used for help tips.', 'pure-demo' ),
	'section'     => 'background_section',
	'default'     => array(
		'color'    => '#ffffff',
		'image'    => '',
		'repeat'   => 'no-repeat',
		'size'     => 'cover',
		'attach'   => 'fixed',
		'position' => 'left-top',
		'opacity'  => 90,
	),
	'priority'    => 10,
	'output'      => '.hentry',
) );
 */
/**
 * Configuration sample for the Kirki Customizer.
 */
function kirki_demo_configuration_sample() {

	$args = array(
		// 'logo_image'   => KIRKI_URL . 'assets/images/kirki-toolkit.png',
		// 'color_accent' => '#00bcd4',
		'color_back'   => '#f7f7f7',
		// 'width'        => '350px'
	);

	return $args;
}
add_filter( 'kirki/config', 'kirki_demo_configuration_sample' );


/**
 * Darkens the color a bit
 */
function kirki_twentytwelve_alter_color( $color ) {
    return Kirki_Color::adjust_brightness( $color, -50 );
}

?>
