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
          <div class="instrument-left profile col-md-8">
            <?php
              echo render($content['body']);
              render_slot($node, 'details', 'legal_instrument', $content);
            ?>
          </div>

          <div class="col-md-4 profile instrument-sidebar">
              <?php echo render($content['instrument_list']); ?>
              <div class="instrument-right well">
                  <table class="table table-condensed table-hover two-columns">
                      <tbody>
                      <?php
                      echo render($content['field_picture']);
                      echo render($content['field_instrument_name']);
                      echo render($content['field_instrument_type']);
                      echo render($content['field_languages']);
                      echo render($content['field_instrument_depositary']);
                      echo render($content['field_instrument_signature']);
                      echo render($content['field_instrument_in_effect']);
                      echo render($content['field_instrument_actual_effect']);
                      echo render($content['field_instrument_website']);
                      echo render($content['field_instrument_other']);
                      render_slot($node, 'attachments', 'legal_instrument', $content);
                      $content['contacts'] = $node->contacts;
                      echo render($content['contacts']);
                      ?>
                      </tbody>
                  </table>
              </div>

              <?php
              $sidebar_blocks = block_get_blocks_by_region('sidebar_second');
              unset($sidebar_blocks['#sorted']);
              ?>
              <!-- Render sidebar blocks -->
              <?php if (!empty($sidebar_blocks)) { ?>
                  <?php foreach($sidebar_blocks as $block) { ?>
                      <div class="well">
                          <?php print render($block); ?>
                      </div>
                  <?php } ?>
              <?php } ?>
          </div>


      </div>

        <?php if (CMSUtils::get_current_profile() == 'cms') { ?>
        <div class="row">
            <div class="instrument-full-width profile col-md-12">
            <?php
                render_slot($node, 'related-content', 'legal_instrument', $content);
            ?>
            </div>
        </div>
        <?php } ?>

    </div>
<?php endif; ?>
