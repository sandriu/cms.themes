<?php

function cms_js_alter(&$javascript) {
	$javascript['misc/jquery.js']['data'] = drupal_get_path('theme', 'CMS_theme').'/js/jquery-1.8.0.min.js';
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
        'class' => 'nav nav-pills'
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
