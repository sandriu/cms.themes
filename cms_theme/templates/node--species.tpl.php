<div class="clear"></div>
<?php if (node_access("update", $node) === TRUE): ?>
<div class="pull-left">
    <div class="btn-toolbar">
        <div class="btn-group">
        <?php print l(t('Edit'), 'node/' . $nid . '/edit', array('attributes' => array('class' => 'btn btn-primary'), 'query' => drupal_get_destination())); ?>
        </div>
        <div class="btn-group">
        <?php print l(t('Delete'), 'node/' . $nid . '/delete',
                array('attributes' => array('class' => 'btn btn-danger'))
        ); ?>
        </div>
        <div class="btn-group">
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#"><?php echo t('Action'); ?><span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li>
                    <?php
                    drupal_add_library('system', 'drupal.ajax');
                    drupal_add_library('system', 'jquery.form');
                    $js = 'jQuery(document).ready(function($){
                            $("#btnupdatespecies").click(function(){
                                $(this).parent().parent().parent().removeClass("open");
                            });
                         }); 
                        ';

                    drupal_add_js($js, 'inline');
                    $args = array($node->title, $node->nid);
                    echo l(t('Update IUCN status'), 'species/nojs/update/' . implode("/", $args), array('attributes' => array('class' => array('use-ajax'), 'id' => 'btnupdatespecies')));
                    ?>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php endif; ?>
<div class="clearfix"></div>

<p>
    <ul class="nav nav-tabs">
      <li class="active"><a href="#general" data-toggle="tab">General information</a></li>
      <li><a href="#population" data-toggle="tab">Population</a></li>
    </ul>
</p>

