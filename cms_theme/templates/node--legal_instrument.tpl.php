<?php if (node_access("update", $node) === TRUE): ?>
<div class="btn-toolbar">
    <div class="btn-group">
    <?php print l(t('Edit'), 'node/' . $nid . '/edit', array('attributes' => array('class' => 'btn btn-primary'), 'query' => drupal_get_destination())); ?>
    </div>
    <div class="btn-group">
    <?php print l(t('Delete'), 'node/' . $nid . '/delete',
            array('attributes' => array('class' => 'btn btn-danger'))
    ); ?>
    </div>
</div>
<?php endif; ?>

<div class=clearfix">&nbsp;</div>

<?php echo render($content['field_instrument_type']); ?>

<div class=clearfix">&nbsp;</div>

<table class="table table-condensed table-hover two-columns">
    <tbody>
        <?php echo render($content['title']); ?>
        <?php echo render($content['field_instrument_name']); ?>
        <?php echo render($content['field_instrument_sponsor']); ?>
        <?php echo render($content['field_instrument_depository']); ?>
        <?php echo render($content['field_instrument_secretariat']); ?>
        <?php echo render($content['field_instrument_host_country']); ?>
    </tbody>
</table>


<?php
    echo drupal_render($content);
?>