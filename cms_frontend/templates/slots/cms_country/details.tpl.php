<p class="text-center">
    <img src="/sites/all/images/<?php echo strtoupper($node->field_country_iso2[$node->language][0]['value']); ?>.gif"
         alt="<?php echo $node->title; ?>"/>
</p>
<table class="table table-condensed table-hover two-columns">
    <tbody>
        <?php echo render($content['field_country_official_name']); ?>
        <?php echo render($content['field_country_party_number']); ?>
        <?php echo render($content['field_country_region']); ?>
        <?php echo render($content['field_country_entry_into_force']); ?>
        <?php echo render($content['field_country_entry_into_force']); ?>
        <?php echo render($content['national_focal_points']); ?>
    </tbody>
</table>
