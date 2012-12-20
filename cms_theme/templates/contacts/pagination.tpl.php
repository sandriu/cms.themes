<?php
    $groups = array_keys(CMSUtils::get_all_websites());

    if (CMSUtils::get_current_profile() == 'cms') {
        $instrument = isset($_GET['instrument']) && (in_array($_GET['instrument'], $groups)) ? $_GET['instrument'] : 'cms';
        $url = "/contacts/listing?instrument=$instrument&per_page=$per_page&page=";
    }else {
        $url = "/contacts/listing?&per_page=$per_page&page=";
    }

    $start = (($page - 2) > 0) ? $page - 2 : 1;
    $end   = (($page + 2) < $total_pages) ? $page + 2 : $total_pages;
    $start_displayed = ($page * $per_page) - ($per_page - 1);
    $end_displayed = $start_displayed + $total_entries_displayed - 1;
    //$end_displayed = $total_entries - $end_displayed + $start_displayed + $per_page -1;
?>

<div class="row">
    <div class="span6">
        <div class="dataTables_info">
            <?php echo t('Showing') . ' ' . $total_entries . ' ' . t('users') . ' (' . $start_displayed . ' to ' . $end_displayed . ')'; ?>
        </div>
    </div>

    <div class="span6">
        <div class="pagination pull-right dataTables_paginate">
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
    </div>
</div>
