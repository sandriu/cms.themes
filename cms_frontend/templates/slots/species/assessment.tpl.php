<table class="table table-condensed table-hover two-columns">
    <caption><?php echo t('Assessment information'); ?></caption>
    <tbody>
    <?php
        if (check_display_field($content, 'field_species_instruments')) {
            echo render($content['field_species_instruments']);
        }

       if (check_display_field($content, 'field_species_iucn_status')) {
            echo render($content['field_species_iucn_status']);
        }
        /*
        if (check_display_field($content, 'field_species_iucn_web_srv')) {
            echo render($content['field_species_iucn_web_srv']);
        }

        if (check_display_field($content, 'field_species_concerted_action')) {
           echo render($content['field_species_concerted_action']);
        }

        if (check_display_field($content, 'field_species_cooperative_action')) {
            echo render($content['field_species_cooperative_action']);
        }

        if (check_display_field($content, 'field_species_appendix')) {
            echo render($content['field_species_appendix']);
        }

        if (check_display_field($content, 'field_species_appendix_1_date')) {
            echo render($content['field_species_appendix_1_date']);
        }

        if (check_display_field($content, 'field_species_appendix_2_date')) {
            echo render($content['field_species_appendix_2_date']);
        }

       if(check_display_field($content, 'field_species_pop_global', 'field_species_pop_global_date')) {
    ?>
        <tr>
            <th><?php echo t('Global population'); ?></th>
            <td>
            <?php
                if(check_display_field($content, 'field_species_pop_global')) {
                    echo render($content['field_species_pop_global']);
                }
                if(check_display_field($content, 'field_species_pop_global_date')) {
                    echo ' ('.render($content['field_species_pop_global_date']).')';
                }
            ?>
            </td>
        </tr>
    <?php
        } */
    ?>
    </tbody>
</table>
