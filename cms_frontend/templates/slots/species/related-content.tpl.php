<ul class="nav nav-tabs" id="related-content-tabs">
    <?php
    $first = 'active';
    if ($node->meetings_count > 0) {
        render_tab_view(t('Meetings'), 'related-content-meetings', $first, $node->meetings_count);
        $first = '';
    }

    if ($node->publications_count > 0) {
        render_tab_view(t('Publications'), 'related-content-publications', $first, $node->publications_count);
        $first = '';
    }

    if ($node->projects_count > 0) {
        render_tab_view(t('Projects'), 'related-content-projects', $first, $node->projects_count);
        $first = '';
    }

    if ($node->national_plans_count > 0) {
        render_tab_view(t('National plans'), 'related-content-national-plans', $first, $node->national_plans_count);
        $first = '';
    }

    if ($node->national_reports_count > 0) {
        render_tab_view(t('National reports'), 'related-content-national-reports', $first, $node->national_reports_count);
        $first = '';
    }

    if ($node->other_documents_count > 0) {
        render_tab_view(t('Other Documents'), 'related-content-other-documents', $first, $node->other_documents_count);
        $first = '';
    }
        render_tab(t('Threats'), 'related-content-threats', '', 'field_species_threats', TRUE, $content);
        render_tab(t('Contacts'), 'related-content-contacts', '', 'field_species_experts', TRUE, $content);
    ?>
</ul>

<div class="tab-content">
    <?php if ($node->meetings_count > 0) { ?>
    <div class="tab-pane active loaded" id="related-content-meetings">
        <?php
            echo views_embed_view('meetings', 'species_meetings', $node->nid);
        ?>
    </div>
    <?php } ?>

    <?php if ($node->publications_count > 0) { ?>
    <div class="tab-pane" id="related-content-publications">
        <?php
            echo views_embed_view('publications_admin', 'species_publications', $node->nid);
        ?>
    </div>
    <?php } ?>

    <?php if ($node->projects_count > 0) { ?>
    <div class="tab-pane" id="related-content-projects">
        <?php
        echo views_embed_view('project_admin', 'species_projects', $node->nid);
        ?>
    </div>
    <?php } ?>

    <?php if ($node->national_plans_count > 0) { ?>
    <div class="tab-pane" id="related-content-national-plans">
        <?php
            echo views_embed_view('documents', 'species_plans', $node->nid);
        ?>
    </div>
    <?php } ?>

    <?php if ($node->national_reports_count > 0) { ?>
    <div class="tab-pane" id="related-content-national-reports">
        <?php
            echo views_embed_view('documents', 'species_national_reports', $node->nid);
        ?>
    </div>
    <?php } ?>

    <?php if ($node->other_documents_count > 0) { ?>
    <div class="tab-pane" id="related-other-documents">
        <?php
            echo views_embed_view('documents', 'species_other_documents', $node->nid);
        ?>
    </div>
    <?php } ?>
    <div class="tab-pane" id="related-content-threats">
        <?php
            if (check_display_field($content, 'field_species_threats')) {
        ?>
        <table class="table table-condensed table-hover table-bordered table-striped">
            <caption><?php echo t('Threats'); ?></caption>
            <thead>
                <tr>
                    <th><?php echo t('Threat'); ?></th>
                    <th><?php echo t('Notes'); ?></th>
                </tr>
            </thead>

            <tbody>
                <?php echo render($content['field_species_threats']); ?>
            </tbody>
        </table>
        <?php
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

    <div class="tab-pane" id="related-content-contacts">
        <?php
            if (!empty($node->experts)) {
                foreach ($node->experts as $expert) {
                    echo $expert['cn'][0];
                    echo '<br />';
                }
        ?>
        <?php
            } else {
        ?>
        <p class="text-warning">
        <?php
                echo t('No experts');
        ?>
        </p>
        <?php
            }
        ?>
    </div>
</div>
