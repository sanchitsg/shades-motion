$(document).ready( function () {
    var tab_id = "";
    var scroll_add = -100;

    scrollToTab();

    // JS Code to redirect to HOME Page on click of Navbar Menu Item.
    $('body').on('click', '.section-nav .navbar-nav .home-link', function() {
        var tab = $(this).data('tab-id').length !== 0 ? $(this).data('tab-id') : "";
        var redirect_url = "";
        
        if(tab.length !== 0) {
            sessionStorage.setItem("tab_id",tab);
            redirect_url = window.location.protocol + "//" + window.location.hostname + (window.location.port.length !== 0 ? ":" + window.location.port : "") + "/";
        } else {
            console.log("Undefined navigation tab!");
        }

        if(window.location.href !== redirect_url) {
            window.location.href = redirect_url;
        } else {
            scrollToTab();
        }
    });
    // JS Code to redirect to HOME Page on click of Navbar Menu Item ends.
});

// JS Code to scroll to respective div on click of Navbar Menu Item.
function scrollToTab() {
    if(sessionStorage.getItem("tab_id") !== null) {
        tab_id = sessionStorage.getItem("tab_id").length !== 0 ? sessionStorage.getItem("tab_id") : "";
        if(tab_id.length !== 0) {
            scroll_add = tab_id !== "home" ? 300 : -100;
            $('html, body').animate({
                scrollTop: $("#" + tab_id).offset().top + scroll_add
            },1000);
            sessionStorage.clear();
        }
    }
}
// JS Code to scroll to respective div on click of Navbar Menu Item ends.