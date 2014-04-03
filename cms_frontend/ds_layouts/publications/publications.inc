<?php
/**
 * @file
 * Display Suite Publications configuration.
 */

function ds_publications() {
  return array(
    'label' => t('Publications'),
    'regions' => array(
      'bibliographic_information_1_1' => t('Bibliographic information (row 1, column 1)'),
      'bibliographic_information_1_2' => t('Bibliographic information (row 1, column 2)'),
      'bibliographic_information_2_1' => t('Bibliographic information (row 2, column 1)'),
      'bibliographic_information_3_1' => t('Bibliographic information (row 3, column 1)'),
      'bibliographic_information_3_2' => t('Bibliographic information (row 3, column 2)'),
      'files' => t('Files'),
      'details_1_1' => t('Details (row 1, column 1)'),
      'details_1_2' => t('Details (row 1, column 2)'),
      'details_1_3' => t('Details (row 1, column 3)'),
      'related_content_1_1' => t('Related content (row 1, column 1)'),
      'related_content_1_2' => t('Related content (row 1, column 2)'),
      'ungrouped' => t('Ungrouped')
    ),
    'image' => TRUE
  );
}
