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

<?php
$scheme = theme_get_setting('scheme');

if (empty($sceheme)) {
  $scheme = 'default';
}

include 'scs-newsletter-' . $scheme . '.tpl.php';
