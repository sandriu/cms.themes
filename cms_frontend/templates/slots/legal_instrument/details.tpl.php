<?php
    if (check_display_field($content, 'title') ||
        check_display_field($content, 'field_instrument_name') ||
        check_display_field($content, 'field_instrument_host_country') ||
        check_display_field($content, 'field_instrument_depositary') ||
        check_display_field($content, 'field_instrument_secretariat') ||
        check_display_field($content, 'field_instrument_sponsor')) {
?>

<!-- table moved to node--legal_instrument.tpl.php -->
<?php
    }
?>

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

<?php
    }
?>
