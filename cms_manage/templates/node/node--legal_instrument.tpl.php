<?php
    $content['contacts'] = $node->contacts;
    $content['countries_by_status'] = $node->countries_by_status;

    render_slot($node, 'node-buttons', 'general');
    render_slot($node, 'details', 'legal_instrument', $content);
    render_slot($node, 'attachments', 'legal_instrument', $content);
    render_slot($node, 'related-content', 'legal_instrument', $content);

    hide($content['links']);
    hide($content['comments']);

    $js_path = drupal_get_path('module', 'datatables') . '/dataTables/media/js/jquery.dataTables.min.js';
    $DT_js_path = drupal_get_path('module', 'datatables') . '/dataTables/media/js/dataTables.bootstrap.js';
    $css_path = drupal_get_path('module', 'datatables') . '/dataTables/media/css/demo_table.css';
    $DT_css_path = drupal_get_path('module', 'datatables') . '/dataTables/media/css/dataTables.bootstrap.css';
?>
<script type="text/javascript" src="/<?php echo $js_path; ?>"></script>
<script type="text/javascript" src="/<?php echo $DT_js_path; ?>"></script>
<link type="text/css" rel="stylesheet" href="/<?php echo $css_path; ?>">
<link type="text/css" rel="stylesheet" href="/<?php echo $DT_css_path; ?>">
<?php
    drupal_add_js(drupal_get_path('theme', 'cms_manage') . DIRECTORY_SEPARATOR . 'js' . DIRECTORY_SEPARATOR . 'simple_datatables.js');
?>
