<?php
    if (check_display_field($content, 'field_instrument_treaty_text')) {
?>
<hr />
<?php
    echo render($content['field_instrument_treaty_text']);
?>
<?php
    }
?>
