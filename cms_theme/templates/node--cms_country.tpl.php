<?php
    render_slot($node, 'node-buttons', 'general');

    render_slot($node, 'details', 'cms_country', $content);

    hide($content['links']);
    hide($content['comments']);
?>