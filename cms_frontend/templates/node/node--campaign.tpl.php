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
        </div>
        <?php print render($content['links']); ?>
    </div>
<?php else: ?>
    <div class="container">
        <div class="row">
            <div class="campaign-profile-left profile col-md-8">
                <?php echo render($content['body']); ?>
                <?php echo render($content['field_campaign_picture']); ?>
                <span class="text-muted">
                    <?php print t('Last updated on').' '.format_date($node->changed, 'custom', 'd F Y'); ?>
                </span>
            </div>
            <?php ob_start(); render_slot($node, 'details', 'campaign', $content); $details = ob_get_contents(); ob_end_clean(); ?>

            <?php
            $sidebar_blocks = block_get_blocks_by_region('sidebar_second');
            unset($sidebar_blocks['#sorted']);
            ?>

            <?php if(!empty($details) || !empty($sidebar_blocks)): ?>
                <div class="col-md-4 profile">
                <?php if(!empty($details)) { ?>
                    <div class="campaign-profile-right well">
                        <?php echo $details; ?>
                    </div>
                <?php } ?>

                <!-- Render sidebar blocks -->
                <?php if (!empty($sidebar_blocks)) { ?>
                    <?php foreach($sidebar_blocks as $block) { ?>
                        <div class="well">
                            <?php print render($block); ?>
                        </div>
                    <?php } ?>
                <?php } ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
<?php endif; ?>