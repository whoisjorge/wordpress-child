<?php
namespace ThemeName;

use ThemeName\Core\Instance as ModuleInstance;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Debloating.
 *
 * Removes a long list of unnecessary default stuff since WordPress adds its own code
 * here and there and begins to bloat out areas in the dom that arent required.
 *
 * @see https://gist.github.com/alexwcoleman/8539c684aaf86a428dcb381c3ea17911
 *
 */
class Debloating extends ModuleInstance {
	public static function get_instance() {
		return parent::instance();
	}

	/**
	* @since 1.0.0
	*/
	public function remove_head_links() {
		// The XHTML generator that is generated on the wp_head hook, WP version
		remove_action( 'wp_head', 'wp_generator' );
		// The link to the Windows Live Writer manifest file.
		remove_action( 'wp_head', 'wlwmanifest_link' );

	}

	/**
	* @since 1.0.0
	*/
	public function disable_wp_emojis() {
		// Prevent Emoji from loading on the front-end
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		// Disable also in the admin area
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );

		// Prevent conversion of emoji to a static img element
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

		// Prevent character conversion
		// https://core.trac.wordpress.org/ticket/34773
		add_filter( 'option_use_smilies', '__return_false' );
	}

	/**
	 * @since 1.0.0
	 * @see https://developer.wordpress.org/reference/functions/wp_deregister_style/
	 */
	public function deregister_styles() {
		// wp_dequeue_style( 'global-styles' );
		// wp_dequeue_style( 'wp-block-library' );
		// wp_dequeue_style( 'wp-block-library-theme' );
		// wp_dequeue_style( 'classic-theme-styles' );

		// wp_deregister_style( 'should_do_this_?' );
	}

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'remove_head_links' ) );
		add_action( 'init', array( $this, 'disable_wp_emojis' ) );

		add_action( 'wp_enqueue_scripts', array( $this, 'deregister_styles' ), 100 );
	}
}

Debloating::get_instance();
