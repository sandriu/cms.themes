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

if (Drupal.jsEnabled) {
(function ($) {
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

    /**
     * Highlights a suggestion.
     */
    Drupal.jsAC.prototype.highlight = function (node) {
        if (this.selected) {
            $(this.selected).removeClass('selected active');
        }

        $(node).addClass('selected active');
        this.selected = node;
        $(this.ariaLive).html($(this.selected).html());
    };

    /**
     * Unhighlights a suggestion.
     */
    Drupal.jsAC.prototype.unhighlight = function (node) {
        $(node).removeClass('selected active');
        this.selected = false;
        $(this.ariaLive).empty();
    };

    /**
     * Positions the suggestions popup and starts a search.
     */
    Drupal.jsAC.prototype.populatePopup = function () {
        var $input = $(this.input);
        var position = $input.position();
        // Show popup.
        if (this.popup) {
            $(this.popup).remove();
        }

        this.selected = false;
        this.popup = $('<div id="autocomplete" class="dropdown clearfix"></div>')[0];
        this.popup.owner = this;
        $(this.popup).css({
            top: parseInt(position.top + this.input.offsetHeight, 10) + 'px',
            left: parseInt(position.left, 10) + 'px',
            width: $input.innerWidth() + 'px',
            display: 'none'
        });
        $input.before(this.popup);

        // Do search.
        this.db.owner = this;
        this.db.search(this.input.value);
    };

    /**
     * Fills the suggestion popup with any matches received.
     */
    Drupal.jsAC.prototype.found = function (matches) {
        // If no value in the textfield, do not show the popup.
        if (!this.input.value.length) {
           return false;
        }

        // Prepare matches.
        var ul = $('<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu"></ul>');
        var ac = this;
        for (key in matches) {
            $('<li></li>')
                .html($('<a href="javascript:void(0); "></a>').html(matches[key]))
                .mousedown(function () { ac.select(this); })
                .mouseover(function () { ac.highlight(this); })
                .mouseout(function () { ac.unhighlight(this); })
                .data('autocompleteValue', key)
                .appendTo(ul);
        }

        // Show popup with matches, if any.
        if (this.popup) {
            if (ul.children().length) {
              $(this.popup).empty().append(ul).show();
              $(this.ariaLive).html(Drupal.t('Autocomplete popup'));
            }else {
                $(this.popup).css({ visibility: 'hidden' });
                this.hidePopup();
            }
        }
    };
})(jQuery);
}