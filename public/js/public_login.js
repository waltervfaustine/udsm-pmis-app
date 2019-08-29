$(document).ready(function () {
    if ($('#public-alert').is(':visible')) {
        setTimeout(function () {
            $("#public-alert").fadeOut('slow');
        }, 2000);
    }

    // $('#add_tenderer_information').attr("disabled", "disabled");

    // document.getElementById("add_tenderer_information").disabled = true;
})

var decl = [
    tender_user_reg_information = {
        email_id: document.getElementById("stakeholder_email"),
        passcode_id: document.getElementById("stakeholder_passcode"),
        stakeholder_login: document.getElementById("stakeholder_login"),
        public_login_news_alert: document.getElementById("public_login_news_alert"),
    },

    mood = {
        mood1: " ☹",
        mood2: " ☹",
        mood3: " ☺",
        mood4: " ☻",
        mood5: "Please Insert a number ☹"
    },

    melan = {
        lower: /[a-z]/g,
        upper: /[A-Z]/g,
        symbol: /[\W_]/,
        num: /[0-9]/g
    },

    cainam = {
        nulla: 0,
        primus: 1,
        secundus: 2,
        tertius: 3,
        quartus: 4
    },
]

var implementum = [
    {
        checkLoginCredentials: function () {
            decl[0].email_id.addEventListener("keyup", validateEmailFormat);

            function validateEmailFormat() {
                var email_format = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

                if (decl[0].email_id.value.length < 1) {
                    decl[0].public_login_news_alert.style.display = "none";
                    decl[0].email_id.style.border = "";
                } else {
                    if (decl[0].email_id.value.match(email_format)) {
                        decl[0].public_login_news_alert.style.display = "none";
                        decl[0].public_login_news_alert.innerHTML = "";
                        decl[0].email_id.style.border = "";
                    } else {
                        decl[0].email_id.style.border = "2px solid red";
                        decl[0].public_login_news_alert.style.display = "block";
                        decl[0].public_login_news_alert.innerHTML = "Wrong email format, please check it again eg: cainam@gmail.com";
                    }
                }
            }
        }
    },
]

decl[0].email_id.onfocus = function () {
    console.log("Email is SELECTED");
    implementum[0].checkLoginCredentials(decl[0].email_id);
};

decl[0].passcode_id.onfocus = function () {
    console.log("Password is SELECTED");
    implementum[0].checkLoginCredentials(decl[0].passcode_id);
};

decl[0].email_id.onblur = function () {
    console.log("Email is SELECTED");
    implementum[0].checkLoginCredentials(decl[0].email_id);
};

decl[0].passcode_id.onblur = function () {
    console.log("Password is SELECTED");
    implementum[0].checkLoginCredentials(decl[0].passcode_id);
};





