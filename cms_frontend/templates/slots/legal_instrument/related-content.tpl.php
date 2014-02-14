<h3 class="muted">
    <?php
        echo t('Related content');
    ?>
</h3>

<ul class="nav nav-tabs" id="related-content-tabs">
<?php
    $first_tab = 'active';
    if ($node->species_count > 0) {
        render_tab_view(t('Species'), 'related-content-species', $first_tab, $node->species_count);
        $first_tab = '';
    }
    if ($node->meetings_count > 0) {
        render_tab_view(t('Meetings'), 'related-content-meetings', $first_tab, $node->meetings_count);
    }
    if ($node->projects_count > 0) {
        render_tab_view(t('Projects'), 'related-content-projects', $first_tab, $node->projects_count);
        $first_tab = '';
    }
    if ($node->publications_count > 0) {
        render_tab_view(t('Publications'), 'related-content-publications', $first_tab, $node->publications_count);
        $first_tab = '';
    }
    if ($node->national_reports_count > 0) {
        render_tab_view(t('National reports'), 'related-content-national-reports', $first_tab, $node->national_reports_count);
        $first_tab = '';
    }
    if ($node->plans_count > 0) {
        render_tab_view(t('Plans'), 'related-content-plans', $first_tab, $node->plans_count);
        $first_tab = '';
    }
    render_tab(t('Contacts'), 'related-content-contacts', '', 'contacts', TRUE, $content);
?>
</ul>

<div class="tab-content">
    <?php if ($node->species_count > 0) { ?>
    <div class="tab-pane active loaded" id="related-content-species">
        <?php
            echo views_embed_view('species_admin', 'instrument_species', $node->nid);
        ?>
    </div>
    <?php } ?>

    <?php if ($node->meetings_count > 0) { ?>
    <div class="tab-pane" id="related-content-meetings">
        <?php
            echo views_embed_view('meetings', 'instrument_meetings', $node->nid);
        ?>
    </div>
    <?php } ?>

    <?php if ($node->projects_count > 0) { ?>
    <div class="tab-pane" id="related-content-projects">
        <?php
            echo views_embed_view('project_admin', 'instrument_projects', $node->nid);
        ?>
    </div>
    <?php } ?>

    <?php if ($node->publications_count > 0) { ?>
    <div class="tab-pane" id="related-content-publications">
        <?php
            echo views_embed_view('publications_admin', 'instrument_publications', $node->nid);
        ?>
    </div>
    <?php } ?>

    <?php if ($node->national_reports_count > 0) { ?>
    <div class="tab-pane" id="related-content-national-reports">
        <?php
            echo views_embed_view('documents', 'instrument_national_reports', $node->nid);
        ?>
    </div>
    <?php } ?>

    <?php if ($node->plans_count > 0) { ?>
    <div class="tab-pane" id="related-content-plans">
        <?php
            echo views_embed_view('documents', 'instrument_plans', $node->nid);
        ?>
    </div>
    <?php } ?>
    <div class="tab-pane" id="related-content-contacts">
        <table class="table table-striped table-bordered dataTable">
            <thead>
                <tr>
                    <th>
                    <?php echo t('Full name'); ?>
                    </th>
                </tr>
            </thead>

            <tbody>
                <?php
                    if (isset($node->contacts) && (!empty($node->contacts))) {
                        foreach ($node->contacts as $contact) {
                ?>
                <tr>
                    <td>
                        <a href='/contacts/item/<?php echo $contact['uid'][0]; ?>/<?php echo $contact['conventions'][0]; ?>/view'>
                            <?php echo $contact['cn'][0]; ?>
                        </a>
                    </td>
                </tr>
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
