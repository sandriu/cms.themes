<?php if(check_display_field($content, 'title_field') ||
        check_display_field($content, 'field_instrument') ||
        check_display_field($content, 'field_wg_meeting') ||
        check_display_field($content, 'field_wg_publication') ||
        check_display_field($content, 'field_wg_species') ||
        check_display_field($content, 'field_wg_project') ||
        check_display_field($content, 'field_wg_document')): ?>
    <table class="table table-condensed table-hover two-columns">
        <tbody>
            <?php echo render($content['title_field']); ?>
            <?php echo render($content['field_instrument']); ?>
            <?php echo render($content['field_wg_meeting']); ?>
            <?php echo render($content['field_wg_publication']); ?>
            <?php echo render($content['field_wg_species']); ?>
            <?php echo render($content['field_wg_project']); ?>
            <?php if(check_display_field($content, 'field_wg_document')) { ?>
                <div class="field-label"><?php echo t('Documents'); ?> :</div>
                <?php print views_embed_view('working_group_documents_reorder','fe_list', $node->nid); ?>
                </div>
            <?php } ?>
        </tbody>
    </table>
<?php endif; ?>
