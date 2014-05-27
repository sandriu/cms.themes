<?php

/**
 * @file
 * Sample template for sending Simplenews messages with HTML Mail.
 *
 * The following variables are available in this template:
 *
 *  - $message_id: The email message id, or "simplenews_$key"
 *  - $module: The sending module, which is 'simplenews'.
 *  - $key: The simplenews action, which may be any of the following:
 *    - node: Send a newsletter to its subscribers.
 *    - subscribe: New subscriber confirmation message.
 *    - test: Send a test newsletter to the test address.
 *    - unsubscribe: Unsubscribe confirmation message.
 *  - $headers: An array of email (name => value) pairs.
 *  - $from: The configured sender address.
 *  - $to: The recipient subscriber email address.
 *  - $subject: The message subject line.
 *  - $body: The formatted message body.
 *  - $language: The language object for this message.
 *  - $params: An array containing the following keys:
 *    - context:  An array containing the following keys:
 *      - account: The recipient subscriber account object, which contains
 *        the following useful properties:
 *        - snid: The simplenews subscriber id, or NULL for test messages.
 *        - name: The subscriber username, or NULL.
 *        - activated: The date this subscription became active, or NULL.
 *        - uid: The subscriber user id, or NULL.
 *        - mail: The subscriber email address; same as $message['to'].
 *        - language: The subscriber language code.
 *        - tids: An array of taxonomy term ids.
 *        - newsletter_subscription: An array of subscription ids.
 *      - node: The simplenews newsletter node object, which contains the
 *        following useful properties:
 *        - changed: The node last-modified date, as a unix timestamp.
 *        - created: The node creation date, as a unix timestamp.
 *        - name: The username of the node publisher.
 *        - nid: The node id.
 *        - title: The node title.
 *        - uid: The user ID of the node publisher.
 *      - newsletter: The simplenews newsletter object, which contains the
 *        following useful properties:
 *        - nid: The node ID of the newsletter node.
 *        - name: The short name of the newsletter.
 *        - description: The long name or description of the newsletter.
 *  - $template_path: The relative path to the template directory.
 *  - $template_url: The absolute url to the template directory.
 *  - $theme: The name of the selected Email theme.
 *  - $theme_path: The relative path to the Email theme directory.
 *  - $theme_url: The absolute url to the Email theme directory.
 */
?>
<?php
$template_path = drupal_get_path('theme', 'cms_frontend');
$template_url = url($template_path, array('absolute' => TRUE, 'language' => LANGUAGE_NONE));
?>
<table border="0" width="600" height="100%" style="font-family: Lato, Arial, sans-serif; border-collapse: collapse; margin: auto; @font-face { font-family: 'Lato'; font-style: normal; font-weight: 400; src: local('Lato Regular'), local('Lato-Regular'), url(http://themes.googleusercontent.com/static/fonts/lato/v7/9k-RPmcnxYEPm8CNFsH2gg.woff) format('woff');}">
  <?php if ($key == 'node' || $key == 'test'): ?>
    <tr>
      <td style="width: 183px; font-size: 11px; vertical-align: top; padding-top: 5px; padding-left: 5px;">
        <a href="<?php echo url('node/' . $params['simplenews_source']->getNode()->nid, array('absolute' => TRUE)); ?>" style="color: #0066c0;">View this e-mail in your browser.</a>
      </td>
      <td colspan="2" style="width: 408px; height: 70px; vertical-align: top;">
        <img src="<?php echo $template_url; ?>/images/header_wave_cms.png" alt="CMS header" />
        <table style="margin-left: 325px; margin-right: 10px; margin-top: -65px;">
          <tr>
            <td>
              <a href="http://www.unep.org/"><img src="<?php echo $template_url; ?>/images/UNEP_white_logo_32x34.png" alt="UNEP logo" /></a>
            </td>
            <td>
              <a href="http://www.cms.int/"><img src="<?php echo $template_url; ?>/images/CMS_white_logo_32x34.png" alt="CMS logo" /></a>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  <?php endif; ?>
  <?php echo $body; ?>
