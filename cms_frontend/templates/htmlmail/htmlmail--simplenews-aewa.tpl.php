<table border="0" cellpadding="0" cellspacing="0" width="600">
  <tbody>
    <?php if ($key == 'node' || $key == 'test'): ?>
      <tr>
        <td style="width: 183px; font-size: 11px; vertical-align: top; padding-top: 5px; padding-left: 5px; font-family: Arial, sans-serif;">
          <a href="<?php echo url('node/' . $params['simplenews_source']->getNode()->nid, array('absolute' => TRUE)); ?>" style="color: #0066c0;"><?php echo t('View this e-mail in your browser.'); ?></a>
        </td>
        <td style="width: 408px; height: 70px; vertical-align: top;">
          <img src="<?php echo $template_url; ?>/images/header_wave_aewa_with_logos.png" alt="<?php echo t('CMS header'); ?>" style="text-align: right;" />
        </td>
      </tr>
    <?php endif; ?>
    <?php echo $body; ?>
