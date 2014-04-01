<?php
    if(check_display_field($content, 'field_species_critical_sites') || check_display_field($content, 'field_species_notes')) {
?>

<table class="table table-condensed table-hover two-columns views-table">
    <caption><?php echo t('Other details'); ?></caption>
    <tbody>
        <?php
            if(check_display_field($content, 'field_species_critical_sites')) {
                echo render($content['field_species_critical_sites']);
            }

            if(check_display_field($content, 'field_species_notes')) {
                echo render($content['field_species_notes']);
            }
        ?>
    </tbody>
</table>
<?php
    }
?>
