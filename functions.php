<?php

$include_file_names = [
    'admin',
    'actions',
    'wtb-helpers',
    'modules',
    'post-types',
    'data-filters',
    'api',
    'ajax',
    'assets',
    'menus',
];

foreach ($include_file_names as $file_name) {
    require_once(__DIR__ . '/includes/' . $file_name . '.php');
}

