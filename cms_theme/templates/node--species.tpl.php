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
                    $args = array($node->title, $node->nid);
                    echo l(t('Update IUCN status'), 'species/nojs/update/' . implode("/", $args), array('attributes' => array('class' => array('use-ajax'))));
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
      <li><a href="#geography" data-toggle="tab">Geography</a></li>
    </ul>
</p>

<div id="speciesFactsheetTabContent" class="tab-content">
    <div class="tab-pane fade in active" id="general">
        <table class="table table-condensed table-hover">
            <?php echo render($content['field_species_scientific_order']); ?>
            <?php echo render($content['field_species_class']); ?>
            <?php echo render($content['field_species_order']); ?>
            <?php echo render($content['field_species_family']); ?>
            <?php echo render($content['field_species_subspecies']); ?>
            <tr>
                <th><?php echo t('Scientific name'); ?></th>
                <td><?php echo $node->title; ?></td>
            </tr>
            <?php echo render($content['field_species_iucn_status']); ?>
            <?php echo render($content['field_species_iucn_web_srv']); ?>
        </table>

        <h3><?php echo t('Name'); ?></h3>
        <table class="table table-condensed table-hover">
            <tbody>
                <?php echo render($content['field_species_former_name']); ?>
                <?php echo render($content['field_species_name_en']); ?>
                <?php echo render($content['field_species_name_fr']); ?>
                <?php echo render($content['field_species_name_es']); ?>
                <?php echo render($content['field_species_name_de']); ?>
            </tbody>
        </table>

        <h3><?php echo t('Actions'); ?></h3>
        <table class="table table-condensed table-hover">
            <tbody>
                <?php echo render($content['field_species_concerted_action']); ?>
                <?php echo render($content['field_species_cooperative_action']); ?>
            </tbody>
        </table>

        <h3><?php echo t('Appendices'); ?></h3>
        <table class="table table-condensed table-hover">
            <tbody>
                <?php echo render($content['field_species_appendix']); ?>
                <?php echo render($content['field_species_appendix_1_date']); ?>
                <?php echo render($content['field_species_appendix_2_date']); ?>
            </tbody>
        </table>


        <h3><?php echo t('Other informations'); ?></h3>
        <table class="table table-condensed table-hover two-rows-widget">
            <tbody>
                <?php echo render($content['field_species_instruments']); ?>
            </tbody>
        </table>
    </div>


    <div class="tab-pane fade" id="population">
    <h3><?php echo t('Global population'); ?></h3>
    <table class="table table-condensed table-hover species-population-global">
        <tbody>
            <?php echo render($content['field_species_pop_global']); ?>
            <?php echo render($content['field_species_pop_global_date']); ?>
            </tr>
        </tbody>
    </table>

    <h3><?php echo t('Population'); ?></h3>
    <table class="table table-condensed table-hover two-rows-widget">
        <thead>
            <tr>
                <th>Legal instrument</th>
                <th>Population</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php echo render($content['field_species_pop']); ?>
        </tbody>
    </table>

        <?php
            $field = field_view_field('node', $node, 'field_species_pop_status');
        ?>
        <h3><?php echo t('Population status'); ?></h3>
        <table class="table table-condensed table-hover two-rows-widget">
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
        <table class="table table-condensed table-hover two-rows-widget">
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

    <div class="tab-pane fade" id="geography">
        <?php
            $field = field_view_field('node', $node, 'field_species_range_states');
        ?>
        <h3><?php echo t('Range states'); ?></h3>
        <table class="table table-condensed table-hover two-rows-widget">
            <thead>
                <tr>
                    <th><?php echo t('Country'); ?></th>
                    <th><?php echo t('Territories'); ?></th>
                    <th><?php echo t('Actions'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php echo TwoColumnValueWidget::renderField($field, 'field_species_range_state', 'field_species_territories'); ?>
                <tr>
                    <td colspan="3"><?php echo render($field['#suffix']); ?></td>
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
