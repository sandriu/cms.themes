<?php
    render_slot($node, 'node-buttons', 'general');

    echo render($content['body']);
?>

<br />

<div class="row">
    <div class="span12">
        <table class="table table-condensed table-hover two-columns">
            <tbody>
            <?php
                echo render($content['field_project_start_date']);
                echo render($content['field_project_end_date']);

                echo render($content['field_project_allotment_code']);
                echo render($content['field_project_folder']);


                echo render($content['field_project_summary']);
                echo render($content['field_project_contributor']);
                echo render($content['field_project_conservation']);
                echo render($content['field_project_objective']);
                echo render($content['field_project_impl_agency']);
                echo render($content['field_project_collab_agency']);

                echo render($content['field_project_threat']);

                echo render($content['field_project_region']);
                echo render($content['field_project_country']);
                echo render($content['field_project_instrument']);
                echo render($content['field_project_funds_req_amount']);
                echo render($content['field_project_funds_req_amount_c']);
                echo render($content['field_project_cofunding']);
                echo render($content['field_project_endorsement_form']);
                echo render($content['field_project_taxonomic_group']);

                echo render($content['field_project_conservation']);
                echo render($content['field_project_took_place']);
                echo render($content['field_project_final_report']);
                echo render($content['field_project_completed']);
            ?>
            </tbody>
        </table>
    </div>

    <div class="span12">
    <?php
        render_slot($node, 'activity', 'project', $content);
        echo render($content['field_project_document']);
        render_slot($node, 'related-content', 'project', $content);
    ?>
    </div>
</div>

<?php
    hide($content['links']);
    hide($content['comments']);
?>