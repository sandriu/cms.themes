<?php
    dsm($form['field_aewa_population_status']);
    $current_profile = CMSUtils::get_current_profile();
?>

<div id="species-form">
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
        echo drupal_render($form['field_species_genus']);
    ?>
    </div>

    <div class="span3">
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
        echo drupal_render($form['field_species_species']);
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

    <div class="span4">
    <?php
        echo drupal_render($form['field_species_author']);
    ?>
    </div>

    <div class="span4">
    <?php
        echo drupal_render($form['field_species_standard_reference']);
    ?>
    </div>

    <div class="span4 hidden">
    <?php
        echo drupal_render($form['title']);
    ?>
    </div>
</div>

<div class="clearfix">&nbsp;</div>

<legend  class="form-section-legend">
    <a href="javascript:void(0); " data-toggle="collapse" data-target="#common-names-fields"><i class="icon-plus-sign"></i></a>
    <?php echo t('Common names'); ?>
</legend>

<div id="common-names-fields" class="collapse out">
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
    <a href="javascript:void(0); " data-toggle="collapse" data-target="#assessment-information-fields"><i class="icon-plus-sign"></i></a>
    <?php echo t('Assessment information'); ?>
</legend>

<div id="assessment-information-fields" class="collapse out">
    <div class="span11">
    <?php
        echo drupal_render($form['field_species_instruments']);
    ?>
    <hr />
    </div>

    <div class="span3">
    <?php
        echo drupal_render($form['field_species_pop_global']);
        echo drupal_render($form['field_species_pop_global_date']);
    ?>
    </div>

    <div class="span3">
    <?php
        echo drupal_render($form['field_species_appendix_1_date']);
        echo drupal_render($form['field_species_appendix_2_date']);
    ?>
    </div>

    <div class="span2">
    <?php
        echo drupal_render($form['field_species_concerted_action']);
        echo drupal_render($form['field_species_cooperative_action']);
    ?>
    </div>

</div>

<div class="clearfix">&nbsp;</div>

<legend  class="form-section-legend">
    <a href="javascript:void(0); " data-toggle="collapse" data-target="#geographic-range-fields"><i class="icon-plus-sign"></i></a>
    <?php
        if (CMSUtils::is_CMS()) {
            echo t('Global geographic range');
        }else {
            echo t('Geographic range');
        }
    ?>
</legend>

<div id="geographic-range-fields" class="collapse out">
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
    <a href="javascript:void(0); " data-toggle="collapse" data-target="#population-fields"><i class="icon-plus-sign"></i></a>
    <?php echo t('Population(s) per instrument'); ?>
</legend>

<div id="population-fields" class="collapse out">
    <div class="span11">
    <?php
        echo drupal_render($form['field_species_pop']);
    ?>
    </div>
</div>

<div class="clearfix">&nbsp;</div>

<legend  class="form-section-legend">
    <a href="javascript:void(0); " data-toggle="collapse" data-target="#population-size-fields"><i class="icon-plus-sign"></i></a>
    <?php echo t('Population size and trend'); ?>
</legend>

<div id="population-size-fields" class="collapse out">
    <div class="span11">
    <?php
        echo drupal_render($form['field_species_pop_size']);
    ?>
    </div>
</div>

<div class="clearfix">&nbsp;</div>

<?php
    if ($current_profile == 'aewa') {
?>
<legend  class="form-section-legend">
    <a href="javascript:void(0); " data-toggle="collapse" data-target="#country-status"><i class="icon-plus-sign"></i></a>
    <?php echo t('AEWA Country status'); ?>
</legend>

<div id="country-status" class="collapse out">
    <?php
        echo drupal_render($form['field_species_status_per_country']);
    ?>
</div>

<div class="clearfix">&nbsp;</div>
<?php
    }else {
        hide($form['field_species_status_per_country']);
    }
?>

<?php
    if ($current_profile == 'aewa') {
?>
<legend  class="form-section-legend">
    <a href="javascript:void(0); " data-toggle="collapse" data-target="#population-status"><i class="icon-plus-sign"></i></a>
    <?php echo t('AEWA Population status'); ?>
</legend>

<div id="population-status" class="collapse out">
    <?php
        echo drupal_render($form['field_aewa_population_status']);
    ?>
</div>

<div class="clearfix">&nbsp;</div>
<?php
    }else {
        hide($form['field_aewa_population_status']);
    }
?>

<legend  class="form-section-legend">
    <a href="javascript:void(0); " data-toggle="collapse" data-target="#other-fields"><i class="icon-plus-sign"></i></a>
    <?php echo t('Other'); ?>
</legend>

<div id="other-fields" class="collapse out">
    <?php
        echo drupal_render($form['field_species_threats']);
    ?>
    <div class="clearfix">&nbsp;</div>
    <?php
        echo drupal_render($form['field_species_critical_sites']);
    ?>
    <div class="clearfix">&nbsp;</div>
    <?php
        echo drupal_render($form['field_species_notes']);
    ?>
</div>

<div class="clearfix">&nbsp;</div>

<?php
    hide($form['field_species_iucn_status']);
    hide($form['field_species_iucn_web_srv']);
    echo drupal_render_children($form);
?>
</div>

<?php
    $path = drupal_get_path('theme', 'cms_theme');
    drupal_add_js("$path/js/theme.js");
?>