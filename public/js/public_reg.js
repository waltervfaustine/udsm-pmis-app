$(document).ready(function () {
    if ($('#public_news_alert').is(':visible')) {
        setTimeout(function () {
            $("#public_news_alert").fadeOut('slow');
        }, 2000);
    }

    // $('#add_tenderer_information').attr("disabled", "disabled");

    // document.getElementById("add_tenderer_information").disabled = true;
})

var decl = [
    tender_user_reg_information = {
        tendercategory_id: document.getElementById("tbreg_category"),
        firstname_id: document.getElementById("tbcreg_firstname"),
        middlename_id: document.getElementById("tbcreg_middlename"),
        lastname_id: document.getElementById("tbcreg_lastname"),
        email_id: document.getElementById("tbcreg_email"),
        phonecall_id: document.getElementById("tbcreg_phonecall"),
        gender_id: document.getElementById("tbcreg_gender"),
        username_id: document.getElementById("tbcreg_username"),
        passcode_id: document.getElementById("tbcreg_passcode"),
        confirm_oasscode_id: document.getElementById("tbcreg_passcode_confirm"),
        id_card_id: document.getElementById("tbcreg_idcard"),
        id_card_type_id: document.getElementById("tbcreg_idcard_type"),
        agree_id: document.getElementById("tbcreg_agree"),
        add_tenderer_information: document.getElementById("add_tenderer_information"),
        public_news_alert: document.getElementById("public_news_alert"),
        password_message: document.getElementById("password_message"),
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
        firstLetterToCaps: function (implementumID) {
            implementumID.addEventListener("keyup", changeFirstLetterToUpper);
            function changeFirstLetterToUpper() {
                decl[0].firstname_id.value = decl[0].firstname_id.value.charAt(0).toUpperCase() + decl[0].firstname_id.value.slice(1).toLowerCase();
                decl[0].middlename_id.value = decl[0].middlename_id.value.charAt(0).toUpperCase() + decl[0].middlename_id.value.slice(1).toLowerCase();
                decl[0].lastname_id.value = decl[0].lastname_id.value.charAt(0).toUpperCase() + decl[0].lastname_id.value.slice(1).toLowerCase();

                if(implementumID == decl[0].firstname_id) {
                    if(decl[0].firstname_id.value.length >= 1 && decl[0].middlename_id.value.length == 0 && decl[0].lastname_id.value.length == 0) {
                        if (decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Firstname can not contain special symbols or numbers";
                            decl[0].firstname_id.style.border = "2px solid red";
                            decl[0].middlename_id.style.border = "";
                            decl[0].lastname_id.style.border = "";
                            console.log("Firstname is BAD");
                        } else if (!decl[0].firstname_id.value.match(decl[2].symbol) || !decl[0].firstname_id.value.match(decl[2].num)){
                            console.log("Firstname is GOOD");
                            decl[0].public_news_alert.style.display = "none";
                            decl[0].public_news_alert.innerHTML = "";
                            decl[0].firstname_id.style.border = "";
                        }
                    } else if (decl[0].firstname_id.value.length == 0 && decl[0].middlename_id.value.length >= 1 && decl[0].lastname_id.value.length == 0) {
                        if (decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num)) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Middlename can not contain special symbols or numbers";
                            decl[0].middlename_id.style.border = "2px solid red";
                            decl[0].firstname_id.style.border = "";
                            decl[0].lastname_id.style.border = "";
                            console.log("Middlename is BAD");
                        } else if (!decl[0].middlename_id.value.match(decl[2].symbol) || !decl[0].middlename_id.value.match(decl[2].num)) {
                            decl[0].public_news_alert.style.display = "none";
                            decl[0].public_news_alert.innerHTML = "";
                            decl[0].middlename_id.style.border = "";
                            console.log("Middlename is GOOD");
                        }
                    } else if (decl[0].firstname_id.value.length == 0 && decl[0].middlename_id.value.length == 0 && decl[0].lastname_id.value.length >= 0) {
                        if (decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num)) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Middlename can not contain special symbols or numbers";
                            decl[0].lastname_id.style.border = "2px solid red";
                            console.log("Lastname is BAD");
                        } else if (!decl[0].lastname_id.value.match(decl[2].symbol) || !decl[0].lastname_id.value.match(decl[2].num)) {
                            decl[0].public_news_alert.style.display = "none";
                            decl[0].public_news_alert.innerHTML = "";
                            decl[0].lastname_id.style.border = "";
                            decl[0].firstname_id.style.border = "";
                            decl[0].middlename_id.style.border = "";
                            console.log("Lastname is GOOD");
                        }
                    } else if (decl[0].firstname_id.value.length >= 1 && decl[0].middlename_id.value.length >= 1 && decl[0].lastname_id.value.length == 0) {
                        decl[0].lastname_id.style.border = "";
                        if ((decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) && 
                            (decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Firstname and Middlename can not contain special symbols or numbers";
                            decl[0].firstname_id.style.border = "2px solid red";
                            decl[0].middlename_id.style.border = "2px solid red";
                            decl[0].lastname_id.style.border = "";
                            console.log("Firstname and Middlename is BAD");
                        } else if (!(decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            (decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Middlename can not contain special symbols or numbers";
                            decl[0].middlename_id.style.border = "2px solid red";
                            console.log("Firstname is GOOD and Middlename is BAD");
                        } else if ((decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            !(decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Firstname can not contain special symbols or numbers";
                            decl[0].firstname_id.style.border = "2px solid red";
                            decl[0].middlename_id.style.border = "";
                            console.log("Firstname is BAD and Middlename is GOOD");
                        } else if (!(decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            !(decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "none";
                            decl[0].public_news_alert.innerHTML = "";
                            decl[0].firstname_id.style.border = "";
                            decl[0].middlename_id.style.border = "";
                            console.log("Firstname is GOOD and Middlename is GOOD");
                        }
                    } else if (decl[0].firstname_id.value.length >= 1 && decl[0].middlename_id.value.length == 0 && decl[0].lastname_id.value.length >= 1) {
                        decl[0].middlename_id.style.border = "";
                        if ((decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            (decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Firstname and Lastname can not contain special symbols or numbers";
                            decl[0].firstname_id.style.border = "2px solid red";
                            decl[0].lastname_id.style.border = "2px solid red";
                            console.log("Firstname and Lastname is BAD");
                        } else if (!(decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            (decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Lastname can not contain special symbols or numbers";
                            decl[0].lastname_id.style.border = "2px solid red";
                            console.log("Firstname is GOOD and Lastname is BAD");
                        } else if ((decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            !(decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Firstname can not contain special symbols or numbers";
                            decl[0].firstname_id.style.border = "2px solid red";
                            decl[0].lastname_id.style.border = "";
                            console.log("Firstname is BAD and Lastname is GOOD");
                        } else if (!(decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            !(decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "none";
                            decl[0].public_news_alert.innerHTML = "";
                            decl[0].firstname_id.style.border = "";
                            decl[0].lastname_id.style.border = "";
                            decl[0].middlename_id.style.border = "";
                            console.log("Firstname is GOOD and Lastname is GOOD");
                        }
                    } else if (decl[0].firstname_id.value.length == 0 && decl[0].middlename_id.value.length >= 1 && decl[0].lastname_id.value.length >= 1) {
                        decl[0].firstname_id.style.border = "";
                        decl[0].firstname_id.style.border = "";
                        if ((decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num)) &&
                            (decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Middlename and Lastname can not contain special symbols or numbers";
                            decl[0].middlename_id.style.border = "2px solid red";
                            decl[0].lastname_id.style.border = "2px solid red";
                            console.log("Middlename and Lastname is BAD");
                        } else if (!(decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num)) &&
                            (decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Lastname can not contain special symbols or numbers";
                            decl[0].lastname_id.style.border = "2px solid red";
                            console.log("Middlename is GOOD and Lastname is BAD");
                        } else if ((decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num)) &&
                            !(decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Middlename can not contain special symbols or numbers";
                            decl[0].middlename_id.style.border = "2px solid red";
                            console.log("Middlename is BAD and Lastname is GOOD");
                        } else if (!(decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num)) &&
                            !(decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "none";
                            decl[0].public_news_alert.innerHTML = "";
                            decl[0].middlename_id.style.border = "";
                            decl[0].lastname_id.style.border = "";
                            console.log("Middlename is GOOD and Lastname is GOOD");
                        }
                    } else if (decl[0].firstname_id.value.length >= 1 && decl[0].middlename_id.value.length >= 1 && decl[0].lastname_id.value.length >= 1) {
                        if (!(decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            (decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num)) &&
                            (decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Middlename and Lastname can not contain special symbols or numbers";
                            decl[0].middlename_id.style.border = "2px solid red";
                            decl[0].lastname_id.style.border = "2px solid red";
                            decl[0].firstname_id.style.border = "";
                            console.log("Firstname is GOOD, Middlename is BAD and Lastname is BAD");
                        } else if ((decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            !(decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num)) &&
                            (decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Lastname can not contain special symbols or numbers";
                            decl[0].lastname_id.style.border = "2px solid red";
                            console.log("Firstname is GOOD, Middlename is GOOD and Lastname is BAD");
                        } else if ((decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            (decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num)) &&
                            !(decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Firstname and Middlename can not contain special symbols or numbers";
                            decl[0].firstname_id.style.border = "2px solid red";
                            decl[0].middlename_id.style.border = "2px solid red";
                            decl[0].lastname_id.style.border = "";
                            console.log("Firstname is BAD, Middlename is BAD and Lastname is GOOD");
                        } else if (!(decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            !(decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num)) &&
                            (decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Lastname can not contain special symbols or numbers";
                            decl[0].lastname_id.style.border = "2px solid red";
                            decl[0].firstname_id.style.border = "";
                            decl[0].middlename_id.style.border = "";
                            console.log("Firstname is GOOD, Middlename is GOOD and Lastname is BAD");
                        } else if (!(decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            (decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num)) &&
                            !(decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Middlename can not contain special symbols or numbers";
                            decl[0].middlename_id.style.border = "2px solid red";
                            decl[0].firstname_id.style.border = "";
                            decl[0].lastname_id.style.border = "";
                            console.log("Firstname is GOOD, Middlename is BAD and Lastname is GOOD");
                        } else if((decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            !(decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num)) &&
                            !(decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Firstname can not contain special symbols or numbers";
                            decl[0].firstname_id.style.border = "2px solid red";
                            decl[0].middlename_id.style.border = "";
                            decl[0].lastname_id.style.border = "";
                            console.log("Firstname is BAD, Middlename is GOOD and Lastname is GOOD");
                        } else if(!(decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            !(decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num)) &&
                            !(decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num)))
                            {
                            decl[0].public_news_alert.style.display = "none";
                            decl[0].public_news_alert.innerHTML = "";
                            decl[0].firstname_id.style.border = "";
                            decl[0].middlename_id.style.border = "";
                            decl[0].lastname_id.style.border = "";
                            console.log("Firstname is GOOD, Middlename is GOOD and Lastname is GOOD");
                        } else if ((decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            (decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num)) &&
                            (decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            console.log("Firstname is BAD, Middlename is BAD and Lastname is BAD");
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Firstname, Middlename, Lastname can not contain special symbols or numbers";
                            decl[0].firstname_id.style.border = "2px solid red";
                            decl[0].middlename_id.style.border = "2px solid red";
                            decl[0].lastname_id.style.border = "2px solid red";
                        }
                    } else if (decl[0].firstname_id.value.length == 0 || decl[0].middlename_id.value.length == 0 || decl[0].lastname_id.value.length == 0) {
                        decl[0].public_news_alert.style.display = "none";
                        decl[0].public_news_alert.innerHTML = "";
                        decl[0].firstname_id.style.border = "";
                        decl[0].middlename_id.style.border = "";
                        decl[0].lastname_id.style.border = "";
                    }
                } else if (implementumID == decl[0].middlename_id) {
                    if (decl[0].firstname_id.value.length >= 1 && decl[0].middlename_id.value.length == 0 && decl[0].lastname_id.value.length == 0) {
                        if (decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Firstname can not contain special symbols or numbers";
                            decl[0].firstname_id.style.border = "2px solid red";
                            console.log("Firstname is BAD");
                        } else if (!decl[0].firstname_id.value.match(decl[2].symbol) || !decl[0].firstname_id.value.match(decl[2].num)) {
                            console.log("Firstname is GOOD");
                            decl[0].public_news_alert.style.display = "none";
                            decl[0].public_news_alert.innerHTML = "";
                            decl[0].firstname_id.style.border = "";
                        }
                    } else if (decl[0].firstname_id.value.length == 0 && decl[0].middlename_id.value.length >= 1 && decl[0].lastname_id.value.length == 0) {
                        if (decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num)) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Middlename can not contain special symbols or numbers";
                            decl[0].middlename_id.style.border = "2px solid red";
                            console.log("Middlename is BAD");
                        } else if (!decl[0].middlename_id.value.match(decl[2].symbol) || !decl[0].middlename_id.value.match(decl[2].num)) {
                            decl[0].public_news_alert.style.display = "none";
                            decl[0].public_news_alert.innerHTML = "";
                            decl[0].middlename_id.style.border = "";
                            console.log("Middlename is GOOD");
                        }
                    } else if (decl[0].firstname_id.value.length == 0 && decl[0].middlename_id.value.length == 0 && decl[0].lastname_id.value.length >= 0) {
                        if (decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num)) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Middlename can not contain special symbols or numbers";
                            decl[0].lastname_id.style.border = "2px solid red";
                            decl[0].firstname_id.style.border = "";
                            decl[0].middlename_id.style.border = "";
                            console.log("Lastname is BAD");
                        } else if (!decl[0].lastname_id.value.match(decl[2].symbol) || !decl[0].lastname_id.value.match(decl[2].num)) {
                            decl[0].public_news_alert.style.display = "none";
                            decl[0].public_news_alert.innerHTML = "";
                            decl[0].lastname_id.style.border = "";
                            decl[0].firstname_id.style.border = "";
                            decl[0].middlename_id.style.border = "";
                            console.log("Lastname is GOOD");
                        }
                    } else if (decl[0].firstname_id.value.length >= 1 && decl[0].middlename_id.value.length >= 1 && decl[0].lastname_id.value.length == 0) {
                        decl[0].lastname_id.style.border = "";
                        if ((decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            (decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Firstname and Middlename can not contain special symbols or numbers";
                            decl[0].firstname_id.style.border = "2px solid red";
                            decl[0].middlename_id.style.border = "2px solid red";
                            decl[0].lastname_id.style.border = "";
                            console.log("Firstname and Middlename is BAD");
                        } else if (!(decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            (decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Middlename can not contain special symbols or numbers";
                            decl[0].middlename_id.style.border = "2px solid red";
                            console.log("Firstname is GOOD and Middlename is BAD");
                        } else if ((decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            !(decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Firstname can not contain special symbols or numbers";
                            decl[0].firstname_id.style.border = "2px solid red";
                            console.log("Firstname is BAD and Middlename is GOOD");
                        } else if (!(decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            !(decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "none";
                            decl[0].public_news_alert.innerHTML = "";
                            decl[0].firstname_id.style.border = "";
                            decl[0].middlename_id.style.border = "";
                            console.log("Firstname is GOOD and Middlename is GOOD");
                        }
                    } else if (decl[0].firstname_id.value.length >= 1 && decl[0].middlename_id.value.length == 0 && decl[0].lastname_id.value.length >= 1) {
                        decl[0].middlename_id.style.border = "";
                        if ((decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            (decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Firstname and Lastname can not contain special symbols or numbers";
                            decl[0].firstname_id.style.border = "2px solid red";
                            decl[0].lastname_id.style.border = "2px solid red";
                            console.log("Firstname and Lastname is BAD");
                        } else if (!(decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            (decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Lastname can not contain special symbols or numbers";
                            decl[0].lastname_id.style.border = "2px solid red";
                            console.log("Firstname is GOOD and Lastname is BAD");
                        } else if ((decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            !(decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Firstname can not contain special symbols or numbers";
                            decl[0].firstname_id.style.border = "2px solid red";
                            decl[0].lastname_id.style.border = "";
                            console.log("Firstname is BAD and Lastname is GOOD");
                        } else if (!(decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            !(decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "none";
                            decl[0].public_news_alert.innerHTML = "";
                            decl[0].firstname_id.style.border = "";
                            decl[0].lastname_id.style.border = "";
                            decl[0].middlename_id.style.border = "";
                            console.log("Firstname is GOOD and Lastname is GOOD");
                        }
                    } else if (decl[0].firstname_id.value.length == 0 && decl[0].middlename_id.value.length >= 1 && decl[0].lastname_id.value.length >= 1) {
                        decl[0].firstname_id.style.border = "";
                        if ((decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num)) &&
                            (decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Middlename and Lastname can not contain special symbols or numbers";
                            decl[0].middlename_id.style.border = "2px solid red";
                            decl[0].lastname_id.style.border = "2px solid red";
                            console.log("Middlename and Lastname is BAD");
                        } else if (!(decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num)) &&
                            (decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Lastname can not contain special symbols or numbers";
                            decl[0].lastname_id.style.border = "2px solid red";
                            console.log("Middlename is GOOD and Lastname is BAD");
                        } else if ((decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num)) &&
                            !(decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Middlename can not contain special symbols or numbers";
                            decl[0].middlename_id.style.border = "2px solid red";
                            console.log("Middlename is BAD and Lastname is GOOD");
                        } else if (!(decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num)) &&
                            !(decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "none";
                            decl[0].public_news_alert.innerHTML = "";
                            decl[0].middlename_id.style.border = "";
                            decl[0].lastname_id.style.border = "";
                            console.log("Middlename is GOOD and Lastname is GOOD");
                        }
                    } else if (decl[0].firstname_id.value.length >= 1 && decl[0].middlename_id.value.length >= 1 && decl[0].lastname_id.value.length >= 1) {
                        if (!(decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            (decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num)) &&
                            (decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Middlename and Lastname can not contain special symbols or numbers";
                            decl[0].middlename_id.style.border = "2px solid red";
                            decl[0].lastname_id.style.border = "2px solid red";
                            decl[0].firstname_id.style.border = "";
                            console.log("Firstname is GOOD, Middlename is BAD and Lastname is BAD");
                        } else if ((decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            !(decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num)) &&
                            (decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Lastname can not contain special symbols or numbers";
                            decl[0].lastname_id.style.border = "2px solid red";
                            decl[0].firstname_id.style.border = "";
                            decl[0].middlename_id.style.border = "";
                            console.log("Firstname is GOOD, Middlename is GOOD and Lastname is BAD");
                        } else if ((decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            (decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num)) &&
                            !(decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Firstname and Middlename can not contain special symbols or numbers";
                            decl[0].firstname_id.style.border = "2px solid red";
                            decl[0].middlename_id.style.border = "2px solid red";
                            decl[0].lastname_id.style.border = "";
                            console.log("Firstname is BAD, Middlename is BAD and Lastname is GOOD");
                        } else if (!(decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            !(decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num)) &&
                            (decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Lastname can not contain special symbols or numbers";
                            decl[0].lastname_id.style.border = "2px solid red";
                            decl[0].firstname_id.style.border = "";
                            decl[0].middlename_id.style.border = "";
                            console.log("Firstname is GOOD, Middlename is GOOD and Lastname is BAD");
                        } else if (!(decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            (decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num)) &&
                            !(decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Middlename can not contain special symbols or numbers";
                            decl[0].middlename_id.style.border = "2px solid red";
                            decl[0].firstname_id.style.border = "";
                            decl[0].lastname_id.style.border = "";
                            console.log("Firstname is GOOD, Middlename is BAD and Lastname is GOOD");
                        } else if ((decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            !(decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num)) &&
                            !(decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Firstname can not contain special symbols or numbers";
                            decl[0].firstname_id.style.border = "2px solid red";
                            decl[0].middlename_id.style.border = "";
                            decl[0].lastname_id.style.border = "";
                            console.log("Firstname is BAD, Middlename is GOOD and Lastname is GOOD");
                        } else if (!(decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            !(decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num)) &&
                            !(decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "none";
                            decl[0].public_news_alert.innerHTML = "";
                            decl[0].firstname_id.style.border = "";
                            decl[0].middlename_id.style.border = "";
                            decl[0].lastname_id.style.border = "";
                            console.log("Firstname is GOOD, Middlename is GOOD and Lastname is GOOD");
                        } else if ((decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            (decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num)) &&
                            (decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            console.log("Firstname is BAD, Middlename is BAD and Lastname is BAD");
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Firstname, Middlename, Lastname can not contain special symbols or numbers";
                            decl[0].firstname_id.style.border = "2px solid red";
                            decl[0].middlename_id.style.border = "2px solid red";
                            decl[0].lastname_id.style.border = "2px solid red";
                        }
                    } else if (decl[0].firstname_id.value.length == 0 || decl[0].middlename_id.value.length == 0 || decl[0].lastname_id.value.length == 0) {
                        decl[0].public_news_alert.style.display = "none";
                        decl[0].public_news_alert.innerHTML = "";
                        decl[0].firstname_id.style.border = "";
                        decl[0].middlename_id.style.border = "";
                        decl[0].lastname_id.style.border = "";
                    }
                } else if (implementumID == decl[0].lastname_id) {
                    if (decl[0].firstname_id.value.length >= 1 && decl[0].middlename_id.value.length == 0 && decl[0].lastname_id.value.length == 0) {
                        if (decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Firstname can not contain special symbols or numbers";
                            decl[0].firstname_id.style.border = "2px solid red";
                            console.log("Firstname is BAD");
                        } else if (!decl[0].firstname_id.value.match(decl[2].symbol) || !decl[0].firstname_id.value.match(decl[2].num)) {
                            console.log("Firstname is GOOD");
                            decl[0].public_news_alert.style.display = "none";
                            decl[0].public_news_alert.innerHTML = "";
                            decl[0].firstname_id.style.border = "";
                        }
                    } else if (decl[0].firstname_id.value.length == 0 && decl[0].middlename_id.value.length >= 1 && decl[0].lastname_id.value.length == 0) {
                        if (decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num)) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Middlename can not contain special symbols or numbers";
                            decl[0].middlename_id.style.border = "2px solid red";
                            console.log("Middlename is BAD");
                        } else if (!decl[0].middlename_id.value.match(decl[2].symbol) || !decl[0].middlename_id.value.match(decl[2].num)) {
                            decl[0].public_news_alert.style.display = "none";
                            decl[0].public_news_alert.innerHTML = "";
                            decl[0].middlename_id.style.border = "";
                            console.log("Middlename is GOOD");
                        }
                    } else if (decl[0].firstname_id.value.length == 0 && decl[0].middlename_id.value.length == 0 && decl[0].lastname_id.value.length >= 0) {
                        if (decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num)) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Middlename can not contain special symbols or numbers";
                            decl[0].lastname_id.style.border = "2px solid red";
                            console.log("Lastname is BAD");
                        } else if (!decl[0].lastname_id.value.match(decl[2].symbol) || !decl[0].lastname_id.value.match(decl[2].num)) {
                            decl[0].public_news_alert.style.display = "none";
                            decl[0].public_news_alert.innerHTML = "";
                            decl[0].lastname_id.style.border = "";
                            decl[0].firstname_id.style.border = "";
                            decl[0].middlename_id.style.border = "";
                            console.log("Lastname is GOOD");
                        }
                    } else if (decl[0].firstname_id.value.length >= 1 && decl[0].middlename_id.value.length >= 1 && decl[0].lastname_id.value.length == 0) {
                        decl[0].lastname_id.style.border = "";
                        if ((decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            (decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Firstname and Middlename can not contain special symbols or numbers";
                            decl[0].firstname_id.style.border = "2px solid red";
                            decl[0].middlename_id.style.border = "2px solid red";
                            decl[0].lastname_id.style.border = "";
                            console.log("Firstname and Middlename is BAD");
                        } else if (!(decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            (decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Middlename can not contain special symbols or numbers";
                            decl[0].middlename_id.style.border = "2px solid red";
                            console.log("Firstname is GOOD and Middlename is BAD");
                        } else if ((decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            !(decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Firstname can not contain special symbols or numbers";
                            decl[0].firstname_id.style.border = "2px solid red";
                            decl[0].middlename_id.style.border = "";
                            console.log("Firstname is BAD and Middlename is GOOD");
                        } else if (!(decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            !(decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "none";
                            decl[0].public_news_alert.innerHTML = "";
                            decl[0].firstname_id.style.border = "";
                            decl[0].middlename_id.style.border = "";
                            console.log("Firstname is GOOD and Middlename is GOOD");
                        }
                    } else if (decl[0].firstname_id.value.length >= 1 && decl[0].middlename_id.value.length == 0 && decl[0].lastname_id.value.length >= 1) {
                        decl[0].middlename_id.style.border = "";
                        if ((decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            (decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Firstname and Lastname can not contain special symbols or numbers";
                            decl[0].firstname_id.style.border = "2px solid red";
                            decl[0].lastname_id.style.border = "2px solid red";
                            console.log("Firstname and Lastname is BAD");
                        } else if (!(decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            (decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Lastname can not contain special symbols or numbers";
                            decl[0].lastname_id.style.border = "2px solid red";
                            console.log("Firstname is GOOD and Lastname is BAD");
                        } else if ((decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            !(decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Firstname can not contain special symbols or numbers";
                            decl[0].firstname_id.style.border = "2px solid red";
                            decl[0].lastname_id.style.border = "";
                            console.log("Firstname is BAD and Lastname is GOOD");
                        } else if (!(decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            !(decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "none";
                            decl[0].public_news_alert.innerHTML = "";
                            decl[0].firstname_id.style.border = "";
                            decl[0].lastname_id.style.border = "";
                            decl[0].middlename_id.style.border = "";
                            console.log("Firstname is GOOD and Lastname is GOOD");
                        }
                    } else if (decl[0].firstname_id.value.length == 0 && decl[0].middlename_id.value.length >= 1 && decl[0].lastname_id.value.length >= 1) {
                        decl[0].firstname_id.style.border = "";
                        if ((decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num)) &&
                            (decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Middlename and Lastname can not contain special symbols or numbers";
                            decl[0].middlename_id.style.border = "2px solid red";
                            decl[0].lastname_id.style.border = "2px solid red";
                            console.log("Middlename and Lastname is BAD");
                        } else if (!(decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num)) &&
                            (decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Lastname can not contain special symbols or numbers";
                            decl[0].lastname_id.style.border = "2px solid red";
                            console.log("Middlename is GOOD and Lastname is BAD");
                        } else if ((decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num)) &&
                            !(decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Middlename can not contain special symbols or numbers";
                            decl[0].middlename_id.style.border = "2px solid red";
                            console.log("Middlename is BAD and Lastname is GOOD");
                        } else if (!(decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num)) &&
                            !(decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "none";
                            decl[0].public_news_alert.innerHTML = "";
                            decl[0].middlename_id.style.border = "";
                            decl[0].lastname_id.style.border = "";
                            console.log("Middlename is GOOD and Lastname is GOOD");
                        }
                    } else if (decl[0].firstname_id.value.length >= 1 && decl[0].middlename_id.value.length >= 1 && decl[0].lastname_id.value.length >= 1) {
                        if (!(decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            (decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num)) &&
                            (decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Middlename and Lastname can not contain special symbols or numbers";
                            decl[0].middlename_id.style.border = "2px solid red";
                            decl[0].lastname_id.style.border = "2px solid red";
                            decl[0].firstname_id.style.border = "";
                            console.log("Firstname is GOOD, Middlename is BAD and Lastname is BAD");
                        } else if ((decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            !(decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num)) &&
                            (decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Lastname can not contain special symbols or numbers";
                            decl[0].lastname_id.style.border = "2px solid red";
                            console.log("Firstname is GOOD, Middlename is GOOD and Lastname is BAD");
                        } else if ((decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            (decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num)) &&
                            !(decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Firstname and Middlename can not contain special symbols or numbers";
                            decl[0].firstname_id.style.border = "2px solid red";
                            decl[0].middlename_id.style.border = "2px solid red";
                            decl[0].lastname_id.style.border = "";
                            console.log("Firstname is BAD, Middlename is BAD and Lastname is GOOD");
                        } else if (!(decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            !(decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num)) &&
                            (decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Lastname can not contain special symbols or numbers";
                            decl[0].lastname_id.style.border = "2px solid red";
                            decl[0].firstname_id.style.border = "";
                            decl[0].middlename_id.style.border = "";
                            console.log("Firstname is GOOD, Middlename is GOOD and Lastname is BAD");
                        } else if (!(decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            (decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num)) &&
                            !(decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Middlename can not contain special symbols or numbers";
                            decl[0].middlename_id.style.border = "2px solid red";
                            decl[0].firstname_id.style.border = "";
                            decl[0].lastname_id.style.border = "";
                            console.log("Firstname is GOOD, Middlename is BAD and Lastname is GOOD");
                        } else if ((decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            !(decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num)) &&
                            !(decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Firstname can not contain special symbols or numbers";
                            decl[0].firstname_id.style.border = "2px solid red";
                            decl[0].middlename_id.style.border = "";
                            decl[0].lastname_id.style.border = "";
                            console.log("Firstname is BAD, Middlename is GOOD and Lastname is GOOD");
                        } else if (!(decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            !(decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num)) &&
                            !(decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            decl[0].public_news_alert.style.display = "none";
                            decl[0].public_news_alert.innerHTML = "";
                            decl[0].firstname_id.style.border = "";
                            decl[0].middlename_id.style.border = "";
                            decl[0].lastname_id.style.border = "";
                            console.log("Firstname is GOOD, Middlename is GOOD and Lastname is GOOD");
                        } else if ((decl[0].firstname_id.value.match(decl[2].symbol) || decl[0].firstname_id.value.match(decl[2].num)) &&
                            (decl[0].middlename_id.value.match(decl[2].symbol) || decl[0].middlename_id.value.match(decl[2].num)) &&
                            (decl[0].lastname_id.value.match(decl[2].symbol) || decl[0].lastname_id.value.match(decl[2].num))) {
                            console.log("Firstname is BAD, Middlename is BAD and Lastname is BAD");
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Firstname, Middlename, Lastname can not contain special symbols or numbers";
                            decl[0].firstname_id.style.border = "2px solid red";
                            decl[0].middlename_id.style.border = "2px solid red";
                            decl[0].lastname_id.style.border = "2px solid red";
                        }
                    } else if (decl[0].firstname_id.value.length == 0 || decl[0].middlename_id.value.length == 0 || decl[0].lastname_id.value.length == 0) {
                        decl[0].public_news_alert.style.display = "none";
                        decl[0].public_news_alert.innerHTML = "";
                        decl[0].firstname_id.style.border = "";
                        decl[0].middlename_id.style.border = "";
                        decl[0].lastname_id.style.border = "";
                    }
                }
                // if (implementumID.value.length <= 0) {
                //     implementumID.style.border = ""
                //     decl[0].public_news_alert.style.display = "none";
                //     public_news_alert.style.display = "none";

                // } else {
                //     if (implementumID.value.match(decl[2].symbol) || implementumID.value.match(decl[2].num)) {
                //         console.log("Symbol and numbers are matched");
                //         decl[0].public_news_alert.style.display = "block";
                //         decl[0].public_news_alert.innerHTML = statusMSG;
                //         implementumID.style.border = "2px solid red"
                //     } else {
                //         implementumID.value = implementumID.value.charAt(0).toUpperCase() + implementumID.value.slice(1).toLowerCase();
                //         implementumID.style.border = ""
                //         decl[0].public_news_alert.style.display = "none";
                //     }
                // }
            }
        }
    },

    {
        validateEmailAddress: function () {
            decl[0].email_id.addEventListener("keyup", validateEmailFormat);

            function validateEmailFormat() {
                var email_format = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

                if (decl[0].email_id.value.length < 1) {
                    decl[0].public_news_alert.style.display = "none";
                    decl[0].email_id.style.border = "";
                } else {
                    if (decl[0].email_id.value.match(email_format)) {
                        decl[0].public_news_alert.style.display = "none";
                        decl[0].public_news_alert.innerHTML = "";
                        decl[0].email_id.style.border = "";
                    } else {
                        decl[0].email_id.style.border = "2px solid red";
                        decl[0].public_news_alert.style.display = "block";
                        decl[0].public_news_alert.innerHTML = "Wrong email format, please check it again eg: cainam@gmail.com";
                    }
                }
            }
        }
    },

    {
        validatePhoneNumber: function () {
            decl[0].phonecall_id.addEventListener("keyup", validatePhonenumberFormat);
            function validatePhonenumberFormat() {
                var phonenumber_format = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
                var intenational_format = /^\d{12}$/;

                if(decl[0].phonecall_id.value.length >= 1) {
                    if (decl[0].phonecall_id.value.match(decl[2].upper) || decl[0].phonecall_id.value.match(decl[2].lower)) {
                        decl[0].public_news_alert.style.display = "block";
                        decl[0].public_news_alert.innerHTML = "Phone number can contain numbers only";
                        decl[0].phonecall_id.style.border = "2px solid red";
                    }else {
                        if(decl[0].phonecall_id.value.startsWith("+")) {
                            if (decl[0].phonecall_id.value.slice(1).match(intenational_format)) {
                                decl[0].public_news_alert.style.display = "none";
                                decl[0].public_news_alert.innerHTML = "";
                                decl[0].phonecall_id.style.border = "";
                                decl[0].phonecall_id.value = "+(" + decl[0].phonecall_id.value.slice(1).substr(0, 3) + ') ' + decl[0].phonecall_id.value.slice(1).substr(3, 3) + '-' + decl[0].phonecall_id.value.slice(1).substr(6, 6);
                            }else {
                                decl[0].public_news_alert.style.display = "block";
                                decl[0].public_news_alert.innerHTML = "Wrong phone number entered, please add 12 digit phone number  eg: +255 757-870-022";
                                decl[0].phonecall_id.style.border = "2px solid red";
                            }
                        } else if (decl[0].phonecall_id.value.startsWith("0")){
                            if (decl[0].phonecall_id.value.match(phonenumber_format)) {
                                decl[0].public_news_alert.style.display = "none";
                                decl[0].public_news_alert.innerHTML = "";
                                decl[0].phonecall_id.style.border = "";
                                decl[0].phonecall_id.value = "(" + decl[0].phonecall_id.value.substr(0, 3) + ') ' + decl[0].phonecall_id.value.substr(3, 3) + '-' + decl[0].phonecall_id.value.substr(6, 4);
                            }else {
                                decl[0].public_news_alert.style.display = "block";
                                decl[0].public_news_alert.innerHTML = "Wrong phone number entered, please add 10 digit phone number start with 0 eg: 0757-870-022";
                                decl[0].phonecall_id.style.border = "2px solid red";
                            }
                        }else {
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Phone number can start with 0 or + sign and not otherwise eg: 0757... or +255...";
                            decl[0].phonecall_id.style.border = "2px solid red";
                        }
                    }
                }else {
                    decl[0].public_news_alert.style.display = "none";
                    decl[0].public_news_alert.innerHTML = "";
                    decl[0].phonecall_id.style.border = "";
                }
            }
        }
    },

    {
        validatePassword: function (implementionID) {

            implementionID.addEventListener("keyup", validateWrongPassword);
            function validateWrongPassword() {

                if (implementionID == decl[0].passcode_id) {
                    console.log("Password is selected");
                    if (decl[0].passcode_id.value.length >= 1) {

                        if (decl[0].passcode_id.value.match(decl[2].lower) || decl[0].passcode_id.value.match(decl[2].upper)
                            || decl[0].passcode_id.value.match(decl[2].symbol) || decl[0].passcode_id.value.match(decl[2].num)) {
                            decl[0].password_message.style.display = "block";
                            decl[0].password_message.innerHTML = "Poor password" + decl[1].mood1;
                            decl[0].passcode_id.style.border = "";
                            decl[0].public_news_alert.style.display = "none";
                            // console.log("single cond working");
                        }

                        if ((decl[0].passcode_id.value.match(decl[2].upper) && decl[0].passcode_id.value.match(decl[2].lower))
                            || (decl[0].passcode_id.value.match(decl[2].upper) && decl[0].passcode_id.value.match(decl[2].symbol))
                            || (decl[0].passcode_id.value.match(decl[2].upper) && decl[0].passcode_id.value.match(decl[2].num))
                            || (decl[0].passcode_id.value.match(decl[2].lower) && decl[0].passcode_id.value.match(decl[2].symbol))
                            || (decl[0].passcode_id.value.match(decl[2].lower) && decl[0].passcode_id.value.match(decl[2].num))
                            || (decl[0].passcode_id.value.match(decl[2].num) && decl[0].passcode_id.value.match(decl[2].symbol))) {
                            decl[0].password_message.style.display = "block";
                            decl[0].password_message.innerHTML = "Fair password" + decl[1].mood1;
                            decl[0].passcode_id.style.border = "";
                            decl[0].public_news_alert.style.display = "none";

                            // console.log("double cond working");

                        }

                        if ((decl[0].passcode_id.value.match(decl[2].upper) && decl[0].passcode_id.value.match(decl[2].lower) && decl[0].passcode_id.value.match(decl[2].symbol))
                            || (decl[0].passcode_id.value.match(decl[2].upper) && decl[0].passcode_id.value.match(decl[2].lower) && decl[0].passcode_id.value.match(decl[2].num))
                            || (decl[0].passcode_id.value.match(decl[2].lower) && decl[0].passcode_id.value.match(decl[2].symbol) && decl[0].passcode_id.value.match(decl[2].num))
                            || (decl[0].passcode_id.value.match(decl[2].num) && decl[0].passcode_id.value.match(decl[2].upper) && decl[0].passcode_id.value.match(decl[2].symbol))) {
                            decl[0].password_message.style.display = "block";
                            decl[0].password_message.innerHTML = "Good password" + decl[1].mood1;
                            decl[0].passcode_id.style.border = "";
                            decl[0].public_news_alert.style.display = "none";
                        }

                        if (decl[0].passcode_id.value.match(decl[2].upper) && decl[0].passcode_id.value.match(decl[2].upper) && decl[0].passcode_id.value.match(decl[2].symbol) && decl[0].passcode_id.value.match(decl[2].num)) {
                            decl[0].password_message.style.display = "block";
                            decl[0].password_message.innerHTML = "Strong password" + decl[1].mood1;
                            decl[0].passcode_id.style.border = "";
                            decl[0].public_news_alert.style.display = "none";

                            if (decl[0].passcode_id.value.length < 8) {
                                decl[0].public_news_alert.style.display = "block";
                                decl[0].public_news_alert.innerHTML = "Password Length must be atleast 8 characters"
                            } else {
                                decl[0].reg_status_bar.style.display = "none";
                            }
                        }
                    }else {
                        decl[0].passcode_id.style.border = "";
                        decl[0].confirm_oasscode_id.style.border = "";
                        decl[0].password_message.style.display = "none";
                        decl[0].public_news_alert.style.display = "none";
                    }

                    if (decl[0].passcode_id.value.length <= 0 && decl[0].confirm_oasscode_id.value.length <= 0) {
                        console.log("BOOT FIELDS ARE EMPTY");
                    } else if (decl[0].passcode_id.value.length >= 1 && decl[0].confirm_oasscode_id.value.length <= 0) {
                        decl[0].confirm_oasscode_id.style.border = "";
                        decl[0].passcode_id.style.border = "";
                        decl[0].public_news_alert.style.display = "none";
                        console.log("PASSWORD HAS SOMETHING AND CONFIRM PASSWORD HAS NOTHING");
                    } else if (decl[0].passcode_id.value.length <= 0 && decl[0].confirm_oasscode_id.value.length >= 1) {
                        console.log("PASSWORD HAS NOTHING AND CONFIRM PASSWORD HAS SOMETHING");
                    } else {
                        console.log("BOOT FIELDS HAVE SOMETHING");
                        if (decl[0].passcode_id.value.length >= 1) {
                            console.log("PASS HAS SOMETHING");
                            if (decl[0].passcode_id.value.length >= 8) {
                                if (decl[0].passcode_id.value === decl[0].confirm_oasscode_id.value) {
                                    console.log("PASSWORD MATCHING");
                                } else {
                                    console.log("PASSWORD DOES NOT MATCH");
                                }
                                console.log("PASSWORD IS CORRECT");
                            } else {
                                decl[0].passcode_id.style.border = "2px solid red";
                                decl[0].public_news_alert.style.display = "block";
                                decl[0].public_news_alert.innerHTML = "Password does not match";
                                console.log("PASSWORD IS TOO SHORT");
                            }
                        } else {
                            console.log("PASS HAS NOTHING SOMETHING");
                        }
                    }
                    
                } else if (implementionID == decl[0].confirm_oasscode_id) {
                    if (decl[0].passcode_id.value.length <= 0 && decl[0].confirm_oasscode_id.value.length <= 0) {
                        console.log("BOOT FIELDS ARE EMPTY");
                        decl[0].passcode_id.style.border = "";
                        decl[0].confirm_oasscode_id.style.border = "";
                    } else if (decl[0].passcode_id.value.length >= 1 && decl[0].confirm_oasscode_id.value.length <= 0) {
                        console.log("PASSWORD HAS SOMETHING AND CONFIRM PASSWORD HAS NOTHING");
                        decl[0].confirm_oasscode_id.style.border = "";
                        decl[0].passcode_id.style.border = "";
                        decl[0].public_news_alert.style.display = "none";
                    } else if (decl[0].passcode_id.value.length <= 0 && decl[0].confirm_oasscode_id.value.length >= 1) {
                        console.log("PASSWORD HAS NOTHING AND CONFIRM PASSWORD HAS SOMETHING");
                        decl[0].passcode_id.style.border = "2px solid red";
                        decl[0].public_news_alert.style.display = "block";
                        decl[0].public_news_alert.innerHTML = "Please fill first the first password field";

                    }else {
                        console.log("BOTH FIELDS HAVE SOMETHING");
                        console.log("CONFIRM PASSWORD IS TYPING");
                        if (decl[0].passcode_id.value.length >= 1) {
                            console.log("PASS HAS SOMETHING");
                            if (decl[0].passcode_id.value.length >= 8) {
                                if (decl[0].passcode_id.value === decl[0].confirm_oasscode_id.value) {
                                    console.log("PASSWORD MATCHING");
                                    decl[0].public_news_alert.style.display = "none";
                                    decl[0].passcode_id.style.border = "";
                                    decl[0].confirm_oasscode_id.style.border = "";
                                } else {
                                    console.log("PASSWORD DOES NOT MATCH");
                                    decl[0].confirm_oasscode_id.style.border = "2px solid red";
                                    decl[0].public_news_alert.style.display = "block";
                                    decl[0].public_news_alert.innerHTML = "Password does not match";
                                }
                                decl[0].passcode_id.style.border = "";
                                console.log("PASSWORD IS CORRECT");
                            } else {

                                if (decl[0].confirm_oasscode_id.value.length <= 0) {
                                    decl[0].confirm_oasscode_id.style.border = "";
                                }

                                decl[0].passcode_id.style.border = "2px solid red";
                                decl[0].public_news_alert.style.display = "block";
                                decl[0].public_news_alert.innerHTML = "Password is too short";
                                console.log("PASSWORD IS TOO SHORT");
                            }
                        } else {
                            console.log("PASS HAS NOTHING SOMETHING");
                        }
                    }
                }
            }
        }
    },

    {
        changeUsernameCharsToLower: function (implementumID) {
            implementumID.addEventListener("keyup", changeFirstLetterToLower);
            function changeFirstLetterToLower() {
                if(implementumID == decl[0].username_id) {
                    if (decl[0].username_id.value.length >= 1) {
                        if (!decl[0].username_id.value.charAt(0).match(decl[2].symbol)) {
                            console.log("Char ya kwanza haina symbols");
                            if (!decl[0].username_id.value.charAt(0).match(decl[2].num)) {
                                console.log("Char ya kwanza haina numbers");
                                if (decl[0].username_id.value.slice(1).match(decl[2].symbol)) {
                                    console.log("Username can not contains special symbol.");
                                    decl[0].username_id.style.border = "2px solid red";
                                    decl[0].public_news_alert.style.display = "block";
                                    decl[0].public_news_alert.innerHTML = "Username can not contain special symbols.";
                                }else {
                                    decl[0].username_id.value = decl[0].username_id.value.toLowerCase();
                                    decl[0].username_id.style.border = "";
                                    decl[0].public_news_alert.style.display = "none";
                                    console.log("Does not match symbols.");
                                }
                            }else {
                                console.log("Char ya kwanza ina numbers");
                                decl[0].username_id.style.border = "2px solid red";
                                decl[0].public_news_alert.style.display = "block";
                                decl[0].public_news_alert.innerHTML = "Username can not start with numbers.";
                            }
                        } else {
                            console.log("Char ya kwanza ina symbols");
                            decl[0].username_id.style.border = "2px solid red";
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "Username can not contain special symbols.";
                        }
                    }else {
                        decl[0].username_id.style.border = "";
                        decl[0].public_news_alert.style.display = "none";
                    }
                }
            }
        }
    },

    {
        checkIfIDCARDIsNumber: function (implementumID) {
            implementumID.addEventListener("keyup", checkForInputIsNumber);
            function checkForInputIsNumber() {
                if(implementumID == decl[0].id_card_id) {
                    if (decl[0].id_card_id.value.length >= 1) {
                        if (decl[0].id_card_id.value.match(decl[2].lower) || decl[0].id_card_id.value.match(decl[2].upper) || decl[0].id_card_id.value.match(decl[2].symbol)){
                            decl[0].id_card_id.style.border = "2px solid red";
                            decl[0].public_news_alert.style.display = "block";
                            decl[0].public_news_alert.innerHTML = "ID CARD NUMBER must contain numbers";
                            console.log("UPPER, LOWER and SYMBOLS matched");
                        } else if (decl[0].id_card_id.value.match(decl[2].num)) {
                            decl[0].id_card_id.style.border = "";
                            decl[0].public_news_alert.style.display = "none";
                        }
                    }else {
                        decl[0].id_card_id.style.border = "";
                        decl[0].public_news_alert.style.display = "none";
                    }
                }
            }
        }
    }
]

// if (decl[0].id_card_id.value.match(decl[2].num)) {
//     decl[0].id_card_id.style.border = "";
//     decl[0].public_news_alert.style.display = "none";
// } else 

// document.onreadystatechange = () => {
//     if (document.readyState === 'complete') {
//         if (decl[0].story_title.value.length < 1 && decl[0].story_body.value.length < 1) {
//             decl[0].public_story_submit_btn.disabled = true;
//         } else if (decl[0].story_title.value.length < 1 && decl[0].story_body.value.length >= 1) {
//             decl[0].public_story_submit_btn.disabled = true;
//         } else if (decl[0].story_title.value.length >= 1 && decl[0].story_body.value.length < 1) {
//             decl[0].public_story_submit_btn.disabled = true;
//         } else if (decl[0].story_title.value.length >= 1 && decl[0].story_body.value.length >= 1) {
//             decl[0].public_story_submit_btn.disabled = false;
//         }
//     }
// };


// decl[0].public_news_alert.onclick = function () {
//     if (decl[0].collapse_story_title.value.length < 1 && decl[0].collapse_story_desc.value.length < 1) {
//         decl[0].public_story_update_btn.disabled = true;
//     } else if (decl[0].collapse_story_title.value.length < 1 && decl[0].collapse_story_desc.value.length >= 1) {
//         decl[0].public_story_update_btn.disabled = true;
//     } else if (decl[0].collapse_story_title.value.length >= 1 && decl[0].collapse_story_desc.value.length < 1) {
//         decl[0].public_story_update_btn.disabled = true;
//     } else if (decl[0].collapse_story_title.value.length >= 1 && decl[0].collapse_story_desc.value.length >= 1) {
//         decl[0].public_story_update_btn.disabled = false;
//     }
// };

decl[0].firstname_id.onfocus = function () {
    console.log("Firstname is SELECTED");
    var status_msg = "Firstname can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].firstname_id, status_msg);
};

decl[0].middlename_id.onfocus = function () {
    console.log("Middlename is SELECTED");
    var status_msg = "Middlename can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].middlename_id, status_msg);
};

decl[0].lastname_id.onfocus = function () {
    console.log("Lastname is SELECTED");
    var status_msg = "Lastname can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].lastname_id, status_msg);
};

decl[0].email_id.onfocus = function () {
    console.log("email is SELECTED");
    var status_msg = "Lastname can not contains numbers and specials symbols eg: 12345#$%";
    implementum[1].validateEmailAddress();
};

decl[0].phonecall_id.onfocus = function () {
    console.log("phonecall is SELECTED");
    implementum[2].validatePhoneNumber();
};

decl[0].passcode_id.onfocus = function () {
    console.log("Password is SELECTED");
    implementum[3].validatePassword(decl[0].passcode_id);
};

decl[0].confirm_oasscode_id.onfocus = function () {
    console.log("Confirm Password is SELECTED");
    implementum[3].validatePassword(decl[0].confirm_oasscode_id);
};

decl[0].username_id.onfocus = function () {
    console.log("USERNAME is SELECTED");
    implementum[4].changeUsernameCharsToLower(decl[0].username_id);
};

decl[0].id_card_id.onfocus = function () {
    console.log("ID CARD ID is SELECTED");
    implementum[5].checkIfIDCARDIsNumber(decl[0].id_card_id);
};

decl[0].firstname_id.onblur = function () {
    var status_msg = "Firstname can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].firstname_id, status_msg);
};

decl[0].middlename_id.onblur = function () {
    var status_msg = "Middlename can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].middlename_id, status_msg);
};

decl[0].lastname_id.onblur = function () {
    var status_msg = "Lastname can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].lastname_id, status_msg);
};

decl[0].passcode_id.onblur = function () {
    // console.log("Password is SELECTED");
    implementum[3].validatePassword(decl[0].passcode_id);
};

decl[0].confirm_oasscode_id.onblur = function () {
    // console.log("Confirm Password is SELECTED");
    implementum[3].validatePassword(decl[0].confirm_oasscode_id);
};


