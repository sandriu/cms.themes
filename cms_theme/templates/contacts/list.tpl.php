<?php
drupal_add_library('datatables', 'datatables');
drupal_add_js(array('datatables' => array('#contacts-listing' => array())), 'setting');
drupal_add_js(drupal_get_path('theme', 'cms_theme') . DIRECTORY_SEPARATOR . 'js' . DIRECTORY_SEPARATOR . 'contacts.js');
?>

<table cellpadding="0" cellspacing="0" border="0" id="contacts-listing" class="cols-6 table table-striped table-hover table-bordered dataTable">
    <thead>
        <tr>
            <!--<th width="1%">
                <input type="checkbox" name="select-all" id="select-all" />
            </th>-->
            <th>
                <?php
                    echo t('Full name');
                ?>
            </th>
            <th>
                <?php
                    echo t('Email');
                ?>
            </th>
            <th>
                <?php
                    echo t('Country');
                ?>
            </th>
            <th>
                <?php
                    echo t('City');
                ?>
            </th>
        </tr>
    </thead>
<?php
    foreach ($users as $index => $user) {
?>
    <tr>
<!--        <td>
            <input type="checkbox" id="user<?php echo $index + 1; ?>" name="selected-users[]" />
        </td>
-->
        <td>
            <a href="/contacts/item/<?php echo $user['uid'][0]; ?>/view">
            <?php
                echo $user['sn'][0] . ' ' . $user['givenname'][0];
            ?></a>
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
                    <a href="mailto:<?php echo $email; ?>" title="<?php echo t('Send email to') . ' ' . $email; ?>">
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
            <a href="mailto:<?php echo $user['mail'][0]; ?>" title="<?php echo t('Send email to') . ' ' . $user['mail'][0]; ?>">
            <?php
                echo $user['mail'][0];
            ?>
            </a>
            <?php
                }
            ?>
        </td>

        <td>
            <?php
                echo countries_get_country($user['iso2'][0])->name;
            ?>
        </td>

        <td>
            <?php
                echo render($user['st'][0]);
            ?>
        </td>
    </tr>
<?php
    }
?>
</table>

<div class="clear">&nbsp;</div>

<a href="/contacts/add" class="btn btn-primary" title="<?php echo t('Add'); ?>">
    Add new contact
</a>