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
                    echo $user['prefix'][0];
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
                    echo $user['sn'][0];
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
                    echo $user['givenname'][0];
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
                <a href="mailto:<?php echo $user['mail'][0]; ?>">
                <?php
                    echo $user['mail'][0];
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
                <a href="mailto:<?php echo $user['mail'][1]; ?>">
                <?php
                    echo $user['mail'][1];
                ?>
                </a>
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
                    echo $user['position'][0];
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
                    echo countries_get_country($user['iso2'][0])->name;
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
                    echo $user['st'][0];
                ?>
            </td>
        </tr>

    </tbody>
</table>