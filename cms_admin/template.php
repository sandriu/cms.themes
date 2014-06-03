<?php
function cms_admin_simplenews_field($variables) {
  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= $variables['label'] . ":\n";
  }

  // Render the items.
  foreach ($variables['items'] as $item) {
    $output .= drupal_render($item) . "\n";
  }

  // Add an extra line break at the end of the field.
  $output .= "\n";

  return $output;
}

/**
 * Theme the Table of Contents.
 */
function cms_admin_scs_toc($vars) {
  $output = '<h2 style="color: #555; font-size: 14px;">' . t('In this issue:') . '</h2>';
  $output .= '<ul style="list-style-type: square; color: #888; padding-left: 0px;">';

  foreach ($vars['nodes'] as $node) {
    if ($node->type == 'newsletter_news_category')
      continue;

    $output .= '<li><h2 style="font-size: 14px; margin-top: 11px; margin-bottom: 11px;"><a href="#node-' . $node->nid . '" style="color: #0066c0;">' . $node->title . '</a></h2></li>';
  }

  $output .= '</ul>';

  return $output;
}
