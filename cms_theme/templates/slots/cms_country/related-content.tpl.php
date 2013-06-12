<h3 class="muted">
    <?php
        echo t('Related content');
    ?>
</h3>

<ul class="nav nav-tabs" id="related-content-tabs">
    <?php
        render_tab(t('Meetings'), 'related-content-meetings', 'active', 'field_country_meetings', TRUE, $content);
        render_tab(t('Projects'), 'related-content-projects', '', 'projects', TRUE, $content);
        render_tab(t('National Reports'), 'related-content-national-reports', '', 'national_reports', TRUE, $content);
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
        <?php echo render($content['projects']); ?>
    </div>

    <div class="tab-pane" id="related-content-national-reports">
        <?php echo render($content['national_reports']); ?>
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
                echo t('No ratification available');
        ?>
        </p>
        <?php
            }
        ?>
    </div>
</div>
