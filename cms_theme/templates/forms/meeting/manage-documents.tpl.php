<h2 class="muted">
    <?php
    echo t('Manage documents');
    ?>
</h2>

<div class="clearfix">&nbsp;</div>

<input type="hidden" id="meeting-id" value="<?php echo $node->nid; ?>" />

<ul class="nav nav-tabs" id="meeting-documents-tabs">
    <li class="active">
        <a href="#manage">
            <?php
            echo t('Existing documents');
            ?>
        </a>
    </li>

    <li>
        <a href="#add-more">
            <?php
            echo t('Add new documents');
            ?>
        </a>
    </li>
    <li>
        <a href="#reorder-docs">
            <?php
            echo t('Reorder documents');
            ?>
        </a>
    </li>
</ul>

<div class="tab-content">
<div class="tab-pane active" id="manage">
    <button class="btn btn-small btn-inverse" type="button" id="select-all">
        <?php echo t('Select all'); ?>
    </button>

    <button class="btn btn-small btn-inverse" type="button" id="deselect-all">
        <?php echo t('Deselect all'); ?>
    </button>

    <div class="clearfix"></div>
    <br />

    <table class="table table-bordered table-striped table-hover dataTables" id="meeting-document-listing">
        <thead>
        <tr>
            <th class="select-all-input">
                <!--<input type="checkbox" name="select_all" id="select-all" />-->
            </th>

            <th>
                <?php
                echo t('Document title');
                ?>
            </th>

            <th class="span3">
                <?php
                echo t('Document number');
                ?>
            </th>

            <th class="span2">
                <?php
                echo t('Published');
                ?>
            </th>

            <th class="span2">
                <?php
                echo t('Created');
                ?>
            </th>
            <th class="span1">
                <?php
                echo t('Published');
                ?>
            </th>
        </tr>
        </thead>

        <tbody>
        <?php
        $meeting_documents = CMSMeeting::get_documents($node);
        foreach ($meeting_documents as $document_id => $document) {
            $fields_lang = field_language('node', $document);
            ?>
            <tr>
                <td>
                    <input type="checkbox" name="selected_meeting_documents[]" value="<?php echo $document_id; ?>" />
                </td>

                <td>
                    <?php
                    $path = drupal_get_path_alias('node/' . $document_id);
                    echo l($document->title, $path);
                    ?>
                </td>

                <td>
                    <?php
                    if (isset($document->field_document_number) && (!empty($document->field_document_number))) {
                        echo $document->field_document_number[$fields_lang['field_document_number']][0]['value'];
                    }
                    ?>
                </td>

                <td>
                    <?php
                    if (isset($document->field_document_publish_date) && (!empty($document->field_document_publish_date))) {
                        $publish_date = strtotime($document->field_document_publish_date[$fields_lang['field_document_publish_date']][0]['value']);
                        echo date("d/m/Y", $publish_date);
                    }

                    ?>
                </td>

                <td>
                    <?php
                    echo date("d/m/Y", $document->created);
                    ?>
                </td>
                <td>
                    <span class='<?php echo ($document->status == 1) ? "published" : "unpublished"; ?>-icon'></span>
                </td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>

    <div class="clearfix">&nbsp;</div>

    <p>
        <button class="btn btn-small btn-danger" type="button" id="delete-meeting-documents">
            <?php echo t('Remove selected'); ?>
        </button>
    </p>
</div>

<div class="tab-pane" id="add-more">
    <button class="btn btn-small btn-inverse" type="button" id="documents-select-all">
        <?php echo t('Select all'); ?>
    </button>

    <button class="btn btn-small btn-inverse" type="button" id="documents-deselect-all">
        <?php echo t('Deselect all'); ?>
    </button>

    <div class="clearfix"></div>
    <br />

    <table class="table table-bordered table-striped table-hover dataTables" id="all-document-listing">
        <thead>
        <tr>
            <th class="select-all-input">
                <!--<input type="checkbox" name="documents_select_all" id="documents-select-all" />-->
            </th>
            <th>
                <?php
                echo t('Document title');
                ?>
            </th>

            <th class="span3">
                <?php
                echo t('Document number');
                ?>
            </th>

            <th class="span2">
                <?php
                echo t('Published');
                ?>
            </th>

            <th class="span2">
                <?php
                echo t('Created');
                ?>
            </th>

            <th class="span1">
                <?php
                echo t('Published');
                ?>
            </th>
        </tr>
        </thead>

        <tbody>
        <?php
        $documents = node_load_multiple(array(), array('type' => 'document'));
        foreach ($documents as $document_id => $document) {
            $fields_lang = field_language('node', $document);
            if (!in_array($document_id, array_keys($meeting_documents))) {
                ?>
                <tr>
                    <td>
                        <input type="checkbox" name="selected_meeting_documents[]" value="<?php echo $document_id; ?>" />
                    </td>

                    <td>
                        <?php
                        $path = drupal_get_path_alias('node/' . $document_id);
                        echo l($document->title, $path);
                        ?>
                    </td>

                    <td>
                        <?php
                        if (isset($document->field_document_number) && (!empty($document->field_document_number))) {
                            echo $document->field_document_number[$fields_lang['field_document_number']][0]['value'];
                        }
                        ?>
                    </td>

                    <td>
                        <?php
                        if (isset($document->field_document_publish_date) && (!empty($document->field_document_publish_date))) {
                            $publish_date = strtotime($document->field_document_publish_date[$fields_lang['field_document_publish_date']][0]['value']);
                            echo date("d/m/Y", $publish_date);
                        }

                        ?>
                    </td>

                    <td>
                        <?php
                        echo date("d/m/Y", $document->created);
                        ?>
                    </td>
                    <td>
                        <span class='<?php echo ($document->status == 1) ? "published" : "unpublished"; ?>-icon'></span>
                    </td>
                </tr>
            <?php
            }
        }
        ?>
        </tbody>
    </table>

    <div class="clearfix">&nbsp;</div>

    <p>
        <button class="btn btn-small btn-primary" type="button" id="add-meeting-documents">
            <?php echo t('Add selected'); ?>
        </button>
    </p>
</div>
<div class="tab-pane" id="reorder-docs">
    <?php
        $types = array();
        if (!empty($meeting_documents)) {
            foreach ($meeting_documents as $document_id => $document) {
                foreach ($document->field_document_type as $lang_terms) {
                    foreach ($lang_terms as $term) {
                        if(!in_array($term['tid'], $types)) {
                            $types []= $term['tid'];
                        }
                    }
                }
            }
            foreach ($types as $tid) {
                $type_term = taxonomy_term_load($tid);
        ?>
                <h4><?php echo $type_term->name; ?></h4>
    <?php   print views_embed_view('meeting_documents_list_reorder','m_d_reorder', $node->nid, $tid);
            }
        } else { ?>
    <p class="text-warning">
            <?php echo t('No documents'); ?>
    </p>
    <?php
        }
    ?>


</div>
</div>

<?php
drupal_add_library('system', 'ui');
$js_path = drupal_get_path('module', 'datatables') . '/dataTables/media/js/jquery.dataTables.min.js';
$DT_js_path = drupal_get_path('module', 'datatables') . '/dataTables/media/js/dataTables.bootstrap.js';
$css_path = drupal_get_path('module', 'datatables') . '/dataTables/media/css/demo_table.css';
$css2_path = drupal_get_path('module', 'datatables') . '/dataTables/media/css/dataTables.bootstrap.css';
?>
<script type="text/javascript" src="/<?php echo $js_path; ?>"></script>
<script type="text/javascript" src="/<?php echo $DT_js_path; ?>"></script>
<link type="text/css" rel="stylesheet" href="/<?php echo $css_path; ?>" />
<link type="text/css" rel="stylesheet" href="/<?php echo $css2_path; ?>" />
<script type="text/javascript">
    var administration_path = '/<?php echo ADMINISTRATION_PATH; ?>';
</script>
<?php
drupal_add_js(drupal_get_path('theme', 'cms_theme') . '/js/meetings.js');
?>
