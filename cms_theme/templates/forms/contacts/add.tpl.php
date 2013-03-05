<div class="row">
    <div class="span6">
        <fieldset>
            <legend>
                <?php
                    echo t('Personal details');
                ?>
            </legend>

            <?php
                echo drupal_render($form['personal_title']);
                echo drupal_render($form['first_name']);
                echo drupal_render($form['last_name']);
                echo drupal_render($form['personal_email']);
                echo drupal_render($form['home_phone']);
                echo drupal_render($form['mobile']);
                echo drupal_render($form['skype']);
                echo drupal_render($form['additional_emails']);
                echo drupal_render($form['description']);
            ?>
        </fieldset>
    </div>

    <div class="span6">
        <fieldset>
            <legend>
                <?php
                    echo t('Organization details');
                ?>
            </legend>
            <?php
                echo drupal_render($form['position']);
                echo drupal_render($form['email']);
                echo drupal_render($form['work_phone']);
                echo drupal_render($form['fax_number']);
                echo drupal_render($form['organization']);
                echo drupal_render($form['department']);
                echo drupal_render($form['website']);
                echo drupal_render($form['conventions']);
                echo drupal_render($form['country_post']);
            ?>
        </fieldset>
    </div>

    <div class="span12">
        <fieldset>
            <legend>
                <?php
                    echo t('Address');
                ?>
            </legend>
            <?php
                echo drupal_render($form['country']);
                echo drupal_render($form['city']);
                echo drupal_render($form['zip_code']);
                echo drupal_render($form['address']);
            ?>
        </fieldset>

        <?php
            echo drupal_render_children($form);
        ?>
    </div>
</div>