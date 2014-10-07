<table border="0" cellpadding="0" cellspacing="0" width="600" style="background-color: #eeeeee;">
  <tbody>
    <tr style="font-size: 11px; color: #555555; font-family: Arial, sans-serif;">
      <td colspan="2" style="padding-top: 10px; padding-bottom: 10px; padding-left: 20px; padding-right: 20px; border-bottom: 1px solid #dddddd;">
        <p style="margin-bottom: 5px;"><?php echo t('Thank you for your interest in our E-Newsletter.'); ?></p>
        <p style="margin-top: 0px;"><?php echo t('For other related news, please also see:'); ?> <a href="<?php echo t('http://www.unep-aewa.org/en/news'); ?>" style="color: #0066c0;"><?php echo t('All News'); ?></a>&nbsp;&nbsp;<a href="<?php echo t('http://www.unep-aewa.org/en/news/press-releases'); ?>" style="color: #0066c0;"><?php echo t('Press releases'); ?></a>&nbsp;&nbsp;<a href="<?php echo t('http://www.unep-aewa.org/en/news/op-ed'); ?>" style="color: #0066c0;"><?php echo t('Op-ed'); ?></a>&nbsp;&nbsp;<a href="<?php echo t('http://www.unep-aewa.org/en/news/notifications'); ?>" style="color: #0066c0;"><?php echo t('Notifications'); ?></a>&nbsp;&nbsp;<a href="<?php echo t('http://www.unep-aewa.org/en/news/media-watch'); ?>" style="color: #0066c0;"><?php echo t('Media Watch'); ?></a></p>
      </td>
    </tr>
    <tr style="font-size: 11px; color: #555555; font-family: Arial, sans-serif;">
      <td colspan="2" style="padding-top: 10px; padding-bottom: 10px; padding-left: 20px; padding-right: 20px; border-bottom: 1px solid #dddddd;">
        <p><?php echo t('Follow us on:'); ?>&nbsp;&nbsp;<a href="<?php echo t('https://www.facebook.com/unep.aewa'); ?>" style="display: inline-block; margin-right: 10px; vertical-align: middle;"><img src="<?php echo $template_url; ?>/images/facebook_logo_25x25.png" alt="<?php echo t('Facebook'); ?>" width="25" height="25" /></a>  <a href="<?php echo t('http://www.unep-aewa.org/news/feed'); ?>" style="display: inline-block; margin-right: 10px; vertical-align: middle;"><img src="<?php echo $template_url; ?>/images/rss_logo_25x25.png" alt="<?php echo t('RSS'); ?>" width="25" height="25" /></a></p>
      </td>
    </tr>
    <tr style="font-size: 11px; color: #555555; font-family: Arial, sans-serif;">
      <td style="width: 470px; padding-top: 10px; padding-bottom: 10px; padding-left: 20px; padding-right: 20px; line-height: 1.4;">
        <p><?php echo t('This newsletter is published by the UNEP/AEWA Secretariat &copy; 2014'); ?><br /><?php echo t('UNEP/AEWA Secretariat, Platz der Vereinten Nationen 1, 53113 Bonn, Germany'); ?><br /><?php echo t('Tel. (+49 228) 815 2413, Fax. (+49 228) 815 2450, E-mail: <a href="mailto:aewa@unep.de">aewa@unep.de</a>'); ?><br /><a href="<?php echo t('http://www.unep-aewa.org/'); ?>" style="color: #0066c0;"><?php echo t('www.unep-aewa.org'); ?></a></p>
      </td>
      <td style="width: 130px; height: 100%; text-align: right; vertical-align: bottom; padding-bottom: 11px; padding-right: 25px;">
        <a href="[simplenews-subscriber:unsubscribe-url]" style="color: #0066c0;"><?php print t('Unsubscribe'); ?></a>
      </td>
    </tr>
    <?php if ($key == 'test'): ?>
      <tr style="font-size: 11px; color: #555555; font-family: Arial, sans-serif;">
        <td colspan="2" style="padding-top: 10px; padding-bottom: 10px; padding-left: 20px; padding-right: 20px; border-top: 1px solid #dddddd;">
          <p><?php print $test_message; ?></p>
        </td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>
