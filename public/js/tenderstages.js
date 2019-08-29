var decl = [
    tender_category = {
        tender_stage_name: document.getElementById("tender_stage_name"),
        tender_stage_desc: document.getElementById("tender_stage_desc"),
        collapse_tender_stage_name: document.getElementById("collapse_tender_stage_name"),
        collapse_tender_stage_desc: document.getElementById("collapse_tender_stage_desc"),
        add_stage_name: document.getElementById("add_stage_name"),
        user_role_edit_btn: document.getElementById("user_role_edit_btn"),
        user_role_update_btn: document.getElementById("user_role_update_btn"),
        message_div: document.getElementById("message-div"),
    },

    mood = {
        bad_mood: "poor ☹",
    },

    melan = {
        lower: /[a-z]/g,
        upper: /[A-Z]/g,
        // symbol: /[\W_]/,
        symbol: /([^\s\w])+/g,
        num: /[0-9]/g
    }
]


var implementum = [
    {
        firstLetterToCaps: function (implementumID, statusMSG) {
            implementumID.addEventListener("keyup", changeFirstLetterToUpper);
            function changeFirstLetterToUpper() {
                decl[0].tender_stage_name.value = decl[0].tender_stage_name.value.charAt(0).toUpperCase() + decl[0].tender_stage_name.value.slice(1).toLowerCase();
                decl[0].tender_stage_desc.value = decl[0].tender_stage_desc.value.charAt(0).toUpperCase() + decl[0].tender_stage_desc.value.slice(1).toLowerCase();

                if (implementumID == decl[0].tender_stage_name) {
                    console.log("TITLE SELECTED FIRST");
                    if (decl[0].tender_stage_name.value.length < 1 && decl[0].tender_stage_desc.value.length >= 1) {
                        decl[0].add_stage_name.disabled = true;
                        decl[0].tender_stage_name.style.border = "";
                        if ((decl[0].tender_stage_desc.value.match(decl[2].symbol) || decl[0].tender_stage_desc.value.match(decl[2].num))) {
                            console.log("BAD DESCRIPTION");
                            var status_msg = "Tender Category Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].tender_stage_desc.style.border = "2px solid red";
                            decl[0].add_stage_name.disabled = true;
                            decl[0].tender_stage_name.style.border = "";
                        } else if ((!decl[0].tender_stage_desc.value.match(decl[2].symbol) || !decl[0].tender_stage_desc.value.match(decl[2].num))) {
                            console.log("GOOD DESCRIPTION");
                            decl[0].add_stage_name.disabled = true;
                            decl[0].tender_stage_desc.style.border = "";
                        }
                        // console.log("Title empty");
                    } else if (decl[0].tender_stage_name.value.length >= 1 && decl[0].tender_stage_desc.value.length < 1) {
                        decl[0].add_stage_name.disabled = true;
                        decl[0].tender_stage_name.style.border = "";
                        // console.log("Body empty");
                        if ((decl[0].tender_stage_name.value.match(decl[2].symbol) || decl[0].tender_stage_name.value.match(decl[2].num))) {
                            console.log("BAD TITLE");
                            var status_msg = "Tender Category Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].tender_stage_name.style.border = "2px solid red"
                            decl[0].add_stage_name.disabled = true;
                            decl[0].tender_stage_desc.style.border = "";
                        } else if ((!decl[0].tender_stage_name.value.match(decl[2].symbol) || !decl[0].tender_stage_name.value.match(decl[2].num))) {
                            console.log("GOOD TITLE");
                            decl[0].add_stage_name.disabled = true;
                            decl[0].tender_stage_name.style.border = "";
                        }
                    } else if (decl[0].tender_stage_name.value.length >= 1 && decl[0].tender_stage_desc.value.length >= 1) {
                        // console.log("Title And Body Fully");
                        if ((decl[0].tender_stage_name.value.match(decl[2].symbol) || decl[0].tender_stage_name.value.match(decl[2].num)) &&
                            (decl[0].tender_stage_desc.value.match(decl[2].symbol) || decl[0].tender_stage_desc.value.match(decl[2].num))) {
                            decl[0].add_stage_name.disabled = true;
                            console.log("BAD TITLE AND BAD DESCRIPTION");
                            var status_msg = "Tender Category Title and Description can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].tender_stage_name.style.border = "2px solid red"
                            decl[0].tender_stage_desc.style.border = "2px solid red"
                            decl[0].add_stage_name.disabled = true;
                        } else if ((!decl[0].tender_stage_name.value.match(decl[2].symbol) || !decl[0].tender_stage_name.value.match(decl[2].num)) &&
                            (decl[0].tender_stage_desc.value.match(decl[2].symbol) || decl[0].tender_stage_desc.value.match(decl[2].num))) {
                            decl[0].add_stage_name.disabled = true;
                            console.log("GOOD TITLE AND BAD DESCRIPTION");
                            var status_msg = "Tender Category Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].tender_stage_desc.style.border = "2px solid red"
                            decl[0].add_stage_name.disabled = true;
                            decl[0].tender_stage_name.style.border = "";
                        } else if ((decl[0].tender_stage_name.value.match(decl[2].symbol) || decl[0].tender_stage_name.value.match(decl[2].num)) &&
                            (!decl[0].tender_stage_desc.value.match(decl[2].symbol) || !decl[0].tender_stage_desc.value.match(decl[2].num))) {
                            decl[0].add_stage_name.disabled = true;
                            console.log("BAD TITLE AND GOOD DESCRIPTION");
                            var status_msg = "Tender Category Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].tender_stage_name.style.border = "2px solid red"
                            decl[0].add_stage_name.disabled = true;
                            decl[0].tender_stage_desc.style.border = "";
                        } else if (!((decl[0].tender_stage_name.value.match(decl[2].symbol) && decl[0].tender_stage_name.value.match(decl[2].num)) &&
                            (decl[0].tender_stage_desc.value.match(decl[2].symbol) || decl[0].tender_stage_desc.value.match(decl[2].num)))) {
                            console.log("GOOD TITLE AND DESCRIPTION");
                            decl[0].add_stage_name.disabled = false;
                            decl[0].tender_stage_name.style.border = "";
                            decl[0].tender_stage_desc.style.border = "";
                            decl[0].message_div.style.display = "none";
                        }
                    } else {
                        decl[0].tender_stage_name.style.border = "";
                        decl[0].message_div.style.display = "none";
                    }

                } else if (implementumID == decl[0].tender_stage_desc) {
                    console.log("BODY SELECTED FIRST");
                    if (decl[0].tender_stage_desc.value.length < 1 && decl[0].tender_stage_name.value.length >= 1) {
                        decl[0].add_stage_name.disabled = true;
                        decl[0].tender_stage_name.style.border = "";
                        // console.log("Body empty");
                        if ((decl[0].tender_stage_name.value.match(decl[2].symbol) || decl[0].tender_stage_name.value.match(decl[2].num))) {
                            console.log("BAD TITLE");
                            var status_msg = "Tender Category Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].tender_stage_name.style.border = "2px solid red"
                            decl[0].tender_stage_desc.style.border = "2px solid red"
                            decl[0].add_stage_name.disabled = true;
                            decl[0].tender_stage_desc.style.border = "";
                        } else if ((!decl[0].tender_stage_name.value.match(decl[2].symbol) || !decl[0].tender_stage_name.value.match(decl[2].num))) {
                            console.log("GOOD TITLE");
                            decl[0].add_stage_name.disabled = true;
                            decl[0].tender_stage_name.style.border = ""
                        }
                    } else if (decl[0].tender_stage_desc.value.length >= 1 && decl[0].tender_stage_name.value.length < 1) {
                        decl[0].add_stage_name.disabled = true;
                        decl[0].tender_stage_name.style.border = "";

                        // console.log("Title empty");
                        if ((decl[0].tender_stage_desc.value.match(decl[2].symbol) || decl[0].tender_stage_desc.value.match(decl[2].num))) {
                            console.log("BAD DESCRIPTION");
                            var status_msg = "Tender Category Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].tender_stage_desc.style.border = "2px solid red"
                            decl[0].add_stage_name.disabled = true;
                            decl[0].tender_stage_name.style.border = "";
                        } else if ((!decl[0].tender_stage_desc.value.match(decl[2].symbol) || !decl[0].tender_stage_desc.value.match(decl[2].num))) {
                            console.log("GOOD DESCRIPTION");
                            decl[0].add_stage_name.disabled = true;
                            decl[0].tender_stage_desc.style.border = "";
                        }
                    } else if (decl[0].tender_stage_desc.value.length >= 1 && decl[0].tender_stage_name.value.length >= 1) {
                        // console.log("Title And Body Fully");
                        // console.log("GOOD TITLE AND DESCRIPTION");
                        if ((decl[0].tender_stage_name.value.match(decl[2].symbol) || decl[0].tender_stage_name.value.match(decl[2].num)) &&
                            (decl[0].tender_stage_desc.value.match(decl[2].symbol) || decl[0].tender_stage_desc.value.match(decl[2].num))) {
                            decl[0].add_stage_name.disabled = true;
                            console.log("BAD TITLE AND BAD DESCRIPTION");
                            var status_msg = "Tender Category Title and Description can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].tender_stage_name.style.border = "2px solid red"
                            decl[0].tender_stage_desc.style.border = "2px solid red"
                            decl[0].add_stage_name.disabled = true;
                        } else if ((!decl[0].tender_stage_name.value.match(decl[2].symbol) || !decl[0].tender_stage_name.value.match(decl[2].num)) &&
                            (decl[0].tender_stage_desc.value.match(decl[2].symbol) || decl[0].tender_stage_desc.value.match(decl[2].num))) {
                            console.log("GOOD TITLE AND BAD DESCRIPTION")
                            // decl[0].add_stage_name.disabled = true;
                            var status_msg = "Tender Category Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].tender_stage_desc.style.border = "2px solid red"
                            decl[0].add_stage_name.disabled = true;
                            decl[0].tender_stage_name.style.border = "";
                        } else if ((decl[0].tender_stage_name.value.match(decl[2].symbol) || decl[0].tender_stage_name.value.match(decl[2].num)) &&
                            (!decl[0].tender_stage_desc.value.match(decl[2].symbol) || !decl[0].tender_stage_desc.value.match(decl[2].num))) {
                            console.log("BAD TITLE AND GOOD DESCRIPTION");
                            // decl[0].add_stage_name.disabled = true;
                            var status_msg = "Tender Category Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].tender_stage_name.style.border = "2px solid red"
                            decl[0].add_stage_name.disabled = true;
                            decl[0].tender_stage_desc.style.border = "";
                        } else if (!((decl[0].tender_stage_name.value.match(decl[2].symbol) || decl[0].tender_stage_name.value.match(decl[2].num)) &&
                            (decl[0].tender_stage_desc.value.match(decl[2].symbol) || decl[0].tender_stage_desc.value.match(decl[2].num)))) {
                            console.log("GOOD TITLE AND DESCRIPTION");
                            decl[0].add_stage_name.disabled = false;
                            decl[0].tender_stage_name.style.border = "";
                            decl[0].tender_stage_desc.style.border = "";
                            decl[0].message_div.style.display = "none";
                        }
                    } else {
                        decl[0].tender_stage_desc.style.border = "";
                        decl[0].message_div.style.display = "none";
                    }
                }


                if (implementumID == decl[0].collapse_tender_stage_name) {
                    console.log("TITLE SELECTED FIRST");
                    if (decl[0].collapse_tender_stage_name.value.length < 1 && decl[0].collapse_tender_stage_desc.value.length >= 1) {
                        decl[0].user_role_update_btn.disabled = true;
                        decl[0].collapse_tender_stage_name.style.border = "";
                        if ((decl[0].collapse_tender_stage_desc.value.match(decl[2].symbol) || decl[0].collapse_tender_stage_desc.value.match(decl[2].num))) {
                            console.log("BAD DESCRIPTION");
                            var status_msg = "Tender Category Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_tender_stage_desc.style.border = "2px solid red";
                            decl[0].user_role_update_btn.disabled = true;
                            decl[0].collapse_tender_stage_name.style.border = "";
                        } else if ((!decl[0].collapse_tender_stage_desc.value.match(decl[2].symbol) || !decl[0].collapse_tender_stage_desc.value.match(decl[2].num))) {
                            console.log("GOOD DESCRIPTION");
                            decl[0].user_role_update_btn.disabled = true;
                            decl[0].collapse_tender_stage_desc.style.border = "";
                        }
                        // console.log("Title empty");
                    } else if (decl[0].collapse_tender_stage_name.value.length >= 1 && decl[0].collapse_tender_stage_desc.value.length < 1) {
                        decl[0].user_role_update_btn.disabled = true;
                        decl[0].collapse_tender_stage_name.style.border = "";
                        // console.log("Body empty");
                        if ((decl[0].collapse_tender_stage_name.value.match(decl[2].symbol) || decl[0].collapse_tender_stage_name.value.match(decl[2].num))) {
                            console.log("BAD TITLE");
                            var status_msg = "Tender Category Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_tender_stage_name.style.border = "2px solid red"
                            decl[0].user_role_update_btn.disabled = true;
                            decl[0].collapse_tender_stage_desc.style.border = "";
                        } else if ((!decl[0].collapse_tender_stage_name.value.match(decl[2].symbol) || !decl[0].collapse_tender_stage_name.value.match(decl[2].num))) {
                            console.log("GOOD TITLE");
                            decl[0].user_role_update_btn.disabled = true;
                            decl[0].collapse_tender_stage_name.style.border = "";
                        }
                    } else if (decl[0].collapse_tender_stage_name.value.length >= 1 && decl[0].collapse_tender_stage_desc.value.length >= 1) {
                        // console.log("Title And Body Fully");
                        if ((decl[0].collapse_tender_stage_name.value.match(decl[2].symbol) || decl[0].collapse_tender_stage_name.value.match(decl[2].num)) &&
                            (decl[0].collapse_tender_stage_desc.value.match(decl[2].symbol) || decl[0].collapse_tender_stage_desc.value.match(decl[2].num))) {
                            decl[0].user_role_update_btn.disabled = true;
                            console.log("BAD TITLE AND BAD DESCRIPTION");
                            var status_msg = "Tender Category Title and Description can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_tender_stage_name.style.border = "2px solid red"
                            decl[0].collapse_tender_stage_desc.style.border = "2px solid red"
                            decl[0].user_role_update_btn.disabled = true;
                        } else if ((!decl[0].collapse_tender_stage_name.value.match(decl[2].symbol) || !decl[0].collapse_tender_stage_name.value.match(decl[2].num)) &&
                            (decl[0].collapse_tender_stage_desc.value.match(decl[2].symbol) || decl[0].collapse_tender_stage_desc.value.match(decl[2].num))) {
                            // decl[0].user_role_update_btn.disabled = true;
                            console.log("GOOD TITLE AND BAD DESCRIPTION");
                            var status_msg = "Tender Category Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_tender_stage_desc.style.border = "2px solid red"
                            decl[0].user_role_update_btn.disabled = true;
                            decl[0].collapse_tender_stage_name.style.border = "";
                        } else if ((decl[0].collapse_tender_stage_name.value.match(decl[2].symbol) || decl[0].collapse_tender_stage_name.value.match(decl[2].num)) &&
                            (!decl[0].collapse_tender_stage_desc.value.match(decl[2].symbol) || !decl[0].collapse_tender_stage_desc.value.match(decl[2].num))) {
                            // decl[0].user_role_update_btn.disabled = true;
                            console.log("BAD TITLE AND GOOD DESCRIPTION");
                            var status_msg = "Tender Category Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_tender_stage_name.style.border = "2px solid red"
                            decl[0].user_role_update_btn.disabled = true;
                            decl[0].collapse_tender_stage_desc.style.border = "";
                        } else if (!((decl[0].collapse_tender_stage_name.value.match(decl[2].symbol) && decl[0].collapse_tender_stage_name.value.match(decl[2].num)) &&
                            (decl[0].collapse_tender_stage_desc.value.match(decl[2].symbol) || decl[0].collapse_tender_stage_desc.value.match(decl[2].num)))) {
                            console.log("GOOD TITLE AND DESCRIPTION");
                            decl[0].user_role_update_btn.disabled = false;
                            decl[0].collapse_tender_stage_name.style.border = "";
                            decl[0].collapse_tender_stage_desc.style.border = "";
                            decl[0].message_div.style.display = "none";
                        }
                    } else {
                        decl[0].collapse_tender_stage_name.style.border = "";
                        decl[0].message_div.style.display = "none";
                    }

                } else if (implementumID == decl[0].collapse_tender_stage_desc) {
                    console.log("BODY SELECTED FIRST");
                    if (decl[0].collapse_tender_stage_desc.value.length < 1 && decl[0].collapse_tender_stage_name.value.length >= 1) {
                        decl[0].user_role_update_btn.disabled = true;
                        decl[0].collapse_tender_stage_name.style.border = "";
                        // console.log("Body empty");
                        if ((decl[0].collapse_tender_stage_name.value.match(decl[2].symbol) || decl[0].collapse_tender_stage_name.value.match(decl[2].num))) {
                            console.log("BAD TITLE");
                            var status_msg = "Tender Category Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_tender_stage_name.style.border = "2px solid red"
                            decl[0].collapse_tender_stage_desc.style.border = "2px solid red"
                            decl[0].user_role_update_btn.disabled = true;
                            decl[0].collapse_tender_stage_desc.style.border = "";
                        } else if ((!decl[0].collapse_tender_stage_name.value.match(decl[2].symbol) || !decl[0].collapse_tender_stage_name.value.match(decl[2].num))) {
                            console.log("GOOD TITLE");
                            decl[0].user_role_update_btn.disabled = true;
                            decl[0].collapse_tender_stage_name.style.border = ""
                        }
                    } else if (decl[0].collapse_tender_stage_desc.value.length >= 1 && decl[0].collapse_tender_stage_name.value.length < 1) {
                        decl[0].user_role_update_btn.disabled = true;
                        decl[0].collapse_tender_stage_name.style.border = "";

                        // console.log("Title empty");
                        if ((decl[0].collapse_tender_stage_desc.value.match(decl[2].symbol) || decl[0].collapse_tender_stage_desc.value.match(decl[2].num))) {
                            console.log("BAD DESCRIPTION");
                            var status_msg = "Tender Category Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_tender_stage_desc.style.border = "2px solid red"
                            decl[0].user_role_update_btn.disabled = true;
                            decl[0].collapse_tender_stage_name.style.border = "";
                        } else if ((!decl[0].collapse_tender_stage_desc.value.match(decl[2].symbol) || !decl[0].collapse_tender_stage_desc.value.match(decl[2].num))) {
                            console.log("GOOD DESCRIPTION");
                            decl[0].user_role_update_btn.disabled = true;
                            decl[0].collapse_tender_stage_desc.style.border = "";
                        }
                    } else if (decl[0].collapse_tender_stage_desc.value.length >= 1 && decl[0].collapse_tender_stage_name.value.length >= 1) {
                        // console.log("Title And Body Fully");
                        // console.log("GOOD TITLE AND DESCRIPTION");
                        if ((decl[0].collapse_tender_stage_name.value.match(decl[2].symbol) || decl[0].collapse_tender_stage_name.value.match(decl[2].num)) &&
                            (decl[0].collapse_tender_stage_desc.value.match(decl[2].symbol) || decl[0].collapse_tender_stage_desc.value.match(decl[2].num))) {
                            decl[0].user_role_update_btn.disabled = true;
                            console.log("BAD TITLE AND BAD DESCRIPTION");
                            var status_msg = "Tender Category Title and Description can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_tender_stage_name.style.border = "2px solid red"
                            decl[0].collapse_tender_stage_desc.style.border = "2px solid red"
                            decl[0].user_role_update_btn.disabled = true;
                        } else if ((!decl[0].collapse_tender_stage_name.value.match(decl[2].symbol) || !decl[0].collapse_tender_stage_name.value.match(decl[2].num)) &&
                            (decl[0].collapse_tender_stage_desc.value.match(decl[2].symbol) || decl[0].collapse_tender_stage_desc.value.match(decl[2].num))) {
                            console.log("GOOD TITLE AND BAD DESCRIPTION")
                            decl[0].user_role_update_btn.disabled = true;
                            var status_msg = "Tender Category Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_tender_stage_desc.style.border = "2px solid red"
                            decl[0].user_role_update_btn.disabled = true;
                            decl[0].collapse_tender_stage_name.style.border = "";
                        } else if ((decl[0].collapse_tender_stage_name.value.match(decl[2].symbol) || decl[0].collapse_tender_stage_name.value.match(decl[2].num)) &&
                            (!decl[0].collapse_tender_stage_desc.value.match(decl[2].symbol) || !decl[0].collapse_tender_stage_desc.value.match(decl[2].num))) {
                            console.log("BAD TITLE AND GOOD DESCRIPTION");
                            decl[0].user_role_update_btn.disabled = true;
                            var status_msg = "Tender Category Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_tender_stage_name.style.border = "2px solid red"
                            decl[0].user_role_update_btn.disabled = true;
                            decl[0].collapse_tender_stage_desc.style.border = "";
                        } else if (!((decl[0].collapse_tender_stage_name.value.match(decl[2].symbol) || decl[0].collapse_tender_stage_name.value.match(decl[2].num)) &&
                            (decl[0].collapse_tender_stage_desc.value.match(decl[2].symbol) || decl[0].collapse_tender_stage_desc.value.match(decl[2].num)))) {
                            console.log("GOOD TITLE AND DESCRIPTION");
                            decl[0].user_role_update_btn.disabled = false;
                            decl[0].collapse_tender_stage_name.style.border = "";
                            decl[0].collapse_tender_stage_desc.style.border = "";
                            decl[0].message_div.style.display = "none";
                        }
                    } else {
                        decl[0].collapse_tender_stage_desc.style.border = "";
                        decl[0].message_div.style.display = "none";
                    }
                }
            }
        }
    }
]

