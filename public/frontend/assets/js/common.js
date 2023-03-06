$(function () {
    pages.common.init();
    $('.feather-date').click(function() {
        $(this).closest('.group').find('.input-daterange').focus();
    });
    // pages.common.setupDatepicker();
    // pages.common.setupTimepicker();
    // if (pages.isDefined($('.setupdatatable')) && $('.setupdatatable').length > 0) {
    //     $.each($('.setupdatatable'), function (key, value) {
    //         pages.common.setupDataTableAuto('#' + $(this).attr('id'));
    //     });
    // }
});


if (!pages) {
    var pages = {};
}
pages = $.extend(pages, {
    common: {
        isScrollLoading: false,
        typeLoadNotify: {'unread': 1, 'content': 2},
        startLoading: 0,
        maxLengthLoadNotify: 20,
        init: function () {
            var me = this;
        },
        isDefined: function( obj ){
            return typeof obj !== 'undefined' && obj !== null && obj !== undefined;
        },
        checkNumbericDecimal: function (selector) {
            selector.keypress(function (event) {
                var $this = $(this);
                if ((event.which != 46 || $this.val().indexOf('.') != -1) &&
                    ((event.which < 48 || event.which > 57) &&
                        (event.which != 0 && event.which != 8))) {
                    event.preventDefault();
                }

                var text = $(this).val();
                if ((event.which == 46) && (text.indexOf('.') == -1)) {
                    setTimeout(function () {
                        if ($this.val().substring($this.val().indexOf('.')).length > 3) {
                            $this.val($this.val().substring(0, $this.val().indexOf('.') + 3));
                        }
                    }, 1);
                }

                if ((text.indexOf('.') != -1) &&
                    (text.substring(text.indexOf('.')).length > 2) &&
                    (event.which != 0 && event.which != 8) &&
                    ($(this)[0].selectionStart >= text.length - 2)) {
                    event.preventDefault();
                }
            });

            selector.bind("paste", function (e) {
                var text = e.originalEvent.clipboardData.getData('Text');
                if ($.isNumeric(text)) {
                    if ((text.substring(text.indexOf('.')).length > 3) && (text.indexOf('.') > -1)) {
                        e.preventDefault();
                        $(this).val(text.substring(0, text.indexOf('.') + 3));
                    }
                } else {
                    e.preventDefault();
                }
            });
        },
        showTooltip: function (content, length) {
            if (!pages.isDefined(length)) {
                length = 20;
            }
            var result = content;
            if (result.length > length) {
                result = '<p data-toggle="tooltip" title="' + content + '">' + content.substr(0, 20) + '...</p>';
            }
            return result;
        },
        showLoading: function () {
            $('body').addClass("loading");
        },
        hideLoading: function () {
            $('body').removeClass("loading");
        },
        /**
         * format date Y/m/d
         * @param date
         * @returns {string}
         */
        formatDate: function (date) {
            if (pages.isDefined(date)) {
                var date = new Date(date);
                var month = date.getMonth() + 1;
                month = (month >= 10 ? month : '0' + month);
                return date.getFullYear() + '/' + month + '/' + (date.getDate() >= 10 ? date.getDate() : '0' + date.getDate());
            }
            return '';
        },
        setupDatepicker: function () {
            $('.datepicker').datepicker({
                autoclose: true,
                format: 'yyyy/mm/dd'
            }).keypress(function (event) {
                return ((event.keyCode || event.which) === 8 || (event.keyCode || event.which) === 46 ? true : false);
            });
        },

        setupTimepicker: function () {
            $('.timepicker').timepicker({
                showInputs: false
            });
        },

        executeSearchForm: function (formId, tableId) {
            var t = $('#' + tableId).DataTable();
            $("#" + formId + " [item-type=search]").each(function () {
                var value = $(this).val();
                var column = $(this).attr('mapping-column');
                t.column(column).search(value, false, false);
            });
            t.draw();
        },

        setupDataTable: function (selector, requestUrl, aoColumns, columnDefs, opts) {
            // Do nothing to an already setup table
            if ($(selector).hasClass('no-data') || $(selector).hasClass('setup')) {
                return;
            }
            var serial = false;
            if ($(selector).hasClass('serial')) {
                serial = true;
            }
            var scrollX = false;
            if (pages.isDefined(opts) && pages.isDefined(opts.scrollX)) {
                scrollX = opts.scrollX;
            }
            var order = [0, 'desc'];
            if (pages.isDefined(opts) && pages.isDefined(opts.order)) {
                order = opts.order;
            }
            var data_post = {};
            if (pages.isDefined(opts) && pages.isDefined(opts.data_post)) {
                data_post = opts.data_post;
            }
            var fixedColumns = {};
            if (pages.isDefined(opts) && pages.isDefined(opts.fixedColumns)) {
                fixedColumns = opts.fixedColumns;
            }
            var scrollCollapse = false;
            if (pages.isDefined(opts) && pages.isDefined(opts.scrollCollapse)) {
                scrollCollapse = opts.scrollCollapse;
            }
            var rowsGroup = false;
            if (pages.isDefined(opts) && pages.isDefined(opts.rowsGroup)) {
                rowsGroup = opts.rowsGroup;
            }
            var pageLength = 10;
            if (pages.isDefined(opts) && pages.isDefined(opts.pageLength)) {
                pageLength = opts.pageLength;
            }
            var lengthMenu = [10, 20, 50, 100];
            if (pages.isDefined(opts) && pages.isDefined(opts.pageLength)) {
                lengthMenu = opts.lengthMenu;
            }
            var autoWidth = false;
            if (pages.isDefined(opts) && pages.isDefined(opts.autoWidth)) {
                autoWidth = opts.autoWidth;
            }
            var ordering = true;
            if ($(selector).hasClass('no-ordering')) {
                ordering = false;
            }
            var optionAjax = {
                "url": requestUrl,
                "dataType": "json",
                "silent": true,
                "silent_sp": true,
                "data": data_post
            };
            $(selector).addClass('setup');
			var searching = true;
            if (pages.isDefined(opts) && pages.isDefined(opts.searching)) {
                searching = opts.searching;
            }
            var lengthChange = true;
            if (pages.isDefined(opts) && pages.isDefined(opts.lengthChange)) {
                lengthChange = opts.lengthChange;
            }

            var option = {
                "processing": true,
                "serverSide": true,
                "searching": searching,
                "lengthChange": lengthChange,
                "bRetrieve": true,
                "scrollCollapse": scrollCollapse,
                "scrollX": scrollX,
                "order": order,
                "bSort": ordering,
                "lengthMenu": lengthMenu,
                "language": {
                    oPaginate: {sFirst: "Đầu", sLast: "Cuối", sNext: "Sau", sPrevious: "Trước"},
                    sEmptyTable: "Không có dữ liệu trong bảng",
                    sInfo: "Hiển thị từ _START_ đến _END_ của _TOTAL_",
                    sInfoEmpty: "Không có dữ liệu trong bảng",
                    sInfoFiltered: "",
                    sProcessing: "Đang xử lý...",
                    sZeroRecords: "Không tìm thấy kết quả"
                },
                "pageLength": pageLength,
                "autoWidth": autoWidth,
                "ajax": optionAjax,
                "aoColumns": aoColumns,
                "columnDefs": columnDefs,
                "rowsGroup": rowsGroup,
                "fixedColumns": fixedColumns,
                "sDom": 't<"row"<"col-sm-12 col-md-5"i>r<"col-sm-12 col-md-7"p>>',
                "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                    if( serial === true ){
                        $("td:first", nRow).html(iDisplayIndex +1);
                        return nRow;

                    }
                }
            };
            if (pages.isDefined(opts) && pages.isDefined(opts.dom)) {
                option['dom'] = opts.dom;
            }
            if (pages.isDefined(opts) && pages.isDefined(opts.responsive)) {
                option['responsive'] = opts.responsive;
            }
            $(selector).DataTable(option);
        },
        setupDataTableAuto: function (tableId) {
            var t = $(tableId).dataTable({
                "searching": false,
                "order": [],
                "ordering": false,
                'paging': false,
                "info": false
            });
        },
    },
    isDefined: function (obj) {
        return typeof obj !== 'undefined' && obj !== null && obj !== undefined;
    },
    isInArray: function (value, array) {
        return array.indexOf(value) > -1;
    },
    truncate: function (str, start, length) {
        if (pages.isDefined(str)) {
            return str.substr(start, length);
        }
        return '';
    },
    addCommas: function (nStr, point ) {
        if( point == undefined ){
            point = ',';
        }
        nStr += '';
        var x = nStr.split('.');
        var x1 = x[0];
        var x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + point + '$2');
        }
        return x1 + x2;
    },
    formatDateTime: function (date, mask, force) {
        if (!date) return '';
        if (force !== undefined && force == true) {
            date = date.replace(/-/gi, '/');
        }
        if (typeof date === 'string') {
            date = new Date(date);
        }

        return mask.replace(/(yyyy|ee|mm|dd|hh|nn|ss)/gi,
            function ($1) {
                switch ($1.toLowerCase()) {
                    case 'yyyy':
                        return date.getFullYear();
                    case 'ee':
                        return date.getFullYear() % 100;
                    case 'mm':
                        return ('0' + (date.getMonth() + 1)).slice(-2);
                    case 'dd':
                        return ('0' + date.getDate()).slice(-2);
                    case 'hh':
                        return ('0' + (hour = date.getHours() % 24)).slice(-2);
                    case 'nn':
                        return ('0' + date.getMinutes()).slice(-2);
                    case 'ss':
                        return ('0' + date.getSeconds()).slice(-2);
                }
            }
        );
    },
    htmlEncode: function (html) {
        return document.createElement('a').appendChild(
            document.createTextNode(html)
        ).parentNode.innerHTML;
    },
    htmlDecode: function (html) {
        var a = document.createElement('a');
        a.innerHTML = html;
        return a.textContent;
    },
    truncateData: function (data, length) {
        var result = "";
        if (pages.isDefined(data)) {
            if (data.length > length) {
                var full_data = data.replace(/'/g, "&#39;");
                result = "<span rel='tooltip' title='" + full_data + "'>" + data.substr(0, length) + "...</span>";
            } else {
                result = data;
            }
        }
        return result;
    },
    isValidDate: function (date) {// format: yyyy/mm/dd
        var bits = date.split('/');
        var d = new Date(bits[0] + '/' + bits[1] + '/' + bits[2]);
        return !!(d && (d.getMonth() + 1) == bits[1] && d.getDate() == Number(bits[2]));
    },
    stringToSlug: function (str) {
        str = str.toLowerCase();     
     
        // xóa dấu
        str = str.replace(/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/g, 'a');
        str = str.replace(/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/g, 'e');
        str = str.replace(/(ì|í|ị|ỉ|ĩ)/g, 'i');
        str = str.replace(/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/g, 'o');
        str = str.replace(/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/g, 'u');
        str = str.replace(/(ỳ|ý|ỵ|ỷ|ỹ)/g, 'y');
        str = str.replace(/(đ)/g, 'd');
     
        // Xóa ký tự đặc biệt
        str = str.replace(/([^0-9a-z-\s])/g, '');
     
        // Xóa khoảng trắng thay bằng ký tự -
        str = str.replace(/(\s+)/g, '-');
     
        // xóa phần dự - ở đầu
        str = str.replace(/^-+/g, '');
     
        // xóa phần dư - ở cuối
        str = str.replace(/-+$/g, '');
     
        // return
        return str;
    },
    getUrlParameter: function (sParam) {
        var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;
        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return typeof sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
        return false;
    },
});
