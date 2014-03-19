<?php
/**
 * @file
 * menu-link.func.php
 */

/**
 * Overrides theme_menu_link().
 */
function cms_frontend_menu_link(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';

  if ($element['#below']) {
    // Prevent dropdown functions from being added to management menu so it
    // does not affect the navbar module.
    if (($element['#original_link']['menu_name'] == 'management') && (module_exists('navbar'))) {
      $sub_menu = drupal_render($element['#below']);
    }
    else {
      // Add our own wrapper.
      unset($element['#below']['#theme_wrappers']);
      $sub_menu = '<ul class="dropdown-menu">' . drupal_render($element['#below']) . '</ul>';
      $element['#localized_options']['attributes']['class'][] = 'dropdown-toggle';
      //$element['#localized_options']['attributes']['data-toggle'] = 'dropdown';

      // Check if this element is nested within another.
      if ((!empty($element['#original_link']['depth'])) && ($element['#original_link']['depth'] > 1)) {
        // Generate as dropdown submenu.
        $element['#attributes']['class'][] = 'dropdown-submenu';
      }
      else {
        // Generate as standard dropdown.
        $element['#attributes']['class'][] = 'dropdown';
        $element['#localized_options']['html'] = TRUE;
        //$element['#title'] .= ' <span class="caret"></span>';
      }

      // Set dropdown trigger element to # to prevent inadvertant page loading
      // when a submenu link is clicked.
      //$element['#localized_options']['attributes']['data-target'] = '#';
    }
  }
  // On primary navigation menu, class 'active' is not set on active menu item.
  // @see https://drupal.org/node/1896674
  if (($element['#href'] == $_GET['q'] || ($element['#href'] == '<front>' && drupal_is_front_page())) && (empty($element['#localized_options']['language']))) {
    $element['#attributes']['class'][] = 'active';
  }
  // Add image from menuimage module to the menu
  if (drupal_is_front_page() && !empty($element['#localized_options']['content']['image'])) {
      $fid = $element['#localized_options']['content']['image'];
      $file = file_load($fid);
      if ($file) {
          $image_url = file_create_url($file->uri);
      }
      $element['#attributes']['data-image-url'] = $image_url;
  }

  $output = '<h2>'.l($element['#title'], $element['#href'], $element['#localized_options']).'</h2>';
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

/*
 * Learn About CMS link
 */
function cms_frontend_menu_link__menu_block__menu_learn_about_cms(array $variables){
    return learn_about($variables, 'about-cms');
}

/*
 * Learn About AEWA link
 */
function cms_frontend_menu_link__menu_block__menu_learn_about_aewa(array $variables){
    return learn_about($variables, 'about-aewa');  
}

/*
 * Learn About ASCOBANS link
 */
function cms_frontend_menu_link__menu_block__menu_learn_about_ascobans(array $variables){
    return learn_about($variables, 'about-ascobans');  
}

/*
 * Learn About EUROBATS link
 */
function cms_frontend_menu_link__menu_block__menu_learn_about_eurobats(array $variables){
    return learn_about($variables, 'about-eurobats');  
}

function learn_about(array $variables, $id){
    $link_content = '';
    $element = $variables['element'];

    $link_content = $element['#title'];
    return l($link_content, $element['#href'], array('attributes'=>array('id' => $id, 'class'=>'btn btn-primary'), 'html'=>TRUE));
}


