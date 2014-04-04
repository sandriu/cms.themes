<?php

/**
 * @file
 * Main view template.
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 *
 * @ingroup views_templates
 */
?>
<div class="<?php print $classes; ?>">
    <?php print render($title_prefix); ?>
    <?php if ($title): ?>
        <?php print $title; ?>
    <?php endif; ?>
    <?php print render($title_suffix); ?>
    <?php if ($header): ?>
        <div class="view-header">
            <?php print $header; ?>
        </div>
    <?php endif; ?>

    <?php if ($attachment_before): ?>
        <div class="attachment attachment-before">
            <?php print $attachment_before; ?>
        </div>
    <?php endif; ?>

    <?php
    global $base_path;
    echo drupal_ammap_render_map(
        $view->range_states_ammap['data'],
        array('legend' => true, 'show_default_legend' => true, 'steps' => true,
              'ajax_endpoint' => $base_path . 'country/party_range_states/party_range_states_page?year[value][date]='
        ),
        $view->range_states_ammap['legend'],
        $view->range_states_ammap['steps']
    ); ?>

    <?php if ($attachment_after): ?>
        <div class="attachment attachment-after">
            <?php print $attachment_after; ?>
        </div>
    <?php endif; ?>

    <?php if ($more): ?>
        <?php print $more; ?>
    <?php endif; ?>

    <?php if ($footer): ?>
        <div class="view-footer">
            <?php print $footer; ?>
        </div>
    <?php endif; ?>

    <?php if ($feed_icon): ?>
        <div class="feed-icon">
            <?php print $feed_icon; ?>
        </div>
    <?php endif; ?>

</div><?php /* class view */ ?>

<?php
    //Render the view of countries list grouped by status type
    //  - "Group by" functionality from views not working ok with pagination
    $arg = cms_domain_instrument_id();
    if (!empty($view->range_states_statuses)) {
        foreach ($view->range_states_statuses as $idx => $status) { ?>
            <h4><?php echo t($status->name); ?></h4>
            <?php
            if ($arg) {
                echo views_embed_view('front_end_countries', 'party_range_states_list', $arg, $status->tid);
            } else {
                echo views_embed_view('front_end_countries', 'party_range_states_list', $status->tid);
            }

            ?>
<?php   }
    }
?>
