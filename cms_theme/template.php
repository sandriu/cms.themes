<?php

function CMS_theme_theme() {
    return array(
        'twitter_bootstrap_links' => array(
            'variables' => array('links' => array(), 'attributes' => array(), 'heading' => NULL),
        ),
        'twitter_bootstrap_btn_dropdown' => array(
            'variables' => array('links' => array(), 'attributes' => array(), 'type' => NULL),
        ),
        'species_node_form' => array(
            'render element' => 'form',
            'template' => 'templates/forms/species/add',
            'path' => drupal_get_path('theme', 'cms_theme'),
        ),
        'publication_node_form' => array(
            'render element' => 'form',
            'template' => 'templates/forms/publications/add',
            'path' => drupal_get_path('theme', 'cms_theme'),
        ),
    );
}

function CMS_theme_js_alter(&$javascript) {
        $javascript['misc/jquery.js']['data'] = drupal_get_path('theme', 'CMS_theme').'/js/jquery-1.8.0.min.js';
}

function CMS_theme_menu_link(&$variables) {
    $element = $variables['element'];
    $sub_menu = '';
    if ($element['#below']) {
      $sub_menu = drupal_render($element['#below']);
    }
    $output = l($element['#title'], $element['#href'], $element['#localized_options']);
    return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>ssss\n";
}

/**
 * Preprocess variables for page.tpl.php
 *
 * @see page.tpl.php
 */
function CMS_theme_preprocess_page(&$variables) {
    // Add information about the number of sidebars.
    if (!empty($variables['page']['sidebar_first']) && !empty($variables['page']['sidebar_second'])) {
        $variables['columns'] = 3;
    }
    elseif (!empty($variables['page']['sidebar_first'])) {
        $variables['columns'] = 2;
    }
    elseif (!empty($variables['page']['sidebar_second'])) {
        $variables['columns'] = 2;
    }
    else {
        $variables['columns'] = 1;
    }

    // Primary nav
    $variables['primary_nav'] = FALSE;
    if($variables['main_menu']) {
        // Build links
        $tree = menu_tree_page_data(variable_get('menu_main_links_source', 'main-menu'));
        $variables['main_menu'] = twitter_bootstrap_menu_navigation_links($tree);
      
        // Build list
        $variables['primary_nav'] = theme('twitter_bootstrap_links', array(
            'links' => $variables['main_menu'],
            'attributes' => array(
                'class' => 'nav',
                'label' => 'Nav',
            ),
        ));
    }

    // Secondary nav
    $variables['secondary_nav'] = FALSE;
    if($variables['secondary_menu']) {
        $secondary_menu = menu_load(variable_get('menu_secondary_links_source', 'user-menu'));

        // Build links
        $tree = menu_tree_page_data($secondary_menu['menu_name']);
        $variables['secondary_menu'] = twitter_bootstrap_menu_navigation_links($tree);
        
        // Build list
        $variables['secondary_nav'] = theme('twitter_bootstrap_btn_dropdown', array(
            'links' => $variables['secondary_menu'],
            'label' => $secondary_menu['title'],
            'type' => 'success',
            'attributes' => array(
                'id' => 'user-menu',
                'class' => array('pull-right'),
            ),
        ));
    }
    // Replace tabs with dropw down version
    $variables['tabs']['#primary'] = _twitter_bootstrap_local_tasks($variables['tabs']['#primary']);
}

function cms_theme_preprocess_taxonomy_term(&$variables) {
    if ($variables['vocabulary_machine_name'] == 'languages') {
        $variables['theme_hook_suggestions'][] = 'taxonomy_term__languages';
    }
}

/**
 * Preprocess variables for region.tpl.php
 *
 * @see region.tpl.php
 */
function CMS_theme_preprocess_region(&$variables, $hook) {
    if ($variables['region'] == 'content') {
        $variables['theme_hook_suggestions'][] = 'region__no_wrapper';
    }
    // Me likes
    if($variables['region'] == "sidebar_first")
        unset ($variables['classes_array'][2]); // Remove 'well' coming from twitter_bootstrap
}

function CMS_theme_breadcrumb($variables) {
    $breadcrumb = $variables['breadcrumb'];

    $breadcrumbs = '<ul class="breadcrumb">';
    $breadcrumbs .= '<li>' . t('You are here') . ':&nbsp;</li>';

    $current_page_title = drupal_get_title();

    $count = count($breadcrumb) - 1;
    if ($count >= 0) {
        $section = strip_tags($breadcrumb[$count]);

        if (($current_page_title == $section) && (count(arg())) && (arg(0) == 'family')) {
            $current_page_title = t('Family display');
        }
    }
    

    foreach($breadcrumb as $key => $value) {
        if($count != $key) {
          $breadcrumbs .= '<li>'.$value.' <span class="divider">/</span></li>';
        } else {
          $breadcrumbs .= '<li>'.$value.'</li>';
        }
    }

    if (count($breadcrumb)) {
        $breadcrumbs .= '<li class="active"><span class="divider">/</span>' . $current_page_title;
    }else {
        $breadcrumbs .= '<li class="active">' . $current_page_title;
    }

    $breadcrumbs .= '</li>';
    $breadcrumbs .= '</ul>';

    return $breadcrumbs;
}

