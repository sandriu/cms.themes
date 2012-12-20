<div class="row">
    <div class="span6">
        <form class="form-inline">
            <label>
                <?php echo t('Display'); ?>
            </label>
            <input type="hidden" name="current-page" value="<?php echo $data['page']; ?>" id="current-page" />

            <select size="1" name="contacts-per-page" id="contacts-per-page">
                <?php
                    foreach ($data['per_page_options'] as $option) {
                ?>
                <option value="<?php echo $option?>"<?php echo (($data['per_page'] == $option)) ? ' selected="selected"' : ''; ?>><?php echo $option; ?></option>
                <?php
                    }
                ?>
            </select> <?php echo t('contacts'); ?>
        </form>
    </div>

    <?php
        if (!empty($data['instruments']) && (CMSUtils::get_current_profile() == 'cms')) {
    ?>
    <div class="span6">
        <form class="form-inline pull-right" id="contacts-instrument-filter">
            <label for="instrument">
                <?php echo t('CMS Instrument'); ?>
            </label>

            <select name="instrument" id="instrument">
                <?php
                    foreach ($data['instruments'] as $instrument) {
                        $instrument_key = CMSUtils::slug($instrument);
                ?>
                <option value="<?php echo $instrument_key; ?>" <?php echo (isset($_GET['instrument']) && ($_GET['instrument'] == $instrument_key)) ? 'selected="selected"' : ''; ?>>
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
