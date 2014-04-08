<li class="<?php echo $class; ?>">
  <a href="#<?php echo $href; ?>" data-toggle="tab">
    <?php echo $title; ?>
    <?php if ($counter) : ?>
      <span class="badge badge-info">
        <?php echo $counter; ?>
      </span>
    <?php endif; ?>
  </a>
</li>
