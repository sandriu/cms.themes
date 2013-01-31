(function($) {
    $(document).ready(function() {
        triggerPopovers($('body'));

        if ( $('#family-tabs').length > 0 ) {
            $("#family-tabs").tab();

            $('#family-tabs a').click(function (e) {
                e.preventDefault();
                $this = $(this);
                $this.tab('show');

                if (!$($this.attr('href')).hasClass('loaded')) {
                    var website = $this.attr('href').replace('#', '');
                    var tab_pane = $($this.attr('href'));

                    var species = $('#scientific-name-holder').val();
                    var loader = $('<div class="loading"><i class="loading-image"></i> <span class="muted">Loading content</span></div>');

                    $.ajax({
                        type: 'GET',
                        url: '/get/species/' + website + '/' + species + '.json',
                        async: true,
                        beforeSend: function() {
                            tab_pane.append(loader);
                        },
                        success: function(data) {
                            loader.fadeOut('normal', function() {
                                tab_pane.empty().append(data).addClass('loaded');
                            });
                        },
                        complete: function () {
                            triggerPopovers(tab_pane);
                        }
                    });
                }
            })
        }

        $("#edit-field-species-pop-size-und-0-field-species-pop-size-r-und-0-value").keyup(function(){
            $("#edit-field-species-pop-trend-und-0-field-species-pop-trend-r-und-0-value").val(this.value);
        });

        $('a.back-button').click(function(){
            parent.history.back();
            return false;
        });
    });

    $.fn.refresh_page = function() {
        location.reload();
    };

    function triggerPopovers(holder) {
        $('body').delegate('div', 'hover', function() {
            if ( $('a[rel="popover"]').length > 0 ) {
                $('a[rel="popover"]').popover();
            }
        });
    }
})(jQuery);
