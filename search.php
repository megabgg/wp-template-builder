<?php

$data = [
    'title' => __('Search for: ', 'wp-template-builder') . get_query_var('s')
];

get_template_part('archive', '', $data);