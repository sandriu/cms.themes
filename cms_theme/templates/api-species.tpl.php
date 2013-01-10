<?php
    if ((!check_display_field($content, 'field_species_range_states')) &&
        (!check_display_field($content, 'field_species_pop')) &&
        (!check_display_field($content, 'field_species_pop_size')) &&
        (!check_display_field($content, 'field_species_pop_trend')) &&
        ($content['field_species_notes']['#items'][0]['value'] == NULL)) {
?>
<div class="alert alert-info">
    <strong>No information available.</strong> 
</div>
<?php
    }else {
        render_slot('', 'geographic-range', 'species', $content);
        render_slot('', 'population', 'species', $content);
        render_slot('', 'population-size', 'species', $content);
        render_slot('', 'population-trend', 'species', $content);
        render_slot('', 'notes', 'species', $content);
    }
?>
