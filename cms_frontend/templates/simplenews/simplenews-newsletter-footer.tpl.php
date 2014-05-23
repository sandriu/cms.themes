<?php
/**
 * @file
 * Default theme implementation to format the simplenews newsletter footer.
 *
 * Copy this file in your theme directory to create a custom themed footer.
 * Rename it to simplenews-newsletter-footer--[tid].tpl.php to override it for a
 * newsletter using the newsletter term's id.
 *
 * @todo Update the available variables.
 * Available variables:
 * - $build: Array as expected by render()
 * - $build['#node']: The $node object
 * - $language: language code
 * - $key: email key [node|test]
 * - $format: newsletter format [plain|html]
 * - $unsubscribe_text: unsubscribe text
 * - $test_message: test message warning message
 * - $simplenews_theme: path to the configured simplenews theme
 *
 * Available tokens:
 * - [simplenews-subscriber:unsubscribe-url]: unsubscribe url to be used as link
 *
 * Other available tokens can be found on the node edit form when token.module
 * is installed.
 *
 * @see template_preprocess_simplenews_newsletter_footer()
 */
?>
  <?php
  $template_path = drupal_get_path('theme', 'cms_frontend');
  $template_url = url($template_path, array('absolute' => TRUE, 'language' => LANGUAGE_NONE));
  ?>
  <?php if (!$opt_out_hidden): ?>
    <tr style="background-color: #eee; font-size: 12px; color: #555; border-bottom: 1px solid #ddd;">
      <td colspan="3" style="padding-left: 20px; padding-right: 20px;">
        <p style="margin-bottom: 5px;">Thank you for your interest in our E-Newsletter.</p>
        <p style="margin-top: 0px;">For other related news, please also see: <a href="#" style="color: #0066c0;">All News</a>&nbsp;&nbsp;<a href="#" style="color: #0066c0;">Press releases</a>&nbsp;&nbsp;<a href="#" style="color: #0066c0;">Op eds</a>&nbsp;&nbsp;<a href="#" style="color: #0066c0;">Notifications</a>&nbsp;&nbsp;<a href="#" style="color: #0066c0;">Media Watch</a></p>
      </td>
    </tr>
    <tr style="background-color: #eee; font-size: 12px; color: #555; border-bottom: 1px solid #ddd;">
      <td colspan="3" style="padding-left: 20px; padding-right: 20px;">
        <p>Follow us on:&nbsp;&nbsp;<a href="#" style="display: inline-block; margin-right: 10px; vertical-align: middle;"><img src="<?php echo $template_url; ?>/images/facebook_logo_25x25.png" alt="Facebook" /></a> <a href="#" style="display: inline-block; margin-right: 10px; vertical-align: middle;"><img src="<?php echo $template_url; ?>/images/twitter_logo_25x25.png" alt="Twitter" /></a> <a href="#" style="display: inline-block; margin-right: 10px; vertical-align: middle;"><img src="<?php echo $template_url; ?>/images/rss_logo_25x25.png" alt="RSS" /></a></p>
      </td>
    </tr>
    <tr style="background-color: #eee; font-size: 11px; color: #555;">
      <td colspan="2" style="padding-left: 20px; line-height: 1.4;">
        <p>This newsletter is published by the CMS Secretariat &copy; 2014 UNEP / CMS<br />UNEP/CMS Secretariat, Platz der Vereinten Nationen 1, 53113 Bonn, Germany<br />Tel: (+49) 228 815 2413, Fax: (+49) 228 815 2450, E-mail: secretariat@cms.int<br /><a href="#" style="color: #0066c0;">www.cms.int</a></p>
      </td>
      <td style="width: 130px; text-align: right; vertical-align: bottom; padding-bottom: 11px; padding-right: 25px;">
        <a href="[simplenews-subscriber:unsubscribe-url]" style="color: #0066c0;"><?php print $unsubscribe_text ?></a>
      </td>
    </tr>
  <?php endif; ?>
  <?php if ($key == 'test'): ?>
    <tr style="background-color: #eee; font-size: 11px; color: #555;">
      <td colspan="3" style="padding-left: 20px; line-height: 1.4;">
        <p><?php print $test_message; ?></p>
      </td>
    </tr>
  <?php endif; ?>
</table>