<div id="speciesFactsheetTabContent" class="tab-content">
    <div class="tab-pane fade in active" id="general">
        <div class="row">
            <div class="row span7">
                <table class="table table-condensed table-hover two-columns">
                    <caption><?php echo t('Taxonomy'); ?></caption>
                    <?php echo render($content['field_species_scientific_order']); ?>
                    <?php echo render($content['field_species_class']); ?>
                    <?php echo render($content['field_species_order']); ?>
                    <?php echo render($content['field_species_family']); ?>
                    <tr>
                        <th><?php echo t('Scientific name'); ?></th>
                        <td><?php echo $node->title; ?></td>
                    </tr>
                    <?php echo render($content['field_species_subspecies']); ?>
                </table>
            </div>
            <div class="span5">
                <div class="gallery">
                    PICTURE HERE
                </div>
            </div>
        </div>

    <?php
        if(check_display_field($content, 'field_species_name_en')) {
    ?>
        <table class="table table-condensed table-hover two-columns">
            <caption><?php echo t('Common names'); ?></caption>
            <tbody>
                <?php echo render($content['field_species_name_en']); ?>
                <?php echo render($content['field_species_name_fr']); ?>
                <?php echo render($content['field_species_name_es']); ?>
                <?php echo render($content['field_species_name_de']); ?>
                <?php echo render($content['field_species_former_name']); ?>
            </tbody>
        </table>
    <?php
        }
    ?>

        <table class="table table-condensed table-hover two-columns">
            <caption><?php echo t('Assessment information'); ?></caption>
            <tbody>
                <?php echo render($content['field_species_iucn_status']); ?>
                <?php echo render($content['field_species_iucn_web_srv']); ?>
                <?php echo render($content['field_species_concerted_action']); ?>
                <?php echo render($content['field_species_cooperative_action']); ?>
                <?php echo render($content['field_species_appendix']); ?>
                <?php echo render($content['field_species_appendix_1_date']); ?>
                <?php echo render($content['field_species_appendix_2_date']); ?>
                <?php echo render($content['field_species_instruments']); ?>
            <?php
                if(check_display_field($content, 'field_species_pop_global', 'field_species_pop_global_date')) {
            ?>
                <tr>
                    <th><?php echo t('Global population'); ?></th>
                    <td>
                        <?php
                        if(!empty($content['field_species_pop_global']['#items'])) {
                            echo render($content['field_species_pop_global']);
                        }
                        if(!empty($content['field_species_pop_global_date']['#items'])) {
                            echo ' ('.render($content['field_species_pop_global_date']).')';
                        }
                        ?>
                    </td>
                </tr>
            <?php
                }
            ?>
            </tbody>
        </table>

    <?php
        if(check_display_field($content, 'field_species_range_states')) {
    ?>
        <table class="table table-condensed table-hover two-columns">
            <caption><?php echo t('Geographic range'); ?></caption>
            <tbody>
                <tr>
                    <th>Countries</th>
                    <td><?php echo render($content['field_species_range_states']); ?></td>
                </tr>
            </tbody>
        </table>
    <?php
        }
    ?>

    <?php
        if(check_display_field($content, 'field_species_pop')) {
    ?>
    <table class="table table-condensed table-hover two-columns">
        <caption><?php echo t('Population per instrument'); ?></caption>
        <thead>
            <tr>
                <th><?php echo t('Instrument'); ?></th>
                <th><?php echo t('Size'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php echo render($content['field_species_pop']); ?>
        </tbody>
    </table>
    <?php
        }
    ?>

    <?php
        if(check_display_field($content, 'field_species_pop_size')) {
    ?>
    <table class="table table-condensed table-hover two-columns">
        <caption><?php echo t('Population size'); ?></caption>
        <thead>
            <tr>
                <th><?php echo t('Region'); ?></th>
                <th><?php echo t('Years'); ?></th>
                <th><?php echo t('Quality'); ?></th>
                <th><?php echo t('Estimate'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php echo render($content['field_species_pop_size']); ?>
        </tbody>
    </table>
    <?php
        }
    ?>


    <?php
        if(check_display_field($content, 'field_species_pop_trend')) {
    ?>
    <table class="table table-condensed table-hover two-columns">
        <caption><?php echo t('Population size'); ?></caption>
        <thead>
            <tr>
                <th><?php echo t('Region'); ?></th>
                <th><?php echo t('Years'); ?></th>
                <th><?php echo t('Quality'); ?></th>
                <th><?php echo t('Estimate'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php echo render($content['field_species_pop_size']); ?>
        </tbody>
    </table>
    <?php
        }
    ?>


    <?php
        if(!empty($content['field_species_notes']['#items'])) {
    ?>
        <div>
            <strong><?php echo t('Notes'); ?></strong>
            <div>
                <?php echo render($content['field_species_notes']); ?>
            </div>
        </div>
    <?php
        }
    ?>
    </div>


    <div class="tab-pane fade" id="population">

        <?php
            $field = field_view_field('node', $node, 'field_species_pop_status');
        ?>
        <h3><?php echo t('Population status'); ?></h3>
        <table class="table table-condensed table-hover two-columns">
            <thead>
                <tr>
                    <th>Country</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php echo TwoColumnValueWidget::renderField($field, 'field_species_pop_status_c', 'field_species_pop_status_v'); ?>
                    <tr>
                        <td colspan="3"><?php echo render($field['#suffix']); ?></td>
                    </tr>
                </tr>
            </tbody>
        </table>

        <?php
            $field = field_view_field('node', $node, 'field_species_pop_trend');
        ?>
        <h3><?php echo t('Population trend'); ?></h3>
        <table class="table table-condensed table-hover two-columns">
            <thead>
                <tr>
                    <th>Country</th>
                    <th>Trend</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php echo TwoColumnValueWidget::renderField($field, 'field_species_pop_trend_c', 'field_species_pop_trend_v'); ?>
                    <tr>
                        <td colspan="3"><?php echo render($field['#suffix']); ?></td>
                    </tr>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php
    //print render($content);
    hide($content['links']);
    hide($content['comments']);
?>
