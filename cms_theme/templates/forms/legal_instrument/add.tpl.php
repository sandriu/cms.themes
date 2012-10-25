<div class="row">
    <div class="span12">
        <div class="span7 no-left-margin">
            <?php
                echo drupal_render($form['title']);
            ?>
        </div>

        <div class="span4">
            <?php
                echo drupal_render($form['field_instrument_name']);
            ?>
        </div>
    </div>

    <div class="span12">
        <div class="span2 no-left-margin">
            <?php
                echo drupal_render($form['field_instrument_type']);
            ?>
        </div>

        <div class="span5">
            <?php
                echo drupal_render($form['field_instrument_host_country']);
            ?>
        </div>

        <div class="span3 pull-left">
            <?php
                echo drupal_render($form['field_instrument_sponsor']);
            ?>
        </div>

    </div>

    <div class="span12">
        <div class="span6 no-left-margin">
            <?php
                echo drupal_render($form['field_instrument_depository']);
            ?>
        </div>

        <div class="span5 pull-right">
            <?php
                echo drupal_render($form['field_instrument_secretariat']);
            ?>
        </div>
    </div>

    <div class="clearfix">&nbsp;</div>
    <hr />
    <div class="clearfix">&nbsp;</div>

    <div class="span12">
        <div class="span3 no-left-margin">
            <?php
                echo drupal_render($form['field_instrument_in_effect']);
            ?>
        </div>

        <div class="span3">
            <?php
                echo drupal_render($form['field_instrument_in_force']);
            ?>
        </div>

        <div class="span3">
            <?php
                echo drupal_render($form['field_instrument_actual_effect']);
            ?>
        </div>

        <div class="span3">
            <?php
                echo drupal_render($form['field_instrument_actual_force']);
            ?>
        </div>
    </div>

    <div class="clearfix">&nbsp;</div>
    <hr />
    <div class="clearfix">&nbsp;</div>

    <div class="span12">
        <?php
            echo drupal_render($form['field_instrument_description']);
        ?>
    </div>

    <div class="clearfix">&nbsp;</div>
    <hr />
    <div class="clearfix">&nbsp;</div>

    <div class="span12">
        <?php
            echo drupal_render($form['field_instrument_coverage']);
        ?>
    </div>

    <div class="clearfix">&nbsp;</div>
    <hr />
    <div class="clearfix">&nbsp;</div>

    <div class="span12">
        <?php
            echo drupal_render($form['field_instrument_treaty_text']);
        ?>
    </div>

    <div class="clearfix">&nbsp;</div>

    <div class="span12">
        <?php
            hide($form['additional_settings']);
            echo drupal_render_children($form);
        ?>
    </div>
</div>