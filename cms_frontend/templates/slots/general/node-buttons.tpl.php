<?php if (node_access("update", $node) === TRUE): ?>
<div class="btn-toolbar">
    <div class="btn-group">
    <?php print l(t('Edit'), 'node/' . $nid . '/edit', array('attributes' => array('class' => 'btn btn-primary'), 'query' => drupal_get_destination())); ?>
    </div>
    <div class="btn-group">
        <?php print l(t('Delete'), 'node/' . $nid . '/unpublish',
                array('attributes' => array('class' => 'btn btn-danger'))
        ); ?>
     </div>
</div>

<div class=clearfix">&nbsp;</div>
<?php endif; ?>
