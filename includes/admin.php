<?php

/**
 * Removing custom customizer sections
 */
add_action('customize_register', function ($wp_customize) {
    $wp_customize->remove_section('title_tagline');
    $wp_customize->remove_section('colors');
    $wp_customize->remove_section('header_image');
    $wp_customize->remove_section('background_image');
    $wp_customize->remove_panel('nav_menus');
    $wp_customize->remove_section('static_front_page');
    $wp_customize->remove_section('custom_css');
}, 50);


/**
 * Hiding unused partitions
 */
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
    remove_menu_page('tools.php');
});

/**
 * Disabling admin bar
 */
add_filter('show_admin_bar', '__return_false');

/**
 * Adding thumbnails in post
 */
add_theme_support('post-thumbnails', array('post','page'));