function CMS_theme_preprocess_twitter_bootstrap_btn_dropdown(&$variables) {
  /**
   * Remove class added by Twitter Bootstrap theme and set our own classes
  */
    unset($variables['attributes']['class']);
    $variables['attributes']['class'][] = 'nav pull-right';

    if(is_array($variables['links'])) {
        $variables['links'] = theme('links', array(
            'links' => $variables['links'],
            'attributes' => array(
                'class' => array('dropdown-menu'),
            ),
        ));
    }
}

function CMS_theme_twitter_bootstrap_btn_dropdown($variables) {
    $output = '<ul '. drupal_attributes($variables['attributes']) .'><li class="dropdown">';
    if(is_array($variables['label'])) {
        $output .= l($variables['label']['title'], $$variables['label']['href'], $variables['label']);
    }

    $output .= '<a class="dropdown-toggle" data-toggle="dropdown" href="#">';

    if(is_string($variables['label'])) {
        $output .= check_plain($variables['label']);
    }

    $output .= '
    <b class="caret"></b>
          </a>
          ' . $variables['links'] . '
    </li></ul>';

    return $output;
}

/**
 */
function check_display_field($object) {
    
    $ret = FALSE;
    $args = func_get_args();
    array_shift($args);
    foreach($args as $arg) {
        if(!empty($object[$arg]['#items'])) {
            return TRUE;
        }
    }
}

function get_cms_types() {
    return array('species', 'parties', 'publication', 'listing');
}

function show_add_button() {
    $types = get_cms_types();
    return in_array(arg(0), $types) && in_array(arg(1), $types) && user_access(sprintf('add %s', arg(0)));
}

function is_current_page($menu_item) {
    if ((arg(0) == 'node') && (is_numeric(arg(1)))) {
        $node = node_load(arg(1));
        $type = $node->type;
    }

    if ((current_path() == $menu_item['href']) ||
        ((isset($type)) && $type == strtolower($menu_item['title']))) {
        return true;
    }

    return false;
}

function cms_theme_filter_tips_more_info() {
    return '';
}

function cms_theme_element_info_alter(&$type) {
    if (isset($type['text_format']['#process'])) {
        foreach ($type['text_format']['#process'] as &$callback) {
            if ($callback === 'filter_process_format') {
                $callback = 'cms_theme_process_format';
            }
        }
    }
}

/**
 * Hide Text formats option from Text with summary fields
*/
function cms_theme_process_format($element) {
    /**
     * Array of fields for which to hide the option
    */
    $fields = array(
        'field_textarea',
        'comment_body',
        'body',
    );

    $element = filter_process_format($element);

    /**
     * Hide the 'Text format' pane below certain text area fields
    */ 
    if (isset($element['#field_name']) && in_array($element['#field_name'], $fields)){
            $element['format']['#access'] = FALSE;
    }

    return $element;
}

/**
 * Hide help texts for File/Image fields
*/
function cms_theme_file_upload_help(&$variables) {
    return '';
}

/**
 * Override how date fields are displayed
*/
function cms_theme_date_combo($variables) {
    $element = $variables['element'];
    $field = field_info_field($element['#field_name']);
    $instance = field_info_instance($element['#entity_type'], $element['#field_name'], $element['#bundle']);
   
    // Group start/end items together in fieldset.
    $fieldset = array(
      '#title' => '',
      '#value' => '',
      '#description' => '',
      '#attributes' => array(),
      '#children' => $element['#children'],
    );
    return theme('form_element', array('element' => $fieldset));
}

/**
 * 
*/
function get_available_tabs($node = NULL, $content_type = '') {
    $tabs = array(
        'current' => array(),
        'available' => array()
    );
    $websites = CMSUtils::get_all_websites();
    $current_profile = CMSUtils::get_current_profile();
    $tabs['current'] = $current_profile;

    if ($node != NULL) {
        switch ($content_type) {
            case 'species':
                $instruments = $node->field_species_instruments;
                foreach ($instruments[LANGUAGE_NONE] as $instrument) {
                    $species_instrument = entity_load('node', array($instrument['target_id']));
                    $instrument_title = strtolower($species_instrument[$instrument['target_id']]->title);
                    if (($instrument_title != $current_profile) && (in_array($instrument_title, array_keys($websites)))) {
                        $tabs['available'][$instrument_title] = $websites[$instrument_title];
                    }
                }
        }
    }

    return $tabs;
}

/**
 * Render a speciefied slot
 *
 * @param       $node       object
 * @param       $name       string
 * @param       $type       string
 * @param       $content    array
 *
 * @return      string
*/
function render_slot($node, $name, $type, $content = array()) {
    $file = $type . DIRECTORY_SEPARATOR . $name . '.tpl.php';
    $template_path = drupal_get_path('theme', 'cms_theme') . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'slots' . DIRECTORY_SEPARATOR . $file;
    echo theme_render_template($template_path, array('node' => $node,
                                                     'nid' => $node->nid,
                                                     'content' => $content));
}

function render_family_tabs($tabs = array(), $type = '', $tabs_id = '', $field = '') {
    $file = $type . DIRECTORY_SEPARATOR . 'family-tabs.tpl.php';
    $template_path = drupal_get_path('theme', 'cms_theme') . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'slots' . DIRECTORY_SEPARATOR . $file;
    echo theme_render_template($template_path, array('tabs' => $tabs,
                                                     'tabs_id' => $tabs_id,
                                                     'field' => $field));
}