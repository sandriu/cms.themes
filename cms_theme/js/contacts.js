(function($) {
    $(document).ready(function() {
        $('a[rel="tooltip"]').tooltip();

        var per_page = $('#contacts-per-page').val();
        var page = $('#current-page').val();
        var instrument = $('#instrument').val();

        $('#contacts-per-page, #instrument').change(function(){
            var per_page = $('#contacts-per-page').val();
            var page = $('#current-page').val();
            var instrument = $('#instrument').val();
            url = '/contacts/listing?instrument=' + instrument + '&page=' + page + '&per_page=' + per_page;
            window.location = url;
        });

        $('#contacts-listing').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "bFilter": true,
            "sPaginationType": "bootstrap",
            "sAjaxSource": "/contacts/datatables_listing?instrument=" + instrument,
            "aoColumns": [
                {
                    "bSearchable": false,
                    "bVisible": false
                },
                {
                    "fnRender": function (oObj)
                    {
                        return "<a href='/contacts/item/" + oObj.aData[0] + "/" + instrument + "/view'>" + oObj.aData[1] + "</a>";
                    }
                },
                null,
                null,
                {
                    "fnRender": function (oObj) {
                        data = "";
                        $.each(oObj.aData[4], function(key, value) {
                            if (key != 'count') {
                                data = data + "<a href='mailto:" + value + "'>" + value + "</a><br />";
                            }
                        });
                        return data;
                    }
                },
                null,
                null
            ]
        });
    });
})(jQuery);
