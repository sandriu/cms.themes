<?php
    if(check_display_field($content, 'field_species_status_per_country')) {
?>
    <table class="table table-condensed table-hover two-columns">
        <caption><?php echo t('Country status'); ?></caption>
        <tbody>
        <?php
        if (check_display_field($content, 'field_species_status_per_country')) {
            ?>
            <tr>
                <th><?php echo t('Countries'); ?></th>
                <td>
                    <?php
                    $num = count($node->ammap_data);
                    foreach ($node->ammap_data as $idx => $country) { ?>
                        <a href="/<?php echo $country['url']; ?>" target="_blank">
                            <?php echo $country['name'] . '('.$country['legend'].')';?>
                        </a>
                        <?php if (++$idx != $num) echo ', '; ?>
                    <?php } ?>
                </td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
    <?php
    echo drupal_ammap_render_map($node->ammap_data, array('legend'=> TRUE));
    ?>
<?php
    }
?>