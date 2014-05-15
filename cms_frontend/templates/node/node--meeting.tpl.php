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
        <div class="meeting-left profile col-md-8">
          <div id="gmap" style="height: 300px;"></div>
          <small class="text-muted"><strong><?php echo t('The location on the map is approximate!'); ?></strong></small>
          <?php echo render($content['body']); ?>
        </div>

      <div class="col-md-4 profile">
          <div class="meeting-right well">
              <?php
              echo render($content['field_meeting_image']);
              ?>

              <table class="table table-condensed table-hover two-columns">
                  <tbody>
                  <?php
                  echo render($content['field_meeting_start']);
                  echo render($content['field_meeting_start_time']);
                  echo render($content['field_meeting_end']);
                  echo render($content['field_meeting_reg_deadline']);
                  echo render($content['field_meeting_organizer']);
                  echo render($content['field_meeting_coorganizer']);
                  echo render($content['field_instrument']);
                  echo render($content['field_meeting_type']);
                  echo render($content['field_meeting_kind']);
                  echo render($content['field_meeting_status']);
                  echo render($content['field_meeting_languages']);
                  #echo render($content['field_meeting_url']);
                  echo render($content['field_country']);
                  echo render($content['field_meeting_city']);
                  echo render($content['field_meeting_location']);
                  ?>
                  </tbody>
              </table>

              <table class="table table-condensed table-hover two-columns">
                  <tbody>
                  <?php
                  echo render($content['field_meeting_address']);
                    echo render($content['field_meeting_publication']);
                  ?>
                  </tbody>
              </table>


              <?php
              hide($content['links']);
              hide($content['comments']);
              ?>
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

      <div class="row">
        <div class="meeting-full-width profile col-md-12">


            <?php
            $lang = field_language('node', $node, 'field_meeting_document');
            if (!empty($node->field_meeting_document[$lang])) { ?>
                <p class="text-center">
                    <a class="btn btn-primary" href="/meeting/download-all-files/<?php echo $node->nid; ?>" target="_blank">
                        <?php echo t('Download all files as .zip'); ?>
                    </a>
                </p>

                <div class="panel-group" id="accordion">

            <?php
                $types = array();
                foreach ($node->field_meeting_document[$lang] as $document) {
                    if ($document['entity']->status == 1) {
                        foreach ($document['entity']->field_document_type[$lang] as $term) {
                            if(!in_array($term['tid'], $types)) {
                                $types []= $term['tid'];
                            }
                        }
                    }
                }
                foreach ($types as $tid) {
                    $type_term = taxonomy_term_load($tid);
            ?>

                        <div class="panel panel-default"><div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse<?php echo $tid; ?>" class="collapsed">
                                        <?php echo t($type_term->name); ?>
                                        <span class="pull-right text-muted help-text-expand">
                                            <?php echo t('Expand'); ?>
                                        </span>
                                        <span class="pull-right text-muted help-text-collapse">
                                            <?php echo t('Collapse'); ?>
                                        </span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse<?php echo $tid; ?>" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <?php print views_embed_view('meeting_documents_list_reorder','m_d_list_fe', $node->nid, $tid); ?>
                                </div>
                            </div>
                        </div>

            <?php

                }
            ?>

                </div>

            <?php
            }
            ?>
        </div>
      </div>
    </div>
<?php endif; ?>
