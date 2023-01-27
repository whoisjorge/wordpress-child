<?php
namespace ThemeName;

use ThemeName\Core\Instance as ModuleInstance;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Registers Custom Post Types.
 *
 * @package ThemeName
 */
class CustomPostType extends ModuleInstance {
	public static function get_instance() {
		return parent::instance();
	}

	/**
	 * Functions
	 * @example
	 */
	public function add_custom_post_type() {
		// From: https://generatewp.com/post-type/
		$labels = array(
			'name'                  => _x( 'Custom Post Type Example', 'Post Type General Name', 'TextDomain' ),
			'singular_name'         => _x( 'Post Type', 'Post Type Singular Name', 'TextDomain' ),
			'menu_name'             => __( 'CPT Example', 'TextDomain' ),
			'name_admin_bar'        => __( 'Post Type', 'TextDomain' ),
			'archives'              => __( 'Item Archives', 'TextDomain' ),
			'attributes'            => __( 'Item Attributes', 'TextDomain' ),
			'parent_item_colon'     => __( 'Parent Item:', 'TextDomain' ),
			'all_items'             => __( 'All Items', 'TextDomain' ),
			'add_new_item'          => __( 'Add New Item', 'TextDomain' ),
			'add_new'               => __( 'Add New', 'TextDomain' ),
			'new_item'              => __( 'New Item', 'TextDomain' ),
			'edit_item'             => __( 'Edit Item', 'TextDomain' ),
			'update_item'           => __( 'Update Item', 'TextDomain' ),
			'view_item'             => __( 'View Item', 'TextDomain' ),
			'view_items'            => __( 'View Items', 'TextDomain' ),
			'search_items'          => __( 'Search Item', 'TextDomain' ),
			'not_found'             => __( 'Not found', 'TextDomain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'TextDomain' ),
			'featured_image'        => __( 'Featured Image', 'TextDomain' ),
			'set_featured_image'    => __( 'Set featured image', 'TextDomain' ),
			'remove_featured_image' => __( 'Remove featured image', 'TextDomain' ),
			'use_featured_image'    => __( 'Use as featured image', 'TextDomain' ),
			'insert_into_item'      => __( 'Insert into item', 'TextDomain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'TextDomain' ),
			'items_list'            => __( 'Items list', 'TextDomain' ),
			'items_list_navigation' => __( 'Items list navigation', 'TextDomain' ),
			'filter_items_list'     => __( 'Filter items list', 'TextDomain' ),
		);
		$args   = array(
			'label'               => __( 'Post Type', 'TextDomain' ),
			'description'         => __( 'Post Type Description', 'TextDomain' ),
			'labels'              => $labels,
			// 'supports' => false,
			'taxonomies'          => array( 'category', 'post_tag' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
		);
		register_post_type( 'my_cpt_name', $args );
	}

	/**
	 * Constructor.
	 * @example
	 */
	public function __construct() {
		// var_dump($this);
		add_action( 'init', array( $this, 'add_custom_post_type' ), 0 );
	}
}

CustomPostType::get_instance();
