<div id="accordion" class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseHelp">
          <i class="glyphicon glyphicon-question-sign"></i>
          <?php print t('Help'); ?>
        </a>
      </h4><!-- .panel-title -->
    </div><!-- .panel-heading -->
    <div id="collapseHelp" class="panel-collapse collapse">
      <div class="panel-body">
        <p>The form below works with the contact located on the LDAP server. LDAP is a central database management interface for all CMS family websites.</p>
        <p>
          <strong>Important notes</strong>
          <ul>
            <li>
              The field <em>&quot;Per field operator&quot;</em> applies only to <strong>CMS Instrument</strong>, <strong>Region</strong>, <strong>Status person</strong> and <strong>Status organization</strong>.
            </li>
            <li>
              The <em>&quot;Per field operator&quot;</em> applies to multiple values inside a single field:
              <ul>
                <li>
                  <em>Is all of</em> &ndash; means that contact has to have <strong>ALL</strong> the values.
                </li>
                <li>
                  <em>Is one of</em> &ndash; means that contact has to have <strong>AT LEAST ONE</strong> value among filtered.
                </li>
              </ul>
            </li>
          </ul>
        </p>
        <p>
          <strong>Technical note</strong>
          <br>
          Due to performance issues, the listing is caching the data for <strong><?php echo CMS_CONTACTS_CACHE_LIFETIME / 60; ?></strong> minutes, so if others change a contact this listing form would not pick them up.
          <br>
          You need to clear the cache to get the updates. However, the edit form is loading the latest data from the server to ensure you are editing the newest data.
        </p>
      </div><!-- .panel-body -->
    </div><!-- #collapseHelp .panel-collapse .collapse -->
  </div><!-- .panel .panel-default -->
  <?php
  render_simple_slot('filters', 'contacts', array(
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
    'form_reset_url' => $form_reset_url,
    'sort' => $sort,
    'button_clear_filters' => array(
      '#theme' => 'link',
      '#text' => t('Clear filters'),
      '#path' => 'contacts/listing',
      '#options' => array(
        'html' => TRUE,
        'attributes' => array(
          'class' => 'btn btn-default',
          'title' => t('Clear filters')
        )
      )
    )
  ));
  ?>
</div><!-- #accordion .panel-group -->
<div class="row">
  <div class="col-md-12">
    <div class="btn-toolbar">
      <div class="btn-group">
        <?php echo render($button_add_contact); ?>
      </div><!-- .btn-group -->
      <div class="btn-group pull-right">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
          <?php echo t('Export'); ?>
          <span class="caret"></span>
        </button><!-- .btn .btn-default .dropdown-toggle -->
        <ul class="dropdown-menu">
          <li class="disabled">
            <a href="#" title="<?php echo t('Export results in Microsoft Excel format'); ?>" id="xls-export-button">
              <i class="glyphicon glyphicon-download-alt"></i>
              <?php echo t('Microsoft Excel'); ?>
            </a>
          </li><!-- .disabled -->
          <li class="disabled">
            <a href="#" title="<?php echo t('Export results in CSV format'); ?>" id="export-button">
              <i class="glyphicon glyphicon-download-alt"></i>
              <?php echo t('CSV table'); ?>
            </a>
          </li><!-- .disabled -->
        </ul><!-- .dropdown-menu -->
      </div><!-- .btn-group .pull-right -->
    </div><!-- .btn-toolbar -->
  </div><!-- .col-md-12 -->
</div><!-- .row -->
<div class="row">
  <div class="col-md-12">
    <table id="contacts-listing" class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
          <th class="col-md-1">#</th>
          <th class="col-md-2"><?php echo t('First name'); ?></th>
          <th class="col-md-2"><?php echo t('Last name'); ?></th>
          <th class="col-md-3"><?php echo t('Organization'); ?></th>
          <th class="col-md-2"><?php echo t('Country'); ?></th>
          <th class="col-md-1"><?php echo t('Country post'); ?></th>
          <th class="col-md-2"><?php echo t('Instruments'); ?></th>
          <th class="col-md-1"><?php echo t('Actions'); ?></th>
        </tr>
      </thead>
    </table><!-- #contacts-listing .table .table-striped .table-bordered .table-hover -->
  </div><!-- .col-md-12 -->
</div><!-- .row -->
