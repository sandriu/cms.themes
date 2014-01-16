<?php
    echo render_simple_slot('filters', 'contacts',
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
                                  'person_status_options' => $person_status_options,
                                  'species' => $species,
                                  'meeting' => $meeting,
                                )
    );
?>

<div class="row">
    <div class="span12">
        <table cellpadding="0" cellspacing="0" border="0" id="contacts-listing" class="cols-6 table table-striped table-hover table-bordered dataTable">
            <thead>
                <tr>
                    <th>
                        <?php
                            echo t('User ID');
                        ?>
                    </th>

                    <th class="span3">
                        <?php
                            echo t('First name');
                        ?>
                    </th>

                    <th class="span3">
                        <?php
                            echo t('Last name');
                        ?>
                    </th>

                    <th class="span4">
                        <?php
                            echo t('Organization');
                        ?>
                    </th>

                    <th>
                        <?php
                            echo t('Department');
                        ?>
                    </th>

                    <th>
                        <?php
                            echo t('Email');
                        ?>
                    </th>

                    <th class="span2">
                        <?php
                            echo t('Country');
                        ?>
                    </th>

                    <th class="span2">
                        <?php
                            echo t('Country post');
                        ?>
                    </th>

                    <th>
                        <?php
                            echo t('City');
                        ?>
                    </th>

                    <th class="span1">
                        <?php
                            echo t('Instrument(s)');
                        ?>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($users as $index => $user) {
                ?>
                <tr>
                    <td>
                        <?php echo (is_array($user) && array_key_exists('uid', $user) && isset($user['uid'][0])) ? $user['uid'][0] : ''; ?>
                    </td>

                    <td>
                        <a href="/<?php echo ADMINISTRATION_PATH; ?>contacts/item/<?php echo $user['uid'][0]; ?>/view">
                            <?php echo (is_array($user) && array_key_exists('givenname', $user) && isset($user['givenname'][0])) ? $user['givenname'][0] : ''; ?>
                        </a>


                    </td>

                    <td>
                        <?php echo (is_array($user) && array_key_exists('sn', $user) && isset($user['sn'][0])) ? $user['sn'][0] : ''; ?>
                    </td>

                    <td>
                        <?php echo (is_array($user) && array_key_exists('o', $user) && isset($user['o'][0])) ? $user['o'][0] : ''; ?>
                    </td>

                    <td>

                    </td>

                    <td>
                        <?php echo (is_array($user) && array_key_exists('mail', $user) && isset($user['mail'][0])) ? $user['mail'][0] : ''; ?>
                    </td>

                    <td>
                        <?php echo $user['countries'] ?>
                    </td>

                    <td>
                        <?php echo $user['countries_post']; ?>
                    </td>

                    <td>
                        <?php echo (is_array($user) && array_key_exists('st', $user) && isset($user['st'][0])) ? $user['st'][0] : ''; ?>
                    </td>

                    <td>
                        <?php echo $user['instruments']; ?>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<a href="/<?php echo ADMINISTRATION_PATH; ?>contacts/add" class="btn btn-primary" title="<?php echo t('Add new contact'); ?>">
    <?php echo t('Add contact'); ?>
</a>

<a href="javascript:void(0);" class="btn" title="<?php echo t('Export'); ?> results in CSV format" id="export-button">
    <i class="icon-download-alt"></i>
    <?php echo t('Export search result'); ?>
</a>

<a href="javascript:void(0);" class="btn" title="<?php echo t('Export to XLS file'); ?> results in XLS format" id="xls-export-button">
    <i class="icon-download-alt"></i>
    <?php echo t('Export to XLS'); ?>
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
    var administration_path = '<?php echo ADMINISTRATION_PATH; ?>';
</script>

<?php
    drupal_add_js(drupal_get_path('theme', 'cms_theme') . '/js/contacts.js');
?>
