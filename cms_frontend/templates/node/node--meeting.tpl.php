
<div class="container">
  <div class="row">
    <div class="meeting-left profile col-md-8">
      <?php echo render($content['field_meeting_description']); ?>
      <div id="gmap" style="height: 300px;"></div>
    </div>

    <div class="meeting-right well profile col-md-4">
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
            echo render($content['field_meeting_country']);
            echo render($content['field_meeting_city']);
          ?>
        </tbody>
      </table>

      <table class="table table-condensed table-hover two-columns">
        <tbody>
          <?php
              echo render($content['field_meeting_address']);
          ?>
        </tbody>
      </table>

      <?php
        hide($content['links']);
        hide($content['comments']);
      ?>
    </div>
  </div>

  <div class="row">
    <div class="meeting-full-width profile col-md-12">
      <?php
        if (!empty($node->field_meeting_document[$node->language])) {
            $types = array();
            foreach ($node->field_meeting_document[$node->language] as $document) {
                if ($document['entity']->status == 1) {
                    foreach ($document['entity']->field_document_type[$node->language] as $term) {
                        if(!in_array($term['tid'], $types)) {
                            $types []= $term['tid'];
                        }
                    }
                }
            }
            foreach ($types as $tid) {
                $type_term = taxonomy_term_load($tid);
        ?>
                <h4><?php echo $type_term->name; ?></h4>
        <?php
                print views_embed_view('meeting_documents_list_reorder','m_d_list', $node->nid, $tid);
            }
        }
      ?>
    </div>
  </div>
</div>