<li class="<?php echo $class; ?>">
    <a href="#<?php echo $href; ?>" data-toggle="tab">
    <?php
        echo $title;
    ?>

    <?php
        if ($show_counter && !empty($field_name) && isset($content[$field_name])) {
            if (array_key_exists('#items', $content[$field_name])) {
                $total = count($content[$field_name]['#items']);
            }else {
                $total = count($content[$field_name]);
            }
    ?>
        (<?php echo $total; ?>)
    <?php
        }
    ?>
    </a>
</li>