<?php if ($teaser): ?>
    <div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
        <?php print render($title_prefix); ?>
        <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
        <?php print render($title_suffix); ?>

        <div class="content article-body"<?php print $content_attributes; ?>>
            <?php
            // We hide the comments and links now so that we can render them later.
            hide($content['comments']);
            hide($content['links']);
            print render($content);
            ?>
            <span class="text-muted"><?php print format_date($node->changed, 'custom', 'd F Y'); ?></span>
        </div>
        <?php print render($content['links']); ?>
    </div>
<?php else: ?>
    <div class="container">
        <div class="row">
            <div class="project-profile-left profile col-md-8">
                <?php if(check_display_field($content,'body')): ?>
                    <label>Project description</label>
                    <?php
                    echo render($content['body']);
                ?>
                <?php endif; ?>

                <?php if(check_display_field($content,'field_project_conservation')): ?>
                    <label>Conservation</label>
                    <div class="section">
                        <?php
                        echo render($content['field_project_conservation']);
                        ?>
                    </div>
                <?php endif; ?>

                <?php if(check_display_field($content,'field_project_objective')): ?>
                    <label>Objective</label>
                    <div class="section">
                        <?php
                        echo render($content['field_project_objective']);
                        ?>
                    </div>
                <?php endif; ?>

                <?php if(check_display_field($content,'field_project_activity')): ?>
                    <label>Project activity</label>
                    <div class="section">
                        <?php render_slot($node, 'activity', 'project', $content); ?>
                    </div>
                <?php endif; ?>

                <?php echo render_slot($node, 'related-content', 'project', $content); ?>
            </div>

            <div class="col-md-4 profile">
                <div class="project-profile-right well">
                    <?php render_slot($node, 'gallery', 'project'); ?>
                    <hr />

                    <table class="table table-condensed table-hover two-columns">
                        <tbody>
                        <?php
                        echo render($content['field_project_impl_agency']);

                        if (property_exists($node, 'contacts') && !empty($node->contacts)) {
                            ?>
                            <tr>
                                <th><?php echo t('Implementing Agency contact'); ?></th>
                                <td>
                                    <?php
                                    foreach ($node->contacts as $contact) {
                                        echo '<a href="/contacts/item/' . $contact['uid'][0] . '/' . $contact['conventions'][0] . '/view">' . $contact['cn'][0] . '</a>';
                                        echo '<br />';
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php
                        }
                        echo render($content['field_project_collab_agency']);
                        ?>
                        </tbody>
                    </table>
                    <hr />

                    <table class="table table-condensed table-hover two-columns">
                        <?php
                        echo render($content['field_project_start_date']);
                        echo render($content['field_project_end_date']);
                        echo render($content['field_project_appendix']);
                        echo render($content['field_project_taxonomic_group']);
                        echo render($content['field_region']);
                        echo render($content['field_country']);
                        echo render($content['field_project_tech_report']);
                        ?>
                    </table>

                    <?php echo render($content['field_project_file']); ?>

                    <hr />

                    <!-- to be implemented -->
                    <!--label>Implementing Agency Contacts</label>
                    <div class="section">
                    </div>
                    <hr /-->

                    <div class="threats">
                        <label>Threats</label>
                        <?php
                        if (check_display_field($content, 'field_threats')) {
                            echo render($content['field_threats']);
                        } else {
                            ?>
                            <p class="text-warning">
                                <?php echo t('No related threats'); ?>
                            </p>
                        <?php
                        }
                        ?>
                    </div>
                    <?php
                    if (!empty($node->impl_ag_contacts)) {
                        print render($node->impl_ag_contacts);
                    }
                    ?>
                </div>

                <?php
                $sidebar_blocks = block_get_blocks_by_region('sidebar_second');
                unset($sidebar_blocks['#sorted']);
                ?>

                <!-- Render sidebar blocks -->
                <?php if (!empty($sidebar_blocks)) { ?>
                    <?php foreach($sidebar_blocks as $block) { ?>
                        <div class="well">
                            <?php print render($block); ?>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>

        </div>
    </div>

    <?php
    hide($content['links']);
    hide($content['comments']);
    ?>
<?php endif; ?>