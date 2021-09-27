<?php

function acf_flexible_render($path_to_components, $sections)
{
    if (is_array($sections)) {
        foreach ($sections as $section_data) {
            $template_name = $section_data['acf_fc_layout'];
            unset($section_data['acf_fc_layout']);
            wtb_render_section($path_to_components . '/' . $template_name, $section_data);
        }
    }
}
