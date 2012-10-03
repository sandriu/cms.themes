<?php

/**
 * Implements hook_theme();
*/
function cms_admin_theme($existing, $type, $theme, $path) {
    return array(
        'species_node_form' => array(
            'render element' => 'form',
            'template' => 'templates/forms/species/add',
            'path' => drupal_get_path('theme', 'cms_admin'),
        ),
    );
}

/**
 * Implements hook_form_alter();
*/
function cms_admin_form_alter(&$form, $form_state, $form_id) {
    /**
     * Alter form only for the form IDs listed below
    */
    $form_ids = array(
        'species_node_form',
    );

    if (isset($form_id) && in_array($form_id, $form_ids)) {
        /**
         * Hide additional settings such as Authoring, Comments...
        */
        // hide($form['additional_settings']);

        /**
         * Add Back button
        */
        $form['actions']['cancel'] = array(
            '#type' => 'button',
            '#value' => t('Back'),
            '#access' => TRUE,
            '#weight' => 15,
            '#attributes' => array('onClick' => 'history.go(-1); return true;'),
            '#post_render' => array('_change_submit_to_button'),
        );
    }
}

