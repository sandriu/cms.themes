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
        'species' => $species,
        'meeting' => $meeting,
        'form_reset_url' => $form_reset_url,
        'sort' => $sort
    )
); ?>

<div class="btn-toolbar">
    <div class="btn-group">
        <a href="/<?php echo ADMINISTRATION_PATH; ?>contacts/add"
           class="btn"
           title="<?php echo t('Add new contact'); ?>">
            <?php echo t('Add contact'); ?>
        </a>
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
