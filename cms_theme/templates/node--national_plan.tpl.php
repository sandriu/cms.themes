<?php
    render_slot($node, 'node-buttons', 'general');
?>

<div class="row">
    <div class="span6">
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
        <hr />

        <?php
            echo render($content['field_nat_plan_documents']);
        ?>
    </div>

    <div class="span6">
    <?php
        echo render($content['field_nat_plan_remarks']);
    ?>
    </div>
</div>

<?php
    hide($content['links']);
    hide($content['comments']);
?>
