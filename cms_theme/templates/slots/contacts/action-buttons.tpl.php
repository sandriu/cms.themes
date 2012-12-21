<?php
    global $user;

    $current_profile = CMSUtils::get_current_profile();
    if ((($current_profile == $data['instrument']) || ($current_profile == 'cms')) && (user_access('administer contacts content', $user))) {
?>
<div class="row">
    <div class="span12">
        <div class="btn-toolbar">
            <a href="/contacts/item/<?php echo $data['uid'][0]; ?>/<?php echo $data['instrument']; ?>/edit" class="btn btn-primary">
                <?php
                    echo t('Edit');
                ?>
            </a>

            <a href="/contacts/item/<?php echo $data['uid'][0]; ?>/<?php echo $data['instrument']; ?>/delete" class="btn btn-danger">
                <?php
                    echo t('Delete');
                ?>
            </a>
        </div>
    </div>
</div>
<?php
    }
?>