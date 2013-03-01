<?php
    if(check_display_field($content, 'field_aewa_population_status')) {
?>
<table class="table table-condensed table-bordered table-hover">
    <caption><?php echo t('AEWA Population status'); ?></caption>
    <thead>
        <tr>
            <th class="span2"><?php echo t('Population name'); ?></th>
            <th class="span2"><?php echo t('A'); ?></th>
            <th class="span2"><?php echo t('B'); ?></th>
            <th class="span2"><?php echo t('C'); ?></th>
        </tr>
    </thead>

    <tbody>
        <?php echo render($content['field_aewa_population_status']); ?>
    </tbody>
</table>
<?php
    }
?>

