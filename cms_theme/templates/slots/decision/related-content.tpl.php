<h3 class="muted">
    <?php
        echo t('Related content');
    ?>
</h3>

<ul class="nav nav-tabs" id="related-content-tabs">
    <?php
        render_tab(t('Species'), 'related-content-species', 'active', 'field_decision_species', TRUE, $content);
        render_tab(t('Documents'), 'related-content-documents', '', 'field_decision_documents', TRUE, $content);
        render_tab(t('Meetings'), 'related-content-meetings', '', 'field_decision_meeting', TRUE, $content);
        render_tab(t('Threats'), 'related-content-threats', '', 'field_decision_threats', TRUE, $content);
    ?>
</ul>

<div class="tab-content">
    <div class="tab-pane active loaded" id="related-content-species">
        <?php
            if (check_display_field($content, 'field_decision_species')) {
                echo render($content['field_decision_species']);
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
            if (check_display_field($content, 'field_decision_documents')) {
                echo render($content['field_decision_documents']);
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

    <div class="tab-pane" id="related-content-meetings">
        <?php
            if (check_display_field($content, 'field_decision_meeting')) {
                echo render($content['field_decision_meeting']);
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

    <div class="tab-pane" id="related-content-threats">
        <?php
            if (check_display_field($content, 'field_decision_threats')) {
                echo render($content['field_decision_threats']);
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
