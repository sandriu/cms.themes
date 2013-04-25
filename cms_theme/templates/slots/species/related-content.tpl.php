<h3 class="muted">
    <?php
        echo t('Related content');
    ?>
</h3>

<ul class="nav nav-tabs" id="related-content-tabs">
    <?php
        render_tab(t('Meetings'), 'related-content-meetings', 'active', 'field_species_meeting', TRUE, $content);
        render_tab(t('Publications'), 'related-content-publications', '', 'field_species_publication', TRUE, $content);
        render_tab(t('Projects'), 'related-content-projects', '', 'field_species_project', TRUE, $content);
        render_tab(t('Decisions'), 'related-content-decisions', '', 'field_species_decision', TRUE, $content);
        render_tab(t('National plans'), 'related-content-national-plans', '', 'field_species_national_plan', TRUE, $content);
        render_tab(t('National reports'), 'related-content-national-reports', '', 'field_species_national_report', TRUE, $content);
    ?>
</ul>

<div class="tab-content">
    <div class="tab-pane active loaded" id="related-content-meetings">
        <?php
            if (check_display_field($content, 'field_species_meeting')) {
                echo render($content['field_species_meeting']);
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

    <div class="tab-pane" id="related-content-publications">
        <?php
            if (check_display_field($content, 'field_species_publication')) {
                echo render($content['field_species_publication']);
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

    <div class="tab-pane" id="related-content-projects">
        <?php
            if (check_display_field($content, 'field_species_project')) {
                echo render($content['field_species_project']);
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

    <div class="tab-pane" id="related-content-decisions">
        <?php
            if (check_display_field($content, 'field_species_decision')) {
                echo render($content['field_species_decision']);
            }else {
        ?>
        <p class="text-warning">
        <?php
                echo t('No related decisions');
        ?>
        </p>
        <?php
            }
        ?>
    </div>

    <div class="tab-pane" id="related-content-national-plans">
        <?php
            if (check_display_field($content, 'field_species_national_plan')) {
                echo render($content['field_species_national_plan']);
            }else {
        ?>
        <p class="text-warning">
        <?php
                echo t('No related national plans');
        ?>
        </p>
        <?php
            }
        ?>
    </div>

    <div class="tab-pane" id="related-content-national-reports">
        <?php
            if (check_display_field($content, 'field_species_national_report')) {
                echo render($content['field_species_national_report']);
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
</div>
