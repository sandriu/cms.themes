<div class="row" id="national-report-form">
    <div class="span6">
    <?php
        echo drupal_render($form['title']);
    ?>
    </div>

    <div class="span3">
    <?php
        echo drupal_render($form['field_project_id']);
    ?>
    </div>

    <div class="span3">
    <?php
        echo drupal_render($form['field_project_agency_contact']);
    ?>
    </div>

    <div class="span6">
    <?php
        echo drupal_render($form['field_project_impl_agency']);
    ?>
    </div>

    <div class="span6">
    <?php
        echo drupal_render($form['field_project_ia_no_id']);
    ?>
    </div>

    <div class="span12">
    <?php
        echo drupal_render($form['field_project_collab_agency']);
    ?>
    </div>

    <div class="clearfix">&nbsp;</div>

    <div class="span3">
    <?php
        echo drupal_render($form['field_project_start_date']);
    ?>
    </div>

    <div class="span3">
    <?php
        echo drupal_render($form['field_project_end_date']);
    ?>
    </div>

    <div class="span3">
    <?php
        echo drupal_render($form['field_instrument']);
    ?>
    </div>

    <div class="span3">
    <?php
        echo drupal_render($form['field_project_appendix']);
    ?>
    </div>

    <div class="span3">
    <?php
        echo drupal_render($form['field_project_taxonomic_group']);
    ?>
    </div>

    <div class="span3">
    <?php
        echo drupal_render($form['field_project_region']);
    ?>
    </div>

    <div class="span3">
    <?php
        echo drupal_render($form['field_project_country']);
    ?>
    </div>

    <div class="span12">
    <?php
        echo drupal_render($form['body']);
        echo drupal_render($form['field_project_summary']);
        echo drupal_render($form['field_project_conservation']);
        echo drupal_render($form['field_project_objective']);
    ?>
    </div>

    <div class="clearfix">&nbsp;</div>
    <br />

    <div class="span3">
    <?php
        echo drupal_render($form['field_project_status']);
    ?>
    </div>

    <div class="span3">
    <?php
        echo drupal_render($form['field_project_final_report']);
    ?>
    </div>

    <div class="span3">
    <?php
        echo drupal_render($form['field_project_tech_report']);
    ?>
    </div>

    <div class="span3">
    <?php
        echo drupal_render($form['field_project_sgp']);
    ?>
    </div>

    <div class="clearfix">&nbsp;</div>

    <div class="span3">
    <?php
        echo drupal_render($form['field_project_signed_date']);
    ?>
    </div>

    <div class="span3">
    <?php
        echo drupal_render($form['field_project_closed_date']);
    ?>
    </div>

    <div class="span3">
    <?php
        echo drupal_render($form['field_project_contract_number']);
    ?>
    </div>

    <div class="clearfix">&nbsp;</div>

    <div class="span3">
    <?php
        echo drupal_render($form['field_project_contract_type']);
    ?>
    </div>

    <div class="span2">
    <?php
        echo drupal_render($form['field_project_funds_req_amount']);
    ?>
    </div>
    <div class="span2">
    <?php
        echo drupal_render($form['field_project_funds_req_amount_c']);
    ?>
    </div>

    <div class="span12">
    <?php
        echo drupal_render($form['field_project_cofunding']);
    ?>
    </div>

    <div class="span6">
    <?php
        echo drupal_render($form['field_project_encumbrance_number']);
    ?>
    </div>

    <div class="span6">
    <?php
        echo drupal_render($form['field_project_obmo']);
    ?>
    </div>

    <div class="span6">
    <?php
        echo drupal_render($form['field_project_responsible_unit']);
    ?>
    </div>

    <div class="span6">
    <?php
        echo drupal_render($form['field_project_folder']);
    ?>
    </div>

    <div class="span12">
    <?php
        echo drupal_render($form['field_project_file']);
        echo drupal_render($form['field_project_images']);
        echo drupal_render($form['field_project_comments']);
    ?>
    </div>

    <div class="clearfix">&nbsp;</div>

    <div class="span12">
        <legend  class="form-section-legend">
            <a href="javascript:void(0); " data-toggle="collapse" data-target="#project-bac"><i class="icon-plus-sign"></i></a>
            <?php echo t('Budget line (BAC)'); ?>
        </legend>

        <div id="project-bac" class="collapse out">
            <?php
                echo drupal_render($form['field_project_bac']);
            ?>
        </div>
    </div>

    <div class="clearfix">&nbsp;</div>

    <div class="span12">
        <legend  class="form-section-legend">
            <a href="javascript:void(0); " data-toggle="collapse" data-target="#project-activity"><i class="icon-plus-sign"></i></a>
            <?php echo t('Activity'); ?>
        </legend>

        <div id="project-activity" class="collapse out">
            <?php
                echo drupal_render($form['field_project_activity']);
            ?>
        </div>
    </div>

    <div class="clearfix">&nbsp;</div>

    <div class="span12">
        <legend  class="form-section-legend">
            <a href="javascript:void(0); " data-toggle="collapse" data-target="#project-payments"><i class="icon-plus-sign"></i></a>
            <?php echo t('Schedule of payments'); ?>
        </legend>

        <div id="project-payments" class="collapse out">
            <?php
                echo drupal_render($form['field_project_payments']);
            ?>
        </div>
    </div>

    <div class="clearfix">&nbsp;</div>

    <div class="span12">
    <legend  class="form-section-legend">
        <a href="javascript:void(0); " data-toggle="collapse" data-target="#related-content-fields"><i class="icon-plus-sign"></i></a>
        <?php echo t('Related content'); ?>
    </legend>

    <div id="related-content-fields" class="collapse out">
        <div class="span11">
        <?php
            echo drupal_render($form['field_project_threat']);
        ?>
        </div>

        <div class="span11">
        <?php
            echo drupal_render($form['field_project_nat_plan']);
        ?>
        </div>

        <div class="span11">
        <?php
            echo drupal_render($form['field_project_national_reports']);
        ?>
        </div>

        <div class="span11">
        <?php
            echo drupal_render($form['field_project_document']);
        ?>
        </div>

        <div class="span11">
        <?php
            echo drupal_render($form['field_project_meeting']);
        ?>
        </div>

        <div class="span11">
        <?php
            echo drupal_render($form['field_project_publication']);
        ?>
        </div>

        <div class="span11">
        <?php
            echo drupal_render($form['field_project_species']);
        ?>
        </div>
    </div>
    </div>

    <div class="clearfix">&nbsp;</div>

    <div class="span12">
    <?php
        echo drupal_render_children($form);
    ?>
    </div>
</div>

<?php
    $path = drupal_get_path('theme', 'cms_theme');
    drupal_add_js("$path/js/theme.js");
?>
