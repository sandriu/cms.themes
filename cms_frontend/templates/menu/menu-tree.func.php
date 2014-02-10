<?php

/**
 * @file
 * menu-tree.func.php
 */

/**
 * Overrides theme_menu_tree().
 */
function cms_frontend_menu_tree(&$variables) {
    return '<div class="container"><ul class="global-menu menu nav navbar-nav">' . $variables['tree'] . '</ul></div>';
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
    return '<div class="container"><ul class="global-menu menu nav navbar-nav">' . $variables['tree'] . '</ul></div>';
}

/**
 * Bootstrap theme wrapper function for the footer menu links.
 */
function cms_frontend_menu_tree__menu_front_end_footer_menu(&$variables) {
    return '<ul class="menu nav">' . $variables['tree'] . '</ul>';
}

/**
 * Bootstrap theme wrapper function for the footer menu links.
 */
function cms_frontend_menu_tree__menu_footer_second_menu(&$variables) {
    return '<ul class="menu nav">' . $variables['tree'] . '</ul>';
}
