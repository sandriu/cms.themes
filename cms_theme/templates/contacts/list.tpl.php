<div class="accordion" id="accordion2">
    <div class="accordion-group">
        <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                <i class="icon icon-question-sign"></i> Help
            </a>
        </div>
        <div id="collapseOne" class="accordion-body collapse">
            <div class="accordion-inner">
                The form below works with the contact located on the LDAP server. LDAP is a central database management interface for all CMS family websites.
                <br />
                <strong>Important notes</strong>
                <ul>
                    <li>The field <em>"Per field operator"</em> applies only to <strong>CMS Instrument</strong>,
                        <strong>Region</strong>, <strong>Status person</strong> and <strong>Status organization</strong>
                    </li>
                    <li>
                        The <em>"Per field operator"</em> applies to multiple values inside a single field:
                        <ul>
                            <li><em>Is all of</em> - means that contact has to have <strong>ALL</strong> the values</li>
                            <li><em>Is one of</em> - means that contact has to have <strong>AT LEAST ONE</strong> value among filtered</li>
                        </ul>
                    </li>
                </ul>
                <p>
                    <strong>Technical note</strong><br />
                    Due to performance issues, the listing is caching the data for
                    <strong><?php echo CMS_CONTACTS_CACHE_LIFETIME / 60; ?></strong> minutes, so if others change a contact
                    this listing form would not pick them up.
                    <br />
                    You need to clear the cache to get the updates. However, the edit form is loading the latest data from
                    the server to ensure you are editing the newest data.
                </p>
            </div>
        </div>
    </div>
</div>

<?php
render_simple_slot('filters', 'contacts',
    array(
        'current_group' => $instrument,
        'countries' => $countries,
        'regions' => $regions,
        'operator' => $operator,
        'per_field_operator' => $per_field_operator,
        'instruments' => $instruments,
        'availability' => $availability,
        'person_status' => $person_status,
        'organization_status' => $organization_status,
        'species_options' => $species_options,
        'meeting_options' => $meeting_options,
        'region_options' => $region_options,
        'org_status_options' => $org_status_options,
        'person_status_options' => $person_status_options,
        // 'species' => $species,
        // 'meeting' => $meeting,
        'form_reset_url' => $form_reset_url,
        'sort' => $sort,
        'button_clear_filters' => array(
            '#theme' => 'link',
            '#text' => t('Clear filters'),
            '#path' => 'contacts/listing',
            '#options' => array(
                'html' => TRUE, 'attributes' => array('class' => 'btn', 'title' => 'Clear filters')
            ),
        )
    )
); ?>

<div class="btn-toolbar">
    <div class="btn-group">

        <?php echo render($button_add_contact); ?>
    </div>

    <div class="btn-group pull-right">
        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
            Export
            <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a href="javascript:void(0);" class="disabled" title="<?php echo t('Export results in Microsoft Excel format'); ?>" id="xls-export-button">
                    <i class="icon-download-alt"></i>
                    <?php echo t('Microsoft Excel'); ?>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="disabled" title="<?php echo t('Export results in CSV format'); ?>" id="export-button">
                    <i class="icon-download-alt"></i>
                    <?php echo t('CSV table'); ?>
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="span12">
        <table id="contacts-listing" class="cols-6 table table-striped table-hover table-bordered dataTable">
            <thead>
                <tr>
                    <th class="span1">#</th>
                    <th class="span2"><?php echo t('First name'); ?></th>
                    <th class="span2"><?php echo t('Last name'); ?></th>
                    <th class="span3"><?php echo t('Organization'); ?></th>
                    <th class="span2"><?php echo t('Country'); ?></th>
                    <th class="span1"><?php echo t('Country post'); ?></th>
                    <th class="span2"><?php echo t('Instruments'); ?></th>
                    <th class="span1"><?php echo t('Actions'); ?></th>
                </tr>
            </thead>
        </table>
    </div>
</div>
