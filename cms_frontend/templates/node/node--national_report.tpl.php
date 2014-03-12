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
        render_slot($node, 'node-buttons', 'general');
    ?>

    <div class="row">
        <div class="span6">
            <table class="table table-condensed table-hover two-columns">
                <tbody>
                <?php
                    echo render($content['field_nat_report_type']);
                    echo render($content['field_nat_report_country']);
                    echo render($content['field_nat_report_instrument']);
                    echo render($content['field_nat_report_receipt']);
                ?>
                </tbody>
            </table>
        </div>

        <div class="span6">
        <?php
            echo render($content['field_nat_report_remarks']);
        ?>
        </div>

        <div class="clearfix"></div>

        <div class="span12">
        <?php
            echo render_slot($node, 'related-content', 'national_report', $content);
        ?>
        </div>
    </div>

    <?php
        hide($content['links']);
        hide($content['comments']);
    ?>
<?php endif; ?>
