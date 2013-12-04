<h3 class="muted">
    <?php
        echo t('Related content');
    ?>
</h3>

<ul class="nav nav-tabs" id="related-content-tabs">
    <?php
        render_tab(t('Species'), 'related-content-species', 'active', 'field_project_species', TRUE, $content);
        render_tab(t('National Plans'), 'related-content-national-plans', '', 'field_project_nat_plan', TRUE, $content);
        render_tab(t('National Reports'), 'related-content-national-reports', '', 'field_project_national_reports', TRUE, $content);
        render_tab(t('Other documents'), 'related-content-documents', '', 'field_project_document', TRUE, $content);
        render_tab(t('Publications'), 'related-content-publications', '', 'field_project_publication', TRUE, $content);
        render_tab(t('Meetings'), 'related-content-meetings', '', 'field_project_meeting', TRUE, $content);
        render_tab(t('Threats'), 'related-content-threats', '', 'field_project_threat', TRUE, $content);
    ?>
</ul>

<div class="tab-content">
    <div class="tab-pane active loaded" id="related-content-species">
        <?php
            echo views_embed_view('species_admin', 'project_species', $node->nid);
        ?>
    </div>

    <div class="tab-pane" id="related-content-national-plans">
        <?php
            echo views_embed_view('documents', 'project_national_plans', $node->nid);
        ?>
    </div>

    <div class="tab-pane" id="related-content-national-reports">
        <?php
            echo views_embed_view('documents', 'project_national_reports', $node->nid);
        ?>
    </div>

    <div class="tab-pane" id="related-content-documents">
        <?php
            echo views_embed_view('documents', 'project_other_documents', $node->nid);
        ?>
    </div>

    <div class="tab-pane" id="related-content-publications">
        <?php
            echo views_embed_view('publications_admin', 'project_publications', $node->nid);
        ?>
    </div>

    <div class="tab-pane" id="related-content-meetings">
        <?php
            echo views_embed_view('meetings', 'project_meetings', $node->nid);
        ?>
    </div>
        <div class="tab-pane" id="related-content-threats">
        <?php
            if (check_display_field($content, 'field_project_threat')) {
                echo render($content['field_project_threat']);
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
