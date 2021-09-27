<?php

wtb_render_template('resources/views/singles/single.view', function () {
    $post_id = get_the_id();
    $thumbnail_id = get_post_thumbnail_id($post_id);

    return [
        'post_id' => $post_id,
        'title' => get_the_title(),
        'content' => wtb_get_content($post_id),
        'date' => get_the_date('Y-m-d'),
        'thumbnail' => wtb_get_attachment($thumbnail_id, 'post-thumbnails'),
    ];
});