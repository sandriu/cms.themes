(function($) {
    $(document).ready(function() {
        $('.dataTable').dataTable({
            "bProcessing": true,
            "bServerSide": false,
            "bFilter": true,
            "sPaginationType": "bootstrap"
        });
    });
})(jQuery);
