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
                echo render($content['field_decision_meeting']);
            ?>
            </tbody>
        </table>
        <hr />

    </div>

    <?php
        if (isset($content['field_decision_documents'])) {
            $total_documents = count($content['field_decision_documents']['#items']);
    ?>
    <div class="span12">
        <div class="accordion" id="accordion2">
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                        <?php
                            echo t('Documents') . " (" . $total_documents .")";
                        ?>
                    </a>
                </div>
                <div id="collapseOne" class="accordion-body collapse in">
                    <div class="accordion-inner">
                        <?php
                            echo render($content['field_decision_documents']);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
    <div class="span6">
    <?php
        echo render($content['field_decision_summary']);
    ?>
    </div>
</div>

<?php
    hide($content['links']);
    hide($content['comments']);
?>
