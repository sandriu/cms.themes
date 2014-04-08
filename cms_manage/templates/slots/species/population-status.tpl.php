<?php
    if(isset($content['field_aewa_population_status']) &&
       isset($content['field_aewa_population_status'][0]['field_aewa_pop_status_name']) &&
       !empty($content['field_aewa_population_status'][0]['field_aewa_pop_status_name'])) {
?>
<table class="table table-condensed table-bordered table-hover">
    <caption><?php echo t('AEWA Population status'); ?></caption>
    <thead>
        <tr>
            <th class="col-md-2"><?php echo t('Population name'); ?></th>
            <th class="col-md-2"><?php echo t('A'); ?></th>
            <th class="col-md-2"><?php echo t('B'); ?></th>
            <th class="col-md-2"><?php echo t('C'); ?></th>
        </tr>
    </thead>

    <tbody>
        <?php echo render($content['field_aewa_population_status']); ?>
    </tbody>
</table>
<?php
    render_simple_slot('population_status_legend', 'species');

    }
?>

