<?php
    drupal_add_js(drupal_get_path('theme', 'cms_theme') . DIRECTORY_SEPARATOR . 'js' . DIRECTORY_SEPARATOR . 'contacts.js');
    drupal_add_css(drupal_get_path('module', 'datatables') . '/dataTables/media/css/demo_table.css');
?>

<?php
    if (CMSUtils::get_current_profile() == 'cms') {
?>
<div class="row">
    <div class="span12">
        <p class="lead"><?php echo t('Contacts from'); ?> <strong class="text-info"><?php echo $instruments[$instrument]; ?></strong> <?php echo t('instrument'); ?>.</p>
    </div>
</div>

<div class="clearfix">&nbsp;</div>
<?php
    }
?>

<?php
    echo render_simple_slot('filters', 'contacts',
                            array('page' => $page,
                                  'per_page' => $per_page,
                                  'per_page_options' => $per_page_options,
                                  'instruments' => $instruments)
    );
?>

<div class="row">
    <div class="span12">
        <table cellpadding="0" cellspacing="0" border="0" id="contacts-listing" class="cols-6 table table-striped table-hover table-bordered dataTable">
            <thead>
                <tr>
                    <th class="span2">
                        <?php
                            echo t('Full name');
                        ?>
                    </th>
                    <th class="span2">
                        <?php
                            echo t('Organization');
                        ?>
                    </th>
                    <th class="span2">
                        <?php
                            echo t('Department');
                        ?>
                    </th>
                    <th class="span3">
                        <?php
                            echo t('Email');
                        ?>
                    </th>
                    <th class="span2">
                        <?php
                            echo t('Country');
                        ?>
                    </th>
                    <th class="span1">
                        <?php
                            echo t('City');
                        ?>
                    </th>
                </tr>
            </thead>
        <?php
        if (!empty($users)) {
            foreach ($users as $index => $user) {
        ?>
            <tr>
                <td>
                    <a href="/contacts/item/<?php echo $user['uid'][0]; ?>/view">
                    <?php
                        echo $user['sn'][0] . ' ' . $user['givenname'][0];
                    ?></a>
                </td>

                <td>
                    <?php
                        echo render($user['suborg'][0]);
                    ?>
                </td>

                <td>
                    <?php
                        echo render($user['suborgdept'][0]);
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
                        if ($user['iso2']['count'] == 1) {
                            $country = countries_get_country($user['iso2'][0]);
                            if ($country) {
                                echo $country->name;
                            }
                        }else if($user['iso2']['count'] > 1) {
                    ?>
                    <ul>
                    <?php
                            foreach ($user['iso2'] as $index => $country) {
                                if (is_numeric($index)) {
                                    $country = countries_get_country($user['iso2'][$index]);
                                    if ($country) {
                    ?>
                    <li><?php echo $country->name; ?></li>
                    <?php
                                    }
                                }
                            }
                    ?>
                    </ul>
                    <?php
                        }
                        
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
        }else {
        ?>

            <tr class="odd">
                <td valign="top" colspan="6">
                    <?php
                        echo t('No contacts found');
                    ?>
                </td>
            </tr>

        <?php
        }
        ?>
        </table>
    </div>
</div>

<?php
    echo $pagination;
?>

<a href="/contacts/add" class="btn btn-primary" title="<?php echo t('Add'); ?>">
    <?php echo t('Add new contact'); ?>
</a>