<div class="span5">
    <?php
        if (isset($node->field_species_images) && (!empty($node->field_species_images))) {
    ?>
    <div id="myCarousel" class="carousel slide img-polaroid species-carousel">
        <!-- Carousel items -->
        <div class="carousel-inner">
            <div class="active item">
                <img src="<?php echo file_create_url($node->field_species_images[$node->language][0]['uri']); ?>" alt="" title="" class="species-custom-image" />
            </div>
        <?php
            unset($node->field_species_images[$node->language][0]);
            foreach ($node->field_species_images[$node->language] as $index => $image) {
        ?>
            <div class="item">
                <img src="<?php echo file_create_url($image['uri']); ?>" alt="" title="" class="species-custom-image" />
            </div>
        <?php
            }
        ?>
        </div>

        <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div>
    <?php
        } elseif (count($node->gallery)) {
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
    <div class="alert alert-info species-alert">
        <p>
            <?php echo t('No pictures for ') . $node->title; ?>
        </p>
    </div>
    <?php
        }
    ?>
</div>
