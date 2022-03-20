<?php
namespace ThemeName;

use ThemeName\Core\Instance as ModuleInstance;

/**
 * Another Module.
 *
 * @package ThemeName
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class ExampleModule extends ModuleInstance {
	public static function get_instance() {
		return parent::instance();
	}

	/**
	 * Functions
	 * @example
	 */
	public static function add_module_feature() {
	}

	/**
	 * Constructor.
	 * @example
	 */
	public function __construct() {
		// var_dump($this);
		// add_action('hook', [$this, 'add_module_feature'], 10);
	}
}

ExampleModule::get_instance();
