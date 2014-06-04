<table border="0" cellpadding="0" cellspacing="0" width="600" style="margin-bottom: 20px;">
  <tbody>
    <tr>
      <td>
        <table align="left" width="600" border="0" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td valign="top" style="padding-right: 0px; padding-left: 0px; padding-top: 0px; padding-bottom: 0px; background-color: #47c7e9;">
                <img alt="<?php echo t('CMS montly banner'); ?>" src="http://lorempixel.com/600/300/animals/" width="600" />
              </td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
    <?php if ($toc): ?>
      <tr>
        <td>
          <table align="left" width="600" border="0" cellpadding="0" cellspacing="0">
            <tbody>
              <tr>
                <td style="background-color: #d6dfe8; border-top: 2px solid #47c7e9; padding-right: 25px; padding-left: 20px; padding-top: 15px; padding-bottom: 15px; font-family: Arial, sans-serif;">
                  <?php echo $toc; ?>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    <?php endif; ?>
    <tr>
      <td>
        <table align="left" width="600" border="0" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td style="font-family: Arial, sans-serif; padding-top: 20px;">
                <?php foreach ($nodes as $node): ?>
                  <?php if ($node['#bundle'] == 'newsletter_news_category'): ?>
                    <table width="100%" style="margin-top: 10px;">
                      <tbody>
                        <tr>
                          <td style="background-color: #fbaf38; color: #ffffff; font-size: 14px; padding-top: 6px; padding-bottom: 6px; padding-left:10px; padding-right: 10px; border-top-left-radius: 12px; border-top-right-radius: 12px;">&nbsp;&nbsp;<?php echo $node['#node']->title; ?></td>
                        </tr>
                      </tbody>
                    </table>
                  <?php else: ?>
                    <table id="node-<?php echo $node['body']['#object']->nid; ?>" style="margin-top: 20px; width: 100%;">
                      <tbody>
                        <tr>
                          <td valign="top">
                            <table align="left" width="220" border="0" cellpadding="0" cellspacing="0">
                              <tbody>
                                <tr>
                                  <td valign="top">
                                    <a href="<?php echo url('node/' . $node['body']['#object']->nid, array('absolute' => TRUE)); ?>">
                                      <img width="220" alt="<?php echo $node['field_featured_image']['#items'][0]['alt']; ?>" src="<?php echo file_create_url($node['field_featured_image']['#items'][0]['uri']); ?>" />
                                    </a>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                          <td valign="top">
                            <table align="right" width="370" border="0" cellpadding="0" cellspacing="0">
                              <tbody>
                                <tr>
                                  <td valign="top" style="padding-left: 15px; padding-right: 15px;">
                                    <h3 style="margin-top: 0; color: #47c7e9; font-size: 16px; margin-bottom: 16px; line-height: 1.3;"><?php echo $node['body']['#object']->title; ?></h3>
                                    <span style="font-size: 13px; color: #555555;"><?php echo $node['body']['#items'][0]['summary']; ?></span>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="2" style="padding-right: 15px; padding-top: 15px; text-align: right;">
                            <table border="0" cellspacing="0" cellpadding="0" align="right">
                              <tbody>
                                <tr>
                                  <td bgcolor="#ffdcaa" style="padding: 5px 10px 5px 10px; -webkit-border-radius:3px; border-radius:3px" align="center">
                                    <a href="<?php echo url('node/' . $node['body']['#object']->nid, array('absolute' => TRUE)); ?>" style="font-size: 11px; font-family: Arial, sans-serif; font-weight: normal; color: #555555; text-decoration: none;"><?php echo t('Read more'); ?></a>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  <?php endif; ?>
                <?php endforeach; ?>
              </td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>
