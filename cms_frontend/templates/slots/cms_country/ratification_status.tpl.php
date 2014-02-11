<h3><?php echo t('Ratification status'); ?></h3>
<?php
if (check_display_field($content, 'field_country_instrument_status')) {
    echo render($content['field_country_instrument_status']);
}else {
    ?>
    <p class="text-warning">
        <?php
        echo t('No ratification available');
        ?>
    </p>
<?php
}
?>