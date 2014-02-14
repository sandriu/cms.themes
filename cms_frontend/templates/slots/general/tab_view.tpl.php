<li class="<?php echo $class; ?>">
    <a href="#<?php echo $href; ?>" data-toggle="tab">
    <?php if ($counter) { ?>
        <span class="badge badge-info pull-right">
            <?php echo $counter; ?>
        </span>
        <?php } ?>
    <?php echo $title;?>

    </a>
</li>