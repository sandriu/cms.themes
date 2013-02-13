(function($) {
    $(document).ready(function() {
        $('a[rel="tooltip"]').tooltip();

        var per_page = $('#contacts-per-page').val();
        var page = $('#current-page').val();
        var instrument = $('#instrument').val();
        var country = $('#country').val();

        $('#contacts-listing').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "bFilter": true,
            "sPaginationType": "bootstrap",
            "sAjaxSource": "/contacts/datatables_listing?instrument=" + instrument + "&country=" + country,
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
                        return "<a href='/contacts/item/" + oObj.aData[0] + "/" + instrument + "/view'>" + oObj.aData[1] + "</a>";
                    }
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
            ]
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
