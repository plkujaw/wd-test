<?php
/**
 * Plugin Name: Import Plugin
 * Description: Wholegrain Starter plugin for developer test
 * Version: 0.1
 * Author: Wholegrain Digital
*/

// namespace WGD;

// class ImportPlugin
// {
//     public static function init(): void
//     {
//     }

//     // A function to register the post type and taxonomy
//     public static function register(): void
//     {
//     }
// }

// \WGD\ImportPlugin::init();

function register_wgd_locations()
{
    $labels = array(
        'name'                  => _x('WGD Locations', 'Post Type General Name', 'text_domain'),
        'singular_name'         => _x('WGD Location', 'Post Type Singular Name', 'text_domain'),
        'menu_name'             => __('WGD Locations', 'text_domain'),
        'name_admin_bar'        => __('WGD Locations', 'text_domain'),
        'archives'              => __('WGD Location Archives', 'text_domain'),
        'attributes'            => __('WGD Location Attributes', 'text_domain'),
        'parent_item_colon'     => __('Parent WGD Location:', 'text_domain'),
        'all_items'             => __('All WGD Locations', 'text_domain'),
        'add_new_item'          => __('Add New WGD Location', 'text_domain'),
        'add_new'               => __('Add New', 'text_domain'),
        'new_item'              => __('New WGD Location', 'text_domain'),
        'edit_item'             => __('Edit WGD Location', 'text_domain'),
        'update_item'           => __('Update WGD Location', 'text_domain'),
        'view_item'             => __('View WGD Location', 'text_domain'),
        'view_items'            => __('View WGD Locations', 'text_domain'),
        'search_items'          => __('Search WGD Location', 'text_domain'),
        'not_found'             => __('Not found', 'text_domain'),
        'not_found_in_trash'    => __('Not found in Trash', 'text_domain'),
        'featured_image'        => __('Featured Image', 'text_domain'),
        'set_featured_image'    => __('Set featured image', 'text_domain'),
        'remove_featured_image' => __('Remove featured image', 'text_domain'),
        'use_featured_image'    => __('Use as featured image', 'text_domain'),
        'insert_into_item'      => __('Insert into WGD Location', 'text_domain'),
        'uploaded_to_this_item' => __('Uploaded to this WGD Location', 'text_domain'),
        'items_list'            => __('WGD Locations list', 'text_domain'),
        'items_list_navigation' => __('WGD Locations list navigation', 'text_domain'),
        'filter_items_list'     => __('Filter WGD Locations list', 'text_domain'),
    );
    $args = array(
        'label'                 => __('WGD Location', 'text_domain'),
        'description'           => __('WGD Location', 'text_domain'),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'show_in_rest'          => true,
        'rewrite'               => array( 'slug' => 'locations' ),
        'menu_icon'             => 'dashicons-location',

    );
    register_post_type('wgd-locations', $args);
}
add_action('init', 'register_wgd_locations');


function register_wgd_category()
{
    $labels = array(
        'name'              => _x('WGD Categories', 'taxonomy general name'),
        'singular_name'     => _x('WGD Category', 'taxonomy singular name'),
        'search_items'      => __('Search WGD Categories'),
        'all_items'         => __('All WGD Categories'),
        'parent_item'       => __('Parent WGD Category'),
        'parent_item_colon' => __('Parent WGD Category:'),
        'edit_item'         => __('Edit WGD Category'),
        'update_item'       => __('Update WGD Category'),
        'add_new_item'      => __('Add New WGD Category'),
        'new_item_name'     => __('New WGD Category Name'),
        'menu_name'         => __('WGD Categories'),
    );
    $args   = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'wgd-category' ),
        'public'            => false,
        'show_in_rest'      => true,
     );
    register_taxonomy('wgd-category', [ 'wgd-locations' ], $args);
}
add_action('init', 'register_wgd_category');


/**
 * Activate the plugin.
 */
function importplugin_activate()
{
    register_wgd_locations();
    register_wgd_category();
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'importplugin_activate');

/**
 * Deactivation hook.
 */
function importplugin_deactivate()
{
    unregister_post_type('wgd-locations');
    unregister_taxonomy('wgd-category');
    flush_rewrite_rules();
}
register_deactivation_hook(__FILE__, 'importplugin__deactivate');
