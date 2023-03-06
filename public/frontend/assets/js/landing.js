// JavaScript Document
jQuery(document).ready(function ($) {
    // set up event close model
    $('.close-modal').click(function () {
        $(this).closest('.modal-content').addClass('hidden');
        $("#video-founder").attr("src", "");
    });
    $(document).on('click', '.show-video-modal', function () {
        var source = $(this).attr('data-video');
        if( source !== undefined && source != null ) {
            var div_element = document.createElement("div");
            div_element.setAttribute('data-video',source);
            var big = null;
            div_element.onclick = function(e) {
                big = BigPicture({
                    el: e.target,
                    dimensions: [1920, 1080],
                    ytSrc: e.target.getAttribute('data-video'),
                });
            };
            div_element.click();
            document.getElementById("bp_container").onclick = function(e ){
                if( big != null ){
                    if( e.target.getAttribute('class') != 'bp-x'){
                        return false;
                    } else {
                        big.close();
                    }
                }
            }
        }
    });

    $(document).on('click', '.register-btn', function () {
        var href = $(this).data('href');
        window.location.href = href;
    });

    var course_id = $("#lesson").data('course_id');
    var lesson_id = $("#lesson").data('video_id');
    var key_user = $("#key_user").data('key_user');
    if($("#no_tracking").data('no_tracking') == false ){
        callSetupVideo(course_id, lesson_id, key_user);
    }
    function updateTrackingVideo(currentTime, status, course_id, lesson_id, key_user) {
        $.ajax({
            type: "POST",
            url: '/lp/update-tracking-video',
            data: {
                'course_id': course_id,
                'lesson_id': lesson_id,
                'current_time': currentTime,
                'key_user': key_user,
                'status': status,
            },
            dataType: 'json',
            success: function (result) {
                if (result.Code === pages.constant.CODE_SUCCESS) {
                    // console.log(result.Code)
                }
            }
        });
    }
    // landing page video demo
    function callSetupVideo(course_id, lesson_id, key_user) {
        var video = document.getElementById('video_demo');
        var supposedCurrentTime = 0;
        var maxCurrentTime = 0;
        var timeCheck10s = 10;
        var timeCheck = 0;
        var flag = 0;
        var currentTimeVideo = 0;
        if ($('#current_time').attr('data-current_time')) {
            var temp_current_time = $("#current_time").data('current_time');
            if ( temp_current_time !== 'undefined' || temp_current_time !== null) {
                currentTimeVideo = parseInt(temp_current_time);
                maxCurrentTime = currentTimeVideo;
            }
        }
        var ua = navigator.userAgent.toLowerCase();
        if (ua.indexOf('safari') != -1) {
            if (ua.indexOf('chrome') > -1) {
                video.currentTime = currentTimeVideo;
            } else {
                video.addEventListener("canplay", function() {
                    video.currentTime = currentTimeVideo;
                });
            }
        }
        video.addEventListener('timeupdate', function () {
            if (!video.seeking) {
                if ((video.currentTime < video.duration)) {
                    timeCheck = video.currentTime - flag;
                    if (timeCheck > timeCheck10s) {
                        flag = flag + timeCheck;
                        updateTrackingVideo(video.currentTime, 2, course_id, lesson_id, key_user);
                    }
                }
                supposedCurrentTime = video.currentTime;
            }
        });
        video.addEventListener('seeking', function () {
            if (maxCurrentTime <= supposedCurrentTime) {
                maxCurrentTime = supposedCurrentTime;
            }
            var delta = video.currentTime - supposedCurrentTime;
            if (maxCurrentTime >= supposedCurrentTime) {
                delta = video.currentTime - maxCurrentTime;
            }
            if (delta > 0) {
                video.currentTime = supposedCurrentTime;
            }
        });
        // delete the following event handler if rewind is not required
        video.addEventListener('ended', function () {
            updateTrackingVideo(video.currentTime, 1, course_id, lesson_id, key_user);
        });
        video.onpause = function() {
            if (timeCheck > timeCheck10s) {
                updateTrackingVideo(video.currentTime, 2, course_id, lesson_id, key_user);
            }
        };
        $(window).on('beforeunload', function(){
            if (timeCheck > 1) {
                updateTrackingVideo(video.currentTime, 2, course_id, lesson_id, key_user);
            }
        });
    }
});
