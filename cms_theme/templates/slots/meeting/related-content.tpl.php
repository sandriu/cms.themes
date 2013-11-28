<h3 class="muted">
    <?php
        echo t('Related content');
    ?>
</h3>

<ul class="nav nav-tabs" id="related-content-tabs">
    <?php
        render_tab(t('Species'), 'related-content-species', 'active', 'field_meeting_species', TRUE, $content);
        render_tab(t('Documents'), 'related-content-documents', '', 'field_meeting_document', TRUE, $content);
        render_tab(t('Publications'), 'related-content-publications', '', 'field_meeting_publication', TRUE, $content);
        render_tab(t('Threats'), 'related-content-threats', '', 'field_meeting_threats', TRUE, $content);
        render_tab(t('Participants'), 'related-content-participants', '', 'field_meeting_participants', TRUE, $content);
    ?>
</ul>

<div class="tab-content">
    <div class="tab-pane active loaded" id="related-content-species">
        <?php
            if (check_display_field($content, 'field_meeting_species')) {
                echo render($content['field_meeting_species']);
            } else {
        ?>
        <p class="text-warning">
        <?php
                echo t('No related species');
        ?>
        </p>
        <?php
            }
        ?>
    </div>

    <div class="tab-pane" id="related-content-documents">
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


    <div class="tab-pane" id="related-content-publications">
        <?php
            if (check_display_field($content, 'field_meeting_publication')) {
                echo render($content['field_meeting_publication']);
            }else {
        ?>
        <p class="text-warning">
        <?php
                echo t('No related publications');
        ?>
        </p>
        <?php
            }
        ?>
    </div>

    <div class="tab-pane" id="related-content-threats">
        <?php
            if (check_display_field($content, 'field_meeting_threats')) {
                echo render($content['field_meeting_threats']);
            }else {
        ?>
        <p class="text-warning">
        <?php
                echo t('No related threats');
        ?>
        </p>
        <?php
            }
        ?>
    </div>

    <div class="tab-pane" id="related-content-participants">
        <?php
            if (isset($node->participants) && (!empty($node->participants))) {
                foreach ($node->participants as $participant) {
                    echo '<a href="/contacts/item/' . $participant['uid'][0] . '/' . $participant['conventions'][0] . '/view">' . $participant['cn'][0]  . '</a>';
                    echo '<br />';
                }
        ?>
        <?php
            }else {
        ?>
        <p class="text-warning">
        <?php
                echo t('No participants from Contacts database.');
        ?>
        </p>
        <?php
            }
        ?>
    </div>
</div>
