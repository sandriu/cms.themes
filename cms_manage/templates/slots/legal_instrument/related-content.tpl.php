<?php if (!empty($node->related_data) || !empty($node->contacts)) { ?>
    <h3 class="text-muted">
        <?php
        echo t('Related content');
        ?>
    </h3>

    <ul class="nav nav-tabs" id="related-content-tabs">
        <?php

        $first_tab = 'active';
        if (!empty($node->related_data['species']['count'])) {
            render_tab_view(t('Species'), 'related-content-species', $first_tab, $node->related_data['species']['count']);
            $first_tab = '';
        }
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
        if (!empty($node->contacts)) {
            render_tab(t('Contacts'), 'related-content-contacts', $first_tab, 'contacts', TRUE, $content);
            $first_tab = '';
        }
        ?>
    </ul>

    <div class="tab-content">
        <?php
        $first_tab = 'active loaded';
        if (!empty($node->related_data['species']['count'])) {
            render_tab_content_view('related-content-species', $first_tab,
                $node->related_data['species']['view_name'], $node->related_data['species']['view_display'], $node->nid);
            $first_tab = '';
        }

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
        ?>

        <?php if (!empty($node->contacts)) { ?>
            <div class="tab-pane <?php echo $first_tab; ?>" id="related-content-contacts">
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
                    ?>
                    </tbody>
                </table>
            </div>
            <?php $first_tab = '' ?>
        <?php } ?>
    </div>
<?php } ?>
