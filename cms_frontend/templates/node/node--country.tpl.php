<?php if ($teaser): ?>
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
            <span class="text-muted"><?php print format_date($node->changed, 'custom', 'd F Y'); ?></span>
        </div>
        <?php print render($content['links']); ?>
    </div>
<?php else: ?>
    <div class="container">
        <div class="row">
            <div class="country-profile-left profile col-md-8">
                <?php echo render($content['body']); ?>
                <div id="gmap" style="height: 300px;"></div>
                <?php
                render_slot($node, 'national_reports', 'cms_country', $content);
                render_slot($node, 'ratification_status', 'cms_country', $content);
                ?>
            </div>

            <?php ob_start(); render_slot($node, 'details', 'cms_country', $content); $details = ob_get_contents(); ob_end_clean(); ?>
            <?php if (!empty($details)): ?>
                <div class="country-profile-right profile well col-md-4">
                    <?php echo $details; ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="row">
            <div class="country-full-width profile col-md-12">
                <?php
                render_slot($node, 'related-content', 'cms_country', $content);
                hide($content['links']);
                hide($content['comments']);
                ?>
            </div>
        </div>
    </div>
<?php endif; ?>
