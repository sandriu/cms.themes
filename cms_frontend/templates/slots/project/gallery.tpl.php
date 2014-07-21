<?php
    $langcode = field_language('node', $node, 'field_project_images');
    if (!empty($node->field_project_images[$langcode])) {
?>
<div id="myCarousel" class="carousel slide img-polaroid project-carousel">
    <!-- Carousel items -->
    <div class="carousel-inner">
    <?php
        foreach ($node->field_project_images[$langcode] as $index => $image) {
    ?>
        <div class="item <?php echo ($index == 0) ? "active" :""; ?>">
            <img src="<?php echo file_create_url($image['uri']); ?>" alt="" title="" class="project-custom-image" />
            <?php if (!empty($image['image_field_caption']['value'])) { ?>
                <div class="carousel-caption">
                    <p>
                        <?php echo $image['image_field_caption']['value']; ?>
                    </p>
                </div>
            <?php } ?>
        </div>
    <?php
        }
    ?>
    </div>
    <?php if (count($node->field_project_images[$langcode]) > 0) { ?>
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
    <?php } ?>
</div>
<?php
    }else {
?>
<div class="alert alert-info project-alert">
    <p>
        <?php echo t('No pictures for ') . $node->title; ?>
    </p>
</div>
<?php
    }
?>

