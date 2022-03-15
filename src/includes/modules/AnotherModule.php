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

class AnotherModule extends Instance {
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
    }

    /**
     * Functions:
     */
    public static function add_module_feature() {
    }
}

AnotherModule::get_instance();
