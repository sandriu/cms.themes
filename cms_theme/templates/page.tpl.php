<?php
    if (variable_get("state") != 'production') {
?>
<div id="demo-badge" class="alert alert-error">
    <p>
        <strong>
            DEMO
        </strong>
    </p>
</div>
<?php
    }
?>

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
                <span><?php print $site_name; ?></span>
            </a>
            <div class="nav-collapse pull-right">
            <?php if($primary_nav && !user_is_anonymous()): ?>
                <?php print $primary_nav; ?>
            <?php endif; ?>
            <?php if($secondary_nav && !user_is_anonymous()): ?>
                <?php print $secondary_nav; ?>
            <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <?php
        if ($breadcrumb) {
            print $breadcrumb;
        }
    ?>
    <div class="row">
        <div class="span12">
            <?php if ($title): ?>
            <h1>
                <?php print $title; ?>
            </h1>
            <?php endif; ?>

            <?php print $messages; ?>

            <?php
            $match = FALSE;
            $types = get_cms_types();
            if (arg(0) == 'node' && is_numeric(arg(1))) {
                $nid = arg(1);
                $node = node_load($nid);
                $type = $node->type;
                if (in_array($type, $types)) {
                    $match = TRUE;
                }
            }elseif (in_array(arg(1), $types)) {
                $match = TRUE;
            }

            if ($tabs and !$match) {
                print render($tabs);
            }
            ?>

            <?php if ($page['help']): ?> 
            <div class="well">
                <?php print render($page['help']); ?>
            </div>
            <?php endif; ?>

            <?php if ($action_links and !$match): ?>
                <div class="subnav">
                    <ul class="nav nav-pills action-links"><?php print render($action_links); ?></ul>
                </div>
            <?php endif; ?>

            <?php print render($page['submenu']); ?>

            <?php print render($page['content']); ?>
            <div class="clearfix">&nbsp;</div>
            <?php
                if (show_add_button() && arg(1) == 'listing') {
            ?>
            <a class="btn btn-primary" href="/node/add/<?php echo arg(0); ?>">
            Add <?php echo arg(0); ?>
            </a>
            <?php
                }
            ?>
            <?php
                //if (show_add_button() && !empty($action_links)) {
            ?>
                    <!--<a class="btn btn-primary" href="/<?php #echo $action_links[0]['#link']['href']; ?>">-->
                        <?php
                        //echo t($action_links[0]['#link']['title']);
                        ?>
                    <!--</a>-->
            <?php
                //}
            ?>

        </div>
    </div>

    <footer class="footer">
        <div class="row">
        <?php
            if(array_key_exists('system_powered-by', $page['footer'])) {
                unset($page['footer']['system_powered-by']);
            }
        ?>
        <?php print render($page['footer']); ?>
        </div>
    </footer>
</div><!-- /div.container -->
