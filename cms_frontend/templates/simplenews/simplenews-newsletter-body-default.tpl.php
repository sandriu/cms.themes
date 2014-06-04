    <tr>
      <td colspan="2" style="padding-bottom: 10px;">
        <table width="100%">
          <tbody>
            <tr>
              <td style="padding-left: 20px; vertical-align: bottom;">
                <img src="<?php echo $template_url; ?>/images/CMS_logo.png" alt="<?php echo t('CMS logo'); ?>" />
              </td>
              <td style="font-size: 21px; color: #003870; font-family: Arial, sans-serif; vertical-align: bottom;"><?php print $title; ?></td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>
<?php print render($build); ?>
