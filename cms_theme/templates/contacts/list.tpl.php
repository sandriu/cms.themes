<ul>
<?php
    foreach ($users as $user) {
?>
<li>
    <?php
        echo $user['uid'][0];
    ?>
</li>
<?php
    }
?>
</ul>