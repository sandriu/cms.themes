<?php

/**
 * Override or insert variables into the html template.
 */
function cms_admin_preprocess_html(&$vars) {
  $theme_path = path_to_theme();
}

function cms_admin_theme($existing, $type, $theme, $path) {
    return array(
        'species_node_form' => array(
            'render element' => 'form',
            'template' => 'templates/forms/species/add',
            'path' => drupal_get_path('theme', 'cms_admin'),
        ),
    );
}
