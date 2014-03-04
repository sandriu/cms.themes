<?php if (!empty($node->related_data)) { ?>
    <h3 class="muted">
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
            render_tab_view(t('Species'), 'related-content-meetings', $first_tab, $node->related_data['meetings']['count']);
            $first_tab = '';
        }

        if (!empty($node->related_data['projects']['count'])) {
            render_tab_view(t('Projects'), 'related-content-projects', $first_tab, $node->related_data['projects']['count']);
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
    ?>
    </div>
<?php } ?>
