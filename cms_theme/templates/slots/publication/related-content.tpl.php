<h3 class="muted">
    <?php
        echo t('Related content');
    ?>
</h3>

<ul class="nav nav-tabs" id="related-content-tabs">
    <?php
        render_tab(t('Species'), 'related-content-species', 'active', 'field_publication_species', TRUE, $content);
        render_tab(t('Meetings'), 'related-content-meetings', '', 'field_publication_meetings', TRUE, $content);
        render_tab(t('Decisions'), 'related-content-decisions', '', 'field_publication_decisions', TRUE, $content);
        render_tab(t('Regions'), 'related-content-regions', '', 'field_publication_regions', TRUE, $content);
        render_tab(t('Threats'), 'related-content-threats', '', 'field_publication_threats', TRUE, $content);
        render_tab(t('National Plans'), 'related-content-national-plans', '', 'field_publication_nat_plan', TRUE, $content);
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
            if (check_display_field($content, 'field_publication_meetings')) {
                echo render($content['field_publication_meetings']);
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
    <div class="tab-pane loaded" id="related-content-decisions">
        <?php
            if (check_display_field($content, 'field_publication_decisions')) {
                echo render($content['field_publication_decisions']);
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
    <div class="tab-pane loaded" id="related-content-national-plans">
        <?php
            if (check_display_field($content, 'field_publication_nat_plan')) {
                echo render($content['field_publication_nat_plan']);
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
</div>
