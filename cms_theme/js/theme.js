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


Drupal.behaviors.tableDrag = {
   attach: function (context, settings) {
     for (var base in settings.tableDrag) {
      jQuery('#' + base, context)
        .filter(function () {
          // Filter out tables with only one draggable row.
          return jQuery(this).find('> tr.draggable, > tbody > tr.draggable').length > 1;
        })
        .once('tabledrag', function () {
          // Create the new tableDrag instance. Save in the Drupal variable
          // to allow other scripts access to the object.
          Drupal.tableDrag[base] = new Drupal.tableDrag(this, settings.tableDrag[base]);
        });
     }
   }
 };
 Drupal.tableDrag.prototype.hideColumns = function () {
    // Hide weight/parent cells and headers.
    jQuery('.tabledrag-hide', 'table.tabledrag-processed').css('display', 'none');

    // Show TableDrag handles.
    jQuery('.tabledrag-handle', 'table.tabledrag-processed').css('display', '');

    // Reduce the colspan of any effected multi-span columns.
    jQuery('.tabledrag-has-colspan', 'table.tabledrag-processed').each(function () {
        this.colSpan = this.colSpan - 1;
    });

    // Change cookie.
    jQuery.cookie('Drupal.tableDrag.showWeight', 0, {
        path: Drupal.settings.basePath,
        expires: 365
    });

    // Trigger an event to allow other scripts to react to this display change.
    jQuery('table.tabledrag-processed').trigger('columnschange', 'hide');
};