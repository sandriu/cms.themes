<h3 class="muted">
    <?php
        echo t('Related content');
    ?>
</h3>

<ul class="nav nav-tabs" id="related-content-tabs">
    <?php
        render_tab(t('Meetings'), 'related-content-meetings', 'active', 'field_species_meetings', TRUE, $content);
        render_tab(t('Publications'), 'related-content-publications', '', 'field_species_publications', TRUE, $content);
        render_tab(t('Projects'), 'related-content-projects', '', 'field_species_projects', TRUE, $content);
        render_tab(t('Decisions'), 'related-content-decisions', '', 'field_species_decisions', TRUE, $content);
        render_tab(t('National plans'), 'related-content-national-plans', '', 'field_species_national_plans', TRUE, $content);
        render_tab(t('National reports'), 'related-content-national-reports', '', 'field_species_national_reports', TRUE, $content);
    ?>
</ul>

<div class="tab-content">
    <div class="tab-pane active loaded" id="related-content-meetings">
        <?php echo render($content['field_species_meetings']); ?>
    </div>

    <div class="tab-pane" id="related-content-publications">
        <?php echo render($content['field_species_publications']); ?>
    </div>

    <div class="tab-pane" id="related-content-projects">
        <?php echo render($content['field_species_projects']); ?>
    </div>

    <div class="tab-pane" id="related-content-decisions">
        <?php echo render($content['field_species_decisions']); ?>
    </div>

    <div class="tab-pane" id="related-content-national-plans">
        <?php echo render($content['field_species_national_plans']); ?>
    </div>

    <div class="tab-pane" id="related-content-national-reports">
        <?php echo render($content['field_species_national_reports']); ?>
    </div>

    <div class="tab-pane" id="related-content-publications">
        <?php echo render($content['field_species_publications']); ?>
    </div>
</div>
