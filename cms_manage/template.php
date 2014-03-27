<?php
/**
 * @file template.php
 */


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
