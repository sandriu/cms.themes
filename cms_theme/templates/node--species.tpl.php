<button class="btn btn-mini btn-primary" type="button" onclick="history.go(-1); return true;">&laquo; Back</button>

<div class="page-header">
    <h5>
        <?php echo t('Taxonomy'); ?>
    <h5>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>
            <?php
                CMSWidget::renderLabelFromContent('field_species_scientific_order', $content);
            ?>
            </th>
            <th>
            <?php
                print t('Scientific name');
            ?>
            </th>
            <th>
            <?php
                CMSWidget::renderLabelFromContent('field_species_order', $content);
            ?>
            </th>
            <th>
            <?php
                CMSWidget::renderLabelFromContent('field_species_class', $content);
            ?>
            </th>
            <th>
            <?php
                CMSWidget::renderLabelFromContent('field_species_family', $content);
            ?>
            </th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <?php
                $field = field_view_field('node', $node, 'field_species_scientific_order');
                CMSWidget::renderField($field,
                    array('render_label' => FALSE, 'enclosure' => '%s', 'value_enclosure' => '<td>%s</td>')
                );
            ?>
            <td>
            <?php
                print $title;
            ?>
            </td>
            <?php
                $field = field_view_field('node', $node, 'field_species_order');
                CMSWidget::renderField($field,
                    array('render_label' => FALSE, 'enclosure' => '%s', 'value_enclosure' => '<td>%s</td>')
                );

                $field = field_view_field('node', $node, 'field_species_class');
                CMSWidget::renderField($field,
                    array('render_label' => FALSE, 'enclosure' => '%s', 'value_enclosure' => '<td>%s</td>')
                );

                $field = field_view_field('node', $node, 'field_species_family');
                CMSWidget::renderField($field,
                    array('render_label' => FALSE, 'enclosure' => '%s', 'value_enclosure' => '<td>%s</td>')
                );
            ?>
        </tr>
    </tbody>
</table>


<table class="table table-hover table-bordered">
    <tbody>
    <?php
        CMSHTableRowWidget::renderFieldFromOptions(
            array('label' => t('Scientific name'), 'value' => $node->title, 'force_render' => TRUE)
        );

        $field = field_view_field('node', $node, 'field_species_subspecies');
        CMSHTableRowWidget::renderField($field);

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
    $field_species_appendix = field_view_field('node', $node, 'field_species_appendix', array('label' => 'hidden',));
?>
<div class="page-header">
    <h5>
        <?php echo t('Appendices'); ?>
    <h5>
</div>

<table class="table table-hover table-bordered">
    <tbody>
    <?php
        $widget = new CMSHTableRowWidgetMultivalue($field_species_appendix);
        echo $widget->getField();
        $c = count($widget->getValues());

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

<div class="page-header">
    <h5>
        <?php echo t('Actions'); ?>
    </h5>
</div>

<table class="table table-hover table-bordered">
    <tbody>
    <?php
        $field = field_view_field('node', $node, 'field_species_concerted_action');
        CMSHTableRowWidgetBoolean::renderField($field);

        $field = field_view_field('node', $node, 'field_species_cooperative_action');
        CMSHTableRowWidgetBoolean::renderField($field);
    ?>
    </tbody>
</table>

<?php
    if ($node->field_species_pop_global && $node->field_species_pop_global['und'][0]['value']) {
?>
<div class="page-header">
    <h5>
        <?php echo t('Population'); ?>
    <h5>
</div>

<table class="table table-hover table-bordered">
    <tbody>
        <?php
            if (!empty($node->field_species_pop_global)) {
        ?>
        <tr>
            <th scope="row" class="span3">
                <?php
                print $content['field_species_pop_global']['#title'];
                ?>
            </th>

            <td>
                <strong>
                <?php
                print $node->field_species_pop_global['und'][0]['value'];
                ?>
                </strong>
                <?php
                    if ($content['field_species_pop_global_date']['#items'][0]['value']){
                ?>
                in
                <strong>
                <?php
                print $content['field_species_pop_global_date']['#items'][0]['value'];
                ?>
                </strong>
                <?php
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
    }
?>

<?php
    $field = field_view_field('node', $node, 'field_species_range_states', array('label' => 'hidden',));
    if ($field) {
?>
<div class="page-header">
    <h5>
        <?php echo t('Geographic range'); ?>
    <h5>
</div>

<table class="table table-hover table-bordered">
    <tbody>
        <tr>
            <th scope="row" class="span3"><?php print $field['#title']; ?></th>
            <td>
            <?php
                //CMSWidget::multivalue2String($field['#items']);
            ?>
            </td>
        </tr>
    </tbody>
</table>
<?php
    }
?>

<?php
    if (($node->field_species_instruments && $node->field_species_instruments['und'][0]['value']) ||
        ($node->field_species_critical_sites && $node->field_species_critical_sites['und'][0]['value']) ||
        ($node->field_species_notes && $node->field_species_notes['und'][0]['value'])) {
?>
<div class="page-header">
    <h5>
        <?php echo t('Others'); ?>
    <h5>
</div>

<table class="table table-hover table-bordered">
    <tbody>
        <?php
            if ($node->field_species_instruments) {
        ?>
        <tr>
            <th scope="row" class="span3">
                <?php
                print $content['field_species_instruments']['#title'];
                ?>
            </th>

            <td>
                <?php
                foreach($content['field_species_instruments'] as $key => $item) {
                    if (is_numeric($key)) {
                        print $item['#markup'];
                        if ($key + 1 < count($content['field_species_instruments']['#items'])) {
                            print ", ";
                        }
                    }
                }
                ?>
            </td>
        </tr>
        <?php
            }
        ?>

        <?php
            if ($node->field_species_critical_sites && $node->field_species_critical_sites['und'][0]['value']) {
        ?>
        <tr>
            <th scope="row" class="span3">
                <?php
                print $content['field_species_critical_sites']['#title'];
                ?>
            </th>

            <td>
                <?php
                print $node->field_species_critical_sites['und'][0]['value'];
                ?>
            </td>
        </tr>
        <?php
            }
        ?>

        <?php
            if ($node->field_species_notes && $node->field_species_notes['und'][0]['value']) {
        ?>
        <tr>
            <th scope="row" class="span3">
                <?php
                print $content['field_species_notes']['#title'];
                ?>
            </th>

            <td>
                <?php
                print $node->field_species_notes['und'][0]['value'];
                ?>
            </td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>
<?php
    }
?>

<?php
    //print render($content);
    hide($content['links']);
    hide($content['comments']);
?>
