<?php
/**
 * Theme Name.
 *
 * @version 1.0.0
 * @author Author <email>
 * @copyright Copyright (c) year, author
 */

if (!defined('ABSPATH')) {
    exit(); // Exit if accessed directly.
}

define('THEME_NAME_VERSION', '1.0.0');

define('THEME_NAME_PATH', get_theme_file_path());
define('THEME_NAME_PARENT_PATH', get_template_directory());

/*
|--------------------------------------------------------------------------
| Get all necessary theme files.
|--------------------------------------------------------------------------
|
| Everything within the theme is initiated and registered via instances, so
| we are requiring all the include files here to load all the features.
|
*/

require THEME_NAME_PATH . '/includes/Theme.php';

/*
|--------------------------------------------------------------------------
| CUSTOM CODE BELOW
|--------------------------------------------------------------------------
|
| Place here your custom classes and functions!
|
*/
