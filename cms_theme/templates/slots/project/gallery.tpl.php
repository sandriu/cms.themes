<div class="span5">
    <?php
        if (isset($node->field_project_images) && !empty($node->field_project_images)) {
    ?>
    <div id="myCarousel" class="carousel slide img-polaroid project-carousel">
        <!-- Carousel items -->
        <div class="carousel-inner">
            <div class="active item">
                <?php
                    $langcode = field_language('node', $node, 'field_project_images');
                    if (isset($node->field_project_images) && (!empty($node->field_project_images))) {
                ?>
                <img src="<?php echo file_create_url($node->field_project_images[$langcode][0]['uri']); ?>" alt="" title="" class="project-custom-image" />
                <?php
                    unset($node->field_project_images[$langcode][0]);
                    }
                ?>
            </div>
        <?php
            if (isset($node->field_project_images) && (!empty($node->field_project_images))) {
                foreach ($node->field_project_images[$langcode] as $index => $image) {
        ?>
            <div class="item">
                <img src="<?php echo file_create_url($image['uri']); ?>" alt="" title="" class="project-custom-image" />
            </div>
        <?php
                }
            }
        ?>
        </div>

        <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
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
</div>
