<table class="table table-condensed table-hover two-columns common-name">
    <caption><?php echo t('Common names'); ?></caption>
    <tbody>
        <?php
            if(check_display_field($content, 'field_species_name_en')) {
                echo render($content['field_species_name_en']);
            }

            if(check_display_field($content, 'field_species_name_fr')) {
                echo render($content['field_species_name_fr']);
            }

            if(check_display_field($content, 'field_species_name_es')) {
                echo render($content['field_species_name_es']);
            }

            if(check_display_field($content, 'field_species_name_de')) {
                echo render($content['field_species_name_de']);
            }

            if(check_display_field($content, 'field_species_former_name')) {
                echo render($content['field_species_former_name']);
            }
        ?>
    </tbody>
</table>
