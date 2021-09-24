<?php

/**
 * Adding menu
 */
add_action('after_setup_theme', function () {
    register_nav_menus(array(
        'menu-top' => __('Top menu', 'wp-template-builder'),
    ));
});

add_action('after_setup_theme', function () {
    register_nav_menus(array(
        'menu-footer' => __('Footer menu', 'wp-template-builder'),
    ));
});

