<h3 class="muted">
    <?php
        echo t('Related content');
    ?>
</h3>

<ul class="nav nav-tabs" id="related-content-tabs">
<?php
    render_tab(t('Species'), 'related-content-species', 'active', 'species', TRUE, $content);
    render_tab(t('Meetings'), 'related-content-meetings', '', 'meetings', TRUE, $content);
    render_tab(t('Projects'), 'related-content-projects', '', 'projects', TRUE, $content);
    render_tab(t('Publications'), 'related-content-publications', '', 'publications', TRUE, $content);
    render_tab(t('National reports'), 'related-content-national-reports', '', 'national_reports', TRUE, $content);
    render_tab(t('Plans'), 'related-content-plans', '', 'plans', TRUE, $content);
    render_tab(t('Contacts'), 'related-content-contacts', '', 'contacts', TRUE, $content);
?>
</ul>

<div class="tab-content">
    <div class="tab-pane active loaded" id="related-content-species">
        <?php
            echo views_embed_view('species_admin', 'instrument_species', $node->nid);
        ?>
    </div>

    <div class="tab-pane" id="related-content-meetings">
        <?php
            echo views_embed_view('meetings', 'instrument_meetings', $node->nid);
        ?>
    </div>

    <div class="tab-pane" id="related-content-projects">
        <?php
            echo views_embed_view('project_admin', 'instrument_projects', $node->nid);
        ?>
    </div>

    <div class="tab-pane" id="related-content-publications">
        <?php
            echo views_embed_view('publications_admin', 'instrument_publications', $node->nid);
        ?>
    </div>

    <div class="tab-pane" id="related-content-national-reports">
        <?php
            echo views_embed_view('documents', 'instrument_national_reports', $node->nid);
        ?>
    </div>

    <div class="tab-pane" id="related-content-plans">
        <?php
            echo views_embed_view('documents', 'instrument_plans', $node->nid);
        ?>
    </div>

    <div class="tab-pane" id="related-content-species">
        <?php echo render($content['species']); ?>
    </div>


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
