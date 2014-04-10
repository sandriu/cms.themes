<?php
    $expanded = FALSE;
    if (!empty($data['regions']) || !empty($data['countries']) || !empty($data['instrument']) ||
        !empty($data['availability']) || !empty($data['person_status']) ||
        !empty($data['meeting']) || !empty($data['organization_status'])) {
        $expanded = TRUE;
    }
    $current_profile = CMSUtils::get_current_profile();
?>

<div id="accordion" class="panel-group">
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
                <form class="form-inline" id="contacts-instrument-filter" method="GET" action="">
                    <?php if(!empty($data['sort'][0])) : ?>
                    <input type="hidden" id="iSortCol_0" name="iSortCol_0" value="<?php echo $data['sort'][0]['column']; ?>" />
                    <input type="hidden" id="sSortDir_0" name="sSortDir_0" value="<?php echo $data['sort'][0]['direction']; ?>" />
                    <?php endif; ?>
                    <div class="views-exposed-form">
                        <div class="views-exposed-widgets clearfix">
                            <div class="views-exposed-widget">
                                <label for="per_field_operator">
                                    <?php echo t('Per field operator'); ?>
                                </label>

                                <div class="views-widget">
                                    <div class="control-group form-type-select">
                                        <div class="controls">
                                            <select name="per_field_operator" id="per_field_operator">
                                                <option value="is_all_of" <?php echo ($data['per_field_operator'] == 'is_all_of') ? 'selected="selected"' : ''; ?>><?php echo t('Is all of'); ?></option>
                                                <option value="is_one_of" <?php echo ($data['per_field_operator'] == 'is_one_of') ? 'selected="selected"' : ''; ?>><?php echo t('Is one of'); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <div id="edit-tid-wrapper" class="views-exposed-widget">
                                <label for="instrument">
                                    <?php echo t('CMS Instrument'); ?>
                                </label>

                                <div class="views-widget">
                                    <div class="control-group form-type-select">
                                        <div class="controls">
                                        <select name="instrument[]" id="instrument" multiple="multiple">
                                            <option value=""><?php echo t('Any'); ?></option>
                                            <?php
                                                foreach ($data['instruments'] as $uuid => $name) {
                                            ?>
                                            <option value="<?php echo $uuid; ?>" <?php echo (isset($data['current_group']) && in_array($uuid, $data['current_group'])) ? 'selected="selected"' : ''; ?>>
                                                <?php echo $name; ?>
                                            </option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                                if ($current_profile != 'eurobats') {
                            ?>
                            <div class="views-exposed-widget">
                                <label for="region">
                                    <?php echo t('Region'); ?>
                                </label>

                                <div class="views-widget">
                                    <div class="control-group form-type-select">
                                        <div class="controls">
                                            <select name="region[]" id="region" multiple="multiple">
                                                <option value=""><?php echo t('Any'); ?></option>
                                                <?php
                                                    foreach ($data['region_options'] as $value => $region_name) {
                                                ?>
                                                <option value="<?php echo $value; ?>" <?php echo (isset($data['regions']) && in_array($value, $data['regions'])) ? 'selected="selected"' : ''; ?>>
                                                    <?php echo $region_name; ?>
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }else {
                            ?>
                            <input type="hidden" name="region" id="region" disabled="disabled" />
                            <?php
                                }
                            ?>

                            <div class="views-exposed-widget">
                                <label for="country">
                                    <?php echo t('Country'); ?>
                                </label>

                                <div class="views-widget">
                                    <div class="control-group form-type-select">
                                        <div class="controls">
                                            <select name="country[]" id="country" multiple="multiple">
                                                <option value=""><?php echo t('Any'); ?></option>
                                                <?php
                                                    $countries = countries_get_countries();
                                                    foreach ($countries as $iso2 => $country) {
                                                ?>
                                                <option value="<?php echo $iso2; ?>" <?php echo (isset($data['countries']) && in_array($iso2, $data['countries'])) ? 'selected="selected"' : ''; ?>>
                                                    <?php echo $country->name; ?>
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <div id="edit-tid-wrapper" class="views-exposed-widget">
                                <label for="availability">
                                    <?php echo t('Availability'); ?>
                                </label>

                                <div class="views-widget">
                                    <div class="control-group form-type-select">
                                        <div class="controls">
                                        <select name="availability" id="availability">
                                            <option value=""><?php echo t('Any'); ?></option>
                                            <option value="TRUE" <?php echo (isset($data['availability']) && ($data['availability'] == "TRUE")) ? 'selected="selected"' : ''; ?>><?php echo t('Available'); ?></option>
                                            <option value="FALSE" <?php echo (isset($data['availability']) && ($data['availability'] == "FALSE")) ? 'selected="selected"' : ''; ?>><?php echo t('Unavailable'); ?></option>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="views-exposed-widget">
                                <label for="person_status">
                                    <?php echo t('Status person'); ?>
                                </label>

                                <div class="views-widget">
                                    <div class="control-group form-type-select">
                                        <div class="controls">
                                            <select name="person_status[]" id="person_status" multiple="multiple">
                                                <option value=""><?php echo t('Any'); ?></option>
                                                <?php
                                                    foreach ($data['person_status_options'] as $id => $status) {
                                                ?>
                                                <option value="<?php echo $id; ?>" <?php echo (isset($data['person_status']) && in_array($id, $data['person_status'])) ? 'selected="selected"' : ''; ?>>
                                                    <?php echo $status; ?>
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="views-exposed-widget">
                                <label for="organization_status">
                                    <?php echo t('Status organization'); ?>
                                </label>

                                <div class="views-widget">
                                    <div class="control-group form-type-select">
                                        <div class="controls">
                                            <select name="organization_status[]" id="organization_status" multiple="multiple">
                                                <option value=""><?php echo t('Any'); ?></option>
                                                <?php
                                                    foreach ($data['org_status_options'] as $id => $status) {
                                                ?>
                                                <option value="<?php echo $id; ?>" <?php echo (isset($data['organization_status']) && in_array($id, $data['organization_status'])) ? 'selected="selected"' : ''; ?>>
                                                    <?php echo $status; ?>
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"></div>
                            <div class="btn-toolbar">
                                    <button class="btn btn-primary form-submit" name="" value="Search" type="submit">
                                        Search
                                    </button>
                                    <?php echo render($data['button_clear_filters']); ?>
                                    <button class="btn btn-danger form-submit pull-right" name="clear_cache"
                                            title="WARNING: Really slow! Bypass cache and refresh from LDAP server. Use it if you suspect data is stale (Data was edited from another website)"
                                            value="Search" type="submit">
                                        Clear cache
                                    </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- .panel-body -->
        </div><!-- #collapseFilters .panel-collapse .collapse .in -->
    </div><!-- .panel .panel-default -->
</div><!-- #accordion .panel-group -->
