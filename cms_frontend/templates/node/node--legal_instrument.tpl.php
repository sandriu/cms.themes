<?php if($teaser): ?>
    <div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>  
        <?php print render($title_prefix); ?>
        <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
        <?php print render($title_suffix); ?>  

        <div class="content article-body"<?php print $content_attributes; ?>>
            <?php
              // We hide the comments and links now so that we can render them later.
              hide($content['comments']);
              hide($content['links']);
              print render($content);      
            ?>      
            <span class="text-muted"><?php print format_date($node->changed,'custom','d F Y'); ?></span>
        </div>
    </div>
<?php else: ?>
    <div class="container">
      <div class="row">
          <div class="instrument-left profile col-md-8">
            <?php
              echo render($content['field_instrument_description']);
              render_slot($node, 'details', 'legal_instrument', $content);
            ?>
          </div>

          <div class="instrument-right well profile col-md-4">
            <table class="table table-condensed table-hover two-columns">
              <tbody>                
                  <?php                
                    echo render($content['node_list']);
                    echo render($content['field_instrument_name']);
                    echo render($content['field_instrument_type']);
                    echo render($content['field_languages']);
                    echo render($content['field_instrument_depositary']);
                    echo render($content['field_instrument_signature']);
                    echo render($content['field_instrument_in_effect']);
                    echo render($content['field_instrument_actual_effect']);
                    echo render($content['field_instrument_website']);
                    echo render($content['field_instrument_other']);
                    render_slot($node, 'attachments', 'legal_instrument', $content);
                  ?>
              </tbody>
            </table>
          </div>
      </div>

        <?php if (CMSUtils::get_current_profile() == 'cms') { ?>
        <div class="row">
            <div class="instrument-full-width profile col-md-12">
            <?php
                render_slot($node, 'related-content', 'legal_instrument', $content);
            ?>
            </div>
        </div>
        <?php } ?>

    </div>



    <?php
        $content['contacts'] = $node->contacts;
        $content['countries_by_status'] = $node->countries_by_status;

        hide($content['links']);
        hide($content['comments']);

        $js_path = drupal_get_path('module', 'datatables') . '/dataTables/media/js/jquery.dataTables.min.js';
        $DT_js_path = drupal_get_path('module', 'datatables') . '/js/DT_bootstrap.js';
        $css_path = drupal_get_path('module', 'datatables') . '/dataTables/media/css/demo_table.css';
    ?>
    <script type="text/javascript" src="/<?php echo $js_path; ?>"></script>
    <script type="text/javascript" src="/<?php echo $DT_js_path; ?>"></script>
    <link type="text/css" rel="stylesheet" href="/<?php echo $css_path; ?>" />
    <?php
        drupal_add_js(drupal_get_path('theme', 'cms_theme') . DIRECTORY_SEPARATOR . 'js' . DIRECTORY_SEPARATOR . 'simple_datatables.js');
    ?>
<?php endif; ?>