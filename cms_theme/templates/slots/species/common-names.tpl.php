 <?php
    if(check_display_field($content, 'field_species_name_en')) {
?>
    <table class="table table-condensed table-hover two-columns">
        <caption><?php echo t('Common names'); ?></caption>
        <tbody>
            <?php echo render($content['field_species_name_en']); ?>
            <?php echo render($content['field_species_name_fr']); ?>
            <?php echo render($content['field_species_name_es']); ?>
            <?php echo render($content['field_species_name_de']); ?>
            <?php echo render($content['field_species_former_name']); ?>
        </tbody>
    </table>
<?php
    }
?>
