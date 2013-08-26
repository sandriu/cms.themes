<?php
    if(check_display_field($content, 'field_species_threats')) {
?>
<table class="table table-condensed table-hover table-bordered table-striped">
    <caption><?php echo t('Threats'); ?></caption>
    <thead>
        <tr>
            <th><?php echo t('Threat'); ?></th>
            <th><?php echo t('Notes'); ?></th>
        </tr>
    </thead>

    <tbody>
        <?php echo render($content['field_species_threats']); ?>
    </tbody>
</table>
<?php
    }
?>