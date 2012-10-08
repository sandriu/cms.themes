<legend  class="form-section-legend">
    <a href="javascript:void(0); " data-toggle="collapse" data-target="#taxonomy-fields"><i class="icon-minus-sign"></i></a>
    <?php echo t('Taxonomy'); ?>
</legend>

<div id="taxonomy-fields" class="collapse in">
    <div class="span4">
    <?php
        echo drupal_render($form['field_species_class']);
    ?>
    </div>

    <div class="span4">
    <?php
        echo drupal_render($form['field_species_scientific_order']);
    ?>
    </div>

    <div class="span4">
    <?php
        echo drupal_render($form['field_species_order']);
    ?>
    </div>

    <div class="span4">
    <?php
        echo drupal_render($form['title']);
    ?>
    </div>

    <div class="span4">
    <?php
        echo drupal_render($form['field_species_family']);
    ?>
    </div>

    <div class="span4">
    <?php
        echo drupal_render($form['field_species_subspecies']);
    ?>
    </div>
</div>

<div class="clearfix">&nbsp;</div>

<legend  class="form-section-legend">
    <a href="javascript:void(0); " data-toggle="collapse" data-target="#common-names-fields"><i class="icon-minus-sign"></i></a>
    <?php echo t('Common names'); ?>
</legend>

<div id="common-names-fields" class="collapse in">
    <div class="span4">
    <?php
        echo drupal_render($form['field_species_name_en']);
    ?>
    </div>
    
    <div class="span4">
    <?php
        echo drupal_render($form['field_species_name_fr']);
    ?>
    </div>
    
    <div class="clearfix">&nbsp;</div>
    
    <div class="span4">
    <?php
        echo drupal_render($form['field_species_name_es']);
    ?>
    </div>
    
    <div class="span4">
    <?php
        echo drupal_render($form['field_species_name_de']);
    ?>
    </div>

    <div class="span4">
    <?php
        echo drupal_render($form['field_species_former_name']);
    ?>
    </div>
</div>

<div class="clearfix">&nbsp;</div>

<legend  class="form-section-legend">
    <a href="javascript:void(0); " data-toggle="collapse" data-target="#assessment-information-fields"><i class="icon-minus-sign"></i></a>
    <?php echo t('Assessment information'); ?>
</legend>

<div id="assessment-information-fields" class="collapse in">
    <div class="span4">
    <?php
        echo drupal_render($form['field_species_iucn_status']);
    ?>
    </div>

    <div class="span4">
    <?php
        echo drupal_render($form['field_species_iucn_web_srv']);
    ?>
    </div>

    <div class="span4">
    <?php
        echo drupal_render($form['field_species_instruments']);
    ?>
    </div>

    <div class="span4">
    <?php
        echo drupal_render($form['field_species_concerted_action']);
        echo drupal_render($form['field_species_cooperative_action']);
    ?>
    </div>

    <div class="clearfix">&nbsp;</div>

    <div class="span4">
    <?php
    echo drupal_render($form['field_species_pop_global_date']);
    ?>
    </div>
    <div class="span4">
        <br />
        <br />
        <br />
    <?php
        echo drupal_render($form['field_species_pop_global']);
    ?>
    </div>

    <div class="clearfix">&nbsp;</div>

    <div class="span4">
    <?php
        echo drupal_render($form['field_species_appendix_1_date']);
    ?>
    </div>

    <div class="span4">
    <?php
        echo drupal_render($form['field_species_appendix_2_date']);
    ?>
    </div>

        <div class="span4">
    <?php
        echo drupal_render($form['field_species_appendix']);
    ?>
    </div>

</div>

<div class="clearfix">&nbsp;</div>

<legend  class="form-section-legend">
    <a href="javascript:void(0); " data-toggle="collapse" data-target="#geographic-range-fields"><i class="icon-minus-sign"></i></a>
    <?php echo t('Geographic range'); ?>
</legend>

<div id="geographic-range-fields" class="collapse in">
    <div class="span11">
    <?php
        echo drupal_render($form['field_species_range_states']);
    ?>
    </div>

    <div class="span11">
    <hr />
    <?php
        echo drupal_render($form['field_species_range_states_notes']);
    ?>
    </div>
</div>

<div class="clearfix">&nbsp;</div>

<legend  class="form-section-legend">
    <a href="javascript:void(0); " data-toggle="collapse" data-target="#population-fields"><i class="icon-minus-sign"></i></a>
    <?php echo t('Population per instrument'); ?>
</legend>

<div id="population-fields" class="collapse in">
    <div class="span11">
    <?php
        echo drupal_render($form['field_species_pop']);
    ?>
    </div>
</div>

<div class="clearfix">&nbsp;</div>

<legend  class="form-section-legend">
    <a href="javascript:void(0); " data-toggle="collapse" data-target="#population-size-fields"><i class="icon-minus-sign"></i></a>
    <?php echo t('Population size'); ?>
</legend>

<div id="population-size-fields" class="collapse in">
    <div class="span11">
    <?php
        echo drupal_render($form['field_species_pop_size']);
    ?>
    </div>
</div>

<div class="clearfix">&nbsp;</div>

<legend  class="form-section-legend">
    <a href="javascript:void(0); " data-toggle="collapse" data-target="#population-trend-fields"><i class="icon-minus-sign"></i></a>
    <?php echo t('Population trend'); ?>
</legend>

<div id="population-trend-fields" class="collapse in">
    <div class="span11">
    <?php
        echo drupal_render($form['field_species_pop_trend']);
    ?>
    </div>
</div>

<div class="clearfix">&nbsp;</div>

<legend  class="form-section-legend">
    <a href="javascript:void(0); " data-toggle="collapse" data-target="#other-fields"><i class="icon-minus-sign"></i></a>
    <?php echo t('Other'); ?>
</legend>

<div id="other-fields" class="collapse in">
    <?php
        echo drupal_render($form['field_species_critical_sites']);
        echo drupal_render($form['field_species_notes']);
    ?>
</div>

<div class="clearfix">&nbsp;</div>

<legend  class="form-section-legend">
    <a href="javascript:void(0); " data-toggle="collapse" data-target="#additional-settings-fields"><i class="icon-plus-sign"></i></a>
    <?php echo t('System settings'); ?>
</legend>

<div id="additional-settings-fields" class="collapse out">
    <?php
        echo drupal_render($form['additional_settings']);
    ?>
</div>

<?php
    echo drupal_render_children($form);
?>

<?php
    $path = drupal_get_path('theme', 'cms_theme');
    drupal_add_js("$path/js/species.js");
?>