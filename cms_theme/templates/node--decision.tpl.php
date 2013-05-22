<?php
    render_slot($node, 'node-buttons', 'general');
?>

<div class="row">
    <div class="span6">
        <table class="table table-condensed table-hover two-columns">
            <tbody>
            <?php
                echo render($content['field_decision_publish_date']);
                echo render($content['field_decision_type']);
                echo render($content['field_decision_status']);
                echo render($content['field_decision_number']);
            ?>
            </tbody>
        </table>
        <hr />
    </div>

    <div class="span6">
    <?php
        echo render($content['field_decision_summary']);
    ?>
    </div>

    <div class="clearfix"></div>

    <div class="span12">
    <?php
        echo render_slot($node, 'related-content', 'decision', $content);
    ?>
    </div>
</div>

<?php
    hide($content['links']);
    hide($content['comments']);
?>
