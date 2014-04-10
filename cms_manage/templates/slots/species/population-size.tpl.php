<?php
    if(check_display_field($content, 'field_species_pop_size')) {
?>
<table class="table table-condensed table-bordered">
    <caption><?php echo t('Population size and trend'); ?></caption>

    <thead>
        <tr>
            <th class="col-md-2" rowspan="2" style="vertical-align: middle;"><?php echo t('Population'); ?></th>
            <th class="col-md-2"><?php echo t('Size interval'); ?></th>
            <th class="col-md-2"><?php echo t('Size quality'); ?></th>
            <th class="col-md-2"><?php echo t('Estimated population size'); ?></th>
            <th class="col-md-3"><?php echo t('Size reference'); ?></th>
            <th class="col-md-3"><?php echo t('Size notes'); ?></th>
        </tr>

        <tr>
            <th class="col-md-2"><?php echo t('Trend interval'); ?></th>
            <th class="col-md-2"><?php echo t('Trend  quality'); ?></th>
            <th class="col-md-2"><?php echo t('Trend'); ?></th>
            <th class="col-md-3"><?php echo t('Trend reference'); ?></th>
            <th class="col-md-3"><?php echo t('Trend notes'); ?></th>
        </tr>
    </thead>

    <tbody>
        <?php echo render($content['field_species_pop_size']); ?>
    </tbody>
</table>
<?php
    }
?>
