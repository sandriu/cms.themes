<h3 class="muted">
    <?php
        echo t('Related content');
    ?>
</h3>

<ul class="nav nav-tabs" id="related-content-tabs">
    <?php
        render_tab(t('Species'), 'related-content-species', 'active', 'field_nat_plan_species', TRUE, $content);
        render_tab(t('Documents'), 'related-content-documents', '', 'field_nat_plan_documents', TRUE, $content);
        render_tab(t('Publications'), 'related-content-publications', '', 'field_nat_plan_publications', TRUE, $content);
        render_tab(t('Meetings'), 'related-content-meetings', '', 'field_nat_plan_meetings', TRUE, $content);
        render_tab(t('Projects'), 'related-content-projects', '', 'field_nat_plan_projects', TRUE, $content);
    ?>
</ul>

<div class="tab-content">
    <div class="tab-pane active loaded" id="related-content-species">
        <?php
            if (check_display_field($content, 'field_nat_plan_species')) {
                echo render($content['field_nat_plan_species']);
            }else {
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
            if (check_display_field($content, 'field_nat_plan_documents')) {
                echo render($content['field_nat_plan_documents']);
            }else {
        ?>
        <p class="text-warning">
        <?php
                echo t('No related documents');
        ?>
        </p>
        <?php
            }
        ?>
    </div>

    <div class="tab-pane" id="related-content-publications">
        <?php
            if (check_display_field($content, 'field_nat_plan_publications')) {
                echo render($content['field_nat_plan_publications']);
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

    <div class="tab-pane" id="related-content-meetings">
        <?php
            if (check_display_field($content, 'field_nat_plan_meetings')) {
                echo render($content['field_nat_plan_meetings']);
            }else {
        ?>
        <p class="text-warning">
        <?php
                echo t('No related meetings');
        ?>
        </p>
        <?php
            }
        ?>
    </div>

    <div class="tab-pane" id="related-content-projects">
        <?php
            if (check_display_field($content, 'field_nat_plan_projects')) {
                echo render($content['field_nat_plan_projects']);
            }else {
        ?>
        <p class="text-warning">
        <?php
                echo t('No related projects');
        ?>
        </p>
        <?php
            }
        ?>
    </div>
</div>
