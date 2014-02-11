
<div class="container">
  <div class="row">
    <div class="document-left profile col-md-8">
      <?php
          echo render($content['field_document_files']);
      ?>
      <?php
        render_slot($node, 'related-content', 'document', $content);
      ?>
    </div>

    <div class="document-right profile well col-md-4">
      <table class="table table-condensed table-hover two-columns">
        <tbody>
          <?php
            echo render($content['field_document_number']);
            echo render($content['field_document_instrument']);
            echo render($content['field_document_type']);
            echo render($content['field_document_status']);
            echo render($content['field_document_publish_date']);
            echo render($content['field_document_submitted_by']);
            echo render($content['field_document_country']);
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php
    hide($content['links']);
    hide($content['comments']);
?>
