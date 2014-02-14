<?php
if(check_display_field($content, 'field_species_range_states') || check_display_field($content, 'field_species_range_states_notes')) {
    ?>
    <table class="table table-condensed table-hover two-columns">
        <caption><?php echo t('Geographic range'); ?></caption>
        <tbody>
        <?php
        if (check_display_field($content, 'field_species_range_states')) {
            ?>
            <tr>
                <th><?php echo t('Countries'); ?></th>
                <td><?php echo render($content['field_species_range_states']); ?></td>
            </tr>
        <?php
        }
        /*
        if (check_display_field($content, 'field_species_range_states_notes')) {
            echo render($content['field_species_range_states_notes']); ?>
        }
	    */

        ?>
        <tr>
            <td colspan="2"><?php echo drupal_ammap_render_map($node->ammap_data, array('legend'=>false)); ?></td>
        </tr>

        </tbody>
    </table>
<?php
}
?>
