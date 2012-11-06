<div class="row span7">
    <table class="table table-condensed table-hover two-columns">
        <caption><?php echo t('Taxonomy'); ?></caption>
        <?php echo render($content['field_species_scientific_order']); ?>
        <?php echo render($content['field_species_class']); ?>
        <?php echo render($content['field_species_order']); ?>
        <?php echo render($content['field_species_family']); ?>
        <tr>
            <th><?php echo t('Scientific name'); ?></th>
            <td><?php echo $node->title; ?></td>
        </tr>
        <?php echo render($content['field_species_subspecies']); ?>
    </table>
</div>