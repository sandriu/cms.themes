<?php
    render_slot($node, 'node-buttons', 'general');
?>

<div class="row">
    <div class="span8">
        <table class="table table-condensed table-hover two-columns">
            <tbody>
            <?php
                echo render($content['field_document_number']);
                echo render($content['field_instrument']);
                echo render($content['field_document_type']);
                echo render($content['field_document_status']);
                echo render($content['field_document_publish_date']);
                echo render($content['field_document_submitted_by']);
                echo render($content['field_country']);
            ?>
            </tbody>
        </table>
    </div>

    <div class="span12">
    <?php
        echo render($content['field_document_files']);
    ?>
    </div>

    <div class="span12">
    <?php
        render_slot($node, 'related-content', 'document', $content);
    ?>
    </div>
</div>

<?php
    hide($content['links']);
    hide($content['comments']);
?>
