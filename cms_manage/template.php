<?php
/**
 * @file template.php
 */


/**
 * Controls access to a node.
 *
 * @param $node
 *   Either a node object or the machine name of the content type on which to
 *   perform the access check.
 *
 * @return
 *   Nothing.
 */
function cms_manage_node_access($node) {
  if (user_is_anonymous()) {
    drupal_access_denied();
    drupal_exit();
  }
}


/**
 * Implements template_preprocess_views_view_table().
 *
 * @param $vars
 *   An associative array with generated variables.
 *
 * @return
 *   Nothing.
 */
function cms_manage_preprocess_views_view_table(&$vars) {
  $vars['classes_array'][] = 'table-bordered';
  $vars['classes_array'][] = 'table-hover';
  $vars['classes_array'][] = 'table-striped';
}


/**
 * Alters tabs and actions displayed on the page before they are rendered.
 *
 * @param $data
 *   An associative array containing actions and tabs.
 * @param $router_item
 *   The menu system router item of the page.
 * @param $root_path
 *   The path to the root item for this set of tabs.
 *
 * @return
 *   Nothing.
 */
function cms_manage_menu_local_tasks_alter(&$data, $router_item, $root_path) {
  switch ($root_path) {
    case 'legal_instrument/listing':
      $item = array (
        'access' => true,
        'href'   => 'legal_instrument/export',
        'title'  => t('Export CMS Instruments'),
      );

      if ($item['access']) {
        $data['actions']['output'][] = array(
          '#theme' => 'menu_local_action',
          '#link'  => $item
        );
      }

      break;
  }
}

/**
 * Alter the element type information returned from modules.
 *
 * @param $type
 *   All element type defaults as collected by hook_element_info().
 *
 * @return
 *   Nothing.
 */
function cms_manage_element_info_alter(&$type) {
  foreach ($type as &$element) {
    if (!empty($element['#input'])) {
      $element['#process'][] = '_cms_manage_process_input';
    }
  }
}

/**
 * Process input elements.
 */
function _cms_manage_process_input(&$element, &$form_state) {
  if ($element['#type'] == 'managed_file') {
    $key = array_search('form-control', $element['#attributes']['class']);

    unset($element['#attributes']['class'][$key]);
  }

  return $element;
}


/**
 * Overrides bootstrap_form_element_label().
 */
function cms_manage_form_element_label(&$variables) {
    $element = $variables['element'];

    // This is also used in the installer, pre-database setup.
    $t = get_t();

    // Determine if certain things should skip for checkbox or radio elements.
    $skip = (isset($element['#type']) && ('checkbox' === $element['#type'] || 'radio' === $element['#type']));

    // If title and required marker are both empty, output no label.
    if ((!isset($element['#title']) || $element['#title'] === '' && !$skip) && empty($element['#required'])) {
        return '';
    }

    // If the element is required, a required marker is appended to the label.
    $required = !empty($element['#required']) ? theme('form_required_marker', array('element' => $element)) : '';

    $title = filter_xss_admin($element['#title']);

    $attributes = array();

    // Style the label as class option to display inline with the element.
    if ($element['#title_display'] == 'after' && !$skip) {
        $attributes['class'][] = $element['#type'];
    }
    // Show label only to screen readers to avoid disruption in visual flows.
    elseif ($element['#title_display'] == 'invisible') {
        $attributes['class'][] = 'element-invisible';
    }

    if (isset($element['#label_attributes'])) {
        $attributes = array_merge($attributes, $element['#label_attributes']);
    }

    if (!empty($element['#id'])) {
        $attributes['for'] = $element['#id'];
    }

    // Insert radio and checkboxes inside label elements.
    $output = '';
    if (isset($variables['#children'])) {
        $output .= $variables['#children'];
    }

    // Append label.
    $output .= $t('!title !required', array('!title' => $title, '!required' => $required));

    // The leading whitespace helps visually separate fields from inline labels.
    return ' <label' . drupal_attributes($attributes) . '>' . $output . "</label>\n";
}


/**
 * Implements hook_preprocess_button(). Could be removed when the bug is fixed and theme updated
 * @see https://drupal.org/node/2176521
 */
function cms_manage_preprocess_button(&$vars) {
    if(($key = array_search('btn-success', $vars['element']['#attributes']['class'])) !== FALSE) {
        unset($vars['element']['#attributes']['class'][$key]);
    }
}
