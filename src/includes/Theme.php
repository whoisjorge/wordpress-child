<?php
namespace ThemeName;

if (!defined('ABSPATH')) {
    exit(); // Exit if accessed directly.
}

class Theme {
    /**
     * Holds the theme instance.
     */
    public static $instance = null;

    /**
     * Ensures only one instance of the Theme class is loaded or can be loaded.
     */
    public static function instance() {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Initialize the theme modules.
     */
    public function load_modules() {
        include_once THEME_NAME_PATH . '/includes/core/Instance.php';

        require THEME_NAME_PATH . '/includes/modules/CustomPostTypes.php';
        require THEME_NAME_PATH . '/includes/modules/AnotherModule.php';

        if (is_admin()) {
            // require THEME_NAME_PATH . '/includes/modules/admin/AdminOnlyModule.php';
        }
    }

    /**
     * Theme constructor.
     */
    private function __construct() {
        $this->load_modules();
    }
}

/**
 * Init Theme & Load Modules!
 */
Theme::instance();
