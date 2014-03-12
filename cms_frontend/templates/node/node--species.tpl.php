<?php if($teaser): ?>
    <div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
        <?php print render($title_prefix); ?>
        <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
        <?php print render($title_suffix); ?>

        <div class="content article-body"<?php print $content_attributes; ?>>
            <?php
              // We hide the comments and links now so that we can render them later.
              hide($content['comments']);
              hide($content['links']);
              print render($content);
            ?>
            <span class="text-muted"><?php print format_date($node->changed,'custom','d F Y'); ?></span>
        </div>
        <?php print render($content['links']); ?>        
    </div>
<?php else: ?>
    <?php
        $current_profile = CMSUtils::get_current_profile();

        #render_slot($node, 'node-buttons-actions', 'general');
    ?>

    <div class="container">
      <div class="row">
        <div class="species-left-column profile col-md-8">
        <?php
            echo render($content['field_body']);
            render_slot($node, 'assessment', 'species', $content);
            render_slot($node, 'geographic-range', 'species', $content);
            render_slot($node, 'country-status', 'species', $content);
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
            #render_slot($node, 'notes', 'species', $content);

            hide($content['links']);
            hide($content['comments']);

            drupal_add_js(drupal_get_path('theme', $GLOBALS['theme']) . DIRECTORY_SEPARATOR . 'js' . DIRECTORY_SEPARATOR . 'species.js');
        ?>
        </div>
      </div>
    </div>
<?php endif; ?>