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
        render_tab(t('National plans'), 'related-content-national-plans', '', 'field_species_plans', TRUE, $content);
        render_tab(t('National reports'), 'related-content-national-reports', '', 'field_species_national_report', TRUE, $content);
        render_tab(t('Other Documents'), 'related-content-species', '', 'field_species_document', TRUE, $content);
        render_tab(t('Threats'), 'related-content-threats', '', 'field_species_threats', TRUE, $content);
        render_tab(t('Contacts'), 'related-content-contacts', '', 'field_species_experts', TRUE, $content);
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

    <div class="tab-pane" id="related-content-national-plans">
        <?php
            if (check_display_field($content, 'field_species_plans')) {
                echo render($content['field_species_plans']);
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

    <div class="tab-pane" id="related-content-species">
        <?php
            if (check_display_field($content, 'field_species_document')) {
                echo render($content['field_species_document']);
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

    <div class="tab-pane" id="related-content-threats">
        <?php
            if (check_display_field($content, 'field_species_threats')) {
        ?>
        <table class="table table-condensed table-hover table-bordered table-striped">
            <caption><?php echo t('Threats'); ?></caption>
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
        <?php
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

    <div class="tab-pane" id="related-content-contacts">
        <?php
            if (isset($node->experts) && (!empty($node->experts))) {
                foreach ($node->experts as $expert) {
                    echo '<a href="/' . ADMINISTRATION_PATH . 'contacts/item/' . $expert['uid'][0] . '/' . $expert['conventions'][0] . '/view">' . $expert['cn'][0]  . '</a>';
                    echo '<br />';
                }
        ?>
        <?php
            }else {
        ?>
        <p class="text-warning">
        <?php
                echo t('No experts');
        ?>
        </p>
        <?php
            }
        ?>
    </div>
</div>
