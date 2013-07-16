<?php
    if (check_display_field($content, 'field_instrument_treaty_text')) {
?>

<div class="clear">&nbsp;</div>
<hr />

<h4>
    <?php echo t('Treaty text'); ?>
</h4>

<?php
    echo render($content['field_instrument_treaty_text']);
?>
<?php
    }
?>
