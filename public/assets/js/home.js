$(document).ready( function () {
    // JS code to submit Contact Form data.
    $('body').on('click','#contact-from-submit', function () {
        $.ajax({
            url: "/submit-contact-from",
            method: "post",
            data: $('body').find('#contact-form').serialize(),
            success: function (res) {
                console.log(res);
            },
            error: function (err) {
                console.log(err);
            }
        });
    });
    // JS code to submit Contact Form data ends.
});

$(document).scroll(function() {
    if($(this).scrollTop()+100 >= $('#home').position().top && $(this).scrollTop()+100 < $('#about').position().top) {
        $('body').find('nav ul li.nav-item').removeClass('active');
        $('body').find('#home_id').addClass('active');
    } else if($(this).scrollTop()+100 >= $('#about').position().top && $(this).scrollTop()+100 < $('#client').position().top) {
        $('body').find('nav ul li.nav-item').removeClass('active');
        $('body').find('#about_id').addClass('active');
    } else if($(this).scrollTop()+100 >= $('#client').position().top && $(this).scrollTop()+100 < $('#contact').position().top) {
        $('body').find('nav ul li.nav-item').removeClass('active');
        $('body').find('#client_id').addClass('active');
    } else if($(this).scrollTop()+120 >= $('#contact').position().top) {
        $('body').find('nav ul li.nav-item').removeClass('active');
        $('body').find('#contact_id').addClass('active');
    }
});