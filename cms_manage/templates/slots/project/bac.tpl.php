<?php
    if(check_display_field($content, 'field_project_bac')) {
?>
<table class="table table-condensed table-bordered table-hover">
    <caption><?php echo t('Budget line (BAC)'); ?></caption>
    <thead>
        <tr>
            <th class="col-md-2"><?php echo t('Year'); ?></th>
            <th class="col-md-2"><?php echo t('Fund'); ?></th>
            <th class="col-md-2"><?php echo t('Organizational unit'); ?></th>
            <th class="col-md-2"><?php echo t('Project number'); ?></th>
            <th class="col-md-2"><?php echo t('Programme'); ?></th>
            <th class="col-md-2"><?php echo t('Object code'); ?></th>
        </tr>
    </thead>

    <tbody>
        <?php echo render($content['field_project_bac']); ?>
    </tbody>
</table>
<?php
    }
?>
