<h2 class="muted">
    <?php
        echo t('Family display');
    ?>
</h2>

<a href="#" class="back-button btn btn-sm btn-info">&laquo; <?php echo t('Go back'); ?></a>

<div class="clearfix">&nbsp;</div>

<input type="hidden" name="scientific_name" id="scientific-name-holder" value="<?php echo $slug; ?>" />

<div class="row">
    <?php
        render_slot($node, 'taxonomy', 'species', $content);
        render_slot($node, 'gallery', 'species');
    ?>
</div>

<?php
    render_slot($node, 'common-names', 'species', $content);
    render_slot($node, 'assessment', 'species', $content);

    $tabs = get_available_tabs($node, 'species');
    render_family_tabs($tabs, 'species', 'family', '');
    $current_profile = CMSUtils::get_current_profile();
?>
<div class="tab-content">
    <div class="tab-pane active loaded" id="<?php echo $tabs['current']; ?>">
    <?php
    if ((check_display_field($content, 'field_species_range_states') == NULL) &&
        (check_display_field($content, 'field_species_pop') == NULL) &&
        (check_display_field($content, 'field_species_pop_size') == NULL) &&
        (check_display_field($content, 'field_species_pop_trend') == NULL) &&
        (check_display_field($content, 'field_aewa_population_status') == NULL) &&
        (check_display_field($content, 'field_species_pop_notes') == NULL)) {
    ?>
    <div class="alert alert-info">
        <strong>No information available.</strong>
    </div>
    <?php
        }else {
            render_slot($node, 'geographic-range', 'species', $content);
            render_slot($node, 'population', 'species', $content);
            render_slot($node, 'population-size', 'species', $content);
            render_slot($node, 'population-trend', 'species', $content);
            render_slot($node, 'population-status', 'species', $content);
            render_slot($node, 'country-status', 'species', $content);
            render_slot($node, 'notes', 'species', $content);
        }
    ?>
    </div>

    <?php
        if (!empty($tabs['available'])) {
            foreach ($tabs['available'] as $name => $tab) {
    ?>
    <div class="tab-pane" id="<?php echo $name; ?>">
    </div>
    <?php
            }
        }
    ?>
</div>

<?php
    drupal_add_js(drupal_get_path('theme', 'cms_manage') . DIRECTORY_SEPARATOR . 'js' . DIRECTORY_SEPARATOR . 'species.js');
?>
