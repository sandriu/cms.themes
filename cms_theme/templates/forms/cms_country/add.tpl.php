<div class="row">
    <div class="span12">
        <div class="span6 no-left-margin">
            <?php
                echo drupal_render($form['field_cms_country']);
            ?>
        </div>
        <div class="span6 no-left-margin">
            <?php
                echo drupal_render($form['field_cms_country_region']);
            ?>
        </div>
    </div>

    <div class="span12">
        <div class="span6 no-left-margin">
            <?php
                echo drupal_render($form['field_cms_country_party_no']);
            ?>
        </div>
        <div class="span6 no-left-margin">
            <?php
                echo drupal_render($form['field_cms_country_entry_force']);
            ?>
        </div>
    </div>

    <div class="clearfix">&nbsp;</div>

    <div class="span12">
        <?php
            hide($form['additional_settings']);
            echo drupal_render_children($form);
        ?>
    </div>
</div>