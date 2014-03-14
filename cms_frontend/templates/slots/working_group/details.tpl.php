<table class="table table-condensed table-hover two-columns">
    <tbody>
        <?php echo render($content['title_field']); ?>
        <?php echo render($content['field_wg_instrument']); ?>
        <?php echo render($content['field_wg_meeting']); ?>
        <?php echo render($content['field_wg_publication']); ?>
        <?php echo render($content['field_wg_species']); ?>
        <?php echo render($content['field_wg_project']); ?>
        <?php if(check_display_field($content, 'field_wg_members')) { ?>
            <div class="field-label"><?php echo t('Documents'); ?> :</div>
            <?php print views_embed_view('working_group_documents_reorder','fe_list', $node->nid); ?>
            </div>
        <?php } ?>
    </tbody>
</table>
