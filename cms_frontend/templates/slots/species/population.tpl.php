<?php
    if(check_display_field($content, 'field_species_pop')) {
?>
<table class="table table-condensed table-hover table-bordered table-striped">
    <caption><?php echo t('Population per instrument'); ?></caption>
    <thead>
        <tr>
            <th><?php echo t('Instrument'); ?></th>
            <th><?php echo t('Population name'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php echo render($content['field_species_pop']); ?>
    </tbody>
</table>
<?php
    }
?>
