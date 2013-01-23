<?php

/**
 * Override how date fields are displayed
*/
function cms_theme_date_combo($variables) {
    $element = $variables['element'];
    $field = field_info_field($element['#field_name']);
    $instance = field_info_instance($element['#entity_type'], $element['#field_name'], $element['#bundle']);
   
    // Group start/end items together in fieldset.
    $fieldset = array(
      '#title' => '',
      '#value' => '',
      '#description' => '',
      '#attributes' => array(),
      '#children' => $element['#children'],
    );
    return theme('form_element', array('element' => $fieldset));
}

function cms_theme_date_part_label_date($variables){
    if (isset($variables['element']) && isset($variables['element']['#date_title'])) {
        return t($variables['element']['#date_title'], array(), array('context' => 'datetime'));
    }

    return t('Date', array(), array('context' => 'datetime'));
}

/**
 * Returns HTML for a date_select 'year' label.
 */
function cms_theme_date_part_label_year($variables) {
    if (isset($variables['element']) && isset($variables['element']['#date_title'])) {
        return t($variables['element']['#date_title'], array(), array('context' => 'datetime'));
    }

    return t('Year', array(), array('context' => 'datetime'));
}

/**
 * Returns HTML for a date_select 'month' label.
 */
function cms_theme_date_part_label_month($variables) {
  return t('Month', array(), array('context' => 'datetime'));
}

/**
 * Returns HTML for a date_select 'day' label.
 */
function cms_theme_date_part_label_day($variables) {
    if (isset($variables['element']) && isset($variables['element']['#date_title'])) {
        return t($variables['element']['#date_title'], array(), array('context' => 'datetime'));
    }

    return t('Day', array(), array('context' => 'datetime'));
}

/**
 * Returns HTML for a date_select 'hour' label.
 */
function cms_theme_date_part_label_hour($variables) {
    if (isset($variables['element']) && isset($variables['element']['#date_title'])) {
        return t($variables['element']['#date_title'], array(), array('context' => 'datetime'));
    }

    return t('Hour', array(), array('context' => 'datetime'));
}

/**
 * Returns HTML for a date_select 'minute' label.
 */
function cms_theme_date_part_label_minute($variables) {
    if (isset($variables['element']) && isset($variables['element']['#date_title'])) {
        return t($variables['element']['#date_title'], array(), array('context' => 'datetime'));
    }

    return t('Minute', array(), array('context' => 'datetime'));
}

/**
 * Returns HTML for a date_select 'second' label.
 */
function cms_theme_date_part_label_second($variables) {
    if (isset($variables['element']) && isset($variables['element']['#date_title'])) {
        return t($variables['element']['#date_title'], array(), array('context' => 'datetime'));
    }

    return t('Second', array(), array('context' => 'datetime'));
}

/**
 * Returns HTML for a date_select 'ampm' label.
 */
function cms_theme_date_part_label_ampm($variables) {
  return '&nbsp;';
}

/**
 * Returns HTML for a date_select 'timezone' label.
 */
function cms_theme_date_part_label_timezone($variables) {
    if (isset($variables['element']) && isset($variables['element']['#date_title'])) {
        return t($variables['element']['#date_title'], array(), array('context' => 'datetime'));
    }

    return t('Timezone');
}

/**
 * Returns HTML for a date_select 'time' label.
 */
function cms_theme_date_part_label_time($variables) {
    if (isset($variables['element']) && isset($variables['element']['#date_title'])) {
        return t($variables['element']['#date_title'], array(), array('context' => 'datetime'));
    }

    return t('Time', array(), array('context' => 'datetime'));
}
