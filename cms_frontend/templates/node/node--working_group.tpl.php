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
    </div>
<?php else: ?>
    <div class="container">
        <div class="row">
            <div class="working-group-profile-left profile col-md-8">
                <?php echo render($content['body']); ?>                 
                <span class="text-muted">
                    <?php print t('Last updated on').' '.format_date($node->changed, 'custom', 'd F Y'); ?>
                </span>      
            </div>

            <div class="working-group-profile-right profile well col-md-4">
                <?php render_slot($node, 'details', 'working_group', $content); ?>
            </div>
        </div> 
        <div class="row">
            <div class="working-group-full-width profile col-md-12">
                <?php if(check_display_field($content, 'field_wg_members')) echo render($content['field_wg_members']); ?>
            </div>
        </div>
    </div>
<?php endif; ?>