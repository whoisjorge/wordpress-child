<?php
namespace ThemeName\Core;

if (!defined('ABSPATH')) {
    exit(); // Exit if accessed directly.
}

abstract class Instance {
    /**
     * Holds the module instance.
     */
    protected static $_instances = [];

    /**
     * Ensures only one instance of the module class is loaded or can be loaded.
     */
    public static function instance() {
        $class_name = static::class_name();

        if (empty(static::$_instances[$class_name])) {
            static::$_instances[$class_name] = new static();
        }

        return static::$_instances[$class_name];
    }

    /**
     * Retrieve the name of the class.
     */
    public static function class_name() {
        return get_called_class();
    }

    /**
     * Constructor.
     */
    public function __construct() {
    }
}
