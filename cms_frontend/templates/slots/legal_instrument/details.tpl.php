<?php
    if (check_display_field($content, 'title') ||
        check_display_field($content, 'field_instrument_name') ||
        check_display_field($content, 'field_country') ||
        check_display_field($content, 'field_instrument_depositary') ||
        check_display_field($content, 'field_instrument_secretariat') ||
        check_display_field($content, 'field_instrument_sponsor')) {
?>

<!-- table moved to node--legal_instrument.tpl.php -->
<?php
    }
?>

<?php if ($node->ammap_data) { ?>
<h3>
    <?php echo t('Countries'); ?>
</h3>
<?php
    echo drupal_ammap_render_map($node->ammap_data, array('legend' => true));
    echo views_embed_view('front_end_countries', 'instrument_list', $node->nid);
}
?>
