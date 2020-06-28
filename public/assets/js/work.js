$(document).ready(function() {
    var work_type = $('body').find('#work_type').val().length !== 0 ? $('body').find('#work_type').val() : "";

    // JS code to change header highlight for WORK Page.
    $('body').find('ul.navbar-nav li').removeClass('active');
    $('body').find('ul.navbar-nav li#work_id').addClass('active');

    if(work_type === "2d-animations") {
        $('body').find('ul.navbar-nav li#work_id .dropdown-menu .dropdown-item:eq(0)').addClass('active');
    } else if(work_type === "3d-animations") {
        $('body').find('ul.navbar-nav li#work_id .dropdown-menu .dropdown-item:eq(1)').addClass('active');
    } else if(work_type === "films") {
        $('body').find('ul.navbar-nav li#work_id .dropdown-menu .dropdown-item:eq(2)').addClass('active');
    }
    // JS code to change header highlight for WORK Page ends.

    // JS code to open Animation / Film Video on click of work image.
    $('body').on('click', '.work-img-redirect', function() {
        var video_url = $(this).data('video-url').length !== 0 ? $(this).data('video-url') : "";
        var video_title = $(this).data('video-title').length !== 0 ? $(this).data('video-title') : "";
        var video_desc = $(this).data('video-description').length !== 0 ? $(this).data('video-description') : "";

        if(video_url.length !== 0 && video_title.length !== 0) {
            $('body').find('#work_video_modal .modal-title').text(video_title);
            $('body').find('#work_video_modal .video-modal-block video source').attr('src',video_url);
            $('body').find('#work_video_modal .video-desc-text').text(video_desc);
            $('body').find('#work_video_modal').modal('show');
        } else {
            console.log("Insufficient data for WORK Video Modal functionality!");
        }
    });
    // JS code to open Animation / Film Video on click of work image ends.

    // JS code to "LOAD MORE" work data from AJAX request.
    $('body').on('click', '.load-more', function() {
        start_data = $('body').find('.work-display img.work-img').length !== 0 ? $('body').find('.work-display img.work-img').length : 0;
        
        $.ajax({
            url: "/work-ajax",
            method: "get",
            data: {
                'start' :   start_data,
                'type'  :   work_type
            },
            success: function (res) {
                if(res.code === "success") {
                    work_html = res.data.length !== 0 ? res.data : '';
                    work_html = work_html + '<div class="load-more-content"></div>';
                    $('body').find('.work-display .load-more-content').replaceWith(work_html);
                } else {
                    $('body').find('.work-display .load-more').addClass('hide');
                }
            },
            error: function (err) {
                console.log(err);
            }
        });
    });
    // JS code to "LOAD MORE" work data from AJAX request ends.
});