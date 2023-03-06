$(function () {
    pages.constant.init();
});

if (!pages) {
    var pages = {};
}
pages = $.extend(pages, {
    constant: {
        country:{
            1: 'Vietnamese',
            2: 'English',
            3: 'Thailand',
            4: 'Japanese'
        },
        init: function () {
        },
        CODE_SUCCESS: '1',
        CODE_NO_ERROR: '0',
        CODE_HAS_ERROR: '-1',
        
    }
});
