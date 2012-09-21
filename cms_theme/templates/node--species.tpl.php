<button class="btn btn-mini btn-primary" type="button" onclick="history.go(-1); return true;">&laquo; Back</button>

<div class="page-header">
    <h5>
        Taxonomy
    <h5>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <?php
                if (!empty($node->field_species_scientific_order)) {
            ?>
            <th>
                <?php
                print $content['field_species_scientific_order']['#title'];
                ?>
            </th>
            <?php
                }
            ?>

            <?php
                if ($node->title) {
            ?>
            <th>
                Title
            </th>
            <?php
                }
            ?>

            <?php
                if ($node->field_species_order) {
            ?>
            <th>
                <?php
                print $content['field_species_order']['#title'];
                ?>
            </th>
            <?php
                }
            ?>

            <?php
                if ($node->field_species_class) {
            ?>
            <th>
                <?php
                print $content['field_species_class']['#title'];
                ?>
            </th>
            <?php
                }
            ?>

            <?php
                if ($node->field_species_family) {
            ?>
            <th>
                <?php
                print $content['field_species_family']['#title'];
                ?>
            </th>
            <?php
                }
            ?>
        </tr>
    </thead>

    <tbody>
        <tr>
            <?php
                if ($node->field_species_scientific_order) {
            ?>
            <td>
                <?php
                print $node->field_species_scientific_order['und'][0]['value'];
                ?>
            </td>
            <?php
                }
            ?>

            <?php
                if ($node->title) {
            ?>
            <td>
                <?php
                print $title;
                ?>
            </td>
            <?php
                }
            ?>

            <?php
                if ($node->field_species_order) {
            ?>
            <td>
                <?php
                print $node->field_species_order['und'][0]['value'];
                ?>
            </td>
            <?php
                }
            ?>

            <?php
                if ($node->field_species_class) {
            ?>
            <td>
                <?php
                print $node->field_species_class['und'][0]['value'];
                ?>
            </td>
            <?php
                }
            ?>

            <?php
                if ($node->field_species_family) {
            ?>
            <td>
                <?php
                print $node->field_species_family['und'][0]['value'];
                ?>
            </td>
            <?php
                }
            ?>
        </tr>
    </tbody>
</table>

