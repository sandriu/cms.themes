<?php
    render_slot($node, 'node-buttons', 'general');

    render_slot($node, 'type', 'legal_instrument', $content);
    render_slot($node, 'details', 'legal_instrument', $content);
    render_slot($node, 'dates', 'legal_instrument', $content);
    render_slot($node, 'description', 'legal_instrument', $content);
    render_slot($node, 'coverage', 'legal_instrument', $content);
    render_slot($node, 'attachments', 'legal_instrument', $content);

    hide($content['links']);
    hide($content['comments']);
?>
