(function($) {
    $(document).ready(function() {
        if ( $('a[rel="popover"]').length > 0 ) {
            $("a[rel='popover']").popover();
        }

        if ( $('#family-tabs').length > 0 ) {
            $("#family-tabs").tab();
        
            $('#family-tabs a').click(function (e) {
                e.preventDefault();
                $this = $(this);
                
                if (!$($this.attr('href')).hasClass('loaded')) {
                    var website = $this.attr('href').replace('#', '');
                    var species = $('#scientific-name-holder').val();
                
                    $.ajax({
                        type: 'GET',
                        url: '/get/species/' + website + '/' + species + '.json',
                        async: false,
                        success: function(data) {
                            $($this.attr('href')).empty().append(data).addClass('loaded');
                        }
                    });
                }

                $this.tab('show');
            })
        }
    });

    $.fn.refresh_page = function() {
        location.reload();
    };
})(jQuery);
