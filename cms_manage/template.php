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
