<?php

$include_file_names = [
    'post-types',
    'admin',
    'common',
    'actions',
    'wtb-helpers',
    'modules',
    'query-filters',
    'data-filters',
    'api',
    'ajax',
    'assets',
    'menus',
];

foreach ($include_file_names as $file_name) {
    require_once(__DIR__ . '/includes/' . $file_name . '.php');
}

