(function($) {
    $(document).ready(function() {
        $('a[rel="tooltip"]').tooltip();
        
        $('#contacts-instrument-filter').submit(function() {
            instrument = $('#instrument').val();
            window.location = '/contacts/listing?instrument=' + instrument;
        });
    });
})(jQuery);