<?php
    if(check_display_field($content, 'field_project_activity')) {
?>
<table class="table table-condensed table-bordered table-hover">
    <caption><?php echo t('Project activity'); ?></caption>
    <thead>
        <tr>
            <th class="col-md-2"><?php echo t('Description'); ?></th>
            <th class="col-md-2"><?php echo t('Start date'); ?></th>
            <th class="col-md-2"><?php echo t('End date'); ?></th>
            <th class="col-md-2"><?php echo t('Responsibility'); ?></th>
            <th class="col-md-3"><?php echo t('Output'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php echo render($content['field_project_activity']); ?>
    </tbody>
</table>
<?php
    }
?>
