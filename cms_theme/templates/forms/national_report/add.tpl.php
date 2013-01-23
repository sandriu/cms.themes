<div class="row">
    <div class="span6">
    <?php
        echo drupal_render($form['title']);
    ?>
    </div>

    <div class="span4">
    <?php
        echo drupal_render($form['field_nat_report_receipt']);
    ?>
    </div>

    <div class="clearfix"></div>

    <div class="span3">
    <?php
        echo drupal_render($form['field_nat_report_instrument']);
    ?>
    </div>

    <div class="span3">
    <?php
        echo drupal_render($form['field_nat_report_country']);
    ?>
    </div>

    <div class="span4">
    <?php
        echo drupal_render($form['field_nat_report_type']);
    ?>
    </div>

    <div class="span12">
    <?php
        echo drupal_render($form['field_nat_report_remarks']);
    ?>
    </div>

    <div class="span12">
    <?php
        echo drupal_render($form['field_nat_report_documents']);
    ?>
    </div>
</div>

<div class="clearfix">&nbsp;</div>

<?php
    hide($form['additional_settings']);
    echo drupal_render_children($form);
?>

<?php
    $path = drupal_get_path('theme', 'cms_theme');
    drupal_add_js("$path/js/theme.js");
?>
