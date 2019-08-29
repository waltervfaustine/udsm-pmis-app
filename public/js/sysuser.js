$(document).ready(function () {
    if ($('#sysuser_alert_message').is(':visible')) {
        setTimeout(function () {
            $("#sysuser_alert_message").fadeOut('slow');
        }, 2000);
    }
})