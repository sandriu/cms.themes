<h3 class="muted">
    <?php
        echo t('Related content');
    ?>
</h3>

<ul class="nav nav-tabs" id="related-content-tabs">
    <?php

        render_tab(t('Meetings'), 'related-content-meetings', 'active', 'meetings', TRUE, $content);

    if($node->projects_count > 0) {
        render_tab_view(t('Projects'), 'related-content-projects', '', $node->projects_count);
    }

    if($node->species_count > 0) {
        render_tab_view(t('Species'), 'related-content-species', '', $node->species_count);
    }
    ?>
</ul>
<div class="tab-content">
    <div class="tab-pane active loaded" id="related-content-meetings">
        <?php
            echo views_embed_view('meetings', 'country_meetings', $node->nid);
        ?>
    </div>

    <?php if($node->projects_count > 0) { ?>
    <div class="tab-pane" id="related-content-projects">
        <?php
            echo views_embed_view('project_admin', 'country_projects', $node->nid);
        ?>
    </div>
    <?php } ?>

    <?php if($node->species_count > 0) { ?>
    <div class="tab-pane" id="related-content-species">
        <?php
            echo views_embed_view('species_admin', 'country_species', $node->nid);
        ?>
    </div>
    <?php } ?>
</div>
