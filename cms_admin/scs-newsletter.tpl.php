<?php
/**
 * This template is used to assemble all nodes selected during newsletter
 * creation with Simplenews Content Selection.
 *
 * The following variables are available:
 *    - $toc Table of content, if it exists, as generated by the function
 *    theme_scs_toc() or your own.
 *    - $nodes Array of built selected nodes, ready to be outputed with the
 *    render() function.
 */
?>
<table style="width: 600px; border: 0px; font-family: Lato, Arial, sans-serif; border-collapse: collapse; margin: auto; @font-face { font-family: 'Lato'; font-style: normal; font-weight: 400; src: local('Lato Regular'), local('Lato-Regular'), url(http://themes.googleusercontent.com/static/fonts/lato/v7/9k-RPmcnxYEPm8CNFsH2gg.woff) format('woff'); }">
  <tr style="background-color: #003870;">
    <td colspan="3" style="width: 100%; height: 100%; padding: 0;">
      <img src="http://lorempixel.com/600/300/animals/" alt="<?php echo t('CMS montly banner'); ?>" width="600">
    </td>
  </tr>
  <?php if ($toc): ?>
    <tr style="background-color: #d6dfe8;">
      <td colspan="3" style="border-top: 1px solid #003870; padding-right: 25px; padding-top: 15px; padding-bottom: 15px;">
        <?php echo $toc; ?>
      </td>
    </tr>
  <?php endif; ?>
  <tr>
    <td colspan="3">
      <?php foreach ($nodes as $node): ?>
        <?php if ($node['#bundle'] == 'newsletter_news_category'): ?>
          <h2 style="background-color: #003870; color: #FFF; font-size: 14px; padding: 6px 10px; border-top-left-radius: 12px; border-top-right-radius: 12px; margin-top: 30px;"><?php echo $node['#node']->title; ?></h2>
        <?php else: ?>
          <table id="node-<?php echo $node['body']['#object']->nid; ?>" width="100%" style="margin-top: 20px; width: 100%;">
            <tr>
              <td style="vertical-align: top;">
                <a href="<?php echo url('node/' . $node['body']['#object']->nid, array('absolute' => TRUE)); ?>">
                  <img src="<?php echo file_create_url($node['field_featured_image']['#items'][0]['uri']); ?>" alt="<?php echo $node['field_featured_image']['#items'][0]['alt']; ?>" style="width: 220px;" />
                </a>
              </td>
              <td style="vertical-align: top; padding-right: 20px; padding-left: 10px;">
                <h3 style="margin-top: 0; color: #5E9732; font-size: 16px; margin-bottom: 16px; line-height: 1.3;"><?php echo $node['body']['#object']->title; ?></h3>
                <span style="font-size: 13px; color: #555;"><?php echo $node['body']['#items'][0]['summary']; ?></span>
              </td>
            </tr>
            <tr>
              <td colspan="2" style="text-align: right;">
                <a href="<?php echo url('node/' . $node['body']['#object']->nid, array('absolute' => TRUE)); ?>" style="background-color: #ccd7e2; font-size: 11px; text-decoration: none; color: #555; padding: 3px 7px; margin-right: 20px; border-radius: 4px;"><?php echo t('Read more'); ?></a>
              </td>
            </tr>
          </table>
        <?php endif; ?>
      <?php endforeach; ?>
    </td>
  </tr>
</table>
