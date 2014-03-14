<?php
    if (check_display_field($content, 'title') ||
        check_display_field($content, 'field_instrument_name') ||
        check_display_field($content, 'field_country') ||
        check_display_field($content, 'field_instrument_depositary') ||
        check_display_field($content, 'field_instrument_secretariat') ||
        check_display_field($content, 'field_instrument_sponsor')) {
?>
<table class="table table-condensed table-hover two-columns">
    <caption><?php echo t('Details'); ?></caption>
    <tbody>
        <?php echo render($content['field_instrument_name']); ?>
        <?php echo render($content['field_instrument_type']); ?>
        <?php echo render($content['field_instrument_status']); ?>
        <?php echo render($content['field_languages']); ?>
        <?php echo render($content['field_instrument_sponsor']); ?>
        <?php echo render($content['field_instrument_depositary']); ?>
        <?php echo render($content['field_instrument_coverage']); ?>
        <?php echo render($content['field_instrument_final_act']); ?>
        <?php echo render($content['field_instrument_signature']); ?>
        <?php echo render($content['field_country']); ?>
        <?php echo render($content['field_instrument_in_effect']); ?>
        <?php echo render($content['field_instrument_in_force']); ?>
        <?php echo render($content['field_instrument_actual_effect']); ?>
        <?php echo render($content['field_instrument_actual_force']); ?>
        <?php echo render($content['field_instrument_secretariat']); ?>
        <?php echo render($content['field_instrument_financing']); ?>
        <?php echo render($content['field_instrument_reservations']); ?>
        <?php echo render($content['body']); ?>
        <?php echo render($content['field_instrument_species_ex']); ?>
        <?php echo render($content['field_instrument_other']); ?>
        <?php echo render($content['field_instrument_amendments']); ?>
        <?php echo render($content['field_instrument_international_init']); ?>
        <?php echo render($content['field_working_groups']); ?>
        <?php echo render($content['field_member_of_big']); ?>
    </tbody>
</table>
<?php
    }
?>
