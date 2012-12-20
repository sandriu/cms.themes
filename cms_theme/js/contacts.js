(function($) {
    $(document).ready(function() {
        $('a[rel="tooltip"]').tooltip();

        $('#contacts-per-page, #instrument').change(function(){
            per_page = $('#contacts-per-page').val();
            page = $('#current-page').val();
            instrument = $('#instrument').val();
            url = '/contacts/listing?instrument=' + instrument + '&page=' + page + '&per_page=' + per_page;
            window.location = url;
        });
    });
})(jQuery);