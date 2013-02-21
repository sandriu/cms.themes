(function($) {
    $(document).ready(function() {
        $('a[rel="tooltip"]').tooltip();

        $('#meeting-document-listing').dataTable({
            "bFilter": true,
            "sPaginationType": "bootstrap",
            "aoColumns": [
                {
                    "bSearchable": false,
                    "bSortable": false,
                    "bVisible": true,
                    "sDefaultContent": ""
                },
                {
                    "bSearchable": true,
                    "sDefaultContent": "",
                   
                },
                {
                    "bSearchable": true,
                    "sDefaultContent": "",
                   
                },
                {
                    "bSearchable": true,
                    "sDefaultContent": "",
                   
                }
            ],
            "aLengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"],
            ],
            "aaSorting": [ [1, "asc"] ]
        });

        $('#all-document-listing').dataTable({
            "bFilter": true,
            "sPaginationType": "bootstrap",
            "aoColumns": [
                {
                    "bSearchable": false,
                    "bSortable": false,
                    "bVisible": true,
                    "sDefaultContent": ""
                },
                {
                    "bSearchable": true,
                    "sDefaultContent": "",
                   
                },
                {
                    "bSearchable": true,
                    "sDefaultContent": "",
                   
                },
                {
                    "bSearchable": true,
                    "sDefaultContent": "",
                   
                }
            ],
            "aLengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"],
            ],
            "aaSorting": [ [1, "asc"] ]
        });

        $('a.back-button').click(function(){
            parent.history.back();
            return false;
        });

        $('#select-all').click(function() {
            var oTable = $('#meeting-document-listing').dataTable();
            if ( $(this).prop('checked') ) {
                $('input[type="checkbox"]', oTable.fnGetNodes()).prop('checked', $(this).prop('checked'));
            }else {
                $('input[type="checkbox"]', oTable.fnGetNodes()).prop('checked', false);
            }
        });

        $('#documents-select-all').click(function() {
            var oTable = $('#all-document-listing').dataTable();
            if ( $(this).prop('checked') ) {
                $('input[type="checkbox"]', oTable.fnGetNodes()).prop('checked', $(this).prop('checked'));
            }else {
                $('input[type="checkbox"]', oTable.fnGetNodes()).prop('checked', false);
            }
        });

        $('#meeting-documents-tabs a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        })

        $('#add-meeting-documents').click(function(e){
            e.preventDefault();
            meeting_id = $('#meeting-id').val();

            var oTable = $('#all-document-listing').dataTable();
            var documents = $("input[type='checkbox']:checked", oTable.fnGetNodes()).map(function(){ return $(this).val(); }).get();
            var loader = $('<i class="loading-image" id="delete-documents-loader"></i>');
            var button_holder = $(this).parent();

            $.ajax({
                type: 'POST',
                url: '/meeting/' + meeting_id + '/add_documents',
                async: true,
                data: 'documents=' + documents,
                dataType: 'JSON',
                beforeSend: function() {
                    button_holder.append(loader);
                },
                success: function(data) {
                    loader.fadeOut('normal', function() {
                        location.reload();
                    });
                }
            });
        });

        $('#delete-meeting-documents').click(function(e){
            e.preventDefault();
            meeting_id = $('#meeting-id').val();

            var oTable = $('#meeting-document-listing').dataTable();
            var documents = $("input[type='checkbox']:checked", oTable.fnGetNodes()).map(function(){ return $(this).val(); }).get();
            var loader = $('<i class="loading-image" id="delete-documents-loader"></i>');
            var button_holder = $(this).parent();

            $.ajax({
                type: 'POST',
                url: '/meeting/' + meeting_id + '/delete_documents',
                async: true,
                data: 'documents=' + documents,
                dataType: 'JSON',
                beforeSend: function() {
                    button_holder.append(loader);
                },
                success: function(data) {
                    loader.fadeOut('normal', function() {
                        location.reload();
                    });
                }
            });
            //$( "#add-dialog-confirm" ).dialog({
            //    resizable: false,
            //    height:140,
            //    modal: true,
            //    buttons: {
            //        "Delete all items": function() {
            //            e.preventDefault();
            //            meeting_id = $('#meeting-id').val();
            //
            //            var oTable = $('#all-document-listing').dataTable();
            //            documents = $("input[type='checkbox']:checked", oTable.fnGetNodes()).map(function(){ return $(this).val(); }).get();
            //
            //            $.ajax({
            //                type: 'POST',
            //                url: '/meeting/' + meeting_id + '/add_documents',
            //                async: true,
            //                data: 'documents=' + documents,
            //                dataType: 'JSON',
            //                success: function (data) {
            //                    $( this ).dialog( "close" );
            //                    location.reload();
            //                }
            //            });
            //        },
            //        Cancel: function() {
            //            $( this ).dialog( "close" );
            //        }
            //    }
            //});
        });
    });
})(jQuery);
