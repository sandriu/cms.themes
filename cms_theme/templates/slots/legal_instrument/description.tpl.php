<?php
    if (check_display_field($content, 'field_instrument_description')) {
?>
<hr />

<?php
    echo render($content['field_instrument_description']);
?>

<?php
    }
?>
