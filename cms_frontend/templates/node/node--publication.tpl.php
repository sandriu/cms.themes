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
    </div>
<?php else: ?>
    <div class="container">
      <div class="row">
          <div class="publication-left profile col-md-8">
            <?php
              echo render($content['body']);
              ?><br />
              <?php
              echo render($content['field_publication_attachment']);
              ?><br />
              <?php
              echo render_slot($node, 'related-content', 'publication', $content);
            ?>
          </div>

          <div class="publication-right profile well col-md-4">
            <div class="publication-thumbnail">
              <?php
                  if (!empty($node->field_publication_image) && count($node->field_publication_image[$node->language])) {
              ?>
              <div id="myCarousel" class="carousel slide img-polaroid publication-carousel">
                  <?php
                  echo render($content['field_publication_image']);
                  ?>

                  <?php if (count($node->field_publication_image[$node->language]) > 1) { ?>
                  <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
                  <?php } ?>
                </div>
                <?php
                    } else {
                ?>
              <div class="alert alert-info species-alert">
                  <p>
                      <?php echo t('No pictures for ') . $node->title; ?>
                  </p>
              </div>
              <?php
                  }
              ?>
            </div>
            <hr />

            <table class="table table-condensed table-hover two-columns">
              <tbody>
                <?php echo render($content['field_publication_author']); ?>
                <?php echo render($content['field_publication_co_authors']); ?>
                <?php echo render($content['field_publication_published_date']); ?>
                <?php echo render($content['field_publication_language']); ?>
                <?php echo render($content['field_publication_publisher']); ?>
                <?php echo render($content['field_publication_city']); ?>
                <?php echo render($content['field_country']); ?>
                <?php echo render($content['field_publication_type']); ?>
                <?php echo render($content['field_publication_edition']); ?>
                <?php echo render($content['field_publication_order_code']); ?>
                <?php echo render($content['field_instrument']); ?>
                <?php echo render($content['field_publication_source']); ?>
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
<script type="text/javascript">
    jQuery('a[rel="popover"]').popover();
</script>