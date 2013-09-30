<?php
    $regions = CMSUtils::vocabulary_get_terms(VOC_CONTACTS_REGION);
    $languages = CMSUtils::vocabulary_get_terms(VOC_LANGUAGES);
?>

<div class="row">
    <table class="table table-bordered span6">
        <caption>
            <?php
                echo t('Personal information');
            ?>
        </caption>

        <tbody>
            <tr>
                <th class="span2">
                    <?php
                        echo t('Personal title');
                    ?>
                </th>

                <td>
                    <?php
                        echo render($data['personaltitle'][0]);
                    ?>
                </td>
            </tr>
            <tr>
                <th class="span2">
                    <?php
                        echo t('First name');
                    ?>
                </th>

                <td>
                    <?php
                        echo render($data['givenname'][0]);
                    ?>
                </td>
            </tr>

            <tr>
                <th class="span2">
                    <?php
                        echo t('Last name');
                    ?>
                </th>

                <td>
                    <?php
                        echo render($data['sn'][0]);
                    ?>
                </td>
            </tr>

            <tr>
                <th class="span2">
                    <?php
                        echo t('Personal email');
                    ?>
                </th>

                <td>
                    <?php
                        if (isset($data['personalemail'][0])) {
                    ?>
                    <a href="mailto:<?php echo $data['personalemail'][0]; ?>">
                    <?php
                        echo $data['personalemail'][0];
                    ?>
                    </a>
                    <?php
                        }
                    ?>
                </td>
            </tr>

            <tr>
                <th class="span2">
                    <?php
                        echo t('Home phone');
                    ?>
                </th>

                <td>
                    <?php
                        echo render($data['homephone'][0]);
                    ?>
                </td>
            </tr>

            <tr>
                <th class="span2">
                    <?php
                        echo t('Mobile');
                    ?>
                </th>

                <td>
                    <?php
                    if (isset($data['mobilephonenumbers']) && !empty($data['mobilephonenumbers'])) {
                        foreach ($data['mobilephonenumbers'] as $index => $number) {
                            if (is_numeric($index)) {
                                echo $number . "<br />";
                            }
                        }
                    }
                    ?>
                </td>
            </tr>

            <tr>
                <th class="span2">
                    <?php
                        echo t('Skype ID');
                    ?>
                </th>

                <td>
                    <?php
                        echo render($data['skype'][0]);
                    ?>
                </td>
            </tr>

            <tr>
                <th class="span2">
                    <?php
                        echo t('Website');
                    ?>
                </th>

                <td>
                    <?php
                    if (isset($data['websites']) && !empty($data['websites'])) {
                        foreach ($data['websites'] as $index => $website) {
                            if (is_numeric($index)) {
                                if (!CMSUtils::starts_with('http', $website)) {
                                    $website = 'http://' . $website;
                                }
                    ?>
                    <a href="<?php echo $website; ?>" target="_blank" title="<?php echo t('Visit') . ' ' . $website; ?>"><?php echo $website; ?></a>
                    <br />
                    <?php
                            }
                        }
                    }
                    ?>
                </td>
            </tr>

            <tr>
                <th class="span2">
                    <?php
                        echo t('Additional emails');
                    ?>
                </th>

                <td>
                    <?php
                    if (isset($data['additionalemails']) && !empty($data['additionalemails'])) {
                        foreach ($data['additionalemails'] as $index => $additional_email) {
                            if (is_numeric($index)) {
                    ?>
                    <a href="mailto:<?php echo $additional_email; ?>" title="<?php echo t('Send mail to') . ' ' . $additional_email; ?>"><?php echo $additional_email; ?></a>
                    <br />
                    <?php
                            }
                        }
                    }
                    ?>
                </td>
            </tr>

            <tr>
                <th class="span2">
                    <?php
                        echo t('Description');
                    ?>
                </th>

                <td>
                    <?php
                        echo render($data['description'][0]);
                    ?>
                </td>
            </tr>
        </tbody>
    </table>

    <table class="table table-bordered span6">
        <caption>
            <?php
                echo t('Organization details');
            ?>
        </caption>

        <tbody>
            <tr>
                <th class="span2">
                    <?php
                        echo t('Work email');
                    ?>
                </th>

                <td>
                    <?php
                    if (isset($data['mail']) && !empty($data['mail'])) {
                        foreach ($data['mail'] as $index => $work_email) {
                            if (is_numeric($index)) {
                    ?>
                    <a href="mailto:<?php echo $work_email; ?>" title="<?php echo t('Send mail to') . ' ' . $work_email; ?>"><?php echo $work_email; ?></a>
                    <br />
                    <?php
                            }
                        }
                    }
                    ?>
                </td>
            </tr>

            <tr>
                <th class="span2">
                    <?php
                        echo t('Organization');
                    ?>
                </th>

                <td>
                    <?php
                        echo render($data['o'][0]);
                    ?>
                </td>
            </tr>

            <tr>
                <th class="span2">
                    <?php
                        echo t('Status organization');
                    ?>
                </th>

                <td>
                    <?php
                    if (isset($data['statusorganization']) && !empty($data['statusorganization'])) {
                        foreach ($data['statusorganization'] as $index => $status) {
                            if (is_numeric($index)) {
                                echo $status;
                    ?>
                    <br />
                    <?php
                            }
                        }
                    }
                    ?>
                </td>
            </tr>

            <tr>
                <th class="span2">
                    <?php
                        echo t('Department');
                    ?>
                </th>

                <td>
                    <?php
                        echo render($data['ou'][0]);
                    ?>
                </td>
            </tr>

            <tr>
                <th class="span2">
                    <?php
                        echo t('Position');
                    ?>
                </th>

                <td>
                    <?php
                        echo render($data['title'][0]);
                    ?>
                </td>
            </tr>

            <tr>
                <th class="span2">
                    <?php
                        echo t('Status person');
                    ?>
                </th>

                <td>
                    <?php
                    if (isset($data['statusperson']) && !empty($data['statusperson'])) {
                        foreach ($data['statusperson'] as $index => $status) {
                            if (is_numeric($index)) {
                                echo $status;
                    ?>
                    <br />
                    <?php
                            }
                        }
                    }
                    ?>
                </td>
            </tr>

            <tr>
                <th class="span2">
                    <?php
                        echo t('CMS Instruments');
                    ?>
                </th>

                <td>
                    <?php
                    $instruments_names = CMSLegalInstrument::cms_instruments_names();
                    $instruments = '';
                    foreach ($data['conventions'] as $index => $instrument) {
                        if (is_numeric($index)) {
                            if (array_key_exists(strtolower($instrument), $instruments_names)) {
                                $instruments .= $instruments_names[strtolower($instrument)];
                                if (($index + 1) < $data['conventions']['count']) {
                                    $instruments .= ', ';
                                }
                            }
                        }
                    }
                    echo $instruments;
                    ?>
                </td>
            </tr>

            <tr>
                <th class="span2">
                    <?php
                        echo t('Region');
                    ?>
                </th>

                <td>
                    <?php
                    if (isset($data['region']) && !empty($data['region'])) {
                        echo (isset($regions[$data['region'][0]])) ? $regions[$data['region'][0]] : $data['region'][0];
                    }
                    ?>
                </td>
            </tr>

            <tr>
                <th class="span2">
                    <?php
                        echo t('Country');
                    ?>
                </th>

                <td>
                    <?php
                    if (isset($data['iso2']) && !empty($data['iso2'])) {
                        echo countries_get_country($data['iso2'][0])->name;
                    }
                    ?>
                </td>
            </tr>

            <tr>
                <th class="span2">
                    <?php
                        echo t('Country post');
                    ?>
                </th>

                <td>
                    <?php
                    if (isset($data['cpiso2']) && !empty($data['cpiso2'])) {
                        echo countries_get_country($data['cpiso2'][0])->name;
                    }
                    ?>
                </td>
            </tr>

            <tr>
                <th class="span2">
                    <?php
                        echo t('Town/City');
                    ?>
                </th>

                <td>
                    <?php
                        echo render($data['st'][0]);
                    ?>
                </td>
            </tr>

            <tr>
                <th class="span2">
                    <?php
                        echo t('Postal code');
                    ?>
                </th>

                <td>
                    <?php
                        echo render($data['postalcode'][0]);
                    ?>
                </td>
            </tr>

            <tr>
                <th class="span2">
                    <?php
                        echo t('Address');
                    ?>
                </th>

                <td>
                    <?php
                        echo render($data['street'][0]);
                    ?>
                </td>
            </tr>

            <tr>
                <th class="span2">
                    <?php
                        echo t('Work phone');
                    ?>
                </th>

                <td>
                    <?php
                    if (isset($data['workphonenumbers']) && !empty($data['workphonenumbers'])) {
                        foreach ($data['workphonenumbers'] as $index => $number) {
                            if (is_numeric($index)) {
                                echo $number . "<br />";
                            }
                        }
                    }
                    ?>
                </td>
            </tr>

            <tr>
                <th class="span2">
                    <?php
                        echo t('Fax');
                    ?>
                </th>

                <td>
                    <?php
                    if (isset($data['faxnumbers']) && !empty($data['faxnumbers'])) {
                        foreach ($data['faxnumbers'] as $index => $number) {
                            if (is_numeric($index)) {
                                echo $number . "<br />";
                            }
                        }
                    }
                    ?>
                </td>
            </tr>

            <tr>
                <th class="span2">
                    <?php
                        echo t('Mailing lists');
                    ?>
                </th>

                <td>
                    <?php
                    if (isset($data['mailinglists']) && !empty($data['mailinglists'])) {
                        foreach ($data['mailinglists'] as $index => $mailing_list) {
                            if (is_numeric($index)) {
                                echo $mailing_list;
                    ?>
                    <br />
                    <?php
                            }
                        }
                    }
                    ?>
                </td>
            </tr>

            <tr>
                <th class="span2">
                    <?php
                        echo t('Preferred language');
                    ?>
                </th>

                <td>
                    <?php
                    if (isset($data['preferredlanguages']) && !empty($data['preferredlanguages'])) {
                        foreach ($data['preferredlanguages'] as $index => $language) {
                            if (is_numeric($index)) {
                                echo $language . "<br />";
                            }
                        }
                    }
                    ?>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="span12">
    <h3 class="muted">
        <?php
            echo t('Species');
        ?>
    </h3>

    <?php
        if ($data['species']) {
    ?>
    <ul>
    <?php
        foreach($data['species'] as $index => $species) {
    ?>
        <li>
            <?php
            echo l($species->title, "node/" . $species->nid . "");
            ?>
        </li>
    <?php
        }
    ?>
    </ul>
    <?php
        }else {
    ?>
    <p class="text-warning">
        <?php
        echo t('The contact is not assigned to any species.');
        ?>
    </p>
    <?php
        }
    ?>
    </div>

    <hr />

    <div class="span12">
        <h3 class="muted">
            <?php
                echo t('Meetings');
            ?>
        </h3>

        <?php
            if ($data['meetings']) {
        ?>
        <ul>
        <?php
            foreach($data['meetings'] as $index => $meeting) {
        ?>
            <li>
                <?php
                echo l($meeting->title, "node/" . $meeting->nid . "");
                ?>
            </li>
        <?php
            }
        ?>
        </ul>
        <?php
            }else {
        ?>
        <p class="text-warning">
            <?php
            echo t('The contact is not participant to any meeting.');
            ?>
        </p>
        <?php
            }
        ?>
    </div>
</div>