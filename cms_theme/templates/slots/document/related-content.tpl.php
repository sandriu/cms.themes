<h3 class="muted">
    <?php
        echo t('Related content');
    ?>
</h3>

<ul class="nav nav-tabs" id="related-content-tabs">
    <?php
        render_tab(t('Species'), 'related-content-species', 'active', 'field_document_species', TRUE, $content);
        render_tab(t('Publications'), 'related-content-publication', '', 'field_document_publication', TRUE, $content);
        render_tab(t('Meetings'), 'related-content-meeting', '', 'field_document_meeting', TRUE, $content);
        render_tab(t('Projects'), 'related-content-project', '', 'field_document_project', TRUE, $content);
        render_tab(t('Threats'), 'related-content-threats', '', 'field_document_threats', TRUE, $content);
    ?>
</ul>

<div class="tab-content">
    <div class="tab-pane active loaded" id="related-content-species">
        <?php
            echo views_embed_view('species_admin', 'plan_species', $node->nid);
            echo views_embed_view('species_admin', 'national_report_species', $node->nid);
            echo views_embed_view('species_admin', 'other_document_species', $node->nid);
        ?>
    </div>

    <div class="tab-pane" id="related-content-publication">
        <?php
            echo views_embed_view('publications_admin', 'plan_publications', $node->nid);
            echo views_embed_view('publications_admin', 'national_report_publications', $node->nid);
        ?>
    </div>

    <div class="tab-pane" id="related-content-meeting">
        <?php
            echo views_embed_view('meetings', 'document_meetings', $node->nid);
        ?>
    </div>

    <div class="tab-pane" id="related-content-project">
        <?php
            echo views_embed_view('project_admin', 'plan_projects', $node->nid);
            echo views_embed_view('project_admin', 'national_report_projects', $node->nid);
            echo views_embed_view('project_admin', 'other_document_projects', $node->nid);
        ?>
    </div>

    <div class="tab-pane" id="related-content-threats">
        <?php
            if (check_display_field($content, 'field_document_threats')) {
                echo render($content['field_document_threats']);
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
</div>
