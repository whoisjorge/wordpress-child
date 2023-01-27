<?php
namespace ThemeName;

use ThemeName\Core\Instance as ModuleInstance;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Summary.
 *
 * Description.
 *
 * @since x.x.x
 */
class ExampleModule extends ModuleInstance {
	public static function get_instance() {
		return parent::instance();
	}

	/**
	 * Summary.
	 *
	 * Description.
	 *
	 * @since x.x.x
	 * @deprecated x.x.x Use new_function_name()
	 * @see new_function_name()
	 *
	 * @param type $var Optional. Description.
	 * @param type $var Description.
	 * @return type Description.
	 */
	public function add_module_feature() {
	}

	/**
	 * Constructor.
	 */
	public function __construct() {
		// var_dump($this);
		// add_action('hook', [$this, 'add_module_feature'], 10);
	}
}

ExampleModule::get_instance();
