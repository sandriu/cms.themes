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
    <div class="container">
        <div class="row">
            <div class="news-profile-left profile col-md-8">
                <?php echo render($content['body']); ?> 
                <?php echo render($content['field_featured_image']); ?> 
                <span class="text-muted">
                    <?php if (!$teaser) print 'Last updated on'; ?> <?php print format_date($node->changed, 'custom', 'd F Y'); ?>
                </span>      
            </div>

            <div class="news-profile-right profile well col-md-4">
                <?php
                render_slot($node, 'details', 'news', $content);
                ?>
            </div>
        </div> 
    </div>
<?php endif; ?>