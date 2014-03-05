<script type="text/javascript">
	(function ($) {
		$(document).ready(function(){
			$('#in_effect, #in_force').hide();
			var instrument_status_select = '#instrument_status select';
			var opt = $(instrument_status_select).val();
			var actiual_status = $(instrument_status_select + ' option[value="' + opt + '"]').text().toLowerCase();
			if (actiual_status == 'agreement'){
				$("#in_effect").hide();
				$("#in_force").show();
			} else if (actiual_status == 'mou') {
				$("#in_effect").show();
				$("#in_force").hide();
			} else {
				$('#in_effect, #in_force').hide();
			}
	    		$(instrument_status_select).change(function(e) {
			 	$this = $(this);
				var option_value = $this.val();
				var status = $(instrument_status_select + ' option[value="' + option_value + '"]').text().toLowerCase();
				if (status == 'agreement'){
					$("#in_effect").hide();
					$("#in_force").show();
				} else if (status == 'mou') {
					$("#in_effect").show();
					$("#in_force").hide();
				} else {
					$('#in_effect, #in_force').hide();
				}
			});
		});
	})(jQuery);
</script>

<div class="row" id="legal-instrument-form">
    <div class="span7">
        <?php
            echo drupal_render($form['title']);
        ?>
    </div>

    <div class="span4">
        <?php
            echo drupal_render($form['field_instrument_name']);
        ?>
    </div>

    <div class="span2" id="instrument_status">
        <?php
            echo drupal_render($form['field_instrument_status']);
        ?>
    </div>

    <div class="span2">
        <?php
            echo drupal_render($form['field_instrument_type']);
        ?>
    </div>

    <div class="span3">
        <?php
            echo drupal_render($form['field_country']);
        ?>
    </div>

    <div class="span3 pull-left">
        <?php
            echo drupal_render($form['field_sponsors']);
        ?>
    </div>

    <div class="span6">
        <?php
            echo drupal_render($form['field_instrument_depositary']);
        ?>
    </div>

    <div class="span5 pull-right">
        <?php
            echo drupal_render($form['field_instrument_secretariat']);
        ?>
    </div>
	
    <div id="in_effect">
    	<hr class="span12" />
	
    	<div class="span5">
		<?php
		    echo drupal_render($form['field_instrument_in_effect']);
		?>
	</div>

	<div class="span3 pull-right">
		<?php
		    echo drupal_render($form['field_instrument_actual_effect']);
		?>
	</div>
    </div>
    <div id="in_force">
	<hr class="span12" />

	<div class="span5">
		<?php
		    echo drupal_render($form['field_instrument_in_force']);
		?>
	</div>

	<div class="span3 pull-right">
		<?php
		    echo drupal_render($form['field_instrument_actual_force']);
		?>
	</div>
    </div>
    <hr class="span12" />

    <div class="span12">
        <?php
            echo drupal_render($form['field_instrument_description']);
        ?>
    </div>

    <hr class="span12" />

    <div class="span12">
        <?php
            echo drupal_render($form['field_instrument_coverage']);
        ?>
    </div>

    <div class="span12">
        <?php
            echo drupal_render($form['field_instrument_treaty_text']);
        ?>
    </div>

    <div class="span12">
        <?php
            echo drupal_render_children($form);
        ?>
    </div>
</div>