decl[0].add_stage_name.disabled = true;

document.onreadystatechange = () => {
    if (document.readyState === 'complete') {
        if (decl[0].tender_stage_name.value.length < 1 && decl[0].tender_stage_desc.value.length < 1) {
            decl[0].add_stage_name.disabled = true;
        } else if (decl[0].tender_stage_name.value.length < 1 && decl[0].tender_stage_desc.value.length >= 1) {
            decl[0].add_stage_name.disabled = true;
        } else if (decl[0].tender_stage_name.value.length >= 1 && decl[0].tender_stage_desc.value.length < 1) {
            decl[0].add_stage_name.disabled = true;
        } else if (decl[0].tender_stage_name.value.length >= 1 && decl[0].tender_stage_desc.value.length >= 1) {
            decl[0].add_stage_name.disabled = false;
        }
    }
};


decl[0].user_role_edit_btn.onclick = function () {
    if (decl[0].collapse_tender_stage_name.value.length < 1 && decl[0].collapse_tender_stage_desc.value.length < 1) {
        decl[0].user_role_update_btn.disabled = true;
    } else if (decl[0].collapse_tender_stage_name.value.length < 1 && decl[0].collapse_tender_stage_desc.value.length >= 1) {
        decl[0].user_role_update_btn.disabled = true;
    } else if (decl[0].collapse_tender_stage_name.value.length >= 1 && decl[0].collapse_tender_stage_desc.value.length < 1) {
        decl[0].user_role_update_btn.disabled = true;
    } else if (decl[0].collapse_tender_stage_name.value.length >= 1 && decl[0].collapse_tender_stage_desc.value.length >= 1) {
        decl[0].user_role_update_btn.disabled = false;
    }
};

decl[0].tender_stage_name.onfocus = function () {
    var status_msg = "Tender Category Title can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].tender_stage_name, status_msg);
};

decl[0].tender_stage_desc.onfocus = function () {
    var status_msg = "Tender Category Description can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].tender_stage_desc, status_msg);
};

decl[0].tender_stage_name.onblur = function () {
    var status_msg = "Tender Category Title can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].tender_stage_name, status_msg);
};

decl[0].tender_stage_desc.onblur = function () {
    var status_msg = "Tender Category Description can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].tender_stage_desc, status_msg);
};




decl[0].collapse_tender_stage_name.onfocus = function () {
    var status_msg = "Tender Category Title can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].collapse_tender_stage_name, status_msg);
};

decl[0].collapse_tender_stage_desc.onfocus = function () {
    var status_msg = "Tender Category Description can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].collapse_tender_stage_desc, status_msg);
};

decl[0].collapse_tender_stage_name.onblur = function () {
    var status_msg = "Tender Category Title can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].collapse_tender_stage_name, status_msg);
};

decl[0].collapse_tender_stage_desc.onblur = function () {
    var status_msg = "Tender Category Description can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].collapse_tender_stage_desc, status_msg);
};