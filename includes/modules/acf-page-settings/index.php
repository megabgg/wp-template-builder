<?php

/**
 * Add Site Settings Page
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Site settings',
        'menu_title' => 'Site settings',
        'menu_slug' => 'site-settings',
        'capability' => 'edit_posts',
        'position' => 79,
        'parent_slug' => '',
        'redirect' => false
    ));
}