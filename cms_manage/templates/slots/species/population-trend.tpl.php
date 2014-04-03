<?php
    if(check_display_field($content, 'field_species_pop_trend')) {
?>
<table class="table table-condensed table-bordered table-hover">
    <caption><?php echo t('Population trend'); ?></caption>
    <thead>
        <tr>
            <th class="span2"><?php echo t('Region'); ?></th>
            <th class="span2"><?php echo t('Years'); ?></th>
            <th class="span2"><?php echo t('Trend'); ?></th>
            <th class="span2"><?php echo t('Estimate'); ?></th>
            <th class="span3"><?php echo t('Ref'); ?></th>
            <th class="span3"><?php echo t('Notes'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php echo render($content['field_species_pop_trend']); ?>
    </tbody>
</table>
<?php
    }
?>

