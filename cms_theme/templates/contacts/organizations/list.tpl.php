<?php
    echo render_simple_slot('organizations/filters', 'contacts',
                            array('page' => $page,
                                  'per_page' => $per_page,
                                  'per_page_options' => $per_page_options,
                                  'current_group' => $instrument,
                                  'countries' => $countries,
                                  'regions' => $regions,
                                  'mailing_list' => $mailing_list,
                                  'operator' => $operator,
                                  'per_field_operator' => $per_field_operator,
                                  'instruments' => $instruments,
                                  'availability' => $availability,
                                  'person_status' => $person_status,
                                  'organization_status' => $organization_status,
                                  'species_options' => $species_options,
                                  'meeting_options' => $meeting_options,
                                  'region_options' => $region_options,
                                  'mailing_options' => $mailing_options,
                                  'org_status_options' => $org_status_options,
                                  'person_status_options' => $person_status_options,)
    );
?>


<div class="row">
    <div class="span12">
        <table cellpadding="0" cellspacing="0" border="0" id="organizations-listing" class="cols-6 table table-striped table-hover table-bordered dataTable">
            <thead>
                <tr>
                    <th>
                        <?php
                            echo t('Organization ID');
                        ?>
                    </th>

                    <th class="span6">
                        <?php
                            echo t('Name');
                        ?>
                    </th>

                    <th class="span3">
                        <?php
                            echo t('Country');
                        ?>
                    </th>

                    <th class="3">
                        <?php
                            echo t('City');
                        ?>
                    </th>

                    <th class="3">
                        <?php
                            echo t('Instrument(s)');
                        ?>
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<a href="contacts/organizations/add" class="btn btn-primary" title="<?php echo t('Add'); ?>">
    <?php echo t('Add organization'); ?>
</a>

<?php
/**
 * drupal_add_js and drupal_add_css not working here
*/
    $js_path = drupal_get_path('module', 'datatables') . '/dataTables/media/js/jquery.dataTables.min.js';
    $DT_js_path = drupal_get_path('module', 'datatables') . '/js/DT_bootstrap.js';
    $css_path = drupal_get_path('module', 'datatables') . '/dataTables/media/css/demo_table.css';
?>
<script type="text/javascript" src="/<?php echo $js_path; ?>"></script>
<script type="text/javascript" src="/<?php echo $DT_js_path; ?>"></script>
<link type="text/css" rel="stylesheet" href="/<?php echo $css_path; ?>" />
<script type="text/javascript">
    var administration_path = '/<?php echo ADMINISTRATION_PATH; ?>';
</script>
<?php
    drupal_add_js(drupal_get_path('theme', 'cms_theme') . '/js/organizations.js');
?>
