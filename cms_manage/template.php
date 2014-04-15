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
