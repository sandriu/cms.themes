<h3 class="muted">
    <?php
        echo t('Related content');
    ?>
</h3>

<ul class="nav nav-tabs" id="related-content-tabs">
    <?php
        render_tab(t('Species'), 'related-content-species', 'active', 'field_nat_plan_species', TRUE, $content);
        render_tab(t('Documents'), 'related-content-documents', '', 'field_nat_plan_documents', TRUE, $content);
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
</div>
