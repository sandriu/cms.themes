<div class="row">
    <div class="span6">
        <fieldset>
            <?php
                echo drupal_render($form['name']);
                echo drupal_render($form['phone']);
                echo drupal_render($form['fax_number']);
                echo drupal_render($form['description']);
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