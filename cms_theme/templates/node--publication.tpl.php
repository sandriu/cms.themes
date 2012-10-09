<div class="thumbnail span3 text-center">
    <?php
    echo render($content['field_publication_image']);
    ?>
</div>

<div class="span8">
    <?php echo render($content['field_publication_author']); ?>
    
    <div class="muted pull-left">
    <?php echo render($content['field_publication_publisher']); ?>
    <?php echo render($content['field_publication_published']); ?>
    <?php echo render($content['field_publication_city']); ?>
    <?php echo render($content['field_publication_country']); ?>
    </div>

    <div class="clearfix">&nbsp;</div>

    <?php echo render($content['body']); ?>
</div>

<div class="clearfix">&nbsp;</div>

<div class="span11">
    <?php echo render($content['field_publication_type']); ?>
    <?php echo render($content['field_publication_edition']); ?>

    <?php
        if(check_display_field($content, 'field_publication_author')) {
    ?>
        <table class="table table-condensed table-hover two-columns">
            <caption><?php echo t('Bibliographic information'); ?></caption>
            <?php echo render($content['field_publication_co_authors']); ?>
            <?php echo render($content['field_publication_order_code']); ?>
            <?php echo render($content['field_publication_language']); ?>
        </table>
    <?php
        }
    ?>
</div>

<?php
    print render($content);
    hide($content['links']);
    hide($content['comments']);
?>
<script type="text/javascript">
    jQuery('a[rel="popover"]').popover();
</script>