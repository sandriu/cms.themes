<?php
    if(check_display_field($content, 'field_species_status_per_country')) {
?>
<?php
/**
 * drupal_add_js and drupal_add_css not working here
*/
    $js_path = drupal_get_path('module', 'datatables') . '/dataTables/media/js/jquery.dataTables.min.js';
    $DT_js_path = drupal_get_path('module', 'datatables') . '/dataTables/media/js/dataTables.bootstrap.js';
    $css_path = drupal_get_path('module', 'datatables') . '/dataTables/media/css/demo_table.css';
    $DT_css_path = drupal_get_path('module', 'datatables') . '/dataTables/media/css/dataTables.bootstrap.css';
?>
<script type="text/javascript" src="/<?php echo $js_path; ?>"></script>
<script type="text/javascript" src="/<?php echo $DT_js_path; ?>"></script>
<link type="text/css" rel="stylesheet" href="/<?php echo $css_path; ?>">
<link type="text/css" rel="stylesheet" href="/<?php echo $DT_css_path; ?>">

<style>
.dataTables_info {
    width: auto;
}
</style>

<br />

<div class="row">
    <div class="col-md-7">
        <h4>
            <?php echo t('AEWA Country status'); ?>
        </h4>

        <br />

        <table cellpadding="0" cellspacing="0" border="0" id="country-status-listing" class="cols-2 table table-striped table-hover table-bordered dataTable">
            <thead>
                <tr>
                    <th class="col-md-2"><?php echo t('Country'); ?></th>
                    <th class="col-md-2"><?php echo t('Status'); ?></th>
                </tr>
            </thead>

            <tbody>
                <?php echo render($content['field_species_status_per_country']); ?>
            </tbody>
        </table>
    </div>
</div>
<?php
    }
?>
