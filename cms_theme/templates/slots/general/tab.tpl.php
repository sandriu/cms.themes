<li class="<?php echo $class; ?>">
    <a href="#<?php echo $href; ?>">
    <?php
        echo $title;
    ?>

    <?php
        if ($show_counter && !empty($field_name) && isset($content[$field_name])) {
    ?>
        (<?php echo count($content[$field_name]['#items']); ?>)
    <?php
        }
    ?>
    </a>
</li>