<?php
namespace ThemeName;
use ThemeName\Core\Instance;

/**
 * Register Custom Post Types.
 *
 * @package ThemeName
 */

if (!defined('ABSPATH')) {
    exit(); // Exit if accessed directly.
}

class CustomPostType extends Instance {
    public static function get_instance() {
        return parent::instance();
    }

    /**
     * Functions
     * @example
     */
    public static function add_custom_post_type() {
        // From: https://generatewp.com/post-type/
        $labels = [
            'name' => _x('Custom Post Type Example', 'Post Type General Name', 'textdomain'),
            'singular_name' => _x('Post Type', 'Post Type Singular Name', 'textdomain'),
            'menu_name' => __('CPT Example', 'textdomain'),
            'name_admin_bar' => __('Post Type', 'textdomain'),
            'archives' => __('Item Archives', 'textdomain'),
            'attributes' => __('Item Attributes', 'textdomain'),
            'parent_item_colon' => __('Parent Item:', 'textdomain'),
            'all_items' => __('All Items', 'textdomain'),
            'add_new_item' => __('Add New Item', 'textdomain'),
            'add_new' => __('Add New', 'textdomain'),
            'new_item' => __('New Item', 'textdomain'),
            'edit_item' => __('Edit Item', 'textdomain'),
            'update_item' => __('Update Item', 'textdomain'),
            'view_item' => __('View Item', 'textdomain'),
            'view_items' => __('View Items', 'textdomain'),
            'search_items' => __('Search Item', 'textdomain'),
            'not_found' => __('Not found', 'textdomain'),
            'not_found_in_trash' => __('Not found in Trash', 'textdomain'),
            'featured_image' => __('Featured Image', 'textdomain'),
            'set_featured_image' => __('Set featured image', 'textdomain'),
            'remove_featured_image' => __('Remove featured image', 'textdomain'),
            'use_featured_image' => __('Use as featured image', 'textdomain'),
            'insert_into_item' => __('Insert into item', 'textdomain'),
            'uploaded_to_this_item' => __('Uploaded to this item', 'textdomain'),
            'items_list' => __('Items list', 'textdomain'),
            'items_list_navigation' => __('Items list navigation', 'textdomain'),
            'filter_items_list' => __('Filter items list', 'textdomain'),
        ];
        $args = [
            'label' => __('Post Type', 'textdomain'),
            'description' => __('Post Type Description', 'textdomain'),
            'labels' => $labels,
            'taxonomies' => ['category', 'post_tag'],
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'capability_type' => 'post',
        ];
        register_post_type('my_cpt_name', $args);
    }

    /**
     * Constructor.
     * @example
     */
    public function __construct() {
        // var_dump($this);
        add_action('init', [$this, 'add_custom_post_type'], 0);
    }
}

CustomPostType::get_instance();
