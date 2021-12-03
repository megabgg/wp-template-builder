<?php

/**
 * Rendering html template
 */
function wtb_render_template($path, $data, $header_template = '', $footer_template='')
{
    get_header($header_template);
    wtb_render_section($path, $data());
    get_footer($footer_template);
}

/**
 * Rendering html section
 */
function wtb_render_section($path, $data)
{

    do_action( 'wtb_rendering_section', $path, $data );

    if (defined('WTB_MODE')) {
        if (constant("WTB_MODE") == 'NO_VIEW') {
            echo $path;
            dd($data, true);
        }
    } else {
        get_template_part($path, '', $data);
    }
}

/**
 * Getting wp_head
 * @return string
 */
function wtb_get_wp_head()
{
    ob_start();
    wp_head();
    return ob_get_clean();
}

/**
 * Getting wp_footer
 * @return string
 */
function wtb_get_wp_footer()
{
    ob_start();
    wp_footer();
    return ob_get_clean();
}

/**
 * Debug function
 */
function dd($data, $no_exit = false)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    if (!$no_exit)
        exit;
}

/**
 * Getting menu items
 * @return array
 */
function wtb_get_menu_items($location, $args = [])
{
    $locations = get_nav_menu_locations();
    if (!array_key_exists($location, $locations)) {
        return [];
    }
    $object = wp_get_nav_menu_object($locations[$location]);
    $menu_items = wp_get_nav_menu_items($object->name, $args);
    if (is_array($menu_items)) {
        $result = array_map(function ($menu_item) {
            return [
                'id' => $menu_item->object_id,
                'active' => $menu_item->object_id == get_queried_object_id(),
                'title' => $menu_item->title,
                'url' => $menu_item->url,
            ];
        }, $menu_items);
    }
    return $result;
}


/**
 * Getting media item
 * @return array
 */
function wtb_get_attachment($attachment_id, $size = 'large')
{
    if (!$attachment_id)
        return [];
    return [
        'url' => wp_get_attachment_image_url($attachment_id, $size),
        'srcset' => wp_get_attachment_image_srcset($attachment_id, $size),
        'sizes' => wp_get_attachment_image_sizes($attachment_id, $size),
        'alt' => get_post_meta($attachment_id, '_wp_attachment_image_alt', true)
    ];
}

/**
 * Getting media item
 * @return string
 */
function wtb_get_content()
{
    $content = get_the_content();
    $content = apply_filters('the_content', $content);
    return str_replace(']]>', ']]>', $content);
}

/**
 * Get number max pages for taxonomies template
 * @return integer
 */
function wtb_get_max_pages()
{
    global $wp_query;
    return $wp_query->max_num_pages;
}

/**
 * Get current number page for taxonomies template
 * @return integer
 */
function wtb_get_current_num_page()
{
    $current_page = get_query_var('paged');
    return $current_page == 0 ? 1 : $current_page;
}

/**
 * Get paginate links
 * @return array
 */
function wtb_get_paginate_links()
{
    $paginate_raw = paginate_links(array(
        'prev_text' => __('prev'),
        'next_text' => __('next'),
        'type' => 'array'
    ));

    if(!is_array($paginate_raw)){
        return [];
    }

    return array_map(function ($item) {
        $url = preg_match('/href="(.+)"/', $item, $match) ? $match[1] : '';
        $anchor = preg_match('/<([\w]+)[^>]*>(.*?)<\/\1>/', $item, $match) ? $match[2] : '';
        return [
            'anchor' => $anchor,
            'url' => $url
        ];
    }, $paginate_raw);
}

/**
 * Get pagination link in post
 * @param string(previous|next)
 * @return array
 */
function wtb_get_pagination_in_post($mode)
{
    if (!in_array($mode, ['previous', 'next']))
        return;

    $page = $mode === 'previous' ? get_previous_post() : get_next_post();
    if (is_object($page) && !empty($page->ID)) {
        return [
            'url' => get_the_permalink($page->ID),
            'title' => get_the_title($page->ID)
        ];
    }
    return;
}
