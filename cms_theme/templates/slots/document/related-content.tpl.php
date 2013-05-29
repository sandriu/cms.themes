<h3 class="muted">
    <?php
        echo t('Related content');
    ?>
</h3>

<ul class="nav nav-tabs" id="related-content-tabs">
    <?php
        render_tab(t('Species'), 'related-content-species', 'active', 'field_document_species', TRUE, $content);
        render_tab(t('Decisions'), 'related-content-decision', '', 'field_document_decision', TRUE, $content);
        render_tab(t('Meetings'), 'related-content-meeting', '', 'field_document_meeting', TRUE, $content);
        render_tab(t('Projects'), 'related-content-project', '', 'field_document_project', TRUE, $content);
        render_tab(t('Threats'), 'related-content-threats', '', 'field_document_threats', TRUE, $content);
    ?>
</ul>

<div class="tab-content">
    <div class="tab-pane active loaded" id="related-content-species">
        <?php
            if (check_display_field($content, 'field_document_species')) {
                echo render($content['field_document_species']);
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
    <div class="tab-pane" id="related-content-decision">
        <?php
            if (check_display_field($content, 'field_document_decision')) {
                echo render($content['field_document_decision']);
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
    <div class="tab-pane" id="related-content-meeting">
        <?php
            if (check_display_field($content, 'field_document_meeting')) {
                echo render($content['field_document_meeting']);
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
    <div class="tab-pane" id="related-content-project">
        <?php
            if (check_display_field($content, 'field_document_project')) {
                echo render($content['field_document_project']);
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
    <div class="tab-pane" id="related-content-threats">
        <?php
            if (check_display_field($content, 'field_document_threats')) {
                echo render($content['field_document_threats']);
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
