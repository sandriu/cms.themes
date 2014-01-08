<?php
/**
 * @file
 * menu-tree.func.php
 */

/**
 * Overrides theme_menu_tree().
 */
function cms_frontend_menu_tree(&$variables) {
  return '<ul class="menu nav">' . $variables['tree'] . '</ul>';
}

/*
 * Contact menu link in blocks
 */
function cms_frontend_menu_tree__menu_contact(&$variables) {
  return $variables['tree'];
}

/**
 * Bootstrap theme wrapper function for the primary menu links.
 */
function cms_frontend_menu_tree__menu_frontend_main_menu(&$variables) {
  return '<div class="container"><ul class="menu nav navbar-nav">' . $variables['tree'] . '</ul></div>';
}

/**
 * Bootstrap theme wrapper function for the secondary menu links.
 */
function cms_frontend_menu_tree__secondary(&$variables) {
  return '<ul class="menu nav navbar-nav secondary">' . $variables['tree'] . '</ul>';
}
