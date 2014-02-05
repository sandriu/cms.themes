<?php

/**
 * We deny access to anonymous users to anything displayed by this theme (which is stands for administration purposes)
 * The reason we implement this in theme is because anonymous are allowed to see content in other front-end themes
 * @param $node Drupal node
 * @return null
 * @see http://api.drupal.org/api/drupal/modules!node!node.api.php/function/hook_node_access/7
 */
function cms_theme_node_access($node) {
    // Ref: http://www.andypangus.com/drupal-7-simple-content-type-permission-and-access
    if(user_is_anonymous()) {
        drupal_access_denied();
        drupal_exit();
    }
}


include_once(drupal_get_path('theme', 'cms_theme') . '/includes/modules/date.inc');

function CMS_theme_theme() {
    return array(
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
        'legal_instrument_node_form' => array(
            'render element' => 'form',
            'template' => 'templates/forms/legal_instrument/add',
            'path' => drupal_get_path('theme', 'cms_theme'),
        ),
        'country_node_form' => array(
            'render element' => 'form',
            'template' => 'templates/forms/country/add',
            'path' => drupal_get_path('theme', 'cms_theme'),
        ),
        'contacts_form' => array(
            'render element' => 'form',
            'template' => 'templates/forms/contacts/add',
            'path' => drupal_get_path('theme', 'cms_theme'),
        ),
        'organization_form' => array(
            'render element' => 'form',
            'template' => 'templates/forms/contacts/organizations/add',
            'path' => drupal_get_path('theme', 'cms_theme'),
        ),
        'decision_node_form' => array(
            'render element' => 'form',
            'template' => 'templates/forms/decision/add',
            'path' => drupal_get_path('theme', 'cms_theme'),
        ),
        'national_plan_node_form' => array(
            'render element' => 'form',
            'template' => 'templates/forms/national_plan/add',
            'path' => drupal_get_path('theme', 'cms_theme'),
        ),
        'national_report_node_form' => array(
            'render element' => 'form',
            'template' => 'templates/forms/national_report/add',
            'path' => drupal_get_path('theme', 'cms_theme'),
        ),
        'meeting_node_form' => array(
            'render element' => 'form',
            'template' => 'templates/forms/meeting/add',
            'path' => drupal_get_path('theme', 'cms_theme'),
        ),
        'document_node_form' => array(
            'render element' => 'form',
            'template' => 'templates/forms/document/add',
            'path' => drupal_get_path('theme', 'cms_theme'),
        ),
        'project_node_form' => array(
            'render element' => 'form',
            'template' => 'templates/forms/project/add',
            'path' => drupal_get_path('theme', 'cms_theme'),
        ),
        'working_group_node_form' => array(
            'render element' => 'form',
            'template' => 'templates/forms/working_group/add',
            'path' => drupal_get_path('theme', 'cms_theme'),
        ),
    );
}

function cms_theme_js_alter(&$javascript) {
    #$javascript['misc/jquery.js']['data'] = drupal_get_path('theme', 'cms_theme').'/js/jquery-1.8.0.min.js';
    if(array_key_exists('misc/jquery.form.js', $javascript)) {
        $javascript['misc/jquery.form.js']['data'] = drupal_get_path('theme', 'cms_theme').'/js/jquery.form.js';
    }
}

