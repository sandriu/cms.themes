<div class="page-header">
    <h5>
        Taxonomy
    <h5>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>
                <?php
                print $content['field_species_scientific_order']['#title'];
                ?>
            </th>

            <th>
                Title
            </th>

            <th>
                <?php
                print $content['field_species_order']['#title'];
                ?>
            </th>

            <th>
                <?php
                print $content['field_species_class']['#title'];
                ?>
            </th>

            <th>
                <?php
                print $content['field_species_family']['#title'];
                ?>
            </th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>
                <?php
                print $node->field_species_scientific_order[$node->language][0]['value'];
                ?>
            </td>

            <td>
                <?php
                print $title;
                ?>
            </td>

            <td>
                <?php
                print $node->field_species_order[$node->language][0]['value'];
                ?>
            </td>

            <td>
                <?php
                print $node->field_species_class[$node->language][0]['value'];
                ?>
            </td>

            <td>
                <?php
                print $node->field_species_family[$node->language][0]['value'];
                ?>
            </td>
        </tr>
    </tbody>
</table>

<table class="table table-hover table-bordered">
    <tbody>
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

        <tr>
            <th scope="row">
                <?php
                print $content['field_species_subspecies']['#title'];
                ?>
            </th>

            <td>
                <?php
                print $node->field_species_subspecies[$node->language][0]['value'];
                ?>
            </td>
        </tr>

        <tr>
            <th scope="row">
                <?php
                print $content['field_species_former_name']['#title'];
                ?>
            </th>

            <td>
                <?php
                print $node->field_species_former_name[$node->language][0]['value'];
                ?>
            </td>
        </tr>

        <tr>
            <th scope="row">
                <?php
                print $content['field_species_name_en']['#title'];
                ?>
            </th>

            <td>
                <?php
                print $node->field_species_name_en[$node->language][0]['value'];
                ?>
            </td>
        </tr>

        <tr>
            <th scope="row">
                <?php
                print $content['field_species_name_fr']['#title'];
                ?>
            </th>

            <td>
                <?php
                print $node->field_species_name_fr[$node->language][0]['value'];
                ?>
            </td>
        </tr>

        <tr>
            <th scope="row">
                <?php
                print $content['field_species_name_es']['#title'];
                ?>
            </th>

            <td>
                <?php
                print $node->field_species_name_es[$node->language][0]['value'];
                ?>
            </td>
        </tr>

        <tr>
            <th scope="row">
                <?php
                print $content['field_species_name_de']['#title'];
                ?>
            </th>

            <td>
                <?php
                print $node->field_species_name_de[$node->language][0]['value'];
                ?>
            </td>
        </tr>
    </tbody>
</table>

<div class="page-header">
    <h5>
        Appendinces
    <h5>
</div>

<table class="table table-hover table-bordered">
    <tbody>
        <tr>
            <th scope="row" class="span3">
                <?php
                print $content['field_species_appendix_1']['#title'];
                ?>
            </th>

            <td>
                <?php
                print $node->field_species_appendix_1_date[$node->language][0]['value'];
                ?>
            </td>
        </tr>

        <tr>
            <th scope="row">
                <?php
                print $content['field_species_appendix_2']['#title'];
                ?>
            </th>

            <td>
                <?php
                print $node->field_species_appendix_2_date[$node->language][0]['value'];
                ?>
            </td>
        </tr>
        
        <tr>
            <th scope="row">
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

        <tr>
            <th scope="row">
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
    </tbody>
</table>

<div class="page-header">
    <h5>
        Population
    <h5>
</div>

<table class="table table-hover table-bordered">
    <tbody>
        <tr>
            <th scope="row" class="span3">
                <?php
                print $content['field_species_pop_global']['#title'];
                ?>
            </th>

            <td>
                <strong>
                <?php
                print $node->field_species_pop_global[$node->language][0]['value'];
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
    </tbody>
</table>

<div class="page-header">
    <h5>
        Geographic range
    <h5>
</div>

<table class="table table-hover table-bordered">
    <tbody>
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
    </tbody>
</table>

<div class="page-header">
    <h5>
        Others
    <h5>
</div>

<table class="table table-hover table-bordered">
    <tbody>
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

        <tr>
            <th scope="row">
                <?php
                print $content['field_species_critical_sites']['#title'];
                ?>
            </th>

            <td>
                <?php
                print $node->field_species_critical_sites[$node->language][0]['value'];
                ?>
            </td>
        </tr>

        <tr>
            <th scope="row">
                <?php
                print $content['field_species_notes']['#title'];
                ?>
            </th>

            <td>
                <?php
                print $node->field_species_notes[$node->language][0]['value'];
                ?>
            </td>
        </tr>
    </tbody>
</table>

<?php
    //print render($content);
    hide($content['links']);
    hide($content['comments']);
?>