jQuery(document).ready(function(){
    jQuery('.form-section-legend a').click(function(e){
       $this = jQuery(this);
       if ($this.parent().next('div.collapse').hasClass('in')) {
            jQuery('i', $this).addClass('icon-plus-sign').removeClass('icon-minus-sign');
       }else {
            jQuery('i', $this).removeClass('icon-plus-sign').addClass('icon-minus-sign');
       }
    });
});
