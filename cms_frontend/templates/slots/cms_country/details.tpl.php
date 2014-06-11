<p class="text-center">
    <img src="<?php echo $node->country_flag_path; ?>"
         alt="<?php echo $node->title; ?>"/>
</p>
<table class="table table-condensed table-hover two-columns">
    <tbody>
        <?php echo render($content['field_country_official_name']); ?>
        <?php echo render($content['field_country_party_number']); ?>
        <?php echo render($content['field_region']); ?>
        <?php echo render($content['field_country_entry_into_force']); ?>
        <?php if(check_display_field($content, 'field_country_member_to_stc')):?>
            <?php echo t('Member to StC'); ?>
        <?php endif; ?>
        <?php echo render($content['field_country_date_of_accession']); ?>
        <?php echo render($content['field_country_date_of_acceptance']); ?>
    </tbody>
</table>
<?php echo render($node->nfp_contacts); ?>
