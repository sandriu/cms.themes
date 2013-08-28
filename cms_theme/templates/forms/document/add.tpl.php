<div class="row" id="national-plan-form">
    <div class="span6">
    <?php
        echo drupal_render($form['title']);
    ?>
    </div>

    <div class="span4">
    <?php
        echo drupal_render($form['field_document_number']);
    ?>
    </div>

    <div class="span3">
    <?php
        echo drupal_render($form['field_document_instrument']);
    ?>
    </div>

    <div class="span3">
    <?php
        echo drupal_render($form['field_document_type']);
    ?>
    </div>

    <div class="span3">
    <?php
        echo drupal_render($form['field_document_status']);
    ?>
    </div>

    <div class="clearfix"></div>

    <div class="span3">
    <?php
        echo drupal_render($form['field_document_publish_date']);
    ?>
    </div>

    <div class="span6">
    <?php
        echo drupal_render($form['field_document_submitted_by']);
    ?>
    </div>

    <div class="span12">
    <?php
        echo drupal_render($form['field_document_files']);
    ?>
    </div>

    <div class="clearfix">&nbsp;</div>
    <br />

    <div class="span11">
    <?php
        echo drupal_render($form['field_document_species']);
    ?>
    </div>

    <div class="span11">
    <?php
        echo drupal_render($form['field_document_meeting']);
    ?>
    </div>

    <div class="span11">
    <?php
        echo drupal_render($form['field_document_project']);
    ?>
    </div>

    <div class="span11">
    <?php
        echo drupal_render($form['field_document_threats']);
    ?>
    </div>

    <div class="span11">
    <?php
        echo drupal_render($form['field_document_publication']);
    ?>
    </div>

    <div class="clearfix">&nbsp;</div>

    <div class="span12">
    <?php
        hide($form['field_document_uid']);
        echo drupal_render_children($form);
    ?>
    </div>
</div>

<?php
    $path = drupal_get_path('theme', 'cms_theme');
    drupal_add_js("$path/js/theme.js");
?>
