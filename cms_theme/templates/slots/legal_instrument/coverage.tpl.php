<?php
    if (check_display_field($content, 'field_instrument_coverage')) {
?>
<hr />

<?php
    echo render($content['field_instrument_coverage']);
?>

<?php
    }
?>
