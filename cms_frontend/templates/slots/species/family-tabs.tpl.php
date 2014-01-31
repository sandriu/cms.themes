<ul class="nav nav-tabs" id="<?php echo $tabs_id; ?>-tabs">
    <li class="active">
        <a href="#<?php echo $tabs['current']; ?>">
        <?php
            echo strtoupper($tabs['current']);
        ?>
        </a>
    </li>
<?php
    if (!empty($tabs['available'])) {
        foreach ($tabs['available'] as $name => $tab) {
?>
    <li>
        <a href="#<?php echo $name; ?>">
            <?php
                echo strtoupper($name);
            ?>
        </a>
    </li>
<?php
        }
    }
?>
</ul>
