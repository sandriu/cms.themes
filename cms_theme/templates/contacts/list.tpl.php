<?php
drupal_add_library('datatables', 'datatables');
drupal_add_js(array('datatables' => array('#contacts-listing' => array())), 'setting');
drupal_add_js(drupal_get_path('theme', 'cms_theme') . DIRECTORY_SEPARATOR . 'js' . DIRECTORY_SEPARATOR . 'contacts.js');
?>

<table cellpadding="0" cellspacing="0" border="0" id="contacts-listing" class="cols-6 table table-striped table-hover table-bordered dataTable">
    <thead>
        <tr>
            <th>
                <?php
                    echo t('User ID');
                ?>
            </th>
            <th>
                <?php
                    echo t('Organization');
                ?>
            </th>
            <th>
                <?php
                    echo t('First name');
                ?>
            </th>
            <th>
                <?php
                    echo t('Last name');
                ?>
            </th>
            <th>
                <?php
                    echo t('Email');
                ?>
            </th>
            <th class="span1">
                <?php
                    echo t('Actions');
                ?>
            </th>
        </tr>
    </thead>
<?php
    foreach ($users as $user) {
?>
    <tr>
        <td>
            <a href="/contacts/user/<?php echo $user['uid'][0]; ?>/overview">
            <?php
                echo $user['uid'][0];
            ?>
            </a>
        </td>

        <td>
            <?php
                echo $user['conventions'][0];
            ?>
        </td>

        <td>
            <?php
                echo $user['sn'][0];
            ?>
        </td>

        <td>
            <?php
                echo $user['givenname'][0];
            ?>
        </td>

        <td>
            <?php
                if ($user['mail']['count'] > 1) {
            ?>
            <ul>
            <?php
                    foreach ($user['mail'] as $index => $email) {
                        if (is_numeric($index)) {
            ?>
                <li>
                    <a href="mailto:<?php echo $email; ?>" rel="tooltip" title="<?php echo t('Send email to') . ' ' . $email; ?>" data-placement="top">
                    <?php echo $email; ?>
                    </a>
                </li>
            <?php
                        }
                    }
            ?>
            </ul>
            <?php
                }else {
            ?>
            <a href="mailto:<?php echo $user['mail'][0]; ?>" rel="tooltip" title="<?php echo t('Send email to') . ' ' . $user['mail'][0]; ?>" data-placement="top">
            <?php
                echo $user['mail'][0];
            ?>
            </a>
            <?php
                }
            ?>
        </td>

        <td>
            <a href="/contacts/user/<?php echo $user['uid'][0]; ?>/edit" rel="tooltip" title="<?php echo t('Edit'); ?>" data-placement="left">
                <i class="icon-pencil"></i></a>
            &middot;
            <a href="/contacts/user/<?php echo $user['uid'][0]; ?>/delete" rel="tooltip" title="<?php echo t('Delete'); ?>" data-placement="right">
                <i class="icon-trash"></i></a>
        </td>
    </tr>
<?php
    }
?>
</table>
