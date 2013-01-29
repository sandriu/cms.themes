<div class="row" id="decision-form">
    <div class="span6">
    <?php
        echo drupal_render($form['title']);
    ?>
    </div>

    <div class="span4">
    <?php
        echo drupal_render($form['field_decision_publish_date']);
    ?>
    </div>

    <div class="span12">
    <?php
        echo drupal_render($form['field_decision_summary']);
    ?>
    <hr />
    </div>

    <div class="span2">
    <?php
        echo drupal_render($form['field_decision_type']);
    ?>
    </div>

    <div class="span2">
    <?php
        echo drupal_render($form['field_decision_status']);
    ?>
    </div>

    <div class="span2">
    <?php
        echo drupal_render($form['field_decision_number']);
    ?>
    </div>

    <div class="span2">
    <?php
        echo drupal_render($form['field_decision_meeting']);
    ?>
    </div>

    <div class="span3">
    <?php
        echo drupal_render($form['field_decision_instrument']);
    ?>
    </div>

    <div class="span12">
    <hr />
    <?php
        echo drupal_render($form['field_decision_document']);
    ?>
    </div>

    <div class="clearfix">&nbsp;</div>

    <?php
        echo drupal_render_children($form);
    ?>
</div>

<?php
    $path = drupal_get_path('theme', 'cms_theme');
    drupal_add_js("$path/js/theme.js");
?>