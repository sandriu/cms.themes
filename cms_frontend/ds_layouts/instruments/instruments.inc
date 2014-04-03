<?php
/**
 * @file
 * Display Suite Instruments configuration.
 */

function ds_instruments() {
  return array(
    'label' => t('Instruments'),
    'regions' => array(
      'ungrouped_1_1' => t('Ungrouped (row 1, column 1)'),
      'ungrouped_1_2' => t('Ungrouped (row 1, column 2)'),
      'ungrouped_2_1' => t('Ungrouped (row 2, column 1)'),
      'ungrouped_3_1' => t('Ungrouped (row 3, column 1)'),
      'ungrouped_3_2' => t('Ungrouped (row 3, column 2)'),
      'ungrouped_3_3' => t('Ungrouped (row 3, column 3)'),
      'ungrouped_4_1' => t('Ungrouped (row 4, column 1)'),
      'ungrouped_4_2' => t('Ungrouped (row 4, column 2)')
    ),
    'image' => TRUE
  );
}
