<?php

define('API_GOOGLE_KEY', 'YOUR-KEY');
$ver = '0.1';

add_action('acf/init', function () {
    acf_update_setting('google_api_key', API_GOOGLE_KEY);
});

wp_enqueue_script('google_api', "https://maps.googleapis.com/maps/api/js?key=" . API_GOOGLE_KEY, array());
wp_enqueue_script('map_js', get_template_directory_uri() . '/includes/modules/acf-map/js/map.js', array(), $ver, false);
wp_enqueue_style('map_style', get_template_directory_uri() . '/includes/modules/acf-map/css/style.css', array(), $ver, 'all');

