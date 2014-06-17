    <?php
    $languages = language_list();
    $langcodes = $build['body']['#object']->translations->data;

    unset($langcodes[language_default()->language]);
    ?>
    <tr>
      <td colspan="2" style="padding-bottom: 10px;">
        <table width="100%">
          <tbody>
            <tr>
              <td style="padding-left: 20px; vertical-align: bottom;">
                <img src="<?php echo $template_url; ?>/images/ascobans_logo.png" alt="<?php echo t('ASCOBANS logo'); ?>" />
              </td>
              <td style="font-size: 21px; color: #585858; font-family: Arial, sans-serif; vertical-align: bottom;"><?php print $title; ?></td>
            </tr>
            <tr>
              <td colspan="2" style="text-align: right;">
                <?php foreach (array_keys($langcodes) as $langcode): ?> <a href="<?php echo url('node/' . $build['body']['#object']->nid, array('absolute' => TRUE, 'language' => $languages[$langcode])); ?>" style="color: #0066c0;"><?php echo $languages[$langcode]->name ?></a><?php endforeach; ?>
              </td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>
<?php print render($build); ?>
