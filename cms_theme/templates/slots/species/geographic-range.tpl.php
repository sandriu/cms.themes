 <?php
    if(check_display_field($content, 'field_species_range_states')) {
?>
<table class="table table-condensed table-hover two-columns">
    <caption><?php echo t('Geographic range'); ?></caption>
    <tbody>
        <tr>
            <th><?php echo t('Countries'); ?></th>
            <td><?php echo render($content['field_species_range_states']); ?></td>
        </tr>
        <tr>
            <th><?php echo t('Notes'); ?></th>
            <td><?php echo render($content['field_species_range_states_notes']); ?></td>
        </tr>
    </tbody>
</table>
<?php
    }
?>