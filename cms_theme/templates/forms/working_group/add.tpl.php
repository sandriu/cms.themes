<p>mereg</p>
<?php
    //unset($form['#theme']);
    if (arg(0) == 'node' && is_numeric(arg(1))) {
        $node_id = arg(1);
    }
    echo drupal_render_children($form);
?>
<h3>Reorder related documents</h3>
<?php
    print views_embed_view('working_group_documents_reorder','wg_doc_reorder', $node_id);

?>
