<?php
render_simple_slot('filters', 'contacts',
    array(
        'current_group' => $instrument,
        'countries' => $countries,
        'regions' => $regions,
        'operator' => $operator,
        'per_field_operator' => $per_field_operator,
        'instruments' => $instruments,
        'availability' => $availability,
        'person_status' => $person_status,
        'organization_status' => $organization_status,
        'species_options' => $species_options,
        'meeting_options' => $meeting_options,
        'region_options' => $region_options,
        'org_status_options' => $org_status_options,
        'person_status_options' => $person_status_options,
        'species' => $species,
        'meeting' => $meeting,
        'form_reset_url' => $form_reset_url
    )
); ?>

<div class="btn-toolbar">
    <div class="btn-group">
        <a href="/<?php echo ADMINISTRATION_PATH; ?>contacts/add"
           class="btn"
           title="<?php echo t('Add new contact'); ?>">
            <?php echo t('Add contact'); ?>
        </a>
    </div>

    <div class="btn-group pull-right">
        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
            Export
            <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a href="javascript:void(0);" class="disabled" title="<?php echo t('Export results in Microsoft Excel format'); ?>" id="xls-export-button">
                    <i class="icon-download-alt"></i>
                    <?php echo t('Microsoft Excel'); ?>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="disabled" title="<?php echo t('Export results in CSV format'); ?>" id="export-button">
                    <i class="icon-download-alt"></i>
                    <?php echo t('CSV table'); ?>
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="span12">
        <table id="contacts-listing" class="cols-6 table table-striped table-hover table-bordered dataTable">
            <thead>
                <tr>
                    <th class="span1">#</th>
                    <th class="span2"><?php echo t('First name'); ?></th>
                    <th class="span2"><?php echo t('Last name'); ?></th>
                    <th class="span3"><?php echo t('Organization'); ?></th>
                    <th class="span2"><?php echo t('Country'); ?></th>
                    <th class="span1"><?php echo t('Country post'); ?></th>
                    <th class="span2"><?php echo t('Instruments'); ?></th>
                    <th class="span1"><?php echo t('Actions'); ?></th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
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
