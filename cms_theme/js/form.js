jQuery(document).ready(function(){
    jQuery('select[name="field_species_class_value"]').change(function(){
        order_select = jQuery('select[name="field_species_order_value"]').get(0);
        jQuery(order_select).change();
    });
});

jQuery.fn.resetForm = function() {
    jQuery(this).each(function(){
        jQuery('select', this).val('');
        jQuery('input', this).val('');
        this.submit();
    });
}
