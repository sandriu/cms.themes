<?php
    $regions  = CMSUtils::vocabulary_get_terms(VOC_CONTACTS_REGION);
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
                        echo render($data['sn'][0]);
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
                        echo render($data['givenname'][0]);
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
                        if (isset($data['mail'][1])) {
                    ?>
                    <a href="mailto:<?php echo $data['mail'][1]; ?>">
                    <?php
                        echo $data['mail'][1];
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
                        echo render($data['mobile'][0]);
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
                    if (isset($data['website'][0]) && (!empty($data['website'][0]))) {
                    ?>
                    <a href="<?php echo $data['website'][0]; ?>" taget="_blank">
                    <?php
                        echo $data['website'][0];
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
                        if (isset($data['mail'])) {
                    ?>
                    <a href="mailto:<?php echo $data['mail'][0]; ?>">
                    <?php
                        echo $data['mail'][0];
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
                        echo t('Organization status');
                    ?>
                </th>

                <td>
                    <?php
                    if (isset($data['organizationstatus']) && !empty($data['organizationstatus'])) {
                        foreach ($data['organizationstatus'] as $index => $status) {
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
                        echo t('Person status');
                    ?>
                </th>

                <td>
                    <?php
                    if (isset($data['personstatus']) && !empty($data['personstatus'])) {
                        foreach ($data['personstatus'] as $index => $status) {
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
                        echo render($data['workphone'][0]);
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
                        echo render($data['facsimiletelephonenumber'][0]);
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
                    if (isset($data['cmsmailing']) && !empty($data['cmsmailing'])) {
                        foreach ($data['cmsmailing'] as $index => $mailing_list) {
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
        </tbody>
    </table>
</div>