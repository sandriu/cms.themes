<?php
    render_slot($node, 'node-buttons', 'meeting');
?>

<div class="row">
    <div class="span8">
        <table class="table table-condensed table-hover two-columns">
            <tbody>
            <?php
                echo render($content['field_meeting_start']);
                echo render($content['field_meeting_start_time']);
                echo render($content['field_meeting_end']);
                echo render($content['field_meeting_reg_deadline']);
                echo render($content['field_meeting_organizer']);
                echo render($content['field_meeting_coorganizer']);
                echo render($content['field_instrument']);
                echo render($content['field_meeting_type']);
                echo render($content['field_meeting_kind']);
                echo render($content['field_meeting_status']);
                echo render($content['field_meeting_languages']);
                echo render($content['field_meeting_url']);

            ?>
            </tbody>
        </table>
        <div class="clearfix">&nbsp;</div>
        <?php echo render($content['field_meeting_description']); ?>
    </div>

    <div class="span4">
        <?php
            echo render($content['field_meeting_image']);
        ?>

        <div class="thumbnail">
            <div class="caption">
                <table class="table table-condensed table-hover two-columns">
                    <tbody>
                    <?php
                        echo render($content['field_meeting_country']);
                        echo render($content['field_meeting_city']);
                        echo render($content['field_meeting_address']);
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <div class="span12">
        <?php echo render_slot($node, 'related-content', 'meeting', $content); ?>
    </div>

</div>

<?php
    hide($content['links']);
    hide($content['comments']);
?>
