(function($) {
    $(document).ready(function(){
        var order_select = $('select[name="field_species_order_value"]').get(0);
        var family_select = $('select[name="field_species_family_value"]').get(0);
        $('select[name="field_species_class_value"]').change(function(){
            order_select = $('select[name="field_species_order_value"]').get(0);
            family_select = $('select[name="field_species_family_value"]').get(0);

            class_selected = $('select[name="field_species_class_value"]').val();
            $.getJSON('/ajax/species/orders/' + class_selected, function(orders) {
                var html = ("<option value=''>Any</option>");
                $.each(orders, function(index, value) {
                    html += ("<option value='" + value + "'>" + value + "</option>");
                });

                $(order_select).html(html);
            });

            $.getJSON('/ajax/species/families/' + class_selected + '/' + $(order_select).val(), function(families) {
                var html = ("<option value=''>Any</option>");
                $.each(families, function(index, value) {
                    html += ("<option value=" + value + ">" + value + "</option>");
                });

                $(family_select).html(html);
            });
        });

        $(order_select).change(function() {
            order_selected = $(this).val();
            class_selected = $('select[name="field_species_class_value"]').val();
            $.getJSON('/ajax/species/families/' + class_selected + '/' + order_selected, function(orders) {
                var html = ("<option value=''>Any</option>");
                $.each(orders, function(index, value) {
                    html += ("<option value='" + value + "'>" + value + "</option>");
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
