(function($) {
	$( document ).ajaxComplete(function(e) {
				var en_index;
				$('select[id$="field-document-file-language-und"]').eq(0).children().each(function(){
					if( $(this).text().toLowerCase() == "english" ) {
						en_index = $(this).attr('value');
					}
				});
	            $('select[id$="field-document-file-language-und"]').each(function(){
	                if ($(this).val() == "_none") {
	                	$(this).val(en_index).trigger("liszt:updated");
	                	
	               	}               		
	            });
	        });
	        
})(jQuery);