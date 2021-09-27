<?php

wtb_render_template('resources/views/pages/404.view', function () {
    return [
        'title' => __('Error 404', 'wp-template-builder'),
        'text' => __('This page does not exist', 'wp-template-builder'),
        'home_link' => home_url()
    ];
});