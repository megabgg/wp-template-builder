<?php
get_header();

$post_id = get_the_id();
$thumbnail_id = get_post_thumbnail_id($post_id);

$data = [
    'post_id' => $post_id,
    'title' => get_the_title($post_id),
    'content' => wtb_get_content($post_id),
    'date' => get_the_date('Y-m-d'),
    'thumbnail' => wtb_get_attachment($thumbnail_id),
];

wtb_render_section('resources/views/singles/single.view', $data);

get_footer();