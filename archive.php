<?php

wtb_render_template('resources/views/taxonomies/archive', function () {
    $title = !empty($args['title']) ? $args['title'] : single_cat_title('', 0);
    $all_posts = [];
    if (have_posts()) :
        while (have_posts()) :
            the_post();
            $post_id = get_the_id();
            $thumbnail_id = get_post_thumbnail_id($post_id);
            $all_posts[] = [
                'title' => get_the_title(),
                'link' => get_the_permalink(),
                'date' => get_the_date('d M Y'),
                'thumbnail' => wtb_get_attachment($thumbnail_id),
            ];
        endwhile;
    endif;

    return [
        'title' => $title,
        'posts' => $all_posts,
        'pagination' => wtb_get_paginate_links()
    ];
});