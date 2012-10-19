<?php
    render_slot($node, 'node-buttons', 'general');
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
    render_slot($node, 'population-trend', 'species', $content);
    render_slot($node, 'notes', 'species', $content);

    hide($content['links']);
    hide($content['comments']);
?>
