<h3 class="muted">
    <?php
        echo t('Related content');
    ?>
</h3>

<ul class="nav nav-tabs" id="related-content-tabs">
    <?php
        render_tab(t('Meetings'), 'related-content-meetings', 'active', 'field_country_meetings', TRUE, $content);
        render_tab(t('Projects'), 'related-content-projects', '', 'field_country_projects', TRUE, $content);
        render_tab(t('National Reports'), 'related-content-national-reports', '', 'field_country_national_reports', TRUE, $content);
        render_tab(t('Contacts'), 'related-content-contacts', '', 'field_country_contacts', TRUE, $content);
        render_tab(t('Ratification status'), 'ratification-status', '', 'field_country_instrument_status', FALSE, $content);
    ?>
</ul>

<div class="tab-content">
    <div class="tab-pane active loaded" id="related-content-meetings">
        <?php
            if (check_display_field($content, 'field_country_meetings')) {
                echo render($content['field_country_meetings']);
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
            if (check_display_field($content, 'field_country_projects')) {
                echo render($content['field_country_projects']);
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

    <div class="tab-pane" id="related-content-national-reports">
        <?php
            if (check_display_field($content, 'field_country_national_reports')) {
                echo render($content['field_country_national_reports']);
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

    <div class="tab-pane" id="related-content-contacts">
        <?php
            if (check_display_field($content, 'field_country_contacts')) {
                echo render($content['field_country_contacts']);
            }else {
        ?>
        <p class="text-warning">
        <?php
                echo t('No related contacts');
        ?>
        </p>
        <?php
            }
        ?>
    </div>

    <div class="tab-pane" id="ratification-status">
        <?php
            if (check_display_field($content, 'field_country_instrument_status')) {
                echo render($content['field_country_instrument_status']);
            }else {
        ?>
        <p class="text-warning">
        <?php
                echo t('No ratification data available');
        ?>
        </p>
        <?php
            }
        ?>
    </div>
</div>
