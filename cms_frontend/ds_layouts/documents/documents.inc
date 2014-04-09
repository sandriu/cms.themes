<?php
/**
 * @file
 * Display Suite Documents configuration.
 */

function ds_documents() {
  return array(
    'label' => t('Documents'),
    'regions' => array(
      'region_1_1_1' => t('Region 1 (row 1, column 1)'),
      'region_1_1_2' => t('Region 1 (row 1, column 2)'),
      'files' => t('Files'),
      'related_content_1_1' => t('Related content (row 1, column 1)'),
      'related_content_1_2' => t('Related content (row 1, column 2)')
    ),
    'image' => TRUE
  );
}
