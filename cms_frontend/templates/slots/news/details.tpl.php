<?php echo render($content['title_field']); ?>
<?php echo render($content['field_news_type']); ?>
<?php if(check_display_field($content, 'field_feature_in_common_portal')):?>
    <?php echo t('Feature in common portal'); ?>
<?php endif; ?>
<?php echo render($content['field_source_url']); ?>
<?php echo render($content['field_instruments']); ?>
<?php echo render($content['field_country']); ?>
<?php echo render($content['field_region']); ?>
<?php echo render($content['field_threats']); ?>
<?php echo render($content['field_species']); ?>
<?php echo render($content['field_species_group']); ?>
<?php echo render($content['field_news_further_resources']); ?>
<?php if (check_display_field($content, 'field_news_attachments')): ?>
    <?php echo render($content['field_news_attachments']); ?>
<?php endif; ?>

