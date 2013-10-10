<div class="row" id="cms-country-form">
    <div class="span4">
        <?php
            echo drupal_render($form['title']);
        ?>
    </div>

    <div class="clearfix"></div>
    <div class="span4">
        <?php
            echo drupal_render($form['field_cms_country']);
        ?>
    </div>

    <div class="span4">
        <?php
            echo drupal_render($form['field_cms_country_region']);
        ?>
    </div>

    <div class="clearfix"></div>

    <div class="span5">
        <div class="pull-left">
        <?php
            echo drupal_render($form['field_cms_country_entry_force']);
        ?>
        </div>

        <div class="pull-left span2">
        <?php
            echo drupal_render($form['field_cms_country_party_no']);
        ?>
        </div>
    </div>

    <div class="clearfix">&nbsp;</div>

    <div class="span12">
        <?php
            echo drupal_render_children($form);
        ?>
    </div>
</div>