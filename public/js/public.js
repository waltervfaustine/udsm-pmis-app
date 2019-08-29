var decl = [
    tender_user_reg_information = {
        tendercategory_id: document.getElementById("tbcreg_firstname"),
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
        public_reg_alert: document.getElementById("public_reg_alert"),
    },

    mood = {
        bad_mood: "☹",
    },

    melan = {
        lower: /[a-z]/g,
        upper: /[A-Z]/g,
        symbol: /[\W_]/,
        // symbol: /([^\s\w])+/g,
        // symbol: /([^\s\w\&\.\,])+/g,
        num: /[0-9]/g
    }
]




var implementum = [
    {
        firstLetterToCaps: function (implementumID, statusMSG) {
            implementumID.addEventListener("keyup", changeFirstLetterToUpper);
            function changeFirstLetterToUpper() {

                if (implementumID == decl[0].story_title) {
                    

                } else if (implementumID == decl[0].story_body) {
                   
                }

                if (implementumID == decl[0].collapse_story_title) {
                

                } else if (implementumID == decl[0].collapse_story_desc) {
                   
                }
            }
        }
    }
]

document.onreadystatechange = () => {
    if (document.readyState === 'complete') {
        if (decl[0].story_title.value.length < 1 && decl[0].story_body.value.length < 1) {
            decl[0].public_story_submit_btn.disabled = true;
        } else if (decl[0].story_title.value.length < 1 && decl[0].story_body.value.length >= 1) {
            decl[0].public_story_submit_btn.disabled = true;
        } else if (decl[0].story_title.value.length >= 1 && decl[0].story_body.value.length < 1) {
            decl[0].public_story_submit_btn.disabled = true;
        } else if (decl[0].story_title.value.length >= 1 && decl[0].story_body.value.length >= 1) {
            decl[0].public_story_submit_btn.disabled = false;
        }
    }
};


decl[0].public_reg_alert.onclick = function () {
    if (decl[0].collapse_story_title.value.length < 1 && decl[0].collapse_story_desc.value.length < 1) {
        decl[0].public_story_update_btn.disabled = true;
    } else if (decl[0].collapse_story_title.value.length < 1 && decl[0].collapse_story_desc.value.length >= 1) {
        decl[0].public_story_update_btn.disabled = true;
    } else if (decl[0].collapse_story_title.value.length >= 1 && decl[0].collapse_story_desc.value.length < 1) {
        decl[0].public_story_update_btn.disabled = true;
    } else if (decl[0].collapse_story_title.value.length >= 1 && decl[0].collapse_story_desc.value.length >= 1) {
        decl[0].public_story_update_btn.disabled = false;
    }
};

decl[0].firstname_id.onfocus = function () {
    var status_msg = "Firstname can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].firstname_id, status_msg);
};

decl[0].middlename_id.onfocus = function () {
    var status_msg = "Middlename can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].middlename_id, status_msg);
};

decl[0].lastname_id.onfocus = function () {
    var status_msg = "Lastname can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].lastname_id, status_msg);
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


