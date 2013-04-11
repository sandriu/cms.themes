(function($) {
    $(document).ready(function() {
        $('a[rel="tooltip"]').tooltip();

        var per_page = $('#contacts-per-page').val();
        var page = $('#current-page').val();
        var instrument = $('#instrument').val();
        var country = $('#country').val();
        var region = $('#region').val();
        var availability = $('#availability').val();
        var mailing_list = $('#mailing').val();
        var person_status = $('#person_status').val();

        $('#contacts-listing').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "bFilter": true,
            "sPaginationType": "bootstrap",
            "sAjaxSource": "/contacts/datatables_listing?instrument=" + instrument + "&country=" + country + "&region=" + region + "&availability=" + availability + "&mailing_list=" + mailing_list + "&person_status=" + person_status,
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
                    "fnRender": function (oObj) {
                        return "<a href='/contacts/item/" + oObj.aData[0] + "/" + oObj.aData[9] + "/view'>" + oObj.aData[1] + "</a>";
                    }
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
                    //"fnRender": function (oObj) {
                    //    data = "";
                    //    $.each(oObj.aData[4], function(key, value) {
                    //        if (key != 'count') {
                    //            data = data + "<a href='mailto:" + value + "'>" + value + "</a><br />";
                    //        }
                    //    });
                    //    return data;
                    //},
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
                    "bSearchable": true,
                    "sDefaultContent": ""
                },
                {
                    "bSearchable": false,
                    "bVisible": false,
                    "sDefaultContent": ""
                }
            ]
        });

        $('#organizations-listing').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "bFilter": true,
            "sPaginationType": "bootstrap",
            "sAjaxSource": "/contacts/organizations_datatables_listing?country=" + country,
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
                    "fnRender": function (oObj) {
                        return "<a href='/contacts/organization/" + oObj.aData[0] + "/view'>" + oObj.aData[1] + "</a>";
                    }
                },
                {
                    "bSearchable": true,
                    "bVisible": true,
                    "sDefaultContent": ""
                },
            ]
        });

        $('#export-button').click(function(e){
            e.preventDefault();
            var search_query = $('.dataTables_filter input').val();
            var instrument = $('#instrument').val();
            var country = $('#country').val();

            window.location.href = '/contacts/export?instrument=' + instrument + '&country=' + country + '&sSearch=' + search_query;
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
