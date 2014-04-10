<?php
    render_slot($node, 'node-buttons', 'general');
?>

<div class="row">
    <div class="col-md-6">
        <table class="table table-condensed table-hover two-columns">
            <tbody>
            <?php
                echo render($content['field_nat_plan_type']);
                echo render($content['field_nat_plan_country']);
                echo render($content['field_nat_plan_instrument']);
                echo render($content['field_nat_plan_receipt']);
            ?>
            </tbody>
        </table>
    </div>

    <div class="col-md-6">
    <?php
        echo render($content['field_nat_plan_remarks']);
    ?>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-12">
    <?php
        echo render_slot($node, 'related-content', 'national_plan', $content);
    ?>
    </div>
</div>

<?php
    hide($content['links']);
    hide($content['comments']);
?>
