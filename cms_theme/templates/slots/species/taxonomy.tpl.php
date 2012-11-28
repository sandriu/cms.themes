<div class="row span7">
    <table class="table table-condensed table-hover two-columns">
        <caption><?php echo t('Taxonomy'); ?></caption>
        <?php echo render($content['field_species_scientific_order']); ?>

        <?php
        if(check_display_field($content, 'field_species_class')) {
            echo render($content['field_species_class']);
        }
        
        if(check_display_field($content, 'field_species_order')) {
            echo render($content['field_species_order']);
        }
        
        if(check_display_field($content, 'field_species_family')) {
            echo render($content['field_species_family']);
        }
        ?>
        <tr>
            <th><?php echo t('Scientific name'); ?></th>
            <td><?php echo $node->title; ?></td>
        </tr>
        <?php
        if(check_display_field($content, 'field_species_author')) {
            echo render($content['field_species_author']);
        }
        
        if(check_display_field($content, 'field_species_standard_reference')) {
            echo render($content['field_species_standard_reference']);
        }
        
        ?>
    </table>
</div>