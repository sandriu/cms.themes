<?php

require_once dirname(__FILE__)."/templates/system/pager.func.php";
require_once dirname(__FILE__)."/templates/menu/menu-tree.func.php";
require_once dirname(__FILE__)."/templates/menu/menu-link.func.php";
require_once dirname(__FILE__)."/templates/menu/menu-position.func.php";
require_once dirname(__FILE__)."/templates/profile2/profile.func.php";

/*
 * Preprocess html
 */

function cms_frontend_preprocess_html(&$variables) {
  drupal_add_css(
          'http://fonts.googleapis.com/css?family=Lato:400,700,900,400italic', array('type' => 'external')
  );
  // Add conditional CSS for IE8
  drupal_add_css(path_to_theme() . '/css/ie/ie8-custom.css', array('media'=>'screen','group' => CSS_THEME, 'browsers' => array('IE' => 'IE 8', '!IE' => FALSE), 'weight' => 999, 'preprocess' => FALSE));
  // Add conditional CSS for IE9
  drupal_add_css(path_to_theme() . '/css/ie/ie9-custom.css', array('media'=>'screen','group' => CSS_THEME, 'browsers' => array('IE' => 'IE 9', '!IE' => FALSE), 'weight' => 999, 'preprocess' => FALSE));
  // Add conditional CSS for IE10
  drupal_add_css(path_to_theme() . '/css/ie/ie10.css', array('media'=>'screen','group' => CSS_THEME, 'browsers' => array('IE' => 'IE 10', '!IE' => FALSE), 'weight' => 999, 'preprocess' => FALSE));

  //Add helpers variables
  drupal_add_js(array('cms_front_end' => array('is_front_page' => drupal_is_front_page() )), 'setting');
  drupal_add_js(array('cms_front_end' => array('google_maps_no_map_text' => t(theme_get_setting('google_maps_no_map')) )), 'setting');

  drupal_add_library('system', 'ui.accordion');

  //Add custom template js
  drupal_add_js(path_to_theme() . '/js/template.js');

  //Ierarhic menu
  drupal_add_js(path_to_theme() . '/js/menu.js');

  //Device detector helper
  drupal_add_js("//wurfl.io/wurfl.js", 'external');


  drupal_add_css(path_to_theme(). '/css/style.css', array('weight'=>'1'));
  //Custom css that override default style.css
  drupal_add_css(path_to_theme(). '/css/custom.css', array('weight'=>'2'));
  //mobile styles
  drupal_add_css(path_to_theme(). '/css/mobile.css', array('weight'=>'3'));

  //Domain specific css
  $domain_css = theme_get_setting('scheme');
  if(empty($domain_css))
      $domain_css = 'cms.css';
  drupal_add_css(path_to_theme(). '/css/'. $domain_css, array('weight'=>'999'));
  //print styles
  drupal_add_css(path_to_theme(). '/css/print.css', array('weight'=>'1000'));

  //Add conditional IE8 css for domaine
  drupal_add_css(path_to_theme() . '/css/ie/ie8-'.$domain_css, array('media'=>'screen','group' => CSS_THEME, 'browsers' => array('IE' => 'IE 8', '!IE' => FALSE), 'weight' => 999, 'preprocess' => FALSE));
  // Add conditional CSS for IE9 for domaine
  drupal_add_css(path_to_theme() . '/css/ie/ie9-'.$domain_css, array('media'=>'screen','group' => CSS_THEME, 'browsers' => array('IE' => 'IE 9', '!IE' => FALSE), 'weight' => 999, 'preprocess' => FALSE));
}

/*
 * Preprocess blocks
 */

function cms_frontend_preprocess_block(&$variables) {
  //add a css class to languages switch block
  if ($variables['block']->module == 'locale' && $variables['block']->delta == 'language_content')
    $variables['classes_array'][] = drupal_html_class('language-menu');
}

/*
 * Alter forms like search form
 */

function cms_frontend_form_alter(&$form, &$form_state, $form_id) {
    switch ($form_id) {
        case 'search_block_form' :
            // Prevent user from searching the default text
            $form['#attributes']['onsubmit'] =
                    "if(this.search_block_form.value=='".t('Search site')."'){ alert('".t('Please enter a search')."'); return false; }";
            // Alternative (HTML5) placeholder attribute instead of using the javascript
            $form['search_block_form']['#attributes']['placeholder'] = t('Search site');
            $form['search_block_form']['#attributes']['class'][] = 'input-sm';
            break;
        case 'views_exposed_form':
            $form['submit']['#attributes']['class'][] = 'btn-primary';
            break;
    }
}

