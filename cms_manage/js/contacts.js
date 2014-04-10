(function($) {
    $(document).ready(function() {
        $('a[rel="tooltip"]').tooltip();
        var defaultSortCol = jQuery('#iSortCol_0').val();
        var defaultSortDir = jQuery('#sSortDir_0').val();
        var dt = $('#contacts-listing').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "/manage/contacts/ajax/list",
            "bDeferRender": true,
            "bFilter": true,
            "sPaginationType": "bootstrap",
            "aaSorting": [ [defaultSortCol, defaultSortDir] ],
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

                // Save the sorting column and direction on the filtering form for future reference
                for(var key in aoData) {
                    var o = aoData[key];
                    if(o.name == 'iSortCol_0') {
                        jQuery('#iSortCol_0').val(o.value);
                    }
                    if(o.name == 'sSortDir_0') {
                        jQuery('#sSortDir_0').val(o.value);
                    }
                }
            }
        });

        // Delay search after 3 characters
        $('.dataTables_filter input')
            .unbind('keypress keyup')
            .bind('keypress keyup', function(e){
                if ($(this).val().length < 3 && e.keyCode != 13) return;
                dt.fnFilter($(this).val());
            });
    });
})(jQuery);
