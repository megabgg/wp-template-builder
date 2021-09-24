<?php
get_header();

$data = [
    'title' => __('Error 404', 'wp-template-builder'),
    'text' => __('This page does not exist', 'wp-template-builder'),
    'home_link' => home_url()
];

wtb_render_section('resources/views/pages/404.view', $data);

get_footer();