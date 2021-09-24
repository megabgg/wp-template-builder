<?php

/**
 * Adding assets
 */
add_action('wp_enqueue_scripts', function () {
    $ver = 0001;
    wp_enqueue_style('style', get_template_directory_uri() . '/resources/static/css/main.css', array(), $ver, 'all');
    wp_enqueue_script('ui', get_template_directory_uri() . '/resources/static/js/main.js', array(), $ver, false);
});