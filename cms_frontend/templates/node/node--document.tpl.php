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
            <div class="document-left profile col-md-8">
                <?php echo render($content['field_document_files']); ?>
                <?php render_slot($node, 'related-content', 'document', $content); ?>
            </div>

            <div class="document-right profile well col-md-4">
                <table class="table table-condensed table-hover two-columns">
                    <tbody>
                        <?php
                        echo render($content['field_document_number']);
                        echo render($content['field_instrument']);
                        echo render($content['field_document_type']);
                        echo render($content['field_document_status']);
                        echo render($content['field_document_publish_date']);
                        echo render($content['field_document_submitted_by']);
                        echo render($content['field_country']);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php
        hide($content['links']);
        hide($content['comments']);
    ?>
<?php endif; ?>
