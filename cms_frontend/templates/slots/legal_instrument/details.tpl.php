<?php
    if (check_display_field($content, 'title') ||
        check_display_field($content, 'field_instrument_name') ||
        check_display_field($content, 'field_instrument_host_country') ||
        check_display_field($content, 'field_instrument_depositary') ||
        check_display_field($content, 'field_instrument_secretariat') ||
        check_display_field($content, 'field_instrument_sponsor')) {
?>
<table class="table table-condensed table-hover two-columns">
    <caption><?php echo t('Details'); ?></caption>
    <tbody>
        <?php echo render($content['field_instrument_name']); ?>
        <?php echo render($content['field_instrument_type']); ?>
        <?php echo render($content['field_instrument_status']); ?>
        <?php echo render($content['field_languages']); ?>
        <?php echo render($content['field_instrument_sponsor']); ?>
        <?php echo render($content['field_instrument_depositary']); ?>
        <?php echo render($content['field_instrument_coverage']); ?>
        <?php echo render($content['field_instrument_final_act']); ?>
        <?php echo render($content['field_instrument_signature']); ?>
        <?php echo render($content['field_instrument_host_country']); ?>
        <?php echo render($content['field_instrument_in_effect']); ?>
        <?php echo render($content['field_instrument_in_force']); ?>
        <?php echo render($content['field_instrument_actual_effect']); ?>
        <?php echo render($content['field_instrument_actual_force']); ?>
        <?php echo render($content['field_instrument_secretariat']); ?>
        <?php echo render($content['field_instrument_financing']); ?>
        <?php echo render($content['field_instrument_reservations']); ?>
        <?php echo render($content['field_instrument_description']); ?>
        <?php echo render($content['field_instrument_species_ex']); ?>
        <?php echo render($content['field_instrument_other']); ?>
        <?php echo render($content['field_instrument_amendments']); ?>
        <?php echo render($content['field_instrument_international_init']); ?>
        <?php echo render($content['field_working_groups']); ?>
        <?php echo render($content['field_member_of_big']); ?>
    </tbody>
</table>
<?php
    }
?>


<div class="clear">&nbsp;</div>
<hr />

<h4>
    <?php echo t('Countries'); ?>
</h4>

<?php
    foreach ($content['countries_by_status'] as $status => $countries) {
?>
<h5>
    <?php
        echo $status;
    ?>
</h5>

<table class="table table-bordered table-striped table-hover dataTable">
    <thead>
        <tr>
            <th>
                <?php echo t('Country'); ?>
            </th>

            <th>
                <?php echo t('Status'); ?>
            </th>

            <th>
                <?php echo t('Date'); ?>
            </th>

            <th>
                <?php echo t('Notes'); ?>
            </th>
        </tr>
    </thead>
    <tbody>
<?php
        foreach ($countries as $index => $data) {
?>
        <tr>
            <td>
                <a href="<?php echo base_path().ADMINISTRATION_PATH.'node'._DS_.$data['nid']; ?>" target="_blank">
                    <?php echo $data['country'];?>
                </a>
            </td>

            <td>
                <?php echo $data['status'];?>
            </td>

            <td>
                <?php echo $data['date'];?>
            </td>

            <td>
                <?php echo $data['notes'];?>
            </td>
        </tr>
<?php
        }
?>
    </tbody>
</table>

<div class="clearfix">&nbsp;</div>
<br />
<hr />
<?php
    }
?>
