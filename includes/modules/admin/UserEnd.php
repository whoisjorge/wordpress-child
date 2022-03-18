<?php
namespace ThemeName\Admin;

use ThemeName\Core\Instance;

/**
 * User End admin area customizations.
 *
 * @package ThemeName
 */

if (!defined('ABSPATH')) {
    exit(); // Exit if accessed directly.
}

class UserEnd extends Instance {
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
        add_action('admin_init', [$this, 'delete_editor_menu_items']);

        // Check if the hooks are not set by other plugin
        if (!has_filter('admin_footer_text') && !has_filter('update_footer')) {
            wp_enqueue_style(
                'admin_userend',
                THEME_NAME_ASSETS . '/admin.css',
                [],
                THEME_NAME_VERSION
            );
            add_filter('admin_footer_text', [$this, 'footer_text_developed_by'], 11);
            add_filter('update_footer', [$this, 'footer_text_version'], 11);
        }
    }

    /**
     * Hide menus from the admin in the client session.
     * https://developer.wordpress.org/reference/functions/remove_menu_page/
     */
    public static function delete_editor_menu_items() {
        if (current_user_can('editor')) {
            remove_menu_page('tools.php');
            // remove_menu_page('edit.php?post_type=elementor_library');
            // remove_menu_page('envato-elements');
            // remove_menu_page('jet-engine');
        }
    }

    /**
     * Changes the admin bottom-left footer text.
     * https://developer.wordpress.org/reference/hooks/admin_footer_text/
     */
    public static function footer_text_developed_by() {
        $text = sprintf(__('Developed by <a href="%s">Company Name</a>'), __('https://'));
        //prettier-ignore
        return '
        <small>
            <span id="footer-thankyou" class="developed-by">
                '.$text.' <span class="brumm">🚀</span>
            </span>
        </small>
        ';
    }

    /**
     * Changes the admin bottom-right footer text.
     * https://developer.wordpress.org/reference/hooks/admin_footer/
     */
    public static function footer_text_version() {
        return sprintf(
            __('<small>Theme Name %s — <span style="vertical-align:sub">%s</span> %s</small>'),
            THEME_NAME_VERSION,
            file_get_contents(THEME_NAME_PATH . '/assets/wordpress.svg'),
            get_bloginfo('version', 'display')
        );
    }
}

UserEnd::get_instance();
