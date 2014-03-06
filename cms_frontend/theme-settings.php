<?php
/**
 * @file
 * settings.inc
 */

/**
 * Contains the form for the theme settings.
 *
 * @param array $form
 *   The form array, passed by reference.
 * @param array $form_state
 *   The form state array, passed by reference.
 */
function cms_frontend_form_system_theme_settings_alter(&$form, &$form_state) {   
  $form['override_css'] = array(
    '#type' => 'vertical_tabs',    
    '#prefix' => '<h2><small>' . t('Change color scheme') . '</small></h2>',
    '#weight' => -10,
  ); 
      
  $form['color_scheme'] = array(
    '#type' => 'fieldset',
    '#title' => t('Color scheme'),
    '#group' => 'override_css',    
  );
  
  $form['color_scheme']['scheme'] = array(
    '#type' => 'select',
    '#title' => t('Domain scheme'),
    '#default_value' => theme_get_setting('scheme'),
    '#options' => array(
      'cms.css' => t('CMS'),
      'ascobans.css' => t('ASCOBANS'),
      'aewa.css' => t('AEWA'),
      'eurobats.css' => t('EUROBATS'),
      'aquatic.css' => t('AQUATIC'),
      'avian.css' => t('AVIAN'),
      'terrestrial.css' => t('TERRESTRIAL'),  
    ),
  );
}
