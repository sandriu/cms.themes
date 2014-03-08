<div class="container">
    <div class="row">
        <div class="news-profile-left profile col-md-8">
            <?php echo render($content['body']); ?> 
            <?php echo render($content['field_featured_image']); ?> 
            <span class="text-muted">
                <?php if (!$teaser) print 'Last updated on'; ?> <?php print format_date($node->changed, 'custom', 'd F Y'); ?>
            </span>      
        </div>

        <div class="news-profile-right profile well col-md-4">
            <?php
            render_slot($node, 'details', 'news', $content);
            ?>
        </div>
    </div> 
</div>