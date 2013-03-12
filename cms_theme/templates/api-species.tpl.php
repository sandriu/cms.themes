<?php
    if ((!check_display_field($content, 'field_species_range_states')) &&
        (!check_display_field($content, 'field_species_pop')) &&
        (!check_display_field($content, 'field_species_pop_size')) &&
        (!check_display_field($content, 'field_species_pop_trend')) &&
        (!check_display_field($content, 'field_species_status_per_country')) &&
        (!check_display_field($content, 'field_aewa_population_status')) &&
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
        render_slot('', 'population-status', 'species', $content);
        render_slot('', 'country-status', 'species', $content);
        render_slot('', 'threats', 'species', $content);
        render_slot('', 'notes', 'species', $content);
    }
?>

<div class="row">
    <div class="span5">
        <?php
            if ((isset($images)) && (!empty($images))) {
        ?>
        <div id="family-display-carousel" class="carousel slide img-polaroid species-carousel">
            <!-- Carousel items -->
            <div class="carousel-inner">
                <div class="active item">
                    <img src="<?php echo $images[0]; ?>" alt="" title="" class="species-custom-image" />
                </div>
            <?php
                unset($images[0]);
                if (isset($images) && (!empty($images))) {
                    foreach ($images as $index => $image) {
            ?>
                <div class="item">
                    <img src="<?php echo $image; ?>" alt="" title="" class="species-custom-image" />
                </div>
            <?php
                    }
                }
            ?>
            </div>

            <a class="carousel-control left" href="#family-display-carousel" data-slide="prev">&lsaquo;</a>
            <a class="carousel-control right" href="#family-display-carousel" data-slide="next">&rsaquo;</a>
        </div>
        <?php
            }
        ?>
    </div>
</div>
