<?php

/**
 * @file
 * Default theme implementation to format the simplenews newsletter body.
 *
 * Copy this file in your theme directory to create a custom themed body.
 * Rename it to override it. Available templates:
 *   simplenews-newsletter-body--[tid].tpl.php
 *   simplenews-newsletter-body--[view mode].tpl.php
 *   simplenews-newsletter-body--[tid]--[view mode].tpl.php
 * See README.txt for more details.
 *
 * Available variables:
 * - $build: Array as expected by render()
 * - $build['#node']: The $node object
 * - $title: Node title
 * - $language: Language code
 * - $view_mode: Active view mode
 * - $simplenews_theme: Contains the path to the configured mail theme.
 * - $simplenews_subscriber: The subscriber for which the newsletter is built.
 *   Note that depending on the used caching strategy, the generated body might
 *   be used for multiple subscribers. If you created personalized newsletters
 *   and can't use tokens for that, make sure to disable caching or write a
 *   custom caching strategy implemention.
 *
 * @see template_preprocess_simplenews_newsletter_body()
 */
?>
<?php
$current_path = realpath(NULL);
$current_len = strlen($current_path);
$template_path = realpath(dirname(__FILE__));

if (!strncmp($template_path, $current_path, $current_len)) {
  $template_path = substr($template_path, $current_len + 1);
}

$template_url = url($template_path, array('absolute' => TRUE));
?>
<tr>
  <td colspan="3">
    <img src="<?php echo $template_url; ?>/images/CMS_logo.png" alt="CMS logo" style="margin-left: 20px;" />
    <h1 style="display: inline-block; margin-left: 20px; margin-top: 43px; font-size: 21px; color: #003870; margin-bottom: 5px;"><?php print $title; ?></h1>
  </td>
</tr>
<?php print render($build); ?>
