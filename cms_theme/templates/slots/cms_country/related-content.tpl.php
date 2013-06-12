<h3 class="muted">
    <?php
        echo t('Related content');
    ?>
</h3>

<ul class="nav nav-tabs" id="related-content-tabs">
    <?php
        render_tab(t('Meetings'), 'related-content-meetings', 'active', 'meetings', TRUE, $content);
        render_tab(t('Projects'), 'related-content-projects', '', 'projects', TRUE, $content);
        render_tab(t('National Reports'), 'related-content-national-reports', '', 'national_reports', TRUE, $content);
        render_tab(t('National Focal Points'), 'related-content-nfp', '', 'national_focal_points', TRUE, $content);
        render_tab(t('Ratification status'), 'ratification-status', '', 'field_country_instrument_status', FALSE, $content);
        render_tab(t('Species'), 'related-content-species', '', 'species', TRUE, $content);
    ?>
</ul>

<div class="tab-content">
    <div class="tab-pane active loaded" id="related-content-meetings">
        <?php echo render($content['meetings']); ?>
    </div>

    <div class="tab-pane" id="related-content-projects">
        <?php echo render($content['projects']); ?>
    </div>

    <div class="tab-pane" id="related-content-national-reports">
        <?php echo render($content['national_reports']); ?>
    </div>

    <div class="tab-pane" id="related-content-nfp">
        <?php echo render($content['national_focal_points']); ?>
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
    <div class="tab-pane" id="related-content-species">
        <?php echo render($content['species']); ?>
    </div>
</div>
