<?php if (!empty($node->related_data) || !empty($node->field_species_threats) || !empty($node->experts) ) { ?>
    <h3 class="muted">
        <?php
        echo t('Related content');
        ?>
    </h3>

    <ul class="nav nav-tabs" id="related-content-tabs">
        <?php
        $first_tab = 'active';
        if (!empty($node->related_data['meetings']['count'])) {
            render_tab_view(t('Meetings'), 'related-content-meetings', $first_tab, $node->related_data['meetings']['count']);
            $first_tab = '';
        }

        if (!empty($node->related_data['projects']['count'])) {
            render_tab_view(t('Projects'), 'related-content-projects', $first_tab, $node->related_data['projects']['count']);
            $first_tab = '';
        }

        if (!empty($node->related_data['publications']['count'])) {
            render_tab_view(t('Publications'), 'related-content-publications', $first_tab, $node->related_data['publications']['count']);
            $first_tab = '';
        }

        if (!empty($node->related_data['national_reports']['count'])) {
            render_tab_view(t('National reports'), 'related-content-national-reports', $first_tab, $node->related_data['national_reports']['count']);
            $first_tab = '';
        }

        if (!empty($node->related_data['plans']['count'])) {
            render_tab_view(t('Plans'), 'related-content-plans', $first_tab, $node->related_data['plans']['count']);
            $first_tab = '';
        }

        if (!empty($node->related_data['other_documents']['count'])) {
            render_tab_view(t('Other documents'), 'related-content-other-documents', $first_tab, $node->related_data['other_documents']['count']);
            $first_tab = '';
        }

        $lang_th = field_language('node', $node, 'field_species_threats');
        if (!empty($node->field_species_threats[$lang_th])) {
            render_tab_view(t('Threats'), 'related-content-threats', $first_tab, count($node->field_species_threats[$lang_th]));
        }

        if (!empty($node->experts)) {
            render_tab_view(t('Contacts'), 'related-content-contacts', $first_tab, count($node->experts));
        }
        ?>
    </ul>

    <div class="tab-content">
    <?php
        $first_tab = 'active loaded';
        if (!empty($node->related_data['meetings']['count'])) {
            render_tab_content_view('related-content-meetings', $first_tab,
                $node->related_data['meetings']['view_name'], $node->related_data['meetings']['view_display'], $node->nid);
            $first_tab = '';
        }


        if (!empty($node->related_data['projects']['count'])) {
            render_tab_content_view('related-content-projects', $first_tab,
                $node->related_data['projects']['view_name'], $node->related_data['projects']['view_display'], $node->nid);
            $first_tab = '';
        }


        if (!empty($node->related_data['publications']['count'])) {
            render_tab_content_view('related-content-publications', $first_tab,
                $node->related_data['publications']['view_name'], $node->related_data['publications']['view_display'], $node->nid);
            $first_tab = '';
        }

        if (!empty($node->related_data['national_reports']['count'])) {
            render_tab_content_view('related-content-national-reports', $first_tab,
                $node->related_data['national_reports']['view_name'], $node->related_data['national_reports']['view_display'], $node->nid);
            $first_tab = '';
        }


        if (!empty($node->related_data['plans']['count'])) {
            render_tab_content_view('related-content-plans', $first_tab,
                $node->related_data['plans']['view_name'], $node->related_data['plans']['view_display'], $node->nid);
            $first_tab = '';
        }

        if (!empty($node->related_data['other_documents']['count'])) {
            render_tab_content_view('related-content-other-documents', $first_tab,
                $node->related_data['other_documents']['view_name'], $node->related_data['other_documents']['view_display'], $node->nid);
            $first_tab = '';
        }
    ?>

    <?php if (!empty($node->field_species_threats[$lang_th])) { ?>
        <div class="tab-pane <?php echo $first_tab; ?>" id="related-content-threats">
            <table class="table">
                <thead>
                    <tr>
                        <th><?php echo t('Threat'); ?></th>
                        <th><?php echo t('Notes'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo render($content['field_species_threats']); ?>
                </tbody>
            </table>
        </div>
        <?php $first_tab = ''; ?>
    <?php } ?>
    <?php if (!empty($node->experts)) { ?>
        <div class="tab-pane <?php echo $first_tab; ?> " id="related-content-contacts">
            <?php
                foreach ($node->experts as $expert) {
                    echo $expert['cn'][0];
                    echo '<br />';
                }
            ?>
        </div>
        <?php $first_tab = ''; ?>
    <?php } ?>
    </div>
<?php } ?>
