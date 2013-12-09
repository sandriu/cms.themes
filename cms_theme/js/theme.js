(function ($) {
    $(document).ready(function(){
        $('.form-section-legend a').click(function(e){
           $this = $(this);
           if ($this.parent().next('div.collapse').hasClass('in')) {
                $('i', $this).addClass('icon-plus-sign').removeClass('icon-minus-sign');
           }else {
                $('i', $this).removeClass('icon-plus-sign').addClass('icon-minus-sign');
           }
        });

        // timepicker for meeting start time
        if ($.fn.timepicker) {
            $('#edit-field-meeting-start-time input[type=text]').timepicker();
        }
    });



})(jQuery);
