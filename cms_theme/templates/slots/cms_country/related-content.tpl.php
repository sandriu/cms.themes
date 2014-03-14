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
        render_tab_view(t('Meetings'), 'related-content-meetings', $first_tab, $node->related_data['meetings']['count']);
        $first_tab = '';
    }

    if (!empty($node->related_data['projects']['count'])) {
        render_tab_view(t('Projects'), 'related-content-projects', $first_tab, $node->related_data['projects']['count']);
        $first_tab = '';
    }

    if (!empty($node->related_data['national_reports']['count'])) {
        render_tab_view(t('National Reports'), 'related-content-national-reports', $first_tab, $node->related_data['national_reports']['count']);
        $first_tab = '';
    }

    if (!empty($node->field_country_instrument_status)) {
        render_tab_view(t('Ratification status'), 'ratification-status', $first_tab, '');
        $first_tab = '';
    }

    if (!empty($node->national_focal_points)) {
        render_tab_view(t('National Focal Points'), 'related-content-nfp', $first_tab, count($node->national_focal_points));
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
    if (!empty($node->related_data['national_reports']['count'])) {
        render_tab_content_view('related-content-national-reports', $first_tab,
            $node->related_data['national_reports']['view_name'], $node->related_data['national_reports']['view_display'], $node->nid);
        $first_tab = '';
    }
?>

    <?php if (!empty($node->field_country_instrument_status)) { ?>
        <div class="tab-pane <?php echo $first_tab ?>" id="ratification-status">
            <?php echo render($content['field_country_instrument_status']); ?>
        </div>
        <?php $first_tab = ''; ?>
    <?php } ?>

    <?php if (!empty($node->national_focal_points)) { ?>
        <div class="tab-pane <?php echo $first_tab ?>" id="related-content-nfp">
            <?php echo render($content['national_focal_points']); ?>
        </div>
        <?php $first_tab = ''; ?>
    <?php } ?>

</div>
