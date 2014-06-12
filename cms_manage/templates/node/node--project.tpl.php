<div class="row">
    <div class="col-md-7">
    <?php echo render($content['body']); ?>
    </div>
    <?php render_slot($node, 'gallery', 'project'); ?>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-condensed table-hover two-columns">
            <tbody>
            <?php
                echo render($content['field_project_id']);
                echo render($content['field_project_impl_agency']);

                if (property_exists($node, 'contacts') && !empty($node->contacts)) {
            ?>
            <tr>
                <th><?php echo t('Implementing Agency contact'); ?></th>
                <td>
                    <?php
                        foreach ($node->contacts as $contact) {
                            echo '<a href="/contacts/item/' . $contact['uid'][0] . '/' . $contact['conventions'][0] . '/view">' . $contact['cn'][0]  . '</a>';
                            echo '<br />';
                        }
                    ?>
                </td>
            </tr>
            <?php
                }

                echo render($content['field_project_type']);
                echo render($content['field_project_ia_no_id']);
                echo render($content['field_project_collab_agency']);
                echo render($content['field_project_start_date']);
                echo render($content['field_project_end_date']);
                echo render($content['field_instrument']);
                echo render($content['field_project_appendix']);
                echo render($content['field_project_taxonomic_group']);
                echo render($content['field_region']);
                echo render($content['field_country']);
                echo render($content['field_project_summary']);
                echo render($content['field_project_conservation']);
                echo render($content['field_project_objective']);
                echo render($content['field_project_status']);
                echo render($content['field_project_final_report']);
                echo render($content['field_project_tech_report']);
                echo render($content['field_project_signed_date']);
                echo render($content['field_project_closed_date']);
                echo render($content['field_project_contract_number']);
                echo render($content['field_project_contract_type']);
                echo render($content['field_project_sgp']);
                echo render($content['field_project_funds_req_amount']);
                echo render($content['field_project_funds_req_amount_c']);
                echo render($content['field_project_cofundig']);
                echo render($content['field_project_encumbrance_number']);
                echo render($content['field_project_obmo']);
                echo render($content['field_project_responsible_unit']);
                echo render($content['field_project_folder']);
                echo render($content['field_project_comments']);
            ?>
            </tbody>
        </table>
    </div>

    <div class="col-md-12">
    <?php
        render_slot($node, 'activity', 'project', $content);
        render_slot($node, 'payments', 'project', $content);
        render_slot($node, 'bac', 'project', $content);

        echo render($content['field_project_file']);
        render_slot($node, 'related-content', 'project', $content);
    ?>
    </div>
</div>
<?php
    hide($content['links']);
    hide($content['comments']);
