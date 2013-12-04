<h3 class="muted">
    <?php
        echo t('Related content');
    ?>
</h3>

<ul class="nav nav-tabs" id="related-content-tabs">
    <?php
        $total_reports = 0;
        $submmiter = taxonomy_get_term_by_name($node->title, VOC_DOCUMENT_SUBMITTER);
        if ($submmiter) {
            $country_term_id = key($submmiter);
            $total_reports = count(views_get_view_result('related_national_reports_country', 'page', $country_term_id));
        }

        render_tab(t('Meetings'), 'related-content-meetings', 'active', 'meetings', TRUE, $content);
        render_tab(t('Projects'), 'related-content-projects', '', 'projects', TRUE, $content);
    ?>
    <li class="">
        <a href="#related-content-national-reports" data-toggle="tab">
            <?php
                echo t('National Reports');
            ?>
            (<?php echo $total_reports; ?>)
        </a>
    </li>
    <?php
        render_tab(t('National Focal Points'), 'related-content-nfp', '', 'national_focal_points', TRUE, $content);
        render_tab(t('Ratification status'), 'ratification-status', '', 'field_country_instrument_status', FALSE, $content);
        render_tab(t('Species'), 'related-content-species', '', 'species', TRUE, $content);
    ?>
</ul>

<div class="tab-content">
    <div class="tab-pane active loaded" id="related-content-meetings">
        <?php
            echo views_embed_view('meetings', 'country_meetings', $node->nid);
        ?>
    </div>

    <div class="tab-pane" id="related-content-projects">
        <?php
            echo views_embed_view('project_admin', 'country_projects', $node->nid);
        ?>
    </div>

    <div class="tab-pane" id="related-content-national-reports">
        <?php
            if ($submmiter) {
                echo views_embed_view('documents', 'country_national_reports', $country_term_id);
            }else {
                echo t('No National reports available');
            }
        ?>
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
