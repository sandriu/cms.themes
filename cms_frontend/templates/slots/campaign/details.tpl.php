<?php if(check_display_field($content, 'title_field') ||
        check_display_field($content, 'field_campaign_sponsor') ||
        check_display_field($content, 'field_campaign_patron') ||
        check_display_field($content, 'field_campaign_type') ||
        check_display_field($content, 'field_campaign_duration') ||
        check_display_field($content, 'field_campaign_link') ||
        check_display_field($content, 'field_country') ||
        check_display_field($content, 'field_instrument') ||
        check_display_field($content, 'field_campaign_species') ||
        check_display_field($content, 'field_campaign_projects') ||
        check_display_field($content, 'field_campaign_publications') ||
        check_display_field($content, 'field_campaign_meetings') ||
        check_display_field($content, 'field_campaign_documents')): ?>
    <table class="table table-condensed table-hover two-columns">
        <tbody>
            <?php echo render($content['title_field']); ?>        
            <?php echo render($content['field_campaign_sponsor']); ?>
            <?php echo render($content['field_campaign_patron']); ?>
            <?php echo render($content['field_campaign_type']); ?>
            <?php echo render($content['field_campaign_duration']); ?>
            <?php echo render($content['field_campaign_link']); ?>
            <?php echo render($content['field_country']); ?>
            <?php echo render($content['field_instrument']); ?>
            <?php echo render($content['field_campaign_species']); ?>
            <?php echo render($content['field_campaign_projects']); ?>
            <?php echo render($content['field_campaign_publications']); ?>
            <?php echo render($content['field_campaign_meetings']); ?>
            <?php echo render($content['field_campaign_documents']); ?>        
        </tbody>
    </table>
<?php endif; ?>
