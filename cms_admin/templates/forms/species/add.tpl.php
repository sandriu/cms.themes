<fieldset>
    <legend>
        <span class="fieldset-legend">
            Name
        </span>
    </legend>

    <div class="fieldset-wrapper">
        <?php
            echo drupal_render($form['field_species_scientific_order']);
            echo drupal_render($form['title']);
            echo drupal_render($form['field_species_subspecies']);
            echo drupal_render($form['field_species_former_name']);
            echo drupal_render($form['field_species_name_en']);
            echo drupal_render($form['field_species_name_fr']);
            echo drupal_render($form['field_species_name_es']);
            echo drupal_render($form['field_species_name_de']);
        ?>
    </div>
</fieldset>

<fieldset>
    <legend>
        <span class="fieldset-legend">
            Taxonomy
        </span>
    </legend>

    <div class="fieldset-wrapper">
        <?php
            echo drupal_render($form['field_species_class']);
            echo drupal_render($form['field_species_order']);
            echo drupal_render($form['field_species_family']);
        ?>
    </div>
</fieldset>

<fieldset>
    <legend>
        <span class="fieldset-legend">
            Appendices
        </span>
    </legend>

    <div class="fieldset-wrapper">
        <?php
            echo drupal_render($form['field_species_appendix']);
            echo drupal_render($form['field_species_appendix_1_date']);
            echo drupal_render($form['field_species_appendix_2_date']);
        ?>
    </div>
</fieldset>

<fieldset>
    <legend>
        <span class="fieldset-legend">
            Actions
        </span>
    </legend>

    <div class="fieldset-wrapper">
        <?php
            echo drupal_render($form['field_species_concerted_action']);
            echo drupal_render($form['field_species_cooperative_action']);
        ?>
    </div>
</fieldset>

<fieldset>
    <legend>
        <span class="fieldset-legend">
            Population
        </span>
    </legend>

    <div class="fieldset-wrapper">
        <?php
            echo drupal_render($form['field_species_pop_global']);
            echo drupal_render($form['field_species_pop_global_date']);
        ?>
    </div>
</fieldset>

<fieldset>
    <legend>
        <span class="fieldset-legend">
            Other
        </span>
    </legend>

    <div class="fieldset-wrapper">
        <?php
            echo drupal_render($form['field_species_critical_sites']);
            echo drupal_render($form['field_species_range_states']);
            echo drupal_render($form['field_species_instruments']);
            echo drupal_render($form['field_species_notes']);
        ?>
    </div>
</fieldset>

<?php
    echo drupal_render_children($form);
?>
