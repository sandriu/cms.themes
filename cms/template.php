<?php

function cms_js_alter(&$javascript) {
	$javascript['misc/jquery.js']['data'] = drupal_get_path('theme', 'cms').'/js/jquery-1.8.0.min.js';
}
