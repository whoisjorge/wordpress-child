<?php
namespace ThemeName\Core;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Theme instance.
 *
 * An abstract class that provides the needed properties and methods to
 * manage and handle modules in inheriting classes.
 *
 * @abstract
 */
abstract class Instance {
	/**
	 * Class instance.
	 *
	 * Holds the class instance.
	 *
	 * @access protected
	 *
	 * @var Instance
	 */
	private static $_instances = array();

	/**
	 * Instance.
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @access public
	 * @static
	 *
	 * @return Instance An instance of the class.
	 */
	public static function instance() {
		$class_name = static::class_name();

		if ( empty( static::$_instances[ $class_name ] ) ) {
			static::$_instances[ $class_name ] = new static();
		}

		return static::$_instances[ $class_name ];
	}

	/**
	 * Class name.
	 *
	 * Retrieve the name of the class.
	 *
	 * @access public
	 * @static
	 */
	private static function class_name() {
		return get_called_class();
	}

	/**
	 * Clone.
	 *
	 * Disable class cloning and throw an error on object clone.
	 *
	 * The whole idea of the singleton design pattern is that there is a single
	 * object. Therefore, we don't want the object to be cloned.
	 *
	 * @access public
	 */
	public function __clone() {
		// Cloning instances of the class is forbidden
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Clone: Something went wrong.', 'TextDomain' ), '1.0.0' );
	}

	/**
	 * Wakeup.
	 *
	 * Disable unserializing of the class.
	 *
	 * @access public
	 */
	public function __wakeup() {
		// Unserializing instances of the class is forbidden
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Wakeup: Something went wrong.', 'TextDomain' ), '1.0.0' );
	}
}
