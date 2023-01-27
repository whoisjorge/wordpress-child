<?php
namespace ThemeName\Admin;

use ThemeName\Core\Instance as ModuleInstance;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Front-end admin area customizations.
 *
 * @package ThemeName
 */
class AdminFrontend extends ModuleInstance {
	public static function get_instance() {
		return parent::instance();
	}

	/**
	 * @return String /wp-content/themes/<theme_name>/includes/admin
	 */
	private function get_relative_path() {
		return strstr( dirname( __FILE__ ), '/wp-content' );
	}

	/**
	 * Hide menus from the admin in the client session.
	 * @since 1.0.0
	 * @link https://developer.wordpress.org/reference/functions/remove_menu_page/
	 */
	public function delete_editor_menu_items() {
		remove_menu_page( 'tools.php' );
		// remove_menu_page('edit.php?post_type=elementor_library');
		// remove_menu_page('envato-elements');
		// remove_menu_page('jet-engine');

		// remove_submenu_page( 'themes.php', 'themes.php' );

		// $customizer_url = add_query_arg( 'return', urlencode( remove_query_arg( wp_removable_query_args(), wp_unslash( $_SERVER['REQUEST_URI'] ) ) ), 'customize.php' );
		// remove_submenu_page( 'themes.php', $customizer_url );
	}

	/**
	 * Changes the admin bottom-left footer text.
	 * @since 1.0.0
	 * @link https://developer.wordpress.org/reference/hooks/admin_footer_text/
	 */
	public function footer_text_developed_by() {
		$text = sprintf(
			/* translators: %s: Company URL */
			__( 'Developed by <a href="%s">Company Name</a>', 'TextDomain' ),
			__( 'https://' )
		);

		return '
    	<small>
            <span id="footer-thankyou" class="developed-by">
				' . $text . ' <span class="brumm">🚀</span>
			</span>
        </small>
        ';
	}

	/**
	 * Changes the admin bottom-right footer text.
	 * @since 1.0.0
	 * @link https://developer.wordpress.org/reference/hooks/admin_footer/
	 */
	public function footer_text_version() {
		$wp_logo    = file_get_contents( dirname( __FILE__ ) . '/assets/img/wordpress-icon.svg' );
		$wp_version = get_bloginfo( 'version', 'display' );

		return '<small>Theme_Name ' . THEME_NAME_VERSION . ' — <span style="vertical-align:sub">' . $wp_logo . '</span> ' . $wp_version . '</small>';
	}

	/**
	 * Registers the css styles and js scripts for the admin dashboard.
	 * @since 1.0.0
	 * @link https://developer.wordpress.org/reference/hooks/admin_enqueue_scripts/
	 */
	public function enqueue_admin_frontend_style() {
		wp_register_style( 'admin_frontend_css', $this->get_relative_path() . '/assets/css/style.css', false, THEME_NAME_VERSION );
		wp_enqueue_style( 'admin_frontend_css' );
	}

	/**
	 * Constructor.
	 */
	public function __construct() {
		// Check if the hooks are not set by other plugin
		if ( ! has_filter( 'admin_footer_text' ) && ! has_filter( 'update_footer' ) ) {
			add_filter( 'admin_footer_text', array( $this, 'footer_text_developed_by' ), 11 );
			add_filter( 'update_footer', array( $this, 'footer_text_version' ), 11 );

			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_frontend_style' ) );
		}

		// Check if the user has the Editor role
		if ( current_user_can( 'editor' ) ) {
			add_action( 'admin_init', array( $this, 'delete_editor_menu_items' ) );
		}

		/*
		 * ********************************************************************
		 * 	Admin Tweaks (to do: create a function)
		 * ********************************************************************
		 */

		// Removes WordPress contextual help tab
		add_action(
			'admin_head',
			function() {
				$screen = get_current_screen();
				$screen->remove_help_tabs();
			}
		);
	}
}

AdminFrontend::get_instance();
