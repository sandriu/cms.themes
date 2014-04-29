<?php
$expanded = FALSE;

if ( !empty($data['regions'])
  || !empty($data['countries'])
  || !empty($data['instrument'])
  || !empty($data['availability'])
  || !empty($data['person_status'])
  || !empty($data['meeting'])
  || !empty($data['organization_status'])) {
  $expanded = TRUE;
}

$current_profile = CMSUtils::get_current_profile();
?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h4 class="panel-title">
      <a data-toggle="collapse" data-parent="#accordion" href="#collapseFilters">
        <i class="glyphicon glyphicon-filter"></i>
        <?php print t('Show/Hide filters'); ?>
      </a>
    </h4><!-- .panel-title -->
  </div><!-- .panel-heading -->
  <div id="collapseFilters" class="panel-collapse collapse in">
    <div class="panel-body">
      <form id="contacts-instrument-filter" method="get">
        <?php if(!empty($data['sort'][0])) : ?>
          <input type="hidden" id="iSortCol_0" name="iSortCol_0" value="<?php echo $data['sort'][0]['column']; ?>">
          <input type="hidden" id="sSortDir_0" name="sSortDir_0" value="<?php echo $data['sort'][0]['direction']; ?>">
        <?php endif; ?>
        <div class="views-exposed-form">
          <div class="views-exposed-widgets">
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="per_field_operator">
                      <?php echo t('Per field operator'); ?>
                  </label>
                  <select id="per_field_operator" class="form-control" name="per_field_operator">
                    <option value="is_all_of" <?php echo ($data['per_field_operator'] == 'is_all_of') ? 'selected="selected"' : ''; ?>><?php echo t('Is all of'); ?></option>
                    <option value="is_one_of" <?php echo ($data['per_field_operator'] == 'is_one_of') ? 'selected="selected"' : ''; ?>><?php echo t('Is one of'); ?></option>
                  </select><!-- #per_field_operator .form-control -->
                </div><!-- .form-group -->
              </div><!-- .col-md-3 -->
              <div class="col-md-3">
                <div class="form-group">
                  <label for="instrument">
                    <?php echo t('CMS Instrument'); ?>
                  </label>
                  <select id="instrument" class="form-control" name="instrument[]" multiple="multiple">
                    <option value=""><?php echo t('Any'); ?></option>
                    <?php foreach ($data['instruments'] as $uuid => $name) : ?>
                      <option value="<?php echo $uuid; ?>" <?php echo (isset($data['current_group']) && in_array($uuid, $data['current_group'])) ? 'selected="selected"' : ''; ?>>
                        <?php echo $name; ?>
                      </option>
                    <?php endforeach; ?>
                  </select><!-- #instrument .form-control -->
                </div><!-- .form-group -->
              </div><!-- .col-md-3 -->
              <div class="col-md-3">
                <?php if ($current_profile != 'eurobats') : ?>
                  <label for="region">
                    <?php echo t('Region'); ?>
                  </label>
                  <select id="region" class="form-control" name="region[]" multiple="multiple">
                    <option value=""><?php echo t('Any'); ?></option>
                    <?php foreach ($data['region_options'] as $value => $region_name) : ?>
                      <option value="<?php echo $value; ?>" <?php echo (isset($data['regions']) && in_array($value, $data['regions'])) ? 'selected="selected"' : ''; ?>>
                        <?php echo $region_name; ?>
                      </option>
                    <?php endforeach; ?>
                  </select><!-- #region .form-control -->
                <?php endif; ?>
              </div><!-- .col-md-3 -->
              <div class="col-md-3">
                <label for="country">
                  <?php echo t('Country'); ?>
                </label>
                <select id="country" class="form-control" name="country[]" multiple="multiple">
                  <option value=""><?php echo t('Any'); ?></option>
                  <?php $countries = countries_get_countries(); ?>
                  <?php foreach ($countries as $iso2 => $country) : ?>
                    <option value="<?php echo $iso2; ?>" <?php echo (isset($data['countries']) && in_array($iso2, $data['countries'])) ? 'selected="selected"' : ''; ?>>
                      <?php echo $country->name; ?>
                    </option>
                  <?php endforeach; ?>
                </select><!-- #country .form-control -->
              </div><!-- .col-md-3 -->
            </div><!-- .row -->
            <div class="row">
              <div class="col-md-3 col-md-offset-3">
                <div class="form-group">
                  <label for="availability">
                    <?php echo t('Availability'); ?>
                  </label>
                  <select id="availability" class="form-control" name="availability">
                    <option value=""><?php echo t('Any'); ?></option>
                    <option value="TRUE" <?php echo (isset($data['availability']) && ($data['availability'] == "TRUE")) ? 'selected="selected"' : ''; ?>><?php echo t('Available'); ?></option>
                    <option value="FALSE" <?php echo (isset($data['availability']) && ($data['availability'] == "FALSE")) ? 'selected="selected"' : ''; ?>><?php echo t('Unavailable'); ?></option>
                  </select><!-- #availability .form-control -->
                </div><!-- .form-group -->
              </div><!-- .col-md-3 .col-md-offset-3 -->
              <div class="col-md-3">
                <div class="form-group">
                  <label for="person_status">
                    <?php echo t('Status person'); ?>
                  </label>
                  <select id="person_status" class="form-control" name="person_status[]" multiple="multiple">
                    <option value=""><?php echo t('Any'); ?></option>
                    <?php foreach ($data['person_status_options'] as $id => $status) : ?>
                      <option value="<?php echo $id; ?>" <?php echo (isset($data['person_status']) && in_array($id, $data['person_status'])) ? 'selected="selected"' : ''; ?>>
                        <?php echo $status; ?>
                      </option>
                    <?php endforeach; ?>
                  </select><!-- #person_status .form-control -->
                </div><!-- .form-group -->
              </div><!-- .col-md-3 -->
              <div class="col-md-3">
                <div class="form-group">
                  <label for="organization_status">
                    <?php echo t('Status organization'); ?>
                  </label>
                  <select id="organization_status" class="form-control" name="organization_status[]" multiple="multiple">
                    <option value=""><?php echo t('Any'); ?></option>
                    <?php foreach ($data['org_status_options'] as $id => $status) : ?>
                      <option value="<?php echo $id; ?>" <?php echo (isset($data['organization_status']) && in_array($id, $data['organization_status'])) ? 'selected="selected"' : ''; ?>>
                        <?php echo $status; ?>
                      </option>
                    <?php endforeach; ?>
                  </select><!-- #organization_status .form-control -->
                </div><!-- .form-group -->
              </div><!-- .col-md-3 -->
            </div><!-- .row -->
            <div class="row">
              <div class="col-md-12">
                <div class="btn-toolbar">
                  <div class="btn-group">
                    <button type="submit" class="btn btn-primary">Search</button>
                  </div><!-- .btn-group -->
                  <div class="btn-group">
                    <?php echo render($data['button_clear_filters']); ?>
                  </div><!-- .btn-group -->
                  <div class="btn-group pull-right">
                    <button type="submit" class="btn btn-danger" name="clear_cache" value="Search" title="<?php echo t('WARNING: Really slow! Bypass cache and refresh from LDAP server. Use it if you suspect data is stale (data was edited from another website).'); ?>">
                      Clear cache
                    </button><!-- .btn .btn-danger -->
                  </div><!-- .btn-group .pull-right -->
                </div><!-- .btn-toolbar -->
              </div><!-- .col-md-12 -->
            </div><!-- .row -->
          </div><!-- .views-exposed-widgets -->
        </div><!-- .views-exposed-form -->
      </form><!-- #contacts-instrument-filter -->
    </div><!-- .panel-body -->
  </div><!-- #collapseFilters .panel-collapse .collapse .in -->
</div><!-- .panel .panel-default -->
