<?php
    if (isset($user['lastmodifiedby']) && isset($user['lastmodifiedtime'])) {
?>
<p class="text-muted">
    <small><?php echo t('Last modified by'); ?> <strong class="text-warning"><?php echo $user['lastmodifiedby'][0]; ?></strong> on <strong class="text-warning"><?php echo date('dS M Y H:i:s', $user['lastmodifiedtime'][0]); ?></strong></small>
</p>
<?php
    }
?>

<?php
    render_simple_slot('action-buttons', 'contacts', $user);
    render_simple_slot('details', 'contacts', $user);
?>
