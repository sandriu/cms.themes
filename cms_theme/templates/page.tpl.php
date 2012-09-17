<?php
// var_dump(variable_get('site_name', 'drupal'));
// var_dump($site_name);
?>
<div class="container">
	<header id="navbar" role="banner">
		<div class="row">
			<div class="span2 logo">
				<?php if ($logo): ?>
				<a class="brand" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
                                    <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
                                </a>
				<?php endif; ?>
			</a>
			</div>
			
			<div class="span10">
				<ul class="nav-pills">
					<?php if ($primary_nav): ?>
						<?php print $primary_nav; ?>
					<?php endif; ?>
				</ul>
				<nav role="navigation">
				<?php if ($secondary_nav): ?>
					<?php print $secondary_nav; ?>
				<?php endif; ?>
				</nav>
				<?php if ($site_name || $site_slogan): ?>
					<hgroup id="site-name-slogan">
					<?php if ($site_name): ?>
						<?php print $site_name; ?>
					<?php endif; ?>
					</hgroup>
				<?php endif; ?>
			</div>
		</div>
	</header>

	<div class="row">
		<div class="span3">
			<?php if ($page['sidebar_first']): ?>
			 <aside class="span3" role="complementary">
				<?php print render($page['sidebar_first']); ?>
			 </aside>  <!-- /#sidebar-first -->
			<?php endif; ?>  
		</div>
                <div class="span9">
                    <section class="<?php print _twitter_bootstrap_content_span($columns); ?>">  
                            <?php if ($page['highlighted']): ?>
                                    <div class="highlighted hero-unit"><?php print render($page['highlighted']); ?></div>
                            <?php endif; ?>
                            <?php if ($breadcrumb): print $breadcrumb; endif;?>
                            <a id="main-content"></a>
                            <?php print render($title_prefix); ?>
                            <?php if ($title): ?>
                                    <h1 class="page-header"><?php print $title; ?></h1>
                                    <?php endif; ?>
                            <?php print render($title_suffix); ?>
                            <?php print $messages; ?>
                            <?php if ($tabs): ?>
                                    <?php print render($tabs); ?>
                            <?php endif; ?>
                            <?php if ($page['help']): ?> 
                                    <div class="well"><?php print render($page['help']); ?></div>
                            <?php endif; ?>
                            <?php if ($action_links): ?>
                                <div class="subnav">
                                    <ul class="nav nav-pills action-links"><?php print render($action_links); ?></ul>
                                </div>

                            <?php endif; ?>
                            <?php print render($page['submenu']); ?>

                            <div class="row">
                                <?php
                                    if (!empty($page['promo'])) {
                                ?>
                                <div class="span6">
                                <?php print render($page['content']); ?>
                                </div>
                                <div class="span3">
                                <?php print render($page['promo']); ?>
                                </div>
                                <?php
                                    }else {
                                ?>
                                <div class="span9">
                                <?php print render($page['content']); ?>
                                </div>
                                <?php
                                    }
                                ?>
                                
                            </div>
                    </section>
                </div>
	</div>
	<footer class="footer">
		<div class="row">
			<?php print render($page['footer']); ?>
		</div>
	</footer>
</div><!-- /div.container -->
