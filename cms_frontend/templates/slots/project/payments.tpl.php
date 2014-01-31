<?php
    if(check_display_field($content, 'field_project_payments')) {
?>
<table class="table table-condensed table-bordered table-hover">
    <caption><?php echo t('Schedule of payments'); ?></caption>
    <thead>
        <tr>
            <th class="span2"><?php echo t('Amount'); ?></th>
            <th class="span2"><?php echo t('Date'); ?></th>
            <th class="span2"><?php echo t('Comments'); ?></th>
            <th class="span2"><?php echo t('Payment document (PYIN)'); ?></th>
        </tr>
    </thead>

    <tbody>
        <?php echo render($content['field_project_payments']); ?>
    </tbody>
</table>
<?php
    }
?>
