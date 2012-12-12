<table class="table table-bordered span6 no-left-margin">
    <tbody>
        <tr>
            <th class="span2">
                <?php
                    echo t('Personal title');
                ?>
            </th>

            <td>
                <?php
                    echo $data['prefix'][0];
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
                    echo $data['sn'][0];
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
                    echo $data['givenname'][0];
                ?>
            </td>
        </tr>
        <tr>
            <th class="span2">
                <?php
                    echo t('Work email');
                ?>
            </th>

            <td>
                <a href="mailto:<?php echo $data['mail'][0]; ?>">
                <?php
                    echo $data['mail'][0];
                ?>
                </a>
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
                    echo t('Position');
                ?>
            </th>

            <td>
                <?php
                    echo $data['position'][0];
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
                    echo countries_get_country($data['iso2'][0])->name;
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
                    echo $data['st'][0];
                ?>
            </td>
        </tr>

    </tbody>
</table>
