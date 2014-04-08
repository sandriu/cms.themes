<h3 class="text-muted">
    <?php
    echo t('Related content');
    ?>
</h3>

<ul class="nav nav-tabs" id="related-content-tabs">
    <?php

    $first_tab = 'active';
    if (!empty($node->related_data['species']['count'])) {
        render_tab_view(t('Species'), 'related-content-species', $first_tab, $node->related_data['species']['count']);
        $first_tab = '';
    }

    if (!empty($node->related_data['projects']['count'])) {
        render_tab_view(t('Projects'), 'related-content-projects', $first_tab, $node->related_data['projects']['count']);
        $first_tab = '';
    }

    if (!empty($node->related_data['publications']['count'])) {
        render_tab_view(t('Publications'), 'related-content-publications', $first_tab, $node->related_data['publications']['count']);
        $first_tab = '';
    }

    $lang = field_language('node', $node, 'field_threats');
    if (!empty($node->field_threats[$lang])) {
        render_tab_view(t('Threats'), 'related-content-threats', $first_tab, count($node->field_threats[$lang]));
    }

    if (!empty($node->participants)) {
        render_tab_view(t('Participants'), 'related-content-participants', $first_tab, count($node->participants));
    }

    render_tab_view(t('Documents'), 'related-content-documents', $first_tab, '');

    ?>
</ul>

<div class="tab-content">
    <?php
    $first_tab = 'active loaded';
    if (!empty($node->related_data['species']['count'])) {
        render_tab_content_view('related-content-species', $first_tab,
            $node->related_data['species']['view_name'], $node->related_data['species']['view_display'], $node->nid);
        $first_tab = '';
    }

    if (!empty($node->related_data['projects']['count'])) {
        render_tab_content_view('related-content-projects', $first_tab,
            $node->related_data['projects']['view_name'], $node->related_data['projects']['view_display'], $node->nid);
        $first_tab = '';
    }


    if (!empty($node->related_data['publications']['count'])) {
        render_tab_content_view('related-content-publications', $first_tab,
            $node->related_data['publications']['view_name'], $node->related_data['publications']['view_display'], $node->nid);
        $first_tab = '';
    }

    if (!empty($node->related_data['meetings']['count'])) {
        render_tab_content_view('related-content-meetings', $first_tab,
            $node->related_data['meetings']['view_name'], $node->related_data['meetings']['view_display'], $node->nid);
        $first_tab = '';
    }
    ?>


    <?php if (!empty($node->field_threats[$lang])) { ?>
        <div class="tab-pane <?php echo $first_tab; ?>" id="related-content-threats">
            <?php echo render($content['field_threats']); ?>
        </div>
        <?php $first_tab = ''; ?>
    <?php } ?>

    <?php if (!empty($node->participants)) { ?>
        <div class="tab-pane" id="related-content-participants">
            <?php
            foreach ($node->participants as $participant) {
                echo '<a href="/contacts/item/' . $participant['uid'][0] . '/' . $participant['conventions'][0] . '/view">' . $participant['cn'][0]  . '</a>';
                echo '<br />';
            }
            ?>
        </div>
        <?php $first_tab = ''; ?>
    <?php } ?>
    <div class="tab-pane <?php echo $first_tab; ?>" id="related-content-documents">
        <?php
        $langcode = field_language('node', $node, 'field_meeting_document');
        if (!empty($node->field_meeting_document[$langcode])) {
            $types = array();
            foreach ($node->field_meeting_document[$langcode] as $document) {
                if ($document['entity']->status == 1) {
                    foreach ($document['entity']->field_document_type[$langcode] as $term) {
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
