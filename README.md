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

Once you have done that you can edit `customizer-helping-settings.php` to create your own settings. The example file is heavily documented to show you how panels, sections and settings work. Working examples of each setting type are also included.
