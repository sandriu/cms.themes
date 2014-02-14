<script type="text/javascript">
    (function($) {
        $(document).ready(function() {
            $("#expand").on("click", function() {                
                $(this).parents().find('.panel-collapse').each(function(index) {
                    $(this).removeAttr('style');
                    if (!$(this).hasClass('in')) {
                        $(this).collapse('show');
                    }
                })                
            });
            $("#collapses").on("click", function() {                
                $(this).parents().find('.panel-collapse').each(function(index) {
                    if ($(this).hasClass('in')) {                            
                        $(this).collapse('hide');
                    }
                    $(this).removeAttr('style');
                })                
            });
        });
    })(jQuery);
</script>
<?php if(check_display_field($content, 'field_project_activity')): ?>
    <div class="btn-group" data-toggle="buttons-radio">
        <a href="#" id="expand">Expand All</a> | 
        <a href="#" id="collapses">Collapse All</a>        
    </div>
    <div class="panel-group" id="accordion">
        <?php echo render($content['field_project_activity']); ?>
    </div>
<?php endif; ?>
