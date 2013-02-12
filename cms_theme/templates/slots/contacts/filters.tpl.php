<div class="row">
    <input type="hidden" name="current-page" value="<?php echo $data['page']; ?>" id="current-page" />

    <?php
        if (!empty($data['instruments'])) {
    ?>
    <div class="span12">
        <form class="form-inline pull-right" id="contacts-instrument-filter">
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
