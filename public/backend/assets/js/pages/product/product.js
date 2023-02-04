$(function () {
    pages.product.init();
});

if (!pages) {
    var pages = {};
}
pages = $.extend(pages, {
    product: {
        init: function () {
            // list page
            if ($("#product_tbl").length > 0) {
                pages.product.initDatatable();
            }
            $(document).on('click', '.btn_execute_search', function (evt) {
                pages.common.executeSearchForm("search-form", 'product_tbl');
            });
            $(document).on('click', '.delete', function (evt) {
                $('#delete-modal').modal('show');
                var recordId = $(this).attr('row-id');
                var selectedStatus = $(this).attr('selected-status');
                $('#delete-modal .confirm_delete').attr('row-id', recordId);
                $('#delete-modal .confirm_delete').attr('selected-status', selectedStatus);
            });


            $(document).on('click', '#delete-modal .confirm_delete', function (evt) {
                evt.preventDefault();
                var recordId = $(this).attr('row-id');
                var selectedStatus = $(this).attr('selected-status');
                var type = 'status';
                pages.product.updateInfo(recordId, selectedStatus, type);
                $('#delete-modal').modal('hide');
            });
            $(document).on('click', '#delete-modal .cancel', function (evt) {
                $('#delete-modal .confirm_delete').removeAttr('row-id');
                $('#delete-modal .confirm_delete').removeAttr('selected-status');
            });

            $(document).on('click', '.btn-browse', function (evt) {
                var file = $(this).parents().find(".browse-file");
                file.trigger("click");
            });
            
            $(document).on('change', '.browse-file', function (evt) {
                if(evt.target.files.length != 0 ){
                    var file =  evt.target.files[0];
                    pages.product.detectExtension(file, false, 'img');
                }
            });


        },
        // numberImask: function(element){
        //     IMask(element, {
        //         mask: Number,
        //         scale: 2,
        //         signed: false,
        //         thousandsSeparator: ',',
        //         padFractionalZeros: false,
        //         normalizeZeros: true,
        //         radix: '.',
        //         min: 0,
        //         max: 100000
        //     });
        // },
        detectExtension: function (file, firstLoad, element) {
            var file_name =  file.name;
            var extension = file_name.substr((file_name.lastIndexOf('.') + 1));
            switch (extension) {
                case 'jpg':
                case 'png':
                    if (firstLoad == false) {
                        if( element == 'img'){
                            $('#media_img_preview').attr('src', URL.createObjectURL(event.target.files[0]));
                        }
                    }
                    var fileName = event.target.files[0].name;
                    if( element == 'img'){
                        $(".thumbnail").val(fileName);
                    }
                    $('#media_img_preview').show();
                    break;
            }
        },
        /**
         *
         * @param recordId
         * @param status
         */
      
        updateInfo: function (recordId, status, type) {
                $.ajax({
                    url: '/products/update-info-ajax',
                    data: {
                        'recordId': recordId,
                        'status': status,
                        'type': type,
                    },
                    dataType: 'json',
                    success: function (result) {
                        if (result.Code == pages.constant.CODE_SUCCESS) {
                            $("#product_tbl").DataTable().draw();
                        }
                    }
                });
        },
        initDatatable: function () {
            var aoColumns = [
                { data: "id", name: 'id', "className": "text-center align-middle"},
                { data: "name", name: 'name', "className": "text-center align-middle"},
                { data: "cate_id", name: 'cate_id', "className": "text-center align-middle"},
                { data: "description", name: 'description', "className": "text-center align-middle"},
                { data: "status", name: 'status', "className": "text-center align-middle"},
                { data: "image", name: 'image', "className": "text-center align-middle"},
                { data: "created_at", name: 'created_at', "className": "text-center align-middle"},
                { data: "updated_at", name: 'updated_at', "className": "text-center align-middle"},
                { data: "action", name: 'action', "className": "text-center align-middle"},
                
            ];
            var columnDefs = [
                {
                    render: function (data, type, row) {
                        return data;
                    },
                    targets: 0,
                    orderable: true,
                    data: "id",
                },
                {
                    render: function (data, type, row) {
                        return data;
                    },
                    targets: 1,
                    orderable: true,
                    data: "name",
                },
                {
                    render: function (data, type, row) {
                        return data;
                    },
                    targets: 2,
                    orderable: true,
                    data: "cate_id",
                },
                {
                    render: function (data, type, row) {
                        return data;
                    },
                    targets: 3,
                    orderable: true,
                    data: "description",
                },
                {
                    render: function (data, type, row) {
                        return data;
                    },
                    targets: 4,
                    orderable: true,
                    data: "status",
                },
                {
                    render: function (data, type, row) {
                        var html = '';
                        var imgSrc = '/backend/assets/images/no-image.png';
                            if(data != '' && data != 'undefined'){
                                imgSrc = data;
                            }
                            html += '<div class="table-image-container">';
                            html += '<a class="image-popup" href="'+imgSrc+'">';
                            html += '<img src="'+imgSrc+'" class="img-fluid" alt="Responsive image">';
                            html += '</a>';
                            html += '</div>';

                        return html;
                    },
                    targets: 5,
                    orderable: false,
                    data: "image",
                },
                {
                    render: function (data, type, row) {
                        return pages.formatDateTime(data,'yyyy/mm/dd hh:nn:ss');
                    },
                    targets: 6,
                    orderable: true,
                    data: "created_at",
                },
                {
                    render: function (data, type, row) {
                        return pages.formatDateTime(data,'yyyy/mm/dd hh:nn:ss');
                    },
                    targets: 7,
                    orderable: true,
                    data: "updated_at",
                },
                {
                    render: function (data, type, row) {
                        return data;
                    },
                    targets: 8,
                    orderable: false,
                    data: "action",
                },
            ];

            var fnDrawCallback = function (oSettings) {
                var lightbox = GLightbox({
                    selector: '.image-popup',
                    title: false,
                });
            };

            var opts = {
                fnDrawCallback: fnDrawCallback,
                searching: true,
                ordering: true,
            };

            pages.common.setupDataTable(
                "#product_tbl",
                "/products/list",
                aoColumns,
                columnDefs,
                opts
            );
        },
    },
});
