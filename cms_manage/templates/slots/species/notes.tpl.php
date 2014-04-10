<?php if(!empty($content['field_species_critical_sites']['#items'][0]['value']) 
        || !empty($content['field_species_notes']['#items'][0]['value'])): ?>
    <table class="table table-condensed table-hover two-columns views-table">
        <caption><?php echo t('Other details'); ?></caption>
        <tbody>
            <?php
                if(!empty($content['field_species_critical_sites']['#items'][0]['value'])) {
                    echo render($content['field_species_critical_sites']);
                }

                if(!empty($content['field_species_notes']['#items'][0]['value'])) {
                    echo render($content['field_species_notes']);
                }
            ?>
        </tbody>
    </table>
<?php endif; ?>