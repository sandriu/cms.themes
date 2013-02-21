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
</ul>

<div class="tab-content">
    <div class="tab-pane active" id="manage">
        <table class="table table-bordered table-striped table-hover dataTables" id="meeting-document-listing">
            <thead>
                <tr>
                    <th class="select-all-input">
                        <input type="checkbox" name="select_all" id="select-all" />
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
                </tr>
            </thead>

            <tbody>
                <?php
                    $meeting_documents = CMSMeeting::get_documents($node);
                    foreach ($meeting_documents as $document_id => $document) {
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
                        if (isset($documnet->field_document_number) && (!empty($documnet->field_document_number))) {
                            echo $document->field_document_number[$document->language][0]['value'];
                        }
                    ?>
                    </td>

                    <td>
                    <?php
                        if (isset($document->field_document_publish_date) && (!empty($document->field_document_publish_date))) {
                            $publish_date = strtotime($document->field_document_publish_date[$document->language][0]['value']);
                            echo date("d/m/Y", $publish_date);
                        }
                        
                    ?>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>

        <div class="clearfix">&nbsp;</div>

        <p>
            <button class="btn btn-small btn-danger" type="button" id="delete-meeting-documents">Delete selected</button>
        </p>
    </div>

    <div class="tab-pane" id="add-more">
        <table class="table table-bordered table-striped table-hover dataTables" id="all-document-listing">
            <thead>
                <tr>
                    <th class="select-all-input">
                        <input type="checkbox" name="documents_elect_all" id="documents-select-all" />
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
                </tr>
            </thead>

            <tbody>
                <?php
                    $documents = node_load_multiple(array(), array('type' => 'document'));
                    foreach ($documents as $document_id => $document) {
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
                        if (isset($documnet->field_document_number) && (!empty($documnet->field_document_number))) {
                            echo $document->field_document_number[$document->language][0]['value'];
                        }
                    ?>
                    </td>

                    <td>
                    <?php
                        if (isset($document->field_document_publish_date) && (!empty($document->field_document_publish_date))) {
                            $publish_date = strtotime($document->field_document_publish_date[$document->language][0]['value']);
                            echo date("d/m/Y", $publish_date);
                        }
                        
                    ?>
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
            <button class="btn btn-small btn-primary" type="button" id="add-meeting-documents">Add selected</button>
        </p>
    </div>
</div>

<?php
    drupal_add_library('system', 'ui');
    $js_path = drupal_get_path('module', 'datatables') . '/dataTables/media/js/jquery.dataTables.min.js';
    $DT_js_path = drupal_get_path('module', 'datatables') . '/js/DT_bootstrap.js';
    $css_path = drupal_get_path('module', 'datatables') . '/dataTables/media/css/demo_table.css';
?>
<script type="text/javascript" src="/<?php echo $js_path; ?>"></script>
<script type="text/javascript" src="/<?php echo $DT_js_path; ?>"></script>
<link type="text/css" rel="stylesheet" href="/<?php echo $css_path; ?>" />
<?php
    drupal_add_js(drupal_get_path('theme', 'cms_theme') . '/js/meetings.js');
?>
