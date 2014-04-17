<?php
    $current_profile = CMSUtils::get_current_profile();
?>

<div class="row">
<?php
    render_slot($node, 'taxonomy', 'species', $content);
    render_slot($node, 'gallery', 'species');
?>
</div>

<?php
    render_slot($node, 'common-names', 'species', $content);
    render_slot($node, 'assessment', 'species', $content);
    render_slot($node, 'geographic-range', 'species', $content);
    render_slot($node, 'population', 'species', $content);
    render_slot($node, 'population-size', 'species', $content);

    render_slot($node, 'population-status', 'species', $content);
    render_slot($node, 'country-status', 'species', $content);

    render_slot($node, 'notes', 'species', $content);

    render_slot($node, 'related-content', 'species', $content);

    hide($content['links']);
    hide($content['comments']);

    drupal_add_js(drupal_get_path('theme', 'cms_manage') . DIRECTORY_SEPARATOR . 'js' . DIRECTORY_SEPARATOR . 'species.js');
?>
