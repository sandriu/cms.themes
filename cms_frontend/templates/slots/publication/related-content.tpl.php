<h3 class="muted">
    <?php
        echo t('Related content');
    ?>
</h3>

<ul class="nav nav-tabs" id="related-content-tabs">
    <?php
        render_tab(t('Species'), 'related-content-species', 'active', 'field_publication_species', TRUE, $content);
        render_tab(t('Meetings'), 'related-content-meetings', '', 'field_publication_meeting', TRUE, $content);
        render_tab(t('Plans'), 'related-content-plans', '', 'field_publication_plans', TRUE, $content);
        render_tab(t('National Reports'), 'related-content-national-reports', '', 'field_publication_nat_report', TRUE, $content);
        render_tab(t('Projects'), 'related-content-projects', '', 'field_publication_project', TRUE, $content);
        render_tab(t('Regions'), 'related-content-regions', '', 'field_publication_regions', TRUE, $content);
        render_tab(t('Threats'), 'related-content-threats', '', 'field_publication_threats', TRUE, $content);
    ?>
</ul>

<div class="tab-content">
    <div class="tab-pane active loaded" id="related-content-species">
        <?php
            echo views_embed_view('species_admin', 'publication_species', $node->nid);
        ?>
    </div>

    <div class="tab-pane loaded" id="related-content-meetings">
        <?php
            echo views_embed_view('meetings', 'publication_meetings', $node->nid);
        ?>
    </div>

    <div class="tab-pane loaded" id="related-content-plans">
        <?php
            echo views_embed_view('documents', 'publication_plans', $node->nid);
        ?>
    </div>

    <div class="tab-pane loaded" id="related-content-national-reports">
        <?php
            echo views_embed_view('documents', 'publication_national_reports', $node->nid);
        ?>
    </div>

    <div class="tab-pane loaded" id="related-content-projects">
        <?php
            echo views_embed_view('project_admin', 'publication_projects', $node->nid);
        ?>
    </div>

    <div class="tab-pane loaded" id="related-content-regions">
        <?php
            if (check_display_field($content, 'field_publication_regions')) {
                echo render($content['field_publication_regions']);
            }else {
        ?>
        <p class="text-warning">
        <?php
                echo t('No related regions');
        ?>
        </p>
        <?php
            }
        ?>
    </div>
    <div class="tab-pane loaded" id="related-content-threats">
        <?php
            if (check_display_field($content, 'field_publication_threats')) {
                echo render($content['field_publication_threats']);
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
