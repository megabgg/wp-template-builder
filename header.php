<?php

$data = [
    'wp_head' => wtb_get_wp_head(),
    'home_url' => home_url(),
    'top_menu_items' => wtb_get_menu_items('menu-top'),
];

wtb_render_section('resources/views/components/header.view', $data);