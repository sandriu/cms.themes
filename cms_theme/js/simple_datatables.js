(function($) {
    $(document).ready(function() {
        $('.dataTable').dataTable({
            "bProcessing": true,
            "bServerSide": false,
            "bRetrieve": true,
            "bFilter": true,
            "sPaginationType": "bootstrap"
        });
    });
})(jQuery);
