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
            if (check_display_field($content, 'field_publication_species')) {
                echo render($content['field_publication_species']);
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
    <div class="tab-pane loaded" id="related-content-meetings">
        <?php
            if (check_display_field($content, 'field_publication_meeting')) {
                echo render($content['field_publication_meeting']);
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
    <div class="tab-pane loaded" id="related-content-plans">
        <?php
            if (check_display_field($content, 'field_publication_plans')) {
                echo render($content['field_publication_plans']);
            }else {
        ?>
        <p class="text-warning">
        <?php
                echo t('No related plans');
        ?>
        </p>
        <?php
            }
        ?>
    </div>
    <div class="tab-pane loaded" id="related-content-national-reports">
        <?php
            if (check_display_field($content, 'field_publication_nat_report')) {
                echo render($content['field_publication_nat_report']);
            }else {
        ?>
        <p class="text-warning">
        <?php
                echo t('No related national reports');
        ?>
        </p>
        <?php
            }
        ?>
    </div>
    <div class="tab-pane loaded" id="related-content-projects">
        <?php
            if (check_display_field($content, 'field_publication_project')) {
                echo render($content['field_publication_project']);
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
