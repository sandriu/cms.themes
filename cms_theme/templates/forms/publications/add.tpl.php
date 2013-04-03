<div id="publication-form">
<legend  class="form-section-legend">
    <a href="javascript:void(0); " data-toggle="collapse" data-target="#bibliographic-fields"><i class="icon-minus-sign"></i></a>
    <?php echo t('Bibliographic information'); ?>
</legend>

<div id="bibliographic-fields" class="collapse in">
    <div class="span7">
    <?php
        echo drupal_render($form['title']);
    ?>
    </div>

    <div class="span4">
    <?php
        echo drupal_render($form['field_publication_language']);
    ?>
    </div>

    <div class="clearfix">&nbsp;</div>

    <div class="span11">
    <?php
        echo drupal_render($form['body']);
    ?>
    <hr />
    </div>

    <div class="clearfix">&nbsp;</div>

    <div class="span11">
    <?php
        echo drupal_render($form['field_publication_author']);
        echo drupal_render($form['field_publication_co_authors']);
    ?>
    </div>

    <div class="clearfix">&nbsp;</div>
    <br />

    <div class="span3">
    <?php
        echo drupal_render($form['field_publication_edition']);
    ?>
    </div>

    <div class="span5">
    <?php
        echo drupal_render($form['field_publication_publisher']);
    ?>
    </div>
</div>

<div class="clearfix">&nbsp;</div>

<legend  class="form-section-legend">
    <a href="javascript:void(0); " data-toggle="collapse" data-target="#files-fields"><i class="icon-minus-sign"></i></a>
    <?php echo t('Files'); ?>
</legend>

<div id="files-fields" class="collapse in">
    <div class="span11">
    <?php
        echo drupal_render($form['field_publication_attachment']);
    ?>
    </div>

    <div class="span11">
    <?php
        echo drupal_render($form['field_publication_image']);
    ?>
    </div>
</div>

<div class="clearfix">&nbsp;</div>

<legend  class="form-section-legend">
    <a href="javascript:void(0); " data-toggle="collapse" data-target="#details-fields"><i class="icon-minus-sign"></i></a>
    <?php echo t('Details'); ?>
</legend>

<div id="details-fields" class="collapse in">
    <div class="span5">
    <?php
        echo drupal_render($form['field_publication_published']);
    ?>
    </div>

    <div class="span5">
        <div class="pull-left">
    <?php
        echo drupal_render($form['field_publication_type']);
    ?>
        </div>
        <div class="pull-left span2">
    <?php
    ?>
        </div>
    </div>

    <div class="clearfix">&nbsp;</div>

    <div class="span5">
    <?php
        echo drupal_render($form['field_publication_city']);
        echo drupal_render($form['field_publication_country']);
    ?>
    </div>

    <div class="span5">
    <?php
        echo drupal_render($form['field_publication_instrument']);
    ?>
    </div>


    <div class="clearfix">&nbsp;</div>

    <div class="span5">
    <?php
        echo drupal_render($form['field_publication_order_code']);
    ?>
    </div>

    <div class="span5">
    <?php
        echo drupal_render($form['field_publication_source']);
    ?>
    </div>
</div>

<div class="clearfix">&nbsp;</div>

<legend  class="form-section-legend">
    <a href="javascript:void(0); " data-toggle="collapse" data-target="#related-content-fields"><i class="icon-minus-sign"></i></a>
    <?php echo t('Related content'); ?>
</legend>

<div id="related-content-fields" class="collapse in">
    <div class="span11">
    <?php
        echo drupal_render($form['field_publication_species']);
    ?>
    </div>

    <div class="clearfix">&nbsp;</div>

    <?php
        echo drupal_render_children($form);
    ?>
</div>
</div>

<?php
    $path = drupal_get_path('theme', 'cms_theme');
    drupal_add_js("$path/js/theme.js");
?>
