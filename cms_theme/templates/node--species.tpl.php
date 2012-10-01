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
        <table class="table table-condensed table-striped">
            <tr>
                <th><?php CMSWidget::renderLabelFromContent('field_species_scientific_order', $content); ?></th>
                <?php
                    $field = field_view_field('node', $node, 'field_species_scientific_order');
                    CMSWidget::renderField($field,
                        array('render_label' => FALSE, 'enclosure' => '%s', 'value_enclosure' => '<td>%s</td>')
                    );
                ?>
            </tr>
            <tr>
                <th>
                <?php CMSWidget::renderLabelFromContent('field_species_class', $content); ?></th>
                <?php
                    $field = field_view_field('node', $node, 'field_species_class');
                    CMSWidget::renderField($field,
                        array('render_label' => FALSE, 'enclosure' => '%s', 'value_enclosure' => '<td>%s</td>')
                    );
                ?>
            </tr>
            <tr>
                <th><?php CMSWidget::renderLabelFromContent('field_species_order', $content); ?></th>
                <?php
                    $field = field_view_field('node', $node, 'field_species_order');
                    CMSWidget::renderField($field,
                        array('render_label' => FALSE, 'enclosure' => '%s', 'value_enclosure' => '<td>%s</td>')
                    );
                ?>
            </tr>
            <tr>
                <th><?php CMSWidget::renderLabelFromContent('field_species_family', $content); ?></th>
                <?php
                    $field = field_view_field('node', $node, 'field_species_family');
                    CMSWidget::renderField($field,
                        array('render_label' => FALSE, 'enclosure' => '%s', 'value_enclosure' => '<td>%s</td>')
                    );
                ?>
            </tr>
            <?php
                $field = field_view_field('node', $node, 'field_species_subspecies');
                CMSHTableRowWidget::renderField($field);
            ?>
            <tr>
                <th><?php echo t('Scientific name'); ?></th>
                <td><?php echo $node->title; ?></td>
            </tr>
            <?php
                // IUCN status
                $field = field_view_field('node', $node, 'field_species_iucn_status');
                CMSHTableRowWidget::renderField($field);

                // IUCN link
                $field = field_view_field('node', $node, 'field_species_iucn_web_srv');
                $widget = new CMSHTableRowWidget($field);
                if($widget->is_valid) {
            ?>
                <tr>
                    <th>
                        <?php echo $widget->getLabel(); ?>
                    </th>
                    <td>
                        <a target="_blank" title="<?php t('Visit IUCN page for this species'); ?>" href="<?php echo $widget->getValue(); ?>"><?php echo $widget->getValue(); ?></a>
                    </td>
                </tr>
            <?php } ?>
        </table>

        <h3><?php echo t('Name'); ?></h3>
        <table class="table table-condensed table-striped">
            <tbody>
            <?php
                $field = field_view_field('node', $node, 'field_species_former_name');
                CMSHTableRowWidget::renderField($field);

                $field = field_view_field('node', $node, 'field_species_name_en');
                CMSHTableRowWidget::renderField($field);

                $field = field_view_field('node', $node, 'field_species_name_fr');
                CMSHTableRowWidget::renderField($field);

                $field = field_view_field('node', $node, 'field_species_name_es');
                CMSHTableRowWidget::renderField($field);

                $field = field_view_field('node', $node, 'field_species_name_de');
                CMSHTableRowWidget::renderField($field);
            ?>
            </tbody>
        </table>

        <?php
            $field_c_action = field_view_field('node', $node, 'field_species_concerted_action');
            $field_coop_action = field_view_field('node', $node, 'field_species_cooperative_action');
        ?>
        <h3><?php echo t('Actions'); ?></h3>
        <table class="table table-condensed table-striped">
            <tbody>
            <?php
                CMSHTableRowWidgetBoolean::renderField($field_c_action);
                CMSHTableRowWidgetBoolean::renderField($field_coop_action);
            ?>
            </tbody>
        </table>

        <?php
            $field_species_appendix = field_view_field('node', $node, 'field_species_appendix');
            $widget = new CMSHTableRowWidgetMultivalue($field_species_appendix);
            $c = count($widget->getValues());
            if($c > 0) {
        ?>
        <h3><?php echo t('Appendices'); ?></h3>
        <table class="table table-condensed table-striped">
            <tbody>
            <?php
                echo $widget->getField();

                CMSHTableRowWidget::renderField(
                    field_view_field('node', $node, 'field_species_appendix_1_date'),
                    array(),
                    $widget->valid() && $c >= 1
                );
                
                CMSHTableRowWidget::renderField(
                    field_view_field('node', $node, 'field_species_appendix_2_date'),
                    array(),
                    $widget->valid() && $c == 2
                );
            ?>
            </tbody>
        </table>
        <?php
            }
        ?>

        <?php
            $field = field_view_field('node', $node, 'field_species_instruments');
        ?>
        <table class="table table-condensed table-striped">
            <tbody>
                <?php echo LegalInstrumentsWidget::renderField($field, 'field_species_instruments', NULL); ?>
                <?php
                    $field = field_view_field('node', $node, 'field_species_notes');
                    CMSHTableRowWidget::renderField($field);
                ?>
            </tbody>
        </table>
    </div>


    <div class="tab-pane fade" id="population">
    <?php
        $fpg = field_view_field('node', $node, 'field_species_pop_global');
        $fpg['#label_display'] = 'hidden';

        $fpgd = field_view_field('node', $node, 'field_species_pop_global_date');
        $fpg['#label_display'] = 'hidden';

        $r_fpg = render($fpg);
        $r_fpgd = render($fpgd);

        #dpm($r_fpg);
        #dpm($r_fpgf);
        $show = !empty($r_fpg) || !empty($r_fpgd);
        if($show) {
            $pg = sprintf('<em>%s</em> (<em>%s</em>)', $r_fpg, $r_fpgd);
    ?>
        <h3><?php echo t('Global population'); ?></h3>
        <table class="table table-condensed table-striped species-population-global">
            <tbody>
                <tr>
                    <th scope="row" class="span3">
                        <?php CMSWidget::renderLabelFromContent('field_species_pop_global', $content); ?>
                    </th>
                    <td><?php echo $pg; ?></td>
                </tr>
            </tbody>
        </table>
        <?php
            }
        ?>

        <?php
            $field = field_view_field('node', $node, 'field_species_pop');
            if(!empty($field)) {
        ?>
        <h2><?php echo t('Population'); ?><h5>
        <table class="table table-condensed table-striped two-rows-widget">
            <thead>
                <tr>
                    <th>Legal instrument</th>
                    <th>Population</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php echo TwoColumnValueWidget::renderField($field, 'field_species_pop_li', 'field_species_pop_v'); ?>
                    <tr>
                        <td colspan="3"><?php echo render($field['#suffix']); ?></td>
                    </tr>
                </tr>
            </tbody>
        </table>
        <?php
            }
        ?>

        <?php
            $field = field_view_field('node', $node, 'field_species_pop_status');
        ?>
        <h3><?php echo t('Population status'); ?></h3>
        <table class="table table-condensed table-striped two-rows-widget">
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
        <table class="table table-condensed table-striped two-rows-widget">
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
        <table class="table table-condensed table-striped two-rows-widget">
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
