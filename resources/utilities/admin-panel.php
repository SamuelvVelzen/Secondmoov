<?php

// Add option pages (ACF)
if( function_exists('acf_add_options_page') ) {

    // add parent
    $parent = acf_add_options_page(array(
        'page_title' 	=> 'Modern',
        'menu_title' 	=> 'Modern',
        'menu_slug' 	=> 'modern',
        'icon_url'    => 'dashicons-admin-generic',
        'position'    => 4,
        'redirect' 		=> true
    ));

    // add sub page
    acf_add_options_sub_page(array(
        'page_title' 	=> 'Menu',
        'menu_title' 	=> 'Menu',
        'menu_slug' 	=> 'menu',
        'parent_slug' => $parent['menu_slug'],
    ));

    // add sub page
    acf_add_options_sub_page(array(
        'page_title' 	=> 'Footer',
        'menu_title' 	=> 'Footer',
        'menu_slug' 	=> 'footer',
        'parent_slug' => $parent['menu_slug'],
    ));

    // add sub page
    acf_add_options_sub_page(array(
        'page_title' 	=> 'Sidebar',
        'menu_title' 	=> 'Sidebar',
        'menu_slug' 	=> 'sidebar',
        'parent_slug' => $parent['menu_slug'],
    ));
}

// Hide ACF 'extra fields' in dashboard
add_action('admin_menu', function() {
// List of users that don't have pages removed
    $admins = [
        'samuel',
    ];
    $current_user = wp_get_current_user();
    if (!in_array($current_user->user_login, $admins)) {
        remove_menu_page('edit.php?post_type=acf-field-group');
    }
}, PHP_INT_MAX);