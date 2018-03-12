# Customizer Helper
Helper class for building settings with the WordPress Customize API

License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

## Description

Customizer Helper is a class you can drop in to your WordPress theme to speed up the development of Customizer settings. It's extremely lightweight - One file for the Class (8kb) and another for your settings.

## Getting Started

First, you need to include the Customizer Helper in your theme. In `functions.php` add the following code:

```php
/**
 * Load Customizer Settings.
 */
require get_template_directory() . '/inc/customizer-helper/customizer-helper-settings.php';
```

Once you have done that you can edit `customizer-helping-settings.php` to create your own settings. 

The example file is heavily documented to show you how panels, sections and settings work. Working examples of each setting type are also included.

The first of each panel, section and setting are documented to show the default values from WordPress' API.

## Inspiration

This class was inspired by @devinsays [customizer-library](https://github.com/devinsays/customizer-library) and is intended to be a slimmed down version of what he started.

## Setting Types

Text
Upload
Image
URL
Color
Checkbox
Select
Radio
Textarea
Range

## Panels

Panels are the top of the hierarchy and hold one or more sections.

```php
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
```

## Sections

Sections are groups of settings. Sections do not have to be located within a panel, they can be placed on the top level of the customizer simply by ommiting the 'panel' field.

```php
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
```

## Settings

Settings are the lowest level of the hierarchy and control the input. Without the Customizer Helper you need to build settings and controls separately. However, with the helper it's just one simply array.

```php
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
```

### Text Setting

```php
$settings['example-text'] = array(
	'id'      => 'example-text',
	'label'   => esc_html__( 'Example Text Input', 'customizer-helper' ),
	'section' => $section,
	'type'    => 'text',
);
```

### Textarea Setting

```php
$settings['example-textarea'] = array(
	'section' => $section,
	'id'      => 'example-textarea',
	'label'   => esc_html__( 'Example Textarea', 'customizer-helper' ),
	'type'    => 'textarea',
	'default' => esc_html__( 'Example textarea text.', 'customizer-helper' ),
);
```

### Upload Setting

```php
$settings['example-upload'] = array(
	'section' => $section,
	'id'      => 'example-upload',
	'label'   => esc_html__( 'Example Upload', 'customizer-helper' ),
	'type'    => 'upload',
	'default' => '',
);
```

### Image Setting

```php
$settings['example-image'] = array(
	'section' => $section,
	'id'      => 'example-image',
	'label'   => esc_html__( 'Example Image', 'customizer-helper' ),
	'type'    => 'image',
	'default' => '',
);
```

### URL Setting

```php
$settings['example-url'] = array(
	'section'     => $section,
	'id'          => 'example-url',
	'label'       => esc_html__( 'Example URL Input', 'customizer-helper' ),
	'type'        => 'url',
	'input_attrs' => array(
		'placeholder' => esc_html__( 'https://www.google.com', 'customizer-helper' ),
	),
);
```

### Color Setting

```php
$settings['example-color'] = array(
	'section' => $section,
	'id'      => 'example-color',
	'label'   => esc_html__( 'Example Color Picker', 'customizer-helper' ),
	'type'    => 'color',
);
```

### Checkbox Setting

```php
$settings['example-checkbox'] = array(
	'section' => $section,
	'id'      => 'example-checkbox',
	'label'   => esc_html__( 'Example Checkbox', 'customizer-helper' ),
	'type'    => 'checkbox',
	'default' => 0, // 1 = checked. Default: 0.
);
``` 

### Selection Setting

```php
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
``` 

### Selection Setting

```php
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
``` 

### Radio Setting

```php
$choices = array(
	'choice-1' => esc_html__( 'Choice One', 'customizer-helper' ),
	'choice-2' => esc_html__( 'Choice Two', 'customizer-helper' ),
	'choice-3' => esc_html__( 'Choice Three', 'customizer-helper' ),
);
$settings['example-radio'] = array(
	'section' => $section,
	'id'      => 'example-radio',
	'label'   => esc_html__( 'Example Radio', 'customizer-helper' ),
	'type'    => 'radio',
	'choices' => $choices,
	'default' => 'choice-1',
);
``` 

### Radio Setting

```php
$choices = array(
	'choice-1' => esc_html__( 'Choice One', 'customizer-helper' ),
	'choice-2' => esc_html__( 'Choice Two', 'customizer-helper' ),
	'choice-3' => esc_html__( 'Choice Three', 'customizer-helper' ),
);
$settings['example-radio'] = array(
	'section' => $section,
	'id'      => 'example-radio',
	'label'   => esc_html__( 'Example Radio', 'customizer-helper' ),
	'type'    => 'radio',
	'choices' => $choices,
	'default' => 'choice-1',
);
``` 

### Range Setting

```php
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
``` 
