<?php
namespace ThemeName\Admin;

use ThemeName\Core\Instance;

/**
 * Front-end admin area customizations.
 *
 * @package ThemeName
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class AdminFrontend extends Instance {
	public static function get_instance() {
		return parent::instance();
	}

	/**
	 * Hide menus from the admin in the client session.
	 * @since 1.0.0
	 * @link https://developer.wordpress.org/reference/functions/remove_menu_page/
	 */
	public static function delete_editor_menu_items() {
		if ( current_user_can( 'editor' ) ) {
			// remove_menu_page( 'tools.php' );
			// remove_menu_page('edit.php?post_type=elementor_library');
			// remove_menu_page('envato-elements');
			// remove_menu_page('jet-engine');
		}
	}

	/**
	 * Changes the admin bottom-left footer text.
	 * @since 1.0.0
	 * @link https://developer.wordpress.org/reference/hooks/admin_footer_text/
	 */
	public static function footer_text_developed_by() {
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
	public static function footer_text_version() {
		$wp_logo    = file_get_contents( THEME_NAME_PATH . '/assets/wordpress.svg' );
		$wp_version = get_bloginfo( 'version', 'display' );

		return '<small>Theme_Name ' . THEME_NAME_VERSION . ' — <span style="vertical-align:sub">' . $wp_logo . '</span> ' . $wp_version . '</small>';
	}

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'admin_init', array( $this, 'delete_editor_menu_items' ) );

		// Check if the hooks are not set by other plugin
		if ( ! has_filter( 'admin_footer_text' ) && ! has_filter( 'update_footer' ) ) {
			wp_enqueue_style(
				'admin_frontend',
				THEME_NAME_ASSETS_URI . '/admin.css',
				array(),
				THEME_NAME_VERSION
			);
			add_filter( 'admin_footer_text', array( $this, 'footer_text_developed_by' ), 11 );
			add_filter( 'update_footer', array( $this, 'footer_text_version' ), 11 );
		}
	}
}

AdminFrontend::get_instance();
