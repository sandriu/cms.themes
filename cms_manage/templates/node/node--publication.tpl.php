<div class="row">
    <div class="col-md-8">
        <table class="table table-condensed table-hover two-columns">
            <caption><?php echo t('Bibliographic information'); ?></caption>
            <tbody>
            <?php echo render($content['field_publication_author']); ?>
            <?php echo render($content['field_publication_co_authors']); ?>
            <?php echo render($content['field_publication_published_date']); ?>
            <?php echo render($content['field_publication_language']); ?>
            <?php echo render($content['field_publication_publisher']); ?>
            <?php echo render($content['field_publication_city']); ?>
            <?php echo render($content['field_country']); ?>
            <?php echo render($content['field_publication_type']); ?>
            <?php echo render($content['field_publication_edition']); ?>
            <?php echo render($content['field_publication_order_code']); ?>
            <?php echo render($content['field_instrument']); ?>
            <?php echo render($content['field_publication_source']); ?>
            </tbody>
        </table>

        <div class="clearfix">&nbsp;</div>

        <?php echo render($content['body']); ?>

    </div>

    <div class="col-md-3 pull-right">
        <?php
            $langcode = field_language('node', $node, 'field_publication_image');
            if (!empty($node->field_publication_image) && count($node->field_publication_image[$langcode])) {
        ?>
        <div id="myCarousel" class="carousel slide publication-carousel">
            <?php
            echo render($content['field_publication_image']);
            ?>

            <?php if (count($node->field_publication_image[$langcode]) > 1) { ?>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
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
</div>

<div class="clearfix">&nbsp;</div>

<?php echo render($content['field_publication_attachment']); ?>

<?php
    echo render_slot($node, 'related-content', 'publication', $content);
?>


<?php
    hide($content['links']);
    hide($content['comments']);
?>
<script type="text/javascript">
    jQuery('a[rel="popover"]').popover();
</script>
