<?php if (!empty($node->related_data['national_reports']['count'])) { ?>

<h3><?php echo t('National Reports'); ?></h3>
<?php
    echo views_embed_view($node->related_data['national_reports']['view_name'],
        $node->related_data['national_reports']['view_display'], $node->nid);
?>

<?php } ?>