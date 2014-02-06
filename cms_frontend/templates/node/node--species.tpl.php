<?php
    $current_profile = CMSUtils::get_current_profile();

    #render_slot($node, 'node-buttons-actions', 'general');
?>

<div class="container">
  <div class="row">
    <div class="species-left-column profile col-md-8">
    <?php
        render_slot($node, 'assessment', 'species', $content);
        render_slot($node, 'geographic-range', 'species', $content);
        render_slot($node, 'related-content', 'species', $content);
    ?>
    </div>

    <div class="species-right-column profile well col-md-4">
    <?php
        render_slot($node, 'gallery', 'species');
        render_slot($node, 'common-names', 'species', $content);
        render_slot($node, 'taxonomy', 'species', $content);

        #render_slot($node, 'population', 'species', $content);
        #render_slot($node, 'population-size', 'species', $content);
        #render_slot($node, 'population-status', 'species', $content);
        #render_slot($node, 'country-status', 'species', $content);
        #render_slot($node, 'notes', 'species', $content);

        hide($content['links']);
        hide($content['comments']);

        drupal_add_js(drupal_get_path('theme', $GLOBALS['theme']) . DIRECTORY_SEPARATOR . 'js' . DIRECTORY_SEPARATOR . 'species.js');
    ?>
    </div>
  </div>
</div>