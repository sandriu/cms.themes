<?php
    if($content['field_species_notes']['#items'][0]['value'] !== NULL) {
?>
<strong><?php echo t('Notes'); ?></strong>

<div>
    <?php echo render($content['field_species_notes']); ?>
</div>
<?php
    }
?>