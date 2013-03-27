<form class="form-inline" id="contacts-instrument-filter" method="GET" action="/contacts/organizations/listing">
    <div class="views-exposed-form well well-small">
        <div class="views-exposed-widgets clearfix">
            <input type="hidden" name="current-page" value="<?php echo $data['page']; ?>" id="current-page" />

            <?php
                if (!empty($data['instruments'])) {
            ?>
            <div class="views-exposed-widget">
                <label for="instrument">
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
                }
            ?>
            <div class="views-exposed-widget views-submit-button">
                <button class="btn btn-primary form-submit" name="" value="Search" type="submit">Search</button>
            </div>

            <div class="views-exposed-widget views-reset-button">
                <a class="reset-link" id="edit-reset" name="op" onclick="jQuery('#contacts-instrument-filter').resetForm();">Clear filters</a>
            </div>
        </div>
    </div>
</form>

