<?php
    render_slot($node, 'node-buttons', 'general');
?>

<div class="row">
    <div class="span8">
        <table class="table table-condensed table-hover two-columns">
            <tbody>
            <?php
                echo render($content['field_meeting_start']);
                echo render($content['field_meeting_end']);
                echo render($content['field_meeting_reg_deadline']);
                echo render($content['field_meeting_organizer']);
                echo render($content['field_meeting_coorganizer']);
                echo render($content['field_meeting_instrument']);
                echo render($content['field_meeting_type']);
                echo render($content['field_meeting_kind']);
                echo render($content['field_meeting_access']);
                echo render($content['field_meeting_status']);
                echo render($content['field_meeting_languages']);
            ?>
            </tbody>
        </table>
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
</div>

<?php
    hide($content['links']);
    hide($content['comments']);
?>
