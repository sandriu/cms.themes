<h3 class="muted">
    <?php
        echo t('Related content');
    ?>
</h3>

<ul class="nav nav-tabs" id="related-content-tabs">
    <?php
        render_tab(t('Species'), 'related-content-species', 'active', 'field_meeting_species', TRUE, $content);
        render_tab(t('Documents'), 'related-content-documents', '', 'field_meeting_document', TRUE, $content);
        render_tab(t('Decisions'), 'related-content-decisions', '', 'field_meeting_decision', TRUE, $content);
        render_tab(t('Publications'), 'related-content-publications', '', 'field_meeting_publication', TRUE, $content);
        render_tab(t('Threats'), 'related-content-threats', '', 'field_meeting_threats', TRUE, $content);
        render_tab(t('Participants'), 'related-content-participants', '', 'field_meeting_participants', TRUE, $content);
    ?>
</ul>

<div class="tab-content">
    <div class="tab-pane active loaded" id="related-content-species">
        <?php
            if (check_display_field($content, 'field_meeting_species')) {
                echo render($content['field_meeting_species']);
            } else {
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
            if (check_display_field($content, 'field_meeting_document')) {
                echo render($content['field_meeting_document']);
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

    <div class="tab-pane" id="related-content-decisions">
        <?php
            if (check_display_field($content, 'field_meeting_decision')) {
                echo render($content['field_meeting_decision']);
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

    <div class="tab-pane" id="related-content-publications">
        <?php
            if (check_display_field($content, 'field_meeting_publication')) {
                echo render($content['field_meeting_publication']);
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

    <div class="tab-pane" id="related-content-threats">
        <?php
            if (check_display_field($content, 'field_meeting_threats')) {
                echo render($content['field_meeting_threats']);
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

    <div class="tab-pane" id="related-content-participants">
        <?php
            if (isset($node->participants) && (!empty($node->participants))) {
                foreach ($node->participants as $participant) {
                    echo '<a href="/contacts/item/' . $participant['uid'][0] . '/' . $participant['conventions'][0] . '/view">' . $participant['cn'][0]  . '</a>';
                    echo '<br />';
                }
        ?>
        <?php
            }else {
        ?>
        <p class="text-warning">
        <?php
                echo t('No participants from Contacts database.');
        ?>
        </p>
        <?php
            }
        ?>
    </div>
</div>
