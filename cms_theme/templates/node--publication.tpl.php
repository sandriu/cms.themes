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

<div class="span8">
    <table class="table table-condensed table-hover two-columns">
        <caption><?php echo t('Bibliographic information'); ?></caption>
        <tbody>
        <?php echo render($content['field_publication_author']); ?>
        <?php echo render($content['field_publication_co_authors']); ?>
        <?php echo render($content['field_publication_published']); ?>
        <?php echo render($content['field_publication_language']); ?>
        <?php echo render($content['field_publication_publisher']); ?>
        <?php echo render($content['field_publication_city']); ?>
        <?php echo render($content['field_publication_country']); ?>
        <?php echo render($content['field_publication_type']); ?>
        <?php echo render($content['field_publication_edition']); ?>
        <?php echo render($content['field_publication_order_code']); ?>
        <?php echo render($content['field_publication_instrument']); ?>
        </tbody>
    </table>

    <div class="clearfix">&nbsp;</div>
    <?php echo render($content['field_publication_source']); ?>

    <?php echo render($content['body']); ?>
</div>

<div class="span3 pull-right">
    <?php
        if (!empty($node->field_publication_image) && count($node->field_publication_image[LANGUAGE_NONE])) {
    ?>
    <div id="myCarousel" class="carousel slide img-polaroid publication-carousel">
        <!-- Carousel items -->
        <?php
        echo render($content['field_publication_image']);
        ?>
        <!-- Carousel nav -->
        <?php if (count($node->field_publication_image[LANGUAGE_NONE]) > 1) { ?>
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
        <?php } ?>
      </div>
    <?php
        } else {
    ?>
    <div class="alert alert-info species-alert">
        <p>
            <?php echo t('No pictures for ') . $node->title; ?>
        </p>
    </div>
    <?php
        }
    ?>
</div>


<div class="clearfix">&nbsp;</div>

<?php echo render($content['field_publication_attachment']); ?>

<?php
    hide($content['links']);
    hide($content['comments']);
?>
<script type="text/javascript">
    jQuery('a[rel="popover"]').popover();
</script>