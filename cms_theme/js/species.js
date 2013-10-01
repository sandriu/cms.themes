(function($) {
    $(document).ready(function() {
        //$('.chzn-choices input').autocomplete({
        //    source: function( request, response ) {
        //        $.ajax({
        //            url: "/search_contact/" + request.term + "/",
        //            dataType: "json",
        //            beforeSend: function(){$('ul.chzn-results').empty();},
        //            success: function( data ) {
        //                response( $.map( data, function( item ) {
        //                    $('ul.chzn-results').append('<li class="active-result">' + item.name + '</li>');
        //                }));
        //            }
        //        });
        //    },
        //    delay: 500,
        //    minLength: 3,
        //});

        triggerPopovers($('body'));
        triggerDataTables($('body'));

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
                            triggerDataTables(tab_pane);
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

        /**
         * Hide 'Date of entry' field if selected instrument is CMS
        */
        $('select[id^="edit-field-species-instruments-und-"]').each(function(){
            $(this).hide_instrument_date($(this), 'CMS');
        });

        $( document ).ajaxComplete(function(e) {
            $('select[id^="edit-field-species-instruments-und-"]').each(function(){
                $(this).hide_instrument_date($(this), 'CMS');
            });
        });

        $('body').on('change', 'select[id^="edit-field-species-instruments-und-"]', function(){
            $(this).hide_instrument_date($(this), 'CMS');
        });
    });

    $.fn.hide_instrument_date = function(select, instrument) {
        var selected_instrument = $('option:selected', select).text();
        if ( selected_instrument == instrument ) {
            $('div.field-name-field-species-instrument-date', select.closest('td')).hide();
        }

        return false;
    }

    $.fn.refresh_page = function() {
        location.reload();
    };

    function triggerPopovers(holder) {
        holder.delegate('div', 'hover', function() {
            if ( $('a[rel="popover"]').length > 0 ) {
                $('a[rel="popover"]').popover();
            }

            return false;
        });
    }

    function triggerDataTables(holder) {
        holder.delegate('div', 'hover', function(e) {
            var oTable = $('#country-status-listing');

            if ( (oTable.length > 0) && ( ! $.fn.DataTable.fnIsDataTable( oTable[0] ) ) ) {
                oTable.dataTable({
                    "bFilter": true,
                    "sPaginationType": "bootstrap",
                });
            }

            return false;
        });
    }
})(jQuery);
