<div class="row" id="meeting-form">
    <div class="span6">
    <?php
        echo drupal_render($form['title']);
    ?>
    </div>

    <div class="span6">
    <?php
        echo drupal_render($form['field_meeting_abbreviation']);
    ?>
    </div>

    <div class="span12">
        <hr />
    </div>

    <div class="span3">
    <?php
        echo drupal_render($form['field_meeting_instrument']);
    ?>
    </div>

    <div class="span2">
    <?php
        echo drupal_render($form['field_meeting_type']);
    ?>
    </div>

    <div class="span2">
    <?php
        echo drupal_render($form['field_meeting_kind']);
    ?>
    </div>

    <div class="span2">
    <?php
        echo drupal_render($form['field_meeting_access']);
    ?>
    </div>

    <div class="span2">
    <?php
        echo drupal_render($form['field_meeting_status']);
    ?>
    </div>

    <div class="span12">
    <?php
        echo drupal_render($form['field_meeting_description']);
    ?>
    </div>

    <div class="span12">
        <hr />
    </div>

    <div class="span3">
    <?php
        echo drupal_render($form['field_meeting_start']);
    ?>
    </div>

    <div class="span3">
    <?php
        echo drupal_render($form['field_meeting_end']);
    ?>
    </div>

    <div class="span3">
    <?php
        echo drupal_render($form['field_meeting_reg_deadline']);
    ?>
    </div>

    <div class="span12">
        <hr />
    </div>

    <div class="span4">
    <?php
        echo drupal_render($form['field_meeting_organizer']);
        echo drupal_render($form['field_meeting_coorganizer']);
    ?>
    </div>

    <div class="span2">
    <?php
        echo drupal_render($form['field_meeting_languages']);
    ?>
    </div>

    <div class="span6">
    <?php
        echo drupal_render($form['field_meeting_image']);
    ?>
    </div>

    <div class="span12">
        <hr />
    </div>

    <div class="span6">
    <?php
        echo drupal_render($form['field_meeting_location']);
    ?>
    </div>

    <div class="span4">
    <?php
        echo drupal_render($form['field_meeting_country']);
        echo drupal_render($form['field_meeting_city']);
    ?>
    </div>

    <div class="span2">
    <?php
        echo drupal_render($form['field_meeting_latitude']);
        echo drupal_render($form['field_meeting_longitude']);
    ?>
    </div>

    <div class="span6">
    <?php
        echo drupal_render($form['field_meeting_address']);
    ?>
    </div>

    <div class="clearfix">&nbsp;</div>

    <div class="span12">
    <?php
        hide($form['field_meeting_documents']);
        echo drupal_render_children($form);
    ?>
    </div>
</div>

<?php
    $path = drupal_get_path('theme', 'cms_theme');
    drupal_add_js("$path/js/theme.js");
?>
