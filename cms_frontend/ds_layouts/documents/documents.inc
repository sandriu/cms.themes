<?php
/**
 * @file
 * Display Suite Documents configuration.
 */

function ds_documents() {
  return array(
    'label' => t('Documents'),
    'regions' => array(
      'ungrouped_1_1' => t('Ungrouped (row 1, column 1)'),
      'ungrouped_1_2' => t('Ungrouped (row 1, column 2)'),
      'files' => t('Files'),
      'related_content_1_1' => t('Related content (row 1, column 1)'),
      'related_content_1_2' => t('Related content (row 1, column 2)'),
      'ungrouped' => t('Ungrouped')
    ),
    'image' => TRUE
  );
}
