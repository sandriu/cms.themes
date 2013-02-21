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
        <?php print l(t('Manage documents'), 'meeting/' . $node->nid . '/manage_documents',
                array('attributes' => array('class' => 'btn'))
        ); ?>
        </div>
    </div>
</div>

<div class="clearfix">&nbsp;</div>
<?php endif; ?>
