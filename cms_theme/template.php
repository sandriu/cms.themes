<?php

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
        'cms_country_node_form' => array(
            'render element' => 'form',
            'template' => 'templates/forms/cms_country/add',
            'path' => drupal_get_path('theme', 'cms_theme'),
        ),
        'contacts_form' => array(
            'render element' => 'form',
            'template' => 'templates/forms/contacts/add',
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
    );
}

function cms_theme_js_alter(&$javascript) {
    $javascript['misc/jquery.js']['data'] = drupal_get_path('theme', 'cms_theme').'/js/jquery-1.8.0.min.js';
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

/**
 */
function check_display_field($object) {
    $ret = FALSE;
    $args = func_get_args();
    array_shift($args);
    foreach($args as $arg) {
        if (isset($object[$arg]['#items']) && (!empty($object[$arg]['#items']))) {
            if ((($object[$arg]['#field_type'] == 'field_collection') && (empty($object[$arg]['#items']))) ||
                (($object[$arg]['#field_type'] == 'date') && ($object[$arg]['#items'][0]['value'] == '1970-01-01T00:00:00')) ||
                (isset($object[$arg]['#items'][0]['value']) && (($object[$arg]['#items'][0]['value'] == "0")))) {
                return FALSE;
            }

            return TRUE;
        }
    }
}

function get_cms_types() {
    return array('species', 'cms_party', 'publication', 'legal_instrument', 'countries', 'cms_country', 'listing', 'decision', 'meeting', 'national_plan', 'national_report', 'project');
}

function show_add_button() {
    $type = arg(0);
    return in_array($type, get_cms_types()) && user_access(sprintf('create %s content', $type));
}

function is_current_page($menu_item) {
    if (current_path() == $menu_item['href']) {
        return true;
    }

    if ((arg(0) == 'node') && (is_numeric(arg(1)))) {
        $node = node_load(arg(1));
        $type = $node->type;
        $type_slug = CMSUtils::slug($type);
        $menu_item_slug = CMSUtils::slug(strtolower($menu_item['title']));
        if (($type_slug == $menu_item_slug) || (($type_slug . 's') == $menu_item_slug)) {
            return true;
        }
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
function cms_theme_process_format(&$element) {
    /**
     * Array of fields for which to hide the option
    */
    $fields = array(
        'field_textarea',
        'field_decision_summary',
        'field_nat_plan_remarks',
        'field_nat_report_remarks',
        'field_meeting_description',
        'comment_body',
        'body',
    );

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
                foreach ($instruments[$node->language] as $instrument) {
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

function render_simple_slot($name, $type, $data = array()) {
    $file = $type . DIRECTORY_SEPARATOR . $name . '.tpl.php';
    $template_path = drupal_get_path('theme', 'cms_theme') . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'slots' . DIRECTORY_SEPARATOR . $file;
    echo theme_render_template($template_path, array('data' => $data));
}

function render_family_tabs($tabs = array(), $type = '', $tabs_id = '', $field = '') {
    $file = $type . DIRECTORY_SEPARATOR . 'family-tabs.tpl.php';
    $template_path = drupal_get_path('theme', 'cms_theme') . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'slots' . DIRECTORY_SEPARATOR . $file;
    echo theme_render_template($template_path, array('tabs' => $tabs,
                                                     'tabs_id' => $tabs_id,
                                                     'field' => $field));
}
