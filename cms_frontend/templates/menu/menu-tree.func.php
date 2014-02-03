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
 * Bootstrap theme wrapper function for the secondary menu links.
 */
function cms_frontend_menu_tree__menu_frontend_main_menu_secondary(&$variables) {
    return '<ul class="menu nav navbar-nav secondary">' . $variables['tree'] . '</ul>';
}

/**
 * Bootstrap theme wrapper function for the tertiary menu links.
 */
function cms_frontend_menu_tree__menu_frontend_main_menu_tertiary(&$variables) {
    return '<ul class="menu nav navbar-nav tertiary">' . $variables['tree'] . '</ul>';
}

/**
 * Bootstrap theme wrapper function for the footer menu links.
 */
function cms_frontend_menu_tree__menu_front_end_footer_menu(&$variables) {
    return '<ul class="menu nav">' . $variables['tree'] . '</ul>';
}

/**
 * The following functions are for main menu of each subdomains -
 * @TODO  #1937 Find another solution to this
 * We have to wrap the ul in div container for each menu
 */

function cms_frontend_menu_tree__ced1dc170d91974f510d0854404157ae(&$variables) {
    return '<div class="container"><ul class="global-menu menu nav navbar-nav">' . $variables['tree'] . '</ul></div>';
}

function cms_frontend_menu_tree__0369aa5450cb8ba4bebad3a1b9e5b29b(&$variables) {
    return '<div class="container"><ul class="global-menu menu nav navbar-nav">' . $variables['tree'] . '</ul></div>';
}
function cms_frontend_menu_tree__9091b49e70c7736f15a93814aa4bc5b6(&$variables) {
    return '<div class="container"><ul class="global-menu menu nav navbar-nav">' . $variables['tree'] . '</ul></div>';
}

function cms_frontend_menu_tree__810f12118bc3b060d5e1bf8c18c7725f(&$variables) {
    return '<div class="container"><ul class="global-menu menu nav navbar-nav">' . $variables['tree'] . '</ul></div>';
}

function cms_frontend_menu_tree__43fb94ddc22cdd56df9b88ab10fbe9ef(&$variables) {
    return '<div class="container"><ul class="global-menu menu nav navbar-nav">' . $variables['tree'] . '</ul></div>';
}

function cms_frontend_menu_tree__e970efe1a1096ffad70ab2f820aa0845(&$variables) {
    return '<div class="container"><ul class="global-menu menu nav navbar-nav">' . $variables['tree'] . '</ul></div>';
}

function cms_frontend_menu_tree__0d2ec352c1daddff86d4bc2e7cb6bde0(&$variables) {
    return '<div class="container"><ul class="global-menu menu nav navbar-nav">' . $variables['tree'] . '</ul></div>';
}

function cms_frontend_menu_tree__baf242c0f8acf4344964b53e74286891(&$variables) {
    return '<div class="container"><ul class="global-menu menu nav navbar-nav">' . $variables['tree'] . '</ul></div>';
}

function cms_frontend_menu_tree__90861bc9bf681c3beb25622c799ea5e4(&$variables) {
    return '<div class="container"><ul class="global-menu menu nav navbar-nav">' . $variables['tree'] . '</ul></div>';
}

function cms_frontend_menu_tree__e0718cf43924ad39822d4018bcd86256(&$variables) {
    return '<div class="container"><ul class="global-menu menu nav navbar-nav">' . $variables['tree'] . '</ul></div>';
}

function cms_frontend_menu_tree__802ecc6bf8516a791af8417de0cdb9a0(&$variables) {
    return '<div class="container"><ul class="global-menu menu nav navbar-nav">' . $variables['tree'] . '</ul></div>';
}

function cms_frontend_menu_tree__55d8aa0a418d5a5b4675f572f2d048ce(&$variables) {
    return '<div class="container"><ul class="global-menu menu nav navbar-nav">' . $variables['tree'] . '</ul></div>';
}

function cms_frontend_menu_tree__5e7bfc6c2c076ab36193558e6b19046f(&$variables) {
    return '<div class="container"><ul class="global-menu menu nav navbar-nav">' . $variables['tree'] . '</ul></div>';
}

function cms_frontend_menu_tree__dc957778f98f19923c772986f8ac4b2b(&$variables) {
    return '<div class="container"><ul class="global-menu menu nav navbar-nav">' . $variables['tree'] . '</ul></div>';
}

function cms_frontend_menu_tree__5bbdcd315fbfce2dbf79777713b167e2(&$variables) {
    return '<div class="container"><ul class="global-menu menu nav navbar-nav">' . $variables['tree'] . '</ul></div>';
}

function cms_frontend_menu_tree__d55a414b6bb1252fff5b32e9e4b4e9a6(&$variables) {
    return '<div class="container"><ul class="global-menu menu nav navbar-nav">' . $variables['tree'] . '</ul></div>';
}

function cms_frontend_menu_tree__0b6a263efbd675166a68618c3e1073b4(&$variables) {
    return '<div class="container"><ul class="global-menu menu nav navbar-nav">' . $variables['tree'] . '</ul></div>';
}

function cms_frontend_menu_tree__55a54bb014eb7b96b1594428e6235ca6(&$variables) {
    return '<div class="container"><ul class="global-menu menu nav navbar-nav">' . $variables['tree'] . '</ul></div>';
}

function cms_frontend_menu_tree__1de9e12bc677125caf37c42ad6d443a6(&$variables) {
    return '<div class="container"><ul class="global-menu menu nav navbar-nav">' . $variables['tree'] . '</ul></div>';
}