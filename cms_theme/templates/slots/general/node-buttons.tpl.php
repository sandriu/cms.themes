<?php if (node_access("update", $node) === TRUE): ?>
<div class="pull-left">
    <div class="btn-toolbar">
        <div class="btn-group">
        <?php print l(t('Edit'), 'node/' . $node->nid . '/edit', array('attributes' => array('class' => 'btn btn-primary'), 'query' => drupal_get_destination())); ?>
        </div>
        <div class="btn-group">
        <?php print l(t('Delete'), 'node/' . $node->nid . '/delete',
                array('attributes' => array('class' => 'btn btn-danger'))
        ); ?>
        </div>
        <div class="btn-group">
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#"><?php echo t('Action'); ?><span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li>
                    <?php
                        echo l(t('Family display'), 'family/species/' . $node->nid);
                    ?>
                </li>

                <li class="divider"></li>

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
                <li><a href="#" title="<?php echo t('Print') . ' ' . $node->title . ' ' . t('details'); ?>" onclick="window.print();">Print</a></li>
            </ul>
        </div>
    </div>
</div>
<?php endif; ?>

<div class="clearfix">&nbsp;</div>
