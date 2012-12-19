<?php
    $groups = array_keys(CMSUtils::get_all_websites());
    
    if (CMSUtils::get_current_profile() == 'cms') {
        $instrument = isset($_GET['instrument']) && (in_array($_GET['instrument'], $groups)) ? $_GET['instrument'] : 'cms';
        $url = "/contacts/listing?instrument=$instrument&page=";
    }else {
        $url = "/contacts/listing?page=";
    }

    $start = $page - floor(5/2);
    $end = $page + floor(5/2);
    if ($start <= 0) {
        $end += abs($start) + 1;
        $start = 1;
    }
    if($end > $total_pages) {
        $start -= $end - $total_pages;
        $end = $total_pages;
    }  

?>

<div class="pagination pull-right">
    <ul>
        <li class="first<?php echo ($page == 1) ? ' disabled': ''; ?>">
            <a href="<?php echo ($page == 1) ? 'javascript:void(0);' : $url . 1; ?>">&larr;</a>
        </li>

        <li class="previous<?php echo ($page == 1) ? ' disabled': ''; ?>">
            <a href="<?php echo ($page == 1) ? 'javascript:void(0);' : $url . ($page - 1); ?>">&laquo;</a>
        </li>

        <?php
            for ($page_iter = $start; $page_iter <= $end; $page_iter ++) {
        ?>
        <li class="<?php echo ($page == $page_iter) ? 'active': ''; ?>">
            <a href="<?php echo ($page == $page_iter) ? 'javascript:void(0);' : $url . $page_iter; ?>">
            <?php
                echo $page_iter;
            ?>
            </a>
        </li>
        <?php
            }
        ?>

        <li class="next<?php echo ($page == $total_pages) ? ' disabled': ''; ?>">
            <a href="<?php echo ($page == $total_pages) ? 'javascript:void(0);' : $url . ($page + 1); ?>">&raquo;</a>
        </li>

        <li class="last<?php echo ($page == $total_pages) ? ' disabled': ''; ?>">
            <a href="<?php echo ($page == $total_pages) ? 'javascript:void(0);' : $url . $total_pages; ?>">&rarr;</a>
        </li>
    </ul>
</div>