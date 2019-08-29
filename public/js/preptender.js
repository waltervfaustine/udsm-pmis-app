$(document).ready(function() {
    if ($('#preptender_message_div').is(':visible')) {
        setTimeout(function () {
            $("#preptender_message_div").fadeOut('slow');
        }, 2000);
    }
});