/*
 * Overwrite language switch block content
 */

function cms_frontend_links__locale_block(&$variables) {
  global $language_content, $_domain;

  //current path
  $path = $_GET['q'];

  $content = '<span class="btn-group language-menu">';
  $content .= '<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">';
  $content .= strtoupper($language_content->language) . '&nbsp;';
  $content .= '<span class="caret"></span></button>';
  $content .= '<ul class="language-switcher-locale-url dropdown-menu">';

  //languages
  foreach ($variables['links'] as $language => $langInfo) {
    $lang = $variables['links'][$language]['language']->language;
    //skip displaying current language
    if($language_content->language == $lang)
      continue;

    $subdomain = $_domain['subdomain'] . '/' . $lang. '/';

    $link = drupal_is_front_page()? $subdomain : $subdomain . drupal_get_path_alias($path, $lang);
    $string = '<li class="%1$s"><a href="http://%3$s" class="language-link" lang="%1$s">%2$s</a></li>';
    $content .= sprintf($string, $lang, strtoupper($lang), $link);
  }



  $content .= '</ul>';
  $content .= '</span>';

  return $content;
}

/**
 * Process variables for user-picture.tpl.php.
 *
 * The $variables array contains the following arguments:
 * - $account: A user, node or comment object with 'name', 'uid' and 'picture'
 *   fields.
 *
 * @see user-picture.tpl.php
 */
function cms_frontend_preprocess_user_picture(&$variables, $theme, $style = 'userimage') {
  $variables['user_picture'] = '';

  $account = $variables['account'];

  //take image from profile
  $filepath = get_profile_user_image($account->uid);

  if (!$filepath) {
    $filepath = 'public://profiles_pictures/default.png';
  }
  if (isset($filepath)) {
    $alt = t("@user's picture", array('@user' => format_username($account)));
    // If the image does not have a valid Drupal scheme (for eg. HTTP),
    // don't load image styles.
    if (module_exists('image') && file_valid_uri($filepath)) {
      $variables['user_picture'] = theme('image_style', array('style_name' => $style, 'path' => $filepath, 'alt' => $alt, 'title' => $alt));
    }
    else {
      $variables['user_picture'] = theme('image', array('path' => $filepath, 'alt' => $alt, 'title' => $alt));
    }
    if (!empty($account->uid) && user_access('access user profiles')) {
      $attributes = array('attributes' => array('title' => t('View user profile.')), 'html' => TRUE);
      $variables['user_picture'] = l($variables['user_picture'], "user/$account->uid", $attributes);
    }
  }
}

/*
 * Register theme hooks
 */
function cms_frontend_theme(){
  return array(
    'recent_comments' => array(
        'variables' => array('items' => null),
        'template' => 'templates/comments/recent-comments',
     ),
  );
}

/**
 * Theme function implementation for bootstrap_search_form_wrapper.
 */
function cms_frontend_bootstrap_search_form_wrapper($variables) {
  $output = '<div class="input-group search-area">';
  $output .= $variables['element']['#children'];
  $output .= '</div>';
  return $output;
}

/*
 * Forum author panel
 */
function cms_frontend_preprocess_author_pane_user_picture(&$variables, $theme, $style = 'userimage') {
  $variables['picture'] = '';

  $account = $variables['account'];

  //take image from profile
  $filepath = get_profile_user_image($account->uid);

  if (!$filepath) {
    $filepath = 'public://profiles_pictures/default.png';
  }
  if (isset($filepath)) {
    $alt = t("@user's picture", array('@user' => format_username($account)));

    // If the image does not have a valid Drupal scheme (for eg. HTTP),
    // don't load image styles.
    if (module_exists('image') && file_valid_uri($filepath)) {
      $variables['picture'] = theme('image_style', array('style_name' => $style, 'path' => $filepath, 'alt' => $alt, 'title' => $alt));
      $variables['imagecache_used'] = TRUE;
    }
    else {
      $variables['picture'] = theme('image', array('path' => $filepath, 'alt' => $alt, 'title' => $alt));
      $variables['imagecache_used'] = FALSE;
    }

    if (!empty($account->uid) && user_access('access user profiles')) {
      $options = array(
        'attributes' => array('title' => t('View user profile.')),
        'html' => TRUE,
      );
      $variables['picture_link_profile'] = l($variables['picture'], "user/$account->uid", $options);
    }
    else {
      $variables['picture_link_profile'] = FALSE;
    }
  }
}

