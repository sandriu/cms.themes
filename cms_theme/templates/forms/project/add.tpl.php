<div class="row" id="national-report-form">
    <div class="span6">
    <?php
        echo drupal_render($form['title']);
    ?>
    </div>

    <div class="span4">
    <?php
        echo drupal_render($form['field_project_allotment_code']);
    ?>
    </div>

    <div class="span12">
        <?php
            echo drupal_render($form['body']);
        ?>
    </div>

    <div class="span3">
    <?php
        echo drupal_render($form['field_project_endorsement_form']);
    ?>
    </div>

    <div class="span3">
    <?php
        echo drupal_render($form['field_project_final_report']);
    ?>
    </div>

    <div class="span3">
    <?php
        echo drupal_render($form['field_project_took_place']);
    ?>
    </div>

    <div class="span3">
    <?php
        echo drupal_render($form['field_project_completed']);
    ?>
    </div>

    <div class="clearfix">&nbsp;</div>
    <br />

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
            echo drupal_render($form['field_project_threat']);
        ?>
    </div>

    <div class="clearfix"></div>

    <div class="span3">
    <?php
        echo drupal_render($form['field_project_taxonomic_group']);
    ?>
    </div>

    <div class="span3">
    <?php
        echo drupal_render($form['field_project_instrument']);
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

    <div class="span6">
    <?php
        echo drupal_render($form['field_project_funds_req_amount']);
        echo drupal_render($form['field_project_funds_req_amount_c']);
    ?>
    </div>

    <div class="span6">
    <?php
        echo drupal_render($form['field_project_folder']);
        echo drupal_render($form['field_project_cofunding']);
    ?>
    </div>

    <div class="span12">
    <hr />
    <?php
        echo drupal_render($form['field_project_activity']);
    ?>
    <hr />
    </div>

    <div class="span6">
    <?php
        echo drupal_render($form['field_project_summary']);
    ?>
    </div>

    <div class="span6">
    <?php
        echo drupal_render($form['field_project_contributor']);
    ?>
    </div>

    <div class="clearfix"></div>

    <div class="span6">
    <?php
        echo drupal_render($form['field_project_conservation']);
    ?>
    </div>

    <div class="span6">
    <?php
        echo drupal_render($form['field_project_objective']);
    ?>
    </div>

    <div class="clearfix"></div>

    <div class="span6">
    <?php
        echo drupal_render($form['field_project_impl_agency']);
    ?>
    </div>

    <div class="span6">
    <?php
        echo drupal_render($form['field_project_collab_agency']);
    ?>
    </div>

    <div class="clearfix"></div>

    <div class="span12">
    <?php
        echo drupal_render($form['field_project_file']);
    ?>
    </div>

    <div class="span12">
    <?php
        echo drupal_render($form['field_project_images']);
    ?>
    </div>

    <div class="clearfix">&nbsp;</div>

    <div class="span12">
    <legend  class="form-section-legend">
        <a href="javascript:void(0); " data-toggle="collapse" data-target="#related-content-fields"><i class="icon-minus-sign"></i></a>
        <?php echo t('Related content'); ?>
    </legend>

    <div id="related-content-fields" class="collapse in">
        <div class="span11">
        <?php
            echo drupal_render($form['field_project_decision']);
        ?>
        </div>

        <div class="span11">
        <?php
            echo drupal_render($form['field_project_nat_plan']);
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
