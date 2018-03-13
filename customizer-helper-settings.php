<?php
/**
 * Example implementation of the 'Customizer Helper'.
 *
 * @link       https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package    customizer-helper
 * @copyright  Copyright (c) 2018, Danny Cooper
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @version    1.0.0
 */

/**
 * Load the helper class.
 */
if ( file_exists( dirname( __FILE__ ) . '/class-customizer-helper.php' ) ) {
	require_once dirname( __FILE__ ) . '/class-customizer-helper.php';
}

/**
 * Defines customizer settings
 */
function customizer_helper_settings() {

	// Stores all the panels to be added.
	$panels = array();

	// Stores all the sections to be added.
	$sections = array();

	// Stores all the settings that will be added.
	$settings = array();

	// Panel Example.
	$panel    = 'panel'; // Panel ID.
	$panels[] = array(
		'id'              => $panel, // Panel ID.
		'title'           => esc_html__( 'Customizer Helper Panel', 'customizer-helper' ), // Title to show in the UI.
		'description'     => esc_html__( 'Example panel description.', 'customizer-helper' ), // Description to show in the UI.
		'priority'        => '1', // Priority of the panel, defining the display order of panels and sections. Default 160.
		'capability'      => 'edit_theme_options', // Capability required for the panel. Default `edit_theme_options`
		'theme_supports'  => '', // Theme features required to support the panel.
		'type'            => '', // Type of the panel.
		'active_callback' => '', // Active callback.
	);

	// Section Example.
	$section    = 'section'; // Section ID.
	$sections[] = array(
		'id'                 => $section, // Section ID.
		'panel'              => $panel, // Panel ID.
		'title'              => esc_html__( 'Customizer Helper Section', 'customizer-helper' ), // Title to show in the UI.
		'description'        => esc_html__( 'Example section description.', 'customizer-helper' ), // Description to show in the UI.
		'priority'           => '160', // Priority of the panel, defining the display order of panels and sections. Default 160.
		'capability'         => 'edit_theme_options', // Capability required for the section. Default `edit_theme_options`
		'theme_supports'     => '', // Theme features required to support the section.
		'type'               => '', // Type of the panel.
		'active_callback'    => '', // Active callback.
		'description_hidden' => false, // Hide the description behind a help icon. Default false.
	);

	// Setting Example.
	$settings['setting'] = array(
		'section'         => $section, // The section this control belongs to. Default empty.
		'id'              => 'setting', // Setting ID.
		'label'           => esc_html__( 'Customizer Helper Setting', 'customizer-helper' ), // Label for the control. Default empty.
		'description'     => esc_html__( 'Example setting description', 'customizer-helper' ), // Description for the control. Default empty.
		'type'            => 'text', // The type of the control. Default 'text'.
		'capability'      => 'edit_theme_options', // Capability required for the section. Default `edit_theme_options`
		'priority'        => '10', // Priority of the setting, defining it's order. Default 10.
		'choices'         => array(), // List of choices for 'radio' or 'select' type controls, where values are the keys, and labels are the values. Default empty array.
		'input_attrs'     => array(), // List of custom input attributes for control output, where attribute names are the keys and values are the values. Default empty array.
		'allow_addition'  => false, // Show UI for adding new content, currently only used for the dropdown-pages control. Default false.
		'active_callback' => '', // Active callback.
		'default'         => '', // Default value for the setting. Default is empty string.
	);

	// Further Examples.
	$section    = 'further-examples';
	$sections[] = array(
		'id'          => $section,
		'panel'       => $panel,
		'title'       => esc_html__( 'Further Examples', 'customizer-helper' ),
		'description' => esc_html__( 'Demonstration of the available setting types.', 'customizer-helper' ),
		'priority'    => '200',
	);

	$settings['example-text'] = array(
		'id'      => 'example-text',
		'label'   => esc_html__( 'Example Text Input', 'customizer-helper' ),
		'section' => $section,
		'type'    => 'text',
	);

	$settings['example-textarea'] = array(
		'section' => $section,
		'id'      => 'example-textarea',
		'label'   => esc_html__( 'Example Textarea', 'customizer-helper' ),
		'type'    => 'textarea',
		'default' => esc_html__( 'Example textarea text.', 'customizer-helper' ),
	);

	$settings['example-upload'] = array(
		'section' => $section,
		'id'      => 'example-upload',
		'label'   => esc_html__( 'Example Upload', 'customizer-helper' ),
		'type'    => 'upload',
		'default' => '',
	);

	$settings['example-image'] = array(
		'section' => $section,
		'id'      => 'example-image',
		'label'   => esc_html__( 'Example Image', 'customizer-helper' ),
		'type'    => 'image',
		'default' => '',
	);

	$settings['example-url'] = array(
		'section'     => $section,
		'id'          => 'example-url',
		'label'       => esc_html__( 'Example URL Input', 'customizer-helper' ),
		'type'        => 'url',
		'input_attrs' => array(
			'placeholder' => esc_html__( 'https://www.google.com', 'customizer-helper' ),
		),
	);

	$settings['example-color'] = array(
		'section' => $section,
		'id'      => 'example-color',
		'label'   => esc_html__( 'Example Color Picker', 'customizer-helper' ),
		'type'    => 'color',
	);

	$settings['example-checkbox'] = array(
		'section' => $section,
		'id'      => 'example-checkbox',
		'label'   => esc_html__( 'Example Checkbox', 'customizer-helper' ),
		'type'    => 'checkbox',
		'default' => 0, // 1 = checked. Default: 0.
	);

	$choices = array(
		'choice-1' => esc_html__( 'Choice One', 'customizer-helper' ),
		'choice-2' => esc_html__( 'Choice Two', 'customizer-helper' ),
		'choice-3' => esc_html__( 'Choice Three', 'customizer-helper' ),
	);

	$settings['example-select'] = array(
		'section' => $section,
		'id'      => 'example-select',
		'label'   => esc_html__( 'Example Select', 'customizer-helper' ),
		'type'    => 'select',
		'choices' => $choices,
		'default' => 'choice-1',
	);

	$settings['example-radio'] = array(
		'section' => $section,
		'id'      => 'example-radio',
		'label'   => esc_html__( 'Example Radio', 'customizer-helper' ),
		'type'    => 'radio',
		'choices' => $choices,
		'default' => 'choice-1',
	);

	$settings['example-range'] = array(
		'section'     => $section,
		'id'          => 'example-range',
		'label'       => esc_html__( 'Example Range Input', 'customizer-helper' ),
		'type'        => 'range',
		'input_attrs' => array(
			'min'   => 0,
			'max'   => 10,
			'step'  => 1,
			'style' => 'color: #0a0',
		),
	);

	// Adds the panels to the $settings array.
	$settings['panels'] = $panels;

	// Adds the sections to the $settings array.
	$settings['sections'] = $sections;

	$customizer_helper = Customizer_Helper::Instance();
	$customizer_helper->add_settings( $settings );

}
add_action( 'init', 'customizer_helper_settings' );