/*
 * Preprocess node variables
 */
function cms_frontend_preprocess_node(&$variables){
  $profile = get_user_profile($variables['node']->uid);
  $name = ($profile && !empty($profile['full_name']))? $profile['full_name']:theme('username', array('account' => $variables['node']));

  $variables['name'] = $name;
  $variables['country'] = ($profile && !empty($profile['country']))? $profile['country']:'';
}

/*
 * Preprocess page load
 */
function cms_frontend_preprocess_page(&$variables, $hook){

    //use page--forum template for content type forum
    if (isset($variables['node']) && $variables['node']->type == 'forum')
        $variables['theme_hook_suggestions'][] = 'page__forum';

    //remove user picture from account page
    if (arg(0)=="user" || arg(0)=="users" ) {
        unset ($variables['page']['content']['system_main']['user_picture']);
    }

    //set theme for primary menu
    $variables['page']['primary_menu']['domain_menu_block_front_end_main_menus']['#content']['#theme_wrappers'] =
            array('menu_tree__menu_frontend_main_menu');
    $variables['page']['primary_menu']['menu_menu-frontend-main-menu']['#theme_wrappers'] =
            array('menu_tree__menu_frontend_main_menu');

    //set theme for footer menu
    $variables['page']['footer_menu']['menu_block_2']['#content']['#theme_wrappers'] =
            array('menu_tree__menu_front_end_footer_menu');

    //add mobile menu
    if (!empty($variables['page']['primary_menu']['domain_menu_block_front_end_main_menus'])) {
        $menu_name = $variables['page']['primary_menu']['domain_menu_block_front_end_main_menus']['#config']['menu_name'];
    }
    $variables['page']['mobile_menu'] = menu_tree($menu_name);

    $variables['page']['footer_second_row_right']['menu_menu-footer-second-menu']['#theme_wrappers'] =
            array('menu_tree__menu_footer_second_menu');

    //remove frontpage message that appear when there is not content
    if(drupal_is_front_page())
        unset($variables['page']['content']['system_main']['default_message']);
}

/*
 * Format Projects Activity output
 */
function cms_frontend_cms_project_activity_formatter($variables) {
    extract($variables); // $item
    $ret = '';
    $in = '';
    if(!empty($item['#items'])) {
        foreach($item['#items'] as $idx => $st) {
            $ob = $item[$idx];
            $description = $ob['description'];
            $start_date = $ob['start_date'];
            $end_date = $ob['end_date'];
            $responsibility = $ob['responsibility'];
            $output = $reference = $ob['output'];

            $in = $idx == 0? 'in':'';

            $body = '<table>';
            $body .= sprintf('<tr><td>'.t('Description').':</td><td>%s</td></tr>',$description);
            $body .= sprintf('<tr><td>'.t('Start date').':</td><td>%s</td></tr>',$start_date);
            $body .= sprintf('<tr><td>'.t('End date').':</td><td>%s</td></tr>',$end_date);
            $body .= sprintf('<tr><td>'.t('Responsibility').':</td><td>%s</td></tr>',$responsibility);
            $body .= sprintf('<tr><td>'.t('Output').':</td><td>%s</td></tr>',$output);
            $body .= '</table>';

            $ret .= '<div class="panel panel-default">';
            $ret .= sprintf('<div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse%d">
                                Activity %d
                            </a>
                        </h4>
                     </div>', ++$idx, $idx);

            $ret .= sprintf('<div id="collapse%d" class="panel-collapse collapse %s">
                        <div class="panel-body">
                            %s
                        </div>
                    </div>', $idx, $in, $body);
            $ret .= '</div>';
        }
        return $ret;
    }
}

function cms_frontend_preprocess_views_view_table(&$vars) {
    $vars['classes_array'][] = 'table table-striped';
}
