<div class="row">
    <div class="span6">
        <fieldset>
            <?php
                echo drupal_render($form['availability']);
                echo drupal_render($form['name']);
                echo drupal_render($form['department']);
                echo drupal_render($form['conventions']);
                echo drupal_render($form['organization_status']);
                echo drupal_render($form['website']);
                echo drupal_render($form['email']);
                echo drupal_render($form['phone']);
                echo drupal_render($form['mobile']);
                echo drupal_render($form['fax_number']);
                echo drupal_render($form['skype']);
                echo drupal_render($form['additional_emails']);
                echo drupal_render($form['description']);
                echo drupal_render($form['mailing_list']);
                echo drupal_render($form['preferred_language']);
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
                echo drupal_render($form['region']);
                echo drupal_render($form['country']);
                echo drupal_render($form['country_post']);
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