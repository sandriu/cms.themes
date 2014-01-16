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

        $('#contacts-listing').dataTable({
            "bProcessing": false,
            "bServerSide": false,
            "bFilter": true,
            "sPaginationType": "bootstrap",
            "aaSorting": [ [1, "asc"] ],
            "aoColumns": [
                {
                    "bSearchable": false,
                    "bVisible": false,
                    "sDefaultContent": ""
                },
                {
                    "bSearchable": true,
                    "sDefaultContent": "",
//                    "fnRender": function (oObj) {
//                        return "<a href='/" + administration_path + "contacts/item/" + oObj.aData[0] + "/" + oObj.aData[10].toLowerCase() + "/view'>" + oObj.aData[1] + "</a>";
//                    }
                },
                {
                    "bSearchable": true,
                    "bVisible": true,
                    "sDefaultContent": ""
                },
                {
                    "sDefaultContent": ""
                },
                {
                    "bSearchable": true,
                    "bVisible": false,
                    "sDefaultContent": ""
                },
                {
                    "bVisible": false,
                    "sDefaultContent": ""
                },
                {
                    "sDefaultContent": ""
                },
                {
                    "bSearchable": true,
                    "bVisible": true,
                    "sDefaultContent": ""
                },
                {
                    "bSearchable": true,
                    "bVisible": false,
                    "sDefaultContent": ""
                },
                {
                    "bSearchable": true,
                    "sDefaultContent": ""
                }
            ]
        });

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

        $('.accordion-toggle').each(function(){
            toggle = $(this);
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
