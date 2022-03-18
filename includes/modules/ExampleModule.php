<?php
namespace ThemeName;

use ThemeName\Core\Instance;

/**
 * Another Module.
 *
 * @package ThemeName
 */

if (!defined('ABSPATH')) {
    exit(); // Exit if accessed directly.
}

class ExampleModule extends Instance {
    /**
     * Initiator.
     */
    public static function get_instance() {
        return parent::instance();
    }

    /**
     *  Constructor.
     */
    public function __construct() {
        // var_dump($this);
        // add_action('hook', [$this, 'add_module_feature'], 10);
    }

    /**
     * Functions:
     */
    public static function add_module_feature() {
    }
}

ExampleModule::get_instance();
