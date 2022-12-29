<?php
namespace ThemeName;

/**
 * The main handler class responsible for initialization. It registers all the
 * components required to run the theme.
 *
 * @package ThemeName
 */

if ( ! defined( 'ABSPATH' ) ) {
	die; // Exit if accessed directly.
}

class Theme {

	/**
	 * Instance.
	 *
	 * Holds the Child Theme instance.
	 *
	 * @var ChildTheme
	 */
	public static $instance = null;

	/**
	 * Instance.
	 *
	 * Ensures only one instance of the Child Theme class is loaded or can be loaded.
	 *
	 * @return ChildTheme An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Cloning or unserializing instances of the class is forbidden.
	 */
	public function __clone() {
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Something went wrong.', 'TextDomain' ), '1.0.0' );
	}

	public function __wakeup() {
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Something went wrong.', 'TextDomain' ), '1.0.0' );
	}

	/**
	 * Load the child theme's text domain.
	 */
	public function load_textdomain() {
		add_action( 'after_setup_theme', array( $this, 'add_child_theme_textdomain' ) );
	}

	/**
	 * Load required theme modules.
	 */
	public function load_modules() {
		// Core
		include_once THEME_NAME_PATH . '/includes/core/Instance.php';

		// Modules
		include THEME_NAME_PATH . '/includes/modules/CustomPostTypes.php';
		include THEME_NAME_PATH . '/includes/modules/ExampleModule.php';

		// Admin only modules
		if ( is_admin() ) {
			include THEME_NAME_PATH . '/includes/admin/AdminFrontend.php';
		}
	}

	/**
	 * Declare textdomain for this child theme and load the translated strings.
	 * Translations can be added to the ./languages directory.
	 *
	 * @link https://developer.wordpress.org/reference/functions/load_child_theme_textdomain/
	 */
	public static function add_child_theme_textdomain() {
		load_child_theme_textdomain( 'TextDomain', get_stylesheet_directory() . '/languages' );
	}

	/**
	 * Theme constructor.
	 */
	private function __construct() {
		$this->load_textdomain();
		$this->load_modules();
	}
}

Theme::instance();
