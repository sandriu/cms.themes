<?php if(check_display_field($content, 'title_field') ||
        check_display_field($content, 'field_instrument') ||
        check_display_field($content, 'field_award_recipient') ||
        check_display_field($content, 'field_award_sponsor') ||
        check_display_field($content, 'field_award_species') ||
        check_display_field($content, 'field_award_meetings') ||
        check_display_field($content, 'field_award_documents') ||
        check_display_field($content, 'field_related_publications')): ?>
    <table class="table table-condensed table-hover two-columns">
        <tbody>
            <?php echo render($content['title_field']); ?>        
            <?php echo render($content['field_instrument']); ?>
            <?php echo render($content['field_award_recipient']); ?>
            <?php echo render($content['field_award_sponsor']); ?>
            <?php echo render($content['field_award_species']); ?>
            <?php echo render($content['field_award_meetings']); ?>
            <?php echo render($content['field_award_documents']); ?>
            <?php echo render($content['field_related_publications']); ?>
        </tbody>
    </table>
<?php endif; ?>
