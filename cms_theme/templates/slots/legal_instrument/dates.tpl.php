<?php
    if (check_display_field($content, 'field_instrument_in_effect') ||
        check_display_field($content, 'field_instrument_in_force') ||
        check_display_field($content, 'field_instrument_actual_effect') ||
        check_display_field($content, 'field_instrument_actual_force')) {
?>
<table class="table table-condensed table-hover two-columns">
    <caption><?php echo t('Status of forces and effects'); ?></caption>
    <tbody>
    <?php
        echo render($content['field_instrument_in_effect']);
        echo render($content['field_instrument_in_force']);
        echo render($content['field_instrument_actual_effect']);
        echo render($content['field_instrument_actual_force']);
    ?>
    </tbody>
</table>
<?php
    }
?>
