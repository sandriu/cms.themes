(function($) {
    $(document).ready(function(){
        var order_select = $('select[name="tid_1"]').get(0);
        var family_select = $('select[name="tid_2"]').get(0);
        $('select[name="tid"]').change(function(){
            order_select = $('select[name="tid_1"]').get(0);
            family_select = $('select[name="tid_2"]').get(0);

            class_selected = $('select[name="tid"]').val();
            $.getJSON('/ajax/species/orders/' + class_selected, function(orders) {
                var html = ("<option value='All'>Any</option>");
                $.each(orders, function(index, value) {
                    html += ("<option value='" + index + "'>" + value + "</option>");
                });

                $(order_select).html(html);
            });

            $.getJSON('/ajax/species/families/' + class_selected + '/' + $(order_select).val(), function(families) {
                var html = ("<option value='All'>Any</option>");
                $.each(families, function(index, value) {
                    html += ("<option value=" + index + ">" + value + "</option>");
                });

                $(family_select).html(html);
            });
        });

        $(order_select).change(function() {
            order_selected = $(this).val();
            class_selected = $('select[name="tid_1"]').val();
            $.getJSON('/ajax/species/families/' + class_selected + '/' + order_selected, function(orders) {
                var html = ("<option value='All'>Any</option>");
                $.each(orders, function(index, value) {
                    html += ("<option value='" + index + "'>" + value + "</option>");
                });

                $(family_select).html(html);
            });
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
