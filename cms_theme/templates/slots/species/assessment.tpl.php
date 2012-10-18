<table class="table table-condensed table-hover two-columns">
    <caption><?php echo t('Assessment information'); ?></caption>
    <tbody>
        <?php echo render($content['field_species_iucn_status']); ?>
        <?php echo render($content['field_species_iucn_web_srv']); ?>
        <?php echo render($content['field_species_concerted_action']); ?>
        <?php echo render($content['field_species_cooperative_action']); ?>
        <?php echo render($content['field_species_appendix']); ?>
        <?php echo render($content['field_species_appendix_1_date']); ?>
        <?php echo render($content['field_species_appendix_2_date']); ?>
        <?php echo render($content['field_species_instruments']); ?>
    <?php
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
        }
    ?>
    </tbody>
</table>
