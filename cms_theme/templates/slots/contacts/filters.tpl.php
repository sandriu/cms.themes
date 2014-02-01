<?php
    $expanded = FALSE;
    if (!empty($data['regions']) || !empty($data['countries']) || !empty($data['instrument']) ||
        !empty($data['mailing_list']) || !empty($data['availability']) || !empty($data['person_status']) ||
        !empty($data['meeting']) || !empty($data['organization_status'])) {
        $expanded = TRUE;
    }

    $current_profile = CMSUtils::get_current_profile();
?>

<div class="accordion" id="contacts-filters">
    <div class="accordion-group">
        <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#contacts-filters" href="#contacts-filters-holder" id="contacts-filters-toggle">
                <i class="icon-filter"></i> Show/Hide filters
            </a>
        </div>

        <div id="contacts-filters-holder" class="accordion-body collapse in">
            <div class="accordion-inner">
                <form class="form-inline" id="contacts-instrument-filter" method="GET" action="/<?php echo ADMINISTRATION_PATH; ?>contacts/listing">
                    <div class="views-exposed-form well well-small">
                        <div class="views-exposed-widgets clearfix">
                            <div class="views-exposed-widget">
                                <label for="operator">
                                    <?php echo t('Operator'); ?>
                                </label>

                                <div class="views-widget">
                                    <div class="control-group form-type-select">
                                        <div class="controls">
                                            <select name="operator" id="operator">
                                                <option value="is_all_of" <?php echo ($data['operator'] == 'is_all_of') ? 'selected="selected"' : ''; ?>><?php echo t('Is all of'); ?></option>
                                                <option value="is_one_of" <?php echo ($data['operator'] == 'is_one_of') ? 'selected="selected"' : ''; ?>><?php echo t('Is one of'); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

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

                            <input type="hidden" name="current-page" value="<?php echo $data['page']; ?>" id="current-page" />

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

                            <?php
                                if ($current_profile != 'eurobats') {
                            ?>
                            <div class="views-exposed-widget">
                                <label for="mailing">
                                    <?php echo t('Mailing list'); ?>
                                </label>

                                <div class="views-widget">
                                    <div class="control-group form-type-select">
                                        <div class="controls">
                                            <select name="mailing_list[]" id="mailing" multiple="multiple">
                                                <option value=""><?php echo t('Any'); ?></option>
                                                <?php
                                                    foreach ($data['mailing_options'] as $id => $list_name) {
                                                ?>
                                                <option value="<?php echo $id; ?>" <?php echo (isset($data['mailing_list']) && in_array($id, $data['mailing_list'])) ? 'selected="selected"' : ''; ?>>
                                                    <?php echo $list_name; ?>
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
                            <input type="hidden" name="mailing_list" id="mailing" value="" disabled="disabled" />
                            <?php
                                }
                            ?>

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

                            <div class="views-exposed-widget">
                                <label for="species">
                                    <?php echo t('Species'); ?>
                                </label>

                                <div class="views-widget">
                                    <div class="control-group form-type-select">
                                        <div class="controls">
                                            <select name="species[]" id="species" multiple="multiple">
                                                <option value=""><?php echo t('Any'); ?></option>
                                                <?php
                                                    foreach ($data['species_options'] as $uuid => $species) {
                                                ?>
                                                <option value="<?php echo $uuid; ?>" <?php echo (isset($data['species']) && ($data['species']  == $uuid)) ? 'selected="selected"' : ''; ?>>
                                                    <?php echo $species->title_with_website; ?>
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

                            <div class="views-exposed-widget">
                                <label for="meeting" class="text-error">
                                    <?php echo t('Meeting (Not yet implemented)'); ?>
                                </label>

                                <div class="views-widget">
                                    <div class="control-group form-type-select">
                                        <div class="controls">
                                            <select name="meeting[]" id="meeting" multiple="multiple">
                                                <option value=""><?php echo t('Any'); ?></option>
                                                <?php
                                                    foreach ($data['meeting_options'] as $uuid => $meeting) {
                                                ?>
                                                <option value="<?php echo $uuid; ?>" <?php echo (isset($data['meeting']) && ($data['meeting']  == $uuid)) ? 'selected="selected"' : ''; ?>>
                                                    <?php echo $meeting; ?>
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

                            <div class="views-exposed-widget views-submit-button">
                                <button class="btn btn-primary form-submit" name="" value="Search" type="submit">Search</button>
                            </div>

                            <div class="views-exposed-widget views-reset-button">
                                <a class="reset-link" id="edit-reset" name="op" onclick="jQuery('#contacts-instrument-filter').resetForm();">Clear filters</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
