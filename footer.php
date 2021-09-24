<?php

$data = [
    'wp_footer' => wtb_get_wp_footer(),
    'footer_menu_items' => wtb_get_menu_items('menu-footer'),
];

wtb_render_section( 'resources/views/components/footer.view', $data  );