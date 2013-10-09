(function($) {
    $(document).ready(function() {
        $('a[rel="tooltip"]').tooltip();

        var per_page = $('#organizations-per-page').val();
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

        $('#organizations-listing').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "bFilter": true,
            "sPaginationType": "bootstrap",
            "sAjaxSource": "/contacts/organizations_datatables_listing?instrument=" + instrument
            + "&country=" + country + "&region=" + region + "&availability="
            + availability + "&mailing_list=" + mailing_list + "&person_status="
            + person_status + "&organization_status=" + organization_status
            + "&operator=" + operator + "&per_field_operator=" + per_field_operator,
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
                        return "<a href='/contacts/organization/" + oObj.aData[0] + "/" + oObj.aData[5].toLowerCase() + "/view'>" + oObj.aData[1] + "</a>";
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
