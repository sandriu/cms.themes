(function($) {
    $(document).ready(function() {
        $('a[rel="tooltip"]').tooltip();
        var per_page = $('#contacts-per-page').val();
        var page = $('#current-page').val();
        var operator = $('#operator').val();
        var per_field_operator = $('#per_field_operator').val();
        var instrument = $('#instrument').val();
        var country = $('#country').val();
        var region = $('#region').val();
        var availability = $('#availability').val();
        var mailing_list = $('#mailing').val();
        var person_status = $('#person_status').val();
        var organization_status = $('#organization_status').val();
        var species = $('#species').val();
        var meeting = $('#meeting').val();

        var dt = $('#contacts-listing').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "/manage/contacts/ajax/list",
            "bDeferRender": true,
            "bFilter": true,
            "sPaginationType": "bootstrap",
            "aaSorting": [ [1, "asc"] ],
            "aoColumns": [
                { "bVisible": true, "sDefaultContent": "", "bSortable": false },
                { "bVisible": true, "sDefaultContent": "" },
                { "bVisible": true, "sDefaultContent": "" },
                { "bVisible": true, "sDefaultContent": "" },
                { "bVisible": true, "sDefaultContent": "" },
                { "bVisible": true, "sDefaultContent": "" },
                { "bVisible": true, "sDefaultContent": "" },
                { "bVisible": true, "sDefaultContent": "", "bSortable": false }
            ],
            "fnServerParams": function (aoData) {
                var countries = jQuery('#country').val();
                if(countries !== null) {
                    jQuery(countries).each(function(i, d) {
                        aoData.push({ 'name' : 'country[]', 'value' : d});
                    });
                }
                var region = jQuery('#region').val();
                if(region !== null) {
                    jQuery(region).each(function(i, d) {
                        aoData.push({ 'name' : 'region[]', 'value' : d});
                    });
                }
                var person_status = jQuery('#person_status').val();
                if(person_status !== null) {
                    jQuery(person_status).each(function(i, d) {
                        aoData.push({ 'name' : 'person_status[]', 'value' : d});
                    });
                }
                var organization_status = jQuery('#organization_status').val();
                if(organization_status !== null) {
                    jQuery(organization_status).each(function(i, d) {
                        aoData.push({ 'name' : 'organization_status[]', 'value' : d});
                    });
                }
                var availability = jQuery('#availability').val();
                if(availability == 'TRUE' || availability == 'FALSE') {
                    aoData.push({ 'name' : 'availability', 'value' : availability});
                }
                var instrument = jQuery('#instrument').val();
                if(instrument !== null) {
                    jQuery(instrument).each(function(i, d) {
                        aoData.push({ 'name' : 'instrument[]', 'value' : d});
                    });
                }
                aoData.push({ 'name' : 'per_field_operator', 'value' : jQuery('#per_field_operator').val()});
                aoData.push({ 'name' : 'operator', 'value' : jQuery('#operator').val()});
            }
        });

        // Delay search after 3 characters
        $('.dataTables_filter input')
            .unbind('keypress keyup')
            .bind('keypress keyup', function(e){
                if ($(this).val().length < 3 && e.keyCode != 13) return;
                dt.fnFilter($(this).val());
            });

        /*
        $('#export-button').click(function(e){
            e.preventDefault();
            var search_query = $('.dataTables_filter input').val();
            var instrument = $('#instrument').val();
            var country = $('#country').val();

            window.location.href = "/contacts/export?instrument=" + instrument + "&country=" + country + "&region=" + region + "&availability=" + availability + "&mailing_list=" + mailing_list + "&person_status=" + person_status + "&organization_status=" + organization_status + "&species=" + species + "&meeting=" + meeting + "&operator=" + operator + "&per_field_operator=" + per_field_operator;
        });

        $('#xls-export-button').click(function(e){
            e.preventDefault();
            var search_query = $('.dataTables_filter input').val();
            var instrument = $('#instrument').val();
            var country = $('#country').val();

            window.location.href = "/contacts/xls_export?instrument=" + instrument + "&country=" + country + "&region=" + region + "&availability=" + availability + "&mailing_list=" + mailing_list + "&person_status=" + person_status + "&organization_status=" + organization_status + "&species=" + species + "&meeting=" + meeting + "&operator=" + operator + "&per_field_operator=" + per_field_operator;
        });
        */

        $('.accordion-toggle').each(function(){
            var toggle = $(this);
            if (toggle.data('toggle') == 'collapse') {
                holder = toggle.attr('href');
                $(holder).css('overflow', 'visible');
            }
        });
    });

    $.fn.resetForm = function() {
        $(this).each(function(){
            $('select', this).val('');
            $('input', this).val('');
            this.submit();
        });
    }
})(jQuery);
