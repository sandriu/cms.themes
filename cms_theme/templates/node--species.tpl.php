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
                <li class="disabled"><a href="#">Print</a></li>
            </ul>
        </div>
    </div>
</div>
<?php endif; ?>
<div class="clearfix"></div>
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
                <?php
                    if (count($node->gallery)) {
                ?>
                <div id="myCarousel" class="carousel slide img-polaroid species-carousel">
                    <!-- Carousel items -->
                    <div class="carousel-inner">
                        <div class="active item">
                            <?php echo $node->gallery[0]; unset($node->gallery[0]); ?>
                        </div>
                        <?php
                            foreach ($node->gallery as $index => $image) {
                        ?>
                            <div class="item">
                                <?php
                                    echo $image;
                                ?>
                            </div>
                        <?php
                            }
                        ?>
                    </div>
                    <!-- Carousel nav -->
                    <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                    <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
                  </div>
                <?php
                    } else {
                ?>
                <div class="alert alert-info">
                    <p>
                        No pictures for <?php echo $node->title; ?>
                    </p>
                </div>
                <?php
                    }
                ?>
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
                        if(check_display_field($content, 'field_species_pop_global')) {
                            echo render($content['field_species_pop_global']);
                        }
                        if(check_display_field($content, 'field_species_pop_global_date')) {
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
                    <th><?php echo t('Countries'); ?></th>
                    <td><?php echo render($content['field_species_range_states']); ?></td>
                </tr>
                <tr>
                    <th><?php echo t('Notes'); ?></th>
                    <td><?php echo render($content['field_species_range_states_notes']); ?></td>
                </tr>
            </tbody>
        </table>
    <?php
        }
    ?>

    <?php
        if(check_display_field($content, 'field_species_pop')) {
    ?>
    <table class="table table-condensed table-hover table-bordered">
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
    <table class="table table-condensed table-bordered table-hover">
        <caption><?php echo t('Population size'); ?></caption>
        <thead>
            <tr>
                <th class="span2"><?php echo t('Region'); ?></th>
                <th class="span2"><?php echo t('Years'); ?></th>
                <th class="span2"><?php echo t('Quality'); ?></th>
                <th class="span2"><?php echo t('Estimate'); ?></th>
                <th class="span4"><?php echo t('Notes'); ?></th>
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
    <table class="table table-condensed table-bordered table-hover">
        <caption><?php echo t('Population trend'); ?></caption>
        <thead>
            <tr>
                <th class="span2"><?php echo t('Region'); ?></th>
                <th class="span2"><?php echo t('Years'); ?></th>
                <th class="span2"><?php echo t('Trend'); ?></th>
                <th class="span2"><?php echo t('Estimate'); ?></th>
                <th class="span4"><?php echo t('Notes'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php echo render($content['field_species_pop_trend']); ?>
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
</div>
<?php
    //print render($content);
    hide($content['links']);
    hide($content['comments']);
?>
