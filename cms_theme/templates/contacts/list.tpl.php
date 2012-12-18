<?php
    drupal_add_library('datatables', 'datatables');
    drupal_add_js(array('datatables' => array('#contacts-listing' => array())), 'setting');
    drupal_add_js(drupal_get_path('theme', 'cms_theme') . DIRECTORY_SEPARATOR . 'js' . DIRECTORY_SEPARATOR . 'contacts.js');
?>

<?php
    if (!empty($instruments) && (CMSUtils::get_current_profile() == 'cms')) {
?>
<form class="form-inline" id="contacts-instrument-filter">
    <label for="instrument">
        <?php echo t('CMS Instrument'); ?>
    </label>

    <select name="instrument" id="instrument">
        <?php
            foreach ($instruments as $instrument) {
                $instrument_key = CMSUtils::slug($instrument);
        ?>
        <option value="<?php echo $instrument_key; ?>" <?php echo (isset($_GET['instrument']) && ($_GET['instrument'] == $instrument_key)) ? 'selected="selected"' : ''; ?>>
            <?php echo $instrument; ?>
        </option>
        <?php
            }
        ?>
    </select>

    <button type="submit" class="btn btn-primary btn-small"><?php echo t('Filter'); ?></button>
</form>

<hr />
<?php
    }
?>

<table cellpadding="0" cellspacing="0" border="0" id="contacts-listing" class="cols-6 table table-striped table-hover table-bordered dataTable">
    <thead>
        <tr>
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
?>
</table>

<div class="clear">&nbsp;</div>

<a href="/contacts/add" class="btn btn-primary" title="<?php echo t('Add'); ?>">
    <?php echo t('Add new contact'); ?>
</a>