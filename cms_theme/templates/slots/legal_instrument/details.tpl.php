<?php
    if (check_display_field($content, 'title') ||
        check_display_field($content, 'field_instrument_name') ||
        check_display_field($content, 'field_instrument_host_country') ||
        check_display_field($content, 'field_instrument_depository') ||
        check_display_field($content, 'field_instrument_secretariat') ||
        check_display_field($content, 'field_instrument_sponsor')) {
?>
<table class="table table-condensed table-hover two-columns">
    <caption><?php echo t('Details'); ?></caption>
    <tbody>
        <?php echo render($content['field_instrument_name']); ?>
        <?php echo render($content['field_instrument_type']); ?>
        <?php echo render($content['field_instrument_host_country']); ?>
        <?php echo render($content['field_instrument_depository']); ?>
        <?php echo render($content['field_instrument_secretariat']); ?>
        <?php echo render($content['field_instrument_sponsor']); ?>
    </tbody>
</table>
<?php
    }
?>
<?php echo render($content['countries']); ?>