<?php
/**
 * Theme_Name theme functions and definitions.
 *
 * @version 1.0.0
 * @author Author name <email> (website)
 * @copyright Copyright (c) year, author name <email> (website)
 *
 * @package ThemeName
 *
 * Theme_Name is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Theme_Name is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'THEME_NAME_VERSION', '1.0.0' );
define( 'THEME_NAME_VERSION_REQUIRED_PHP', '7.4' );
define( 'THEME_NAME_VERSION_REQUIRED_WP', '5.9.2' );

define( 'THEME_NAME_PARENT_PATH', get_stylesheet_directory() ); // get_template_directory()
define( 'THEME_NAME_PATH', get_theme_file_path() );

define( 'THEME_NAME_ASSETS_URI', get_stylesheet_directory_uri() . '/assets' );

/*
|--------------------------------------------------------------------------
| 🔮 Get all necessary theme files.
|--------------------------------------------------------------------------
|
| Everything within the theme is initiated and registered via instances, so
| we are requiring all the include files here to load all the features.
| First we ensure the minimum required software versions are running.
|
*/

if ( ! version_compare( PHP_VERSION, THEME_NAME_VERSION_REQUIRED_PHP, '>=' ) ) {
	add_action( 'admin_notices', 'TextDomain_fail_php_version' );
} elseif ( ! version_compare( get_bloginfo( 'version' ), THEME_NAME_VERSION_REQUIRED_WP, '>=' ) ) {
	add_action( 'admin_notices', 'TextDomain_fail_wp_version' );
} else {
	/**
	 * 🚀 The child theme is running !
	 */
	require THEME_NAME_PATH . '/includes/Theme.php';
}

/*
|--------------------------------------------------------------------------
| 🚧 Admin notices for minimum PHP and WordPress versions.
|--------------------------------------------------------------------------
|
| It shows a warning when the site doesn't have the minimum required
| versions, which means the theme won't be loaded at all.
|
| https://developer.wordpress.org/reference/hooks/admin_notices/
| https://developer.wordpress.org/reference/functions/wp_kses_post/
|
*/

function TextDomain_fail_php_version() {
	$message = sprintf(
		/* translators: %s: PHP version */
		__(
			'<strong>Error:</strong> PHP version %s+ is required and you are using an earlier version — The child theme is currently NOT RUNNING.',
			'TextDomain'
		),
		THEME_NAME_VERSION_REQUIRED_PHP
	);

	$html_message = sprintf( '<div class="notice notice-error">%s</div>', wpautop( $message ) );
	echo wp_kses_post( $html_message );
}

function TextDomain_fail_wp_version() {
	$message = sprintf(
		/* translators: %s: WordPress version */
		__(
			'<strong>Error:</strong> WordPress version %s+ is required and you are using an earlier version — The child theme is currently NOT RUNNING.',
			'TextDomain'
		),
		THEME_NAME_VERSION_REQUIRED_WP
	);

	$html_message = sprintf( '<div class="notice notice-error">%s</div>', wpautop( $message ) );
	echo wp_kses_post( $html_message );
}

/*
|--------------------------------------------------------------------------
| 👻 General Theme Functions (customized code tweaks)
|--------------------------------------------------------------------------
|
| Note that PHP does not support function overloading, nor is it possible
| to undefine or redefine previously-declared functions.
|
| https://developer.wordpress.org/themes/basics/theme-functions/
| https://www.php.net/manual/en/functions.user-defined.php
|
*/

// Registers and enqueues javascript scripts for fast tweaks.
function TextDomain_enqueue_tweaks_js() {
	wp_enqueue_script(
		'tweaks',
		THEME_NAME_ASSETS_URI . '/js/tweaks.js',
		array( 'jquery' ),
		THEME_NAME_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'TextDomain_enqueue_tweaks_js' );

// echo PHP_VERSION;