function cms_theme_menu_link(&$variables) {
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
function cms_theme_preprocess_page(&$variables) {
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
function cms_theme_preprocess_region(&$variables, $hook) {
    if ($variables['region'] == 'content') {
        $variables['theme_hook_suggestions'][] = 'region__no_wrapper';
    }
    // Me likes
    if($variables['region'] == "sidebar_first")
        unset ($variables['classes_array'][2]); // Remove 'well' coming from twitter_bootstrap
}

function cms_theme_breadcrumb($variables) {
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

function cms_theme_preprocess_twitter_bootstrap_btn_dropdown(&$variables) {
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

function cms_theme_twitter_bootstrap_btn_dropdown($variables) {
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
 * Function copied from twitter_bootstrap theme - includes/modules/form.inc
 * Added 'form-item' class to fields to solve front-end bug - not showing edit summary button on body field
 *    - the js that handles the button is using 'form-item' class to position the edit/hide summary link
 *    - the class needs to be on container div of summary and also on container div of body
 *
 * @param $variables
 *
 * @return string
 */

function cms_theme_form_element(&$variables) {
    $element = &$variables['element'];
    // This is also used in the installer, pre-database setup.
    $t = get_t();

    // This function is invoked as theme wrapper, but the rendered form element
    // may not necessarily have been processed by form_builder().
    $element += array(
        '#title_display' => 'before',
    );

    // Add element #id for #type 'item'.
    if (isset($element['#markup']) && !empty($element['#id'])) {
        $attributes['id'] = $element['#id'];
    }

    // Add bootstrap class
    $attributes['class'] = array('control-group');

    // Check for errors and set correct error class
    if (isset($element['#parents']) && form_get_error($element)) {
        $attributes['class'][] = 'error';
    }

    if (!empty($element['#type'])) {
        $attributes['class'][] = 'form-type-' . strtr($element['#type'], '_', '-');
    }
    if (!empty($element['#name'])) {
        $attributes['class'][] = 'form-item form-item-' . strtr($element['#name'], array(' ' => '-', '_' => '-', '[' => '-', ']' => ''));
    }
    // Add a class for disabled elements to facilitate cross-browser styling.
    if (!empty($element['#attributes']['disabled'])) {
        $attributes['class'][] = 'form-disabled';
    }
    $output = '<div' . drupal_attributes($attributes) . '>' . "\n";

    // If #title is not set, we don't display any label or required marker.
    if (!isset($element['#title'])) {
        $element['#title_display'] = 'none';
    }
    $prefix = isset($element['#field_prefix']) ? '<span class="field-prefix">' . $element['#field_prefix'] . '</span> ' : '';
    $suffix = isset($element['#field_suffix']) ? ' <span class="field-suffix">' . $element['#field_suffix'] . '</span>' : '';

    switch ($element['#title_display']) {
        case 'before':
        case 'invisible':
            $output .= ' ' . theme('form_element_label', $variables);
            $output .= '<div class="controls">';
            $output .= ' ' . $prefix . $element['#children'] . $suffix . "\n";
            break;

        case 'after':
            $output .= '<div class="controls">';
            $variables['#children'] = ' ' . $prefix . $element['#children'] . $suffix;
            $output .= ' ' . theme('form_element_label', $variables) . "\n";
            break;

        case 'none':
        case 'attribute':
            // Output no label and no required marker, only the children.
            $output .= '<div class="controls">';
            $output .= ' ' . $prefix . $element['#children'] . $suffix . "\n";
            break;
    }

    if ( !empty($element['#description']) ) {
        $output .= '<p class="help-block">' . $element['#description'] . "</p>\n";
    }

    $output .= "</div></div>\n";

    return $output;
}

/**
 * Hide Text formats option from Text with summary fields
*/
function cms_theme_process_format(&$element) {
    /**
     * Array of fields for which to hide the option
    */
    $fields = array();

    $element = filter_process_format($element);

    /**
     * Hide the 'Text format' pane below certain text area fields
    */
    if (isset($element['#field_name']) && in_array($element['#field_name'], $fields)){
        $element['format']['format']['#default_value'] = 'full_html';
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

function cms_theme_form_required_marker() {
    $t = get_t();
    $attributes = array(
      'class' => 'form-required required-label',
      'title' => $t('This field is required.'),
    );
    return '<span' . drupal_attributes($attributes) . '>*</span>';
}



/**
 * Returns HTML for an individual form element.
 *
 * Combine multiple values into a table with drag-n-drop reordering.
 * TODO : convert to a template.
 *
 * @param $variables
 *   An associative array containing:
 *   - element: A render element representing the form element.
 *
 * @ingroup themeable
 */
function cms_theme_field_multiple_value_form($variables) {
    $element = $variables['element'];
    $output = '';
    if ($element['#cardinality'] > 1 || $element['#cardinality'] == FIELD_CARDINALITY_UNLIMITED) {
        $table_id = drupal_html_id($element['#field_name'] . '_values');
        $order_class = $element['#field_name'] . '-delta-order';
        $required = !empty($element['#required']) ? theme('form_required_marker', $variables) : '';

        $header = array(
            array(
                'data' => '<label>' . t('!title !required', array('!title' => $element['#title'], '!required' => $required)) . "</label>",
                'colspan' => 2,
                'class' => array('field-label'),
            )
        );
        $rows = array();

        // Sort items according to '_weight' (needed when the form comes back after
        // preview or failed validation)
        $items = array();
        foreach (element_children($element) as $key) {
            if ($key === 'add_more') {
                $add_more_button = &$element[$key];
            }else {
                $items[] = &$element[$key];
            }
        }
        usort($items, '_field_sort_items_value_helper');

        // Add the items as table rows.
        foreach ($items as $key => $item) {
            $item['_weight']['#attributes']['class'] = array($order_class);
            $delta_element = drupal_render($item['_weight']);
            $cells = array(
                array('data' => '', 'class' => array('field-multiple-drag')),
                drupal_render($item),
            );
            $rows[] = array(
                'data' => $cells,
            );
        }

        $output = '<div class="form-item">';
        $output .= theme('table', array('header' => $header, 'rows' => $rows, 'attributes' => array('id' => $table_id, 'class' => array('field-multiple-table'))));
        $output .= $element['#description'] ? '<div class="description">' . $element['#description'] . '</div>' : '';
        $output .= '<div class="clearfix">' . drupal_render($add_more_button) . '</div>';
        $output .= '</div>';

        drupal_add_tabledrag($table_id, 'order', 'sibling', $order_class);
    }else {
        foreach (element_children($element) as $key) {
            $output .= drupal_render($element[$key]);
        }
    }

    return $output;
}
