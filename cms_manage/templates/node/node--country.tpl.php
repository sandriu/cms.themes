<?php
    render_slot($node, 'details', 'cms_country', $content);
    render_slot($node, 'related-content', 'cms_country', $content);
    hide($content['links']);
    hide($content['comments']);

