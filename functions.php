<?php

$include_file_names = [
    'post-types',
    'actions',
    'ajax',
    'admin',
    'assets',
    'data-filters',
    'wtb-helpers',
    'menus',
    'api'
];

foreach ($include_file_names as $file_name) {
    require_once(__DIR__ . '/includes/' . $file_name . '.php');
}

