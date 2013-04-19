<?php
    $expanded = FALSE;
    if (!empty($data['region']) || !empty($data['country']) || !empty($data['instrument']) ||
        !empty($data['mailing_list']) || !empty($data['availability']) || !empty($data['person_status']) ||
        !empty($data['meeting']) || !empty($data['organization_status'])) {
        $expanded = TRUE;
    }

    $current_profile = CMSUtils::get_current_profile();
?>

<div class="accordion" id="accordion2">
    <div class="accordion-group">
        <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                <i class="icon-filter"></i> Show/Hide filters
            </a>
        </div>

        <div id="collapseOne" class="accordion-body collapse in">
            <div class="accordion-inner">
                <form class="form-inline" id="contacts-instrument-filter" method="GET" action="/contacts/listing">
                    <div class="views-exposed-form well well-small">
                        <div class="views-exposed-widgets clearfix">
                            <input type="hidden" name="current-page" value="<?php echo $data['page']; ?>" id="current-page" />

                            <div id="edit-tid-wrapper" class="views-exposed-widget">
                                <label for="instrument">
                                    <?php echo t('CMS Instrument'); ?>
                                </label>

                                <div class="views-widget">
                                    <div class="control-group form-type-select">
                                        <div class="controls">
                                        <select name="instrument" id="instrument">
                                            <option value=""><?php echo t('Any'); ?></option>
                                            <?php
                                                foreach ($data['instruments'] as $instrument_key => $instrument) {
                                            ?>
                                            <option value="<?php echo $instrument_key; ?>" <?php echo (isset($data['current_group']) && ($data['current_group']  == $instrument_key)) ? 'selected="selected"' : ''; ?>>
                                                <?php echo $instrument; ?>
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
                                            <select name="region" id="region">
                                                <option value=""><?php echo t('Any'); ?></option>
                                                <?php
                                                    foreach ($data['region_options'] as $uuid => $region_name) {
                                                ?>
                                                <option value="<?php echo $uuid; ?>" <?php echo (isset($data['region']) && ($data['region']  == $uuid)) ? 'selected="selected"' : ''; ?>>
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
                                            <select name="country" id="country">
                                                <option value=""><?php echo t('Any'); ?></option>
                                                <?php
                                                    $countries = countries_get_countries();
                                                    foreach ($countries as $iso2 => $country) {
                                                ?>
                                                <option value="<?php echo $iso2; ?>" <?php echo (isset($data['country']) && ($data['country']  == $iso2)) ? 'selected="selected"' : ''; ?>>
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
                                            <select name="mailing_list" id="mailing">
                                                <option value=""><?php echo t('Any'); ?></option>
                                                <?php
                                                    foreach ($data['mailing_options'] as $id => $list_name) {
                                                ?>
                                                <option value="<?php echo $id; ?>" <?php echo (isset($data['mailing_list']) && ($data['mailing_list']  == $id)) ? 'selected="selected"' : ''; ?>>
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
                                    <?php echo t('Person status'); ?>
                                </label>

                                <div class="views-widget">
                                    <div class="control-group form-type-select">
                                        <div class="controls">
                                            <select name="person_status" id="person_status">
                                                <option value=""><?php echo t('Any'); ?></option>
                                                <?php
                                                    foreach ($data['person_status_options'] as $id => $status) {
                                                ?>
                                                <option value="<?php echo $id; ?>" <?php echo (isset($data['person_status']) && ($data['person_status']  == $id)) ? 'selected="selected"' : ''; ?>>
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
                                    <?php echo t('Organization status'); ?>
                                </label>

                                <div class="views-widget">
                                    <div class="control-group form-type-select">
                                        <div class="controls">
                                            <select name="organization_status" id="organization_status">
                                                <option value=""><?php echo t('Any'); ?></option>
                                                <?php
                                                    foreach ($data['org_status_options'] as $id => $status) {
                                                ?>
                                                <option value="<?php echo $id; ?>" <?php echo (isset($data['organization_status']) && ($data['organization_status']  == $id)) ? 'selected="selected"' : ''; ?>>
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
                                            <select name="species" id="species">
                                                <option value=""><?php echo t('Any'); ?></option>
                                                <?php
                                                    foreach ($data['species_options'] as $uuid => $species_name) {
                                                ?>
                                                <option value="<?php echo $uuid; ?>" <?php echo (isset($data['species']) && ($data['species']  == $uuid)) ? 'selected="selected"' : ''; ?>>
                                                    <?php echo $species_name; ?>
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
                                    <?php echo t('Meeting (not implemented)'); ?>
                                </label>

                                <div class="views-widget">
                                    <div class="control-group form-type-select">
                                        <div class="controls">
                                            <select name="meeting" id="meeting">
                                                <option value=""><?php echo t('Any'); ?></option>
                                                <?php
                                                    $meetings = CMSMeeting::get_mapped_content(CMSMeeting::$bundle);
                                                    foreach ($meetings as $uuid => $meeting) {
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
