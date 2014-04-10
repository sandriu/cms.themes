<div class="col-md-5">
    <?php
        if ((isset($node->field_species_images) && (!empty($node->field_species_images))) || count($node->gallery)) {
    ?>
    <div id="myCarousel" class="carousel slide species-carousel">
        <!-- Carousel items -->
        <div class="carousel-inner">
            <div class="active item">
                <?php
                    $langcode = field_language('node', $node, 'field_species_images');
                    if (isset($node->field_species_images) && (!empty($node->field_species_images))) {
                ?>
                <img src="<?php echo file_create_url($node->field_species_images[$langcode][0]['uri']); ?>" alt="" title="" class="species-custom-image" />
                <div class="carousel-caption">
                    <p class="species-custom-image-author">
                        <?php echo $node->field_species_images[$langcode][0]['title']; ?>
                    </p>
                </div>
                <?php
                    unset($node->field_species_images[$langcode][0]);
                    }elseif (count($node->gallery)) {
                        echo $node->gallery[0];
                        unset($node->gallery[0]);
                    }
                ?>
            </div>
        <?php
            if (isset($node->field_species_images) && (!empty($node->field_species_images))) {
                foreach ($node->field_species_images[$langcode] as $index => $image) {
        ?>
            <div class="item">
                <img src="<?php echo file_create_url($image['uri']); ?>" alt="" title="" class="species-custom-image" />
                <div class="carousel-caption">
                    <p class="species-custom-image-author">
                        <?php echo $image['title']; ?>
                    </p>
                </div>
            </div>
        <?php
                }
            }

            if (count($node->gallery)){
                foreach ($node->gallery as $index => $image) {
            ?>
                <div class="item">
                    <?php
                        echo $image;
                    ?>
                </div>
            <?php
                }
            }
        ?>
        </div>

        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
    <?php
        }else {
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