<table class="table table-hover table-bordered">
    <tbody>
        <?php
            if ($node->title) {
        ?>
        <tr>
            <th scope="row" class="span3">
                <?php
                #print $content['title']['#title'];
                ?>
                Scientific name
            </th>

            <td>
                <?php
                print $title;
                ?>
            </td>
        </tr>
        <?php
            }
        ?>

        <?php
            if ($node->field_species_subspecies && $node->field_species_subspecies['und'][0]['value']) {
        ?>
        <tr>
            <th scope="row" class="span3">
                <?php
                print $content['field_species_subspecies']['#title'];
                ?>
            </th>

            <td>
                <?php
                print $node->field_species_subspecies['und'][0]['value'];
                ?>
            </td>
        </tr>
        <?php
            }
        ?>

        <?php
            if ($node->field_species_former_name && $node->field_species_subspecies['und'][0]['value']) {
        ?>
        <tr>
            <th scope="row" class="span3">
                <?php
                print $content['field_species_former_name']['#title'];
                ?>
            </th>

            <td>
                <?php
                print $node->field_species_former_name['und'][0]['value'];
                ?>
            </td>
        </tr>
        <?php
            }
        ?>

        <?php
            if ($node->field_species_name_en) {
        ?>
        <tr>
            <th scope="row" class="span3">
                <?php
                print $content['field_species_name_en']['#title'];
                ?>
            </th>

            <td>
                <?php
                print $node->field_species_name_en['und'][0]['value'];
                ?>
            </td>
        </tr>
        <?php
            }
        ?>

        <?php
            if ($node->field_species_name_fr) {
        ?>
        <tr>
            <th scope="row" class="span3">
                <?php
                print $content['field_species_name_fr']['#title'];
                ?>
            </th>

            <td>
                <?php
                print $node->field_species_name_fr['und'][0]['value'];
                ?>
            </td>
        </tr>
        <?php
            }
        ?>

        <?php
            if ($node->field_species_name_es) {
        ?>
        <tr>
            <th scope="row" class="span3">
                <?php
                print $content['field_species_name_es']['#title'];
                ?>
            </th>

            <td>
                <?php
                print $node->field_species_name_es['und'][0]['value'];
                ?>
            </td>
        </tr>
        <?php
            }
        ?>

        <?php
            if ($node->field_species_name_de) {
        ?>
        <tr>
            <th scope="row" class="span3">
                <?php
                print $content['field_species_name_de']['#title'];
                ?>
            </th>

            <td>
                <?php
                print $node->field_species_name_de['und'][0]['value'];
                ?>
            </td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>

<?php
    if ($node->field_species_appendix_1 || $node->field_species_appendix_2) {
?>
<div class="page-header">
    <h5>
        Appendinces
    <h5>
</div>

<table class="table table-hover table-bordered">
    <tbody>
        <?php
            if ($node->field_species_appendix_1 && $node->field_species_appendix_1_date['und'][0]['value']) {
        ?>
        <tr>
            <th scope="row" class="span3">
                <?php
                print $content['field_species_appendix_1']['#title'];
                ?>
            </th>

            <td>
                <?php
                print $node->field_species_appendix_1_date['und'][0]['value'];
                ?>
            </td>
        </tr>
        <?php
            }
        ?>

        <?php
            if ($node->field_species_appendix_2 && $node->field_species_appendix_2_date['und'][0]['value']) {
        ?>
        <tr>
            <th scope="row" class="span3">
                <?php
                print $content['field_species_appendix_2']['#title'];
                ?>
            </th>

            <td>
                <?php
                print $node->field_species_appendix_2_date['und'][0]['value'];
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
    if ($node->field_species_concerted_action || $node->field_species_cooperative_action) {
?>
<div class="page-header">
    <h5>
        Actions
    </h5>
</div>

<table class="table table-hover table-bordered">
    <tbody>
        <?php
            if ($node->field_species_concerted_action) {
        ?>
        <tr>
            <th scope="row" class="span3">
                <?php
                print $content['field_species_concerted_action']['#title'];
                ?>
            </th>

            <td>
                <?php
                if ($content['field_species_concerted_action']['#items'][0]['value']) {
                ?>
                <i class="icon-ok"></i>
                <?php
                }else {
                ?>
                <i class="icon-remove"></i>
                <?php
                }
                ?>
            </td>
        </tr>
        <?php
            }
        ?>

        <?php
            if ($node->field_species_cooperative_action) {
        ?>
        <tr>
            <th scope="row" class="span3">
                <?php
                print $content['field_species_cooperative_action']['#title'];
                ?>
            </th>

            <td>
                <?php
                if ($content['field_species_cooperative_action']['#items'][0]['value']) {
                ?>
                <i class="icon-ok"></i>
                <?php
                }else {
                ?>
                <i class="icon-remove"></i>
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
    if ($node->field_species_pop_global && $node->field_species_pop_global['und'][0]['value']) {
?>
<div class="page-header">
    <h5>
        Population
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
    if ($node->field_species_range_states) {
?>
<div class="page-header">
    <h5>
        Geographic range
    <h5>
</div>

<table class="table table-hover table-bordered">
    <tbody>
        <?php
            if ($node->field_species_range_states) {
        ?>
        <tr>
            <th scope="row" class="span3">
                <?php
                print $content['field_species_range_states']['#title'];
                ?>
            </th>

            <td>
                <?php
                foreach($content['field_species_range_states'] as $key => $item) {
                    if (is_numeric($key)) {
                        print $item['#markup'];
                        if ($key + 1 < count($content['field_species_range_states']['#items'])) {
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
        Others
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