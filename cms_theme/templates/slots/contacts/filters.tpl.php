<div class="row">
    <input type="hidden" name="current-page" value="<?php echo $data['page']; ?>" id="current-page" />

    <?php
        if (!empty($data['instruments'])) {
    ?>
    <div class="span12">
        <form class="form-inline" id="contacts-instrument-filter">
            <label for="instrument">
                <?php echo t('Country'); ?>
            </label>

            <select name="country" id="country">
                <option value=""><?php echo t('- None -'); ?></option>
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

            &nbsp;
            &middot;
            &nbsp;

            <label for="instrument">
                <?php echo t('CMS Instrument'); ?>
            </label>

            <select name="instrument" id="instrument">
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
        </form>
    </div>

    <?php
        }
    ?>
</div>
