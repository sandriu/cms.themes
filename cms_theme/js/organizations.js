(function($) {
    $(document).ready(function() {
        $('a[rel="tooltip"]').tooltip();

        var per_page = $('#organizations-per-page').val();
        var page = $('#current-page').val();
        var instrument = $('#instrument').val();
        var country = $('#country').val();

        $('#organizations-listing').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "bFilter": true,
            "sPaginationType": "bootstrap",
            "sAjaxSource": "/contacts/organizations_datatables_listing?country=" + country + "&instrument=" + instrument,
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
                        return "<a href='/contacts/organization/" + oObj.aData[0] + "/" + instrument + "/view'>" + oObj.aData[1] + "</a>";
                    }
                },
                {
                    "bSearchable": true,
                    "bVisible": true,
                    "sDefaultContent": ""
                },
                {
                    "bSearchable": true,
                    "bVisible": true,
                    "sDefaultContent": ""
                },
                {
                    "bSearchable": true,
                    "bVisible": true,
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
