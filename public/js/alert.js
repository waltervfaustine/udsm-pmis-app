$(document).ready(function () {    
    if ($('#rec_login_news_alert').is(':visible')) {
        setTimeout(function () {
            $("#rec_login_news_alert").fadeOut('slow');
        }, 2000);
    }

    if ($('#public_login_news_alert').is(':visible')) {
        setTimeout(function () {
            $("#public_login_news_alert").fadeOut('slow');
        }, 2000);
    }

    if ($('#admin_login_news_alert').is(':visible')) {
        setTimeout(function () {
            $("#admin_login_news_alert").fadeOut('slow');
        }, 2000);
    }

    if ($('#fogpass_login_news_alert').is(':visible')) {
        setTimeout(function () {
            $("#fogpass_login_news_alert").fadeOut('slow');
        }, 3000);
    }

    if ($('#changepass_login_news_alert').is(':visible')) {
        setTimeout(function () {
            $("#changepass_login_news_alert").fadeOut('slow');
        }, 3000);
    }

    if ($('#chpassop_login_news_alert').is(':visible')) {
        setTimeout(function () {
            $("#chpassop_login_news_alert").fadeOut('slow');
        }, 3000);
    }
});

