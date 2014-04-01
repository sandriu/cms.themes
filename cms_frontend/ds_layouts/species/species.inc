<?php
/**
 * @file
 * Display Suite Species configuration.
 */

function ds_species() {
  return array(
    'label' => t('Species'),
    'regions' => array(
      'taxonomy_1_1' => t('Taxonomy (row 1, column 1)'),
      'taxonomy_1_2' => t('Taxonomy (row 1, column 2)'),
      'taxonomy_1_3' => t('Taxonomy (row 1, column 3)'),
      'taxonomy_2_1' => t('Taxonomy (row 2, column 1)'),
      'taxonomy_2_2' => t('Taxonomy (row 2, column 2)'),
      'common_names_1_1' => t('Common names (row 1, column 1)'),
      'common_names_1_2' => t('Common names (row 1, column 2)'),
      'common_names_1_3' => t('Common names (row 1, column 3)'),
      'assessment_information_1_1' => t('Assessment information (row 1, column 1)'),
      'assessment_information_1_2' => t('Assessment information (row 1, column 2)'),
      'assessment_information_1_3' => t('Assessment information (row 1, column 3)'),
      'assessment_information_2_1' => t('Assessment information (row 2, column 1)'),
      'global_geographic_range' => t('Global geographic range'),
      'populations_per_instrument' => t('Population(s) per instrument'),
      'population_size_and_trend' => t('Population size and trend'),
      'related_content_1_1' => t('Related content (row 1, column 1)'),
      'related_content_1_2' => t('Related content (row 1, column 2)'),
      'related_content_2_1' => t('Related content (row 2, column 1)'),
      'ungrouped' => t('Ungrouped')
    ),
    'image' => TRUE
  );
}
