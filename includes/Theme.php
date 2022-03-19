<?php
namespace ThemeName;

/**
 * Initializes the Theme.
 *
 * @package ThemeName
 */

if (!defined('ABSPATH')) {
    exit(); // Exit if accessed directly.
}

class Theme {
    /**
     * Holds the Child Theme instance.
     */
    public static $instance = null;

    /**
     * Ensures only one instance of the Child Theme class is loaded or can be loaded.
     */
    public static function instance() {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Load the child theme's text domain.
     */
    public function load_textdomain() {
        add_action('after_setup_theme', [$this, 'add_child_theme_textdomain']);
    }

    /**
     * Load required theme modules.
     */
    public function load_modules() {
        // Core
        include_once THEME_NAME_PATH . '/includes/core/Instance.php';

        // Modules
        require THEME_NAME_PATH . '/includes/modules/CustomPostTypes.php';
        require THEME_NAME_PATH . '/includes/modules/ExampleModule.php';

        // Admin
        if (is_admin()) {
            require THEME_NAME_PATH . '/includes/admin/AdminFrontend.php';
        }
    }

    /**
     * Declare textdomain for this child theme and load the translated strings.
     * Translations can be added to the ./languages directory.
     * @link https://developer.wordpress.org/reference/functions/load_child_theme_textdomain/
     */
    public static function add_child_theme_textdomain() {
        load_child_theme_textdomain('textdomain', get_stylesheet_directory() . '/languages');
    }

    /**
     * Theme constructor.
     */
    public function __construct() {
        $this->load_textdomain();
        $this->load_modules();
    }
}

Theme::instance();
